<div class="row">
	<div class="col-md-3">
		<img src="<?php echo $icon1;?>" width="50px" height="50px" />
		<img src="<?php echo $icon2;?>" width="50px" height="50px" />User: <?php echo $this->session->userdata('session_user');?>				
	</div>
	<div class="col-md-6"></div>
	<div class="col-md-1">
		<?php
			if($icon3){
				echo "<a href=\"".base_url."index.php/pricelist\" ><img src=\"".$icon3."\" width=\"50px\" height=\"50px\" /></a>";
			}
		?>
	</div>
	<div class="col-md-1"><a href="<?php echo base_url()."index.php/";
	if(!strcmp($link, "admin")){
		echo "admin";
	}
	elseif (!strcmp($link, "search")){
		echo "welcome/frontpage";
	}
	?>
	"><img src="<?php echo $icon4;?>" width="50px" height="50px" /></a></div>
	<div class="col-md-1"><a href="<?php echo base_url()."index.php/log_in/log_out"; ?>"><img src="<?php echo $icon5;?>" width="50px" height="50px" title="Log out" /></a></div>
</div>