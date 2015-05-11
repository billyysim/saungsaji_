<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<script language="Javascript" type="text/javascript" src="<?=$base?>/js/jquery-1.10.1.min.js"></script>
	<script language="Javascript" type="text/javascript" src="<?=$base?>/js/jquery.lwtCountdown-1.0.js"></script>
	<script language="Javascript" type="text/javascript" src="<?=$base?>/js/misc.js"></script>
	<link rel="Stylesheet" type="text/css" href="<?=$base?>/css/main.css"></link>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
	<title><?=$title?></title>
	<!-- Countdown dashboard end -->
	<script language="javascript" type="text/javascript">
		jQuery(document).ready(function() {
			$('#countdown_dashboard').countDown({
				targetDate: {
					'day': 		01,
					'month': 	03,
					'year': 	2015,
					'hour': 	0,
					'min': 		0,
					'sec': 		0
				}
			});
		});
	</script>
	<link rel="shortcut icon" href="<?=$base?>/img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="<?=$base?>/img/favicon.ico" type="image/x-icon">
</head>
<body>
	<div id="container">
		<h1><span style="color:#f1c100;">SAUNGSAJI</span></h1>
		<h2 class="subtitle">Online Food Order and Delivery</h2>
		<!-- Countdown dashboard start -->
		<div id="countdown_dashboard">
			<div class="dash weeks_dash">
				<span class="dash_title">minggu</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

			<div class="dash days_dash">
				<span class="dash_title">hari</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

			<div class="dash hours_dash">
				<span class="dash_title">jam</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

			<div class="dash minutes_dash">
				<span class="dash_title">menit</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>

			<div class="dash seconds_dash">
				<span class="dash_title">detik</span>
				<div class="digit">0</div>
				<div class="digit">0</div>
			</div>
		</div>
		<?php
		$erroremail = "";
		if (form_error('email')){
			$erroremail=form_error('email');
		}
		?>
		<div style="margin-top:30px;">
			<div style="margin:10px;">
				<span class="word"><?=$msg?></span>
			</div>		
			<form method="post">
				<span class="word">Email</span>
				<input type="text" name="email" placeholder="<?=$erroremail;?>" class="input">
				<input type="submit" name="submit" value="get my 50 points" class="btn-style-order">
			</form>
		</div>
		<div style="margin-top:50px;" class="word">
		<p><a href="https://twitter.com/saungsaji" target="_blank">Follow us on Twitter</a> or give us a big <a href="https://www.facebook.com/saungsaji" target="_blank">Like on Facebook</a>.</p>
		</div>
		<div class="footer">
		© Copyright 2015 SaungSaji. All rights reserved.
		</div>
	</div>
</body>
</html>
