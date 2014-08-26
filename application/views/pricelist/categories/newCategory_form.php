<form role="form">
	<div class="form-group">
				<label for="categoryName">Category:</label>
				<input class="form-control" type="text" id="categoryName" placeholder="Category Name"/>	
				<br />
				<label for="categoryDesc">Description:</label>
				<input class="form-control" type="text" id="categoryDesc" placeholder="Category Description (optional)"/>	
	</div>
</form>
<br />
       	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       	<button type="button" class="btn btn-default" onclick="checkAccess([document.getElementById('categoryName').value, document.getElementById('categoryDesc').value], addCategory)" >Save</button>

