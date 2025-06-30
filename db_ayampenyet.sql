-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 30 Jun 2025 pada 15.39
-- Versi Server: 10.1.29-MariaDB
-- PHP Version: 7.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_ayampenyet`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `inbox`
--

CREATE TABLE `inbox` (
  `InboxID` varchar(15) NOT NULL,
  `SenderID` int(11) NOT NULL,
  `Pesan` varchar(50) NOT NULL,
  `WaktuInbox` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `inbox`
--

INSERT INTO `inbox` (`InboxID`, `SenderID`, `Pesan`, `WaktuInbox`) VALUES
('A406725341', 17, 'Halo admin, bisakah saya meminta bantuan?', '2024-09-03 06:48:03'),
('A406725341', 17, 'Halo admin, bisakah saya meminta bantuan?', '2024-09-03 06:51:28'),
('A406725341', 17, 'Halo admin, bisakah saya meminta bantuan?', '2024-09-23 08:24:29'),
('A406725341', 17, 'Halo admin, bisakah saya meminta bantuan?', '2024-09-23 08:26:48');

-- --------------------------------------------------------

--
-- Struktur dari tabel `informasi`
--

CREATE TABLE `informasi` (
  `InformasiID` int(11) NOT NULL,
  `SenderID` int(11) NOT NULL,
  `pesan` text NOT NULL,
  `CurrentAt` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `ProductID` int(11) NOT NULL,
  `GambarProduk` varchar(50) NOT NULL DEFAULT 'logo.png',
  `KategoriProduk` enum('minuman','makanan') NOT NULL,
  `NamaProduk` varchar(250) NOT NULL,
  `HargaProduk` float NOT NULL,
  `JumlahProduk` int(11) NOT NULL DEFAULT '50',
  `StokProduk` enum('ada','habis') NOT NULL,
  `DeskripsiProduk` varchar(100) NOT NULL,
  `WaktuProduksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`ProductID`, `GambarProduk`, `KategoriProduk`, `NamaProduk`, `HargaProduk`, `JumlahProduk`, `StokProduk`, `DeskripsiProduk`, `WaktuProduksi`) VALUES
