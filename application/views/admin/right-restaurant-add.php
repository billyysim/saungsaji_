<div id="content-right">
	<h2>Restaurant <span style="font-size:13px;"> - Add Restaurant</span></h2>	
	<div style="margin-bottom:10px;"><?=$msg?></div>	
	<form method="post" name="add_resto">
	<div class="input-div">
		<?php
			$errornama = "";
			if (form_error('name')){
				$errornama=form_error('name');
			}
		?>
		<label class="label-form">Nama Restaurant</label>
		<input class="input-form"  type="text" name="name" placeholder="<?=$errornama?>">
	</div>
	<div class="input-div">
		<?php
			$erroremail = "";
			if (form_error('email')){
				$erroremail=form_error('email');
			}
		?>
		<label class="label-form">Email</label>
		<input class="input-form"  type="text" name="email" placeholder="<?=$erroremail?>">
	</div>
	<div class="input-div">
		<?php
			$errorpass = "";
			if (form_error('password')){
				$errorpass=form_error('password');
			}
		?>
		<label class="label-form">Password</label>
		<input class="input-form"  type="password" name="password" placeholder="<?=$errorpass?>">
	</div>
	<div class="input-div">
		<label class="label-form"></label>
		<input type="submit" value="Submit" name="add_submit" class="btn-style">
	</div>
	</form>
</div>
