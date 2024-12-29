-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th12 20, 2024 lúc 06:13 PM
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
(1, '$2y$10$2UPtdXdS94VQ4zsrBfq6dOy2duELnLRhgFEmn3roPxyH61KXj7Pqa', NULL, 'duy@gmail.com', '03dbb66ba067f7534fa38b77cec604e0ced9655b', '2024-11-28 17:21:14', 1, 0, '', '2024-11-28 17:34:10', 0, 0, 0),
(2, '123456', NULL, 'demo@gmail.com', 'asd', '2024-11-28 17:21:14', 1, 0, '', '2024-11-28 17:34:10', 0, 0, 0),
(3, '$2y$10$dqE1mMbh84igvgaZ3u8QHebjmBWuJNsu66UzMDJmsfj2StxtjDjzS', NULL, 'dev@gmail.com', 'a106236b8805e1421c94eb40f0dfa22ba1f97bb0', '2024-12-11 10:53:42', 1, 1, '', '2024-12-11 11:06:45', 5000000, 5000000, 0),
(4, '$2y$10$mD4bQ8Vl5a74xS44Ysz2busmaY4XZdkNEINY6j9gpFhdf8THL/9F2', NULL, 'tuan@gmail.com', NULL, '2024-12-11 11:06:16', 1, 0, '', NULL, 0, 0, 0),
(5, '$2y$10$7h9mtu6txCbzWEI7y3ERDuGmgCXxA3q6859le658./KcgG3OfEvDe', NULL, 'lesycuong692003@gmail.com', 'c5501064c332400f4e95cbf906f1afd4581621d7', '2024-12-20 22:24:19', 0, 0, '', NULL, 2049804, 0, 0);

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
  `email` varchar(255) DEFAULT NULL,
  `id_source` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Đang đổ dữ liệu cho bảng `lichsudonhang`
--

