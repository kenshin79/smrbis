<?php
	$this->load->helper('url');
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		if($valid_user){		
			foreach($valid_user as $row){
				$this->session->set_userdata('session_user', $row->uname);
                                $this->session->set_userdata('app_session_user', $this->config->item('app_name').$row->uname);
				$this->session->set_userdata('session_access', $row->access_type);
				$this->session->set_userdata('pwchanged', $row->pw_changed);	
                                
			}
			if($this->session->userdata('pwchanged') == 0){
				header('Location:'.base_url().'index.php/log_in/changePword');
			}
			else{			
				header('Location:'.base_url().'index.php/frontpage');
			}
		}
		else{
			$success = 0;
		}

	}
?>	
<!DOCTYPE html>
<html lang="en">
	<head>
		<link href="<?php echo $this->config->item('bootstrap_css');?>" rel="stylesheet">
		<script src="<?php echo $this->config->item('jquery');?>"></script>
		<script src="<?php echo $this->config->item('bootstrap_js');?>"></script>		
		<title>Log-IN to <?php echo $this->config->item('app_name'); ?></title>		
	</head>
	<body>
		<br />
		<div class="container">
			<div class="text-center">
				<img src="<?php echo $this->config->item('software', 'logo'); ?>" width="600px" height="200px" />
			</div>
			<div class="row">
				<div class="col-md-4"></div>
				<div class="col-md-4">
					<form role="form" action="<?php echo base_url()."index.php/log_in/checkUserPword"; ?>" method="post">
						<h1 class="text-center">Log IN</h1>
						<div class="form-group" id="uname_form">
							<label class="control-label" for="uname">User name:</label>
							<input type="text" class="form-control" id="uname" name="uname" />
						</div>
						<div class="form-group" id="pword_form">
							<label class="control-label" for="pword">Password:</label>
							<input type="password" class="form-control" id="pword" name="pword" />
						</div>
					<button class="btn btn-default" >Log IN</button>
					</form>
					
					<br />
					<div class="alert alert-warning hide" role="alert" id="logfail_alert"></div>
				</div>
				<div class="col-md-4"></div>
			</div>
		</div>
<?php
	if($success==0){
		echo "<script>";
		echo "$('#logfail_alert').removeClass('hide').html('Log-in failed. Please try again.');";
		echo "</script>";
	}

?>
	</body>	
	
</html>