-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1
-- Thời gian đã tạo: Th8 03, 2023 lúc 08:32 AM
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
-- Cấu trúc bảng cho bảng `diemdanh`
--

CREATE TABLE `diemdanh` (
  `diemdanh_id` int(11) NOT NULL,
  `lop_id` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `lop_name` varchar(40) NOT NULL,
  `lop_time` datetime NOT NULL,
  `diemdanh_time` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `diemdanh`
--

INSERT INTO `diemdanh` (`diemdanh_id`, `lop_id`, `username`, `lop_name`, `lop_time`, `diemdanh_time`) VALUES
(4, 4, '46.01.104.146', 'Tin học căn bản', '2023-08-03 07:01:16', '2023-08-03 12:05:59'),
(5, 4, 'anhquanphamquoc', 'Tin học căn bản', '2023-08-03 07:01:16', '2023-08-03 12:24:35'),
(6, 5, '46.01.104.146', 'Tin học căn bản', '2023-08-03 12:51:34', '2023-08-03 12:52:03');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `lop`
--

CREATE TABLE `lop` (
  `lop_id` int(11) NOT NULL,
  `lop_name` varchar(40) NOT NULL,
  `lop_time` datetime NOT NULL,
  `lop_info` varchar(100) NOT NULL,
  `lop_pass` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `lop`
--

INSERT INTO `lop` (`lop_id`, `lop_name`, `lop_time`, `lop_info`, `lop_pass`) VALUES
(4, 'Tin học căn bản', '2023-08-03 07:01:16', 'Lớp tin học căn bản trưa thứ 5 của thầy Quân', 123),
(5, 'Tin học căn bản', '2023-08-03 12:51:34', 'lớp trưa thứ 5', 1234),
(6, 'Xác suất thông kê ', '2023-08-03 13:05:25', 'XSTK', 123),
(7, 'Xác suất thông kê 2', '2023-08-03 13:05:28', 'XSTK', 123),
(8, 'Xác suất thông kê 3', '2023-08-03 13:05:33', 'XSTK', 123),
(9, 'Xác suất thông kê 4', '2023-08-03 13:05:37', 'XSTK', 123);

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
  `lop_name` varchar(40) NOT NULL,
  `food_price` decimal(7,0) NOT NULL,
  `trangthai` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_vietnamese_ci;

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
(1, '46.01.104.146', 'anhquan123'),
(3, 'anhquanphamquoc', 'anhquan123');

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
-- Chỉ mục cho bảng `diemdanh`
--
ALTER TABLE `diemdanh`
  ADD PRIMARY KEY (`diemdanh_id`);

--
-- Chỉ mục cho bảng `lop`
--
ALTER TABLE `lop`
  ADD PRIMARY KEY (`lop_id`);

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
-- AUTO_INCREMENT cho bảng `diemdanh`
--
ALTER TABLE `diemdanh`
  MODIFY `diemdanh_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT cho bảng `lop`
--
ALTER TABLE `lop`
  MODIFY `lop_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

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
  MODIFY `student_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

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
  ADD CONSTRAINT `foodid_orderitem-food` FOREIGN KEY (`food_id`) REFERENCES `lop` (`lop_id`),
  ADD CONSTRAINT `orderid_orderitem-order` FOREIGN KEY (`order_id`) REFERENCES `orders` (`order_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
