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
	public function getOrderItems(){
		$salesorderId = $this->input->post('salesorderId', TRUE);	
		$data['salesorderId'] = $salesorderId;
		$this->load->model('Salesorders_model');
		$data['order_details'] = $this->Salesorders_model->getOrderDetails($salesorderId);
		$this->load->model('Soitems_model');
		$data['order_items'] = $this->Soitems_model->getAll($salesorderId);
		$this->load->view('sales/open_order_form', $data);
	}
	public function newOrderItem(){
		$data['salesorderId'] = $this->input->post('salesorderId', TRUE);
		$this->load->view('sales/newOrderItem_form', $data);
	}
	public function priceDropDown(){
		$clue = $this->input->post('clue', TRUE); 
		$this->load->model('Prices_model');
		$data['pricedrop'] = $this->Prices_model->priceDropDown($clue);
		$this->load->view('sales/price_dropdown', $data);
	}
	public function wrDropDown(){
		$priceId = $this->input->post('priceId', TRUE);
		$this->load->model('Prices_model');
		$data['itemPrices'] = $this->Prices_model->wrDropDown($priceId);
		$this->load->view('sales/wr_dropdown', $data);
	}
	public function addOrderItem(){
		$salesorderId = $this->input->post('salesorderId', TRUE);			
		$this->load->model('Soitems_model');
		$added = $this->Soitems_model->insertOrderItem($salesorderId);
		$this->load->model('Salesorders_model');
		$this->Salesorders_model->updateTimestamp($salesorderId);
		echo $added;
	}
	public function orderItemUnique(){
		$salesorderId = $this->input->post('salesorderId', TRUE);
		$priceId = $this->input->post('priceId', TRUE);
		$this->load->model('Soitems_model');
		$duplicate = $this->Soitems_model->uniqueOrderItem($salesorderId, $priceId);
		if($duplicate){
			echo "1";
		}
		else{
			echo "0";
		};
	}
	public function removeOrderItem(){
		$salesorderId = $this->input->post('salesorderId', TRUE);
		$priceId = $this->input->post('priceId', TRUE);
		$this->load->model('Soitems_model');
		$removed = $this->Soitems_model->removeOrderItem($salesorderId, $priceId);
		$this->load->model('Salesorders_model');
		$this->Salesorders_model->updateTimestamp($salesorderId);		
		echo $removed;
		
	}
	public function finalizeOrder(){
		$salesorderId = $this->input->post('salesorderId', TRUE);
		$this->load->model('Salesorders_model');
		$finalized = $this->Salesorders_model->finalizeOrder($salesorderId);
		echo $finalized;
	}
	public function printSalesOrder($salesorderId){
		$this->load->model('Salesorders_model');
		$data['order_details'] = $this->Salesorders_model->getOrderDetails($salesorderId);
		$this->load->model('Soitems_model');
		$data['order_items'] = $this->Soitems_model->getAll($salesorderId);
		$this->load->view('sales/printSalesOrder', $data);	
	}
}		
	