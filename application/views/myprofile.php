	<div id="content">
		<div class="myprofile-title">My Profile</div>
		<div class="padd-borderorange"></div>
		<div class="message red"><?=$msg1?></div>
		<div class="myprofile-left">
			<form method="post" name="profile">
				<div class="checkbox-row">
					<div class="label2-myprofile">Nama Lengkap</div>
					<div class="col-checkout">
						<input type="text" class="input-checkout" name="name" value="<?=$user_profile->cNama?>">
					</div>
				</div>
				
				<?php
				if (form_error('name')){
				?>				
				<div class="checkbox-row">
					<div class="label2-myprofile"></div>
					<div class="col-checkout red"><?=form_error('name')?></div>
				</div>
				<?php
				}
				?>					
				<div class="checkbox-row">
					<div class="label2-myprofile">Email</div>
					<div class="col-checkout">
						<input type="text" class="input-checkout" name="email" value="<?=$user_profile->cEmail?>">						
					</div>
				</div>
				
				<?php
				if (form_error('email')){
				?>				
				<div class="checkbox-row">
					<div class="label2-myprofile"></div>
					<div class="col-checkout red"><?=form_error('email')?></div>
				</div>
				<?php
				}
				?>	
				<div class="checkbox-row">
					<div class="label2-myprofile">Handphone</div>
					<div class="col-checkout">
						<input type="text" class="input-checkout" name="hp" value="<?=$user_profile->cHp?>" onkeypress="return isNumericKey(event);">
					</div>
				</div>
				
				<?php
				if (form_error('hp')){
				?>				
				<div class="checkbox-row">
					<div class="label2-myprofile"></div>
					<div class="col-checkout red"><?=form_error('hp')?></div>
				</div>
				<?php
				}
				?>					

				
				<div class="checkbox-row">
					<div class="label2-myprofile">Telp</div>
					<div class="col-checkout">
						<input type="text" class="input-checkout" name="telp" value="<?=$user_profile->cTelp?>" onkeypress="return isNumericKey(event);">
					</div>
				</div>
				
				<?php
				if (form_error('telp')){
				?>				
				<div class="checkbox-row">
					<div class="label2-myprofile"></div>
					<div class="col-checkout red"><?=form_error('telp')?></div>
				</div>
				<?php
				}
				?>					
				<div class="checkbox-row">
					<div class="label2-myprofile">Alamat antar</div>
					<div class="col-checkout">
						<textarea class="textarea-checkout" name="addr"><?=$user_profile->cAlamat?></textarea>						
					</div>
				</div>
				<?php
				if (form_error('addr')){
				?>				
				<div class="checkbox-row">
					<div class="label2-myprofile"></div>
					<div class="col-checkout red"><?=form_error('addr')?></div>
				</div>
				<?php
				}
				?>				
				<div class="padd7">&nbsp;</div>
				<div class="checkbox-row">
					<div class="label2-myprofile">Wilayah</div>
					<div class="col-checkout">
						<select class="options-list" id="optionsmenu3" name="region">
							<?php
							foreach ($wilayah->result_array() as $row_get_all_wilayah){  	  			
							?>
								<option value="<?=$row_get_all_wilayah['id']?>"
								<?php
								if($row_get_all_wilayah['id']==$user_profile->cWilayah)
									echo "selected";
								?>><?=$row_get_all_wilayah['cWilayah']?></option>
							<?php
							}
							?>
						</select>
					</div>
				</div>
				<?php
				if (form_error('region')){
				?>				
				<div class="checkbox-row">
					<div class="label2-myprofile"></div>
					<div class="col-checkout red"><?=form_error('region')?></div>
				</div>
				<?php
				}
				?>			
				<div class="padd7">&nbsp;</div>
				<div class="checkbox-row">
					<div class="label2-myprofile_"></div>
					<div class="col-checkout center">
						<input type="submit" name="submit_profile" value="Edit Profile" class="btn-style">
						<a href="<?=$base?>/index.php/home/change_password" class="btn-style" id="changepwd_link">Change Password</a>
						<!--<a href="#" class="btnsubmit">Submit</a>-->
					</div>
				</div>
			</form>		
		</div>
		
		<!--
		<div class="myprofile-right-1">
			<a href="<?=$base?>/index.php/home/change_password" class="fancybox btn-style" id="changepwd_link">Change Password</a>
			<!--<div class="myprofile-title">Change Password</div>
			<div class="padd-borderorange"></div>-->
		<!--
			<div class="message"><?=$msg2?></div>
			<form method="post" name="change_pass">
				<div class="checkbox-row">			
					<div class="label-changepwd">Old Password</div>
					<div class="col-changepwd"><input type="password" class="input-changepwd" name="old_pass"></div>
				</div>
				<div class="checkbox-row">
					<div class="label-changepwd">New Password</div>
					<div class="col-changepwd"><input type="password" class="input-changepwd" name="new_pass"></div>
				</div>
				<div class="checkbox-row">
					<div class="label-changepwd">Retype New Password</div>
					<div class="col-changepwd"><input type="password" class="input-changepwd" name="re_new_pass"></div>
				</div>
				<div class="padd25">&nbsp;</div>
				<div class="checkbox-row">
					<div class="label-changepwd">&nbsp;</div>
					<div class="col-changepwd right"><input type="submit" name="submit_change_pass" value="Edit Password" class="btnsubmit">
					<a href="#" class="btnsubmit">Change</a></div>
				</div>
			</form>
		</div>
		-->
				
	</div>
</div>
<script>
	$(document).ready(function(){		
		$("#changepwd_link").fancybox({
			'type' : 'iframe',
			'maxWidth':430,
			'maxHeight':330,
			'padding'		: 0,
			'margin':20,
			'autoScale'		: true,
			'autoDimensions' : false,
			'scrolling' : false,
			'closeBtn':true,
			'title':false,
			'iframe': {'scrolling': 'no'}
		});		
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