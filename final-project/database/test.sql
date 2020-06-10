-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2020 at 08:34 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_product`
--

CREATE TABLE `cart_product` (
  `id` int(5) NOT NULL,
  `category_id` int(5) NOT NULL,
  `prd_name` varchar(100) DEFAULT NULL,
  `prd_image` varchar(100) DEFAULT NULL,
  `prd_price` int(5) NOT NULL,
  `prd_material` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cart_product`
--

INSERT INTO `cart_product` (`id`, `category_id`, `prd_name`, `prd_image`, `prd_price`, `prd_material`) VALUES
(0, 1, 'Footwears1', 'images/prod111.jpg', 300, 'Bumbac'),
(1, 1, 'Footwears2', 'images/prod112.jpg', 200, 'Bumbac'),
(2, 1, 'Footwears3', 'images/prod113.jpg', 300, 'Bumbac'),
(3, 1, 'Footwears4', 'images/prod112.jpg', 100, 'Bumbac'),
(4, 1, 'Footwears5', 'images/prod111.jpg', 400, 'Bumbac'),
(5, 1, 'Footwears16', 'images/prod113.jpg', 800, 'Bumbac'),
(6, 5, 'T-Shirt1', 'images/prod121.jpg', 400, 'Bumbac'),
(7, 5, 'T-Shirt2', 'images/prod122.jpg', 800, 'Bumbac'),
(8, 5, 'T-Shirt3', 'images/prod123.jpg', 600, 'Bumbac'),
(9, 5, 'T-Shirt4', 'images/prod121.jpg', 400, 'Bumbac'),
(10, 5, 'T-Shirt5', 'images/prod122.jpg', 550, 'Bumbac'),
(11, 5, 'T-Shirt6', 'images/prod123.jpg', 200, 'Bumbac'),
(12, 6, 'Pullover1', 'images/prod131.jpg', 500, 'Bumbac'),
(13, 6, 'Pullover2', 'images/prod132.jpg', 151, 'Bumbac'),
(14, 6, 'Pulover3', 'images/prod131.jpg', 545, 'Bumbac'),
(15, 6, 'Pulover4', 'images/prod132.jpg', 156, 'Bumbac'),
(16, 6, 'Pulover5', 'images/prod131.jpg', 548, 'Bumbac'),
(17, 7, 'Pant1', 'images/prod141.jpg', 185, 'Bumbac'),
(18, 7, 'Pant2', 'images/prod142.jpg', 451, 'Bumbac'),
(19, 7, 'Pant3', 'images/prod143.jpg', 548, 'Bumbac'),
(20, 7, 'Pant4', 'images/prod142.jpg', 568, 'Bumbac'),
(21, 7, 'Pant5', 'images/prod141.jpg', 845, 'Bumbac'),
(22, 8, 'FootWear1', 'images/prod1113.jpg', 564, 'Bumbac'),
(23, 8, 'FootWear2', 'images/prod1112.jpg', 458, 'Bumbac'),
(24, 8, 'FootWear3', 'images/prod1111.jpg', 487, 'Bumbac'),
(25, 8, 'FootWear4', 'images/prod1112.jpg', 500, 'Bumbac'),
(26, 8, 'FootWear5', 'images/prod1113.jpg', 455, 'Bumbac'),
(27, 8, 'FootWear6', 'images/prod1112.jpg', 456, 'Bumbac'),
(28, 10, 'Pullover1', 'images/prod1121.jpg', 548, 'Bumbac'),
(29, 10, 'Pulover2', 'images/prod1122.jpg', 451, 'Bumbac'),
(30, 10, 'Pulover3', 'images/prod1123.jpg', 548, 'Bumbac'),
(31, 10, 'Pullover4', 'images/prod1121.jpg', 500, 'Bumbac'),
(32, 9, 'T-Shirt1', 'images/prod1131.jpg', 300, 'Bumbac'),
(33, 9, 'T-Shirt2', 'images/prod1132.jpg', 571, 'Bumbac'),
(34, 9, 'T-Shirt3', 'images/prod1133.jpg', 548, 'Bumbac'),
(35, 9, 'T-Shirt3', 'images/prod1131.jpg', 500, 'Bumbac'),
(36, 9, 'T-Shirt5', 'images/prod1133.jpg', 845, 'Bumbac');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `Id` int(9) UNSIGNED NOT NULL,
  `owner` varchar(50) NOT NULL,
  `occasion` varchar(50) NOT NULL,
  `type` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`Id`, `owner`, `occasion`, `type`) VALUES
