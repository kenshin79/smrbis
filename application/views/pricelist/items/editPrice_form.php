<form role="form">
	<div class="row">
		<div class="col-md-2">
	<label for="rprice">Retail: P</label>			
		</div>
		<div class="col-md-10">
	<input type="text" class="form-control" id="rprice" value="<?php echo $rprice; ?>" />			
		</div>
	</div>
	<br />
	<div class="row">
		<div class="col-md-3">
	<label for="wprice">Wholesale: P</label>			
		</div>
		<div class="col-md-9">
	<input type="text" class="form-control" id="wprice" value="<?php echo $wprice;?>" />			
		</div>
	</div>
	<br />
	<div class="row">
		<div class="col-md-2">
			<label for="priceDate">Date:</label>	
		</div>
		<div class="col-md-8">
			<input type="date" class="form-control" id="priceDate" value="<?php echo date("Y-m-d");?>" />
		</div>
	</div>
	<br />
	<div class="row">
		<div class="col-md-1">
	<label for="notes">Notes:</label>			
		</div>
		<div class="col-md-11">
	<textarea class="form-control" id="notes" rows="9" ><?php echo $notes; ?></textarea>			
		</div>
	</div>
</form>
	<br />
       	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       	<button type="button" class="btn btn-default" onclick="checkAccess(['<?php echo $itemId; ?>', '<?php echo $itemName; ?>', '<?php echo $priceId; ?>', document.getElementById('rprice').value, document.getElementById('wprice').value, document.getElementById('notes').value, document.getElementById('priceDate').value], updatePrice)" >Save</button>