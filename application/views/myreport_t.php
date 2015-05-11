	<div id="content">
		<div class="myprofile-title">My Report</div>
		<div class="padd-borderorange"></div>
		<ul class="tab-menu">
			<li><a href="<?=$base?>/index.php/r/home/myreport">Belum ditarik</a></li>
			<li class="active">Sudah ditarik</li>
		</ul>
		<div class="border-tab-menu paddmenus">
			<div>
				<div class="myreport-col1 col">Dari Tanggal</div>
				<div class="myreport-col2 col"><input type="text" id="fromDate" class="input myreport-input-date"></div>
				<div class="myreport-col3 col">Sampai</div>
				<div class="myreport-col4 col"><input type="text" id="toDate" class="input myreport-input-date"></div>
				<div class="myreport-col5 col"><input type="image" src="<?=$base?>/img/btnsearch.jpg" onclick="report();"></div>
				<div class="myreport-col6 col"></div>
				<div class="myreport-col7 col"></div>
				<div class="myreport-col8 col"><a href="#" class='btn-style'>Print</a></div>
				<div class="myreport-col8 col"></div>
			</div>
			<div class="padd35"></div>
			<div align="center" id="loading" style="display:none;margin-top:10px;"></div>
			<div id="refresh"></div>	
			<!--
			<div class="checkbox-row">
				<div class="mymenu-th-no bold middle">No</div>
				<div class="mymenu-th-menu center pink bold middle">Tanggal</div>
				<div class="mymenu-th-total center bold middle">Penjualan (Rp)</div>
				<div class="mymenu-th-status center pink bold middle">Status Penarikan</div>
				<div class="mymenu-th-action center">&nbsp;</div>
			</div>
			<div class="checkbox-row">
				<div class="mymenu-th-no">1.</div>
				<div class="mymenu-th-menu center padd10px1">01-02-2013</div>
				<div class="mymenu-th-total  right padd10px1">50.000</div>
				<div class="mymenu-th-status center">On Progress</div>
				<div class="mymenu-th-action center">
					<div class='btn-style'>detail</div>	
				</div>
			</div>
			<div class="checkbox-row">
				<div class="mymenu-th-no">2.</div>
				<div class="mymenu-th-menu center padd10px1">01-02-2013</div>
				<div class="mymenu-th-total  right padd10px1">20.000</div>
				<div class="mymenu-th-status center">On Progress</div>
				<div class="mymenu-th-action center">
					<div class='btn-style'>detail</div>	
				</div>
			</div>
			-->
		</div>
	</div>
</div>
<script>
  $(document).ready(function(){
		$('#fromDate').datepicker({
			dateFormat: "dd-mm-yy",
			changeYear: false,
			changeMonth: false,
			onClose: function( selectedDate ){
				$( "#toDate" ).datepicker( "option", "minDate", selectedDate );
			}
		});
		
		$('#toDate').datepicker({
			dateFormat: "dd-mm-yy",changeYear: false,
			changeMonth: false,
			onClose: function( selectedDate ) {
				$( "#fromDate" ).datepicker( "option", "maxDate", selectedDate );
			}
		});		
   });			  

	function report(){
		var from = $('#fromDate').val();
		var to = $('#toDate').val();
		$("#loading").show();
		$("#loading").fadeIn(1500).html("<img src='<?=$base?>/img/ajax-loader.gif'>");
		$("#refresh").hide();		
		$.ajax({
			type: "POST",
			url: "<?=$base?>/index.php/r/home/report/b",
			data: "from="+from+"&to="+to,
			success: function(html){				
				$("#refresh").empty();
				$("#refresh").append(html);	
				$("#loading").hide();
				$("#refresh").show();		
				//alert(x+" "+j+" "+req+ " " +k);
			}
		})		
	};	

   
   	function check_detail(id){
		$("#loading"+id).show();
		$("#loading"+id).fadeIn(1500).html("<img src='<?=$base?>/img/ajax-loader.gif'>");
		$("#refresh"+id).hide();		
		$.ajax({
			type: "POST",
			url: "<?=$base?>/index.php/home/check_detail_order/restoran",
			data: "id="+id,
			success: function(html){				
				$("#loading"+id).hide();
				$("#refresh"+id).empty();
				$("#refresh"+id).append(html);	
				$("#refresh"+id).show();		
			}
		});		
	};			

</script>
