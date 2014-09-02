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
				echo "<td>".$row->cost." / ".$row->sku_name."</td>";
				echo "<td>".$row->supplier_name."</td>";
				echo "<td><button class=\"btn btn-default\" >Notes</button></td>";
				echo "<td><button class=\"btn btn-default\" onclick=\"checkAccess(['".$row->item_id."', '".$row->supplier_id."', '".$row->sku_id."', '".$row->cost_date."'], editItemCost);\" >Edit</button></td>";
				echo "</tr>";
			}	
			?>
			</tbody>
		</table>
	</div>
</div>