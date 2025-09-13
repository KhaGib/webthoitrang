-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: localhost:3306
-- Thời gian đã tạo: Th9 13, 2025 lúc 02:11 AM
-- Phiên bản máy phục vụ: 8.4.3
-- Phiên bản PHP: 8.3.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `php_web`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `categories`
--

CREATE TABLE `categories` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `categories`
--

INSERT INTO `categories` (`id`, `name`) VALUES
(1, 'Áo thun nam'),
(2, 'Áo sơ mi nam'),
(3, 'Quần jeans nam'),
(4, 'Quần tây nam'),
(5, 'Áo khoác nam'),
(6, 'Quần short nam'),
(7, 'Phụ kiện nam'),
(8, 'Áo tanktop nam'),
(9, 'Hoodie / Sweater'),
(10, 'Sản phẩm mới');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `orders`
--

CREATE TABLE `orders` (
  `id` int NOT NULL,
  `user_id` int DEFAULT NULL,
  `total_money` int NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_phone` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `user_address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci NOT NULL,
  `status` enum('pending','shipping','success') COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_status` enum('pending','paid') COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'pending',
  `payment_method` enum('COD','online') COLLATE utf8mb3_unicode_ci NOT NULL DEFAULT 'COD',
  `note` text COLLATE utf8mb3_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `total_money`, `created_at`, `user_name`, `user_phone`, `user_address`, `status`, `payment_status`, `payment_method`, `note`) VALUES
(8, 1, 1616000, '2025-06-11 01:56:33', 'Nguyễn Hoàng Kha', '0909123456', 'Hà Nội', 'pending', 'pending', 'COD', ''),
(9, 1, 1616000, '2025-06-11 02:02:42', 'Nguyễn Hoàng Kha', '0909123456', 'Hà Nội', 'pending', 'pending', 'online', 'Giao nhanh nha'),
(10, 1, 1616000, '2025-06-11 02:04:21', ' Hoàng Kha', '0909123456', 'HCM', 'pending', 'pending', 'COD', ''),
(11, 1, 1616000, '2025-06-11 02:05:18', ' Hoàng Kha', '0909123456', 'HCM', 'pending', 'pending', 'COD', ''),
(12, 1, 1616000, '2025-06-11 02:06:26', ' Hoàng Kha', '0909123456', 'HCM', 'pending', 'pending', 'COD', ''),
(13, 1, 1616000, '2025-06-11 02:06:52', ' Hoàng Kha', '0909123456', 'HCM', 'pending', 'pending', 'COD', ''),
(14, 1, 1616000, '2025-06-11 02:07:34', 'Ngọc Hân', '0909123456', 'HCM', 'pending', 'pending', 'online', 'mua cho han'),
(15, 1, 1616000, '2025-06-11 02:08:24', 'Ngọc Hân', '0909123456', 'HCM', 'pending', 'pending', 'online', 'mua cho han'),
(16, 1, 1616000, '2025-06-11 02:12:35', 'Ngọc Hân', '0909123456', 'HCM', 'pending', 'pending', 'online', 'mua cho han'),
(17, 1, 1616000, '2025-06-11 02:14:39', 'Hân Hân', '0909123456', 'CG', 'pending', 'pending', 'COD', 'giao nhanh cho bn'),
(18, 1, 1616000, '2025-06-11 02:19:36', 'Hân Hân', '0909123456', 'CG', 'pending', 'pending', 'online', 'giao nhanh cho bn'),
(19, 1, 1616000, '2025-06-11 02:24:26', 'Hân Hân', '0909123456', 'CG', 'pending', 'paid', 'online', 'giao nhanh han\r\n'),
(20, 1, 2214000, '2025-06-11 02:38:16', 'Nguyễn Hoàng Kha', '0909123456', 'Hà Nội', 'pending', 'pending', 'online', ''),
(21, 1, 2214000, '2025-06-11 02:39:54', 'Nguyễn Hoàng Kha', '09091234563', 'Hà Nội', 'pending', 'paid', 'online', 'dsd'),
(22, NULL, 1217000, '2025-06-12 13:15:21', 'Hoang Kha', '0123456', 'Hà Nội', 'pending', 'pending', 'COD', 'ds'),
(23, NULL, 200000, '2025-06-12 13:23:29', 'khane', '0969428554', 'HCM', 'pending', 'paid', 'online', 'giao nhanh'),
(24, 1, 699000, '2025-06-12 13:32:53', 'Nguyễn Hoàng Kha', '0909123456', 'Hà Nội', 'pending', 'paid', 'online', 'giao cho nhanh nhe'),
(25, NULL, 299000, '2025-06-12 13:41:15', 'Nguyễn Hoàng Kha', '0909123456', 'Hà Nội', 'pending', 'pending', 'COD', ''),
(26, 1, 299000, '2025-06-12 13:43:26', 'Nguyễn Hoàng Kha', '0909123456', 'Hà Nội', 'pending', 'pending', 'COD', 'sas'),
(36, 12, 598000, '2025-06-25 22:18:57', 'Quận 12, TP HCM', 'hanngoc', '969428555', 'pending', 'pending', 'COD', 'giao cho tui'),
(37, 29, 40000, '2025-07-07 16:55:27', 'Quận 12, TP HCM', 'kha', '969428555', 'pending', 'pending', 'COD', 'sfs'),
(38, 44, 20000, '2025-07-08 17:01:42', 'Quận 12, TP HCM', 'my', '09664323453', 'pending', 'pending', 'COD', ''),
(39, 44, 299000, '2025-07-08 17:08:30', 'Hà Nội', 'my', '969428555', 'pending', 'paid', 'online', 'sef'),
(40, 44, 299000, '2025-07-08 17:13:28', 'my', 'Hà Nội', '09664323453', 'pending', 'pending', 'COD', 'sdfsdfsdfdfs');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `order_details`
--

CREATE TABLE `order_details` (
  `order_id` int NOT NULL,
  `product_id` int NOT NULL,
  `quantity` int NOT NULL DEFAULT '1',
  `price` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `order_details`
--

INSERT INTO `order_details` (`order_id`, `product_id`, `quantity`, `price`) VALUES
(8, 17, 1, 459000),
(8, 18, 2, 429000),
(8, 19, 1, 299000),
(9, 17, 1, 459000),
(9, 18, 2, 429000),
(9, 19, 1, 299000),
(10, 17, 1, 459000),
(10, 18, 2, 429000),
(10, 19, 1, 299000),
(11, 17, 1, 459000),
(11, 18, 2, 429000),
(11, 19, 1, 299000),
(12, 17, 1, 459000),
(12, 18, 2, 429000),
(12, 19, 1, 299000),
(13, 17, 1, 459000),
(13, 18, 2, 429000),
(13, 19, 1, 299000),
(14, 17, 1, 459000),
(14, 18, 2, 429000),
(14, 19, 1, 299000),
(15, 17, 1, 459000),
(15, 18, 2, 429000),
(15, 19, 1, 299000),
(16, 17, 1, 459000),
(16, 18, 2, 429000),
(16, 19, 1, 299000),
(17, 17, 1, 459000),
(17, 18, 2, 429000),
(17, 19, 1, 299000),
(18, 17, 1, 459000),
(18, 18, 2, 429000),
(18, 19, 1, 299000),
(19, 17, 1, 459000),
(19, 18, 2, 429000),
(19, 19, 1, 299000),
(20, 17, 1, 459000),
(20, 18, 2, 429000),
(20, 19, 3, 299000),
(21, 17, 1, 459000),
(21, 18, 2, 429000),
(21, 19, 3, 299000),
(22, 17, 2, 459000),
(22, 19, 1, 299000),
(23, 20, 1, 200000),
(24, 19, 1, 299000),
(24, 20, 2, 200000),
(25, 19, 1, 299000),
(26, 19, 1, 299000),
(36, 3, 2, 299000),
(37, 1, 2, 20000),
(38, 1, 1, 20000),
(39, 4, 1, 299000),
(40, 3, 1, 299000);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `products`
--

CREATE TABLE `products` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `price` int NOT NULL,
  `sale_price` int DEFAULT NULL,
  `image` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb3_unicode_ci NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `products`
--

INSERT INTO `products` (`id`, `name`, `price`, `sale_price`, `image`, `description`, `category_id`) VALUES
(1, 'Áo thun trơn cổ tròn', 250000, 20000, 'ao1.jpg', 'Áo thun cotton 100%, thấm hút tốt, thoáng mát.', 1),
(3, 'Áo sơ mi tay ngắn trắng', 350000, 299000, 'ao3.jpg', 'Áo sơ mi form chuẩn, dễ phối đồ.', 2),
(4, 'Áo sơ mi caro đỏ đen', 370000, 299000, 'ao4.jpg', 'Phong cách năng động, chất liệu flannel.', 2),
(5, 'Áo Thun Nam Hoạ Tiết Gradient Drifting In Daze Form Oversize\n', 500000, 429000, 'ao6.jpg', 'Jeans nam kiểu dáng slimfit, co giãn nhẹ.', 3),
(6, 'Quần jeans ống đứng', 480000, 439000, 'quan5.jpg', 'Phong cách cổ điển, phù hợp đi học đi chơi.', 3),
(7, 'Quần tây công sở xám', 420000, 379000, 'quan6.jpg', 'Quần tây sang trọng, thích hợp môi trường văn phòng.', 4),
(8, 'Quần tây ống côn đen', 450000, 399000, 'quan7.jpg', 'Thiết kế hiện đại, form ôm nhẹ.', 4),
(9, 'Quần tây âu', 620000, 559000, 'quan8.jpg', 'Chống gió, giữ ấm tốt, chất liệu dày dặn.', 5),
(10, 'Túi Tote Nam In Họa Tiết Pattern Sundaze Rush\n', 680000, 599000, 'tuisach.jpg', 'Phong cách cá tính, chất denim bền bỉ.', 5),
(11, 'Áo Sơ Mi Muslin Nam Tay Ngắn Brushed Heritage Form Super Boxy', 280000, 239000, 'aosm1.jpg', 'Short nam năng động, chất liệu co giãn.', 6),
(12, 'Quần Kaki Nam Ống Suông DualPocket Edge Form Straight\n', 300000, 259000, 'quan9.jpg', 'Phong cách đường phố, mặc cực chất.', 6),
(13, 'Nón lưỡi trai đen basicSet Đồ Nam Oxford Vignette ICDN Star\n', 150000, 129000, 'setdo.jpg', 'Phụ kiện đơn giản, dễ phối với mọi outfit.', 7),
(14, 'Áo Tanktop Nam Sticker ID Form Regular\n', 60000, 49000, 'aotanktop.jpg', 'Chất vải co giãn, mềm mịn, thoải mái.', 7),
(15, 'Quần Short Kaki Nam Sage Moss Hoạ Tiết Sundaze Rush Form Regular\n', 230000, 199000, 'quankaki.jpg', 'Thoáng mát, phù hợp tập gym hoặc mặc nhà.', 8),
(16, 'Quần Short Nam Hoạ Tiết Sundaze Rush Form Regular\n', 250000, 209000, 'quankaki2.jpg', 'Phối đồ phong cách Streetwear.', 8),
(17, 'Nón Bucket Nam Thêu Drifting In Daze\n', 520000, 459000, 'non.jpg', 'Giữ ấm, chất nỉ ngoại, unisex.', 9),
(18, 'Sweater kẻ sọc oversize', 490000, 429000, 'ao3.jpg', 'Mặc đi học, đi chơi đều đẹp.', 9),
(19, 'Áo thun Local Brand mới', 350000, 299000, 'ao2.jpg', 'Thiết kế mới nhất của bộ sưu tập 2025.', 10),
(20, 'Áo thun Sọc nè', 520000, 200000, 'aosm1.jpg', 'Chất jean Nhật cao cấp, co giãn tốt.', 10),
(39, 'Hân xinh', 52000000, 1200000, 'avarta.jpg', 'kh dep nhung xinh', 1);

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

CREATE TABLE `users` (
  `id` int NOT NULL,
  `name` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb3_unicode_ci NOT NULL,
  `phone` varchar(20) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `address` varchar(255) CHARACTER SET utf8mb3 COLLATE utf8mb3_unicode_ci DEFAULT NULL,
  `role` varchar(20) COLLATE utf8mb3_unicode_ci DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3 COLLATE=utf8mb3_unicode_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`, `role`) VALUES
