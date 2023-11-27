-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 04, 2021 at 04:14 PM
-- Server version: 10.4.13-MariaDB
-- PHP Version: 7.2.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rsm`
--

-- --------------------------------------------------------

--
-- Table structure for table `basicstaff`
--

CREATE TABLE `basicstaff` (
  `id` int(11) NOT NULL,
  `Bname` varchar(255) DEFAULT NULL,
  `shifthrs_start` varchar(10) DEFAULT NULL,
  `shifthrs_end` varchar(10) DEFAULT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `basicstaff`
--

INSERT INTO `basicstaff` (`id`, `Bname`, `shifthrs_start`, `shifthrs_end`, `salary`) VALUES
(10, 'k', '12:00', '17:00', 45),
(11, 'o', '12:00', '17:00', 45),
(12, 'ordertaker', '13:00', '21:00', 20000),
(13, 'cook', '09:00', '21:00', 90000),
(14, 'chef', '12:00', '20:00', 20000);

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(11) NOT NULL,
  `Cname` varchar(255) DEFAULT NULL,
  `Scard_num` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `Cname`, `Scard_num`) VALUES
(10, 'ali', 141),
(11, 'haris', 195),
(12, 'iamharis24', 281),
(13, 'huzaifanaseer', 363),
(14, 'nayauser', 416);

-- --------------------------------------------------------

--
-- Table structure for table `dishes`
--

CREATE TABLE `dishes` (
  `Dish_id` varchar(6) NOT NULL,
  `category` varchar(30) NOT NULL,
  `D_name` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dishes`
--

INSERT INTO `dishes` (`Dish_id`, `category`, `D_name`, `price`) VALUES
('ADD00', 'Add Ons', 'Vegetables(Dry)', 50),
('ADD01', 'Add Ons', 'Vegetables(Pickled)', 90),
('ADD02', 'Add Ons', 'Cheese', 120),
('ADD03', 'Add Ons', 'Extra Patty(120gms)', 160),
('AFC00', 'Fried Chicken', 'Arabic AL Baik Fried Chicken (1pc)', 180),
('AFC01', 'Fried Chicken', 'Arabic AL Baik Fried Chicken (10pc)', 1700),
('Bgr00', 'Burgers', 'Chicken Fillet', 500),
('Bgr01', 'Burgers', 'Chicken Jalapeno', 550),
('Bgr02', 'Burgers', 'Beef Fillet', 630),
('Bgr03', 'Burgers', 'Beef Angus Thickburger', 700),
('Bgr04', 'Burgers', 'Super Star', 750),
('Bgr05', 'Burgers', 'Famous Star', 650),
('Bgr69', 'Burgers', 'Manager fav', 1000),
('Fr00', 'Fries', 'Plain Fries', 120),
('Fr01', 'Fries', 'Garlic Mayo Fries', 170),
('Fr02', 'Fries', 'Smoked Friea', 230),
('Fr03', 'Fries', 'Loaded Fries With Cheese', 250),
('Fr05', 'Fries', 'Hunger Smash Special Fries', 350),
('KFC00', 'Fried Chicken', 'Korean Fried Chicken (1pc)', 120),
('KFC01', 'Fried Chicken', 'Korean Fried Chicken (10pc)', 1100),
('PFC00', 'Fried Chicken', 'Pakistani Fried Chicken (1pc)', 100),
('PFC01', 'Fried Chicken', 'Pakistani Fried Chicken (10pc)', 950),
('SW00', 'Sandwiches', 'Fried Vegetable Sandwich', 300),
('SW01', 'Sandwiches', 'Chicken Sandwiches', 380),
('SW02', 'Sandwiches', 'Club Sandwich', 400),
('SW03', 'Sandwiches', 'Falafel Sandwich', 450),
('SW04', 'Sandwiches', 'Hunger Smash Special Sandwich', 490),
('test01', 'test', 'test', 0),
('Wrp00', 'Wraps', 'Pita Wrap', 450),
('Wrp01', 'Wraps', 'Tortilla Wrap', 530),
('Wrp02', 'Wraps', 'Arabic Wrap', 590),
('Wrp03', 'Wraps', 'Hunger Smash Special Wrap', 700),
('Wrp69', 'Wraps', 'Mujnoon ', 800);

-- --------------------------------------------------------

--
-- Table structure for table `listofitems`
--

