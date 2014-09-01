<form role="form">
	<div class="form-group">
		<label for="itemName">Item:</label>
		<input type="text" class="form-control" id="itemName" value="<?php echo $itemName;?>" />
		<br />
		<label for="itemCategory">Category:</label>
		<select class="form-control" id="itemCategory">
			<option value="<?php echo $itemCategory;?>"><?php echo $itemCategory; ?></option>
			<?php
				$this->load->model('Categories_model');
				$all_categories = $this->Categories_model->getAll();
				foreach ($all_categories as $row) {
					if(strcmp($row->category_name, $itemCategory)){
							echo "<option value=\"$row->category_name\">".$row->category_name."</option>";
					}
				}
			?>
		</select>
		<br />
		<label for="itemDesc">Description:</label>
		<input type="text" class="form-control" id="itemDesc" value="<?php echo $itemDesc; ?>" />
	</div>
</form>
<br />
       	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       	<button type="button" class="btn btn-default" onclick="checkAccess(['<?php echo $itemId; ?>', document.getElementById('itemName').value, document.getElementById('itemCategory').value, document.getElementById('itemDesc').value], updateItem);" >Save</button>