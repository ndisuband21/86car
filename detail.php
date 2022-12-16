<?php
session_start();
include 'koneksi.php';
?>
<?php
$idproduk = $_GET["id"];
$ambil = $koneksi->query("SELECT*FROM produk WHERE idproduk='$idproduk'");
$detail = $ambil->fetch_assoc();
$kategori = $detail["id_kategori"];
?>
<?php include 'header.php'; ?>
<div class="kontainer">
	<div class="row mb-3 mt-5 pb-3">
		<div class="kolom-md-12 judulsection animasikontainer">
			<h3 class="mb-4 text-tengah"><?php echo $detail["namaproduk"] ?></h3>
		</div>
	</div>
</div>
<div class="kontainer">
	<div class="row mb-3">
		<div class="kolom-md-12">
			<center>
				<img src="foto/<?php echo $detail["fotoproduk"]; ?>" width="100%" style="border-radius: 10px">
			</center>
		</div>
	</div>
	<br><br>
	<div class="row mb-3">
		<div class="kolom-lg-12 animasikontainer">
			<div class="kartu">
				<div class="jarakkartu">
					<center>
						<h3>Stok : <?php echo $detail["stokproduk"]; ?></h3>
						<h3 style="color:#ff836d"><span>Rp. <?php echo number_format($detail["hargaproduk"]); ?></span></h3>
						<?php echo $detail["deskripsiproduk"]; ?>
					</center>
					<form method="post">
						<div class="form-grup">
							<label>Beli</label>
							<input type="number" placeholder="Jumlah" min="1" class="bentukform" name="jumlah" max="<?php echo number_format($detail["stokproduk"]); ?>" required></input>
							<button class="tombol mt-3" name="beli"><i class="fa fa-shopping-cart"></i> Beli</button>
						</div>
					</form>
					<?php
					if (isset($_POST["beli"])) {
						$jumlah = $_POST["jumlah"];
						$_SESSION["keranjang"][$idproduk] = $jumlah;
						echo "<script> alert('Produk Masuk Ke Keranjang');</script>";
						echo "<script> location ='keranjang.php';</script>";
					}
					?>
				</div>
			</div>
		</div>
	</div>
</div>
</section>

<?php
include 'footer.php';
?>