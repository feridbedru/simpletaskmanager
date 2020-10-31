-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 31, 2020 at 07:36 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taskmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `id` int(3) NOT NULL,
  `name` varchar(60) NOT NULL,
  `description` text NOT NULL,
  `due_date` datetime NOT NULL,
  `is_completed` tinyint(1) DEFAULT 0,
  `created_at` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COMMENT='used to store tasks along with their details';

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`id`, `name`, `description`, `due_date`, `is_completed`, `created_at`) VALUES
(1, 'New task', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nunc dapibus vitae lacus et cursus. Suspendisse potenti. Praesent id tempus est, vitae fringilla turpis. Mauris luctus accumsan arcu vel congue. Nulla faucibus interdum mi euismod luctus. Integer a orci est. Morbi at nisi eu ante venenatis vulputate. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed vel ex sed libero condimentum tempus non sed felis. Proin volutpat pulvinar urna, rhoncus posuere sem molestie id. Phasellus varius mattis enim, et hendrerit felis vestibulum ut.', '2020-11-07 00:00:00', 0, '2020-10-31 07:33:58');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `id` int(3) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
