	<div id="content">
		<ul class="tab-menu-login">
		</ul>
		<div class="border-tab-menu paddmenus">
			<div class="checkout-title">Login</div>
			<div class="checkbox-row">
				<div id="checkout-box-login">
					<form method="post" name="login">
					<div class="checkout-login_ red"><?=$msg?></div>
					<div class="checkbox-row-login">
						<div class="label-checkout-login">Email</div>
						<div class="col-checkout left">
							<?php
								$erroremail = "";
								if (form_error('email')){
									$erroremail = form_error('email');
								}
							?>
							<input type="text" class="input-checkout" name="email" placeholder="<?=$erroremail;?>">
						</div>
					</div>
					<!--			
					<?php
					if (form_error('email')){
					?>
					<div class="checkbox-row-login">
						<div class="label-checkout-login"></div>
						<div class="col-checkout red"><?=form_error('email')?></div>									
					</div>
					<?php
					}
					?>
					-->
					<div class="checkbox-row-login">
						<div class="label-checkout-login">Password</div>
						<div class="col-checkout left">
							<?php
								$errorpass = "";
								if (form_error('password')){
									$errorpass = form_error('password');
								}
							?>
							<input type="password" class="input-checkout" name="password" placeholder="<?=$errorpass;?>"></div>
						<!--	
						<div class="col-checkout red"><?=form_error('password')?></div>
						-->
					</div>
					<div class="padd7">&nbsp;</div>
					<div class="checkbox-row-login">
						<div class="label-checkout-login"></div>
						<div class="col-checkout center">
							<input type="submit" name="login_submit" id="login_submit" value="login" class="btn-style">
						</div>
						<div class="col-checkout red"></div>
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>