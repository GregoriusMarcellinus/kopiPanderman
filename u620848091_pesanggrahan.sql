-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 05, 2024 at 10:21 AM
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
-- Database: `u620848091_pesanggrahan`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_keluar`
--

CREATE TABLE `tb_keluar` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(250) NOT NULL,
  `waktu_penjualan` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `jumlah` int(11) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `harga_total` int(11) NOT NULL,
  `bukti_pembayaran` varchar(100) NOT NULL,
  `status` enum('menunggu bayar','menunggu kurir','batal','sedang dikirim','selesai') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_keluar`
--

INSERT INTO `tb_keluar` (`id_produk`, `nama_produk`, `waktu_penjualan`, `jumlah`, `harga_produk`, `harga_total`, `bukti_pembayaran`, `status`) VALUES
(64, 'Kopi Aceh', '2023-06-12 12:17:15', 1, 25000, 25000, '', 'selesai'),
(66, 'Kopi Gayo', '2023-06-16 02:09:27', 1, 80000, 80000, '', 'selesai'),
(67, '', '2023-06-16 02:11:34', 1, 0, 0, '', 'menunggu kurir'),
(68, 'Kopi Aceh', '2023-06-14 06:43:47', 1, 25000, 25000, '', 'menunggu kurir');

-- --------------------------------------------------------

--
-- Table structure for table `tb_keranjang`
--

CREATE TABLE `tb_keranjang` (
  `id_user` int(10) NOT NULL,
  `pesanan` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `harga` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tb_keranjang`
--

INSERT INTO `tb_keranjang` (`id_user`, `pesanan`, `jumlah`, `harga`) VALUES
(2, '8', '1', 12500),
(2, '5', '1', 35000);

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id_pesanan` int(10) NOT NULL,
  `id_user` int(10) NOT NULL,
  `id_toko` int(100) NOT NULL,
  `pesanan` varchar(100) NOT NULL,
  `jumlah` varchar(100) NOT NULL,
  `total` int(100) NOT NULL,
  `status` enum('pending','terkirim','selesai') NOT NULL,
  `waktu` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id_pesanan`, `id_user`, `id_toko`, `pesanan`, `jumlah`, `total`, `status`, `waktu`) VALUES
(1, 1, 1, '3,4', '8,3', 100000, '', '2023-05-25 13:39:06'),
(2, 1, 1, '5,4', '1,2', 20000, 'terkirim', '2023-05-25 13:39:06'),
(14, 2, 1, '5,4', '3,2', 405000, 'terkirim', '2023-05-29 19:14:44'),
(15, 2, 1, '3,4', '1,3', 462500, 'terkirim', '2023-05-30 02:05:29'),
(23, 2, 1, '3,5', '2,1', 60000, 'terkirim', '2023-05-30 19:02:45'),
(24, 2, 3, '8', '2', 25000, 'terkirim', '2023-05-30 19:02:46'),
(25, 2, 1, '3,5', '2,1', 60000, 'terkirim', '2023-05-30 19:03:30'),
(26, 2, 3, '8', '2', 25000, 'terkirim', '2023-05-30 19:03:30'),
(27, 2, 1, '4,3', '1,1', 162500, 'terkirim', '2023-05-30 19:13:59'),
(28, 2, 3, '8', '1', 12500, 'terkirim', '2023-05-30 19:14:46'),
(29, 2, 3, '8', '1', 12500, 'terkirim', '2023-06-02 13:44:59'),
(30, 2, 1, '3', '1', 12500, 'terkirim', '2023-06-02 13:45:00'),
(31, 2, 1, '4,3', '1,1', 162500, 'terkirim', '2023-06-02 13:49:53');

-- --------------------------------------------------------

--
-- Table structure for table `tb_produk`
--

CREATE TABLE `tb_produk` (
  `id_produk` int(5) NOT NULL,
  `id_toko` int(5) NOT NULL,
  `nama_produk` text NOT NULL,
  `berat` int(5) NOT NULL,
  `dimensi` text NOT NULL,
  `deskripsi` text NOT NULL,
  `stok` int(5) NOT NULL,
  `terjual` int(5) NOT NULL DEFAULT 0,
  `harga` int(10) NOT NULL,
  `gambar` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tb_produk`
--

INSERT INTO `tb_produk` (`id_produk`, `id_toko`, `nama_produk`, `berat`, `dimensi`, `deskripsi`, `stok`, `terjual`, `harga`, `gambar`) VALUES
(17, 0, 'Kopi Arabika', 0, '', 'Karakteristik kopi Arabica adalah aroma yang wangi, hidup pada daerah yang dingin dan sejuk, memiliki rasa yang sedikit asam, rasa kental dimulut, pahit, dan juga memiliki tekstur lebih halus. Juga memiliki kadar kafein yang lebih rendah dari kopi robusta.', 100, 0, 20000, 'Bungkus1.png'),
(18, 0, 'Kopi Robusta', 0, '', 'Robusta sering digambarkan sebagai kopi yang pahit atau tajam dengan karakter rasa seperti kayu dan karet. Pahit atau bitter ini berasal dari kandungan kafein yang lebih tinggi pada Robusta jika dibandingkan dengan Arabika.', 100, 0, 20000, 'Bungkus1.png');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `id_toko` int(5) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `username` varchar(10) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `telp` varchar(20) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `password` varchar(32) NOT NULL,
  `level` enum('admin','pemilik','pelanggan','kasir') DEFAULT 'pelanggan',
  `foto_profil` varchar(1000) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `id_toko`, `nama`, `username`, `email`, `telp`, `alamat`, `password`, `level`, `foto_profil`) VALUES
(18, NULL, 'Alif Rangga ', 'Alif', 'Alifrangga@gmail.com', '08123456789', 'Pandegiling, Surabaya, Jawa Timur', 'Alif', 'kasir', NULL),
(19, NULL, 'Ilham Akbar Rachiemullah', 'Ilham', 'Ilhamakbar@gmail.com', '081915880121', 'Keputih, Surabaya', 'Ilham', 'admin', NULL),
(20, NULL, 'Ardha Nurhaskara ', 'Ardha', 'Ardhanur@gmail.com', '081912357381', 'Kebomas, Gresik', 'Ardha', 'pelanggan', NULL),
(21, NULL, 'Gregorius Marcellinus', 'Greg', 'Gregorius@gmail.com', '081912832182', 'Banyu Urip, Surabaya', 'Greg', 'pemilik', NULL),
(232, NULL, 'Dhevand', 'Dhevand', 'Dhevand@Gmail.com', '09182177218', 'Bekasi, Jakarta', 'Dhevand', 'pelanggan', NULL),
(234, NULL, 'Putra', 'Putra', 'Putra@Gmail.com', '0812812712', 'Mojokerto, Jawa Timur', 'Putra', 'pelanggan', NULL),
(235, NULL, 'Kelvin Ahmad', 'Kelvin', 'Kelvin123@gmail.com', '08125236', 'Tuban', 'Kelvin', 'pelanggan', NULL),
(236, NULL, 'Alta', 'Alta', 'Altairyahya@gmail.com', '08127364891', 'Bekasi, Jawa Barat', 'Alta', 'pelanggan', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_keluar`
--
ALTER TABLE `tb_keluar`
  ADD PRIMARY KEY (`id_produk`);

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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_keluar`
--
ALTER TABLE `tb_keluar`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id_pesanan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `tb_produk`
--
ALTER TABLE `tb_produk`
  MODIFY `id_produk` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
