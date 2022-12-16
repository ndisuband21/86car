<?php
session_start();
include 'koneksi.php';
include 'header.php';
$ambil = $koneksi->query("SELECT *FROM produk LEFT JOIN kategori ON produk.id_kategori=kategori.id_kategori order by idproduk desc");
?>
<div class="kontainer">
    <div class="row mb-3 mt-5 pb-3">
        <div class="kolom-md-12 judulsection animasikontainer">
            <h3 class="mb-4 text-tengah">Produk Kami</h3>
        </div>
    </div>
</div>
<div class="kontainer">
    <h4>Rekomendasi bedasarkan keyword pencarian</h4>
    <br>
    <div class="row">
        <?php while ($perproduk = $ambil->fetch_assoc()) { ?>
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
        <?php } ?>
    </div>
</div>
<?php
include 'footer.php';
?>