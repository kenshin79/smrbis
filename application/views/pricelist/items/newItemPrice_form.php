<form role="form">
	<div class="row">
		<div class="col-md-2">
			<label for="skuId">SKU</label>
		</div>	
		<div class="col-md-3">
			<select class="form-control" id="skuId">
			<?php
			foreach($all_sku as $row){
			echo "<option value=\"".$row->sku_id."\">".$row->sku_name."</option>";
			}	
			?>
			</select>					
		</div>		
	</div>
	<div class="row">
		<div class="col-md-6">SKU not in list? <span class="btn btn-default" onclick="checkAccess(['Add New SKU', 'sku', 'newSku_form'], newEntry_form);">Add SKU</span></div>
	</div>
	<br />
	<div class="row">
		<div class="col-md-4">
			<label for="rprice">Retail Price: P</label>  
		</div>
		<div class="col-md-3">	
			<input class="form-control" id="rprice" placeholder="0.00" />
		</div>
	</div>
	<br />
	<div class="row">
		<div class="col-md-4">
			<label for="wprice">Wholesale Price: P</label>  
		</div>
		<div class="col-md-3">	
			<input class="form-control" id="wprice" placeholder="0.00" />
		</div>		
	</div>
	<br />

	<label for="priceDate">Date:</label>
	<input class="form-control" type="date" value="<?php echo date('Y-m-d');?>" id="priceDate" />
	<br />
	<label for="notes">Notes:</label>
	<textarea class="form-control" id="notes" placeholder="Your notes here."></textarea>
</form>	
       	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       	<button type="button" class="btn btn-default" onclick="checkAccess(['<?php echo $itemId; ?>', '<?php echo $itemName; ?>', document.getElementById('skuId').value, document.getElementById('rprice').value, document.getElementById('wprice').value, document.getElementById('priceDate').value, document.getElementById('notes').value], addItemPrice)" >Save</button>