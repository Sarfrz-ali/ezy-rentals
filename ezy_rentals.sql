-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 23, 2023 at 03:00 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ezy rentals`
--

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `car_id` int(11) NOT NULL,
  `booking_date` varchar(255) NOT NULL,
  `return_date` varchar(255) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`booking_id`, `user_id`, `car_id`, `booking_date`, `return_date`, `price`) VALUES
(12, 2, 17, '2023-05-22', '2023-05-25', 30),
(0, 1, 2, '2023-05-23', '2023-05-25', 0),
(0, 1, 6, '2023-05-23', '2023-05-31', 0);

-- --------------------------------------------------------

--
-- Table structure for table `car`
--

CREATE TABLE `car` (
  `car_id` int(11) NOT NULL,
  `car_make` varchar(50) NOT NULL,
  `car_model` varchar(50) NOT NULL,
  `car_color` varchar(50) NOT NULL,
  `car_img` varchar(255) NOT NULL,
  `price_per_day` int(11) NOT NULL,
  `book` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `car`
--

INSERT INTO `car` (`car_id`, `car_make`, `car_model`, `car_color`, `car_img`, `price_per_day`, `book`) VALUES
(1, 'honda', 'city', 'red', 'honda city red 23-05-22 honda city.jpeg', 10, 1),
(2, 'Suzuki', 'Cultus', 'blue', 'Suzuki Cultus blue 23-05-22 suzuki cultus.jpg', 5, 1),
(3, 'Honda', 'Auto Express', 'white', 'Honda Auto Express white 23-05-22 honda cr-v.jpg', 20, 0),
(4, 'Honda', 'BMW', 'white', 'Honda BMW white 23-05-22 honda bmw.jpg', 30, 0),
(5, 'Honda ', 'Civic', 'white', 'Honda  Civic white 23-05-22 honda civic.jpg', 20, 0),
(6, 'Firari', 'SF90 spider', 'golden', 'Firari SF90 spider golden 23-05-22 firari sf90 spider.jpg', 60, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `user_name` varchar(255) NOT NULL,
  `user_phone` varchar(255) NOT NULL,
  `user_email` varchar(255) NOT NULL,
  `user_password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `user_name`, `user_phone`, `user_email`, `user_password`) VALUES
(1, 'saad', '03007654321', 'saad@gmail.com', 'saad'),
(2, 'admin', '03009876543', 'admin@gmail.com', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
