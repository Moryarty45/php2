-- phpMyAdmin SQL Dump
-- version 4.9.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Apr 23, 2020 at 10:42 AM
-- Server version: 5.7.26
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `php2dz3`
--

-- --------------------------------------------------------

--
-- Table structure for table `goods`
--

CREATE TABLE `goods` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `src` varchar(255) NOT NULL,
  `srcBig` varchar(255) NOT NULL,
  `descriptionShort` text NOT NULL,
  `descriptionFull` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `goods`
--

INSERT INTO `goods` (`id`, `name`, `src`, `srcBig`, `descriptionShort`, `descriptionFull`, `price`) VALUES
(1, 'Mercedes', 'images/mercedes.jpeg', 'images/big/mercedes.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 2000),
(2, 'Audi', 'images/audi.jpeg', 'images/big/audi.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 1800),
(3, 'BMW', 'images/bmw.jpeg', 'images/big/bmw.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 1900),
(4, 'Volvo', 'images/volvo.jpeg', 'images/big/volvo.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 1850),
(5, 'Toyota', 'images/mercedes.jpeg', 'images/big/mercedes.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 2000),
(6, 'Bentley', 'images/audi.jpeg', 'images/big/audi.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 1800),
(7, 'Honda', 'images/bmw.jpeg', 'images/big/bmw.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 1900),
(8, 'Suzuki', 'images/volvo.jpeg', 'images/big/volvo.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 1850),
(9, 'Nissan', 'images/mercedes.jpeg', 'images/big/mercedes.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 2000),
(10, 'Renault', 'images/audi.jpeg', 'images/big/audi.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 1800),
(11, 'Peugeot', 'images/bmw.jpeg', 'images/big/bmw.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 1900),
(12, 'Citroen', 'images/volvo.jpeg', 'images/big/volvo.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 1850),
(13, 'Lada', 'images/mercedes.jpeg', 'images/big/mercedes.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 2000),
(14, 'Acura', 'images/audi.jpeg', 'images/big/audi.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 1800),
(15, 'Infinity', 'images/bmw.jpeg', 'images/big/bmw.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 1900),
(16, 'Kia', 'images/volvo.jpeg', 'images/big/volvo.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 1850),
(17, 'Hyundai', 'images/mercedes.jpeg', 'images/big/mercedes.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 2000),
(18, 'Great Wall', 'images/audi.jpeg', 'images/big/audi.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 1800),
(19, 'Subaru', 'images/bmw.jpeg', 'images/big/bmw.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 1900),
(20, 'Datsun', 'images/volvo.jpeg', 'images/big/volvo.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 1850),
(21, 'Mazda', 'images/mercedes.jpeg', 'images/big/mercedes.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 2000),
(22, 'Mitsubishi', 'images/audi.jpeg', 'images/big/audi.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 1800),
(23, 'Lexus', 'images/bmw.jpeg', 'images/big/bmw.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 1900),
(24, 'Jeep', 'images/volvo.jpeg', 'images/big/volvo.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 1850),
(25, 'Ford', 'images/mercedes.jpeg', 'images/big/mercedes.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 2000),
(26, 'Dodge', 'images/audi.jpeg', 'images/big/audi.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 1800),
(27, 'Chevrolet', 'images/bmw.jpeg', 'images/big/bmw.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 1900),
(28, 'Holden', 'images/volvo.jpeg', 'images/big/volvo.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 1850),
(29, 'UAZ', 'images/mercedes.jpeg', 'images/big/mercedes.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 2000),
(30, 'Chery', 'images/audi.jpeg', 'images/big/audi.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 1800),
(31, 'Volkswagen', 'images/bmw.jpeg', 'images/big/bmw.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 1900),
(32, 'SsangYoung', 'images/volvo.jpeg', 'images/big/volvo.jpeg', 'Lorem Ipsum', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quos, dolorem, consequatur. Laboriosam quidem beatae incidunt cumque magni recusandae neque obcaecati quasi maxime numquam. Magni eaque saepe voluptatem, vel dignissimos quaerat.', 1850);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `goods`
--
ALTER TABLE `goods`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `goods`
--
ALTER TABLE `goods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
