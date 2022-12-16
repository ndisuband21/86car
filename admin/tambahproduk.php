<?php
$datakategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) {
	$datakategori[] = $tiap;
}
?>
<center>
	<h1><b>TAMBAH PRODUK</b></h1>
</center>
<div class="w3-section w3-padding-16">
	<form method="post" enctype="multipart/form-data">
		<div class="form-grup">
			<label>Nama</label>
			<input type="text" class="bentukform" name="nama">
		</div>
		<div class="form-grup">
			<label>Keyword</label>
			<input type="text" class="bentukform" name="keyword" placeholder="Contoh : Pemotong, Pisau, Tajam">
		</div>
		<div class="form-grup">
			<label>Nama Kategori</label>
			<select class="bentukform" name="id_kategori">
				<option value="">Pilih Kategori</option>
				<?php foreach ($datakategori as $key => $value) : ?>

					<option value="<?php echo $value["id_kategori"] ?>"><?php echo $value["nama_kategori"] ?></option>

				<?php endforeach ?>
			</select>
		</div>
		<div class="form-grup">
			<label>Harga (Rp)</label>
			<input type="number" class="bentukform" name="harga">
		</div>
		<div class="form-grup">
			<label>Deskripsi</label>
			<textarea class="bentukform" name="deskripsi" id="deskripsi" rows="10"></textarea>
			<script>
				CKEDITOR.replace('deskripsi');
			</script>
		</div>
		<div class="form-grup">
			<label>Foto</label>
			<div class="letak-input" style="margin-bottom: 10px;">
				<input type="file" class="bentukform" name="foto">
			</div>
		</div>
		<div class="form-grup">
			<label>Stok Produk</label>
			<input type="number" class="bentukform" name="stok">
		</div>
		<button class="tombolkecil kanan" name="save"><i class="glyphicon glyphicon-saved"></i>Simpan</a></button>
	</form>
</div>
<?php
if (isset($_POST['save'])) {
	$namafoto = $_FILES['foto']['name'];
	$lokasifoto = $_FILES['foto']['tmp_name'];
	move_uploaded_file($lokasifoto, "../foto/" . $namafoto);
	$keyword = strtolower($_POST['keyword']);
	$koneksi->query("INSERT INTO produk
		(namaproduk,keyword,id_kategori,hargaproduk,fotoproduk,deskripsiproduk, stokproduk)
		VALUES('$_POST[nama]','$keyword','$_POST[id_kategori]','$_POST[harga]','$namafoto','$_POST[deskripsi]','$_POST[stok]')");
	$idproduk_barusan = $koneksi->insert_id;
	echo "<script>alert('Produk Berhasil Di Simpan');</script>";
	echo "<script> location ='index.php?halaman=produk';</script>";
}
?>