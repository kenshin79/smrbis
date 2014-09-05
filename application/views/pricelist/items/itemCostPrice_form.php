<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10"><h2><?php echo $itemName;?></h2></div>
</div>
<br />
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10"><button class="btn btn-default" onclick="checkAccess(['<?php echo $itemId; ?>', '<?php echo $itemName; ?>'], newItemCost_form);">Add Item Cost</button></div>
</div>
<br />
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<table id="costs_table" class="display">
			<thead>
				<tr>
					<th>Date</th>
					<th>Cost per SKU</th>
					<th>Supplier</th>
					<th>Notes</th>
					<th>Edit</th>
				</tr>
			</thead>
			<tbody>
			<?php
			foreach($item_costs as $row){
				echo "<tr><td>".$row->cost_date."</td>";
				echo "<td> P".number_format($row->cost, 2, ".", "")." / ".$row->sku_name."</td>";
				echo "<td>".$row->supplier_name."</td>";
				echo "<td><textarea readonly>".$row->notes."</textarea></td>";
				echo "<td><button class=\"btn btn-default\" onclick=\"checkAccess(['".$row->cost_id."', '".$row->notes."'], editCostNotes);\" >Edit Notes</button>";
				echo "<button class=\"btn btn-default\" onclick=\"checkAccess(['".$row->cost_id."', '".$row->item_id."', '".$itemName."'], deleteCost);\">Delete</button>";
				echo "</td>";
				echo "</tr>";
			}	
			?>
			</tbody>
		</table>
	</div>
</div>