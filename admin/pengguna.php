<center>
	<h1><b>DATA AKUN MEMBER</b></h1>
</center>
<table class="tabel" id="table">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama</th>
			<th>Email</th>
			<th>Telepon</th>
			<th>Aksi</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM pengguna where level='Pelanggan'"); ?>
		<?php while ($pecah = $ambil->fetch_assoc()) { ?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $pecah['nama'] ?></td>
				<td><?php echo $pecah['email'] ?></td>
				<td><?php echo $pecah['telepon'] ?></td>
				<td>
					<a href="index.php?halaman=hapuspengguna&id=<?php echo $pecah['id'] ?>" class="tombolkecilmerah" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">Hapus</a>

				</td>
			</tr>
			<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>