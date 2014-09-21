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
		$this->db->select('cost_id, costs.item_id, costs.supplier_id, costs.sku_id, item_name, supplier_name, sku_name, sku_count, cost, cost_date, notes');
		$this->db->from('costs');
		$this->db->join('suppliers', 'costs.supplier_id = suppliers.supplier_id');
		$this->db->join('sku', 'costs.sku_id = sku.sku_id');
		$this->db->join('items', 'costs.item_id = items.item_id');
		$this->db->where('costs.item_id', $itemId);
		$this->db->order_by('supplier_name', 'asc');
		$this->db->order_by('cost_date', 'asc');
		$query = $this->db->get();		
		return $query->result();		
	}
	
	function insertCost(){
		$this->load->library('Smrbis');
		$itemId = $this->input->post('itemId', TRUE);		
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
	function updateCostNotes($costId, $notes){
		$data = array('notes'=>$notes);
		$this->db->where('cost_id', $costId);
		$this->db->update('costs', $data);
		return $this->db->affected_rows();
	}
}	

