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
	public function nameUnique(){
		$name = $this->input->post('name', TRUE);
		$model = $this->input->post('model', TRUE);
		$this->load->model($model);
		$duplicate = $this->{$model}->checkName($name);
		if($duplicate){
			echo "0";
		}
		else{
			echo "1";
		}
	}
	public function itemCostUnique(){
		$itemId = $this->input->post('itemId', TRUE);
		$skuId = $this->input->post('skuId', TRUE);
		$supplierId = $this->input->post('supplierId', TRUE);
		$costDate = $this->input->post('costDate', TRUE);
		$this->load->model('Costs_model');
		$duplicate = $this->Costs_model->itemCostUnique($itemId, $skuId, $supplierId, $costDate);
		if($duplicate){
			echo "1";
		}
		else{
			echo "0";
		}
	}
	public function showMain(){
		$model = $this->input->post('model', TRUE);
		$main_page = $this->input->post('main_page');
		$this->load->model($model);
		$data['all_list'] = $this->{$model}->getAll();
		$this->load->view('pricelist/'.$main_page, $data);
	}
	public function deleteEntry(){
		
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
	public function deleteItem(){
		$itemId = $this->input->post('itemId', TRUE);
		$this->load->model('Items_model');
		$deleted = $this->Items_model->deleteItem($itemId);
		echo $deleted;
	}
	public function deleteSupplier(){
		$supplierId = $this->input->post('supplierId', TRUE);
		$this->load->model('Suppliers_model');
		$deleted = $this->Suppliers_model->deleteSupplier($supplierId);
		echo $deleted;
	}
	public function deleteCustomer(){
		$customerId = $this->input->post('customerId', TRUE);
		$this->load->model('Customers_model');
		$deleted = $this->Customers_model->deleteCustomer($customerId);
		echo $deleted;
	}	
	public function deleteCost(){
		$costId = $this->input->post('costId', TRUE);
		$this->load->model('Costs_model');
		$deleted = $this->Costs_model->deleteCost($costId);
		echo $deleted;
	}
	public function newForm($folder, $view){
		$this->load->view("pricelist/".$folder."/".$view);
	}
	public function newItemCost_form(){
		$data['itemId'] = $this->input->post('itemId', TRUE);
		$data['itemName'] = $this->input->post('itemName', TRUE);
		$this->load->model('Suppliers_model');
		$data['all_suppliers'] = $this->Suppliers_model->getAll();
		$this->load->model('Sku_model');
		$data['all_sku'] = $this->Sku_model->getAll();
		$this->load->view('pricelist/items/newItemCost_form', $data);
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
	public function addCustomer(){
		$this->load->library('Smrbis');
		$customerName = $this->smrbis->cleanString($this->input->post('customerName', TRUE));
		$customerAddress = $this->smrbis->cleanString($this->input->post('customerAddress', TRUE));
		$customerTelephone = $this->smrbis->cleanString($this->input->post('customerTelephone', TRUE));
		$customerMobile = $this->smrbis->cleanString($this->input->post('customerMobile', TRUE));
		$customerEmail = $this->smrbis->cleanString($this->input->post('customerEmail', TRUE));
		$this->load->model('Customers_model');
		$customerAdded = $this->Customers_model->insertCustomer($customerName, $customerAddress, $customerTelephone, $customerMobile, $customerEmail);
		echo $customerAdded;
	}	
	public function addItem(){
		$this->load->library('Smrbis');
		$itemName = $this->smrbis->cleanString($this->input->post('itemName', TRUE));
		$itemCategory = $this->smrbis->cleanString($this->input->post('itemCategory', TRUE));
		$itemDesc = $this->smrbis->cleanString($this->input->post('itemDesc', TRUE));
		$this->load->model('Items_model');
		$itemAdded = $this->Items_model->insertItem($itemName, $itemCategory, $itemDesc);
		echo $itemAdded;
	}	
	public function addItemCost(){
		$this->load->library('Smrbis');
		$this->load->model('Costs_model');
		$costAdded = $this->Costs_model->insertCost();
		echo $costAdded;
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
	public function editCustomer(){
		$data['customerId'] = $this->input->post('customerId', TRUE);
		$data['customerName'] = $this->input->post('customerName', TRUE);
		$data['customerAddress'] = $this->input->post('customerAddress', TRUE);
		$data['customerTelephone'] = $this->input->post('customerTelephone', TRUE);
		$data['customerMobile'] = $this->input->post('customerMobile', TRUE);
		$data['customerEmail'] = $this->input->post('customerEmail', TRUE);
		$this->load->view('pricelist/customers/editCustomer_form', $data);
	}	
	public function editItem(){
		$data['itemId'] = $this->input->post('itemId', TRUE);
		$data['itemName'] = $this->input->post('itemName', TRUE);
		$data['itemCategory'] = $this->input->post('itemCategory', TRUE);
		$data['itemDesc'] = $this->input->post('itemDesc', TRUE);
		$this->load->view('pricelist/items/editItem_form', $data);
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
	public function updateCustomer(){
		$this->load->library('Smrbis');
		$customerId = $this->input->post('customerId', TRUE);
		$customerName = $this->smrbis->cleanString($this->input->post('customerName', TRUE));
		$customerAddress = $this->smrbis->cleanString($this->input->post('customerAddress', TRUE));
		$customerTelephone = $this->smrbis->cleanString($this->input->post('customerTelephone', TRUE));
		$customerMobile = $this->smrbis->cleanString($this->input->post('customerMobile', TRUE));
		$customerEmail = $this->smrbis->cleanString($this->input->post('customerEmail', TRUE));
		$this->load->model('Customers_model');
		$updated = $this->Customers_model->updateCustomer($customerId, $customerName, $customerAddress, $customerTelephone, $customerMobile, $customerEmail);
		echo $updated;
	}	
	public function updateItem(){
		$this->load->library('Smrbis');
		$itemId = $this->input->post('itemId', TRUE);
		$itemName = $this->smrbis->cleanString($this->input->post('itemName', TRUE));
		$itemCategory = $this->smrbis->cleanString($this->input->post('itemCategory', TRUE));
		$itemDesc = $this->smrbis->cleanString($this->input->post('itemDesc', TRUE));
		$this->load->model('Items_model');
		$updated = $this->Items_model->updateItem($itemId, $itemName, $itemCategory, $itemDesc);
		echo $updated;
	}			
	public function showCostPrice(){
		$itemId = $this->input->post('itemId', TRUE);
		$data['itemId'] = $itemId;
		$data['itemName'] = $this->input->post('itemName', TRUE);
		$this->load->model('Costs_model');
		$data['item_costs'] = $this->Costs_model->getItemCosts($itemId);
		$this->load->view('pricelist/items/itemCostPrice_form', $data);
	}
}		
	