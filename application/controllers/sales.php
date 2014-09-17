<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Sales extends CI_Controller {
	
	public function index(){
			$data['icon1'] = $this->config->item('sales', 'icon');
			$data['icon2'] = $this->config->item('user', 'icon');
			$data['icon3'] = $this->config->item('search', 'icon');
			$data['icon4'] = $this->config->item('pricelist', 'icon');
			$data['icon5'] = $this->config->item('log_out', 'icon');
			$data['icon6'] = $this->config->item('admin', 'icon');
			$data['current'] = "Sales Order";		
			$this->load->view('sales/sales_panel', $data);				
	}	
	public function showAll(){
		$this->load->model('Salesorders_model');
		$data['all_orders'] = $this->Salesorders_model->getAll();
		$this->load->view('sales/all_orders', $data);
	}
	public function newOrder(){
		
		$this->load->model('Customers_model');
		$data['customers'] = $this->Customers_model->getAll();
		$this->load->view('sales/newOrder_form', $data);
	}	
	public function addOrder(){
		$this->load->model('Salesorders_model');
		$added = $this->Salesorders_model->insertOrder();
		echo $added;
	}
	public function deleteOrder(){
		$this->load->model('Salesorders_model');
		$deleted = $this->Salesorders_model->deleteOrder();
		echo $deleted;
	}
}		
	