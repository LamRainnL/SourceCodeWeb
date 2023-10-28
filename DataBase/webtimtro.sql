-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 28, 2023 at 06:21 PM
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
  `TenDangNhap` text DEFAULT NULL,
  `MatKhau` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`Id`, `TenDangNhap`, `MatKhau`) VALUES
(1, 'duy', '123'),
(2, 'lam', '123');

-- --------------------------------------------------------

--
-- Table structure for table `danhmuc`
--

CREATE TABLE `danhmuc` (
  `Id_DanhMuc` int(11) NOT NULL,
  `TenDanhMuc` text DEFAULT NULL,
  `MoTa` text DEFAULT NULL,
  `TrangThai` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci DEFAULT NULL,
  `NgayTao` datetime DEFAULT NULL,
  `NgayCapNhat` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `danhmuc`
--

INSERT INTO `danhmuc` (`Id_DanhMuc`, `TenDanhMuc`, `MoTa`, `TrangThai`, `NgayTao`, `NgayCapNhat`) VALUES
(1, 'DanhMuc1', 'Nhà Trọ', 'Hoạt động', '2023-10-25 22:57:34', '2023-10-25 22:57:34'),
(2, 'DanhMuc2', 'Sleepbox', 'Ngừng hoạt động', '2023-10-25 22:57:34', '2023-10-25 22:57:34');

-- --------------------------------------------------------

--
-- Table structure for table `phongtro`
--

CREATE TABLE `phongtro` (
  `Id_PhongTro` int(11) NOT NULL,
  `TieuDe` text DEFAULT NULL,
  `LoaiHinhChoThue` text DEFAULT NULL,
  `HinhAnh` text DEFAULT NULL,
  `DiaChiCuThe` text DEFAULT NULL,
  `Phuong` text DEFAULT NULL,
  `Gia` decimal(10,2) DEFAULT NULL,
  `DienTich` int(11) DEFAULT NULL,
  `SoPhong` int(11) DEFAULT NULL,
  `MoTa` text DEFAULT NULL,
  `Id_DanhMuc` int(11) DEFAULT NULL,
  `Id_User` int(11) DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `phongtro`
--

INSERT INTO `phongtro` (`Id_PhongTro`, `TieuDe`, `LoaiHinhChoThue`, `HinhAnh`, `DiaChiCuThe`, `Phuong`, `Gia`, `DienTich`, `SoPhong`, `MoTa`, `Id_DanhMuc`, `Id_User`, `status`) VALUES
(1, 'Cho Thuê', 'Phòng Trọ', 'image1.jpg', '18 a, Nguyễn Nhạc', 'Phường Ngô Mây', 1000.50, 50, 2, 'Mô tả phòng trọ 1', 1, 1, 'pending'),
(2, 'Cho Thuê', 'Sleepbox', 'image2.jpg', '22 Nguyễn Huệ', 'Phường Quang Trung', 1500.75, 60, 3, 'Mô tả phòng trọ 2', 2, 2, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `timtro`
--

CREATE TABLE `timtro` (
  `Id_TimTro` int(11) NOT NULL,
  `TenBaiViet` text DEFAULT NULL,
  `NoiDung` text DEFAULT NULL,
  `Id_User` int(11) DEFAULT NULL,
  `status` enum('pending','approved','rejected') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `timtro`
--

INSERT INTO `timtro` (`Id_TimTro`, `TenBaiViet`, `NoiDung`, `Id_User`, `status`) VALUES
(1, 'Bài viết 1', 'Nội dung bài viết 1', 1, 'pending'),
(2, 'Bài viết 2', 'Nội dung bài viết 2', 2, 'rejected');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Id_User` int(11) NOT NULL,
  `Ho` text DEFAULT NULL,
  `Ten` text NOT NULL,
  `Email` text DEFAULT NULL,
  `Sdt` text DEFAULT NULL,
  `MatKhau` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_vietnamese_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Id_User`, `Ho`, `Ten`, `Email`, `Sdt`, `MatKhau`) VALUES
(1, 'Nguyễn', 'Hương', 'huong@gmail.com', '1234567891', '123'),
(2, 'Trần', 'Hà', 'ha@gmail.com', '1234567892', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `danhmuc`
--
ALTER TABLE `danhmuc`
  ADD PRIMARY KEY (`Id_DanhMuc`);

--
-- Indexes for table `phongtro`
--
ALTER TABLE `phongtro`
  ADD PRIMARY KEY (`Id_PhongTro`),
  ADD KEY `Id_DanhMuc` (`Id_DanhMuc`),
  ADD KEY `Id_User` (`Id_User`);

--
-- Indexes for table `timtro`
--
ALTER TABLE `timtro`
  ADD PRIMARY KEY (`Id_TimTro`),
  ADD KEY `Id_User` (`Id_User`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Id_User`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `danhmuc`
--
ALTER TABLE `danhmuc`
  MODIFY `Id_DanhMuc` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `phongtro`
--
ALTER TABLE `phongtro`
  MODIFY `Id_PhongTro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `timtro`
--
ALTER TABLE `timtro`
  MODIFY `Id_TimTro` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `Id_User` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `phongtro`
--
ALTER TABLE `phongtro`
  ADD CONSTRAINT `phongtro_ibfk_1` FOREIGN KEY (`Id_DanhMuc`) REFERENCES `danhmuc` (`Id_DanhMuc`),
  ADD CONSTRAINT `phongtro_ibfk_2` FOREIGN KEY (`Id_User`) REFERENCES `users` (`Id_User`);

--
-- Constraints for table `timtro`
--
ALTER TABLE `timtro`
  ADD CONSTRAINT `timtro_ibfk_1` FOREIGN KEY (`Id_User`) REFERENCES `users` (`Id_User`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
