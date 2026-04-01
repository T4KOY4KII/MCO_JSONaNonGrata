-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Mar 19, 2026 at 01:45 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `users_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for table 'rooms'
--  

CREATE TABLE rooms (
  room_id INT PRIMARY KEY AUTO_INCREMENT,
  building_name ENUM('GK', 'AG') NOT NULL,
  floor_level INT NOT NULL,
  room_number VARCHAR(10) NOT NULL,
  UNIQUE KEY room_code (building_name, floor_level, room_number)
);

--
-- Table structure for table 'reservations'
--

CREATE TABLE reservations (
  res_id INT PRIMARY KEY AUTO_INCREMENT,
  room_id INT NOT NULL,
  student_id VARCHAR(20) NOT NULL, -- DLSU ID Number
  res_date DATE NOT NULL,
  time_start TIME NOT NULL,
  time_end TIME NOT NULL,
  status ENUM('Pending', 'Reserved', 'Rejected') DEFAULT 'Pending',
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (room_id) REFERENCES rooms(room_id) ON DELETE CASCADE
);

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(3, 'admin', 'admin@gmail.com', '$2y$10$1Jdp0pA0lUM7QUp4nEbvEOI/VcYmDO/EzHI9iD6LXtqpmWkc2l7NK', 'admin');

-- 
-- Dumping data for table 'rooms'
--

INSERT INTO 'rooms' ('building_name', 'floor_level', 'room_number') VALUES
-- Gokongwei (GK)
('GK', 1, '01'), ('GK', 1, '02'), ('GK', 1, '03'),
('GK', 2, '01'), ('GK', 2, '02'), ('GK', 2, '03'), 
-- Andrew Gonzales (AG)
('AG', 1, '01'), ('AG', 1, '02'), ('AG', 1, '03'), 
('AG', 2, '01'), ('AG', 2, '02'), ('AG', 2, '03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;