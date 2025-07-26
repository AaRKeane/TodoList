-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2025 at 08:31 AM
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
-- Database: `db_todo`
--

-- --------------------------------------------------------

--
-- Table structure for table `tasks`
--

CREATE TABLE `tasks` (
  `task_id` int(11) NOT NULL,
  `task_todo` text NOT NULL,
  `task_status` varchar(50) NOT NULL DEFAULT 'unfinished',
  `created_at` datetime NOT NULL DEFAULT curtime(),
  `updated_at` datetime NOT NULL DEFAULT curtime(),
  `is_active` bit(1) NOT NULL DEFAULT b'1'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tasks`
--

INSERT INTO `tasks` (`task_id`, `task_todo`, `task_status`, `created_at`, `updated_at`, `is_active`) VALUES
(38, 'Sample to', 'finished', '2025-07-26 14:12:57', '2025-07-26 14:12:57', b'0'),
(39, 'enter', 'finished', '2025-07-26 14:13:00', '2025-07-26 14:13:00', b'0'),
(40, 'this', 'finished', '2025-07-26 14:13:01', '2025-07-26 14:13:01', b'0'),
(41, 'one', 'finished', '2025-07-26 14:13:02', '2025-07-26 14:13:02', b'0'),
(42, 'The quick brown fox jumps over the Lazy dog', 'finished', '2025-07-26 14:15:21', '2025-07-26 14:15:21', b'0'),
(43, 'a', 'finished', '2025-07-26 14:16:59', '2025-07-26 14:16:59', b'0');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tasks`
--
ALTER TABLE `tasks`
  ADD PRIMARY KEY (`task_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tasks`
--
ALTER TABLE `tasks`
  MODIFY `task_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
