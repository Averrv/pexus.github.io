-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Feb 25, 2024 at 01:38 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pexus`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_category`
--

CREATE TABLE `tb_category` (
  `category_id` int NOT NULL,
  `category_name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_category`
--

INSERT INTO `tb_category` (`category_id`, `category_name`) VALUES
(1, 'Sport'),
(2, 'Fashion'),
(3, 'Quotes'),
(4, 'Anime'),
(5, 'Wallpaper'),
(6, 'Car'),
(7, 'Meme'),
(8, 'Superhero'),
(9, 'Food'),
(10, 'Animal'),
(11, 'View'),
(12, 'Motocycle');

-- --------------------------------------------------------

--
-- Table structure for table `tb_image`
--

CREATE TABLE `tb_image` (
  `image_id` int NOT NULL,
  `category_id` int NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `admin_id` int NOT NULL,
  `admin_name` varchar(100) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `image_name` varchar(100) NOT NULL,
  `image_description` text NOT NULL,
  `image` varchar(100) NOT NULL,
  `image_status` tinyint(1) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_image`
--

INSERT INTO `tb_image` (`image_id`, `category_id`, `category_name`, `admin_id`, `admin_name`, `image_name`, `image_description`, `image`, `image_status`, `date_created`) VALUES
(48, 1, 'Sport', 6, 'Valen', 'Cock With racket', '<p>Cock With racket</p>\r\n', 'foto1708004004.jpg', 1, '2024-02-15 13:33:24'),
(49, 1, 'Sport', 6, 'Valen', 'Basquetbol ', '<p>Basquetbol&nbsp;</p>\r\n', 'foto1708004040.jpg', 1, '2024-02-15 13:34:00'),
(50, 1, 'Sport', 6, 'Valen', 'How Do the Tour de France Riders Train_', '<p>How Do the Tour de France Riders Train_</p>\r\n', 'foto1708004059.jpg', 1, '2024-02-15 13:34:19'),
(51, 1, 'Sport', 6, 'Valen', 'TIPS FOR TEACHING YOGA TO ATHLETES - Swagtail', '<p>TIPS FOR TEACHING YOGA TO ATHLETES - Swagtail</p>\r\n', 'foto1708004085.jpg', 1, '2024-02-15 13:34:45'),
(52, 1, 'Sport', 6, 'Valen', 'Fitness Motivation', '<p>Fitness Motivation</p>\r\n', 'foto1708006628.jpg', 1, '2024-02-15 14:17:08'),
(53, 1, 'Sport', 6, 'Valen', 'Premium Photo _ Bodybuilder posing  fitness muscled man on dark scene', '<p>Premium Photo _ Bodybuilder posing &nbsp;fitness muscled man on dark scene</p>\r\n', 'foto1708006647.jpg', 1, '2024-02-15 14:17:27'),
(54, 2, 'Fashion', 6, 'Valen', 'Easy and Cool Casual Outfits For Everyday Looks', '<p>Easy and Cool Casual Outfits For Everyday Looks</p>\r\n', 'foto1708006857.jpg', 1, '2024-02-15 14:20:57'),
(55, 2, '', 6, 'Valen', 'Men Shoes', 'Men Shoe Breathable Versatile Mesh Surface for Sport Leisure Original Men Sneaker Men Vulcanized Shoe Sapatos Masculino Zapatos black green-41', 'foto1708006926.jpg', 1, '2024-02-15 14:22:06'),
(56, 2, '', 6, 'Valen', 'Korean Style', 'Korean Style', 'foto1708006953.jpg', 1, '2024-02-15 14:22:33'),
(57, 3, 'Quotes', 6, 'Valen', 'im not perfect', '<p>im not perfect</p>\r\n', 'foto1708007456.jpg', 1, '2024-02-15 14:30:56'),
(58, 3, 'Quotes', 6, 'Valen', 'You can', '<p>You can</p>\r\n', 'foto1708007477.jpg', 1, '2024-02-15 14:31:17'),
(59, 3, 'Quotes', 6, 'Valen', 'Islamic Quote', '<p>Islamic Quote</p>\r\n', 'foto1708008014.jpg', 1, '2024-02-15 14:40:14'),
(60, 3, 'Quotes', 6, 'Valen', 'Dont Stop Until Youre Proud', '<p>Dont Stop Until Youre Proud</p>\r\n', 'foto1708008053.jpg', 1, '2024-02-15 14:40:53'),
(61, 3, 'Quotes', 6, 'Valen', 'Losing toxic people is win', '<p>Losing toxic people is win</p>\r\n', 'foto1708008082.jpg', 1, '2024-02-15 14:41:22'),
(62, 4, 'Anime', 6, 'Valen', 'xiao casual', '<p>xiao casual</p>\r\n', 'foto1708008573.jpg', 1, '2024-02-15 14:49:33'),
(63, 4, 'Anime', 6, 'Valen', 'Focalor', '<p>Focalor</p>\r\n', 'foto1708008591.jpg', 1, '2024-02-15 14:49:51'),
(64, 4, 'Anime', 6, 'Valen', 'Alhaitham', '<p>Alhaitham</p>\r\n', 'foto1708008617.jpg', 1, '2024-02-15 14:50:17'),
(65, 4, 'Anime', 6, 'Valen', 'Keqing', '<p>Keqing</p>\r\n', 'foto1708008632.jpg', 1, '2024-02-15 14:50:32'),
(66, 4, 'Anime', 6, 'Valen', 'Hutao', '<p>Hutao</p>\r\n', 'foto1708008645.jpg', 1, '2024-02-15 14:50:45'),
(67, 4, '', 6, 'Valen', 'Venti', 'Venti', 'foto1708008667.jpg', 1, '2024-02-15 14:51:07'),
(68, 4, 'Anime', 6, 'Valen', 'Zhongli', '<p>Zhongli</p>\r\n', 'foto1708008680.jpg', 1, '2024-02-15 14:51:20'),
(69, 5, 'Wallpaper', 6, 'Valen', 'Wallpaper Random Aestethic', '<p>Wallpaper Random Aestethic</p>\r\n', 'foto1708008877.jpg', 1, '2024-02-15 14:54:37'),
(73, 5, '-Select Kategori Photo-', 7, 'Aver', 'Gaming Wallpaper', '<p>Gaming Wallpaper</p>\r\n', 'foto1708522697.jpg', 0, '2024-02-22 00:37:18'),
(74, 5, 'Wallpaper', 7, 'Aver', 'Tropical Dream Displate Premium Metal Poster', '<p>Tropical Dream Displate Premium Metal Poster</p>\r\n', 'foto1708522713.jpg', 1, '2024-02-21 13:38:33'),
(75, 5, 'Wallpaper', 7, 'Aver', 'Spotify Wallpaper', '<p>Spotify Wallpaper</p>\r\n', 'foto1708522839.jpg', 1, '2024-02-21 13:40:39'),
(76, 6, 'Car', 6, 'Valen', 'A car', '<p>A car</p>\r\n', 'foto1708562153.jpg', 1, '2024-02-22 00:35:53');

-- --------------------------------------------------------

--
-- Table structure for table `tb_komentar`
--

CREATE TABLE `tb_komentar` (
  `komentar_id` int NOT NULL,
  `image_id` int NOT NULL,
  `admin_id` int NOT NULL,
  `admin_name` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `komentar` text NOT NULL,
  `tanggal_komentar` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `tb_komentar`
--

INSERT INTO `tb_komentar` (`komentar_id`, `image_id`, `admin_id`, `admin_name`, `komentar`, `tanggal_komentar`) VALUES
(814, 62, 6, 'Valen', 'oke berhasil\r\n', '2024-02-20 07:03:24'),
(815, 71, 6, 'Valen', 'test\r\n', '2024-02-20 07:08:56'),
(816, 62, 5, 'coba', 'p\r\n', '2024-02-20 07:22:36'),
(817, 62, 7, 'Aver', 'asd', '2024-02-20 07:24:07'),
(818, 61, 6, 'Valen', 'adasd', '2024-02-20 11:24:59'),
(819, 61, 6, 'Valen', 'asfasfas asdfa k salkskrengga\r\n', '2024-02-20 11:26:01'),
(823, 61, 6, 'Valen', 'test\r\n', '2024-02-21 07:16:46'),
(824, 61, 6, 'Valen', 'p balapppp\r\n', '2024-02-21 11:24:49'),
(825, 65, 6, 'Valen', 'a', '2024-02-21 11:53:12'),
(827, 75, 6, 'Valen', 'halo', '2024-02-22 07:34:19'),
(828, 76, 6, 'Valen', 'halo', '2024-02-22 07:36:15'),
(829, 76, 7, 'Aver', 'halooo', '2024-02-22 07:36:46');

-- --------------------------------------------------------

--
-- Table structure for table `tb_likes`
--

CREATE TABLE `tb_likes` (
  `id` int NOT NULL,
  `image_id` int DEFAULT NULL,
  `admin_id` int DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tb_likes`
--

INSERT INTO `tb_likes` (`id`, `image_id`, `admin_id`, `created_at`) VALUES
(33, 61, 7, '2024-02-21 12:47:24'),
(39, 61, 6, '2024-02-21 12:55:40'),
(40, 54, 6, '2024-02-21 12:56:29'),
(43, 49, 6, '2024-02-21 13:00:40'),
(44, 62, 7, '2024-02-21 13:47:11'),
(46, 76, 6, '2024-02-22 00:36:09'),
(47, 76, 7, '2024-02-22 00:36:29');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `admin_id` int NOT NULL,
  `admin_name` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `admin_telp` varchar(20) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `admin_email` varchar(50) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  `admin_address` text CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`admin_id`, `admin_name`, `username`, `password`, `admin_telp`, `admin_email`, `admin_address`) VALUES
(6, 'Valen', 'valen', 'valen', '085852701259', 'valenciabagas@gmail.com', 'Suberingin'),
(7, 'Aver', 'Aver', 'aver', '08887232832', 'admin@gmai.com', 'Suberingin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_category`
--
ALTER TABLE `tb_category`
  ADD PRIMARY KEY (`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `tb_image`
--
ALTER TABLE `tb_image`
  ADD PRIMARY KEY (`image_id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `admin_id` (`admin_id`);

--
-- Indexes for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  ADD PRIMARY KEY (`komentar_id`);

--
-- Indexes for table `tb_likes`
--
ALTER TABLE `tb_likes`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `unique_like` (`image_id`,`admin_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`admin_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tb_category`
--
ALTER TABLE `tb_category`
  MODIFY `category_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `tb_image`
--
ALTER TABLE `tb_image`
  MODIFY `image_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `tb_komentar`
--
ALTER TABLE `tb_komentar`
  MODIFY `komentar_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=830;

--
-- AUTO_INCREMENT for table `tb_likes`
--
ALTER TABLE `tb_likes`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `admin_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_image`
--
ALTER TABLE `tb_image`
  ADD CONSTRAINT `tb_image_ibfk_1` FOREIGN KEY (`admin_id`) REFERENCES `user` (`admin_id`),
  ADD CONSTRAINT `tb_image_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `tb_category` (`category_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
