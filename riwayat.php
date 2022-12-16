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
			<h3 class="mb-4 text-tengah">Riwayat Transaksi</h3>
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
							<th>Tanggal</th>
							<th>Total</th>
							<th>Opsi</th>
							<th>Bukti Pembayaran</th>
							<th>Nota</th>
						</tr>
					</thead>
					<tbody>
						<?php $nomor = 1;
						$id = $_SESSION["pengguna"]['id'];
						$ambil = $koneksi->query("SELECT *, pembelian.idbeli as idbelireal FROM pembelian left join pembayaran on pembelian.idbeli = pembayaran.idbeli WHERE pembelian.id='$id' order by pembelian.tanggalbeli desc, pembelian.idbeli desc");
						while ($pecah = $ambil->fetch_assoc()) { ?>
							<tr>
								<td><?php echo $nomor; ?></td>
								<td><?php echo tanggal($pecah['tanggalbeli']) ?></td>
								<td>Rp. <?php echo number_format($pecah["totalbeli"]); ?></td>
								<td>
									<?php if ($pecah['statusbeli'] == "Belum Bayar") {
										$deadline = date('Y-m-d H:i', strtotime($pecah['waktu'] . ' +1 day'));
										$harideadline = date('Y-m-d', strtotime($pecah['waktu'] . ' +1 day'));
										$jamdeadline = date('H:i', strtotime($pecah['waktu'] . ' +1 day'));
										if (date('Y-m-d H:i') >= $deadline) {
											echo 'Waktu pembayaran<br>telah habis';
										} else { ?>
											<a href="pembayaran.php?id=<?php echo $pecah["idbelireal"] ?>" class="tombolkecil">Upload Bukti Pembayaran Sebelum <?= tanggal($harideadline) . ' - Jam ' . $jamdeadline ?></a>
										<?php }
									} elseif ($pecah['statusbeli'] == "Sudah Upload Bukti Pembayaran") { ?>
										<a class="tombolkecil text-putih">Menunggu Konfirmasi Admin</a>
									<?php } elseif ($pecah['statusbeli'] == "Mobil Di Kirim") { ?>
										<a class="tombolkecil text-putih">Mobil Anda Sedang Di Kirim Ke Lokasi Anda, Mohon Di Tungggu</a>
									<?php } elseif ($pecah['statusbeli'] == "Mobil Telah Sampai ke Pemesan") { ?>
										<a data-toggle="modal" data-target="#selesai<?= $nomor ?>" class="tombolkecil text-putih">Konfirmasi Selesai</a>
									<?php } elseif ($pecah['statusbeli'] == "Selesai") { ?>
										<a class="tombolkecil text-putih">Transaksi Selesai</a>
									<?php } elseif ($pecah['statusbeli'] == "Pesanan Di Tolak") { ?>
										<a class="tombolkecil text-putih">Pesanan Anda Di Tolak</a>
									<?php } ?>
								</td>
								<td><img width="150px" src="foto/<?= $pecah['bukti'] ?>" alt=""></td>
								<td>
									<a class="tombolkecil" target="_blank" href="notacetak.php?id=<?= $pecah['idbeli'] ?>">Nota</a>
								</td>
							</tr>
							<?php $nomor++; ?>
						<?php  } ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<?php
$no = 1;
$id = $_SESSION["pengguna"]['id'];
$ambil = $koneksi->query("SELECT *, pembelian.idbeli as idbelireal FROM pembelian left join pembayaran on pembelian.idbeli = pembayaran.idbeli WHERE pembelian.id='$id' order by pembelian.tanggalbeli desc, pembelian.idbeli desc");
while ($pecah = $ambil->fetch_assoc()) { ?>
	<div class="modal fade" id="selesai<?= $no ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="exampleModalLabel">Konfirmasi Pesanan Selesai</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form method="post">
					<div class="modal-body">
						<h5>Apakah anda yakin ingin mengkonfirmasi pesanan telah selesai ?</h5>
					</div>
					<div class="modal-footer">
						<input type="hidden" class="form-contol" value="<?= $pecah['idbeli'] ?>" name="idbeli">
						<button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
						<button type="submit" name="selesai" value="selesai" class="btn btn-biru">Konfirmasi</button>
					</div>
				</form>
			</div>
		</div>
	</div>
<?php
	$no++;
} ?>
<div style="padding-top: 500px"></div>
<?php
if (isset($_POST["selesai"])) {
	$koneksi->query("UPDATE pembelian SET statusbeli='Selesai'
		WHERE idbeli='$_POST[idbeli]'");
	echo "<script>alert('Pesanan berhasil di konfirmasi selesai')</script>";
	echo "<script>location='riwayat.php';</script>";
}
?>
<?php
include 'footer.php';
?>