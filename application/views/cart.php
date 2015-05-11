<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Saung Saji</title>
	<link type="text/css" rel="stylesheet" href="<?=$base?>/css/popup.css"/>
	<link type="text/css" rel="stylesheet" href="<?=$base?>/css/style.css"/>
	<script type="text/javascript" src="<?=$base?>/js/jquery-1.10.1.min.js"></script>
	<style>
	@media screen and (-webkit-min-device-pixel-ratio:0){	
		.deskripsi-food-large{position:absolute;margin:-140px  0px 0px 0px; padding:0;height:140px;width:605px;
			border-bottom-left-radius:10px;border-bottom-right-radius:10px;-moz-border-radius-bottomleft:10px;-moz-border-radius-bottomright:10px;
			background:#FBC573;}
	}
	</style>	
</head>
<body>
	<div id="popup-img">
		<img src="<?=$base?>/img/menu_big/<?=$menu_detail['cImageLarge']?>" style="z-index:2">
		<span class="deskripsi-food-large">
			<div class="deskripsi-food-text-large">
			<form method="post" name="order" onSubmit="closeMeUp();">
				<span class="title-large"><?=$menu_detail['cNamaResto']?></span>
				<div class="padd">&nbsp;</div>		
				<div id="box-left">
					<div class="box-row1"><?=$menu_detail['cNama']?></div>
					<div class="box-row2"><?=number_format($menu_detail['iHarga'],0,",",".")?></div>
					<div class="clear"></div>
					<div class="box-row1">Minimum Order</div>
					<div class="box-row2"><?=number_format($menu_detail['iMinOrder'],0,",",".")?></div>
					<div class="clear"></div>
					<div class="box-row1">Delivery Charge</div>
					<div class="box-row2"><?=number_format($menu_detail['iCharge'],0,",",".")?></div>
					<div class="clear"></div>						
				</div>
				<div id="box-middle">
					<div id="trpesan">
						<div>
							<span id="tr_order_qty">Jumlah</span>
							<span id="tr_order_qty_input">
								<input type="text" value="1" id="pesanQty_" name="qty" class="input-pesan-qty" onkeypress="return isNumericKey(event);">
							</span>
						</div>
						<div class="space"></div>
						<div>
							<span id="tr_order_qty">Desc</span>
							<span id="tr_order_qty_input">
								<textarea name="desc" id="desc" class="input-pesan-desc" placeholder=" Special Request?" ></textarea>
							</span>
						</div>
					</div>
				</div>
				<div id="box-right">
					<input type="submit" class="btn-style" name="submit_" id="submit_" value="Pesan">
					<!--javascript:parent.jQuery.fancybox.close();--> 
				</div>
				<!--<a href="<?=$base?>/index.php/home/build_order/<?=str_replace(' ','',$menu_detail['cNamaResto']);?>" target="_parent" class="pesan">Pesan</a>-->
			</form>
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
	   parent.jQuery.fancybox.close();
	   window.parent.location.href = "<?=$base?>/index.php/home/cart/<?=str_replace(' ','',$menu_detail['cNamaResto']);?>/<?=str_replace(' ','',$menu_detail['cNama']);?>/submit/" + qty_ + "/" + desc_;
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
</script>