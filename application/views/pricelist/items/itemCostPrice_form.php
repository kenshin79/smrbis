<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10"><h2><?php echo $itemName;?></h2></div>
</div>
<br />
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10"><h3>PRICES <button class="btn btn-default" onclick="checkAccess(['<?php echo $itemId; ?>', '<?php echo $itemName; ?>', 'price', 'pricelist/newItemPrice_form'], newItemCost_form)">Add Price</button></h3></div>
</div>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<table id="prices_table" class="display">
			<thead>
				<tr>
					<th>Date</th>
					<th>SKU</th>
					<th>Retail</th>
					<th>Wholesale</th>
					<th>Notes</th>
					<th>Edit</th>
				</tr>
			</thead>
			<tbody>
				<?php
				foreach ($item_prices as $row) {
					echo "<tr><td>".$row->price_date."</td>";
					echo "<td>".$row->sku_name."</td>";
					echo "<td>".$row->rprice."</td>";
					echo "<td>".$row->wprice."</td>";
					echo "<td><textarea class=\"form_control\" readonly=\"readonly\">".$row->notes."</textarea></td>";
					echo "<td><button class=\"btn btn-default\" onclick=\"checkAccess(['".$row->price_id."', '".$row->rprice."', '".$row->wprice."', '".str_ireplace("\n", "&#92n", $row->notes)."', '".$itemId."', '".$itemName."', '".$row->sku_name."'], editPrice)\">Edit</button></td></tr>";
					
				}	
				
				?>
			</tbody>
		</table>
	</div>
</div>
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10"><h3>COSTS <button class="btn btn-default" onclick="checkAccess(['<?php echo $itemId; ?>', '<?php echo $itemName; ?>', 'cost', 'pricelist/newItemCost_form'], newItemCost_form);">Add Cost</button></h3></div>
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
					<th>Cost per piece</th>
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
				echo "<td> P".number_format(round($row->cost/$row->sku_count, 2) ,2, ".", "" )."</td>";
				echo "<td>".$row->supplier_name."</td>";
				echo "<td><textarea readonly>".$row->notes."</textarea></td>";
				echo "<td><button class=\"btn btn-default\" onclick=\"checkAccess(['".$row->cost_id."', '".str_ireplace("\n", "&#92n", $row->notes)."', '".$row->item_id."', '".$itemName."'], editCostNotes);\" >Edit Notes</button>";
				echo "<button class=\"btn btn-default\" onclick=\"checkAccess(['".$row->cost_id."', '".$row->item_id."', '".$itemName."'], deleteCost);\">Delete</button>";
				echo "</td>";
				echo "</tr>";
			}	
			?>
			</tbody>
		</table>
	</div>
</div>