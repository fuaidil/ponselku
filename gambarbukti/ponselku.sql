-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 17, 2019 at 01:18 PM
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
-- Database: `ponselku`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username`, `password`, `nama`) VALUES
(1, 'fuaidil', 'fuaidil123', 'fuaidil'),
(2, 'pendi', 'pendi', 'Efendi'),
(3, 'fuad', 'fuad', 'Fuaidil'),
(5, 'dul', '123', 'DUL'),
(8, 'maol', '123', 'maul');

-- --------------------------------------------------------

--
-- Table structure for table `ongkir`
--

CREATE TABLE `ongkir` (
  `id_ongkir` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ongkir`
--

INSERT INTO `ongkir` (`id_ongkir`, `nama_kota`, `tarif`) VALUES
(1, 'Solo', 5000),
(2, 'Jakarta', 25000),
(3, 'Jogja', 12000),
(4, 'Semarang', 15000);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int(11) NOT NULL,
  `email_pelanggan` varchar(100) NOT NULL,
  `password_pelanggan` varchar(50) NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `telepon_pelanggan` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `email_pelanggan`, `password_pelanggan`, `nama_pelanggan`, `telepon_pelanggan`) VALUES
(1, 'ifuaidil@gmail.com', 'fuad', 'Fuaidil', '085975127759'),
(2, 'fuadidil@gmail.com', 'fuad123', 'ikhrom', '085975127759'),
(3, 'pendi@gmail.com', 'pendi', 'Pendi', '089687124562'),
(4, 'maul@gmail.com', 'maul', 'maul', '08782455432'),
(5, 'aku@gmail.com', 'aku', 'Fuaidil', '086345345992');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_pembelian`, `nama`, `bank`, `jumlah`, `tanggal`, `bukti`) VALUES
(2, 26, 'Fuaidil', 'cimb niaga', 6103000, '2019-11-24', '20191124160843realmext.JPG'),
(3, 20, 'Pendi', 'Mandiri', 4504000, '2019-11-26', '20191126140609contact.png'),
(4, 18, 'Pendi', 'BRI', 6103000, '2019-11-26', '20191126142742bgcheck.png'),
(5, 32, 'Fuaidil', 'Mandiri', 9003000, '2019-12-11', '20191211015459find_user.png');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `total_pembelian` int(11) NOT NULL,
  `nama_kota` varchar(100) NOT NULL,
  `tarif` int(11) NOT NULL,
  `alamat` text NOT NULL,
  `status_pembelian` varchar(100) NOT NULL DEFAULT 'pending',
  `resi_pengiriman` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_pelanggan`, `id_ongkir`, `tanggal_pembelian`, `total_pembelian`, `nama_kota`, `tarif`, `alamat`, `status_pembelian`, `resi_pengiriman`) VALUES
(18, 3, 1, '2019-11-21', 6103000, 'Solo', 5000, '', 'Sudah kirim pembayaran', '0'),
(19, 3, 1, '2019-11-21', 7403000, 'Solo', 5000, '', 'pending', '0'),
(20, 3, 1, '2019-11-21', 4504000, 'Solo', 5000, '', 'barang dikirim', '453463463RO90324'),
(21, 3, 1, '2019-11-21', 9003000, 'Solo', 5000, '', 'pending', '0'),
(22, 3, 1, '2019-11-21', 4504000, 'Solo', 5000, '', 'pending', '0'),
(23, 3, 1, '2019-11-21', 17503000, 'Solo', 5000, 'Jl. Sadewa rt 03 rw 03 Kartasura\r\nKode Pos : 57168', 'pending', '0'),
(24, 1, 1, '2019-11-22', 13502000, 'Solo', 5000, 'Jl. Slamet Riyadi no.588', 'pending', '0'),
(26, 1, 1, '2019-11-23', 3704000, 'Solo', 5000, 'Jajar rt04 rw03 Jajar, Laweyan, Surakarta', 'barang dikirim', 'R0P451209388273'),
(27, 1, 1, '2019-11-24', 13004000, 'Solo', 5000, 'jajar', 'pending', '0'),
(28, 1, 1, '2019-11-25', 29503000, 'Solo', 5000, 'jajar', 'pending', '0'),
(29, 3, 1, '2019-11-26', 2404000, 'Solo', 5000, 'kartasura\r\n', 'pending', ''),
(30, 1, 1, '2019-11-29', 23900000, 'Solo', 5000, 'Jajar', 'pending', ''),
(31, 1, 2, '2019-12-03', 11122000, 'Jakarta', 25000, 'Kemayorn', 'pending', ''),
(32, 1, 1, '2019-12-11', 9003000, 'Solo', 5000, 'Jl. Slamet Riyadi no.588', 'barang dikirim', '4398539A083924');

