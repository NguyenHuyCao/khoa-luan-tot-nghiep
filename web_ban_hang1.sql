-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 27, 2025 at 12:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_ban_hang`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--


CREATE DATABASE web_ban_hang;

USE web_ban_hang;

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Sofa', '2021-07-07 11:50:15', '2025-03-26 08:07:10'),
(2, 'Bàn trà', '2021-07-07 11:50:15', '2025-01-26 09:41:38'),
(60, 'Giường', '2025-03-26 09:35:21', '2025-03-26 09:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `collections`
--

CREATE TABLE `collections` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp(),
  `updated_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `collections`
--

INSERT INTO `collections` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Muji', '2023-12-26 18:08:52', '2025-03-03 05:32:01'),
(2, 'Milano&Design', '2023-12-26 18:08:52', '2025-01-26 08:28:45'),
(3, 'Chateau d\'Ax ', '2023-12-26 18:08:52', '2025-01-26 08:49:53'),
(49, 'Kenli', '2025-01-26 09:32:38', '2025-02-26 05:05:16');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `fullname` varchar(50) DEFAULT NULL,
  `email` varchar(50) NOT NULL,
  `phone_number` varchar(11) NOT NULL,
  `message_contact` varchar(255) NOT NULL,
  `id_user` int(11) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `fullname`, `email`, `phone_number`, `message_contact`, `id_user`, `created_at`) VALUES
(35, 'pham tat dat', 'a41324@gmail.com', '0123456789', ' gggfdfsgsđsf', 12, '2025-03-26 07:43:47');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(11) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone_number` varchar(20) NOT NULL,
  `email` varchar(150) NOT NULL,
  `address` varchar(200) NOT NULL,
  `note` varchar(255) DEFAULT NULL,
  `order_date` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `fullname`, `phone_number`, `email`, `address`, `note`, `order_date`) VALUES
(179, 'Phạm Tất Đạt', '0951151175', 'phtatdat2706@gmail.com', 'Thạch Bàn, Long Biên, Hà Nội', '', '2025-01-26 06:48:45'),
(181, 'Phạm Tất Đạt', '0951151175', 'phtatdat2706@gmail.com', 'fhaadjhdjhgsdj', '', '2025-01-26 08:35:17'),
(184, 'Phạm Tất Đạt', '0951151175', 'phtatdat2706@gmail.com', 'fhaadjhdjhgsdj', 'Abcd. xuz. xzx .v', '2025-01-26 16:49:42'),
(187, 'pham tat dat', '123456789', 'a41324@gmail.com', 'hn', 'abcd hehe', '2025-02-18 09:35:51'),
(188, 'Kim Jong Un', '123456789', 'kim@gmail.com', 'South Korea', '', '2025-02-18 10:05:54'),
(189, 'Kim Jong Un', '123456789', 'kim@gmail.com', 'South Korea', '', '2025-02-18 10:45:55'),
(192, 'Kim Jong Un', '123456789', 'kim@gmail.com', 'South Korea', '', '2025-02-18 11:20:43'),
(195, 'pham tat dat', '123456789', 'a41324@gmail.com', 'hn123', '', '2025-03-01 08:22:12'),
(196, 'pham tat dat', '123456789', 'a41324@gmail.com', 'hn123', '', '2025-03-01 09:20:18'),
(197, 'pham tat dat', '123456789', 'a41324@gmail.com', 'hn123', '', '2025-03-01 09:29:41'),
(198, 'pham tat dat', '123456789', 'a41324@gmail.com', 'hn123', '', '2025-03-01 09:33:26'),
(199, 'pham tat dat', '123456789', 'a41324@gmail.com', 'hn123', '', '2025-03-01 09:52:24'),
(200, 'pham tat dat', '123456789', 'a41324@gmail.com', 'hn123', '', '2025-03-01 10:12:19'),
(201, 'pham tat dat', '123456789', 'a41324@gmail.com', 'hn123', '', '2025-03-03 15:46:59'),
(202, 'pham tat dat', '123456789', 'a41324@gmail.com', 'hn123', '', '2025-03-05 16:13:28'),
(203, 'pham tat dat', '123456789', 'a41324@gmail.com', 'hn123', '', '2025-03-07 15:40:39'),
(204, 'pham tat dat', '123456789', 'a41324@gmail.com', 'hn123', '', '2025-03-18 10:17:08'),
(205, 'pham tat dat', '123456789', 'a41324@gmail.com', 'hn123', 'jhhiyiuuyiyui87898', '2025-03-18 10:18:42'),
(206, 'pham tat dat', '123456789', 'a41324@gmail.com', 'hn123', '', '2025-03-25 15:15:03');

-- --------------------------------------------------------

--
-- Table structure for table `order_details`
--

CREATE TABLE `order_details` (
  `id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `num` int(11) NOT NULL,
  `price` float NOT NULL,
  `status` varchar(255) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `order_details`
