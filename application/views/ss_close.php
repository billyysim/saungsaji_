<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Saung Saji</title>
<link type="text/css" rel="stylesheet" href="<?=$base?>/css/popup.css"/>
<style>
	#popup-box-content{border-radius:5px;-moz-border-radius:5px;background:#FFFFFF;}	
	.popup-text{padding:0px 30px 10px 20px}
	.padd10px{padding:35px 25px 35px 25px;font-size:15px;}
	.center{text-align:center}
</style>
</head>
<body>
<div id="popup-box-content">	
	<div class="padd10px">
		<div class="center">
			<img src="<?=$base?>/img/logo-small.gif">
		</div>
		<div style="margin-top:20px;" class="center">
			Pemesanan anda akan diproses pada jam operasional Saungsaji. Terima kasih
		</div>
		<div style="font-size:20px;margin-top:20px;" class="center">
			Jam Operasional SaungSaji : Pk. <?=$this->session->userdata('open')?> - Pk. <?=$this->session->userdata('close')?> Wib
		</div>
	</div>
</div>
</body>
</html>