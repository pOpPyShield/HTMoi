-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 30, 2020 at 01:53 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `compshop`
--

-- --------------------------------------------------------

--
-- Table structure for table `apdungkhuyenmai`
--

CREATE TABLE `apdungkhuyenmai` (
  `ApDung_Id` int(10) NOT NULL,
  `KhuyenMai_Id` int(10) NOT NULL,
  `SPCT_Id` int(11) NOT NULL,
  `NgayBatDau` datetime NOT NULL,
  `NgayKetThuc` datetime NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apdungkhuyenmai`
--

INSERT INTO `apdungkhuyenmai` (`ApDung_Id`, `KhuyenMai_Id`, `SPCT_Id`, `NgayBatDau`, `NgayKetThuc`, `Status`) VALUES
(3, 1, 8, '2020-12-22 17:29:00', '2020-12-26 17:30:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `binhluan`
--

CREATE TABLE `binhluan` (
  `BinhLuan_Id` int(255) NOT NULL,
  `KhachHang_Id` int(10) NOT NULL,
  `SPCT_Id` int(11) NOT NULL,
  `Noidungbinhluan` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `chuongtrinhkhuyenmai`
--

CREATE TABLE `chuongtrinhkhuyenmai` (
  `KhuyenMai_Id` int(10) NOT NULL,
  `LoaiKhuyenMai` varchar(255) NOT NULL,
  `PhanTramKhuyenMai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chuongtrinhkhuyenmai`
--

INSERT INTO `chuongtrinhkhuyenmai` (`KhuyenMai_Id`, `LoaiKhuyenMai`, `PhanTramKhuyenMai`) VALUES
(1, 'Noel', 50);

-- --------------------------------------------------------

--
-- Table structure for table `danhgia`
--

CREATE TABLE `danhgia` (
  `DanhGia_Id` int(10) NOT NULL,
  `KhachHang_Id` int(10) NOT NULL,
  `SPCT_Id` int(11) NOT NULL,
  `SoSao` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `danhmucsanpham`
--

CREATE TABLE `danhmucsanpham` (
  `DMSP_Id` int(11) NOT NULL,
  `DMSP` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `danhmucsanpham`
--

INSERT INTO `danhmucsanpham` (`DMSP_Id`, `DMSP`) VALUES
(1, 'Laptop'),
(2, 'pc-gaming'),
(3, 'Linh kiện');

-- --------------------------------------------------------

--
-- Table structure for table `diachigiaohang`
--

CREATE TABLE `diachigiaohang` (
  `DiaChi_Id` int(10) NOT NULL,
  `KhachHang_Id` int(10) NOT NULL,
  `Ten` varchar(255) NOT NULL,
  `DiaChi` varchar(500) NOT NULL,
  `Sdt` varchar(13) NOT NULL,
  `ThanhToan_Id` int(5) NOT NULL,
  `ThanhTien` double NOT NULL,
  `GioHang_Id` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `giohang`
--

CREATE TABLE `giohang` (
  `GioHang_Id` int(10) NOT NULL,
  `KhachHang_Id` int(10) NOT NULL,
  `SPCT_Id` int(11) NOT NULL,
  `SoLuong` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `hangmaytinhcuadanhmuc`
--

CREATE TABLE `hangmaytinhcuadanhmuc` (
  `HMTDM_Id` int(11) NOT NULL,
  `TenHMTDM` varchar(50) NOT NULL,
  `DMSP_Id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hangmaytinhcuadanhmuc`
--

INSERT INTO `hangmaytinhcuadanhmuc` (`HMTDM_Id`, `TenHMTDM`, `DMSP_Id`) VALUES
(1, 'Dell', 1),
(2, 'Asus', 1),
(3, 'Lenovo', 1),
(4, 'Macbook', 1),
(5, 'PC-Dell', 2),
(6, 'PC-Asus', 2),
(7, 'PC-Lenovo', 2),
(8, 'PC-Macbook', 2),
(9, 'Ram', 3),
(10, 'Rom', 3),
(11, 'DeToaNhiet', 3),
(12, 'BoMach', 3);

-- --------------------------------------------------------

--
-- Table structure for table `hinhanhsanphamchitiet`
--

CREATE TABLE `hinhanhsanphamchitiet` (
  `HinhAnh_Id` int(11) NOT NULL,
  `SPCT_Id` int(11) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Type` varchar(255) NOT NULL,
  `Full` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `hinhanhsanphamchitiet`
--

INSERT INTO `hinhanhsanphamchitiet` (`HinhAnh_Id`, `SPCT_Id`, `Name`, `Type`, `Full`) VALUES
(2, 8, 'Dell', 'jpg', 'SPCT8Dell.jpg'),
(3, 9, 'Dell', 'jpg', 'SPCT9Dell.jpg'),
(4, 10, 'AsusLaptop', 'jpg', 'SPCT10AsusLaptop.jpg'),
(5, 11, 'laptop-lenovo', 'jpg', 'SPCT11laptop-lenovo.jpg'),
(6, 12, 'Macbook', 'jpg', 'SPCT12Macbook.jpg'),
(7, 13, 'PC_Asus', 'jpg', 'SPCT13PC_Asus.jpg'),
(8, 14, 'PC-Dell', 'jpg', 'SPCT14PC-Dell.jpg'),
(9, 15, 'Lenovo-pc', 'jpg', 'SPCT15Lenovo-pc.jpg'),
(10, 16, 'AppleMacMini2018', 'jpg', 'SPCT16AppleMacMini2018.jpg'),
(11, 17, '419SRJu4kHL', 'jpg', 'SPCT17419SRJu4kHL.jpg'),
(12, 18, 'Rom', 'jpg', 'SPCT18Rom.jpg'),
(13, 19, 'DeTanNhiet', 'jpg', 'SPCT19DeTanNhiet.jpg'),
(14, 20, 'mainboardrog', 'jpg', 'SPCT20mainboardrog.jpg'),
(15, 21, 'Laptop-asus1', 'jpg', 'SPCT21Laptop-asus1.jpg'),
(16, 22, 'LenovoLaptop-1', 'jpg', 'SPCT22LenovoLaptop-1.jpg'),
(45, 25, 'teminator', 'jpg', 'SPCT25teminator.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `khachhang`
--

CREATE TABLE `khachhang` (
  `KhachHang_Id` int(10) NOT NULL,
  `UserName` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Role` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `khachhang`
--

INSERT INTO `khachhang` (`KhachHang_Id`, `UserName`, `Password`, `Email`, `Role`) VALUES
(2, 'zxczxvq112', '$2y$10$zbDyOtNcIecRlcgCJJ2GcegVKcJeM1MynhW9B46l1A1ONoFT50ktS', 'bqhuy.19it4@vku.udn.vn', 0),
(3, 'Admin99', '$2y$10$WjZvBkVvmkT2CCp5Tw1dOuNfE9yI/GoMYza6ilyVbL3rvyZ8ghZFC', 'bqhuy.19it4@vku.udn.vn', 1),
(4, 'zxczxaas2446', '$2y$10$9Du7lLU6cpNFnJdTCL0VJu/JYpOTis0/Do/yh82fggvj67tdTSG0a', 'bqhuy.19it4@vku.udn.vn', 0);

-- --------------------------------------------------------

--
-- Table structure for table `noidungsanphamchitiet`
--

CREATE TABLE `noidungsanphamchitiet` (
  `NoiDungSPCT_Id` int(11) NOT NULL,
  `SPCT_Id` int(11) NOT NULL,
  `Hang` varchar(20) NOT NULL,
  `HeDieuHanh` varchar(20) NOT NULL,
  `Chip` varchar(20) NOT NULL,
  `ManHinh` varchar(20) NOT NULL,
  `Ram` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `noidungsanphamchitiet`
--

INSERT INTO `noidungsanphamchitiet` (`NoiDungSPCT_Id`, `SPCT_Id`, `Hang`, `HeDieuHanh`, `Chip`, `ManHinh`, `Ram`) VALUES
(3, 11, 'Lenovo', 'Linux', 'AMD 764', '144hz', '32gb');

-- --------------------------------------------------------

--
-- Table structure for table `profileimg`
--

CREATE TABLE `profileimg` (
  `Img_Id` int(10) NOT NULL,
  `KhachHang_Id` int(10) NOT NULL,
  `NameImg` varchar(200) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 0,
  `Type` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `profileimg`
--

INSERT INTO `profileimg` (`Img_Id`, `KhachHang_Id`, `NameImg`, `Status`, `Type`) VALUES
(1, 2, 'DefaultImg', 0, 'jpg'),
(2, 3, 'DefaultImg', 0, 'jpg'),
(3, 4, 'DefaultImg', 0, 'jpg');

-- --------------------------------------------------------

--
-- Table structure for table `quangcao`
--

CREATE TABLE `quangcao` (
  `QuangCao_ID` int(10) NOT NULL,
  `TenQuangCao` varchar(255) NOT NULL,
  `Type` varchar(10) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 0,
  `NgayBatDau` datetime NOT NULL,
  `NgayKetThuc` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sanphamchitietcuahang`
--

CREATE TABLE `sanphamchitietcuahang` (
  `SPCT_Id` int(11) NOT NULL,
  `TenSPCT` varchar(300) NOT NULL,
  `HMTDM_Id` int(11) NOT NULL,
  `DonGia` float NOT NULL,
  `SoLuong` int(11) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `sanphamchitietcuahang`
--

INSERT INTO `sanphamchitietcuahang` (`SPCT_Id`, `TenSPCT`, `HMTDM_Id`, `DonGia`, `SoLuong`, `Status`) VALUES
(8, 'asdqweqw', 1, 12, 123213, 1),
(9, 'aazzxvbbfs', 1, 1232150, 12, 1),
(10, 'Asus Vjp pro', 2, 123, 123123, 1),
(11, 'Lenovo vjp pro', 3, 1200000, 12, 1),
(12, 'Macbook vjp', 4, 1300000, 12, 1),
(13, 'ASUS Republic of Gamers GA35 Gaming Desktop Computer', 6, 1500000, 5, 1),
(14, 'PC Dell OptiPlex 5070 SFF i5-9500/4GB/1TB/DVDRW/K+M', 5, 20000000, 3, 1),
(15, 'Lenovo Legion Y920 Gaming Desktop', 7, 10000000, 3, 1),
(16, 'Apple Mac Mini Alternatives: Best Windows based mini desktop PC Options', 8, 12000000, 3, 1),
(17, 'Crucial 4 GB (1 x 4 GB) CT51264BD160BJ.8FED RAM Memory Module', 9, 5000000, 3, 1),
(18, 'Read Only Memory', 10, 2000000, 2, 1),
(19, 'De toa nhiet', 11, 200000, 2, 1),
(20, 'Main board ROG', 12, 2000000, 2, 1),
(21, 'Laptop Asus 14 inch X409FA-EK100T Xám', 2, 15000000, 3, 1),
(22, 'Laptop Lenovo IDP 330-15IKBR(81DE01JPVN) VGA 4GB Win10', 3, 15000000, 3, 1),
(25, 'Teminator', 1, 5000000, 4, 1);

-- --------------------------------------------------------

--
-- Table structure for table `thanhtoan`
--

CREATE TABLE `thanhtoan` (
  `ThanhToan_Id` int(10) NOT NULL,
  `KieuThanhToan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tinnhan`
--

CREATE TABLE `tinnhan` (
  `TinNhan_Id` int(10) NOT NULL,
  `KhachHang_Id` int(10) NOT NULL,
  `NoiDung` varchar(500) NOT NULL,
  `Status` tinyint(4) NOT NULL DEFAULT 0,
  `NgayNhanTin` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apdungkhuyenmai`
--
ALTER TABLE `apdungkhuyenmai`
  ADD PRIMARY KEY (`ApDung_Id`),
  ADD KEY `KhuyenMai_Id` (`KhuyenMai_Id`),
  ADD KEY `SPCT_Id` (`SPCT_Id`);

--
-- Indexes for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD PRIMARY KEY (`BinhLuan_Id`),
  ADD KEY `KhachHang_Id_FK` (`KhachHang_Id`),
  ADD KEY `SPCT_Id` (`SPCT_Id`);

--
-- Indexes for table `chuongtrinhkhuyenmai`
--
ALTER TABLE `chuongtrinhkhuyenmai`
  ADD PRIMARY KEY (`KhuyenMai_Id`);

--
-- Indexes for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD PRIMARY KEY (`DanhGia_Id`),
  ADD KEY `KhachHang_Id` (`KhachHang_Id`),
  ADD KEY `SPCT_Id` (`SPCT_Id`);

--
-- Indexes for table `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  ADD PRIMARY KEY (`DMSP_Id`);

--
-- Indexes for table `diachigiaohang`
--
ALTER TABLE `diachigiaohang`
  ADD PRIMARY KEY (`DiaChi_Id`),
  ADD KEY `KhachHang_Id` (`KhachHang_Id`),
  ADD KEY `ThanhToan_Id` (`ThanhToan_Id`),
  ADD KEY `GioHang_Id` (`GioHang_Id`);

--
-- Indexes for table `giohang`
--
ALTER TABLE `giohang`
  ADD PRIMARY KEY (`GioHang_Id`),
  ADD KEY `KhachHang_Id` (`KhachHang_Id`),
  ADD KEY `SPCT_Id` (`SPCT_Id`);

--
-- Indexes for table `hangmaytinhcuadanhmuc`
--
ALTER TABLE `hangmaytinhcuadanhmuc`
  ADD PRIMARY KEY (`HMTDM_Id`),
  ADD KEY `DMSP_Id` (`DMSP_Id`);

--
-- Indexes for table `hinhanhsanphamchitiet`
--
ALTER TABLE `hinhanhsanphamchitiet`
  ADD PRIMARY KEY (`HinhAnh_Id`),
  ADD KEY `SPCT_Id` (`SPCT_Id`);

--
-- Indexes for table `khachhang`
--
ALTER TABLE `khachhang`
  ADD PRIMARY KEY (`KhachHang_Id`),
  ADD UNIQUE KEY `UserName` (`UserName`);

--
-- Indexes for table `noidungsanphamchitiet`
--
ALTER TABLE `noidungsanphamchitiet`
  ADD PRIMARY KEY (`NoiDungSPCT_Id`),
  ADD KEY `SPCT_Id` (`SPCT_Id`);

--
-- Indexes for table `profileimg`
--
ALTER TABLE `profileimg`
  ADD PRIMARY KEY (`Img_Id`),
  ADD KEY `KhachHang_Id` (`KhachHang_Id`);

--
-- Indexes for table `quangcao`
--
ALTER TABLE `quangcao`
  ADD PRIMARY KEY (`QuangCao_ID`);

--
-- Indexes for table `sanphamchitietcuahang`
--
ALTER TABLE `sanphamchitietcuahang`
  ADD PRIMARY KEY (`SPCT_Id`),
  ADD KEY `HMTDM_Id` (`HMTDM_Id`);

--
-- Indexes for table `thanhtoan`
--
ALTER TABLE `thanhtoan`
  ADD PRIMARY KEY (`ThanhToan_Id`);

--
-- Indexes for table `tinnhan`
--
ALTER TABLE `tinnhan`
  ADD PRIMARY KEY (`TinNhan_Id`),
  ADD KEY `KhachHang_Id` (`KhachHang_Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apdungkhuyenmai`
--
ALTER TABLE `apdungkhuyenmai`
  MODIFY `ApDung_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `binhluan`
--
ALTER TABLE `binhluan`
  MODIFY `BinhLuan_Id` int(255) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `chuongtrinhkhuyenmai`
--
ALTER TABLE `chuongtrinhkhuyenmai`
  MODIFY `KhuyenMai_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `danhgia`
--
ALTER TABLE `danhgia`
  MODIFY `DanhGia_Id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `danhmucsanpham`
--
ALTER TABLE `danhmucsanpham`
  MODIFY `DMSP_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `diachigiaohang`
--
ALTER TABLE `diachigiaohang`
  MODIFY `DiaChi_Id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `giohang`
--
ALTER TABLE `giohang`
  MODIFY `GioHang_Id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hangmaytinhcuadanhmuc`
--
ALTER TABLE `hangmaytinhcuadanhmuc`
  MODIFY `HMTDM_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `hinhanhsanphamchitiet`
--
ALTER TABLE `hinhanhsanphamchitiet`
  MODIFY `HinhAnh_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `khachhang`
--
ALTER TABLE `khachhang`
  MODIFY `KhachHang_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `noidungsanphamchitiet`
--
ALTER TABLE `noidungsanphamchitiet`
  MODIFY `NoiDungSPCT_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `profileimg`
--
ALTER TABLE `profileimg`
  MODIFY `Img_Id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `quangcao`
--
ALTER TABLE `quangcao`
  MODIFY `QuangCao_ID` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sanphamchitietcuahang`
--
ALTER TABLE `sanphamchitietcuahang`
  MODIFY `SPCT_Id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `thanhtoan`
--
ALTER TABLE `thanhtoan`
  MODIFY `ThanhToan_Id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tinnhan`
--
ALTER TABLE `tinnhan`
  MODIFY `TinNhan_Id` int(10) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `apdungkhuyenmai`
--
ALTER TABLE `apdungkhuyenmai`
  ADD CONSTRAINT `apdungkhuyenmai_ibfk_1` FOREIGN KEY (`KhuyenMai_Id`) REFERENCES `chuongtrinhkhuyenmai` (`KhuyenMai_Id`),
  ADD CONSTRAINT `apdungkhuyenmai_ibfk_2` FOREIGN KEY (`SPCT_Id`) REFERENCES `sanphamchitietcuahang` (`SPCT_Id`);

--
-- Constraints for table `binhluan`
--
ALTER TABLE `binhluan`
  ADD CONSTRAINT `KhachHang_Id_FK` FOREIGN KEY (`KhachHang_Id`) REFERENCES `khachhang` (`KhachHang_Id`),
  ADD CONSTRAINT `binhluan_ibfk_1` FOREIGN KEY (`SPCT_Id`) REFERENCES `sanphamchitietcuahang` (`SPCT_Id`);

--
-- Constraints for table `danhgia`
--
ALTER TABLE `danhgia`
  ADD CONSTRAINT `danhgia_ibfk_1` FOREIGN KEY (`KhachHang_Id`) REFERENCES `khachhang` (`KhachHang_Id`),
  ADD CONSTRAINT `danhgia_ibfk_2` FOREIGN KEY (`SPCT_Id`) REFERENCES `sanphamchitietcuahang` (`SPCT_Id`);

--
-- Constraints for table `diachigiaohang`
--
ALTER TABLE `diachigiaohang`
  ADD CONSTRAINT `diachigiaohang_ibfk_1` FOREIGN KEY (`KhachHang_Id`) REFERENCES `khachhang` (`KhachHang_Id`),
  ADD CONSTRAINT `diachigiaohang_ibfk_2` FOREIGN KEY (`ThanhToan_Id`) REFERENCES `thanhtoan` (`ThanhToan_Id`),
  ADD CONSTRAINT `diachigiaohang_ibfk_3` FOREIGN KEY (`GioHang_Id`) REFERENCES `giohang` (`GioHang_Id`);

--
-- Constraints for table `giohang`
--
ALTER TABLE `giohang`
  ADD CONSTRAINT `giohang_ibfk_1` FOREIGN KEY (`KhachHang_Id`) REFERENCES `khachhang` (`KhachHang_Id`),
  ADD CONSTRAINT `giohang_ibfk_2` FOREIGN KEY (`SPCT_Id`) REFERENCES `sanphamchitietcuahang` (`SPCT_Id`);

--
-- Constraints for table `hangmaytinhcuadanhmuc`
--
ALTER TABLE `hangmaytinhcuadanhmuc`
  ADD CONSTRAINT `hangmaytinhcuadanhmuc_ibfk_1` FOREIGN KEY (`DMSP_Id`) REFERENCES `danhmucsanpham` (`DMSP_Id`);

--
-- Constraints for table `hinhanhsanphamchitiet`
--
ALTER TABLE `hinhanhsanphamchitiet`
  ADD CONSTRAINT `hinhanhsanphamchitiet_ibfk_1` FOREIGN KEY (`SPCT_Id`) REFERENCES `sanphamchitietcuahang` (`SPCT_Id`);

--
-- Constraints for table `noidungsanphamchitiet`
--
ALTER TABLE `noidungsanphamchitiet`
  ADD CONSTRAINT `noidungsanphamchitiet_ibfk_1` FOREIGN KEY (`SPCT_Id`) REFERENCES `sanphamchitietcuahang` (`SPCT_Id`);

--
-- Constraints for table `profileimg`
--
ALTER TABLE `profileimg`
  ADD CONSTRAINT `profileimg_ibfk_1` FOREIGN KEY (`KhachHang_Id`) REFERENCES `khachhang` (`KhachHang_Id`);

--
-- Constraints for table `sanphamchitietcuahang`
--
ALTER TABLE `sanphamchitietcuahang`
  ADD CONSTRAINT `sanphamchitietcuahang_ibfk_1` FOREIGN KEY (`HMTDM_Id`) REFERENCES `hangmaytinhcuadanhmuc` (`HMTDM_Id`);

--
-- Constraints for table `tinnhan`
--
ALTER TABLE `tinnhan`
  ADD CONSTRAINT `tinnhan_ibfk_1` FOREIGN KEY (`KhachHang_Id`) REFERENCES `khachhang` (`KhachHang_Id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
