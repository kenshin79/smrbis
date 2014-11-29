
<br />
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<table id="sku_table" class="display compact">
			<thead>
				<tr><th>No.</th><th>SKU</th><th>Quantity</th><th>Description</th><th>Edit</th></tr>
			</thead>
			<tbody>
		<?php
			$x = 1;
			foreach($all_list as $row){
				echo "<tr>";
				echo "<td>".$x."</td>";
				echo "<td>".$row->sku_name."</td>";
				echo "<td>".$row->sku_count."</td>";
				echo "<td>".$row->description."</td>";
				echo "<td><button class=\"btn btn-info\" onclick=\"checkAccess(['".$row->sku_id."', '".$row->sku_name."', '".$row->sku_count."', '".$row->description."'], editSku );\" >Edit</button>";
				//echo " <button class=\"btn btn-danger\" disabled onclick=\"checkAccess(['".$row->sku_id."', '".$row->sku_name."'], deleteSku);\">Delete</button></td>";
				echo "</tr>";
				$x++;
			}
		?>		
			</tbody>
		</table>
	</div>
</div>