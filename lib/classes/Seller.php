<?
class Seller{
	function __construct($db){
		$this->db = $db;
	}
	function add($seller_data){
		//print_r($seller_data);
		$company_name 	= $seller_data['company_name'];
		
		$tel1 			= $seller_data['tel1'];
		$tel2 			= $seller_data['tel2'];
		$tel3 			= $seller_data['tel3'];
		
		$tel_code1		= $seller_data['tel_code1'];
		$tel_code2		= $seller_data['tel_code2'];
		$tel_code3		= $seller_data['tel_code3'];
		
		$address 		= $seller_data['address'];
		$region_id 		= $seller_data['region_id'];
		$delivery 		= $seller_data['delivery'];
		$credit 		= $seller_data['credit'];

		$description = $seller_data['description'];
		$delivery_options = $seller_data['delivery_options'];;
		$icq = $seller_data['icq'];
		$email = $seller_data['email'];
		$fax = $seller_data['fax'];
		$url = $seller_data['url'];
		$work_time = $seller_data['work_time'];
		
		$sql = "SET CHARACTER SET cp1251";
		//$this->db->query($sql)or die("Error in sql:$sql");
		
		$sql = "INSERT INTO sellers(company_name,
									tel_code1,
									tel1,
									tel_code2,
									tel2,
									tel_code3,
									tel3,
									address,
									region_id,
									delivery,
									credit,
									reg_date,
									status,
									description,
									delivery_options,
									icq,
									email,
									fax,
									url,
									work_time) 
							values(	'$company_name',
									'$tel_code1',
									'$tel1',
									'$tel_code2',
									'$tel2',
									'$tel_code3',
									'$tel3',
									'$address',
									$region_id,
									$delivery,
									$credit,
									CURDATE(),
									1,
									'$description',
									'$delivery_options',
									'$icq',
									'$email',
									'$fax',
									'$url',
									'$work_time'
		)";
		print $sql."<br>";
		$res = $this->db->query($sql) or die("Error in SQL:$sql");	
		if(!res)print "<br>SQL Error in $sql<br>";
	}

	function update($seller_data){
		# Экранирование хтмл мнемоник
		foreach($seller_data as $key=>$value){
			$seller_data[$key] = htmlspecialchars($value);
			
		}
		if($seller_data[password]!=''){
			$sql_pas = "u.pas = '".$seller_data[password]."',";
		}else{
			//print "Пусто";
		}
		# Убираем из поля "Курс" все лишнее - оставляем только цифры и заменяем "," на "." если надо
		$curs = preg_replace('/[^\.,\d]/','',$seller_data[curs]);
		$curs = str_replace(',','.', $curs);
		
		
		$sql = "UPDATE sellers s, users u 
				SET s.company_name		= '$seller_data[company_name]', 
					u.login	 			= '$seller_data[email]',
					$sql_pas
					u.user_name			= '$seller_data[user_name]',
					s.tel_code1 		= '$seller_data[tel_code1]', 
					s.tel1 				= '$seller_data[tel1]', 
					s.tel_code2 		= '$seller_data[tel_code2]', 
					s.tel2 				= '$seller_data[tel2]', 
					s.tel_code3 		= '$seller_data[tel_code3]', 
					s.tel3 				= '$seller_data[tel3]', 
					s.address 			= '$seller_data[address]', 
					s.region_id 		= '$seller_data[region_id]', 
					s.curs 				= '$curs', 
					s.delivery 			= '$seller_data[delivery]',
					s.credit 			= '$seller_data[credit]',
					s.description	 	= '$seller_data[description]',
					s.delivery_options 	= '$seller_data[delivery_options]',
					s.icq 				= '$seller_data[icq]',
					s.email 			= '$seller_data[email]',
					s.fax 				= '$seller_data[fax]',
					s.url 				= '$seller_data[url]',
					s.work_time			= '$seller_data[work_time]'
				WHERE s.id=".$_SESSION['seller_id']." AND u.seller_id=".$_SESSION['seller_id'];
		//print $sql;
		$res = $this->db->query($sql);			
		if(!$res)print "Error in SQL query:$sql";
		
	}

	function is_seller_exist($company_name){

		$sql = "SELECT id FROM sellers WHERE company_name='$company_name' AND id!=".$_SESSION['seller_id'];
		//print "sql:$sql<br>";
		$res = mysql_query($sql);
		$num_rows = mysql_num_rows($res);
		if($num_rows>0){
			return $num_rows;
		}else{
			return 0;
		}
			
	}
	
	# удаление продавца и всех его товаров
	function del($seller_id){
		$sql = "DELETE FROM sellers WHERE id =$seller_id";
		$res = $this->db->query($sql);

		# Создаем объект пользователя и вызываем функцию удаления
		$user = new User($this->db);
		$user->del($seller_id);	
		
		# Создаем объект товаров и вызываем функцию удаления всех товаров удаляемого продавца
		$goods = new Goods($this->db);
		$goods->del_seller_goods($seller_id);

				
	}
	function change_status($seller_id){
		
		$sql = "SELECT status FROM sellers WHERE id=$seller_id";
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$status = $row['status'];
		}
		if($status==0){
			$sql = "UPDATE sellers SET status=1 WHERE id=$seller_id";
			$res = $this->db->query($sql);			
		}else{
			$sql = "UPDATE sellers SET status=0 WHERE id=$seller_id";
			$res = $this->db->query($sql);			
		}
	}
	/**
	 * Функция для получения курса который устанавливается по умолчанию для все регистрируемых 
	 * магазинов. Нужно это для того, что бы не происходило проблем при сортировке по ценам 
	 * позиций. Хранить его будем в таблице с символическим названием curs ;)
	 */
	function get_def_curs(){
		$sql = "SELECT uah_to_usd FROM curs";
		$res = $this->db->query($sql);
		while($row = $res->fetchrow(DB_FETCHMODE_ASSOC)){
			$curs = $row['uah_to_usd'];
		}
		return $curs;
	}
	/**
	 * Функция для установки курса валют по умолчанию.
	 * Т.е этот курс будет использоваться в том случае, если курс для конкретной компании не 
	 * установлен.
	 *
	 * @param float $curs - курс, в дальнейшем надо будет передать функцию под несколько валют
	 */
	function set_def_curs($curs){
		$sql = "SELECT * FROM curs";
		$res = mysql_query($sql);
		$num_rows = mysql_num_rows($res);
		/**
		 * Если таблица не пуста, то тогда апдейтим поле, инсертим только если 
		 * таблица пуста
		 */
		if($num_rows){
			$sql = "UPDATE curs SET uah_to_usd=$curs";
			$res = $this->db->query($sql);			
		}else{
			$sql = "INSERT INTO curs(uah_to_usd) VALUES($curs)";
			$res = $this->db->query($sql);						
		}

	}
	function get_seller_curs(){
		$sql = "SELECT curs FROM sellers WHERE id = ".$_SESSION['seller_id'];
		$res = $this->db->query($sql);						
		while($row = $res->fetchrow(DB_FETCHMODE_ASSOC)){
			$curs = $row['uah_to_usd'];
		}					
		return $curs;
	}
}
?>