Daftar Peminjam Buku Perpustakaan

<div>&nbsp;</div>
<div>&nbsp;</div>


<table width="100%" cellpadding="7">
	<tr>
		<td width="15%">Nama Buku</td>
		<td width="2%">:</td>
		<td><?= $model->idBuku->nama; ?></td>
	</tr>
	<tr>
		<td>Nama Peminjam</td>
		<td>:</td>
		<td><?= $model->idUser->nama; ?></td>
	</tr>	
	<tr>
		<td>Waktu Dipinjam</td>
		<td>:</td>
		<td><?= $model->waktu_dipinjam; ?></td>
	</tr>
	<tr>
		<td>Waktu Pengembalian</td>
		<td>:</td>
		<td><?= $model->waktu_pengembalian; ?></td>
	</tr>
</table>