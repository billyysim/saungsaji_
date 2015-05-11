	<?php
		$selectedTime = date('H:i:s');
		$endTime = strtotime("+".$restoran->iDeliveryTime." minutes", strtotime($selectedTime));
		$min = date('H:i', $endTime);	
	?>
	<div id="content">
		<ul class="tab-menu">
			<li class="active">Build Order</li>
			<li>Check Out</li>
			<li>Finish</li>
		</ul>
		<div class="border-tab-menu">
			<div class="order-desc">
				<div class="order-desc-resto">
					<div class="order-desc-title"><?=$restoran->cNama?></div>
					<div class="order-desc-row">
						<div class="order-desc-hdr1 padd25">Alamat :</div>
					</div>
					<div class="order-desc-row">
						<div class="order-desc-hdr1-address padd25">
							<?php
							foreach ($alamat->result_array() as $row_alamat){
							?>
							<div class="padd20"><?=$row_alamat['cAlamat']?></div>
							<?php
							}  	  			
							?>
						</div>
					</div>	
					<div class="padd25"></div>
					<div class="order-desc-row">
						<div class="order-desc-hdr1 padd25">Wilayah Pengantaran :</div>
						<div class="order-desc-hdr2 padd25">Minimum Pemesanan :</div>
						<div class="order-desc-hdr3 padd25">Waktu Pengantaran :</div>
					</div>
					<div class="order-desc-row">	
						<div class="order-desc-hdr2 padd25">
							<?php
							foreach ($pengantaran->result_array() as $row_pengantaran){
							?>
							<div class="padd20"><?=$row_pengantaran['cWilayah']?></div>
							<?php
							}  	  			
							?>
						</div>
						<div class="order-desc-hdr3 padd20" id="min_order"><?=number_format($min_order->cValue,0,",",".");?></div>
						<div class="order-desc-hdr4 padd20"><?=$del_time->cValue?> menit</div>
					</div>
					<div class="order-title-opening">Waktu Buka</div>								
					<div class="order-day-opening1">
						<div class="order-day-row1 padd20">
							<div class="order-opening-col1"><?=$senin->cHari?></div>
							<div class="order-opening-col2">
								<?=date('H:i',strtotime($senin->dOpenHour))?> - <?=date('H:i',strtotime($senin->dCloseHour))?>
							</div>
						</div>
						<div class="order-day-row1 padd20">
							<div class="order-opening-col1"><?=$selasa->cHari?></div>
							<div class="order-opening-col2">
								<?=date('H:i',strtotime($selasa->dOpenHour))?> - <?=date('H:i',strtotime($selasa->dCloseHour))?>
							</div>
						</div>
					</div>				
					<div class="order-day-padd-border">&nbsp;</div>
					<div class="order-day-padd">&nbsp;</div>								
					<div class="order-day-opening1">
						<div class="order-day-row1 padd20">
							<div class="order-opening-col1"><?=$rabu->cHari?></div>
							<div class="order-opening-col2">
								<?=date('H:i',strtotime($rabu->dOpenHour))?> - <?=date('H:i',strtotime($rabu->dCloseHour))?>
							</div>
						</div>
						<div class="order-day-row1 padd20">
							<div class="order-opening-col1"><?=$kamis->cHari?></div>
							<div class="order-opening-col2">
								<?=date('H:i',strtotime($kamis->dOpenHour))?> - <?=date('H:i',strtotime($kamis->dCloseHour))?>
							</div>
						</div>
					</div>
					<div class="order-day-padd-border">&nbsp;</div>
					<div class="order-day-padd">&nbsp;</div>
					<div class="order-day-opening1">
						<div class="order-day-row1 padd20">
							<div class="order-opening-col1"><?=$jumat->cHari?></div>
							<div class="order-opening-col2">
								<?=date('H:i',strtotime($jumat->dOpenHour))?> - <?=date('H:i',strtotime($jumat->dCloseHour))?>
							</div>
						</div>
						<div class="order-day-row1 padd20">
							<div class="order-opening-col1"><?=$sabtu->cHari?></div>
							<div class="order-opening-col2">
								<?=date('H:i',strtotime($sabtu->dOpenHour))?> - <?=date('H:i',strtotime($sabtu->dCloseHour))?>
							</div>
						</div>
					</div>
					<div class="order-day-padd-border">&nbsp;</div>
					<div class="order-day-padd">&nbsp;</div>
					<div class="order-day-opening1">
						<div class="order-day-row1">
							<div class="order-opening-col1"><?=$minggu->cHari?></div>
							<div class="order-opening-col2">
								<?=date('H:i',strtotime($minggu->dOpenHour))?> - <?=date('H:i',strtotime($minggu->dCloseHour))?>
							</div>
						</div>
					</div>
				</div>
				<?php
				if ($restoran->cImage<>"")
					$img=$restoran->cImage;
				else 
					$img="default.png";
				?>				
				<div class="order-desc-pic"><img src="<?=$base?>/img/resto_thumb/<?=$img?>" class="rounded"></div>
			</div>
			<div class="padd45" id="menu">&nbsp;</div>
			<div class="padd20">&nbsp;</div>
			<!--<div class="order-box-menu" id="menu"><h3 class="order-box-mntitle">Menu</h3></div>-->
			
			<div class="order-box-menu" style="padding:2px 0">
				<ul class="restoran-menu-panel">
					<li class="restoran-menu">
						<ul id="tabs">
							<li class="active"><a href="#tab1">Makanan</a></li>
							<!--
							<li><a class=" "href="#tab2">Minuman</a></li>
							<li><a class=" "href="#tab3">Dessert</a></li>
							-->
						</ul>
					</li>
					<!--
					<li class="restoran-search">
						<div>
							<select class="options-list" id="optionsmenu1"style="width:500px">
								<option>Pilih Restoran Lainnya</option>
							</select>						
						</div>
					</li>
					-->
				</ul>
				<div class="ui-helper-clearfix"></div>
			</div>


			<div class="order-box-menu-left">
				<div id="tabs_wrapper">
					<div id="tabs_content_container">
						<div id="tab1" class="tab_content" style="display:block;">
							<?php
							foreach ($menu_restoran->result_array() as $row_menu_restoran){	
							?>
							<div class="order-box-row">
								<div class="order-box-rowpic">
									<?php
									if ($row_menu_restoran['cImageThumb']==""){
										$imgmenu="default.png";
									}
									else{
										$imgmenu=$row_menu_restoran['cImageThumb'];
									}
									?>
									<img src="<?=$base?>/img/menu_thumb/<?=$imgmenu?>" class="rounded" width="170px">
								</div>
								<div class="order-box-rowdesc">
									<span class="title-menu-list"><?=$row_menu_restoran['cNama']?></span>
									<div class="order-price">
										<?php
										if(isset($row_menu_restoran['iHargaDeal']) && $row_menu_restoran['iHargaDeal']>0 && $this->session->userdata('cNama')!=""){
											echo "<strike>".number_format($row_menu_restoran['iHarga'],0,",",".")."</strike>";
											echo "<span style='color:red;margin-left:10px;'>".number_format($row_menu_restoran['iHargaDeal'],0,",",".")."</span>";
											$harga_menu = $row_menu_restoran['iHargaDeal'];
										}
										else{
											echo number_format($row_menu_restoran['iHarga'],0,",",".");
											$harga_menu = $row_menu_restoran['iHarga'];
										}
										$diskon=0;
										foreach ($menu_diskon->result_array() as $row_menu_diskon){
											if($row_menu_restoran['id']==$row_menu_diskon['iMenuId']){
												if(date('Y-m-d',strtotime($row_menu_diskon['dStartBerlaku']))<=date('Y-m-d')){
													if(date('Y-m-d',strtotime($row_menu_diskon['dEndBerlaku']))>=date('Y-m-d')){
														$diskon=$row_menu_diskon['iDiskon']*$row_menu_restoran['iHarga']/100;
														echo "<span style='margin-left:20px;font-weight:bold;color:red;'>Off ".$row_menu_diskon['iDiskon'] ." %</span>";
													}
												}
											}
										}
										?> 
									</div>						
									<span class="menu-desc"><?=nl2br($row_menu_restoran['cDesc'])?></span>
									<!--<a href="" class="btnorder">Order</a>	-->
								</div>				
							</div>
							<div class="order-box-addchart" data-id="menu">
								<div class="order-qty">
									Jumlah Pesan &nbsp;
									<input type="text" value="1" class="input-qty" id="qty<?=$row_menu_restoran['id']?>" onkeypress="return isNumericKey(event);">&nbsp;&nbsp;
									<input type="text" placeholder="Permintaan khusus ?"  class="input-specialreq" id="specialreq<?=$row_menu_restoran['id']?>">&nbsp;&nbsp;
									<input type="hidden" id="price-disc<?=$row_menu_restoran['id']?>" value="<?=$harga_menu?>-<?=$diskon?>">
									<a href="JavaScript:void(0);" id='<?=$row_menu_restoran['id']?>' class="btnorder btn-style">Pesan</a>
								</div>
							</div>
							<?php
							}
							?>			
							<div class="order-box-padd">&nbsp;</div>
						</div>	
						<div id="tab2" class="tab_content">
						<!---->						
						<?php
							foreach ($menu_restoran->result_array() as $row_menu_restoran){	
							?>
							<div class="order-box-row">
								<div class="order-box-rowpic">
									<?php
									if ($row_menu_restoran['cImageThumb']==""){
										$imgmenu="default.png";
									}
									else{
										$imgmenu=$row_menu_restoran['cImageThumb'];
									}
									?>
									<img src="<?=$base?>/img/menu_thumb/<?=$imgmenu?>" class="rounded" width="170px">
								</div>
								<div class="order-box-rowdesc">
									<span class="title-menu-list"><?=$row_menu_restoran['cNama']?></span>
									<div class="order-price">
										<?php
										echo number_format($row_menu_restoran['iHarga'],0,",",".");
										$diskon=0;
										foreach ($menu_diskon->result_array() as $row_menu_diskon){
											if($row_menu_restoran['id']==$row_menu_diskon['iMenuId']){
												if(date('Y-m-d',strtotime($row_menu_diskon['dStartBerlaku']))<=date('Y-m-d')){
													if(date('Y-m-d',strtotime($row_menu_diskon['dEndBerlaku']))>=date('Y-m-d')){
														$diskon=$row_menu_diskon['iDiskon'];
														echo "<span style='margin-left:20px;font-weight:bold;color:red;'>Off ".$row_menu_diskon['iDiskon'] ." %</span>";
													}
												}
											}
										}
										?> 
									</div>						
									<span class="menu-desc"><?=nl2br($row_menu_restoran['cDesc'])?></span>
									<!--<a href="" class="btnorder">Order</a>	-->
								</div>				
							</div>
							<div class="order-box-addchart" data-id="menu">
								<div class="order-qty">
									Jumlah Pesan &nbsp;
									<input type="text" value="1" class="input-qty" id="qty<?=$row_menu_restoran['id']?>" onkeypress="return isNumericKey(event);">&nbsp;&nbsp;
									<input type="text" placeholder="Permintaan khusus ?"  class="input-specialreq" id="specialreq<?=$row_menu_restoran['id']?>">&nbsp;&nbsp;
									<input type="hidden" id="price-disc<?=$row_menu_restoran['id']?>" value="<?=$row_menu_restoran['iHarga']?>-<?=$diskon?>">
									<a href="JavaScript:void(0);" id='<?=$row_menu_restoran['id']?>' class="btnorder btn-style">Pesan</a>
								</div>
							</div>
							<?php
							}
							?>			
							<div class="order-box-padd">&nbsp;</div>
						
						<!---->
						
						</div>
					</div>
        		</div>
			</div>
			
			<div class="order-box-menu-right">
				<form method="post" name="order">
				<div class="order-box-total">
				<h3 class="order-mytitle">My Order</h3>
				<div class="padd7">&nbsp;</div>
				<div class="order-box-delivery">
					<div class="box-delivery-text">
						<div class="delivery-text-row red">
						Waktu Terima Pesanan Minimal <?=$del_time->cValue?> menit ke depan
						</div>
						<div class="delivery-text-row">
							<div class="delivery-text-pickup"><input type="radio" class="radiopick" name="del_option" value="2" id="del_option2" checked>Secepatnya</div>
							<!--<div class="delivery-text-date" id="datetimepick">
								<input type="text" class="input-date" id="datetimepickval" name="time_pick" readonly> 
								<input type="text" id="date-hour1" value="0000" alt="time" class="input-hour">
							</div>-->
						</div>
						<div class="delivery-text-row">						
							<div class="delivery-text-pickup"><input type="radio" class="radiopick" name="del_option" value="1" id="del_option1">Waktu Depan</div>
							<div class="delivery-text-date" id="datetimedeliv">
								<input type="text" class="input-date" id="datetimedelivval" name="time_del" readonly> 
								<!--<input type="text" id="date-hour2" class="input-hour" value="0000" alt="time"> value="<?=date('d-m-Y H:i')?>"-->
							</div>
						</div>						
					</div>
				</div>
				<div class="padd7">&nbsp;</div>
				<!--
				<div class="order-box-delivery-">
					<div class="box-delivery-text">
						<h3 class="order-myitem">Diantar oleh</h3>
						<div class="padd7 borderorange">&nbsp;</div>
						<div class="option-deliver">
							<select class="options-list-deliver" name="deliver_method" id="optionsdeliver" onChange="check_type();">
								<?php
								if($restoran->cStatusAntar=="Y"){
								?>
								<option value="<?=$restoran->cNama?>"><?=$restoran->cNama?></option>
								<?php
								}
								?>		
								<option value="SaungSaji">SaungSaji</option>						
							</select>
						</div>						
					</div>
				</div>
				-->
				<div class="padd7">&nbsp;</div>
				<div class="order-box-items">					
					<!------posisi mulai refresh order------------------>
					<div class="box-delivery-text" id="build_order">
						<h3 class="order-myitem">My Items</h3>
						<div class="padd7 borderorange">&nbsp;</div>
						<!---------------------refresh--------------------------->
						<div align="center" id="loading" style="display:none;margin-top:50px;"></div>
						<div id="refresh">
						<div style="margin-bottom:10px;"><?=$pesan;?></div>
						<?php
						$subtotal=0;
						foreach ($order->result_array() as $row_order){  	  			
						?>						
						<div class="order-myitem-row" id="row<?=$row_order['iMenuId']?>">
							<div class="order-myitem-col5 "><?=$row_order['iJumlah']?></div>
							<div class="order-myitem-col6 "><?=$row_order['cNama']?></div>
							<div class="order-myitem-col4 ">Rp</div>
							<div class="order-myitem-col2 ">
							<?php
							if($row_order['iDiskon']>0)
								$diskon=$row_order['iDiskon']/100;
							else
								$diskon=1;
							/*	
							foreach ($menu_diskon->result_array() as $row_menu_diskon){
								if($row_order['iMenuId']==$row_menu_diskon['iMenuId']){
									if(date('Y-m-d',strtotime($row_menu_diskon['dStartBerlaku']))<=date('Y-m-d')){
										if(date('Y-m-d',strtotime($row_menu_diskon['dEndBerlaku']))>=date('Y-m-d')){
											$diskon = $row_menu_diskon['iDiskon']/100;
										}									
									}
								}
							}
							*/
							$subtotal=$subtotal + ($row_order['iJumlah']*$row_order['iHarga']*$diskon);							
							?>					
							<input type="text" readonly class="currency myitem-price " name="total1" id="total1" value="<?=$row_order['iJumlah']*$row_order['iHarga']*$diskon?>">
							</div>
							<div class="order-myitem-col3 ">
								<a href="JavaScript:void(0);">
									<img src="<?=$base?>/img/delete.png" style="cursor:pointer" onclick="delete_row_(this.id);" id="<?=$row_order['iMenuId']?>">
								</a>
							</div>
						</div>
						<?php
						}
						?>
						<?php
							$charge=$charge_delivery->iCharge;
							/*
							if ($restoran->cStatusAntar=='Y'){
								if ($restoran->iMinOrder>$subtotal)
									$charge=$restoran->iCharge;							
							}
							else
								$charge=$charge_delivery->cValue;													
							*/	
							$sess_resto=array('iCharge'=>$charge);
							$this->session->set_userdata($sess_resto);					
						?>
						<div class="order-myitem-row">
							<div class="order-myitem-col1 orange">Subtotal</div>
							<div class="order-myitem-col4 orange">Rp</div>
							<div class="order-myitem-col2 orange"><input type="text" readonly class="currency myitem-price orange" name="subtotal" id="subtotal" value="<?=$subtotal?>"></div>
							<div class="order-myitem-col3 orange">&nbsp;</div>
						</div>
						<?php
							if ($restoran->cStatusTax=='Y')
							{
						?>
						<div class="order-myitem-row">
							<div class="order-myitem-col1">PPN</div>
							<div class="order-myitem-col4">Rp</div>
							<div class="order-myitem-col2"><input type="text" readonly class="currency myitem-price" name="tax" id="tax" value="<?=$subtotal*0.1?>"></div>
							<div class="order-myitem-col3">&nbsp;</div>
						</div>
						<?php
							}
						?>
						<div class="order-myitem-row">
							<div class="order-myitem-col1">Jasa layanan</div>
							<div class="order-myitem-col4">Rp</div>
							<div class="order-myitem-col2">	
							<?php
							if(($charge*$subtotal)/100>$del_max->cValue){
								$service=$del_max->cValue;
							}
							else{
								$service=($charge*$subtotal)/100;
							}
							?>						
							<input type="text" readonly class="currency myitem-price" name="delivery" id="delivery" value="<?=$service?>">							
							</div>
							<div class="order-myitem-col3">&nbsp;</div>
						</div>
						<?php
							if ($restoran->cStatusTax=='Y')
								$total=$subtotal+(0.1*$subtotal)+$service;
							else
								$total=$subtotal+$service;
						?>								
						<div class="order-myitem-row">
							<div class="order-myitem-col1 orange">Total</div>
							<div class="order-myitem-col4 orange">Rp</div>
							<div class="order-myitem-col2 orange">
							<input type="text" readonly class="currency myitem-price orange" name="ttotal" 	value="<?=$total?>">
							</div>
							<div class="order-myitem-col3 orange">&nbsp;</div>
						</div>	
						<?php
						//if ($restoran->cStatusAntar=='Y'){
							if ($min_order->cValue-$subtotal>0)
								$remain=$min_order->cValue-$subtotal;
							else
								$remain=0;
						?>					
						<!---------Jika sudah ada pengantaran saung saji maka yang di prioritykan adalah saung saji sehingga element dibawah ini tidak perlu sebagai element default---------->
						<?php
						if ($remain>0){
						?>
						<div class="order-myitem-row red">
							<div class="order-myitem-col1">Masih Kurang</div>
							<div class="order-myitem-col4">Rp</div>							
							<div class="order-myitem-col2">
								<input type="text" readonly class="currency myitem-price red" name="remain" id="remain" value="<?=$remain?>">							
								<input type="hidden" name="min_order" id="min_order" value="<?=$min_order->cValue?>">
							</div>
							<div class="order-myitem-col3">-</div>	
						</div>
						<?php
						}
						?>
						<!------------------------------------------------------->
						<?php
						//}
						?>
						</div>
						<!------------------refresh------------------------------>
						<div class="padd25">&nbsp;</div>
						<div class="option-payment">
							<select class="options-list-payment" name="payment_method" id="optionspayment">
								<option value="0">-- Cara Pembayaran --</option>	
								<?php
								foreach ($payment_method->result_array() as $row_payment_method){
									if($this->session->userdata('userType')!='' && $row_payment_method['cPayment']=='My Wallet' ){
								?>
									<option value="<?=$row_payment_method['id']?>"><?=$row_payment_method['cPayment']?></option>
								<?php
									}
									else if($row_payment_method['cPayment']!='My Wallet'){
								?>
									<option value="<?=$row_payment_method['id']?>" selected><?=$row_payment_method['cPayment']?></option>
								<?php
									}
								}
								?>
							</select>
						</div>
						<div class="padd7">&nbsp;</div>
						<div class="padd7">&nbsp;</div>
						<!--<div class="padd7" style="color:red;font-size:13px;margin-bottom:15px;">gunakan kode SAUNGSAJI untuk diskon Rp. 5.000</div>-->
						<div class="box-voucher">
							<input type="text" name="voucher_code" class="input-voucher" placeholder="Kode Voucher - Jika Ada" onkeyup="check_voucher();">
						</div>
						<div id="checking"></div>						
						<div style='margin-bottom:10px;margin-top:10px;'>Inputkan angka yang tampil di bagian bawah :</div>
						<div class="box-voucher">
							<?php
								$errorcaptcha = "Captcha";
								if (form_error('captcha')){
									$errorcaptcha=form_error('captcha');
								}
							?>							
							<input type="text" name="captcha" class="input-captcha" placeholder="<?=$errorcaptcha?>">
						</div>
						<div class="box-voucher center">
							<?=$cap?>
						</div>												
						<div class="checkout">
							<div class="padd7">&nbsp;</div>
							<!--<a href="<?=$base?>/index.php/home/check_out" class="btncheckout" id="btncheckout">Check Out</a>-->
							<input type="submit" name="btncheckout" id="btncheckout" value="Check Out" class="btn-style">
						</div>
					</div>								
				<!------posisi akhir refresh order------------------>						
				</div>

				</div>
				</form>			
			</div>
		</div>
	</div>
