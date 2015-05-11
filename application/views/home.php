<?php
$get_total_rows = $menu->num_rows(); //total records 
$item_per_page=6;
$total_pages = ceil($get_total_rows/$item_per_page); //break total records into pages
?>

<script type="text/javascript">
	$(document).ready(function(){
		var track_click = 0; //track user click on "load more" button, righ now it is 0 click	
		var total_pages = <?php echo $total_pages; ?>;
		var search_='';
		$('#content-menu').load("<?=$base?>/index.php/home/by_page", {'page':track_click}, 
			function(){				
				if(track_click >= total_pages-1)
				{
					//reached end of the page yet? disable load button
					$("#load_more_button").attr("disabled", "disabled");
					$('#load_more_button').addClass('disabled');
				}
				else{
					track_click++;
				}
			}				
		); //initial data to load
		$("#load_more_button").click(function(e){ //user clicks on button	
			$(this).hide(); //hide load more button on click
			$('.animation_image').show(); //show loading image
			if(track_click <= total_pages) //make sure user clicks are still less than total pages
			{
				//var idR = $('.options-list').val();
				var idR = $('#optionsmenu1').val();
				var idW = 0;//$('#optionsmenu3').val();
				var idH = $('#optionsmenu4').val();
				var idM = $('#inputsearch').val();			
				
				//post page number and load returned data into result element
				$.post('<?=$base?>/index.php/home/by_page',{'page': track_click, 'idR': idR, 'idW': idW, 'idH': idH, 'idM': idM}, function(data) {			
					$("#load_more_button").show(); //bring back load more button				
					$("#content-menu").append(data); //append data received from server				
					//scroll page to button element
					$("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);				
					//hide loading image
					$('.animation_image').hide(); //hide loading image once data is received	
					track_click++; //user click increment on load button			
				}).fail(function(xhr, ajaxOptions, thrownError) { 
					alert(thrownError); //alert any HTTP error
					$("#load_more_button").show(); //bring back load more button
					$('.animation_image').hide(); //hide loading image once data is received
				});				
				
				if(track_click >= total_pages-1)
				{
					//reached end of the page yet? disable load button
					$("#load_more_button").attr("disabled", "disabled");
					$('#load_more_button').addClass('disabled');
				}
			 }		  
		});
		
		/*------------------------------------------*/
		/*
		$("#inputsearch" ).autocomplete({
			source: "<?=$base?>/index.php/home/suggestions"
		});		
		*/
		/*------------------------------------------*/
		function page(){ //user clicks on button
			var idR = $('#optionsmenu1').val();			
			var idW = 0;//$('#optionsmenu3').val();			
			var idH = $('#optionsmenu4').val();
			var idM = $('#inputsearch').val();
			//alert(idR);
			
			$.ajax({
				type: "POST",
				url: "<?=$base?>/index.php/home/by_restaurant",
				data: "idR="+idR+"&idW="+idW+"&idH="+idH+"&idM="+idM,				
				success: function(html){							
					total_pages = parseInt(html);
					track_click = 0; //track user click on "load more" button, righ now it is 0 click	
					//alert (total_pages);
					$("#content-menu").empty();
					$("#load_more_button").removeAttr("disabled");
					$('#load_more_button').removeClass('disabled');
					$('#load_more_button').addClass('btn-style');					
					$("#load_more_button").hide(); //hide load more button on click
					$('.animation_image').show(); //show loading image
					if(track_click <= total_pages) //make sure user clicks are still less than total pages
					{
						//post page number and load returned data into result element
						$.post('<?=$base?>/index.php/home/by_page',{'page': track_click, 'idR': idR, 'idW': idW, 'idH': idH, 'idM': idM}, function(data) {			
							$("#load_more_button").show(); //bring back load more button				
							$("#content-menu").append(data); //append data received from server				
							//scroll page to button element
							$("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);				
							//hide loading image
							$('.animation_image').hide(); //hide loading image once data is received	
							track_click++; //user click increment on load button			
						}).fail(function(xhr, ajaxOptions, thrownError) { 
							alert(thrownError); //alert any HTTP error
							$("#load_more_button").show(); //bring back load more button
							$('.animation_image').hide(); //hide loading image once data is received
						});						
						
						if(track_click >= total_pages-1)
						{
							//reached end of the page yet? disable load button
							$("#load_more_button").attr("disabled", "disabled");
							$('#load_more_button').addClass('disabled');
						}
					}		  					
				}
			});						
		};
		
		$('.options-list').change(page);
		//$('#btnsearch').click(page);		
		
		$('#btnsearch').click(function(){
			search_ = $('#inputsearch').val();
			$.ajax({
				type: "POST",
				url: "<?=$base?>/index.php/home/check_search",
				data: "search="+search_,
				success: function(html){
					var result = html;
					if (result.length>0){
						//$("#contentRight").empty();
						//$("#contentRight").append(result);
						page();
					}
					else{
						$("#content-menu").empty();
						$("#content-menu").append("<font class='red'>Inputkan kembali menu yang anda cari</font>");
					}
				}
			});					
		});		
		
		/*------------------------------------------*/
		/*
		$(function(){
			var $sfield = $('#inputsearch').autocomplete({
				source: function(request, response){
					var url = "<?=$base?>/index.php/home/by_name";
					  $.post(url, {data:request.term}, function(data){
						response($.map(data, function(menu) {
							return {
								value: menu.cNama
							};
						}));
					  }, "json");  
				},
				minLength: 1,
				autofocus: true
			});
		});
		

		$(function(){
          	$( "#inputsearch" ).autocomplete({ //the recipient text field with id #username
				source: function( request, response ){
					$.ajax({
						url: "<?=$base?>/index.php/home/by_name",
						dataType: "json",
						data: request,
						success: function(data){
							if(data.response == 'true') {
							   response(data.message);
							}
						}
					});
				}
			});
		});		
		//		
		*/
	});
	/*
	function restoran(){
		var id = $('.options-list').val();
		//$("#loading").show();
		//$("#loading").fadeIn(1500).html("<img src='<?=$base?>/img/ajax-loader.gif' alt='saung saji'>");
		//$("#refresh").hide();
		$.ajax({
			type: "POST",
			url: "<?=$base?>/index.php/home/by_restaurant",
			data: "id="+id,
			success: function(html){				
				//$('head').append( $('<link rel="stylesheet" type="text/css" />').attr('href', '<?=$base?>/css/style.css') );
				$("#contentRight").empty();
				$("#contentRight").append(html);	
				//$("#loading").hide();
				$("#contentRight").show();		
				alert(x+" "+j+" "+req+ " " +k);
			}
		});		
	};
	*/	
</script>
	<!--
	<div id="headerBanner">
		<div id="slider"  class="nivoSlider">
			<img src="<?=$base?>/img/home.jpg" title="<h4 class='title-header'>Makanan favorit anda diantar langsung kedepan pintu anda.</h4>Saung saji adalah tempat untuk memesan makanan secara online dari berbagai jenis restoran">
			<img src="<?=$base?>/img/home2.jpg" title="<h4 class='title-header'>Makanan favorit anda diantar langsung kedepan pintu anda.</h4>Saung saji adalah tempat untuk memesan makanan secara online dari berbagai jenis restoran">
		</div>	
	</div>
	-->
	<br><br>
	<div id="content">
		<div id="contentLeft">
			<div class="active-menu1"><div  class="text-menu" style="color:white">Menu Baru</div></div>			
			<div class="paddmenu">&nbsp;</div>
			<!--<div style='height:68px;'>
				<!--<div class="label-menu-">Waktu layanan : setiap hari, pk. <?=$open_ss->cValue?> - <?=$close_ss->cValue?></div>
				<div class="label-menu-" style="margin-left:35px">
					<div style="height:25px;display:table-cell;vertical-align:middle;"><img src="<?=$base?>/img/phone.png" width="22px;" style="margin:2px"></div>
					<div style="height:25px;display:table-cell;vertical-align:middle;">0741 - 591.2050 </div>
					<div style="height:25px;display:table-cell;vertical-align:middle;"><img src="<?=$base?>/img/bbm-icon.png" width="25px;" style="margin:2px"></div>
					<div style="height:25px;display:table-cell;vertical-align:middle;">54649727</div>
				</div>				
			</div>-->
			<?php
			if($menu_deal->num_rows>0){
			?>
			<div class="option-menu-">
				<div class="label-menu- deal">PROMO hari ini</div>
				<ul class="list-food">
				<!--mulai load data-->			
				<?php
				$no=0;					
					foreach ($menu_deal->result_array() as $row_menu_deal){  	  			
						$no++;
					?>
					<li>
						<img src="<?=$base?>/img/menu_thumb/<?=$row_menu_deal['cImageThumb']?>">
						<span class="deskripsi-food">
							<div class="deskripsi-food-text">
								<span class="title"><?=$row_menu_deal['cNama']?></span>
								<div id="price">
									<strike><?=number_format($row_menu_deal['iHarga'],0,',','.');?></strike>
									<span style='font-size:17px;margin-left:5px;font-weight:bold;color:red;'><?=number_format($row_menu_deal['iHargaDeal'],0,',','.');?></span>									
									<?php								
									//foreach ($menu_diskon->result_array() as $row_menu_diskon){
									//	if($row_menu_deal['id']==$row_menu_diskon['iMenuId']){
									//		if(date('Y-m-d',strtotime($row_menu_diskon['dStartBerlaku']))<=date('Y-m-d')){
									//			if(date('Y-m-d',strtotime($row_menu_diskon['dEndBerlaku']))>=date('Y-m-d')){
									//				echo "<span style='font-size:13px;margin-left:5px;font-weight:bold;color:red;'>Off ".$row_menu_diskon['iDiskon'] ." %</span>";
									//			}						
									//		}
									//	}
									//}
									?>
								</div>							
								<div id="open">
								<?php
								if ($row_menu_deal['cStatusOpen']=='Y'){
								?>
									<a href="<?=$base?>/index.php/home/cart/<?=str_replace(' ','',$row_menu_deal['cNamaResto']);?>/<?=str_replace(' ','',$row_menu_deal['cNama']);?>/deal" class="menuimage btn-style-order">Order</a>
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
				?>
				<!--end load data-->			
				</ul>	
				<div style="clear:both;"></div>	
				<div>
					<div class="label-menu- tos">Syarat dan Ketentuan :</div>		
					<div class="label-menu- tos">- min order Rp. 10.000</div>		
					<div class="label-menu- tos">- hanya untuk HARI INI - 04.05.2015</div>		
				</div>
			</div>
			<?php				
			}
			else{
			?>			
			<div class="option-menu-" style="margin-bottom:180px;">
				<!--<div style="margin-bottom:10px;margin-top:20px;"><img src="<?=$base?>/img/iklan3.jpg" width="300px"></div>-->				
				<div style="margin-bottom:10px;"><img src="<?=$base?>/img/order-steps copy edit.png" width="280px"></div>		
			</div>
			<!--
			<div style="margin-left:20px;">
				<div class="label-menu- tos">Syarat dan Ketentuan :</div>		
				<div class="label-menu- tos">- min order Rp. 10.000</div>		
				<div class="label-menu- tos">- hanya untuk HARI SENIN - 04.05.2015</div>		
			</div>
			-->
			<?php
			}
			?>
			<!--<div class="label-twitter"></div>-->
		</div>
		<!--------refresh menu------------->
		<div id="contentRight">
			<ul class="list-food">
				<?php
				$no=0;	  
				foreach ($menu_new->result_array() as $row_menu_new){  	  			
					$no++;
				?>
				<li>
					<img src="<?=$base?>/img/menu_thumb/<?=$row_menu_new['cImageThumb']?>">
					<span class="deskripsi-food">
						<div class="deskripsi-food-text">
							<span class="title"><?=$row_menu_new['cNama']?></span>
							<div id="price">
								<?=number_format($row_menu_new['iHarga'],0,',','.');?>
								<?php								
								foreach ($menu_diskon->result_array() as $row_menu_diskon){
									if($row_menu_new['id']==$row_menu_diskon['iMenuId']){
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
							if ($row_menu_new['cStatusOpen']=='Y'){
							?>
								<a href="<?=$base?>/index.php/home/cart/<?=str_replace(' ','',$row_menu_new['cNamaResto']);?>/<?=str_replace(' ','',$row_menu_new['cNama']);?>" class="menuimage btn-style-order">Order</a>
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
				?>				
  			</ul>
		</div>	
		<!------- end of resresh menu-------------->
		<div style="margin:25px;font-size:20px;color:#666666">partner kami</div>		
		<div class="box border-orange">
		  <ul class="list-image list-partner" >
			<?php
				$no=0;
				foreach ($restoran->result_array() as $row_get_all_restoran){  	  			
			?>		  
			<li><img src="<?=$base?>/img/resto_thumb/<?=$row_get_all_restoran['cImage']?>" ></li>
			<?php
				$no=$no+1;
			}
			?>
			<?php
				for ($i=0; $i<6-($no%6); $i++){
			?>			
			<li><img src="<?=$base?>/img/resto_thumb/default.png" ></li>
			<?php
			}
			?>
			<div class="clearfix"></div>
		  </ul>
		</div>				
		<!------>
		<div style="margin:25px;font-size:20px;color:#666666">menu lainnya</div>
	    <div class="box border-orange pre" id="content-menu">
			<img src="<?=$base?>/img/ajax-loader.gif" alt="saung saji"/>			
		</div>				
		<div align="center" style="margin-top:10px;">
			<button class="btn-style" id="load_more_button">tampilkan menu lainnya</button>
			<div class="animation_image" style="display:none;"><img src="<?=$base?>/img/ajax-loader.gif" alt="saung saji"/></div>
		</div>
		<!------->
		<!------>
	</div>	
</div>
<!-- end of id container-->