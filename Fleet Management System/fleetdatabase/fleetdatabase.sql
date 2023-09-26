-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 11, 2022 at 10:19 PM
-- Server version: 8.0.31
-- PHP Version: 7.4.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fleetdatabase`
--

-- --------------------------------------------------------

--
-- Table structure for table `administrators`
--

CREATE TABLE `administrators` (
  `id` int NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(40) COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `administrators`
--

INSERT INTO `administrators` (`id`, `username`, `password`) VALUES
(1, 'Myuser', 'SA1@123');

-- --------------------------------------------------------

--
-- Table structure for table `fleet`
--

CREATE TABLE `fleet` (
  `id` int NOT NULL,
  `driver` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `pre_driver` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `model` varchar(255) COLLATE utf8mb4_general_ci NOT NULL,
  `fuel_type` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `fuel_capacity` int NOT NULL,
  `registration_num` int NOT NULL,
  `branch` varchar(40) COLLATE utf8mb4_general_ci DEFAULT NULL,
  `depatment` varchar(40) COLLATE utf8mb4_general_ci NOT NULL,
  `vehicle_type` varchar(40) COLLATE utf8mb4_general_ci DEFAULT (_utf8mb4'coupe'),
  `make` varchar(40) COLLATE utf8mb4_general_ci NOT NULL DEFAULT (_utf8mb4'lexus'),
  `written_off` int NOT NULL DEFAULT (1)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `fleet`
--

INSERT INTO `fleet` (`id`, `driver`, `pre_driver`, `model`, `fuel_type`, `fuel_capacity`, `registration_num`, `branch`, `depatment`, `vehicle_type`, `make`, `written_off`) VALUES
(1, 'Jack', 'Jim', 'xm2', 'Other fuel type', 200, 233453, 'Polokwane', 'PLK02', 'suv', 'BMW m2 classic', 0),
(4, 'Max', 'Lowes Luwis', 'lexus turboA234', 'Diesel', 200, 1003432, 'Mokone', 'Polokwane', 'coupe', 'lexus', 1),
(5, 'john', 'mike', '10023xm', 'diesel', 200, 45325345, 'Polokwane', 'Just checking', 'coupe', 'lexus', 1),
(6, 'Micko', 'Rox', '123xm2', 'Dissel', 250, 100343, 'Polokwane', 'PLK02', 'coupe', 'lexus', 1),
(7, 'Rober Downey Jr1', 'Rowdy1', 'mark31', 'compressed Gas1', 1001, 34545451, 'Mallebu Point11', 'IT1', 'coupe', 'lexus', 0),
(9, 'Tom Holland', 'Andrew Garfiled', 'sps4', 'compressed Gas', 100, 456464, 'Qweens', 'Human Resources', 'sedan', 'lexus', 1),
(10, 'Mike', 'Tim', 'Tezlar', 'Deisel', 0, 5432, 'WaKnada', 'IT', 'suv', 'lexus', 1),
(12, 'asdasd', 'asddas', 'SD232', 'compressed Gas', 250, 34282342, 'asdasdasd', 'Human Resources', 'hatchback', 'lexus', 0),
(24, 'asdasd', 'Michael Bond', 'SD232', 'asdasdasdas', 250, 213334, 'Mallebu Point1', 'IT', 'suv', 'lexus', 1),
(25, 'Micko', 'Michael shmidle', 'asddas', 'asdasdasdas', 100, 21423, 'JHB23', 'Human Resources', 'hatchback', 'lexus', 1),
(26, 'ADDD', 'ADDD', 'asddas', 'asdasdasdas', 100, 2142335, 'JHB23', 'Human Resources', 'hatchback', 'lexus', 1),
(27, 'Final', 'final', 'SD232', 'Dissel', 250, 21567, 'Qweens', 'Just checking', 'hatchback', 'lexus', 0),
(28, 'asdasd', 'asddas', 'asddas', 'asdasdasdas', 100, 3423411, 'asdasdasd', 'IT', 'sedan', 'lexus', 1),
(29, 'Zack', 'Tom', 'pegeotA231', 'compressed Gas', 250, 100343223, 'Cape Town Branch', 'Human Resources', '_utf8mb4\\\'coupe\\\'', '_utf8mb4\\\'lexus\\\'', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `administrators`
--
ALTER TABLE `administrators`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fleet`
--
ALTER TABLE `fleet`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registration_num` (`registration_num`);
ALTER TABLE `fleet` ADD FULLTEXT KEY `model` (`model`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `administrators`
--
ALTER TABLE `administrators`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `fleet`
--
ALTER TABLE `fleet`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
