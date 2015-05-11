<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Saung Saji - Change Password</title>
	<link type="text/css" rel="stylesheet" href="<?=$base?>/css/popup.css"/>
	<link type="text/css" rel="stylesheet" href="<?=$base?>/css/style.css"/>
	<style>
		#popup-box-content{padding:1px;}
		#popup-box-title{border-radius:5px;-moz-border-radius:5px;padding:20px 0px 20px 20px;background:#FBC573;font-size:19px}
		.popup-text{padding:1px 30px 10px 20px}
		.message{padding:10px 0px 0px 0px}		
		.input-daftar-text{width:200px;border-radius:3px;-moz-border-radius:3px;height:24px;border:1px solid #999999;padding:3px;margin-bottom:3px;}						
	</style>
</head>
<body>
<div id="popup-box-content">	
	<div id="popup-box-title">Change Password</div>	
	<form name="change_pass" method="post">
		<div class="popup-text">	
				<div class="message red"><?=$msg?></div>
				<div>			
					<?php
						$erroroldpass = "";
						if (form_error('old_pass')){
							$erroroldpass = form_error('old_pass');
						}
					?>			
					<div class="label-changepwd">Password</div>			
					<div class="col-changepwd"><input type="password" class="input-daftar-text" name="old_pass" placeholder="<?=$erroroldpass?>"></div>
					<!--<div class="col-changepwd red"><?=form_error('old_pass')?></div>-->
				</div>
				<div>
					<?php
						$errornewpass = "";
						if (form_error('new_pass')){
							$errornewpass = form_error('new_pass');
						}
					?>						
					<div class="label-changepwd">Password Baru</div>			
					<div class="col-changepwd"><input type="password" class="input-daftar-text" name="new_pass" placeholder="<?=$errornewpass?>"></div>
					<!--<div class="col-changepwd red"><?=form_error('new_pass')?></div>-->
				</div>
				<div>
					<?php
						$errorrenewpass = "";
						if (form_error('re_new_pass')){
							$errorrenewpass = form_error('re_new_pass');
						}
					?>			
					<div class="label-changepwd">Ketik Ulang</div>			
					<div class="col-changepwd"><input type="password" class="input-daftar-text" name="re_new_pass" placeholder="<?=$errorrenewpass?>"></div>
					<!--<div class="col-changepwd red"><?=form_error('re_new_pass')?></div>-->
				</div>						
		</div>			
		<div class="col-submit-changepwd"><!--<a href="#" class="pesan">Change</a>--><input type="submit" name="submit_change_pass" value="change" class="btn-style"></div>
	</form>
</div>
</body>
</html>				