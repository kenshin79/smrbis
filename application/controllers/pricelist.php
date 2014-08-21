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
	public function brandUnique(){
		$brandName = $this->input->post('brandName', TRUE);
		$this->load->model('Brands_model');
		$duplicate = $this->Brands_model->checkBrandName($brandName);
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
	public function showBrands(){
		$this->load->model('Brands_model');
		$data['all_brands'] = $this->Brands_model->getAllBrands();
		$this->load->view('pricelist/brands/brands_main', $data);		
	}
	public function deleteSku(){
		$skuId = $this->input->post('skuId', TRUE);
		$this->load->model('Sku_model');
		$deleted = $this->Sku_model->deleteSku($skuId);
		echo $deleted;
	}
	public function deleteBrand(){
		$brandId = $this->input->post('brandId', TRUE);
		$this->load->model('Brands_model');
		$deleted = $this->Brands_model->deleteBrand($brandId);
		echo $deleted;
	}
	public function newSkuForm(){
		$this->load->view('pricelist/sku/newSku_form');
	}
	public function newBrandForm(){
		$this->load->view('pricelist/brands/newBrands_form');
	}
	public function addSku(){
		$this->load->helper('string');
		$skuName = $this->input->post('skuName', TRUE);
		$skuCount = $this->input->post('skuCount', TRUE);
		$skuDesc = $this->input->post('skuDesc', TRUE);
		$this->load->model('Sku_model');
		$skuAdded = $this->Sku_model->insertSku($skuName, $skuCount, $skuDesc);
		echo $skuAdded;
	}
	public function addBrand(){
		$brandName = $this->input->post('brandName', TRUE);
		$brandDesc = $this->input->post('brandDesc', TRUE);
		$this->load->model('Brands_model');
		$brandAdded = $this->Brands_model->insertBrand($brandName, $brandDesc);
		echo $brandAdded;
	}	
	public function editSku(){
		$data['skuId'] = $this->input->post('skuId', TRUE);
		$data['skuName'] = $this->input->post('skuName', TRUE);
		$data['skuCount'] = $this->input->post('skuCount', TRUE);
		$data['skuDesc'] = $this->input->post('skuDesc', TRUE);		
		$this->load->view('pricelist/sku/editSku_form', $data);
	}
	public function updateSku(){
		$skuId = $this->input->post('skuId', TRUE);
		$skuCount = $this->input->post('skuCount', TRUE);
		$skuDesc = $this->input->post('skuDesc', TRUE);
		$this->load->model('Sku_model');
		$updated = $this->Sku_model->updateSku($skuId, $skuCount, $skuDesc);
		echo $updated;
	}
}		
	