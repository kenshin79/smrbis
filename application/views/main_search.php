<?php
	include 'application/views/includes/check_login.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="<?php echo $this->config->item('jquery');?>"></script>
		<script src="<?php echo $this->config->item('bootstrap_js');?>"></script>		    	
	    <link href="<?php echo $this->config->item('bootstrap_css')?>" rel="stylesheet">    
	    <link href="<?php echo $this->config->item('datatables_css')?>" rel="stylesheet">			    
		<script src="<?php echo $this->config->item('datatables_js');?>"></script>
		<script src="<?php echo $this->config->item('datepicker_js');?>"></script>			    
	    <script src="<?php echo $this->config->item('common_js');?>"></script>	
	    <script src="<?php echo $this->config->item('pricelist_js'); ?>"></script>
    	<title>Search Price List</title>
	</head>
	<body>
		<div class="container-fluid">		
			<div class="row">
<?php
			include 'application/views/includes/headers/currentpage_header.php';
			include 'application/views/includes/headers/username_header.php';
?>			
			<div class="col-md-5"></div>
<?php
		if($this->session->userdata('session_access') == 0 || $this->session->userdata('session_access')==1){
			include 'application/views/includes/headers/manager_header.php';
			include 'application/views/includes/headers/sales_header.php';			
		}
		else{
			echo "<div class=\"col-md-2\"></div>";
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
	 	<br />
		<div class="row text-center">
				<img src="<?php echo $this->config->item('software', 'logo'); ?>" width="600px" height="150px" />
		</div>
		<br />
		<div class="row">
			<div class="col-md-3"></div>
			<div class="col-md-5"><input type="text" class="form-control input-lg" id="search_term"  placeholder="Search for item or category." /></div>
			<div class="col-md-1" ><button class="btn btn-success btn-lg" onclick="searchItem(document.getElementById('search_term').value);">Search</button></div>	
			<div class="col-md-3"></div>	
		</div>
		<br />
		<div class="row">
			<div class="col-md-2"></div>
			<div class="col-md-8" id="search_results"></div>
			<div class="col-md-2"></div>
		</div>

	</body>
</html>