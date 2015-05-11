			<div id="content-right">
				<h2>Transaction Report <span style="font-size:13px;"> - <?=$resto->cNama?></span></h2>
				<div id="filter">
					<div id="label-filter-date" class="tabcel">Tanggal</div>
					<div id="input-filter-date" class="tabcel"><input name="filter"type="text" id="fromDate" class="input-text filter-date"></div>
					<div id="label-filter-date2" class="tabcel">Sampai</div>
					<div id="input-filter-date" class="tabcel"><input name="filter"type="text" id="toDate" class="input-text filter-date"></div>
					<div id="label-filter-date2" class="tabcel"><input type="button" value="Cari" class='btn-style'></div>
					<div id="label-filter-date2" class="tabcel"><input type="button" value="Print" class='btn-style' onClick="printReport();"></div>
				</div>
				
				<table>
					<tr>
						<th>No</th>
						<th>Tanggal</th>
						<th>Total</th>
						<th>Status Bayar</th>
						<th class="actions"></th>
					</tr>
					<tr>
						<td>1</td>
						<td>21-09-2013</td>
						<td class="currency">27.000</td>
						<td>On Progress</td>
						<td class="actions">
						<a href="admin-rest-trans-det.html" id="detail">detail</a>
						</td>
					</tr>
					<tr>
						<td>2</td>
						<td>11-09-2013</td>
						<td class="currency">150.000</td>
						<td>Delivered</td>
						<td class="actions">
						<a href="admin-rest-trans-det.html" id="detail">detail</a>
						</td>
					</tr>
				</table>
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

		$("#detail").fancybox({
            'type' : 'iframe',
			'maxWidth':400,
			'maxHeight':230,
			'padding'		: 0,
			'margin':20,
			'autoScale'		: true,
			'autoDimensions' : false,
			'scrolling' : false,
			'closeBtn':true,
			'title':false,
			'iframe': {'scrolling': 'no'}
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
		   window.parent.location.href = "<?=$base?>/index.php/report_print/report_transaction/" + fromDate + "/" + toDate + "/" + <?=$resto->id?>;
	   }
	}
	
</script>