<?

class Stat{
	function __construct($db){
		$this->db = $db;
	}
	function get_company_num(){
		$sql = "SELECT id FROM sellers";
		$res = mysql_query($sql);    	
		$num_rows = mysql_num_rows($res);			
		return $num_rows;
	}
	
	function get_active_company_num(){
		$sql = "SELECT id FROM sellers WHERE status=1";
		$res = mysql_query($sql);    	
		$num_rows = mysql_num_rows($res);			
		return $num_rows;		
	}
	# Функция возвращает кол-во рекламных строк во всей базе
	function get_all_rows_num(){
		$sql = "SELECT id FROM goods";
		$res = mysql_query($sql);    	
		$num_rows = mysql_num_rows($res);			
		return $num_rows;		
	}
	function add_visit($gid, $sid, $title){
		$user_ip = getenv("REMOTE_ADDR");
		$sql = "INSERT 	INTO stat(	gid,
									sid,
									gname,
									user_ip) 
							VALUES(	$gid,
									$sid,
									'$title',
									'$user_ip')";
		//print $sql;		
		$res = $this->db->query($sql);
	}
	function get_company_num_rows($sid){
		$sql = "SELECT id FROM goods WHERE seller_id=$sid";
		$res = mysql_query($sql);
		return mysql_num_rows($res);
	}
	function get_num_visits_today($sid){
		$sql = "SELECT id FROM stat WHERE TO_DAYS(date_visit)=TO_DAYS(NOW()) AND sid=$sid";
		$res = mysql_query($sql);
		return mysql_num_rows($res);
	}
	function get_visits_today($sid){
		$sql = "SELECT 	gid, 
						gname, 
						COUNT(id) as num_rows 
				FROM 	stat 
				WHERE 	TO_DAYS(date_visit)=TO_DAYS(NOW()) 
						AND sid=$sid 
				GROUP BY gname";
		$res = $this->db->query($sql);
		
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$data[] = array(	"gid" 		=> $row['gid'],
								"gname" 	=> $row['gname'],
								"num_rows" 	=> $row['num_rows']);
		}
		//print_r($data);
		return $data;
	}	
	function get_num_hosts_today($sid){
		$sql = "SELECT user_ip FROM stat WHERE TO_DAYS(date_visit)=TO_DAYS(NOW()) AND sid=$sid GROUP BY user_ip";
		//print $sql;
		$res = mysql_query($sql);
		return mysql_num_rows($res);
	}
	function get_hosts_today($sid){
		$sql = "SELECT 	s.gid, s.gname, s.date_visit, MIN( s.date_visit ) 
				FROM 	stat s
				WHERE 	s.sid =101
						AND TO_DAYS( date_visit ) = TO_DAYS( NOW( ) ) 
						AND s.date_visit = (SELECT 	MIN( _s.date_visit ) 
											FROM 	stat _s
											WHERE 	_s.sid =101
											AND _s.gid = s.gid
											GROUP BY _s.gid ) 
				GROUP BY s.gname";
		print $sql;
		$res = $this->db->query($sql);
		
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$data[] = array(	"gid" 			=> $row['gid'],
								"gname" 		=> $row['gname'],
								"visit_time" 	=> $row['num_rows']);
		}
		//print_r($data);
		return $data;		
		
		
		$sql = "SELECT user_ip FROM stat WHERE TO_DAYS(date_visit)=TO_DAYS(NOW()) AND sid=$sid GROUP BY user_ip";
		//print $sql;
		$res = mysql_query($sql);
		return mysql_num_rows($res);
	}	
	function get_num_visits_yesterday($sid){
		$sql = "SELECT id FROM stat WHERE TO_DAYS(date_visit)=TO_DAYS(NOW())-1 AND sid=$sid";
		$res = mysql_query($sql);
		return mysql_num_rows($res);
	}
	function get_visits_yesterday($sid){
		$sql = "SELECT 	gid, 
						gname, 
						COUNT(id) as num_rows 
				FROM 	stat 
				WHERE 	TO_DAYS(date_visit)=TO_DAYS(NOW())-1 
						AND sid=$sid 
				GROUP BY gname";
		$res = $this->db->query($sql);
		
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$data[] = array(	"gid" 		=> $row['gid'],
								"gname" 	=> $row['gname'],
								"num_rows" 	=> $row['num_rows']);
		}
		//print_r($data);
		return $data;
	}			
	function get_num_hosts_yesterday($sid){
		$sql = "SELECT user_ip FROM stat WHERE TO_DAYS(date_visit)=TO_DAYS(NOW())-1 AND sid=$sid GROUP BY user_ip";
		$res = mysql_query($sql);
		return mysql_num_rows($res);
	}		
	
	function get_num_week_visits($sid){
		$sql = "SELECT id FROM stat WHERE WEEK(date_visit,1)=WEEK(NOW(),1) AND sid=$sid";
		$res = mysql_query($sql);
		return mysql_num_rows($res);
	}
	function get_week_visits($sid){
		$sql = "SELECT 	gid, 
						gname, 
						COUNT(id) as num_rows 
				FROM 	stat 
				WHERE 	WEEK(date_visit,1)=WEEK(NOW(),1) 
						AND sid=$sid 
				GROUP BY gname";
		$res = $this->db->query($sql);
		
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$data[] = array(	"gid" 		=> $row['gid'],
								"gname" 	=> $row['gname'],
								"num_rows" 	=> $row['num_rows']);
		}
		//print_r($data);
		return $data;		

	}		
	function get_num_week_hosts($sid){
		$sql = "SELECT user_ip FROM stat WHERE WEEK(date_visit,1)=WEEK(NOW(),1) AND sid=$sid GROUP BY user_ip";
		$res = mysql_query($sql);
		return mysql_num_rows($res);
	}	
	function get_week_hosts($sid){
		$sql = "SELECT user_ip FROM stat WHERE WEEK(date_visit,1)=WEEK(NOW(),1) AND sid=$sid GROUP BY user_ip";
		$res = mysql_query($sql);
		return mysql_num_rows($res);
	}			
	function get_num_month_visits($sid){
		$sql = "SELECT id FROM stat WHERE MONTH(date_visit)=MONTH(NOW()) AND sid=$sid";
		$res = mysql_query($sql);
		return mysql_num_rows($res);
	}
	function get_month_visits($sid){
		$sql = "SELECT 	gid, 
						gname, 
						COUNT(id) as num_rows 
				FROM 	stat 
				WHERE 	MONTH(date_visit)=MONTH(NOW()) 
						AND sid=$sid 
				GROUP BY gname";
		$res = $this->db->query($sql);
		
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$data[] = array(	"gid" 		=> $row['gid'],
								"gname" 	=> $row['gname'],
								"num_rows" 	=> $row['num_rows']);
		}
		//print_r($data);
		return $data;		
		
	}			
	function get_num_month_hosts($sid){
		$sql = "SELECT user_ip FROM stat WHERE MONTH(date_visit)=MONTH(NOW()) AND sid=$sid GROUP BY user_ip";
		$res = mysql_query($sql);
		return mysql_num_rows($res);
	}		
	function get_num_year_visits($sid){
		$sql = "SELECT id FROM stat WHERE YEAR(date_visit)=YEAR(NOW()) AND sid=$sid";
		$res = mysql_query($sql);
		return mysql_num_rows($res);
	}
	function get_year_visits($sid){
		$sql = "SELECT 	gid, 
						gname, 
						COUNT(id) as num_rows 
				FROM 	stat 
				WHERE 	YEAR(date_visit)=YEAR(NOW()) 
						AND sid=$sid 
				GROUP BY gname";
		$res = $this->db->query($sql);
		//print $sql;
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$data[] = array(	"gid" 		=> $row['gid'],
								"gname" 	=> $row['gname'],
								"num_rows" 	=> $row['num_rows']);
		}
		//print_r($data);
		return $data;		
		
