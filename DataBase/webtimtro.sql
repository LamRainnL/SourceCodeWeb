-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 12, 2023 at 06:55 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.0.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webtimtro`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `Id` int(11) NOT NULL,
  `TenDangNhap` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `MatKhau` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Id`, `TenDangNhap`, `MatKhau`) VALUES
(1, 'duy', '123'),
(2, 'lam', '123'),
(3, 'huong', '123'),
(4, 'ha', '123');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `Id` int(11) NOT NULL,
  `TenDanhMuc` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `MoTa` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `TrangThai` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `NgayTao` datetime DEFAULT NULL,
  `NgayCapNhat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`Id`, `TenDanhMuc`, `MoTa`, `TrangThai`, `NgayTao`, `NgayCapNhat`) VALUES
(1, 'DanhMuc1', 'Nhà trọ', 'Hoạt động', '2023-10-11 22:14:19', '2023-10-11 22:14:19'),
(2, 'DanhMuc2', 'SleepBox', 'Tạm ngừng', '2023-10-11 22:14:19', '2023-10-11 22:14:19'),
(3, 'DanhMuc3', 'Căn hộ', 'Hoạt động', '2023-10-11 22:14:19', '2023-10-11 22:14:19');

-- --------------------------------------------------------

--
-- Table structure for table `phongtro`
--

CREATE TABLE `phongtro` (
  `Id` int(11) NOT NULL,
  `TieuDe` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `TenPhong` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `HinhAnh` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `MoTa` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `SoNha` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Phuong` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `SoTang` int(11) DEFAULT NULL,
  `PhongNgu` int(11) DEFAULT NULL,
  `VeSinh` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Gia` int(11) DEFAULT NULL,
  `DienTich` int(11) DEFAULT NULL,
  `TrangThai` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `SoPhong` int(11) DEFAULT NULL,
  `NoiDung` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `IdDanhMuc` int(11) DEFAULT NULL,
  `IdUser` int(11) DEFAULT NULL,
  `BanDo` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `NgayTao` datetime DEFAULT NULL,
  `NgayCapNhat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `phongtro`
--

INSERT INTO `phongtro` (`Id`, `TieuDe`, `TenPhong`, `HinhAnh`, `MoTa`, `SoNha`, `Phuong`, `SoTang`, `PhongNgu`, `VeSinh`, `Gia`, `DienTich`, `TrangThai`, `SoPhong`, `NoiDung`, `IdDanhMuc`, `IdUser`, `BanDo`, `NgayTao`, `NgayCapNhat`) VALUES
(1, 'Cho Thuê Phòng Trọ', 'Phòng 1', 'hinh1.jpg', 'cho ở ghép', '12 Nguyễn Nhạc', 'Ngô Mây', 3, 1, 'Riêng', 1500000, 30, 'Còn trống', 2, ' ', 1, 1, 'map1.jpg', '2023-10-11 22:21:32', '2023-10-11 22:21:32'),
(2, 'Cho Thuê Căn Hộ', 'Căn hộ', 'hinh2.jpg', 'cho hộ gia đình thuê', '02 Ngô Mây', 'Ngô Mây', 2, 2, 'Riêng', 5000000, 50, 'Đã cho thuê', 0, 'N', 2, 2, 'map2.jpg', '2023-10-11 22:21:32', '2023-10-11 22:21:32'),
(3, 'Cho Thuê SleepBox', 'Sleepbox', 'hinh3.jpg', 'Cho sinh viên thuê', '02 Quang Trung', 'Quang Trung', 3, 1, 'Chung', 200000, 15, 'Còn trống', 3, '', 3, 3, 'map3.jpg', '2023-10-11 22:21:32', '2023-10-11 22:21:32');

-- --------------------------------------------------------

--
-- Table structure for table `timtro`
--

CREATE TABLE `timtro` (
  `Id` int(11) NOT NULL,
  `TenBaiViet` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `NoiDung` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Id_User` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `timtro`
--

INSERT INTO `timtro` (`Id`, `TenBaiViet`, `NoiDung`, `Id_User`) VALUES
(1, 'Tìm trọ', 'Cần tìm một phòng trọ 20m2, giá nhỏ hơn 2tr', 1),
(2, 'Tìm căn hộ', 'Tìm căn hộ cho gia đình 4 người, 40m2, giá nhỏ hơn 4tr', 2),
(3, 'Tìm Sleepbox', 'Sinh viên cần tìm trọ nhỏ hơn 300k', 3);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id` int(11) NOT NULL,
  `TenDangNhap` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Email` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `Sdt` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL,
  `MatKhau` text CHARACTER SET utf8 COLLATE utf8_vietnamese_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id`, `TenDangNhap`, `Email`, `Sdt`, `MatKhau`) VALUES
(1, 'user1', 'user1@gmail.com', '1234567890', '123'),
(2, 'user2', 'user2@gmail.com', '2345678901', '123'),
(3, 'user3', 'user3@gmail.com', '3456789012', '123'),
(4, 'user4', 'user4@gmail.com', '4567890123', '123'),
(5, 'user5', 'user5@gmail.com', '5678901234', '123');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