(1, 'Men', 'Sport', 'FootWears'),
(5, 'Men', 'Sport', 'T-Shirt'),
(6, 'Men', 'Sport', 'Pullovers'),
(7, 'Men', 'Sport', 'Pants'),
(8, 'Men', 'Casual', 'FootWears'),
(9, 'Men', 'Casual', 'T-Shirts'),
(10, 'Men', 'Casual', 'Pullovers'),
(11, 'Men', 'Casual', 'Pants'),
(12, 'Men', 'Anniversary', 'FootWears'),
(13, 'Men', 'Anniversary', 'Shirt'),
(14, 'Men', 'Anniversary', 'Blazers'),
(15, 'Men', 'Anniversary', 'Pants'),
(16, 'Men', 'Masqurade', 'FootWears'),
(17, 'Men', 'Masqurade', 'TopClothes'),
(18, 'Men', 'Masqurade', 'DownClothes'),
(19, 'Men', 'Masqurade', 'Accesories'),
(20, 'Women', 'Sport', 'FootWears'),
(21, 'Women', 'Sport', 'T-Shirts'),
(22, 'Women', 'Sport', 'Pullovers'),
(23, 'Women', 'Sport', 'Pants'),
(24, 'Women', 'Casual', 'Footwears'),
(25, 'Women', 'Casual', 'T-Shirts'),
(26, 'Women', 'Casual', 'Pullovers'),
(27, 'Women', 'Casual', 'Pants'),
(28, 'Women', 'Anniversary', 'FootWears'),
(29, 'Women', 'Anniversary', 'Shirts'),
(30, 'Women', 'Anniversary', 'Dresses'),
(31, 'Women', 'Anniversary', 'Pants'),
(32, 'Women', 'Masqurade', 'FootWears'),
(33, 'Women', 'Masqurade', 'Dresses'),
(34, 'Women', 'Masqurade', 'Accesories'),
(35, 'Women', 'Masqurade', 'Hats'),
(36, 'Children', 'Sport', 'Footwears'),
(37, 'Children', 'Sport', 'T-Shirts'),
(38, 'Children', 'Sport', 'Pullovers'),
(39, 'Children', 'Sport', 'Pants'),
(40, 'Children', 'Casual', 'FootWears'),
(41, 'Children', 'Casual', 'T-Shirts'),
(42, 'Children', 'Casual', 'Pullovers'),
(43, 'Children', 'Casual', 'Pants'),
(44, 'Children', 'Anniversary', 'FootWears'),
(45, 'Children', 'Anniversary', 'Shirts'),
(46, 'Children', 'Anniversary', 'Pullovers'),
(47, 'Children', 'Anniversary', 'Pants'),
(48, 'Children', 'Masqurade', 'Footwears'),
(49, 'Children', 'Masqurade', 'Pants'),
(50, 'Children', 'Masqurade', 'Pullovers'),
(51, 'Children', 'Masqurade', 'Accesories');

-- --------------------------------------------------------

--
-- Table structure for table `occasion_table`
--

