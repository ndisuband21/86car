<center>
	<h1><b>DATA KATEGORI</b></h1>
</center>
<a href="index.php?halaman=tambahkategori" class="tombolkecil kanan">Tambah Kategori</a>
<div class="w3-section w3-padding-16">
	<table class="tabel" id="table">
		<thead class="bg-primary text-white">
			<tr>
				<th>No</th>
				<th>Kategori</th>
				<th>Aksi</th>
			</tr>
		</thead>
		<tbody>
			<?php $nomor = 1; ?>
			<?php $ambil = $koneksi->query("SELECT * FROM kategori"); ?>
			<?php while ($data = $ambil->fetch_assoc()) { ?>
				<tr>
					<td><?php echo $nomor ?></td>
					<td><?php echo $data["nama_kategori"] ?></td>
					<td>
						<a href="index.php?halaman=ubahkategori&id=<?php echo $data['id_kategori']; ?>" class="tombolkecil">Ubah</a>
						<a href="index.php?halaman=hapuskategori&id=<?php echo $data['id_kategori']; ?>" class="tombolkecilmerah" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">Hapus</a>
					</td>
				</tr>
				<?php $nomor++; ?>
			<?php } ?>
		</tbody>
	</table>
</div>