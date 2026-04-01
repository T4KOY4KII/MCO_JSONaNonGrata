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
  `id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` VARCHAR(255) NOT NULL,
  `email` VARCHAR(255) NOT NULL,
  `password` VARCHAR(255) NOT NULL,
  `role` ENUM('user','admin') NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email_unique` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for buildings and rooms (infrastructure)`rooms`
--
CREATE TABLE `rooms` (
  `room_id` INT(11) NOT NULL AUTO_INCREMENT,
  `building_name` VARCHAR(100),
  `room_name` VARCHAR(50),
  `floor_level` INT,
  `capacity` INT,
  `is_active` BOOLEAN DEFAULT TRUE,
  PRIMARY KEY (`room_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for master schedules (admins only)
--
CREATE TABLE `master_schedules` (
  `schedule_id` INT(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `room_id` INT(11) NOT NULL,
  `admin_id` INT(10) UNSIGNED NOT NULL, -- Tracks which admin uploaded this
  `activity_name` VARCHAR(100),
  `day_of_name` ENUM('Mon', 'Tues', 'Wed', 'Thurs', 'Fri', 'Sat', 'Sun'),
  `start_time` TIME,
  `end_time` TIME,
  PRIMARY KEY (`schedule_id`),
  -- Foreign Key Constraints
  CONSTRAINT `fk_room_schedule` 
    FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`) 
    ON DELETE CASCADE ON UPDATE CASCADE,
    
  CONSTRAINT `fk_admin_user` 
    FOREIGN KEY (`admin_id`) REFERENCES `users` (`id`) 
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table for student registrations (students to rooms)
--
CREATE TABLE `registrations` (
  `registration_id` INT PRIMARY KEY AUTO_INCREMENT,
  `user_id` INT UNSIGNED NOT NULL,  -- Links to your users table
  `room_id` INT NOT NULL,
  `booking_date` DATE NOT NULL,
  `day_of_name` ENUM('Mon', 'Tues', 'Wed', 'Thurs', 'Fri', 'Sat', 'Sun'),
  `start_time` TIME NOT NULL,
  `end_time` TIME NOT NULL,
  `booking_status` ENUM('Confirmed', 'Pending', 'Checked-In', 'Cancelled') DEFAULT 'Pending',
  -- Foreign Key Constraints
  CONSTRAINT `fk_reg_user` 
    FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) 
    ON DELETE CASCADE ON UPDATE CASCADE,
    
  -- References room id
  CONSTRAINT `fk_reg_room` 
    FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`) 
    ON DELETE CASCADE ON UPDATE CASCADE
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table structure for 'terms' o manage schedule resets across different academic periods
-- 
CREATE TABLE `terms` (
  `term_id` INT(11) NOT NULL AUTO_INCREMENT,
  `academic_year` VARCHAR(20) NOT NULL, --sample: 2025-2026
  `term_number` ENUM('1', '2', '3') NOT NULL,
  `start_date` DATE NOT NULL,
  `end_date` DATE NOT NULL,
  `status` ENUM('Active', 'Archived', 'Upcoming') DEFAULT 'Upcoming',
  PRIMARY KEY (`term_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Table for system logs / audit logs (monitoring systems)
--
CREATE TABLE `system_logs` (
  `log_id` INT PRIMARY KEY AUTO_INCREMENT,
  `user_id` INT UNSIGNED NOT NULL,
  `user_action` VARCHAR(255),
  `ip_address` VARCHAR(45),
  `timestamp` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  FOREIGN KEY (`user_id`) REFERENCES `users` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- Dumping data for table `users`
--
INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`) VALUES
(3, 'admin', 'admin@gmail.com', '$2y$10$1Jdp0pA0lUM7QUp4nEbvEOI/VcYmDO/EzHI9iD6LXtqpmWkc2l7NK', 'admin');


-- Dumping data for table 'rooms'
--

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
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