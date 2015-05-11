		<?php
		if($redeem->num_rows()>0){			
			$no=0;
			foreach ($redeem->result_array() as $row_redeem){  	  			
				$no++;
				$urut=$no+$row_redeem['posisi'];
			?>
			<div class="checkbox-row">
				<div class="mywallet-th-no"><?=$urut?></div>
				<div class="mywallet-th-tgl center "><?=date('d-m-Y',strtotime($row_redeem['dTglRedeem']))?></div>
				<div class="mywallet-th-bank center"><?=$row_redeem['iPoin']?></div>
				<div class="mywallet-th-acc_  center "><?=$row_redeem['cNama']?></div>
				<div class="mywallet-th-bank center"><?=$row_redeem['cCode']?></div>
				<div class="mywallet-th-acc_ center"><?=date('d-m-Y',strtotime($row_redeem['dEndBerlaku']))?></div>				
			</div>
			<?php
			}
		}
		else{
			echo "<div style='margin-top:10px;'>Belum ada penukaran poin</div>";
		}
		?>	