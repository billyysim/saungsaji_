	<div id="content">
		<div class="myprofile-title">My Menu</div>
		<div class="padd-borderorange"></div>
		<ul class="tab-menu">
			<li><a href="<?=$base?>/index.php/r/home/mymenu">Menu</a></li>
			<li class="active">Add Menu</li>
			<li><a href="<?=$base?>/index.php/r/home/mypromo">Promo</a></li>
			<li><a href="<?=$base?>/index.php/r/home/addpromo">Add Promo</a></li>
		</ul>
		<div class="border-tab-menu paddmenus">
			<div class="message">Menu makanan telah ditambahkan</div>			
			<!------>
			<div class="checkbox-row">				
				<div class="mymenu-label-img-1">					
					<div class="mymenu-img-">
						<div id="output" >
							<img src="<?=$base?>/img/menu_thumb/default.png" class="rounded">
						</div>
					</div>
				</div>				
				<div class="mymenu-input-img">
					<!-------->						
					<div id="upload-wrapper">
						<div >
							<form method="post" enctype="multipart/form-data" id="MyUploadForm" action="<?=$base?>/processupload.php">
								<input name="image_file" id="imageInput" type="file" />
								<div class="padd7"></div>							
								<input type="submit"  value="Upload" class="btn-style" name="submit_logo" id="submit-btn"/>
								<img src="<?=$base?>/img/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
							</form>
						</div>
					</div>						
					<!-------->
				</div>
			</div>
			<div class="padd7"></div>			
			<div class="checkbox-row">
				<div class="mymenu-label">Nama Menu</div>
				<div class="mymenu-input"><input type="text" class="input-checkout"></div>
			</div>
			<div class="padd7"></div>
			<div class="checkbox-row">
				<div class="mymenu-label">Harga</div>
				<div class="mymenu-input"><input type="text" class="input-checkout"></div>
			</div>
			<div class="padd7"></div>
			<div class="checkbox-row">
				<div class="mymenu-label">Description</div>
				<div class="mymenu-input"><textarea class="textarea-checkout"></textarea></div>
			</div>
			<div class="padd7"></div>
			<div class="checkbox-row">
				<div class="mymenu-label"></div>
				<div class="mymenu-input"><input type="submit" class="btn-style" value="submit" ></div>
			</div>			
		</div>
	</div>
</div>

