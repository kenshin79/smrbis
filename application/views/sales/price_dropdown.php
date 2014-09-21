<?php
foreach ($pricedrop as $row) {
	echo "<option value=\"".$row->price_id."\">[".$row->category_name."] - ".$row->item_name." - (".$row->sku_name." - ".$row->sku_count.")</option>";
}

?>