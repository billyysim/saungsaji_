	<div id="content">
		<div class="myprofile-title">My Menu</div>
		<div class="padd-borderorange"></div>
		<ul class="tab-menu">
			<li class="active">Menu</li>
			<!--<li><a href="<?=$base?>/index.php/r/home/addmenu">Add Menu</a></li>-->
			<li><a href="<?=$base?>/index.php/r/home/mypromo">Promo</a></li>
			<!--<li><a href="<?=$base?>/index.php/r/home/addpromo">Add Promo</a></li>-->
		</ul>
		<div class="border-tab-menu paddmenus">
			<div class="checkbox-row">
				<div class="mymenu-th-no bold middle">No</div>
				<div class="mymenu-th-menu bold center pink middle">Gambar</div>
				<div class="mymenu-th-menu bold center middle">Nama Menu</div>
				<div class="mymenu-th-total bold center pink  middle">Harga (Rp)</div>
				<div class="mymenu-th-status bold center middle">Keterangan</div>
				<!--<div class="mymenu-th-action center">&nbsp;</div>-->
			</div>
			<div class="checkbox-row">
				<div class="mymenu-th-no-"></div>
			</div>
			<?php
			if ($menu_restoran->num_rows()>0){
				$no=1;
				foreach ($menu_restoran->result_array() as $row_menu_restoran){				
			?>			
			<div class="checkbox-row">
				<div class="mymenu-th-no"><?=$no?></div>
				<div class="mymenu-th-menu left padd10px top"><img src="<?=$base?>/img/menu_thumb/<?=$row_menu_restoran['cImageThumb']?>" class="rounded" width="170px"></div>
				<div class="mymenu-th-menu left padd10px top"><?=$row_menu_restoran['cNama']?></div>
				<div class="mymenu-th-total right padd10px top"><?=number_format($row_menu_restoran['iHarga'],0,",",".");?></div>
				<div class="mymenu-th-desc  padd10toppx top" id="mymenustatus"><?=$row_menu_restoran['cDesc']?></div>				
				<!--
				<div class="mymenu-th-status  padd10px" id="mymenustatus">
				<select class="options-list-status" id="optionsstatus1">
					<option value="Y">Aktif</option>
					<option value="N">Tidak Aktif</option>
				</select>
				</div>				
				<div class="mymenu-th-action center">
					<a  href="<?=$base?>/index.php/r/home/editmenu" class="btn-style menuimage">Edit</a>
				</div>
				-->
			</div>
			<div class="paddline">&nbsp;</div>		
			<?php
				$no++;
				}  	  
			}
			else{
				echo "Belum ada menu yang ditampilkan";
			}						
			?>
		</div>
	</div>
</div>

