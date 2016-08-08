<?
/**
 *  ласс будет представл€ть из себ€ коллекцию фильтров, включающих в себ€ получение и передачу 
 * всех необходимых переменных, дл€ того, что бы каждый фильтр можно было импользовать в дальнейшем как 
 * отдельный готорый модуль
 */
class Filters{
	function __construct($db, $smarty){
		$this->db = $db;
		$this->smarty = $smarty;
	}
	function region(){
		$region = new Region($this->db);
		$region_list = $region->get_regions_list();
		$this->smarty->assign("region_list",$region_list);
		
		# ѕередаем в шаблон id выбраного региона, дл€ того, что бы сн€ть с него ссылку
		# и тем самым выделить его из общего числа
		$this->smarty->assign("selected_reg_id",$_SESSION['region_id']);		
	}
	function region_for_search($cat_id){
		$region = new Region($this->db);
		$region_list = $region->get_regions_list_for_search($cat_id);
		$this->smarty->assign("region_list",$region_list);
		
		# ѕередаем в шаблон id выбраного региона, дл€ того, что бы сн€ть с него ссылку
		# и тем самым выделить его из общего числа
		$this->smarty->assign("selected_reg_id",$_SESSION['region_id']);		
	}	
	function price_type($cat_id){
		# ¬ыводим price_type дл€ того, что бы не делать лишнюю ссылку на типе прайса
		# Ќапример: если у нас тип - розница, то ссылки на "розница" не будет
		$this->smarty->assign('pt',$_SESSION['price_type']);
		$this->smarty->assign('cat_id',$cat_id);		
	}
	function vendor($cat_id){
		//print "vendor filter,cat_id:$cat_id<br>";
		# ѕолучаем список производителей дл€ данной категории
		$vendor = new Vendor($this->db);
		$vendors = $vendor->get_active_vendor_list($cat_id);
		$this->smarty->assign('cat_id',$cat_id);
		$this->smarty->assign('vendors',$vendors);
		
		# Ќам это надо дл€ корректного перехода из розничного прайса в оптовый, сохран€ем
		# выбранного вендора
		if($_SESSION['vendor_id']){
			//print "vendor_id:".$_SESSION['vendor_id']."<br>";
			$this->smarty->assign('vendor_id',$_SESSION['vendor_id']);
		}		
	}
	function vendor_for_search($cat_id){
		//print "<br>vendor filter,cat_id:$cat_id<br>";
		# ѕолучаем список производителей дл€ данной категории
		$vendor = new Vendor($this->db);
		$vendors = $vendor->get_active_vendor_list_for_search($cat_id);
		$this->smarty->assign('vendors',$vendors);
		$this->smarty->assign('cat_id',$cat_id);
		
		# Ќам это надо дл€ корректного перехода из розничного прайса в оптовый, сохран€ем
		# выбранного вендора
		if($_SESSION['vendor_id']){
			//print "vendor_id:".$_SESSION['vendor_id']."<br>";
			$this->smarty->assign('vendor_id',$_SESSION['vendor_id']);
		}
		# ≈сли производитель в списке всего один, то его и отмечаем как выбранного
		if(count($vendors)==1){
			$this->smarty->assign('vendor_id',$vendors[0]['id']);
		}
	}
	function board_region($cat_id){
		$region = new Region($this->db);
		$region_list = $region->get_board_regions_list($cat_id);
		$this->smarty->assign("region_list",$region_list);
		
		# ѕередаем в шаблон id выбраного региона, дл€ того, что бы сн€ть с него ссылку
		# и тем самым выделить его из общего числа
		$this->smarty->assign("selected_reg_id",$_SESSION['region_id']);		
	}
	function board_type($cat_id){
		//print "<br>vendor filter,cat_id:$cat_id<br>";
		# ѕолучаем список производителей дл€ данной категории
		$board = new Board($this->db);
		$type_list = $board->get_active_types($cat_id);
		
		//print_r($type_list);
		
		$this->smarty->assign('type_list',$type_list);
/*		
		# ≈сли производитель в списке всего один, то его и отмечаем как выбранного
		if(count($type_list)==1){
			$this->smarty->assign('type',$type_list[0]['id']);
		}
*/		
	}
	
}
?>