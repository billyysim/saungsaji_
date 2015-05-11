	<div id="content">
		<div class="myprofile-title">My Transaction</div>
		<div class="padd-borderorange"></div>
		<ul class="tab-menu">
			<li class="active">Transaction</li>
		</ul>
		<div class="border-tab-menu paddmenus">
			<div>
				<div class="myreport-col1 col">Dari Tanggal</div>
				<div class="myreport-col2 col"><input type="text" id="fromDate" class="input myreport-input-date" name="fromDate"></div>
				<div class="myreport-col3 col">Sampai</div>
				<div class="myreport-col4 col"><input type="text" id="toDate" class="input myreport-input-date" name="toDate"></div>
				<div class="myreport-col5 col"><input type="image" src="<?=$base?>/img/btnsearch.jpg" name="search" onclick="report();"></div>
				<div class="myreport-col6 col"></div>
				<div class="myreport-col7 col"></div>
				<div class="myreport-col8 col"></div>
				<div class="myreport-col8 col"><input type="button" value="Print" class='btn-style' onClick="printReport();"></div>
			</div>
			<div class="padd35"></div>			
			<div align="center" id="loading" style="display:none;margin-top:10px;"></div>
			<div id="refresh"></div>	
			<div id="refresh_"></div>
		</div>
	</div>
</div>
<script>
  $(document).ready(function(){
		$('#fromDate').datepicker({
			dateFormat: "dd-mm-yy",
			changeYear: false,
			changeMonth: false,
			onClose: function( selectedDate ) {
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
		$("#refresh_").empty();
		$.ajax({
			type: "POST",
			url: "<?=$base?>/index.php/r/home/report",
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
	
	function printReport() 
	{
	   var fromDate = $("#fromDate").val();
	   var toDate = $("#toDate").val();
	   if(fromDate=="" || toDate==""){
			$("#refresh").empty();
	   		$("#refresh").append("Pilih range tanggal laporan yang akan diprint");
	   }
	   else{
		   window.parent.location.href = "<?=$base?>/index.php/report_print/report_transaction/" + fromDate + "/" + toDate;
	   }
	}

</script>
