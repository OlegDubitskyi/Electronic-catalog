<?
/**
 * ����� ��� ������ �� �������.
 * ���� � �������� �������������, �������� ������, ��������� ��� ���� AND ���� ������ ������ ������ ����� ��� ������
 *
 */
class Search{
	function __construct($db){
		$this->db = $db;
	}
	function search_categories($search_str){
		# ��������� ������ ������� �� ������������
		$temp = split(' ',$search_str);

#######################################################
# �������� ���������, ������� �������� �������� ������
#######################################################
		foreach ($temp as $val){
			$search .= "AND (g.name LIKE '%$val%' OR v.vendor_name LIKE '%$val%' OR g.description LIKE '%$val%')";
		}
		$sql = "SELECT g.cat_id, COUNT( g.id ) AS num_rows
				FROM vendors v, goods g, catalog c
				WHERE g.vendor_id = v.id AND g.cat_id = c.cat_id
				$search
				GROUP BY g.cat_id";
		//print $sql."<br>";
		$res = $this->db->query($sql);
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$cat_list[$row['cat_id']] = $row['num_rows'];
		}		
		return $cat_list;
	}
}
?>