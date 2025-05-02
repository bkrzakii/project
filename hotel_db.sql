-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2025 at 04:40 PM
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
(8, 'boukrouna anes', 'anes@gmail.com', '$2y$10$a3j.HNwwG6NGiYzvnDmGQOesCKjdYx5Gfbp1x/DKfoXr3RSdfr/kS', 1234567890, '../../pics/uploads/68141a5e90b8a_image.png');

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
(1, 1, 'zaki', 'bkr', 540418730, 'boukrounazakaria0@gmail.com', 4, '2025-04-22', '2025-04-22', '2025-04-30 17:12:45', 7800, 'accepted'),
(2, 1, 'sadii', 'firasse', 74125896, '', 1, '2025-07-04', '2025-07-08', '2025-04-30 17:13:41', 6000, 'pending'),
(4, 1, 'salhi', 'nabil', 89632145, '', 8, '2024-07-09', '2030-02-08', '2025-04-30 17:14:37', 5500, 'pending'),
(10, 2, 'salhi', 'firasse', 540418730, '', 2, '2025-04-01', '2025-04-15', '2025-04-30 17:17:37', 4720, 'pending'),
(46, 2, 'salhi', 'firasse', 540418730, '', 2, '2025-04-01', '2025-04-15', '2025-04-30 17:47:21', 7440, 'pending'),
(47, 1, 'zaki', 'nabil', 89632145, '', 4, '2025-04-22', '2025-05-07', '2025-04-30 19:45:27', 10000, 'pending'),
(48, 3, 'anes', 'dd', 1234567, '', 6, '2025-05-14', '2025-05-26', '2025-05-01 16:09:15', 7200, 'pending'),
(49, 38, 'zaki', 'bkr', 540418730, '', 30, '2025-05-01', '2025-05-10', '2025-05-02 01:34:56', 63000, 'accepted'),
(50, 38, 'sadii', 'firasse', 1234567, '', 30, '2025-05-21', '2025-05-27', '2025-05-02 01:43:57', 42000, 'refused'),
(51, 1, 'zaki', 'nabil', 2147483647, 'anes@gmail.com', 8, '2025-05-15', '2025-05-20', '2025-05-02 11:01:18', 4000, 'pending');

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
(1, 1, '1.jpg'),
(3, 2, '1.jpg'),
(5, 3, '1.jpg'),
(7, 4, '2.jpg'),
(10, 29, '../../pics/uploads/6812eac0b209e_Screenshot 2025-04-27 134916.png'),
(11, 29, '../../pics/uploads/6812eac0b5c18_Screenshot 2025-04-27 142011.png'),
(12, 29, '../../pics/uploads/6812eac0b8f93_Screenshot 2025-04-27 145131.png'),
(13, 29, '../../pics/uploads/6812eac0ba4bd_Screenshot 2025-04-28 143712.png'),
(16, 38, '../../pics/uploads/68141cf84666e_Monkey D_ Luffy.jpg');

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
  `hotel_owner` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_info`
--

INSERT INTO `hotel_info` (`id`, `hotel_name`, `hotel_email`, `hotel_phoneNbr`, `hotel_address`, `hotel_description`, `rooms_total`, `rooms`, `features`, `hotel_rate`, `hotel_owner`) VALUES
(1, 'hotel_1', 'hotel1@gmail.com', 100000, 'boumerdes, boumerdes', 'hotel_1 description', 100, '1,2,3', '0,1,2,11,10,4', 5, 0),
(2, 'hotel_2', 'hotel2@gmail.com', 111111, 'alger,bab el oued', 'hotel_2 description', 200, '4,5,6', '3,4,5,11,7,12', 4.2, 0),
(3, 'hotel_3', 'hotel3@gmail.com', 222222, 'oran', 'hotel_3 description', 500, '7,8,9', '0,1,2,3,4,5,6,7,8,9', 2.1, 0),
(4, 'hotel_4', 'hotel4@gmail.com', 55742, 'annaba', 'hotel_4 description', 5000, '7,8', '0,1,2,3,4,5,7,8,9', 3.4, 0),
(29, 'zaza', 'zakii@gmail.com', 1234567890, 'zazaroot', 'zaza', 700, '14,15,16,17,23,26,27', '5,8,11,12', 0, 6),
(38, 'anesHotel', 'anes@gmail.com', 123456789, 'boumerdes, boumerdes, aligo', '', 400, '30', '1,2,5,7,10,12', 4, 8);

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
(1, 1, '1.jpg'),
(2, 1, '2.jpg'),
(3, 2, '1.jpg'),
(4, 2, '2.jpg'),
(5, 3, '1.jpg'),
(6, 3, '2.jpg'),
(7, 4, '1.jpg'),
(8, 4, '2.jpg'),
(9, 5, '1.jpg'),
(10, 5, '2.jpg'),
(11, 6, '1.jpg'),
(12, 6, '2.jpg'),
(13, 7, '1.jpg'),
(14, 7, '2.jpg'),
(15, 8, '1.jpg'),
(16, 8, '2.jpg'),
(17, 9, '1.jpg'),
(18, 9, '2.jpg'),
(19, 10, '1.jpg'),
(20, 10, '2.jpg'),
(21, 1, '1.png'),
(22, 1, '2.png'),
(23, 2, '1.png'),
(24, 2, '2.png'),
(25, 3, '1.png'),
(26, 3, '2.jpg'),
(27, 4, '1.jpg'),
(28, 4, '2.jpg'),
(29, 5, '1.jpg'),
(30, 5, '2.jpg'),
(31, 6, '1.jpg'),
(32, 6, '2.jpg'),
(33, 7, '1.jpg'),
(34, 7, '2.jpg'),
(35, 8, '1.jpg'),
(36, 8, '2.jpg'),
(37, 9, '1.jpg'),
(38, 9, '2.jpg'),
(39, 10, '1.jpg'),
(40, 10, '2.jpg');

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
(1, 'single room', 1, '1,2,4', 100, NULL, 1),
(2, 'double room', 2, '2,5,7,10', 200, NULL, 2),
(3, 'triple room', 3, '0,1,2,3,4,5', 300, NULL, 2),
(4, 'quad room', 4, '10,5,8,9', 400, NULL, 1),
(5, 'suite room', 5, '3,1,0,10', 500, NULL, 1),
(6, 'family room', 6, '8,6,9', 600, NULL, 3),
(7, 'deluxe room', 7, '3,7,9,0', 700, NULL, 3),
(8, 'presidential suite', 8, '1,0,5', 800, NULL, 1),
(9, 'honeymoon suite', 9, '0,1,2,8,9,1', 900, NULL, 1),
(10, 'business suite', 10, '0,1,2,5,7', 1000, NULL, 4),
(14, 'Double', 8, '4,6,7', 700, 8, 29),
(15, 'Single', 4, '5,9', 4000, 40, 29),
(16, 'Suite', 5, '0,1,10', 12000, 10, 29),
(17, 'Double', 1111, '0,2,4,6', 11111, 11111, 29),
(23, 'Double', 40, '7,10', 44444, 88888, 29),
(26, 'Double', 40, '7,10', 44444, 88888, 29),
(27, 'Double', 40, '7,10', 44444, 88888, 29),
(30, 'Suite', 3, '4,7,10', 7000, 13, 38);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `hotel_image`
--
ALTER TABLE `hotel_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `hotel_info`
--
ALTER TABLE `hotel_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `room_info`
--
ALTER TABLE `room_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

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
