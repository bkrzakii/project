-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 06, 2025 at 03:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hotel_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `amenities`
--

CREATE TABLE `amenities` (
  `id` int(11) NOT NULL,
  `amenity` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `amenities`
--

INSERT INTO `amenities` (`id`, `amenity`) VALUES
(0, 'WiFi'),
(1, 'AirConditioning'),
(2, 'TV'),
(3, 'BreakfastInclude'),
(4, 'Elevator'),
(5, 'PetsAllows'),
(6, 'Bathroom'),
(7, 'RoomService'),
(8, '24hReception'),
(9, 'Parking'),
(10, 'Housekeeping');

-- --------------------------------------------------------

--
-- Table structure for table `bissness_users`
--

CREATE TABLE `bissness_users` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pswd` varchar(255) NOT NULL,
  `phoneNbr` int(20) DEFAULT NULL,
  `verification_image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bissness_users`
--

INSERT INTO `bissness_users` (`id`, `username`, `email`, `pswd`, `phoneNbr`, `verification_image`) VALUES
(17, 'firasse_jr', 'firasse662@gmail.com', '$2y$10$MITBuEu6LYrGN39sbWp0zOL4BgpL4tzcQUFHxM359k.W.NNyPCHbu', 1234567890, '../../pics/uploads/verification/681953216b516_Screenshot 2025-04-27 133446.png'),
(18, 'zakii', 'zakii@gmail.com', '$2y$10$gkGY0Qfh0vSrki8S.mJHhe6Y/WLUJOfx7PT6H9NmUsPu4MZSeJfD.', NULL, NULL),
(20, 'houssem sadi', 'houssem@gmail.com', '$2y$10$qM50jfmwm2wB2CeNMOW5LOHJv0dIMga9xoQ1hubai71A9pJzsiNIO', 553856533, '../../pics/uploads/verification/6818d0a0666be_IRI3.png'),
(21, 'anes', 'anes@gmail.com', '$2y$10$qM50jfmwm2wB2CeNMOW5LOHJv0dIMga9xoQ1hubai71A9pJzsiNIO', NULL, NULL),
(22, 'ryad', 'ryad@gmail.com', '$2y$10$i/.KO1428s7aXcLtI8A8UeM/9mnTiC64E5dJrvdiNS2/fnZKiHFVu', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `Fname` varchar(20) DEFAULT NULL,
  `Lname` varchar(20) DEFAULT NULL,
  `NumPhone` int(10) DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `NumRoom` int(11) NOT NULL,
  `dateFrom` date DEFAULT NULL,
  `dateTo` date DEFAULT NULL,
  `DateOfBooking` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_price` int(20) NOT NULL,
  `booking_status` enum('pending','accepted','refused') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `hotel_id`, `Fname`, `Lname`, `NumPhone`, `email`, `NumRoom`, `dateFrom`, `dateTo`, `DateOfBooking`, `total_price`, `booking_status`) VALUES
(69, 45, 'sadii ', 'firasse', 541287753, 'firasse662@gmail.com', 120, '2025-05-14', '2025-05-27', '2025-05-06 00:13:56', 65000, 'pending'),
(70, 45, 'zaki', 'bkr', 2147483647, 'zakii@gmail.com', 121, '2025-05-01', '2025-05-22', '2025-05-06 00:26:34', 315000, 'pending'),
(71, 46, 'zaki', 'bkr', 2147483647, 'zakii@gmail.com', 123, '2025-05-12', '2025-06-05', '2025-05-06 00:26:57', 120000, 'pending'),
(72, 46, 'salhi', 'nabil', 74125896, 'zakii@gmail.com', 125, '2025-05-28', '2025-06-03', '2025-05-06 00:27:20', 18000, 'pending');

-- --------------------------------------------------------

--
-- Table structure for table `features`
--

