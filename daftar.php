<?php
session_start();
include 'koneksi.php';
?>
<?php include 'header.php'; ?>
<div class="kontainer">
	<div class="row mb-3 mt-5 pb-3">
		<div class="kolom-md-12 judulsection animasikontainer">
			<h3 class="mb-4 text-tengah">Daftar</h3>
		</div>
	</div>
</div>
<div class="kontainer">
	<div class="row">
		<div class="kolom-md-12">
			<div class="kartu">
				<div class="jarakkartu">
					<form method="post" class="form-horizontal">
						<div class="form-grup">
							<label class="label-gaya">Nama</label>
							<input type="text" name="nama" class="bentukform" required>
						</div>
						<div class="form-grup">
							<label class="label-gaya">Email</label>
							<input type="email" name="email" class="bentukform" required>
						</div>
						<div class="form-grup">
							<label class="label-gaya">Password</label>
							<input type="text" name="password" class="bentukform" required>
						</div>
						<div class="form-grup">
							<label class="label-gaya">Alamat</label>
							<textarea class="bentukform" name="alamat" required></textarea>
						</div>
						<div class="form-grup">
							<label class="label-gaya">Telepon</label>
							<input type="text" name="telepon" class="bentukform">
						</div>
						<div class="form-grup ">
							<br>
							<button class="tombol" name="daftar">Daftar</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<?php
if (isset($_POST["daftar"])) {
	$nama = $_POST['nama'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$alamat = $_POST['alamat'];
	$telepon = $_POST['telepon'];
	$ambil = $koneksi->query("SELECT*FROM pengguna 
							WHERE email='$email'");
	$yangcocok = $ambil->num_rows;
	if ($yangcocok == 1) {
		echo "<script>alert('Pendaftaran Gagal, email sudah ada')</script>";
		echo "<script>location='daftar.php';</script>";
	} else {
		$koneksi->query("INSERT INTO pengguna	(nama, email,  password, alamat, telepon, fotoprofil, level)
								VALUES('$nama','$email','$password','$alamat','$telepon','Untitled.png','Pelanggan')");
		echo "<script>alert('Pendaftaran Berhasil')</script>";
		echo "<script>location='login.php';</script>";
	}
}
?>
<?php
include 'footer.php';
?>