CREATE TABLE `listofitems` (
  `id` int(11) NOT NULL,
  `order_num` int(11) NOT NULL,
  `dish_id` varchar(6) DEFAULT NULL,
  `quantity` int(11) DEFAULT 1,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `listofitems`
--

INSERT INTO `listofitems` (`id`, `order_num`, `dish_id`, `quantity`, `price`) VALUES
(2, 14, 'Bgr00', 1, 500),
(3, 16, 'test01', 1, 0),
(4, 16, 'Bgr00', 1, 500),
(5, 16, 'SW04', 1, 490),
(6, 16, 'test01', 1, 0),
(7, 16, 'test01', 1, 0),
(8, 16, 'Bgr00', 1, 500),
(9, 16, 'Bgr00', 1, 500),
(10, 16, 'Bgr00', 1, 500),
(11, 16, 'Bgr00', 1, 500),
(12, 16, 'Bgr00', 1, 500),
(13, 16, 'Bgr00', 1, 500),
(14, 17, 'Bgr00', 1, 500),
(15, 17, 'Bgr00', 1, 500),
(16, 17, 'Bgr00', 1, 500),
(17, 17, 'Bgr00', 1, 500),
(18, 18, 'Bgr00', 1, 500),
(19, 18, 'Bgr00', 1, 500),
(20, 18, 'Bgr00', 1, 500),
(21, 18, 'Bgr00', 1, 500),
(22, 18, 'Bgr00', 1, 500),
(23, 18, 'Bgr00', 1, 500),
(24, 18, 'Bgr00', 1, 500),
(25, 18, 'Bgr00', 1, 500),
(26, 18, 'Bgr00', 1, 500),
(27, 18, 'Bgr00', 1, 500),
(28, 18, 'Bgr00', 1, 500),
(29, 18, 'Bgr00', 1, 500),
(30, 18, 'Bgr00', 1, 500),
(31, 18, 'Bgr00', 1, 500),
(32, 18, 'Bgr00', 1, 500),
(33, 18, 'Bgr00', 1, 500),
(34, 18, 'Bgr00', 1, 500),
(35, 18, 'Bgr00', 1, 500),
(36, 18, 'Bgr00', 1, 500),
(37, 18, 'Bgr00', 1, 500),
(38, 18, 'Bgr00', 1, 500),
(39, 18, 'Bgr00', 1, 500),
(40, 18, 'Bgr00', 1, 500),
(41, 18, 'Bgr00', 1, 500),
(42, 18, 'Bgr00', 1, 500),
(43, 18, 'Bgr00', 1, 500),
(44, 18, 'Bgr00', 1, 500),
(62, 19, 'Wrp02', 3, 590),
(64, 19, 'Bgr00', 1, 500),
(65, 20, 'Wrp02', 1, 590),
(66, 20, 'SW03', 1, 450),
(67, 20, 'Bgr03', 1, 700),
(68, 20, 'KFC00', 1, 120),
(69, 20, 'Fr03', 1, 250),
(70, 20, 'ADD03', 1, 160),
(71, 21, 'Bgr00', 1, 500),
(72, 22, 'Bgr00', 1, 500),
(73, 23, 'Bgr00', 1, 500),
(74, 24, 'Bgr00', 1, 500),
(75, 26, 'Bgr69', 2, 1000),
(76, 27, 'Bgr00', 2, 500),
(77, 27, 'Bgr69', 2, 1000),
(78, 27, 'Wrp02', 1, 590),
(79, 28, 'Bgr69', 2, 1000),
(80, 28, 'SW04', 1, 490),
(81, 28, 'Wrp03', 1, 700),
(82, 28, 'PFC01', 1, 950),
(83, 28, 'Fr05', 1, 350),
(84, 28, 'ADD03', 1, 160),
(85, 29, 'Bgr00', 1, 500),
(87, 30, 'Bgr00', 1, 500),
(88, 31, 'Bgr00', 2, 500),
(89, 31, 'Bgr69', 1, 1000),
(90, 32, 'Bgr69', 2, 1000),
(91, 32, 'Wrp02', 1, 590),
(92, 33, 'Bgr00', 2, 500),
(93, 33, 'Wrp02', 1, 590),
(94, 34, 'Bgr00', 1, 500),
(95, 34, 'Bgr69', 1, 1000),
(96, 34, 'Wrp02', 1, 590),
(97, 35, 'Bgr00', 1, 500),
(98, 35, 'Bgr69', 1, 1000),
(99, 35, 'Wrp02', 1, 590),
(100, 35, 'Bgr05', 1, 650),
(101, 36, 'Bgr00', 1, 500),
(102, 36, 'Bgr69', 1, 1000),
(103, 36, 'Wrp02', 1, 590),
(104, 36, 'Bgr05', 1, 650),
(105, 37, 'test01', 7, 0),
(106, 37, 'Bgr00', 20, 500),
(107, 37, 'Bgr69', 10, 1000),
(108, 38, 'Bgr00', 1, 500),
(109, 38, 'Bgr69', 6, 1000),
(110, 39, 'Bgr69', 4, 1000),
(111, 39, 'test01', 1, 0),
(112, 40, 'Bgr69', 1, 1000),
(113, 41, 'Bgr69', 1, 1000),
(114, 42, 'Bgr69', 1, 1000),
(115, 43, 'Bgr69', 4, 1000),
(116, 44, 'Bgr69', 1, 1000),
(117, 45, 'Bgr69', 1, 1000),
(119, 46, 'Bgr69', 1, 1000),
(120, 46, 'Fr05', 1, 350),
(121, 47, 'Bgr69', 3, 1000),
(123, 47, 'Bgr00', 1, 500),
(124, 47, 'SW01', 1, 380),
(125, 47, 'Wrp02', 1, 590),
(126, 48, 'Bgr69', 2, 1000),
(127, 49, 'Bgr69', 2, 1000),
(128, 50, 'Bgr69', 1, 1000),
(129, 51, 'Bgr69', 1, 1000),
(130, 52, 'Bgr69', 1, 1000),
(131, 53, 'Bgr69', 1, 1000);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `id` int(11) NOT NULL,
  `Mname` varchar(255) DEFAULT NULL,
  `salary` int(11) NOT NULL,
  `Scard_num` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`id`, `Mname`, `salary`, `Scard_num`) VALUES
