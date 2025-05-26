-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 25, 2025 at 03:15 PM
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
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `booking_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `Fname` varchar(20) DEFAULT NULL,
  `Lname` varchar(20) DEFAULT NULL,
  `NumPhone` int(10) DEFAULT NULL,
  `room_id` int(11) NOT NULL,
  `dateFrom` date DEFAULT NULL,
  `dateTo` date DEFAULT NULL,
  `DateOfBooking` timestamp NOT NULL DEFAULT current_timestamp(),
  `total_price` int(20) NOT NULL,
  `booking_status` enum('pending','accepted','refused') NOT NULL DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `hotel_id` int(11) NOT NULL,
  `hotel_name` varchar(20) DEFAULT NULL,
  `hotel_email` varchar(20) DEFAULT NULL,
  `hotel_phoneNbr` varchar(20) DEFAULT NULL,
  `hotel_address` varchar(200) DEFAULT NULL,
  `hotel_description` varchar(200) DEFAULT NULL,
  `rooms_total` bigint(255) DEFAULT NULL,
  `hotel_rate` float DEFAULT NULL,
  `ratings` int(11) NOT NULL,
  `hotel_owner` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotels`
--

INSERT INTO `hotels` (`hotel_id`, `hotel_name`, `hotel_email`, `hotel_phoneNbr`, `hotel_address`, `hotel_description`, `rooms_total`, `hotel_rate`, `ratings`, `hotel_owner`) VALUES
(45, 'hostel', 'hostel@gmail.com', '24183390', 'boumerdes', '', 200, 9, 2, 20),
(46, 'firasse', 'sadi@gmail.com', '24826887', 'oran', 'firasse description ', 741, 6, 2, 17);

-- --------------------------------------------------------

--
-- Table structure for table `hotel_features`
--

