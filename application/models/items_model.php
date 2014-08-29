<?php
Class Items_model extends CI_Model{
	var $item_id="";
	var $item_name="";
	var $item_category="";
	var $description="";
	
	function getAll(){
		$this->db->select('item_id, item_name, item_category, description');
		$this->db->order_by('item_name ASC');		
		$query = $this->db->get('items');
		return $query->result();
	}	
	
}
