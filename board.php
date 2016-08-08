<?
error_reporting(1);
session_start();
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
# Иниализация $t - идентификатора производителя
# Сохраняем его в сессию для того, что бы сохранять настройки пользователя
#########################################################
if($t and $t!='-1'){
	$_SESSION['type'] = $t;
}elseif($t=='-1'){
	$_SESSION['type']='';
}else{
	if($_SESSION['type']){
		//$vid = $_SESSION['vendor_id'];
	}
}
#########################################################
require_once("config.php");
require_once($path_lib."/db/dbtree.php");
require_once($path_lib."/db/database.php");
require_once($path_lib."/PEAR/DB.php");
#подключение собственных классов 
require_once($path_lib."/classes/admin/pricer.php");
require_once($path_lib."/classes/admin/load_sellers.php");
require_once($path_lib."/classes/Board.php");
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

if($cmd=='login'){
	$board = new Board($db);
	$user_id = $board->authorize_user($_POST[login],$pas);
	if($user_id){
		$_SESSION['buser_is_logged'] = true;
		$_SESSION['uid']			 = $user_id;
		$_SESSION['login'] 			 = $login;
		
		header("Location: board.php");			
	}else {
		header("Location: board.php?er=lf");				
	}
	
}elseif($cmd=='register'){
	$main_win = "board/register.tpl";
	$footer = "inc/footer_price.tpl";
	
	$region = new Region($db);
	$region_list = $region->get_regions_list();
	$smarty->assign("region_list",$region_list);	
	$smarty->assign("user_data",1);			
}elseif($cmd=='add_user'){
	
	$board = new Board($db);
	# Начинаем проверку на то существуют ли уже в базе пользователь с таким логином и емейлом
	$is_user_email_exist = $board->is_user_email_exist($user_data['email']);

	$is_user_login_exist = $board->is_user_login_exist($user_data['login']);

	# Обработка ошибок существования емейла или логина
	if($is_user_email_exist or $is_user_login_exist){
		# Вывод сообщений об ошибке в шаблон
		if($is_user_email_exist and !$is_user_login_exist){
			$smarty->assign("email_error",1);			
		}elseif ($is_user_login_exist and !$is_user_email_exist){
			$smarty->assign("login_error",1);			
		}elseif($is_user_email_exist and $is_user_login_exist){
			$smarty->assign("email_error",1);
			$smarty->assign("login_error",1);						
		}
		$region = new Region($db);
		$region_list = $region->get_regions_list();
		$smarty->assign("region_list",$region_list);	
		
		$smarty->assign("user_data",array(0=>$user_data));		
		$main_win = "board/register.tpl";		
	}else{
		# Ошибки при добавлении пользователя нет - добавляем пользователя в базу
		$board->add_user($user_data);
		# Передача в шаблон необходимых переменных
		$smarty->assign("login",$user_data['login']);	
		$smarty->assign("email",$user_data['email']);	
		$main_win = "board/reg_result.tpl";	
			
	}
	$footer = "inc/footer_price.tpl";

	# Что делать если логин или пароль оказались неверными
}elseif ($cmd=='f_pas'){

	$main_win = "board/pas_recovery.tpl";
	$footer = "inc/footer_price.tpl";
	
	$smarty->assign("user_data",1);
		
}elseif($cmd=='recovery'){

	$main_win = "board/pas_recovery.tpl";
	$footer = "inc/footer_price.tpl";

	$board = new Board($db);	
	# Проверяем есть ли запрашиваемый пользователь в базе?
	$is_user_login_exist = $board->is_user_login_exist($user_data['login']);	
	# Если есть, устанавливаем флаг для шаблона
	if($is_user_login_exist){
		$smarty->assign("is_ok",1);			
		# и отправляем по почте потерянный пароль		
		$board->recovery_pas_mail($user_data['login']);
	# Если нет, даем знать об этом шаблону
	}else{
		$smarty->assign("is_ok",-1);					
	}

}elseif ($cmd=='uprof'){
	
	if($_SESSION['uid']){	
		$main_win = "board/user_profile.tpl";
		$footer = "inc/footer_price.tpl";	
	
		$board = new Board($db);	
		$user_profile = $board->get_user_profile();
//print_r($user_profile);
		if($user_profile){
			$smarty->assign("user_data",$user_profile);		
		}
		### Region block ###
		$region = new Region($db);
		$region_list = $region->get_regions_list();
		$smarty->assign("region_list",$region_list);		
		####################
	}else{
		$main_win = "board/forbidden.tpl";
		$footer = "inc/footer_price.tpl";		
	}
	
}elseif ($cmd=='update_user'){

	if($_SESSION['uid']){
		$board = new Board($db);
		# Делаем проверку при изменении профиля, есть появляется перекрестный емейл, 
		# тогда отказываем в апдейте? загружая профиль пользователя из базы

		if($board->is_email_already_exist($user_data['email'])){
		
			$smarty->assign("email_error",1);
		
			# Передаем профиль в шаблон
			$user_profile = $board->get_user_profile();
			$smarty->assign("user_data",$user_profile);				
		
			$main_win = "board/user_profile.tpl";
		}else{
			$board->update_user($user_data);
			$main_win = "board/saved_profile.tpl";		
		}
	}else{
		$main_win = "board/forbidden.tpl";
	}
	### Region block ###
	$region = new Region($db);
	$region_list = $region->get_regions_list();
	$smarty->assign("region_list",$region_list);		
	####################	
	$footer = "inc/footer_price.tpl";
			
}elseif ($cmd=='exit'){
	
	unset($_SESSION['buser_is_logged']);
	unset($_SESSION['uid']);
	unset($_SESSION['login']);
	header("Location: board.php");		
	
}elseif ($cmd=='add_advert'){
	if($_SESSION['uid']){	
		$main_win = "board/add_advert.tpl";
		$footer = "inc/footer_price.tpl";	
	
		$rand=rand();
		$smarty->assign("rand", $rand);

		# Мне необходимо получить профиль пользователя, для того, что бы заполнить форму
		$board = new Board($db);
		$user_profile = $board->get_user_profile();
		if($user_profile){
			$smarty->assign("user_data",$user_profile);		
		}	
	
		### Region block ###
		$region = new Region($db);
		$region_list = $region->get_regions_list();
		$smarty->assign("region_list",$region_list);		
		####################	
	}else{
		$main_win = "board/need_reg.tpl";
		$footer = "inc/footer_price.tpl";			
	}
	
}elseif($cmd=='save_advert'){
	
	$main_win = "board/add_advert_res.tpl";
	$footer = "inc/footer_price.tpl";
	
	$board = new Board($db);
	print_r($user_data);
	$board->add_advert($user_data);	
	
}elseif($cmd=='show_adverts'){

	if($cat_id and $t=='' and $rid==''){
		//print "<br>условие прошли<br>";
		$_SESSION['type'] 		= '';							
		$_SESSION['region_id'] 	= '';
	}
	
	/**
	 * Делаем проверку на то, стоит ли нам хранить в сессии значение $_SESSION[vendor_id]
	 * Ибо, возникают случаи когда он устанавливается в ходе каких то операций(например поиска)
	 * и затем влиял на работу других функций, поэтому логика у нас будет следующей:
	 * каждый раз при отображении товаров мы будем проверять параметры:
	 * если кроме cat_id ничего не приходит на вход, значит vendor_id не установлен и его надо
	 * "сбрасывать", если он был установлен
	 * Таким образом мы защитим наши фильтры(производитель, регионы, постраничный вывод) 
	 */
	
	if($search_str==''){
		$_SESSION['search_string'] = '';
	}

	$board = new Board($db);
	//$vendor = new Vendor($db);
	$filter = new Filters($db, $smarty);
	
	# Передаем в шаблон логин пользователя
	if($_SESSION['buser_is_logged']){
		$smarty->assign("login",$_SESSION['login']);
	}
	
	#Получаем путь к категории для навигации
	$cat_path = $board->get_path($cat_id);
	$smarty->assign('cat_path',$cat_path);	
	
	# Получаем все подкатегории для данной категории
	$subcatalog_data = $board->get_children($cat_id);
	#Если кол-во возвращаемых строк больше нуля, тогда показываем вложенные категории, если меньше,
	#то категория не содержит подкатегорий, показываем товары для данной категории
	if(count($subcatalog_data)){
		$main_win = 'board/show_scat_group.tpl';
		$footer = 'inc/footer_price.tpl';
		$smarty->assign("catalog",$subcatalog_data);		

	}else {

		$main_win = 'board/show_adverts.tpl';

		$footer = 'inc/footer_price.tpl';
		# Постраничный вывод
		# Получаем список товаров для указанной категории
		//$goods = new Goods($db,$smarty,$pages_per_page, $cols_pages_in_block);
		# pg - номер страницы - page
		if(!$pg)$pg = 1;
		$smarty->assign('page',$pg);
		$positions = $board->get_cat_mes($cat_id, $pg, $pages_per_page, $cols_pages_in_block, $smarty, $_SESSION['type'],$_SESSION['region_id']);
		$smarty->assign('positions',$positions);
		//print_r($positions);
		
		# Инициализация фильтра по регионам
		$filter->board_region($cat_id);

		# Инициализация фильтра по типам
		$filter->board_type($cat_id);		
		/**
	 	* Передаем переменные в шаблон, для того, что бы при переходе со страницы на страницу
	 	* (постраничный вывод) мы не теряли vendor_id и region_id
	 	*/
		//print "<br>type:".$_SESSION['type']."<br>";		
		
		if($_SESSION['type']){
			$smarty->assign('type',$_SESSION['type']);
		}
		if($_SESSION['region_id']){
			$smarty->assign('region_id',$_SESSION['region_id']);
		}
		$smarty->assign('cat_id',$cat_id);
	}
	
}else{
	$main_win = "board/board_default.tpl";
	$footer = "inc/footer_price.tpl";
	
	$board = new Board($db);

	# Получаем каталог для главной страницы
	$cat_tree = $board->get_main_catalog();
	$smarty->assign("cat_tree",$cat_tree);
	if($er=='lf'){
		$smarty->assign("login_warn",1);
	}
	# Передаем в шаблон логин пользователя
	if($_SESSION['buser_is_logged']){
		$smarty->assign("login",$_SESSION['login']);
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

$smarty->assign("buser_is_logged",$_SESSION['buser_is_logged']);
$smarty->display('index.tpl');

?>
