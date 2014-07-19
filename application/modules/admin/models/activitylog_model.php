<?php


class Activitylog_model extends CI_Model {
		
    var $activity_id="";
	var $user="";
	var $activity="";
	var $timestamp="";

 
    function __construct(){
        parent::__construct();
    }
	
	function getRecentLogs(){
		$sql = "SELECT user, activity, timestamp FROM activitylog
				WHERE timestamp BETWEEN DATE_SUB(NOW(), INTERVAL 2 DAY) AND NOW() ORDER BY timestamp DESC";
		$query = $this->db->query($sql);
		return $query->result();
	}
	function recordActivity($username, $activity){
		$data = array('user'=>$username, 'activity'=>$activity);
		$this->db->insert('activitylog', $data);
	}
}	