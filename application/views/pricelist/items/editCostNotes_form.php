<h2>Cost Notes</h2>
<textarea class="form-control" id="notes"><?php echo $notes; ?></textarea>
       	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
       	<button type="button" class="btn btn-success" onclick="checkAccess(['<?php echo $costId; ?>', document.getElementById('notes').value, '<?php echo $itemId;?>', '<?php echo $itemName; ?>'] , updateCostNotes);" >Save</button>