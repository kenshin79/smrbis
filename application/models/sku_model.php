<?php

class Sku_model extends CI_Model {
	var $sku_id="";
	var $sku_name="";
	var $sku_count="";
	var $description="";

   	function __construct(){
        parent::__construct();
    }
	
	function checkName($name){
		$this->db->select('sku_id');
		$this->db->where('sku_name', $name);
		$query = $this->db->get('sku');
		return $query->result();
	}
	function insertSku($skuName, $skuCount, $skuDesc){
		$data = array('sku_name'=>$skuName, 'sku_count'=>$skuCount, 'description'=>$skuDesc);
		$this->db->insert('sku', $data);
		return $this->db->insert_id();
	}
	function getAll(){
		$this->db->select('sku_id, sku_name, sku_count, description');
		$query = $this->db->get('sku');
		return $query->result();
	}
	function deleteSku($skuId){
		$this->db->where('sku_id', $skuId);
		$this->db->delete('sku');
		$deleted = $this->db->affected_rows();
		return $deleted;
	}
	function updateSku($skuId, $skuName, $skuCount, $skuDesc){
		$data = array('sku_count'=>$skuCount, 'sku_name'=>$skuName, 'description'=>$skuDesc);
		$this->db->where('sku_id', $skuId);
		$this->db->update('sku', $data);
		$updated = $this->db->affected_rows();		
		return $updated;
	}
	
}	
