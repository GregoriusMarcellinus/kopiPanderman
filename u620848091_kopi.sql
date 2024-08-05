-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 05, 2024 at 10:20 AM
-- Server version: 10.11.8-MariaDB-cll-lve
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u620848091_kopi`
--

-- --------------------------------------------------------

--
-- Table structure for table `keranjang`
--

CREATE TABLE `keranjang` (
  `id_keranjang` int(100) NOT NULL,
  `id_user` int(100) NOT NULL,
  `pesanan` int(100) NOT NULL,
  `jumlah` int(100) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `keranjang`
--

INSERT INTO `keranjang` (`id_keranjang`, `id_user`, `pesanan`, `jumlah`, `harga`) VALUES
(12, 9, 2, 1, 20000),
(13, 9, 1, 1, 20000);

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `metode` varchar(100) NOT NULL,
  `kode` varchar(100) NOT NULL,
  `nama` varchar(100) DEFAULT NULL,
  `gambar` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`metode`, `kode`, `nama`, `gambar`) VALUES
('BCA', '********', 'Kopi Panderman', 'null'),
('QRIS', 'null', 'Kopi Panderman', 'https://drive.google.com/u/0/uc?id=1Guv3-k6M_cTpQxV09h8AlPVqE-tApsvc');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_toko` int(11) NOT NULL,
  `pesanan` varchar(50) NOT NULL,
  `jumlah` varchar(50) NOT NULL,
  `total` int(11) NOT NULL,
  `pengiriman` enum('JNE','POS','TIKI') NOT NULL,
  `pembayaran` enum('BCA','QRIS') NOT NULL,
  `ongkir` int(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `resi` varchar(100) DEFAULT '-',
  `estimasi` varchar(100) DEFAULT '-',
  `bukti` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesanan`, `id_user`, `id_toko`, `pesanan`, `jumlah`, `total`, `pengiriman`, `pembayaran`, `ongkir`, `status`, `waktu`, `resi`, `estimasi`, `bukti`) VALUES
(1, 10, 1, '1', '1', 20000, 'JNE', 'BCA', 8000, 1, '2023-09-15 08:22:22', '-', '-', NULL),
(5, 2, 1, '2,1', '1,1', 40000, 'JNE', 'BCA', 8000, 5, '2023-09-19 07:11:26', 'GD3G5R', '4-11-2023', 'https://drive.google.com/u/0/uc?id=14GdhUHsXTmjykF0sU5_5Ea6Ba7sKDeYN'),
(6, 2, 1, '1', '3', 60000, 'JNE', 'QRIS', 9000, 5, '2023-10-31 18:20:13', 'R6B23G', '4-11-2023', 'https://drive.google.com/u/0/uc?id=1UD-sVsi5PHcTpCtpAa1jUHwxl01pazGg'),
(10, 2, 1, '1', '1', 20000, 'JNE', 'BCA', 9000, 6, '2023-11-05 05:43:38', 'FR58GB', '8-11-2023', 'https://drive.google.com/u/0/uc?id=1itfZWEch2QziW2yCJ9OS5t8281C2a-Ur'),
(11, 2, 1, '1', '2', 40000, 'JNE', 'BCA', 8000, 5, '2023-11-06 01:36:24', 'FB23JH', '11-11-2023', 'https://drive.google.com/u/0/uc?id=1ovpMYmgumkTu79JSxT0ILQqmVa8VbKpf');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(11) NOT NULL,
  `id_toko` varchar(11) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `berat` int(11) NOT NULL,
  `dimensi` varchar(50) NOT NULL,
  `deskripsi` varchar(10000) NOT NULL,
  `stok` int(11) NOT NULL,
  `terjual` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `gambar` varchar(1000) NOT NULL,
  `review` varchar(5) NOT NULL DEFAULT '3.5'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_toko`, `nama_produk`, `berat`, `dimensi`, `deskripsi`, `stok`, `terjual`, `harga`, `gambar`, `review`) VALUES
