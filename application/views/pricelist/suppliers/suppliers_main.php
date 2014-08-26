<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10"><br /><button class="btn btn-default" onclick="checkAccess([], newSupplier_form)">Add Supplier</button></div>
</div>
<br />
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<table class="display" id="suppliers_table">
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
					foreach($all_suppliers as $row){
						echo "<tr>";
						echo "<td>".$x."</td>";
						echo "<td>".$row->supplier_name."</td>";
						echo "<td>".$row->supplier_address."</td>";
						echo "<td>".$row->supplier_telephone."</td>";
						echo "<td>".$row->supplier_mobile."</td>";
						echo "<td>".$row->supplier_email."</td>";
						echo "<td><button class=\"btn btn-default\" onclick=\"checkAccess(['".$row->supplier_id."', '".$row->supplier_name."', '".$row->supplier_address."', '".$row->supplier_telephone."', '".$row->supplier_mobile."', '".$row->supplier_email."'] , editSupplier );\" >Edit</button>";
						echo "<button class=\"btn btn-default\" onclick=\"checkAccess(['".$row->supplier_id."', '".$row->supplier_name."'], deleteSupplier);\">Delete</button></td>";						
						echo "</tr>";
						$x++;
					}
				?>
			</tbody>
		</table>
	</div>
	<div class="col-md-1"></div>
</div>