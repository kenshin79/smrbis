<form role="form">
	<div class="form-group">
				<label for="brandName">Brand:</label>
				<input class="form-control" type="text" id="brandName" placeholder="Brand Name"/>	
				<br />
				<label for="brandDesc">Description:</label>
				<input class="form-control" type="text" id="brandDesc" placeholder="Brand Description (optional)"/>	
	</div>
</form>
<br />
       	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       	<button type="button" class="btn btn-default" onclick="checkAccess([document.getElementById('brandName').value, document.getElementById('brandDesc').value], addBrand)" >Save</button>

