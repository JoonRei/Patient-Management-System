-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2024 at 11:30 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `jmcfi prms`
--

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `gender` varchar(10) NOT NULL,
  `age` int(11) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `address` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `firstname`, `lastname`, `middlename`, `gender`, `age`, `contact`, `email`, `address`, `date_added`) VALUES
(1, 'Junrey', 'Manriquez', 'Tacang', 'male', 21, '09432748975', 'junreymanriquez718@gmail.com', 'Davao City', '2024-03-19 09:19:13'),
(2, 'Rizty', 'Ingua', 'D.', 'male', 21, '09423648736', 'rizty.ingua@jmc.edu.ph', 'Davao City', '2024-03-19 09:23:16'),
(3, 'Frieshian Nicole', 'Sanchez', 'M.', 'female', 22, '09347683645', 'frieshian@gmail.com', 'Davao City', '2024-03-19 09:24:06'),
(4, 'Aineros', 'Juanite', 'N.', 'female', 21, '09384783267', 'aineros@gmail.com', 'Davao City', '2024-03-19 09:24:51');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'Junrey', '1234'),
(2, 'Ain', '1234'),
(3, 'werewr', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
