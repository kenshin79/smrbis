<form role="form">
	<div class="row">
			<h3><label class="label label-default">Sales Type:</label></h3>
			<label class="radio-inline"><input name="saleType" type="radio" id="saleType1" checked value="0" /><?php echo $this->config->item('0', 'saletype'); ?></label>
			<label class="radio-inline"><input name="saleType" type="radio" id="saleType2" value="1" /><?php echo $this->config->item('1', 'saletype');?></label>
	</div>
	<br />
	<div class="row">
		<div>
			<h3><label class="label label-default" for="customerId">Customer</label> New customer?<span class="btn btn-default" onclick="checkAccess(['Add New Customer', 'customers','newCustomer_form'], newEntry_form);">New Customer</span></h3>		
			<select class="form-control" id="customerId">
		<?php
			foreach($customers as $row){
				echo "<option value=\"".$row->customer_id."\">".$row->customer_name."</option>";
			}
		?>
			</select>					
		</div>
	</div>	
</form>
<br />
	<button type="button" class="btn btn-default" data-dismiss="modal">Close</button>				
	<span class="btn btn-success" onclick="checkAccess([document.getElementById('customerId').value, $('form input:radio:checked').val()], addOrder )">Save</span>						