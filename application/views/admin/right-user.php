<div id="content-right">
	<h2>User</h2>
	<div id="filter">
		<div id="label-filter" class="tabcel">Nama User</div>
		<div id="input-filter" class="tabcel"><input name="filter" type="text" class="input-text filter"></div>
		<div id="label-filter" class="tabcel">
			<input type="button" value="Cari" class='btn-style'>
		</div>
	</div>	
	<table cellpadding="10px">
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>HP</th>
			<th>Telp</th>
			<th>Status</th>
			<th class="actions"></th>
		</tr>
		<?php
			$no=1;			
			foreach ($users->result_array() as $row_users){  	  			
		?>				
		<tr>
			<td><?=$no;?></td>
			<td><?=$row_users['cNama']?></td>
			<td><?=$row_users['cEmail']?></td>
			<td><?=$row_users['cHp']?></td>
			<td><?=$row_users['cTelp']?></td>
			<td><div class="option-menu">
				<select class="options-list-admin" id="optionsmenu1">
					<option value="Y" <?php if ($row_users["cStatus"]=='Y') echo "selected"; ?>>Aktif</option>
					<option value="N" <?php if ($row_users["cStatus"]=='N') echo "selected"; ?>>Tidak Aktif</option>
				</select>
			</div></td>
			<td class="actions">
			<a href="<?=$base?>/index.php/a/home/users_detail/<?=$row_users["id"]?>">detail</a>
			</td>
		</tr>
		<?php
			$no=$no+1;
		}
		?>
	</table>
</div>
