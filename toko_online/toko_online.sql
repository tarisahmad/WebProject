-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2022 at 06:46 AM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_barang`
--

CREATE TABLE `tb_barang` (
  `Id_brg` int(11) NOT NULL,
  `Nama_brg` varchar(120) NOT NULL,
  `Keterangan` varchar(225) NOT NULL,
  `Kategori` varchar(60) NOT NULL,
  `Harga` int(11) NOT NULL,
  `Stok` int(4) NOT NULL,
  `Gambar` varchar(400) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_barang`
--

INSERT INTO `tb_barang` (`Id_brg`, `Nama_brg`, `Keterangan`, `Kategori`, `Harga`, `Stok`, `Gambar`) VALUES
(1, 'Sepatu', 'Sepatu merk Converse', 'Sepatu', 350000, 10, 'sepatu.jpg'),
(2, 'Jam Tangan', 'Jam Tangan kayu merk Garvinoes', 'Aksesoris', 550000, 29, 'garvinoes.jpg'),
(3, 'Topi Bucket', 'Topi Bucket warna coklat size M', 'Aksesoris', 65000, 30, 'topi bucket.jpg'),
(4, 'Topi Baseball', 'Topi baseball polos warna hitam', 'Aksesoris', 55000, 25, 'topiitem.jpg'),
(5, 'Celana Jogger', 'Celana Jogger warna hitam size 27', 'Celana', 200000, 19, 'jogger.jpg'),
(6, 'Kaos Polos', 'Kaos Polos warna hitam size M', 'Kaos', 65000, 49, 'kaos item.jpg'),
(7, 'Kemeja Kantor', 'Kemeja polos warna putih size M lengan pendek', 'Kemeja', 200000, 25, 'kemejaputih.jpg'),
(8, 'Sepatu Vans', 'Sepatu Vans original warna hitam size 33', 'Sepatu', 500000, 29, 'vans.jpg'),
(9, 'Celana Jeans', 'Jeans Slimfit warna hitam size 29', 'Celana', 150000, 43, 'jeans.jpg'),
(10, 'Celana Chinos', 'Chinos slimfit warna abu abu size 27', 'Celana', 250000, 33, 'chino.jpg'),
(11, 'Kaos Polos', 'Kaos Polos warna putih size M', 'Kaos', 65000, 30, 'kaosputih.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tb_invoice`
--

CREATE TABLE `tb_invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_invoice`
--

INSERT INTO `tb_invoice` (`id`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(1, 'Irfansyah', 'Klipang Permai, Sendangmulyo, Tembalang, Semarang, Jawa Tengah', '2021-07-19 20:14:15', '2021-07-20 20:14:15');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pesanan`
--

CREATE TABLE `tb_pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_brg` int(11) NOT NULL,
  `nama_brg` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_pesanan`
--

INSERT INTO `tb_pesanan` (`id`, `id_invoice`, `id_brg`, `nama_brg`, `jumlah`, `harga`, `pilihan`) VALUES
(1, 2, 1, 'Sepatu', 1, 300000, ''),
(2, 2, 2, 'Kamera', 1, 5000000, ''),
(3, 3, 2, 'Kamera', 1, 5000000, ''),
(4, 3, 3, 'Handphone', 1, 3400000, ''),
(5, 3, 7, 'Laptop', 1, 4500000, ''),
(6, 4, 2, 'Kamera', 1, 5000000, ''),
(7, 5, 1, 'Sepatu', 1, 300000, ''),
(8, 1, 2, 'Jam Tangan', 1, 550000, ''),
(9, 1, 8, 'Sepatu Vans', 1, 500000, ''),
(10, 1, 5, 'Celana Jogger', 1, 200000, ''),
(11, 1, 6, 'Kaos Polos', 1, 65000, '');

--
-- Triggers `tb_pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan_penjualan` AFTER INSERT ON `tb_pesanan` FOR EACH ROW BEGIN
	UPDATE tb_barang SET Stok = Stok-NEW.jumlah
    WHERE Id_brg = NEW.Id_brg;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `role_id` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`id`, `nama`, `username`, `password`, `role_id`) VALUES
(1, 'admin', 'admin', '123', 1),
(2, 'user', 'user', '123', 2),
(3, 'Irfansyah', 'irfansy_ah', '123', 2),
(4, 'ayah', 'ayahh', '123', 2);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_barang`
--
ALTER TABLE `tb_barang`
  ADD PRIMARY KEY (`Id_brg`);

--
-- Indexes for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_barang`
--
ALTER TABLE `tb_barang`
  MODIFY `Id_brg` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tb_invoice`
--
ALTER TABLE `tb_invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tb_pesanan`
--
ALTER TABLE `tb_pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
