
	<div id="content">
		<div class="myprofile-title">My Profile
		</div>		
		<div class="padd-borderorange"></div>
		<div class="message red"><?=$msg?></div>
		<div class="myprofile-left">
			<div>
				<div class="mymenu-label-img-">					
					<div class="mymenu-img-">
					<div id="output" >
					<?php 
					if ($resto_profile->cImage==""){
					?>
					<img src="<?=$base?>/img/resto_thumb/default.png" class="rounded">
					<?php
					}
					else{
					?>
					<img src="<?=$base?>/img/resto_thumb/<?=$resto_profile->cImage?>" class="rounded">
					<?php
					}
					?>
					</div>
					<!--<img src="<?=$base?>/img/resto_thumb/warungtekko.jpg" class="rounded">-->
					</div>
				</div>
				<div class="mymenu-input-profile">
					<div style="padding-bottom:48px">
						<p class="field switch">
							<input type="radio" class="hide" id="open_" name="cDesc" value="Y" r<?php if ($resto_profile->cStatusOpen=="Y") echo "checked"; ?>/>
							<input type="radio" class="hide" id="close_" name="cDesc" value="N" <?php if ($resto_profile->cStatusOpen=="N") echo "checked"; ?>/>
							<label for="open_" class="cb-enable <?php if ($resto_profile->cStatusOpen=="Y") echo "selected"; ?>"><span>Open</span></label>
							<label for="close_" class="cb-disable <?php if ($resto_profile->cStatusOpen=="N") echo "selected"; ?>"><span>Close</span></label>
						</p>
					</div>
					<!--<div style="padding-bottom:25px"><a href="#" class="btn-style">Upload Logo</a></div>-->
					<div style="padding-bottom:25px"><a href="<?=$base?>/index.php/home/change_password" class="btn-style" id="changepwd_link">Change Password</a></div>
					<!-------->
					<div id="upload-wrapper">
						<div >
							<form method="post" enctype="multipart/form-data" id="MyUploadForm" action="<?=$base?>/processupload.php">
								<input name="image_file" id="imageInput" type="file" />
								<input name="id" id="id" type="hidden" value="<?=$this->session->userdata('userID')?>" />
								<div class="padd7"></div>							
								<input type="submit"  value="Upload" class="btn-style" name="submit_logo" id="submit-btn"/>
								<img src="<?=$base?>/img/ajax-loader.gif" id="loading-img" style="display:none;" alt="Please Wait"/>
							</form>
							<!--<div id="output"></div>-->
						</div>
					</div>
					<!-------->
				</div>				
			</div>		
			<form method="post" name="profile">		
			<div >
				<div class="label-myprofile-">Nama Restoran</div>
				<div class="input-myprofile-text"><input type="text" name="name" class="input input-myprofile" value="<?=$resto_profile->cNama?>"></div>
			</div>
			<?php
				if (form_error('name')){
			?>
			<div >
				<div class="label-myprofile-"></div>
				<div class="input-myprofile-text red"><?=form_error('name')?></div>
			</div>
			<?php
				}
			?>
			<!--
			<div>
				<div class="label-myprofile-">Nama Bank</div>
				<div class="input-myprofile-text"><input type="text" class="input input-myprofile" value="<?=$resto_profile->cNama?>"></div>
			</div>
			<div>
				<div class="label-myprofile-">Rekening</div>
				<div class="input-myprofile-text"><input type="text" class="input input-myprofile"></div>
			</div>
			-->			
			<div>
				<div class="label-myprofile-">Email</div>
				<div class="input-myprofile-text"><input type="text" name="email" class="input input-myprofile" value="<?=$resto_profile->cEmail?>"></div>
			</div>
			<?php
				if (form_error('email')){
			?>
			<div >
				<div class="label-myprofile-"></div>
				<div class="input-myprofile-text red"><?=form_error('email')?></div>
			</div>
			<?php
				}
			?>
			<div>
				<div class="label-myprofile-">Handphone</div>
				<div class="input-myprofile-text"><input type="text" name="hp_resto" class="input input-myprofile" value="<?=$resto_profile->cHp?>" onkeypress="return isNumericKey(event);"></div>
			</div>
			<?php
				if (form_error('hp_resto')){
			?>
			<div >
				<div class="label-myprofile-"></div>
				<div class="input-myprofile-text red"><?=form_error('hp_resto')?></div>
			</div>
			<?php
				}
			?>

			<div>
				<div class="label-myprofile-">Telephone</div>
				<div class="input-myprofile-text"><input type="text" name="telp_resto" class="input input-myprofile" value="<?=$resto_profile->cTelp?>" onkeypress="return isNumericKey(event);"></div>
			</div>
			<div>
				<div class="label-myprofile-">Min. Order</div>
				<div class="input-myprofile-text"><input type="text" name="min_order_resto" class="input input-myprofile" value="<?=$resto_profile->iMinOrder?>" onkeypress="return isNumericKey(event);"></div>
			</div>
			<?php
				if (form_error('min_order_resto')){
			?>
			<div >
				<div class="label-myprofile-"></div>
				<div class="input-myprofile-text red"><?=form_error('min_order_resto')?></div>
			</div>
			<?php
				}
			?>

			<!--
			<div>
				<div class="label-myprofile-">Delivery Charge</div>
				<div class="input-myprofile-text"><input type="text" class="input input-myprofile" ></div>
			</div>
			-->
			<div>
				<div class="label-myprofile-">Ada Pajak</div>
				<div class="input-myprofile-text">
					<input type="checkbox" name="tax_resto" value="Y" <?php if ($resto_profile->cStatusTax=="Y") echo "checked"; ?> class="input input-myprofile-1">
				</div>
			</div>
			<div>
				<div class="label-myprofile-">Ada Pengantaran</div>
				<div class="input-myprofile-text">
					<input type="checkbox" name="delivery_resto" value="Y" <?php if ($resto_profile->cStatusAntar=="Y") echo "checked"; ?> class="input input-myprofile-1">
				</div>
			</div>
			<div>
				<div class="label-myprofile-">Description</div>
				<div class="input-myprofile-text">
					<textarea name="desc_resto" class="textarea textarea-myprofile-"><?=$resto_profile->cDescription?></textarea>
				</div>
			</div>	
			<div class="padd25"></div>
			<div>
				<div class="label-myprofile-"></div>
				<div class="input-myprofile-text"> 
				<input type="submit" name="btnprofile" id="btnprofile" value="Submit" class="btn-style">
				</div>
			</div>
			</form>
		</div>
		<div class="myprofile-padd">&nbsp;</div>
		
		<!--<div class="myprofile-right">
			<div class="btnchangepwd left">				
				
			</div>			
		</div>-->
		<div class="padd35"></div>
		<!----->
				<div class="myprofile-title">Opening Hours</div>
				<div class="padd7"></div>
				<?php
					foreach ($opening->result_array() as $row_opening){
				?>
				<div>
					<div class="label-opening-col1 col">-</div>
					<div class="label-opening-col2 col left"><?=$row_opening['cHari']?></div>
					<div class="label-opening-col3 col">
					<p class="field switch">
						<input type="radio" class="hide" id="open-<?=$row_opening['id']?>" name="cDesc" value="Y" checked />
						<input type="radio" class="hide" id="close-<?=$row_opening['id']?>" name="cDesc" value="N" />
						<label for="open-<?=$row_opening['id']?>" class="cb-enable <?php if ($row_opening['cStatus']=="Y") echo "selected"; ?>"><span>Open</span></label>
						<label for="close-<?=$row_opening['id']?>" class="cb-disable <?php if ($row_opening['cStatus']=="N") echo "selected"; ?>"><span>Close</span></label>
					</p>
					</div>
					<div class="label-opening-col4_ col">
						Buka : <input type="text" name="open_<?=$row_opening['cHari']?>_<?=$row_opening['id']?>" <?php if ($row_opening['cStatus']=="N") echo "disabled"; ?> class="input input-myprofile- center" id="open_<?=$row_opening['id']?>" value="<?=$row_opening['dOpenHour']?>">
						Tutup : <input type="text" name="close_<?=$row_opening['cHari']?>_<?=$row_opening['id']?>" <?php if ($row_opening['cStatus']=="N") echo "disabled"; ?> class="input input-myprofile- center" id="close_<?=$row_opening['id']?>" value="<?=$row_opening['dCloseHour']?>">
					</div>
				</div>
				<?php
					}
				?>
				
		<!----->
		<div class="padd35"></div>
		<!----->
		<div class="myprofile-title">Alamat</div>
		<div class="padd7"></div>
			<input type="text" class="input input-myprofile" id="cAddress">&nbsp;		
			<input type="button" class="btn-style" name="add_address" value="tambah alamat" onClick="add_address();">
		<div class="padd7"></div>
		<div id="loading"></div>
		<div id="refresh">
		<?php
			foreach ($alamat->result_array() as $row_alamat){
		?>
		<div>
			<div class="label-myprofile-2">- <?=$row_alamat['cAlamat']?></div>
			<div class="input-myprofile-text">
				<input type="button" class="btn-style" name="del_address" value="hapus" onClick="del_address(<?=$row_alamat['id']?>);">
			</div>			
		</div>
		<?php
			}
		?>
		</div>
		<!----->
		<div class="padd35"></div>
		<!----->		
		<div class="myprofile-title">Wilayah Antar</div>
		<div class="padd7"></div>
		<div class="data-wilayah">
			<select class="options-list" id="optionsmenu10">
				<?php
				foreach ($wilayah->result_array() as $row_get_all_wilayah){  	  			
				?>
					<option value="<?=$row_get_all_wilayah['id']?>"><?=$row_get_all_wilayah['cWilayah']?></option>
				<?php
				}
				?>
			</select>
		</div>
		<div class="data-wilayah">
			<input type="button" class="btn-style" name="add_antar" value="tambah wilayah antar" onClick="add_deli();">
		</div>	
		<div class="padd7"></div>		
		<div id="loading_"></div>
		<div id="refresh_">
		<?php
			foreach ($pengantaran->result_array() as $row_pengantaran){
		?>
		<div>
			<div class="label-myprofile-2">- <?=$row_pengantaran['cWilayah']?></div>
			<div class="input-myprofile-text">
				<input type="button" class="btn-style" name="del_antar" value="hapus" onClick="del_deli(<?=$row_pengantaran['id']?>);">
			</div>			
		</div>
		<?php
			}
		?>
		</div>
		<!----->
	</div>
