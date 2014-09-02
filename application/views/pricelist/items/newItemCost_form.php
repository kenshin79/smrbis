<form role="form">
	<div class="row">
		<div class="col-md-2"><label for="cost">Cost/Unit:</label></div>
		<div class="col-md-4"><input class="form-control" id="cost" placeholder="0.00" /></div>
		<div class="col-md-1">/</div>
		<div class="col-md-5">
	<select class="form-control" id="skuId">
		<?php
		foreach($all_sku as $row){
			echo "<option value=\"".$row->sku_id."\">".$row->sku_name."</option>";
		}	
		?>
	</select>			
		</div>
	</div>
	<br />
	<label for="supplierId">Supplier:</label>
	<select class="form-control" id="supplierId">
		<?php
		foreach($all_suppliers as $row){
			echo "<option value=\"".$row->supplier_id."\">".$row->supplier_name."</option>";
		}
		?>
	</select>
	<br />		
	<label for="costDate">Date:</label>
	<input class="form-control" type="date" value="<?php echo date('Y-m-d');?>" id="costDate" />
	<br />
	<label for="notes">Notes:</label>
	<textarea class="form-control" id="notes" placeholder="Your notes here."></textarea>
</form>
<br />
       	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       	<button type="button" class="btn btn-default" onclick="checkAccess(['<?php echo $itemId; ?>', '<?php echo $itemName; ?>', document.getElementById('skuId').value, document.getElementById('supplierId').value, document.getElementById('cost').value, document.getElementById('costDate').value, document.getElementById('notes').value], addItemCost)" >Save</button>