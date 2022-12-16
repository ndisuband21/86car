<?php
session_start();
include 'koneksi.php';
if (!isset($_SESSION["pengguna"])) {
	echo "<script> alert('Anda belum login');</script>";
	echo "<script> location ='login.php';</script>";
}
?>

<?php include 'header.php'; ?>
<div class="kontainer">
	<div class="row mb-3 mt-5 pb-3">
		<div class="kolom-md-12 judulsection animasikontainer">
			<h3 class="mb-4 text-tengah">Checkout</h3>
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
							<th>Harga</th>
							<th>Jumlah Beli</th>
							<th>SubHarga</th>
						</tr>
					</thead>
					<tbody>
						<?php $nomor = 1; ?>
						<?php $totalbelanja = 0; ?>
						<?php foreach ($_SESSION["keranjang"] as $idproduk => $jumlah) : ?>
							<?php
							$ambil = $koneksi->query("SELECT * FROM produk 
					WHERE idproduk='$idproduk'");
							$pecah = $ambil->fetch_assoc();
							$totalharga = $pecah["hargaproduk"] * $jumlah;

							?>
							<tr>
								<td><?php echo $nomor; ?></td>
								<td><?php echo $pecah['namaproduk']; ?></td>
								<td>Rp <?php echo number_format($pecah['hargaproduk']); ?></td>
								<td><?php echo $jumlah; ?></td>
								<td>Rp <?php echo number_format($totalharga); ?></td>
							</tr>
							<?php $nomor++; ?>
							<?php $totalbelanja += $totalharga; ?>
						<?php endforeach ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<br><br>
<div class="kontainer mt-4">
	<form method="post">
		<div class="row">
			<div class="kolom-md-12">
				<div class="form-grup">
					<label>Nama</label>
					<input type="text" readonly value="<?php echo $_SESSION["pengguna"]['nama'] ?>" class="bentukform">
				</div>
				<div class="form-grup">
					<label>No. HP</label>
					<input type="text" readonly value="<?php echo $_SESSION["pengguna"]['telepon'] ?>" class="bentukform">
				</div>
				<div class="form-grup">
					<label>Alamat Lengkap</label>
					<textarea class="bentukform" name="alamatpengiriman" placeholder="Masukkan Alamat"></textarea>
				</div>
				<div class="form-grup">
					<label>Kota Pengiriman</label>
					<select name="kota" class="bentukform" required id="Sone" onchange="check()">
						<option value="">Pilih Kota</option>
						<option value="Palembang">Palembang</option>
						<option value="Ogan Ilir">Ogan Ilir</option>
						<option value="Ogan Ulu">Ogan Ulu</option>
						<option value="Sekayu">Sekayu</option>
						<option value="Indralaya">Indralaya</option>
						<option value="Betung">Betung</option>
						<option value="Muara Enim">Muara Enim</option>
						<option value="Lahat">Lahat</option>
					</select>
				</div>
				<input type="hidden" id="dua" name="dua" value="<?php echo $totalbelanja ?>">
				<div class="form-grup">
					<label>Grand Total</label>
					<input class="bentukform" id="result" required value="<?php echo rupiah($totalbelanja) ?>" readonly type="text">
				</div>
				<button class="tombol" name="checkout">Selesaikan Transaksi</button>
			</div>
		</div>
	</form>
</div>
</section>
<?php
if (isset($_POST["checkout"])) {
	$notransaksi = '#TP' . date("Ymdhis");
	$id = $_SESSION["pengguna"]["id"];
	$tanggalbeli = date("Y-m-d");
	$waktu = date("Y-m-d H:i:s");
	$alamatpengiriman = $_POST["alamatpengiriman"];
	$totalbeli = $totalbelanja;
	$kota = $_POST["kota"];
	$koneksi->query(
		"INSERT INTO pembelian(notransaksi,
				id, tanggalbeli, totalbeli, alamatpengiriman, kota, statusbeli, waktu)
				VALUES('$notransaksi','$id', '$tanggalbeli', '$totalbeli', '$alamatpengiriman','$kota','Belum Bayar', '$waktu')"
	);
	$idbeli_barusan = $koneksi->insert_id;
	foreach ($_SESSION['keranjang'] as $idproduk => $jumlah) {
		$ambil = $koneksi->query("SELECT*FROM produk WHERE idproduk='$idproduk'");
		$perproduk = $ambil->fetch_assoc();
		$nama = $perproduk['namaproduk'];
		$harga = $perproduk['hargaproduk'];

		$subharga = $perproduk['hargaproduk'] * $jumlah;
		$koneksi->query("INSERT INTO pembelianproduk (idbeli, idproduk, nama, harga, subharga, jumlah)
					VALUES ('$idbeli_barusan','$idproduk', '$nama','$harga','$subharga','$jumlah')");

		$koneksi->query("UPDATE produk SET stokproduk=stokproduk -$jumlah
					WHERE idproduk='$idproduk'");
	}
	unset($_SESSION["keranjang"]);
	echo "<script> alert('Pembelian Sukses');</script>";
	echo "<script> location ='riwayat.php';</script>";
}
?>
<?php
include 'footer.php';
?>