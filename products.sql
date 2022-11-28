-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 28, 2022 at 08:44 AM
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
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `pname` varchar(255) DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `price` double DEFAULT NULL,
  `person` varchar(255) DEFAULT NULL,
  `category` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `pname`, `image`, `price`, `person`, `category`) VALUES
(1, 'Apex Legends', 'Apex Legends.png', 9000, NULL, 'pcgame'),
(2, 'Batman-Playstation 3 Skin', 'BATMAN - PLAYSTATION 3 SLIM PROTECTOR SKIN.jpeg', 9000, NULL, 'ps3console'),
(3, 'Wood PS3 Controller', 'WOOD - PLAYSTATION 3 CONTROLLER SKIN.jpeg', 9000, NULL, 'ps3controller'),
(4, 'Deadpool PS3 Game', 'Deadpool (PS3).jpeg', 9000, NULL, 'ps3game'),
(5, 'Custom PS4 Controller', 'Custom Design Cube PS4 Pro Skin Sticker For Sony PlayStation 4 Console and Controllers PS4 Pro Skin Stickers Decal Vinyl.jpeg', 9000, NULL, 'ps4console'),
(6, 'Blue Daemon PS4 Controller', 'Blue Daemon PS 4 controller.jpeg', 9000, NULL, 'ps4controller'),
(7, 'Call of Duty Black Ops 4', 'Call of Duty_ Black Ops 4 - PlayStation 4.jpeg', 9000, NULL, 'ps4game'),
(8, 'Cyberpunk PS5 Console', 'Cyberpunk PS 5 console.jpeg', 9000, NULL, 'ps5console'),
(9, 'Rainbow Galaxy PS5 Controller', 'Rainbow Galaxy PS5 Controller Skin.png', 9000, NULL, 'ps5controller'),
(10, 'FIFA 23 Standard Edition', 'FIFA 23 Standard Edition PS5 _ English.jpeg', 9000, NULL, 'ps5game');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
