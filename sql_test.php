<?
$link = mysql_connect("localhost","root","root");
mysql_select_db("webcat");


$charset = mysql_client_encoding($link);
printf ("current character set is %s\n", $charset);




$sql = "SELECT * FROM sellers WHERE company_name LIKE 'ак%'";
$res = mysql_query($sql);
while ($row = mysql_fetch_array($res, MYSQL_ASSOC)) {
	print "<br>".$row['company_name'];
}

?>