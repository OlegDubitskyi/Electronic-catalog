<?
/**
 * ����� ����� ������������ �� ���� ��������� ��������, ���������� � ���� ��������� � �������� 
 * ���� ����������� ����������, ��� ����, ��� �� ������ ������ ����� ���� ������������ � ���������� ��� 
 * ��������� ������� ������
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
		
		# �������� � ������ id ��������� �������, ��� ����, ��� �� ����� � ���� ������
		# � ��� ����� �������� ��� �� ������ �����
		$this->smarty->assign("selected_reg_id",$_SESSION['region_id']);		
	}
	function region_for_search($cat_id){
		$region = new Region($this->db);
		$region_list = $region->get_regions_list_for_search($cat_id);
		$this->smarty->assign("region_list",$region_list);
		
		# �������� � ������ id ��������� �������, ��� ����, ��� �� ����� � ���� ������
		# � ��� ����� �������� ��� �� ������ �����
		$this->smarty->assign("selected_reg_id",$_SESSION['region_id']);		
	}	
	function price_type($cat_id){
		# ������� price_type ��� ����, ��� �� �� ������ ������ ������ �� ���� ������
		# ��������: ���� � ��� ��� - �������, �� ������ �� "�������" �� �����
		$this->smarty->assign('pt',$_SESSION['price_type']);
		$this->smarty->assign('cat_id',$cat_id);		
	}
	function vendor($cat_id){
		//print "vendor filter,cat_id:$cat_id<br>";
		# �������� ������ �������������� ��� ������ ���������
		$vendor = new Vendor($this->db);
		$vendors = $vendor->get_active_vendor_list($cat_id);
		$this->smarty->assign('cat_id',$cat_id);
		$this->smarty->assign('vendors',$vendors);
		
		# ��� ��� ���� ��� ����������� �������� �� ���������� ������ � �������, ���������
		# ���������� �������
		if($_SESSION['vendor_id']){
			//print "vendor_id:".$_SESSION['vendor_id']."<br>";
			$this->smarty->assign('vendor_id',$_SESSION['vendor_id']);
		}		
	}
	function vendor_for_search($cat_id){
		//print "<br>vendor filter,cat_id:$cat_id<br>";
		# �������� ������ �������������� ��� ������ ���������
		$vendor = new Vendor($this->db);
		$vendors = $vendor->get_active_vendor_list_for_search($cat_id);
		$this->smarty->assign('vendors',$vendors);
		$this->smarty->assign('cat_id',$cat_id);
		
		# ��� ��� ���� ��� ����������� �������� �� ���������� ������ � �������, ���������
		# ���������� �������
		if($_SESSION['vendor_id']){
			//print "vendor_id:".$_SESSION['vendor_id']."<br>";
			$this->smarty->assign('vendor_id',$_SESSION['vendor_id']);
		}
		# ���� ������������� � ������ ����� ����, �� ��� � �������� ��� ����������
		if(count($vendors)==1){
			$this->smarty->assign('vendor_id',$vendors[0]['id']);
		}
	}
	function board_region($cat_id){
		$region = new Region($this->db);
		$region_list = $region->get_board_regions_list($cat_id);
		$this->smarty->assign("region_list",$region_list);
		
		# �������� � ������ id ��������� �������, ��� ����, ��� �� ����� � ���� ������
		# � ��� ����� �������� ��� �� ������ �����
		$this->smarty->assign("selected_reg_id",$_SESSION['region_id']);		
	}
	function board_type($cat_id){
		//print "<br>vendor filter,cat_id:$cat_id<br>";
		# �������� ������ �������������� ��� ������ ���������
		$board = new Board($this->db);
		$type_list = $board->get_active_types($cat_id);
		
		//print_r($type_list);
		
		$this->smarty->assign('type_list',$type_list);
/*		
		# ���� ������������� � ������ ����� ����, �� ��� � �������� ��� ����������
		if(count($type_list)==1){
			$this->smarty->assign('type',$type_list[0]['id']);
		}
*/		
	}
	
}
?>