(1, 'thisisthemanager', 50000, 420);

-- --------------------------------------------------------

--
-- Table structure for table `orderrecord`
--

CREATE TABLE `orderrecord` (
  `order_num` int(11) NOT NULL,
  `Cust_id` varchar(255) DEFAULT NULL,
  `total` int(11) DEFAULT 0,
  `cur_status` varchar(25) DEFAULT 'pending',
  `dateop` date NOT NULL,
  `timeop` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `orderrecord`
--

INSERT INTO `orderrecord` (`order_num`, `Cust_id`, `total`, `cur_status`, `dateop`, `timeop`) VALUES
(9, 'haris', 0, 'complete', '2021-06-30', '22:26:28'),
(10, 'haris', 0, 'complete', '2021-06-30', '22:33:53'),
(11, 'haris', 0, 'complete', '2021-06-30', '22:33:53'),
(12, 'haris', 0, 'complete', '2021-06-30', '22:34:51'),
(13, 'haris', 0, 'complete', '2021-06-30', '22:34:52'),
(14, 'haris', 0, 'complete', '2021-06-30', '22:35:56'),
(15, 'haris', 0, 'complete', '2021-06-30', '22:39:32'),
(16, 'haris', 0, 'complete', '2021-06-30', '23:56:54'),
(17, 'haris', 0, 'complete', '2021-07-01', '00:06:15'),
(18, 'haris', 0, 'complete', '2021-07-01', '00:10:02'),
(19, 'haris', 2270, 'complete', '2021-07-01', '00:26:52'),
(20, 'ali', 2270, 'complete', '2021-07-01', '03:50:42'),
(21, 'haris', 500, 'complete', '2021-07-01', '04:00:29'),
(22, 'haris', 500, 'complete', '2021-07-01', '04:00:52'),
(23, 'haris', 500, 'complete', '2021-07-01', '04:01:53'),
(24, 'haris', 500, 'complete', '2021-07-01', '04:03:31'),
(25, 'haris', 0, 'complete', '2021-07-01', '04:20:22'),
(26, 'haris', 2000, 'complete', '2021-07-01', '12:02:14'),
(27, 'haris', 3590, 'complete', '2021-07-02', '01:02:49'),
(28, 'iamharis24', 4650, 'complete', '2021-07-02', '21:30:42'),
(29, 'iamharis24', 500, 'complete', '2021-07-02', '22:24:10'),
(30, 'iamharis24', 500, 'complete', '2021-07-03', '00:53:33'),
(31, 'iamharis24', 2000, 'complete', '2021-07-03', '19:01:46'),
(32, 'iamharis24', 2590, 'complete', '2021-07-03', '19:02:47'),
(33, 'iamharis24', 1590, 'complete', '2021-07-03', '19:16:39'),
(34, 'iamharis24', 2090, 'complete', '2021-07-03', '19:18:35'),
(35, 'iamharis24', 2740, 'complete', '2021-07-03', '19:41:11'),
(36, 'iamharis24', 2740, 'complete', '2021-07-03', '19:45:52'),
(37, 'iamharis24', 8875, 'complete', '2021-07-04', '02:03:35'),
(38, 'iamharis24', 3992, 'complete', '2021-07-04', '05:14:17'),
(39, 'iamharis24', 2890, 'complete', '2021-07-04', '05:26:55'),
(40, 'iamharis24', 523, 'complete', '2021-07-04', '05:39:06'),
(41, 'iamharis24', 850, 'complete', '2021-07-04', '05:44:56'),
(42, 'iamharis24', 321, 'complete', '2021-07-04', '05:47:35'),
(43, 'iamharis24', 2890, 'complete', '2021-07-04', '05:50:37'),
(44, 'iamharis24', 523, 'complete', '2021-07-04', '05:57:37'),
(45, 'iamharis24', 1000, 'complete', '2021-07-04', '05:59:17'),
(46, 'huzaifanaseer', 1350, 'complete', '2021-07-04', '15:28:08'),
(47, 'iamharis24', 4470, 'complete', '2021-07-04', '17:33:47'),
(48, 'haris', 2000, 'complete', '2021-07-04', '18:35:04'),
(49, 'haris', 2000, 'complete', '2021-07-04', '18:35:37'),
(50, 'haris', 850, 'complete', '2021-07-04', '18:36:21'),
(51, 'iamharis24', 723, 'complete', '2021-07-04', '18:39:59'),
(52, 'haris', 1000, 'complete', '2021-07-04', '18:41:40'),
(53, 'iamharis24', 1000, 'pending', '2021-07-04', '18:58:46'),
(54, 'iamharis24', 0, 'pending', '2021-07-04', '18:59:48');

-- --------------------------------------------------------

--
-- Table structure for table `restaurant`
--

CREATE TABLE `restaurant` (
  `Rname` varchar(255) NOT NULL,
  `Contact_num` decimal(10,0) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `rating` decimal(2,2) DEFAULT 0.00
) ;

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `Cname` varchar(255) DEFAULT NULL,
  `rating` int(11) NOT NULL,
  `feedback` varchar(500) DEFAULT NULL
) ;

