<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<br />
		<button class="btn btn-default" onclick="checkAccess([], newBrands_form);">Add Brand</button>
	</div>
	<div class="col-md-1"></div>
</div>
<br />
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<table id="brands_table" class="display">
			<thead>
				<tr><th>No.</th><th>Brand</th><th>Description</th><th>Edit</th></tr>
			</thead>
			<tbody>
		<?php
			$x = 1;
			foreach($all_brands as $row){
				echo "<tr>";
				echo "<td>".$x."</td>";
				echo "<td>".$row->brand_name."</td>";
				echo "<td>".$row->description."</td>";
				echo "<td><button class=\"btn btn-default\" onclick=\"checkAccess(['".$row->brand_id."', '".$row->brand_name."','".$row->description."'], editBrand );\" >Edit</button>";
				echo "<button class=\"btn btn-default\" onclick=\"var xy = checkAccess(['".$row->brand_id."', '".$row->brand_name."'], deleteBrand);\">Delete</button></td>";
				echo "</tr>";
				$x++;
			}
		?>		
			</tbody>
		</table>
	</div>
</div>