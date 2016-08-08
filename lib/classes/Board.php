<?
class Board{
	function __construct($db){
		$this->db = $db;
	}
#########################################################
# ������� ������ ��� ������ �������� ����� ���������� �� ������� �������� 
# ������� ���������� ���,
# �� ������ ���������� ����������� ������ ��������	
#########################################################
	function get_main_catalog(){
		#########################################################
		# ����� ������ ���� ������ �������� - �.� ��������� ������ �������� ��� ��������� ������ 1-2
		# - children - �������� ������ ��������� ���������� ������ ��� ��������� ������� ������
		#########################################################
		$sql = "SELECT * FROM board_catalog WHERE cat_level > 0 AND cat_level <=2 ORDER BY cat_left ";
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			if(($row['cat_right'] - $row['cat_left'])==1){
				$sql_2 = "	SELECT 	id 
							FROM 	board_advert
							WHERE 	cat_id=".$row['cat_id'];
				$result = mysql_query($sql_2);
				$num_mes = mysql_num_rows($result);
			}else{
				$num_mes = 0;
			}
			$temp_array[] = array(	cat_name 	=> $row['cat_name'],
									cat_id 		=> $row['cat_id'],
									cat_level 	=> $row['cat_level'],
									num_mes		=> $num_mes);
		}
		$i=0;
		foreach($temp_array as $key=>$cat){

			if($cat[cat_level]==1){
				$cat_tree[$i]=array(	"cat_name" 	=> $cat['cat_name'],
										"cat_id"	=> $cat['cat_id'],
										"children" 	=> array());
				$i++;		
			}else{
				array_push($cat_tree[$i-1]["children"],array(	"cat_name" 	=> $cat['cat_name'], 
																"cat_id"	=> $cat['cat_id'], 
																"num_mes" 	=> $cat['num_mes']));
			}
		}		
		return $cat_tree;
	}	
	function is_user_login_exist($login){
		$sql = "SELECT * FROM users WHERE login='$login'";
		//print "sql:$sql";
		$res = mysql_query($sql);
		$num_rows = mysql_num_rows($res);
		
		if($num_rows>0){
			return 1;
		}else{
			return 0;
		}
			
	}	
	function is_email_already_exist($email){
		$sql = "SELECT * FROM users WHERE email='$email' AND uid!=$_SESSION[uid]";
		//print "sql:$sql";
		$res = mysql_query($sql);
		$num_rows = mysql_num_rows($res);
		
		if($num_rows>0){
			return 1;
		}else{
			return 0;
		}
			
	}	
	function is_user_email_exist($email){
		$sql = "SELECT * FROM users WHERE email='$email'";
		//print "sql:$sql";
		$res = mysql_query($sql);
		$num_rows = mysql_num_rows($res);
		
		if($num_rows>0){
			return 1;
		}else{
			return 0;
		}
			
	}	
	function add_user($user_data){
		$login = $user_data['login'];
		$email = $user_data['email'];
		$pub_email = $user_data['pub_email'];
		$icq = $user_data['icq'];
		$tel = $user_data['tel'];
		$region_id = $user_data['region_id'];
		
		$register = new Register($this->db);
		$pas = $register->generate_pas();

		# �������� �� ��������� �������� ���� ������ � ������� � ������� 
		$this->send_reg_mail($login,$pas,$email);
		
		$sql = "INSERT INTO users(	login, 
									pas, 
									reg_date, 
									user_type,
									email,
									pub_email)
						VALUES	(	'$login',
									'$pas',
									CURDATE(),
									0,
									'$email',
									'$pub_email')";
		$res = $this->db->query($sql) or die("<br>SQL Error in $sql<br>");
	}
	function send_reg_mail($login, $pas, $email){
		$headers .= "Content-type: text/html; charset=koi8-r\r\n";
		$headers .= "From: support@webcat.com.ua\r\n";
		$text .= "�� ���� ������� ���������������� � �������� <a href='http://www.webcat.com.ua'>www.webcat.com.ua</a> � ������� '����������'<br>";	
		$text .= "�����: $login<br>";	
		$text .= "������: $pas<br><br>";	
    	$text .= "������ �������!<br>";
    	$text .= "������������� WebCatalog";    	
		$text = convert_cyr_string ($text,w,k);//����������� ��������� ��������� � koi8-r
    	mail($email,convert_cyr_string ("����������� � �������� WebCat",w,k),$text,$headers);			
	}
	function recovery_pas_mail($login){
		# �������� ������ ��� ���������� ������������ 
		$sql = "SELECT pas, email FROM users WHERE login='$login'";
		$res = $this->db->query($sql);		
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$pas = $row['pas'];
			$email = $row['email'];
		}		
		# ��������� ������ ��� ������
		$headers .= "Content-type: text/html; charset=koi8-r\r\n";
		$headers .= "From: support@webcat.com.ua\r\n";
		$text .= "�� ������� �������������� ������ �������� ��� ��������� ��� ������� � ������ ������� � �������� <a href='http://www.webcat.com.ua'>www.webcat.com.ua</a><br>";	
		$text .= "�����: $login<br>";	
		$text .= "������: $pas<br><br>";	
    	$text .= "������ �������!<br>";
    	$text .= "������������� WebCatalog";    	
		$text = convert_cyr_string ($text,w,k);//����������� ��������� ��������� � koi8-r
    	mail($email,convert_cyr_string ("�������������� ������. ������� WebCat",w,k),$text,$headers);					
	}
	
	function authorize_user($login, $pas){
		$sql = "SELECT uid FROM users WHERE login='$login' AND pas='$pas'";
		//print "sql:$sql<br>";
		$res = $this->db->query($sql);
		//if(!res)print "Error in SQL:$sql";
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$user_id = $row['uid'];
		}		
		return $user_id;
	}
	function get_user_profile(){
		$sql = "SELECT * FROM users WHERE uid='$_SESSION[uid]'";
		//print $sql;
		$res = $this->db->query($sql);
		//if(!res)print "Error in SQL:$sql";
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$user_profile[] = array(login 		=> $row['login'],
									email 		=> $row['email'],
									pub_email 	=> $row['pub_email'],
									icq 		=> $row['icq'],
									tel 		=> $row['tel'],
									region_id 	=> $row['region_id']);
		}
		if($user_profile){
			return $user_profile;
		}else{
			return 0;
		}
	}
	function update_user($user_profile){
//print_r($user_profile);
		if($user_profile[password]!=''){
			$sql_pas = "pas	= '$user_profile[password]',";
		}		
		$sql = "UPDATE users SET $sql_pas
								email 		= '$user_profile[email]',
								pub_email 	= '$user_profile[pub_email]',
								icq 		= '$user_profile[icq]',
								tel 		= '$user_profile[tel]',
								region_id 	= '$user_profile[region_id]'
				WHERE uid = '$_SESSION[uid]'";
		//print $sql;
		$res = $this->db->query($sql);
	}
	function add_advert($advert){
		foreach($advert as $key=>$value){
			$advert[$key] = htmlspecialchars($value);
		}		
		# ������ ��� ��� �� ���� ������ � ��������, ������� ���#
		# ����, ��� �� ���� �� ��������� ������ ��������
		$price = preg_replace('/[^\.,\d]/','',$advert['price']);
		########################################################
		$sql = "INSERT INTO 
					board_advert(	uid,
									cat_id,
									name, 
									annotation, 
									description,
									region_id,
									price,
									currency,
									type,
									email,
									icq,
									tel,
									date_ins)
							VALUES(	'$_SESSION[uid]',
									$advert[cat_id],
									'$_SESSION[login]',
									'$advert[annotation]',
									'$advert[description]',
									$advert[region_id],
									'$price',
									'$advert[currency]',
									$advert[type],
									'$advert[pub_email]',
									'$advert[icq]',
									'$advert[tel]',
									CURDATE())";
		//print "<br><br>".$sql;
		$res = $this->db->query($sql);
	}
	function get_path($cat_id){
		#�������� cat_left � cat_right ��� ��������� ������� �� ����������
		$cat_data = $this->get_category($cat_id);
		
		$sql = "SELECT cat_id, cat_name FROM board_catalog WHERE cat_level > 0 AND cat_left <= ".$cat_data['cat_left']." AND cat_right >= ".$cat_data['cat_right']." ORDER BY cat_left";
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$path[] = array("cat_name" 	=> $row['cat_name'],
							"cat_id" 	=> $row['cat_id']);
		}
		return $path;
	}