CREATE TABLE `hotel_features` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `feature_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Table structure for table `rooms`
--

CREATE TABLE `rooms` (
  `room_id` int(11) NOT NULL,
  `room_type` varchar(20) DEFAULT NULL,
  `room_capacity` int(20) DEFAULT NULL,
  `room_price` int(20) DEFAULT NULL,
  `matching_rooms` int(20) DEFAULT NULL,
  `hotel_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rooms`
--

INSERT INTO `rooms` (`room_id`, `room_type`, `room_capacity`, `room_price`, `matching_rooms`, `hotel_id`) VALUES
(117, 'Single', 1, 7600, 10, 43),
(118, 'Single', 2, 6000, 7, 43),
(119, 'Suite', 3, 15000, 5, 43),
(120, 'Single', 1, 5000, 10, 45),
(121, 'Suite', 4, 15000, 3, 45),
(122, 'Single', 1, 4000, 10, 46),
(123, 'Single', 0, 5000, 5, 46),
(124, 'Suite', 4, 0, 0, 46),
(125, 'Double', 2, 3000, 70, 46),
(126, 'Double', 741, 41, 854, NULL),
(127, 'Single', 7410, 741, 741, NULL),
(128, 'Single', 7410, 741, 741, NULL),
(129, 'Double', 741, 741, 741, 46),
(130, 'Double', 742, 742, 742, 46),
(131, 'Double', 742, 742, 742, 46),
(132, 'Double', 742, 742, 742, 46),
(133, 'Double', 742, 742, 742, 46);

-- --------------------------------------------------------

--
-- Table structure for table `room_amenities`
--

CREATE TABLE `room_amenities` (
  `id` int(11) NOT NULL,
  `room_id` int(11) NOT NULL,
  `amenity_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_amenities`
--

INSERT INTO `room_amenities` (`id`, `room_id`, `amenity_id`) VALUES
(13, 120, 0),
(14, 120, 1),
(15, 120, 2),
(16, 120, 4),
(17, 120, 6),
(18, 120, 10),
(19, 121, 1),
(20, 121, 3),
(21, 121, 5),
(22, 121, 7),
(23, 121, 8),
(24, 121, 9),
(25, 127, 0),
(26, 127, 2),
(27, 128, 0),
(28, 128, 2),
(29, 129, 7),
(30, 129, 9),
(31, 130, 7),
(32, 130, 8),
(33, 130, 9),
(34, 131, 7),
(35, 131, 8),
(36, 131, 9),
(37, 132, 7),
(38, 132, 8),
(39, 132, 9),
(40, 133, 7),
(41, 133, 8),
(42, 133, 9);

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
(102, 125, '../../pics/uploads/rooms/681953ed1b5c2_img3.jpeg'),
(103, 126, '../../pics/uploads/rooms/6833043b46820_IMG_20240601_145403.jpg'),
(104, 126, '../../pics/uploads/rooms/6833043b48296_IMG_20240601_145428.jpg'),
(105, 126, '../../pics/uploads/rooms/6833043b4929f_IMG_20240601_145444.jpg'),
(106, 127, '../../pics/uploads/rooms/683312154221b_Screenshot 2024-12-28 142932.png'),
(107, 127, '../../pics/uploads/rooms/6833121543e8d_Screenshot 2024-12-28 142948.png'),
(108, 127, '../../pics/uploads/rooms/683312154522b_Screenshot 2024-12-28 160949.png'),
(109, 127, '../../pics/uploads/rooms/68331215462e3_Screenshot 2024-12-28 161003.png'),
(110, 128, '../../pics/uploads/rooms/683312572fb2a_Screenshot 2024-12-28 142932.png'),
(111, 128, '../../pics/uploads/rooms/6833125730d7d_Screenshot 2024-12-28 142948.png'),
(112, 128, '../../pics/uploads/rooms/6833125731deb_Screenshot 2024-12-28 160949.png'),
(113, 128, '../../pics/uploads/rooms/6833125733087_Screenshot 2024-12-28 161003.png'),
(114, 129, '../../pics/uploads/rooms/683312c23c37b_IMG_20240601_150100.jpg'),
(115, 129, '../../pics/uploads/rooms/683312c23d7bb_Screenshot 2024-12-28 162511.png'),
(116, 129, '../../pics/uploads/rooms/683312c23f1ab_Screenshot 2025-01-02 132843.png'),
(117, 130, '../../pics/uploads/rooms/683313e79ee3c_Screenshot 2025-02-24 225652.png'),
(118, 130, '../../pics/uploads/rooms/683313e7a022e_Screenshot 2025-02-24 225859.png'),
(119, 131, '../../pics/uploads/rooms/6833162d097d0_Screenshot 2025-02-24 225652.png'),
(120, 131, '../../pics/uploads/rooms/6833162d0a606_Screenshot 2025-02-24 225859.png'),
(121, 132, '../../pics/uploads/rooms/6833176c23027_Screenshot 2025-02-24 225652.png'),
(122, 132, '../../pics/uploads/rooms/6833176c23e83_Screenshot 2025-02-24 225859.png'),
(123, 133, '../../pics/uploads/rooms/683317a2b0d96_Screenshot 2025-02-24 225652.png'),
(124, 133, '../../pics/uploads/rooms/683317a2b1e40_Screenshot 2025-02-24 225859.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `email` varchar(20) NOT NULL,
  `pswd` varchar(255) NOT NULL,
  `phoneNbr` varchar(20) DEFAULT NULL,
  `verification_image` varchar(200) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `username`, `email`, `pswd`, `phoneNbr`, `verification_image`) VALUES
(17, 'firasse_jr', 'firasse662@gmail.com', '$2y$10$MITBuEu6LYrGN39sbWp0zOL4BgpL4tzcQUFHxM359k.W.NNyPCHbu', '1234567890', '../../pics/uploads/verification/681953216b516_Screenshot 2025-04-27 133446.png'),
(18, 'zakii', 'zakii@gmail.com', '$2y$10$gkGY0Qfh0vSrki8S.mJHhe6Y/WLUJOfx7PT6H9NmUsPu4MZSeJfD.', NULL, NULL),
(20, 'houssem sadi', 'houssem@gmail.com', '$2y$10$qM50jfmwm2wB2CeNMOW5LOHJv0dIMga9xoQ1hubai71A9pJzsiNIO', '553856533', '../../pics/uploads/verification/6818d0a0666be_IRI3.png'),
(21, 'anes', 'anes@gmail.com', '$2y$10$qM50jfmwm2wB2CeNMOW5LOHJv0dIMga9xoQ1hubai71A9pJzsiNIO', NULL, NULL),
(22, 'ryad', 'ryad@gmail.com', '$2y$10$i/.KO1428s7aXcLtI8A8UeM/9mnTiC64E5dJrvdiNS2/fnZKiHFVu', NULL, NULL),
(23, 'halim', 'halim@gmail.com', '$2y$10$XWswtJX.pw2S7KiFaaK8sOzHl0Yy3WYAayBIeK8phWEnsyVk7ZXtS', NULL, NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `amenities`
--
ALTER TABLE `amenities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`booking_id`),
  ADD KEY `fk_booking_users` (`user_id`),
  ADD KEY `fk_booking_rooms` (`room_id`);

