<?
class Model{

	function __construct($db){
		$this->db = $db;		
	}

	function get_model_list($cat_id, $vendor_id){
		$sql = "SELECT * FROM models WHERE cat_id = $cat_id AND vendor_id=$vendor_id";
		//print "<br>".$sql;
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$list[] = array("id" 			=> $row['id'],
							"name" 			=> $row['name'],
							"cat_id" 		=> $row['cat_id'],
							"vendor_id" 	=> $row['vendor_id']);
		}
		return $list;
	}
	function add($cat_id, $vendor_id, $model_name){
		$sql = "INSERT INTO models(cat_id, vendor_id, name) VALUES($cat_id, $vendor_id, '$model_name')";
		$res = $this->db->query($sql);
		if(!$res)print "Error in SQL query:$sql";		
	}
	function delete($model_id){
		$sql = "DELETE FROM models WHERE id=$model_id";
		$res = $this->db->query($sql);
		if(!$res)print "Error in SQL query:$sql";		
	}	
	function rename($model_id, $new_name){
		$sql = "UPDATE models SET name='$new_name' WHERE id=$model_id";
		//print $sql;
		$res = $this->db->query($sql);
		if(!$res)print "Error in SQL query:$sql";		
	}
	function is_exist_transfer_name($sql){
		$result = mysql_query($sql);
		$num_rows = mysql_num_rows($result);
		return $num_rows;
	}
	function delete_transfer_row($transfer_name){
		$sql = "DELETE FROM model_transfer WHERE transfer_name='$transfer_name'";
		//print "<br>$sql";
		$res = $this->db->query($sql);
		if(!$res)print "Error in SQL query:$sql";		
	}
	function add_transfer_row($transfer_data){
		$model_id = $transfer_data['model_id'];
		$cat_id =  $transfer_data['cat_id'];
		$vendor_id =  $transfer_data['vendor_id'];
		$original_name = $transfer_data['original_name'];
		$transfer_name = $transfer_data['transfer_name'];

		$sql = "INSERT INTO model_transfer(model_id, cat_id, vendor_id, original_name, transfer_name) 
									VALUES($model_id, $cat_id, $vendor_id, '$original_name','$transfer_name')";
		//print "<br>add_transfer_row:sql:$sql";
		$res = $this->db->query($sql);
		if(!$res)print "Error in SQL query:$sql";		
	}	
}	
?>