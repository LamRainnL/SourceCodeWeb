-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Máy chủ: 127.0.0.1:3306
-- Thời gian đã tạo: Th12 07, 2023 lúc 02:20 PM
-- Phiên bản máy phục vụ: 10.4.10-MariaDB
-- Phiên bản PHP: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Cơ sở dữ liệu: `webtimtro`
--

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `admins`
--

DROP TABLE IF EXISTS `admins`;
CREATE TABLE IF NOT EXISTS `admins` (
  `Id` int(11) NOT NULL AUTO_INCREMENT,
  `TenDangNhap` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `MatKhau` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`Id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `admins`
--

INSERT INTO `admins` (`Id`, `TenDangNhap`, `MatKhau`) VALUES
(1, 'duy', '123'),
(2, 'lam', '123');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `danhmuc`
--

DROP TABLE IF EXISTS `danhmuc`;
CREATE TABLE IF NOT EXISTS `danhmuc` (
  `Id_DanhMuc` int(11) NOT NULL AUTO_INCREMENT,
  `TenDanhMuc` varchar(100) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `MoTa` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`Id_DanhMuc`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `danhmuc`
--

INSERT INTO `danhmuc` (`Id_DanhMuc`, `TenDanhMuc`, `MoTa`) VALUES
(3, 'Phòng trọ', 'Phòng trọ'),
(4, 'Nhà nguyên căn', 'nhà ở dành cho hộ gia đình hoặc từ 5 đến 6 người'),
(5, 'Căn hộ', 'nhà cao cấp dành cho hộ gia đình'),
(6, 'Sleep box', 'Phòng cho thuê ngắn hạn');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `phongtro`
--

DROP TABLE IF EXISTS `phongtro`;
CREATE TABLE IF NOT EXISTS `phongtro` (
  `Id_PhongTro` int(11) NOT NULL AUTO_INCREMENT,
  `TieuDe` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `LoaiHinhChoThue` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `HinhAnh` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `DiaChiCuThe` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Phuong` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Gia` int(11) DEFAULT NULL,
  `DienTich` int(11) DEFAULT NULL,
  `SoPhong` int(11) DEFAULT NULL,
  `MoTa` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Id_DanhMuc` int(11) DEFAULT NULL,
  `Id_User` int(11) DEFAULT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8_vietnamese_ci NOT NULL,
  `full_text_search_column` text GENERATED ALWAYS AS (concat_ws(' ',`TieuDe`,`Phuong`,`Gia`,`SoPhong`,`DienTich`,`MoTa`)) STORED,
  `ThoiGianDang` datetime DEFAULT NULL,
  PRIMARY KEY (`Id_PhongTro`),
  KEY `Id_DanhMuc` (`Id_DanhMuc`),
  KEY `Id_User` (`Id_User`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `phongtro`
--

INSERT INTO `phongtro` (`Id_PhongTro`, `TieuDe`, `LoaiHinhChoThue`, `HinhAnh`, `DiaChiCuThe`, `Phuong`, `Gia`, `DienTich`, `SoPhong`, `MoTa`, `Id_DanhMuc`, `Id_User`, `status`, `ThoiGianDang`) VALUES
(1, 'Cho thuê trọ tại Nguyễn Thị Minh Khai', 'Phòng trọ', 'upimg/1701929692_anhphongtro.jpg', '31 Nguyễn Thị Minh Khai', 'Nguyễn Văn Cừ', 2000000, 100, 2, 'trọ gần trường, đầy đủ tiện nghi', 3, 9, 'approved', '2023-12-07 13:14:52'),
(2, 'Nhà nguyên căn hẽm 12 Ngô Mây', 'Nhà nguyên căn', 'upimg/1701932845_anhphongtro.jpg', '23/12 Ngô Mây', 'Ngô Mây', 4000000, 200, 3, 'nhà có 2 phòng ngủ, 1 phòng bếp, đầy đủ tiện nghi, rộng rãi thoải mái', 4, 9, 'approved', '2023-12-07 14:07:25'),
(3, 'Sleep Box tại Quy Nhơn', 'Sleep box', 'upimg/1701933237_anhphongtro.jpg', '45 Nguyễn Thị Định', 'Nguyễn Văn Cừ', 1000000, 200, 2, 'đầy đủ tiện nghi ( máy lạnh, máy giặt), mặt đường tiện lợi', 6, 10, 'approved', '2023-12-07 14:13:57'),
(4, 'Cho thuê phòng tại Nguyễn Lữ', 'Phòng trọ', 'upimg/1701948289_anhphongtro.jpg', '231 Ngô Mây', 'Ngô Mây', 1500000, 100, 1, 'phòng trọ gần chợ khu 6', 3, 9, 'approved', '2023-12-07 18:24:49'),
(5, 'Cho thuê trọ Chương Dương', 'Phòng trọ', 'upimg/1701948712_download.jpg', '45 Chương Dương', 'Nguyễn Văn Cừ', 2000000, 200, 1, 'trọ mới sạch sẽ', 3, 9, 'approved', '2023-12-07 18:31:52');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `timtro`
--

DROP TABLE IF EXISTS `timtro`;
CREATE TABLE IF NOT EXISTS `timtro` (
  `Id_TimTro` int(11) NOT NULL AUTO_INCREMENT,
  `TenBaiViet` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `NoiDung` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Id_User` int(11) DEFAULT NULL,
  `status` enum('pending','approved','rejected') COLLATE utf8_vietnamese_ci NOT NULL,
  `ThoiGianDang` datetime DEFAULT NULL,
  `thongtinlienhe` varchar(255) COLLATE utf8_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`Id_TimTro`),
  KEY `Id_User` (`Id_User`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `timtro`
--

INSERT INTO `timtro` (`Id_TimTro`, `TenBaiViet`, `NoiDung`, `Id_User`, `status`, `ThoiGianDang`, `thongtinlienhe`) VALUES
(15, 'Tìm trọ Nguyễn Thái Học', '2 người ở', 9, 'approved', '2023-12-07 04:50:52', '0352282425');

-- --------------------------------------------------------

--
-- Cấu trúc bảng cho bảng `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `Id_User` int(11) NOT NULL AUTO_INCREMENT,
  `Ho` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Ten` text COLLATE utf8_vietnamese_ci NOT NULL,
  `Email` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Sdt` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `MatKhau` text COLLATE utf8_vietnamese_ci DEFAULT NULL,
  PRIMARY KEY (`Id_User`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Đang đổ dữ liệu cho bảng `users`
--

INSERT INTO `users` (`Id_User`, `Ho`, `Ten`, `Email`, `Sdt`, `MatKhau`) VALUES
(9, 'Nguyễn Bá', 'Lâm', 'nguyenbalam208@gmail.com', '0352282425', '1'),
(10, 'bas', 'laam', 'balam@gmail.com', '0352282424', '1'),
(11, 'Nguyễn Thị Thanh', 'Hương', 'h@gmail.com', '0987654321', '1');

--
-- Chỉ mục cho các bảng đã đổ
--

--
-- Chỉ mục cho bảng `phongtro`
--
ALTER TABLE `phongtro` ADD FULLTEXT KEY `idx_full_text_search` (`full_text_search_column`);

--
-- Các ràng buộc cho các bảng đã đổ
--

--
-- Các ràng buộc cho bảng `phongtro`
--
ALTER TABLE `phongtro`
  ADD CONSTRAINT `phongtro_ibfk_1` FOREIGN KEY (`Id_DanhMuc`) REFERENCES `danhmuc` (`Id_DanhMuc`),
  ADD CONSTRAINT `phongtro_ibfk_2` FOREIGN KEY (`Id_User`) REFERENCES `users` (`Id_User`);

--
-- Các ràng buộc cho bảng `timtro`
--
ALTER TABLE `timtro`
  ADD CONSTRAINT `timtro_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `users` (`Id_User`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
