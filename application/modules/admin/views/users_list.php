<br />
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<button class="btn btn-default" onclick="checkAccess(newUser);" title="add new user">New User</button>		
	</div>
	<div class="col-md-1"></div>
</div>
<br />
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
<table id="users_table" class="display">
	<thead>
		<tr>
			<th>No.</th>
			<th>User Name</th>
			<th>Access</th>
			<th>Password Changed</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody>	
		<?php
			$x = 1;
			if($all_users){
				foreach($all_users as $row){
					echo "<tr>";
					echo "<td>".$x."</td>";
					echo "<td>".$row->uname."</td>";
					echo "<td>".$this->config->item($row->access_type, 'access_type')."</td>";
					echo "<td>".$this->config->item($row->pw_changed, 'pw_changed')."</td>";
					echo "<td><button class=\"btn btn-default\" ";
					if(!strcmp($row->uname, $this->session->userdata('session_user'))){
						echo "disabled";
					}
					echo " onclick = \"checkAccess3('".$row->u_id."','".$row->uname."',".$row->access_type.", updateUser);\">Edit</button>";
					echo "<button class=\"btn btn-default\" ";
					if(!strcmp($row->uname, $this->session->userdata('session_user'))){
						echo "disabled";
					}
					echo " onclick=\"checkAccess2('".$row->u_id."', '".$row->uname."', deleteUser)\">Delete</button></td>";
					echo "</tr>";
					$x++;
				}
			}
		
		?>
	</tbody>
</table>			
	</div>

	
</div>


