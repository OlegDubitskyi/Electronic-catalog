<?
/**
 * Класс для работы с производителями:
 * add - добавление производителя
 * delete - удаление производителя
 * rename - переименовать
 * get_vendor_list - получить список производителей для конкретной категории
 * is_exist - проверка на существование производителя в базе
 */
class Vendor{
	function __construct($db){
		$this->db = $db;
	}
	
	function get_vendor_list($cat_id){
		$sql = "SELECT id, cat_id, vendor_name FROM vendors WHERE cat_id = $cat_id";
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$list[] = array("id" => $row['id'],
							"cat_id" => $row['cat_id'],
							"vendor_name" => $row['vendor_name']);
		}
		return $list;
	}
	/**
	 * Функция которая возвращает список производителей, товары которых есть в базе
	 *
	 * @param unknown_type $cat_id - идентификатор категории для которой ищем производителей
	 * @return $list - массив информации о производителе, включающий в себя кол-во товаров 
	 * для данного производителя
	 */
	function get_active_vendor_list($cat_id){
		# Делаем проверку на непустые значения для пары цен, для  того что бы не выводить позиции с отсутствующими ценами
		if($_SESSION['price_type']=='r'){
			$sql_price_type = "AND (g.price_usd >0 or g.price_ua >0)";
		}elseif($_SESSION['price_type']=='o'){
			$sql_price_type = "AND (g.price_opt_usd >0 or g.price_opt_ua >0)";
		}
		
		$sql = "SELECT v.id, v.cat_id, v.vendor_name, COUNT(v.id) as num_goods
				FROM vendors v, goods g 
				WHERE v.cat_id = $cat_id AND v.id=g.vendor_id $sql_price_type GROUP BY v.id";
		
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$list[] = array("id" 			=> $row['id'],
							"cat_id" 		=> $row['cat_id'],
							"vendor_name" 	=> $row['vendor_name'],
							"num_goods"		=> $row['num_goods']);
		}
		return $list;
	}
	# Функция возвращает список вендоров при осуществлении поиска по базе
	function get_active_vendor_list_for_search($cat_id){
		# Делаем проверку на непустые значения для пары цен, для  того что бы не выводить позиции с отсутствующими ценами
		if($_SESSION['price_type']=='r'){
			$sql_price_type = "AND (g.price_usd >0 or g.price_ua >0)";
		}elseif($_SESSION['price_type']=='o'){
			$sql_price_type = "AND (g.price_opt_usd >0 or g.price_opt_ua >0)";
		}
		if($_SESSION['region_id']){
			$region_sql = "AND r.id=".$_SESSION['region_id'];
		}		

		$search_str = $_SESSION['search_string'];		
		if($search_str){
			# Разбиваем строку запроса на составляющие
			$temp = split(' ',$search_str);
		
			# Получаем категории, которые содержат элементы поиска
			foreach ($temp as $val){
				$search .= "AND (g.name LIKE '%$val%' OR v.vendor_name LIKE '%$val%' OR g.description LIKE '%$val%')";
			}
		}

		$sql = "SELECT 	v.id, 
						v.vendor_name, 
						COUNT(v.id) as num_goods, 
						g.cat_id
				FROM 	vendors v, 
						goods g, 
						sellers s, 
						region r
				WHERE 	g.vendor_id = v.id 
						AND g.seller_id = s.id 
						AND s.region_id=r.id
						AND g.cat_id=$cat_id $sql_price_type $region_sql
						AND v.cat_id=$cat_id
						AND s.status=1
						$search
						GROUP BY v.id";	
		//print $sql;	
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$list[] = array("id" 			=> $row['id'],
							"cat_id" 		=> $row['cat_id'],
							"vendor_name" 	=> $row['vendor_name'],
							"num_goods"		=> $row['num_goods']);
		}
		return $list;
	}	
	
	function is_exist($vendor_name, $cat_id){
		$sql = "SELECT id FROM vendors WHERE vendor_name='$vendor_name' AND cat_id='$cat_id'";
		//print "$sql<br>";
		$res = $this->db->query($sql);
		if(!$res)print "Error in SQL query:$sql";
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)){
			$vendor_id = $row['id'];
		}
		//print "is_exist:vendor_id:$vendor_id";								
		return $vendor_id;
	}
	function rename($vendor_id, $new_name){
		$sql = "UPDATE vendors SET vendor_name='$new_name' WHERE id=$vendor_id";
		$res = $this->db->query($sql);
		if(!$res)print "Error in SQL query:$sql";		
	}
	
	function add($cat_id, $vendor_name){
		$sql = "INSERT INTO vendors(cat_id, vendor_name) VALUES($cat_id,'$vendor_name')";
		$res = $this->db->query($sql);
		if(!$res)print "Error in SQL query:$sql";		
	}
	function delete($vendor_id){
		$sql = "DELETE FROM vendors WHERE id=$vendor_id";
		$res = $this->db->query($sql);
		if(!$res)print "Error in SQL query:$sql";		
	}
	function is_exist_transfer_name($sql){
		$result = mysql_query($sql);
		$num_rows = mysql_num_rows($result);
		return $num_rows;
	}
	function delete_transfer_row($transfer_name){
		$sql = "DELETE FROM vendor_transfer WHERE transfer_name='$transfer_name'";
		//print "<br>$sql";
		$res = $this->db->query($sql);
		if(!$res)print "Error in SQL query:$sql";		
	}
	function add_transfer_row($transfer_data){
		$vendor_id = $transfer_data['vendor_id'];
		$original_name = $transfer_data['original_name'];
		$transfer_name = $transfer_data['transfer_name'];

		$sql = "INSERT INTO vendor_transfer(vendor_id, original_name, transfer_name) 
									VALUES($vendor_id,'$original_name','$transfer_name')";
		$res = $this->db->query($sql);
		if(!$res)print "Error in SQL query:$sql";		
	}
	function get_vendor($vendor_id){
		$sql = "SELECT * FROM vendors WHERE id=$vendor_id";
		//print $sql;
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$vendor = array(	"id" => $row['id'],
								"cat_id" => $row['cat_id'],
								"vendor_name" => $row['vendor_name']);
		}
		return $vendor;
	}

}

?>