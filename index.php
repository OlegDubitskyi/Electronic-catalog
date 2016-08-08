<?
error_reporting(1);
//if (($_SERVER['PHP_AUTH_USER']!="tiger" or $_SERVER['PHP_AUTH_PW']!="kondor")) {
//    header("WWW-Authenticate: Basic realm=\"My Realm\"");
//    header("HTTP/1.0 401 Unauthorized");
//    echo "Логин или пароль введенный вами неверен\n";
//    exit;
//}else {

session_start();
#########################################################
# Иниализация $pt - флага типа прайса(розничного или оптового)
#########################################################
if($pt){
	$_SESSION['price_type'] = $pt;
}else{
	if($_SESSION['price_type']){
//		$pt = $_SESSION['price_type'];
	}else{
		$_SESSION['price_type'] = 'r';
	}
}
#########################################################
# Иниализация $rid - идентификатора региона
# Сохраняем его в сессию для того, что бы сохранять настройки пользователя
#########################################################
if($rid and $rid!='-1'){
	$_SESSION['region_id'] = $rid;
}elseif($rid=='-1'){
	$_SESSION['region_id']='';
}else{
	if($_SESSION['region_id']){
		//$rid = $_SESSION['region_id'];
	}
}
#########################################################
# Иниализация $vid - идентификатора производителя
# Сохраняем его в сессию для того, что бы сохранять настройки пользователя
#########################################################
if($vid and $vid!='-1'){
	$_SESSION['vendor_id'] = $vid;
}elseif($vid=='-1'){
	$_SESSION['vendor_id']='';
}else{
	if($_SESSION['vendor_id']){
		//$vid = $_SESSION['vendor_id'];
	}
}

//print "SESSION:".$_SESSION['price_type']."<br>";
//print "price:type:".$_SESSION['price_type'];
#########################################################
require_once("config.php");
require_once($path_lib."/db/dbtree.php");
require_once($path_lib."/db/database.php");
require_once($path_lib."/PEAR/DB.php");
#подключение собственных классов 
require_once($path_lib."/classes/admin/pricer.php");
require_once($path_lib."/classes/admin/load_sellers.php");
require_once($path_lib."/classes/Catalog.php");
require_once($path_lib."/classes/Goods.php");
require_once($path_lib."/classes/Vendor.php");
require_once($path_lib."/classes/Region.php");
require_once($path_lib."/classes/Filters.php");
require_once($path_lib."/classes/Search.php");
require_once($path_lib."/classes/timer.php");
require_once($path_lib."/classes/Register.php");
require_once($path_lib."/classes/Stat.php");
#########################################################
# подключаем таймер
#########################################################
$timer = new timer();
$timer->start();
#########################################################
#########################################################
### Инициализация шаблона                             ###
#########################################################
$smarty = new SmartyInit();
#########################################################
### соединение с базой                                ###
#########################################################
$db =& DB::connect($dsn, $options); 
mysql_query("SET NAMES cp1251");
$tree = new CDBTree ($db, $table, "cat_id");
#########################################################

$pricer = new Pricer($db,$smarty,$uploaddir);

