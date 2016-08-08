<?
setlocale(LC_ALL, 'ru_RU');
/*
$line='"Телевізори 21""";PHILIPS;21PT5221/60;176;"Выход для наушников .Часы :  Функция Sleep Timer.Телетекст .Звуковая система Nicam Stereo. Выходная мощность (ср. квадр.) :  2 x 5 Вт. ';
print "<b>Строка</b>:$line<br>";
$reg_exp = "/^\"\w/";
print "<b>Регулярное выражение:</b>$reg_exp<br>";
if(preg_match_all($reg_exp, $line, $regs)){
	print "<b>Выводим массив содержащий совпадения с паттерном:</b><br>";
	print_r($regs)."<br>";
}else{
	print "<br><b>Совпадения с паттерном нет</b>";
}
*/
$line_integrity = 0;
$separator = ';';
$line='"Телевізори 24""";PHILIPS;21PT5221/60;176;"Выход для наушников .Часы :  Функция Sleep Timer.Телетекст .Звуковая система Nicam Stereo. Выходная мощность (ср. квадр.) :  2 x 5 Вт. ';
$reg_exp1 = "/\w\"{1}$separator/";
$reg_exp2 = "/\w\"{3}$separator/";
if(preg_match_all($reg_exp1, $line, $regs3)){
	print "Вошли1<br>";
	print_r($regs3)."<br>";
	foreach ($regs3 as $key=>$val){
		for($i=0;$i<count($val);$i++){
			$line_integrity --;	
		}
	}	
}elseif (preg_match_all($reg_exp2, $line, $regs3)){
	print "Вошли2<br>";
	print_r($regs3)."<br>";
	foreach ($regs3 as $key=>$val){
		for($i=0;$i<count($val);$i++){
			$line_integrity --;	
		}
	}
	//print "<br>line_integrity_inside:$this->line_integrity<br>";				
}else{
	print "Не вошли";
}
print "<br>line_integrity_inside:$line_integrity<br>";				
?>
