-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2020 at 04:19 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `comstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `bill`
--

CREATE TABLE `bill` (
  `bill_id` varchar(10) NOT NULL,
  `sale_id` varchar(10) NOT NULL,
  `cus_id` varchar(10) NOT NULL,
  `emp_id` varchar(5) NOT NULL,
  `bill_price` int(11) NOT NULL,
  `bill_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `com_id` int(11) NOT NULL,
  `com_name` varchar(266) NOT NULL,
  `com_tel` varchar(10) NOT NULL,
  `com_lo` varchar(266) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`com_id`, `com_name`, `com_tel`, `com_lo`) VALUES
(1, 'J.I.B. Computer Group Company Limited', '020174444', 'เลขที่ 21 ถนน พหลโยธิน แขวงสนามบิน เขตดอนเมือง กรุงเทพมหานคร 10210'),
(2, 'บริษัท คอมเซเว่น อินเตอร์เนชันแนล จำกัด', '027145777', '2545 ถนนเพชรบุรีตัดใหม่ แขวงสวนหลวง เขตสวนหลวง กรุงเทพมหานคร 10250'),
(3, 'บริษัท แอดไวซ์ ไอที อินฟินิท จำกัด (สำนักงานใหญ่)', '025470000', 'เลขที่ 74/1 หมู่ 1 ถ.ราชพฤกษ์ ต.ท่าอิฐ อ.ปากเกร็ด จ.นนทบุรี 11120');

-- --------------------------------------------------------

--
-- Table structure for table `count_salepro`
--

