<?php

Class Salesorders_model extends CI_Model{
	var $salesorder_id = "";
	var $customer_id = "";
	var $sale_type = "";
	var $status = "";
	var $timestamp="";
	
	function getAll(){
		$this->db->select('salesorder_id, salesorders.customer_id as customer_id, sale_type, status, timestamp, customer_name');
		$this->db->from('salesorders');
		$this->db->join('customers', 'customers.customer_id = salesorders.customer_id');
		$query = $this->db->get();
		return $query->result();
	}
	function insertOrder(){
		$customerId = $this->input->post('customerId', TRUE);
		$saleType = $this->input->post('saleType', TRUE);
		$data = array('customer_id'=>$customerId, 'sale_type'=>$saleType, 'status'=>'0');
		$this->db->insert('salesorders', $data);
		return $this->db->insert_id();
	}
	function deleteOrder(){
		$salesorderId = $this->input->post('salesorderId', TRUE);
		$this->db->where('salesorder_id', $salesorderId);
		$this->db->delete('salesorders');
		return $this->db->affected_rows();
	}
	
}
