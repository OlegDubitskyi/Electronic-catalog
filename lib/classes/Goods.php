<?
class Goods{
	function __construct($db,$smarty='', $pages_per_page='',$cols_pages_in_block=''){
		$this->db = $db;
		$this->smarty = $smarty;
		$this->pages_per_page = $pages_per_page;
		# кол-во номеров строк в видимом блоке постраничного вывода
		$this->cols_pages_in_block = $cols_pages_in_block;
	}
	function get_cat_goods($cat_id, $vendor_id='',$region_id='',$pg){
		if($vendor_id){
			$vendor_sql = "AND g.vendor_id=$vendor_id";
		}else{
			$vendor_sql = "";
		}
		if(!$region_id or $region_id==-1){
			$region_sql = "";
		}else{
			$region_sql = "AND s.region_id=$region_id";
		}
		# Делаем проверку на непустые значения для пары цен, для  того что бы не выводить позиции с отсутствующими ценами
		if($_SESSION['price_type']=='r'){
			$sql_price_type = "AND (g.price_usd >0 or g.price_ua >0)";
			$sort_direct = "g.price_usd";
		}elseif($_SESSION['price_type']=='o'){
			$sql_price_type = "AND (g.price_opt_usd >0 or g.price_opt_ua >0)";
			$sort_direct = "g.price_opt_usd";
		}

		# Организация постраничного вывода
		$sql = "SELECT 	v.vendor_name,
						g.name, 
						g.description, 
						g.price_usd, 
						g.price_ua,
						g.price_opt_ua,
						g.price_opt_usd,
						g.guarantee,
						g.presence, 
						DATE_FORMAT(g.date_last_mod,'%d.%m') as insert_date,
						s.company_name,
						r.region_name 
				FROM 	goods g, 
						sellers s, 
						vendors v,
						region r
				WHERE 	g.cat_id=$cat_id $vendor_sql $region_sql 
						AND s.id=g.seller_id 
						AND g.vendor_id=v.id 
						AND s.region_id=r.id
						AND s.status=1
						$sql_price_type
						ORDER BY $sort_direct DESC";
		//print $sql;
		//print "<br>1---<br>";
		$res = mysql_query($sql);    	
		$num_rows = mysql_num_rows($res);		
		
		#col_of_pages - кол-во страниц товаров
    	$num_pages = ceil($num_rows/$this->pages_per_page);//кол-во страниц товаров при определенном $ppp;		

    	$this->smarty->assign("num_pages",$num_pages);
    	$this->smarty->assign("i",0);

    	#########################################################
    	#Реорганизуем постраничный вывод
    	#########################################################
		# Это необходимо для того что бы корректно выводить ссылку "Следующая" и вовремя останавливаться
    	$this->smarty->assign("num_pages",$num_pages);
    	$num_digits = $this->cols_pages_in_block;

    	# Вычисляю коэффициент показывающий в каком "десятке" находится выбранная страница
    	$temp_koef = floor($pg/($num_digits+1));

    	# Теперь сама формула
    	$first_el = $temp_koef*$num_digits+1;
    	//print "first:$first_el<br>";

    	# Граничиваю заднюю границу страниц, что бы постраничный блок не показывал больше страниц чем есть на самом деле
    	if($num_pages < (($temp_koef+1)*$num_digits) ){
    		$second_el = $num_pages;
    	}else{
    		$second_el = ($temp_koef+1)*$num_digits;
    	}
    	//print "second:$second_el<br>";
		//print "test";
    	# Заполняю массив страниц 	
    	for($i=$first_el;$i<=$second_el;$i++){
    		$page_array[] = $i;
    	}
    	//print_r($page_array);
    	# И передаю его в шаблон
    	$this->smarty->assign("page_array",$page_array);
		#########################################################
		
    	$L_limit = ($pg*$this->pages_per_page-$this->pages_per_page);//левый ограничитель для SQL запроса
        $R_limit = $this->pages_per_page;//правый ограничитель для SQL запроса
    			
		$sql = "SELECT 	v.vendor_name,
						g.id as gid,
						g.name, 
						g.description, 
						g.price_usd, 
						g.price_ua,
						g.price_opt_ua,
						g.price_opt_usd,
						g.guarantee,
						g.presence,
						r.region_name,
						s.tel_code1,  
						s.tel1,
						s.id as seller_id,  
						DATE_FORMAT(g.date_last_mod,'%d.%m') as insert_date,
						g.url,
						s.company_name 
				FROM 	goods g, 
						sellers s, 
						vendors v,
						region r
				WHERE 	g.cat_id=$cat_id $vendor_sql $region_sql 
						AND s.id=g.seller_id 
						AND g.vendor_id=v.id 
						AND s.region_id=r.id
						AND s.status=1
						$sql_price_type
						ORDER BY $sort_direct ASC LIMIT $L_limit,$R_limit";

		//print $sql;
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			if(!$row['guarantee']){
				$guarantee = "-";
			}else {
				$guarantee = $row['guarantee'];
			}			
			$positions[] = array(	"vendor_name"	=> $row['vendor_name'],
									"gid"			=> $row['gid'],
									"goods_name"	=> $row['name'],
									"description"	=> $row['description'],
									"price_usd"		=> $row['price_usd'],
									"price_ua"		=> $row['price_ua'],
									"price_opt_ua" 	=> $row['price_opt_ua'],
									"price_opt_usd" => $row['price_opt_usd'],
									"guarantee" 	=> $guarantee,
									"insert_date" 	=> $row['insert_date'],
									"url" 			=> $row['url'],
									"company_name" 	=> $row['company_name'],
									"presence"		=> $row['presence'],
									"tel_code1" 	=> $row['tel_code1'],
									"tel1" 			=> $row['tel1'],
									"region_name"	=> $row['region_name'],
									"seller_id"		=> $row['seller_id']);
		}

    	
		//print_r($positions);
		return $positions;
	}
	# Аналог функции Goods::get_cat_goods() только адаптированная под поиск, 
	# если так можно сказать :)
	# а так на самом деле можно сказать :)
	function search_cat_goods($cat_id, $vendor_id='', $region_id='', $pg){
		if($vendor_id){
			$vendor_sql = "AND g.vendor_id=$vendor_id";
		}else{
			$vendor_sql = "";
		}
		if(!$region_id or $region_id==-1){
			$region_sql = "";
		}else{
			$region_sql = "AND s.region_id=$region_id";
		}
		# Делаем проверку на непустые значения для пары цен, для  того что бы не выводить позиции с отсутствующими ценами
		if($_SESSION['price_type']=='r'){
			$sql_price_type = "AND (g.price_usd >0 or g.price_ua >0)";
			$sort_direct = "g.price_usd";
		}elseif($_SESSION['price_type']=='o'){
			$sql_price_type = "AND (g.price_opt_usd >0 or g.price_opt_ua >0)";
			$sort_direct = "g.price_opt_usd";
		}
		
		$search_str = $_SESSION['search_string'];		
		# Разбиваем строку запроса на составляющие
		$temp = split(' ',$search_str);
		
		# Получаем категории, которые содержат элементы поиска
		foreach ($temp as $val){
			$search .= "AND (g.name LIKE '%$val%' OR v.vendor_name LIKE '%$val%' OR g.description LIKE '%$val%')";
		}
		$sql = "SELECT 	v.vendor_name,
						g.name,
						g.description,
						g.price_usd, 
						g.price_ua,
						g.price_opt_ua,
						g.price_opt_usd,
						g.guarantee,
						g.presence,
						r.region_name,
						s.tel_code1,  
						s.tel1,  
						DATE_FORMAT(g.date_last_mod,'%d.%m') as insert_date,
						s.company_name 						
				FROM 	goods g,
						sellers s, 
						vendors v, 
						region r,
						catalog c
				WHERE 	g.cat_id=$cat_id $vendor_sql $region_sql
						AND g.vendor_id = v.id 
						AND g.cat_id = c.cat_id
						AND s.id=g.seller_id 
						AND s.region_id=r.id
						$search
						$sql_price_type
        				ORDER BY g.name";
		
		
//		$sql = "SELECT 	g.cat_id, 
//						v.vendor_name, 
//						g.name
//				FROM 	vendors v, 
//						goods g, 
//						catalog c, 
//						region r,
//						sellers s
//				WHERE 	g.vendor_id = v.id 
//						AND g.cat_id = c.cat_id
//						AND g.cat_id=$cat_id
//						AND s.region_id=r.id
//						$search
//						$vendor_sql 
//						$region_sql";
		//print $sql."<br>";
		$res = mysql_query($sql);    	
		$num_rows = mysql_num_rows($res);		
		//print "num_rows:$num_rows<br>";
		
		#col_of_pages - кол-во страниц товаров
    	$num_pages = ceil($num_rows/$this->pages_per_page);//кол-во страниц товаров при определенном $ppp;		
    	//print "num_pages:$num_pages<br>";
    	$this->smarty->assign("num_pages",$num_pages);
    	$this->smarty->assign("i",0);
    	
    	#########################################################
    	#Реорганизуем постраничный вывод
    	#########################################################
		# Это необходимо для того что бы корректно выводить ссылку "Следующая" и вовремя останавливаться
    	$this->smarty->assign("num_pages",$num_pages);
    	$num_digits = $this->cols_pages_in_block;

    	# Вычисляю коэффициент показывающий в каком "десятке" находится выбранная страница
    	$temp_koef = floor($pg/($num_digits+1));

    	# Теперь сама формула
    	$first_el = $temp_koef*$num_digits+1;

    	# Граничиваю заднюю границу страниц, что бы постраничный блок не показывал больше страниц чем есть на самом деле
    	if($num_pages < (($temp_koef+1)*$num_digits) ){
    		$second_el = $num_pages;
    	}else{
    		$second_el = ($temp_koef+1)*$num_digits;
    	}
		
    	# Заполняю массив страниц 	
    	for($i=$first_el;$i<=$second_el;$i++){
    		$page_array[] = $i;
    	}
    	# И передаю его в шаблон
    	$this->smarty->assign("page_array",$page_array);
		#########################################################    	
    	
    	//print "<br>pge:$pg";
    	$L_limit = ($pg*$this->pages_per_page-$this->pages_per_page);//левый ограничитель для SQL запроса
        $R_limit = $this->pages_per_page;//правый ограничитель для SQL запроса
		
		$sql = "SELECT 	v.vendor_name,
						g.id as gid,
						g.name,
						g.description,
						g.price_usd, 
						g.price_ua,
						g.price_opt_ua,
						g.price_opt_usd,
						g.guarantee,
						g.presence,
						r.region_name,
						s.tel_code1,  
						s.tel1,
						s.id as seller_id,  
						DATE_FORMAT(g.date_last_mod,'%d.%m') as insert_date,
						g.url,
						s.company_name 						
				FROM 	goods g,
						sellers s, 
						vendors v, 
						region r,
						catalog c
				WHERE 	g.cat_id=$cat_id $vendor_sql $region_sql
						AND g.vendor_id = v.id 
						AND g.cat_id = c.cat_id
						AND s.id=g.seller_id 
						AND s.region_id=r.id
						$search
						$sql_price_type
        				ORDER BY $sort_direct ASC LIMIT $L_limit,$R_limit";
		//print $sql;
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			if(!$row['guarantee']){
				$guarantee = "-";
			}else {
				$guarantee = $row['guarantee'];
			}						
			$positions[] = array(	"vendor_name"	=> $row['vendor_name'],
									"gid"			=> $row['gid'],
									"goods_name"	=> $row['name'],
									"description"	=> $row['description'],
									"price_usd"		=> $row['price_usd'],
									"price_ua"		=> $row['price_ua'],
									"price_opt_ua" 	=> $row['price_opt_ua'],
									"price_opt_usd" => $row['price_opt_usd'],
									"guarantee" 	=> $guarantee,
									"insert_date" 	=> $row['insert_date'],
									"url" 			=> $row['url'],
									"company_name" 	=> $row['company_name'],
									"presence"		=> $row['presence'],
									"tel_code1" 	=> $row['tel_code1'],
									"tel1" 			=> $row['tel1'],
									"region_name"	=> $row['region_name'],
									"seller_id"		=> $row['seller_id']);
		}		
		return $positions;
		
	}		
	
	
	
	
	function update_good($gid, $price_ua, $price_usd, $price_opt_ua, $price_opt_usd, $guarantee, $presence){
		# делаем обработку входящих текстовых полей:
		# гарантия
		# наличие
		$guarantee = preg_replace('/\D*/','',$guarantee);
		if($guarantee==''){
			$guarantee=0;
		}
		$presence = htmlspecialchars($presence);
	
		$sql = "UPDATE goods SET 	price_ua=$price_ua, 
									price_usd=$price_usd, 
									price_opt_ua=$price_opt_ua, 
									price_opt_usd=$price_opt_usd,
									guarantee=$guarantee,
									presence='$presence'
							WHERE 	id=$gid";
		//print $sql;
		$res = $this->db->query($sql);			
		if(!$res)print "Error in SQL query:$sql";		
	}
	function del_good($gid){
		
		$sql = "DELETE FROM goods WHERE id=$gid";
		$res = $this->db->query($sql);			
		if(!$res)print "Error in SQL query:$sql";		
	}
	function del_vendor_goods($cat_id, $vid){
		
		$sql = "DELETE FROM goods WHERE cat_id=$cat_id AND vendor_id=$vid";
		print "sql:$sql<br>";
		$res = mysql_query($sql);			
		if(!$res)print "Error in SQL query:$sql";				
		#Возвращаем кол-во удаленных строк
		$num_rows = mysql_affected_rows();		
		print "num_rows:$num_rows<br>";
		return $num_rows;
	}	
	
	
	function del_seller_goods($seller_id){
		
		$sql = "DELETE FROM goods WHERE seller_id =$seller_id";
		$res = $this->db->query($sql);			
		if(!$res)print "Error in SQL query:$sql";		
	}
	
	function add_new_position($cat_id, $vendor_id, $seller_id, $gname, $desc, $price_usd, $price_ua, $price_opt_usd, $price_opt_ua , $guarantee, $url,$presence){
		# делаем обработку входящих текстовых полей:
		# наименование, описание, гарантия наличие, 
		
		$guarantee = preg_replace('/\D*/','',$guarantee);
		if(!$guarantee){
			$guarantee = 0;
		}
		//$name = htmlspecialchars($name);
		//$desc = htmlspecialchars($desc);
		//$presence = htmlspecialchars($presence);
		
		$url = str_replace('http://', '', $url);
		//$url = htmlspecialchars($url);
		
		$sql = "INSERT INTO goods(	cat_id,
									vendor_id,
									seller_id,
									name,
									description,
									price_ua,
									price_usd,
									price_opt_ua,
									price_opt_usd,
									guarantee,
									date_last_mod,
									URL,
									presence)
							VALUES(	'$cat_id',
									'$vendor_id',
									'$seller_id',
									'$gname',
									'$desc',
									'$price_ua',
									'$price_usd',
									'$price_opt_ua',
									'$price_opt_usd',
									$guarantee,
									CURDATE(),
									'$url',
									'$presence'										
		)";
		//print "sql:$sql<br><br>";
		$result = $this->db->query($sql);
		if(!$result){print "Error in SQL query:$sql"; exit();}
	}
	function get_title_url($gid){
		$sql ="	SELECT 	v.vendor_name,
						g.seller_id, 
						g.name, 
						g.description,
						g.url 
				FROM 	goods g, 
						vendors v
				WHERE 	g.id=$gid 
						AND g.vendor_id=v.id";
		//print $sql;
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$info = array(	"sid" 	=> $row['seller_id'],
							"title" => $row['vendor_name']." ".$row['name']." ".$row['description'],
							"url" 	=> $row['url']);
		}
		return $info;
	}
}

?>