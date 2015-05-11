<!------
<?php
if($this->session->userdata('userType')==''){
?>
	<div id="box-login">
		<div id="box-login-arrow"></div>
		<div id="box-login-form">
		<form method="post" name="login">
			<div class="bx-login">
				<div>
					<div class="label-login">Email</div>
					<div class="label-login-box"><input type="text" class="input-login" name="email"></div>
				</div>
				<div>
					<div class="label-login">Password</div>
					<div class="label-login-box"><input type="password" class="input-login" name="password"></div>
				</div>
				<div class="login-submit">
					<input type="submit" name="login_submit" value="login" class="btn-style"> 
					&nbsp;&nbsp;<span class="reset-pwd"><a href="<?=$base?>/index.php/home/reset_password" id="resetpwd" class="fancybox" style="color:#666">Reset Password</a></span>
				</div>
			</div>
		</form>
		</div>
	</div>
<?php
}
?>
---------->