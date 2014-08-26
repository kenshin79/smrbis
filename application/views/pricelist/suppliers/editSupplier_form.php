<form role="form">
	<div class="form-group">
				<label for="supplierName">Supplier:</label>
				<input class="form-control" type="text" id="supplierName" value="<?php echo $supplierName; ?>"/>	
				<br />
				<label for="supplierAddress">Address:</label>
				<input class="form-control" type="text" id="supplierAddress" value="<?php echo $supplierAddress; ?>" />	
				<br />
				<label for="supplierTelephone">Telephone:</label>
				<input class="form-control" type="text" id="supplierTelephone" value="<?php echo $supplierTelephone; ?>" />
				<br />
				<label for="supplierMobile">Mobile:</label>
				<input class="form-control" type="text" id="supplierMobile" value="<?php echo $supplierMobile; ?>" />
				<br />
				<label for="supplierEmail">Email Address:</label>
				<input class="form-control" type="text" id="supplierEmail" value="<?php echo $supplierEmail; ?>" />
	</div>
</form>
<br />
       	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       	<button type="button" class="btn btn-default" onclick="checkAccess(['<?php echo $supplierId; ?>', document.getElementById('supplierName').value, document.getElementById('supplierAddress').value, document.getElementById('supplierTelephone').value, document.getElementById('supplierMobile').value, document.getElementById('supplierEmail').value], updateSupplier);" >Save</button>