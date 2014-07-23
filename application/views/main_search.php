<?php
		$this->load->helper('url');
		$this->load->library('Smrbis');
		//determine current session user if exists and show appropriate menu
		$active_user = $this->smrbis->getCurrentUser();
		
		if(!$active_user){ //if no session user
			header('Location:'.base_url().'index.php/log_in/log_out');		
		}
?>

<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
	    <link href="<?php echo $this->config->item('bootstrap_css')?>" rel="stylesheet">    	
    	<title>Search Price List</title>
	</head>
	<body>
		<div class="container-fluid">		
			<div class="row">

<?php
			echo "<div class=\"col-md-3\">";
			echo "<img src=\"".base_url()."img/pricelist.png\" width=\"50px\" height=\"50px\" />";
			echo "<img src=\"".base_url()."img/users.png\" width=\"30px\" height=\"30px\" />User: ".$this->session->userdata('session_user');
			echo "<br /><a href=\"".base_url()."index.php/log_in/changePword"."\">Change password?</a>";			
			echo "</div>";
			echo "<div class=\"col-md-7\">";
			echo "</div>";
			echo "<div class=\"col-md-1\">";
			if($this->session->userdata('session_access') == 0){
				echo "<a href=\"".base_url()."index.php/admin"."\"><img src=\"".base_url()."img/admin.png\" height=\"50px\" width=\"50px\" title=\"Admin Panel\" /></a>"; 			
			}
			echo "</div>";
			echo "<div class=\"col-md-1\">";
			echo "<a href=\"".base_url()."index.php/log_in/log_out"."\"><img src=\"".base_url()."img/log_out.png\" height=\"50px\" width=\"50px\" title=\"Log-Out\" /></a>";
			echo "</div>";


?>	
		 	</div>
		</div>

		<script src="<?php echo $this->config->item('jquery');?>"></script>
		<script src="<?php echo $this->config->item('bootstrap_js');?>"></script>		
	</body>
</html>