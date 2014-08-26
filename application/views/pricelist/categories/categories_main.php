<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<br />
		<button class="btn btn-default" onclick="checkAccess([], newCategory_form);">Add Category</button>
	</div>
	<div class="col-md-1"></div>
</div>
<br />
<div class="row">
	<div class="col-md-1"></div>
	<div class="col-md-10">
		<table id="categories_table" class="display">
			<thead>
				<tr><th>No.</th><th>Category</th><th>Description</th><th>Edit</th></tr>
			</thead>
			<tbody>
		<?php
			$x = 1;
			foreach($all_categories as $row){
				echo "<tr>";
				echo "<td>".$x."</td>";
				echo "<td>".$row->category_name."</td>";
				echo "<td>".$row->description."</td>";
				echo "<td><button class=\"btn btn-default\" onclick=\"checkAccess(['".$row->category_id."', '".$row->category_name."','".$row->description."'], editCategory );\" >Edit</button>";
				echo "<button class=\"btn btn-default\" disabled onclick=\"checkAccess(['".$row->category_id."', '".$row->category_name."'], deleteCategory);\">Delete</button></td>";
				echo "</tr>";
				$x++;
			}
		?>		
			</tbody>
		</table>
	</div>
</div>