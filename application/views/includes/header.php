<div class="row">
	<div class="col-md-3">
		<img src="<?php echo $icon1;?>" width="50px" height="50px" />
		<img src="<?php echo $icon2;?>" width="50px" height="50px" />User: <?php echo $this->session->userdata('session_user');?>				
	</div>
	<div class="col-md-6"></div>
	<div class="col-md-1">
		<?php
			if($icon3){
				echo "<img src=\"".$icon3."\" width=\"50px\" height=\"50px\" />";
			}
		?>
	</div>
	<div class="col-md-1"><a href="<?php echo base_url()."index.php/welcome/frontpage";?>"><img src="<?php echo base_url();?>/img/edit_find.png" width="50px" height="50px" title="Back to Pricelist Manager" /></a></div>
	<div class="col-md-1"><a href="<?php echo base_url()."index.php/log_in/log_out"; ?>"><img src="<?php echo base_url();?>/img/log_out.png" width="50px" height="50px" title="Log out" /></a></div>
</div>