-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2022 at 01:46 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 7.3.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `86car`
--

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(10, 'Toyota'),
(11, 'Honda'),
(12, 'Suzuki');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `idbeli` int(11) NOT NULL,
  `nama` text NOT NULL,
  `tanggaltransfer` text NOT NULL,
  `tanggal` datetime NOT NULL,
  `bukti` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `idbeli` int(11) NOT NULL,
  `notransaksi` text NOT NULL,
  `id` int(11) NOT NULL,
  `tanggalbeli` date NOT NULL,
  `totalbeli` text NOT NULL,
  `alamatpengiriman` text NOT NULL,
  `totalberat` varchar(255) NOT NULL,
  `kota` text NOT NULL,
  `statusbeli` text NOT NULL,
  `waktu` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pembelianproduk`
--

CREATE TABLE `pembelianproduk` (
  `idbeli_produk` int(11) NOT NULL,
  `idbeli` text NOT NULL,
  `id` text NOT NULL,
  `idproduk` text NOT NULL,
  `nama` text NOT NULL,
  `harga` text NOT NULL,
  `subharga` text NOT NULL,
  `jumlah` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `telepon` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `fotoprofil` varchar(255) NOT NULL,
  `level` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`id`, `nama`, `email`, `password`, `telepon`, `alamat`, `fotoprofil`, `level`) VALUES
(1, 'Administrator', 'admin@gmail.com', 'admin', '0812345678', 'Indonesia', 'Untitled.png', 'Admin');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `idproduk` int(11) NOT NULL,
  `id_kategori` text NOT NULL,
  `namaproduk` text NOT NULL,
  `keyword` text NOT NULL,
  `hargaproduk` text NOT NULL,
  `stokproduk` text NOT NULL,
  `fotoproduk` text NOT NULL,
  `deskripsiproduk` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`idproduk`, `id_kategori`, `namaproduk`, `keyword`, `hargaproduk`, `stokproduk`, `fotoproduk`, `deskripsiproduk`) VALUES
(3, '10', '2020 Toyota FORTUNER VRZ TRD 2.4', 'toyota fortuner, fortuner', '440100000', '23', 'mobilp.webp', '<p><em>Jenis Bahan Bakar<br />\r\nDiesel<br />\r\nWarna<br />\r\nPutih<br />\r\nJumlah Tempat Duduk<br />\r\n7&amp;above<br />\r\nTanggal Registrasi<br />\r\nMei 2019<br />\r\nTipe Registrasi<br />\r\nPerorangan<br />\r\nJarak Tempuh Saat Ini<br />\r\n30.715 km<br />\r\nKunci Cadangan<br />\r\nYa<br />\r\nBuku Servis<br />\r\nYa<br />\r\nKadaluwarsa Garansi Pabrik<br />\r\nMei 2022<br />\r\nMasa Berlaku Stnk<br />\r\nMei 2022</em></p>\r\n'),
(4, '10', '2019 Toyota RUSH S TRD 1.5', 'toyota rush, rush', '224000000', '21', 'mobilp1.webp', '<p>Jenis Bahan Bakar<br />\r\nBensin<br />\r\nWarna<br />\r\nPutih<br />\r\nJumlah Tempat Duduk<br />\r\n7&amp;above<br />\r\nTanggal Registrasi<br />\r\nNov 2019<br />\r\nTipe Registrasi<br />\r\nPerorangan<br />\r\nJarak Tempuh Saat Ini<br />\r\n58.931 km<br />\r\nKunci Cadangan<br />\r\nYa<br />\r\nBuku Servis<br />\r\nYa<br />\r\nKadaluwarsa Garansi Pabrik<br />\r\nNov 2022<br />\r\nMasa Berlaku Stnk<br />\r\nNov 2022</p>\r\n'),
(5, '11', '2021 Honda CR-V TURBO PRESTIGE 1.5', 'honda crv, crv', '525500000', '9', 'mobilp2.webp', '<p>Jenis Bahan Bakar<br />\r\nBensin<br />\r\nWarna<br />\r\nPutih<br />\r\nJumlah Tempat Duduk<br />\r\n7&amp;above<br />\r\nTanggal Registrasi<br />\r\nAgt 2021<br />\r\nTipe Registrasi<br />\r\nPerorangan<br />\r\nJarak Tempuh Saat Ini<br />\r\n8.894 km<br />\r\nKunci Cadangan<br />\r\nYa<br />\r\nBuku Servis<br />\r\nYa<br />\r\nKadaluwarsa Garansi Pabrik<br />\r\nAgt 2024<br />\r\nMasa Berlaku Stnk<br />\r\nAgt 2023</p>\r\n'),
(8, '12', '2018 Suzuki ERTIGA GX 1.5', 'suzuki, suzuki ertiga, ertiga', '175000000', '13', 'mobilp3.webp', '<ul>\r\n	<li>Jenis Bahan Bakar<br />\r\n	Bensin<br />\r\n	Warna<br />\r\n	Abu-abu<br />\r\n	Jumlah Tempat Duduk<br />\r\n	7&amp;above<br />\r\n	Tanggal Registrasi<br />\r\n	Okt 2018<br />\r\n	Tipe Registrasi<br />\r\n	Perorangan<br />\r\n	Jarak Tempuh Saat Ini<br />\r\n	73.634 km<br />\r\n	Kunci Cadangan<br />\r\n	Ya<br />\r\n	Buku Servis<br />\r\n	Ya<br />\r\n	Garansi Pabrik<br />\r\n	Tidak<br />\r\n	Masa Berlaku Stnk<br />\r\n	Nov 2022</li>\r\n</ul>\r\n'),
(9, '12', '2019 Suzuki BALENO HATCHBACK 1.4', 'suzuki, suzuki baleno, baleno', '190000000', '21', 'mobilp4.webp', '<ul>\r\n	<li>Jenis Bahan Bakar<br />\r\n	Bensin<br />\r\n	Warna<br />\r\n	Merah<br />\r\n	Jumlah Tempat Duduk<br />\r\n	5<br />\r\n	Tanggal Registrasi<br />\r\n	Des 2019<br />\r\n	Tipe Registrasi<br />\r\n	Perorangan<br />\r\n	Jarak Tempuh Saat Ini<br />\r\n	36.147 km<br />\r\n	Kunci Cadangan<br />\r\n	Ya<br />\r\n	Buku Servis<br />\r\n	Ya<br />\r\n	Kadaluwarsa Garansi Pabrik<br />\r\n	Des 2022<br />\r\n	Masa Berlaku Stnk<br />\r\n	Jan 2023</li>\r\n</ul>\r\n'),
(13, '10', '2019 Toyota AGYA G TRD 1.2', 'toyota agya, agya', '125000000', '4', 'mobilp5.webp', '<p>Jenis Bahan Bakar<br />\r\nBensin<br />\r\nWarna<br />\r\nPutih<br />\r\nJumlah Tempat Duduk<br />\r\n5<br />\r\nTanggal Registrasi<br />\r\nAgt 2019<br />\r\nTipe Registrasi<br />\r\nPerorangan<br />\r\nJarak Tempuh Saat Ini<br />\r\n15.731 km<br />\r\nKunci Cadangan<br />\r\nYa<br />\r\nBuku Servis<br />\r\nYa<br />\r\nKadaluwarsa Garansi Pabrik<br />\r\nAgt 2022<br />\r\nMasa Berlaku Stnk<br />\r\nAgt 2022</p>\r\n'),
(14, '10', '2015 Toyota AVANZA VELOZ 1.5', 'toyota avanza veloz, avanza veloz', '155000000', '12', 'mobilp6.webp', '<p>Jenis Bahan Bakar<br />\r\nBensin<br />\r\nWarna<br />\r\nHitam<br />\r\nJumlah Tempat Duduk<br />\r\n7&amp;above<br />\r\nTanggal Registrasi<br />\r\nJul 2015<br />\r\nTipe Registrasi<br />\r\nPerorangan<br />\r\nJarak Tempuh Saat Ini<br />\r\n121.997 km<br />\r\nKunci Cadangan<br />\r\nYa<br />\r\nBuku Servis<br />\r\nTidak<br />\r\nGaransi Pabrik<br />\r\nTidak<br />\r\nMasa Berlaku Stnk<br />\r\nDes 2022</p>\r\n'),
(15, '11', '2019 Honda BRIO SATYA E 1.2', 'honda brio, brio', '137000000', '9', 'mobilp7.webp', '<p>Jenis Bahan BakarBensin</p>\r\n\r\n<p>WarnaMerah</p>\r\n\r\n<p>Jumlah Tempat Duduk5</p>\r\n\r\n<p>Tanggal RegistrasiDes 2019</p>\r\n\r\n<p>Tipe RegistrasiPerorangan</p>\r\n\r\n<p>Jarak Tempuh Saat Ini23.566 km</p>\r\n\r\n<p>Kunci CadanganYa</p>\r\n\r\n<p>Buku ServisYa</p>\r\n\r\n<p>Kadaluwarsa Garansi PabrikDes 2022</p>\r\n\r\n<p>Masa Berlaku StnkJan 2023</p>\r\n'),
(16, '12', '2017 Suzuki IGNIS GX 1.2', 'suzuki ignis, ignis', '127000000', '1', 'mobilp8.webp', '<p>Jenis Bahan Bakar<br />\r\nBensin<br />\r\nWarna<br />\r\nBiru<br />\r\nJumlah Tempat Duduk<br />\r\n5<br />\r\nTanggal Registrasi<br />\r\nAgt 2017<br />\r\nTipe Registrasi<br />\r\nPerorangan<br />\r\nJarak Tempuh Saat Ini<br />\r\n56.232 km<br />\r\nKunci Cadangan<br />\r\nYa<br />\r\nBuku Servis<br />\r\nYa<br />\r\nGaransi Pabrik<br />\r\nTidak<br />\r\nMasa Berlaku Stnk<br />\r\nAgt 2022</p>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`idbeli`);

--
-- Indexes for table `pembelianproduk`
--
ALTER TABLE `pembelianproduk`
  ADD PRIMARY KEY (`idbeli_produk`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`idproduk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `idbeli` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pembelianproduk`
--
ALTER TABLE `pembelianproduk`
  MODIFY `idbeli_produk` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `idproduk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
