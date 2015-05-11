		<?php
		if($order->num_rows()>0){			
			$no=0;
			foreach ($order->result_array() as $row_order){  	  			
				$no++;
				$urut=$no+$row_order['posisi'];
			?>
			<div class="checkbox-row">
				<div class="myorder-th-no"><?=$urut?></div>
				<div class="myorder-th-tgl center">
				<?php
					echo "#".$row_order['id']."-".date("Ymd",strtotime($row_order['dTglOrder']));
				?>
				</div>
				<div class="myorder-th-tgl center">
				<?php
					echo date("d-m-Y",strtotime($row_order['dTglOrder']));
				?>
				</div>
				<div class="myorder-th-place center"><?=$row_order['cNama']?></div>
				<div class="myorder-th-total right margin">
					<?php
					$total=0;
					foreach ($order_details->result_array() as $row_order_details){
						if($row_order['id']==$row_order_details['idOrders']){
							if($row_order_details['iDiskon']>0)
								$diskon=$row_order_details['iDiskon']/100;
							else
								$diskon=1;
							
							/*
							foreach ($menu_diskon->result_array() as $row_menu_diskon){
								if($row_order_details['iMenuId']==$row_menu_diskon['iMenuId']){
									if(date('Y-m-d',strtotime($row_menu_diskon['dStartBerlaku']))<=date('Y-m-d',strtotime($row_order['dTglOrder']))){
										if(date('Y-m-d',strtotime($row_menu_diskon['dEndBerlaku']))>=date('Y-m-d',strtotime($row_order['dTglOrder']))){
											$diskon = $row_menu_diskon['iDiskon']/100;
										}									
									}
								}
							}
							*/
							
							$total=$total + ($row_order_details['iJumlah']*$row_order_details['iHarga']*$diskon);
						}
					}
					if($row_order['iTotal'] + $total>0)
						$total_payment=$row_order['iTotal'] + $total;
					else
						$total_payment=0;
					?>Rp. <?=number_format($total_payment,0,",",".");?>
				</div>
				<div class="myorder-th-status center">
					<?php
					if($row_order['iStatusAntar'] == 1)
						echo "On Progress";
					elseif($row_order['iStatusAntar'] == 2)
						echo "Delivered";
					else
						echo "Canceled";
					?>
				</div>
				<div class="myorder-th-payment center"><?=$row_order['cPayment']?></div>
				<div class="myorder-th-button center">
					<div class='btn-style' onclick='check_detail("<?=$row_order['id'];?>")'>detail</div>
				</div>
			</div>
			<div align="center" id="loading<?=$row_order['id']?>" style="display:none;margin-top:50px;"></div>
			<div class="padd33px paddbottom<?=$row_order['id']?>"><div id="refresh<?=$row_order['id']?>"></div></div>
			<?php
			}
		}
		else{
			echo "<div style='margin-top:10px;'>Belum ada order</div>";
		}
		?>	