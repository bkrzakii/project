-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 04, 2025 at 05:05 PM
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
(8, 'boukrouna anes', 'anes@gmail.com', '$2y$10$a3j.HNwwG6NGiYzvnDmGQOesCKjdYx5Gfbp1x/DKfoXr3RSdfr/kS', 1234567890, '../../pics/uploads/68141a5e90b8a_image.png'),
(9, 'ryad', 'ryad@gmail.com', '$2y$10$ubcNTN2gGqj4BEYTnq5uyezPLyIaZv1HWqzctO8OINdqw4jQR0w8u', 1234567890, '../../pics/uploads/6815507732262_1.jpg'),
(10, 'zaki', 'zaki@gamail.com', '$2y$10$oxwjoooqalXPm0jriuCLBeghvmxmC0GO9GhUsV.4z4P.AZ35izCve', 123456789, '../../pics/uploads/6816a669a0495_3292.jpg'),
(11, 'zaki', 'zaki@gamail.com', '$2y$10$Wu15z9p3kMLsz6nGZPsIkuGPubS5XkWbYVuNBY7.z//.avpltN4Cm', 541678283, '../../pics/uploads/6816a903c77f1_image3.jpg');

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
(2, 1, 'sadii', 'firasse', 74125896, '', 1, '2025-07-04', '2025-07-08', '2025-04-30 17:13:41', 6000, 'refused'),
(4, 1, 'salhi', 'nabil', 89632145, '', 8, '2024-07-09', '2030-02-08', '2025-04-30 17:14:37', 5500, 'pending'),
(10, 2, 'salhi', 'firasse', 540418730, '', 2, '2025-04-01', '2025-04-15', '2025-04-30 17:17:37', 4720, 'pending'),
(64, 40, 'zaki', 'bkr', 540418730, 'ryad@gmail.com', 64, '2025-05-01', '2025-06-30', '2025-05-03 14:48:14', 60000000, 'pending'),
(65, 1, 'zaki', 'bkr', 540418730, 'zkrzino@gmail.com', 5, '2025-05-08', '2025-05-13', '2025-05-03 23:27:08', 2500, 'pending'),
(66, 1, 'zaki', 'bkr', 541678283, 'zkrzino@gmail.com', 8, '2025-05-06', '2025-05-13', '2025-05-03 23:30:59', 5600, 'pending'),
(67, 42, 'zaki', 'bkr', 2147483647, 'zaki@gamail.com', 93, '2025-05-01', '2025-05-12', '2025-05-03 23:41:05', 44000, 'refused'),
(68, 42, 'zaki', 'bkr', 540418730, 'ryad@gmail.com', 93, '2025-04-30', '2025-05-19', '2025-05-04 14:46:43', 76000, 'pending');

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
(1, 1, '../../pics/image1.jpg'),
(2, 1, '../../pics/image1.jpg'),
(3, 2, '../../pics/image2.jpg'),
(4, 3, '../../pics/image3.jpg'),
(5, 4, '../../pics/image4.jpg'),
(56, 40, '../../pics/uploads/681550a42ef97_img4.jpeg'),
(57, 41, '../../pics/uploads/6816a68663f19_3292.jpg'),
(58, 42, '../../pics/uploads/6816a92f74d3f_img3.jpeg'),
(59, 42, '../../pics/uploads/6816a92f767dc_img4.jpeg'),
(60, 42, '../../pics/uploads/6816a92f785e8_img5.jpeg');

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
(1, 'hotel_1', 'hotel1@gmail.com', 100000, 'boumerdes, boumerdes', 'hotel_1 description', 100, '1,2,3', '0,1,2,11,10,4', 18, 6, 0),
(2, 'hotel_2', 'hotel2@gmail.com', 111111, 'alger,bab el oued', 'hotel_2 description', 200, '4,5,6', '3,4,5,11,7,12', 30, 9, 0),
(3, 'hotel_3', 'hotel3@gmail.com', 222222, 'oran', 'hotel_3 description', 500, '7,8,9', '0,1,2,3,4,5,6,7,8,9', 2.1, 7, 0),
(4, 'hotel_4', 'hotel4@gmail.com', 55742, 'annaba', 'hotel_4 description', 5000, '7,8', '0,1,2,3,4,5,7,8,9', 3.4, 10, 0),
(29, 'zaza', 'zakii@gmail.com', 1234567890, 'zazaroot', 'zaza', 700, '14,15,16,17,23,26,27', '5,8,11,12', 0, 0, 6),
(38, 'anesHotel', 'anes@gmail.com', 123456789, 'boumerdes, boumerdes, aligo', '', 400, '30', '1,2,5,7,10,12', 4, 0, 8),
(40, 'ryadhotel', 'ryad@gmail.com', 45678, 'zazaroot', 'ryad', 0, '38,39,40,41,42,43,44,45,46,47,48,49,50,51,52,53,54,55,56,57,58,59,60,61,62,63,64,65,66,67,68,69,70,71,72,73,74,75,76,77,78,79,80,81,82,83,84,85,86,87,88,89,90,91,92,95,96,97,98,99,100,101,102,103,104,105,106,107,108,109,110,111,112,113,114,115,116', '1', 8, 2, 9),
(41, 'zaki hotel', 'anes@gmail.com', 1234567, 'boumerdes, boumerdes, aligo', '', 234, '94', '10', 0, 0, 10),
(42, 'zakiiHotel', 'zakii@gmail.com', 541678283, 'boumerdes, boumerdes, aligo', '', 400, '93', '0,3,5', 9, 2, 11);

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
(1, 1, '../../pics/image1.jpg'),
(2, 2, '../../pics/image2.jpg'),
(21, 1, '../../pics/image3.jpg'),
(22, 1, '../../pics/image4.jpg'),
(31, 6, '../../pics/image3.jpg'),
(32, 7, '../../pics/image4.jpg'),
(46, 90, '../../pics/uploads/1746281278_14272997.jpg'),
(47, 91, '../../pics/uploads/1746281396_650a18ee-e5d9-49b8-a81c-8afb2fc2a3fe.jpg'),
(48, 91, '../../pics/uploads/1746281396_3292.jpg'),
(49, 91, '../../pics/uploads/1746281396_6615192.jpg'),
(50, 92, '../../pics/uploads/1746281396_14272716.png'),
(51, 92, '../../pics/uploads/1746281396_14272862.jpg'),
(52, 92, '../../pics/uploads/1746281396_14272997.jpg'),
(53, 93, '../../pics/uploads/1746315611_3.jpg'),
(54, 93, '../../pics/uploads/1746315611_image1.jpg'),
(55, 93, '../../pics/uploads/1746315611_img3.jpeg'),
(56, 93, '../../pics/uploads/1746315611_img4.jpeg'),
(57, 93, '../../pics/uploads/1746315611_img5.jpeg'),
(58, 94, '../../pics/uploads/1746316301_5.jpg'),
(59, 97, '../../pics/uploads/rooms/68174cb9e2fc1_img3.jpeg'),
(60, 97, '../../pics/uploads/rooms/68174cb9e4bf5_img4.jpeg'),
(61, 97, '../../pics/uploads/rooms/68174cb9e5a0b_img5.jpeg'),
(62, 98, '../../pics/uploads/rooms/68174d792be14_img1.jpeg'),
(63, 98, '../../pics/uploads/rooms/68174d792d688_img2.jpeg'),
(64, 98, '../../pics/uploads/rooms/68174d792ee57_2.jpg'),
(65, 98, '../../pics/uploads/rooms/68174d79305a7_3.jpg'),
(66, 98, '../../pics/uploads/rooms/68174d7931b49_4.jpg'),
(67, 106, '../../pics/uploads/rooms/681753bbd0542_68141c7a05bc2_14273158.png'),
(68, 107, '../../pics/uploads/rooms/681753e444f0c_6812eac0b209e_Screenshot 2025-04-27 134916.png'),
(69, 108, '../../pics/uploads/rooms/681753e447b1e_68141c7a05bc2_14273158.png'),
(70, 113, '../../pics/uploads/rooms/6817756ddfcbd_6812eac0b5c18_Screenshot 2025-04-27 142011.png'),
(71, 114, '../../pics/uploads/rooms/6817756de1bfb_68141ea4a16fe_Monkey D_ Luffy.jpg'),
(72, 115, '../../pics/uploads/rooms/68177a5561411_68141a5e90b8a_image.png'),
(73, 115, '../../pics/uploads/rooms/68177a5563c46_68141c7a05bc2_14273158.png'),
(74, 115, '../../pics/uploads/rooms/68177a5565974_68141c4805496_Monkey D_ Luffy.jpg'),
(75, 116, '../../pics/uploads/rooms/68177a5568737_68141cf84666e_Monkey D_ Luffy.jpg'),
(76, 116, '../../pics/uploads/rooms/68177a556a35a_68141ea4a16fe_Monkey D_ Luffy.jpg'),
(77, 116, '../../pics/uploads/rooms/68177a556c712_68141775da974_image.png'),
(78, 116, '../../pics/uploads/rooms/68177a556eee4_681417524f645_image.png'),
(79, 116, '../../pics/uploads/rooms/68177a55720bd_6814193662196_image.png');

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
(30, 'Suite', 3, '4,7,10', 7000, 13, 38),
(38, 'Single', 666, '8', 66666666, 6666, 40),
(39, 'Suite', 432, '2,4', 2222, 211, 40),
(40, 'Suite', 44, '3,4', 8890, 0, 40),
(41, 'Double', 333, '6,8', 3333, 3333, 40),
(42, 'Double', 333, '0', 3456, 12, 40),
(43, 'Double', 12345, '3', 12345, 12345, 40),
(44, 'Double', 12345, '0', 12345, 12345, 40),
(45, 'Double', 1234, '8', 12345, 123451234, 40),
(46, 'Single', 123456, '6,8', 123456, 1246, 40),
(47, 'Double', 123456, '4,9', 12345, 12345, 40),
(48, 'Single', 23456, '0,5', 123456, 234567, 40),
(49, 'Single', 123456, '3', 12345, 12345, 40),
(50, 'Single', 1234567, '10', 12345, 123456, 40),
(51, 'Double', 12345, '5', 555555, 55555555, 40),
(52, 'Single', 2345, '8', 7654, 7654, 40),
(53, 'Double', 3456, '5,6', 1234, 12345, 40),
(54, 'Single', 123456, '0,1,2,3', 123456, 123456, 40),
(55, 'Single', 1234, '0,1', 1234, 1234, 40),
(56, 'Double', 987, '0,3', 9870987, 987, 40),
(57, 'Single', 123456, '0', 12345, 123456, 40),
(58, 'Single', 234, '6', 12345, 12345, 40),
(59, 'Single', 12345, '3', 1234, 12345, 40),
(60, 'Double', 234, '0', 1234, 1234, 40),
(61, 'Single', 1234, '6,10', 1234, 123456, 40),
(62, 'Single', 123456, '1,2', 123456, 23456, 40),
(63, 'Single', 1000000, '6,7', 100000, 100000, 40),
(64, 'Single', 10000, '8,9,10', 1000000, 1000000, 40),
(65, 'Single', 1000, '7,8,9', 1000, 1000, 40),
(66, 'Single', 1234, '0', 23456, 12345, 40),
(67, 'Single', 2345, '10', 1234, 1234, 40),
(68, 'Single', 432, '10', 1234, 2345, 40),
(69, 'Single', 400, '10', 400, 400, 40),
(70, 'Single', 11111, '6,8', 11111, 11111, 40),
(71, 'Single', 2222121, '4,6', 11112, 111112, 40),
(72, 'Single', 22, '6', 22, 22, 40),
(73, 'Single', 33, '0', 33, 33, 40),
(74, 'Double', 55, '10', 55, 55, 40),
(75, 'Single', 11, '10', 11, 11, 40),
(76, 'Single', 11, '10', 11, 11, 40),
(77, 'Single', 33, '6', 33, 33, 40),
(78, 'Double', 11, '6', 11, 11, 40),
(79, 'Double', 11, '6', 11, 11, 40),
(80, 'Double', 11, '10', 11, 11, 40),
(81, 'Double', 11, '4', 11, 11, 40),
(82, 'Single', 11, '4', 11, 11, 40),
(83, 'Single', 111, '6', 111, 1111, 40),
(84, 'Single', 55, '4', 55, 55, 40),
(85, 'Single', 55, '4', 55, 55, 40),
(86, 'Single', 55, '4', 55, 55, 40),
(87, 'Single', 11, '0', 11, 11, 40),
(88, 'Single', 11, '0', 11, 11, 40),
(89, 'Single', 11, '0', 11, 11, 40),
(90, 'Single', 11, '0', 11, 11, 40),
(91, 'Suite', 1, '0', 1, 1, 40),
(92, 'Suite', 2, '1', 2, 2, 40),
(93, 'Single', 1, '0,2,4,7', 4000, 10, 42),
(94, 'Double', 4, '0', 3, 3, 41),
(95, 'Suite', 2147483647, '6,8', 11123, 1234, 40),
(96, 'Suite', 541678283, '0', 541678283, 541678283, 40),
(97, 'Double', 4, '10', 23456, 2345, 40),
(98, 'Single', 1, '2', 1, 1, 40),
(99, 'Single', 2, '0', 2, 2, 40),
(100, 'Single', 3, '1', 3, 3, 40),
(101, 'Single', 4, '3', 4, 4, 40),
(102, 'Single', 5, '4', 5, 5, 40),
(103, 'Single', 6, '5', 6, 6, 40),
(104, 'Double', 5, '6', 1, 1, 40),
(105, 'Single', 5, '6', 5, 5, 40),
(106, 'Double', 8, '0', 8, 8, 40),
(107, 'Double', 8, '0', 8, 8, 40),
(108, 'Suite', 8, '8,9', 10, 7, 40),
(109, 'Single', 11, '0', 1, 1, 40),
(110, 'Double', 5, '0,4', 5, 6, 40),
(111, 'Single', 11, '0,6', 1, 1, 40),
(112, 'Single', 11, '4', 1, 1, 40),
(113, 'Single', 3, '4,6', 1, 2, 40),
(114, 'Single', 456, '3,6', 5, 5, 40),
(115, 'Double', 22, '3,4', 3, 3, 40),
(116, 'Double', 4567, '0,5', 62, 2, 40);

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=69;

--
-- AUTO_INCREMENT for table `hotel_image`
--
ALTER TABLE `hotel_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=61;

--
-- AUTO_INCREMENT for table `hotel_info`
--
ALTER TABLE `hotel_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=80;

--
-- AUTO_INCREMENT for table `room_info`
--
ALTER TABLE `room_info`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=117;

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
