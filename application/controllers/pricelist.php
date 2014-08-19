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
	public function showSku(){
		$this->load->model('Sku_model');
		$data['all_sku'] = $this->Sku_model->getAllSku();
		$this->load->view('pricelist/sku/sku_main', $data);
	}	
	
	public function newSkuForm(){
		$this->load->view('pricelist/sku/newSku_form');
	}
	public function addSku(){
		$skuName = $this->input->post('skuName', TRUE);
		$skuCount = $this->input->post('skuCount', TRUE);
		$skuDesc = $this->input->post('skuDesc', TRUE);
		$this->load->model('Sku_model');
		$skuAdded = $this->Sku_model->insertSku($skuName, $skuCount, $skuDesc);
		echo $skuAdded;
	}
}		
	