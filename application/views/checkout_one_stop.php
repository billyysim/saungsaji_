<script type="text/javascript">
	function toggle(value){
		if(value=='show') { document.getElementById('test').style.display='block'; }
		   else { document.getElementById('test').style.display='none'; }
	}
</script>   
<?php
	function Hari($tanggal){
		$hari = date('Y-m-d',strtotime($tanggal));
		return($hari);
	}
	
	function NamaHari($hari){
		switch($hari){
			case "Sunday": $hari = "Minggu";break;
			case "Monday": $hari = "Senin";break;
			case "Tuesday": $hari = "Selasa";break;
			case "Wednesday": $hari = "Rabu";break;
			case "Thursday": $hari = "Kamis";break;
			case "Friday": $hari = "Jumat";break;
			case "Saturday": $hari = "Sabtu";break;
		}
		return($hari);
	}
	
	$tanggal = date('l', strtotime(str_replace('-','/', $order_temp->dJamTerima)));
	
	$Hari = NamaHari($tanggal);
?>
	<div id="content">
		<ul class="tab-menu">
			<li>Build Order</li>
			<li class="active">Check Out</li>
			<li>Finish</li>
		</ul>
		<div class="border-tab-menu paddmenus">
			<div class="checkout-title">Checkout Information</div>
			<div class="checkout-title-resto">@ <?=$order_temp->cNama?></div>
			<div class="checkbox-row">
				<div class="checkout-detail bold pink">Item</div>
				<div class="checkout-detail-col bold orange">Harga per Item (Rp)</div>
				<div class="checkout-detail-col bold pink">Disc (%)</div>
				<div class="checkout-detail-col bold orange">Jumlah</div>
				<div class="checkout-detail-col bold pink">Total Item (Rp)</div>
				<div class="checkout-detail-col bold orange">Keterangan</div>

			</div>
			<?php
				$subtotal=0;
				foreach ($order_check_out->result_array() as $row_order_check_out){
					if($row_order_check_out['iDiskon']>0)
						$diskon=$row_order_check_out['iDiskon']/100;
					else
						$diskon=1;																
					/*
					$diskon=1;
					foreach ($menu_diskon->result_array() as $row_menu_diskon){
						if($row_order_check_out['iMenuId']==$row_menu_diskon['iMenuId']){
							if(date('Y-m-d',strtotime($row_menu_diskon['dStartBerlaku']))<=date('Y-m-d',strtotime($order_temp->dTglOrder))){
								if(date('Y-m-d',strtotime($row_menu_diskon['dEndBerlaku']))>=date('Y-m-d',strtotime($order_temp->dTglOrder))){
									$diskon = $row_menu_diskon['iDiskon']/100;
								}									
							}
						}
					}
					*/
					$subtotal=$subtotal + ($row_order_check_out['iJumlah']*$row_order_check_out['iHarga']*$diskon);				
					if ($diskon<1)
						$disc=number_format($diskon*100,0,",",".")." %";
					else
						$disc="";
			?>
			<div class="checkbox-row" id="row1">
				<div class="checkout-detail"><?=$row_order_check_out['cNama']?></div>
				<div class="checkout-detail-col">
					<input type="text" readonly class="currency input-price" name="harga" id="harga" value="<?=number_format($row_order_check_out['iHarga'],0,",",".")?>">
				</div>
				<div class="checkout-detail-col"><?=$disc?></div>
				<div class="checkout-detail-col"><?=$row_order_check_out['iJumlah']?></div>				
				<div class="checkout-detail-col"><input type="text" readonly class="currency input-price" name="total1" id="total1" value="<?=number_format($row_order_check_out['iJumlah']*$row_order_check_out['iHarga']*$diskon,0,",",".")?>"></div>
				<div class="checkout-detail-col"><?=$row_order_check_out['cDesc']?></div>
			</div>
			<?php
				}
			?>		
			<div class="paddtotal"></div>
			<div class="checkbox-row">
				<div class="checkout-detail_">Subtotal</div>
				<div class="checkout-detail-col"></div>
				<div class="checkout-detail-col"></div>
				<div class="checkout-detail-col"></div>
				<div class="checkout-detail-col"><input type="text" readonly class="currency input-price" name="subtotal" id="subtotal" value="<?=number_format($subtotal,0,",",".")?>"></div>
				<div class="checkout-detail-col"></div>
			</div>
			<div class="checkbox-row">
				<div class="checkout-detail_">PPN</div>
				<div class="checkout-detail-col"></div>
				<div class="checkout-detail-col"></div>
				<div class="checkout-detail-col"></div>
				<div class="checkout-detail-col"><input type="text" readonly class="currency input-price" name="tax" id="tax" value="<?=number_format($order_temp->iTax,0,",",".")?>"></div>
				<div class="checkout-detail-col"></div>
			</div>
			<div class="checkbox-row">
				<div class="checkout-detail_">Jasa Layanan</div>
				<div class="checkout-detail-col"></div>
				<div class="checkout-detail-col"></div>
				<div class="checkout-detail-col"></div>
				<div class="checkout-detail-col"><input type="text" readonly class="currency input-price" name="delivery" id="delivery" value="<?=number_format($order_temp->iBiayaAntar,0,",",".")?>"></div>
				<div class="checkout-detail-col"></div>
			</div>
			<div class="paddtotal"></div>
			
			<div class="checkbox-row">
				<div class="checkout-detail_">TOTAL BIAYA</div>
				<div class="checkout-detail-col"></div>
				<div class="checkout-detail-col"></div>				
				<div class="checkout-detail-col"></div>
				<div class="checkout-detail-col"><input type="text" readonly class="currency input-price" name="ttotal" id="ttotal" value="<?=number_format($subtotal+$order_temp->iTax+$order_temp->iBiayaAntar,0,",",".")?>"></div>
				<div class="checkout-detail-col"></div>
			</div>
			<?php
			$nominal=0;
			if($order_temp->cVoucherCode != ""){
				$nominal=$order_temp->iNominal;
			?>
			<div class="checkbox-row">
				<div class="checkout-detail_">Voucher ( <?=strtoupper($order_temp->cVoucherCode);?> )</div>
				<div class="checkout-detail-col"></div>
				<div class="checkout-detail-col"></div>
				<div class="checkout-detail-col"></div>
				<div class="checkout-detail-col"><input type="text" readonly class="currency input-price" name="tvoucher" id="tvoucher" value="<?=number_format($nominal,0,",",".")?>"></div>
				<div class="checkout-detail-col"></div>
			</div>
			<?
			}			
			?>
			<?php
			if ($subtotal+$order_temp->iTax+$order_temp->iBiayaAntar-$nominal>0)
				$total_payment=$subtotal+$order_temp->iTax+$order_temp->iBiayaAntar-$nominal;
			else
				$total_payment=0;
			?>
			<div class="checkbox-row">
				<div class="checkout-detail_">TOTAL PEMBAYARAN</div>
				<div class="checkout-detail-col"></div>
				<div class="checkout-detail-col"></div>
				<div class="checkout-detail-col"></div>
				<div class="checkout-detail-col"><input type="text" readonly class="currency input-price" name="ttotalpayment" id="ttotalpayment" value="<?=number_format($total_payment,0,",",".")?>"></div>
				<div class="checkout-detail-col"></div>
			</div>
			<br>
			<div class="checkbox-row">
				<div class="checkout-payment">Nama</div>
				<div class="checkout-detail-padd">:</div>
				<div class="checkout-detail-payment"><?=$user_profile->cNama?></div>
			</div>
			<div class="padd7"></div>
			<div class="checkbox-row">
				<div class="checkout-payment">Email</div>
				<div class="checkout-detail-padd">:</div>
				<div class="checkout-detail-payment"><?=$user_profile->cEmail?></div>
			</div>
			<div class="padd7"></div>
			<div class="checkbox-row">
				<div class="checkout-payment">HP</div>
				<div class="checkout-detail-padd">:</div>
				<div class="checkout-detail-payment"><?=$user_profile->cHp?></div>
			</div>
			<div class="padd7"></div>
			<div class="checkbox-row">
				<div class="checkout-payment">Telp</div>
				<div class="checkout-detail-padd">:</div>
				<div class="checkout-detail-payment"><?=$user_profile->cTelp?></div>
			</div>
			<div class="padd7"></div>
			<div class="checkbox-row">
				<div class="checkout-payment">Cara Pembayaran</div>
				<div class="checkout-detail-padd">:</div>
				<div class="checkout-detail-payment"><?=$order_temp->cPayment?></div>
			</div>
			<div class="padd7"></div>
			<div class="checkbox-row">
				<div class="checkout-payment">Waktu Terima</div>
				<div class="checkout-detail-padd">:</div>
				<div class="checkout-detail-payment">
					<?php
					if($order_temp->cJenisTerimaMakanan==1)
						echo "Waktu Depan - ";
					else if($order_temp->cJenisTerimaMakanan==2)
						echo "Secepatnya - ";
					?>
					<?=$Hari?>, <?=date('d-m-Y H:i',strtotime($order_temp->dJamTerima));?>
				</div>
			</div>
			<div class="padd20"></div>
			<?php
			if($order_temp->cJenisTerimaMakanan==1){
			?>
				<strong>Alamat Pengantaran</strong>
				<div class="padd7"></div>
				<div class="checkbox-row">					
					<div class="checkout-address"><?=$user_profile->cAlamat?></div>								
				</div>
				<div class="padd20"></div>
			<?php
			}
			?>
			<?php
			if ($order_temp->cDesc!=""){			
			?>
			<strong>Info Pemesanan</strong>			
			<div class="padd7"></div>
			<div class="checkbox-row">
				<div class="checkout-info-add"><?=$order_temp->cDesc?></div>
			</div>
			<div class="padd20"></div>
			<?php
			}
			?>			
			<div class="checkbox-row-button">
				<form method="post"><input type="submit" name="btnsubmit_" id="btnsubmit" value="Finish" class="btn-style"></form>
			</div>
		</div>
	</div>
</div>

