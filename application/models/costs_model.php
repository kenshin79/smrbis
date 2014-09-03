<?php

Class Costs_model extends CI_Model{
	var $cost_id="";
	var $item_id="";
	var $supplier_id="";
	var $sku_id="";
	var $cost="";
	var $cost_date="";
	var $notes="";
	
	function getItemCosts($itemId){
		$sql = "SELECT cost_id, costs.item_id, costs.supplier_id, costs.sku_id,
				item_name, supplier_name, sku_name, 
				cost, cost_date, notes FROM
				costs, items, suppliers, sku WHERE
				costs.item_id = ? AND costs.sku_id = sku.sku_id 
				AND costs.supplier_id = suppliers.supplier_id 
				ORDER BY supplier_name ASC, 
				cost_date ASC";
		$query = $this->db->query($sql, array($itemId));		
		return $query->result();		
	}
	
	function insertCost(){
		$itemId = $this->smrbis->cleanString($this->input->post('itemId', TRUE));		
		$skuId = $this->smrbis->cleanString($this->input->post('skuId', TRUE));
		$supplierId = $this->smrbis->cleanString($this->input->post('supplierId', TRUE));
		$cost = $this->smrbis->cleanString($this->input->post('cost', TRUE));
		$costDate = $this->smrbis->cleanString($this->input->post('costDate', TRUE));
		$notes = $this->smrbis->cleanString($this->input->post('notes', TRUE));
		$data = array('item_id'=>$itemId, 'sku_id'=>$skuId, 'supplier_id'=>$supplierId, 'cost'=>$cost, 'cost_date'=>$costDate, 'notes'=>$notes);
		$this->db->insert('costs', $data);
		return $this->db->insert_id();		
	}	
	function itemCostUnique($itemId, $skuId, $supplierId, $costDate){
		$this->db->select('cost_id');
		$this->db->where('item_id', $itemId);
		$this->db->where('sku_id', $skuId);
		$this->db->where('supplier_id', $supplierId);
		$this->db->where('cost_date', $costDate);
		$query = $this->db->get('costs');
		return $query->result();
	}
	function deleteCost($costId){
		$this->db->where('cost_id', $costId);
		$this->db->delete('costs');
		$deleted = $this->db->affected_rows();
		return $deleted;
	}
}	

