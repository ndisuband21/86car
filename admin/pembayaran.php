<?php
$ambil = $koneksi->query("SELECT*FROM pembelian JOIN pengguna
	ON pembelian.id=pengguna.id
	WHERE pembelian.idbeli='$_GET[id]'");
$detail = $ambil->fetch_assoc();
?>
<center>
	<h1><b>DETAIL TRANSAKSI</b></h1>
</center>
<table class="tabel">
	<tr>
		<td>Nama</td>
		<td><?php echo $detail['nama']; ?></td>
	</tr>
	<tr>
		<td>Telepon</td>
		<td><?php echo $detail['telepon']; ?></td>
	</tr>
	<tr>
		<td>Email</td>
		<td><?php echo $detail['email']; ?></td>
	</tr>
	<tr>
		<td>Kota</td>
		<td><?php echo $detail['kota']; ?></td>
	</tr>
	<tr>
		<td>Alamat</td>
		<td><?php echo $detail['alamatpengiriman']; ?></td>
	</tr>
	<tr>
		<td>Tanggal</td>
		<td><?php echo tanggal($detail['tanggalbeli']); ?></td>
	</tr>
	<tr>
		<td>Status</td>
		<td><?php echo $detail['statusbeli']; ?></td>
	</tr>
	<tr>
		<td>Grandtotal</td>
		<td><?php echo rupiah($detail['totalbeli']); ?></td>
	</tr>
</table>
<br>
<a class="tombolkecil kanan" target="_blank" href="../notacetak.php?id=<?= $_GET['id'] ?>">Nota</a>
<br>
<table class="tabel">
	<thead>
		<tr>
			<th>No</th>
			<th>Nama Produk</th>
			<th>Harga</th>
			<th>Jumlah</th>
			<th>Total Harga</th>
		</tr>
	</thead>
	<tbody>
		<?php $nomor = 1; ?>
		<?php $ambil = $koneksi->query("SELECT * FROM pembelianproduk WHERE idbeli='$_GET[id]'"); ?>
		<?php while ($pecah = $ambil->fetch_assoc()) { ?>
			<tr>
				<td><?php echo $nomor; ?></td>
				<td><?php echo $pecah['nama']; ?></td>
				<td>Rp. <?php echo number_format($pecah['harga']); ?></td>
				<td><?php echo $pecah['jumlah']; ?></td>
				<td>Rp. <?php echo number_format($pecah['subharga']); ?></td>
			</tr>
			<?php $nomor++; ?>
		<?php } ?>
	</tbody>
</table>
<br>
<?php
$idbeli = $_GET['id'];
$ambil = $koneksi->query("SELECT*FROM pembayaran WHERE idbeli='$idbeli'");
$detail = $ambil->fetch_assoc();
?>
<?php $am = $koneksi->query("SELECT*FROM pembelian WHERE idbeli='$idbeli'");
$det = $am->fetch_assoc(); ?>
<br>
<br>
<br>
<form method="post">
	<div class="form-group">
		<label>Status</label>
		<select class="bentukform" name="statusbeli">
			<option value="Belum di Konfirmasi">Belum di Konfirmasi</option>
			<option value="Pesanan Di Tolak">Pesanan Di Tolak</option>
			<option value="Mobil Di Persiapkan">Mobil Di Persiapkan</option>
			<option value="Mobil Di Kirim">Mobil Di Kirim</option>
			<option value="Mobil Telah Sampai ke Pemesan">Mobil Telah Sampai ke Pemesan</option>
		</select>
	</div>
	<br>
	<button class="tombolkecil kanan" name="proses">Simpan</button>
	<br>
</form>
<?php
if (!empty($detail['bukti'])) {
?>
	<br>
	<br>
	<strong>BUKTI PEMBAYARAN</strong><br>
	<img src="../foto/<?php echo $detail['bukti'] ?>" alt="" class="img-responsive">
<?php } ?>
<?php
if (isset($_POST["proses"])) {
	$statusbeli = $_POST["statusbeli"];
	$koneksi->query("UPDATE pembelian SET statusbeli='$statusbeli'
		WHERE idbeli='$idbeli'");
	echo "<script>alert('Pembayaran Berhasil Diupdate')</script>";
	echo "<script>location='index.php?halaman=pembelian';</script>";
} ?>