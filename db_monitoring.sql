-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jul 18, 2022 at 07:48 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `project`
--

CREATE TABLE `project` (
  `id` int(11) NOT NULL,
  `project_name` varchar(64) NOT NULL,
  `client` varchar(64) NOT NULL,
  `project_leader` varchar(64) NOT NULL,
  `email` varchar(64) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `progress` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `project`
--

INSERT INTO `project` (`id`, `project_name`, `client`, `project_leader`, `email`, `foto`, `start_date`, `end_date`, `progress`) VALUES
(1, 'Project SI Keuangan', 'Bakeuda Prov. KalSel', 'Muhammad Farhan Al-Ghifari', 'farhanalghifari1101@gmail.com', 'neji.png', '2022-07-18', '2022-09-30', 11),
(2, 'Project LMS', 'Ruang Guru', 'Muhammad Rizki Al-Ghifari', 'mrizkiag2710@gmail.com', 'chouji.png', '2022-07-18', '2022-08-12', 44),
(3, 'Project SI Pendataan Atlet Daerah', 'Dispora Jawa Timur', 'Muhammad Halim Fadhlurrahman', 'halimsabar21@gmail.com', 'shikamaru.png', '2022-07-18', '2022-11-25', 100),
(4, 'Project Employee Monitoring', 'PT. Bina Sarana Sukses', 'Aisha Humaira', 'aishahumairaaa@gmail.com', 'kiba.png', '2022-07-18', '2023-03-17', 60);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `project`
--
ALTER TABLE `project`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `project`
--
ALTER TABLE `project`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
