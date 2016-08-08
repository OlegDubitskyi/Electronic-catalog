<?
class get_seller_info{
#########################################################
# $db - ссылка на объект db 
# $t - ссылка на объект каталога
# $id - идентификатор компании-продавца
# $template_name - имя шаблона, в который будут импортированы переменные
# $city_name_bloc - название блока в шаблоне, в который вставляется список городов
#########################################################
	function __construct($db, $smarty, $id, $template_name, $city_name_bloc=''){
		$this->db = $db;
		$this->smarty = $smarty;
		$this->id = $id;
	}
#########################################################
# show_seller_data() - функция для вывода информации о компании-продавце
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
# вывод select-a со списком городов
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