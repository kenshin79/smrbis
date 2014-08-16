<?php
		$this->load->helper('url');
		$this->load->library('Smrbis');
		//determine current session user if exists and show appropriate menu
		$active_user = $this->smrbis->getCurrentUser();
		
		if(!$active_user){ //if no session user
			header('Location:'.base_url().'index.php/log_in/log_out');		
		}
?>
