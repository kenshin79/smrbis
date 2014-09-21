<?php 
Class Soitems_model extends CI_Model{
	var $salesorder_id = "";
	var $price_id="";
	var $quantity="";
	var $unit_price="";
	
	function getAll($salesorderId){		
		$this->db->select('soitems.salesorder_id AS salesorder_id, soitems.price_id AS price_id, item_name, quantity, unit_price, sku_name, sku_count');
		$this->db->join('salesorders','soitems.salesorder_id = salesorders.salesorder_id');		
		$this->db->join('prices', 'soitems.price_id = prices.price_id');
		$this->db->join('customers', 'salesorders.customer_id = customers.customer_id');
		$this->db->join('sku', 'prices.sku_id = sku.sku_id');
		$this->db->join('items', 'prices.item_id = items.item_id');

		$this->db->where('soitems.salesorder_id', $salesorderId);
		$this->db->from('soitems');		
		$query = $this->db->get();
		return $query->result();
	}
	function insertOrderItem($salesorderId){	
		$priceId = $this->input->post('priceId', TRUE);
		$quantity = $this->input->post('quantity', TRUE);
		$unitPrice = $this->input->post('unitPrice', TRUE);
		$data = array('salesorder_id'=>$salesorderId, 'price_id'=>$priceId, 'quantity'=>$quantity, 'unit_price'=>$unitPrice);
		$this->db->insert('soitems', $data);
		return $this->db->insert_id();
	}
	function uniqueOrderItem($salesorderId, $priceId){
		$this->db->select('salesorder_id, price_id');
		$this->db->where('salesorder_id', $salesorderId);
		$this->db->where('price_id', $priceId);
		$query = $this->db->get('soitems');
		return $query->num_rows();
	}
	function removeOrderItem($salesorderId, $priceId){
		$this->db->where('salesorder_id', $salesorderId);
		$this->db->where('price_id', $priceId);
		$this->db->delete('soitems');
		return $this->db->affected_rows();
	}
}
