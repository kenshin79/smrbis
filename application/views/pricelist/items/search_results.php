<hr />
<h3>Search results for "<?php echo $term; ?>"</h3>
<table class="" id="search_table">
	<thead>
		<tr>
			<th>Category</th>
			<th>Item (SKU)</th>
			<th>Price</th>
		</tr>
	</thead>
	<tbody>
<?php

	foreach($search_results as $row){
		echo "<tr><td>".$row->item_category."</td>";
		echo "<td>".$row->item_name." (".$row->sku_name.")</td>";
		echo "<td>".$row->rprice."</td></tr>";
		
	}
?>		
	</tbody>
</table>
