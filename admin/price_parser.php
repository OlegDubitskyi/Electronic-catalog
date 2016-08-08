<?
$str = '"hypertext, language, programming",first, second,"treed, sdsd"';
$i=0;
$result = array();
################################################
#начало
################################################
$keywords = preg_split ("/,\"/", $str,-1);
print_r ($keywords);

#проверяем есть ли кавычки в первой части строки
if (ereg ('\".*\"', $keywords[0], $regs)) {
	print_r($regs);
	$result[$i] = $regs[0];
	$i++;
	preg_replace('\".*\"','',$keywords[0]);
	$regs2 = split(',',$keywords[0],-1);
	print_r($regs2);
}

s
?>