-- --------------------------------------------------------

--
-- Table structure for table `pembelian_produk`
--

CREATE TABLE `pembelian_produk` (
  `id_pembelian_produk` int(11) NOT NULL,
  `id_pembelian` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `subharga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pembelian_produk`
--

INSERT INTO `pembelian_produk` (`id_pembelian_produk`, `id_pembelian`, `id_produk`, `jumlah`, `nama`, `harga`, `subharga`) VALUES
(7, 16, 1, 1, 'Realme XT', 4499000, 4499000),
(8, 16, 2, 2, 'Realme X', 2399000, 4798000),
(9, 22, 1, 1, 'Realme XT', 4499000, 4499000),
(10, 23, 1, 1, 'Realme XT', 4499000, 4499000),
(11, 23, 3, 1, 'Samsung Galaxy S10', 12999000, 12999000),
(12, 24, 1, 3, 'Realme XT', 4499000, 13497000),
(13, 25, 2, 1, 'Realme X', 2399000, 2399000),
(14, 25, 4, 1, 'Samsung Galaxy Note 10 Plus', 16499000, 16499000),
(15, 26, 6, 1, 'Realme 3 pro', 3699000, 3699000),
(16, 27, 3, 1, 'Samsung Galaxy S10', 12999000, 12999000),
(17, 28, 3, 1, 'Samsung Galaxy S10', 12999000, 12999000),
(18, 28, 4, 1, 'Samsung Galaxy Note 10 Plus', 16499000, 16499000),
(19, 29, 2, 1, 'Realme X', 2399000, 2399000),
(20, 30, 3, 1, 'Samsung Galaxy S10', 12999000, 12999000),
(21, 30, 5, 1, 'Realme 5 pro', 3699000, 3699000),
(22, 30, 2, 3, 'Realme X', 2399000, 7197000),
(23, 31, 5, 2, 'Realme 5 pro', 3699000, 7398000),
(24, 31, 6, 1, 'Realme 3 pro', 3699000, 3699000),
(25, 32, 1, 2, 'Realme XT', 4499000, 8998000);

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `foto_produk` varchar(100) NOT NULL,
  `deskripsi_produk` text NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `harga_produk`, `foto_produk`, `deskripsi_produk`, `stok`) VALUES
