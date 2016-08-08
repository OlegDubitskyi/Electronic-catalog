<?
class Register{
	function __construct($db){
		$this->db = $db;
	}
	
	function get_list($status){
		$sql = "SELECT id, company_name, num_rows, DATE_FORMAT(date_reg,'%d.%m %H:%i') as date_reg FROM reg_list WHERE status=$status";
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {		
			$list[] = array("id" => $row['id'],
							"company_name" => $row['company_name'],
							"num_rows" => $row['num_rows'],
							"date_reg" => $row['date_reg']);			
		}
		return $list;	
	}
	function add($company_name, $region_name, $user_name, $tel_code, $tel, $email, $url, $num_rows, $reg_key, $status){
		$sql = "INSERT INTO reg_list(	company_name, 
										region_name, 
										user_name,
										tel_code, 
										tel, 
										email, 
										num_rows, 
										url,
										reg_key,
										status) 
							VALUES(		'$company_name',
										'$region_name',
										'$user_name',
										'$tel_code',
										'$tel',
										'$email',
										'$num_rows',
										'$url',
										'$reg_key',
										$status)";
		//print "$sql";
		$res = $this->db->query($sql);
		//print "insert_id_in:".mysql_insert_id()."<br>";
		return mysql_insert_id();
		
	}	
	function get_company($id){
		$sql = "SELECT * FROM reg_list WHERE id=$id";
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {		
			$data[] = array("id" => $row['id'],
							"company_name" 	=> $row['company_name'],
							"region_name" 	=> $row['region_name'],
							"user_name" 	=> $row['user_name'],
							"tel_code" 		=> $row['tel_code'],
							"tel" 			=> $row['tel'],
							"email" 		=> $row['email'],
							"url" 			=> $row['url'],
							"num_rows" 		=> $row['num_rows']);			
		}		
		return $data;
	}
	function confirm($id, $key){
		$sql = "SELECT id,status FROM reg_list WHERE id=$id AND reg_key='$key'";
		//print "sql:$sql<br>";
		$res = mysql_query($sql);
		$num_rows = mysql_num_rows($res);
		//print "num_rows:$num_rows<br>";		
		if($num_rows==1){
			while ($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
	        	$status = $row["status"];
    		}
    		if($status==0){
				$sql = "UPDATE reg_list SET status=1 WHERE id=$id";
				$res = $this->db->query($sql);
				return 1;
    		}else{
    			return 2;
    		}
		}else{
			return 0;				
		}
	}
	/**
	 * Эта функция копирует информацию о компании в таблицы sellers и users
	 */
	function register($id,$region_id){
		$sql = "SELECT * FROM reg_list WHERE id=$id";
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {		
			$company_name 	= $row['company_name'];
			$user_name 		= $row['user_name'];
			$url 			= $row['url'];
			$tel_code 		= $row['tel_code'];
			$tel 			= $row['tel'];
			$email 			= $row['email'];
		}				
		$password = $this->generate_pas();
		$seller_data = array(	"company_name" 		=> $company_name,
								"tel1" 				=> $tel,
								"tel2" 				=> '',
								"tel3" 				=> '',
								"tel_code1" 		=> $tel_code,
								"tel_code2" 		=> '',
								"tel_code3" 		=> '',	
								"address" 			=> '',
								"region_id" 		=> $region_id,
								"delivery" 			=> 0,
								"credit" 			=> 0,
								"description"		=> '',
								"delivery_options"	=> '',
								"icq" 				=> '',
								"email" 			=> $email,
								"fax" 				=> '',
								"url" 				=> $url,
								"work_time"			=> '',
								"user_name"			=> $user_name,
								"password"			=> $password);
		# Копируем информацию в "боевые таблицы"
		$seller = new Seller($this->db);
		$seller->add($seller_data);
		$user = new User($this->db);
		$user->add($seller_data['user_name'],$seller_data['email'],$seller_data['password']);
		
		#Теперь меняем статус на "2"
		$sql = "UPDATE reg_list SET status=2 WHERE id=$id";
		$res = $this->db->query($sql)or die("Ошибка sql:$sql");
		
		#Высылаем письмо с уведомлением о успешной регистрации и указанием логина и пароля
	$headers .= "Content-type: text/html; charset=koi8-r\r\n";
	$headers .= "From: support@webcat.com.ua\r\n";
	$text = "Здравствуйте, $user_name!<br>
Компания \"$company_name\" была внесена в каталог WebCatalog<br>
Вход в Ваш аккаунт производится с главной страницы : <a href='http://www.webcat.com.ua'>http://www.webcat.com.ua</a><br><br>

Высылаем Вам данные для входа в панель администрирования Вашего аккаунта:<br><br> 
Логин: $email<br>
Пароль: $password<br><br>
С помощью данного аккаунта можно редактировать информацию  о своей компании,<br>
а также редактировать прайс-лист.<br><br>
Если у Вас возникли вопросы, пишите на <a href='mailto:support@webcat.com.ua'>support@webcat.com.ua</a><br><br>
Желаем успеха,<br>
Администрация WebCatalog!";
	$text = convert_cyr_string ($text,w,k);//Конвертация кодировки сообщения в koi8-r
    mail("$email",convert_cyr_string ("Ваш сайт был добавлен в каталог WebCatalog",w,k),$text,$headers);				

	
	}
	function generate_pas(){
		$pas_array = array(	'A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z',
							'a','b','c','d','e','f','g','h','i','j','k','l','m','n','o','p','q','r','s','t','u','v','w','x','y','z',
							'1','2','3','4','5','6','7','8','9','0');
		for($i=0; $i<6; $i++){
		$password .= $pas_array[mt_rand(0,62)];
		}		
		return $password;
	}
	function is_company_exist($email){
		
		$sql = "SELECT * FROM reg_list WHERE email='$email'";
		//print "sql:$sql";
		$res = mysql_query($sql);
		$num_rows = mysql_num_rows($res);
	
		if($num_rows>0){
			return 1;
		}else{
			return 0;
		}
			
	}
	function del_company($id){
		$sql = "DELETE FROM reg_list WHERE id=$id";
		$res = $this->db->query($sql);
	}
}
?>