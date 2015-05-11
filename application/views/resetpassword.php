<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Saung Saji - Reset Password</title>
<link type="text/css" rel="stylesheet" href="<?=$base?>/css/popup.css"/>
<link type="text/css" rel="stylesheet" href="<?=$base?>/css/style.css"/>
<style>
	#popup-box-content{padding:1px;}
	#popup-box-title{border-radius:5px;-moz-border-radius:5px;padding:20px 0px 20px 20px;background:#FBC573;font-size:19px}
	.popup-text{padding:38px 20px 10px 36px}	
	.label-daftar{width:80px;display:table-cell;vertical-align:middle;height:33px}
	.input-daftar{width:300px;display:table-cell;vertical-align:middle;height:33px}
	.input-daftar-text{width:200px;border-radius:3px;-moz-border-radius:3px;height:24px;border:1px solid #999999;padding:3px;}	
</style>
</head>
<body>
<div id="popup-box-content">	
	<div id="popup-box-title">Reset Password</div>	
	<div class="popup-text">
	<form name="reset_pass" method="post">
		<div class="red"><?=$msg?></div>
		<div class="padd7"></div>		
		<div>
			<?php
				$erroremail = "";
				if (form_error('email')){
					$erroremail = form_error('email');
				}
			?>			
			<div class="label-daftar">Email</div>			
			<div class="input-daftar">
				<input type="text" class="input-daftar-text" name="email" placeholder="<?=$erroremail?>">
			</div>
		</div>	
		<div class="padd20"></div>		
		<div>			
			<div class="label-daftar"></div>			
			<div class="input-daftar">
				<input type="submit" class="btn-style" name="reset" value="Reset Password">
			</div>
		</div>	
	</form>
	</div>
</div>
</body>
</html>				