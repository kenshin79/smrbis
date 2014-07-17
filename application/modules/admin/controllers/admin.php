<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Admin extends CI_Controller {
		
		public function index(){
			
			$this->load->view('admin_panel');
		}
		
		public function users_list(){
			$this->load->model('log_in/Users_model');
			$data['all_users'] = $this->Users_model->getAllUsers();
			$this->load->view('users_list', $data);
		}

		public function editUser(){
			$uid = $this->input->post('uid', TRUE);
			$uname = $this->input->post('uname', TRUE);
			$access = $this->input->post('access', TRUE);
			$data['uid'] = $uid;
			$data['uname'] = $uname;
			$data['access'] = $access;
			$this->load->view('edit_user', $data);
		}
		
		public function changeUser(){
			$this->load->model('log_in/Users_model');			
			$uid = $this->input->post('uid', TRUE);
			$access = $this->input->post('access', TRUE);			
			$user_changed = $this->Users_model->saveUserChanges($uid, $access);
			$data['all_users'] = $this->Users_model->getAllUsers();
			$this->load->view('users_list', $data);			
		}

		public function deleteUser(){
			$this->load->model('log_in/Users_model');			
			$uid = $this->input->post('uid', TRUE);
			$this->Users_model->deleteUser($uid);
			$data['all_users'] = $this->Users_model->getAllUsers();
			$this->load->view('users_list', $data);			
			
		}
		
		public function addUser(){
			$this->load->model('log_in/Users_model');				
			$uname = $this->input->post('uname', TRUE);
			$pword = crypt($this->input->post('pword', TRUE), $this->config->item('encryption_key'));
			$access = $this->input->post('access', TRUE);
			$user_added = $this->Users_model->addUser($uname, $pword, $access);
			$data['all_users'] = $this->Users_model->getAllUsers();
			$this->load->view('users_list', $data);						
			
		}
}		
	