-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 01, 2023 at 01:14 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `apotek`
--

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `id` int(11) NOT NULL,
  `nama` varchar(56) NOT NULL,
  `alamat` varchar(225) NOT NULL,
  `tgl_pesan` datetime NOT NULL,
  `batas_bayar` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`id`, `nama`, `alamat`, `tgl_pesan`, `batas_bayar`) VALUES
(1, 'RIFQI FACHRUL ROZI', 'Karawang', '2023-12-01 01:19:40', '2023-12-02 01:19:40'),
(2, 'DADAN SUNARYA', 'CIKARANG', '2023-12-01 01:56:17', '2023-12-02 01:56:17'),
(3, 'DADAN SUNARYA', 'CIKARANG', '2023-12-01 15:35:15', '2023-12-02 15:35:15'),
(4, 'RIFQI FACHRUL ROZI', 'Karawang', '2023-12-01 17:23:48', '2023-12-02 17:23:48'),
(5, '', '', '2023-12-01 17:26:52', '2023-12-02 17:26:52'),
(6, '', '', '2023-12-01 17:27:28', '2023-12-02 17:27:28'),
(7, '', '', '2023-12-01 17:27:57', '2023-12-02 17:27:57'),
(8, '', '', '2023-12-01 17:29:13', '2023-12-02 17:29:13'),
(9, '', '', '2023-12-01 17:34:48', '2023-12-02 17:34:48'),
(10, '', '', '2023-12-01 17:36:46', '2023-12-02 17:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `kategori` varchar(118) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id`, `kategori`) VALUES
(1, 'Vitamin'),
(2, 'Obat Batuk'),
(3, 'Obat Sakit Gigi'),
(4, 'Obat Pusing'),
(5, 'Obat Lambung'),
(6, 'Obat Gula'),
(7, 'Obat Demam'),
(8, 'Obat Darah Tinggi');

-- --------------------------------------------------------

--
-- Table structure for table `obat`
--

CREATE TABLE `obat` (
  `id` int(11) NOT NULL,
  `nama_obat` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `pembuat` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) NOT NULL,
  `dibeli` int(11) NOT NULL,
  `image` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL DEFAULT 'obat-default-cover.jpg'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `obat`
--

INSERT INTO `obat` (`id`, `nama_obat`, `id_kategori`, `pembuat`, `harga`, `stok`, `dibeli`, `image`) VALUES
(1, 'Sanmol', 7, 'SANBE FARMA', 7000, 13, 0, 'sanmol.jpg'),
(2, 'Termorex Sirup', 7, 'KONIMEX', 12000, 9, 0, 'termorex.jpg'),
(3, 'Hufagrif Tablet', 7, 'HUSADA FARMA', 9000, 5, 0, 'hufagrif.jpeg'),
(4, 'Promag Gazero', 5, 'KALBE', 15000, 8, 0, 'promag.jpg'),
(5, 'Polysilane', 5, 'PHAROS', 27000, 3, 0, 'polysilane_cair.jpg'),
(6, 'Mylanta', 5, 'INFIRST HEATHCARE USA', 23000, 3, 0, 'mylanta.jpeg'),
(7, 'OB Herbal', 2, 'DELTOMED LAB', 10000, 17, 0, 'Ob herbal.png'),
(8, 'Konidin Sirup', 2, 'KONIMEX', 13000, 4, 0, 'konidin.png'),
(9, 'Komix Herbal', 2, 'KALBE', 14000, 6, 0, 'komik.png'),
(10, 'Paramex', 4, 'KONIMEX', 4000, 18, 0, 'paramex.png'),
(11, 'Bodrex Extra', 4, 'BODE', 5000, 20, 0, 'bodrex.jpg'),
(12, 'Vermifit', 4, 'NATURE INDO', 25000, 6, 0, 'vermfit.jpeg'),
(13, 'Fatigon', 1, 'KALBE', 12000, 9, 0, 'fatigon.jpg'),
(14, 'Redoxon', 1, 'KIMIA FARMA', 16000, 7, 0, 'redoxone.jpg'),
(15, 'Vitacimin', 1, 'KIMIA FARMA', 2500, 15, 0, 'vitacimin.jpeg'),
(18, 'Panadol', 4, 'KONIMEX', 6000, 5, 0, 'panadol1.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `pesanan`
--

CREATE TABLE `pesanan` (
  `id` int(11) NOT NULL,
  `id_invoice` int(11) NOT NULL,
  `id_obat` int(11) NOT NULL,
  `nama_obat` varchar(50) NOT NULL,
  `jumlah` int(3) NOT NULL,
  `harga` int(10) NOT NULL,
  `pilihan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pesanan`
--

INSERT INTO `pesanan` (`id`, `id_invoice`, `id_obat`, `nama_obat`, `jumlah`, `harga`, `pilihan`) VALUES
(1, 1, 4, 'Promag Gazero', 2, 15000, ''),
(2, 1, 1, 'Sanmol', 1, 7000, ''),
(3, 2, 2, 'Termorex Sirup', 1, 12000, ''),
(4, 2, 3, 'Hufagrif Tablet', 1, 9000, ''),
(5, 2, 6, 'Mylanta', 1, 23000, ''),
(6, 4, 1, 'Sanmol', 2, 7000, ''),
(7, 5, 1, 'Sanmol', 3, 7000, ''),
(8, 6, 5, 'Polysilane', 1, 27000, ''),
(9, 7, 5, 'Polysilane', 1, 27000, ''),
(10, 8, 5, 'Polysilane', 1, 27000, ''),
(12, 10, 5, 'Polysilane', 1, 27000, '');

--
-- Triggers `pesanan`
--
DELIMITER $$
CREATE TRIGGER `pesanan` AFTER INSERT ON `pesanan` FOR EACH ROW BEGIN
	UPDATE obat SET stok = stok-NEW.jumlah
    WHERE id = NEW.id_obat;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` int(11) NOT NULL,
  `role` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `role`) VALUES
(1, 'Admin'),
(2, 'Member');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(16) NOT NULL,
  `nama` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(50) NOT NULL,
  `email` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `no_telp` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `image` varchar(128) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `password` varchar(258) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `role_id` int(11) NOT NULL,
  `tanggal_input` timestamp(6) NOT NULL DEFAULT current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `username`, `email`, `no_telp`, `image`, `password`, `role_id`, `tanggal_input`) VALUES
(1, 'ADMIN', 'admin', 'admin1@gmail.com', '02122113', 'admin.png', '123', 1, '2023-12-01 10:40:35.000000'),
(2, 'user', 'user', 'user1@gmail.com', '0838889098', 'user.jpg', '000', 2, '2023-12-01 12:04:16.000000');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `obat`
--
ALTER TABLE `obat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `obat`
--
ALTER TABLE `obat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `pesanan`
--
ALTER TABLE `pesanan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(16) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