--

INSERT INTO `order_details` (`id`, `order_id`, `product_id`, `id_user`, `num`, `price`, `status`) VALUES
(191, 179, 2, 8, 4, 699000, 'Đã nhận hàng'),
(194, 181, 2, 8, 4, 25600000, 'Đã nhận hàng'),
(197, 184, 15, 8, 1, 239000000, 'Đã nhận hàng'),
(200, 187, 63, 12, 1, 25000000, 'Đã nhận hàng'),
(201, 188, 64, 13, 1, 20000000, 'Đã nhận hàng'),
(202, 189, 15, 13, 1, 239000000, 'Đã nhận hàng'),
(205, 192, 62, 13, 1, 65000000, 'Đã nhận hàng'),
(209, 195, 5, 12, 4, 258000000, 'Đã nhận hàng'),
(210, 195, 15, 12, 3, 239000000, 'Đã nhận hàng'),
(212, 196, 62, 12, 2, 65000000, 'Đã nhận hàng'),
(215, 198, 5, 12, 2, 258000000, 'Đã nhận hàng'),
(216, 198, 61, 12, 2, 125600000, 'Đã nhận hàng'),
(217, 199, 5, 12, 2, 258000000, 'Đã nhận hàng'),
(218, 200, 63, 12, 2, 25000000, 'Đã hủy'),
(219, 201, 11, 12, 1, 162000000, 'Đã nhận hàng'),
(220, 201, 62, 12, 2, 65000000, 'Đang giao'),
(221, 202, 15, 12, 2, 239000000, 'Đã hủy'),
(223, 203, 62, 12, 1, 65000000, 'Tiếp nhận'),
(224, 204, 3, 12, 1, 140000000, 'Đã nhận hàng'),
(225, 205, 15, 12, 1, 239000000, 'Đang giao'),
(226, 206, 5, 12, 1, 258000000, 'Đang giao'),
(227, 206, 11, 12, 1, 162000000, 'Đã hủy');

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `number` float NOT NULL,
  `thumbnail` varchar(500) NOT NULL,
  `thumbnail_1` varchar(500) NOT NULL,
  `thumbnail_2` varchar(500) NOT NULL,
  `thumbnail_3` varchar(500) NOT NULL,
  `thumbnail_4` varchar(500) NOT NULL,
  `thumbnail_5` varchar(500) NOT NULL,
  `content` longtext NOT NULL,
  `id_category` int(11) NOT NULL,
  `id_sanpham` int(11) NOT NULL,
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`id`, `title`, `price`, `number`, `thumbnail`, `thumbnail_1`, `thumbnail_2`, `thumbnail_3`, `thumbnail_4`, `thumbnail_5`, `content`, `id_category`, `id_sanpham`, `created_at`, `updated_at`) VALUES
(2, 'Sofa Kem Gỗ 3 chỗ ngồi MUJI', 25600000, 0, 'uploads/1.jpg', 'uploads/2.jpg', 'uploads/3.jpg', 'uploads/4.jpg', 'uploads/5.jpg', 'uploads/6.jpg', '<p style=\"border-color: hsl(var(--border)); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin-right: 0px; margin-bottom: 0.5rem; margin-left: 0px; font-size: 15px; line-height: 1.5rem; color: rgb(9, 9, 11); font-family: \" open=\"\" sans\",=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial;\"=\"\"><span data-sheets-root=\"1\" style=\"border-color: hsl(var(--border)); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ;\">Sofa Lông Vũ 3 Chỗ Ngồi MUJI</span></p><p style=\"border-color: hsl(var(--border)); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin-right: 0px; margin-bottom: 0.5rem; margin-left: 0px; font-size: 15px; line-height: 1.5rem; color: rgb(9, 9, 11); font-family: \" open=\"\" sans\",=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial;\"=\"\">Đây là loại ghế sofa có đệm lông vũ thuộc \"Dòng sản phẩm thân sofa\" ra mắt vào tháng 3 năm 2020. Lượng lông vũ bên trong đã được tăng thêm, mang lại trải nghiệm ngồi êm ái và ôm trọn cơ thể từ cả phần lưng và đệm ngồi. Đệm ghế sử dụng lò xo túi, thường được dùng trong nệm, mang lại độ đàn hồi vừa phải và cảm giác thoải mái khi tựa người.</p><p style=\"border-color: hsl(var(--border)); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin-right: 0px; margin-bottom: 0.5rem; margin-left: 0px; font-size: 15px; line-height: 1.5rem; color: rgb(9, 9, 11); font-family: \" open=\"\" sans\",=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial;\"=\"\">Chiều cao của tay vịn đã được điều chỉnh để phù hợp nhất, cho dù bạn tựa lưng hay để tay nghỉ ngơi. Khung chính được làm bằng thép bền, và các đệm lưng và ghế có thể thay thế, đảm bảo sử dụng lâu dài. Sản phẩm cần được lắp ráp.</p><p style=\"border-color: hsl(var(--border)); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin-right: 0px; margin-bottom: 0.5rem; margin-left: 0px; font-size: 15px; line-height: 1.5rem; color: rgb(9, 9, 11); font-family: \" open=\"\" sans\",=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial;\"=\"\">Sản xuất tại Trung Quốc</p><p style=\"border-color: hsl(var(--border)); --tw-border-spacing-x: 0; --tw-border-spacing-y: 0; --tw-translate-x: 0; --tw-translate-y: 0; --tw-rotate: 0; --tw-skew-x: 0; --tw-skew-y: 0; --tw-scale-x: 1; --tw-scale-y: 1; --tw-pan-x: ; --tw-pan-y: ; --tw-pinch-zoom: ; --tw-scroll-snap-strictness: proximity; --tw-gradient-from-position: ; --tw-gradient-via-position: ; --tw-gradient-to-position: ; --tw-ordinal: ; --tw-slashed-zero: ; --tw-numeric-figure: ; --tw-numeric-spacing: ; --tw-numeric-fraction: ; --tw-ring-inset: ; --tw-ring-offset-width: 0px; --tw-ring-offset-color: #fff; --tw-ring-color: rgba(59,130,246,.5); --tw-ring-offset-shadow: 0 0 #0000; --tw-ring-shadow: 0 0 #0000; --tw-shadow: 0 0 #0000; --tw-shadow-colored: 0 0 #0000; --tw-blur: ; --tw-brightness: ; --tw-contrast: ; --tw-grayscale: ; --tw-hue-rotate: ; --tw-invert: ; --tw-saturate: ; --tw-sepia: ; --tw-drop-shadow: ; --tw-backdrop-blur: ; --tw-backdrop-brightness: ; --tw-backdrop-contrast: ; --tw-backdrop-grayscale: ; --tw-backdrop-hue-rotate: ; --tw-backdrop-invert: ; --tw-backdrop-opacity: ; --tw-backdrop-saturate: ; --tw-backdrop-sepia: ; --tw-contain-size: ; --tw-contain-layout: ; --tw-contain-paint: ; --tw-contain-style: ; margin-right: 0px; margin-bottom: 0.5rem; margin-left: 0px; font-size: 15px; line-height: 1.5rem; color: rgb(9, 9, 11); font-family: \" open=\"\" sans\",=\"\" \"helvetica=\"\" neue\",=\"\" helvetica,=\"\" arial;\"=\"\"><span style=\"color: rgb(60, 60, 67); font-size: 14px;\"><u>Thông số: </u>227x90,5x75cm</span></p>', 1, 1, '2022-10-30 15:11:49', '2025-03-15 07:25:45'),
(3, 'SOFA DA THẬT CLOUD F040', 140000000, 4, 'uploads/sofa-cloud-f040-12-750x500.jpg', 'uploads/sofa-cloud-f040-3-750x500.jpg', 'uploads/sofa-cloud-f040-4-750x500.jpg', 'uploads/sofa-cloud-f040-12-750x500.jpg', 'uploads/sofa-cloud-f040-15-750x500.jpg', 'uploads/sofa-cloud-f040-16-750x500.jpg', '<span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">Milano&amp;Design</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">&nbsp;- Chạm và cảm nhận</span><br style=\"color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\"><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">Top 5</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">&nbsp;thương hiệu&nbsp;</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">lớn nhất Châu Á</span><br style=\"color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\"><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">Milano&amp;Design</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">&nbsp;là thương hiệu trực thuộc tập đoàn sản xuất sofa da&nbsp;</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">lớn nhất châu Âu - Chateau d\'Ax</span><br style=\"color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\"><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">Kế thừa những giá trị tinh túy hơn&nbsp;</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">70 năm kinh nghiệm</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">&nbsp;chế tác&nbsp;</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">sofa da thủ công</span><br style=\"color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\"><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">Là thương hiệu có&nbsp;</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">doanh số lớn nhất</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">&nbsp;tại thị trường châu Á.<br></span><br><p style=\"margin: 10px 5px; font-size: 15px; color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Nhập khẩu&nbsp;nguyên chiếc 100%&nbsp;</p><p style=\"margin: 10px 5px; font-size: 15px; color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Chắt lọc tỉ mỉ từ những nguyên liệu hàng đầu: sử dụng chất liệu&nbsp;da bò thật từ Ý, khung gỗ thượng hạng và lớp đệm mút êm ái nhằm mang đến trải nghiệm ngồi hoàn hảo nhất.</p><p style=\"margin: 10px 5px; font-size: 15px; color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Quy trình sản xuất nghiêm ngặt gồm&nbsp;128 bước &amp; 3 lần kiểm tra&nbsp;khắt khe trước khi đưa ra thị trường sản phẩm hoàn hảo nhất.</p><p style=\"margin: 10px 5px;\"><span style=\"color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;\"=\"\">Thiết kế được lấy cảm hứng từ những bức tranh cuộc sống, tượng trưng cho văn hóa và thẩm mỹ Ý.<br><br><u>Thông số:&nbsp;</u></span>L3820xW990/2960xH820</p>', 1, 2, '2022-10-30 17:31:22', '2025-03-15 07:56:45'),
(5, 'SOFA DA THẬT FANTASIA FE27', 258000000, 5, 'uploads/sofa-fantasia-fe27-2-750x500.jpg', 'uploads/sofa-fantasia-fe27-3-750x500.jpg', 'uploads/sofa-fantasia-fe27-5-750x500.jpg', 'uploads/sofa-fantasia-fe27-7-750x500.jpg', 'uploads/sofa-fantasia-fe27-8-750x500.jpg', 'uploads/sofa-fantasia-fe27-9-750x500.jpg', '<span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">Milano&amp;Design</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">&nbsp;- Chạm và cảm nhận</span><br style=\"color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\"><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">Top 5</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">&nbsp;thương hiệu&nbsp;</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">lớn nhất Châu Á</span><br style=\"color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\"><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">Milano&amp;Design</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">&nbsp;là thương hiệu trực thuộc tập đoàn sản xuất sofa da&nbsp;</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">lớn nhất châu Âu - Chateau d\'Ax</span><br style=\"color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\"><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">Kế thừa những giá trị tinh túy hơn&nbsp;</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">70 năm kinh nghiệm</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">&nbsp;chế tác&nbsp;</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">sofa da thủ công</span><br style=\"color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\"><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">Là thương hiệu có&nbsp;</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">doanh số lớn nhất</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">&nbsp;tại thị trường châu Á.<br></span><br><p style=\"margin: 10px 5px; font-size: 15px; color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Nhập khẩu&nbsp;nguyên chiếc 100%&nbsp;</p><p style=\"margin: 10px 5px; font-size: 15px; color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Chắt lọc tỉ mỉ từ những nguyên liệu hàng đầu: sử dụng chất liệu&nbsp;da bò thật từ Ý, khung gỗ thượng hạng và lớp đệm mút êm ái nhằm mang đến trải nghiệm ngồi hoàn hảo nhất.</p><p style=\"margin: 10px 5px; font-size: 15px; color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Quy trình sản xuất nghiêm ngặt gồm&nbsp;128 bước &amp; 3 lần kiểm tra&nbsp;khắt khe trước khi đưa ra thị trường sản phẩm hoàn hảo nhất.</p><p style=\"margin: 10px 5px; font-size: 15px; color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Thiết kế được lấy cảm hứng từ những bức tranh cuộc sống, tượng trưng cho văn hóa và thẩm mỹ Ý.</p><div style=\"\"><font color=\"#666666\" face=\"-apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif\"><span style=\"font-size: 15px;\"><u>Thông số:&nbsp;</u></span></font><span style=\"background-color: rgb(242, 242, 242); color: rgb(164, 72, 0); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" var(--x-body-font-size);=\"\" font-weight:=\"\" var(--x-body-font-weight);=\"\" text-align:=\"\" var(--x-body-text-align);\"=\"\">&nbsp;</span><span style=\"text-align: var(--x-body-text-align);\">&nbsp;L2290xW1200xH860</span></div>', 1, 2, '2022-10-30 22:10:40', '2025-03-15 07:48:45'),
(11, 'SOFA DA THẬT CASA F050', 162000000, 5, 'uploads/sofa-f050-casa-4-750x500.jpg', 'uploads/sofa-f050-casa-2-750x500.jpg', 'uploads/sofa-f050-casa-3-750x500.jpg', 'uploads/sofa-f050-casa-4-750x500 (1).jpg', 'uploads/sofa-f050-casa-750x500 (1).jpg', 'uploads/sofa-f050-casa-750x500.jpg', '<span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">Milano&amp;Design</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">&nbsp;- Chạm và cảm nhận</span><br style=\"color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\"><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">Top 5</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">&nbsp;thương hiệu&nbsp;</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">lớn nhất Châu Á</span><br style=\"color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\"><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">Milano&amp;Design</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">&nbsp;là thương hiệu trực thuộc tập đoàn sản xuất sofa da&nbsp;</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">lớn nhất châu Âu - Chateau d\'Ax</span><br style=\"color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\"><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">Kế thừa những giá trị tinh túy hơn&nbsp;</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">70 năm kinh nghiệm</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">&nbsp;chế tác&nbsp;</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">sofa da thủ công</span><br style=\"color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\"><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">Là thương hiệu có&nbsp;</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">doanh số lớn nhất</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">&nbsp;tại thị trường châu Á.<br></span><br><p style=\"margin: 10px 5px; font-size: 15px; color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Nhập khẩu&nbsp;nguyên chiếc 100%&nbsp;</p><p style=\"margin: 10px 5px; font-size: 15px; color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Chắt lọc tỉ mỉ từ những nguyên liệu hàng đầu: sử dụng chất liệu&nbsp;da bò thật từ Ý, khung gỗ thượng hạng và lớp đệm mút êm ái nhằm mang đến trải nghiệm ngồi hoàn hảo nhất.</p><p style=\"margin: 10px 5px; font-size: 15px; color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Quy trình sản xuất nghiêm ngặt gồm&nbsp;128 bước &amp; 3 lần kiểm tra&nbsp;khắt khe trước khi đưa ra thị trường sản phẩm hoàn hảo nhất.</p><p style=\"margin: 10px 5px;\"><font color=\"#666666\" face=\"-apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif\"><span style=\"font-size: 15px;\">Thiết kế được lấy cảm hứng từ những bức tranh cuộc sống, tượng trưng cho văn hóa và thẩm mỹ Ý.</span></font><br><br><u style=\"color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;\"=\"\">Thông số:&nbsp;</u>L2810xW1040xH810</p>', 1, 3, '2022-10-31 13:06:27', '2025-03-15 07:35:45'),
(15, 'SOFA DA THẬT ARTIST 38A1', 239000000, 5, 'uploads/sofa-f049-flusso-1-750x500.jpg', 'uploads/sofa-f049-flusso-3-750x500.jpg', 'uploads/sofa-f049-flusso-4-750x500.jpg', 'uploads/sofa-f049-flusso-8-750x500.jpg', 'uploads/sofa-f049-flusso-10-750x500.jpg', 'uploads/sofa-f049-flusso-44-750x500.jpg', '<span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">Milano&amp;Design</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">&nbsp;- Chạm và cảm nhận</span><br style=\"color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\"><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">Top 5</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">&nbsp;thương hiệu&nbsp;</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">lớn nhất Châu Á</span><br style=\"color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\"><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">Milano&amp;Design</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">&nbsp;là thương hiệu trực thuộc tập đoàn sản xuất sofa da&nbsp;</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">lớn nhất châu Âu - Chateau d\'Ax</span><br style=\"color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\"><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">Kế thừa những giá trị tinh túy hơn&nbsp;</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">70 năm kinh nghiệm</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">&nbsp;chế tác&nbsp;</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">sofa da thủ công</span><br style=\"color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\"><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">Là thương hiệu có&nbsp;</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">doanh số lớn nhất</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\">&nbsp;tại thị trường châu Á.</span><span style=\"color: rgb(102, 102, 102);\" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;=\"\" text-align:=\"\" justify;\"=\"\"><br><br></span><p style=\"margin: 10px 5px; font-size: 15px; color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Nhập khẩu&nbsp;nguyên chiếc 100%&nbsp;</p><p style=\"margin: 10px 5px; font-size: 15px; color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Chắt lọc tỉ mỉ từ những nguyên liệu hàng đầu: sử dụng chất liệu&nbsp;da bò thật từ Ý, khung gỗ thượng hạng và lớp đệm mút êm ái nhằm mang đến trải nghiệm ngồi hoàn hảo nhất.</p><p style=\"margin: 10px 5px; font-size: 15px; color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Quy trình sản xuất nghiêm ngặt gồm&nbsp;128 bước &amp; 3 lần kiểm tra&nbsp;khắt khe trước khi đưa ra thị trường sản phẩm hoàn hảo nhất.</p><p style=\"margin: 10px 5px;\"><span style=\"color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" font-size:=\"\" 15px;\"=\"\">Thiết kế được lấy cảm hứng từ những bức tranh cuộc sống, tượng trưng cho văn hóa và thẩm mỹ Ý.<br><br><u>Thông số:</u>&nbsp;&nbsp;</span>L5080 x W1120/3920 x H660</p>', 1, 3, '2022-11-07 08:48:39', '2025-03-15 07:00:45'),
(61, 'BÀN TRÀ DETIAN', 125600000, 5, 'uploads/detian-2-750x500.jpg', 'uploads/ban-tra-detian-3-750x500.jpg', 'uploads/ban-tra-detian-4-750x500.jpg', 'uploads/ban-tra-detian-5-750x500.jpg', 'uploads/detian-2-750x500.jpg', 'uploads/detian-3-750x500.jpg', '<p style=\"margin: 10px 5px; font-size: 15px; color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">COMPAC&nbsp;được thành lập từ năm&nbsp;1975&nbsp;là&nbsp;thương hiệu đá Tây Ban Nha&nbsp;đầu tiên chuyên sản xuất và phân phối các bề mặt đá cẩm thạch và thạch anh nổi tiếng toàn cầu.</p><p style=\"margin: 10px 5px; font-size: 15px; color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Sản lượng hàng năm của COMPAC đạt&nbsp;4,5 triệu mét vuông&nbsp;sản phẩm.</p><p style=\"margin: 10px 5px; font-size: 15px; color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Là một công ty quy mô lớn với&nbsp;hơn 400 chuyên gia, có mặt tại&nbsp;5 châu lục&nbsp;với hệ thống phân phối đến&nbsp;hơn 60 quốc gia&nbsp;trên toàn thế giới.&nbsp;</p><p style=\"margin: 10px 5px; font-size: 15px; color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Không chỉ khẳng định mạnh mẽ tên tuổi của mình trên thị trường toàn cầu, COMPAC còn trở thành&nbsp;người đi đầu trong việc sở hữu quy trình và công nghệ sản xuất thân thiện với môi trường.</p><p style=\"margin: 10px 5px; font-size: 15px; color: rgb(102, 102, 102); font-family: -apple-system, BlinkMacSystemFont, \" segoe=\"\" ui\",=\"\" roboto,=\"\" oxygen-sans,=\"\" ubuntu,=\"\" cantarell,=\"\" \"helvetica=\"\" neue\",=\"\" sans-serif;=\"\" text-align:=\"\" justify;\"=\"\">Đạt&nbsp;10 chứng chỉ Quốc tế&nbsp;an toàn sức khỏe, môi trường và vệ sinh thực phẩm.</p><p style=\"margin: 10px 5px;\"><font color=\"#666666\" face=\"-apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif\"><span style=\"font-size: 15px;\">Trở thành công ty sử dụng 100% nguyên liệu thô tái chế hoặc có nguồn gốc tái tạo để sản xuất các sản phẩm.</span></font><br><font color=\"#666666\" face=\"-apple-system, BlinkMacSystemFont, Segoe UI, Roboto, Oxygen-Sans, Ubuntu, Cantarell, Helvetica Neue, sans-serif\"><span style=\"font-size: 15px;\"><u>Thông số:</u></span></font>L1105 x W1100 x H220</p>', 2, 49, '2025-01-26 09:51:40', '2025-03-15 07:12:45'),
(62, 'BÀN TRÀ BABA TRÒN', 65000000, 5, 'uploads/ban-baba-750x500.jpg', 'uploads/ban-tra-baba-750x500.jpg', 'uploads/E130-Kem-D08-2-Logo-2048-1-750x500 (1).jpg', 'uploads/ban-tra-baba-750x500.jpg', 'uploads/ban-baba-750x500.jpg', 'uploads/E130-Kem-D08-2-Logo-2048-1-750x500 (1).jpg', '<p>Santamargherita được thành lập từ năm 1962 là thương hiệu đá lâu đời bậc nhất ở Ý và nổi tiếng toàn cầu.</p><p>Mỗi ngày Santamargherita sản xuất hơn 7000m2 đá, được xuất khẩu đến hơn 70 quốc gia.</p><p>Là thương hiệu tiên phong cho ngành sản xuất đá nhân tạo toàn cầu về thiết kế, công nghệ sản xuất và gia công bề mặt.</p><p>Được sản xuất bằng công nghệ Breton - công nghệ gia công đá nhân tạo tiên tiến nhất thế giới.</p><p>Mang vẻ đẹp Italy đặc trưng ra thế giới và cũng là biểu tượng cho chất lượng Made in Italy ra toàn cầu.</p><p>Đạt 4 chứng chỉ Quốc tế an toàn sức khỏe, môi trường và vệ sinh thực phẩm.</p><p>Cùng với những thiết kế đầy sáng tạo của những nhà thiết kế nổi tiếng trên thế giới, các sản phẩm của Kenli như thổi một làn gió đẳng cấp, hiện đại chuẩn Ý vào ngôi nhà Việt.<u><br>Thông số</u>:1000xH300</p>', 2, 49, '2025-01-26 16:12:44', '2025-03-02 15:23:53'),
(63, 'BÀN TRÀ CRYSTAL', 25000000, 5, 'uploads/ban-tra-concorde-1-1-750x500.jpg', 'uploads/concorde-750x500.jpg', 'uploads/ban-tra-concorde-1.jpg', 'uploads/F026-Nau-D02-2-Logo-2048-750x500.jpg', 'uploads/ban-tra-concorde-1-1-750x500 (1).jpg', 'uploads/concorde-750x500 (1).jpg', '<p>Mặt bàn được làm từ đá nhân tạo thạch anh Santamargherita - Thương hiệu đá lâu đời nhất tại Ý.</p><p>Đạt những tiêu chuẩn khắt khe của châu Âu: chứng chỉ NSF, CE, GreenGuard,...</p><p>Sản xuất theo công nghệ của hãng BRETON S.p.A (Italy)</p><p>Sử dụng cấu trúc kết dính polime nhựa nhiệt rắn và rung ép chân không</p><p>Độ bền cao, khả năng chống xước, chống thấm &amp; chống ố</p><p>Đường vân đá đẹp tự nhiên, lấy cảm hứng từ vẻ đẹp thuần khiết của thiên nhiên</p><p>Đẹp trường tồn với thời gian.<br><u>Thông số</u>:L1200xW600 xH365</p>', 2, 49, '2025-01-26 17:30:14', '2025-01-26 17:30:14'),
(64, 'BÀN TRÀ MOONLIGHT', 20000000, 5, 'uploads/ban-tra-moonlight-2-750x500.jpg', 'uploads/ban-tra-moonlight-1-750x500.jpg', 'uploads/ban-tra-moonlight-4-750x500.jpg', 'uploads/ban-tra-moonlight-5-750x500.jpg', 'uploads/ban-tra-moonlight-1-750x500 (1).jpg', 'uploads/ban-tra-moonlight-2-750x500 (1).jpg', '<p>Mặt bàn được làm từ đá nhân tạo thạch anh Santamargherita - Thương hiệu đá lâu đời nhất tại Ý.</p><p>Đạt những tiêu chuẩn khắt khe của châu Âu: chứng chỉ NSF, CE, GreenGuard,...</p><p>Sản xuất theo công nghệ của hãng BRETON S.p.A (Italy)</p><p>Sử dụng cấu trúc kết dính polime nhựa nhiệt rắn và rung ép chân không</p><p>Độ bền cao, khả năng chống xước, chống thấm &amp; chống ố</p><p>Đường vân đá đẹp tự nhiên, lấy cảm hứng từ vẻ đẹp thuần khiết của thiên nhiên</p><p>Đẹp trường tồn với thời gian.<br><u>Thông số</u>:&nbsp;1200xH270</p>', 2, 49, '2025-01-26 17:26:17', '2025-01-26 17:26:17'),
(66, 'Sofa Kem Gỗ 7 chỗ ngồi MUJI', 45525200, 3, 'uploads/ban-tra-moonlight-2-750x500 (1).jpg', 'uploads/ban-tra-moonlight-5-750x500.jpg', 'uploads/ban-tra-moonlight-4-750x500.jpg', 'uploads/ban-tra-moonlight-5-750x500.jpg', 'uploads/ban-tra-concorde-1-1-750x500 (1).jpg', 'uploads/ban-tra-concorde-1-1-750x500.jpg', '<p>abcdxyz1234567</p>', 1, 1, '2025-03-05 09:59:44', '2025-03-05 09:59:44'),
(67, 'sofa 1', 20000000, 0, 'uploads/ban-tra-concorde-1-1-750x500 (1).jpg', 'uploads/E130-Kem-D08-2-Logo-2048-1-750x500 (1).jpg', 'uploads/ban-tra-detian-4-750x500.jpg', 'uploads/ban-baba-750x500.jpg', 'uploads/ban-tra-concorde-1-1-750x500.jpg', 'uploads/concorde-750x500.jpg', '<p>abcd1234</p>', 1, 1, '2025-03-25 04:42:14', '2025-03-25 09:30:24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `username` varchar(200) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `address` varchar(200) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `phone_number` varchar(11) DEFAULT NULL,
  `role` varchar(10) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `full_name`, `username`, `email`, `address`, `password`, `phone_number`, `role`) VALUES
