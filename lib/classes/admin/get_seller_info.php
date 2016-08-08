<?
class get_seller_info{
#########################################################
# $db - ������ �� ������ db 
# $t - ������ �� ������ ��������
# $id - ������������� ��������-��������
# $template_name - ��� �������, � ������� ����� ������������� ����������
# $city_name_bloc - �������� ����� � �������, � ������� ����������� ������ �������
#########################################################
	function __construct($db, $smarty, $id, $template_name, $city_name_bloc=''){
		$this->db = $db;
		$this->smarty = $smarty;
		$this->id = $id;
	}
#########################################################
# show_seller_data() - ������� ��� ������ ���������� � ��������-��������
#########################################################
	function show_seller_data(){
		$result = $this->db->query("SELECT * FROM sellers WHERE id=$this->id"); 
		$i=0;
		while ($seller = $result->fetchrow(DB_FETCHMODE_ASSOC)){
			$sellers[$i] = array(	"id"		=> $seller['id'],
									"login" 	=> $seller['login'],
									"name" 		=> $seller['name'],
		        					"tel" 		=> $seller['tel'],
		        					"address" 	=> $seller['address'],
		        					"city" 		=> $seller['city'],
		        					"curs" 		=> $seller['curs'],
		        					"delivery" 	=> $seller['delivery'],
		        					"credit" 	=> $seller['credit'],
		        					"beznal" 	=> $seller['beznal']);
			$i++;	
			
#########################################################
# ����� select-a �� ������� �������
#########################################################
			$result = $this->db->query("SELECT * FROM city ORDER BY name");
			while ($city = $result->fetchrow(DB_FETCHMODE_ASSOC)){
				$this->t->set_var(array(	"CITY_ID"	=> $city['id'], 
											"CITY_NAME"	=> $city['name']));
				if($seller['city']==$city['id']){
					$this->t->set_var(array("CHECKED"	=> 'selected'));
				}else{
					$this->t->set_var(array("CHECKED"	=> ''));				
				}
				$this->t->parse("{$this->city_name_bloc}s", "$this->city_name_bloc", true);			
			}			
		}
		return $this->t;
	}

}

?>