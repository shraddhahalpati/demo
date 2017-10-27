-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 27, 2017 at 02:39 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `user_registration`
--

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `user_id` int(20) NOT NULL,
  `firstname` varchar(30) DEFAULT NULL,
  `lastname` varchar(30) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `address` varchar(300) DEFAULT NULL,
  `username` varchar(30) DEFAULT NULL,
  `pwd` varchar(30) DEFAULT NULL,
  `d_o_b` date DEFAULT NULL,
  `contact_no` varchar(255) DEFAULT NULL,
  `photo` varchar(300) DEFAULT NULL,
  `user_type` enum('admin','customer') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`user_id`, `firstname`, `lastname`, `email`, `address`, `username`, `pwd`, `d_o_b`, `contact_no`, `photo`, `user_type`) VALUES
(1, 'Shraddha', 'Halpati', 'shraddha.halpati@motifworks.com', '152-Shaniwar Peth,Ekbote Wada,Pune-30', 'shraddhahalpati', 'shraddha', '1992-10-28', '9637847887', 'ballon-ballon-color-ballons-balloons-blue-cloud-Favim.com-71243.jpg', 'admin'),
(2, 'Shraddha', 'Halpati', 'shraddhahalpati@gmail.com', '152-Shaniwar Peth', 'shraddha', 'shraddha', '1992-10-28', '333333333333333333333', 'download (2).jpg', 'admin'),
(5, 'Deepika', 'Jagtap', 'deepikajagtap@gmail.com', 'Nana Peth', 'deepikajagtap', 'deepika', '1992-08-17', '9545659078', 'download.jpg', 'customer'),
(9, 'Siddhi', 'Bakshi', 'siddhibakshi@gmail.com', 'Swapnanagari Soc., Akurdi', 'siddhi', 'siddhi', '1992-01-27', '7875049088', 'download.jpg', 'customer'),
(10, 'Sayali', 'Bakshi', 'sayali.bakshi@gmail.com', 'Dhayari', 'sayali', 'sayali', '1992-07-05', '9865231245', 'download.jpg', 'customer'),
(11, 'Nihal', 'Patel', 'nihalpatel@gmail.com', 'Shaniwar Peth', 'nihal', 'nihal', '1991-12-08', '9856325478', 'download (1).jpg', 'customer'),
(12, 'Suraj', 'Kotwal', 'suraj@gmail.com', 'Laxmi Road, Pune', 'suraj', 'suraj', '1993-07-15', '5968234578', 'user-icon-32327.png', 'customer'),
(15, 'Harsh', 'Desai', 'harsh.desai@gmail.com', 'Maharshi Nagar,Sangam Park Soc.', 'harshdesai', 'harsh', '1992-05-31', '9312549591', 'download (1).jpg', 'customer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `user_id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
