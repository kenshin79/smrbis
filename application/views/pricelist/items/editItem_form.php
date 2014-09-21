<form role="form">
	<div class="form-group">
		<label for="itemName">Item:</label>
		<input type="text" class="form-control" id="itemName" value="<?php echo $itemName;?>" />
		<br />
		<label for="itemCategory">Category:</label>
		<select class="form-control" id="itemCategory">
			<?php
				$this->load->model('Categories_model');
				$all_categories = $this->Categories_model->getAll();
				foreach ($all_categories as $row) {
					if(!strcmp($row->category_id, $itemCategory)){
							echo "<option value=\"$row->category_id\" selected>".$row->category_name."</option>";
					}
					else{
						echo "<option value=\"$row->category_id\" >".$row->category_name."</option>";
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
       	<button type="button" class="btn btn-success" onclick="checkAccess(['<?php echo $itemId; ?>', document.getElementById('itemName').value, document.getElementById('itemCategory').value, document.getElementById('itemDesc').value], updateItem);" >Save</button>