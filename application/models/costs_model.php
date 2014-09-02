<?php

Class Costs_model extends CI_Model{
	var $item_id="";
	var $supplier_id="";
	var $sku_id="";
	var $cost="";
	var $cost_date="";
	var $notes="";
	
	function getItemCosts($itemId){
		$sql = "SELECT costs.item_id, costs.supplier_id, costs.sku_id,
				item_name, supplier_name, sku_name, 
				cost, cost_date, notes FROM
				costs, items, suppliers, sku WHERE
				costs.item_id = ? ORDER BY supplier_name ASC, 
				cost_date DESC";
		$query = $this->db->query($sql, array($itemId));		
		return $query->result();		
	}
	
	
}	

