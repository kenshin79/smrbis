<form role="form">
	<div class="form-group">
			<label for="uname">User name:</label>
			<input class="form-control" type="text" id="uname" placeholder="at least 8 characters"/>			
		<br />
			<label for="pword1" >Password:</label>
			<input class="form-control" type="password" id="pword1" placeholder="at least 8 characters"/> 	
		<br />
			<label for="pword2">Retype Password:</label>
			<input class="form-control" type="password" id="pword2" placeholder="retype password" />
		<br />
			<label for="pword2">Access:</label>
			<select class="form-control" id="access">
				<?php 
					$z = 0;
					foreach($this->config->item('access_type') as $k){
						echo "<option value=\"".$z."\">".$k."</option>";
						$z++;
					}
				?>
			</select>
</form>
		<br />
				<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>				
				<span class="btn btn-default" onclick="checkAccess([document.getElementById('uname').value, document.getElementById('pword1').value, document.getElementById('pword2').value, document.getElementById('access').value], addUser )">Save</span>						
