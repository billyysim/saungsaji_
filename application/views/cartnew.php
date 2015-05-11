<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Saung Saji</title>
	<link type="text/css" rel="stylesheet" href="<?=$base?>/css/popup.css"/>
	<link type="text/css" rel="stylesheet" href="<?=$base?>/css/style.css"/>
	<script type="text/javascript" src="<?=$base?>/js/jquery-1.10.1.min.js"></script>	
	<style>
	@media screen and (-webkit-min-device-pixel-ratio:0){	
		.deskripsi-food-large-{position:absolute;margin:10px  0px 0px 0px; padding:0;height:140px;width:900px;
			border-bottom-left-radius:10px;border-bottom-right-radius:10px;-moz-border-radius-bottomleft:10px;-moz-border-radius-bottomright:10px;}
	}
	</style>	
</head>
<body>
	<div id="popup-img">
		<span class="deskripsi-food-large-">
			<div class="padd7"></div>			
			<div class="deskripsi-food-text-large-">
				<div id="box-left">
					<div class="box-row1-">
						<div class="mymenu-label-img-2">					
							<div class="mymenu-img-1">
								<div id="output" >
									<img src="<?=$base?>/img/menu_thumb/<?=$menu_detail['cImageThumb']?>" class="rounded">
								</div>
							</div>
						</div>				
					</div>
					<!-------->						
					<div class="box-row1-2">
						<span class="title-large-"><?=$menu_detail['cNamaResto']?></span>
					</div>
					<div class="clear"></div>
					<div class="box-row1-1">Minimum Order</div>
					<div class="box-row2-2"><?=number_format($min_order->cValue,0,",",".")?></div>
					<div class="clear"></div>
					<div class="box-row1-1">Wilayah Antar</div>						
					<div class="box-row2-2">
					<?php
					foreach($pengantaran->result_array() as $row_antar){			
						echo $row_antar['cWilayah'].", ";
					}
					?>
					
					</div>
					<div class="clear"></div>
					<!-------->
				</div>
				<div id="box-middle-">
					<form method="post" name="order" onSubmit="closeMeUp();">			
					<div id="trpesan">
						<div>
							<!--<span id="tr_order_qty-">Nama Menu</span>-->
							<span id="tr_order_qty_input-2" class="bold">
								<?=$menu_detail['cNama']?> - 
								<?php								
								if(isset($menu_detail['iHargaDeal']) && $this->session->userdata('cNama')!=""){
									$status='deal';
									$harga_menu = $menu_detail['iHargaDeal'];
								?>
									<strike><?=number_format($menu_detail['iHarga'],0,",",".")?></strike>
									<span style='font-size:17px;margin-left:5px;font-weight:bold;color:red;'><?=number_format($menu_detail['iHargaDeal'],0,',','.');?></span>
								<?php
								}
								else{
									$status='n';
									$harga_menu = $menu_detail['iHarga'];
									echo number_format($menu_detail['iHarga'],0,",",".");									
								}
		
								$diskon=0;
								foreach ($menu_diskon->result_array() as $row_menu_diskon){
									if(date('Y-m-d',strtotime($row_menu_diskon['dStartBerlaku']))<=date('Y-m-d')){
										if(date('Y-m-d',strtotime($row_menu_diskon['dEndBerlaku']))>=date('Y-m-d')){
											$diskon = $row_menu_diskon['iDiskon'];
											echo "<span class='red padd10px'>off : ".$row_menu_diskon['iDiskon']." %</span>";
										}									
									}
								}
								?>
							</span>
						</div>
						<div class="space"></div>
						<div>
							<span id="tr_order_qty-1">Jumlah</span>
							<span id="tr_order_qty_input-1">								
								<input type="text" value="1" id="pesanQty_" name="qty" class="input-pesan-qty" onkeypress="return isNumericKey(event);">
							</span>
						</div>
						<div class="space"></div>
						<div>
							<span id="tr_order_qty-1">Pesanan Khusus</span>
							<span id="tr_order_qty_input-1">
								<textarea name="desc" id="desc" class="input-pesan-desc-1" placeholder=" Pesanan Khusus ?" onkeyup="valid(this)" onblur="valid(this)"></textarea>
							</span>
						</div>
						<div class="space"></div>
						<div>
							<span id="tr_order_qty-1"></span>
							<span id="tr_order_qty_input-1">
								<input type="submit" class="btn-style" name="submit_" id="submit_" value="Pesan">
							</span>
						</div>

					</div>
					</form>
				</div>
				<!--
				<div id="box-right">
					<input type="submit" class="btn-style" name="submit_" id="submit_" value="Pesan">
					<!--javascript:parent.jQuery.fancybox.close();
				</div>--> 
				<!--<a href="<?=$base?>/index.php/home/build_order/<?=str_replace(' ','',$menu_detail['cNamaResto']);?>" target="_parent" class="pesan">Pesan</a>-->					
			</div>			
		</span>	
	</div>

</body>
</html>				
<script type="text/javascript"> 
	function closeMeUp() 
	{
	   var qty_ = $(".input-pesan-qty").val();
	   var desc_ = $("#desc").val();
	   var price_ = <?=$harga_menu;?>;
	   parent.jQuery.fancybox.close();
	   window.parent.location.href = "<?=$base?>/index.php/home/cart/<?=str_replace(' ','',$menu_detail['cNamaResto']);?>/<?=str_replace(' ','',$menu_detail['cNama']);?>/<?=$status?>/submit/" + qty_ + "/" + <?=$harga_menu;?> + "/" + <?=$diskon;?> + "/" + desc_;
	}

	$('#pesanQty_').on("blur", function() {
	  if ($(this).val() == "" || $(this).val() == "0" ) {
		$(this).val('1');
	  }
	});

	function isNumericKey(e)
	{
		if (window.event) { var charCode = window.event.keyCode; }
		else if (e) { var charCode = e.which; }
		else { return true; }
		if (charCode > 31 && (charCode < 48 || charCode > 57)) { return false; }
		return true;
	}	
	
	function valid(f) {
		!(/^[A-z&#209;&#241;0-9]*$/i).test(f.value)?f.value = f.value.replace(/[^A-z&#209;&#241;0-9]/ig,' '):null;
	} 	
</script>