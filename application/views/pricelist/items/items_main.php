<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<br />
		<button class="btn btn-default" onclick="checkAccess(['Add Item', 'items', 'newItem_form'], newEntry_form);">Add Item</button>
	</div>
	<div class="col-md-1"></div>
</div>
<br />
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<table id="items_table" class="display">
			<thead>
				<tr><th>No.</th><th>Item</th><th>Category</th><th>Description</th><th>Edit</th></tr>
			</thead>
			<tbody>
		<?php
			$x = 1;
			foreach($all_list as $row){
				echo "<tr>";
				echo "<td>".$x."</td>";
				echo "<td>".$row->item_name."</td>";
				echo "<td>".$row->item_category."</td>";
				echo "<td>".$row->description."</td>";
				echo "<td><button class=\"btn btn-default\" onclick=\"checkAccess(['".$row->item_id."', '".$row->item_name."','".$row->item_category.'", '.$row->description."'], editItem );\" >Edit</button>";
				echo "<button class=\"btn btn-default\" onclick=\"checkAccess(['".$row->item_id."', '".$row->item_name."'], deleteItem);\">Delete</button></td>";
				echo "</tr>";
				$x++;
			}
		?>		
			</tbody>
		</table>
	</div>
</div>