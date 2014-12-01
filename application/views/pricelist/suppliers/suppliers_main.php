
<br />
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<table class="display compact" id="suppliers_table">
			<thead>
				<tr>
					<th>No.</th>
					<th>Supplier</th>
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
						echo "<td>".$row->supplier_name."</td>";
						echo "<td>".$row->supplier_address."</td>";
						echo "<td>".$row->supplier_telephone."</td>";
						echo "<td>".$row->supplier_mobile."</td>";
						echo "<td>".$row->supplier_email."</td>";
						echo "<td><button class=\"btn btn-info\" onclick=\"checkAccess(['".$row->supplier_id."', '".$row->supplier_name."', '".$row->supplier_address."', '".$row->supplier_telephone."', '".$row->supplier_mobile."', '".$row->supplier_email."'] , editSupplier );\" >Edit</button>";
						//echo " <button class=\"btn btn-danger\" disabled onclick=\"checkAccess(['".$row->supplier_id."', '".$row->supplier_name."'], deleteSupplier);\">Delete</button>";						
						echo "</td></tr>";
						$x++;
					}
				?>
			</tbody>
		</table>
	</div>
	<div class="col-md-1"></div>
</div>