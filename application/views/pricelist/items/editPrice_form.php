<form role="form">
	<div class="row">
	<h3><label for="rprice">Retail</label></h3>			
		<input type="text" class="form-control" id="rprice" value="<?php echo $rprice; ?>" />			
	</div>
	<br />
	<div class="row">
	<h3><label for="wprice">Wholesale</label></h3>			
		<input type="text" class="form-control" id="wprice" value="<?php echo $wprice;?>" />			
	</div>
	<br />
	<div class="row">
	<h3><label for="priceDate">Date:</label></h3>	
		<input type="date" class="form-control" id="priceDate" value="<?php echo date("Y-m-d");?>" />
	</div>
	<br />
	<div class="row">
	<h3><label for="notes">Notes:</label></h3>			
		<textarea class="form-control" id="notes" rows="3" ><?php echo $notes; ?></textarea>			
	</div>
</form>
	<br />
       	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       	<button type="button" class="btn btn-success" onclick="checkAccess(['<?php echo $itemId; ?>', '<?php echo $itemName; ?>', '<?php echo $priceId; ?>', document.getElementById('rprice').value, document.getElementById('wprice').value, document.getElementById('notes').value, document.getElementById('priceDate').value], updatePrice)" >Save</button>