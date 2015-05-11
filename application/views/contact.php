<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title></title>
<link type="text/css" rel="stylesheet" href="<?=$base?>/css/popup.css"/>
<link type="text/css" rel="stylesheet" href="<?=$base?>/css/style.css"/>
<style>
	#popup-box-content{padding:1px;}
	#popup-box-title{border-radius:5px;-moz-border-radius:5px;padding:20px 0px 20px 20px;background:#FBC573;font-size:19px}
	.popup-text{padding:18px 30px 10px 20px}
	.message{padding:0px 0px 0px 0px}
	.label-daftar{width:90px;display:table-cell;vertical-align:middle;height:45px}
	.label-daftar1{width:320px;display:table-cell;vertical-align:middle;height:45px}
	.label-daftar2{width:500px;display:table-cell;vertical-align:middle;height:45px}
	.input-daftar{width:230px;display:table-cell;vertical-align:middle;height:45px}
	.input-daftar1{width:290px;display:table-cell;vertical-align:middle;height:45px}	
	.input-daftar-text{width:200px;border-radius:3px;-moz-border-radius:3px;height:24px;border:1px solid #999999;padding:4px;}
	.textarea-daftar{width:205px;height:100px;border-radius:3px;-moz-border-radius:3px;border:1px solid #999999;font-family:Arial;padding:4px;font-size:13px;}
	.input-daftar-textsmall{width:128px;border-radius:3px;-moz-border-radius:3px;height:24px;border:1px solid #999999;padding:4px;}
	.label{font-size:12px;}
</style>
</head>
<body>
<div id="popup-box-content">	
	<div id="popup-box-title">Hubungi kami</div>	
    <form method="post" name="registration">
	<div class="popup-text">
		<?php
		if ($msg){
		?>
		<div class="label red" style="margin-bottom:10px;"><?=$msg?></div>
		<?php
		}
		?>
		<div>
			<?php
				$errornama = "";
				if (form_error('name')){
					$errornama=form_error('name');
				}
			?>
			<div class="label-daftar label">Nama</div>
			<div class="input-daftar label"><input type="text" class="input-daftar-text" name="name" placeholder="<?=$errornama?>"></div>
			<!--<div class="input-daftar1 label red"><?=form_error('name')?></div>	-->
		</div>		
		<div>			
			<?php
				$erroremail = "";
				if (form_error('email')){
					$erroremail=form_error('email');
				}
			?>
			<div class="label-daftar label">Email</div>			
			<div class="input-daftar label"><input type="text" class="input-daftar-text" name="email" placeholder="<?=$erroremail?>"></div>
			<!--<div class="input-daftar1 label red"><?=form_error('email')?></div>-->
		</div>
		<div>
			<?php
				$errorhp = "";
				if (form_error('hp')){
					$errorhp=form_error('hp');
				}
			?>
			<div class="label-daftar label">HP / Telp</div>			
			<div class="input-daftar label"><input type="text" class="input-daftar-text" name="hp" placeholder="<?=$errorhp?>" onkeypress="return isNumericKey(event);"></div>		
			<!--<div class="input-daftar1 label red"><?=form_error('hp')?></div>-->
		</div>
		<div>
			<?php
				$errordesc = "";
				if (form_error('desc')){
					$errordesc=form_error('desc');
				}
			?>
			<div class="label-daftar label">Pertanyaan</div>			
			<div class="input-daftar label"><textarea class="textarea-daftar" placeholder="<?=$errordesc?>" name="desc"></textarea></div>
			<!--<div class="input-daftar1 label red"><?=form_error('alamat')?></div>-->
		</div>	
		<div>			
			<?php
				$errorcaptcha = "";
				if (form_error('captcha')){
					$errorcaptcha=form_error('captcha');
				}
			?>
			<div class="label-daftar label">Captcha</div>			
			<div class="input-daftar"><input type="text" class="input-daftar-textsmall" name="captcha" placeholder="<?=$errorcaptcha?>"></div>	
		</div>				
		<div>						
			<div class="label-daftar">&nbsp;</div>			
			<div class="input-daftar label"><?=$cap?></div>						
			<!--<div class="input-daftar1 label red"><?=form_error('captcha')?></div>-->
		</div>			
		<div>			
			<div class="label-daftar label"></div>			
			<div class="input-daftar label"><input type="submit" name="submit" value="Kirim" class="btn-style"></div>			
		</div>	
	</div>
	</form>
</div>
</body>
</html>
<script type="text/javascript">
	function isNumericKey(e)
	{
		if (window.event) { var charCode = window.event.keyCode; }
		else if (e) { var charCode = e.which; }
		else { return true; }
		if (charCode > 31 && (charCode < 48 || charCode > 57)) { return false; }
		return true;
	}
	
</script>  
