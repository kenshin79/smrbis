<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['success'] = 1;
		$this->load->view('log_in/login_page', $data);
	}
	

	
	public function checkAccess(){
		$access = $this->session->userdata('session_access');
		$uname = $this->session->userdata('session_user');
		if($uname){
			switch ($access) {
				case '0':
					echo "0";
					break;
				case '1':
					echo "1";		
					break;	
				default:
					echo "2";
					break;
			}
		}
		else{
			$this->load->helper('url');	
			header('Location: '.base_url()."index.php/log_in/log_out");
		}
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */