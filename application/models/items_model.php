<?php
Class Items_model extends CI_Model{
	var $item_id="";
	var $item_name="";
	var $item_category="";
	var $description="";
	
	function getAll($clue){
		$this->db->select('item_id, item_name, item_category, items.description, category_name');
		$this->db->join('categories', 'item_category = category_id');
		$this->db->like('item_name', $clue);
		$this->db->or_like('category_name', $clue);
		$this->db->order_by('item_name ASC');		
		$query = $this->db->get('items');
		return $query->result();
	}	
	function insertitem($itemName, $itemCategory, $itemDesc){
		$data = array('item_name'=>$itemName, 'item_category'=>$itemCategory, 'description'=>$itemDesc);
		$this->db->insert('items', $data);
		return $this->db->insert_id();
	}	
	function deleteItem($itemId){
		$this->db->where('item_id', $itemId);
		$this->db->delete('items');
		$deleted = $this->db->affected_rows();
		return $deleted;
	}
	function updateItem($itemId, $itemName, $itemCategory, $itemDesc){
		$data = array('item_name'=>$itemName, 'item_category'=>$itemCategory, 'description'=>$itemDesc);
		$this->db->where('item_id', $itemId);
		$this->db->update('items', $data);
		return $this->db->affected_rows();
	}


}
