<?php
	foreach ($itemPrices as $row) {
		echo "<option value=\"".$row->wprice."\"> Wholesale: P".$row->wprice."</option>";
		echo "<option value=\"".$row->rprice."\">Retail: P".$row->rprice."</option>";
	}
?>