<?php

class Brands_model extends CI_Model {
	var $brand_id="";
	var $brand_name="";
	var $description="";
	
	function getAllBrands(){
		$this->db->select('brand_id, brand_name, description');
		$query = $this->db->get('brands');
		return $query->result();
	}
	function deleteBrand($brandId){
		$this->db->where('brand_id', $brandId);
		$deleted = $this->db->delete('brands');
		return $deleted;
	}
	function checkBrandName($brandName){
		$this->db->select('brand_id');
		$this->db->where('brand_name', $brandName);
		$query = $this->db->get('brands');
		return $query->result();
	}	
	function insertBrand($brandName, $brandDesc){
		$data = array('brand_name'=>$brandName, 'description'=>$brandDesc);
		$this->db->insert('brands', $data);
		return $this->db->insert_id();
	}
}	