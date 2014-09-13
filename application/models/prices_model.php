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
		$itemId = $this->input->post('itemId', TRUE);
		$skuId = $this->input->post('skuId', TRUE);
		$rprice = $this->input->post('rprice', TRUE);
		$wprice = $this->input->post('wprice', TRUE);
		$notes = $this->input->post('notes', TRUE);
		$priceDate = $this->input->post('priceDate', TRUE);
		$data = array('item_id'=>$itemId, 'sku_id'=>$skuId, 'rprice'=>$rprice, 'wprice'=>$wprice, 'price_date'=>$priceDate, 'notes'=>$notes);
		$this->db->insert('prices', $data);
		return $this->db->insert_id();
	}
}

