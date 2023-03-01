-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th3 01, 2023 lúc 02:18 AM
-- Phiên bản máy phục vụ: 5.7.36
-- Phiên bản PHP: 7.4.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `demo_metro`
--
CREATE DATABASE IF NOT EXISTS `demo_metro` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `demo_metro`;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `routes`
--

DROP TABLE IF EXISTS `routes`;
CREATE TABLE IF NOT EXISTS `routes` (
  `route_id` int(1) NOT NULL,
  `name` varchar(11) DEFAULT NULL,
  `opt_time` varchar(12) DEFAULT NULL,
  `length` varchar(4) DEFAULT NULL,
  `min_cost` int(5) DEFAULT NULL,
  `cost` int(4) DEFAULT NULL,
  PRIMARY KEY (`route_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `routes`
--

INSERT INTO `routes` (`route_id`, `name`, `opt_time`, `length`, `min_cost`, `cost`) VALUES
(1, 'Tuyến số 1', '5:00 - 21:00', '19.7', 12000, 4000),
(2, 'Tuyến số 2', '4:30 - 21:00', '9.1', 10000, 3000),
(3, 'Tuyến số 5A', '5:30 - 20:30', '5.2', 8000, 2000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `routes_stations`
--

DROP TABLE IF EXISTS `routes_stations`;
CREATE TABLE IF NOT EXISTS `routes_stations` (
  `route_id` int(11) NOT NULL,
  `station_id` int(11) NOT NULL,
  `order` int(2) DEFAULT NULL,
  PRIMARY KEY (`route_id`,`station_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `routes_stations`
--

INSERT INTO `routes_stations` (`route_id`, `station_id`, `order`) VALUES
(1, 1, 1),
(1, 2, 2),
(1, 3, 3),
(1, 4, 4),
(1, 5, 5),
(1, 6, 6),
(1, 7, 7),
(1, 8, 8),
(1, 9, 9),
(1, 10, 10),
(1, 11, 11),
(1, 12, 12),
(1, 13, 13),
(1, 14, 14),
(2, 15, 1),
(2, 16, 2),
(2, 17, 3),
(2, 18, 4),
(2, 19, 5),
(2, 20, 6),
(2, 21, 7),
(2, 22, 8),
(2, 23, 9),
(2, 24, 10),
(2, 25, 11),
(2, 1, 12),
(2, 27, 13),
(2, 34, 14),
(3, 26, 1),
(3, 27, 2),
(3, 28, 3),
(3, 29, 4),
(3, 30, 5),
(3, 31, 6),
(3, 32, 7),
(3, 33, 8),
(3, 5, 9);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `stations`
--

DROP TABLE IF EXISTS `stations`;
CREATE TABLE IF NOT EXISTS `stations` (
  `station_id` int(2) NOT NULL,
  `name` varchar(17) DEFAULT NULL,
  PRIMARY KEY (`station_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `stations`
--

INSERT INTO `stations` (`station_id`, `name`) VALUES
(1, 'Bến Thành'),
(2, 'Nhà hát TP'),
(3, 'Ba Son'),
(4, 'Văn Thánh'),
(5, 'Tân Cảng'),
(6, 'Thảo Điền'),
(7, 'An Phú'),
(8, 'Rạch Chiếc'),
(9, 'Phước Long'),
(10, 'Bình Thái'),
(11, 'Thủ Đức'),
(12, 'Khu Công nghệ cao'),
(13, 'Suối Tiên'),
(14, 'BXMĐ mới'),
(15, 'Tao Đàn'),
(16, 'Dân Chủ'),
(17, 'Hòa Hưng'),
(18, 'Lê Thị Riêng'),
(19, 'Phạm Văn Hai'),
(20, 'Đồng Đen'),
(21, 'Nguyễn Hồng Đào'),
(22, 'Bà Quẹo'),
(23, 'Phạm Văn Bạch'),
(24, 'Tham Lương'),
(25, 'Tân Thới Nhất'),
(26, 'Chợ Tân Bình'),
(27, 'Bảy Hiền'),
(28, 'Lăng Cha Cả'),
(29, 'Hoàng Văn Thụ'),
(30, 'Phú Nhuận'),
(31, 'Nguyễn Văn Đậu'),
(32, 'Bà Chiểu'),
(33, 'Hàng Xanh'),
(34, 'BX An Sương');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `tickets`
--

DROP TABLE IF EXISTS `tickets`;
CREATE TABLE IF NOT EXISTS `tickets` (
  `ticket_id` int(1) NOT NULL AUTO_INCREMENT,
  `phone` varchar(255) DEFAULT NULL,
  `station_id_start` int(11) DEFAULT NULL,
  `station_id_end` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `route_id` int(11) DEFAULT NULL,
  `created_date` datetime DEFAULT CURRENT_TIMESTAMP,
  `count` int(11) NOT NULL,
  PRIMARY KEY (`ticket_id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

--
-- Đang đổ dữ liệu cho bảng `tickets`
--

INSERT INTO `tickets` (`ticket_id`, `phone`, `station_id_start`, `station_id_end`, `total`, `route_id`, `created_date`, `count`) VALUES
(1, '1', 1, 2, 12000, 1, '2023-02-27 11:41:27', 0),
(2, '1', 1, 2, 12000, 1, '2023-02-27 11:42:13', 0),
(3, '0908713697', 1, 3, 12000, 1, '2023-02-27 11:45:57', 0),
(4, '0908713697', 1, 3, 12000, 1, '2023-02-27 11:54:34', 0),
(5, '0908713697', 1, 3, 12000, 1, '2023-02-27 11:55:47', 1);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
