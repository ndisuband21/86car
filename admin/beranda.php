<?php
$kategori = $koneksi->query("SELECT * FROM kategori");
$jumlahkategori = $kategori->num_rows;

$produk = $koneksi->query("SELECT * FROM produk");
$jumlahproduk = $produk->num_rows;

$member = $koneksi->query("SELECT * FROM pengguna where level = 'Pelanggan'");
$jumlahmember = $member->num_rows;

$pembelian = $koneksi->query("SELECT * FROM pembelian");
$jumlahpembelian = $pembelian->num_rows;
?>
<br>
<div class="kartu" style="background-color: #33d286;border-radius:10px">
    <div class="jarakkotak">
        <h4><b>Jumlah Kategori</b></h4>
        <p><?php echo $jumlahkategori ?></p>
    </div>
</div>
<br>
<div class="kartu" style="background-color: #33d286;border-radius:10px">
    <div class="jarakkotak">
        <h4><b>Jumlah Produk</b></h4>
        <p><?php echo $jumlahproduk ?></p>
    </div>
</div>
<br>
<div class="kartu" style="background-color: #33d286;border-radius:10px">
    <div class="jarakkotak">
        <h4><b>Jumlah Pembelian</b></h4>
        <p><?php echo $jumlahpembelian ?></p>
    </div>
</div>