<hr />
<h3>Search results for "<?php echo $term; ?>"</h3>
<table class="table table-bordered" id="search_table">
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
		echo "<tr><td>".$row->category_name."</td>";
		echo "<td><h4>".$row->item_name." (".$row->sku_name." - ".$row->sku_count.")</h4></td>";
		echo "<td> Retail: P ".$row->rprice;
		if($this->session->userdata('session_access') == 1 || $this->session->userdata('session_access') == 0 ){
			echo "<br /> Wholesale: P ".$row->wprice;
		}
		echo "</td></tr>";
		
	}
?>		
	</tbody>
</table>
