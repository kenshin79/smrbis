<?php

Class Salesorders_model extends CI_Model{
	var $salesorder_id = "";
	var $customer_id = "";
	var $sale_type = "";
	var $status = "";
	var $timestamp="";
	var $finalizer="";
	
	function getAll(){
		$this->db->select('salesorder_id, salesorders.customer_id as customer_id, sale_type, status, timestamp, customer_name');
		$this->db->from('salesorders');
		$this->db->join('customers', 'customers.customer_id = salesorders.customer_id');
		$query = $this->db->get();
		return $query->result();
	}
	function getOrderDetails($salesorderId){
		$sql = "SELECT customer_name, customer_address, customer_telephone, sale_type, timestamp, status, finalizer
				FROM salesorders, customers
				WHERE salesorders.salesorder_id = ? AND
				customers.customer_id = salesorders.customer_id
				";
		$query = $this->db->query($sql, array($salesorderId));
		return $query->result();		
		
	}
	function insertOrder(){
		$customerId = $this->input->post('customerId', TRUE);
		$saleType = $this->input->post('saleType', TRUE);
		$data = array('customer_id'=>$customerId, 'sale_type'=>$saleType, 'status'=>'0', 'finalizer'=>"");
		$this->db->insert('salesorders', $data);
		return $this->db->insert_id();
	}
	function deleteOrder($salesorderId){
		$this->db->where('salesorder_id', $salesorderId);
		$this->db->delete('salesorders');
		return $this->db->affected_rows();
	}
	function finalizeOrder($salesorderId){
		$finalizer = $this->session->userdata('session_user');		
		$data = array('status'=>"1", 'finalizer'=>$finalizer);		
		$this->db->where('salesorder_id', $salesorderId);
		$this->db->update('salesorders', $data);
		return $this->db->affected_rows();
	}
	function updateTimestamp($salesorderId){
		date_default_timezone_set('Asia/Manila');		
		$this->db->where('salesorder_id', $salesorderId);
		$this->db->update('salesorders', array('timestamp'=>date('Y-m-d H:i:s')));
		
	}
}
