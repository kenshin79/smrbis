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
		<script src="<?php echo $this->config->item('common_js');?>"></script>		
	    <script src="<?php echo $this->config->item('pricelist_js');?>"></script>			    
	    <script>
	    	$(document).ready(function(){
	    		showMain('#items', '#items_table', 'items/items_main', 'Items_model');
	    	});
	    </script>
		<title>Manage Pricelist</title>
	</head>
	<body>
		<div class="alert alert-info hide" id="main_alert" role="alert">
			<button type="button" class="close" onclick="$('#admin_alert').addClass('hide');" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
			<div id="mainalert_body"></div>
		</div>
		<div class="modal" id="main_modal">
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
  					<li class="active" ><a href="#items" data-toggle="tab" onclick="checkAccess(['#items', '#items_table', 'items/items_main', 'Items_model'], showMain)">Items</a></li>
  					<li><a href="#sku" data-toggle="tab" onclick = "checkAccess(['#sku', '#sku_table', 'sku/sku_main', 'Sku_model'], showMain);">SKU</a></li>
  					<li><a href="#categories" data-toggle="tab" onclick = "checkAccess(['#categories', '#categories_table', 'categories/categories_main', 'Categories_model'], showMain);">Categories</a></li>
  					<li><a href="#suppliers" data-toggle="tab" onclick="checkAccess(['#suppliers', '#suppliers_table', 'suppliers/suppliers_main', 'Suppliers_model'], showMain);">Suppliers</a></li>
					<li><a href="#customers" data-toggle="tab" onclick="checkAccess(['#customers', '#customers_table', 'customers/customers_main', 'Customers_model'], showMain);">Customers</a></li>	
				</ul>							
			</div>
			<div class="col-md-1"></div>
		</div>
		<div class="row">
			<div class="tab-content">
				<div id="items" class="tab-pane active"></div>
				<div id="sku" class="tab-pane"></div>
				<div id="categories" class="tab-pane"></div>
				<div id="suppliers" class="tab-pane"></div>
				<div id="customers" class="tab-pane"></div>
			</div>
		</div>		
	</div>
	</body>
</html>