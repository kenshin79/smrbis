<?php
	$this->load->helper('url');
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
			echo "<div class=\"col-md-3\">";
			echo "<img src=\"".base_url()."img/edit_find.png\" width=\"50px\" height=\"50px\" />";
			echo "<img src=\"".base_url()."img/users.png\" width=\"30px\" height=\"30px\" />User: ".$this->session->userdata('session_user');
			echo "<br /><a href=\"".base_url()."index.php/log_in/changePword"."\">Change password?</a>";			
			echo "</div>";
			echo "<div class=\"col-md-6\">";
			echo "</div>";
			echo "<div class=\"col-md-1\">";
			if(in_array($this->session->userdata('session_access'), array(0, 1))){
				echo "<a href=\"".base_url()."index.php/pricelist\" ><img src=\"".base_url()."img/pricelist.png\" width=\"50px\" height=\"50px\" /></a>";
				echo "<br />Records";
			}
			echo "</div>";
			echo "<div class=\"col-md-1\">";
			if($this->session->userdata('session_access') == 0){
				echo "<a href=\"".base_url()."index.php/admin"."\"><img src=\"".base_url()."img/admin.png\" height=\"50px\" width=\"50px\" title=\"Admin\" /></a>";
				echo "<br />Admin"; 			
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