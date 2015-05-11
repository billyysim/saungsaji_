			<div id="content-right">
				<h2>Transaction Report</h2>
				<div id="filter">
					<div id="label-filter-date" class="tabcel">Tanggal</div>
					<div id="input-filter-date" class="tabcel"><input name="filter"type="text" id="fromDate" class="input-text filter-date"></div>
					<div id="label-filter-date2" class="tabcel">Sampai</div>
					<div id="input-filter-date" class="tabcel"><input name="filter"type="text" id="toDate" class="input-text filter-date"></div>					
					<div id="label-filter-date2" class="tabcel"><input type="button" value="Print" class='btn-style' onClick="printReport();"></div>
				</div>				
			</div>
<script type="text/javascript" src="<?=$base?>/js/jquery-ui.js"></script>
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
  
  	function printReport() 
	{
	   var fromDate = $("#fromDate").val();
	   var toDate = $("#toDate").val();
	   if(fromDate=="" || toDate==""){
	   		$("#refresh_").append("Pilih range tanggal laporan yang akan diprint");
	   }
	   else{
		   window.parent.location.href = "<?=$base?>/index.php/report_print/report_all_transaction/" + fromDate + "/" + toDate;
	   }
	}
	
</script>