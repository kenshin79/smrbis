<div class="col-md-2">
	<img src="<?php echo $icon2; ?>" width="30px" height="30px" />
	<br />
	<span>User: <?php echo $this->session->userdata('session_user'); ?></span>
	<br />
	<a href="<?php echo base_url()."index.php/log_in/changePword"; ?>" ><span>Change password?</span></a>			
</div>