<?php
session_start();
include 'koneksi.php';
?>
<?php include 'header.php';
$kategori = $_GET["id"];
$semuadata = array();
$ambil = $koneksi->query("SELECT*FROM produk WHERE id_kategori LIKE '%$kategori%'");
while ($pecah = $ambil->fetch_assoc()) {
	$semuadata[] = $pecah;
}
?>
<?php
$datakategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) {
	$datakategori[] = $tiap;
}
?>
<?php $am = $koneksi->query("SELECT * FROM kategori where id_kategori='$kategori'");
$pe = $am->fetch_assoc()
?>
<div class="kontainer">
	<div class="row mb-3 mt-5 pb-3">
		<div class="kolom-md-12 judulsection animasikontainer">
			<h3 class="mb-4 text-tengah">Kategori : <?php echo $pe["nama_kategori"] ?></h3>
			<?php if (empty($semuadata)) : ?>
				<div class="alert alert-merah">Produk <strong><?php echo $pe["nama_kategori"] ?></strong> Kosong</div>
			<?php endif ?>
		</div>
	</div>
</div>
<div class="kontainer">
	<div class="row">
		<?php foreach ($semuadata as $key => $perproduk) : ?>
			<div class="kolom-md-4 mb-5">
				<div class="kartu">
					<a href="detail.php?id=<?php echo $perproduk['idproduk']; ?>"><img src="foto/<?php echo $perproduk['fotoproduk'] ?>" style="height:200px;width:100%" alt="">
					</a>
					<div class="jarakkartu">
						<center>
							<h3><a href="detail.php?id=<?php echo $perproduk['idproduk']; ?>"><?php echo $perproduk['namaproduk'] ?></a></h3>
							<b class="text-merah text-tengah"><span>Rp <?php echo number_format($perproduk['hargaproduk']) ?></span></b>
							<a class="tombol mt-3" href="detail.php?id=<?php echo $perproduk['idproduk']; ?>">Beli</a>
						</center>
					</div>
				</div>
			</div>
		<?php endforeach ?>
	</div>
</div>
</section>

<?php
include 'footer.php';
?>