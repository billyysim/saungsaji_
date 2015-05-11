			<div id="content-right">
				<h2>Recent Order <span style="font-size:13px;"> - Order Detail</span></h2>				
				<table class="view-form">
					<tr>
						<td class="actions" style="border:0px">
						<a href="<?=$base?>/index.php/report_print/invoice_transaction/<?=$row_order->id?>" target="_blank">Print Invoice</a>
						</td>
						<td class="actions" style="border:0px">
						<a href="<?=$base?>/index.php/report_print/invoice_transaction_new/<?=$row_order->id?>" target="_blank">Print Invoice New</a>
						</td>
					</tr>
				</table>	
				<table class="view-form">
					<tr>
						<td class="label">No Invoice</td>
						<td colspan="2">#
							<?php
							echo $row_order->id."-".date('Ymd',strtotime($row_order->dTglOrder));
							?>
						</td>
					</tr>
					<tr>
						<td class="label">Nama Customer</td>
						<td colspan="2">
							<?php
							if ($row_order->cNamaCust=="")
								echo $row_order->cNamaOneCust;
							else
								echo $row_order->cNamaCust;
							?>
						</td>
					</tr>
					<tr>
						<td class="label">Email</td>
						<td colspan="2">
						<?php
							if ($row_order->cEmailCust=="")
								echo $row_order->cEmailOneCust;
							else
								echo $row_order->cEmailCust;
							?>
						
						</td>
					</tr>
					<tr>
						<td class="label">HP</td>
						<td colspan="2">
						<?php
							if ($row_order->cHpCust=="")
								echo $row_order->cHPOneCust;
							else
								echo $row_order->cHpCust;
							?>
						</td>
					</tr>
					<tr>
						<td class="label">Telp</td>
						<td colspan="2">
						<?php
							if ($row_order->cTelpCust=="")
								echo $row_order->cTelpOneCust;
							else
								echo $row_order->cTelpCust;
							?>
						</td>
					</tr>
					<tr>
						<td class="label">Alamat</td>
						<td colspan="2">
						<?php
							if ($row_order->cNamaOneCust!="")
								echo $row_order->cAlamatOneCust;
							else{
								if($row_order->iJenisLokasiAntar==1)
									echo $row_order->cAlamatCust." - ".$row_order->cWilayahCust;
								elseif ($row_order->iJenisLokasiAntar==2)
									echo $row_order->cAlamatAntar;
							}
							?>
						</td>
					</tr>		
					<tr>
						<td class="label">Cara Pembayaran</td>
						<td colspan="2">
						<?php
							echo $row_order->cPayment;
						?>
						</td>
					</tr>	
					<tr>
						<td class="label">Tanggal Order</td>
						<td colspan="2">
						<?php
							echo $row_order->dTglOrder;
						?>
						</td>
					</tr>						
					<tr>
						<td class="label">Waktu Terima</td>
						<td colspan="2">
						<?php
							echo $row_order->dJamTerima;
						?>
						</td>
					</tr>							
					<tr>
						<td class="label">Keterangan</td>
						<td colspan="2"><?=$row_order->cDesc?></td>
					</tr>									
				</table>
				<div class="title-restauran"><?=$row_order->cNama?></div>
				<table class="view-form">
					<tr>
						<th>Menu</th>
						<th>Harga</th>
						<th>Disc (%)</th>
						<th>Jumlah</th>
						<th>Total</th>
						<th>Keterangan</th>
					</tr>										
					<?php
					$total=0;
					foreach ($order_details->result_array() as $row_order_details){
						if($row_order_details['iDiskon']>0)
							$diskon=$row_order_details['iDiskon']/100;
						else
							$diskon=1;
						
						$total=$total + ($row_order_details['iJumlah']*$row_order_details['iHarga']*$diskon);
					?>
					<tr>
						<td><?=$row_order_details['cNama']?></td>
						<td style="text-align:right"><?=number_format($row_order_details['iHarga'],0,",",".")?></td>
						<td style="text-align:right"><?=$row_order_details['iDiskon']?> %</td>
						<td style="text-align:right"><?=number_format($row_order_details['iJumlah'],0,",",".")?></td>
						<td style="text-align:right"><?=number_format($row_order_details['iHarga']*$row_order_details['iJumlah']*$diskon,0,",",".")?></td>
						<td><?=$row_order_details['cDesc']?></td>
					</tr>					
					<?php
					}
					?>
					<tr>
						<th colspan=4>Subtotal</th>
						<th style="text-align:right"><?=number_format($total,0,",",".")?></th>
						<th></th>
					</tr>					
					<tr>
						<td colspan=4>PPN</td>
						<td style="text-align:right"><?=number_format($row_order->iTax,0,",",".")?></td>
						<td></td>
					</tr>
					<tr>
						<td colspan=4>Jasa Layanan</td>
						<td style="text-align:right"><?=number_format($row_order->iBiayaAntar,0,",",".")?></td>
						<td></td>
					</tr>	
					<tr>
						<th colspan=4>TOTAL BIAYA</th>
						<th style="text-align:right"><?=number_format($total+$row_order->iTax+$row_order->iBiayaAntar,0,",",".")?></th>
						<th></th>
					</tr>
					<tr>
						<?php
						if($row_order->cVoucherCode)
							$voucher="( ".$row_order->cVoucherCode." )";
						else
							$voucher="( - )";
						?>					
						<td colspan=4>Voucher <?=$voucher?></td>
						<td style="text-align:right"><?=number_format($row_order->iNominal,0,",",".")?></td>
						<td></td>
					</tr>									
					<tr>
						<th colspan=4>TOTAL PEMBAYARAN</th>
						<th style="text-align:right"><?=number_format($total+$row_order->iTotal,0,",",".")?></th>
						<th></th>
					</tr>
				</table>
			</div>