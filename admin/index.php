<?php
session_start();
include '../koneksi.php';
function rupiah($angka)
{
    $hasilrupiah = "Rp " . number_format($angka, 2, ',', '.');
    return $hasilrupiah;
}
if (!isset($_SESSION['admin'])) {
    echo "<script>alert('Anda Harus Login');</script>";
    echo "<script>location='login.php';</script>";
    header('location:login.php');
    exit();
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
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>86 Car</title>
    <link href="css/css/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link rel="stylesheet" href="css/styleadmin.css">
    <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-black.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="assets/ckeditor/ckeditor.js"></script>
    <style>
        .tabel,
        td,
        th {
            border: 1px solid;
            text-align: center;
            padding-top: 5px;
            padding-bottom: 5px;
        }

        thead {
            background-color: orange;
            color: white;
        }

        .tabel {
            width: 100%;
            border-collapse: collapse;
        }

        .tabel tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .tabel tr:hover {
            background-color: #ffffff;
        }


        .w3-sidebar {
            z-index: 3;
            width: 270px;
            top: 43px;
            bottom: 0;
            height: inherit;
        }

        .bentukform {
            width: 100%;
            padding: 6px 6px;
            margin: 8px 0;
            display: inline-block;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
        }

        .tombol {
            background-color: orange;
            border: none;
            color: white;
            padding: 5px 5px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            display: block;
            width: 100%;
        }

        .tombolkecil {
            background-color: orange;
            border: none;
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 10px;
        }

        .tombolkecilmerah {
            background-color: red;
            border: none;
            color: white;
            padding: 5px 10px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            border-radius: 10px;
        }

        .kanan {
            float: right;
            margin-bottom: 25px
        }

        .kotak {
            box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2);
            transition: 0.3s;
        }

        .kotak:hover {
            box-shadow: 0 8px 16px 0 rgba(0, 0, 0, 0.2);
        }

        .jarakkotak {
            padding: 2px 16px;
        }
    </style>
</head>

