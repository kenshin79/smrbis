<form role="form">
	<h4><label class="label label-default">Search</label></h4>
	<input type="text" class="form-control" id="price_drop" onkeyup="priceDropDown(document.getElementById('price_drop').value);" placeholder="search for item (at least 3 characters)" />
	<h4><label class="label label-default">Item (SKU)</label></h4>
	<select id="priceId" onchange="$('#unitPrice').html('');" onfocusout="wrDropDown(document.getElementById('priceId').value);"></select>
	<br />
	<h4><label class="label label-default">Item price</label></h4>
	<select id="unitPrice" onfocusin="wrDropDown(document.getElementById('priceId').value);"></select>
	<br />
	<h4><label class="label label-default">Quantity</label></h4>
	<div class="row">
		<div class="col-md-5">
		<input id="quantity" type="text" class="form-control" value="1" />			
		</div>
		<div class="col-md-4">
		<span onclick="document.getElementById('quantity').value++" class="btn btn-default">+</span>
		<span onclick="document.getElementById('quantity').value--" class="btn btn-default">-</span>				
		</div>
	</div>
</form>
	<br />
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>				
	<span class="btn btn-default" onclick="checkAccess(['<?php echo $salesorderId; ?>', document.getElementById('priceId').value, document.getElementById('unitPrice').value, document.getElementById('quantity').value ], addOrderItem )">Save</span>						