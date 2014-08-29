<form role="form">
	<div class="form-group">
				<label for="customerName">Customer:</label>
				<input class="form-control" type="text" id="customerName" value="<?php echo $customerName; ?>"/>	
				<br />
				<label for="customerAddress">Address:</label>
				<input class="form-control" type="text" id="customerAddress" value="<?php echo $customerAddress; ?>" />	
				<br />
				<label for="customerTelephone">Telephone:</label>
				<input class="form-control" type="text" id="customerTelephone" value="<?php echo $customerTelephone; ?>" />
				<br />
				<label for="customerMobile">Mobile:</label>
				<input class="form-control" type="text" id="customerMobile" value="<?php echo $customerMobile; ?>" />
				<br />
				<label for="customerEmail">Email Address:</label>
				<input class="form-control" type="text" id="customerEmail" value="<?php echo $customerEmail; ?>" />
	</div>
</form>
<br />
       	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       	<button type="button" class="btn btn-default" onclick="checkAccess(['<?php echo $customerId; ?>', document.getElementById('customerName').value, document.getElementById('customerAddress').value, document.getElementById('customerTelephone').value, document.getElementById('customerMobile').value, document.getElementById('customerEmail').value], updateCustomer);" >Save</button>