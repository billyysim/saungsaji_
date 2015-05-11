<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Saung Saji</title>
	<link type="text/css" rel="stylesheet" href="<?=$base?>/css/popup.css"/>
	<link type="text/css" rel="stylesheet" href="<?=$base?>/css/style.css"/>
	<script type="text/javascript" src="<?=$base?>/js/jquery-1.10.1.min.js"></script>
	<style>
	@media screen and (-webkit-min-device-pixel-ratio:0){
		.deskripsi-food-large_{position:absolute;margin:243px  0px 0px -350px; padding:0;height:95px;width:450px;
			border-bottom-left-radius:10px;border-bottom-right-radius:10px;-moz-border-radius-bottomleft:10px;-moz-border-radius-bottomright:10px;
			background:#FBC573;}
	}
	</style>
</head>
<body>
	<div id="popup-img">
		<img src="<?=$base?>/img/point/<?=$reward_detail['cLargeImage']?>" style="z-index:2">
		<span class="deskripsi-food-large_">
			<div class="deskripsi-food-text-large">
			<form method="post" name="order" onSubmit="closeMeUp();">
				<span class="title-large"><?=$reward_detail['cNama']?></span>
				<div class="space"></div>				
				<div class="space"></div>
				<div id="box-middle">
					<div id="trpesan">
						<div>
							<div class="space"></div>
							<div class="space"></div>
							<div style="font-size:18px;font-weight:bold;">- <?=$reward_detail['iPoin']?> poin -</div>
							<!--
							<span id="tr_order_qty" style="vertical-align:middle">Jumlah</span>
							<span id="tr_order_qty_input">
								<input type="text" value="1" id="pesanQty" name="qty" class="input-pesan-qty" onkeypress="return isNumericKey(event);">
							</span>
							-->
						</div>
						<div class="space"></div>
						<!--
						<div>
							<span id="tr_order_qty">Desc</span>
							<span id="tr_order_qty_input">
								<textarea name="desc" id="desc" class="input-pesan-desc" placeholder=" Special Request?" ></textarea>
							</span>						
						</div>						
						-->
					</div>													
				</div>
				<div id="box-right-point">
					<input type="submit" class="btn-style" name="submit_" id="submit_" value="Tukar"><!--javascript:parent.jQuery.fancybox.close();-->
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
	   //var qty_ = $(".input-pesan-qty").val();
	   parent.jQuery.fancybox.close();
	   window.parent.location.href = "<?=$base?>/index.php/home/redeem_point/<?=str_replace(' ','',$reward_detail['cNama']);?>/submit"; //+ qty_ ;
	}	
	
	$('#pesanQty').on("blur", function(){
	  if ($(this).val() == "" || $(this).val() == "0" ){
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