--
-- Indexes for table `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`hotel_id`),
  ADD KEY `hotel_owner` (`hotel_owner`);

--
-- Indexes for table `hotel_features`
--
ALTER TABLE `hotel_features`
  ADD PRIMARY KEY (`id`,`hotel_id`,`feature_id`),
  ADD KEY `hotel_id` (`hotel_id`),
  ADD KEY `feature_id` (`feature_id`);

--
-- Indexes for table `hotel_image`
--
ALTER TABLE `hotel_image`
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`);

--
-- Indexes for table `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`room_id`),
  ADD KEY `hote_id` (`hotel_id`);

--
-- Indexes for table `room_amenities`
--
ALTER TABLE `room_amenities`
  ADD PRIMARY KEY (`id`,`room_id`,`amenity_id`),
  ADD KEY `room_id` (`room_id`),
  ADD KEY `amenity_id` (`amenity_id`);

--
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `booking_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=73;

--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `hotel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=47;

--
-- AUTO_INCREMENT for table `hotel_image`
--
ALTER TABLE `hotel_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT for table `rooms`
--
ALTER TABLE `rooms`
  MODIFY `room_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=134;

--
-- AUTO_INCREMENT for table `room_amenities`
--
ALTER TABLE `room_amenities`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=125;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`Room_id`) REFERENCES `rooms` (`room_id`),
  ADD CONSTRAINT `fk_booking_rooms` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`),
  ADD CONSTRAINT `fk_booking_users` FOREIGN KEY (`user_id`) REFERENCES `users` (`user_id`);

--
-- Constraints for table `hotel_features`
--
ALTER TABLE `hotel_features`
  ADD CONSTRAINT `hotel_features_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`hotel_id`),
  ADD CONSTRAINT `hotel_features_ibfk_2` FOREIGN KEY (`feature_id`) REFERENCES `features` (`id`);

--
-- Constraints for table `hotel_image`
--
ALTER TABLE `hotel_image`
  ADD CONSTRAINT `hotel_image_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotels` (`hotel_id`) ON DELETE CASCADE;

--
-- Constraints for table `room_amenities`
--
ALTER TABLE `room_amenities`
  ADD CONSTRAINT `room_amenities_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`),
  ADD CONSTRAINT `room_amenities_ibfk_2` FOREIGN KEY (`amenity_id`) REFERENCES `amenities` (`id`);

--
-- Constraints for table `room_images`
--
ALTER TABLE `room_images`
  ADD CONSTRAINT `room_images_ibfk_1` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`room_id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
