<form role="form">
	<div class="form-group">
				<label for="supplierName">Supplier:</label>
				<input class="form-control" type="text" id="supplierName" placeholder="Supplier Name"/>	
				<br />
				<label for="supplierAddress">Address:</label>
				<input class="form-control" type="text" id="supplierAddress" placeholder="Address"/>	
				<br />
				<label for="supplierTelephone">Telephone:</label>
				<input class="form-control" type="text" id="supplierTelephone" placeholder="Telephone number" />
				<br />
				<label for="supplierMobile">Mobile:</label>
				<input class="form-control" type="text" id="supplierMobile" placeholder="Mobile number" />
				<br />
				<label for="supplierEmail">Email Address:</label>
				<input class="form-control" type="text" id="supplierEmail" placeholder="Email address" />
	</div>
</form>
<br />
       	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       	<button type="button" class="btn btn-default" onclick="checkAccess([document.getElementById('supplierName').value, document.getElementById('supplierAddress').value, document.getElementById('supplierTelephone').value, document.getElementById('supplierMobile').value, document.getElementById('supplierEmail').value], addSupplier)" >Save</button>