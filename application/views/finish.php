<script type="text/javascript">
    $(document).ready(function() {
        $("#hidden_link").fancybox({
            'type' : 'iframe',
			'maxWidth':650,
			'maxHeight':250,
			'padding':0,
			'margin':20,
			'autoScale'	: true,
			'autoDimensions' : false,
			'scrolling' : false,
			'closeBtn':true,
			'title':false,
			'href':'<?=$base?>/index.php/home/ss_close',
			'iframe': {'scrolling': 'no'}
		}).trigger('click');
    });
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

$tanggal = date('l', strtotime(str_replace('-','/', $order_finish->dJamTerima)));

$Hari = NamaHari($tanggal);

?>
<?php
	$date = date('H:i');//strtotime(date('H:i'));			//waktu sistem sekarang
	
	$open = date('H:i',strtotime($this->session->userdata('open')));	//waktu open saungsaji	
	$close = date('H:i',strtotime($this->session->userdata('close')));	//waktu close saungsaji	
	//$datetime1 = strtotime($waktu);
	//$interval  = abs($datetime1 - $date);	
	//$minutes   = round($interval / 60);					
	//echo $minutes;
	if ($date<$open || $date>$close){
?>
	<div id="hidden_link" style="display:none;"></div>
<?php
	}
?>
	<div id="content">
		<ul class="tab-menu">
			<li>Build Order</li>
			<li>Check Out</li>
			<li class="active">Finish</li>
		</ul>
		<div class="border-tab-menu paddmenus">
			<div class="checkout-title-resto">				
				Terima kasih telah memesan makanan melalui SaungSaji.com				
				<div class="subtitle">Staff kami akan segera menghubungi anda</div>
			</div>			
			<div class="checkout-title-resto">Pesanan Anda</div>
			<div style="font-size:14px;font-weight:bold;margin-bottom:20px;">
				<div>
					<div class='checkout-header'>Nama </div> 
					<div class='checkout-detail'>: <?=strtoupper($order_finish->cNama);?></div>
				</div>
				<div>
					<div class='checkout-header'>Order Invoice </div> 
					<div class='checkout-detail'>: #<?=$order_finish->id?>-<?=date('Ymd',strtotime($order_finish->dTglOrder));?></div>
				</div>
				<div>
					<div class='checkout-header'>Restoran</div> 
					<div class='checkout-detail'>: <?=strtoupper($order_finish->cNamaRestoran);?></div>
				</div>
			</div>
			<div class="checkbox-row">				
				<div class="checkout-detail bold pink">Menu</div>
				<div class="checkout-detail-col bold orange">Harga per Item (Rp)</div>
				<div class="checkout-detail-col bold pink">Disc (%)</div>
				<div class="checkout-detail-col bold orange">Jumlah</div>
				<div class="checkout-detail-col bold pink">Total Item (Rp)</div>
				<div class="checkout-detail-col bold orange">Keterangan</div>

			</div>
			<?php
				$subtotal=0;
				foreach ($finish->result_array() as $row_finish){  	  
					if($row_finish['iDiskon']>0)
						$diskon=$row_finish['iDiskon']/100;
					else
						$diskon=1;											
			
					/*
					$diskon=1;
					foreach ($menu_diskon->result_array() as $row_menu_diskon){
						if($row_finish['iMenuId']==$row_menu_diskon['iMenuId']){
							if(date('Y-m-d',strtotime($row_menu_diskon['dStartBerlaku']))<=date('Y-m-d',strtotime($order_finish->dTglOrder))){
								if(date('Y-m-d',strtotime($row_menu_diskon['dEndBerlaku']))>=date('Y-m-d',strtotime($order_finish->dTglOrder))){
									$diskon = $row_menu_diskon['iDiskon']/100;
								}									
							}
						}
					}					
					*/
					$subtotal=$subtotal + ($row_finish['iJumlah']*$row_finish['iHarga']*$diskon);
					if ($diskon<1)
						$disc=number_format($diskon*100,0,",",".")." %";
					else
						$disc="";
			?>

			<div class="checkbox-row" id="row1">
				<div class="checkout-detail"><?=$row_finish['cNama']?></div>
				<div class="checkout-detail-col">
					<input type="text" readonly class="currency input-price" name="harga" id="harga" value="<?=number_format($row_finish['iHarga'],0,",",".")?>">
				</div>
				<div class="checkout-detail-col"><?=$disc?></div>				
				<div class="checkout-detail-col"><?=number_format($row_finish['iJumlah'],0,",",".")?></div>
				<div class="checkout-detail-col">
					<input type="text" readonly class="currency input-price" name="total1" id="total1" value="<?=number_format($row_finish['iJumlah']*$row_finish['iHarga']*$diskon,0,",",".")?>">
				</div>
				<div class="checkout-detail-col"><?=str_replace('%20',' ',$row_finish['cDesc'])?></div>
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
				<div class="checkout-detail-col"><input type="text" readonly class="currency input-price" name="tax" id="tax" value="<?=number_format($order_finish->iTax,0,",",".")?>"></div>
				<div class="checkout-detail-col"></div>
			</div>
			<div class="checkbox-row">
				<div class="checkout-detail_">Jasa Layanan</div>
				<div class="checkout-detail-col"></div>
				<div class="checkout-detail-col"></div>
				<div class="checkout-detail-col"></div>
				<div class="checkout-detail-col"><input type="text" readonly class="currency input-price" name="delivery" id="delivery" value="<?=number_format($order_finish->iBiayaAntar,0,",",".")?>"></div>
				<div class="checkout-detail-col"></div>
			</div>
			<div class="paddtotal"></div>			
			<div class="checkbox-row">
				<div class="checkout-detail_">TOTAL BIAYA</div>
				<div class="checkout-detail-col"></div>
				<div class="checkout-detail-col"></div>				
				<div class="checkout-detail-col"></div>
				<div class="checkout-detail-col"><input type="text" readonly class="currency input-price" name="ttotal" id="ttotal" value="<?=number_format($subtotal+$order_finish->iTax+$order_finish->iBiayaAntar,0,",",".")?>"></div>
				<div class="checkout-detail-col"></div>
			</div>
			<?php
			$nominal=0;
			if($order_finish->cVoucherCode!=""){
				$nominal=$order_finish->iNominal;
			?>
			<div class="checkbox-row">
				<div class="checkout-detail_">Voucher ( <?=strtoupper($order_finish->cVoucherCode);?> )</div>
				<div class="checkout-detail-col"></div>
				<div class="checkout-detail-col"></div>
				<div class="checkout-detail-col"></div>
				<div class="checkout-detail-col"><input type="text" readonly class="currency input-price" name="tvoucher" id="tvoucher" value="<?=number_format($nominal,0,",",".")?>"></div>
				<div class="checkout-detail-col"></div>
			</div>			
			<?php
			}
			?>
			<?php
			if($subtotal+$order_finish->iTax+$order_finish->iBiayaAntar-$nominal>0)
				$total_payment=$subtotal+$order_finish->iTax+$order_finish->iBiayaAntar-$nominal;
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
			<div class="padd7"></div>
			<div class="checkbox-row">
				<div class="checkout-payment">Email</div>
				<div class="checkout-detail-padd">:</div>
				<div class="checkout-detail-payment"><?=$order_finish->cEmail?></div>
			</div>
			<div class="padd7"></div>
			<div class="checkbox-row">
				<div class="checkout-payment">HP</div>
				<div class="checkout-detail-padd">:</div>
				<div class="checkout-detail-payment"><?=$order_finish->cHp?></div>
			</div>
			<div class="padd7"></div>
			<div class="checkbox-row">
				<div class="checkout-payment">Telp</div>
				<div class="checkout-detail-padd">:</div>
				<div class="checkout-detail-payment"><?=$order_finish->cTelp?></div>
			</div>
			<div class="padd7"></div>
			<div class="checkbox-row">
				<div class="checkout-payment">Cara Pembayaran</div>
				<div class="checkout-detail-padd">:</div>
				<div class="checkout-detail-payment"><?=$order_finish->cPayment?></div>
			</div>
			<div class="padd7"></div>
			<div class="checkbox-row">
				<div class="checkout-payment">Waktu Terima</div>				
				<div class="checkout-detail-padd">:</div>
				<div class="checkout-detail-payment">
				<?php
				if($order_finish->cJenisTerimaMakanan==1)
					echo "Waktu Depan - ";
				else if($order_finish->cJenisTerimaMakanan==2)
					echo "Secepatnya - ";
				?>
				<?=$Hari?>, <?=date('d-m-Y H:i',strtotime($order_finish->dJamTerima));?>
				</div>				
			</div>
			<?php
				if($order_finish->cJenisTerimaMakanan==1){			
			?>
			<br><br>
			<strong>Alamat Pengantaran</strong><br><br>
			<?php
			if($order_finish->idOneStop!="NULL" && $order_finish->idOneStop!="0")
				echo $order_finish->cAlamatOneStop;
			else if($order_finish->idCust!="NULL" && $order_finish->idCust!="0"){
				if ($order_finish->iJenisLokasiAntar==1)
					echo $order_finish->cAlamatCustomer." - ".$order_finish->cNamaWilayah;
				else if ($order_finish->iJenisLokasiAntar==2)
					echo $order_finish->cAlamatAntar;
			}				
			?>			
			<br>
			<?php
				}
			?>
			<br><br>	
			<?php
			if($order_finish->cDesc!=""){
			?>
			<strong>Info tambahan</strong><br><br>
			<?=$order_finish->cDesc;?>
			<?php
			}
			?>
		</div>
	</div>
</div>