INSERT INTO `lichsudonhang` (`id`, `name`, `link`, `gia`, `time_mua`, `email`, `id_source`) VALUES
(10, 'Động cơ rèm thông minh Hunonic Ecosystem điều khiển từ xa', NULL, 1965000, '2024-12-20 23:21:12', 'lesycuong692003@gmail.com', 14),
(11, '[Ổ Cắm Datic] 2 Ổ Có Tiếp Địa Màu Đen', NULL, 18000, '2024-12-20 23:22:47', 'lesycuong692003@gmail.com', 12),
(12, '[Ổ Cắm Datic] 2 Ổ Có Tiếp Địa Màu Đen', NULL, 18000, '2024-12-20 23:28:52', 'lesycuong692003@gmail.com', 12),
(13, '[Ổ Cắm Datic] 2 Ổ Có Tiếp Địa Màu Đen', NULL, 18000, '2024-12-20 23:35:08', 'lesycuong692003@gmail.com', 12),
(14, '[Ổ Cắm Datic] 2 Ổ Có Tiếp Địa Màu Đen', NULL, 18000, '2024-12-20 23:49:20', 'lesycuong692003@gmail.com', 12);

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
(11, '1e86de20f57b4dfa3ba15fa7425a0fdaf35467ac', '2024-11-29 13:13:53', 1, 'duy@gmail.com'),
(19, '164e6018a36ff56d23ea27d08d6b2dee9212e8e6', '2024-12-12 00:14:28', 1, 'tuan@gmail.com'),
(20, 'ddcbebd7655657d492b7da8b4a5ed8feb64ffbb2', '2024-12-12 00:43:45', 1, 'dev@gmail.com'),
(21, '1b94d20fb4d6c0a14a847578d5cb0a18f7a262d3', '2024-12-20 22:24:19', 0, 'lesycuong692003@gmail.com');

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
(1, 'Công Tắc Cảm Ứng Thông Minh Datic – 3 Nút Màu Đen', 'https://i.imgur.com/pMRadKW.png', 'Công tắc thông minh là dành cho tất cả mọi người bởi:\r\n\r\n– Tính thiết thực, hữu ích với cuộc sống của mỗi người.\r\n\r\n– Đáp ứng được nhiều nhu cầu, bởi nhu cầu của mỗi người là khác nhau.\r\n\r\n– Gần gũi với người dùng: Dễ lắp đặt, dễ sử dụng, ngôn ngữ tiếng Việt\r\n\r\nMỗi người sẽ có các mức quan tâm về chất lượng, tính năng sản phẩm, độ bền, … khác nhau nhưng chắc chắn giá sản phẩm là điều mà tất cả chúng ta không thể bỏ qua.\r\n\r\nMột sản phẩm tốt mà giá không phù hợp thì thật khó để có thể sở hữu nhà thông minh.\r\n\r\nVới quyết tâm đạt mục tiêu : Phổ cập nhà thông minh trên cả nước. Sau hơn 1 năm nghiên cứu và trải qua nhiều phương án tối ưu chi phí sản xuất, Hunonic vui mừng cho ra mắt sản phẩm công tắc cảm ứng Wifi Datic . Một sản phẩm được đánh giá là bền –  đẹp, chất lượng ổn định, phù hợp với mọi phân khúc khách hàng, phục vụ mọi tầng lớp từ phổ thông đến khá giả, từ thành thị đến nông thôn.\r\n\r\nGiờ đây, ai cũng có thể sở hữu nhà thông minh.', '<img \r\nsrc=\"https://i.imgur.com/psERNCH.png\">\r\n', '2024-11-28 17:21:14', NULL, 2000000, NULL, 'Công tắc\r\n', NULL),
(4, 'Công Tắc Cửa Cuốn Datic Smart Door (Màu đen)', 'https://hunonic.com/wp-content/uploads/2022/09/cong-tac-cua-cuon-datic-smart-door-1.jpg', 'Thông số kĩ thuật\r\nĐiện áp sử dụng: AC90-250V/50Hz\r\nTần số ngõ vào: 50-60Hz\r\nGiao thức kết nối: Wifi\r\nYêu cầu hệ thống: Không cần bộ điều khiển trung tâm nhà thông minh\r\nKích thước: 120 x 72 x 32mm\r\nBảo hành: 12 tháng\r\nPhần lớn những ai đang sử dụng cửa cuốn thông thường đều gặp phải:\r\n – Đang chăn ấm đệm êm lại phải dậy mở cửa cho người thân quên chìa khóa\r\n – Cũng không biết bao nhiêu lần bạn đi ra ngoài mà quên đem khóa cửa?\r\n – Đang đi chơi chợt nghĩ ra không biết mình đã đóng cửa chưa lại lọ mọ chạy về kiểm tra.\r\nVậy giải pháp nào cho những trường hợp này ?\r\nCái dính lấy chúng ta là cái điện thoại chứ không phải là chìa khóa cửa, nếu cái điện thoại mà thay thế được cái điều khiển thì tốt biết mấy đúng không?\r\nCông tắc Datic Smart Door là nhà thông minh Hunonic được nhiều người tin dùng và lựa chọn. Công tắc cửa cuốn sẽ giúp bạn yên tâm hơn khi theo dõi được cửa cuốn ngay trên giao diện đóng mở. \r\n–', '<img \r\nsrc=\"https://hunonic.com/wp-content/uploads/2022/09/tinh-nang-datic-door.jpg\">\r\n', '2024-11-28 17:21:14', NULL, 0, NULL, 'Công tắc\r\n', NULL),
(5, 'KHÓA THÔNG MINH TADOLock Cửa nhôm (Đen titan)', 'https://hunonic.com/wp-content/uploads/2024/08/khoa-thong-minh-cua-nhom-den-1.jpg', 'Là thương hiệu sản xuất thiết bị nhà thông minh hàng đầu, nhận thấy tầm quan trọng của việc bảo vệ an ninh cho mỗi gia đình, Hunonic đã không ngừng nghiên cứu và phát triển hệ thống giải pháp an ninh thông minh, một trong những sản phẩm hàng đầu đó là Khóa thông minh TADOLock \r\n\r\nKhóa thông minh là thiết bị khóa cửa được trang bị công nghệ cao, cho phép người dùng điều khiển và quản lý cửa ra vào từ xa thông qua điện thoại thông minh hoặc các thiết bị kết nối khác. Thay vì sử dụng chìa khóa cơ truyền thống, khóa thông minh sử dụng mật mã, vân tay, thẻ từ, hoặc điện thoại để mở khóa, mang lại sự tiện lợi và an toàn tuyệt đối.', '<img \r\nsrc=\"https://hunonic.com/wp-content/uploads/2024/08/tinh-nang-smartlock1.jpg\">\r\n', '2024-11-28 17:21:14', NULL, 650000, NULL, 'Khóa', NULL),
(9, 'Công tắc điều khiển từ xa Hunonic Mini', 'https://hunonic.com/wp-content/uploads/2022/05/hunonic-mini-avt.jpg', 'Công tắc wifi Hunonic mini là gì ?\r\nCông tắc thông minh Mini là một thiết bị điện tử được thiết kế để nâng cấp công tắc cơ truyền thống trong hệ thống điện gia đình hoặc văn phòng, cho phép người dùng điều khiển các thiết bị điện từ xa thông qua smartphone, giọng nói, hoặc tự động theo các kịch bản lập trình sẵn. Công tắc này có kích thước nhỏ gọn (mini), dễ dàng lắp đặt và tích hợp vào các hộp công tắc có sẵn mà không cần thay đổi cấu trúc hệ thống điện.\r\n\r\nĐặc điểm nổi bật của công tắc thông minh Mini:\r\nKích thước nhỏ gọn: Với thiết kế mini, công tắc điều khiển từ xa thông minh Hunonic Mini này có thể lắp đặt trong hầu hết các hộp công tắc tiêu chuẩn, giúp tiết kiệm không gian và dễ dàng tích hợp vào mọi vị trí trong nhà.\r\nĐiều khiển từ xa: Công tắc wifi Hunonic Mini có thể điều khiển bật/tắt các thiết bị điện qua smartphone thông qua ứng dụng  \r\nTự động hóa: Hunonic mini có thể được lập trình để hoạt động theo các kịch bản như bật đèn vào buổi tối, tắt đèn khi ra khỏi nhà, hoặc bật thiết bị theo lịch hẹn sẵn.\r\nTHÔNG SỐ KỸ THUẬT\r\nĐiện áp hoạt động: 95-240V/AC/50Hz\r\nCông suất:\r\n     + Tải thuần trở 500W/ CH\r\n     + Tải thuần led 150W/ CH\r\nTuổi thọ đóng cắt: 100.000 lần\r\nNăng lượng tiêu thụ không tải: 0.5W/h\r\nKết nối: WiFi 2.4Ghz\r\nKích thước: 41x41x20mm\r\nVật liệu vỏ: Nhựa ABS chống cháy\r\nBảo hành: 12 tháng\r\n\r\n', '<img \r\nsrc=\"https://hunonic.com/wp-content/uploads/2022/05/cong-tac-thong-minh-hunonic-wifi-mini-6.jpg\">\r\n', '2024-11-28 17:21:14', NULL, 268000, NULL, 'công tắc', NULL),
(10, 'Cảm Biến Nhiệt Ẩm Wifi Hunonic', 'https://hunonic.com/wp-content/uploads/2023/12/cam-bien-nhiet-am-hunonic-wifi-600x600.jpg', 'Giới thiệu sản phẩm cảm biến nhiệt độ độ ẩm Hunonic\r\nĐáp ứng giải pháp  đo lường chính xác cho môi trường xung quanh. Hunonic tự hào giới thiệu cảm biến nhiệt độ, độ ẩm thông minh, một sản phẩm công nghệ cao được chế tạo tại Việt Nam. Với khả năng đo lường chính xác nhiệt độ và độ ẩm trong môi trường xung quanh, cảm biến này mang đến sự thuận tiện và hiệu quả cho nhiều lĩnh vực sử dụng như nông nghiệp, công nghiệp, sản xuất và y tế.\r\nSản phẩm cảm biến nhiệt ẩm Hunonic có thiết kế nhỏ gọn, có thể được gắn lên tường hoặc đặt trên bề mặt mà bạn muốn giám sát.Nó bao gồm các cảm biến đo nhiệt độ và độ ẩm chính xác, giúp bạn theo dõi và kiểm soát điều kiện môi trường. Sản phẩm sử dụng pin tiểu 3A, tiết kiệm năng lượng và bền bỉ.\r\n\r\nĐặc biệt, Hunonic đã cho ra đời phiên bản Cảm biến nhiệt độ độ ẩm kết nối thông qua công nghệ Wifi, hoạt động độc lập không cần bộ trung tâm. Cho phép kết nối nhanh chóng và ổn định với ứng dụng Hunonic.', '<img \r\nsrc=\"https://hunonic.com/wp-content/uploads/2023/12/tinh-nang-cam-bien-nhiet-am03.jpg\">\r\n', '2024-11-28 17:21:14', NULL, 195000, NULL, 'Cảm biến', NULL),
(11, 'Cảm Biến Cầu Thang BLE Wifi Hunonic ST02', 'https://hunonic.com/wp-content/uploads/2024/09/cam-bien-cau-thang-wifi.jpg', 'Trong hệ sinh thái nhà thông minh, cảm biến là một trong những sản phẩm quan trọng cho việc tự động hóa mọi thiết bị, giúp quét và phát hiện chuyển động để liên kết với các kịch bản thông minh trong ngôi nhà.\r\nGiới thiệu sản phẩm cảm biến cầu thang ST02\r\nCảm biến cầu thang Hunonic là một sản phẩm được thiết kế để mang đến sự tiện nghi tối đa cho người dùng. Với khả năng phát hiện chuyển động, cảm biến sẽ tự động bật đèn khi có người di chuyển lên hoặc xuống cầu thang. Điều này không chỉ giúp bạn dễ dàng di chuyển trong điều kiện thiếu sáng mà còn đảm bảo an toàn, tránh các tai nạn không đáng có khi di chuyển trên cầu thang vào ban đêm.\r\nVới thiết kế nhỏ gọn, dễ dàng lắp đặt ở nhiều vị trí khác nhau trong nhà như cầu thang, hành lang, lối đi… Bên cạnh đó, người dùng có thể dễ dàng cài đặt và điều chỉnh thông qua ứng dụng điện thoại của Hunonic, mang lại sự tiện lợi trong việc quản lý và sử dụng.\r\nThông số kĩ thuật\r\nNguồn điện: Pin CR 2450 3V\r\nKích thước: 33mm x 28mm\r\nTruyền thông: Bluetooth LE, 2.4 GHz, BLE MESH, IEEE802.15.4\r\nCông suất phát: 10 db\r\nNhiệt độ hoạt động: 0-50 độ\r\nGiao thức kết nối: Wifi', '<img \r\nsrc=\"https://hunonic.com/wp-content/uploads/2024/09/1-cam-bien-cau-thang-2.jpg\">\r\n<img \r\nsrc=\"https://hunonic.com/wp-content/uploads/2024/09/tinh-nang-cam-bien-cau-thang1.jpg\">\r\n\r\n', '2024-11-28 17:21:14', NULL, 396000, NULL, 'Công tắc\r\n', NULL),
(12, '[Ổ Cắm Datic] 2 Ổ Có Tiếp Địa Màu Đen', 'https://hunonic.com/wp-content/uploads/2022/09/o-cam-datic-1.jpg', 'CSản Phẩm: Ổ Cắm Datic 2 Ổ Có Tiếp Địa \r\nMàu Đen\r\nHiện nay, nhà các bác vẫn đang sử dụng những thiết bị như ổ cắm, công tắc bằng nhựa dẫn đến nếu dùng công suất lớn sẽ bị chảy nhựa, nguy hiểm và mất mĩ quan.\r\n\r\nQua quá trình nghiên cứu và lắng nghe góp ý từ người tiêu dùng, “New House, New Life” chính là thông điệp Hunonic gửi gắm với tất cả sản phẩm thiết bị điện thông minh của thương hiệu đều full mặt kính – cực chắn chắn, sang trọng hơn, và yếu tố tinh tế cũng xuất phát từ đây. Từ đó Hunonic cho ra đời dòng Ổ cắm mặt kính Datic để đồng bộ với dòng sản phẩm công tắc cảm ứng Datic siêu hot đang làm mưa làm gió thị trường smarthome Việt. \r\n\r\nThông tin chi tiết sản phẩm Ổ cắm Datic 2 ổ có tiếp địa\r\n Mã sản phẩm: DTLSK02D\r\n Điện áp: 90-250V, tần số 50-60hz\r\n Công suất tải: 3500W\r\n Giao tiếp: Không điều khiển\r\n Kích thước: 120x72x32mm\r\n Bảo hành: 12 Tháng', '<img \r\nsrc=\"https://hunonic.com/wp-content/uploads/2022/09/o-cam-datic-2.jpg\">\r\n', '2024-11-28 17:21:14', NULL, 18000, NULL, 'Ổ cắm', NULL),
(13, 'Bộ điều khiển Tivi, Điều Hoà qua điện thoại, Hunonic IR Smart', 'https://hunonic.com/wp-content/uploads/2021/03/bo-dieu-khien-tivi-dieu-hoa-tu-xa-bang-dien-thoai-hunonic-ir-smart-4.jpg', '❌ Nếu bạn đang cảm thấy thật phiền phức khi đi kèm với mỗi thiết bị là một cái remote.\r\n❌ Bạn khó chịu đến phát điên mỗi khi phải đi tìm remote – thứ mà đôi khi vẫn biến mất một cách bí ẩn hoặc ức chế hơn là đang cần thì remote lại hết pin.\r\n\r\n✅ Để giải quyết vấn đề trên thì thứ bạn cần lúc này là một bộ điều khiển hồng ngoại Hunonic IR Smart. Chức năng của bộ điều khiển này như một remote điều khiển hàng loạt các thiết bị từ xa qua điện thoại. Thay vì 10 cái remote bạn chỉ cần một chiếc điện thoại là đủ. Hunonic IR Smart chính là giải pháp thông minh giúp cho cuộc sống của bạn trở nên đơn giản và tiện lợi hơn.\r\nThông số kĩ thuật\r\nNguồn điện : DC 5V/1A\r\nGóc phát: 360 độ\r\nTầm xa: 4 -5m\r\nNăng lượng tiêu thụ: 0,2W/h\r\nVật liệu: Nhựa ABS\r\nKích thước: 80x70x17\r\nKết nối: Wifi\r\nBảo hành: 12 tháng', '<img \r\nsrc=\"https://hunonic.com/wp-content/uploads/2021/03/bo-dieu-khien-tivi-dieu-hoa-tu-xa-bang-dien-thoai-hunonic-ir-smart-13-800x650-1.jpg\">\r\n', '2024-11-28 17:21:14', NULL, 195, NULL, 'Bộ điều khiển', NULL),
(14, 'Động cơ rèm thông minh Hunonic Ecosystem điều khiển từ xa', 'https://hunonic.com/wp-content/uploads/2021/06/dong-co-rem-thong-minh-hunonic-ecosystem-5-600x600.jpg', 'Thông số kĩ thuật\r\nNguồn điện: 95-240V/AC/50Hz\r\nMomen: 120N/Cm\r\nSức kéo: trọng lượng rèm Max 40Kg\r\nKết nối: 2.4Hz\r\nKích thước: 70x50x310\r\nSử dụng với thanh rèm tròn và vuông\r\nVật liệu vỏ: Nhựa Abs\r\nBảo hành 12 tháng\r\nGiới thiệu động cơ rèm thông minh \r\nChào các bác !\r\n\r\nTrong xu thế hiện nay, công nghệ hiện đại 4.0 được áp dụng vào hầu hết các lĩnh vực. Trang trí rèm cho ngôi nhà hiện đại cũng không nằm ngoài xu thế đó. Bộ động cơ rèm kéo tự động thông minh ra đời giúp các bác điều khiển rèm từ xa qua điện thoại một cách thuận tiện và dễ dàng, thay thế rèm truyền thống lỗi thời.\r\n\r\nTrên thị trường hiện nay có rất nhiều các loại rèm đến từ nhiều quốc gia khác nhau, có giá khá cao và trong lắp đặt nhiều khi gia chủ phải thay bỏ cả rèm đã có sẵn. \r\n\r\nNếu các bác muốn biến chiếc rèm nhà mình thành rèm thông minh, tự động đóng/mở một cách đơn giản nhất, thì động cơ rèm Hunonic Ecosystem sẽ là một lựa chọn hoàn hảo. Với giá cả phải chăng, dễ tháo lắp và khắc phục những lỗi kẹt, mất kết nối. Sở hữu thiết kế đơn giản cùng nhiều tính năng hữu ích, thiết bị này sẽ góp phần giúp ngôi nhà trở nên thông minh hơn, hệ sinh thái smarthome Hunonic đầy đủ hơn với chi phí tối ưu nhất.', '<img \r\nsrc=\"https://hunonic.com/wp-content/uploads/2021/06/dong-co-rem-thong-minh-4-min.jpg\">\r\n', '2024-11-28 17:21:14', NULL, 1965000, NULL, 'Rèm', NULL);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT cho bảng `lichsudonhang`
--
ALTER TABLE `lichsudonhang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT cho bảng `logintoken`
--
ALTER TABLE `logintoken`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT cho bảng `source`
--
ALTER TABLE `source`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