</div>
<script type="text/javascript">
  	$(document).ready(function(){
		$("#tabs li").click(function(){
			$("#tabs li").removeClass('active');
			$(this).addClass("active");
			$(".tab_content").hide();
			var selected_tab=$(this).find("a").attr("href");
			$(selected_tab).fadeIn();return false
			});
	
		var dateToday = '<?=date('d-m-Y H:i')?>';

		//$(".box-voucher").hide();
		$('#datetimepickval').attr('disabled', true);		
		$('#datetimedelivval').attr('disabled', true);			
			
		$('.currency').each(function(){
			$(this).val(currency_format2(getNum($(this).val())));
		});
				
		//$("#optionspayment").selectbox();
		
		/*
		$('.fancybox').fancybox({
			'type':'iframe',
			'width':605,
			'height':605,
			'padding':0,
			'autoScale':false,
			'scrolling':false,
			'closeBtn':true,
			'title':false,
			'iframe':{'scrolling': 'no'}
		});
		*/
		/*					
		$('#datetimepickval').datetimepicker({dateFormat: "d-mm-yy",changeYear: false,minDate:dateToday,
					changeMonth: false });	
		$('#datetimedelivval').datetimepicker({dateFormat: "d-mm-yy",changeYear: false,minDate:dateToday,
					changeMonth: false });									
		*/
		/*					
		$('.options-list-payment').change(function(){
			var payment = $('#optionspayment option:selected').text();
			if (payment=="Voucher"){
				$(".box-voucher").show();
			}
			else{
				$(".box-voucher").hide();
			}
			alert(payment);
		});
		
	
		$('.input-voucher').keyup(function(){			
			var value = $('.input-voucher').val();
			var length = value.length;
			if (length >= 7){
				$.ajax({
					type: "POST",
					url: "<?=$base?>/index.php/home/check_voucher",
					data: "voucher="+value,
					success: function(html){
			             $("#checking").empty();
			             $("#checking").append(html);			 			 			
					}
				});		
				//alert(value);
			}
			else{
				$("#checking").empty();
			}
		});
		*/
		$('.input-qty').on("blur", function() {
		  if ($(this).val() == "" || $(this).val() == "0" ) {
			$(this).val('1');
		  }
		});		
		
		$('.btnorder').click(function(){
			var id = $(this).attr('id');
			order(id);
		});
		
		$('.radiopick').click(function(){
			dateToday = '<?=date('d-m-Y H:i')?>';		
			a = $(this).val();
			if (a==1){
				$(".order-box-delivery-").show();
				$('#datetimepickval').attr('disabled', true);
				//$('#datetimepickval').val('');											
				$('#datetimedelivval').attr('disabled', false);			
				//$('#datetimedelivval').val(dateToday);				
			}	
			else if (a==2){
				$(".order-box-delivery-").hide();
				$('#datetimedelivval').attr('disabled', true);			
				$('#datetimedelivval').val('');
				$('#datetimepickval').attr('disabled', false);			
				//$('#datetimepickval').val(dateToday);				
			}
			/*
			$("#loading").show();
			$("#loading").fadeIn(1500).html("<img src='<?=$base?>/img/ajax-loader.gif'>");
			$("#refresh").hide();
			$.ajax({
				type: "POST",
				url: "<?=$base?>/index.php/home/add_order",
				data: "stat=type_del"+"&type="+a+"&idRest="+<?=$restoran->idResto?>,
				success: function(html){				
					$("#refresh").empty();
					$("#refresh").append(html);	
					$("#loading").hide();
					$("#refresh").show();		
					//alert(x+" "+j+" "+req+ " " +k);
				}
			});					
			*/
		});		
		
		function order(x){
			//var url = $(this).attr('href');
			//var k=$('#'+a).val(); //type delivery					
			var j=$('#qty'+x).val(); //jumlah pesanan
			var req=$('#specialreq'+x).val(); //keterangan tambahan
			var price_disc=$('#price-disc'+x).val(); //keterangan tambahan
			$("#loading").show();
			$("#loading").fadeIn(1500).html("<img src='<?=$base?>/img/ajax-loader.gif'>");
			$("#refresh").hide();
			$.ajax({
				type: "POST",
				url: "<?=$base?>/index.php/home/add_order",
				data: "stat=add"+"&id="+x+"&j="+j+"&req="+req+"&pr="+price_disc,
				success: function(html){				
					$("#refresh").empty();
					$("#refresh").append(html);	
					$("#loading").hide();
					$("#refresh").show();		
					//alert(x+" "+j+" "+req+ " " +k);
				}
			});		
			//$('#build_order').load(url);
			//return false;			
		};	
									
	});

	function isNumericKey(e)
	{
		if (window.event) { var charCode = window.event.keyCode; }
		else if (e) { var charCode = e.which; }
		else { return true; }
		if (charCode > 31 && (charCode < 48 || charCode > 57)) { return false; }
		return true;
	}

	function delete_row_(x){		
		$("#loading").show();
		$("#loading").fadeIn(1500).html("<img src='<?=$base?>/img/ajax-loader.gif'>");
		$("#refresh").hide();
		$.ajax({
			type: "POST",
			url: "<?=$base?>/index.php/home/add_order",
			data: "stat=del"+"&id="+x,
			success: function(html){				
				$("#refresh").empty();
				$("#refresh").append(html);	
				$("#loading").hide();
				$("#refresh").show();		
				//alert(x+" "+j+" "+req+ " " +k);
			}
		});		
	};	
	

	function check_voucher(){
		var value = $('.input-voucher').val();
		var length = value.length;
		if (length >= 7){
			$.ajax({
				type: "POST",
				url: "<?=$base?>/index.php/home/check_voucher",
				data: "voucher="+value+"&idRest="+<?=$restoran->idResto?>,
				success: function(html){
					var result = html;
					if (result>0){
						$("#checking").empty();
						$("#checking").append("<font class='red'>Voucher valid</font>");			
					}
					else{
						$("#checking").empty();
						$("#checking").append("<font class='red'>Voucher tidak terdaftar atau sudah digunakan atau sudah kadarluarsa</font>");
						$('.input-voucher').val('');											
					}
					//alert (result);
					//$("#checking").empty();
					//$("#checking").append(html);			
				}
			});		
			//alert(value);
		}
		else{
			$("#checking").empty();
		}
		$(".input-voucher").val($(".input-voucher").val().toUpperCase());
	}			
	
	function check_type(){
		var check_ = $('#optionsdeliver').val();
		var k = $('input[name=del_option]:checked').val()
		$("#loading").show();
		$("#loading").fadeIn(1500).html("<img src='<?=$base?>/img/ajax-loader.gif'>");
		$("#refresh").hide();

		$.ajax({
			type: "POST",
			url: "<?=$base?>/index.php/home/add_order",
			data: "stat=type_del"+"&del_by="+check_+"&idRest="+<?=$restoran->idResto?>+"&type="+k,
			success: function(html){
				$("#refresh").empty();
				$("#refresh").append(html);	
				$("#loading").hide();
				$("#refresh").show();		
			}
		});		
		//alert(value);
		
	}			
	
	$(function(){
		$('*[name=time_del]').appendDtpicker({			
			"futureOnly": true,
			"closeOnSelected": true,
			"dateFormat": "DD-MM-yyyy hh:mm",
			"todayButton": false,
			"autodateOnStart": false,
			"locale": "id",
			"minuteInterval": 15,
			"minuteToFuture": 30
			//"minTime": "<?=$min?>"
		});
	});
	
	$(function(){
		$('*[name=time_pick]').appendDtpicker({			
			"futureOnly": true,
			"closeOnSelected": true,
			"dateFormat": "DD-MM-yyyy hh:mm",
			"todayButton": false,
			"autodateOnStart": false,
			"locale": "id",
			"minuteInterval": 15,
		});
	
	function scrollCheck(){
			var rightTop=$(document).height()-$('#footer').offset().top+30;
			var $right=$('.order-box-total'),scrollTop=$(window).scrollTop(),windowHeight=$(window).height(),docHeight=$(document).height(),headerHeight=$('#header').outerHeight(),viewport=windowHeight-headerHeight;rightHeight=$('.order-box-menu-right').height(),stickyHeight=$right.outerHeight(),distanceToTop=$('.order-box-menu-right').offset().top,distanceToBottom=scrollTop+windowHeight+rightTop-docHeight,fromBottom=(scrollTop+windowHeight+rightTop>docHeight?distanceToBottom+'px':'0px'),fromTop=(scrollTop>distanceToTop?headerHeight+'px':'0px'),rightScrollPos=scrollTop-100;
			if($('#tabs_content_container').height()>$right.height()){
				if(stickyHeight<viewport){
					if(scrollTop>=distanceToTop&&rightScrollPos<rightHeight){
						$right.css({'position':'fixed','top':fromTop,'bottom':'auto'})
					}
					else if(scrollTop>=distanceToTop&&rightScrollPos>rightHeight){
						$right.css({'position':'fixed','bottom':fromBottom,'top':'auto'})
					}
					else if(scrollTop<distanceToTop){
						$right.css({'position':'relative','top':'auto'})
					}
					else{
						$right.css({'position':'relative','bottom':'auto'})
					}
				}
				else{
					if(scrollTop>distanceToTop){
						$right.css({'position':'fixed','bottom':fromBottom,'top':'auto'})
					}
					else{
						$right.css({'position':'relative','top':'auto','bottom':'auto'})
					}
				}
			}
		}
		$(window).bind('scroll',scrollCheck)
	
	});
	
	//$(document).ready(function(){
	//	$(".options-list").selectbox();		
	//});
</script>   