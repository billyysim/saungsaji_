		<!--------refresh menu------------->
		<?php
		if($menu->num_rows()>0){
		?>
			<ul class="list-food">
				<!--mulai load data-->			
				<?php
				$no=0;	  
				foreach ($menu->result_array() as $row_menu){  	  			
					$no++;
					if($no % 3 <> 0){
				?>
				<li>
					<img src="<?=$base?>/img/menu_thumb/<?=$row_menu['cImageThumb']?>">
					<span class="deskripsi-food">
						<div class="deskripsi-food-text">
							<span class="title"><?=$row_menu['cNama']?></span>
							<div id="price">
								<?=number_format($row_menu['iHarga'],0,',','.');?>
								<?php								
								foreach ($menu_diskon->result_array() as $row_menu_diskon){
									if($row_menu['id']==$row_menu_diskon['iMenuId']){
										if(date('Y-m-d',strtotime($row_menu_diskon['dStartBerlaku']))<=date('Y-m-d')){
											if(date('Y-m-d',strtotime($row_menu_diskon['dEndBerlaku']))>=date('Y-m-d')){
												echo "<span style='font-size:13px;margin-left:5px;font-weight:bold;color:red;'>Off ".$row_menu_diskon['iDiskon'] ." %</span>";
											}						
										}
									}
								}
								?>
							</div>							
							<div id="open">
							<?php
							if ($row_menu['cStatusOpen']=='Y'){
							?>
								<a href="<?=$base?>/index.php/home/cart/<?=str_replace(' ','',$row_menu['cNamaResto']);?>/<?=str_replace(' ','',$row_menu['cNama']);?>" class="menuimage btn-style-order">Order</a>
							<?php
							}
							else{
							?>							
								<a href="<?=$base?>/index.php/home/close" class="popupimage-warning disabled-order">Close</a>								
							<?php
							}
							?>
							</div>							

						</div>
					</span>
				</li>
				<?php
					}
					else{
				?>
				<li class="last">
					<img src="<?=$base?>/img/menu_thumb/<?=$row_menu['cImageThumb']?>"><!-- 275 x 182 -->
					<span class="deskripsi-food">
						<div class="deskripsi-food-text">
							<span class="title"><?=$row_menu['cNama']?></span>
							<div id="price">
								<?=number_format($row_menu['iHarga'],0,',','.');?>
								<?php								
									foreach ($menu_diskon->result_array() as $row_menu_diskon){
										if($row_menu['id']==$row_menu_diskon['iMenuId']){
											if(date('Y-m-d',strtotime($row_menu_diskon['dStartBerlaku']))<=date('Y-m-d')){
												if(date('Y-m-d',strtotime($row_menu_diskon['dEndBerlaku']))>=date('Y-m-d')){
													echo "<span style='font-size:13px;margin-left:5px;font-weight:bold;color:red;'>Off ".$row_menu_diskon['iDiskon'] ." %</span>";
												}						
											}
										}
									}
								?>
							</div>							
							<div id="open">
							<?php
							if ($row_menu['cStatusOpen']=='Y'){
							?>
							<a href="<?=$base?>/index.php/home/cart/<?=str_replace(' ','',$row_menu['cNamaResto']);?>/<?=str_replace(' ','',$row_menu['cNama']);?>" class="menuimage btn-style-order">Order</a>
							<?php
							}
							else{
							?>							
							<a href="<?=$base?>/index.php/home/close" class="popupimage-warning disabled-order">Close</a>								
							<?php
							}
							?>
							</div>
						</div>
					</span>
				</li>			
				<?php				
					}
				}
				?>
				<!--end load data-->
				<li class="clearfix"></li>
			</ul>	
		<?php
		}
		else
			echo "<div style='font-size:13px; text-align:center;margin-bottom:20px;margin-top:20px;'>Maaf, menu makanan yang anda cari tidak ditemukan.</div>"
		?>
		<!------- end of resresh menu-------------->
