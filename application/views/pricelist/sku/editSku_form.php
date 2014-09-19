<form role="form">
	<div class="form-group">
		<label for="skuName">SKU:</label>
		<input class="form-control" type="text" id="skuName" value="<?php echo $skuName; ?>" />
		<br />
		<label for="skuCount">Quantity:</label>
		<input class="form-control" type="text" id="skuCount" value="<?php echo $skuCount; ?>" />
		<br />
		<label for="skuDesc">Description:</label>
		<input class="form-control" type="text" id="skuDesc" value="<?php echo $skuDesc; ?>" />
	</div>
</form>
<br />
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>	
	<button type="button" class="btn btn-success" onclick="checkAccess(['<?php echo $skuId;?>' , document.getElementById('skuName').value, document.getElementById('skuCount').value,  document.getElementById('skuDesc').value], updateSku);" >Save</button>