(32, '668d3e2d625e2.jpg', 'minuman', 'Es teh', 5000, 20, 'ada', 'Seger banget nih es tehnya', '2024-07-08 09:43:23'),
(38, '66f5eb5d7d0ce.png', 'makanan', 'ayam geprek', 13000, 0, 'ada', 'enak euy', '2024-09-26 23:16:45'),
(39, '66f5ec3c0557c.jpg', 'minuman', 'es jeruk', 5000, 0, 'ada', 'seger nih enak bangett', '2024-09-26 23:20:09'),
(40, '66f65239b4560.png', 'makanan', 'ayam', 10000, 50, 'ada', 'ayam\r\n', '2024-09-27 06:35:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `riwayat_tranksaksi`
--

CREATE TABLE `riwayat_tranksaksi` (
  `HistoryID` int(11) NOT NULL,
  `WaktuHistory` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `TranksaksiID` varchar(255) NOT NULL,
  `UserID` int(11) NOT NULL,
  `TotalHarga` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `riwayat_tranksaksi`
--

INSERT INTO `riwayat_tranksaksi` (`HistoryID`, `WaktuHistory`, `TranksaksiID`, `UserID`, `TotalHarga`) VALUES
(24, '2024-09-27 00:24:11', '2045556516', 17, 23000),
(25, '2024-09-27 01:18:32', '683051170', 17, 67000),
(26, '2024-09-27 01:20:21', '1840771190', 17, 10000),
(27, '2024-09-27 01:37:19', '2115111689', 22, 10000),
(28, '2024-09-27 01:46:18', '1133230951', 17, 13000),
(29, '2024-09-27 01:50:42', '10438976', 17, 13000),
(30, '2024-09-27 02:01:04', '2113581490', 21, 46000),
(31, '2024-09-27 02:07:46', '1939090077', 17, 23000),
(32, '2024-09-27 02:13:09', '1906529689', 17, 13000),
(33, '2024-09-27 02:29:32', '2135729722', 21, 28000),
(34, '2024-09-27 02:32:39', '1316509024', 23, 125000),
(35, '2024-09-27 02:38:20', '1079118871', 23, 20000),
(36, '2024-09-27 02:43:56', '1181969238', 23, 10000),
(37, '2024-09-27 03:00:30', '1036994394', 21, 23000),
(38, '2024-09-27 03:18:24', '964850201', 17, 36000),
(39, '2024-09-27 03:27:46', '843269825', 17, 70000),
(40, '2024-09-27 03:31:52', '1834452267', 17, 5000),
(41, '2024-09-27 03:35:23', '1407368179', 17, 23000),
(42, '2024-09-27 03:40:40', '1973375942', 17, 23000),
(43, '2024-09-27 04:04:13', '666414933', 17, 10000),
(44, '2024-09-27 04:31:17', '406547802', 24, 18000),
(45, '2024-09-27 06:29:15', '401962980', 21, 15000),
(46, '2024-09-27 06:37:44', '1708566320', 21, 40000),
(47, '2024-09-27 06:42:58', '1382382893', 17, 36000),
(48, '2024-09-27 07:06:53', '1216110582', 17, 41000),
(49, '2024-09-27 08:22:17', '2064853397', 17, 12000),
(50, '2024-09-29 03:50:40', '593236266', 17, 41000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `room_inbox`
--

CREATE TABLE `room_inbox` (
  `RoomID` varchar(15) NOT NULL,
  `AdminID` int(11) DEFAULT NULL,
  `UserID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `room_inbox`
--

INSERT INTO `room_inbox` (`RoomID`, `AdminID`, `UserID`) VALUES
('A406721345', NULL, 22),
('A406725341', NULL, 17),
('A406734215', NULL, 21),
('A406735142', NULL, 24),
('A406753412', NULL, 23);

-- --------------------------------------------------------

--
-- Struktur dari tabel `shopping_cart`
--

CREATE TABLE `shopping_cart` (
  `ShoppingID` varchar(20) NOT NULL,
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `TotalHarga` int(11) NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tranksaksi`
--

CREATE TABLE `tranksaksi` (
  `TranksaksiID` varchar(255) NOT NULL,
  `WaktuTranksaksi` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `UserID` int(11) NOT NULL,
  `ProductID` int(11) NOT NULL,
  `TotalHarga` float NOT NULL,
  `quantity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tranksaksi`
--

INSERT INTO `tranksaksi` (`TranksaksiID`, `WaktuTranksaksi`, `UserID`, `ProductID`, `TotalHarga`, `quantity`) VALUES
('2045556516', '2024-09-27 00:24:11', 17, 32, 10000, 2),
('683051170', '2024-09-27 01:18:32', 17, 32, 15000, 3),
('1840771190', '2024-09-27 01:20:21', 17, 32, 10000, 2),
('2115111689', '2024-09-27 01:37:19', 22, 32, 10000, 2),
('2113581490', '2024-09-27 02:01:04', 21, 38, 26000, 2),
('2113581490', '2024-09-27 02:01:04', 21, 39, 10000, 2),
('2113581490', '2024-09-27 02:01:04', 21, 32, 10000, 2),
('1939090077', '2024-09-27 02:07:46', 17, 32, 10000, 2),
('1939090077', '2024-09-27 02:07:46', 17, 38, 13000, 1),
('1906529689', '2024-09-27 02:13:08', 17, 38, 13000, 1),
('2135729722', '2024-09-27 02:29:32', 21, 32, 10000, 2),
('2135729722', '2024-09-27 02:29:32', 21, 38, 13000, 1),
('2135729722', '2024-09-27 02:29:32', 21, 39, 5000, 1),
('1316509024', '2024-09-27 02:32:39', 23, 32, 40000, 8),
('1316509024', '2024-09-27 02:32:39', 23, 38, 65000, 5),
('1316509024', '2024-09-27 02:32:39', 23, 39, 20000, 4),
('1079118871', '2024-09-27 02:38:20', 23, 32, 20000, 4),
('1181969238', '2024-09-27 02:43:56', 23, 32, 10000, 2),
('1036994394', '2024-09-27 03:00:30', 21, 32, 10000, 2),
('1036994394', '2024-09-27 03:00:30', 21, 38, 13000, 1),
('964850201', '2024-09-27 03:18:24', 17, 38, 26000, 2),
('964850201', '2024-09-27 03:18:24', 17, 32, 5000, 1),
('964850201', '2024-09-27 03:18:24', 17, 39, 5000, 1),
('843269825', '2024-09-27 03:27:46', 17, 38, 65000, 5),
('843269825', '2024-09-27 03:27:46', 17, 32, 5000, 1),
('1834452267', '2024-09-27 03:31:52', 17, 32, 5000, 1),
('1407368179', '2024-09-27 03:35:23', 17, 32, 5000, 1),
('1407368179', '2024-09-27 03:35:23', 17, 38, 13000, 1),
('1407368179', '2024-09-27 03:35:23', 17, 39, 5000, 1),
('1973375942', '2024-09-27 03:40:40', 17, 38, 13000, 1),
('1973375942', '2024-09-27 03:40:40', 17, 39, 5000, 1),
('1973375942', '2024-09-27 03:40:40', 17, 32, 5000, 1),
('666414933', '2024-09-27 04:04:13', 17, 39, 10000, 2),
('406547802', '2024-09-27 04:31:17', 24, 38, 13000, 1),
('406547802', '2024-09-27 04:31:17', 24, 39, 5000, 1),
('401962980', '2024-09-27 06:29:15', 21, 32, 15000, 3),
('1708566320', '2024-09-27 06:37:44', 21, 32, 20000, 4),
('1708566320', '2024-09-27 06:37:44', 21, 40, 20000, 2),
('1382382893', '2024-09-27 06:42:57', 17, 32, 10000, 2),
('1382382893', '2024-09-27 06:42:58', 17, 38, 26000, 2),
('1216110582', '2024-09-27 07:06:53', 17, 38, 26000, 2),
('1216110582', '2024-09-27 07:06:53', 17, 39, 15000, 3),
('2064853397', '2024-09-27 08:22:17', 17, 32, 10000, 2),
('593236266', '2024-09-29 03:50:40', 17, 32, 10000, 2),
('593236266', '2024-09-29 03:50:40', 17, 38, 26000, 2),
('593236266', '2024-09-29 03:50:40', 17, 39, 5000, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `UserID` int(11) NOT NULL,
  `Username` varchar(50) NOT NULL,
  `NamaLengkap` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `NoTelp` varchar(13) NOT NULL,
  `Password` varchar(250) NOT NULL,
  `Role` enum('user','admin','','') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`UserID`, `Username`, `NamaLengkap`, `Email`, `NoTelp`, `Password`, `Role`) VALUES
(17, 'rafly', 'rafly saputra', '966raflisaputra@gmail.com', '085211686355', '$2y$10$7WL0Qu4jIynjBSJ4FSCHIeSQqhn91lHgZBrNYHT3V9uKXT1/It72u', 'user'),
(21, 'lili', 'lili ramadhani', 'mamanrembo636@gmail.com', '085333369015', '$2y$10$deOJRMC2CTXgmNB7DA5eJOcnYYjcScJi7LOINeNqWrsANy7XBeLsa', 'admin'),
(22, 'ridho', 'ridho aji', 'ridho@gmail.com', '0863213213', '$2y$10$z55Suzu/vXaOCE3XTpmyEOmp2OkemqmK8TkwI1VpgcMqdBWcLr8Ie', 'user'),
(23, 'tititgede237', 'kudahitam', 'filuthrido237@gmail.com', '082268573943', '$2y$10$W4IMAXwhhPsXLYxoTWAhi.Swsfuy7quwPrLRWK7W8fKT0IaUTY37i', 'user'),
(24, 'sabrina', 'sabrina cantik', 'sabrinanurhasanah09@gmail.com', '0894714581439', '$2y$10$DqKAa0hC2CxaUi/5oOFe/OatlisSOtDwXKLLvalXqTAAMRJfHXcnO', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `inbox`
--
ALTER TABLE `inbox`
  ADD KEY `inbox_ibfk_2` (`SenderID`),
  ADD KEY `inbox_ibfk_3` (`InboxID`);

--
-- Indexes for table `informasi`
--
ALTER TABLE `informasi`
  ADD PRIMARY KEY (`InformasiID`),
  ADD KEY `SenderID` (`SenderID`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`ProductID`);

--
-- Indexes for table `riwayat_tranksaksi`
--
ALTER TABLE `riwayat_tranksaksi`
  ADD PRIMARY KEY (`HistoryID`),
  ADD KEY `riwayat_tranksaksi_ibfk_1` (`UserID`);

--
-- Indexes for table `room_inbox`
--
ALTER TABLE `room_inbox`
  ADD PRIMARY KEY (`RoomID`),
  ADD KEY `room_inbox_ibfk_1` (`AdminID`),
  ADD KEY `room_inbox_ibfk_2` (`UserID`);

--
-- Indexes for table `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD KEY `ProductID` (`ProductID`),
  ADD KEY `shopping_cart_ibfk_1` (`UserID`);

--
-- Indexes for table `tranksaksi`
--
ALTER TABLE `tranksaksi`
  ADD KEY `tranksaksi_ibfk_1` (`UserID`),
  ADD KEY `tranksaksi_ibfk_2` (`ProductID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`UserID`),
  ADD UNIQUE KEY `Username` (`Username`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `NoTelp` (`NoTelp`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `informasi`
--
ALTER TABLE `informasi`
  MODIFY `InformasiID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `ProductID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `riwayat_tranksaksi`
--
ALTER TABLE `riwayat_tranksaksi`
  MODIFY `HistoryID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `UserID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `inbox`
--
ALTER TABLE `inbox`
  ADD CONSTRAINT `inbox_ibfk_2` FOREIGN KEY (`SenderID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `inbox_ibfk_3` FOREIGN KEY (`InboxID`) REFERENCES `room_inbox` (`RoomID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `informasi`
--
ALTER TABLE `informasi`
  ADD CONSTRAINT `informasi_ibfk_1` FOREIGN KEY (`SenderID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `riwayat_tranksaksi`
--
ALTER TABLE `riwayat_tranksaksi`
  ADD CONSTRAINT `riwayat_tranksaksi_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `room_inbox`
--
ALTER TABLE `room_inbox`
  ADD CONSTRAINT `room_inbox_ibfk_1` FOREIGN KEY (`AdminID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `room_inbox_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `shopping_cart`
--
ALTER TABLE `shopping_cart`
  ADD CONSTRAINT `shopping_cart_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `shopping_cart_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `produk` (`ProductID`);

--
-- Ketidakleluasaan untuk tabel `tranksaksi`
--
ALTER TABLE `tranksaksi`
  ADD CONSTRAINT `tranksaksi_ibfk_1` FOREIGN KEY (`UserID`) REFERENCES `users` (`UserID`) ON UPDATE CASCADE,
  ADD CONSTRAINT `tranksaksi_ibfk_2` FOREIGN KEY (`ProductID`) REFERENCES `produk` (`ProductID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
