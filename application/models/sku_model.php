<?php

class Sku_model extends CI_Model {
	var $sku_id="";
	var $sku_name="";
	var $sku_count="";
	var $description="";

   	function __construct(){
        parent::__construct();
    }
	
	function checkSkuName($skuName){
		$this->db->select('sku_id');
		$this->db->where('sku_name', $skuName);
		$query = $this->db->get('sku');
		return $query->result();
	}
	function insertSku($skuName, $skuCount, $skuDesc){
		$data = array('sku_name'=>$skuName, 'sku_count'=>$skuCount, 'description'=>$skuDesc);
		$this->db->insert('sku', $data);
		return $this->db->insert_id();
	}
	function getAllSku(){
		$this->db->select('sku_id, sku_name, sku_count, description');
		$query = $this->db->get('sku');
		return $query->result();
	}
	
	
}	
