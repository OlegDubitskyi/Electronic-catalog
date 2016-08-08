<?
require_once("../config.php");
$smarty = new SmartyInit();
$smarty->template_dir =$path_template."/admin/";
$smarty->compile_dir =$path_template."/admin/templates_c";

$count = 10;
$smarty->assign("count",$count);
$smarty->assign("s",0);
$smarty->display('test_s.tpl');
?>