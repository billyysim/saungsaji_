<div id="content-right">
	<h2>Restaurant</h2>
	<div id="filter">
		<div id="label-filter-long" class="tabcel">Nama Restaurant</div>
		<div id="input-filter" class="tabcel"><input name="filter"type="text" class="input-text filter"></div>
		<div id="btn-filter" class="tabcel"><input type="button" value="Cari" class='btn-style'></div>
	</div>
	<div class="div-add"><a href="<?=$base?>/index.php/a/home/add_restorans" class="btn-style">Tambah Restoran</a></div>
	<br>
	<table>
		<tr>
			<th>No</th>
			<th>Restaurant</th>
			<th>Email</th>
			<th>Open / Close</th>
			<th>Status</th>
			<th class="actions"></th>
		</tr>
		<?php
			$no=1;			
			foreach ($resto->result_array() as $row_resto){  	  			
		?>				
		<tr>
			<td><?=$no?></td>
			<td><?=$row_resto['cNama'];?></td>
			<td><?=$row_resto['cEmail'];?></td>
			<td><div class="option-menu tabcel">
				<select class="options-list-admin" id="optionsmenu1">
					<option value="Y" <?php if ($row_resto["cStatusOpen"]=='Y') echo "selected"; ?>>Open</option>
					<option value="N" <?php if ($row_resto["cStatusOpen"]=='N') echo "selected"; ?>>Close</option>
				</select>
			</div></td>
			<td><div class="option-menu tabcel">
				<select class="options-list-admin" id="optionsmenu1">
					<option value="Y" <?php if ($row_resto["cStatus"]=='Y') echo "selected"; ?>>Aktif</option>
					<option value="N" <?php if ($row_resto["cStatus"]=='N') echo "selected"; ?>>Tidak Aktif</option>
				</select> </div>
			</td>
			<td class="actions">
			<a href="<?=$base?>/index.php/a/home/restaurant_detail/<?=$row_resto["id"]?>">detail</a>
			</td>
		</tr>
		<?php
			$no=$no+1;
		}
		?>
	</table>
</div>
