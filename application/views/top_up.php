		<?php
		if($top_up->num_rows()>0){			
			$no=0;
			foreach ($top_up->result_array() as $row_top_up){  	  			
				$no++;
				$urut=$no+$row_top_up['posisi'];
			?>
			<div class="checkbox-row">
				<div class="mywallet-th-no"><?=$urut?></div>
				<div class="mywallet-th-tgl center "><?=date('d-m-Y',strtotime($row_top_up['dTglTransfer']))?></div>
				<div class="mywallet-th-bank center"><?=$row_top_up['cBankUser']?></div>
				<div class="mywallet-th-acc  center "><?=$row_top_up['cRekeningUser']?></div>
				<div class="mywallet-th-total_ right "><?=number_format($row_top_up['iJumlah'],0,",",".");?></div>
				<div class="mywallet-th-status_ center ">
				<?php
				if($row_top_up['cStatusVerified']=='N') 
					echo "On progress";
				else
					echo "Verified";
				?></div>		
			</div>
			<?php
			}
		}
		else{
			echo "<div style='margin-top:10px;'>Belum ada top up</div>";
		}
		?>	