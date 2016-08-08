<?
//error_reporting(2);
//include("dbtree.php");
//include("database.php");
require_once("../config.php");
require_once($path_lib."/db/dbtree.php");
require_once($path_lib."/db/database.php");
require_once($path_lib."/PEAR/DB.php");
$db =& DB::connect($dsn, $options); 
$tree = new CDBTree ($db, $table, "cat_id");

////////////////////////////////////////////////////////////////////////////
/////////////////generate menu//////////////////////////////////////////////
$mysite="mysite.com";                                             //////////
$query = "SELECT * FROM catalog  ORDER BY cat_left  ";          //////////
$result = $db->query($query);                                     //////////
$level=-1;                                                        //////////
$menu="var TREE_ITEMS = [\n";                                     //////////
while ($row = $result->fetchrow(DB_FETCHMODE_ASSOC)){             //////////
	if ($level==-1)  $menu.="";                                   //////////
	elseif ($level==$row['cat_level']) $menu.="],\n";             //////////
	elseif($level<$row['cat_level']) $menu.=",\n";                //////////
	elseif ($level>$row['cat_level'])                             //////////
	{                                                             //////////
	$raz=($level-$row['cat_level'])+1;                            //////////
	for ($i=0; $i<$raz; $i++)                                     //////////
	{                                                             //////////
	$menu.="],\n";	                                              //////////
	}	                                                          //////////
	}                                                             //////////
$menu.="['$row[cat_name]', '',     //////////
 '$row[cat_id]' ";                                                //////////
	 	$level=$row['cat_level'];                                 //////////
	}                                                             //////////
for ($i=0; $i<($level+1); $i++)                                   //////////
	{                                                             //////////
	$menu.="],\n";	                                              //////////
	}	                                                          //////////
$menu.="];";                                                      //////////
/////////////////end generate menu//////////////////////////////////////////
////////////////////////////////////////////////////////////////////////////

	 $f = fopen("../js/tree_items.js","w");
     fputs($f, $menu);
     fclose($f);
	 ?>