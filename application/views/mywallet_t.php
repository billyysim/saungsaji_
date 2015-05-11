<?php
$get_total_rows = $mywallet_tr->num_rows(); //total records 
$item_per_page=4;
$total_pages = ceil($get_total_rows/$item_per_page); //break total records into pages
?>

<script type="text/javascript">
	$(document).ready(function(){
		var track_click = 0; //track user click on "load more" button, righ now it is 0 click	
		var total_pages = <?php echo $total_pages; ?>;
		$('#contentOrder').load("<?=$base?>/index.php/home/top_up", {'page': track_click}, function() {track_click++;}); //initial data to load
		$("#load_more_button").click(function(e){ //user clicks on button	
			$(this).hide(); //hide load more button on click
			$('.animation_image').show(); //show loading image
			if(track_click <= total_pages) //make sure user clicks are still less than total pages
			{
				//post page number and load returned data into result element
				$.post('<?=$base?>/index.php/home/top_up',{'page': track_click}, function(data) {			
					$("#load_more_button").show(); //bring back load more button				
					$("#contentOrder").append(data); //append data received from server				
					//scroll page to button element
					$("html, body").animate({scrollTop: $("#load_more_button").offset().top}, 500);				
					//hide loading image
					$('.animation_image').hide(); //hide loading image once data is received	
					track_click++; //user click increment on load button			
				}).fail(function(xhr, ajaxOptions, thrownError){ 
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
		if(total_pages<=1)
		{
			//reached end of the page yet? disable load button
			$("#load_more_button").attr("disabled", "disabled");
			$('#load_more_button').addClass('disabled');
		}		
	});	

</script>   


<div id="content">
	<div class="myprofile-title">My Wallet</div>
	<div class="padd-borderorange"></div>
	<ul class="tab-menu">
		<li><a href="<?=$base?>/index.php/home/mywallet">Ballance</a></li>
		<li class="active">Transaction</li>
	</ul>
	<div class="border-tab-menu paddmenus">
		<div class="checkbox-row">
			<div class="mywallet-th-no bold">No</div>
			<div class="mywallet-th-tgl center orange bold">Tanggal Transfer</div>
			<div class="mywallet-th-bank center bold">Nama Bank</div>
			<div class="mywallet-th-acc center orange bold">No Acc</div>
			<div class="mywallet-th-total center bold">Jumlah Transfer (Rp)</div>
			<div class="mywallet-th-status center orange bold">Status</div>
		</div>		
		<!--begin-->
		<div id="contentOrder">
			<div style="margin-top:20px;"><img src="<?=$base?>/img/ajax-loader.gif" alt="saung saji"/></div>
		</div>
		<!--end-->
		<!--										
		<div class="padd45">&nbsp;</div>
			<div class="paging">
				<span class="prev disabled">&lt; &lt;</span>
				<span class="current">1</span>
				<span><a href="#">2</a></span>
				<span><a href="#">3</a></span>
				<span><a href="#">4</a></span>
				<span><a href="#">5</a></span>
				<span class="next"><a rel="next" href="#">&gt; &gt;</a></span>				
			</div>
		</div>
		-->
	</div>
	<div align="center">
		<br>
		<button class="btn-style" id="load_more_button">load More</button>
		<div class="animation_image" style="display:none;"><img src="<?=$base?>/img/ajax-loader.gif"></div>
	</div>				
</div>
