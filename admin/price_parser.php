<?
$str = '"hypertext, language, programming",first, second,"treed, sdsd"';
$i=0;
$result = array();
################################################
#������
################################################
$keywords = preg_split ("/,\"/", $str,-1);
print_r ($keywords);

#��������� ���� �� ������� � ������ ����� ������
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