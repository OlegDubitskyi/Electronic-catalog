<?
class Region{
	function __construct($db){
		$this->db = $db;
	}
	function get_regions_list(){
		$sql = "SELECT * FROM region";
		$res = $this->db->query($sql);
		if(!$res)print "Error in SQL:$sql<br>";
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$list[] = array("id" 			=> $row['id'],
							"region_name" 	=> trim($row['region_name']));
		}
		return $list;		
	}
	function get_regions_list_for_search($cat_id){
		# Делаем проверку на непустые значения для пары цен, для  того что бы не выводить позиции с отсутствующими ценами
		if($_SESSION['price_type']=='r'){
			$sql_price_type = "AND (g.price_usd >0 or g.price_ua >0)";
		}elseif($_SESSION['price_type']=='o'){
			$sql_price_type = "AND (g.price_opt_usd >0 or g.price_opt_ua >0)";
		}
		if($_SESSION['vendor_id']){
			$vendor_search = "AND g.vendor_id=".$_SESSION['vendor_id'];
		}
		$search_str = $_SESSION['search_string'];		
		# Разбиваем строку запроса на составляющие
		if($search_str){
			$temp = split(' ',$search_str);
			# Получаем категории, которые содержат элементы поиска
			foreach ($temp as $val){
				$search .= "AND (g.name LIKE '%$val%' OR v.vendor_name LIKE '%$val%' OR g.description LIKE '%$val%')";
			}
		}
		$sql = "SELECT r.id, r.region_name
				FROM goods g, sellers s, region r, vendors v
				WHERE g.seller_id = s.id AND v.id=g.vendor_id AND s.region_id=r.id
				AND g.cat_id=$cat_id $vendor_search $sql_price_type
				AND v.cat_id=$cat_id
				$search
				GROUP BY r.id";
/*проводим эксперимент с запросом
		$sql = "SELECT r.id, r.region_name
				FROM goods g, sellers s, region r, vendors v
				WHERE g.seller_id = s.id AND v.id=g.vendor_id AND s.region_id=r.id
				AND g.cat_id=$cat_id $vendor_search $sql_price_type
				AND v.cat_id=$cat_id
				$search
				GROUP BY r.id";
*/

		
		//print "<br>******<br>";
		//print $sql;
//		$sql = "SELECT * FROM region";
		$res = $this->db->query($sql);
		if(!$res)print "Error in SQL:$sql<br>";
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$list[] = array("id" 			=> $row['id'],
							"region_name" 	=> trim($row['region_name']));
		}
		return $list;		
	}	

	
	
	function get_board_regions_list($cat_id){
		# Делаем проверку на непустые значения для пары цен, для  того что бы не выводить позиции с отсутствующими ценами
		if($_SESSION['type']){
			$type_sql = "AND type=".$_SESSION['type'];
		}
		# Разбиваем строку запроса на составляющие
		$sql = "SELECT r.id, r.region_name
				FROM board_advert ba, region r
				WHERE r.id=ba.region_id
				AND ba.cat_id=$cat_id $type_sql 
				GROUP BY r.id";
		//print "<br>******<br>";
		//print "<br>".$sql;
//		$sql = "SELECT * FROM region";
		$res = $this->db->query($sql);
		if(!$res)print "Error in SQL:$sql<br>";
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$list[] = array("id" 			=> $row['id'],
							"region_name" 	=> trim($row['region_name']));
		}
		return $list;		
	}		
	
	
	
	
	function update_region_name($region_id, $new_name){
		$sql = "UPDATE region SET region_name='$new_name' WHERE id=$region_id";
		$res = $this->db->query($sql);
	}
	function add($region_name){
		$sql = "INSERT INTO region(region_name) VALUES('$region_name')";
		$res = $this->db->query($sql);
		if(!$res)print "Error in SQL:$sql<br>";
	}
	function del($id){
		$sql = "DELETE FROM region WHERE id=$id";
		$res = $this->db->query($sql);
	}
}

?>