(1, 'Admin', 'Admin', 'admin@gmail.com', 'Dai Kim, Hoang Mai, Ha Noi', '123456', '0123456789', 'admin'),
(8, 'dat pham', 'dat123456', 'phtatdat270603@gmail.com', '21 Thach ban, Long bien, Ha noi', '123456', '0123456788', NULL),
(10, 'Phạm Tất Đạt', 'abcd123', 'phtatdat2706@gmail.com', 'abcd, xyz, gh', '1234567', '123456789', NULL),
(12, 'pham tat dat', 'a41324', 'a41324@gmail.com', 'hn123, abcd, xyz123, abcdabcd', '123456', '0123456789', NULL),
(13, 'Kim Jong Un', 'kim', 'kim@gmail.com', 'South Korea', '123456', '123456789', NULL),
(18, 'Micheal Jackson', 'mj', 'mj@gmail.com', 'NY, US', '123456', '123456789', NULL),
(22, 'pham tat datpham', 'a41324a', 'a41324a@gmail.com', 'hn', '123456', '987654645', NULL),
(24, 'pham tat datpham', 'abcd1', 'abcd1@gmail.com', 'hn', '123456', '941212314', NULL),
(25, 'huy cao', 'cao123', 'cao123@gmail.com', 'hn', '123456', '987654646', NULL),
(26, 'datpham tat', 'abcd', 'e@example.com', 'hn', '123456', '987654645', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `collections`
--
ALTER TABLE `collections`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ibfk_1` (`id_user`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `order_id` (`order_id`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_category` (`id_category`),
  ADD KEY `id_sanpham` (`id_sanpham`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `collections`
--
ALTER TABLE `collections`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=207;

--
-- AUTO_INCREMENT for table `order_details`
--
ALTER TABLE `order_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `product` (`id`),
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`),
  ADD CONSTRAINT `order_details_ibfk_3` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `product_ibfk_1` FOREIGN KEY (`id_category`) REFERENCES `category` (`id`),
  ADD CONSTRAINT `sanpham_ibfk_1` FOREIGN KEY (`id_sanpham`) REFERENCES `collections` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
