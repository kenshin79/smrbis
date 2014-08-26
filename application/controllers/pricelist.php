<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pricelist extends CI_Controller {
		
	public function index(){
		$data['icon1'] = $this->config->item('pricelist', 'icon');
		$data['icon2'] = $this->config->item('user', 'icon');
		$data['icon3'] = $this->config->item('search', 'icon');
		$data['icon6'] = $this->config->item('admin', 'icon');
		$data['icon5'] = $this->config->item('log_out', 'icon');
		$this->load->view('pricelist/pricelist_main', $data);
	} 		
	public function skuUnique(){
		$skuName = $this->input->post('skuName', TRUE);
		$this->load->model('Sku_model');
		$duplicate = $this->Sku_model->checkSkuName($skuName);
		if($duplicate){
				echo "0";
		}
		else{
			echo "1";
		}
	}
	public function categoryUnique(){
		$categoryName = $this->input->post('categoryName', TRUE);
		$this->load->model('Categories_model');
		$duplicate = $this->Categories_model->checkCategoryName($categoryName);
		if($duplicate){
				echo "0";
		}
		else{
			echo "1";
		}
	}	
	public function supplierUnique(){
		$supplierName = $this->input->post('supplierName', TRUE);
		$this->load->model('Suppliers_model');
		$duplicate = $this->Suppliers_model->checkSupplierName($supplierName);
		if($duplicate){
				echo "0";
		}
		else{
			echo "1";
		}
	}	
	public function showSku(){
		$this->load->model('Sku_model');
		$data['all_sku'] = $this->Sku_model->getAllSku();
		$this->load->view('pricelist/sku/sku_main', $data);
	}	
	public function showCategories(){
		$this->load->model('Categories_model');
		$data['all_categories'] = $this->Categories_model->getAllCategories();
		$this->load->view('pricelist/categories/categories_main', $data);		
	}
	public function showSuppliers(){
		$this->load->model('Suppliers_model');
		$data['all_suppliers'] = $this->Suppliers_model->getAllSuppliers();
		$this->load->view('pricelist/suppliers/suppliers_main', $data);
	}
	public function deleteSku(){
		$skuId = $this->input->post('skuId', TRUE);
		$this->load->model('Sku_model');
		$deleted = $this->Sku_model->deleteSku($skuId);
		echo $deleted;
	}
	public function deleteCategory(){
		$categoryId = $this->input->post('categoryId', TRUE);
		$this->load->model('Categories_model');
		$deleted = $this->Categories_model->deleteCategory($categoryId);
		echo $deleted;
	}
	public function deleteSupplier(){
		$supplierId = $this->input->post('supplierId', TRUE);
		$this->load->model('Suppliers_model');
		$deleted = $this->Suppliers_model->deleteSupplier($supplierId);
		echo $deleted;
	}
	public function newSkuForm(){
		$this->load->view('pricelist/sku/newSku_form');
	}
	public function newCategoryForm(){
		$this->load->view('pricelist/categories/newCategory_form');
	}
	public function newSupplierForm(){
		$this->load->view('pricelist/suppliers/newSupplier_form');
	}
	public function addSku(){
		$this->load->library('Smrbis');
		$skuName = $this->smrbis->cleanString($this->input->post('skuName', TRUE));
		$skuCount = $this->input->post('skuCount', TRUE);
		$skuDesc = $this->smrbis->cleanString($this->input->post('skuDesc', TRUE));
		$this->load->model('Sku_model');
		$skuAdded = $this->Sku_model->insertSku($skuName, $skuCount, $skuDesc);
		echo $skuAdded;
	}
	public function addCategory(){
		$this->load->library('Smrbis');
		$categoryName = $this->smrbis->cleanString($this->input->post('categoryName', TRUE));
		$categoryDesc = $this->smrbis->cleanString($this->input->post('categoryDesc', TRUE));
		$this->load->model('Categories_model');
		$categoryAdded = $this->Categories_model->insertCategory($categoryName, $categoryDesc);
		echo $categoryAdded;
	}
	public function addSupplier(){
		$this->load->library('Smrbis');
		$supplierName = $this->smrbis->cleanString($this->input->post('supplierName', TRUE));
		$supplierAddress = $this->smrbis->cleanString($this->input->post('supplierAddress', TRUE));
		$supplierTelephone = $this->smrbis->cleanString($this->input->post('supplierTelephone', TRUE));
		$supplierMobile = $this->smrbis->cleanString($this->input->post('supplierMobile', TRUE));
		$supplierEmail = $this->smrbis->cleanString($this->input->post('supplierEmail', TRUE));
		$this->load->model('Suppliers_model');
		$supplierAdded = $this->Suppliers_model->insertSupplier($supplierName, $supplierAddress, $supplierTelephone, $supplierMobile, $supplierEmail);
		echo $supplierAdded;
	}
	public function editSku(){
		$data['skuId'] = $this->input->post('skuId', TRUE);
		$data['skuName'] = $this->input->post('skuName', TRUE);
		$data['skuCount'] = $this->input->post('skuCount', TRUE);
		$data['skuDesc'] = $this->input->post('skuDesc', TRUE);		
		$this->load->view('pricelist/sku/editSku_form', $data);
	}
	public function editCategory(){
		$data['categoryId'] = $this->input->post('categoryId', TRUE);
		$data['categoryName'] = $this->input->post('categoryName', TRUE);
		$data['categoryDesc'] = $this->input->post('categoryDesc', TRUE);
		$this->load->view('pricelist/categories/editCategory_form', $data);
	}
	public function editSupplier(){
		$data['supplierId'] = $this->input->post('supplierId', TRUE);
		$data['supplierName'] = $this->input->post('supplierName', TRUE);
		$data['supplierAddress'] = $this->input->post('supplierAddress', TRUE);
		$data['supplierTelephone'] = $this->input->post('supplierTelephone', TRUE);
		$data['supplierMobile'] = $this->input->post('supplierMobile', TRUE);
		$data['supplierEmail'] = $this->input->post('supplierEmail', TRUE);
		$this->load->view('pricelist/suppliers/editSupplier_form', $data);
	}
	public function updateSku(){
		$this->load->library('Smrbis');
		$skuId = $this->input->post('skuId', TRUE);
		$skuName = $this->smrbis->cleanString($this->input->post('skuName', TRUE));
		$skuCount = $this->input->post('skuCount', TRUE);
		$skuDesc = $this->smrbis->cleanString($this->input->post('skuDesc', TRUE));
		$this->load->model('Sku_model');
		$updated = $this->Sku_model->updateSku($skuId, $skuName, $skuCount, $skuDesc);
		echo $updated;
	}
	public function updateCategory(){
		$this->load->library('Smrbis');
		$categoryId = $this->input->post('categoryId', TRUE);
		$categoryName = $this->smrbis->cleanString($this->input->post('categoryName', TRUE));
		$categoryDesc = $this->smrbis->cleanString($this->input->post('categoryDesc', TRUE));
		$this->load->model('Categories_model');
		$updated = $this->Categories_model->updateCategory($categoryId, $categoryName, $categoryDesc);
		echo $updated;
	}
	public function updateSupplier(){
		$this->load->library('Smrbis');
		$supplierId = $this->input->post('supplierId', TRUE);
		$supplierName = $this->smrbis->cleanString($this->input->post('supplierName', TRUE));
		$supplierAddress = $this->smrbis->cleanString($this->input->post('supplierAddress', TRUE));
		$supplierTelephone = $this->smrbis->cleanString($this->input->post('supplierTelephone', TRUE));
		$supplierMobile = $this->smrbis->cleanString($this->input->post('supplierMobile', TRUE));
		$supplierEmail = $this->smrbis->cleanString($this->input->post('supplierEmail', TRUE));
		$this->load->model('Suppliers_model');
		$updated = $this->Suppliers_model->updateSupplier($supplierId, $supplierName, $supplierAddress, $supplierTelephone, $supplierMobile, $supplierEmail);
		echo $updated;
	}	
}		
	