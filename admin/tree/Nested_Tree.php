<? 
include ("../../class/common/db/database.php");
include ("../../class/common/db/dbtree.php");
include ("../../local/conf.php");
$db=new CDataBase($db_name, $db_host, $db_user, $db_pass); 
$tree = new CDBTree ($db, "catalogs2", "cat_id");;
$table="catalogs2";
$query = "SELECT * FROM catalogs2 ORDER BY cat_left";
$result = $db->query($query);
$i=1;
while ($row = $db->fetch_array($result)){

   echo "<b>".$i.".&nbsp;&nbsp;</b>"; echo str_repeat("&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;", $row['cat_level']).$row['cat_name']." <font color='#0033FF'>[".$row['cat_left']."]</font>".
       " <font color='#009900'>[".$row['cat_right']."]</font><br>";
	   $i++;
}

?> 


