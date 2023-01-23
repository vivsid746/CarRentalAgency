-- phpMyAdmin SQL Dump
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


--
-- Database: `carrent`
--

-- --------------------------------------------------------

--
-- Table structure for table `agencies`
--

CREATE TABLE `agencies` (
  `id` int(10) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `agency_name` varchar(25) DEFAULT NULL,
  `agency_email` varchar(25) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agencies`
--

INSERT INTO `agencies` (`id`, `name`, `agency_name`, `agency_email`, `password`, `created_at`, `updated_at`) VALUES
(1, 'vivek', 'Agent', 'vivekagency@gmail.com', '061a01a98f80f415b1431236b62bb10b', '2023-01-21 22:53:44', '2023-01-21 22:53:44');

-- --------------------------------------------------------

--
-- Table structure for table `booked_cars`
--

CREATE TABLE `booked_cars` (
  `id` int(10) NOT NULL,
  `user_id` int(10) DEFAULT NULL,
  `car_id` int(10) DEFAULT NULL,
  `no_of_days` int(10) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `booked_cars`
--

INSERT INTO `booked_cars` (`id`, `user_id`, `car_id`, `no_of_days`, `start_date`, `created_at`, `updated_at`) VALUES
(3, 1, 2, 2, '2023-01-21', '2023-01-21 23:53:44', '2023-01-21 23:53:44'),
(4, 1, 4, 5, '2023-01-21', '2023-01-21 23:55:44', '2023-01-21 23:55:44');

-- --------------------------------------------------------

--
-- Table structure for table `cars`
--

CREATE TABLE `cars` (
  `id` int(10) NOT NULL,
  `vehicle_model` varchar(25) DEFAULT NULL,
  `vehicle_number` varchar(25) DEFAULT NULL,
  `no_of_seats` int(10) DEFAULT NULL,
  `rent_per_day` double DEFAULT NULL,
  `agency_id` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp(),
  `is_available` tinyint(1) DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cars`
--

INSERT INTO `cars` (`id`, `vehicle_model`, `vehicle_number`, `no_of_seats`, `rent_per_day`, `agency_id`, `created_at`, `updated_at`, `is_available`) VALUES
(2, 'kia', 'ev6', 3, 100, 1, '2023-01-21 22:53:44', '2023-01-21 22:53:45', 1),
(3, 'bmw', 'x7', 5, 150, 1, '2023-01-21 22:53:47', '2023-01-21 22:53:48', 0),
(4, 'BYD Atto', '3', 2, 200, 1, '2023-01-21 22:53:44', '2023-01-22 06:32:39', 1),
(5, 'Bmw', 'ix', 2, 310, 1, '2023-01-21 22:53:44', '2023-01-22 09:48:16', 1);
-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `id` int(10) NOT NULL,
  `name` varchar(25) DEFAULT NULL,
  `password` varchar(50) DEFAULT NULL,
  `email` varchar(25) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`id`, `name`, `password`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Vivek Singhal', '061a01a98f80f415b1431236b62bb10b', 'viveksinghal@gmail.com', '2023-01-21 22:50:52', '2023-01-21 22:50:55');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agencies`
--
ALTER TABLE `agencies`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `agency_email` (`agency_email`);

--
-- Indexes for table `booked_cars`
--
ALTER TABLE `booked_cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cars`
--
ALTER TABLE `cars`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `agencies`
--
ALTER TABLE `agencies`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `booked_cars`
--
ALTER TABLE `booked_cars`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `cars`
--
ALTER TABLE `cars`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

