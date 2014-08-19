<?php
	include 'application/views/includes/check_login.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
    	<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
	    <link href="<?php echo $this->config->item('bootstrap_css');?>" rel="stylesheet">   
	    <link href="<?php echo $this->config->item('datatables_css')?>" rel="stylesheet">		
		<link href="<?php echo $this->config->item('datepicker_css');?>" rel="stylesheet">	
		<script src="<?php echo $this->config->item('jquery');?>"></script>
		<script src="<?php echo $this->config->item('bootstrap_js');?>"></script>						
		<script src="<?php echo $this->config->item('datatables_js');?>"></script>
		<script src="<?php echo $this->config->item('datepicker_js');?>"></script>			
	    <script src="<?php echo $this->config->item('pricelist_js');?>"></script>			    
	    <script>

	    </script>	
		<title>Manage Pricelist</title>
	</head>
	<body>
		<div class="alert alert-info hide" id="pricelist_alert" role="alert">
			<button type="button" class="close" onclick="$('#admin_alert').addClass('hide');" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<div id="alert_body"></div>
		</div>
		<div class="modal" id="pricelist_modal">
  			<div class="modal-dialog">
    			<div class="modal-content">
      				<div class="modal-header">
        				<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
        				<h4 class="modal-title"></h4>
      				</div>
		<div class="alert alert-info hide" id="modal_alert" role="alert">
			<button type="button" class="close" onclick="$('#modal_alert').addClass('hide');" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<div id="modalalert_body"></div>
		</div>      				
      				<div class="modal-body"></div>
    			</div><!-- /.modal-content -->
  			</div><!-- /.modal-dialog -->
		</div><!-- /.modal -->		
	<div class="container-fluid">
		<div class="row">
		<?php
			include 'application/views/includes/headers/currentpage_header.php';
			include 'application/views/includes/headers/username_header.php';
		?>				
		<div class="col-md-6"></div>
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
  					<li><a href="#sku" data-toggle="tab" onclick = "checkAccess(showSku);">SKU</a></li>
				</ul>							
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<div class="tab-content">
				<div id="items" class="tab-pane active fade in"></div>
				<div id="price" class="tab-pane"></div>
				<div id="sku" class="tab-pane"></div>
			</div>
		</div>		
	</div>
	</body>
</html>