<?
session_start();
$is_admin = 1;
require_once("../config.php");
require_once($path_lib_admin."/db/dbtree.php");
require_once($path_lib_admin."/db/database.php");
require_once($path_lib_admin."/PEAR/DB.php");

#########################################################
### Инициализация шаблона                             ###
#########################################################
$smarty = new SmartyInit();
$smarty->template_dir =$path_template_admin."/admin/";
$smarty->compile_dir =$path_template_admin."/admin/templates_c";
#########################################################
#########################################################
### соединение с базой                                ###
#########################################################
$db =& DB::connect($dsn, $options);
mysql_query("SET NAMES cp1251");
$table = "board_catalog";
$tree = new CDBTree ($db, $table, "cat_id");
//#########################################################
$main_win = "board_tree.htm";
$rand=rand();
$smarty->assign("rand", $rand);
include_once($path_lib_admin."/lan/lan.php");
$nlan="eng.txt";
$l = new lan ("tree/lan/$nlan");
$words=$l->getW();
$variables[0] = array(	"add" 		=> $words['add'],
						"ren" 		=> $words['ren'],
						"delone" 	=> $words['delone'],
						"delall" 	=> $words['delall'],
						"trans"		=> $words['trans'],
						"to"		=> $words['to'],
						"trantree"	=> $words['transtree'],
						"up" 		=> $words['up'],
						"down" 		=> $words['down'],
						"innumbr"	=> $words['innumbr'],
						"innambr"	=> $words['innambr'],
						"tranbr"	=> $words['tranbr'],
						"title"		=> $words['title'],
						"insid"		=> $words['insid']);

$smarty->assign("variables",$variables);

//print $type_but;

