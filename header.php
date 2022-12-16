<?php
include 'koneksi.php';
$datakategori = array();
$ambil = $koneksi->query("SELECT * FROM kategori");
while ($tiap = $ambil->fetch_assoc()) {
  $datakategori[] = $tiap;
}
function rupiah($angka)
{
  $hasilrupiah = "Rp " . number_format($angka, 2, ',', '.');
  return $hasilrupiah;
}
function tanggal($tgl)
{
  $tanggal = substr($tgl, 8, 2);
  $bulan = getBulan(substr($tgl, 5, 2));
  $tahun = substr($tgl, 0, 4);
  return $tanggal . ' ' . $bulan . ' ' . $tahun;
}
function getBulan($bln)
{
  switch ($bln) {
    case 1:
      return "Januari";
      break;
    case 2:
      return "Februari";
      break;
    case 3:
      return "Maret";
      break;
    case 4:
      return "April";
      break;
    case 5:
      return "Mei";
      break;
    case 6:
      return "Juni";
      break;
    case 7:
      return "Juli";
      break;
    case 8:
      return "Agustus";
      break;
    case 9:
      return "September";
      break;
    case 10:
      return "Oktober";
      break;
    case 11:
      return "November";
      break;
    case 12:
      return "Desember";
      break;
  }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <title>86 Car</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="css/animate.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/gaya.css">
  <link rel="icon" type="image/x-icon" href="foto/logo86.png">
  <link href="admin/css/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
</head>

<body>
  <div class="topnav" id="myTopnav">
    <a href="index.php" class="active">BERANDA</a>
    <a href="tentangkami.php">TENTANG KAMI</a>
    <a href="produk.php">PRODUK</a>
    <div class="dropdown">
      <button class="dropbtn">KATEGORI
        <i class="fa fa-caret-down"></i>
      </button>
      <div class="dropdown-content">
        <?php foreach ($datakategori as $key => $value) : ?>
          <a href="kategori.php?id=<?php echo $value["id_kategori"] ?>"><?php echo $value["nama_kategori"] ?></a>
        <?php endforeach ?>
      </div>
    </div>
    <?php
    include 'koneksi.php';
    if (isset($_SESSION["pengguna"])) : ?>
      <?php
      $id = $_SESSION["pengguna"]['id'];
      $ambil = $koneksi->query("SELECT *FROM pengguna WHERE id='$id'");
      $pecah = $ambil->fetch_assoc(); ?>
      <a href="keranjang.php">KERANJANG</a>
      <a href="riwayat.php">RIWAYAT</a>
      <a href="logout.php" onclick="return confirm('Apakah Anda Yakin Ingin Keluar ?')">KELUAR</a>
    <?php else : ?>
      <a href="daftar.php">DAFTAR</a>
      <a href="login.php">LOGIN</a>
    <?php endif ?>
    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
      <i class="fa fa-bars"></i>
    </a>
  </div>