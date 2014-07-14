<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_in extends CI_Controller {
	
	
	
	public function index(){
		$data['valid_user'] = "";
		$this->load->view('login_page', $data);
	}	

	public function checkUserPword(){
		$this->load->model('Users_model');
		$username = $this->input->post('uname', TRUE);
		$password = crypt($this->input->post('pword', TRUE), $this->config->item('encryption_key'));
		$data['valid_user'] = $this->Users_model->checkUsername($username, $password);
		$this->load->view('login_page', $data);		
	}
	
	public function log_out(){
		$this->load->helper('url');
		$this->session->sess_destroy();
		header('Location:'.base_url());
	}
	
	public function changePword(){
		$this->load->view('changePword_form');
	}
	
	public function newPword(){
		$this->load->helper('url');		
		$this->load->model('Users_model');
		$session_user = $this->input->post('uname', TRUE);
		$pword = crypt($this->input->post('pword1', TRUE), $this->config->item('encryption_key'));
		$changed_pw = $this->Users_model->updatePword($session_user, $pword);
		$this->session->sess_destroy();
		header('Location:'.base_url());		
		
	}
}	
