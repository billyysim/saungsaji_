	<div id="content">
		<div class="myprofile-title">My Menu</div>
		<div class="padd-borderorange"></div>
		<ul class="tab-menu">
			<li><a href="<?=$base?>/index.php/r/home/mymenu">Menu</a></li>
			<!--<li><a href="<?=$base?>/index.php/r/home/addmenu">Add Menu</a></li>-->
			<li class="active">Promo</li>
			<!--<li><a href="<?=$base?>/index.php/r/home/addpromo">Add Promo</a></li>-->
		</ul>
		<div class="border-tab-menu paddmenus">
			<div class="checkbox-row">
				<div class="mymenu-th-no bold middle">No</div>
				<div class="mymenu-th-menu bold center pink middle">Nama Menu</div>
				<div class="mymenu-th-total bold center middle">Diskon</div>
				<div class="mymenu-th-menu bold center pink middle">Waktu Berlaku</div>
				<!--
				<div class="mymenu-th-status bold center">Status</div>
				<div class="mymenu-th-action center">&nbsp;</div>
				-->
			</div>
			<div class="checkbox-row">
				<div class="mymenu-th-no-"></div>
			</div>
			<?php
			if ($menu_diskon->num_rows()>0){
				$no=1;
				foreach ($menu_diskon->result_array() as $row_menu_diskon){				
			?>
			<div class="checkbox-row">
				<div class="mymenu-th-no"><?=$no?></div>
				<div class="mymenu-th-menu left padd10px"><?=$row_menu_diskon['cNama']?></div>
				<div class="mymenu-th-total center padd10px"><?=$row_menu_diskon['iDiskon']?> %</div>
				<div class="mymenu-th-total center"><?=date('d-m-Y',strtotime($row_menu_diskon['dStartBerlaku']))?> s/d <?=date('d-m-Y',strtotime($row_menu_diskon['dEndBerlaku']))?></div>
				<!--
				<div class="mymenu-th-status  padd10px" id="mymenustatus">
				<select class="options-list-status" id="optionsstatus1">
					<option value="Y">Aktif</option>
					<option value="N">Tidak Aktif</option>
				</select>
				</div>
				
				<div class="mymenu-th-action center">
					<a  href="" class="btn-style fancybox">Edit</a>
				</div>
				-->
			</div>			
			<?php
				$no++;
				}  	  
			}
			else{
				echo "Belum ada promo yang dilakukan";
			}			
			?>

		</div>
	</div>
</div>