CREATE TABLE `count_salepro` (
  `count_id` int(11) NOT NULL,
  `bill_id` varchar(10) NOT NULL,
  `pro_id` varchar(10) NOT NULL,
  `pro_name` varchar(266) NOT NULL,
  `pro_type` varchar(50) NOT NULL,
  `pro_qty` int(11) NOT NULL,
  `pro_price` int(11) NOT NULL,
  `count_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `cus_id` varchar(10) NOT NULL,
  `cus_name` varchar(50) NOT NULL,
  `cus_tel` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

CREATE TABLE `employee` (
  `emp_id` varchar(5) NOT NULL,
  `emp_pass` varchar(10) NOT NULL DEFAULT '123456',
  `emp_name` varchar(266) NOT NULL,
  `emp_last` varchar(50) NOT NULL,
  `emp_tel` varchar(10) NOT NULL,
  `emp_add` varchar(266) NOT NULL,
  `emp_login` timestamp NOT NULL DEFAULT current_timestamp(),
  `emp_logout` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`emp_id`, `emp_pass`, `emp_name`, `emp_last`, `emp_tel`, `emp_add`, `emp_login`, `emp_logout`) VALUES
('emp01', '123456', 'Praphan', 'Katukan', '0624898459', 'Lamlukka Pathumthani', '2020-02-20 14:49:16', '2020-02-20 14:51:05'),
('emp02', '123456', 'Yutthakan', 'Chuenklin', '0694582145', 'Donmuang Bangkok', '2020-01-26 15:35:47', '2020-01-18 07:00:52');

-- --------------------------------------------------------

--
-- Table structure for table `order_pro`
--

CREATE TABLE `order_pro` (
  `order_number` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `emp_id` varchar(5) NOT NULL,
  `pro_id` varchar(10) NOT NULL,
  `order_amount` int(11) NOT NULL,
  `order_sent` int(11) DEFAULT 0,
  `order_price` int(11) NOT NULL,
  `order_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `pro_id` varchar(10) NOT NULL,
  `pro_type` varchar(50) NOT NULL,
  `pro_name` varchar(100) NOT NULL,
  `pro_desc` varchar(266) NOT NULL,
  `pro_price` int(11) NOT NULL,
  `pro_amount` int(11) NOT NULL DEFAULT 1,
  `pro_sale` int(11) NOT NULL DEFAULT 0,
  `pro_img` varchar(266) NOT NULL,
  `addpro_date` date NOT NULL DEFAULT '2020-01-20',
  `salepro_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`pro_id`, `pro_type`, `pro_name`, `pro_desc`, `pro_price`, `pro_amount`, `pro_sale`, `pro_img`, `addpro_date`, `salepro_date`) VALUES
('board001', 'MAINBOARD', 'ASROCK A320M-HDV', 'Brand:ASRORK Socket:AM4 Ramslot:2\r\n', 1370, 7, 4, 'img/board1.jpg', '2020-01-20', '2020-02-20'),
('board002', 'MAINBOARD', 'MSI B360M PRO-VD', 'Brand:MSI Socket:LGA1151-v2 Ramslot:2', 1855, 9, 1, 'img/board2.jpg', '2020-01-20', '2020-01-26'),
('board003', 'MAINBOARD', 'ASROCK B450M Steel Legend', 'Brand:ASROCK Socket:AM4 Ramslot:4', 2650, 7, 3, 'img/board3.jpg', '2020-01-20', '2020-02-20'),
('case001', 'CASE', 'ATX Case (NP) AeroCool Aero-800 (Black)', 'Brand:AeroCool / Mainboard Support ATX / Micro ATX / Mini ITX ', 1790, 4, 0, 'img/case001.jpg', '2020-01-20', NULL),
('case002', 'CASE', 'ATX Case (NP) AeroCool Cyclon Pro G RGB (Black)', 'Brand:AeroCool / Mainboard Support ATX / Micro ATX / Mini ITX', 1790, 9, 3, 'img/case002.jpg', '2020-01-20', '2020-01-26'),
('case003', 'CASE', 'ATX Case AeroCool Rift RGB (Black)', 'Brand:AeroCool / Mainboard Support ATX / Micro ATX / Mini ITX', 1270, 3, 1, 'img/case003.jpg', '2020-01-20', '2020-02-20'),
('case004', 'CASE', 'ATX Case AeroCool Split TG RGB (Black)', 'Brand:AeroCool / Mainboard Support ATX / Micro ATX / Mini ITX', 990, 3, 0, 'img/case004.jpg', '2020-01-20', NULL),
('case005', 'CASE', 'ATX CASE CORSAIR GRAPHITE 760T', 'Brand:Corsair / Mainboard Support AATX , E-ATX , Micro-ATX , Mini-ITX , XL-ATX', 6950, 4, 0, 'img/case005.jpg', '2020-01-20', NULL),
('cool1', 'COOLER', 'COOLER MASTER Hyper 212 LED', 'Brand : COOLER MASTER\r\nDimension : 120(L) x 84(W) x 160(H) mm\r\nFan Dimension : 120(L) x 120(W) x 25(H) mm', 1070, 3, 0, 'img/cool1.jpg', '2020-01-20', NULL),
('cool2', 'COOLER', 'COOLERMASTER Master Air MA620P TUF Gaming Edition', 'Brand : COOLER MASTER\r\nHeat Sink Dimension : 116 x 106.0 x 164.5 mm \r\nFan Dimension : 120 x 120 x 25 mm', 2250, 13, 2, 'img/174143491020200118_075148.jpg', '2020-01-20', '2020-01-25'),
('cool3', 'COOLER', 'COOLERMASTER Master Air MA410M ARGB', 'Brand : COOLER MASTER\r\nFan Dimension : 120 x 120 x 25 mm ', 1890, 3, 2, 'img/178399037020200118_075227.jpg', '2020-01-20', '2020-01-26'),
('cool4', 'COOLER', 'COOLERMASTER MasterLiquid ML240R Phantom RGB', 'Brand : COOLERMASTER\r\nFAN DIMENSIONS : 120 x 120 x 25 mm\r\nPUMP DIMENSIONS : 83.6 x 71.8 x 52.7 mm', 3850, 5, 0, 'img/92363715120200118_075311.jpg', '2020-01-20', NULL),
('cool5', 'COOLER', 'ID-COOLING Dashflow 360 RGB', 'Brand : IDCooling\r\nFan Dimension : 120 Ã— 120 Ã— 25mm\r\nRadiator Dimension : 396 Ã— 120 Ã— 27mm', 4990, 4, 1, 'img/190901145120200118_075428.jpg', '2020-01-20', '2020-01-26'),
('cpu001', 'CPU', 'AMD Ryzen 5 2600', 'Brand:AMD Socket:AM4 Core/Thread:6/12 Frequency:3.40GHz', 4100, 7, 3, 'img/cpu1.jpg', '2020-01-20', '2020-01-23'),
('cpu002', 'CPU', 'AMD Ryzen 7 3700X', 'Brand:AMD Socket:AM4 Core/Thread:8/16 Frequency:3.60GHz', 10950, 8, 2, 'img/cpu4.jpg', '2020-01-20', '2020-01-23'),
('cpu003', 'CPU', 'AMD Ryzen 5 3600', 'Brand:AMD Socket:AM4 Core/Thread:6/12 Frequency:3.60GHz', 6725, 1, 0, 'img/cpu3.jpg', '2020-01-20', NULL),
('cpu004', 'CPU', 'AMD Ryzen 5 3600X', 'Brand:AMD Socket:AM4 Core/Thread:6/12 Frequency:3.80GHz', 7895, 1, 0, 'img/cpu5.jpg', '2020-01-20', NULL),
('cpu005', 'CPU', 'AMD Ryzen 7 3800X', 'Brand:AMD Socket:AM4 Core/Thread:8/16 Frequency:3.90GHz', 13500, 1, 0, 'img/cpu7.jpg', '2020-01-20', NULL),
('cpu006', 'CPU', 'INTEL Core i3-9100F', 'Brand:INTEL Socket:LGA1151-v2 Core/Thread:4/4 Frequency:3.60GHz', 2450, 1, 0, 'img/cpu6.jpg', '2020-01-20', NULL),
('cpu007', 'CPU', 'INTEL Core i5-9400F', 'Brand:INTEL Socket:LGA1151-v2 Core/Thread:6/6 Frequency:2.90GHz', 4350, 1, 0, 'img/cpu8.jpg', '2020-01-20', NULL),
('cpu008', 'CPU', 'INTEL Core i7-9700F', 'Brand:INTEL Socket:LGA1151-v2 Core/Thread:8/8 Frequency:3.00GHz', 10440, 1, 0, '	\r\nimg/cpu9.jpg', '2020-01-20', NULL),
('cpu009', 'CPU', 'INTEL Core i9-9900K', 'Brand:INTEL Socket:LGA1151-v2 Core/Thread:8/16 Frequency:3.60GHz', 19300, 9, 1, 'img/cpu10.jpg', '2020-01-20', '2020-01-26'),
('hdd1', 'HDD', 'WESTERN DIGITAL Blue 1TB WD10EZEX', 'Brand:Western Digital\r\nModel:Blue 1TB WD10EZEX', 940, 1, 0, 'img/hdd1.jpg', '2020-01-20', NULL),
('hdd2', 'HDD', 'SEAGATE BARRACUDA 1TB', 'Brand:SEAGATE\r\nModel:BARRACUDA 1TB', 1030, 8, 2, 'img/hdd2.jpg', '2020-01-20', '2020-01-26'),
('hdd3', 'HDD', 'WESTERN DIGITAL Blue 2TB WD10EZEX', 'Brand:Western Digital\r\nModel:Blue 2TB WD10EZEX', 1575, 1, 0, 'img/hdd3.jpg', '2020-01-20', NULL),
('monitor001', 'MORNITOR', 'BENQ EW277HDR (VA, HDMI)', 'Brand : BENQ \r\nScreen Size : 27\"\r\nMaximum Resolution : 1920 x 1080 \r\nRefresh Rate : 60Hz', 6200, 2, 3, 'img/monitor1.jpg', '2020-01-20', '2020-01-23'),
('monitor002', 'MORNITOR', 'ACER ED322QAwmidx (VA, DVI, HDMI) CURVE 75Hz', 'Brand : ACER\r\nScreen Size : 31.5\"\r\nMaximum Resolution : 1920 x 1080 \r\nRefresh Rate : 75Hz', 6490, 4, 1, 'img/monitor2.jpg', '2020-01-20', '2020-01-26'),
('monitor003', 'MORNITOR', 'MSI Optix G241VC (VA, VGA, HDMI) 75Hz CURVE FreeSync', 'Brand : MSI\r\nScreen Size : 23.6\"\r\nMaximum Resolution : 1920 x 1080 \r\nRefresh Rate : 75Hz', 3940, 1, 4, 'img/monitor3.jpg', '2020-01-20', '2020-01-26'),
('monitor004', 'MORNITOR', 'DELL S2319H (IPS, HDMI)', 'Brand : DELL\r\nScreen Size : 23\"\r\nMaximum Resolution : 1920 x 1080 \r\nRefresh Rate : 60Hz', 5300, 4, 1, 'img/22036506320200118_073454.jpg', '2020-01-20', '2020-01-25'),
('psu1', 'POWERSUPPLY', 'CORSAIR VS450', 'Brand:CORSAIR\r\nModel:VS450\r\nSeries:VS Series\r\n', 1290, 9, 1, 'img/psu1.jpg', '2020-01-20', '2020-01-26'),
('psu2', 'POWERSUPPLY', 'RAIDMAX RX-600AF', 'Brand:RAIDMAX\r\nModel:RX-600AF\r\nSeries:RX-AF', 1635, 1, 0, 'img/psu2.jpg', '2020-01-20', NULL),
('psu3', 'POWERSUPPLY', 'THERMALTAKE Smart RGB 500W 80 Plus', 'Brand:THERMALTAKE\r\nModel:Smart RGB 500W 80 Plus\r\nSeries:Smart RGB', 1890, 1, 0, 'img/psu3.jpg', '2020-01-20', NULL),
('ram001', 'RAM', 'TEAMGROUP T-Force Dark Z DDR4 16GB (8GBx2) 3200 Red', 'Brand:TEAMGROUP\r\nModel:T-Force Dark Z DDR4 16GB (8GBx2) 3200 Red', 1900, 10, 0, 'img/ram1.jpg', '2020-01-20', NULL),
('ram002', 'RAM', 'KINGSTON Hyper-X Fury DDR4 16GB (8GBx2) 2666 Black', 'Brand:KINGSTON\r\nModel:Hyper-X Fury DDR4 16GB (8GBx2) 2666 Black', 2295, 1, 0, 'img/ram2.jpg', '2020-01-20', NULL),
('ram003', 'RAM', 'KINGSTON HyperX FURY RGB DDR4 16GB (8GBx2) 3200', 'Brand:KINGSTON\r\nModel:HyperX FURY RGB DDR4 16GB (8GBx2) 3200', 2870, 1, 0, 'img/ram3.jpg', '2020-01-20', NULL),
('ram004', 'RAM', 'TEAMGROUP DELTA TUF Gaming Alliance RGB DDR4 16GB (8GBx2) 3200', 'Brand:TEAMGROUP\r\nModel:DELTA TUF Gaming Alliance RGB DDR4 16GB (8GBx2) 3200', 2800, 4, 6, 'img/ram4.jpg', '2020-01-20', '2020-02-20'),
('ram005', 'RAM', 'KINGSTON Hyper-X Predator RGB DDR4 16GB (8GBx2) 3200', 'Brand:KINGSTON\r\nModel:Hyper-X Predator RGB DDR4 16GB (8GBx2) 3200', 3290, 1, 0, 'img/ram5.jpg', '2020-01-20', NULL),
('ssd1', 'SSD', 'SAMSUNG 970 EVO 250GB M.2 NVMe', 'Brand:SAMSUNG\r\nMode:l970 EVO 250GB M.2 NVMe', 2390, 1, 0, 'img/ssd1.jpg\r\n', '2020-01-20', NULL),
('ssd2', 'SSD', 'SAMSUNG 970 EVO Plus 250GB NVMe', 'Brand:SAMSUNG\r\nModel:970 EVO Plus 250GB NVMe', 2250, 9, 1, 'img/ssd2.jpg', '2020-01-20', '2020-01-26'),
('ssd3', 'SSD', 'WESTERN DIGITAL Black SN750 250GB NVMe', 'Brand:Western Digital\r\nModel:Black SN750 250GB NVMe', 2310, 1, 0, 'img/ssd3.jpg', '2020-01-20', NULL),
('vga001', 'VGA', 'ASUS EX-RX570-O4G', 'Brand:ASUS Chipset:AMD Boostclock:1256MHz Memory:4GB ', 3790, 10, 0, 'img/vga1.jpg', '2020-01-20', NULL),
('vga002', 'VGA', 'MSI GTX 1650 AERO ITX OC', 'Brand:MSI Chipset:NVIDIA Boostclock:1740MHz Memory:4GB ', 3715, 1, 0, 'img/vga2.jpg', '2020-01-20', NULL),
('vga003', 'VGA', 'ZOTAC GTX 1660 Ti Twin Fan', 'Brand:ZOTAC ', 6990, 9, 1, 'img/vga3.jpg', '2020-01-20', '2020-01-26'),
('vga004', 'VGA', 'GIGABYTE RTX 2060 OC', 'Brand:GIGABYTE', 9575, 1, 0, 'img/vga4.jpg', '2020-01-20', NULL),
('vga005', 'VGA', 'MSI GTX 1650 GAMING X', 'Brand:MSI', 4120, 1, 0, 'img/vga5.jpg', '2020-01-20', NULL),
('vga006', 'VGA', 'GIGABYTE AORUS 2060 SUPER', 'Brand:GIGABYTE', 14190, 1, 0, 'img/vga6.jpg', '2020-01-20', NULL),
('vga007', 'VGA', 'GIGABYTE RX 5500 XT OC', 'Brand:GIGABYTE', 6990, 1, 0, 'img/vga7.jpg', '2020-01-20', NULL),
('vga008', 'VGA', 'ASUS ROG MATRIX RTX 2080 Ti Platinum', 'Brand:ASUS', 59500, 1, 0, 'img/vga8.jpg', '2020-01-20', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `receipt`
--

CREATE TABLE `receipt` (
  `re_number` int(11) NOT NULL,
  `re_id` int(11) NOT NULL,
  `sent_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `emp_id` varchar(5) NOT NULL,
  `pro_id` varchar(10) NOT NULL,
  `re_price` int(11) NOT NULL,
  `re_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `return_pro`
--

CREATE TABLE `return_pro` (
  `return_number` int(11) NOT NULL,
  `return_id` int(11) NOT NULL,
  `sale_id` int(11) NOT NULL,
  `cus_id` int(11) NOT NULL,
  `emp_id` varchar(5) NOT NULL,
  `pro_id` varchar(10) NOT NULL,
  `return_amount` int(11) NOT NULL,
  `return_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sale`
--

CREATE TABLE `sale` (
  `sale_id` varchar(10) NOT NULL,
  `cus_id` varchar(10) NOT NULL,
  `emp_id` varchar(5) NOT NULL,
  `sale_pro` varchar(8000) NOT NULL,
  `sale_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `sent_pro`
--

CREATE TABLE `sent_pro` (
  `sent_number` int(11) NOT NULL,
  `sent_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `com_id` int(11) NOT NULL,
  `emp_id` varchar(5) NOT NULL,
  `pro_id` varchar(10) NOT NULL,
  `sent_amount` int(11) NOT NULL,
  `sent_date` date NOT NULL,
  `pay_status` varchar(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bill`
--
ALTER TABLE `bill`
  ADD PRIMARY KEY (`bill_id`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`com_id`);

--
-- Indexes for table `count_salepro`
--
ALTER TABLE `count_salepro`
  ADD PRIMARY KEY (`count_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`cus_id`);

--
-- Indexes for table `employee`
--
ALTER TABLE `employee`
  ADD PRIMARY KEY (`emp_id`);

--
-- Indexes for table `order_pro`
--
ALTER TABLE `order_pro`
  ADD PRIMARY KEY (`order_number`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`pro_id`);

--
-- Indexes for table `receipt`
--
ALTER TABLE `receipt`
  ADD PRIMARY KEY (`re_number`);

--
-- Indexes for table `return_pro`
--
ALTER TABLE `return_pro`
  ADD PRIMARY KEY (`return_number`);

--
-- Indexes for table `sale`
--
ALTER TABLE `sale`
  ADD PRIMARY KEY (`sale_id`);

--
-- Indexes for table `sent_pro`
--
ALTER TABLE `sent_pro`
  ADD PRIMARY KEY (`sent_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `com_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `count_salepro`
--
ALTER TABLE `count_salepro`
  MODIFY `count_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `order_pro`
--
ALTER TABLE `order_pro`
  MODIFY `order_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `receipt`
--
ALTER TABLE `receipt`
  MODIFY `re_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `return_pro`
--
ALTER TABLE `return_pro`
  MODIFY `return_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `sent_pro`
--
ALTER TABLE `sent_pro`
  MODIFY `sent_number` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
