<!DOCTYPE html>
<html lang="en"><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<title>SaungSaji.com - Coming Soon</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- Mobile Specific Meta -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Stylesheets -->
	<link rel="stylesheet" href="<?=$base?>/css/reset.css">
	<link rel="stylesheet" href="<?=$base?>/css/styles.css">

	<!--[if lt IE 9]>
		<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<!-- JS -->
	<script src="<?=$base?>/js/jquery-latest.js"></script>
	<script src="<?=$base?>/js/countdown.js"></script>
	
	<script type="text/javascript">	
		$(document).ready(function(){
			$("#countdown").countdown({
				date: new Date(2014, 12-1, 31, 24, 00, 00),				
				format: "dHMS"				
			},						
			
			function() {
				// callback function
			});
		});	
	</script>
</head>
<body>
<!-- LOGO -->
	<header class="container">
		<a id="logo">
		<h1>SaungSaji.com</h1>
		<!--<img src="images/logo.png" alt="Coming Soon Page">-->
		</a>
	</header>
	
	<!-- TIMER -->
	<div class="timer-area">
		<h1>We're coming soon...</h1>
		
		<ul id="countdown">
			<li>
				<span class="days">00</span>
				<p class="timeRefDays">days</p>
			</li>
			<li>
				<span class="hours">00</span>
				<p class="timeRefHours">hours</p>
			</li>
			<li>
				<span class="minutes">00</span>
				<p class="timeRefMinutes">minutes</p>
			</li>
			<li>
				<span class="seconds">00</span>
				<p class="timeRefSeconds">seconds</p>
			</li>
		</ul>
		
	</div> <!-- end timer-area -->
	
	
	
	<!-- SIGNUP -->
	<div class="container">
	
		<h2>Sign up and we’ll notify you of our launch.<br>
We’ll also throw in a freebie for your effort :)</h2>
		<h2><?=$msg?></h2>
		<?=form_error('signup-email')?>
		<div class="form-wrapper">
		
			<form method="post" name="get_point">			
				<input name="signup-email" id="signup-email" placeholder="enter your email address" required="" type="email">
				<input value="Get 50 points" type="submit" name="btn_sign" id="btncheckout">
			</form>
			
		</div> <!-- end form-wrapper -->

		<footer id="disclaimer">
		
			<p><span>*</span> We won’t use your email for spam, just to notify you of our launch.</p>
		
		</footer>
	
	</div> <!-- end container -->
	
	
	
	<!-- FOOTER -->
	<footer id="main-footer">
	
		<p><a href="#">Follow us on Twitter</a> or give us a big <a href="#">Like on Facebook</a>.</p>
		<p>© Copyright 2014 SaungSaji. All rights reserved.</p>
	
	</footer>


</body></html>