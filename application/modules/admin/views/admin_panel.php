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
	    <link href="<?php echo $this->config->item('datatables_css')?>" rel="stylesheet">		
		<link href="<?php echo $this->config->item('datepicker_css');?>" rel="stylesheet">				    	
		<script src="<?php echo $this->config->item('jquery');?>"></script>
		<script src="<?php echo $this->config->item('datatables_js');?>"></script>
		<script src="<?php echo $this->config->item('bootstrap_js');?>"></script>	
		<script src="<?php echo $this->config->item('datepicker_js');?>"></script>
		<script src="<?php echo $this->config->item('common_js');?>"></script>
		<script src="<?php echo $this->config->item('admin_js');?>"></script>
		<script>
			$(document).ready(function(){
				load_users();
			});				
		</script>	
		<title>Admin Panel</title>
	</head>
	<body>
		<div class="alert alert-info hide" id="main_alert" role="alert">
			<button type="button" class="close" onclick="$('#main_alert').addClass('hide');" ><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
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
			<div class="col-md-5"></div>
		<?php
			include 'application/views/includes/headers/sales_header.php';
			include 'application/views/includes/headers/search_header.php';
			include 'application/views/includes/headers/manager_header.php';
			include 'application/views/includes/headers/logout_header.php';
		?>	
			</div>

			
			<div class="row">
				<div class="col-md-1"></div>
				<div class="col-md-10">
				<ul class="nav nav-tabs" role="tablist">
  					<li class="active" ><a href="#users" data-toggle="tab" onclick="checkAccess([], load_users);">Users</a></li>
  					<li><a href="#ulog" data-toggle="tab" onclick="checkAccess([], load_logs);">User Log</a></li>

				</ul>										
				</div>
				<div class="col-md-1"></div>
			</div>
			<div class="row">
				<div class="tab-content">
				<div id="users" class="tab-pane active fade in"></div>
				<div id="ulog" class="tab-pane"></div>

				</div>
			</div>
		</div>

		
			
	</body>
</html>