<form role="form">
	<div class="form-group">
				<label for="itemName">Item:</label>
				<input class="form-control" type="text" id="itemName" placeholder="Item Name (include Brand)"/>	
				<br />
<?php
	$this->load->model('Categories_model');
	$all_categories = $this->Categories_model->getAll();
?>				
				<label for="itemCategory">Category:</label>
				<select class="form-control" id="itemCategory">
<?php
			foreach($all_categories as $row){
				echo "<option value = \"".$row->category_name."\">".$row->category_name."</option>";
			}
?>
				</select>	
				Category not in dropdown list? <span class="btn btn-default small" onclick="checkAccess(['Add New Category', 'categories', 'newCategory_form'], newEntry_form);">Add Category</span>
				<br />
				<label for="itemDesc">Description:</label>
				<input class="form-control" type="text" id="itemDesc" placeholder="Item Description (optional)"/>	
				
	</div>
</form>
<br />
       	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       	<button type="button" class="btn btn-success" onclick="checkAccess([document.getElementById('itemName').value, document.getElementById('itemCategory').value, document.getElementById('itemDesc').value], addItem)" >Save</button>