CREATE TABLE `features` (
  `id` int(11) NOT NULL,
  `feature` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `features`
--

INSERT INTO `features` (`id`, `feature`) VALUES
(0, 'Beach Access'),
(1, 'Private Pool'),
(2, 'Live Events'),
(3, 'Gym / Fitness'),
(4, 'Kids Activities'),
(5, 'Cooking Classes'),
(6, 'Hiking Trails Nearby'),
(7, 'Night Entertainment'),
(8, 'Guided Tours (city or nature)'),
(9, 'Yoga / Wellness Sessions'),
(10, 'Water Sports (Jet ski, kayak…)'),
(11, 'Spa / Massage Treatments'),
(12, 'Special Events (weddings, concerts…)');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_image`
--

CREATE TABLE `hotel_image` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_image`
--

INSERT INTO `hotel_image` (`id`, `hotel_id`, `image_path`) VALUES
(65, 45, '../../pics/uploads/hotel/6818d0be69bed_image1.jpg'),
(66, 45, '../../pics/uploads/hotel/6818d0be6b16a_image2.jpg'),
(67, 45, '../../pics/uploads/hotel/6818d0be6c31a_image3.jpg'),
(68, 45, '../../pics/uploads/hotel/6818d0be6d4db_image4.jpg'),
(69, 46, '../../pics/uploads/hotel/6819538179a51_image2.jpg'),
(70, 46, '../../pics/uploads/hotel/681953817aa6d_image3.jpg'),
(71, 46, '../../pics/uploads/hotel/681953817bc14_img3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_info`
--

CREATE TABLE `hotel_info` (
  `id` int(11) NOT NULL,
  `hotel_name` varchar(20) DEFAULT NULL,
  `hotel_email` varchar(20) DEFAULT NULL,
  `hotel_phoneNbr` int(20) DEFAULT NULL,
  `hotel_address` varchar(200) DEFAULT NULL,
  `hotel_description` varchar(200) DEFAULT NULL,
  `rooms_total` bigint(255) DEFAULT NULL,
  `rooms` varchar(255) DEFAULT NULL,
  `features` varchar(20) DEFAULT NULL,
  `hotel_rate` float DEFAULT NULL,
  `ratings` int(11) NOT NULL,
  `hotel_owner` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_info`
--

INSERT INTO `hotel_info` (`id`, `hotel_name`, `hotel_email`, `hotel_phoneNbr`, `hotel_address`, `hotel_description`, `rooms_total`, `rooms`, `features`, `hotel_rate`, `ratings`, `hotel_owner`) VALUES
(45, 'hostel', 'hostel@gmail.com', 24183390, 'boumerdes', '', 200, '120,121', '0,3,6,9,12', 9, 2, 20),
(46, 'firasse', 'sadi@gmail.com', 24826887, 'oran', 'firasse description ', 300, '122,123,124,125', '0,3,4,8,10,12', 6, 2, 17);

-- --------------------------------------------------------

--
-- Table structure for table `room_images`
--

CREATE TABLE `room_images` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `image_path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_images`
--

INSERT INTO `room_images` (`id`, `room_id`, `image_path`) VALUES
(80, 117, '../../pics/uploads/rooms/6818cc7d7b92d_3.jpg'),
(81, 118, '../../pics/uploads/rooms/6818cc7d7cd7f_img5.jpeg'),
(82, 119, '../../pics/uploads/rooms/6818cc7d7e731_1.jpg'),
(83, 119, '../../pics/uploads/rooms/6818cc7d7f57a_3.jpg'),
(84, 120, '../../pics/uploads/rooms/6818d0f675063_1.jpg'),
(85, 120, '../../pics/uploads/rooms/6818d0f676faf_2.jpg'),
(86, 120, '../../pics/uploads/rooms/6818d0f6784f5_3.jpg'),
(87, 120, '../../pics/uploads/rooms/6818d0f679a34_4.jpg'),
(88, 121, '../../pics/uploads/rooms/6818d0f67b3c3_img3.jpeg'),
(89, 121, '../../pics/uploads/rooms/6818d0f67c6ea_img4.jpeg'),
(90, 121, '../../pics/uploads/rooms/6818d0f67d9b2_img5.jpeg'),
(91, 122, '../../pics/uploads/rooms/681953ed0c60d_4.jpg'),
(92, 122, '../../pics/uploads/rooms/681953ed0d66a_5.jpg'),
(93, 122, '../../pics/uploads/rooms/681953ed0e779_img5.jpeg'),
(94, 123, '../../pics/uploads/rooms/681953ed11375_1.jpg'),
(95, 123, '../../pics/uploads/rooms/681953ed124a9_4.jpg'),
(96, 123, '../../pics/uploads/rooms/681953ed13701_image1.jpg'),
(97, 124, '../../pics/uploads/rooms/681953ed14d98_3.jpg'),
(98, 124, '../../pics/uploads/rooms/681953ed15bd0_img3.jpeg'),
(99, 124, '../../pics/uploads/rooms/681953ed1760e_img4.jpeg'),
(100, 125, '../../pics/uploads/rooms/681953ed18ead_image1.jpg'),
(101, 125, '../../pics/uploads/rooms/681953ed1a44d_image3.jpg'),
(102, 125, '../../pics/uploads/rooms/681953ed1b5c2_img3.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `room_info`
--

CREATE TABLE `room_info` (
  `id` int(11) NOT NULL,
  `room_type` varchar(20) DEFAULT NULL,
  `room_capacity` int(20) DEFAULT NULL,
  `amenities` varchar(11) DEFAULT NULL,
  `room_price` int(20) DEFAULT NULL,
  `matching_rooms` int(20) DEFAULT NULL,
  `hotel_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_info`
--

INSERT INTO `room_info` (`id`, `room_type`, `room_capacity`, `amenities`, `room_price`, `matching_rooms`, `hotel_id`) VALUES
(117, 'Single', 1, '0,1,2,4,5,1', 7600, 10, 43),
(118, 'Single', 2, '0,1,2', 6000, 7, 43),
(119, 'Suite', 3, '0,1,2,3,4,5', 15000, 5, 43),
(120, 'Single', 1, '0,2,3', 5000, 10, 45),
(121, 'Suite', 4, '0,1,2,3,4,5', 15000, 3, 45),
(122, 'Single', 1, '0,4,5', 4000, 10, 46),
(123, 'Single', 0, '0,1,6,7,8', 5000, 5, 46),
(124, 'Suite', 4, '5,7,9,10', 0, 0, 46),
(125, 'Double', 2, '0,2,4,8', 3000, 70, 46);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bissness_users`
--
ALTER TABLE `bissness_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`),
  ADD KEY `NumRoom` (`NumRoom`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_image`
--
ALTER TABLE `hotel_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `hotel_info`
--
ALTER TABLE `hotel_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_owner` (`hotel_owner`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `room_info`
--
ALTER TABLE `room_info`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hote_id` (`hotel_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bissness_users`
--
ALTER TABLE `bissness_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `hotel_image`
--
ALTER TABLE `hotel_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `hotel_info`
--
ALTER TABLE `hotel_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- AUTO_INCREMENT for table `room_info`
--
ALTER TABLE `room_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=126;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel_info` (`id`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`NumRoom`) REFERENCES `room_info` (`id`);

--
-- Constraints for table `hotel_image`
--
ALTER TABLE `hotel_image`
  ADD CONSTRAINT `hotel_image_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel_info` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `room_images`
--
ALTER TABLE `room_images`
  ADD CONSTRAINT `room_images_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `room_info` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
