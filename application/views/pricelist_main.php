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
		<title>Manage Records</title>
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
			if($this->session->userdata('session_access') == 0){
				include 'application/views/includes/headers/search_header.php';
				include 'application/views/includes/headers/admin_header.php';
			}
			else{
				echo "<div class=\"col-md-1\"></div>";
				include 'application/views/includes/headers/search_header.php';
			}
			include 'application/views/includes/headers/logout_header.php';
		?>
		</div>
		<div class="row">
			<div class="col-md-1"></div>
			<div class="col-md-10">
				<ul class="nav nav-tabs" role="tablist">
  					<li class="active" ><a href="#items" data-toggle="tab" onclick="">Items</a></li>
  					<li><a href="#price" data-toggle="tab" onclick="">Price</a></li>
  					<li><a href="#sku" data-toggle="tab">SKU</a></li>
				</ul>							
			</div>
			<div class="col-md-1"></div>
		</div>
	</div>

		<script src="<?php echo $this->config->item('jquery');?>"></script>
		<script src="<?php echo $this->config->item('bootstrap_js');?>"></script>				
	</body>
</html>