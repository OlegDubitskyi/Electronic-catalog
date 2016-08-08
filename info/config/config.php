<?
#########################################################
###  переменные для работы с библиотеками             ###
#########################################################
/* Home configuration*/
$path_lib="lib";
$path_lib_admin="../lib";

$path_pear = "lib/PEAR";
$path_pear_admin = "../lib/PEAR";

$path_template = "templates";
$path_template_admin = "../templates";

$path_to_icons = 'icons';
$path_to_icons_admin = '../icons';

$uploaddir = 'upload';
$uploaddir_admin = '../upload';
# Work configuration
/*
$path_lib="d:/Projects/Php/Webcat/lib";
$path_pear = "d:/Projects/Php/Webcat/lib/PEAR";
$path_template = "d:/Projects/Php/Webcat/templates";
*/
#########################################################
$db_type = "mysql";
$db_name = '55_webcat';
$table = 'catalog';
$user = "root_55";
$pass = "torpeda";
$host = "localhost";

$dsn = "$db_type://$user:$pass@$host/$db_name";
$options = array(
    'debug'       => 2,
    'portability' => DB_PORTABILITY_ALL,
);

global $pages_per_page;
$pages_per_page = 20; #positions per page
$cols_pages_in_block = 10; # кол-во номеров строк в видимом блоке постраничного вывода

require("libs/Smarty.class.php");

class SmartyInit extends Smarty {
	function SmartyInit(){
		$this->Smarty();
		$this->caching = false;
		$this->assign('app_name','Webcat');
	}
}

?>