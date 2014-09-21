<hr />
<?php
foreach($order_details as $row){
	echo "<h3><label class=\"label label-default\">Date (Last Edit)</label> ".date($row->timestamp)."</h3>";
    echo "<h3><label class=\"label label-default\">Customer</label> ".$row->customer_name."</h3>";
	echo "<h3><label class=\"label label-default\">Sale Type</label> ".$this->config->item($row->sale_type, 'saletype')."</h3>";
	
}
?>
<br />
<button class="btn btn-default" onclick="checkAccess(['<?php echo $salesorderId; ?>'], newOrderItem_form);">Add Order Item</button>
 <button class="btn btn-success" onclick="checkAccess(['<?php echo $salesorderId; ?>'], finalizeOrder);">Finalize</button>
<br />
<br />
<?php echo "Total of ".count($order_items)." items"; ?>
<table class="table table-bordered">
	<thead>
		<tr><th>Item#</th>
			<th>Qty</th>
			<th>Item</th>
			<th>Unit Price</th>
			<th>Total</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody>
<?php
$x = 1;
$total = 0;
foreach($order_items as $row){
	echo "<tr><td>".$x."</td>";
	echo "<td>".$row->quantity."</td>";
	echo "<td><h4>".$row->item_name." (".$row->sku_name." - ".$row->sku_count.")</h4></td>";
	echo "<td>".$row->unit_price."</td>";
	echo "<td>".number_format($row->quantity*$row->unit_price, 2)."</td>";
	echo "<td><button class=\"btn btn-danger\" onclick=\"checkAccess(['".$row->salesorder_id."', '".$row->price_id."'], removeOrderItem);\">Remove</button>";
	echo "</tr>";
	$total = $total + $row->quantity*$row->unit_price;
	$x++;
}
?>
	<tr><td></td><td></td><td></td>
		<td><h4>GRAND TOTAL</h4></td>
		<td><h4><?php echo number_format($total, 2);  ?></h4></td>
		<td></td>
	</tr>		
	</tbody>
</table>