//if($cat_name){
////	print "id:$id";
//	$tree->insert($id, array("cat_name" => $cat_name));
//}
//print "login:".$_POST[login]."<br>";
if($cmd=='login'){
	$main_win = "default_page.tpl";
	$sql = "SELECT u.seller_id, u.uid, u.user_name, s.company_name 
				FROM users u, sellers s
				WHERE u.login='$_POST[login]' AND u.pas='$pas' AND u.seller_id=s.id";
	//print "sql:$sql<br>";
	$res = $db->query($sql);
	//if(!res)print "Error in SQL:$sql";
	while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
		$seller_id = $row['seller_id'];
		$user_id = $row['uid'];	
		$user_name = $row['user_name'];
		$company_name = $row['company_name'];
		
	}
	if($seller_id and $user_id){
		$_SESSION['is_logged'] 		= true;
		$_SESSION['seller_id'] 		= $seller_id;
		$_SESSION['user_id'] 		= $user_id;
		$_SESSION['user_id'] 		= $user_id;
		$_SESSION['user_name'] 		= $user_name;
		$_SESSION['company_name'] 	= $company_name;

		header("Location: company_account.php");				
		
	}else{
		header("Location: index.php?er=lf");				
	}
		
}elseif($cmd == 'authorization'){

	$sql = "SELECT * FROM sellers ORDER BY cat_left";	
	$result = $db->query($sql);	
	$j=0;
	while ($row = $result->fetchrow(DB_FETCHMODE_ASSOC)){
		$prefix = "";
		for($i=0;$i<$row[cat_level];$i++){
			$prefix .="&nbsp;&nbsp;&nbsp;&nbsp;";
		}
		$sellers[$j] = array(	"cat_id"	=> $row['cat_id'],
								"cat_name" 	=> $row['cat_name'],
								"prefix" 	=> $prefix);
		$j++;

	}
	$smarty->assign("sellers",$sellers);

	
# Отображение списка фирм-продавцов	
}elseif ($cmd=='showf'){
	$main_win = "company_catalog.tpl";
	$footer = 'inc/footer_price.tpl';
	
	if($l){
		//print ord($l);
		$seller = new load_sellers($db,$smarty);
		$seller->get_active_list($l);
		$smarty->assign("show_table",1);
	}
	
	/**
	 * ci - company_info - отображение информации о конкретной фирме
	 */
}elseif ($cmd=='ci'){
	$main_win = "company_info.tpl";
	$footer = 'inc/footer_price.tpl';
	$seller = new load_sellers($db,$smarty);
	$seller->get_seller($sid);	
	
}elseif($cmd=='open_c'){

	/**
	 * Делаем проверку на то, стоит ли нам хранить в сессии значение $_SESSION[vendor_id]
	 * Ибо, возникают случаи когда он устанавливается в ходе каких то операций(например поиска)
	 * и затем влиял на работу других функций, поэтому логика у нас будет следующей:
	 * каждый раз при отображении товаров мы будем проверять параметры:
	 * если кроме cat_id ничего не приходит на вход, значит vendor_id не установлен и его надо
	 * "сбрасывать", если он был установлен
	 * Таким образом мы защитим наши фильтры(производитель, регионы, постраничный вывод) 
	 */
	
//	print "<br>vid:$vid<br>";
//	print "<br>rid:$rid<br>";
//	print "<br>pt:$pt<br>";
	if($cat_id and $vid=='' and $rid=='' and $pt=='' and $search_str==''){
		//print "<br>условие прошли<br>";
		$_SESSION['vendor_id'] = '';							
		$_SESSION['region_id'] = '';
		$_SESSION['search_string'] = '';
		$_SESSION['price_type'] = 'r';
	}
	# вроде работает :)
	
	
	$catalog = new Catalog($db);
	//$vendor = new Vendor($db);
	$filter = new Filters($db, $smarty);
	
	#Получаем путь к категории для навигации
	$cat_path = $catalog->get_path($cat_id);
	$smarty->assign('cat_path',$cat_path);	
	
	# Получаем все подкатегории для данной категории
	$subcatalog_data = $catalog->get_children($cat_id);
	#Если кол-во возвращаемых строк больше нуля, тогда показываем вложенные категории, если меньше,
	#то категория не содержит подкатегорий, показываем товары для данной категории
	if(count($subcatalog_data)){
		$main_win = 'show_scat_group.tpl';
		$footer = 'inc/footer_price.tpl';
		$smarty->assign("catalog",$subcatalog_data);		
		$smarty->assign("cat_id",$cat_id);				

	}else {
		if($_SESSION['price_type']=='r'){
			# Показываем розничный прайс для этой категории
			$main_win = 'show_rozn_price_list.tpl';
		}elseif($_SESSION['price_type']=='o'){
			# Показываем оптовый прайс для этой категории
			$main_win = 'show_opt_price_list.tpl';
		}
		$footer = 'inc/footer_price.tpl';
		# Постраничный вывод
		# Получаем список товаров для указанной категории
		$goods = new Goods($db,$smarty,$pages_per_page, $cols_pages_in_block);
		# pg - номер страницы - page
		if(!$pg)$pg = 1;
		$smarty->assign('page',$pg);
		$positions = $goods->get_cat_goods($cat_id, $_SESSION['vendor_id'],$_SESSION['region_id'],$pg);
		$smarty->assign('positions',$positions);
		//print_r($positions);
		# Инициализация фильтра по производителям
		$filter->vendor_for_search($cat_id);
		
		# Инициализация фильтра по типу прайса(розница или опт)
		$filter->price_type($cat_id);

		# Инициализация фильтра по регионам
		$filter->region_for_search($cat_id);
		/**
	 	* Передаем переменные в шаблон, для того, что бы при переходе со страницы на страницу
	 	* (постраничный вывод) мы не теряли vendor_id и region_id
	 	*/
		if($_SESSION['vendor_id']){
			$smarty->assign('vendor_id',$_SESSION['vendor_id']);
		}
		if($_SESSION['region_id']){
			$smarty->assign('region_id',$_SESSION['region_id']);
		}		
	}
	
}elseif($cmd=='svg'){#show vendor goods
	if(!isset($price_type) or $price_type=='r'){
		$main_win = 'show_def_price_list.tpl';	
	}elseif ($price_type=='o') {
		$main_win = 'show_opt_price_list.tpl';			
	}
	
}elseif($cmd=='s'){#Search
	$main_win = "search_cat.tpl";
	$footer = 'inc/footer_price.tpl';
	$catalog = new Catalog($db);
	$search = new Search($db);
	# Сохраняем строку поиска в сессию, для того, что бы потом не надо было ее таскать за собой
	if($search_str!=''){
		$search_str = htmlspecialchars($search_str);
		$_SESSION['search_string'] = $search_str;
	}
	if($search_cat and $search_cat!='-1'){
		header("Location: index.php?cmd=sg&cat_id=$search_cat");			
	}else{
		
#######################################################
# Получаем категории, которые содержат элементы поиска
#######################################################	
		$cat_list = $search->search_categories($search_str);
		$smarty->assign('search_str',$search_str);
	
#######################################################		
# Теперь надо получить id родительских категорий полученных категорий($cat_list), для того, что бы 
# от них построить дерево
#######################################################
		$parent_list = array();
		$search_tree= array();
		if(count($cat_list)>0){
			foreach($cat_list as $key=>$val){
				$temp_array = $catalog->get_parent_elements($key,$val);
				foreach ($temp_array as $cat_left=>$element){
					if(!array_key_exists($cat_left, $search_tree)){
						$search_tree[$cat_left] = $element;
					}
				}	
			}
		}
		# Сортируем массив по cat_left - что бы выстроить наше дерево как надо
		sort($search_tree);
	
		# Осталось только вывести наше дерево, вот так вот все просто 
		$smarty->assign("search_tree",$search_tree);
	}
	
}elseif ($cmd=='sg'){# Search goods - отображаем товары соответствующие критериям поиска
	/**
	 * Делаем проверку на то, стоит ли нам хранить в сессии значение $_SESSION[vendor_id]
	 * Ибо, возникают случаи когда он устанавливается в ходе каких то операций(например поиска)
	 * и затем влиял на работу других функций, поэтому логика у нас будет следующей:
	 * каждый раз при отображении товаров мы будем проверять параметры:
	 * если кроме cat_id ничего не приходит на вход, значит vendor_id не установлен и его надо
	 * "сбрасывать", если он был установлен
	 * Таким образом мы защитим наши фильтры(производитель, регионы, постраничный вывод) 
	 */
	
//	print "<br>vid:$vid<br>";
//	print "<br>rid:$rid<br>";
//	print "<br>pt:$pt<br>";
	//print "<br>cat_id:$cat_id<br>";
	if($cat_id and $vid=='' and $rid=='' and $pt=='' ){
		//print "<br>условие прошли<br>";
		$_SESSION['vendor_id'] = '';							
		$_SESSION['region_id'] = '';
		$_SESSION['price_type'] = 'r';
	}
	# вроде работает :)
	$catalog = new Catalog($db);
	$filter = new Filters($db, $smarty);

	#Получаем путь к категории для навигации
	$cat_path = $catalog->get_path($cat_id);
	$smarty->assign('cat_path',$cat_path);	
		
	$smarty->assign("search_str",htmlspecialchars($_SESSION['search_string']));
	
	if($_SESSION['price_type']=='r'){
		# Показываем розничный прайс для этой категории
		$main_win = 'search_rozn_price_list.tpl';
	}elseif($_SESSION['price_type']=='o'){
		# Показываем оптовый прайс для этой категории
		$main_win = 'search_opt_price_list.tpl';			
	}
	$footer = 'inc/footer_price.tpl';
	# Постраничный вывод
	# Получаем список товаров для указанной категории
	$goods = new Goods($db, $smarty, $pages_per_page, $cols_pages_in_block);
	# pg - номер страницы - page
	if(!$pg)$pg = 1;
	$smarty->assign('page',$pg);
	$positions = $goods->search_cat_goods($cat_id, $_SESSION['vendor_id'],$_SESSION['region_id'],$pg);
	$smarty->assign('positions',$positions);
		
	# Инициализация фильтра по производителям
	$filter->vendor_for_search($cat_id);
		
	# Инициализация фильтра по типу прайса(розница или опт)
	$filter->price_type($cat_id);

	# Инициализация фильтра по регионам
	$filter->region_for_search($cat_id);
	$smarty->assign('cat_id',$cat_id);
	/**
	 * Передаем переменные в шаблон, для того, что бы при переходе со страницы на страницу
	 * (постраничный вывод) мы не теряли vendor_id и region_id
	 */
	if($_SESSION['vendor_id']){
		$smarty->assign('vendor_id',$_SESSION['vendor_id']);
	}
	if($_SESSION['region_id']){
		$smarty->assign('region_id',$_SESSION['region_id']);
	}
	
	
}elseif($cmd=='about'){
	$main_win = "about.tpl";
	$footer = "inc/footer_index.tpl";
	
}elseif ($cmd=='order'){
	$main_win = "order.tpl";
	$footer = "inc/footer_index.tpl";	
}elseif ($cmd=='reg') {
	$main_win = "form_reg.tpl";
	$footer = "inc/footer_index.tpl";		
}elseif ($cmd=='srinfo'){
	$main_win = "reg_res.tpl";
	$footer = "inc/footer_index.tpl";			
	$register = new Register($db);
	
	if($register->is_company_exist($email)){
		$smarty->assign("user_exist",1);
		
	}else{
		$smarty->assign("user_exist",0);
		# Сохраняем в базу информацию о магазине для дальнейшей его регистрации
		/*
		$status - статус регистрируемой компании:
		0 - не подтвержденная регистрация
		1 - подтвержденная регистрация
		2 - статус проверенной и зарегистрированной компании
		3 - статус отклоненной регистрации
		*/
		$status = 0;# при заполнении формы стату всегда равен 0
		# теперь будем формировать наш ключ, для того что бы пользователь случайно или специально не смог активировать чужой емейл
		$key_array = array(	'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
							'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
							'1','2','3','4','5','6','7','8','9','0');
		for($i=0; $i<16; $i++){
			$reg_key .= $key_array[mt_rand(0,62)];
		}
		//print "reg_key:$reg_key<br>";
		$company_name = htmlspecialchars($company_name);
		$region_name = htmlspecialchars($region_name);
		$user_name = htmlspecialchars($user_name);
		$tel = htmlspecialchars($tel);
		$email = htmlspecialchars($email);
		$url = htmlspecialchars($url);
		$num_rows = htmlspecialchars($num_rows);
		
		
		$insert_id = $register->add($company_name, $region_name, $user_name, $tel_code, $tel, $email, $url, $num_rows, $reg_key, 0);
		//print "insert_id:$insert_id<br>";
		$headers .= "Content-type: text/html; charset=koi8-r\r\n";
		$headers .= "From: support@webcat.com.ua\r\n";
		$text .= "Название организации: $company_name<br>";	
		$text .= "Город: $region_name<br>";	
		$text .= "Контактное лицо: $user_name<br>";	
		$text .= "Телефон для контактов: +38($tel_code) $tel<br>";
		$text .= "Email: $email<br>";
		$text .= "Адрес сайта: $url<br>";	
    	$text .= "Предполагаемое кол-во прайс-строк: $num_rows<br>";
		$text = convert_cyr_string ($text,w,k);//Конвертация кодировки сообщения в koi8-r
    	mail("webcat@list.ru","Registration order",$text,$headers);	

		#Отправка запроса о подтверждении регистрации
		$text = "$user_name,<br>
		Это письмо отправлено с сайта <a href='http://webcat.com.ua' target='new'>http://webcat.com.ua</a>.<br>
		Вы получили это письмо, так как этот e-mail адрес был использован при регистрации.<br>
		Если Вы не регистрировались, просто проигнорируйте это письмо и Вы больше его не получите. <br><br>
	
		Благодарим за регистрацию.<br>
		Для подтверждения Вашей регистрации, Вам необходимо перейти по следующей ссылке <a href=\"http://webcat.com.ua?cmd=reg_ver&id=$insert_id&key=$reg_key\" target=\"new\">http://webcat.com.ua?cmd=reg_ver&id=$insert_id&key=$reg_key</a><br>
		Это необходимо для того, что бы удостовериться действительно ли Вы регистрировались. ";
	
		$text = convert_cyr_string ($text,w,k);//Конвертация кодировки сообщения в koi8-r
    	mail("$email",convert_cyr_string ("Подтверждение регистрации",w,k),$text,$headers);	
	}	
    	
}elseif($cmd=='reg_ver'){
	$main_win = "verification.tpl";
	$footer = "inc/footer_index.tpl";			
	$register = new Register($db);
	$is_ok = $register->confirm($id, $key);
	if($is_ok==1){
		$smarty->assign("reg_confirmed",1);
		$button_code =  htmlspecialchars("<a href='http://www.webcat.com.ua' target='new'><img src='http://www.webcat.com.ua/img/blue88x31.gif' width=88 height=31 alt='WebCatalog' border=0></a>");
		$smarty->assign("button_code",$button_code);		
	}elseif ($is_ok==2){
		$smarty->assign("reg_confirmed",2);		
	}else{
		$smarty->assign("reg_confirmed",0);
	}
}elseif($cmd=='adv'){
	header("Location: board.php");	

}elseif($cmd=='but'){
	$main_win = "buttons.tpl";
	$footer = "inc/footer_index.tpl";				

}else{
	$main_win = "default_page.tpl";
	$footer = "inc/footer_index.tpl";
	
	$catalog = new Catalog($db);
	$vendor = new Vendor($db);
	
	# Получаем каталог для главной страницы
	$cat_tree = $catalog->get_main_catalog();
	$smarty->assign("cat_tree",$cat_tree);
	if($er=='lf'){
		$smarty->assign("login_warn",1);
	}
}

$sellers = new load_sellers($db,$smarty);
$search = new Search($db);
	
#Получим массив категорий нижнего уровня для вывода в селект поиска
$bottom_level_cats = $sellers->get_all_bottom_level_categories();
//print_r($bottom_level_cats);
$smarty->assign("search_categories",$bottom_level_cats);
$smarty->assign('main_win',$main_win);
$smarty->assign('footer',$footer);

if($_SESSION['company_name']){
	$smarty->assign('company_name',$_SESSION['company_name']);
}
#########################################################
# Выводим значение таймера
#########################################################
$timer->stop();
$smarty->assign("timer",$timer->elapsed_time);

$smarty->assign("is_logged",$_SESSION['is_logged']);
$smarty->display('index.tpl');
//}
?>
