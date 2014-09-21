<?php
Class Prices_model extends CI_Model{
	var $price_id="";
	var $item_id="";
	var $sku_id="";
	var $rprice="";
	var $wprice="";
	var $price_date="";
	var $notes="";
	

	function getItemPrices($itemId){
		$this->db->select('price_id, sku_name, sku_count, rprice, wprice, price_date, notes');
		$this->db->from('prices');
		$this->db->join('sku', 'prices.sku_id = sku.sku_id');
		$this->db->where('prices.item_id', $itemId);
		$this->db->order_by('sku_count', 'asc');
		$query = $this->db->get();
		return $query->result();
	}	
	function priceDropDown($clue){
		$this->db->select('price_id, item_name, category_name, sku_name, sku_count');
		$this->db->from('prices');
		$this->db->join('items', 'prices.item_id = items.item_id');
		$this->db->join('categories', 'items.item_category = categories.category_id');
		$this->db->join('sku', 'prices.sku_id = sku.sku_id');
		$this->db->like('item_name', $clue);
		$this->db->or_like('category_name', $clue);
		$this->db->order_by('item_name', 'asc');		
		$query = $this->db->get();
		return $query->result();		
	}
	function wrDropDown($priceId){
		$this->db->select('wprice, rprice');
		$this->db->where('price_id', $priceId);
		$query = $this->db->get('prices');
		return $query->result();
	}
	function itemPriceUnique($itemId, $skuId){
		$this->db->select('price_id');
		$this->db->where('item_id', $itemId);
		$this->db->where('sku_id', $skuId);
		$query = $this->db->get('prices');
		return $query->result();
	}
	function insertPrice(){
		$this->load->library('Smrbis');		
		$itemId = $this->input->post('itemId', TRUE);
		$skuId = $this->input->post('skuId', TRUE);
		$rprice = $this->smrbis->cleanString($this->input->post('rprice', TRUE));
		$wprice = $this->smrbis->cleanString($this->input->post('wprice', TRUE));
		$notes = $this->smrbis->cleanString($this->input->post('notes', TRUE));
		$priceDate = $this->input->post('priceDate', TRUE);
		$data = array('item_id'=>$itemId, 'sku_id'=>$skuId, 'rprice'=>$rprice, 'wprice'=>$wprice, 'price_date'=>$priceDate, 'notes'=>$notes);
		$this->db->insert('prices', $data);
		return $this->db->insert_id();
	}
	function updatePrice(){
		$this->load->library('Smrbis');		
		$priceId = $this->input->post('priceId', TRUE);
		$rprice = $this->smrbis->cleanString($this->input->post('rprice', TRUE));
		$wprice = $this->smrbis->cleanString($this->input->post('wprice', TRUE));
		$notes = $this->smrbis->cleanString($this->input->post('notes', TRUE));		
		$priceDate = $this->input->post('priceDate', TRUE);
		$data = array('rprice'=>$rprice, 'wprice'=>$wprice, 'notes'=>$notes, 'price_date'=>$priceDate);
		$this->db->where('price_id', $priceId);
		$this->db->update('prices', $data);
		return $this->db->affected_rows();
	}
	function searchTerm($term){
		$this->db->select('item_name, category_name, sku_name, rprice, wprice, sku_count');
		$this->db->from('prices');
		$this->db->join('items', 'prices.item_id = items.item_id');		
		$this->db->join('categories', 'item_category = category_id');
		$this->db->join('sku', 'prices.sku_id = sku.sku_id');				
		$this->db->like('item_name', $term);
		$this->db->or_like('category_name', $term);		
		$query = $this->db->get();
		return $query->result();
	}	
}

