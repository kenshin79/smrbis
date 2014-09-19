<form role="form">
	<div class="form-group">
				<label for="customerName">Customer:</label>
				<input class="form-control" type="text" id="customerName" placeholder="Customer Name"/>	
				<br />
				<label for="customerAddress">Address:</label>
				<input class="form-control" type="text" id="customerAddress" placeholder="Address"/>	
				<br />
				<label for="customerTelephone">Telephone:</label>
				<input class="form-control" type="text" id="customerTelephone" placeholder="Telephone number" />
				<br />
				<label for="customerMobile">Mobile:</label>
				<input class="form-control" type="text" id="customerMobile" placeholder="Mobile number" />
				<br />
				<label for="customerEmail">Email Address:</label>
				<input class="form-control" type="text" id="customerEmail" placeholder="Email address" />
	</div>
</form>
<br />
       	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       	<button type="button" class="btn btn-success" onclick="checkAccess([document.getElementById('customerName').value, document.getElementById('customerAddress').value, document.getElementById('customerTelephone').value, document.getElementById('customerMobile').value, document.getElementById('customerEmail').value], addCustomer)" >Save</button>