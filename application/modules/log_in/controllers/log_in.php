<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Log_in extends CI_Controller {
	
	
	//log-in page at base_url/index.php/log_in
	public function index(){
		$data['valid_user'] = "";
		$this->load->view('login_page', $data);
	}	

	//check if uname and pword entered match entry in database, returns user info
	public function checkUserPword(){
		$this->load->model('Users_model');
		$username = $this->input->post('uname', TRUE);
		$password = crypt($this->input->post('pword', TRUE), $this->config->item('encryption_key'));
		$data['valid_user'] = $this->Users_model->checkUsername($username, $password);
		$this->load->view('login_page', $data);		
	}
	
	//logging out and return to main page
	public function log_out(){
		$this->load->helper('url');
		$this->session->sess_destroy();
		header('Location:'.base_url());
	}
	
	//go to change password form
	public function changePword(){
		$this->load->view('changePword_form');
	}
	
	
	//processes new password changed by user
	public function newPword(){
		$this->load->helper('url');		
		$this->load->model('Users_model');
		$session_user = $this->input->post('uname', TRUE);
		$pword = crypt($this->input->post('pword1', TRUE), $this->config->item('encryption_key'));
		$changed_pw = $this->Users_model->updatePword($session_user, $pword);
		$this->session->set_userdata('pwchanged', 1);
		header('Location:'.base_url());		
		
	}
}	
