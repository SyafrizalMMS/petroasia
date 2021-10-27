-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 16, 2021 at 01:14 PM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbwego_toko_online`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_berita` varchar(20) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `keywords` text,
  `status_berita` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul_gambar` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_produk`, `judul_gambar`, `gambar`, `tanggal_update`) VALUES
(1, 13, 'tes', 'Ayam-betutu.jpg', '2021-01-28 08:47:36'),
(4, 14, 'jhcvas', 'c512b6360068c8977e02eadc7d5c7f98.jpg', '2021-01-28 14:26:57'),
(5, 21, 'Gambar Depan', 'petroasia-lubricant_radiator1.jpg', '2021-02-03 15:59:35'),
(6, 21, 'Gambar Samping', 'petroasia-lubricant_radiator2.jpg', '2021-02-03 15:59:58'),
(7, 21, 'Gambar Belakang', 'petroasia-lubricant_radiator3.jpg', '2021-02-03 16:01:45');

-- --------------------------------------------------------

--
-- Table structure for table `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `telepon` varchar(50) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(29) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `rekening_pelanggan` varchar(255) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `tanggal_bayar` varchar(50) DEFAULT NULL,
  `nama_bank` varchar(50) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_header_transaksi`, `id_user`, `id_pelanggan`, `nama_pelanggan`, `email`, `telepon`, `alamat`, `kode_transaksi`, `tanggal_transaksi`, `jumlah_transaksi`, `status_bayar`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_bayar`, `id_rekening`, `tanggal_bayar`, `nama_bank`, `tanggal_post`, `tanggal_update`) VALUES
(1, 0, 1, 'Syafrizal MMS Ok juga', 'arsipblogsyafrizal@gmail.com', '082362237848', 'Desa Bundar Atam', '15VIOTH4UE202102', '2021-02-15 00:00:00', 60000, 'Konfirmasi', 60000, '998877665544', 'Tibra', '4384491.jpg', 3, '15-02-2021', 'Mandiri', '2021-02-15 10:55:52', '2021-02-15 09:55:52');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal_update`) VALUES
(6, 'oli', 'Oli', 1, '2021-02-03 04:01:42'),
(7, 'lubricant', 'Lubricant', 2, '2021-02-03 04:02:01'),
(8, 'gemuk', 'Gemuk', 3, '2021-02-03 04:02:48'),
(9, 'gear', 'Gear', 4, '2021-02-03 04:16:41');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `keywords` text,
  `metatext` text,
  `telepon` varchar(60) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `deskripsi` text,
  `logo` varchar(255) DEFAULT NULL,
  `icon` varchar(255) DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `rekening_pembayaran`, `tanggal_update`) VALUES
(1, 'Wego Online', 'Tahun 2021', 'arsipblogsyafrizal@gmail.com', 'http://www/wego.com', 'The Company 2021    ', 'Web online tahun 2021   ', '123214', 'Jalan Sekerak     ', 'ok', 'ok', 'Uji coba   ', 'petroasia1.png', 'home--v21.png', ' 123-456-789-000                      ', '2021-01-28 16:38:04');

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(64) NOT NULL,
  `telepon` varchar(30) DEFAULT NULL,
  `alamat` varchar(300) DEFAULT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `id_user`, `status_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon`, `alamat`, `tanggal_daftar`, `tanggal_update`) VALUES
(1, 0, 'Pending', 'Syafrizal MMS Ok juga', 'arsipblogsyafrizal@gmail.com', '27d2f6af8bf7034875c5bd0b0bed3f7478d83595', '082362237848', 'Desa Bundar Atam', '2021-02-13 04:57:29', '2021-02-14 12:03:24');

-- --------------------------------------------------------

--
-- Table structure for table `products_export`
--

