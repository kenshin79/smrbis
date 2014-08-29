<?php
class Customers_model extends CI_Model{
		var $customer_id = "";
		var $customer_name = "";
		var $customer_address = "";
		var $customer_telephone = "";
		var $customer_mobile = "";
		var $customer_email	= "";
		
	function getAll(){
		$this->db->select('customer_id, customer_name, customer_address, customer_telephone, customer_mobile, customer_email');
		$this->db->order_by('customer_name ASC');
		$query = $this->db->get('customers');
		return $query->result();
	}			
	function checkName($name){
		$this->db->select('customer_id');
		$this->db->where('customer_name', $name);
		$query = $this->db->get('customers');
		return $query->result();
	}		
	function insertCustomer($customerName, $customerAddress, $customerTelephone, $customerMobile, $customerEmail){
		$data = array('customer_name'=>$customerName, 'customer_address'=>$customerAddress, 'customer_telephone'=>$customerTelephone, 'customer_mobile'=>$customerMobile, 'customer_email'=>$customerEmail);	
		$this->db->insert('customers', $data);
		return $this->db->insert_id();
	}	
	function deleteCustomer($customerId){
		$this->db->where('customer_id', $customerId);
		$this->db->delete('customers');
		$deleted = $this->db->affected_rows();
		return $deleted;
	}	
	function updateCustomer($customerId, $customerName, $customerAddress, $customerTelephone, $customerMobile, $customerEmail){
		$data = array('customer_name'=>$customerName, 'customer_address'=>$customerAddress, 'customer_telephone'=>$customerTelephone, 'customer_mobile'=>$customerMobile, 'customer_email'=>$customerEmail);
		$this->db->where('customer_id', $customerId);
		$this->db->update('customers', $data);
		$updated = $this->db->affected_rows();
		return $updated;
	}	
}
