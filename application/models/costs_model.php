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
				costs.item_id = ? AND costs.sku_id = sku.sku_id 
				AND costs.supplier_id = suppliers.supplier_id 
				ORDER BY supplier_name ASC, 
				cost_date DESC";
		$query = $this->db->query($sql, array($itemId));		
		return $query->result();		
	}
	
	function insertCost($itemId){
		$skuId = $this->smrbis->cleanString($this->input->post('skuId', TRUE));
		$supplierId = $this->smrbis->cleanString($this->input->post('supplierId', TRUE));
		$cost = $this->smrbis->cleanString($this->input->post('cost', TRUE));
		$costDate = $this->smrbis->cleanString($this->input->post('costDate', TRUE));
		$notes = $this->smrbis->cleanString($this->input->post('notes', TRUE));
		$data = array('item_id'=>$itemId, 'sku_id'=>$skuId, 'supplier_id'=>$supplierId, 'cost'=>$cost, 'cost_date'=>$costDate, 'notes'=>$notes);
		$this->db->insert('costs', $data);
		return $insert_id();		
	}	
	function itemCostUnique($itemId, $skuId, $supplierId, $costDate){
		$this->db->select('item_id');
		$this->db->where('item_id', $itemId);
		$this->db->where('sku_id', $skuId);
		$this->db->where('supplier_id', $supplierId);
		$this->db->where('cost_date', $costDate);
		$query = $this->db->get('costs');
		return $query->result();
	}
}	

