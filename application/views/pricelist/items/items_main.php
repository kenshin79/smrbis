
<br />
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<table id="items_table" class="display compact">
			<thead>
				<tr><th>No.</th><th>Item</th><th>Category</th><th>Description</th><th>Edit Item</th><th>Cost/Price</th></tr>
			</thead>
			<tbody>
		<?php
			$x = 1;
			foreach($all_list as $row){
				echo "<tr>";
				echo "<td>".$x."</td>";
				echo "<td>".$row->item_name."</td>";
				echo "<td>".$row->category_name."</td>";
				echo "<td>".$row->description."</td>";
				echo "<td>";
				echo "<button class=\"btn btn-info\" onclick=\"checkAccess(['".$row->item_id."', '".$row->item_name."','".$row->item_category."', '".$row->description."'], editItem );\" >Edit</button>";
				echo " <button class=\"btn btn-danger\" disabled onclick=\"checkAccess(['".$row->item_id."', '".$row->item_name."'], deleteItem);\">Delete</button></td>";
				echo "<td><button class=\"btn btn-success\" onclick=\"checkAccess(['".$row->item_id."', '".$row->item_name."'], showCostPrice);\" >Cost/Price</button></td>";					
				echo "</tr>";
				$x++;
			}
		?>		
			</tbody>
		</table>
	</div>
</div>