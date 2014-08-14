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
		<title>Manage Records</title>
	</head>
	<body>
	<div class="container-fluid">
		<div class="row">
			<div class="col-md-3">
				<img src="<?php echo base_url()."img/pricelist.png"; ?>" width="50px" height="50px" />
				<?php
					echo "<img src=\"".base_url()."img/users.png\" width=\"30px\" height=\"30px\" />User: ".$this->session->userdata('session_user');				
				?>		
			</div>
			<div class="col-md-7"></div>
			<div class="col-md-1"><a href="<?php echo base_url()."index.php/welcome/frontpage";?>"><img src="<?php echo base_url();?>/img/edit_find.png" width="50px" height="50px" title="Back to Pricelist Manager" /></a></div>
			<div class="col-md-1"><a href="<?php echo base_url()."index.php/log_in/log_out"; ?>"><img src="<?php echo base_url();?>/img/log_out.png" width="50px" height="50px" title="Log out" /></a></div>
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