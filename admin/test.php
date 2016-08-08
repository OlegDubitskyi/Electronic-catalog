<?
$separator = $_SESSION['separator'];
$fcontents = file ($uploaddir."\\temp.csv");
$final_price = array();#массив в котором будет содержатьс€ прайс разбитый по колонкам
//print "separator:$separator<br>";
#внешний цикл по всему файлу прайса	
while (list ($line_num, $line) = each ($fcontents)) {
//print $line."<br>";
	//include("test.php");
//print "count<br>";
	
$price = array();
//$separator = ';';
//$line = 'ћобильные телефоны, Nokia, 1600 black,"test, one, more test",134';
//$line = 'ћобильные телефоны; Nokia; 1600 black;"test; one; more test";134';

//$line = '"test, one, more test",134,Samsung,E530';
//$line = '"test; one; more test";134;Samsung;E530';

//$line = 'ћобильные телефоны, Nokia, 1600 black,134';
//$line = 'ћобильные телефоны; Nokia; 1600 black;134';
//$line = '145';
//print $line."\n";
//print "-------------------------------------------------------------\n";
while($line){
	//print $i."\n\n";
/**
 * ѕроверка - содержит ли строка элементы в кавычках.
 */
	$reg_exp = '\"'.$separator;
	if(ereg ($reg_exp, $line, $regs)){
		#ƒелаем деление строки на 2 части: до по€влени€ кавычки и разделител€ и после		
		$reg_exp = '/"'.$separator.'/';
		$temp = preg_split($reg_exp,$line,2,PREG_SPLIT_NO_EMPTY);
		/**
	 	* ќтрезаем первую половину строки, дл€ того, что бы построить цикл только при условии,
	 	* что строка $line не пуста€ы
	 	*/
		$reg_exp = '"'.$separator;
		$line = str_replace($temp[0].$reg_exp,'',$line);
		#»щем, есть ли в первой части начало("<разделитель>) колонки заключенной в кавычки
		$reg_exp = $separator.'"';
		if(ereg ($reg_exp, $temp[0])){
			$reg_exp = '/'.$separator.'"/';
			$temp2 = preg_split($reg_exp,$temp[0],2,PREG_SPLIT_NO_EMPTY);		
			/**
		 	* начинаем делить часть строки до начальной группы("<разделитель>) <разделителю>
		 	*/
			$temp3 = split($separator,$temp2[0]);
			/**
		 	* ”дал€ем лишние пробелы из содержимого колонок и записываем в конечный массив 
		 	* колонок
		 	*/
			foreach ($temp3 as $k=>$v) {
				array_push($price,trim($v));
			}
			#“еперь добавл€ем в конечный массив вторую часть $temp2
			array_push($price,$temp2[1]);
			/**
		 	* ѕрибираем за собой мусор
		 	*/
			$temp2 = array();
			$temp3 = array();		
		#≈сли мы попадаем сюда, то это означает, что перва€ же колонка окружена кавычками	
	}else{
		$tmp_var = str_replace('"','',$temp[0]);
		array_push($price,trim($tmp_var));
	}
	/**
	* ≈сли мы здесь, значит значит кавычек в строке нет и всю строку надо раздел€ть по 
	* <разделителю>
	*/
	}else{
//print "separator:$separator<br>";
		$temp4 = split($separator,$line);		
		/**
	 	* и сохран€ем в конечном массиве
	 	*/
		foreach ($temp4 as $k=>$v) {
			array_push($price,trim($v));
		}
		/**
	 	* ќбнул€ем строку и по-сути заканчиваем обработку строки
	 	*/
		$line = '';
	}
}
//print "-------------------------------------------------------------\n";
//print " онечный массив:\n";
//print_r($price);
//print "-------------------------------------------------------------\n";
//print "line:$line";		
	#«асовываем обработанную строку в массив
	array_push($final_price,$price);		

	}	
//print_r($final_price);
?>