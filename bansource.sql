-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 29, 2024 lúc 06:34 AM
-- Phiên bản máy phục vụ: 8.3.0
-- Phiên bản PHP: 8.2.18

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `bansource`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `account`
--

DROP TABLE IF EXISTS `account`;
CREATE TABLE IF NOT EXISTS `account` (
  `id` int NOT NULL AUTO_INCREMENT,
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activeToken` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `admin` int NOT NULL DEFAULT '0',
  `status` int NOT NULL DEFAULT '0',
  `forgotToken` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_pass` datetime DEFAULT NULL,
  `vnd` int DEFAULT '0',
  `tongnap` int DEFAULT '0',
  `capbac` int DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `pass`, `phone`, `email`, `activeToken`, `create_time`, `admin`, `status`, `forgotToken`, `update_pass`, `vnd`, `tongnap`, `capbac`) VALUES
(1, '$2y$10$2UPtdXdS94VQ4zsrBfq6dOy2duELnLRhgFEmn3roPxyH61KXj7Pqa', NULL, 'duy@gmail.com', '03dbb66ba067f7534fa38b77cec604e0ced9655b', '2024-11-28 17:21:14', 1, 0, '', '2024-11-28 17:34:10', 0, 0, 0),
(3, '$2y$10$gYK5KfkushfAjBbhLq0/s.kmRwLd2YnYMnSjg7ZOehC249cneVpiy', NULL, 'dev@gmail.com', 'a106236b8805e1421c94eb40f0dfa22ba1f97bb0', '2024-12-11 10:53:42', 1, 1, 'c8215428ca9bdca8ce8ed9276e45a941fcc61e89', '2024-12-12 21:39:54', 977999999, 5000000, 0),
(4, '$2y$10$mD4bQ8Vl5a74xS44Ysz2busmaY4XZdkNEINY6j9gpFhdf8THL/9F2', NULL, 'tuan@gmail.com', NULL, '2024-12-11 11:06:16', 1, 0, '', NULL, 0, 0, 0),
(5, '$2y$10$.SlcTWZiWV4a44gbDz35Pe7BdVrwdm092U.BZcU3TiZBFVmGQkdmC', NULL, 'minhduy7741@gmail.com', '864d56580e48d9f59cf3bb4bdeb584cea38ad28d', '2024-12-28 21:18:35', 0, 0, '', '2024-12-28 21:19:31', 0, 0, 0),
(8, '$2y$10$vYOWiCPXR9rpkOFxp/bfi.cwF6DPtP7IH0Fwpq1KcHf1KuHgZqd9S', NULL, 'demo@gmail.com', '22446511b5d7a46ea1d96cb27551df7a725d8c36', '2024-12-29 12:38:10', 0, 0, '', NULL, 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsudonhang`
--

DROP TABLE IF EXISTS `lichsudonhang`;
CREATE TABLE IF NOT EXISTS `lichsudonhang` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `link` text COLLATE utf8mb4_general_ci,
  `gia` int DEFAULT NULL,
  `time_mua` datetime DEFAULT NULL,
  `email` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lichsudonhang`
--

INSERT INTO `lichsudonhang` (`id`, `name`, `link`, `gia`, `time_mua`, `email`) VALUES
(2, 'Code bán kem', NULL, 0, '2024-11-28 22:39:33', 'lesycuong0167@gmail.com'),
(3, 'Code bán game', NULL, 0, '2024-11-28 22:59:55', 'lesycuong0167@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logintoken`
--

DROP TABLE IF EXISTS `logintoken`;
CREATE TABLE IF NOT EXISTS `logintoken` (
  `id` int NOT NULL AUTO_INCREMENT,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `admin` int NOT NULL DEFAULT '0',
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `logintoken`
--

INSERT INTO `logintoken` (`id`, `token`, `create_time`, `admin`, `email`) VALUES
(11, '1e86de20f57b4dfa3ba15fa7425a0fdaf35467ac', '2024-11-29 13:13:53', 1, 'duy@gmail.com'),
(19, '164e6018a36ff56d23ea27d08d6b2dee9212e8e6', '2024-12-12 00:14:28', 1, 'tuan@gmail.com'),
(44, 'd98ac35a4391cc2d9843de2530ed5c84b8c5bca3', '2024-12-29 01:21:23', 1, 'dev@gmail.com'),
(45, '0d8e80d2ccf3c82c480ba43cf06f1666e524138a', '2024-12-29 12:14:18', 1, 'dev@gmail.com'),
(46, '9665a166b7a0228dfd7fc9793018050251ef7642', '2024-12-29 13:30:46', 1, 'dev@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `source`
--

DROP TABLE IF EXISTS `source`;
CREATE TABLE IF NOT EXISTS `source` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `avatar` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `chi_tiet` text COLLATE utf8mb4_general_ci,
  `img` text COLLATE utf8mb4_general_ci,
  `ngay_dang` datetime DEFAULT NULL,
  `link_demo` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `gia` int DEFAULT NULL,
  `link` text COLLATE utf8mb4_general_ci,
  `the_loai` varchar(255) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `update_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `source`
--

INSERT INTO `source` (`id`, `name`, `avatar`, `chi_tiet`, `img`, `ngay_dang`, `link_demo`, `gia`, `link`, `the_loai`, `update_time`) VALUES
(1, 'Code bật tắt đèn IoT', 'https://mona.media/wp-content/uploads/2020/10/post-thumb-iot.jpg', 'Ứng dụng IoT (Internet of Things) bật/tắt đèn là một ứng dụng cho phép người dùng điều khiển việc bật và tắt đèn từ xa thông qua mạng Internet. Điều này có thể thực hiện trên điện thoại thông minh, máy tính bảng, hoặc bất kỳ thiết bị kết nối Internet nào, giúp người dùng dễ dàng điều khiển hệ thống chiếu sáng trong nhà hoặc văn phòng mà không cần phải di chuyển tới công tắc đèn.Công nghệ sử dụng: Android Studio, Arduino, ESP8266 MCU.', '&amp;lt;img src=&amp;quot;https://i.imgur.com/VRqiRde.png&amp;quot;&amp;gt;&amp;lt;img src=&amp;quot;https://i.imgur.com/EVQwZCF.png&amp;quot;&amp;gt;&amp;lt;img src=&amp;quot;https://i.imgur.com/KRAEp6u.png&amp;quot;&amp;gt;', '2024-11-28 17:21:14', 'aa', 2000000, 'https://drive.google.com/file/d/1G1WY4sbJptEXh88q-6IEXFPSNpeyKjBS/view?usp=drive_link', 'Code IoT', '2024-12-28 22:11:50'),
(15, 'Code web bán giày', 'https://i.imgur.com/7mbvjCa.png', 'Website bán giày là một nền tảng trực tuyến được thiết kế để cung cấp cho khách hàng trải nghiệm mua sắm giày nhanh chóng, tiện lợi và dễ dàng.Các tính năng của trang web:1. Giao diện trang chủ:Banner lớn: Hiển thị sản phẩm hot, các chương trình giảm giá hoặc bộ sưu tập mới.Thanh tìm kiếm: Dễ dàng tìm kiếm theo loại giày, size, thương hiệu hoặc giá.Danh mục nổi bật: Bao gồm giày nam, giày nữ, giày thể thao, giày công sở, giày trẻ em...Hình ảnh hấp dẫn: Hình ảnh giày được hiển thị sắc nét, rõ ràng với góc nhìn đa dạng.2. Danh mục sản phẩm:Phân loại rõ ràng: Theo loại (thể thao, đi bộ, cao gót...), theo thương hiệu (Nike, Adidas, Converse...), hoặc theo mức giá.Bộ lọc: Giúp khách hàng nhanh chóng tìm đúng sản phẩm mình cần, bao gồm màu sắc, size, chất liệu, hoặc giảm giá.3.Tính năng thương mại điện tử:Giỏ hàng: Lưu sản phẩm, cập nhật số lượng, tính tổng giá.Thanh toán: Các phương thức như COD, thẻ tín dụng, ví điện tử (Momo, ZaloPay...), chuyển khoản ngân hàng.Đăng nhập/đăng ký: Để lưu trữ thông tin mua hàng hoặc tham gia các chương trình khách hàng thân thiết.Công nghệ sử dụng: php, mysql, html, css.', '&lt;img src=&quot;https://i.imgur.com/7mbvjCa.png&quot;&gt;&lt;img src=&quot;https://i.imgur.com/WJNv94j.png&quot;&gt;&lt;img src=&quot;https://i.imgur.com/EFn5iOx.png&quot;&gt;', '2024-11-28 17:21:14', 'aa', 2000000, 'aa', 'Code web', '2024-12-28 22:11:39'),
(16, 'Code web bán động vật', 'https://mona.media/wp-content/uploads/2020/10/post-thumb-iot.jpg', 'Ứng dụng IoT (Internet of Things) bật/tắt đèn là một ứng dụng cho phép người dùng điều khiển việc bật và tắt đèn từ xa thông qua mạng Internet. Điều này có thể thực hiện trên điện thoại thông minh, máy tính bảng, hoặc bất kỳ thiết bị kết nối Internet nào, giúp người dùng dễ dàng điều khiển hệ thống chiếu sáng trong nhà hoặc văn phòng mà không cần phải di chuyển tới công tắc đèn.Công nghệ sử dụng: Android Studio, Arduino, ESP8266 MCU.', '&lt;img src=&quot;https://i.imgur.com/VRqiRde.png&quot;&gt;&lt;img src=&quot;https://i.imgur.com/EVQwZCF.png&quot;&gt;&lt;img src=&quot;https://i.imgur.com/KRAEp6u.png&quot;&gt;', '2024-11-28 17:21:14', 'a', 2000000, 'https://drive.google.com/file/d/1G1WY4sbJptEXh88q-6IEXFPSNpeyKjBS/view?usp=drive_link', 'Code web', '2024-12-28 22:11:18'),
(17, 'Code bật tắt máy bơm IoT', 'https://mona.media/wp-content/uploads/2020/10/post-thumb-iot.jpg', 'Ứng dụng IoT (Internet of Things) bật/tắt máy bơm là một ứng dụng cho phép người dùng điều khiển việc bật và tắt đèn từ xa thông qua mạng Internet. Điều này có thể thực hiện trên điện thoại thông minh, máy tính bảng, hoặc bất kỳ thiết bị kết nối Internet nào, giúp người dùng dễ dàng điều khiển hệ thống chiếu sáng trong nhà hoặc văn phòng mà không cần phải di chuyển tới công tắc đèn.Công nghệ sử dụng: Android Studio, Arduino, ESP8266 MCU.', '&amp;lt;img src=&amp;quot;https://i.imgur.com/VRqiRde.png&amp;quot;&amp;gt;&amp;lt;img src=&amp;quot;https://i.imgur.com/EVQwZCF.png&amp;quot;&amp;gt;&amp;lt;img src=&amp;quot;https://i.imgur.com/KRAEp6u.png&amp;quot;&amp;gt;', '2024-11-28 17:21:14', 'aa', 2000000, 'https://drive.google.com/file/d/1G1WY4sbJptEXh88q-6IEXFPSNpeyKjBS/view?usp=drive_link', 'Code IoT', '2024-12-28 22:11:50');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
