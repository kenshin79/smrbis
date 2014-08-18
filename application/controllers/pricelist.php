<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pricelist extends CI_Controller {
		
	public function index(){
		$data['icon1'] = $this->config->item('pricelist', 'icon');
		$data['icon2'] = $this->config->item('user', 'icon');
		$data['icon3'] = $this->config->item('search', 'icon');
		$data['icon6'] = $this->config->item('admin', 'icon');
		$data['icon5'] = $this->config->item('log_out', 'icon');
		$this->load->view('pricelist_main', $data);
	} 		
		
}		
	