CREATE TABLE `occasion_table` (
  `id` int(5) NOT NULL,
  `path` varchar(100) NOT NULL,
  `category_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `occasion_table`
--

INSERT INTO `occasion_table` (`id`, `path`, `category_id`) VALUES
(1, 'images/image3.jpg', 1),
(2, 'images/image4.jpg', 5),
(3, 'images/image9.jpg', 6),
(4, 'images/image6.jpg', 7),
(5, 'images/image7.jpg', 8),
(6, 'images/image8.jpg', 9),
(7, 'images/image5.jpg', 10),
(8, 'images/image10.jpg', 11),
(9, 'images/image11.jpg', 12),
(10, 'images/image12.jpg', 13),
(11, 'images/image13.jpg', 14),
(12, 'images/image14.jpg', 15),
(13, 'images/img.jpg', 20),
(14, 'images/img1.jpg', 21),
(15, 'images/img2.jpg', 22),
(16, 'images/img3.jpg', 23),
(17, 'images/img4.jpg', 24),
(18, 'images/img5.jpg', 25),
(19, 'images/img6.jpg', 26),
(20, 'images/img7.jpg', 27),
(21, 'images/img8.jpg', 28),
(22, 'images/img9.jpg', 29),
(23, 'images/img10.jpg', 30),
(24, 'images/img11.jpg', 31),
(25, 'images/dwn.jpg', 36),
(26, 'images/dwn1.jpg', 37),
(27, 'images/dwn2.jpg', 38),
(28, 'images/dwn3.jpg', 39),
(29, 'images/dwn4.jpg', 40),
(30, 'images/dwn5.jpg', 41),
(31, 'images/dwn6.jpg', 42),
(32, 'images/dwn7.jpg', 43),
(33, 'images/dwn8.jpg', 44),
(34, 'images/dwn9.jpg', 45),
(35, 'images/dwn10.jpg', 46),
(36, 'images/dwn11.jpg', 47);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `Id` int(9) UNSIGNED NOT NULL,
  `CategoryId` int(9) UNSIGNED NOT NULL,
  `ProductName` varchar(50) NOT NULL,
  `Material` varchar(50) NOT NULL,
  `Size` varchar(50) NOT NULL,
  `Price` int(5) UNSIGNED NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `recipient_image`
--

CREATE TABLE `recipient_image` (
  `id` int(5) NOT NULL,
  `category_id` int(5) NOT NULL,
  `path` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `recipient_image`
--

INSERT INTO `recipient_image` (`id`, `category_id`, `path`) VALUES
(1, 1, 'images/download.jpg'),
(2, 8, 'images/download1.jpg'),
(3, 12, 'images/download2.jpg'),
(4, 16, 'images/download3.jpg'),
(5, 20, 'images/download4.jpg'),
(6, 24, 'images/download5.png'),
(7, 28, 'images/download6.jpg'),
(8, 32, 'images/download7.jpg'),
(9, 36, 'images/download8.jpg'),
(10, 40, 'images/download10.jpg'),
(11, 44, 'images/download9.jpg'),
(12, 48, 'images/download7.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `type_image`
--

CREATE TABLE `type_image` (
  `id` int(5) NOT NULL,
  `path` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `category_id` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `type_image`
--

INSERT INTO `type_image` (`id`, `path`, `name`, `category_id`) VALUES
(1, 'images/image3.jpg', 'FootWears', 1),
(2, 'images/image3.jpg', 'T-Shirt', 1),
(3, 'images/image3.jpg', 'Pullovers', 1),
(4, 'images/image3.jpg', 'Pants', 1),
(5, 'images/image3.jpg', 'FootWears', 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `Id` int(9) UNSIGNED NOT NULL,
  `UserName` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  `Password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`Id`, `UserName`, `Email`, `Password`) VALUES
(1, 'artiompogonet', 'apogonet@inbox.ru', '5be332aca00de0f8ee1ed358f9ef59a7'),
(2, 'mereutan', 'mereutan@gmail.com', 'ca117dc23ff4c3a9eb84d6656ff4c336'),
(3, 'user', 'user@gmail.com', '7e86b36836ce9594de2ef806ac200921'),
(4, 'utilizator', 'utilizator@gmail.com', '45724ab9c9131bc451b2f9450074478d');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_product`
--
ALTER TABLE `cart_product`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`Id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`Id`),
  ADD KEY `FK_product_category` (`CategoryId`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`Id`),
  ADD UNIQUE KEY `UserName` (`UserName`),
  ADD UNIQUE KEY `Email` (`Email`),
  ADD UNIQUE KEY `Password` (`Password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `Id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `Id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `Id` int(9) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `FK_product_category` FOREIGN KEY (`CategoryId`) REFERENCES `category` (`Id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
