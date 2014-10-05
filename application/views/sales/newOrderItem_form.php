<form role="form">
    <div class="row">
        <div class="col-xs-2">
            <label class="label label-default">Search</label>
        </div>
        <div class="col-xs-6">
            <input type="text" class="form-control" id="price_drop" onkeyup="priceDropDown(document.getElementById('price_drop').value);" placeholder="search for item (at least 3 characters)" />
        </div>
    </div>    
    <br />
    <div class="row">
        <div class="col-xs-2">
            <label class="label label-default">Item (SKU)</label>
        </div>    
        <div class="col-xs-6">    
            <select id="priceId" onchange="wrDropDown(document.getElementById('priceId').value);"></select>
        </div>
    </div>     
    <br />
    <div class="row">    
        <div class="col-xs-2">
            <label class="label label-default">Item price</label>
        </div>
        <div class="col-xs-6">
            <select id="unitPrice" onfocusin="wrDropDown(document.getElementById('priceId').value);"></select>
        </div>    
    </div>    
    <br />
    <div class="row">
        <div class="col-xs-2">
            <label class="label label-default">Quantity</label>
        </div>
        <div class="col-xs-3">
            <input id="quantity" type="text" class="form-control" value="1" />			
        </div>       
        <div class="col-xs-4">
            <span onclick="document.getElementById('quantity').value++" class="btn btn-default">+</span>
            <span onclick="document.getElementById('quantity').value--" class="btn btn-default">-</span>				
        </div>
    </div>    
    <div class="row">


    </div>
</form>
<br />
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>				
<span class="btn btn-default" onclick="checkAccess(['<?php echo $salesorderId; ?>', document.getElementById('priceId').value, document.getElementById('unitPrice').value, document.getElementById('quantity').value, '1'], addOrderItem)">Save and Add New Item Order</span>
<span class="btn btn-default" onclick="checkAccess(['<?php echo $salesorderId; ?>', document.getElementById('priceId').value, document.getElementById('unitPrice').value, document.getElementById('quantity').value, '0'], addOrderItem)">Save and Close</span>													