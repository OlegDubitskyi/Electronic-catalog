<?
#########################################################
###  переменные для работы с библиотеками             ###
#########################################################
/* Home configuration*/
$path_lib="d:/Projects/Webcat/lib";
$path_lib_admin="d:/Projects/Webcat/lib";

$path_pear = "d:/Projects/Webcat/lib/PEAR";
$path_pear_admin = "d:/Projects/Webcat/lib/PEAR";

$path_template = "d:/Projects/Webcat/templates";
$path_template_admin = "d:/Projects/Webcat/templates";

$path_to_icons = 'd:/Projects/Webcat/icons';
$path_to_icons_admin = 'd:/Projects/Webcat/icons';

$uploaddir = 'd:\\Projects\\Webcat\\upload\\';
$uploaddir_admin = 'd:\\Projects\\Webcat\\upload\\';

/* Work configuration
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
*/
#########################################################
$db_type = "mysql";
$db_name = 'webcat';
$table = 'catalog';
$board_table = 'board_catalog';
$user = "root";
$pass = "root";
$host = "localhost";

/* Work configuration
$db_type = "mysql";
$db_name = '55_webcat';
$table = 'catalog';
$user = "root_55";
$pass = "torpeda";
$host = "localhost";
*/

$dsn = "$db_type://$user:$pass@$host/$db_name";
$options = array(
    'debug'       => 2,
    'portability' => DB_PORTABILITY_ALL,
);

global $pages_per_page;
$pages_per_page = 6; #positions per page
$cols_pages_in_block = 10; # кол-во номеров строк в видимом блоке постраничного вывода

require("libs/Smarty.class.php");

class SmartyInit extends Smarty {
	function SmartyInit(){
		$this->Smarty();
		$this->caching = false;
		$this->assign('app_name','Webcat');
	}
}

/**
 * Статус компаний зарегистрированных в каталоге,
 * неактивный статус компания получает в случае неоплаты или же нарушений условий 
 * размещения рекламы
 */
global $company_status;
$company_status = array("inactive" 	=> 0,
						"active" 	=> 1);
?>