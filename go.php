<?
#########################################################
require_once("config.php");
require_once($path_lib."/db/dbtree.php");
require_once($path_lib."/db/database.php");
require_once($path_lib."/PEAR/DB.php");
#подключение собственных классов 
require_once($path_lib."/classes/Stat.php");
require_once($path_lib."/classes/Goods.php");
#########################################################
### соединение с базой                                ###
#########################################################
$db =& DB::connect($dsn, $options); 
mysql_query("SET NAMES cp1251");
$tree = new CDBTree ($db, $table, "cat_id");
#########################################################
$goods = new Goods($db);
$stat = new Stat($db);
# получаем title(seller_id,проивзодителя, наименование товара, описание) и его url
$g_info = $goods->get_title_url($gid);

# Делаем запись в базу о том, что посетитель перешел по ссылке
$stat->add_visit($gid,$g_info['sid'],$g_info['title']);

# Теперь надо сделать переадресацию на страницу магазина
//print $g_info['url'];
header("Location: http://".$g_info['url']);				
//header("Location: test.php");				
?>