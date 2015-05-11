<?php
$get_total_rows = $menu->num_rows(); //total records 
$item_per_page=4;
//break total records into pages
$total_pages = ceil($get_total_rows/$item_per_page);	
?>

<script type="text/javascript">
$(document).ready(function() {

	var track_click = 0; //track user click on "load more" button, righ now it is 0 click
	
	var total_pages = <?php echo $total_pages; ?>;
	$('#contentRight').load("<?=$base?>/index.php/home/by_restoran", {'page':track_click}, function() {track_click++;}); //initial data to load

	$(".load_more").click(function (e) { //user clicks on button
	
		$(this).hide(); //hide load more button on click
		$('.animation_image').show(); //show loading image

		if(track_click <= total_pages) //make sure user clicks are still less than total pages
		{
			//post page number and load returned data into result element
			$.post('<?=$base?>/index.php/home/by_restoran',{'page': track_click}, function(data) {
			
				$(".load_more").show(); //bring back load more button
				
				$("#contentRight").append(data); //append data received from server
				
				//scroll page to button element
				$("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);
				
				//hide loading image
				$('.animation_image').hide(); //hide loading image once data is received
	
				track_click++; //user click increment on load button
			
			}).fail(function(xhr, ajaxOptions, thrownError) { 
				alert(thrownError); //alert any HTTP error
				$(".load_more").show(); //bring back load more button
				$('.animation_image').hide(); //hide loading image once data is received
			});
			
			
			if(track_click >= total_pages-1)
			{
				//reached end of the page yet? disable load button
				$(".load_more").attr("disabled", "disabled");
			}
		 }
		  
		});
});
</script>
	<!--
	<div id="headerBanner">
		<div id="slider"  class="nivoSlider">
			<img src="<?=$base?>/img/home.jpg" title="<h4 class='title-header'>Makanan favorit anda diantar langsung kedepan pintu anda.</h4>Saung saji adalah tempat untuk memesan makanan secara online dari berbagai jenis restoran">
			<img src="<?=$base?>/img/home2.jpg" title="<h4 class='title-header'>Makanan favorit anda diantar langsung kedepan pintu anda.</h4>Saung saji adalah tempat untuk memesan makanan secara online dari berbagai jenis restoran">
		</div>	
	</div>
	-->
	<div id="content">
		<div id="search">
			<div class="searchText">Cari Menu</div>
			<div class="boxsearch"><input type="text" class="inputsearch"></div>
			<div class="btnsearch"><img src="<?=$base?>/img/btnsearch.gif" id="btnsearch"></div>
		</div>
		<div id="contentLeft">
			<div class="active-menu1"><div  class="text-menu"><a href="">Menu</a></div></div>
			<div class="paddmenu">&nbsp;</div>
			<div class="active-menu2"><div  class="text-menu"><a href="">Deal</a></div></div>
			<div class="paddmenu2">&nbsp;</div>
			<div class="label-menu">Restoran</div>
			<div class="option-menu">
				<select class="options-list" id="optionsmenu1" onchange="restoran();">
					<option value="0">- All Restoran -</option>
					<?php
					foreach ($restoran->result_array() as $row_get_all_restoran){  	  			
					?>
						<option value="<?=$row_get_all_restoran['id']?>"><?=$row_get_all_restoran['cNama']?></option>
					<?php
					}
					?>
				</select>
			</div>
			<!--
			<div class="label-menu">Jenis Menu</div>
			<div class="option-menu">
				<select class="options-list" id="optionsmenu2">
					<option></option>
				</select>
			</div>
			-->
			<div class="label-menu">Wilayah Antar</div>
			<div class="option-menu">
				<select class="options-list" id="optionsmenu3">
					<option value="0">- All Wilayah -</option>
					<?php
					foreach ($wilayah->result_array() as $row_get_all_wilayah){  	  			
					?>
						<option value="<?=$row_get_all_wilayah['id']?>"><?=$row_get_all_wilayah['cWilayah']?></option>
					<?php
					}
					?>
				</select>
			</div>
			<div class="label-menu">Harga</div>
			<div class="option-menu">
				<select class="options-list" id="optionsmenu4">
					<option value="0">- All Harga -</option>
					<?php
					foreach ($harga->result_array() as $row_get_all_harga){  	  			
					?>
						<option value="<?=$row_get_all_harga['id']?>">
							<?=number_format($row_get_all_harga['iStartHarga'],0,",",".")?> - <?=number_format($row_get_all_harga['iEndHarga'],0,",",".")?>
						</option>
					<?php
					}
					?>
				</select>			
				<!--<input type="text" data-slider-range="0,200" data-slider-step="10" data-slider="true">-->				
			</div>
		</div>
		<!--------refresh menu------------->
		<div id="contentRight">
			<!--mulai load data-->			
			<ul class="list-food">
			</ul>	
			<!--end load data-->
			<!--
			<div class="paging">
				<span class="prev disabled">&lt; &lt;</span>
				<span class="current">1</span>
				<span><a href="#">2</a></span>
				<span><a href="#">3</a></span>
				<span><a href="#">4</a></span>
				<span><a href="#">5</a></span>
				<span class="next"><a rel="next" href="#">&gt; &gt;</a></span>				
			</div>
			-->
		</div>	
		<!------- end of resresh menu-------------->
		<div align="center" style="margin-left:170px;">
			<button class="load_more" id="load_more_button">load More</button>
			<div class="animation_image" style="display:none;"><img src="<?=$base?>/img/ajax-loader.gif"> Loading...</div>
		</div>
	</div>	
</div>
<!-- end of id container-->
<script type="text/javascript">
	function restoran(){
		var id = $('.options-list').val();
		$("#loading").show();
		$("#loading").fadeIn(1500).html("<img src='<?=$base?>/img/ajax-loader.gif'>");
		$("#refresh").hide();
		$.ajax({
			type: "POST",
			url: "<?=$base?>/index.php/home/by_restoran",
			data: "id="+id,
			success: function(html){				
				//$('head').append( $('<link rel="stylesheet" type="text/css" />').attr('href', '<?=$base?>/css/style.css') );
				$("#contentRight").empty();
				$("#contentRight").append(html);	
				$("#loading").hide();
				$("#contentRight").show();		
				alert(x+" "+j+" "+req+ " " +k);
			}
		});		
	};	
</script>