<?
/**
 * Класс предназначен для выполнения операций над каталогом:
 * - отображение каталога
 * - получение информации о его элементах
 * - отображение пути к категории
 * 
 *
 */
class Catalog{
	function __construct($db){
		$this->db = $db;
	}
	/**
	 * Функция выводит информацию о пути к категории. т.е возвращает все категории, являющиеся
	 * родительскими для указанной категории
	 *
	 * @param $cat_data - массив содержащий копию категории из таблицы catalog
	 * @return array $path содержащий cat_name и cat_id всех родительских категорий 
	 */
	function get_path($cat_id){
		#Получаем cat_left и cat_right для следующей выборки по категориям
		$cat_data = $this->get_category($cat_id);
		
		$sql = "SELECT cat_id, cat_name FROM catalog WHERE cat_level > 0 AND cat_left <= ".$cat_data['cat_left']." AND cat_right >= ".$cat_data['cat_right']." ORDER BY cat_left";
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$path[] = array("cat_name" 	=> $row['cat_name'],
							"cat_id" 	=> $row['cat_id']);
		}
		return $path;
	}
	function get_catalog_all(){
		
		$sql = "SELECT * FROM catalog WHERE cat_level > 0 ORDER BY cat_left";

		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$prefix = '';
			for($i=1;$i<$row['cat_level'];$i++){
				$prefix .= "&nbsp;&nbsp;&nbsp;&nbsp;";
			}
			$catalog[] = array(	"cat_id" 	=> $row['cat_id'],
								"cat_name" 	=> $row['cat_name'],
								"cat_left" 	=> $row['cat_left'],
								"cat_right" => $row['cat_right'],
								"cat_level" => $row['cat_level'],
								"prefix" 	=> $prefix);
		}		
		return $catalog;
	}
	function get_category($cat_id){
		$sql = "SELECT * FROM catalog WHERE cat_id=$cat_id";
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$cat_data = array(	"cat_id"	=>$row['cat_id'],
								"cat_name" 	=>trim($row['cat_name']),
								"cat_level" =>$row['cat_name'],
								"cat_left" 	=>$row['cat_left'],
								"cat_right" =>$row['cat_right'],);
		}
		return $cat_data;
	}
#########################################################
# Функция служит для вывода каталога на главной странице 
# входных параметров нет,
# На выходе возвращает многомерный массив каталога	
#########################################################
	function get_main_catalog(){
		#########################################################
		# Здесь строим наше дерево каталога - т.е формируем массив массивов для элементов уровня 1-2
		# - children - содержит массив категорий являющихся детьми для категории первого уровня
		#########################################################
		$sql = "SELECT cat_id, cat_name, cat_level FROM catalog WHERE cat_level > 0 AND cat_level <=2 ORDER BY cat_left ";
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$temp_array[] = array(	cat_name 	=> $row['cat_name'],
									cat_id 		=> $row['cat_id'],
									cat_level 	=> $row['cat_level']);
		}
		$i=0;
		foreach($temp_array as $key=>$cat){

			if($cat[cat_level]==1){
				$cat_tree[$i]=array(	"cat_name" 	=> $cat['cat_name'],
										"cat_id"	=> $cat['cat_id'],
										"children" 	=> array());
				$i++;		
			}else{
				array_push($cat_tree[$i-1]["children"],array("cat_name" => $cat['cat_name'], "cat_id"	=> $cat['cat_id'],));
			}
		}		
		return $cat_tree;
	}
#########################################################
# Функция возвращает все дочерние элементы для указанной категории
# input parameters:
# - $cat_id - идентификатор категории, для которой ищем детей
#########################################################
	function get_children($cat_id){
		#Получаем cat_left и cat_right для следующей выборки по категориям
		$cat_data = $this->get_category($cat_id);
		
		$sql = "SELECT * FROM catalog WHERE cat_left > ".$cat_data['cat_left']." AND cat_right < ".$cat_data['cat_right']." ORDER BY cat_left";		
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$prefix = '';
			for($i=1;$i<$row['cat_level'];$i++){
				$prefix .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			}						
			$num_goods = 0;
			if(($row['cat_right'] - $row['cat_left'])==1){
				$sql_2 = "	SELECT 	g.id 
							FROM 	goods g, sellers s
							WHERE 	g.cat_id=".$row['cat_id']." 
									AND g.seller_id=s.id
									AND s.status=1";
				$result = mysql_query($sql_2);
				$num_goods = mysql_num_rows($result);
			}
			$catalog_data[] = array(	"cat_id"	=> $row['cat_id'],
										"cat_name" 	=> $row['cat_name'],
										"cat_level"	=> $row['cat_level'],
										"cat_left"	=> $row['cat_left'],
										"cat_right"	=> $row['cat_right'],
										"prefix" 	=> $prefix,
										"num_goods" => $num_goods);
		}
		return $catalog_data;
	}
