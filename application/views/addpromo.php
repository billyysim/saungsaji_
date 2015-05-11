	<div id="content">
		<div class="myprofile-title">My Menu</div>
		<div class="padd-borderorange"></div>
		<ul class="tab-menu">
			<li><a href="<?=$base?>/index.php/r/home/mymenu">Menu</a></li>
			<li><a href="<?=$base?>/index.php/r/home/addmenu">Add Menu</a></li>
			<li><a href="<?=$base?>/index.php/r/home/mypromo">Promo</a></li>
			<li class="active">Add Promo</li>
		</ul>
		<div class="border-tab-menu paddmenus">
			<div class="message">Waktu promo telah ditambahkan</div>			
			<!------>
			<div class="checkbox-row">				
			</div>
			<div class="padd7"></div>			
			<div class="checkbox-row">
				<div class="mymenu-label">Nama Menu</div>
				<div class="mymenu-input">
					<select class="options-list" id="optionsmenu10">
						<option value="1">Nasi Goreng</option>
						<option value="2">Nasi Tim</option>
					</select>
				</div>
			</div>
			<div class="padd7"></div>
			<div class="checkbox-row">
				<div class="mymenu-label">Diskon (%)</div>
				<div class="mymenu-input"><input type="text" class="input-checkout"></div>
			</div>
			<div class="padd7"></div>
			<div class="checkbox-row">
				<div class="mymenu-label">Periode</div>
				<div class="mymenu-input-">
					<input type="text" id="fromDate" class="input myreport-input-date">
				</div>
				<div class="mymenu-label-">s/d</div>
				<div class="mymenu-input">
					<input type="text" id="toDate" class="input myreport-input-date">
				</div>
			</div>
			<div class="padd7"></div>			
			<div class="checkbox-row">
				<div class="mymenu-label"></div>
				<div class="mymenu-input"><input type="submit" class="btn-style" value="submit" ></div>
			</div>		
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
					$("#fromDate" ).datepicker( "option", "maxDate", selectedDate );
				}
			});	
   });			  
</script>