<body class="w3-light-grey w3-content" style="max-width:1600px">
    <div class="w3-top">
        <div class="w3-bar w3-theme w3-top w3-left-align w3-large">
            <a class="w3-bar-item w3-button w3-right w3-hide-large w3-hover-white w3-large w3-theme-l1" href="javascript:void(0)" onclick="w3_open()"><i class="fa fa-bars"></i></a>
            <a href="#" class="w3-bar-item w3-button w3-theme-l1">ADMIN</a>
        </div>
    </div>
    <nav class="w3-sidebar w3-bar-block w3-collapse w3-large w3-animate-left" id="mySidebar" style="background-color: #4c60da">
        <a href="javascript:void(0)" class="w3-right w3-xlarge w3-padding-large w3-hover-black w3-hide-large" title="Close Menu">
            <i class="fa fa-remove"></i>
        </a>
        <h4 class="w3-bar-item" style="color: white"><b>MENU</b></h4>
        <a href="index.php?halaman=beranda" class="w3-bar-item w3-button w3-hover-black" style="background-color: #33d286;color:white;">DASHBOARD</a>
        <br>
        <a href="index.php?halaman=produk" class="w3-bar-item w3-button w3-hover-black" style="background-color: #33d286;color:white;">DATA PRODUK</a>
        <br>
        <a href="index.php?halaman=kategori" class="w3-bar-item w3-button w3-hover-black" style="background-color: #33d286;color:white">DATA KATEGORI</a>
        <br>
        <a href="index.php?halaman=pembelian" class="w3-bar-item w3-button w3-hover-black" style="background-color: #33d286;color:white">DATA TRANSAKSI</a>
        <br>
        <a href="index.php?halaman=pengguna" class="w3-bar-item w3-button w3-hover-black" style="background-color: #33d286;color:white">DATA MEMBER</a>
        <br>
        <a href="index.php?halaman=logout" onclick="return confirm('Apakah Anda Yakin Ingin Keluar ?')" class="w3-bar-item w3-button w3-hover-black" style="background-color: #33d286;color:white">LOGOUT</a>
    </nav>
    <div class="w3-overlay w3-hide-large" style="cursor:pointer" title="close side menu" id="myOverlay"></div>
    <div class="w3-main" style="margin-left:270px;background-color: white">

        <div class="w3-row w3-padding-64">
            <div class="w3-container" style="padding-bottom: 500px">
                <?php
                if (isset($_GET['halaman'])) {
                    if ($_GET['halaman'] == "produk") {
                        include 'produk.php';
                    } elseif ($_GET['halaman'] == "pembelian") {
                        include 'pembelian.php';
                    } elseif ($_GET['halaman'] == "pengguna") {
                        include 'pengguna.php';
                    } elseif ($_GET['halaman'] == "detail") {
                        include 'detail.php';
                    } elseif ($_GET['halaman'] == "tambahproduk") {
                        include 'tambahproduk.php';
                    } elseif ($_GET['halaman'] == "hapusproduk") {
                        include 'hapusproduk.php';
                    } elseif ($_GET['halaman'] == "ubahproduk") {
                        include 'ubahproduk.php';
                    } elseif ($_GET['halaman'] == "logout") {
                        include 'logout.php';
                    } elseif ($_GET['halaman'] == "pembayaran") {
                        include 'pembayaran.php';
                    } elseif ($_GET['halaman'] == "beranda") {
                        include 'beranda.php';
                    } elseif ($_GET['halaman'] == "kategori") {
                        include 'kategori.php';
                    } elseif ($_GET['halaman'] == "ubahkategori") {
                        include 'ubahkategori.php';
                    } elseif ($_GET['halaman'] == "detailproduk") {
                        include 'detailproduk.php';
                    } elseif ($_GET['halaman'] == "hapusfotoproduk") {
                        include 'hapusfotoproduk.php';
                    } elseif ($_GET['halaman'] == "tambahkategori") {
                        include 'tambahkategori.php';
                    } elseif ($_GET['halaman'] == "hapuskategori") {
                        include 'hapuskategori.php';
                    } elseif ($_GET['halaman'] == "hapuspengguna") {
                        include 'hapuspengguna.php';
                    }
                } else {
                    include 'beranda.php';
                }
                ?>
            </div>
        </div>
        <script src="assets/js/jquery.min.js"></script>
        <script>
            function w3_open() {
                document.getElementById("mySidebar").style.display = "block";
                document.getElementById("myOverlay").style.display = "block";
            }

            function w3_close() {
                document.getElementById("mySidebar").style.display = "none";
                document.getElementById("myOverlay").style.display = "none";
            }
        </script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
        <script src="assets/demo/chart-area-demo.js"></script>
        <script>
            var ctx = document.getElementById("grafikharga");
            var myLineChart = new Chart(ctx, {
                type: 'bar',
                data: {
                    labels: ["Januari", "Februari", "Maret", "April", "Mei", "Juni", 'Juli', 'Agustus', 'September', 'Oktober', 'November', 'Desember'],
                    datasets: [{
                        label: "Harga",
                        backgroundColor: "rgba(2,117,216,1)",
                        borderColor: "rgba(2,117,216,1)",
                        data: [<?= $hargagrafik[0] ?>, <?= $hargagrafik[1] ?>, <?= $hargagrafik[2] ?>, <?= $hargagrafik[3] ?>, <?= $hargagrafik[4] ?>, <?= $hargagrafik[5] ?>, <?= $hargagrafik[6] ?>, <?= $hargagrafik[7] ?>, <?= $hargagrafik[8] ?>, <?= $hargagrafik[9] ?>, <?= $hargagrafik[10] ?>, <?= $hargagrafik[11] ?>],
                    }],
                },
                options: {
                    scales: {
                        xAxes: [{
                            time: {
                                unit: 'month'
                            },
                            gridLines: {
                                display: false
                            },
                            ticks: {
                                maxTicksLimit: 12
                            }
                        }],
                        yAxes: [{
                            ticks: {
                                min: 0,
                                maxTicksLimit: 12,
                                callback: function(value, index, values) {
                                    if (parseInt(value) >= 1000) {
                                        return 'Rp.' + value.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                                    } else {
                                        return 'Rp.' + value;
                                    }
                                }
                            },
                            gridLines: {
                                display: true
                            }
                        }],
                    },
                    legend: {
                        display: false
                    },
                    tooltips: {
                        callbacks: {
                            label: function(t, d) {
                                var xLabel = d.datasets[t.datasetIndex].label;
                                var yLabel = t.yLabel >= 1000 ? 'Rp.' + t.yLabel.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ".") : '$' + t.yLabel;
                                return xLabel + ': ' + yLabel;
                            }
                        }
                    },
                }
            });
        </script>
</body>

</html>