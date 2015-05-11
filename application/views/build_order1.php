	<?php
		$charge=0;
		if ($restoran->cStatusAntar=='Y'){
				$charge=$restoran->iCharge;							
		}
		else
			$charge=$charge_delivery->cValue;													
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
						<div class="order-desc-hdr1 padd35">Alamat:</div>
						<div class="order-desc-hdr2 padd35">Wilayah Pengantaran:</div>
						<div class="order-desc-hdr3 padd35">Minimum Order:</div>
						<div class="order-desc-hdr4 padd35">Delivery Order:</div>
					</div>
					<div class="order-desc-row">
						<div class="order-desc-hdr1 padd7">
							<?php
							foreach ($alamat->result_array() as $row_alamat){
							?>
							<div><?=$row_alamat['cAlamat']?></div>
							<?php
							}  	  			
							?>
						</div>
						<div class="order-desc-hdr2 padd7">
							<?php
							foreach ($pengantaran->result_array() as $row_pengantaran){
							?>
							<div><?=$row_pengantaran['cWilayah']?></div>
							<?php
							}  	  			
							?>
						</div>
						<div class="order-desc-hdr3 padd7" id="min_order"><?=$restoran->iMinOrder?></div>
						<div class="order-desc-hdr4 padd7"><?=$restoran->iCharge?></div>
					</div>
					<div class="order-title-opening">Opening Hours</div>								
					<div class="order-day-opening1">
						<div class="order-day-row1">
							<div class="order-opening-col1"><?=$senin->cHari?></div>
							<div class="order-opening-col2"><?=$senin->cHour?></div>
						</div>
						<div class="order-day-row1">
							<div class="order-opening-col1"><?=$selasa->cHari?></div>
							<div class="order-opening-col2"><?=$selasa->cHour?></div>
						</div>
					</div>				
					<div class="order-day-padd-border">&nbsp;</div>
					<div class="order-day-padd">&nbsp;</div>								
					<div class="order-day-opening1">
						<div class="order-day-row1">
							<div class="order-opening-col1"><?=$rabu->cHari?></div>
							<div class="order-opening-col2"><?=$rabu->cHour?></div>
						</div>
						<div class="order-day-row1">
							<div class="order-opening-col1"><?=$kamis->cHari?></div>
							<div class="order-opening-col2"><?=$kamis->cHour?></div>
						</div>
					</div>
					<div class="order-day-padd-border">&nbsp;</div>
					<div class="order-day-padd">&nbsp;</div>
					<div class="order-day-opening1">
						<div class="order-day-row1">
							<div class="order-opening-col1"><?=$jumat->cHari?></div>
							<div class="order-opening-col2"><?=$jumat->cHour?></div>
						</div>
						<div class="order-day-row1">
							<div class="order-opening-col1"><?=$sabtu->cHari?></div>
							<div class="order-opening-col2"><?=$sabtu->cHour?></div>
						</div>
					</div>
					<div class="order-day-padd-border">&nbsp;</div>
					<div class="order-day-padd">&nbsp;</div>
					<div class="order-day-opening1">
						<div class="order-day-row1">
							<div class="order-opening-col1"><?=$minggu->cHari?></div>
							<div class="order-opening-col2"><?=$minggu->cHour?></div>
						</div>
					</div>
				</div>
				<div class="order-desc-pic"><img src="<?=$base?>/img/resto_thumb/<?=$restoran->cImage?>" class="rounded"></div>
			</div>
			<div class="padd45">&nbsp;</div>
			<div class="order-box-menu"><h3 class="order-box-mntitle">Menu</h3></div>
			<div class="order-box-menu-left">
				<?php
				foreach ($menu_restoran->result_array() as $row_menu_restoran){  	  			
				?>
				<div class="order-box-row">
					<div class="order-box-rowpic"><img src="<?=$base?>/img/menu_thumb/<?=$row_menu_restoran['cImageThumb']?>" class="rounded" width="118px"></div>
					<div class="order-box-rowdesc">
						<span class="title-menu-list"><?=$row_menu_restoran['cNama']?></span>
						<div class="order-price"><?=$row_menu_restoran['iHarga']?></div>
						<!--<a href="" class="btnorder">Order</a>	-->
					</div>				
				</div>
				<div class="order-box-addchart" data-id="menu">
					<div class="order-qty">
						Jumlah Pesan &nbsp;
						<input type="text" value="1" class="input-qty" id="qty<?=$row_menu_restoran['id']?>" onkeypress="return isNumericKey(event);">&nbsp;&nbsp;
						<input type="text" placeholder=" Any Special Request? "  class="input-specialreq" id="specialreq<?=$row_menu_restoran['id']?>">&nbsp;&nbsp;
						<a href="JavaScript:void(0);" id='<?=$row_menu_restoran['id']?>' class="btnorder">Add to Chart</a>
					</div>
				</div>
				<?php
				}
				?>			
				<div class="order-box-padd">&nbsp;</div>	
			</div>
			<div class="order-box-menu-right">
				<form method="post" name="order">
				<div class="order-box-total">
				<h3 class="order-mytitle">My Order</h3>
				<div class="order-box-delivery">
					<div class="box-delivery-text">
						<div class="delivery-text-row">
							<div class="delivery-text-pickup"><input type="radio" class="radiopick" name="del_option" value="1" id="del_option1" checked>Delivery to me</div>
							<div class="delivery-text-date" id="datetimedeliv">
								<input type="text" class="input-date" value="<?=date('d-m-Y H:i')?>" id="datetimedelivval"> 
								<!--<input type="text" id="date-hour2" class="input-hour" value="0000" alt="time">-->
							</div>
						</div>					
						<div class="delivery-text-row">
							<div class="delivery-text-pickup"><input type="radio" class="radiopick" name="del_option" value="2" id="del_option2">Pick up</div>
							<div class="delivery-text-date" id="datetimepick">
								<input type="text" id="datetimepickval" class="input-date" value=""> 
								<!--<input type="text" id="date-hour1" value="0000" alt="time" class="input-hour">-->
							</div>
						</div>						
					</div>
				</div>
				<div class="padd7">&nbsp;</div>

				<div class="order-box-items">
					<div align="center" id="loading" style="display:none;margin-top:50px;"></div>
					<!------posisi mulai refresh order------------------>
					<div class="box-delivery-text" id="build_order">
						<h3 class="order-myitem">My Items</h3>
						<div class="padd7 borderorange">&nbsp;</div>
						<div class="order-myitem-row" id="row<?=$menu_order->id?>">
							<div class="order-myitem-col5 ">10</div>
							<div class="order-myitem-col6 "><?=$menu_order->cNama?></div>
							<div class="order-myitem-col4 ">Rp</div>
							<div class="order-myitem-col2 "><input type="text" readonly class="currency myitem-price " name="total1" id="total1" value="<?=$menu_order->iHarga?>"></div>
							<div class="order-myitem-col3 ">
								<a href="JavaScript:void(0);">
								<img src="<?=$base?>/img/delete.png" style="cursor:pointer" onclick="delete_row(this.id, <?=$charge?>, '<?=$restoran->cStatusAntar?>')" id="<?=$menu_order->id?>">
								</a>
							</div>
						</div>
						
						<div class="order-myitem-row">
							<div class="order-myitem-col1 orange">Subtotal</div>
							<div class="order-myitem-col4 orange">Rp</div>
							<div class="order-myitem-col2 orange"><input type="text" readonly class="currency myitem-price orange" name="subtotal" id="subtotal" value="0"></div>
							<div class="order-myitem-col3 orange">&nbsp;</div>
						</div>
						<?php
							if ($restoran->cStatusTax=='Y')
							{
						?>
						<div class="order-myitem-row">
							<div class="order-myitem-col1">Tax</div>
							<div class="order-myitem-col4">Rp</div>
							<div class="order-myitem-col2"><input type="text" readonly class="currency myitem-price" name="tax" id="tax" value="0"></div>
							<div class="order-myitem-col3">&nbsp;</div>
						</div>
						<?php
							}
						?>
						<div class="order-myitem-row">
							<div class="order-myitem-col1">Delivery Cost</div>
							<div class="order-myitem-col4">Rp</div>
							<div class="order-myitem-col2">							
							<input type="text" readonly class="currency myitem-price" name="delivery" id="delivery" value="<?=$charge?>">							
							</div>
							<div class="order-myitem-col3">&nbsp;</div>
						</div>
						<div class="order-myitem-row">
							<div class="order-myitem-col1 orange">Total</div>
							<div class="order-myitem-col4 orange">Rp</div>
							<div class="order-myitem-col2 orange">
							<input type="text" readonly class="currency myitem-price orange" name="ttotal" 
							<?php
								if ($restoran->cStatusTax=='Y')	{
							?>							
							id="ttotal" 
							<?php
							}
							else{
							?>
							id="ttotalnotax" 
							<?php
							}
							?>
							value="0">
							</div>
							<div class="order-myitem-col3 orange">&nbsp;</div>
						</div>	
						<?php
						if ($restoran->cStatusAntar=='Y'){
						?>					
						<div class="order-myitem-row">
							<div class="order-myitem-col1">Untuk free delivery</div>
							<div class="order-myitem-col4">Rp</div>							
							<div class="order-myitem-col2">
								<input type="text" readonly class="currency myitem-price" name="remain" id="remain" value="0">							
							</div>
							<div class="order-myitem-col3">-</div>	
						</div>
						<?php
						}
						?>
						<div class="padd25">&nbsp;</div>
						<div class="option-payment">
							<select class="options-list-payment" id="optionspayment">							
								<option> Payment Method </option>
								<?php
								foreach ($payment_method->result_array() as $row_payment_method){  	  			
								?>
								<option value="<?=$row_payment_method['id']?>"><?=$row_payment_method['cPayment']?></option>
								<?
								}
								?>
							</select>
						</div>
						<div class="padd7">&nbsp;</div>
						<div class="box-voucher"><input type="text" class="input-voucher" placeholder=" Voucher Code "></div>
						<div id="checking"></div>
						<div class="checkout">
						<!--<a href="<?=$base?>/index.php/home/check_out" class="btncheckout" id="btncheckout">Check Out</a>-->
						<input type="submit" name="btncheckout" id="btncheckout" value="Check Out">
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
		var del_charge=<?=$charge?>;
		var dateToday = '<?=date('d-m-Y H:i')?>';
		var a='del_option1';
		var cDeliStatus = '<?=$restoran->cStatusAntar?>';

		$(".box-voucher").hide();
		//$("#build_order").show();
		//$('#optionspayment').hide();
		$('#datetimepickval').attr('disabled', true);			
		$('#date-hour1').attr('disabled', true);				
			
		$('.currency').each(function(){
			$(this).val(currency_format2(getNum($(this).val())));
		});
				
		sumtotal();				
		del_option(a);
		$("#date-hour1").setMask();
		
		$("#date-hour2").setMask();
		
		$("#optionspayment").selectbox();
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
							
		$('#datetimepickval').datetimepicker({dateFormat: "d-mm-yy",changeYear: false,minDate:dateToday,
					changeMonth: false });	
		$('#datetimedelivval').datetimepicker({dateFormat: "d-mm-yy",changeYear: false,minDate:dateToday,
					changeMonth: false });									
					
		$('.options-list-payment').change(function(){
			var payment = $('#optionspayment option:selected').text();
			if (payment=="Voucher"){
				$(".box-voucher").show();
			}
			else{
				$(".box-voucher").hide();
			}
			//alert(payment);
		});

		$('.input-voucher').keyup(function(){
			if ($('.input-voucher'))
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
		
		//$('#menu1 a').click(function() {
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
			a = $(this).attr('id');
			if (a=='del_option1'){
				$('#datetimepickval').val('');
				$('#datetimedelivval').val(dateToday);
			}	
			else{
				$('#datetimedelivval').val('');
				$('#datetimepickval').val(dateToday);
			}
			del_option(a);			
		});
		
		function del_option(y){
			$("#loading").show();
			$("#loading").fadeIn(1500).html("<img src='<?=$base?>/img/ajax-loader.gif'>");
			$("#build_order").hide();
			if(y=='del_option2'){
				$("#delivery").val('0');
				$('#datetimedelivval').attr('disabled', true);			
				$('#date-hour2').attr('disabled', true);
				$('#datetimepickval').attr('disabled', false);			
				$('#date-hour1').attr('disabled', false);				
			}
			else if(y=='del_option1'){						
				if(cDeliStatus=='N' || (cDeliStatus=='Y' && getNum($("#remain").val())>0)){
					$("#delivery").val(currency_format2(del_charge)); 
				}
				else if(cDeliStatus=='Y' && getNum($("#remain").val())==0){
					$("#delivery").val('0');
				}
				
				$('#datetimedelivval').attr('disabled', false);
				$('#date-hour2').attr('disabled', false);
				$('#datetimepickval').attr('disabled', true);
				$('#date-hour1').attr('disabled', true);
			}
			sumtotal();
			$("#loading").hide();
			$("#build_order").show();
			//alert(y);
		}
		
		function order(x){
			//var url = $(this).attr('href');
			var j=$('#qty'+x).val(); //jumlah pesanan
			var k=$('#'+a).val(); //type delivery					
			var req=$('#specialreq'+x).val(); //keterangan tambahan
			$("#loading").show();
			$("#loading").fadeIn(1500).html("<img src='<?=$base?>/img/ajax-loader.gif'>");
			$("#build_order").hide();
			$.ajax({
				type: "POST",
				url: "<?=$base?>/index.php/home/add_order",
				data: "id="+x+"&j="+j+"&req="+req+"&type="+k,
				success: function(html){				
					$("#build_order").empty();
					$("#build_order").append(html);	
					$("#loading").hide();
					$("#build_order").show();		
					alert(x+" "+j+" "+req+ " " +k);
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
	
	function delete_o(id){
		$.ajax({
			type: "POST",
			url: "<?=$base?>/index.php/home/delete_order",
			data: "id="+id,
			success: function(html){							
				//alert(html); 	
			}
		});
	};						


	/*
    function order(id){
		//$('#menu a').click(function() {
		//var url = $(this).attr('href');		
		//$("#loading").show();
		//$("#loading").fadeIn(1500).html("<img src='<?=$base?>/img/ajax-loader.gif'>");
		//$("#build_order").hide();		
		$.ajax({
			   type: "POST",
			   url: "<?=$base?>/index.php/home/add_order",
			   data: "id="+id,
			   success: function(html){
					$("#build_order").empty();
					$("#build_order").append(html);	
			   }
		});
		
		$.ajax({
			type: "POST",
			url: "<?=$base?>/index.php/home/add_order",
			data: "id="+id,
			success: function(html){				
	            $("#build_order").empty();
    	        $("#build_order").append(html);	
				$("#loading").hide();
				$("#build_order").show();
			}
		});		
		
		//$('#build_order').load(url);
		//return false;
	}
	*/
</script>   