<form role="form">
	<div class="form-group">
		<label for="categoryName">Category Name:</label>
		<input class="form-control" type="text" id="categoryName" value="<?php echo $categoryName; ?>" />
		<br />
		<label for="categoryDesc">Description:</label>
		<input class="form-control" type="text" id="categoryDesc" value="<?php echo $categoryDesc; ?>" />
	</div>
</form>
<br />
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>	
	<button type="button" class="btn btn-default" onclick="checkAccess(['<?php echo $categoryId;?>' , document.getElementById('categoryName').value, document.getElementById('categoryDesc').value], updateCategory);" >Save</button>