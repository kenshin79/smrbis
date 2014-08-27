<?php

class Categories_model extends CI_Model {
	var $category_id="";
	var $category_name="";
	var $description="";
	
	function getAllCategories(){
		$this->db->select('category_id, category_name, description');
		$query = $this->db->get('categories');
		return $query->result();
	}
	function deleteCategory($categoryId){
		$this->db->where('category_id', $categoryId);
		$this->db->delete('categories');
		$deleted = $this->db->affected_rows();
		return $deleted;
	}
	function checkName($name){
		$this->db->select('category_id');
		$this->db->where('category_name', $name);
		$query = $this->db->get('categories');
		return $query->result();
	}	
	function insertCategory($categoryName, $categoryDesc){
		$data = array('category_name'=>$categoryName, 'description'=>$categoryDesc);
		$this->db->insert('categories', $data);
		return $this->db->insert_id();
	}
	function updateCategory($categoryId, $categoryName, $categoryDesc){
		$data = array('category_name'=>$categoryName, 'description'=>$categoryDesc);
		$this->db->where('category_id', $categoryId);
		$this->db->update('categories', $data);
		return $this->db->affected_rows();
	}
}	