</div>
<script>
	$(document).ready(function(){		
		$(".cb-enable").click(function(){
				var parent = $(this).parents('.switch');
				$('.cb-disable',parent).removeClass('selected');
				$(this).addClass('selected');
				$('.checkbox',parent).attr('checked', true);
			});
			$(".cb-disable").click(function(){
				var parent = $(this).parents('.switch');
				$('.cb-enable',parent).removeClass('selected');
				$(this).addClass('selected');
				$('.checkbox',parent).attr('checked', false);
			});
		
		$("#changepwd_link").fancybox({
			'type' : 'iframe',
			'maxWidth':430,
			'maxHeight':330,
			'padding'		: 0,
			'margin':20,
			'autoScale'		: true,
			'autoDimensions' : false,
			'scrolling' : false,
			'closeBtn':true,
			'title':false,
			'iframe': {'scrolling': 'no'}
		});
		
		var options = { 
			target: '#output',   // target element(s) to be updated with server response 
			beforeSubmit: beforeSubmit,  // pre-submit callback 
			success: afterSuccess,  // post-submit callback 
			resetForm: true        // reset the form after successful submit 
		};
		
		$('#MyUploadForm').submit(function() { 
			$(this).ajaxSubmit(options);  			
			// always return false to prevent standard browser submit and page navigation 
			return false; 
		});
		/*
		$('input:radio').change(function(){
			var value = $("form input[type='radio']:checked").val();
			alert("Value of Changed Radio is : " +value);
		});
		*/
		
		$('.hide').click(function(){						
			var radio = $('input:radio[name=cDesc]:checked');			
			var id = radio.attr('id');
			var value = $('#'+id).val();
			var idR = <?=$resto_profile->id?>;
			var openh = '';
			var closeh = '';
			
			var splitted = id.split("-");
			if (value=='N'){				
				//alert(splitted[1]);
				$('#open_'+splitted[1]).val('00:00:00');
				openh = $('#open_'+splitted[1]).val();
				$('#open_'+splitted[1]).attr("disabled", "disabled");
				$('#close_'+splitted[1]).val('00:00:00');
				closeh = $('#close_'+splitted[1]).val();
				$('#close_'+splitted[1]).attr("disabled", "disabled");
			}
			else if (value=='Y'){
				$('#open_'+splitted[1]).removeAttr("disabled");
				$('#close_'+splitted[1]).removeAttr("disabled");
			}
			
			$.ajax({
				type: "POST",
				url: "<?=$base?>/index.php/r/home/update_status",
				data: "id="+id+"&value="+value+"&idR="+idR+"&openH="+openh+"&closeH="+closeh,
				success: function(html){
					$(".message").empty();
					$(".message").append(html);	
				}
			});			
					
		});	
		<?php
			foreach ($opening->result_array() as $row_opening){
		?>
		$('#open_<?=$row_opening['id']?>').change(function(){						
			var openH = $('#open_<?=$row_opening['id']?>').val();						
			$.ajax({
				type: "POST",
				url: "<?=$base?>/index.php/r/home/update_openH",
				data: "id="+<?=$row_opening['id']?>+"&openH="+openH,
				success: function(html){
					$(".message").empty();
					$(".message").append(html);	
				}
			});	
		});	
		<?
			}
		?>
		
		<?php
			foreach ($opening->result_array() as $row_opening){
		?>
		$('#close_<?=$row_opening['id']?>').change(function(){						
			var closeH = $('#close_<?=$row_opening['id']?>').val();						
			$.ajax({
				type: "POST",
				url: "<?=$base?>/index.php/r/home/update_closeH",
				data: "id="+<?=$row_opening['id']?>+"&closeH="+closeH,
				success: function(html){
					$(".message").empty();
					$(".message").append(html);	
				}
			});	
		});	
		<?
			}
		?>
		
		<?php
			foreach ($opening->result_array() as $row_opening){
		?>
		$('#open_<?=$row_opening['id']?>').timepicker({			
			timeFormat: "HH:mm:ss",
			changeYear: false,
			changeMonth: false			
		});
		$('#close_<?=$row_opening['id']?>').timepicker({			
			timeFormat: "HH:mm:ss",
			changeYear: false,
			changeMonth: false			
		});
		<?
			}
		?>
		
	});
	
	function afterSuccess()
	{
		$('#submit-btn').show(); //hide submit button
		$('#loading-img').hide(); //hide submit button	
	}

	//function to check file size before uploading.
	function beforeSubmit(){
		//check whether browser fully supports all File API
	   if (window.File && window.FileReader && window.FileList && window.Blob)
		{
			
			if( !$('#imageInput').val()) //check empty input filed
			{
				$("#output").html("Are you kidding me?");
				return false
			}
			
			var fsize = $('#imageInput')[0].files[0].size; //get file size
			var ftype = $('#imageInput')[0].files[0].type; // get file type
			
	
			//allow only valid image file types 
			switch(ftype)
			{
				case 'image/png': case 'image/gif': case 'image/jpeg': case 'image/pjpeg':
					break;
				default:
					$("#output").html("<b>"+ftype+"</b> Unsupported file type!");
					return false
			}
			
			//Allowed file size is less than 1 MB (1048576)
			if(fsize>1048576) 
			{
				$("#output").html("<b>"+bytesToSize(fsize) +"</b> Too big Image file! <br />Please reduce the size of your photo using an image editor.");
				return false
			}
					
			$('#submit-btn').hide(); //hide submit button
			$('#loading-img').show(); //hide submit button
			$("#output").html("");  
		}
		else
		{
			//Output error to older browsers that do not support HTML5 File API
			$("#output").html("Please upgrade your browser, because your current browser lacks some new features we need!");
			return false;
		}
	}

	//function to format bites bit.ly/19yoIPO
	function bytesToSize(bytes) {
	   var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
	   if (bytes == 0) return '0 Bytes';
	   var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
	   return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
	}
	
	function add_address(){	   	
	   	var addr = $("#cAddress").val();
		$("#loading").show();
		$("#loading").fadeIn(1500).html("<img src='<?=$base?>/img/ajax-loader.gif'>");
		$("#refresh").hide();		
		$.ajax({
			type: "POST",
			url: "<?=$base?>/index.php/r/home/add_addr",
			data: "addr="+addr,
			success: function(html){				
				$("#loading").hide();
				$("#refresh").empty();
				$("#refresh").append(html);	
				$("#refresh").show();		
			}
		});		
	};			

	function del_address(id){	   	
		$("#loading").show();
		$("#loading").fadeIn(1500).html("<img src='<?=$base?>/img/ajax-loader.gif'>");
		$("#refresh").hide();		
		$.ajax({
			type: "POST",
			url: "<?=$base?>/index.php/r/home/del_addr",
			data: "id="+id,
			success: function(html){				
				$("#loading").hide();
				$("#refresh").empty();
				$("#refresh").append(html);	
				$("#refresh").show();		
			}
		});		
	};
	
	function add_deli(){	   	
	   	var add_d = $("#optionsmenu10").val();
		$("#loading_").show();
		$("#loading_").fadeIn(1500).html("<img src='<?=$base?>/img/ajax-loader.gif'>");
		$("#refresh_").hide();		
		$.ajax({
			type: "POST",
			url: "<?=$base?>/index.php/r/home/add_deli",
			data: "add_d="+add_d,
			success: function(html){				
				$("#loading_").hide();
				$("#refresh_").empty();
				$("#refresh_").append(html);	
				$("#refresh_").show();		
			}
		});		
	};			

	function del_deli(id){	   	
		$("#loading_").show();
		$("#loading_").fadeIn(1500).html("<img src='<?=$base?>/img/ajax-loader.gif'>");
		$("#refresh_").hide();		
		$.ajax({
			type: "POST",
			url: "<?=$base?>/index.php/r/home/del_deli",
			data: "id="+id,
			success: function(html){				
				$("#loading_").hide();
				$("#refresh_").empty();
				$("#refresh_").append(html);	
				$("#refresh_").show();		
			}
		});		
	};
	
	function isNumericKey(e)
	{
		if (window.event) { var charCode = window.event.keyCode; }
		else if (e) { var charCode = e.which; }
		else { return true; }
		if (charCode > 31 && (charCode < 48 || charCode > 57)) { return false; }
		return true;
	}	  
</script>