//addition new branch
if ($type_but=="inputt" and isset($id_cat) ){
	//print "test";
	$inpin=$tree->insert($id_cat, array("cat_name"=>$in));
	$need_id=mysql_insert_id();
	$act="inc";
	$tree->gen_board_menu();
	//include('Tree_Menu.php');
	//include('../../inc/Tree_Menu.php');
	header("Location: board_cat_manager.php?open_it=$open_it");
}
//////////////////////////////////////////////////
if($type_but=="up"){
	$parent = $tree -> getParent($id_i, $level=1);
	$row2=mysql_fetch_array($parent);
	//echo $row2[0]." ".$id_k;
	if($row2[0]!=$id_k){
		$query = "SELECT * FROM $table  where cat_id='$id_i' or cat_id='$id_k' ";
		$result = $db->query($query);
		$colrow= $result->numRows($result);
		$result->free();
		if($colrow==2){
			$resultl = $db->query("START TRANSACTION;") or die("transaction problem");
			$move=$tree->moveAll($id_i, $id_k);
			if($move)$resultl = $db->query("COMMIT;") or die("transaction problem");
			else $resultl = $db->query("ROLLBACK;") or die("transaction problem");
			$tree->gen_board_menu();
			//include('Tree_Menu.php');
			// include('../../inc/Tree_Menu.php');
		}
		//header("Location: index.php?open_it=$open_it");
	}
}
if($type_but=="del" and isset($id_cat) and $id_cat!=1){
	$query = "SELECT * FROM $table  ORDER BY cat_left  ";
	$result = $db->query($query);
	$ii=0;
	while ($row = $db->fetch_array($result)){
		if ($id_cat==$row['cat_id'])     $point=$ii;
		$ii++;
	}
	$act="dec";
	//$resultl = $db->query("START TRANSACTION;") or die("transaction problem");
	$move=$tree->delete($id_cat);
	//if ($move) $resultl = $db->query("COMMIT;") or die("transaction problem");
	//else $resultl = $db->query("ROLLBACK;") or die("transaction problem");
	$tree->gen_board_menu();
	//include('Tree_Menu.php');
	$db->free_result($result);
	//include('../../inc/Tree_Menu.php');
	header("Location: board_cat_manager.php?open_it=$open_it");
}
if ($type_but=="ren" and isset($id_cat)){
	//$move=$tree->delete($id_cat);
	$sql = "update $table set cat_name='$rename' where cat_id='$id_cat'";
	$adduser=$db->query($sql);
	$tree->gen_board_menu();
	//include('Tree_Menu.php');
	//include('../../inc/Tree_Menu.php');
	header("Location: board_cat_manager.php?open_it=$open_it");
}
if ($type_but=="delall" and isset($id_cat) and $id_cat!=1 ){
	$childrenall = $tree -> enumChildrenAll($id_cat);
	$children=0;
	while ($row=mysql_fetch_array($childrenall)){
		$children++;
	}
	$query = "SELECT * FROM $table  ORDER BY cat_left  ";
	$result = $db->query($query);
	$ii=0;
	while ($row = $db->fetch_array($result)){
		if ($id_cat==$row['cat_id'])     $point=$ii;
		$ii++;
	}
	$act="decall";
	//$resultl = $db->query("START TRANSACTION;") or die("transaction problem");
	$move=$tree->deleteAll($id_cat);
	//if ($move) $resultl = $db->query("COMMIT;") or die("transaction problem");
	//else $resultl = $db->query("ROLLBACK;") or die("transaction problem");
	$db->free_result($result);
	$tree->gen_board_menu();
	//include('Tree_Menu.php');
	//include('../../inc/Tree_Menu.php');
	header("Location: board_cat_manager.php?open_it=$open_it");
}
if ($type_but=="i_insert"){
	$query = "SELECT * FROM $table  where cat_id='$i_num' ";
	$result = $db->query($query);
	$colrow= $result->numRows($result);
	$result->free();
	if ($colrow==1 and strlen($name_num)>0){
		if ($direct==1) $after=false; else $after=true;
		//$resultl = $db->query("START TRANSACTION;") or die("transaction problem");
		$insert_id=$tree->insertTo($i_num, array("cat_name"=>$name_num), $after);
		// if ($insert_id) $resultl = $db->query("COMMIT;") or die("transaction problem");
		//else $resultl = $db->query("ROLLBACK;") or die("transaction problem");
		$need_id=mysql_insert_id();
		$act="inc";
		$tree->gen_board_menu();
		//include('Tree_Menu.php');
	}
	header("Location: board_cat_manager.php?open_it=$open_it");
}
if ($type_but=="tr_branch"){
	$parent2 = $tree -> getParent($id_b1, $level=1);
	$row22=mysql_fetch_array($parent2);
	$parent3 = $tree -> getParent($id_b2, $level=1);
	$row23=mysql_fetch_array($parent3);
	if ($row23[0]==$row22[0]){
		$query = "SELECT * FROM $table  where cat_id='$id_b1' or cat_id='$id_b2' ";
		$result = $db->query($query);
		$colrow= $result->numRows($result);
		$result->free();
		if ($colrow==2){
			$resultl = $db->query("START TRANSACTION;") or die("transaction problem");
			$transfer_branch=$tree->MoveOnLevel($id_b1,$id_b2);
			if ($transfer_branch) $resultl = $db->query("COMMIT;") or die("transaction problem");
			else $resultl = $db->query("ROLLBACK;") or die("transaction problem");

			$tree->gen_board_menu();
			//include('Tree_Menu.php');
		}
		header("Location: board_cat_manager.php?open_it=$open_it");
	}
}
if (isset($open_it)){
	$mas=array_unique(explode(",", $open_it));
	$count=count($mas);
	for ($i=0; $i<$count; $i++){
		if ($mas[$i]==0 or $mas[$i]==-1 or $mas[$i]=='') continue;
		$mas2[]=$mas[$i];
	}
	$count2=count($mas2);
	if ($count2>0){
		$open_it=implode(",",$mas2);
//		$t->set_var("open_it", $open_it);
		$smarty->assign("open_it",$open_it);
		{
			//print_r($mas2);
			for ($i=0; $i<$count2; $i++  ){
				if ($mas2[$i]==0 or $mas2[$i]==-1 or $mas2[$i]=='') continue;
				$open_cat.= '<script>trees[0].toggle('.$mas2[$i].')</script>';
			}
		}
	}
//	$t->set_var("open_cat", $open_cat);
	$smarty->assign("open_cat",$open_cat);	
}
$smarty->assign("main_win",$main_win);
$smarty->display('index.htm');
?>