(1, 'Realme XT', 4499000, 'realmext.jpg', '<pre>\r\nTechnology  : GSM/ HSPA / LTE\r\nDisplay     : Super AMOLED\r\nSize	    : 6.4 inches\r\nResolution  : 1080 x 2340 pixels\r\nOS 	    : Android 9.0 (Pie)\r\nChipset     : Qualcomm SDM712 Snapdragon 712(10nm)\r\nCPU 	    : Octa-core(2x2.3 GHz Kryo 360 Gold &\r\n6x1.7 GHz Kyo 360 Silver)\r\nGPU 	    : Adreno 616\r\nRAM 	    : 8 GB\r\nROM 	    : 128 GB\r\nMain Camera : Quad Camera\r\n64 MP, f/1.8, (wide), 1/1.7\", 0.8nm ,PDAF\r\n8 MP, f/2.3, 13mm(ultrawide), 1/4\", 1.12nm\r\n2 MP, f/2.4, 1/5\", 1.75nm(dedicated macro camera)\r\n2 MP, f/2.4, 1/5\", 1.75nm, depth sensor\r\nFront Camera: 16 MP, f/2.0, 1/3.1\", 1.0nm\r\nSensors	    : Fingerprint(under display, optical), \r\naccelerometer, gyro, proximity, compass\r\nBattery     : Li-Po 4000 mAh\r\nFast battery charging 20W (VOOC Flash Charge 3.0)\r\n</pre>', 3),
(2, 'Realme X', 2399000, 'realmex.jpg', '<pre>\r\nTechnology  : GSM / HSPA / LTE\r\nDisplay     : AMOLED\r\nSize	    : 6.53 inches\r\nResolution  : 1080 x 2340 pixels\r\nOS    	    : Android 9.0 (Pie)\r\nChipset     : Qualcomm SDM710 Snapdragon 710(10nm)\r\nCPU 	    : Octa-core(2x2.2 GHz Kryo 360 Gold & 6x1.7 GHz Kyo 360 Silver)\r\nGPU 	    : Adreno 616\r\nRAM 	    : 8 GB\r\nROM 	    : 256 GB\r\nMain Camera : Dual Camera\r\n48 MP, f/1.7, (wide), 26mm(wide), 1/2\",0.8nm,PDAF\r\n5 MP, f/2.4, depth sensor\r\nFront Camera: 16 MP, f/2.0, 25mm(wide), 1/3\",1.0nm\r\nSensors	    : Fingerprint(under display, optical), \r\naccelerometer, gyro, proximity, compass\r\nBattery     : Li-Po 3765 mAh\r\nFast battery charging 20W (VOOC 3.0)\r\n</pre>', 6),
(3, 'Samsung Galaxy S10', 12999000, 'samsungs10.jpg', '<pre>\r\nTechnology  : GSM / CDMA / HSPA / EVDO / LTE\r\nDisplay     : Dynamic AMOLED\r\nSize	    : 6.1 inches\r\nResolution  : 1440 x 3040 pixels\r\nOS 	    : Android 9.0 (Pie); One UI\r\nChipset     : Exynos 9820 (8 nm) - EMEA/LATAM\r\nQualcomm SDM855 Snapdragon (7nm)-USA/China\r\nCPU 	    : Octa-core(2x2.73 GHz Mongoose M4 & 2x2.31 GHz Cortex-A57 & 4x1.95 GHz \r\nCortex-A55) - EMEA/LATAM\r\nOcta-Core(1x2.84 GHz Kryo 485 & 3x2.42 GHz Kryo 485 & 4x1.78 GHz Kryo 485) - USA/China\r\nGPU 	    : Mali-G76 MP12 - EMA/LATAM\r\nAdreno 640 - USA/China\r\nRAM 	    : 8 GB\r\nROM 	    : 512 GB\r\nMain Camera : Triple Camera\r\n 12 MP, f/1.5-2.4, 26mm(wide), 1/2.55\", 1.4nm , Dual Pixel PDAF, OIS\r\n12 MP, f/2.4, 52mm(telephoto), 1/3.6\", \r\n1.0nm, AF, OIS, 2x optical zoom\r\n16 MP, f/2.2, 12mm(ultrawide), 1.0nm, Super Steady video\r\nFront Camera: 10 MP,f/1.9,26mm(wide),1.22nm,DualPixel PDAF\r\nSensors	    : Fingerprint(under display, ultrasonic), \r\naccelerometer, gyro, proximity, compass, \r\nbarometer, heart rate, SpO2\r\nBattery     : Li-Ion 3400 mAh\r\nFast battery charging 15W\r\nUSB Power Delivery 2.0\r\nFast Qi/PMA wireless charging 15W\r\n</pre>									', 3),
(4, 'Samsung Galaxy Note 10 Plus', 16499000, 'samsungnote10+.JPG', '<pre>\r\nTechnology  : GSM / CDMA / HSPA / EVDO / LTE\r\nDisplay     : Dynamic AMOLED\r\nSize	    : 6.1 inches\r\nResolution  : 1440 x 3040 pixels\r\nOS 	    : Android 9.0 (Pie); One UI\r\nChipset     : Exynos 9820 (8 nm) - EMEA/LATAM\r\nQualcomm SDM855 Snapdragon 855 (7nm)- USA/China\r\nCPU 	    : Octa-core(2x2.73 GHz Mongoose M4 & 2x2.31 GHz Cortex-A57 & 4x1.95 GHz Cortex-A55) - EMEA/LATAM\r\nOcta-Core(1x2.84 GHz Kryo 485 & 3x2.42 GHz Kryo 485 & 3x2.42 GHz Kryo 485 & 4x1.78 GHz Kryo 485) - USA/China\r\nGPU 	    : Mali-G76 MP12 - EMA/LATAM Adreno 640 - USA/China\r\nRAM 	    : 8 GB\r\nROM 	    : 512 GB\r\nMain Camera : Triple Camera\r\n12 MP, f/1.5-2.4, 26mm(wide), 1/2.55\", 1.4nm , Dual Pixel PDAF, OIS\r\n12 MP, f/2.4, 52mm(telephoto), 1/3.6\", 1.0nm, AF, OIS, 2x optical zoom\r\n16 MP, f/2.2, 12mm(ultrawide), 1.0nm, Super Steady video\r\nFront Camera: 10 MP,f/1.9,26mm(wide),1.22nm,Dual Pixel PDAF\r\nSensors	    : Fingerprint(under display, ultrasonic), accelerometer, gyro, proximity, compass, barometer, heart rate, SpO2\r\nBattery     : Li-Ion 3400 mAh\r\nFast battery charging 15W\r\nUSB Power Delivery 2.0\r\nFast Qi/PMA wireless charging 15W\r\n</pre>', 4),
(5, 'Realme 5 pro', 3699000, 'realme5proo.jpg', '<pre>\r\nTechnology  : GSM / HSPA / LTE\r\nDisplay     : IPS LCD\r\nSize	    : 6.3 inches\r\nResolution  : 1080 x 2340 pixels\r\nOS 	    : Android 9.0 (Pie)\r\nChipset     : Qualcomm SDM712 Snapdragon 712(10nm)\r\nCPU 	    : Octa-core(2x2.3 GHz Kryo 360 Gold &\r\n6x1.7 GHz Kyo 360 Silver)\r\nGPU 	    : Adreno 616\r\nRAM 	    : 8 GB\r\nROM 	    : 128 GB\r\nMain Camera : Quad Camera\r\n48 MP, f/1.8, (wide), 1/2\", 0.8nm ,PDAF\r\n8 MP, f/2.2, 13mm(ultrawide), 1/4\", 1.12nm\r\n2 MP, f/2.4, 1/5\", 1.75nm\r\n2 MP, f/2.4, 1/5\", 1.75nm, depth sensor\r\nFront Camera: 16 MP, f/2.0, 1/3.1\", 1.0nm\r\nSensors	    : Fingerprint(rear-mounted), accelerometer, gyro, proximity, compass\r\nBattery     : Li-Po 4035 mAh\r\nFast battery charging 20W (VOOC 3.0)\r\n</pre>', 2),
(6, 'Realme 3 pro', 3699000, 'realme3.jpg', '<pre>\r\nTechnology  : GSM / HSPA / LTE\r\nDisplay     : IPS LCD\r\nSize	    : 6.3 inches\r\nResolution  : 1080 x 2340 pixels\r\nOS          : Android 9.0 (Pie)\r\nChipset     : Qualcomm SDM710 Snapdragon 710(10nm)\r\nCPU 	    : Octa-core(2x2.2 GHz Kryo 360 Gold & 6x1.7 GHz Kyo 360 Silver)\r\nGPU 	    : Adreno 616\r\nRAM 	    : 6 GB\r\nROM 	    : 128 GB\r\nMain Camera : Dual Camera\r\n16 MP, f/1.7, 1/2.6\", 1.22nm, Dual Pixel, PDAF\r\n5 MP, f/2.4, depth sensor\r\nFront Camera: 25 MP, f/2.0, 1/2.8\", 0.8nm\r\nSensors	    : Fingerprint(rear-mounted), accelerometer, gyro, proximity, compass\r\nBattery     : Li-Po 4045 mAh\r\nFast battery charging 20W (VOOC 3.0)\r\n</pre>', 4),
(7, 'Samsung Galaxy A50', 3849000, 'samsunga50.jpeg', '												<pre>\r\nTechnology  : GSM / HSPA / LTE\r\nDisplay     : Super AMOLED\r\nSize	    : 6.4 inches\r\nResolution  : 1080 x 2340 pixels\r\nOS 	    : Android 9.0 (Pie)\r\nChipset     : Exynos 9610 (10nm)\r\nCPU 	    : Octa-core(4x2.3 GHz Cortex-A73 & 4x1.7 GHz Cortex-A53)\r\nGPU 	    : Mali-G72 MP3\r\nRAM 	    : 6 GB\r\nROM 	    : 128 GB\r\nMain Camera : Triple Camera\r\n	      25 MP, f/1.7, 26mm(wide), PDAF\r\n	      8 MP, f/2.2, 13mm (ultrawide)\r\n	      5 MP, f/2.2, depth sensor\r\nFront Camera: 25 MP,f/2.0,25mm(wide)\r\nSensors	    : Fingerprint(under display, optical), accelerometer, gyro, proximity, compass\r\nBattery     : Li-Po 4000 mAh\r\n              Fast battery charging 15W\r\n</pre>								', 15),
(8, 'Samsung Galaxy M30s', 3699000, 'samsungm30s.jpeg', '			<pre>\r\nTechnology  : GSM / HSPA / LTE\r\nDisplay     : Super AMOLED\r\nSize	    : 6.4 inches\r\nResolution  : 1080 x 2340 pixels\r\nOS 	    : Android 9.0 (Pie); One UI\r\nChipset     : Exynos 9611 (10nm)\r\nCPU 	    : Octa-core(4x2.3 GHz Cortex-A73 & 4x1.7 GHz Cortex-A53)\r\nGPU 	    : Mali-G72 MP3\r\nRAM 	    : 6 GB\r\nROM 	    : 128 GB\r\nMain Camera : Triple Camera\r\n48 MP, f/2.0, (wide), 1/2\",0.8nm,PDAF\r\n8 MP, f/2.2, 12mm(ultrawide), 1/3.6\", \r\n1.0nm, AF, OIS, 2x optical zoom\r\n5 MP, f/2.2, depth sensor\r\nFront Camera: 10 MP,f/2.0\r\nSensors	    : Fingerprint(rear-mounted),accelerometer, gyro, proximity, compass\r\nBattery     : Li-Ion 6000 mAh\r\nFast battery charging 15W\r\n</pre>		', 10),
(9, 'Vivo V17 Pro', 5699000, 'vivov17pro.png', '<pre>\r\nDisplay     : Super AMOLED\r\nSize	    : 6.44 inches\r\nResolution  : 1080 x 2400 pixels\r\nOS 	    : Android 9.0 (Pie); Funtouch 9.1\r\nChipset     : Qualcomm SDM675 Snapdragon 675(11nm)\r\nCPU 	    : Octa-core(2x2.0 GHz Kryo 460 Gold & 6x1.7 GHz Kryo 460 silver)\r\nGPU 	    : Adreno 612\r\nRAM 	    : 8 GB\r\nROM 	    : 128 GB\r\nMain Camera : Quad Camera\r\n            48 MP, f/1.8, 26mm(wide), 1/2\",0.8nm,PDAF\r\n            8 MP, f/2.2, 16mm(ultrawide), 1/4\", 1.12nm\r\n           13 MP,(telephoto),PDAF,2x optical zoom\r\n           2 MP, f/2.4, 1/5\", 1.75nm, depth sensor\r\nFront Camera: Motorized pop-up 32 MP,f/2.0,(wide)\r\n		      Motorized pop-up 8 MP, 17mm(ultrawide)\r\nSensors	    : Fingerprint(under display, optical), accelerometer, gyro, proximity, compass\r\nBattery     : Li-Ion 4100 mAh\r\n</pre>', 9),
(10, 'Vivo Z1 Pro', 3699000, 'vivoz1pro.jpg', '<pre>\r\nDisplay     : IPS LCD\r\nSize	    : 6.53 inches\r\nResolution  : 1080 x 2340 pixels\r\nOS 	    : Android 9.0 (Pie); Funtouch 9\r\nChipset     : Qualcomm SDM712 Snapdragon 712 (10nm)\r\nCPU 	    : Octa-core(2x2.3 GHz Kryo 360 Gold & 6x1.7 GHz Kryo 360 Silver)\r\nGPU 	    : Adreno 616\r\nRAM 	    : 6 GB\r\nROM 	    : 128 GB\r\nMain Camera : Triple Camera\r\n              16 MP, f/1.8,(wide),1/2.8\",1.12nm,AF\r\n              8 MP, f/2.2, 16mm(ultrawide)\r\n              2 MP, f/2.4, depth sensor\r\nFront Camera: 32 MP,f/2.0\r\nSensors	    : Fingerprint(rear-mounted), accelerometer,gyro,proximity,compass\r\nBattery     : Li-Ion 5000 mAh\r\n            Fast battery charging 18W\r\n</pre>', 14),
(11, 'Vivo S1', 3299000, 'vivos1.jpg', 'Technology  : GSM / HSPA / LTE\r\nDisplay     : Super AMOLED\r\nSize	    : 6.38 inches\r\nResolution  : 1080 x 2340 pixels\r\nOS 	    : Android 9.0 (Pie); Funtouch 9\r\nChipset     : Mediatek MT6768 Helio P65(12nm)\r\nCPU 	    : Octa-core(2x2.0 GHz Cortex-A75 & 6x1.7 GHz Cortex-A55)\r\nGPU 	    : Mali-G52 MC2\r\nRAM 	    : 6 GB\r\nROM 	    : 128 GB\r\nMain Camera : Triple Camera\r\n              16 MP, f/1.8,(wide), 1/2.8\", 1.12nm, PDAF\r\n              8 MP, f/2.2, 13mm (ultrawide)\r\n              2 MP, f/2.4, depth sensor\r\nFront Camera: 32 MP,f/2.0\r\nSensors	    : Fingerprint(under display, optical), accelerometer, proximity, compass\r\nBattery     : Li-Po 4500 mAh\r\n             Fast battery charging 18W', 17),
(12, 'Vivo Y17', 2799000, 'vivoy17.png', '<pre>\r\nDisplay     : IPS LCD\r\nSize	    : 6.35 inches\r\nResolution  : 720 x 1544 pixels\r\nOS 	    : Android 9.0 (Pie); Funtouch 9\r\nChipset     : Mediatek MT6765 Helio P35(12nm)\r\nCPU 	    : Octa-core(4x2.3 GHz Cortex-A53 & \r\n4x1.8 GHz Cortex-A53)\r\nGPU 	    : PowerVR GE8320\r\nRAM 	    : 4 GB\r\nROM 	    : 128 GB\r\nMain Camera : Triple Camera\r\n              13 MP, f/2.2, PDAF\r\n              8 MP, f/2.2, 16mm (ultrawide)\r\n              2 MP, f/2.4, depth sensor\r\nFront Camera: 20 MP, f/2.0 - Global\r\n	      16 MP, f/2.0 - China\r\nSensors	    : Fingerprint(rear-mounted), accelerometer, proximity, compass\r\nBattery     : Li-Ion 5000 mAh\r\n              Fast battery charging 18W\r\n</pre>', 7),
(13, 'LG G7 PLUS THIN-Q', 2469935, 'lgg7thinq.jpg', '', 19);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `ongkir`
--
ALTER TABLE `ongkir`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indexes for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  ADD PRIMARY KEY (`id_pembelian_produk`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `ongkir`
--
ALTER TABLE `ongkir`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `pembelian_produk`
--
ALTER TABLE `pembelian_produk`
  MODIFY `id_pembelian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
