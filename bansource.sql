-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th10 29, 2024 lúc 07:17 AM
-- Phiên bản máy phục vụ: 10.4.32-MariaDB
-- Phiên bản PHP: 8.0.30

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

CREATE TABLE `account` (
  `id` int(11) NOT NULL,
  `pass` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` int(11) DEFAULT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `activeToken` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `admin` int(11) NOT NULL DEFAULT 0,
  `status` int(11) NOT NULL DEFAULT 0,
  `forgotToken` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `update_pass` datetime DEFAULT NULL,
  `vnd` int(11) DEFAULT 0,
  `tongnap` int(11) DEFAULT 0,
  `capbac` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `account`
--

INSERT INTO `account` (`id`, `pass`, `phone`, `email`, `activeToken`, `create_time`, `admin`, `status`, `forgotToken`, `update_pass`, `vnd`, `tongnap`, `capbac`) VALUES
(1, '$2y$10$2UPtdXdS94VQ4zsrBfq6dOy2duELnLRhgFEmn3roPxyH61KXj7Pqa', NULL, 'lesycuong0167@gmail.com', '03dbb66ba067f7534fa38b77cec604e0ced9655b', '2024-11-28 17:21:14', 1, 0, '', '2024-11-28 17:34:10', 0, 0, 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lichsudonhang`
--

CREATE TABLE `lichsudonhang` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `time_mua` datetime DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lichsudonhang`
--

INSERT INTO `lichsudonhang` (`id`, `name`, `link`, `gia`, `time_mua`, `email`) VALUES
(2, '3Q Chibi H5 Dàn Trận Tool GM CDK', NULL, 0, '2024-11-28 22:39:33', 'lesycuong0167@gmail.com'),
(3, '3Q Chibi H5 Dàn Trận Tool GM CDK', NULL, 0, '2024-11-28 22:59:55', 'lesycuong0167@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `logintoken`
--

CREATE TABLE `logintoken` (
  `id` int(11) NOT NULL,
  `token` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci DEFAULT NULL,
  `create_time` datetime DEFAULT NULL,
  `admin` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) CHARACTER SET latin1 COLLATE latin1_swedish_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `logintoken`
--

INSERT INTO `logintoken` (`id`, `token`, `create_time`, `admin`, `email`) VALUES
(11, '1e86de20f57b4dfa3ba15fa7425a0fdaf35467ac', '2024-11-29 13:13:53', 1, 'lesycuong0167@gmail.com');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `source`
--

CREATE TABLE `source` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `chi_tiet` text DEFAULT NULL,
  `img` text DEFAULT NULL,
  `ngay_dang` datetime DEFAULT NULL,
  `link_demo` varchar(255) DEFAULT NULL,
  `gia` int(11) DEFAULT NULL,
  `link` text DEFAULT NULL,
  `the_loai` varchar(255) DEFAULT NULL,
  `update_time` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `source`
--

INSERT INTO `source` (`id`, `name`, `avatar`, `chi_tiet`, `img`, `ngay_dang`, `link_demo`, `gia`, `link`, `the_loai`, `update_time`) VALUES
(1, '3Q Cá - Hàn Ngư Chi Vương H5 Web Admin', 'https://i.imgur.com/Zin5NfZ.jpeg', '3Q Cá - Hàn Ngư Chi Vương H5 Web Admin china nhiều chức năng,tạo server,tạo giftcode,send item,Đặc biệt có api nạp ingame tắt mở được\r\n\r\n \r\n\r\nChạy centos 7.9,cấu hình 2 nhân ram 4gb tối thiểu,đồ họa dễ thương,Lối chơi Unbox,sắc nét mượt mà\r\n\r\n \r\n\r\nBản update tháng 6-2024,vẫn có vài bug nhỏ,có HD chi tiết kèm videos', '<img src=\"https://i.imgur.com/1DF23Na.png\">\r\n<img src=\"https://i.imgur.com/q0Slu6P.png\">\r\n<img src=\"https://i.imgur.com/TJxYMqS.png\">\r\n<img src=\"https://i.imgur.com/Y1r37bm.png\">', '2024-11-28 17:21:14', NULL, 2000000, NULL, 'toolweb', NULL),
(4, '3Q Chibi H5 Dàn Trận Tool GM CDK', 'https://i.imgur.com/263EIiB.png', '3Q Chibi H5 Dàn Trận Tool GM CDK,chạy win server 2012 r2,cấu hình 2 nhân ram 4gb,kèm hướng dẫn chi tiết\r\n\r\nTool gm cdk,bản update mới nhất đến hiện tại nha ae,việt hóa font tầm 90%,vh res tầm 50% \r\n\r\nDòng game hiếm,thể loại dàn trận khá vui,đồ họa sắc nét và mượt,nhiều tướng xịn', '<img src=\"https://i.imgur.com/263EIiB.png\">\r\n<img src=\"https://i.imgur.com/Xbpauw2.png\">\r\n<img src=\"https://i.imgur.com/bN9atMM.png\">\r\n<img src=\"https://i.imgur.com/zkUsTQF.png\">', '2024-11-28 17:21:14', NULL, 0, NULL, 'china', NULL),
(5, '3Q Quần Anh Web Api - Client Apk Ipa Việt Hóa Chuẩn', 'https://i.imgur.com/pnB8bt3.jpeg', '3Q Quần Anh Web Api - Client Apk Ipa Việt Hóa Chuẩn,chạy win server 2012 r2,cấu hình 2 nhân ram 4gb,có hướng dẫn chi tiết\r\n\r\n \r\n\r\nWeb Api tích nạp,giftcode,điểm danh,nạp momo bank....Liên SV,S1 S2 hoạt động ổn định đã fix\r\n\r\n \r\n\r\nLưu ý Ae Đọc Kỹ Trước Khi Mua: Con này hiện tại apk đời cao ko load game được,ae fix được thì lụm nhé,web admin hiện còn sai port hay sai đường dẫn chưa fix ae tự nghiên cứu', '<img src=\"https://i.imgur.com/jkcBl1u.jpeg\">\r\n<img src=\"https://i.imgur.com/xRJ0vKC.jpeg\">\r\n<img src=\"https://i.imgur.com/xiPdqgq.jpeg\">\r\n<img src=\"https://i.imgur.com/i86ROOc.jpeg\">', '2024-11-28 17:21:14', NULL, 650000, NULL, 'thuong', NULL);

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `lichsudonhang`
--
ALTER TABLE `lichsudonhang`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `logintoken`
--
ALTER TABLE `logintoken`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `source`
--
ALTER TABLE `source`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `account`
--
ALTER TABLE `account`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT cho bảng `lichsudonhang`
--
ALTER TABLE `lichsudonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `logintoken`
--
ALTER TABLE `logintoken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT cho bảng `source`
--
ALTER TABLE `source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
