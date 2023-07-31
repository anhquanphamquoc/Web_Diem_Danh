-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th7 31, 2023 lúc 04:00 AM
-- Phiên bản máy phục vụ: 10.4.28-MariaDB
-- Phiên bản PHP: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `db_webdatmonan`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `accounts`
--

CREATE TABLE `accounts` (
  `account_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `accounts`
--

INSERT INTO `accounts` (`account_id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin', 1),
(2, '46.01.104.146', 'anhquan123', 0);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admin_accounts`
--

CREATE TABLE `admin_accounts` (
  `admin_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `admin_accounts`
--

INSERT INTO `admin_accounts` (`admin_id`, `username`, `pass`) VALUES
(1, 'admin', 'admin');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `foods`
--

CREATE TABLE `foods` (
  `food_id` int(11) NOT NULL,
  `food_name` varchar(40) NOT NULL,
  `food_price` decimal(7,0) NOT NULL,
  `food_image` varchar(100) NOT NULL,
  `food_infor` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `foods`
--

INSERT INTO `foods` (`food_id`, `food_name`, `food_price`, `food_image`, `food_infor`) VALUES
(1, 'Hũ Tiếu', 20000, '../images/hu-tieu.jpg', 'Một bát hủ tiếu đầy đủ gồm nước dùng, tôm, thịt heo, thịt băm, sợi bánh nhỏ như sợi bún nhưng có màu'),
(2, 'Cơm Tấm', 20000, '../images/com-tam.jpg', 'Cơm tấm là một món ăn truyền thống của Việt Nam, được làm từ gạo tấm và kèm theo các loại thịt như h');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `total_price` int(7) NOT NULL,
  `trangthai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_items`
--

CREATE TABLE `order_items` (
  `order_item_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `food_id` int(11) NOT NULL,
  `foods` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_one_only`
--

CREATE TABLE `order_one_only` (
  `order_one_only_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `food_name` varchar(40) NOT NULL,
  `food_price` decimal(7,0) NOT NULL,
  `trangthai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `order_one_only`
--

INSERT INTO `order_one_only` (`order_one_only_id`, `username`, `food_name`, `food_price`, `trangthai`) VALUES
(14, '46.01.104.146', 'Cơm Tấm', 20000, 1),
(15, '46.01.104.146', 'Hũ Tiếu', 20000, 1),
(16, '46.01.104.146', 'Cơm Tấm', 20000, 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `student_accounts`
--

CREATE TABLE `student_accounts` (
  `student_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `pass` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `student_accounts`
--

INSERT INTO `student_accounts` (`student_id`, `username`, `pass`) VALUES
(1, '46.01.104.146', 'anhquan123');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `accounts`
--
ALTER TABLE `accounts`
  ADD PRIMARY KEY (`account_id`);

--
-- Chỉ mục cho bảng `admin_accounts`
--
ALTER TABLE `admin_accounts`
  ADD PRIMARY KEY (`admin_id`);

--
-- Chỉ mục cho bảng `foods`
--
ALTER TABLE `foods`
  ADD PRIMARY KEY (`food_id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`),
  ADD KEY `studentid_orders-student` (`student_id`);

--
-- Chỉ mục cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD PRIMARY KEY (`order_item_id`),
  ADD KEY `orderid_orderitem-order` (`order_id`),
  ADD KEY `foodid_orderitem-food` (`food_id`);

--
-- Chỉ mục cho bảng `order_one_only`
--
ALTER TABLE `order_one_only`
  ADD PRIMARY KEY (`order_one_only_id`);

--
-- Chỉ mục cho bảng `student_accounts`
--
ALTER TABLE `student_accounts`
  ADD PRIMARY KEY (`student_id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `accounts`
--
ALTER TABLE `accounts`
  MODIFY `account_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `admin_accounts`
--
ALTER TABLE `admin_accounts`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT cho bảng `foods`
--
ALTER TABLE `foods`
  MODIFY `food_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_items`
--
ALTER TABLE `order_items`
  MODIFY `order_item_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT cho bảng `order_one_only`
--
ALTER TABLE `order_one_only`
  MODIFY `order_one_only_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT cho bảng `student_accounts`
--
ALTER TABLE `student_accounts`
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `studentid_orders-student` FOREIGN KEY (`student_id`) REFERENCES `student_accounts` (`student_id`);

--
-- Các ràng buộc cho bảng `order_items`
--
ALTER TABLE `order_items`
  ADD CONSTRAINT `foodid_orderitem-food` FOREIGN KEY (`food_id`) REFERENCES `foods` (`food_id`),
  ADD CONSTRAINT `orderid_orderitem-order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
