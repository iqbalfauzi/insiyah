-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 17 Nov 2020 pada 03.21
-- Versi server: 10.3.16-MariaDB
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `shopping`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin','seller','','') NOT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`, `level`, `creationDate`, `updationDate`) VALUES
(1, 'admin', 'admin', 'admin', '2017-01-24 16:21:18', '21-06-2018 08:27:55 PM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bobot`
--

CREATE TABLE `bobot` (
  `id_bobot` int(11) NOT NULL,
  `id_kriteria_bobot` int(11) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bobot`
--

INSERT INTO `bobot` (`id_bobot`, `id_kriteria_bobot`, `bobot`) VALUES
(1, 1, 0.256400249726916),
(2, 2, 0.337899801632973),
(3, 3, 0.0509777893271217),
(4, 4, 0.146858017974399),
(5, 5, 0.107252496987473),
(6, 6, 0.0251924279115781),
(7, 7, 0.0754192164395394);

-- --------------------------------------------------------

--
-- Struktur dari tabel `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `categoryName` varchar(255) DEFAULT NULL,
  `categoryDescription` longtext DEFAULT NULL,
  `creationDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `category`
--

INSERT INTO `category` (`id`, `categoryName`, `categoryDescription`, `creationDate`, `updationDate`) VALUES
(2, 'Atasan', 'Baju Atasan ada kemeja, tunik, piyama (baju+celana)', '2020-09-06 16:56:09', NULL),
(3, 'Celana Panjang', 'Ada banyak Celana Panjang di toko ini\r\nsilahkan cek di toko empat saudara', '2017-01-24 19:17:37', '03-04-2020 09:56:19 AM'),
(4, 'Electronics', 'Electronic Products', '2017-01-24 19:19:32', ''),
(5, 'Mukena', 'Mukena', '2020-09-06 20:49:47', NULL),
(6, 'Gamis', 'Fashion', '2017-02-20 19:18:52', ''),
(7, 'Hijab', 'Hijab segi empat, pasmina, dan lain-lain', '2020-03-10 18:53:28', NULL),
(8, 'Penjual', 'Penjual Product', '2020-04-11 01:34:26', '11-04-2020 07:04:38 AM');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id_kriteria`, `nama_kriteria`) VALUES
(1, 'harga'),
(2, 'kualitas'),
(3, 'merk'),
(4, 'kecepatan'),
(5, 'respon'),
(6, 'strategi'),
(7, 'kemudahan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` varchar(255) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `orderDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `paymentMethod` varchar(50) DEFAULT NULL,
  `orderStatus` varchar(55) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `orders`
--

INSERT INTO `orders` (`id`, `userId`, `productId`, `quantity`, `orderDate`, `paymentMethod`, `orderStatus`) VALUES
(1, 1, '3', 1, '2017-03-07 19:32:57', 'COD', NULL),
(2, 1, '17', 1, '2017-03-08 16:14:17', 'COD', 'in Process'),
(8, 3, '22', 1, '2020-06-24 16:57:33', NULL, NULL),
(10, 3, '16', 1, '2020-06-24 17:02:21', NULL, NULL),
(11, 3, '19', 1, '2020-06-24 17:02:21', NULL, NULL),
(12, 3, '21', 1, '2020-06-24 17:02:22', NULL, NULL),
(13, 3, '6', 1, '2020-06-24 17:08:18', NULL, NULL),
(14, 3, '12', 1, '2020-06-24 17:08:18', NULL, NULL),
(15, 3, '1', 1, '2020-06-24 17:10:53', NULL, NULL),
(16, 3, '20', 1, '2020-06-24 17:10:54', NULL, NULL),
(17, 4, '2', 1, '2020-08-11 13:49:52', 'COD', 'Delivered'),
(18, 1, '15', 1, '2020-08-11 14:34:11', 'COD', NULL),
(19, 1, '15', 1, '2020-08-11 14:34:50', 'COD', NULL),
(20, 1, '1', 1, '2020-08-11 14:37:37', 'COD', NULL),
(21, 4, '2', 1, '2020-08-14 17:35:47', 'COD', NULL),
(22, 4, '1', 1, '2020-08-23 08:32:03', 'COD', NULL),
(23, 5, '2', 1, '2020-08-25 07:10:19', 'COD', NULL),
(24, 6, '15', 1, '2020-09-06 17:06:21', 'Internet Banking', 'Delivered'),
(25, 6, '16', 1, '2020-09-06 20:37:11', 'COD', NULL),
(26, 6, '8', 1, '2020-09-06 21:44:17', 'COD', 'Delivered'),
(27, 6, '19', 1, '2020-09-17 11:12:45', 'COD', NULL),
(28, 6, '18', 1, '2020-10-04 14:20:12', 'COD', NULL),
(29, 6, '21', 1, '2020-10-21 12:35:29', 'Internet Banking', NULL),
(30, 6, '9', 1, '2020-10-21 12:46:23', 'Internet Banking', NULL),
(31, 6, '16', 1, '2020-11-17 02:03:07', 'Internet Banking', NULL),
(32, 6, '20', 1, '2020-11-17 02:03:07', 'Internet Banking', NULL),
(33, 6, '16', 1, '2020-11-17 02:05:22', 'Internet Banking', NULL),
(34, 6, '20', 1, '2020-11-17 02:05:22', 'Internet Banking', NULL),
(35, 6, '22', 1, '2020-11-17 02:18:48', NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ordertrackhistory`
--

CREATE TABLE `ordertrackhistory` (
  `id` int(11) NOT NULL,
  `orderId` int(11) DEFAULT NULL,
  `status` varchar(255) DEFAULT NULL,
  `remark` mediumtext DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `ordertrackhistory`
--

INSERT INTO `ordertrackhistory` (`id`, `orderId`, `status`, `remark`, `postingDate`) VALUES
(1, 3, 'in Process', 'Order has been Shipped.', '2017-03-10 19:36:45'),
(2, 1, 'Delivered', 'Order Has been delivered', '2017-03-10 19:37:31'),
(3, 3, 'Delivered', 'Product delivered successfully', '2017-03-10 19:43:04'),
(4, 4, 'in Process', 'Product ready for Shipping', '2017-03-10 19:50:36'),
(5, 17, 'Delivered', 'oke', '2020-08-11 14:32:32'),
(6, 24, 'Delivered', 'sduah dikirim', '2020-09-06 20:35:59'),
(7, 26, 'in Process', 'pesankan sdg diproses', '2020-09-06 21:45:10'),
(8, 26, 'Delivered', 'wes rwko', '2020-09-06 21:45:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian_rating`
--

CREATE TABLE `penilaian_rating` (
  `id_penilaian_rating` int(11) NOT NULL,
  `id_barang_penilaian` int(11) NOT NULL,
  `id_kriteria_penilaian` int(11) NOT NULL,
  `id_user_penilaian` int(11) NOT NULL,
  `rating_user` double NOT NULL,
  `tanggal_penilaian` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `penilaian_rating`
--

INSERT INTO `penilaian_rating` (`id_penilaian_rating`, `id_barang_penilaian`, `id_kriteria_penilaian`, `id_user_penilaian`, `rating_user`, `tanggal_penilaian`) VALUES
(1, 2, 1, 0, 5, '0000-00-00 00:00:00'),
(2, 2, 2, 0, 4, '0000-00-00 00:00:00'),
(3, 2, 3, 0, 3, '0000-00-00 00:00:00'),
(4, 2, 4, 0, 4, '0000-00-00 00:00:00'),
(5, 2, 5, 0, 3, '0000-00-00 00:00:00'),
(6, 2, 6, 0, 5, '0000-00-00 00:00:00'),
(7, 2, 7, 0, 4, '0000-00-00 00:00:00'),
(8, 2, 1, 0, 1, '0000-00-00 00:00:00'),
(9, 2, 2, 0, 3, '0000-00-00 00:00:00'),
(10, 2, 3, 0, 2, '0000-00-00 00:00:00'),
(11, 2, 4, 0, 3, '0000-00-00 00:00:00'),
(12, 2, 5, 0, 2, '0000-00-00 00:00:00'),
(13, 2, 6, 0, 4, '0000-00-00 00:00:00'),
(14, 2, 7, 0, 3, '0000-00-00 00:00:00'),
(15, 2, 1, 0, 2, '0000-00-00 00:00:00'),
(16, 2, 2, 0, 2, '0000-00-00 00:00:00'),
(17, 2, 3, 0, 4, '0000-00-00 00:00:00'),
(18, 2, 4, 0, 5, '0000-00-00 00:00:00'),
(19, 2, 5, 0, 3, '0000-00-00 00:00:00'),
(20, 2, 6, 0, 2, '0000-00-00 00:00:00'),
(21, 2, 7, 0, 2, '0000-00-00 00:00:00'),
(22, 3, 1, 1, 5, '0000-00-00 00:00:00'),
(23, 3, 1, 2, 5, '0000-00-00 00:00:00'),
(24, 3, 1, 3, 5, '0000-00-00 00:00:00'),
(25, 3, 1, 4, 5, '0000-00-00 00:00:00'),
(26, 3, 1, 5, 5, '0000-00-00 00:00:00'),
(27, 3, 1, 6, 4, '0000-00-00 00:00:00'),
(28, 3, 1, 7, 5, '0000-00-00 00:00:00'),
(29, 3, 1, 0, 5, '0000-00-00 00:00:00'),
(30, 3, 2, 0, 5, '0000-00-00 00:00:00'),
(31, 3, 3, 0, 5, '0000-00-00 00:00:00'),
(32, 3, 4, 0, 5, '0000-00-00 00:00:00'),
(33, 3, 5, 0, 5, '0000-00-00 00:00:00'),
(34, 3, 6, 0, 5, '0000-00-00 00:00:00'),
(35, 3, 7, 0, 5, '0000-00-00 00:00:00'),
(36, 3, 1, 1, 4, '0000-00-00 00:00:00'),
(37, 3, 2, 1, 3, '0000-00-00 00:00:00'),
(38, 3, 3, 1, 4, '0000-00-00 00:00:00'),
(39, 3, 4, 1, 5, '0000-00-00 00:00:00'),
(40, 3, 5, 1, 5, '0000-00-00 00:00:00'),
(41, 3, 6, 1, 5, '0000-00-00 00:00:00'),
(42, 3, 7, 1, 4, '0000-00-00 00:00:00'),
(43, 3, 1, 1, 5, '0000-00-00 00:00:00'),
(44, 3, 2, 1, 5, '0000-00-00 00:00:00'),
(45, 3, 3, 1, 5, '0000-00-00 00:00:00'),
(46, 3, 4, 1, 4, '0000-00-00 00:00:00'),
(47, 3, 5, 1, 4, '0000-00-00 00:00:00'),
(48, 3, 6, 1, 3, '0000-00-00 00:00:00'),
(49, 3, 7, 1, 5, '0000-00-00 00:00:00'),
(50, 3, 1, 1, 5, '0000-00-00 00:00:00'),
(51, 3, 2, 1, 5, '0000-00-00 00:00:00'),
(52, 3, 3, 1, 5, '0000-00-00 00:00:00'),
(53, 3, 4, 1, 4, '0000-00-00 00:00:00'),
(54, 3, 5, 1, 5, '0000-00-00 00:00:00'),
(55, 3, 6, 1, 5, '0000-00-00 00:00:00'),
(56, 3, 7, 1, 5, '0000-00-00 00:00:00'),
(57, 3, 1, 1, 5, '2020-08-25 15:38:22'),
(58, 3, 2, 1, 5, '2020-08-25 15:38:22'),
(59, 3, 3, 1, 5, '2020-08-25 15:38:22'),
(60, 3, 4, 1, 5, '2020-08-25 15:38:22'),
(61, 3, 5, 1, 5, '2020-08-25 15:38:22'),
(62, 3, 6, 1, 5, '2020-08-25 15:38:22'),
(63, 3, 7, 1, 5, '2020-08-25 15:38:22'),
(64, 15, 1, 1, 3, '2020-09-07 00:09:25'),
(65, 15, 2, 1, 4, '2020-09-07 00:09:26'),
(66, 15, 3, 1, 5, '2020-09-07 00:09:26'),
(67, 15, 4, 1, 4, '2020-09-07 00:09:26'),
(68, 15, 5, 1, 5, '2020-09-07 00:09:26'),
(69, 15, 6, 1, 5, '2020-09-07 00:09:26'),
(70, 15, 7, 1, 5, '2020-09-07 00:09:26'),
(71, 15, 1, 1, 5, '2020-09-07 00:13:13'),
(72, 15, 2, 1, 5, '2020-09-07 00:13:14'),
(73, 15, 3, 1, 5, '2020-09-07 00:13:14'),
(74, 15, 4, 1, 5, '2020-09-07 00:13:14'),
(75, 15, 5, 1, 5, '2020-09-07 00:13:14'),
(76, 15, 6, 1, 4, '2020-09-07 00:13:14'),
(77, 15, 7, 1, 5, '2020-09-07 00:13:14'),
(78, 15, 1, 1, 4, '2020-09-07 00:14:50'),
(79, 15, 2, 1, 5, '2020-09-07 00:14:50'),
(80, 15, 3, 1, 4, '2020-09-07 00:14:50'),
(81, 15, 4, 1, 4, '2020-09-07 00:14:50'),
(82, 15, 5, 1, 4, '2020-09-07 00:14:50'),
(83, 15, 6, 1, 4, '2020-09-07 00:14:50'),
(84, 15, 7, 1, 4, '2020-09-07 00:14:50'),
(85, 15, 1, 6, 3, '2020-09-07 03:37:33'),
(86, 15, 2, 6, 4, '2020-09-07 03:37:34'),
(87, 15, 3, 6, 5, '2020-09-07 03:37:34'),
(88, 15, 4, 6, 4, '2020-09-07 03:37:34'),
(89, 15, 5, 6, 4, '2020-09-07 03:37:34'),
(90, 15, 6, 6, 5, '2020-09-07 03:37:34'),
(91, 15, 7, 6, 4, '2020-09-07 03:37:34'),
(92, 8, 1, 6, 3, '2020-09-07 04:46:12'),
(93, 8, 2, 6, 5, '2020-09-07 04:46:12'),
(94, 8, 3, 6, 3, '2020-09-07 04:46:12'),
(95, 8, 4, 6, 4, '2020-09-07 04:46:12'),
(96, 8, 5, 6, 4, '2020-09-07 04:46:12'),
(97, 8, 6, 6, 4, '2020-09-07 04:46:12'),
(98, 8, 7, 6, 4, '2020-09-07 04:46:12'),
(99, 8, 1, 6, 3, '2020-09-07 04:47:15'),
(100, 8, 2, 6, 5, '2020-09-07 04:47:15'),
(101, 8, 3, 6, 3, '2020-09-07 04:47:15'),
(102, 8, 4, 6, 4, '2020-09-07 04:47:15'),
(103, 8, 5, 6, 4, '2020-09-07 04:47:15'),
(104, 8, 6, 6, 4, '2020-09-07 04:47:15'),
(105, 8, 7, 6, 4, '2020-09-07 04:47:15'),
(106, 19, 1, 6, 3, '2020-09-17 18:18:00'),
(107, 19, 2, 6, 5, '2020-09-17 18:18:00'),
(108, 19, 3, 6, 4, '2020-09-17 18:18:00'),
(109, 19, 4, 6, 5, '2020-09-17 18:18:00'),
(110, 19, 5, 6, 4, '2020-09-17 18:18:00'),
(111, 19, 6, 6, 5, '2020-09-17 18:18:00'),
(112, 19, 7, 6, 5, '2020-09-17 18:18:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `productreviews`
--

CREATE TABLE `productreviews` (
  `id` int(11) NOT NULL,
  `productId` int(11) DEFAULT NULL,
  `quality` int(11) DEFAULT NULL,
  `price` int(11) DEFAULT NULL,
  `value` int(11) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `summary` varchar(255) DEFAULT NULL,
  `review` longtext DEFAULT NULL,
  `reviewDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `productreviews`
--

INSERT INTO `productreviews` (`id`, `productId`, `quality`, `price`, `value`, `name`, `summary`, `review`, `reviewDate`) VALUES
(2, 3, 4, 5, 5, 'Anuj Kumar', 'BEST PRODUCT FOR ME :)', 'BEST PRODUCT FOR ME :)', '2017-02-26 20:43:57'),
(3, 3, 3, 4, 3, 'Sarita pandey', 'Nice Product', 'Value for money', '2017-02-26 20:52:46'),
(4, 3, 3, 4, 3, 'Sarita pandey', 'Nice Product', 'Value for money', '2017-02-26 20:59:19'),
(5, 15, 3, 4, 5, 'Indonesia', 'okey', 'bagussss', '2020-03-10 15:35:18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `category` int(11) NOT NULL,
  `subCategory` int(11) DEFAULT NULL,
  `productName` varchar(255) DEFAULT NULL,
  `productCompany` varchar(255) DEFAULT NULL,
  `productPrice` int(11) DEFAULT NULL,
  `productPriceBeforeDiscount` int(11) DEFAULT NULL,
  `productDescription` longtext DEFAULT NULL,
  `productImage1` varchar(255) DEFAULT NULL,
  `productImage2` varchar(255) DEFAULT NULL,
  `productImage3` varchar(255) DEFAULT NULL,
  `shippingCharge` int(11) DEFAULT NULL,
  `productAvailability` varchar(255) DEFAULT NULL,
  `postingDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL,
  `id_seller` int(11) DEFAULT NULL,
  `rating_produk` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `products`
--

INSERT INTO `products` (`id`, `category`, `subCategory`, `productName`, `productCompany`, `productPrice`, `productPriceBeforeDiscount`, `productDescription`, `productImage1`, `productImage2`, `productImage3`, `shippingCharge`, `productAvailability`, `postingDate`, `updationDate`, `id_seller`, `rating_produk`) VALUES
(1, 4, 3, 'Micromax 81cm (32) HD Ready LED TV  (32T6175MHD, 2 x HDMI, 2 x USB)', 'Micromax test', 1300000, 1400000, '<div class=\"HoUsOy\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; font-size: 18px; white-space: nowrap; line-height: 1.4; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif;\">General</div><ul style=\"box-sizing: border-box; margin-bottom: 0px; margin-left: 0px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 14px;\"><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Sales Package</div><ul class=\"_3dG3ix col col-9-12\" style=\"box-sizing: border-box; margin-left: 0px; width: 548.25px; display: inline-block; vertical-align: top; line-height: 1.4;\"><li class=\"sNqDog\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; list-style: none;\">1 TV Unit, Remote Controller, Battery (For Remote Controller), Quick Installation Guide and User Manual: All in One, Wall Mount Support</li></ul></li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Model Name</div><ul class=\"_3dG3ix col col-9-12\" style=\"box-sizing: border-box; margin-left: 0px; width: 548.25px; display: inline-block; vertical-align: top; line-height: 1.4;\"><li class=\"sNqDog\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; list-style: none;\">32T6175MHD</li></ul></li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Display Size</div><ul class=\"_3dG3ix col col-9-12\" style=\"box-sizing: border-box; margin-left: 0px; width: 548.25px; display: inline-block; vertical-align: top; line-height: 1.4;\"><li class=\"sNqDog\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; list-style: none;\">81 cm (32)</li></ul></li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">Screen Type</div><ul class=\"_3dG3ix col col-9-12\" style=\"box-sizing: border-box; margin-left: 0px; width: 548.25px; display: inline-block; vertical-align: top; line-height: 1.4;\"><li class=\"sNqDog\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; list-style: none;\">LED</li></ul></li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\">HD Technology &amp; Resolutiontest</div><ul class=\"_3dG3ix col col-9-12\" style=\"box-sizing: border-box; margin-left: 0px; width: 548.25px; display: inline-block; vertical-align: top; line-height: 1.4;\"><li class=\"sNqDog\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; list-style: none;\">HD Ready, 1366 x 768</li></ul></li></ul>', 'micromax1.jpeg', 'micromax main image.jpg', 'micromax main image.jpg', 1200, 'In Stock', '2017-01-30 16:54:35', '', 9, 0),
(2, 4, 4, 'Apple iPhone 6 (Silver, 16 GB)', 'Apple INC', 3500000, 0, '<div class=\"_2PF8IO\" style=\"box-sizing: border-box; margin: 0px 0px 0px 110px; padding: 0px; flex: 1 1 0%; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 14px;\"><ul style=\"box-sizing: border-box; margin-bottom: 0px; margin-left: 0px;\"><li class=\"_1tMfkh\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\">1 GB RAM | 16 GB ROM |</li><li class=\"_1tMfkh\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\">4.7 inch Retina HD Display</li><li class=\"_1tMfkh\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\">8MP Primary Camera | 1.2MP Front</li><li class=\"_1tMfkh\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\">Li-Ion Battery</li><li class=\"_1tMfkh\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\">A8 Chip with 64-bit Architecture and M8 Motion Co-processor Processor</li></ul></div>', 'apple-iphone-6-1.jpeg', 'apple-iphone-6-2.jpeg', 'apple-iphone-6-3.jpeg', 0, 'In Stock', '2017-01-30 16:59:00', '', 9, 3.0424353876773167),
(3, 4, 4, 'Redmi Note 4 (Gold, 32 GB)  (With 3 GB RAM)', 'Redmi', 1375000, 0, '<br><div><ol><li>3 GB RAM | 32 GB ROM | Expandable Upto 128 GB<br></li><li>5.5 inch Full HD Display<br></li><li>13MP Primary Camera | 5MP Front<br></li><li>4100 mAh Li-Polymer Battery<br></li><li>Qualcomm Snapdragon 625 64-bit Processor<br></li></ol></div>', 'mi-redmi-5a-c3b-original-imafy2gfd8byvqyf.jpeg', 'mi-redmi-5a-c3b-original-imafy2gfe6vebg9b.jpeg', 'mi-redmi-5a-c3b-original-imafy2gf3yraxdha.jpeg', 0, 'In Stock', '2017-02-04 04:03:15', '', 9, 3.0424353876773167),
(4, 4, 4, 'Lenovo K6 Power (Silver, 32 GB) ', 'Lenovo', 2950000, 0, '<ul><li>3 GB RAM | 32 GB ROM | Expandable Upto 128 GB<br></li><li>5 inch Full HD Display<br></li><li>13MP Primary Camera | 8MP Front<br></li><li>4000 mAh Li-Polymer Battery<br></li><li>Qualcomm Snapdragon 430 Processor<br></li></ul>', 'lenovo-k6-power-k33a42-1.jpeg', 'lenovo-k6-power-k33a42-2.jpeg', 'lenovo-k6-power-k33a42-3.jpeg', 45, 'In Stock', '2017-02-04 04:04:43', '', 8, 0),
(5, 4, 4, 'Lenovo Vibe K5 Note (Gold, 32 GB)  ', 'Lenovo', 1575000, 0, '<ul><li>3 GB RAM | 32 GB ROM | Expandable Upto 128 GB<br></li><li>5.5 inch Full HD Display<br></li><li>13MP Primary Camera | 8MP Front<br></li><li>3500 mAh Li-Ion Polymer Battery<br></li><li>Helio P10 64-bit Processor<br></li></ul>', 'images.jpg', 'images (2).jpg', 'images.jpg', 0, 'In Stock', '2017-02-04 04:06:17', '', 8, 0),
(6, 4, 4, 'Micromax Canvas Mega 4G', 'Micromax', 2600000, 0, '<ul><li>3 GB RAM | 16 GB ROM |<br></li><li>5.5 inch HD Display<br></li><li>13MP Primary Camera | 5MP Front<br></li><li>2500 mAh Battery<br></li><li>MT6735 Processor<br></li></ul>', 'micromax-canvas-mega-4g-1.jpeg', 'micromax-canvas-mega-4g-2.jpeg', 'micromax-canvas-mega-4g-3.jpeg', 35, 'In Stock', '2017-02-04 04:08:07', '', 8, 0),
(7, 4, 4, 'SAMSUNG Galaxy On5', 'SAMSUNG', 2749000, 0, '<ul><li>1.5 GB RAM | 8 GB ROM | Expandable Upto 128 GB<br></li><li>5 inch HD Display<br></li><li>8MP Primary Camera | 5MP Front<br></li><li>2600 mAh Li-Ion Battery<br></li><li>Exynos 3475 Processor<br></li></ul>', 'samsung-galaxy-on7-sm-1.jpeg', 'samsung-galaxy-on5-sm-2.jpeg', 'samsung-galaxy-on5-sm-3.jpeg', 20, 'In Stock', '2017-02-04 04:10:17', '', 8, 0),
(8, 4, 4, 'OPPO A57', 'OPPO', 1750000, 0, '<ul><li>3 GB RAM | 32 GB ROM | Expandable Upto 256 GB<br></li><li>5.2 inch HD Display<br></li><li>13MP Primary Camera | 16MP Front<br></li><li>2900 mAh Battery<br></li><li>Qualcomm MSM8940 64-bit Processor<br></li></ul>', 'oppo-a57-na-original-1.jpeg', 'oppo-a57-na-original-2.jpeg', 'oppo-a57-na-original-3.jpeg', 0, 'In Stock', '2017-02-04 04:11:54', '', 8, 3.0424353876773167),
(9, 3, 15, 'Celana Overal', 'Amalia Fashion', 55000, 53000, 'Celana Overal wanita', 'IMG-20200823-WA0013.jpg', 'IMG-20200825-WA0023.jpg', NULL, 10000, 'In Stock', '2020-09-08 07:25:42', NULL, 4, 0),
(10, 2, 19, 'Baju Atasan ', 'Amalia Fashion', 45000, 43000, 'Baju Atasan Wanita', 'IMG-20200821-WA0037.jpg', NULL, NULL, 15000, 'Ready', '2020-09-08 07:30:40', NULL, 8, 0),
(11, 4, 6, 'Acer ES 15 Pentium Quad Core', 'Acer', 1999000, 0, '<ul><li>Intel Pentium Quad Core Processor ( )<br></li><li>4 GB DDR3 RAM<br></li><li>Linux/Ubuntu Operating System<br></li><li>1 TB HDD<br></li><li>15.6 inch Display<br></li></ul>', 'acer-aspire-notebook-original-1.jpeg', 'acer-aspire-notebook-original-2.jpeg', 'acer-aspire-notebook-original-3.jpeg', 0, 'In Stock', '2017-02-04 04:26:17', '', 8, 0),
(12, 4, 6, 'Micromax Canvas Laptab II (WIFI) Atom 4th Gen', 'Micromax', 1530000, 0, '<ul><li>Intel Atom Processor ( 4th Gen )<br></li><li>2 GB DDR3 RAM<br></li><li>32 bit Windows 10 Operating System<br></li><li>11.6 inch Touchscreen Display<br></li></ul>', 'micromax-lt777w-2-in-1-laptop-original-1.jpeg', 'micromax-lt777w-2-in-1-laptop-original-2.jpeg', 'micromax-lt777w-2-in-1-laptop-original-3.jpeg', 0, 'In Stock', '2017-02-04 04:28:17', '', 8, 0),
(13, 4, 6, 'HP Core i5 5th Gen', 'HP', 2495000, 0, '<span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">HP Core i5 5th Gen - (4 GB/1 TB HDD/Windows 10 Home/2 GB Graphics) N8M28PA 15-ac123tx Notebook</span><span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">&nbsp;&nbsp;(15.6 inch, Turbo SIlver, 2.19 kg)</span><br><div><ul><li>Intel Core i5 Processor ( 5th Gen )<br></li><li>4 GB DDR3 RAM<br></li><li>64 bit Windows 10 Operating System<br></li><li>1 TB HDD<br></li><li>15.6 inch Display<br></li></ul></div>', 'hp-notebook-original-1.jpeg', 'hp-notebook-original-2.jpeg', 'hp-notebook-original-3.jpeg', 0, 'In Stock', '2017-02-04 04:30:24', '', 8, 0),
(14, 4, 6, 'Lenovo Ideapad 110 APU Quad Core A6 6th Gen', 'Lenovo', 2290000, 0, '<span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">Lenovo Ideapad 110 APU Quad Core A6 6th Gen - (4 GB/500 GB HDD/Windows 10 Home) 80TJ00D2IH IP110 15ACL Notebook</span><span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">&nbsp;&nbsp;(15.6 inch, Black, 2.2 kg)</span><br><div><ul><li>AMD APU Quad Core A6 Processor ( 6th Gen )<br></li><li>4 GB DDR3 RAM<br></li><li>64 bit Windows 10 Operating System<br></li><li>500 GB HDD<br></li><li>15.6 inch Display<br></li></ul></div>', 'lenovo-ideapad-notebook-original-1.jpeg', 'lenovo-ideapad-notebook-original-2.jpeg', 'lenovo-ideapad-notebook-3.jpeg', 0, 'In Stock', '2017-02-04 04:32:15', '', 8, 0),
(15, 3, 15, 'KULOT JEANS LUINZA', 'Esa Fashion', 45000, 43000, '<span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">Celana Panjang</span><span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">&nbsp;&nbsp;KULOT JEANS LUINZA</span><br><div><ul><li>BAHAN JEANS WASH GREY<br></li><li>PJ 90 CM<br></li><li>LP 100 CM <br></li><li>Buruan chekcout, sebelum kehabisan<br></li></ul></div>', 'kulot.jpeg', 'IMG-20200826-WA0010.jpg', 'IMG-20200826-WA0011.jpg', 50, 'In Stock', '2017-02-04 04:35:13', '', 8, 3.0424353876773167),
(16, 3, 8, 'Pant Kerut Scuba Mocca ', 'Syarifah fashion', 42000, 40000, '<ul><li>Pant Kerut Scuba Mocca.jpeg<br></li><li>Limited editionk<br></li><li>Buruan checkout<br></li><li>Jangan sampai kehabisan<br></li><li>Hubungi: 082282324819<br></li><li>ig: empatsaudara_store<br></li></ul>', 'Pant Kerut Scuba Mocca.jpeg', 'Pant Kerut Scuba Mocca.jpeg', '', 30, 'In Stock', '2017-02-04 04:36:23', '', 8, 0),
(17, 5, 9, 'Mukena Terusan Berwarna', 'esa store', 135000, 0, '<span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">Induscraft Solid Wood King Bed With Storage</span><span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">&nbsp;&nbsp;(Finish Color - Honey Brown)</span><br><div><ul><li>Material Subtype: Rosewood (Sheesham)<br></li><li>W x H x D: 1850 mm x 875 mm x 2057.5 mm<br></li><li>Floor Clearance: 8 mm<br></li><li>Delivery Condition: Knock Down<br></li></ul></div>', 'IMG-20200809-WA0025.jpg', 'IMG-20200809-WA0018.jpg', 'IMG-20200809-WA0020.jpg', 12000, 'In Stock', '2017-02-04 04:40:37', '', 8, 0),
(18, 5, 10, 'Mukena Terusan Putih-Boriran', 'esa store', 145000, 142000, '<span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">@home by Nilkamal Ursa Metal Queen Bed</span><span style=\"color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 18px;\">&nbsp;&nbsp;(Finish Color - NA)</span><br><div><ul><li>Material Subtype: Carbon Steel<br></li><li>W x H x D: 1590 mm x 910 mm x 2070 mm<br></li><li>Floor Clearance: 341 mm<br></li><li>Delivery Condition: Knock Down<br></li></ul></div>', 'IMG-20200812-WA0040.jpg', 'IMG-20200812-WA0041.jpg', 'IMG-20200812-WA0039.jpg', 0, 'In Stock', '2017-02-04 04:42:27', '', 8, 0),
(19, 6, 12, 'Gamis Muslim', 'esa store', 50000, 48000, '<ul style=\"box-sizing: border-box; margin-bottom: 0px; margin-left: 0px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 14px;\"><li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\">Colour: White, White</li><li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 16px; list-style: none; position: relative;\">Outer Material: Denim</li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\"><br></div></li></ul>', 'IMG-20200808-WA0011.jpg', 'IMG-20200808-WA0012.jpg', 'IMG-20200808-WA0013.jpg', 15000, 'In Stock', '2017-03-10 20:16:03', '', 8, 3.0424353876773167),
(20, 6, 12, 'Gamis Muslimah ', 'esa store', 150000, 148000, '<ul style=\"box-sizing: border-box; margin-bottom: 0px; margin-left: 0px; color: rgb(33, 33, 33); font-family: Roboto, Arial, sans-serif; font-size: 14px;\"><li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 8px 16px; list-style: none; position: relative;\">Colour: Blue</li><li class=\"_2-riNZ\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 0px 16px; list-style: none; position: relative;\">Closure: Laced</li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\"><b>Weight</b></div><ul class=\"_3dG3ix col col-9-12\" style=\"box-sizing: border-box; margin-left: 0px; width: 548.25px; display: inline-block; vertical-align: top; line-height: 1.4;\"><li class=\"sNqDog\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px; list-style: none;\"><b>200 g (per single Shoe) - Weight of the product may vary depending on size.</b></li></ul></li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\"><b>Style</b></div><ul class=\"_3dG3ix col col-9-12\" style=\"box-sizing: border-box; margin-left: 0px; width: 548.25px; display: inline-block; vertical-align: top; line-height: 1.4;\"><li class=\"sNqDog\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px; list-style: none;\"><b>Panel and Stitch Detail, Textured Detail</b></li></ul></li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\"><b>Tip Shape</b></div><ul class=\"_3dG3ix col col-9-12\" style=\"box-sizing: border-box; margin-left: 0px; width: 548.25px; display: inline-block; vertical-align: top; line-height: 1.4;\"><li class=\"sNqDog\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px; list-style: none;\"><b>Round</b></li></ul></li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px 0px 16px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\"><b>Season</b></div><ul class=\"_3dG3ix col col-9-12\" style=\"box-sizing: border-box; margin-left: 0px; width: 548.25px; display: inline-block; vertical-align: top; line-height: 1.4;\"><li class=\"sNqDog\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px; list-style: none;\"><b>AW16</b></li></ul></li><li class=\"_1KuY3T row\" style=\"box-sizing: border-box; margin: 0px; padding: 0px; list-style: none; display: flex; flex-flow: row wrap; width: 731px;\"><div class=\"vmXPri col col-3-12\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px 8px 0px 0px; width: 182.75px; display: inline-block; vertical-align: top; color: rgb(135, 135, 135);\"><b>Closure</b></div><ul class=\"_3dG3ix col col-9-12\" style=\"box-sizing: border-box; margin-left: 0px; width: 548.25px; display: inline-block; vertical-align: top; line-height: 1.4;\"><li class=\"sNqDog\" style=\"text-align: left; box-sizing: border-box; margin: 0px; padding: 0px; list-style: none;\"><b>Laced</b></li></ul></li></ul>', 'WhatsApp Image 2020-06-05 at 16.11.00.jpeg', 'WhatsApp Image 2020-06-05 at 16.11.01 (2).jpeg', 'WhatsApp Image 2020-06-05 at 16.11.02 (1).jpeg', 0, 'In Stock', '2017-03-10 20:19:22', '', 8, 0),
(21, 7, 13, 'Hijab segi4', 'bella square', 18000, 25000, 'nyaman di pakai', 'IMG-20180917-WA0005.jpg', 'IMG-20180917-WA0004.jpg', 'IMG-20181203-WA0028.jpg', 0, 'In Stock', '2020-03-10 19:06:02', NULL, 8, 0),
(22, 5, 10, 'Mukena Terusan Bermotif', 'Baby Honey', 145000, 0, 'Celana Kulot', 'Shopee_609cae141e3a543144af3bc0fd58cbaa.jpg', 'Shopee_770428a556f2114b3e3457427c6738d2.jpg', 'Shopee_b135a1133888dd3581d54af1b8186125.jpg', 15000, 'In Stock', '2020-06-24 15:15:19', NULL, 1, 0),
(23, 6, 14, 'Gamis Kotak-kotak', 'Esa Store', 250000, 220000, 'Gamis Kotak-kotak Panjang', 'IMG-20200816-WA0005.jpg', 'IMG-20200816-WA0007.jpg', 'IMG-20200816-WA0008.jpg', 25000, 'Ready', '2020-09-08 08:41:16', NULL, 3, 0),
(24, 2, 21, 'Cardigan', 'Esa Store', 55000, 0, 'Cardigan Wanita \r\nWarna ada Putih, Hitam, Pink, Milo', 'IMG-20200820-WA0068.jpg', 'IMG-20200820-WA0069.jpg', NULL, 15000, 'Ready', '2020-09-08 08:37:09', NULL, 2, 0),
(25, 2, 20, 'Set Piyama', 'Syarifah Fashion', 45000, 43000, 'Set Piyama (Baju Tidur Lengan Pendek + Celana Panjang)', 'IMG-20200830-WA0004.jpg', 'IMG-20200830-WA0006.jpg', 'IMG-20200830-WA0010.jpg', 15000, 'Ready', '2020-09-08 08:33:46', NULL, 2, 0),
(26, 7, 19, 'Hijab Bergo', 'Syarifah Fashion', 25000, 23000, 'Hijab Bergo ', 'IMG-20200820-WA0058.jpg', 'IMG-20200820-WA0060.jpg', 'IMG-20200820-WA0056.jpg', 15000, 'Ready', '2020-09-08 08:46:01', NULL, 2, 0),
(27, 7, 23, 'Hijab Syar\'i Jumbo', 'esa store', 65000, 63000, 'Hijab Syar\'i Jumbo', 'IMG-20200820-WA0081.jpg', 'IMG-20191009-WA0027.jpg', 'IMG-20200820-WA0057.jpg', 15000, 'ready', '2020-09-08 09:17:59', NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating_group`
--

CREATE TABLE `rating_group` (
  `id_penilaian_rating` int(11) NOT NULL,
  `id_barang_group` int(11) NOT NULL,
  `id_kriteria_group` int(11) NOT NULL,
  `total_rating` double NOT NULL,
  `bobot_rating` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `rating_group`
--

INSERT INTO `rating_group` (`id_penilaian_rating`, `id_barang_group`, `id_kriteria_group`, `total_rating`, `bobot_rating`) VALUES
(1, 2, 1, 2.6666666666666665, 0.68373399927178),
(2, 2, 2, 3, 1.0136994048989),
(3, 2, 3, 3, 0.15293336798137),
(4, 2, 4, 4, 0.5874320718976),
(5, 2, 5, 2.6666666666666665, 0.28600665863326),
(6, 2, 6, 3.6666666666666665, 0.092372235675786),
(7, 2, 7, 3, 0.22625764931862),
(8, 3, 1, 2.6666666666666665, 0.68373399927178),
(9, 3, 2, 3, 1.0136994048989),
(10, 3, 3, 3, 0.15293336798137),
(11, 3, 4, 4, 0.5874320718976),
(12, 3, 5, 2.6666666666666665, 0.28600665863326),
(13, 3, 6, 3.6666666666666665, 0.092372235675786),
(14, 3, 7, 3, 0.22625764931862),
(15, 15, 1, 2.6666666666666665, 0.68373399927178),
(16, 15, 2, 3, 1.0136994048989),
(17, 15, 3, 3, 0.15293336798137),
(18, 15, 4, 4, 0.5874320718976),
(19, 15, 5, 2.6666666666666665, 0.28600665863326),
(20, 15, 6, 3.6666666666666665, 0.092372235675786),
(21, 15, 7, 3, 0.22625764931862),
(22, 8, 1, 2.6666666666666665, 0.68373399927178),
(23, 8, 2, 3, 1.0136994048989),
(24, 8, 3, 3, 0.15293336798137),
(25, 8, 4, 4, 0.5874320718976),
(26, 8, 5, 2.6666666666666665, 0.28600665863326),
(27, 8, 6, 3.6666666666666665, 0.092372235675786),
(28, 8, 7, 3, 0.22625764931862),
(29, 19, 1, 2.6666666666666665, 0.68373399927178),
(30, 19, 2, 3, 1.0136994048989),
(31, 19, 3, 3, 0.15293336798137),
(32, 19, 4, 4, 0.5874320718976),
(33, 19, 5, 2.6666666666666665, 0.28600665863326),
(34, 19, 6, 3.6666666666666665, 0.092372235675786),
(35, 19, 7, 3, 0.22625764931862);

-- --------------------------------------------------------

--
-- Struktur dari tabel `seller`
--

CREATE TABLE `seller` (
  `id` int(10) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `noHP` varchar(15) NOT NULL,
  `jeniskelamin` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `alamat` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `seller`
--

INSERT INTO `seller` (`id`, `nama`, `email`, `noHP`, `jeniskelamin`, `username`, `password`, `alamat`) VALUES
(1, 'shinta', 'shinta@gmail.com', '087654356789', '2', 'shinta97', '1234567', '		Malang									'),
(2, 'salsa', 'salsa@gmail.com', '0876456789', '2', 'salsa12', 'salsa123', '	palembang										'),
(3, 'ratu', 'ratu@gmail.com', '086252437576', 'Perempuan', 'ratu123', 'ratu123', 'jakarta'),
(4, 'raja', 'raja@gmail.com', '089876543210', 'Laki-laki', 'raja67', 'raja67', 'Bogor'),
(6, 'desi ratna sari', 'desiratnasari@gmail.com', '082425372626', 'Perempuan', 'desi57', 'desi57', 'Lamongan'),
(7, 'dimas', 'dimas@gmail.com', '08216754328', 'Laki-laki', 'dimas54', 'dimas54', 'Palembang'),
(8, 'insiyah cantik', 'insiyah@gmail.com', '081976543897', '2', 'insiyah97', 'cantik97', 'jl.krakatau no.22'),
(9, 'raisya', 'raisya@gmail.com', '089367543287', 'Perempuan', 'raisya09', 'raisya09', 'Jakarta'),
(10, 'tiara', 'tiara@gmail.com', '085376543218', 'Perempuan', 'tiara07', 'tiara07', 'Malang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subcategory`
--

CREATE TABLE `subcategory` (
  `id` int(11) NOT NULL,
  `categoryid` int(11) DEFAULT NULL,
  `subcategory` varchar(255) DEFAULT NULL,
  `creationDate` timestamp NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `subcategory`
--

INSERT INTO `subcategory` (`id`, `categoryid`, `subcategory`, `creationDate`, `updationDate`) VALUES
(2, 4, 'Led Television', '2017-01-26 16:24:52', '26-01-2017 11:03:40 PM'),
(3, 4, 'Television', '2017-01-26 16:29:09', ''),
(4, 4, 'Mobiles', '2017-01-30 16:55:48', ''),
(5, 4, 'Mobile Accessories', '2017-02-04 04:12:40', ''),
(6, 4, 'Laptops', '2017-02-04 04:13:00', ''),
(7, 4, 'Computers', '2017-02-04 04:13:27', ''),
(8, 5, 'Mukena Polino', '2020-09-06 21:08:58', NULL),
(9, 5, 'Mukena Polino', '2017-02-04 04:36:45', ''),
(10, 5, 'Mukena Terusan Bermotif', '2017-02-04 04:37:02', ''),
(11, 5, 'Mukena Terusan Putih', '2017-02-04 04:37:51', ''),
(12, 6, 'Gamis Muslim', '2017-03-10 20:12:59', ''),
(13, 7, 'Segi Empat - Bella Square', '2020-03-10 18:56:02', NULL),
(14, 6, 'Gamis Kotak-Kotak', '2020-06-24 15:13:50', NULL),
(15, 3, 'Kulot', '2020-09-06 21:16:10', NULL),
(16, 3, 'Overal -  Celana Panjang', '2020-09-06 21:16:34', NULL),
(17, 2, 'Tunik', '2020-09-08 04:38:18', NULL),
(18, 2, 'Kemeja', '2020-09-08 04:38:25', NULL),
(19, 7, 'Hijab Bergo', '2020-09-08 04:39:04', NULL),
(20, 2, 'Piyama', '2020-09-08 07:35:22', NULL),
(21, 2, 'Sweater', '2020-09-08 07:35:39', NULL),
(22, 2, 'Kaos Panjang', '2020-09-08 07:36:18', NULL),
(23, 7, 'Syariyah', '2020-09-08 09:00:06', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `userlog`
--

CREATE TABLE `userlog` (
  `id` int(11) NOT NULL,
  `userEmail` varchar(255) DEFAULT NULL,
  `userip` binary(16) DEFAULT NULL,
  `loginTime` timestamp NULL DEFAULT current_timestamp(),
  `logout` varchar(255) DEFAULT NULL,
  `status` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `userlog`
--

INSERT INTO `userlog` (`id`, `userEmail`, `userip`, `loginTime`, `logout`, `status`) VALUES
(1, 'insiyahwidiastutik@gmail.com', 0x3a3a3100000000000000000000000000, '2020-03-10 13:51:46', NULL, 1),
(2, 'admin@gmail.com', 0x3a3a3100000000000000000000000000, '2020-04-11 01:38:14', NULL, 1),
(5, 'anisaufitria@gmail.com', 0x3a3a3100000000000000000000000000, '2020-06-24 16:32:34', NULL, 1),
(6, 'coba@gmail.com', 0x3a3a3100000000000000000000000000, '2020-08-11 13:49:44', NULL, 1),
(7, 'coba@gmail.com', 0x3a3a3100000000000000000000000000, '2020-08-14 17:35:39', '15-08-2020 12:39:10 AM', 1),
(8, 'coba@gmail.com', 0x3a3a3100000000000000000000000000, '2020-08-14 19:09:48', NULL, 1),
(9, 'coba@gmail.com', 0x3a3a3100000000000000000000000000, '2020-08-16 04:10:36', NULL, 1),
(10, 'coba@gmail.com', 0x3a3a3100000000000000000000000000, '2020-08-22 06:19:14', NULL, 1),
(11, 'coba@gmail.com', 0x3a3a3100000000000000000000000000, '2020-08-23 04:27:07', NULL, 1),
(12, 'coba@gmail.com', 0x3a3a3100000000000000000000000000, '2020-08-23 08:25:26', NULL, 1),
(13, 'coba@gmail.com', 0x3a3a3100000000000000000000000000, '2020-08-24 16:52:58', NULL, 1),
(14, 'coba@gmail.com', 0x3a3a3100000000000000000000000000, '2020-08-25 06:56:32', '25-08-2020 12:36:40 PM', 1),
(15, 'insyahwidiastutik@gmail.com', 0x3a3a3100000000000000000000000000, '2020-08-25 07:08:33', NULL, 0),
(16, 'ocba2@gmail.com', 0x3a3a3100000000000000000000000000, '2020-08-25 07:09:20', NULL, 0),
(17, 'coba2@gmail.com', 0x3a3a3100000000000000000000000000, '2020-08-25 07:09:36', '25-08-2020 12:44:36 PM', 1),
(18, 'coba2@gmail.com', 0x3a3a3100000000000000000000000000, '2020-08-25 07:14:45', NULL, 1),
(19, 'mutiatazkiyah@gmail.com', 0x3a3a3100000000000000000000000000, '2020-09-06 17:03:35', NULL, 0),
(20, 'mutiatazkiyah@gmail.com', 0x3a3a3100000000000000000000000000, '2020-09-06 17:04:01', NULL, 0),
(21, 'coba@gmail.com', 0x3a3a3100000000000000000000000000, '2020-09-06 17:04:43', NULL, 0),
(22, 'pelanggan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-09-06 17:06:16', NULL, 1),
(23, 'pelanggan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-09-06 20:37:05', NULL, 1),
(24, 'pelanggan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-09-17 11:12:40', NULL, 1),
(25, 'pelanggan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-09-17 18:48:12', NULL, 1),
(26, 'pelanggan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-10-04 14:06:16', NULL, 1),
(27, 'pelanggan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-10-21 12:28:16', NULL, 1),
(28, 'pelanggan@gmail.com', 0x3a3a3100000000000000000000000000, '2020-11-17 01:53:51', NULL, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `contactno` bigint(11) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `shippingAddress` longtext DEFAULT NULL,
  `shippingState` varchar(255) DEFAULT NULL,
  `shippingCity` varchar(255) DEFAULT NULL,
  `shippingPincode` int(11) DEFAULT NULL,
  `billingAddress` longtext DEFAULT NULL,
  `billingState` varchar(255) DEFAULT NULL,
  `billingCity` varchar(255) DEFAULT NULL,
  `billingPincode` int(11) DEFAULT NULL,
  `regDate` timestamp NOT NULL DEFAULT current_timestamp(),
  `updationDate` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `contactno`, `password`, `shippingAddress`, `shippingState`, `shippingCity`, `shippingPincode`, `billingAddress`, `billingState`, `billingCity`, `billingPincode`, `regDate`, `updationDate`) VALUES
(1, 'Annisa U Fitria', 'anisafitria@gmail.com', 81373996221, 'anis123', 'Jl. Krakatau No. 22 Pisang Candi Sukun Malang', 'Indonesia', 'Malang', 123456, 'Jl. Krakatau No. 22 Pisang Candi Sukun Malang', 'Indonesia', 'Malang', 654321, '2020-06-24 17:00:00', '26 Juni 2020'),
(2, 'Mutia Tazkiyah', 'mutiatazkiyah@gmail.com', 81349346114, 'mutia123', 'Pulau Rimau No. 12 Jalan Anggrek', 'Indonesia', 'Palembang', 98765, 'Pulau Rimau No. 12 Jalan Anggrek', 'indonesia', 'palembang', 123456, '2020-06-24 17:00:00', '26 Juni 2020'),
(3, 'Annisa Fitriyatus Sholihah', 'anisaufitria@gmail.com', 813243568, '301b96488b077ba8f9a4a01db8dab2db', 'Malang', 'Jawa Timur', 'Malang', 65014, NULL, NULL, NULL, NULL, '2020-06-24 16:32:07', NULL),
(4, 'coba', 'coba@gmail.com', 345262346, 'e10adc3949ba59abbe56e057f20f883e', 'saf', 'asdf', 'asdf', 0, 'wdsf', 'asdf', 'asdf', 0, '2020-08-11 13:49:28', NULL),
(5, 'coba2', 'coba2@gmail.com', 9023049, 'e10adc3949ba59abbe56e057f20f883e', 'asdf', 'asdf', 'asdf', 0, 'asd', 'asdf', 'asdf', 0, '2020-08-25 07:09:05', NULL),
(6, 'pelanggan', 'pelanggan@gmail.com', 822823248, '325077d1d7b6fa325b095fb212f3bc42', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2020-09-06 17:06:02', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `userId` int(11) DEFAULT NULL,
  `productId` int(11) DEFAULT NULL,
  `postingDate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 ROW_FORMAT=COMPACT;

--
-- Dumping data untuk tabel `wishlist`
--

INSERT INTO `wishlist` (`id`, `userId`, `productId`, `postingDate`) VALUES
(1, 1, 0, '2017-02-27 18:53:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `bobot`
--
ALTER TABLE `bobot`
  ADD PRIMARY KEY (`id_bobot`);

--
-- Indeks untuk tabel `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indeks untuk tabel `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `penilaian_rating`
--
ALTER TABLE `penilaian_rating`
  ADD PRIMARY KEY (`id_penilaian_rating`);

--
-- Indeks untuk tabel `productreviews`
--
ALTER TABLE `productreviews`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `rating_group`
--
ALTER TABLE `rating_group`
  ADD PRIMARY KEY (`id_penilaian_rating`);

--
-- Indeks untuk tabel `seller`
--
ALTER TABLE `seller`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `subcategory`
--
ALTER TABLE `subcategory`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `userlog`
--
ALTER TABLE `userlog`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- Indeks untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`) USING BTREE;

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `bobot`
--
ALTER TABLE `bobot`
  MODIFY `id_bobot` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `ordertrackhistory`
--
ALTER TABLE `ordertrackhistory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `penilaian_rating`
--
ALTER TABLE `penilaian_rating`
  MODIFY `id_penilaian_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=113;

--
-- AUTO_INCREMENT untuk tabel `productreviews`
--
ALTER TABLE `productreviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `rating_group`
--
ALTER TABLE `rating_group`
  MODIFY `id_penilaian_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;

--
-- AUTO_INCREMENT untuk tabel `seller`
--
ALTER TABLE `seller`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `subcategory`
--
ALTER TABLE `subcategory`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT untuk tabel `userlog`
--
ALTER TABLE `userlog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
