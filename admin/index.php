<?
if (($_SERVER['PHP_AUTH_USER']!="tiger" or $_SERVER['PHP_AUTH_PW']!="kondor")) {
    header("WWW-Authenticate: Basic realm=\"My Realm\"");
    header("HTTP/1.0 401 Unauthorized");
    echo "Логин или пароль введенный вами неверен\n";
    exit;
}else {
session_start();
//print_r($rename_categories);
//print "seller_id:".$_SESSION['seller_id'];
//print "----------------------------<br>";
$is_admin = 1;
require_once("../config.php");
require_once($path_lib_admin."/db/dbtree.php");
require_once($path_lib_admin."/db/database.php");
require_once($path_lib_admin."/PEAR/DB.php");
# подключение собственных классов 
require_once($path_lib_admin."/classes/admin/show_stat.php");
require_once($path_lib_admin."/classes/admin/load_sellers.php");
require_once($path_lib_admin."/classes/admin/get_seller_info.php");
require_once($path_lib_admin."/classes/admin/pricer.php");
require_once($path_lib_admin."/classes/Catalog.php");
require_once($path_lib_admin."/classes/Vendor.php");
require_once($path_lib_admin."/classes/Model.php");
require_once($path_lib_admin."/classes/Goods.php");
require_once($path_lib_admin."/classes/Seller.php");
require_once($path_lib_admin."/classes/User.php");
require_once($path_lib_admin."/classes/Region.php");
require_once($path_lib_admin."/classes/Stat.php");
require_once($path_lib_admin."/classes/Register.php");
require_once($path_lib_admin."/classes/Mailer.php");

#########################################################
### Инициализация шаблона                             ###
#########################################################
$smarty = new SmartyInit();
$smarty->template_dir =$path_template_admin."/admin/";
$smarty->compile_dir =$path_template_admin."/admin/templates_c";
#########################################################
#########################################################
### соединение с базой                                ###
#########################################################
$db =& DB::connect($dsn, $options); 
//$sql = "SHOW variables";
//$result = $db->query($sql); 
//	while ($row = $result->fetchrow(DB_FETCHMODE_ASSOC)){
//		print $row['Variable_name'].":".$row['Value']."<br>";
//	}
mysql_query("SET NAMES cp1251");
$tree = new CDBTree ($db, $table, "cat_id");
#########################################################
# Инициализация главного шаблона
$main_win = "default_page.tpl";
#########################################################
//print "cmd:$cmd";
#Самое начало работы - пока не введено никаких данных
if($cmd == '' or $cmd=='show_stat'){
	$stat = new Stat($db);
	$smarty->assign("company_num", $stat->get_company_num());
	$smarty->assign("active_company_num", $stat->get_active_company_num());
	$smarty->assign("all_rows_num", $stat->get_all_rows_num());

}elseif($cmd == 'change_status'){
	$seller = new Seller($db);
	$seller->change_status($id);
	header("Location:index.php?cmd=show_sellers");
	
}elseif($cmd == 'show_sellers'){
	
	$main_win = "sel_manage.htm";
	$sellers_info = new load_sellers($db, $smarty);
	#формирование самого списка переменных для шаблона лежит внутри класса load_sellers
	$smarty = $sellers_info->get_list();
	
}elseif($cmd == 'edit_seller'){
	if($id!=''){
		$_SESSION['seller_id'] = $id;
	}
	$main_win = "edit_seller.htm";

	#получаем данные продавца
	$seller = new load_sellers($db,$smarty,$_SESSION['seller_id']);
	$smarty = $seller->get_seller();
	
		
}elseif($cmd == 'seller_profile'){
	
	$main_win = "seller_profile.tpl";
	$seller = new load_sellers($db,$smarty,$_SESSION['seller_id']);
	$smarty = $seller->get_seller();	
	
	$region = new Region($db);
	$region_list = $region->get_regions_list();
	$smarty->assign("region_list",$region_list);
	$smarty->assign("cmd",'update_seller');
	
}elseif($cmd == 'add_seller'){

		$main_win = "seller_profile.tpl";
		$smarty->assign("cmd",'save_seller');		
		//$sel_array = array('');
//		$smarty->assign("seller",$sel_array);		
		$smarty->assign("seller",'');		
		
		$region = new Region($db);
		$region_list = $region->get_regions_list();
		$smarty->assign("region_list",$region_list);
		
}elseif ($cmd =='save_seller'){

	$seller = new Seller($db);
	$user = new User($db);
	
	# Начинаем проверку на то существуют ли уже в базе такой производитель и пользователь 
	# с таким логином
	//print_r($seller_data);
	//print "email".$seller_data['email']."<br>";
	$is_user_exist = $user->is_user_exist($seller_data['email']);
	print "is_user_exist:$is_user_exist<br>";
	$is_seller_exist = $seller->is_seller_exist($seller_data['company_name']);
	print "is_seller_exist:$is_seller_exist<br>";
	if(!$is_user_exist and !$is_seller_exist){
		//print "kuku<br>";		
		$seller->add($seller_data);
		$user->add($seller_data['user_name'],$seller_data['email'],$seller_data['password']);
		header("Location: index.php?cmd=show_sellers");		
	}else{
		$main_win = "seller_profile.tpl";
		
		if($is_user_exist){
			$smarty->assign("login_exist",1);					
		}
		if($is_seller_exist){
			$smarty->assign("company_exist",1);					
		}
		$smarty->assign("seller",array(0 =>$seller_data));
//		print "<br>-------seller_data-----------<br>";
//		print_r($seller_data);
		$smarty->assign("cmd",'save_seller');

		$region = new Region($db);
		$region_list = $region->get_regions_list();
		$smarty->assign("region_list",$region_list);		
		
	}

}elseif ($cmd =='update_seller'){
	
	$seller = new Seller($db);
	$user = new User($db);
	$is_user_exist = $user->is_user_exist($seller_data['email']);
	$is_seller_exist = $seller->is_seller_exist($seller_data['company_name']);	
//	print "is_user_exist:$is_user_exist<br>";
	if(!$is_user_exist and !$is_seller_exist){
		$seller->update($seller_data);		
		header("Location: index.php?cmd=show_sellers");				
	}else{
		$main_win = "seller_profile.tpl";
		if($is_user_exist){
			$smarty->assign("login_exist",1);					
		}
		if($is_seller_exist){
			$smarty->assign("company_exist",1);					
		}
		$smarty->assign("seller",array(0 =>$seller_data));
		$smarty->assign("cmd",'update_seller');	

	}

}elseif ($cmd =='region'){
	
	$main_win = 'regions.tpl';
	
	$region = new Region($db);
	$region_list = $region->get_regions_list();

	$smarty->assign("seller_id",$_SESSION['seller_id']);
	$smarty->assign("region_list",$region_list);
	
	#Редактирование название региона
	if($region_id){
		$smarty->assign("region_id",$region_id);				
	}
	if($_SESSION['seller_id']){
		$smarty->assign("show_link_seller_back",1);
	}

}elseif ($cmd =='update_region'){
	
	$region = new Region($db);
	//print "region id:$region_id<br>region_name:$region_name<br>";
	$region->update_region_name($region_id,$region_name);
	
	header("Location: index.php?cmd=region");	
	
}elseif ($cmd =='add_region'){
	
	$main_win = 'add_region.tpl';	
	
}elseif ($cmd =='insert_region'){
	
	$region = new Region($db);
	$region->add($region_name);
	
	header("Location: index.php?cmd=region");	
	
}elseif ($cmd =='del_region'){

	$region = new Region($db);
	$region->del($region_id);

	header("Location: index.php?cmd=region");	

}elseif ($cmd =='del_seller'){

	$seller = new Seller($db);
	$seller->del($id);

	$user = new User($db);
	$user->del($id);	
	
	header("Location: index.php?cmd=show_sellers");	

}elseif ($cmd =='edit_cat'){
	header("Location: cat_manager.php");			

}elseif ($cmd =='edit_board_cat'){
	header("Location: board_cat_manager.php");			

}elseif($cmd=='seller_import'){
	$main_win = 'seller_import.tpl';
	$smarty->assign('seller_id',$id);

}elseif($cmd=='load_price'){
	$_SESSION['column_separator'] = $separator;
	
	$main_win = "cat_selection.tpl";

	################################################################################
	###Загрузка файла прайса и вывод на экран
	################################################################################	
	#подключаем класс обработки прайсов
	//print "seller_id:".$_SESSION['seller_id']."<br>";
	$pricer = new Pricer($db,$smarty,$uploaddir_admin);
	
	#загружаем файл на сервер
	$pricer->upload_price();

	#обработка прайса
	$final_price = $pricer->price_parser();
	//print_r($final_price);
	#получаем кол-во колонок в прайсе
	$num_col = count($final_price[0]);
	print "num_col:$num_col<br>";
	if($num_col>1){
		$smarty->assign("num_col",$num_col);
		$smarty->assign("i",1);
		$smarty->assign("final_price",$final_price);	
	}else{
		$smarty->assign("num_err",1);
	}
	$smarty->assign("separator",$separator);		

}elseif($cmd=='chane_columns'){
	$main_win = 'status_load.tpl';	
	#обработка прайса
	$pricer = new Pricer($db,$smarty,$uploaddir_admin);
	$final_price = $pricer->price_parser();	
//print_r($final_price);
	#получаем кол-во колонок в прайсе
	$num_col = count($final_price[0]);
	$smarty->assign("num_col",$num_col);
	
	#передаем основной массив прайса в шаблон
	$smarty->assign("final_price",$final_price);		

	#вызываем функцию проверки селектора 
	$verification = $pricer->price_verification($column, $rename_categories);
	# Если проверка прошла, то импортируем в базу
	if($verification){

		$main_win = "import_results.tpl";
	
		#Подгружаем наш файл с прайсом
		$pricer = new Pricer($db,$smarty,$uploaddir_admin);
		$pricer->import_price($column,$rename_categories);
	}
	
}elseif($cmd=="insert_price"){
	$main_win = "import_results.tpl";
	
	#Подгружаем наш файл с прайсом
	$pricer = new Pricer($db,$smarty,$uploaddir_admin);
	$pricer->import_price($column,$rename_categories);

}elseif($cmd=='seller_price'){
	$seller = new load_sellers($db,$smarty,$seller_id);	

	if($cat_id){
		$main_win = 'show_price_rows.tpl';
		$seller->get_rows_list($cat_id);		
		
	}else{
		$main_win = 'show_price_cats.tpl';
		$bottom_categories = $seller->get_bottom_level_categories();
		$smarty->assign("bottom_categories",$bottom_categories);
	}
}elseif($cmd=='edit_position'){
		$seller = new load_sellers($db,$smarty,$seller_id);	

		$main_win = 'edit_price_rows.tpl';	
		$seller->get_rows_list($cat_id);
		$smarty->assign("edit_position_id",$gid);		

}elseif ($cmd=='del_position') {

	$goods = new Goods($db);
	$goods->del_good($gid);
	header("Location: index.php?cmd=seller_price&cat_id=$cat_id");	

}elseif ($cmd=='add_position') {
	$main_win = "add_price_pos.tpl";
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
	header("Location: index.php?cmd=seller_price&cat_id=$cat_id");								

}elseif ($cmd=='update_price_row') {

	$goods = new Goods($db);
	$goods->update_good($gid, $price_ua, $price_usd, $price_opt_ua, $price_opt_usd, $guarantee, $presence);
	header("Location: index.php?cmd=seller_price&cat_id=$cat_id");	

}elseif ($cmd=='reg_list'){
	$main_win = 'reg_list.tpl';
	$register = new Register($db);
	# по умолчанию показываем список подтвержденных регистрацийы
	if(!isset($status)){
		$status = 1;		
	}
	$smarty->assign("status",$status);			
	$reg_list = $register->get_list($status);
	$smarty->assign("list",$reg_list);		
	
}elseif ($cmd=='show_reg_company'){
	$main_win = 'reg_company_data.tpl';
	
	$region = new Region($db);
	$region_list = $region->get_regions_list();
	$smarty->assign("region_list",$region_list);
	
	$register = new Register($db);
	$data = $register->get_company($id);
	$smarty->assign("data",$data);		

}elseif ($cmd=='reg_decision'){
	print "type:$type<br>";
	print "region_id:$region_id<br>";
	$register = new Register($db);
	
	if($type=='register'){
		/**
	 	* Здесь мы должны: 
	 	* - сгенерировать пароль
	 	* - скопировать информацию о компании в таблицы sellers и users,
	 	* - поменять статус на "2" или "3"
	 	* - выслать письмо с уведомлении о добавлении в каталог и логином и паролем для доступа
	 	*/
		$register->register($id, $region_id);		
	}elseif ($type=='decline'){
		
	}
}elseif ($cmd=='del_reg_company'){
	$register = new Register($db);
	$data = $register->del_company($id);	
	header("Location: index.php?cmd=reg_list");		
	
}elseif ($cmd=='vendors_goods'){
	$main_win = 'vendors_goods.tpl';
	$catalog_obj = new Catalog($db, $smarty);
	$catalog_all = $catalog_obj->get_catalog_all();
	$smarty->assign("catalog",$catalog_all);		

}elseif ($cmd=='show_vendors'){
	$main_win = 'show_vendors.tpl';
	$vendor = new Vendor($db);
	$catalog = new Catalog($db,$smarty);
	
	$vendor_list = $vendor->get_vendor_list($cat_id);
	$smarty->assign("vendor_list",$vendor_list);

	$cat_data = $catalog->get_category($cat_id);
	$smarty->assign("cat_data",$cat_data);
	
	#Редактирование производителя
	if($vid){
		$smarty->assign("vendor_id",$vid);				
	}

}elseif ($cmd=='update_vendor'){
	$vendor = new Vendor($db);
	$vendor->rename($vendor_id, $vendor_name);	
	header("Location: index.php?cmd=show_vendors&cat_id=$cat_id");	

}elseif ($cmd=='add_vendor'){
	$main_win = 'add_vendor.tpl';
	$smarty->assign("cat_id",$cat_id);					

}elseif ($cmd=='insert_vendor'){
	$vendor = new Vendor($db);
	$vendor->add($cat_id, $vendor_name);	
	header("Location: index.php?cmd=show_vendors&cat_id=$cat_id");	

}elseif ($cmd=='del_vendor'){
	$vendor = new Vendor($db);
	$vendor->delete($vid);	
	
	$goods = new Goods($db);
	$num_deleted_goods = $goods->del_vendor_goods($cat_id,$vid);
	$smarty->assign("num_deleted_goods",$num_deleted_goods);
		
	$main_win = 'show_vendors.tpl';
	$catalog = new Catalog($db,$smarty);
	
	$vendor_list = $vendor->get_vendor_list($cat_id);
	$smarty->assign("vendor_list",$vendor_list);

	$cat_data = $catalog->get_category($cat_id);
	$smarty->assign("cat_data",$cat_data);
	$smarty->assign("cmd","del_vendor");
	

}elseif ($cmd=='transfer_vendor'){
#########################################################
# Перенос производителя. Для этого необходимо 
# 1. Зафиксировать факт переноса производителя в таблице vendor_transfer
# 	1.1 Проверить есть ли в vendors_transfer запись о переносимом вендоре, если есть, удалить ее 
# 		и записать новую информацию.
# 	1.2 Если нет упоминания просто записать информацию о переносе
# 2. Изменить vendor_id у товаров в таблице goods
# 3. Изменить vendor_id у моделей из таблицы models если они были введены
# 4. Удалить категории предназначенные для переноса
#########################################################
	$main_win = 'show_vendors.tpl';
	$vendor = new Vendor($db);
	$catalog = new Catalog($db,$smarty);
	
#########################################################
# Обрабатываем входные данные
# На входе у нас массив transfer с идентификаторами производителей, которых мы хотим перенести
# Надо получить имена этих производителей и сверить их с содержимым колонки transfer_name таблицы vendor_transfer
#########################################################	
# Получаем имя производителя в которого будем переносить
#########################################################	
	$sql = "SELECT vendor_name FROM vendors WHERE id=$to_vendor_id";
	$result = $db->query($sql);
	while ($row = $result->fetchrow(DB_FETCHMODE_ASSOC)){
		$to_vendor_name = $row['vendor_name'];
	}		
#########################################################		
# Получаем имя переносимого производителя и формируем массив данных для переноса
#########################################################	
	$transfer_data = array();
	foreach($transfer as $vendor_id){
		$sql = "SELECT vendor_name FROM vendors WHERE id=$vendor_id";
		$result = $db->query($sql);
		while ($row = $result->fetchrow(DB_FETCHMODE_ASSOC)){
			$transfer_data[] = array(	"vendor_id" 	=> $to_vendor_id,
										"original_name" => $to_vendor_name,
										"transfer_name" =>	$row['vendor_name'],
										"transfer_id" 	=> $vendor_id);
		}
	}
#########################################################			
# Начинаем проверку в таблице vendor_transfer и делаем запись в таблицу vendor_transfer
#########################################################		
	foreach ($transfer_data as $tv){
		//print "<br>transfer_name:".$tv['transfer_name'];
		$sql = "SELECT * FROM vendor_transfer WHERE transfer_name='".$tv['transfer_name']."'";
		$is_exist_transfer_name = $vendor->is_exist_transfer_name($sql);
		
		if($is_exist_transfer_name){
			$vendor->delete_transfer_row($tv['transfer_name']);
		}
		#делаем запись в таблицу vendor_transfer
		$vendor->add_transfer_row($tv);
	}
#########################################################			
# Пункт 2 - получаем список товаров ссылающихся на переносимого производителя и заменяем их vendor_id на id нового 
# производителя
#########################################################			
	foreach ($transfer as $vendor_id){
		$sql = "UPDATE goods SET vendor_id=$to_vendor_id WHERE cat_id = $cat_id AND vendor_id=$vendor_id";
		$res = $db->query($sql);
		if(!$res)print "<br>SQL Error in: $sql";
	}
#########################################################			
# Пункт 3 - заменяеи идентификаторы у моделей из таблицы models
#########################################################			
	foreach ($transfer as $vendor_id){
		$sql = "UPDATE models SET vendor_id=$to_vendor_id WHERE cat_id = $cat_id AND vendor_id=$vendor_id";
		$res = $db->query($sql);
		if(!$res)print "<br>SQL Error in: $sql";
	}	
#########################################################			
# Пункт 4 - удаление производителя предназначенного для переноса
#########################################################			
	foreach ($transfer as $vendor_id){
		$vendor->delete($vendor_id);
	}
#########################################################			
# Выводим список производителей на экран
#########################################################			
	$vendor_list = $vendor->get_vendor_list($cat_id);
	$smarty->assign("vendor_list",$vendor_list);

	$cat_data = $catalog->get_category($cat_id);
	$smarty->assign("cat_data",$cat_data);

}elseif ($cmd=='show_models'){
	
	$main_win = 'show_models.tpl';
	$vendor = new Vendor($db);
	$catalog = new Catalog($db,$smarty);
	$model = new Model($db);
	
	$vendor_data = $vendor->get_vendor($vid);
	$smarty->assign("vendor",$vendor_data);
	$model_list = $model->get_model_list($cat_id,$vid);
	$smarty->assign("model_list",$model_list);

	$cat_data = $catalog->get_category($cat_id);
	$smarty->assign("cat_data",$cat_data);
	
#########################################################		
# Редактирование производителя
#########################################################			
	if($model_id){
		$smarty->assign("model_id",$model_id);				
	}
}elseif ($cmd=='add_model'){
	$main_win = 'add_model.tpl';
	$smarty->assign("cat_id",$cat_id);					
	$smarty->assign("vendor_id",$vendor_id);						

}elseif ($cmd=='insert_model'){
	$vendor = new Model($db);
	$vendor->add($cat_id, $vendor_id, $model_name);	
	header("Location: index.php?cmd=show_models&cat_id=$cat_id&vendor_id=$vendor_id");	

}elseif ($cmd=='del_model'){
	$vendor = new Model($db);
	$vendor->delete($model_id);	
	header("Location: index.php?cmd=show_models&cat_id=$cat_id&vendor_id=$vendor_id");	

}elseif ($cmd=='update_model'){
	$model = new Model($db);
	$model->rename($model_id, $model_name);	
	header("Location: index.php?cmd=show_models&cat_id=$cat_id&vendor_id=$vendor_id");	

}elseif ($cmd=='transfer_model'){
#########################################################
# Перенос модели. Для этого необходимо 
# 1. Зафиксировать факт переноса модели в таблице model_transfer
# 	1.1 Проверить есть ли в model_transfer запись о переносимой модели, если есть, удалить ее 
# 		и записать новую информацию.
# 	1.2 Если нет упоминания просто записать информацию о переносе
# 2. Удалить модели предназначенные для переноса
#########################################################
	$main_win = 'show_models.tpl';
	$vendor = new Vendor($db);
	$catalog = new Catalog($db,$smarty);
	$model = new Model($db);
	
#########################################################
# Обрабатываем входные данные
# На входе у нас массив transfer с идентификаторами производителей, которых мы хотим перенести
# Надо получить имена этих производителей и сверить их с содержимым колонки transfer_name таблицы vendor_transfer
#########################################################	
# Получаем имя модели в которую будем переносить
#########################################################	
	$sql = "SELECT name FROM models WHERE id=$to_model_id";
	$result = $db->query($sql);
	while ($row = $result->fetchrow(DB_FETCHMODE_ASSOC)){
		$to_model_name = $row['name'];
	}		
#########################################################		
# Получаем имя переносимой модели и формируем массив данных для переноса
#########################################################	
	$transfer_data = array();
	foreach($transfer as $from_model_id){
		$sql = "SELECT * FROM models WHERE id=$from_model_id";
		//print $sql;
		$result = $db->query($sql);
		while ($row = $result->fetchrow(DB_FETCHMODE_ASSOC)){
			$transfer_data[] = array(	"model_id" 		=> $to_model_id,
										"cat_id"		=> $row['cat_id'],
										"vendor_id"		=> $row['vendor_id'],
										"original_name" => $to_model_name,
										"transfer_name" => $row['name'],
										"transfer_id" 	=> $from_model_id);
		}
	}

#########################################################			
# Начинаем проверку в таблице model_transfer и делаем запись в таблицу model_transfer
#########################################################		
	foreach ($transfer_data as $td){
		//print "<br>transfer_name:".$tv['transfer_name'];
		$sql = "SELECT * FROM model_transfer WHERE transfer_name='".$td['transfer_name']."'";
		$is_exist_transfer_name = $model->is_exist_transfer_name($sql);
		
		if($is_exist_transfer_name){
			$model->delete_transfer_row($td['transfer_name']);
		}
		#делаем запись в таблицу vendor_transfer
		$model->add_transfer_row($td);
	}
#########################################################			
# Пункт 2 - удаление производителя предназначенного для переноса
#########################################################			
	foreach ($transfer as $vendor_tr_id){
		$model->delete($vendor_tr_id);
	}
#########################################################			
# Выводим список производителей на экран
#########################################################			

	$model_list = $model->get_model_list($cat_id, $vendor_id);
	$smarty->assign("model_list",$model_list);
	
	$cat_data = $catalog->get_category($cat_id);
	$smarty->assign("cat_data",$cat_data);

	//print "<br>vendor_id:$vendor_id<br>";
	$vendor_data = $vendor->get_vendor($vendor_id);
	$smarty->assign("vendor",$vendor_data);
}elseif ($cmd==edit_curs){
	$main_win = "edit_curs.tpl";
	# Надо получить значение курса
	$seller = new Seller($db);
	# Передаем значение курса в шаблон для правки
	$smarty->assign("usd_to_uah",$seller->get_def_curs());
}elseif ($cmd==save_curs){
	$seller = new Seller($db);
	$seller->set_def_curs($curc_usd_to_uah);	
	header("Location:index.php");	
}elseif ($cmd==mailer){
	$main_win = "show_mail_list.tpl";	
	$mailer = new Mailer($db);
	$smarty->assign("mail_list",$mailer->get_list());

}elseif ($cmd==add_mail){
	$main_win = "add_mail.tpl";		

}elseif ($cmd==save_mail){
	//print_r($mail);
	$mailer = new Mailer($db);
	$mailer->save_mail($mail);
	@header("Location:index.php?cmd=mailer");		

}elseif ($cmd==del_mail){
	$mailer = new Mailer($db);
	$mailer->del_mail($id);
	header("Location:index.php?cmd=mailer");			

}elseif ($cmd==edit_mail){
	$main_win = "show_mail_list.tpl";
	$mailer = new Mailer($db);
	$smarty->assign("mail_list",$mailer->get_list());	
	$smarty->assign("mail_id",$id);

}elseif ($cmd==update_mail){
	//print_r($mail_data);
	$main_win = "show_mail_list.tpl";	
	$mailer = new Mailer($db);
	/**
	 * Грузим строку полученную по $id
	 */
	$mailer->update_mail($mail_data);	
	
	$smarty->assign("mail_list",$mailer->get_list());	
}

$smarty->assign("main_win",$main_win);
$smarty->display('index.htm');
}
?>