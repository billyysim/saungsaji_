	<div id="content">
		<ul class="tab-menu">
			<li>Build Order</li>
			<li class="active">Check Out</li>
			<li>Finish</li>
		</ul>
		<div class="border-tab-menu paddmenus">
			<div class="checkout-title">Checkout Information</div>
			<div class="checkbox-row">
				<div id="checkout-box">
					<form method="post" name="user">
					<div style="margin-bottom:15px;" class="red"><?=$pesan;?></div>
					<div class="checkbox-row">
						<div class="label-checkout">Nama</div>
						<div class="col-checkout">
							<?php
							$errornama = "";
							if (form_error('nama')){
								$errornama=form_error('nama');
							}
							?>
							<input type="text" class="input-checkout" name='nama' placeholder="<?=$errornama;?>">							
						</div>	
						<!--<div class="col-checkout red"><?=form_error('nama')?></div>-->
					</div>
					<div class="checkbox-row">
						<div class="label-checkout">Email</div>
						<div class="col-checkout">
							<?php
							$erroremail = "";
							if (form_error('email_new')){
								$erroremail=form_error('email_new');
							}
							?>		
							<input type="text" class="input-checkout" placeholder="<?=$erroremail;?>" name='email_new'>							
						</div>		
					</div>
					
					<div class="checkbox-row">
						<div class="label-checkout">No HP</div>
						<div class="col-checkout">
							<?php
							$errorhp = "";
							if (form_error('hp')){
								$errorhp=form_error('hp');
							}
							?>						
							<input type="text" class="input-checkout" placeholder="<?=$errorhp;?>" name="hp" onkeypress="return isNumericKey(event);">
						</div>
					</div>
					
					<div class="checkbox-row">
						<div class="label-checkout">No Telp</div>
						<div class="col-checkout">
							<?php
							$errortelp = "";
							if (form_error('telp')){
								$errortelp=form_error('telp');
							}
							?>	
							<input type="text" class="input-checkout" placeholder="<?=$errortelp;?>" name="telp" onkeypress="return isNumericKey(event);">							
						</div>
					</div>								
					<div class="checkbox-row">
						<div class="label2-checkout">Alamat antar</div>
						<div class="col-checkout">
							<?php
							$erroralamat = "";
							if (form_error('alamat')){
								$erroralamat=form_error('alamat');
							}
							?>
							<textarea class="textarea-checkout" placeholder="<?=$erroralamat;?>" name="alamat"></textarea>
						</div>	
					</div>
					<div class="checkbox-row">
						<div class="label-checkout">Wilayah antar</div>
						<div class="col-checkout">
							<?php
							$errorregion = "";
							if (form_error('region')){
								$errorregion=form_error('region');
							}
							?>
							<select class="options-list" id="optionsmenu3" name="region">
								<option value='0'>
									<?php
									if($errorregion!=""){
										echo $errorregion; 
									}
									else{
										echo "- Pilih Wilayah -";
									}
									?>					
								</option>
								<?php
								foreach ($wilayah->result_array() as $row_get_all_wilayah){  	  			
								?>
									<option value="<?=$row_get_all_wilayah['id']?>"><?=$row_get_all_wilayah['cWilayah']?></option>
								<?php
								}
								?>
							</select>
						</div>	
					</div>					
					<div class="checkbox-row">
						<div class="label2-checkout">Info Pemesanan</div>
						<div class="col-checkout"><textarea class="textarea-checkout" name="info"></textarea></div>						
					</div>
					<div class="checkbox-row">
						<div class="label-checkout">
						<!--<input type="checkbox" name="agree" checked value='1'>--> 						
						</div>

						<div class="col-checkout">						
							<!--
							Saya menyetujui semua aturan yang berlaku	
							<div class="red"><?=form_error('agree')?></div>
							-->
							Dengan melakukan pemesanan makanan di SaungSaji.com, saya menyetujui semua 
							<a href="<?=$base?>/index.php/home/terms" class="fancybox">ATURAN LAYANAN</a>	
							yang berlaku di SaungSaji.com
						</div>						
					</div>			
					
					<div class="submit-checkout">
						<!--<a href="<?=$base?>/index.php/home/finish" class="btnsubmit">Continue Order</a>-->
						<input type="submit" name="btncontinue" id="btncontinue" value="Lanjutkan Order" class="btn-style">
					</div>					
					</form>
				</div>
								
				<div id="checkout-padd">&nbsp;</div>
				<div id="checkout-box">
					<form method="post" name="login">
					<h3 class="checkout-login">
						Sudah Terdaftar ?<div class="padd7"></div>Silakan Login</h3>
					<div class="borderorange padd25">&nbsp;</div>
					<div style="margin-bottom:15px;" class="red"><?=$msg;?></div>
					<div class="checkbox-row">
						<div class="label-checkout">Email</div>
						<div class="col-checkout">
							<?php
								$erroremail_ = "";
								if (form_error('email')){
									$erroremail_ = form_error('email');
								}
							?>
							<input type="text" class="input-checkout" name="email" placeholder="<?=$erroremail_;?>">							
						</div>
					</div>		
					<!--	
					<?php
					if (form_error('email')){
					?>
					<div class="checkbox-row">
						<div class="label-checkout"></div>
						<div class="col-checkout red"><?=form_error('email')?></div>									
					</div>
					<?php
					}
					?>
					-->
					<div class="checkbox-row">
						<div class="label-checkout">Password</div>
						<div class="col-checkout">
							<?php
								$errorpass = "";
								if (form_error('password')){
									$errorpass = form_error('password');
								}
							?>
							<input type="password" class="input-checkout" name="password" placeholder="<?=$errorpass;?>">							
						</div>
						<!--<div class="col-checkout red"><?=form_error('password')?></div>-->
					</div>
					<div class="padd7">&nbsp;</div>
					<div class="checkbox-row">
						<div class="label-checkout_">&nbsp;</div>
						<div class="col-checkout center">
						<!--<a href="#" class="btnsubmit">Login</a>--> 
						<input type="submit" name="login_submit_" id="login_submit" value="Login" class="btn-style">
						</div>
					</div>
					<div class="padd25"></div>					
					<h3 class="checkout-login">Keuntungan mendaftar :</h3>
					- Pemesanan lebih cepat dilakukan <div class="padd7"></div>
					- Koleksi poin yang dapat ditukarkan<div class="padd7"></div>
					- Dapat melihat history pemesanan <div class="padd7"></div>
					- Mendapat informasi restoran & menu terbaru <div class="padd7"></div>
					<div class="checkout-daftar">
					<a href="<?=$base?>/index.php/home/signup" class="btn-style" id="daftar_link">Daftar</a>
					<!--<input type="submit" name="btnsignin" id="btncontinue" value="Daftar" class="btn-style">-->
					</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
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
