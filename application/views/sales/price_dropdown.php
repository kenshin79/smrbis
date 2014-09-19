<?php
foreach ($pricedrop as $row) {
	echo "<option value=\"".$row->price_id."\">[".$row->item_category."] - ".$row->item_name." - (".$row->sku_name.")</option>";
}

?>