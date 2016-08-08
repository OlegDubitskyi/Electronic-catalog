<?
class show_stat{
	public $numseller, $db;
	
	function __construct($db){
		$this->db = $db;
	}
	function get_info(){
		$result = $this->db->query("SELECT id FROM sellers"); 
		$this->numseller = $result->numRows(DB_FETCHMODE_ASSOC);		
	}

}

?>