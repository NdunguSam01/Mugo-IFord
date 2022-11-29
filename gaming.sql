-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 29, 2022 at 04:47 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `gaming`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `adminID` int(11) NOT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`adminID`, `userName`, `password`) VALUES
(1, 'Samuel', 'f50eeba2425974fba6f854f4a4bf3661');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `itemID` int(11) DEFAULT NULL,
  `userID` int(11) DEFAULT NULL,
  `quantity` int(11) DEFAULT NULL,
  `price` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pname`, `image`, `price`, `category`) VALUES
(1, 'Apex Legends', 'Apex Legends.png', 9000, 'pcgame'),
(2, 'Batman-Playstation 3 Skin', 'BATMAN - PLAYSTATION 3 SLIM PROTECTOR SKIN.jpeg', 9000, 'ps3console'),
(3, 'Wood PS3 Controller', 'WOOD - PLAYSTATION 3 CONTROLLER SKIN.jpeg', 9000, 'ps3controller'),
(4, 'Deadpool PS3 Game', 'Deadpool (PS3).jpeg', 9000, 'ps3game'),
(5, 'Custom PS4 Controller', 'Custom Design Cube PS4 Pro Skin Sticker For Sony PlayStation 4 Console and Controllers PS4 Pro Skin Stickers Decal Vinyl.jpeg', 9000, 'ps4console'),
(6, 'Blue Daemon PS4 Controller', 'Blue Daemon PS 4 controller.jpeg', 9000, 'ps4controller'),
(7, 'Call of Duty Black Ops 4', 'Call of Duty_ Black Ops 4 - PlayStation 4.jpeg', 9000, 'ps4game'),
(8, 'Cyberpunk PS5 Console', 'Cyberpunk PS 5 console.jpeg', 9000, 'ps5console'),
(9, 'Rainbow Galaxy PS5 Controller', 'Rainbow Galaxy PS5 Controller Skin.png', 9000, 'ps5controller'),
(10, 'FIFA 23 Standard Edition', 'FIFA 23 Standard Edition PS5 _ English.jpeg', 9000, 'ps5game');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userID` int(11) NOT NULL,
  `fname` varchar(255) DEFAULT NULL,
  `lname` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `userName` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userID`, `fname`, `lname`, `email`, `userName`, `password`) VALUES
(1, 'SAMUEL', 'NDUNGU MUIGAI', 'muigaisam65@gmail.com', 'Muigai', 'fd81e5cb9f21c101a47f490515a53c6a'),
(2, 'LJKCNV', 'KDNKSNK', 'sales.kensam@gmail.com', 'aaa', 'f1ffb7d1c352e610c124bfd13f907023');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`adminID`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD KEY `itemID` (`itemID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `adminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `orders_ibfk_1` FOREIGN KEY (`itemID`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `orders_ibfk_2` FOREIGN KEY (`userID`) REFERENCES `users` (`userID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
