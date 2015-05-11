
<div id="content-right">
	<h2>User</h2>
	<table class="view-form">
		<tr>
			<td class="label">Nama</td>
			<td colspan="2"><?=$users->cNama?></td>
		</tr>
		<tr>
			<td class="label">Email</td>
			<td colspan="2"><?=$users->cEmail?></td>
		</tr>
		<tr>
			<td class="label">HP</td>
			<td colspan="2"><?=$users->cHp?></td>
		</tr>
		<tr>
			<td class="label">Telp</td>
			<td colspan="2"><?=$users->cTelp?></td>
		</tr>
		<tr>
			<td class="label">Alamat Antar</td>
			<td colspan="2"><?=$users->cAlamat?> - <?=$users->cNamaWilayah?></td>
		</tr>
		<!--
		<tr>
			<td class="label">User Cash Balance</td>
			<td>250.000</td>
			<td class="actions">
			<a href="admin-historical-topup.html">Historical Top Up</a>
			</td>
		</tr>
		-->
		<tr>
			<td class="label">Point</td>
			<td><?=number_format($users_point,0,",",".")?></td>
			<td class="actions">
			<a href="admin-historical-getpoin.html">Historical Get Poin</a>
			<a href="admin-historical-redeempoint.html">Historical Reedem Poin</a>
			</td>
		</tr>
		<tr>
			<td class="label">Total Order</td>
			<td>Rp 456.000</td>
			<td class="actions">
			<a href="admin-historical-order.html">Historical Order</a>
			</td>
		</tr>
	</table>
</div>
