<div class="myorder-box-detail" id="detail1">
	<?php
	foreach ($order->result_array() as $row_order){  	  			
	?>
	<div class="checkbox-row">
		<div class="myorder-detail-desc"><?=$row_order['cNama'];?></div>
		<div class="myorder-detail-price"><?=$row_order['iHarga'];?></div>
	</div>
	<?php
	}
	?>
	
	<div class="checkbox-row">
		<div class="myorder-detail-desc">Tax</div>
		<div class="myorder-detail-price">2.000</div>
	</div>
	<div class="checkbox-row">
		<div class="myorder-detail-desc">Delivery Cost</div>
		<div class="myorder-detail-price">5.000</div>
	</div>
</div>