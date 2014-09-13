<form role="form">
	<div class="row">
		<div class="col-md-3"><label for="cost">Cost per Unit:</label> P </div>
		<div class="col-md-3"><input class="form-control" id="cost" placeholder="0.00" /></div>
		<div class="col-md-1">/</div>
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
	<br />
	SKU not in list? <span class="btn btn-default" onclick="checkAccess(['Add New SKU', 'sku', 'newSku_form'], newEntry_form);">Add SKU</span>
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
	Supplier not in list? <span class="btn btn-default" onclick="checkAccess(['Add New Supplier', 'suppliers', 'newSupplier_form'], newEntry_form)">Add Supplier</span>	
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