CREATE TABLE `products_export` (
  `COL 1` varchar(36) DEFAULT NULL,
  `COL 2` varchar(36) DEFAULT NULL,
  `COL 3` varchar(533) DEFAULT NULL,
  `COL 4` varchar(8) DEFAULT NULL,
  `COL 5` varchar(6) DEFAULT NULL,
  `COL 6` varchar(105) DEFAULT NULL,
  `COL 7` varchar(9) DEFAULT NULL,
  `COL 8` varchar(12) DEFAULT NULL,
  `COL 9` varchar(13) DEFAULT NULL,
  `COL 10` varchar(12) DEFAULT NULL,
  `COL 11` varchar(13) DEFAULT NULL,
  `COL 12` varchar(12) DEFAULT NULL,
  `COL 13` varchar(13) DEFAULT NULL,
  `COL 14` varchar(11) DEFAULT NULL,
  `COL 15` varchar(13) DEFAULT NULL,
  `COL 16` varchar(25) DEFAULT NULL,
  `COL 17` varchar(21) DEFAULT NULL,
  `COL 18` varchar(24) DEFAULT NULL,
  `COL 19` varchar(27) DEFAULT NULL,
  `COL 20` varchar(13) DEFAULT NULL,
  `COL 21` varchar(24) DEFAULT NULL,
  `COL 22` varchar(25) DEFAULT NULL,
  `COL 23` varchar(15) DEFAULT NULL,
  `COL 24` varchar(15) DEFAULT NULL,
  `COL 25` varchar(114) DEFAULT NULL,
  `COL 26` varchar(14) DEFAULT NULL,
  `COL 27` varchar(14) DEFAULT NULL,
  `COL 28` varchar(9) DEFAULT NULL,
  `COL 29` varchar(9) DEFAULT NULL,
  `COL 30` varchar(15) DEFAULT NULL,
  `COL 31` varchar(41) DEFAULT NULL,
  `COL 32` varchar(24) DEFAULT NULL,
  `COL 33` varchar(27) DEFAULT NULL,
  `COL 34` varchar(21) DEFAULT NULL,
  `COL 35` varchar(34) DEFAULT NULL,
  `COL 36` varchar(32) DEFAULT NULL,
  `COL 37` varchar(27) DEFAULT NULL,
  `COL 38` varchar(32) DEFAULT NULL,
  `COL 39` varchar(32) DEFAULT NULL,
  `COL 40` varchar(32) DEFAULT NULL,
  `COL 41` varchar(32) DEFAULT NULL,
  `COL 42` varchar(32) DEFAULT NULL,
  `COL 43` varchar(32) DEFAULT NULL,
  `COL 44` varchar(13) DEFAULT NULL,
  `COL 45` varchar(19) DEFAULT NULL,
  `COL 46` varchar(16) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `products_export`
--

INSERT INTO `products_export` (`COL 1`, `COL 2`, `COL 3`, `COL 4`, `COL 5`, `COL 6`, `COL 7`, `COL 8`, `COL 9`, `COL 10`, `COL 11`, `COL 12`, `COL 13`, `COL 14`, `COL 15`, `COL 16`, `COL 17`, `COL 18`, `COL 19`, `COL 20`, `COL 21`, `COL 22`, `COL 23`, `COL 24`, `COL 25`, `COL 26`, `COL 27`, `COL 28`, `COL 29`, `COL 30`, `COL 31`, `COL 32`, `COL 33`, `COL 34`, `COL 35`, `COL 36`, `COL 37`, `COL 38`, `COL 39`, `COL 40`, `COL 41`, `COL 42`, `COL 43`, `COL 44`, `COL 45`, `COL 46`) VALUES
('Handle', 'Title', 'Body (HTML)', 'Vendor', 'Type', 'Tags', 'Published', 'Option1 Name', 'Option1 Value', 'Option2 Name', 'Option2 Value', 'Option3 Name', 'Option3 Value', 'Variant SKU', 'Variant Grams', 'Variant Inventory Tracker', 'Variant Inventory Qty', 'Variant Inventory Policy', 'Variant Fulfillment Service', 'Variant Price', 'Variant Compare At Price', 'Variant Requires Shipping', 'Variant Taxable', 'Variant Barcode', 'Image Src', 'Image Position', 'Image Alt Text', 'Gift Card', 'SEO Title', 'SEO Description', 'Google Shopping / Google Product Category', 'Google Shopping / Gender', 'Google Shopping / Age Group', 'Google Shopping / MPN', 'Google Shopping / AdWords Grouping', 'Google Shopping / AdWords Labels', 'Google Shopping / Condition', 'Google Shopping / Custom Product', 'Google Shopping / Custom Label 0', 'Google Shopping / Custom Label 1', 'Google Shopping / Custom Label 2', 'Google Shopping / Custom Label 3', 'Google Shopping / Custom Label 4', 'Variant Image', 'Variant Weight Unit', 'Variant Tax Code'),
('boxy7-t-shirt-with-roll-sleeve', 'Boxy7 T-Shirt with Roll Sleeve', '<p class=\"s-text8\">Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat</p>\n<p class=\"s-text8\">Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat</p>\n<p class=\"s-text8\">Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat</p>', 'MyVendor', 'Shirts', 'boxy, Shirts, sleeveless', 'true', 'Size', 'S', 'Color', 'Gray', '', '', '', '0', '', '1', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-15_7ca55ba5-301e-4461-92ea-68c8b02e35e7.jpg?v=1515096104', '1', '', 'false', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy7-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'M', '', 'Gray', '', '', '', '0', '', '0', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-13_28c7278d-d392-4b0e-b5ba-cecbd622ff37.jpg?v=1515096104', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy7-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'L', '', 'Gray', '', '', '', '0', '', '0', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-04_3d8b0023-92c7-4c68-937d-7dad38ae8d6c.jpg?v=1515096104', '3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy7-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'XL', '', 'Gray', '', '', '', '0', '', '0', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-11_5c272dd0-7779-4700-bcad-15eb4d028ec3.jpg?v=1515096104', '4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy7-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'S', '', 'Red', '', '', '', '0', '', '1', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-16_da06f977-2a92-4694-b8d1-4111c748f330.jpg?v=1515096104', '5', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy7-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'S', '', 'Black', '', '', '', '0', '', '1', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-12_e14e82b7-de49-4074-9dec-06d3a7196613.jpg?v=1515096104', '6', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy7-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-10_c3c82181-073c-453c-8306-30f455ba89fc.jpg?v=1515096104', '7', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('boxy7-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-03_61c8e4df-3673-4eee-865c-636ca7cb47ad.jpg?v=1515096104', '8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('boxy6-t-shirt-with-roll-sleeve', 'Boxy6 T-Shirt with Roll Sleeve', '<p class=\"s-text8\">Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat</p>\n<p class=\"s-text8\">Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat</p>\n<p class=\"s-text8\">Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat</p>', 'MyVendor', 'Shirts', 'boxy, Shirts, sleeveless', 'true', 'Size', 'S', 'Color', 'Gray', '', '', '', '0', '', '1', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-13_d77ff6ee-7735-4f22-a436-1ac6b9ccabd6.jpg?v=1515096032', '1', '', 'false', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy6-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'M', '', 'Gray', '', '', '', '0', '', '0', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-04_86e8206b-6aa1-449f-bb31-e2d239d58176.jpg?v=1515096032', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy6-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'L', '', 'Gray', '', '', '', '0', '', '0', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-11_5d5f7eab-8b89-4c07-8ba5-4ba0dfd71c10.jpg?v=1515096032', '3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy6-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'XL', '', 'Gray', '', '', '', '0', '', '0', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-16_3f9a3674-941d-4878-abf2-d5fa1a81ad66.jpg?v=1515096032', '4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy6-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'S', '', 'Red', '', '', '', '0', '', '1', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-12_0cb97f16-c7e8-4b2c-80cf-c8e56ccb72a1.jpg?v=1515096032', '5', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy6-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'S', '', 'Black', '', '', '', '0', '', '1', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-10_c839542f-834f-4721-8252-456fdb3f2f98.jpg?v=1515096032', '6', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy6-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-03_6f28ebdd-57ba-4f91-b2c0-f8aac9e3f583.jpg?v=1515096032', '7', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('boxy6-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-15_a63f5792-19fd-4a83-bdf1-6341e41d2696.jpg?v=1515096032', '8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('boxy5-t-shirt-with-roll-sleeve', 'Boxy5 T-Shirt with Roll Sleeve', '<p class=\"s-text8\">Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat</p>\n<p class=\"s-text8\">Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat</p>\n<p class=\"s-text8\">Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat</p>', 'MyVendor', 'Shirts', 'boxy, color_gray, color_red, price_20-40, Shirts, size_L, size_M, sleeveless', 'true', 'Size', 'S', 'Color', 'Gray', '', '', '', '0', '', '1', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-04_bcfb0f5a-4eff-46f0-992d-b73eb1b4b88e.jpg?v=1515095994', '1', '', 'false', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy5-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'M', '', 'Gray', '', '', '', '0', '', '0', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-11_cd2b4807-e450-45ad-9abd-077f69ea8dd4.jpg?v=1515095994', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy5-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'L', '', 'Gray', '', '', '', '0', '', '0', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-16_c9ebb7e6-bcec-4f4c-bb68-fe1858226522.jpg?v=1515095994', '3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy5-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'XL', '', 'Gray', '', '', '', '0', '', '0', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-12_a8a3cba5-772a-4803-b592-078a11aa43b6.jpg?v=1515095994', '4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy5-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'S', '', 'Red', '', '', '', '0', '', '1', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-10_6b0ef12d-ed4c-4457-a451-ee9b58ba4a87.jpg?v=1515095994', '5', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy5-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'S', '', 'Black', '', '', '', '0', '', '1', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-03_81d34c7a-ea3b-499e-aa5e-299fe5e17135.jpg?v=1515095994', '6', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy5-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-13_5f4e2816-1f89-4488-b8b5-f73731c721b4.jpg?v=1515095994', '7', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('boxy5-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-15_87e44a1e-8d79-4944-a162-80dbb6fa951a.jpg?v=1515095994', '8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('boxy4-t-shirt-with-roll-sleeve', 'Boxy4 T-Shirt with Roll Sleeve', '<p class=\"s-text8\">Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat</p>\n<p class=\"s-text8\">Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat</p>\n<p class=\"s-text8\">Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat</p>', 'MyVendor', 'Shirts', 'boxy, price_0-20, price_20-40, Shirts, size_S, size_XL, sleeveless', 'true', 'Size', 'S', 'Color', 'Gray', '', '', '', '0', '', '1', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-11_fa17bbd7-4f67-488d-930a-f5e6ece4e595.jpg?v=1514273806', '1', '', 'false', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy4-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'M', '', 'Gray', '', '', '', '0', '', '0', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-16_4de6740a-9efb-4829-8b4f-e65c52792afb.jpg?v=1514273806', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy4-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'L', '', 'Gray', '', '', '', '0', '', '0', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-12_7394db7c-f9a6-45cd-9f8b-d4b75fe02bfe.jpg?v=1514273806', '3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy4-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'XL', '', 'Gray', '', '', '', '0', '', '0', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-10_695ab21f-0619-4720-8e2e-9a564b0dcf8c.jpg?v=1514273806', '4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy4-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'S', '', 'Red', '', '', '', '0', '', '1', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-03_f6bcecb9-a322-4fbf-99fc-7cd68de7af48.jpg?v=1514273806', '5', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy4-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'S', '', 'Black', '', '', '', '0', '', '1', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-13_8269691c-d2f7-465c-96ee-26a0f5ac4baf.jpg?v=1514273806', '6', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy4-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-04_a198f5af-6eb9-44ab-8f58-68a6012e899b.jpg?v=1514273806', '7', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('boxy4-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-15_c135a967-7713-4e91-a8c8-c81d0fe6928f.jpg?v=1514273806', '8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('boxy3-t-shirt-with-roll-sleeve', 'Boxy3 T-Shirt with Roll Sleeve', '<p class=\"s-text8\">Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat</p>\n<p class=\"s-text8\">Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat</p>\n<p class=\"s-text8\">Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat</p>', 'MyVendor', 'Shirts', 'boxy, price_20-40, Shirts, size_L, size_M, sleeveless', 'true', 'Size', 'S', 'Color', 'Gray', '', '', '', '0', '', '1', 'deny', 'manual', '20.00', '30.00', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-16_84f06345-b149-4331-9957-2d65c6b87584.jpg?v=1514273770', '1', '', 'false', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy3-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'M', '', 'Gray', '', '', '', '0', '', '0', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-12_e6ec3f69-66c9-4b49-b3f9-50892ae3c291.jpg?v=1514273770', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy3-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'L', '', 'Gray', '', '', '', '0', '', '0', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-10_f9d5442b-e554-42bf-a04a-febbdd722232.jpg?v=1514273770', '3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy3-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'XL', '', 'Gray', '', '', '', '0', '', '0', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-03_62615ce5-f385-4a04-9642-6dba8e32426d.jpg?v=1514273770', '4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy3-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'S', '', 'Red', '', '', '', '0', '', '1', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-13_2266955e-546e-41f0-845c-5faeddfede8c.jpg?v=1514273770', '5', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy3-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'S', '', 'Black', '', '', '', '0', '', '1', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-04_70b9b579-17eb-4470-ab46-bf6026887c95.jpg?v=1514273770', '6', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy3-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-11_6329f274-112e-483a-b030-58b04591000b.jpg?v=1514273770', '7', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('boxy3-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-15_8d4d0eca-b423-45fe-a7f5-63b970843b5f.jpg?v=1514273770', '8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('boxy2-t-shirt-with-roll-sleeve', 'Boxy2 T-Shirt with Roll Sleeve', '<p class=\"s-text8\">Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat</p>\n<p class=\"s-text8\">Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat</p>\n<p class=\"s-text8\">Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat</p>', 'MyVendor', 'Shirts', 'boxy, color_black, color_gray, color_red, price_0-20, Shirts, size_L, size_M, size_S, size_XL, sleeveless', 'true', 'Size', 'S', 'Color', 'Gray', '', '', '', '0', '', '1', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-12_e8f7bcc1-8e0a-4966-80fd-3d38fcc28a1e.jpg?v=1514273438', '1', '', 'false', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy2-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'M', '', 'Gray', '', '', '', '0', '', '0', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-10_a5ea99b2-7c92-4729-8663-09f773920553.jpg?v=1514273438', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy2-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'L', '', 'Gray', '', '', '', '0', '', '0', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-03_aac92c7a-da9e-491b-af27-8262a681617e.jpg?v=1514273438', '3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy2-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'XL', '', 'Gray', '', '', '', '0', '', '0', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-13_6b2193bd-bb6c-4567-a5c5-1225cfee4b37.jpg?v=1514273438', '4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy2-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'S', '', 'Red', '', '', '', '0', '', '1', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-16_4f43caa8-9d48-49f0-af5b-88fe4be7190e.jpg?v=1514273438', '5', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy2-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'S', '', 'Black', '', '', '', '0', '', '1', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-04_f3ee58a7-1b48-402a-9839-047632fbca6a.jpg?v=1514273438', '6', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy2-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-11_20721cf5-cd6e-4d26-b594-3d965507ba98.jpg?v=1514273438', '7', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('boxy2-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-15_ace4475d-1f10-4843-964f-217820ad27d4.jpg?v=1514273438', '8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('boxy1-t-shirt-with-roll-sleeve', 'Boxy1 T-Shirt with Roll Sleeve', '<p class=\"s-text8\">Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat</p>\n<p class=\"s-text8\">Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat</p>\n<p class=\"s-text8\">Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat</p>', 'MyVendor', 'Shirts', 'boxy, price_0-20, Shirts, size_L, size_M, size_S, size_XL, sleeveless', 'true', 'Size', 'S', '', '', '', '', '', '0', '', '1', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-10_928bd293-fd66-4b11-af8f-8e118c77549a.jpg?v=1514273397', '1', '', 'false', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy1-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'M', '', '', '', '', '', '0', '', '0', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-03_a5f412b0-e098-45f5-a45b-c261afdf1d33.jpg?v=1514273397', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy1-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'L', '', '', '', '', '', '0', '', '0', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-12_9ff7511e-6d70-4db3-a5fb-b5553bc44298.jpg?v=1514273397', '3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy1-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', 'XL', '', '', '', '', '', '0', '', '0', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-13_5976fc46-3bdb-43c3-846b-61fec6a1a4d0.jpg?v=1514273397', '4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy1-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-15_ecf3a960-4e84-4565-a704-061af1862846.jpg?v=1514273397', '5', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('boxy1-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-16_fcd3642b-c700-4293-84d2-e6a4039c6bf6.jpg?v=1514273397', '6', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('boxy1-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-04_b817dc07-f1a0-43e9-ba4a-4360a4bcd609.jpg?v=1514273397', '7', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('boxy1-t-shirt-with-roll-sleeve', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-11_cadce953-3333-4954-97c4-8918d4a04fd1.jpg?v=1514273397', '8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('boxy-t-shirt-with-roll-sleeve-detail', 'Boxy T-Shirt with Roll Sleeve Detail', '<p class=\"s-text8\">Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat</p>\n<p class=\"s-text8\">Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat</p>\n<p class=\"s-text8\">Fusce ornare mi vel risus porttitor dignissim. Nunc eget risus at ipsum blandit ornare vel sed velit. Proin gravida arcu nisl, a dignissim mauris placerat</p>', 'MyVendor', 'Shirts', 'boxy, price_0-20, price_20-40, Shirts, size_L, size_M, size_S, size_XL, sleeveless', 'true', 'Size', 'S', '', '', '', '', '', '0', '', '1', 'deny', 'manual', '20.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-03.jpg?v=1514269273', '1', '', 'false', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy-t-shirt-with-roll-sleeve-detail', '', '', '', '', '', '', '', 'M', '', '', '', '', '', '0', '', '0', 'deny', 'manual', '30.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-10.jpg?v=1514269274', '2', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy-t-shirt-with-roll-sleeve-detail', '', '', '', '', '', '', '', 'L', '', '', '', '', '', '0', '', '0', 'deny', 'manual', '40.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-11.jpg?v=1514269276', '3', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy-t-shirt-with-roll-sleeve-detail', '', '', '', '', '', '', '', 'XL', '', '', '', '', '', '0', '', '0', 'deny', 'manual', '50.00', '', 'true', 'true', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-12.jpg?v=1514269278', '4', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'kg', ''),
('boxy-t-shirt-with-roll-sleeve-detail', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-13.jpg?v=1514269279', '5', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('boxy-t-shirt-with-roll-sleeve-detail', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-15.jpg?v=1514269281', '6', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('boxy-t-shirt-with-roll-sleeve-detail', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-16.jpg?v=1514269283', '7', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', ''),
('boxy-t-shirt-with-roll-sleeve-detail', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 'https://cdn.shopify.com/s/files/1/2672/5778/products/item-04.jpg?v=1514269285', '8', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_produk` varchar(16) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `slug_produk` varchar(50) NOT NULL,
  `keterangan` text NOT NULL,
  `keywords` text,
  `harga` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(50) NOT NULL,
  `berat` float DEFAULT NULL,
  `ukuran` varchar(50) DEFAULT NULL,
  `status_produk` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `id_kategori`, `kode_produk`, `nama_produk`, `slug_produk`, `keterangan`, `keywords`, `harga`, `stok`, `gambar`, `berat`, `ukuran`, `status_produk`, `tanggal_post`, `tanggal_update`) VALUES
(15, 6, 9, 'P001', 'Oli gear petro Asia UK.100 ml', 'oli-gear-petro-asia-uk100-ml-p001', '<p>Oli gear petro Asia UK.100 ml</p>\r\n', 'Oli gear petro Asia UK.100 ml   ', 30000, 20, 'Oli_gear_petro_Asia_UK_100_ml.jpg', 100, '100ml', 'Publish', '2021-02-03 05:17:32', '2021-02-03 04:18:57'),
(16, 6, 6, 'P002', 'Oli Mesin Matic Honda AHM SAE 10W-30', 'oli-mesin-matic-honda-ahm-sae-10w-30-p002', '<p>Oli Mesin Matic Honda AHM SAE 10W-30</p>\r\n', 'Oli Mesin Matic Honda AHM SAE 10W-30', 48000, 20, 'Oli_Mesin_Matic_Honda_AHM_SAE_10W-30.jpg', 800, '800ml', 'Publish', '2021-02-03 05:20:20', '2021-02-03 04:20:20'),
(17, 6, 9, 'P003', 'Petro Renova-GM 120 ML', 'petro-renova-gm-120-ml-p003', '<p>Petro Renova-GM 120 ML</p>\r\n', 'Petro Renova-GM 120 ML', 18500, 20, 'Petro_Renova-GM_120_ML.jpg', 120, '120ml', 'Publish', '2021-02-03 05:21:44', '2021-02-03 04:21:44'),
(18, 6, 7, 'P005', 'Petroasia Chain Lube 300ML', 'petroasia-chain-lube-300ml-p005', '<p>Petroasia Chain Lube 300ML</p>\r\n', 'Petroasia Chain Lube 300ML', 30000, 20, 'Petroasia_Chain_Lube_300ML.jpg', 300, '300ml', 'Publish', '2021-02-03 05:24:20', '2021-02-03 04:24:20'),
(19, 6, 7, 'P004', 'Petroasia Lubricant Oli Gear for Matic', 'petroasia-lubricant-oli-gear-for-matic-p004', '<p>Petroasia Lubricant Oli Gear for Matic</p>\r\n', 'Petroasia Lubricant Oli Gear for Matic', 30000, 20, 'Petroasia_Lubricant_Oli_Gear_for_Matic.jpg', 120, '120ml', 'Publish', '2021-02-03 05:27:51', '2021-02-03 04:27:51'),
(20, 6, 6, 'P006', 'Petroasia Revol Power SAE 20W40 API-SF', 'petroasia-revol-power-sae-20w40-api-sf-p006', '<p>Petroasia Revol Power SAE 20W40 API-SF</p>\r\n', 'Petroasia Revol Power SAE 20W40 API-SF', 48000, 20, 'Petroasia_Revol_Power_SAE_20W40_API-SF.jpg', 800, '800ml', 'Publish', '2021-02-03 05:28:48', '2021-02-03 04:28:48'),
(21, 6, 7, 'P007', 'Petroasia-Lubricant Radiator', 'petroasia-lubricant-radiator-p007', '<p>petroasia-lubricant radiator</p>\r\n', 'petroasia-lubricant radiator  ', 78000, 20, 'petroasia-lubricant_radiator.jpg', 5, '5 Liter', 'Publish', '2021-02-03 05:31:13', '2021-02-03 04:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(50) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `nomor_rekening`, `nama_pemilik`, `gambar`, `tanggal_post`) VALUES
(2, 'Bank Aceh Cab Atam', '1002003000', 'Citra Dewi', NULL, '2021-02-15 09:46:05'),
(3, 'Mandiri', '11223344556677889900', 'Syafrizal MMS', NULL, '2021-02-15 17:43:53');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_transaksi` varchar(50) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_pelanggan`, `kode_transaksi`, `id_produk`, `harga`, `jumlah`, `total_harga`, `tanggal_transaksi`, `tanggal_update`) VALUES
(1, 0, 1, '15VIOTH4UE202102', 18, 30000, 2, 60000, '2021-02-15 00:00:00', '2021-02-15 09:55:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `username`, `password`, `akses_level`, `tanggal_update`) VALUES
(6, 'Syafrizal MMS', 'arsipblogsyafrizal@gmail.com', 'Syafrizal MMS', '27d2f6af8bf7034875c5bd0b0bed3f7478d83595', 'Administrator', '2021-01-25 04:59:22'),
(7, 'Lazirfays MMS', 'akupuny@mail.com', 'Lazirfays MMS', '27d2f6af8bf7034875c5bd0b0bed3f7478d83595', 'User', '2021-01-25 05:19:10'),
(8, 'Syafrizal OK', 'b@gmail.com', 'Aku punya', 'dee090c31662b7cf6dd05ade43a7b5f377faeab2', 'Admin', '2021-01-25 17:05:40');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`),
  ADD UNIQUE KEY `kode_transaksi_2` (`kode_transaksi`),
  ADD UNIQUE KEY `kode_transaksi_3` (`kode_transaksi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD UNIQUE KEY `nomor_rekening` (`nomor_rekening`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`),
  ADD UNIQUE KEY `kode_transaksi_2` (`kode_transaksi`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
