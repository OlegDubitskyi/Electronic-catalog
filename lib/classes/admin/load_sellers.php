<?
class load_sellers{
//	public 	$name_seller,
//			$telephone, 
//			$address, 
//			$city, 
//			$delivery, 
//			$credit, 
//			$beznal, 
//		public	$smarty;
//			$sellers;
	
	function __construct($db, $smarty,$id=""){
		$this->db = $db;
		$this->smarty = $smarty;
		$this->id = $id;
	}
	function get_list($index=''){
		$stat = new Stat($this->db);
		if($index){
			$index_sql = "AND company_name LIKE '$index%'";
		}else{
			$index_sql = "";
		}
		$sql = "SELECT 	s.id,
						s.company_name,
						s.tel_code1,
						s.tel1,
						s.tel_code2,
						s.tel2,
						s.tel_code3,
						s.tel3,
						s.address,
						s.region_id,
						r.region_name,
						s.delivery,
						s.credit,
						s.reg_date,
						s.status,
						s.url 
				FROM 	sellers s,
						region r
				WHERE 	s.region_id=r.id $index_sql";
		//print "sql:$sql";
		$result = $this->db->query($sql); 
		$i=0;
		while ($row = $result->fetchrow(DB_FETCHMODE_ASSOC)){
			
			$company_num_rows = $stat->get_company_num_rows($row['id']);			
			$sellers[$i] = array(	"id"			=> $row['id'],
		        					"company_name"	=> $row['company_name'],
		        					"tel_code1" 	=> $row['tel_code1'],
		        					"tel1"		 	=> $row['tel1'],
		        					"tel_code2" 	=> $row['tel_code2'],
		        					"tel2"		 	=> $row['tel2'],
		        					"tel_code3" 	=> $row['tel_code3'],
		        					"tel3"		 	=> $row['tel3'],
		        					"address" 		=> $row['address'],
		        					"region_id" 	=> $row['region_id'],
		        					"region_name" 	=> $row['region_name'],
		        					"delivery" 		=> $row['delivery'],
		        					"credit" 		=> $row['credit'],
		        					"reg_date"		=> $row['reg_date'],
		        					"status"		=> $row['status'],
		        					"url"			=> $row['url'],
		        					"num_rows"		=> $company_num_rows);
			$i++;
		}		
		$this->smarty->assign("sellers",$sellers);
		return $this->smarty;
	}
	function get_active_list($index=''){
		$stat = new Stat($this->db);
		if($index){
			$index_sql = "AND company_name LIKE '$index%'";
		}else{
			$index_sql = "";
		}
		$sql = "SELECT 	s.id,
						s.company_name,
						s.tel_code1,
						s.tel1,
						s.tel_code2,
						s.tel2,
						s.tel_code3,
						s.tel3,
						s.address,
						s.region_id,
						r.region_name,
						s.delivery,
						s.credit,
						s.reg_date,
						s.status,
						s.url 
				FROM 	sellers s,
						region r
				WHERE 	s.region_id=r.id $index_sql AND s.status=1";
		//print "sql:$sql";
		$result = $this->db->query($sql); 
		$i=0;
		while ($row = $result->fetchrow(DB_FETCHMODE_ASSOC)){
			
			$company_num_rows = $stat->get_company_num_rows($row['id']);			
			$sellers[$i] = array(	"id"			=> $row['id'],
		        					"company_name"	=> $row['company_name'],
		        					"tel_code1" 	=> $row['tel_code1'],
		        					"tel1"		 	=> $row['tel1'],
		        					"tel_code2" 	=> $row['tel_code2'],
		        					"tel2"		 	=> $row['tel2'],
		        					"tel_code3" 	=> $row['tel_code3'],
		        					"tel3"		 	=> $row['tel3'],
		        					"address" 		=> $row['address'],
		        					"region_id" 	=> $row['region_id'],
		        					"region_name" 	=> $row['region_name'],
		        					"delivery" 		=> $row['delivery'],
		        					"credit" 		=> $row['credit'],
		        					"reg_date"		=> $row['reg_date'],
		        					"status"		=> $row['status'],
		        					"url"			=> $row['url'],
		        					"num_rows"		=> $company_num_rows);
			$i++;
		}		
		$this->smarty->assign("sellers",$sellers);
		return $this->smarty;
	}	
	function get_seller($seller_id=''){
		if(!$seller_id){
			$seller_id = $_SESSION['seller_id'];
		}
		//print "seller_id:$seller_id";
		$sql = "SELECT 	s.id,
						s.company_name,
						s.tel_code1,
						s.tel1,
						s.tel_code2,
						s.tel2,
						s.tel_code3,
						s.tel3,
						s.address,
						s.region_id,
						r.region_name,
						s.curs,
						s.delivery,
						s.credit,
						s.reg_date,
						s.status,
						u.user_name,
						u.login,
						u.pas,
						s.description,
						s.delivery_options,
						s.icq,
						s.fax,
						s.url,
						s.work_time
				FROM 	sellers s,
						users u,
						region r 
				WHERE 	s.id=$seller_id 
						AND u.seller_id=s.id
						AND s.region_id=r.id";
		//print $sql;
		$result = $this->db->query($sql);
		$i=0;
		while ($row = $result->fetchrow(DB_FETCHMODE_ASSOC)){
			if($row['curs']==0){
				$curs = "";
			}else{
				$curs = $row['curs'];
			}
			$seller[$i] = array(	"seller_id"			=> $row['id'],
									"user_name"			=> $row['user_name'],
									"email" 			=> $row['login'],
									"pas" 				=> $row['pas'],								
									"company_name" 		=> $row['company_name'],
		        					"tel_code1"			=> $row['tel_code1'],
		        					"tel1" 				=> $row['tel1'],
		        					"tel_code2"			=> $row['tel_code2'],
		        					"tel2" 				=> $row['tel2'],
		        					"tel_code3"			=> $row['tel_code3'],
		        					"tel3" 				=> $row['tel3'],
		        					"address" 			=> $row['address'],
		        					"region_id" 		=> $row['region_id'],
		        					"region_name" 		=> $row['region_name'],
		        					"curs" 				=> $curs,
		        					"delivery" 			=> $row['delivery'],
		        					"credit" 			=> $row['credit'],
		        					"description" 		=> $row['description'],
		        					"delivery_options" 	=> $row['delivery_options'],
		        					"icq" 				=> $row['icq'],
		        					"fax" 				=> $row['fax'],
		        					"url" 				=> $row['url'],
		        					"work_time" 		=> $row['work_time']		        					);
			$i++;	
		}
		//print "dasd";
		//print_r($seller);
		$this->smarty->assign("seller",$seller);		
		return $this->smarty;		
	}
	/**
	 * Функция для получения категорий нижнего уровня(в которые непосредственно добавляются товары), 
	 * в которых продавец размещает свои товары. Т.е выводятся только те категории, которые содержат товар
	 * данного продавца
	 *
	 * @param: 
	 * $id - по сути seller_id 
	 * 
	 * @output:
	 * $bottom_cat_arr - массив cat_id нижнего уровня в которых есть товары данного продавца
	 */
	function get_bottom_level_categories(){
		#строка в которой будут храниться id категорий нижнего уровня
		$ids_str = '';
		
		$sql = "SELECT cat_id FROM `catalog` WHERE cat_right-cat_left=1 ORDER BY cat_id";
		
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			if($ids_str==''){
				$ids_str .=$row['cat_id'];
			}else {
				$ids_str .=",".$row['cat_id'];				
			}
		}
		//print "<br>ids_str:$ids_str";
		/**
		 * Шаг второй - делаем проверку в таблице товаров, а есть ли товар данного продавца в 
		 * вышеполученных категориях нижнего уровня и возвращаем массив cat_id и cat_name
		 */
		$sql = "SELECT DISTINCT g.cat_id, c.cat_name FROM goods g, catalog c WHERE g.seller_id=$this->id AND g.cat_id IN($ids_str) AND c.cat_id=g.cat_id";
		//print $sql;
		$res = $this->db->query($sql);
		$seller_id = $_SESSION['seller_id'];
		//print "seller_id:$seller_id<br>";
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$num_goods = 0;
			$sql_2 = "	SELECT 	g.id 
						FROM 	goods g, sellers s
						WHERE 	g.cat_id=".$row['cat_id']." 
								AND s.id = $seller_id
								AND g.seller_id=s.id
								AND s.status=1
								AND (g.price_usd>0 OR g.price_ua>0 OR g.price_opt_ua>0 OR g.price_opt_usd>0)";
			//print "sql2:$sql_2<br><br>";
			$result = mysql_query($sql_2);
			$num_goods = mysql_num_rows($result);
							
