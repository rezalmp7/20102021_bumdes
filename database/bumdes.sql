-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 08, 2021 at 08:51 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bumdes`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `id_produk`, `qty`, `id_pelanggan`, `create_at`) VALUES
(8, 1, 3, 2, '2021-11-06 06:58:03'),
(9, 2, 2, 2, '2021-11-05 03:22:55');

-- --------------------------------------------------------

--
-- Table structure for table `config`
--

CREATE TABLE `config` (
  `id` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `value` int(3) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(8) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `nama`, `create_at`) VALUES
(1, 'Jamu', '2021-11-01 14:18:52'),
(3, 'Aksesoris', '2021-11-01 14:19:29');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id` int(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `jenkel` enum('laki-laki','perempuan') NOT NULL,
  `tgl_lahir` date NOT NULL,
  `alamat` text NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `delete_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id`, `nama`, `jenkel`, `tgl_lahir`, `alamat`, `no_hp`, `username`, `password`, `create_at`, `delete_at`) VALUES
(2, 'Kecank', 'laki-laki', '0000-00-00', 'Ds. Angkatan Lor, Kec. Tambakromo, Kab. Pati', '087721191226', 'kecank', 'e5e07532fea4754b873ba87f88e86aab', '2021-10-31 17:57:21', NULL),
(3, 'Rezal', 'laki-laki', '0000-00-00', 'Pati', '087721191226', 'rezal', '398cb94411a2d4bdc9c7e3058943fc6a', '2021-11-05 07:50:18', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_transaksi`, `id_produk`, `qty`, `harga`, `create_at`) VALUES
(1, 2, 1, 4, 18000, '2021-11-05 03:57:04'),
(2, 2, 2, 2, 15000, '2021-11-05 03:57:04'),
(3, 1, 1, 4, 18000, '2021-11-05 03:57:26'),
(4, 1, 2, 2, 15000, '2021-11-05 03:57:26'),
(5, 2, 1, 4, 18000, '2021-11-05 07:06:01'),
(6, 2, 2, 2, 15000, '2021-11-05 07:06:01'),
(7, 3, 1, 4, 18000, '2021-11-05 07:06:40'),
(8, 3, 2, 2, 15000, '2021-11-05 07:06:40'),
(9, 4, 1, 4, 18000, '2021-11-05 07:09:28'),
(10, 4, 2, 2, 15000, '2021-11-05 07:09:28'),
(11, 5, 1, 4, 18000, '2021-11-06 06:48:05'),
(12, 5, 2, 2, 15000, '2021-11-06 06:48:05'),
(13, 6, 1, 3, 18000, '2021-11-06 06:58:41'),
(14, 6, 2, 2, 15000, '2021-11-06 06:58:41'),
(15, 7, 1, 3, 18000, '2021-11-08 04:19:05'),
(16, 7, 2, 2, 15000, '2021-11-08 04:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id` int(8) NOT NULL,
  `kategori` int(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `umkm` int(8) NOT NULL,
  `harga` bigint(13) NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `status` enum('ada','kosong') NOT NULL DEFAULT 'kosong',
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id`, `kategori`, `nama`, `umkm`, `harga`, `gambar`, `deskripsi`, `status`, `create_at`) VALUES
(1, 1, 'Jamu Tradisional', 2, 18000, 'produk_1.jpg', '<p><strong>SUPER HERBA KENCUR</strong> Merupakan minuman kesehatan herbal alami siap seduh yang baik dikonsumsi Setiap hari. Mampu melegakan tenggorokan dan mengobati batuk serta menjaga kesehatan organ dalam tubuh. Dibuat dari ekstrak rimpang Kencur pilihan yang telah masak sempurna, memberikan rasa yang nikmat dan aroma yang kuat. Berbentuk serbuk dan tanpa Ampas. Tanpa bahan pengawet dan pemanis buatan Dikemas higienis, kuat, rapi dan praktis dijamin AMAN</p><ul><li>Komposisi : Kencur, Gula pasir</li><li>Berat : 200 gram</li><li>Kemasan : Standing pouch food grade</li></ul>', 'ada', '2021-11-08 04:16:20'),
(2, 1, 'Jamu Beras Kencur', 2, 15000, 'produk_2.jpg', '<p>SUPER HERBA KUNYIT Merupakan minuman kesehatan herbal alami siap seduh yang baik dikonsumsi Setiap hari. Baik untuk menjaga daya tahan tubuh dan menjaga kesehatan organ dalam. Dibuat dari ekstrak rimpang Kunyit pilihan yang telah masak sempurna, memberikan rasa dan aroma yang kuat. Berbentuk serbuk dan tanpa Ampas. Tanpa bahan pengawet dan pemanis buatan Dikemas higienis, kuat, dan praktis dijamin AMAN</p><ul><li>Komposisi : Kunyit, Gula pasir&nbsp;</li><li>Berat : 200 gram&nbsp;</li><li>Kemasan : Standing pouch</li></ul>', 'ada', '2021-11-08 04:16:23');

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `id` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `rating` int(1) NOT NULL,
  `comment` text NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rating`
--

INSERT INTO `rating` (`id`, `id_produk`, `id_pelanggan`, `rating`, `comment`, `create_at`) VALUES
(1, 2, 2, 4, 'Enak Sekali Jamunya', '2021-11-08 02:40:05');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `ref` varchar(10) NOT NULL,
  `reference` varchar(50) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `nohp_penerima` varchar(13) NOT NULL,
  `alamat_penerima` text NOT NULL,
  `sub_harga` int(11) NOT NULL,
  `admin` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `note` text DEFAULT NULL,
  `metode_pembayaran` varchar(50) NOT NULL,
  `metode_pengiriman` enum('cod','kirim') NOT NULL,
  `status` enum('unpaid','paid','process','done','cancel','expired') NOT NULL DEFAULT 'unpaid',
  `paid_at` timestamp NULL DEFAULT NULL,
  `cancel_at` timestamp NULL DEFAULT NULL,
  `process_at` timestamp NULL DEFAULT NULL,
  `done_at` timestamp NULL DEFAULT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id`, `ref`, `reference`, `id_pelanggan`, `nama_penerima`, `nohp_penerima`, `alamat_penerima`, `sub_harga`, `admin`, `total_harga`, `note`, `metode_pembayaran`, `metode_pengiriman`, `status`, `paid_at`, `cancel_at`, `process_at`, `done_at`, `create_at`) VALUES
(1, '1', '', 2, 'Kecank', '087721191226', 'Pati', 0, 0, 0, '', 'MANDIRIVA', 'cod', 'unpaid', NULL, NULL, NULL, NULL, '2021-11-05 07:30:43'),
(2, '2', '', 2, 'Kecank', '087721191226', 'kecank', 0, 0, 0, '', 'BNIVA', 'cod', 'unpaid', NULL, NULL, NULL, NULL, '2021-11-05 07:30:43'),
(3, '3', '', 2, 'Kecank', '087721191226', 'kecank', 0, 0, 0, '', 'BNIVA', 'cod', 'unpaid', NULL, NULL, NULL, NULL, '2021-11-05 07:30:43'),
(4, '4', 'DEV-T451227066VABU5', 2, 'Kecank', '087721191226', 'kecank', 102000, 4500, 106000, '', 'BNIVA', 'cod', 'done', '2021-11-05 04:56:53', NULL, '2021-11-05 05:27:19', '2021-11-05 05:28:16', '2021-11-05 11:28:16'),
(5, '5', 'DEV-T451227134RGRWP', 2, 'Kecank', '087721191226', 'Ds. Angkatan Lor, Kec. Tambakromo, Kab Pati', 0, 0, 0, '', 'BRIVA', 'cod', 'done', '2021-11-06 00:49:36', NULL, '2021-11-06 00:51:19', '2021-11-06 00:51:26', '2021-11-06 06:51:26'),
(6, '6', 'DEV-T451227136ISMDY', 2, 'Rezal Wahyu Pratama', '087721191226', 'Ds. Angkatan Lor, Kec. Tambakromo, Kab. Pati', 0, 0, 0, '', 'BRIVA', 'cod', 'done', '2021-11-06 01:01:58', NULL, '2021-11-06 01:02:12', '2021-11-06 01:02:19', '2021-11-06 07:02:19'),
(7, '7', 'DEV-T451227208T589W', 2, 'Rezal Wahyu Pratama', '087721191226', 'Ds. Angkatan Lor, Kec. Tambakromo, Kab. Pati', 84000, 4250, 88250, '', 'BRIVA', 'cod', 'unpaid', NULL, NULL, NULL, NULL, '2021-11-08 04:19:05');

-- --------------------------------------------------------

--
-- Table structure for table `umkm`
--

CREATE TABLE `umkm` (
  `id` int(8) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `phone` bigint(13) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `umkm`
--

INSERT INTO `umkm` (`id`, `nama`, `alamat`, `phone`, `create_at`) VALUES
(2, 'Rezal Wahyu Pratama', 'Ds. Angkatan Lor, Kec. Tambakromo, Kab. Pati', 8721191226, '2021-10-23 14:55:00');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(8) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `create_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `password`, `create_at`) VALUES
(1, 'admin', 'admin', '21232f297a57a5a743894a0e4a801fc3', '2021-10-22 19:54:41');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(8) NOT NULL,
  `id_produk` int(8) NOT NULL,
  `id_pelanggan` int(8) NOT NULL,
  `create_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `id_produk`, `id_pelanggan`, `create_at`) VALUES
(4, 2, 2, '2021-11-06 07:06:48'),
(5, 1, 2, '2021-11-06 07:08:08');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `config`
--
ALTER TABLE `config`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `umkm`
--
ALTER TABLE `umkm`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `config`
--
ALTER TABLE `config`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `umkm`
--
ALTER TABLE `umkm`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(8) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
