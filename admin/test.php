<?
$separator = $_SESSION['separator'];
$fcontents = file ($uploaddir."\\temp.csv");
$final_price = array();#������ � ������� ����� ����������� ����� �������� �� ��������
//print "separator:$separator<br>";
#������� ���� �� ����� ����� ������	
while (list ($line_num, $line) = each ($fcontents)) {
//print $line."<br>";
	//include("test.php");
//print "count<br>";
	
$price = array();
//$separator = ';';
//$line = '��������� ��������, Nokia, 1600 black,"test, one, more test",134';
//$line = '��������� ��������; Nokia; 1600 black;"test; one; more test";134';

//$line = '"test, one, more test",134,Samsung,E530';
//$line = '"test; one; more test";134;Samsung;E530';

//$line = '��������� ��������, Nokia, 1600 black,134';
//$line = '��������� ��������; Nokia; 1600 black;134';
//$line = '145';
//print $line."\n";
//print "-------------------------------------------------------------\n";
while($line){
	//print $i."\n\n";
/**
 * �������� - �������� �� ������ �������� � ��������.
 */
	$reg_exp = '\"'.$separator;
	if(ereg ($reg_exp, $line, $regs)){
		#������ ������� ������ �� 2 �����: �� ��������� ������� � ����������� � �����		
		$reg_exp = '/"'.$separator.'/';
		$temp = preg_split($reg_exp,$line,2,PREG_SPLIT_NO_EMPTY);
		/**
	 	* �������� ������ �������� ������, ��� ����, ��� �� ��������� ���� ������ ��� �������,
	 	* ��� ������ $line �� �������
	 	*/
		$reg_exp = '"'.$separator;
		$line = str_replace($temp[0].$reg_exp,'',$line);
		#����, ���� �� � ������ ����� ������("<�����������>) ������� ����������� � �������
		$reg_exp = $separator.'"';
		if(ereg ($reg_exp, $temp[0])){
			$reg_exp = '/'.$separator.'"/';
			$temp2 = preg_split($reg_exp,$temp[0],2,PREG_SPLIT_NO_EMPTY);		
			/**
		 	* �������� ������ ����� ������ �� ��������� ������("<�����������>) <�����������>
		 	*/
			$temp3 = split($separator,$temp2[0]);
			/**
		 	* ������� ������ ������� �� ����������� ������� � ���������� � �������� ������ 
		 	* �������
		 	*/
			foreach ($temp3 as $k=>$v) {
				array_push($price,trim($v));
			}
			#������ ��������� � �������� ������ ������ ����� $temp2
			array_push($price,$temp2[1]);
			/**
		 	* ��������� �� ����� �����
		 	*/
			$temp2 = array();
			$temp3 = array();		
		#���� �� �������� ����, �� ��� ��������, ��� ������ �� ������� �������� ���������	
	}else{
		$tmp_var = str_replace('"','',$temp[0]);
		array_push($price,trim($tmp_var));
	}
	/**
	* ���� �� �����, ������ ������ ������� � ������ ��� � ��� ������ ���� ��������� �� 
	* <�����������>
	*/
	}else{
//print "separator:$separator<br>";
		$temp4 = split($separator,$line);		
		/**
	 	* � ��������� � �������� �������
	 	*/
		foreach ($temp4 as $k=>$v) {
			array_push($price,trim($v));
		}
		/**
	 	* �������� ������ � ��-���� ����������� ��������� ������
	 	*/
		$line = '';
	}
}
//print "-------------------------------------------------------------\n";
//print "�������� ������:\n";
//print_r($price);
//print "-------------------------------------------------------------\n";
//print "line:$line";		
	#���������� ������������ ������ � ������
	array_push($final_price,$price);		

	}	
//print_r($final_price);
?>