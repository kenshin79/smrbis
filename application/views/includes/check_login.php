<?php
		$this->load->helper('url');
		$this->load->library('Smrbis');
		//determine current session user if exists and show appropriate menu
		$active_user = $this->smrbis->getCurrentUser();	
                $this->load->model('log_in/Users_model');
		$match = $this->Users_model->getUserName($active_user);
                if($match){
                    foreach($match as $row){
                        $app_uname = $row->uname;
                    }                   
                }
                else{
                    $app_uname = "0";
                }
 
		if(strcmp($this->session->userdata('app_session_user'), $this->config->item('app_name').$app_uname)){ //if no session user
			header('Location:'.base_url().'index.php/log_in/log_out');		
		}

