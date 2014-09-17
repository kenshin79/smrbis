<hr />
<h3>Sales Orders</h3>
<table class="display" id="orders_table">
	<thead>
		<tr>
			<th>Last Edited</th>
			<th>Order No.</th>
			<th>Customer</th>
			<th>Sale Type</th>
			<th>Status</th>
			<th>Edit</th>
		</tr>
	</thead>
	<tbody>
<?php
	foreach ($all_orders as $row) {
		echo "<tr><td>".$row->timestamp."</td>";
		echo "<td>".$row->salesorder_id."</td>";
		echo "<td>".$row->customer_name."</td>";
		echo "<td>".$this->config->item($row->sale_type, 'saletype')."</td>";
		echo "<td>".$this->config->item($row->status, 'salestatus')."</td>";
		echo "<td><button class=\"btn btn-default\" onclick=\"\" ";
		if($row->status == 1){
			echo "disabled";
		}	
		echo ">Edit</button>";
		if($row->status == 0){
			echo "<button class=\"btn btn-default\" onclick=\"checkAccess(['".$row->salesorder_id."'], deleteOrder);\">Delete</button>";			
		}
		echo "</td></tr>";
	}
?>		
	</tbody>
</table>
