<?php
session_start();
include 'koneksi.php';
?>
<?php include 'header.php'; ?>
<div class="kontainer">
	<div class="row mb-3 mt-5 pb-3">
		<div class="kolom-md-12 judulsection animasikontainer">
			<h3 class="mb-4 text-tengah">Keranjang</h3>
		</div>
	</div>
</div>
<div class="kontainer">
	<div class="row">
		<div class="kolom-md-12 animasikontainer">
			<div class="cart-list">
				<table class="tabel">
					<thead class="thead-white">
						<tr class="text-tengah">
							<th>No</th>
							<th>Produk</th>
							<th>Foto Produk</th>
							<th>Harga</th>
							<th>Jumlah Beli</th>
							<th>Total Harga</th>
							<th>Aksi</th>
						</tr>
					</thead>
					<tbody>
						<?php $nomor = 1; ?>
						<?php if (!empty($_SESSION["keranjang"])) { ?>
							<?php foreach ($_SESSION["keranjang"] as $idproduk => $jumlah) : ?>
								<?php
								$ambil = $koneksi->query("SELECT * FROM produk 
								WHERE idproduk='$idproduk'");
								$pecah = $ambil->fetch_assoc();
								$totalharga = $pecah["hargaproduk"] * $jumlah;
								?>
								<tr class="text-tengah">
									<td><?php echo $nomor; ?></td>
									<td><?php echo $pecah['namaproduk']; ?></td>
									<td class="image-prod">
										<img src="foto/<?php echo $pecah["fotoproduk"] ?>" width="150px" style="border-radius: 10px">
									</td>
									<td>Rp <?php echo number_format($pecah['hargaproduk']); ?></td>
									<td><?php echo $jumlah; ?></td>
									<td>Rp <?php echo number_format($totalharga); ?></td>
									<td>
										<a href="hapuskeranjang.php?id=<?php echo $idproduk ?>" class="tombolkecil">Hapus</a>
									</td>
								</tr>
								<?php $nomor++; ?>
						<?php endforeach;
						} ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<br><br>
	<div class="row">
		<a href="produk.php" class="tombol">Lanjutkan Belanja</a>
		&nbsp;<a href="checkout.php" class="tombol">Checkout</a>
	</div>
</div>
<div style="padding-top:200px"></div>
<?php
include 'footer.php';
?>