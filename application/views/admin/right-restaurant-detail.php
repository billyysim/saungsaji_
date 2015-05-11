			<div id="content-right">
				<h2>Restaurant <span style="font-size:13px;"> - Restaurant Detail</span></h2>				
				<table class="view-form">
					<tr>
						<td class="actions" style="border:0px">
						<a href="change-password.html" class="changepwd">Change Password</a>
						<a href="admin-restaurant-menu.html">Menu</a>
						<a href="<?=$base?>/index.php/a/home/restaurant_transaction/<?=$resto->id?>">Transaction Report</a>
						</td>
					</tr>
				</table>	
				<table class="view-form">
					<tr>
						<td class="label">Nama Restoran</td>
						<td colspan="2"><?=$resto->cNama?></td>
					</tr>
					<tr>
						<td class="label">Email</td>
						<td colspan="2"><?=$resto->cEmail?></td>
					</tr>
					<tr>
						<td class="label">HP</td>
						<td colspan="2"><?=$resto->cHp?></td>
					</tr>
					<tr>
						<td class="label">Telp</td>
						<td colspan="2"><?=$resto->cTelp?></td>
					</tr>
					<tr>
						<td class="label">Min. Order</td>
						<td colspan="2"><?=$resto->iMinOrder?></td>
					</tr>
					<tr>
						<td class="label">Delivery Time</td>
						<td colspan="2"><?=$resto->iDeliveryTime?> Menit</td>
					</tr>
					<tr>
						<td class="label">Biaya Antar</td>
						<td colspan="2"><?=$resto->iCharge?></td>
					</tr>
					<tr>
						<td class="label">Ada Pajak</td>
						<td colspan="2"><?=$resto->cStatusTax?></td>
					</tr>
					<tr>
						<td class="label">Wilayah Antar</td>
						<td colspan="2">
							<?php
							foreach ($pengantaran->result_array() as $row_pengantaran){
								echo $row_pengantaran['cWilayah'].", ";
							}
							?>
						</td>
					</tr>
					<tr>
						<td class="label">Keterangan</td>
						<td colspan="2"><?=$resto->cDescription?></td>
					</tr>					
				</table>
				<div class="title-restauran">Alamat</div>
				<table class="view-form">
					<?php
					$no=1;
					foreach ($alamat->result_array() as $row_alamat){
					?>
					<tr>
						<td class="label">Alamat <?=$no;?></td>
						<td colspan="2"><?=$row_alamat['cAlamat'];?></td>
					</tr>					
					<?php
						$no=$no+1;
					}
					?>
				</table>
				<div class="title-restauran">Opening Hours :</div>
				<table class="view-form">
					<?php
					foreach ($opening->result_array() as $row_opening){
					?>
					<tr>
						<td class="label"><?=$row_opening['cHari']?></td>
						<td colspan="2"><?=$row_opening['dOpenHour']?> - <?=$row_opening['dCloseHour']?></td>
					</tr>
					<?php
					}
					?>
				</table>
			</div>
