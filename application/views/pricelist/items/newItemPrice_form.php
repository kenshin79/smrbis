<form role="form">
    <div class="row">
        <div class="col-xs-2">
            <label for="skuId">SKU</label>
        </div>
        <div class="col-xs-6">
         <select class="form-control" id="skuId">
            <?php
            foreach ($all_sku as $row) {
                echo "<option value=\"" . $row->sku_id . "\">" . $row->sku_name . " - " . $row->sku_count . "</option>";
            }
            ?>
        </select>	           
        </div>
    </div>
    <br />
    <div class="row">
        SKU not in list? <span class="btn btn-default" onclick="checkAccess(['Add New SKU', 'sku', 'newSku_form'], newEntry_form);">Add SKU</span>			
    </div>
    <br />
    <div class="row">
        <div class="col-xs-2">
            <label for="wprice">Wholesale</label>
        </div>
        <div class="col-xs-4">
            <input class="form-control" id="wprice" placeholder="0.00" />
        </div>    
    </div>	
    <br />    
    <div class="row">
        <div class="col-xs-2">
            <label for="rprice">Retail</label>
        </div>
        <div class="col-xs-4">  
            <input class="form-control" id="rprice" placeholder="0.00" />
        </div>
    </div>
    <br />
    <div class="row">
        <div class="col-xs-2">
            <label for="priceDate">Date:</label>
        </div>
        <div class="col-xs-4">
            <input class="form-control" type="date" value="<?php echo date('Y-m-d'); ?>" id="priceDate" />
        </div>    
    </div>
    <br />
    <h3><label for="notes">Notes:</label></h3>
    <textarea class="form-control" id="notes" placeholder="Your notes here."></textarea>
</form>	
<br />
<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
<button type="button" class="btn btn-success" onclick="checkAccess(['<?php echo $itemId; ?>', '<?php echo $itemName; ?>', document.getElementById('skuId').value, document.getElementById('rprice').value, document.getElementById('wprice').value, document.getElementById('priceDate').value, document.getElementById('notes').value], addItemPrice)" >Save</button>