	<center>
		<h1><b>DATA PRODUK</b></h1>
	</center>
	<a href="index.php?halaman=tambahproduk" class="tombolkecil kanan">Tambah Produk</a>
	<div class="w3-section w3-padding-16">
		<table class="tabel">
			<thead class="bg-primary text-white">
				<tr>
					<th>No</th>
					<th>Nama</th>
					<th>Kategori</th>
					<th>Harga</th>
					<th>Foto</th>
					<th>Stok</th>
					<th>Aksi</th>
				</tr>
			</thead>
			<tbody>
				<?php $nomor = 1; ?>
				<?php $ambil = $koneksi->query("SELECT*FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori"); ?>
				<?php while ($pecah = $ambil->fetch_assoc()) { ?>
					<tr>
						<td><?php echo $nomor; ?></td>
						<td><?php echo $pecah['namaproduk'] ?></td>
						<td><?php echo $pecah['nama_kategori'] ?></td>
						<td><?php echo rupiah($pecah['hargaproduk']) ?></td>
						<td>
							<img src="../foto/<?php echo $pecah['fotoproduk'] ?>" width="100px">
						</td>
						<td><?php echo $pecah['stokproduk'] ?></td>
						<td>
							<a href="index.php?halaman=ubahproduk&id=<?php echo $pecah['idproduk']; ?>" class="tombolkecil">Ubah</a>
							<a href="index.php?halaman=hapusproduk&id=<?php echo $pecah['idproduk']; ?>" class="tombolkecilmerah" onclick="return confirm('Apakah Anda Yakin Ingin Menghapus Data ?')">Hapus</a>
						</td>
					</tr>
					<?php $nomor++; ?>
				<?php } ?>
			</tbody>
		</table>
	</div>