<?
class Pricer{
	function __construct($db,$smarty,$uploaddir){
		$this->db = $db;
		$this->smarty = $smarty;
		$this->uploaddir = $uploaddir;
		$this->column_verification = true;# ���� �������� �� ������� ���� ������������ �����, ���� �� false - ������ �������� �� ������
		$this->doubling_cols = array();
		$this->show_rename_categories=true;
	}
	function upload_price(){
		if($_FILES['userfile']['tmp_name']){
			//print $this->uploaddir;
			if(!is_dir($this->uploaddir)){
				mkdir($this->uploaddir);
	    	}
//print "id:".$_SESSION['seller_id']."<br>";
	    	if (move_uploaded_file($_FILES['userfile']['tmp_name'], $this->uploaddir ."/temp".$_SESSION['seller_id'].".csv")) {
			//print "UPLOADED<br>";
			}else {
			    print "There some errors with uploading file!";
			}
		}	
	}
	function price_verification($column,$rename_categories=''){
//print_r($rename_categories);

		/**
	 	* ����� �� ����� ���������� ������ �������� ������ �� ������������ ����� ������
	 	* ����������:
	 	* - ��������� ������������ ��������� ������������ �������������, ���������� 
	 	* ������� ������(�� ������� �������� ���������)
	 	* - �������� �� ���������� ������������ ��������� � ��������
	 	* - � ������ ����������� ������ �� ��������� ������� - ������� ��������� ���������
	 	* 
	 	* �������� �� ��������������� �������.
	 	* ������� 
	 	*/

		$this->error_message = '';
		$this->dublicate_columns($column);
		$this->dublicate_hard_columns($column);
		
		############################################################################# 
		# �������� ������ ������������ ������� ������� �� ���� ���������
		# ��� �� ������� ������������� ���������� $this->column_verification
		#############################################################################		
		$this->absent_column = $this->obligatory_cols($column);
#############################################################################
# � ��� ����� �� �������� ���� ��������� �� ������������ 
# ���������� 3-��(�������) ������
#############################################################################		
		#####################################################################		
		# �������� ��� �����
		#####################################################################
		$final_price = $this->price_parser();
#############################################################################		
# ��������� ��� ������(��������� ������ ������� � �����) ��� ������� � ����
#############################################################################		
		for($i=0;$i<count($final_price);$i++){
			for($j=1;$j<=count($column);$j++){
				if($column[$j]!='-1'){
					$temp_price[$i][$column[$j]] = $final_price[$i][($j-1)];
				}
			}
		}
#############################################################################							
# ������ �������� ������ ��������� ������� ������
#############################################################################		
		$seller = new load_sellers($this->db,$this->smarty);
		$bot_level_cat = $seller->get_all_bottom_level_categories();

#############################################################################
# ������ �������� ����������:
# ����, ������ $rename_categories ���������������, �� ������ ����� �� ��������
# � ��� ��� ������������� � �� ��������� ����� �� ��������� �� ���� ���������
#############################################################################
		$cat_verification = true;# �������������� ����������, ����������� �� ��, ��� ��� ��
		
		if(isset($rename_categories)){
			if( count(array_keys($rename_categories,'-1'))>0 ){
				$cat_verification = false;
			}else{
				$cat_verification = true;
			}	
#############################################################################
# ����, ������ �� ���������������, ������ �� ��� ��������������
#############################################################################
		}else{
			for($i=0;$i<count($temp_price);$i++){
				if(!array_keys($bot_level_cat,$temp_price[$i]['cat'])){
					$rename_categories[$temp_price[$i]['cat']] ='-1';
					#$rename_categories[htmlspecialchars($temp_price[$i]['cat'], ENT_QUOTES)] ='-1';
					$cat_verification = false;					
				}					
			}
		}
		//print_r($rename_categories);
		//print "cat_verification:$cat_verification<br>";
#############################################################################		
# ���������� ������ ��������� ��� ��������� ��� ���,
# �������� ��� ��� ����, ��� �� �� ���������� ������ ��������� ���� � ��� 
# �� ������� ������� "���������" ��� ��� �������������� � � �������� ��������
# ������ ����� ���� ������������ ������� ��������� ��� �� ������
#############################################################################
		if($this->show_rename_categories){
			$this->smarty->assign("rename_categories",$rename_categories);
		}
		
		$this->smarty->assign("bot_level_cat",$bot_level_cat);

		if(array_search('-1',$column)){
			$this->warning = '�� ���� �������� ������ ��������� ����, ���� �� �� �������� ���, ��� �� ����� ������������� � ����, ������ �� �� ����������?';
		}
#############################################################################
# �� ����� ������������ ���� � ������:
# - ��������� ������
# - �������������...���� ���� ����� ��� �������� ��� ��������� ���������! 
# - �������� ������
# - ���� ������(� ������� ��� � �.�)
# ���� ������������ �������� �� ������� ���� �����
#############################################################################
		//$this->column_verification = true;# ���� �������� �� ������� ���� ������������ �����, ���� �� false - ������ �������� �� ������
		
//		############################################################################# 
//		# �������� ������ ������������ ������� ������� �� ���� ���������
//		# ��� �� ������� ������������� ���������� $this->column_verification
//		#############################################################################		
//		$this->absent_column = $this->obligatory_cols($column);

###########################	
		
		if(!$this->column_verification){#���� �������� �� ������, ������� ��������� � ������
			$this->smarty->assign("is_absent_err",1);
			$this->smarty->assign("absent_column",$this->absent_column);#�������� � ������ ������ ������������� ������������ �����
		}
		if($this->error_message!=''){
			$this->smarty->assign("multiple_column_error",1);
			$this->smarty->assign("err_mes",$this->error_message);
		}
		/**
	 	* ������ ���������� ��������� ����� �������
	 	* �� ����� � ��� ������ $columns[<����� �������>] = '<�������� �������>'
	 	* ��� �� �� � �������� ������� � ������
	 	*/		
		$this->smarty->assign("column",$column);			
		if($this->column_verification and $this->error_message=='' and $cat_verification){
			return 1;#������ ������
		}else{
			return 0;#���������� ���������
		}
	}
	function price_parser(){
		//������� ����� ������
		$separator = $_SESSION['column_separator'];
		$this->static_line = '';
		$this->line_integrity = 0;
		#$this->fcontents = file ($this->uploaddir."\\temp".$_SESSION['seller_id'].".csv");
		$this->fcontents = file ($this->uploaddir."/temp".$_SESSION['seller_id'].".csv");
		$this->final_price = array();#������ � ������� ����� ����������� ����� �������� �� ��������
		#������� ���� �� ����� ����� ������	
		while (list ($this->line_num, $this->line) = each ($this->fcontents)) {
			//print "line:".$this->line."<br>";
			$this->price = array();
			//�������� ������
			//$line = '��������� ��������, Nokia, 1600 black,"test, one, more test",134';
			//$line = '��������� ��������; Nokia; 1600 black;"test; one; more test";134';
			//$line = '"test, one, more test",134,Samsung,E530';
			//$line = '"test; one; more test";134;Samsung;E530';
			//$line = '��������� ��������, Nokia, 1600 black,134';
			//$line = '��������� ��������; Nokia; 1600 black;134';
			//$line = '145';
			
			setlocale(LC_ALL, 'ru_RU');
			$reg_exp = "/^\"\w/";
			if(preg_match_all($reg_exp, $this->line, $regs1)){
				//print_r($regs1)."<br>";
				foreach ($regs1 as $key=>$val){
					for($i=0;$i<count($val);$i++){
						$this->line_integrity ++;						
					}
				}
				//print "<br>line_integrity_inside:$this->line_integrity<br>";				
			}
			
			$reg_exp = "/$separator\"[^$separator]/";
			if(preg_match_all($reg_exp, $this->line, $regs2)){
				//print_r($regs2)."<br>";
				foreach ($regs2 as $key=>$val){
					for($i=0;$i<count($val);$i++){
						$this->line_integrity ++;						
					}
				}
				//print "<br>line_integrity_inside:$this->line_integrity<br>";				
			}
			$reg_exp1 = "/[^$separator\"]{0,1}\"$separator/";
//			$reg_exp1 = "/[^$separator\"]{1}\"$separator/";
			$reg_exp2 = "/\w\"{3}$separator/";
//			$reg_exp3 = "/^\"$separator/";						
			if(preg_match_all($reg_exp1, $this->line, $regs3)){
				//print_r($regs3)."<br>";
				foreach ($regs3 as $key=>$val){
					for($i=0;$i<count($val);$i++){
						$this->line_integrity --;	
					}
				}
				//print "<br>line_integrity_inside:$this->line_integrity<br>";				
			}elseif (preg_match_all($reg_exp2, $this->line, $regs3)){
				//print_r($regs3)."<br>";
				foreach ($regs3 as $key=>$val){
					for($i=0;$i<count($val);$i++){
						$this->line_integrity --;	
					}
				}				
			}
/*
			elseif (preg_match_all($reg_exp3, $this->line, $regs3)){
				print_r($regs3)."<br>";
				foreach ($regs3 as $key=>$val){
					for($i=0;$i<count($val);$i++){
						$this->line_integrity --;	
					}
				}				
			}			
*/			
			
			
			$this->static_line .= $this->line;
			//print "----<br>";
			//print "line_integrity:$this->line_integrity<br><br>";
			if($this->line_integrity>0){
				continue;	
			}
			$this->line = $this->static_line;			
			
			
			while($this->line){
			//print "line:".$this->line."<br>";
/*				
				print "<br>******************************<br>";
				print "line_integrity:$this->line_integrity<br>";
				print "line_x:".$this->line."<br>";				
				print "******************************<br>";				
				print "last_line:".$this->line."<br>";
*/				
				# �������� - �������� �� ������ �������� � ��������. 
				# �������� �� ����������� ������: �������+�����������
				$this->reg_exp = '\"'.$separator;
				if(ereg ($this->reg_exp, $this->line, $this->regs)){
					#������ ������� ������ �� 2 �����: �� ��������� �������+����������� � �����		
					$this->reg_exp = '/"'.$separator.'/';
					$this->temp = preg_split($this->reg_exp,$this->line,2,PREG_SPLIT_NO_EMPTY);
//print "<br>temp:<br>";
//print_r($this->temp);
					/**
	 				* �������� ������ �������� ������, ��� ����, ��� �� ��������� ���� ������ ��� �������,
	 				* ��� ������ $line �� ������
	 				*/
					$this->reg_exp = '"'.$separator;
					$this->line = str_replace($this->temp[0].$this->reg_exp,'',$this->line);
//print "<br>------<br>";
//print "line_after_replace:".$this->line."<br><br>";
					#����, ���� �� � ������ ����� ������(�������+�����������) ������� ����������� � �������
					$this->reg_exp = $separator.'"';
					if(ereg ($this->reg_exp, $this->temp[0])){
						$this->reg_exp = '/'.$separator.'"/';
						$this->temp2 = preg_split($this->reg_exp,$this->temp[0],2,PREG_SPLIT_NO_EMPTY);		
//print "<br>temp2:<br>";
//print_r($this->temp2);
						#�������� ������ ����� ������ �� ��������� ������(�������+�����������) <�����������>
						$this->temp3 = split($separator,$this->temp2[0]);
//print "<br>temp3:<br>";
//print_r($this->temp3);
						/**
			 			* ������� ������ ������� �� ����������� ������� � ���������� � �������� ������ 
			 			* �������
			 			*/
						foreach ($this->temp3 as $this->k=>$this->v) {
							array_push($this->price,trim($this->v));
						}
						#������ ��������� � �������� ������ ������ ����� $temp2
						$this->temp2[1] = preg_replace('/\"\"/','"',$this->temp2[1]);
						array_push($this->price,$this->temp2[1]);
		 				#��������� �� ����� �����
						$this->temp2 = array();
						$this->temp3 = array();		
						#���� �� �������� ����, �� ��� ��������, ��� ������ �� ������� �������� ���������	
					}else{
//print "<br>------:<br>";
//print $this->temp[0];
//print "<br>------:<br>";
						#$this->tmp_var = str_replace('"','',$this->temp[0]);
						$this->tmp_var = preg_replace('/^\"{1}/','',$this->temp[0]);
						$this->tmp_var = preg_replace('/\"\"/','"',$this->tmp_var);
//print $this->tmp_var."<br>";
						array_push($this->price,trim($this->tmp_var));
					}
					/**
					* ���� �� �����, ������ ������ ������� � ������ ��� � ��� ������ ���� ��������� �� 
					* <�����������>
					*/
				}else{
					$this->temp4 = split($separator,$this->line);		
					
	 				#� ��������� � �������� �������
	 				foreach ($this->temp4 as $this->k=>$this->v) {
						array_push($this->price,trim($this->v));
					}
					$this->line = '';
	 				#�������� ������ � ��-���� ����������� ��������� ������
				}
				
				$this->static_line = '';
				$this->line_integrity = 0;
			}
#############################################################################
# ���������� ������������ ������ � ������
#############################################################################
			array_push($this->final_price,$this->price);		
		}	
//print "<br><br>";
		//print_r($this->final_price);		
		return $this->final_price;
		//print_r($final_price);		
	}
	function import_price($column, $rename_categories){
		$seller_id = $_SESSION['seller_id'];
		$final_price = $this->price_parser();
		
		$goods = new Goods($this->db);

#############################################################################		
# ����� �������� ������ �������� ���� ������� ������� ��������
#############################################################################
		$num_deleted_rows = $this->delete_seller_price($seller_id);
		
#############################################################################		
# ��������� ��� ������(��������� ������ ������� � �����) ��� ������� � ����
#############################################################################
		for($i=0;$i<count($final_price);$i++){
			for($j=1;$j<=count($column);$j++){
				if($column[$j]!='-1'){
					$this->temp_price[$i][$column[$j]] = $final_price[$i][($j-1)];
				}
			}
		}
		$inserted_rows_counter = 0;
#############################################################################		
# ������  ��� ����� ������ ������ � ���� ������		
#############################################################################
		foreach ($this->temp_price as $val){
#############################################################################
# �������� id ������������� � ��������� ��� ������ ������� �� �������
#############################################################################
			$vendor_id = null;
			$cat_id = null;
			
#############################################################################			
# ����� 1 - ����� cat_id ��� ������� ������ � ����
#############################################################################

#############################################################################
# ���� ������� ��������� ���������� � ������� ������(rename_categories), �� ��� �� ���� 
# ������ �� � ����.
# �� ����� ��� �� �������
#############################################################################
			//print "val:".$val['cat']."<br>";
			//print_r($rename_categories);

			if(array_key_exists($val['cat'],$rename_categories)){
				$cat_id = $rename_categories[$val['cat']];
			}else{
				$sql = "SELECT cat_id FROM catalog WHERE cat_name='".$val['cat']."'";
				//print "$sql<br>";
				$result = $this->db->query($sql);
				while ($row = $result->fetchrow(DB_FETCHMODE_ASSOC)){
					$cat_id = $row['cat_id'];
				}							
			}
				
#############################################################			
# �������� � ������� vendor_transfer, ��� ���������� ��� ���������� ����������� 
# ���������� ��������������, �� ���� ��������� �������������� ����� ��� �������, �� ��� ��
# ��������� ��
# ��� �� ���� �������� �� �� ����� ��� ������� ��� ������:
# - "�������������" 
# - "������������� + �����"
# ���� "������������� + �����" - �� ����� ������ �� 2 ����� 
#############################################################
			if(array_key_exists('vendor',$val)){
				$vendor_name = htmlspecialchars($val['vendor'], ENT_QUOTES);
				if($val['gname']){$gname = htmlspecialchars($val['gname'], ENT_QUOTES);}
			}elseif(array_key_exists('vg',$val)){
				$temp = split(' ',$val['vg']);
				$vendor_name = htmlspecialchars($temp[0], ENT_QUOTES);
				$gname = htmlspecialchars($temp[1], ENT_QUOTES);
			}

			$sql = "SELECT vendor_id FROM vendor_transfer WHERE transfer_name='$vendor_name'";
			//print $sql;
			$result = $this->db->query($sql) or die ("Error in SQL query:$sql");
			//print $sql;
			while ($row = $result->fetchrow(DB_FETCHMODE_ASSOC)){
				$vendor_id = $row['vendor_id'];
			}
			if($vendor_id){
				
			}else{
				$vendor = new Vendor($this->db);
				$vendor_id = $vendor->is_exist($vendor_name, $cat_id);
#############################################################
# ����� 2 - �������� �� ������������� � ���� �������������, ���� ��� - ������� � �������� id
# ���� ������������� ��� � ����, �� �� ��� ������� � �������� ��� id
#############################################################
				if(!$vendor_id){
					$sql = "INSERT INTO vendors(cat_id, vendor_name) VALUES($cat_id, '$vendor_name')";
					$result = $this->db->query($sql);				
					if(!$result)print "Error in SQL query:$sql";
					$vendor_id = mysql_insert_id();
				}				
			}
#############################################################
# ����� 3 - ������ ������ � ����
#############################################################
			//if($val['cat']){$cat = $val['cat'];}else{$cat = '';}
			//if($val['vendor']){$vendor = $val['vendor'];}else{$vendor = '';}
#############################################################
/**
 * ��������� ����	
 * ������� �������� ���� - ���� ��� ��� � ��������, �� ����� ���� �� ��������� �� ������� curs
 * 
 * ��������� ����(price_ua, price_usd, price_opt_ua, price_opt_usd) - ���� ���� �� ���� � ���� 
 * ����� ����, �� ������ ���� �������� ��� ����� �� ����, � ����������� �� ���� ���. ��� �.�
*/ 
#############################################################
# �������� ����
#############################################################
			# ��������� ���� ��������, ���� ��� ��� - �������� ���������
			$seller = new Seller($this->db);
			$curs = $seller->get_seller_curs();
			if(!$curs){
				$curs = $seller->get_def_curs();
			}
#############################################################
			if($val['price_ua']){
				$price_ua = $val['price_ua'];
				$price_ua = preg_replace('/[^\.,\d]/','',$price_ua);
				$price_ua = str_replace(',','.', $price_ua);
			}else{
				$price_ua = 0;
			}			
			if($val['price_usd']){
				$price_usd = $val['price_usd'];
				$price_usd = preg_replace('/[^\.,\d]/','',$price_usd);				
				$price_usd = str_replace(',','.', $price_usd);				
			}else{
				$price_usd = 0;
			}
			if($val['price_opt_ua']){
				$price_opt_ua = $val['price_opt_ua'];
				$price_opt_ua = preg_replace('/[^\.,\d]/','',$price_opt_ua);
				$price_opt_ua = str_replace(',','.', $price_opt_ua);								
			}else{
				$price_opt_ua = 0;
			}
			if($val['price_opt_usd']){
				$price_opt_usd = $val['price_opt_usd'];
				$price_opt_usd = preg_replace('/[^\.,\d]/','',$price_opt_usd);				
				$price_opt_usd = str_replace(',','.', $price_opt_usd);
			}else{
				$price_opt_usd = 0;
			}
# ����� :) ��� ��� ���			
#############################################################
# ������ � ��� ���� � ���� � ����, �������� �������� � ��������� ������� �������
#############################################################
			if($price_ua==0 and $price_usd!=0){
				$price_ua = $price_usd*$curs;
			}elseif($price_ua!=0 and $price_usd==0){
				$price_usd = $price_ua/$curs;
			}

			if($price_opt_ua==0 and $price_opt_usd!=0){
				$price_opt_ua = $price_opt_usd*$curs;
			}elseif($price_opt_ua!=0 and $price_opt_usd==0){
				$price_opt_usd = $price_opt_ua/$curs;
			}

#############################################################
			//print "desc:".$val['desc']."<br><br>";
			if($val['desc']){$desc = htmlspecialchars($val['desc'], ENT_QUOTES);}else{$desc = '';}
			//print "desc_after:".$desc."<br><br>";			
			if($val['guarantee']){$guarantee = preg_replace('/\D*/','',$val['guarantee']);}else{$guarantee = '';}
			if($val['url']){$url = $val['url'];}else{$url = '';}
			if($val['presence']){$presence = htmlspecialchars($val['presence'], ENT_QUOTES);}else{$presence = '';}
#############################################################			
# �������� �� ������������ ����� �� cat_id,seller_id,name - �� ���� ����� ��� ��� �����
# ������� ���� �� ������������
#############################################################									
//			$sql = "SELECT * FROM goods WHERE cat_id=$cat_id AND name='$gname' AND seller_id=$seller_id AND date_last_mod=CURDATE()";
//			$num_dublicated_rows = $this->count_price_rows($sql);
//			if(!$num_dublicated_rows){
			# ��������� ���������� ������� � ������� ������!
			if($price_ua!=0 or $price_usd!=0){
				$goods->add_new_position($cat_id, $vendor_id, $seller_id, $gname, $desc, $price_usd, $price_ua, $price_opt_usd, $price_opt_ua, $guarantee, $url, $presence);
				$inserted_rows_counter++;
			}				
//			}else{
//				print "<br>������� ��������!!!";
//			}
		}
		$this->smarty->assign("num_inserted_rows", $inserted_rows_counter);
		$this->smarty->assign("num_deleted_rows", $num_deleted_rows);	
		
#############################################################			
# � ��� ������ ��������� ���� ����� �������
#############################################################			
unlink($this->uploaddir ."/temp".$_SESSION['seller_id'].".csv");
		
	}
	/**
	 * ������� �������� ���-�� ���� ������� ��� ������������� ��������
	 */
	function count_price_rows($sql){
		$result = mysql_query($sql);
		$num_rows = mysql_num_rows($result);
		return $num_rows;
	}
	function delete_seller_price($seller_id){

		#$sql = "DELETE FROM goods WHERE seller_id=$seller_id AND date_last_mod < CURDATE()";				
		$sql = "DELETE FROM goods WHERE seller_id=$seller_id";
		$res = mysql_query($sql);			
		if(!$res)print "Error in SQL query:$sql";		
		#���������� ���-�� ��������� �����
		$num_rows = mysql_affected_rows();
		if(!$num_rows){$num_rows=0;}
		return $num_rows;
	}
	/**
	 * �������� �� ������������ ������� �������, ����� ������������ ����� ���� ��� 
	 * "��������� + ������������� + �����" � "���������" � �.�
	 *
	 * @param unknown_type $column
	 */
	function dublicate_hard_columns($column){
		
		#catvg
		if( count(array_keys($column,'catvg')) and count(array_keys($column,'gname')) ){
			$this->error_message .= "������������ �������� \"��������� + ������������� + �����\" � \"�����\"<br>";
		}
		if( count(array_keys($column,'catvg')) and count(array_keys($column,'vendor')) ){
			$this->error_message .= "������������ �������� \"��������� + ������������� + �����\" � \"�������������\"<br>";
		}
		if( count(array_keys($column,'cat')) and count(array_keys($column,'catvg')) ){
			$this->error_message .= "������������ �������� \"��������� + ������������� + �����\" � \"���������\"<br>";		
		}
		#vg#############################
		if( count(array_keys($column,'catvg')) and count(array_keys($column,'vg')) ){
			$this->error_message .= "������������ �������� \"������������� + �����\" � \"��������� + ������������� + �����\"<br>";	
		}
		if( count(array_keys($column,'vendor')) and count(array_keys($column,'vg')) ){
			$this->error_message .= "������������ �������� \"������������� + �����\" � \"�������������\"<br>";
		}
		if( count(array_keys($column,'gname')) and count(array_keys($column,'vg')) ){
			$this->error_message .= "������������ �������� \"������������� + �����\" � \"�������������\"<br>";
		}		
		return $this->error_message;
	}
	/**
	 * ������� �������� �� ���������� ����� � ��� �� ������� ��������� ���
	 *
	 */
	function dublicate_columns($column){
//		for($this->i=1;$this->i<=13;$this->i++){
//			if($column[$this->i]=='cat'){
//				for($this->j=$this->i+1;$this->j<13;$this->j++){
//					if($column[$this->j]=='catvg'){
//						$this->error_message .= "������������ �������� \"���������\" � \"��������� + ������������� + �����\" ";
//					}
//				}
//			}elseif ($column[$this->i]=='catvg'){
//				for($this->j=$this->i+1;$this->j<=13;$this->j++){
//					if($column[$this->j]=='vg'){
//						$this->error_message .= "������������ �������� \"��������� + ������������� + �����\" � \"������������� + �����\"<br>";
//					}elseif ($column[$this->j]=='vendor'){
//						$this->error_message .= "������������ �������� \"��������� + ������������� + �����\" � \"�������������\"<br>";
//					}elseif ($column[$this->j]=='gname'){
//						$this->error_message .= "������������ �������� \"��������� + ������������� + �����\" � \"�����\"<br>";
//					}
//				}			
//			}elseif ($column[$this->i]=='vendor'){
//				for($this->j=$this->i+1;$this->j<=13;$this->j++){
//					if($column[$this->j]=='vg'){
//						$this->error_message .= "������������ �������� \"�������������\" � \"������������� + �����\"<br>";
//					}elseif ($column[$this->j]=='catvg'){
//						$this->error_message .= "������������ �������� \"�������������\" � \"��������� + ������������� + �����\"<br>";
//					}			
//				}
//			}
//		}
		#������ �������� �� ������������ ����� ��� ����������
		if( count(array_keys($column,'vendor')) >1){
			$this->error_message .= "������������ ������� \"�������������\"<br>";
		}
		if( count(array_keys($column,'cat')) >1){
			$this->show_rename_categories = false;
			$this->error_message .= "������������ ������� \"���������\"<br>";
		}
		if( count(array_keys($column,'catvg')) >1){
			$this->error_message .= "������������ ������� \"���.+������.+�����\"<br>";
		}
		if( count(array_keys($column,'vg')) >1){
			$this->error_message .= "������������ ������� \"������.+�����\"<br>";
		}		
		if( count(array_keys($column,'gname')) >1){
			$this->error_message .= "������������ ������� \"�����\"<br>";
		}		
		if( count(array_keys($column,'price_ua')) >1){
			$this->error_message .= "������������ ������� \"����(���)\"<br>";
		}
		if( count(array_keys($column,'price_usd')) >1){
			$this->error_message .= "������������ ������� \"����(�.�)\"<br>";
		}
		if( count(array_keys($column,'price_opt_ua')) >1){
			$this->error_message .= "������������ ������� \"���� ���(���)\"<br>";
		}
		if( count(array_keys($column,'price_opt_usd')) >1){
			$this->error_message .= "������������ ������� \"���� ���(�.�)\"<br>";
		}
		if( count(array_keys($column,'desc')) >1){
			$this->error_message .= "������������ ������� \"��������\"<br>";
		}
		if( count(array_keys($column,'guarantee')) >1){
			$this->error_message .= "������������ ������� \"��������\"<br>";
		}												
		if( count(array_keys($column,'url')) >1){
			$this->error_message .= "������������ ������� \"URL\"<br>";
		}
		if( count(array_keys($column,'presence')) >1){
			$this->error_message .= "������������ ������� \"�������\"<br>";
		}		
		return $this->error_message;
	}
	
	function obligatory_cols($column){
		if(array_search('cat',$column) or array_search('catvg',$column)){	

		}else {
			$this->column_verification = false;
			$this->show_rename_categories = false;
			$absent_column[]="���������";
		}
		if(array_search('vendor',$column) or array_search('catvg',$column) or array_search('vg',$column)){

		}else {
			$this->column_verification = false;
			$absent_column[]="�������������";			
		}
		if(array_search('gname',$column) or array_search('catvg',$column) or array_search('vg',$column)){
			
		}else {
			$this->column_verification = false;
			$absent_column[]="�����";						
		}
		if(array_search('price_ua',$column) or array_search('price_usd',$column) or array_search('price_opt_ua',$column) or array_search('price_opt_usd',$column)){
			
		}else {
			$this->column_verification = false;
			$absent_column[]="����";									
		}		
		return $absent_column;
	}
}

?>