			$bottom_cat_arr[] =array(	"cat_id" 	=>$row['cat_id'],
										"cat_name" 	=>$row['cat_name'],
										"num_goods" => $num_goods);
		}	
		//print_r($bottom_cat_arr);
		return $bottom_cat_arr;
	}
	function get_all_bottom_level_categories(){
		#строка в которой будут храниться id категорий нижнего уровня
		$ids_str = '';
		
		$sql = "SELECT cat_id, cat_name FROM catalog WHERE cat_right-cat_left=1 ORDER BY cat_id";
		//print $sql;
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$bottom_cat_arr[$row['cat_id']] = $row['cat_name'];
		}	
		//print_r($bottom_cat_arr);
		return $bottom_cat_arr;
	}	
	function get_rows_list($cat_id){
		$sql ="	SELECT 	g.id,
						g.cat_id,
						c.cat_name, 
						v.vendor_name,
						g.name, 
						g.description, 
						g.price_usd, 
						g.price_ua,
						g.price_opt_usd,
						g.price_opt_ua,
						g.guarantee,
						g.presence,
						DATE_FORMAT(g.date_last_mod,'%d.%m') as insert_date
				FROM 	goods g, 
						catalog c,
						vendors v 
				WHERE g.seller_id=$this->id AND g.cat_id=$cat_id AND g.cat_id = c.cat_id AND v.id=g.vendor_id";
# Убираю группировку по имени, потому как есть одинаково называемые модели, но с разными опциями 
# и ценами. При наличии группировки их не видно
/*
		$sql ="	SELECT 	g.id,
						g.cat_id,
						c.cat_name, 
						v.vendor_name,
						g.name, 
						g.description, 
						g.price_usd, 
						g.price_ua,
						g.price_opt_usd,
						g.price_opt_ua,
						g.guarantee,
						g.presence,
						DATE_FORMAT(g.date_last_mod,'%d.%m') as insert_date
				FROM 	goods g, 
						catalog c,
						vendors v 
				WHERE g.seller_id=$this->id AND g.cat_id=$cat_id AND g.cat_id = c.cat_id AND v.id=g.vendor_id GROUP BY name";
*/
		
		//print $sql;
		$res = $this->db->query($sql);		
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$cat_name = $row['cat_name'];
			$cat_id = $row['cat_id'];
			if(!$row['guarantee']){
				$guarantee = "-";
			}else {
				$guarantee = $row['guarantee'];
			}
			
			$rows_list[] = array(	"id" 			=>$row['id'],
									"cat_id"		=>$row['cat_id'],
									"vendor_name"	=>$row['vendor_name'],
									"name"			=>$row['name'],
									"description"	=>$row['description'],
									"price_ua" 		=>$row['price_ua'],
									"price_usd" 	=>$row['price_usd'],
									"price_opt_ua" 	=>$row['price_opt_ua'],
									"price_opt_usd" =>$row['price_opt_usd'],
									"guarantee" 	=>$guarantee,
									"presence"	 	=>$row['presence'],
									"insert_date"	=>$row['insert_date']
							);
			$this->smarty->assign("cat_name",$cat_name);
			$this->smarty->assign("cat_id",$cat_id);
			$this->smarty->assign("rows_list",$rows_list);
		}
	}
}

?>