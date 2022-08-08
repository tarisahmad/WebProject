<?php
// Mendefinisikan file akan diekspor ke format excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file yang akan diekspor
header("Content-Disposition: attachment; filename=Riwayat Akses Ruangan ".date('d-m-Y H.i').".xls");

?>

<!-- Riwayat Akses Ruangan [Awal] -->
<table border="1">
	<tr>
		<th>No.</th>
		<th>ID peminjam</th>
		<th>Nama peminjam</th>
		<th>Nama Ruangan</th>
		<th>Buka Akses</th>
		<th>Tutup Akses</th>
		<th>Status<br />Akses</th>
	</tr>
	
	<?php if(empty($tb)): ?>
	<tr>
		<td align="center" colspan="6">Tidak ada data akses ruangan.</td>
	</tr>
 	<?php endif; ?>

	<?php $no = 1; foreach ($tb as $baris): ?>
	<tr>
		<td align="center"><?php echo $no; ?></td>
		<td align="center"><?php echo $baris['id_peminjaman']; ?></td>
		<td align="center"><?php echo $baris['peminjam']; ?></td>
		<td align="center"><?php echo $baris['ruangan_dipinjam']; ?></td>
		<td align="center"><?php echo $baris['waktu_penyetujuan']; ?></td>
		<td align="center"><?php echo $baris['waktu_pengembalian']; ?></td>
		</td>
		<td align="center"><?php echo $baris['status_pinjam']; ?></td>
	</tr>
	<?php $no++; endforeach; ?>
</table>
<!-- Riwayat Akses Ruangan [Akhir] -->