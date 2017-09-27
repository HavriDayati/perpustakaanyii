Daftar Buku Perpustakaan

<div>&nbsp;</div>
<div>&nbsp;</div>


<table width="100%" cellpadding="7">
	<tr>
		<td width="15%">Nama Buku</td>
		<td width="2%">:</td>
		<td><?= $model->nama; ?></td>
	</tr>
	<tr>
		<td>Jenis Buku</td>
		<td>:</td>
		<td><?= $model->idJenis->nama; ?></td>
	</tr>	
	<tr>
		<td>Penulis</td>
		<td>:</td>
		<td><?= $model->idPenulis->nama; ?></td>
	</tr>
</table>