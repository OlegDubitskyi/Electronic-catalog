<?
$curs = 5.1;

mysql_connect("localhost", "root_55","torpeda");
#mysql_connect("localhost", "root","root");
mysql_select_db("55_webcat");
#mysql_select_db("webcat");


$res = mysql_query("SELECT * FROM goods");
while ($row = mysql_fetch_array($res, MYSQL_ASSOC)){
	print "<br>**********************************************<br>";
	print "id: ".$row['id']."name: ".$row['name']."<br>price_usd: ".$row['price_usd']."<br>price_ua: ".$row['price_ua']."<br>";
	if($row['price_usd']==0 and $row['price_ua']!=0){
//		mysql_query("UPDATE goods SET price_usd=".$row['price_ua']/$curs." WHERE id=".$row['id']);		
	}elseif ($row['price_ua']==0 and $row['price_usd']!=0){
//		mysql_query("UPDATE goods SET price_ua=".$row['price_usd']*$curs." WHERE id=".$row['id']);				
	}
}

?>