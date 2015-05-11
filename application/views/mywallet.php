	<div id="content">
		<div class="myprofile-title">My Wallet</div>
		<div class="padd-borderorange"></div>
		<ul class="tab-menu">
			<li class="active">Ballance</li>
			<li><a href="<?=$base?>/index.php/home/mywallet_t">Transaction</a></li>
		</ul>
		<div class="border-tab-menu paddmenu-wallet">
			<div class="mywallet-left">
				<div class="mywallet-title">Ballance</div>
				<div class="mywallet-btn-balance">Rp 				
	            <?php
				$subtotal=0;
				$diskon=1;
				foreach ($order_detail->result_array() as $row_order_detail){
					foreach ($menu_diskon->result_array() as $row_menu_diskon){
						if($row_order_detail['iMenuId']==$row_menu_diskon['iMenuId']){
							if(date('Y-m-d',strtotime($row_menu_diskon['dStartBerlaku']))<=date('Y-m-d',strtotime($row_order_detail['dTglOrder']))){
								if(date('Y-m-d',strtotime($row_menu_diskon['dEndBerlaku']))>=date('Y-m-d',strtotime($row_order_detail['dTglOrder']))){
									$diskon = $row_menu_diskon['iDiskon']/100;
								}						
							}
						}
					}
					$subtotal=$subtotal + ($row_order_detail['iJumlah']*$row_order_detail['iHarga']*$diskon);
				}
				if($order_header){
					$tax=$order_header->iTax;
					$biaya_antar=$order_header->iBiayaAntar;
					$nominal=$order_header->iNominal;
				}
				else{
					$tax=0;
					$biaya_antar=0;
					$nominal=0;
				}
				if($wallet)
					echo number_format($wallet->wallet-$tax-$biaya_antar+$nominal-$subtotal,0,",",".");
				else echo "0";
				?></div>
			</div>
			<div class="mywallet-right">
				<div class="mywallet-title">Top Up</div>
				<div class="mywallet-box-topup">
				<div class="message red"><?=$msg?></div>
				<!--<div class="padd35">&nbsp;</div>-->
				<form name="top_up" method="post">
					<div class="checkbox-row">
						<div class="topup-label">Bank Tujuan</div>
						<div class="topup-input">
							<select class="options-list" id="optionsmenu2" name="rek_comp">
								<?php
								foreach ($bank_company->result_array() as $row_bank_company){  	  			
								?>
								<option value="<?=$row_bank_company['cChildCode']?>-<?=$row_bank_company['cValue']?>"><?=$row_bank_company['cChildCode']?> - <?=$row_bank_company['cValue']?></option>
								<?php
								}
								?>								
							</select>
						</div>
					</div>
					<div class="checkbox-row">
						<div class="topup-label">Tanggal Transfer</div>
						<div class="topup-input">
							<input type="text" class="topup-input-text" id="inputdate" name="input_date">							
						</div>
						<div class="topup-input red"><?=form_error('input_date')?></div>
					</div>
					<div class="checkbox-row">
						<div class="topup-label">Dikirim dari Bank</div>
						<div class="topup-input">
							<input type="text" class="topup-input-text" name="rek_from">							
						</div>
						<div class="topup-input red"><?=form_error('rek_from')?></div>
					</div>
					<div class="checkbox-row">
						<div class="topup-label">No Account Pengirim</div>
						<div class="topup-input">
							<input type="text" class="topup-input-text" name="acc_from">							
						</div>
						<div class="topup-input red"><?=form_error('acc_from')?></div>
					</div>
					<div class="checkbox-row">
						<div class="topup-label">Pemilik Account</div>
						<div class="topup-input">
							<input type="text" class="topup-input-text" name="name_from">							
						</div>
						<div class="topup-input red"><?=form_error('name_from')?></div>
					</div>
					<div class="checkbox-row">
						<div class="topup-label">Jumlah</div>
						<div class="topup-input">
							<input type="text" class="topup-input-text" name="jumlah" onkeypress="return isNumericKey(event);" value="0">
						</div>
						<div class="topup-input red"><?=form_error('jumlah')?></div>
					</div>
					<div class="padd7">&nbsp;</div>
					<div class="checkbox-row">
						<div class="topup-label_">&nbsp;</div>
						<div class="topup-input left"><input type="submit" name="submit_top_up" value="Top Up" class="btn-style">
						<!--<a href="#" class="btn">Top Up</a>-->
						</div>
					</div>
				</form>				
				</div>
			</div>
		</div>	
	</div>
</div>
<script>

  $(document).ready(function(){
	$('input[id^="inputdate"]').datepicker({
		dateFormat: "dd-mm-yy",
		changeYear: false,
		changeMonth: false
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