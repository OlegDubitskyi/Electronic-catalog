<?
class Mailer{
	function __construct($db){
		$this->db = $db;		
	}
	function get_list(){
		$sql = "SELECT * FROM mailer";
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$list[] = array("id" 		=> $row['id'],
							"name" 		=> $row['name'],
							"url" 		=> $row['url'],
							"email" 	=> $row['email'],
							"icq"		=> $row['icq'],
							"status"	=> $row['status'],);
		}
		return $list;		
	}
	function save_mail($mail){
		foreach ($mail as $key=>$val){
			$name = trim($mail[$key]['name']);
			$url = trim($mail[$key]['url']);
			$email = trim($mail[$key]['email']);
			$icq = trim($mail[$key]['icq']);
			if($name and $email){
				if($this->is_already_exist($email)){
					
				}else{
					$sql = "INSERT INTO mailer(name,url,email,icq,status) VALUES('$name', '$url', '$email', '$icq',0)";				
					//print $sql."<br>";
					$res = $this->db->query($sql);
				}
			}			
		}
	}
	/**
	 * Проверяем существует ли уже такой емейл в базе.
	 *
	 * @email - емейл, который проверяем на наличие в базе
	 * @id - этот параметр присутствует при необходимости апдейта уже существующей записи, что бы не получилось что не удастся
	 * редактировать саму же строку, потому что емейл уже существует :)
	 * @return возвращает 1 в случае нахождения повторения, 0 при его отсутствии
	 */
	function is_already_exist($email,$id=''){
		if($id){
			$sql_id = "AND id!=$id";
		}else{
			$sql_id = "";
		}
		$email = trim($email);
		$sql = "SELECT * FROM mailer WHERE email='$email' $sql_id";
		print "<br>".$sql."<br>";
		$res = mysql_query($sql);
		$num = mysql_num_rows($res);
		print "num_already_exist_emails:$num<br>";
		if($num>0){
			return 1;
		}else{
			return 0;
		}
	}
	function del_mail($id){
		$sql = "DELETE FROM mailer WHERE id=$id";
		$res = $this->db->query($sql);
	}
	function update_mail($mail_data){
		$name = $mail_data['name'];
		$url = $mail_data['url'];
		$email = $mail_data['email'];
		$icq = $mail_data['icq'];
		$id = $mail_data['id'];
		$status = $mail_data['status'];
		
		if($this->is_already_exist($mail_data['email'], $mail_data['id'])){
				#в случае если повторение есть, то ничего не делаем, в будущем надо выводить сообщение о повторении
				//print "test<br>";
			}else{
				$sql = "UPDATE mailer SET name='$name', url='$url', email='$email', icq='$icq', status=$status WHERE id=$id";
				//print $sql;
				$res = $this->db->query($sql);			
			}
	}
	function get_row($id){
		$sql = "SELECT * FROM mailer WHERE id=$id";
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$mail_data[] = array("id" 		=> $row['id'],
								"name" 		=> $row['name'],
								"url" 		=> $row['url'],
								"email" 	=> $row['email'],
								"icq"		=> $row['icq'],
								"status"	=> $row['status'],);
		}		
		return $mail_data;
	}
}
?>