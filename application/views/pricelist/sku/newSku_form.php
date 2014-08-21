<form role="form">
	<div class="form-group">
				<label for="skuName">SKU:</label>
				<input class="form-control" type="text" id="skuName" placeholder="Stock Keeping Unit"/>	
				<br />
				<label for="skuCount">Quantity:</label>
				<input class="form-control" type="text" id="skuCount" placeholder="Quantity per SKU"/>	
				<br />
				<label for="skuDesc">Description:</label>
				<input class="form-control" type="text" id="skuDesc" placeholder="SKU Description (optional)"/>	
	</div>
</form>
<br />
       	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       	<button type="button" class="btn btn-default" onclick="checkAccess([document.getElementById('skuName').value, document.getElementById('skuCount').value, document.getElementById('skuDesc').value], addSku)" >Save</button>

