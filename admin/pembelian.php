<center>
	<h1><b>DATA TRANSAKSI</b></h1>
</center>
<table class="tabel" id="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Tanggal Pembelian</th>
			<th>Total Pembelian</th>
			<th>Status Belanja</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM pembelian JOIN pengguna ON pembelian. id=pengguna.id order by pembelian.tanggalbeli desc, pembelian.idbeli desc");; ?>
		<?php while ($pecah = $ambil->fetch_assoc()) { ?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $pecah['nama'] ?></td>
				<td><?= tanggal(date('Y-m-d', strtotime($pecah['tanggalbeli']))) ?></td>
				<td>Rp. <?php echo number_format($pecah['totalbeli']) ?></td>
				<td><?php echo $pecah['statusbeli'] ?></td>
				<td>
					<a href="index.php?halaman=pembayaran&id=<?php echo $pecah['idbeli'] ?>" class="tombolkecil">Konfirmasi</a>
					<a href="index.php?halaman=pembelianhapus&id=<?php echo $data['idbeli']; ?>" class="tombolkecilmerah" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">Hapus</a>

				</td>
			</tr>
			<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>