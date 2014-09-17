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
		$sql = "SELECT price_id, sku_name, sku_count, rprice, wprice, price_date, notes 
				FROM prices, sku
				WHERE prices.item_id=? AND prices.sku_id=sku.sku_id
				ORDER BY sku_count ASC";
		$query = $this->db->query($sql, array($itemId));
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

		$sql = "SELECT item_name, item_category, sku_name, rprice 
					FROM prices, items, sku
					WHERE (items.item_name LIKE ? OR items.item_category LIKE ?)
				 	AND items.item_id = prices.item_id				 	
					AND prices.sku_id = sku.sku_id
					ORDER BY item_category ASC ";
		$search = $this->db->query($sql, array("%".$term."%", "%".$term."%"));
		return $search->result();
	}	
}