(1, '1', 'Kopi Arabika', 200, '12', 'Selamat datang di toko Kopi Panderman, di mana kami dengan bangga mempersembahkan kepada Anda kopi Arabika istimewa dari lereng Gunung Panderman, Desa Pesanggrahan, Kota Batu. Ini adalah kopi dengan karakteristik yang sangat khas, yang akan memberikan pengalaman kopi yang tak terlupakan kepada Anda.\n\nAsal Usul Kualitas Terbaik : Biji kopi kami tumbuh dengan penuh perhatian di ketinggian yang tinggi di lereng Gunung Panderman, dengan iklim yang ideal dan suhu harian yang bervariasi. Ini memastikan bahwa setiap biji kopi memiliki waktu yang cukup untuk berkembang dengan baik, menghasilkan kualitas terbaik.\n\nCita Rasa yang Memukau : Kopi Arabika dari lereng Gunung Panderman kami memanjakan lidah Anda dengan cita rasa yang lembut dan kompleks.\n\nPemrosesan yang Cermat : Biji kopi kami diolah dengan teliti, baik melalui metode pemrosesan kering atau basah, untuk memastikan bahwa kualitasnya tetap tinggi. Kami menjaga kemurnian kopi sepanjang proses ini.\n\nNikmati keindahan alam dan kekayaan rasa kopi Arabika dari Gunung Panderman di setiap cangkir. Pesan sekarang untuk pengalaman kopi yang unik dan otentik yang akan memenuhi selera pencinta kopi sejati.', 10, 0, 20000, 'https://drive.google.com/u/0/uc?id=1AUnTSufsuNTzLmmCNLO-o45G4N6MpQat', '4.5'),
(2, '1', 'Kopi Robusta', 200, '12', 'Selamat datang di toko Kopi Panderman, di mana kami dengan bangga mempersembahkan kepada Anda kopi Robusta istimewa dari lereng Gunung Panderman, Desa Pesanggrahan, Kota Batu. Ini adalah kopi dengan karakteristik yang sangat khas, yang akan memberikan pengalaman kopi yang tak terlupakan kepada Anda.\n\n**Asal Usul Kualitas Terbaik** : Biji kopi Robusta kami tumbuh dengan penuh perhatian di ketinggian yang tinggi di lereng Gunung Panderman, dengan iklim yang ideal dan suhu harian yang bervariasi. Ini memastikan bahwa setiap biji kopi memiliki waktu yang cukup untuk berkembang dengan baik, menghasilkan kualitas terbaik.\n\n**Cita Rasa yang Memukau** : Kopi Robusta dari lereng Gunung Panderman kami memanjakan lidah Anda dengan cita rasa yang kuat dan tegas. Anda akan merasakan sentuhan rasa yang mendalam, dengan aksen cokelat, kayu manis, dan caramelly yang memikat. Setiap cangkir adalah perjalanan sensorik yang menggugah selera Anda.\n\n**Pemrosesan yang Cermat** : Biji kopi Robusta kami diolah dengan teliti, baik melalui metode pemrosesan kering atau basah, untuk memastikan bahwa kualitasnya tetap tinggi. Kami menjaga kemurnian kopi sepanjang proses ini, sehingga Anda bisa merasakan keaslian dan kelezatan kopi Gunung Panderman dalam setiap cangkir.\n\nNikmati keindahan alam dan kekayaan rasa kopi Robusta dari Gunung Panderman di setiap cangkir. Pesan sekarang untuk pengalaman kopi yang unik dan otentik yang akan memenuhi selera pencinta kopi sejati. Kami siap mengantar kelezatan ini langsung ke pintu Anda.', 10, 0, 20000, 'https://drive.google.com/u/0/uc?id=1AUnTSufsuNTzLmmCNLO-o45G4N6MpQat', '4.5');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `id_toko` int(11) DEFAULT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `password` varchar(20) NOT NULL,
  `level` int(11) NOT NULL DEFAULT 1,
  `foto_profil` varchar(1000) DEFAULT NULL,
  `saldo` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_toko`, `nama`, `username`, `email`, `telp`, `alamat`, `password`, `level`, `foto_profil`, `saldo`) VALUES
(1, 1, 'Kelompok Tani Margo Joyo', 'demo_penjual', 'kelompoktanijoyo@gmail.com', '081333131969', 'Batu', 'yanto123', 2, 'https://drive.google.com/u/0/uc?id=1dHcuSraeX0_yF48chXQ-xf4ROBxofBoK', 0),
(2, NULL, 'pembeli', 'demo_pembeli', 'kopipanderman01@gmail.com', '08**********', 'ITS Surabaya', '123', 1, 'https://drive.google.com/u/0/uc?id=1y4A5s5oChkDmm5RC7p2Ms5fGWsFBnth2', 0),
(3, 1, 'demo_kasir', 'kasir', 'kasir@gmail.com', '081345672233', 'Batu', 'kasir', 3, 'https://drive.google.com/u/0/uc?id=17ZngyEbc2WUp6xDu6qTuVG6aInXMqiQr', 213000),
(4, NULL, 'kurir', 'demo_kurir', 'kurir@gmail.om', '0812345678', 'Batu', '123', 5, NULL, 0),
(6, NULL, 'Gregorius Marcellinus', 'greg', 'marcellongkosianbhadra@gmail.com', '081333131969', 'Surabaya', 'yanto123', 1, 'https://drive.google.com/u/0/uc?id=1m02zsZOtDP4oj3J6VDnpoeoxIxVfvipk', 0),
(7, NULL, NULL, 'luckyputrirahayu', NULL, NULL, NULL, '070809Its', 1, NULL, 0),
(8, NULL, NULL, 'ardha', NULL, NULL, NULL, '123', 1, NULL, 0),
(9, NULL, 'pak lurah', 'plurah', 'makeajoke@gmail.com', '08888888888', 'Antahberantah 550 jaganegara, brazil', 'plurah018', 1, NULL, 0),
(10, NULL, NULL, 'lindra230400', NULL, NULL, NULL, '000423', 1, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `tb_withdraw`
--

CREATE TABLE `tb_withdraw` (
  `id_withdraw` int(5) NOT NULL,
  `id_user` int(5) NOT NULL,
  `bank` varchar(50) NOT NULL,
  `norek` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jumlah` int(20) NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp(),
  `status` varchar(50) NOT NULL DEFAULT 'Menunggu Verifikasi'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tb_withdraw`
--

INSERT INTO `tb_withdraw` (`id_withdraw`, `id_user`, `bank`, `norek`, `nama`, `jumlah`, `waktu`, `status`) VALUES
(2, 1, 'BCA', '1030585336', 'Demo_Penjual', 120000, '2023-11-06 01:54:09', 'Menunggu Verifikasi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `keranjang`
--
ALTER TABLE `keranjang`
  ADD PRIMARY KEY (`id_keranjang`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`metode`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id_pesanan`);

--
-- Indexes for table `tb_produk`
--
ALTER TABLE `tb_produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indexes for table `tb_withdraw`
--
ALTER TABLE `tb_withdraw`
  ADD PRIMARY KEY (`id_withdraw`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `keranjang`
--
ALTER TABLE `keranjang`
  MODIFY `id_keranjang` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tb_withdraw`
--
ALTER TABLE `tb_withdraw`
  MODIFY `id_withdraw` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