#########################################################
# ������� ���������� ��� �������� �������� ��� ��������� ���������
# input parameters:
# - $cat_id - ������������� ���������, ��� ������� ���� �����
#########################################################
	function get_children($cat_id){
		#�������� cat_left � cat_right ��� ��������� ������� �� ����������
		$cat_data = $this->get_category($cat_id);
		
		$sql = "SELECT * FROM board_catalog WHERE cat_left > ".$cat_data['cat_left']." AND cat_right < ".$cat_data['cat_right']." ORDER BY cat_left";		
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$prefix = '';
			for($i=1;$i<$row['cat_level'];$i++){
				$prefix .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			}						
			$num_goods = 0;
			if(($row['cat_right'] - $row['cat_left'])==1){
				$sql_2 = "	SELECT 	id 
							FROM 	board_advert
							WHERE 	cat_id=".$row['cat_id'];
				$result = mysql_query($sql_2);
				$num_goods = mysql_num_rows($result);
			}
			$catalog_data[] = array(	"cat_id"	=> $row['cat_id'],
										"cat_name" 	=> $row['cat_name'],
										"cat_level"	=> $row['cat_level'],
										"cat_left"	=> $row['cat_left'],
										"cat_right"	=> $row['cat_right'],
										"prefix" 	=> $prefix,
										"num_goods" => $num_goods);
		}
		return $catalog_data;
	}
	function get_cat_mes($cat_id, $pg, $pages_per_page, $cols_pages_in_block, $smarty, $type='',$region_id=''){
		if($type and $type!=-1){
			$type_sql = "AND type=$type";
		}else{
			$type_sql = "";
		}
		if(!$region_id or $region_id==-1){
			$region_sql = "";
		}else{
			$region_sql = "AND region_id=$region_id";
		}
		# ����������� ������������� ������
		$sql = "SELECT 	id
				FROM 	board_advert 
				WHERE 	cat_id=$cat_id $type_sql $region_sql 
						ORDER BY date_ins DESC";
		//print $sql."<br>";
		//print "<br>1---<br>";
		$res = mysql_query($sql);    	
		$num_rows = mysql_num_rows($res);		
		
		#col_of_pages - ���-�� ������� �������
    	$num_pages = ceil($num_rows/$pages_per_page);//���-�� ������� ������� ��� ������������ $ppp;		

    	$smarty->assign("num_pages",$num_pages);
    	$smarty->assign("i",0);

    	#########################################################
    	#������������ ������������ �����
    	#########################################################
		# ��� ���������� ��� ���� ��� �� ��������� �������� ������ "���������" � ������� ���������������
    	$smarty->assign("num_pages",$num_pages);
    	$num_digits = $cols_pages_in_block;

    	# �������� ����������� ������������ � ����� "�������" ��������� ��������� ��������
    	$temp_koef = floor($pg/($num_digits+1));

    	# ������ ���� �������
    	$first_el = $temp_koef*$num_digits+1;
    	//print "first:$first_el<br>";

    	# ���������� ������ ������� �������, ��� �� ������������ ���� �� ��������� ������ ������� ��� ���� �� ����� ����
    	if($num_pages < (($temp_koef+1)*$num_digits) ){
    		$second_el = $num_pages;
    	}else{
    		$second_el = ($temp_koef+1)*$num_digits;
    	}
    	//print "second:$second_el<br>";
		//print "test";
    	# �������� ������ ������� 	
    	for($i=$first_el;$i<=$second_el;$i++){
    		$page_array[] = $i;
    	}
    	//print_r($page_array);
    	# � ������� ��� � ������
    	$smarty->assign("page_array",$page_array);
		#########################################################
		
    	$L_limit = ($pg*$pages_per_page-$pages_per_page);//����� ������������ ��� SQL �������
        $R_limit = $pages_per_page;//������ ������������ ��� SQL �������
    			
		$sql = "SELECT 	ba.id,
						ba.uid,
						ba.cat_id,
						ba.name,
						ba.annotation,
						ba.description,
						r.region_name,
						ba.price,
						ba.currency,
						ba.type,
						ba.email,
						ba.icq,
						ba.tel,
						DATE_FORMAT(ba.date_ins,'%d.%m.%y') as date_ins
				FROM 	board_advert ba, 
						region r
				WHERE 	ba.cat_id=$cat_id $type_sql $region_sql 
						AND r.id=ba.region_id 

						ORDER BY date_ins ASC LIMIT $L_limit,$R_limit";

		//print $sql."<br>";
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			if($row['type']==1){
				$type_name = "�����";
			}elseif($row['type']==2){
				$type_name = "������";
			}
			if($row['currency']=='uah'){
				$currency = "���.";
			}elseif($row['currency']=='usd'){
				$currency = "�.�";
			}			
			$messages[] = array(	"id"			=> $row['id'],
									"uid"			=> $row['uid'],
									"name"			=> $row['name'],
									"annotation"	=> $row['annotation'],									
									"description"	=> $row['description'],
									"region_name"	=> $row['region_name'],
									"price"			=> $row['price'],
									"currency" 		=> $currency,
									"type" 			=> $type_name,
									"email" 		=> $row['email'],									
									"icq" 			=> $row['icq'],									
									"tel" 			=> $row['tel'],
									"date_ins" 		=> $row['date_ins']);
		}
    	
		//print_r($messages);
		return $messages;
	}
	function get_category($cat_id){
		$sql = "SELECT * FROM board_catalog WHERE cat_id=$cat_id";
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$cat_data = array(	"cat_id"	=>$row['cat_id'],
								"cat_name" 	=>trim($row['cat_name']),
								"cat_level" =>$row['cat_name'],
								"cat_left" 	=>$row['cat_left'],
								"cat_right" =>$row['cat_right'],);
		}
		return $cat_data;
	}
	function get_active_types($cat_id){
		if($_SESSION['region_id']){
			$region_sql = "AND region_id=".$_SESSION['region_id'];
		}		
		$sql = "SELECT type FROM board_advert WHERE cat_id=$cat_id $region_sql GROUP BY type";
		//print "<br>".$sql;
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			if($row['type']==1){
				$type_name = "�����";
			}elseif($row['type']==2){
				$type_name = "������";
			}
			$type_list[] = array(	"id"		=>$row['type'],
									"type_name" =>$type_name);
		}
		return $type_list;
	}
}

?>