<?
setlocale(LC_ALL, 'ru_RU');
/*
$line='"��������� 21""";PHILIPS;21PT5221/60;176;"����� ��� ��������� .���� :  ������� Sleep Timer.��������� .�������� ������� Nicam Stereo. �������� �������� (��. �����.) :  2 x 5 ��. ';
print "<b>������</b>:$line<br>";
$reg_exp = "/^\"\w/";
print "<b>���������� ���������:</b>$reg_exp<br>";
if(preg_match_all($reg_exp, $line, $regs)){
	print "<b>������� ������ ���������� ���������� � ���������:</b><br>";
	print_r($regs)."<br>";
}else{
	print "<br><b>���������� � ��������� ���</b>";
}
*/
$line_integrity = 0;
$separator = ';';
$line='"��������� 24""";PHILIPS;21PT5221/60;176;"����� ��� ��������� .���� :  ������� Sleep Timer.��������� .�������� ������� Nicam Stereo. �������� �������� (��. �����.) :  2 x 5 ��. ';
$reg_exp1 = "/\w\"{1}$separator/";
$reg_exp2 = "/\w\"{3}$separator/";
if(preg_match_all($reg_exp1, $line, $regs3)){
	print "�����1<br>";
	print_r($regs3)."<br>";
	foreach ($regs3 as $key=>$val){
		for($i=0;$i<count($val);$i++){
			$line_integrity --;	
		}
	}	
}elseif (preg_match_all($reg_exp2, $line, $regs3)){
	print "�����2<br>";
	print_r($regs3)."<br>";
	foreach ($regs3 as $key=>$val){
		for($i=0;$i<count($val);$i++){
			$line_integrity --;	
		}
	}
	//print "<br>line_integrity_inside:$this->line_integrity<br>";				
}else{
	print "�� �����";
}
print "<br>line_integrity_inside:$line_integrity<br>";				
?>
