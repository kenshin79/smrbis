<?php
	include 'application/views/includes/check_login.php';
?>
<!DOCTYPE html>
<html lang="en">
	<head>
   		<meta charset="utf-8">
    	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    	<meta name="viewport" content="width=device-width, initial-scale=1">
	    <link href="<?php echo $this->config->item('bootstrap_css');?>" rel="stylesheet">   
		<script src="<?php echo $this->config->item('jquery');?>"></script>	    
		<script src="<?php echo $this->config->item('bootstrap_js');?>"></script>
                <script>
                    $(document).ready(function(){
                            $("td").css("text-transform", "uppercase");                   
                        }
                    );                
                </script>
                <style>
                    @media print{
                        td {
                            padding:0px;
                            text-transform: uppercase;
                            font-size:xx-small;
                        }
                    }
                </style>
		<title>Print Sales Order</title>        			
	</head>
	<body>
		<div class="row text-center">
			<img src="<?php echo $this->config->item('store_logo', 'logo'); ?>" width="100px" height="80px" /><img src="<?php echo $this->config->item('store_name', 'logo'); ?>" width="600px" height="80px" />
		</div>
		<br />
		<div class="row text-center">
			<div class="col-md-1"></div>
			<div class="col-md-10">
		<table class="table table-bordered table-condensed">
			<thead>			
			</thead>
			<tbody>
		<?php
			foreach($order_details as $row){
				echo "<tr><th>Date: ".date('M d, Y', strtotime($row->timestamp))."</th><th class=\"text-right\">Finalized by: ".$row->finalizer."</th></tr>";
				echo "<tr><th colspan=\"2\">Customer: ".$row->customer_name." (".$this->config->item($row->sale_type, 'saletype').")</th></tr>";
				echo "<tr><th colspan=\"2\">Address: ".$row->customer_address."</th></tr>";

			}
		?>					
			</tbody>
		</table>
		<h3 class="text-center">Sales Order</h3>	
		<table class="table table-bordered table-condensed">
			<thead>
				<th class="text-center col-md-2">Qty</th>
				<th class="text-center">Item Name</th>
				<th class="col-md-2 text-center">Unit Price</th>
				<th class="col-md-2 text-center">Total</th>
			</thead>
			<tbody>
		<?php
			$x=1;	
			$total = 0;
			foreach($order_items as $row){
				echo "<tr><td class=\"text-center\">".$row->quantity."</td>";
				echo "<td class=\"text-center\">".$row->item_name." (".$row->sku_name." - ".$row->sku_count.")</td>";
				echo "<td class=\"text-right\">P ".$row->unit_price."</td>";
				echo "<td class=\"text-right\">P ".number_format($row->unit_price*$row->quantity, 2)."</td></tr>";
				$total = $total + $row->quantity*$row->unit_price;
				$x++;
			}
		?>		
			<tr><td class="text-center"><h4>Items: <?php echo $x-1;?></h4></td><td></td><td class="text-right"><h4>Grand Total:</h4></td><td class="text-right"><h4>P <?php echo number_format($total, 2); ?></h4></td></tr>
			</tbody>
		</table>					
			</div>
			<div class="col-md-1"></div>
		</div>	
	</body>
</html>