#########################################################
# Функция возвращает дерево для указанной категории
# Это имеет смысл при поиске, когда необходимо вывести дерево, но
# только тех элементов нижнего уровня, которые содержат строки отвечающие поиску
# input parameters:
# - $cat_id - идентификатор категории, для которой строим дерево
# - $ids - массив категорий, которые не надо отображать
# - $selected_ids - массив(cat_id =>num_rows) выбранных категорий с кол-вом найденных строк в них
#########################################################
	function get_search_tree($cat_id, $ids, $selected_ids){
		for($i=1;$i<count($ids);$i++){
			if($i==1){
				$cat_ids_str .=$ids[$i];
			}else{
				$cat_ids_str .=",".$ids[$i];
			}
		}
		//print "<br>cat_ids_str:$cat_ids_str<br>";
		
# Лишняя итерация - необходимо ее переписать, надо сделать один запрос и искать только по cat_id !!!!!!!!!!!!!!!!!!!!!!!
		#Получаем cat_left и cat_right для следующей выборки по категориям
		$cat_data = $this->get_category($cat_id);
#########################################################
		$sql = "SELECT * FROM catalog 
				WHERE cat_left >= ".$cat_data['cat_left']." 
				AND cat_right <= ".$cat_data['cat_right']." 
				AND cat_id NOT IN($cat_ids_str)
				ORDER BY cat_left";	
		print $sql;	
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$link = '';
			$num_rows ='';
			
			if(array_key_exists($row['cat_id'], $selected_ids)){
				$link = 1;
				$num_rows = $selected_ids[$row['cat_id']];
			}else{
				$link = 0;
			}
			$prefix = '';
			for($i=1;$i<$row['cat_level'];$i++){
				$prefix .= "&nbsp;&nbsp;&nbsp;&nbsp;";
			}			
			$catalog_data[] = array(	"cat_id"	=> $row['cat_id'],
										"cat_name" 	=> $row['cat_name'],
										"cat_level"	=> $row['cat_level'],
										"cat_left"	=> $row['cat_left'],
										"cat_right"	=> $row['cat_right'],
										"link"		=> $link,
										"num_rows" 	=> $num_rows,
										"prefix" 	=> $prefix);
		}
		return $catalog_data;
	}	
	# Функция которая будет возвращать все подкатегории низшего уровня для указанной категории
	# первого уровня
	function get_cat_bottom_level($cat_id){
		
		$sql = "SELECT catalog.cat_id FROM catalog _catalog, catalog 
				WHERE _catalog.cat_id='$cat_id' 
				AND catalog.cat_left BETWEEN _catalog.cat_left 
				AND _catalog.cat_right AND catalog.cat_level>=_catalog.cat_level+1 
				AND catalog.cat_right-catalog.cat_left=1 ORDER BY cat_id";
		
		
//		$sql = "SELECT cat_id, cat_name FROM catalog 
//				WHERE cat_right-cat_left=1 ORDER BY cat_id";
		
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$bottom_cat_arr[] = $row['cat_id'];
		}	
		//print "<br>****<br>";
		//print_r($bottom_cat_arr);
		//print "<br>****<br>";		
		return $bottom_cat_arr;
	}
# Функция ищет все родительские элементы для указанной категории и возвращает их параметры
	function get_parent_elements($cat_id, $num_rows){
		$sql = "SELECT catalog.cat_id, catalog.cat_left, catalog.cat_level, catalog.cat_name FROM catalog _catalog, catalog 
				WHERE _catalog.cat_id='$cat_id' 
				AND catalog.cat_left <= _catalog.cat_left 
				AND catalog.cat_right >= _catalog.cat_right 
				AND catalog.cat_level BETWEEN 1 AND _catalog.cat_level";

		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$prefix = '';
			$link = '';
			$show_num_rows ='';
			
			for($i=1;$i<$row['cat_level'];$i++){
				$prefix .= "&nbsp;&nbsp;&nbsp;&nbsp;";
			}
			if($row['cat_id']==$cat_id){
				$link = 1;
				$show_num_rows = $num_rows;
			}else{
				$link = 0;
			}			
			$search_tree[$row['cat_left']] = array(	"cat_id"	=> $row['cat_id'],
													"cat_name" 	=> $row['cat_name'],
													"cat_level"	=> $row['cat_level'],
													"cat_left"	=> $row['cat_left'],
													"cat_right"	=> $row['cat_right'],
													"link"		=> $link,
													"num_rows" 	=> $show_num_rows,
													"prefix" 	=> $prefix);
		}
		return $search_tree;
	}
}

?>