-- --------------------------------------------------------

--
-- Table structure for table `starcard`
--

CREATE TABLE `starcard` (
  `Scard_num` int(11) NOT NULL,
  `credit` int(11) DEFAULT 0,
  `assigned` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `starcard`
--

INSERT INTO `starcard` (`Scard_num`, `credit`, `assigned`) VALUES
(0, 0, 1),
(104, 0, 1),
(105, 0, 1),
(106, 0, 1),
(107, 0, 1),
(141, 0, 1),
(195, 100, 1),
(281, 200, 1),
(363, 100, 1),
(416, 0, 1),
(420, 100099, 1),
(430, 0, 0),
(444, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `Uname` varchar(255) NOT NULL,
  `Upassword` varchar(255) DEFAULT NULL,
  `FullName` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `telnum` varchar(30) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `Utype` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`Uname`, `Upassword`, `FullName`, `address`, `telnum`, `email`, `Utype`) VALUES
('ali', 'ali', 'ali', 'ali', 'ali', 'ali@ali.com', 'Customer'),
('chef', 'chef', 'chef', 'chef', '1chef', 'chef@hungersmash.com', 'Kitchen Staff'),
('cook', 'cook', 'I am the chef', 'The Kitchen', '090078601', 'cook@hungersmash.com', 'Kitchen Staff'),
('haris', 'haris', 'haris', 'haris', 'haris', 'haris@haris.com', 'Customer'),
('huzaifanaseer', '12345678', 'Huzaifa Naseer', 'Lahore', '03211127977', 'huzaifanaseer415@gmail.com', 'Customer'),
('iamharis24', 'haris', 'haris iftikhar', 'house no.43, N block, Izmir Town, Lahore', '03034456629', 'bscs19069@itu.edu.pk', 'Customer'),
('k', 'k', 'k', 'k', 'k', 'k@k.com', 'Kitchen Staff'),
('nayauser', '12345', 'bablu', 'johartown', '03034456629', 'ali@ali.com', 'Customer'),
('nya', 'nya', 'nya', 'nya', 'nya', 'nya@nya.com', 'Basic Staff'),
('o', 'o', 'o', 'o', 'o', 'o@o.com', 'Basic Staff'),
('ordertaker', 'order', 'Counter Guy', 'house 00, XXX town, City, Country', '030369744744', 'test@email.com', 'Basic Staff'),
('thisisthemanager', 'letmein', 'I am the boss', 'Yes I know it', '03000000000', 'bscs19069@itu.edu.pk', 'manager');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `basicstaff`
--
ALTER TABLE `basicstaff`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Bname` (`Bname`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Cname` (`Cname`),
  ADD KEY `Scard_num` (`Scard_num`);

--
-- Indexes for table `dishes`
--
ALTER TABLE `dishes`
  ADD PRIMARY KEY (`Dish_id`);

--
-- Indexes for table `listofitems`
--
ALTER TABLE `listofitems`
  ADD PRIMARY KEY (`id`),
  ADD KEY `order_num` (`order_num`),
  ADD KEY `dish_id` (`dish_id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Mname` (`Mname`),
  ADD KEY `Scard_num` (`Scard_num`);

--
-- Indexes for table `orderrecord`
--
ALTER TABLE `orderrecord`
  ADD PRIMARY KEY (`order_num`),
  ADD KEY `Cust_id` (`Cust_id`);

--
-- Indexes for table `restaurant`
--
ALTER TABLE `restaurant`
  ADD PRIMARY KEY (`Rname`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`),
  ADD KEY `Cname` (`Cname`);

--
-- Indexes for table `starcard`
--
ALTER TABLE `starcard`
  ADD PRIMARY KEY (`Scard_num`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`Uname`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `basicstaff`
--
ALTER TABLE `basicstaff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `listofitems`
--
ALTER TABLE `listofitems`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `orderrecord`
--
ALTER TABLE `orderrecord`
  MODIFY `order_num` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `basicstaff`
--
ALTER TABLE `basicstaff`
  ADD CONSTRAINT `basicstaff_ibfk_1` FOREIGN KEY (`Bname`) REFERENCES `users` (`Uname`);

--
-- Constraints for table `customers`
--
ALTER TABLE `customers`
  ADD CONSTRAINT `customers_ibfk_1` FOREIGN KEY (`Cname`) REFERENCES `users` (`Uname`),
  ADD CONSTRAINT `customers_ibfk_2` FOREIGN KEY (`Scard_num`) REFERENCES `starcard` (`Scard_num`);

--
-- Constraints for table `listofitems`
--
ALTER TABLE `listofitems`
  ADD CONSTRAINT `listofitems_ibfk_1` FOREIGN KEY (`order_num`) REFERENCES `orderrecord` (`order_num`),
  ADD CONSTRAINT `listofitems_ibfk_2` FOREIGN KEY (`dish_id`) REFERENCES `dishes` (`Dish_id`);

--
-- Constraints for table `manager`
--
ALTER TABLE `manager`
  ADD CONSTRAINT `manager_ibfk_1` FOREIGN KEY (`Mname`) REFERENCES `users` (`Uname`),
  ADD CONSTRAINT `manager_ibfk_2` FOREIGN KEY (`Scard_num`) REFERENCES `starcard` (`Scard_num`);

--
-- Constraints for table `orderrecord`
--
ALTER TABLE `orderrecord`
  ADD CONSTRAINT `orderrecord_ibfk_1` FOREIGN KEY (`Cust_id`) REFERENCES `customers` (`Cname`);

--
-- Constraints for table `reviews`
--
ALTER TABLE `reviews`
  ADD CONSTRAINT `reviews_ibfk_1` FOREIGN KEY (`Cname`) REFERENCES `customers` (`Cname`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
