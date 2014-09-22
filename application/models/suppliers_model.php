
<?php

class Suppliers_model extends CI_Model {
	var $supplier_id="";
	var $supplier_name="";
	var $supplier_address="";
	var $supplier_telephone="";
	var $supplier_mobile="";
	var $supplier_email="";
	
	function getAll($clue){
		$this->db->select('supplier_id, supplier_name, supplier_address, supplier_telephone, supplier_mobile, supplier_email');
		$this->db->like('supplier_name', $clue);
		$this->db->order_by('supplier_name ASC');
		$query = $this->db->get('suppliers');
		return $query->result();
	}	
	function getAll2(){
		$this->db->select('supplier_id, supplier_name, supplier_address, supplier_telephone, supplier_mobile, supplier_email');
		$this->db->order_by('supplier_name ASC');
		$query = $this->db->get('suppliers');
		return $query->result();
	}		
	function checkName($name){
		$this->db->select('supplier_id');
		$this->db->where('supplier_name', $name);
		$query = $this->db->get('suppliers');
		return $query->result();
	}
	function insertSupplier($supplierName, $supplierAddress, $supplierTelephone, $supplierMobile, $supplierEmail){
		$data = array('supplier_name'=>$supplierName, 'supplier_address'=>$supplierAddress, 'supplier_telephone'=>$supplierTelephone, 'supplier_mobile'=>$supplierMobile, 'supplier_email'=>$supplierEmail);	
		$this->db->insert('suppliers', $data);
		return $this->db->insert_id();
	}
	function deleteSupplier($supplierId){
		$this->db->where('supplier_id', $supplierId);
		$this->db->delete('suppliers');
		$deleted = $this->db->affected_rows();
		return $deleted;
	}
	function updateSupplier($supplierId, $supplierName, $supplierAddress, $supplierTelephone, $supplierMobile, $supplierEmail){
		$data = array('supplier_name'=>$supplierName, 'supplier_address'=>$supplierAddress, 'supplier_telephone'=>$supplierTelephone, 'supplier_mobile'=>$supplierMobile, 'supplier_email'=>$supplierEmail);
		$this->db->where('supplier_id', $supplierId);
		$this->db->update('suppliers', $data);
		$updated = $this->db->affected_rows();
		return $updated;
	}
}

?>