(1, 'Hoàng Kha', 'khahoang@gmail.com', '$2y$10$7XGYmNbTQhKSKIL/k39C0O1e5.uk99WWJ8xPY0cPJ2miMKR0Sfdja', '0969428554', 'TP HCM', 'admin'),
(6, 'Phan Nhật G', 'phannhatg@gmail.com', '202cb962ac59075b964b07152d234b70', '0966111222', 'Quảng Nam', 'user'),
(11, 'Trịnh Công Minh', 'trinhcongm@gmail.com', '$2y$10$w.0dXDjCLya1zT4P.ZTUbueYLbPrUhPlu02qp17vRjoIkVOWYlYIu', '0922110033', 'Bắc Ninh', 'admin'),
(12, 'Nguyễn Hoàng Kha', 'kha@gmail.com', '$2y$10$u.bJPf5JKLT4Ujnw008NYO5sJVpG.0Rsv6CJoZ5CDUrDRbYJXEprm', '', 'TP HCM', 'user'),
(14, 'Tạ Thị P', 'tathip@gmail.com', '202cb962ac59075b964b07152d234b70', '0955443322', 'Long An', 'admin'),
(16, 'Kha', 'khaa@gmail.com', '202cb962ac59075b964b07152d234b70', '', '', 'user'),
(23, 'Nguyễn Hoàng Kha', 'khanh@gmail.com', '202cb962ac59075b964b07152d234b70', '', '', 'user'),
(24, 'Ngọc Hân', 'hanngoc@gmail.com', '$2y$10$XkRh5Dhm0/fOcGeDFmzK5.pw9Tg0oeXmyHmmCZ.ik0QEgrMYf7AI.', '', '', 'user'),
(29, 'khane', 'khanhps40655@gmail.com', '$2y$10$kZ9keBTIC4qdtNFEUneOyuPCFXx9JR3ST0cOB9QCzFA.LclEhctHS', '', 'TP HCM', 'user'),
(34, 'Nguyễn Hoàng Kha', 'hk@gmail.com', '$2y$10$qvGQLslgbIQTco5mN4AbvOk5NM/ekDLY0din0J7z6ShC4NMcm.X5a', '0969428554', 'Quận 12, TP HCM', 'user'),
(44, 'my', 'my@gmail.com', '202cb962ac59075b964b07152d234b70', NULL, NULL, 'user');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Chỉ mục cho bảng `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Chỉ mục cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD PRIMARY KEY (`order_id`,`product_id`),
  ADD KEY `product_id` (`product_id`);

--
-- Chỉ mục cho bảng `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`);

--
-- Chỉ mục cho bảng `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT cho các bảng đã đổ
--

--
-- AUTO_INCREMENT cho bảng `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT cho bảng `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT cho bảng `products`
--
ALTER TABLE `products`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT cho bảng `users`
--
ALTER TABLE `users`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- Ràng buộc đối với các bảng kết xuất
--

--
-- Ràng buộc cho bảng `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ràng buộc cho bảng `order_details`
--
ALTER TABLE `order_details`
  ADD CONSTRAINT `order_details_ibfk_1` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT,
  ADD CONSTRAINT `order_details_ibfk_2` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;

--
-- Ràng buộc cho bảng `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON DELETE RESTRICT ON UPDATE RESTRICT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
