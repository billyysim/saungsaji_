<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Saung Saji</title>
	<link type="text/css" rel="stylesheet" href="<?=$base?>/css/popup.css"/>
	<link type="text/css" rel="stylesheet" href="<?=$base?>/css/style.css"/>
	<script type="text/javascript" src="<?=$base?>/js/jquery-1.10.1.min.js"></script>
	<script type="text/javascript" src="<?=$base?>/js/jquery.form.min.js"></script>
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
									<img src="<?=$base?>/img/menu_thumb/default.png" class="rounded">
								</div>
							</div>
						</div>				
					</div>
					<!-------->						
					<div class="box-row1-">
						<div id="upload-wrapper">
							<div >
								<form method="post" enctype="multipart/form-data" id="MyUploadForm" action="<?=$base?>/processupload.php">
									<input name="image_file" id="imageInput" type="file" />
									<div class="padd7"></div>							
									<input type="submit"  value="Upload" class="btn-style" name="submit_logo" id="submit-btn"/>
									<img src="<?=$base?>/img/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
								</form>
							</div>
						</div>						
					</div>
					<!-------->
				</div>
				<div id="box-middle-">
					<form method="post" name="order" onSubmit="closeMeUp();">			
					<div id="trpesan">
						<div>
							<span id="tr_order_qty-">Nama Menu</span>
							<span id="tr_order_qty_input-1">
								<input type="text" id="menu_" name="menu_" class="input-pesan-qty-1" >
							</span>
						</div>
						<div class="space"></div>
						<div>
							<span id="tr_order_qty-">Harga</span>
							<span id="tr_order_qty_input-1">								
								<input type="text" id="price_" name="price_" class="input-pesan-qty-" onkeypress="return isNumericKey(event);">
							</span>
						</div>
						<div class="space"></div>
						<div>
							<span id="tr_order_qty-">Desc</span>
							<span id="tr_order_qty_input-1">
								<textarea name="desc" id="desc" class="input-pesan-desc-"  ></textarea>
							</span>
						</div>
						<div class="space"></div>
						<div>
							<span id="tr_order_qty-"></span>
							<span id="tr_order_qty_input-1">
								<input type="submit" name="submit_" value="Update" class="btn-style">
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
	   parent.jQuery.fancybox.close();
	   window.parent.location.href = "<?=$base?>/index.php/home/cart/<?=str_replace(' ','',$menu_detail['cNamaResto']);?>/<?=str_replace(' ','',$menu_detail['cNama']);?>/submit/" + qty_ + "/" + desc_;
	}
	
	$('#price_').on("blur", function() {
	  if ($(this).val() == "" || $(this).val() == "0" ) {
		$(this).val('0');
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