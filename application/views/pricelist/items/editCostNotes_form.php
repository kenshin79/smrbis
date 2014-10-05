<h2>Item Cost for '<?php echo $itemName; ?>'</h2>
<label class="label label-default" for="cost">Cost per <?php echo $skuName."(".$skuCount.")";?></label>
<input type="text" class="form-control" id="cost" value="<?php echo number_format($cost, 2, ".", ""); ?>" /><br />
<br />
<label class="label label-default" for="notes">Notes</label>
<textarea class="form-control" id="notes"><?php echo $notes; ?></textarea>
       	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       	<button type="button" class="btn btn-success" onclick="checkAccess(['<?php echo $costId; ?>', document.getElementById('notes').value, document.getElementById('cost').value, '<?php echo $itemId;?>', '<?php echo $itemName; ?>'] , updateCostNotes);" >Save</button>