//		$sql = "SELECT id FROM stat WHERE YEAR(date_visit)=YEAR(NOW()) AND sid=$sid";
//		$res = mysql_query($sql);
//		return mysql_num_rows($res);
	}	
	function get_num_year_hosts($sid){
		$sql = "SELECT user_ip FROM stat WHERE YEAR(date_visit)=YEAR(NOW()) AND sid=$sid GROUP BY user_ip";
		$res = mysql_query($sql);
		return mysql_num_rows($res);
	}		
	function get_num_all_visits($sid){
		$sql = "SELECT id FROM stat WHERE sid=$sid";
		$res = mysql_query($sql);
		return mysql_num_rows($res);
	}
	function get_all_visits($sid){
		$sql = "SELECT 	gid, 
						gname, 
						COUNT(id) as num_rows 
				FROM 	stat 
				WHERE 	sid=$sid 
				GROUP BY gname";
		$res = $this->db->query($sql);
		//print $sql;
		while ($row = $res->fetchrow(DB_FETCHMODE_ASSOC)) {
			$data[] = array(	"gid" 		=> $row['gid'],
								"gname" 	=> $row['gname'],
								"num_rows" 	=> $row['num_rows']);
		}
		//print_r($data);
		return $data;
		
//		$sql = "SELECT id FROM stat WHERE sid=$sid";
//		$res = mysql_query($sql);
//		return mysql_num_rows($res);
	}			
	function get_num_all_hosts($sid){
		$sql = "SELECT user_ip FROM stat WHERE sid=$sid GROUP BY user_ip";
		$res = mysql_query($sql);
		return mysql_num_rows($res);
	}		
}
?>