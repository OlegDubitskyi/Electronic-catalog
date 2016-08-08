<?
session_start();
error_reporting(1);
#########################################################
# Иниализация $pt - флага типа прайса(розничного или оптового)
#########################################################
if($pt){
	$_SESSION['price_type'] = $pt;
}else{
	if($_SESSION['price_type']){
		$pt = $_SESSION['price_type'];
	}else{
		$_SESSION['price_type'] = 'r';
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
require_once($path_lib."/classes/Seller.php");
require_once($path_lib."/classes/User.php");
require_once($path_lib."/classes/Stat.php");
require_once($path_lib."/classes/timer.php");
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

if($cmd=='profile'){# показать профиль
	$main_win = 'company_profile.tpl';	
	$footer = 'inc/footer_price.tpl';
	
	//print $_SESSION['seller_id'];
	$seller = new load_sellers($db,$smarty,$_SESSION['seller_id']);
	$smarty = $seller->get_seller();		

	$region = new Region($db);
	$region_list = $region->get_regions_list();
	$smarty->assign("region_list",$region_list);	
	
}elseif($cmd=='update_seller'){

	$seller = new Seller($db);
	$user = new User($db);

	$is_user_exist = $user->is_user_exist($seller_data['email']);
	$is_seller_exist = $seller->is_seller_exist($seller_data['company_name']);	
	if(!$is_user_exist and !$is_seller_exist){
		$seller->update($seller_data);		
		header("Location: company_account.php?cmd=profile");				
	}else{
		$main_win = "company_profile.tpl";
		if($is_user_exist){
			$smarty->assign("login_exist",1);					
		}
		if($is_seller_exist){
			$smarty->assign("company_exist",1);					
		}
		$smarty->assign("seller",array(0 =>$seller_data));
	}

}elseif($cmd=='seller_price'){
#####################	
	
	$seller = new load_sellers($db,$smarty,$seller_id);	

	if($cat_id){
		$main_win = 'company_price_pos.tpl';
		$seller->get_rows_list($cat_id);		
		
	}else{
		$main_win = 'company_price_cats.tpl';
		$bottom_categories = $seller->get_bottom_level_categories();
		$smarty->assign("bottom_categories",$bottom_categories);
	}
	$footer = "inc/footer_price.tpl";
}elseif($cmd=='edit_position'){

	$seller = new load_sellers($db,$smarty,$seller_id);	
	$main_win = 'edit_price_rows.tpl';	
	$footer = "inc/footer_price.tpl";
	$seller->get_rows_list($cat_id);
	$smarty->assign("edit_position_id",$gid);		

}elseif ($cmd=='del_position') {

	$goods = new Goods($db);
	$goods->del_good($gid);
	header("Location: company_account.php?cmd=seller_price&cat_id=$cat_id");	

}elseif ($cmd=='add_position') {
	$main_win = "add_price_pos.tpl";
	$footer = "inc/footer_price.tpl";
	$catalog = new Catalog($db,$smarty);
	$vendor = new Vendor($db);
	
		
	$cat_data = $catalog->get_category($cat_id);
	$smarty->assign("cat_data",$cat_data);
	
	$vendor_list = $vendor->get_vendor_list($cat_id);
	$smarty->assign("vendor_list",$vendor_list);
	
	#нужен список производителей, который мы засунем в селект
	# нужно название категории в котоую будем добавлять товар
	
	
}elseif ($cmd=='insert_new_pos') {
	$goods = new Goods($db);
	$goods->add_new_position(	$cat_id,
								$vendor_id,
								$seller_id,
								$name,
								$description,
								$price_usd,
								$price_ua,
								$price_opt_usd,
								$price_opt_ua,
								$guarantee,
								$url,
								$presence);
	header("Location: company_account.php?cmd=seller_price&cat_id=$cat_id");								

}elseif ($cmd=='update_price_row') {

	$goods = new Goods($db);
	$goods->update_good($gid, $price_ua, $price_usd, $price_opt_ua, $price_opt_usd, $guarantee, $presence);
	header("Location: company_account.php?cmd=seller_price&cat_id=$cat_id");	

#####################	
	
}elseif($cmd=='exit'){
	unset($_SESSION['is_logged']);
	unset($_SESSION['seller_id']);
	unset($_SESSION['user_name']);
	unset($_SESSION['company_name']);

	header("Location: index.php");	
	
}elseif($cmd=='import'){
	$main_win = 'company_import.tpl';
	$footer = "inc/footer_price.tpl";
	$smarty->assign('seller_id',$id);

}elseif($cmd=='load_price'){
	$_SESSION['column_separator'] = $separator;
	
	$main_win = "cat_selection.tpl";
	$footer = "inc/footer_price.tpl";

	################################################################################
	###Загрузка файла прайса и вывод на экран
	################################################################################	
	#подключаем класс обработки прайсов
	$pricer = new Pricer($db,$smarty,$uploaddir,$_SESSION['seller_id']);
	
	#загружаем файл на сервер
	$pricer->upload_price();

	#обработка прайса
	$final_price = $pricer->price_parser();

	#получаем кол-во колонок в прайсе
	$num_col = count($final_price[0]);
	if($num_col>1){
		$smarty->assign("num_col",$num_col);
		$smarty->assign("i",1);
		$smarty->assign("final_price",$final_price);	
	}else{
		$smarty->assign("num_err",1);
	}
	//$smarty->assign("separator",$separator);		

}elseif($cmd=='chane_columns'){
	$main_win = 'status_load.tpl';	
	$footer = "inc/footer_price.tpl";
	
	#обработка прайса
	$pricer = new Pricer($db,$smarty,$uploaddir,$_SESSION['seller_id']);
	$final_price = $pricer->price_parser();	
//print_r($final_price);
	#получаем кол-во колонок в прайсе
	$num_col = count($final_price[0]);
	$smarty->assign("num_col",$num_col);
	
	#передаем основной массив прайса в шаблон
	$smarty->assign("final_price",$final_price);		

	#вызываем функцию проверки селектора 
	//print "HHHHHH<br>";
	/**
	 * Этот блок необходим тогда, когда на вход поступает категория с кавычкой в названии
	 * Интересная особенность смарти состоит в том, что он добавляет слэши и они каждый раз
	 * удваиваются, тем самым каждый раз меняется название элемента массива.
	 * Что бы этого избежать пришлось каждый раз раскавычивать строку.
	 */
	foreach ($rename_categories as $key=>$val){
		$new_array[stripslashes ($key)] = $val;
	}
	# Перезаписываем старый массив на новый, для того, что бы избежать дублирования ключей
	$rename_categories = $new_array;
	//print_r($rename_categories);
	
	$verification = $pricer->price_verification($column, $rename_categories);
	# Если проверка прошла, то импортируем в базу
	if($verification){

		$main_win = "import_results.tpl";
	
		#Подгружаем наш файл с прайсом
		$pricer = new Pricer($db,$smarty,$uploaddir,$_SESSION['seller_id']);
	//print_r($column);
		$pricer->import_price($column,$rename_categories);
	}
	
}elseif($cmd=="insert_price"){
	$main_win = "import_results.tpl";
	$footer = "inc/footer_price.tpl";
	#Подгружаем наш файл с прайсом
	$pricer = new Pricer($db,$smarty,$uploaddir,$_SESSION['seller_id']);
	$pricer->import_price($column,$rename_categories);

#########################################################
#Блок статистики
#########################################################
}elseif($cmd=="vt"){
	$main_win = "stat_visits_table.tpl";
	$footer = "inc/footer_price.tpl";
	$stat = new Stat($db);
	$smarty->assign("data",$stat->get_visits_today($_SESSION['seller_id']));
	$smarty->assign("stat_title","Переходы сегодня");
	
}elseif($cmd=="vy"){
	$main_win = "stat_visits_table.tpl";
	$footer = "inc/footer_price.tpl";
	$stat = new Stat($db);
	$smarty->assign("data",$stat->get_visits_yesterday($_SESSION['seller_id']));
	$smarty->assign("stat_title","Переходы вчера");
	
}elseif($cmd=="wv"){
	$main_win = "stat_visits_table.tpl";
	$footer = "inc/footer_price.tpl";
	$stat = new Stat($db);
	$smarty->assign("data",$stat->get_week_visits($_SESSION['seller_id']));
	$smarty->assign("stat_title","Переходы за неделю");
	
}elseif($cmd=="mv"){
	$main_win = "stat_visits_table.tpl";
	$footer = "inc/footer_price.tpl";
	$stat = new Stat($db);
	$smarty->assign("data",$stat->get_month_visits($_SESSION['seller_id']));
	$smarty->assign("stat_title","Переходы за месяц");
	
}elseif($cmd=="yv"){
	$main_win = "stat_visits_table.tpl";
	$footer = "inc/footer_price.tpl";
	$stat = new Stat($db);
	$smarty->assign("data",$stat->get_year_visits($_SESSION['seller_id']));
	$smarty->assign("stat_title","Переходы за год");
	
}elseif($cmd=="av"){
	$main_win = "stat_visits_table.tpl";
	$footer = "inc/footer_price.tpl";
	$stat = new Stat($db);
	$smarty->assign("data",$stat->get_all_visits($_SESSION['seller_id']));
	$smarty->assign("stat_title","Переходы за все время");
	
}elseif($cmd=="ht"){
	$main_win = "stat_hosts_table.tpl";
	$footer = "inc/footer_price.tpl";
	$stat = new Stat($db);
	$smarty->assign("data",$stat->get_hosts_today($_SESSION['seller_id']));
	$smarty->assign("stat_title","Хостов за сегодня");
	
}elseif($cmd=="hy"){

}elseif($cmd=="wh"){

}elseif($cmd=="mh"){

}elseif($cmd=="yh"){

}elseif($cmd=="ah"){

}else{
	if($_SESSION['seller_id'] and $_SESSION['user_id']){
//		print "seller_id:".$_SESSION['seller_id'];
//		print "user_name:".$_SESSION['user_name'];

		$main_win = "company_account.tpl";
		$footer = "inc/footer_price.tpl";
		$stat = new Stat($db);
		
		$company_num_rows = $stat->get_company_num_rows($_SESSION['seller_id']);
		$smarty->assign("company_num_rows",$company_num_rows);
		
		$visits_today = $stat->get_num_visits_today($_SESSION['seller_id']);
		$smarty->assign("visits_today",$visits_today);
		$hosts_today = $stat->get_num_hosts_today($_SESSION['seller_id']);
		$smarty->assign("hosts_today",$hosts_today);		
		
		
		$visits_yesterday = $stat->get_num_visits_yesterday($_SESSION['seller_id']);
		$smarty->assign("visits_yesterday",$visits_yesterday);
		$hosts_yesterday = $stat->get_num_hosts_yesterday($_SESSION['seller_id']);
		$smarty->assign("hosts_yesterday",$hosts_yesterday);
		
		$week_visits = $stat->get_num_week_visits($_SESSION['seller_id']);
		$smarty->assign("week_visits",$week_visits);
		$week_hosts = $stat->get_num_week_hosts($_SESSION['seller_id']);
		$smarty->assign("week_hosts",$week_hosts);		
		
		$month_visits = $stat->get_num_month_visits($_SESSION['seller_id']);
		$smarty->assign("month_visits",$month_visits);
		$month_hosts = $stat->get_num_month_hosts($_SESSION['seller_id']);
		$smarty->assign("month_hosts",$month_hosts);
		
		$year_visits = $stat->get_num_year_visits($_SESSION['seller_id']);
		$smarty->assign("year_visits",$year_visits);
		$year_hosts = $stat->get_num_year_hosts($_SESSION['seller_id']);
		$smarty->assign("year_hosts",$year_hosts);

		$all_visits = $stat->get_num_all_visits($_SESSION['seller_id']);
		$smarty->assign("all_visits",$all_visits);
		$all_hosts = $stat->get_num_all_hosts($_SESSION['seller_id']);
		$smarty->assign("all_hosts",$all_hosts);
		
	}else{

		$main_win = "forbidden.tpl";
		$footer = "inc/footer_index.tpl";
		
	}
}

$smarty->assign('user_name',$_SESSION['user_name']);
$smarty->assign('company_name',$company_name);	
#########################################################
# Выводим значение таймера
#########################################################
$timer->stop();
$smarty->assign("timer",$timer->elapsed_time);

$smarty->assign('main_win',$main_win);	
$smarty->assign('footer',$footer);
$smarty->display('index.tpl');

?>
