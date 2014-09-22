
<br />
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<table class="display" id="customers_table">
			<thead>
				<tr>
					<th>No.</th>
					<th>Customer</th>
					<th>Address</th>
					<th>Telephone</th>
					<th>Mobile</th>
					<th>Email</th>
					<th>Edit</th>
				</tr>
			</thead>
			<tbody>
				<?php
					$x = 1;
					foreach($all_list as $row){
						echo "<tr>";
						echo "<td>".$x."</td>";
						echo "<td>".$row->customer_name."</td>";
						echo "<td>".$row->customer_address."</td>";
						echo "<td>".$row->customer_telephone."</td>";
						echo "<td>".$row->customer_mobile."</td>";
						echo "<td>".$row->customer_email."</td>";
						echo "<td><button class=\"btn btn-info\" onclick=\"checkAccess(['".$row->customer_id."', '".$row->customer_name."', '".$row->customer_address."', '".$row->customer_telephone."', '".$row->customer_mobile."', '".$row->customer_email."'] , editCustomer );\" >Edit</button>";
						echo " <button class=\"btn btn-danger\" disabled onclick=\"checkAccess(['".$row->customer_id."', '".$row->customer_name."'], deleteCustomer);\">Delete</button></td>";						
						echo "</tr>";
						$x++;
					}
				?>
			</tbody>
		</table>
	</div>
	<div class="col-md-1"></div>
</div>