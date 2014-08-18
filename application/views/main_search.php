<?php
	include 'application/views/includes/check_login.php';
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
			include 'application/views/includes/headers/currentpage_header.php';
			include 'application/views/includes/headers/username_header.php';
?>			
			<div class="col-md-6"></div>
<?php
		if($this->session->userdata('session_access') == 0 || $this->session->userdata('session_access')==1){
			include 'application/views/includes/headers/manager_header.php';			
		}
		else{
			echo "<div class=\"col-md-1\"></div>";
		}

		if($this->session->userdata('session_access') == 0){
			include 'application/views/includes/headers/admin_header.php';
		} 
		else{
			echo "<div class=\"col-md-1\"></div>";
		}
		include 'application/views/includes/headers/logout_header.php';
		
?>			
			</div>

	 	</div>

		<script src="<?php echo $this->config->item('jquery');?>"></script>
		<script src="<?php echo $this->config->item('bootstrap_js');?>"></script>		
	</body>
</html>