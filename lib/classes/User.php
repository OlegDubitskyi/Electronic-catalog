<?
class User{
	function __construct($db){
		$this->db = $db;
	}
	function add($user_name,$login,$password){
		
		$seller_id = mysql_insert_id();
		if($seller_id>0){
			$sql = "INSERT INTO users(	seller_id,user_name,login,pas,reg_date,user_type)
								VALUES(	$seller_id,'$user_name','$login','$password',CURDATE(),1)";
			$res = $this->db->query($sql);
			print "<br><br>$sql";
			if(!res)print "<br>SQL Error in $sql<br>";
		}else{
			print "<font color=red>Ошибка при добавлении продавца, нет seller_id<br>";
		}
	}
	function del($seller_id){
		$sql = "DELETE FROM users WHERE seller_id=$seller_id";
		$res = $this->db->query($sql);		
	}
	function is_user_exist($login){
		
		$sql = "SELECT * FROM users WHERE login='$login' AND seller_id!=".$_SESSION['seller_id'];
		//print "sql:$sql";
		$res = mysql_query($sql);
		$num_rows = mysql_num_rows($res);
		
		if($num_rows>0){
			return $num_rows;
		}else{
			return 0;
		}
			
	}
}
?>