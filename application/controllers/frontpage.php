<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Frontpage extends CI_Controller {
		
	public function index(){
		$data['icon1'] = $this->config->item('search', 'icon');
		$data['icon2'] = $this->config->item('user', 'icon');
		$data['icon4'] = $this->config->item('pricelist', 'icon');
		$data['icon6'] = $this->config->item('admin', 'icon');
		$data['icon5'] = $this->config->item('log_out', 'icon');	
		$data['icon7'] = $this->config->item('sales', 'icon');	
		$data['current'] = "Search Page";
		$this->load->view('main_search', $data);
	}			
	public function searchTerm(){
		$term = $this->input->post('search_term', TRUE);		
		$this->load->model('Prices_model');
		$data['search_results'] = $this->Prices_model->searchTerm($term);
		$data['term'] = $term;
		$this->load->view('pricelist/items/search_results', $data);
	}
}	