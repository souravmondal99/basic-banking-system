-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Aug 05, 2021 at 06:58 PM
-- Server version: 10.4.10-MariaDB
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `grip_bank`
--

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

DROP TABLE IF EXISTS `transaction`;
CREATE TABLE IF NOT EXISTS `transaction` (
  `sno` int(3) NOT NULL AUTO_INCREMENT,
  `sender` text NOT NULL,
  `receiver` text NOT NULL,
  `balance` int(8) NOT NULL,
  `datetime` datetime NOT NULL DEFAULT current_timestamp(),
  PRIMARY KEY (`sno`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`sno`, `sender`, `receiver`, `balance`, `datetime`) VALUES
(1, 'Arka Mukherjee', 'Arjun Mishra', 6969, '2021-08-05 21:43:56'),
(2, 'Rohit Bose', 'Kaustav	Biswas', 7878, '2021-08-05 21:45:58'),
(3, 'Rohit Bose', 'Arka Mukherjee', 789, '2021-08-06 00:03:52'),
(4, 'Rohit Bose', 'Arjun Mishra', 898, '2021-08-06 00:07:47'),
(5, 'Joybrata Mallik', 'Arnab Kumar', 5555, '2021-08-06 00:09:25'),
(6, 'Rohit Bose', 'Arjun Mishra', 9789, '2021-08-06 00:09:47'),
(7, 'Arka Mukherjee', 'Palash Saha', 890, '2021-08-06 00:14:30');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(3) NOT NULL AUTO_INCREMENT,
  `name` text NOT NULL,
  `email` varchar(30) NOT NULL,
  `balance` int(8) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=54655 DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `balance`) VALUES
(1169, 'Rohit Bose', 'rohit.bose@gmail.com', 8843),
(2235, 'Kaustav	Biswas', 'kaustav99@gmail.com', 37020),
(3230, 'Suvam Roy', 'subham66@gmail.com', 87232),
(3356, 'Suman Roy', 'suman.roy@gmail.com', 51887),
(4456, 'Joybrata Mallik', 'joy.mallik@gmail.com', 163),
(5465, 'Arka Mukherjee', 'arka78@gmail.com', 39995),
(5678, 'Arjun Mishra', 'armishra@gmail.com', 86539),
(6554, 'Palash Saha', 'sahapalash@gmail.com', 87558),
(6780, 'Rohan Saha', 'rohansaha@gmail.com', 38668),
(7890, 'Arnab Kumar', 'arnabk@gmail.com', 42524);
COMMIT;


--
-- Indexes for dumped tables
--

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`sno`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `transaction`
--f
ALTER TABLE `transaction`
  MODIFY `sno` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54655;
COMMIT;

--
-- Reset Auto increment
--

set @autoid :=0; 
update transaction set sno= @autoid := (@autoid+1);
alter table transaction Auto_Increment = 1;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
