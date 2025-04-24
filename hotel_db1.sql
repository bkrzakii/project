-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 23, 2025 at 10:46 PM
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
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `phoneNbr` int(20) DEFAULT NULL,
  `verification_image` varchar(200) DEFAULT NULL,
  `hotel_id` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `bissness_users`
--

INSERT INTO `bissness_users` (`id`, `username`, `email`, `phoneNbr`, `verification_image`, `hotel_id`) VALUES
(1, 'zaki', 'zaki@gmail.com', 541678283, 'uploads/verification1.jpg', 1),
(2, 'firasse', 'sadi@gmail.com', 540418730, 'uploads/verification2.jpg', 2),
(3, 'nabil', 'nabil@gmail.com', 54747523, 'uploads/verification3.jpg', 3);

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
(1, 1, 'uploads/hotel1_img1.jpg'),
(2, 1, 'uploads/hotel1_img2.jpg'),
(3, 2, 'uploads/hotel2_img1.jpg'),
(4, 2, 'uploads/hotel2_img2.jpg'),
(5, 3, 'uploads/hotel3_img1.jpg'),
(6, 3, 'uploads/hotel3_img2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `hotel_info`
--

CREATE TABLE `hotel_info` (
  `id` int(11) PRIMARY KEY,
  `hotel_name` varchar(20) DEFAULT NULL,
  `hotel_email` varchar(20) DEFAULT NULL,
  `hotel_phoneNbr` int(20) DEFAULT NULL,
  `hotel_address` varchar(200) DEFAULT NULL,
  `hotel_description` varchar(200) DEFAULT NULL,
  `rooms_total` bigint(255) DEFAULT NULL,
  `rooms` varchar(20) DEFAULT NULL,
  `features` varchar(20) DEFAULT NULL,
  `hotel_rate` float DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `hotel_info`
--

INSERT INTO `hotel_info` (`id`, `hotel_name`, `hotel_email`, `hotel_phoneNbr`, `hotel_address`, `hotel_description`, `rooms_total`, `rooms`, `features`, `hotel_rate`) VALUES
(1, 'holte1', 'hotel1@gmail.com', 100000, 'bounmerdes', 'hotel1 description', 100, '1,2,3', '0,1,2,11,10,4', 5),
(2, 'holte2', 'hotel2@gmail.com', 111111, 'bounmerdes', 'hotel2 description', 200, '4,5,6', '3,4,5,11,7,12', 4.2),
(3, 'holte3', 'hotel3@gmail.com', 222222, 'bounmerdes', 'hotel3 description', 500, '7,8,9', '0,1,2,3,4,5,6,7,8,9', 2.1);

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
(1, 1, 'uploads/room1_img1.jpg'),
(2, 1, 'uploads/room1_img2.jpg'),
(3, 2, 'uploads/room2_img1.jpg'),
(4, 2, 'uploads/room2_img2.jpg'),
(5, 3, 'uploads/room3_img1.jpg'),
(6, 3, 'uploads/room3_img2.jpg'),
(7, 4, 'uploads/room4_img1.jpg'),
(8, 4, 'uploads/room4_img2.jpg'),
(9, 5, 'uploads/room5_img1.jpg'),
(10, 5, 'uploads/room5_img2.jpg'),
(11, 6, 'uploads/room6_img1.jpg'),
(12, 6, 'uploads/room6_img2.jpg'),
(13, 7, 'uploads/room7_img1.jpg'),
(14, 7, 'uploads/room7_img2.jpg'),
(15, 8, 'uploads/room8_img1.jpg'),
(16, 8, 'uploads/room8_img2.jpg'),
(17, 9, 'uploads/room9_img1.jpg'),
(18, 9, 'uploads/room9_img2.jpg'),
(19, 10, 'uploads/room10_img1.jpg'),
(20, 10, 'uploads/room10_img2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `room_info`
--

CREATE TABLE `room_info` (
  `id` int(11) PRIMARY KEY,
  `room_type` varchar(20) DEFAULT NULL,
  `room_capacity` int(20) DEFAULT NULL,
  `amenities` varchar(11) DEFAULT NULL,
  `room_price` int(20) DEFAULT NULL,
  `matching_rooms` int(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `room_info`
--

INSERT INTO `room_info` (`id`, `room_type`, `room_capacity`, `amenities`, `room_price`, `matching_rooms`) VALUES
(1, 'single room', 1, '1,2,4', 100, NULL),
(2, 'double room', 2, '2,5,7,10', 200, NULL),
(3, 'triple room', 3, '0,1,2,3,4,5', 300, NULL),
(4, 'quad room', 4, '10,5,8,9', 400, NULL),
(5, 'suite room', 5, '3,1,0,10', 500, NULL),
(6, 'family room', 6, '8,6,9', 600, NULL),
(7, 'deluxe room', 7, '3,7,9,0', 700, NULL),
(8, 'presidential suite', 8, '1,0,5', 800, NULL),
(9, 'honeymoon suite', 9, '0,1,2,8,9,1', 900, NULL),
(10, 'business suite', 10, '0,1,2,5,7', 1000, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) PRIMARY KEY AUTO_INCREMENT NOT NULL,
  `username` varchar(20) DEFAULT NULL,
  `email` varchar(20) DEFAULT NULL,
  `pswd` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `pswd`) VALUES
(1, 'zaki', 'zaki@gmail.com', 'zakii'),
(2, 'firasse', 'sadi@gmail.com', 'sadi'),
(3, 'gg', 'gg@gmail.com', 'gg'),
(4, 'g', 'g@gmail.com', 'g'),
(5, 'gl', 'gl@gmail.com', 'gl');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `id` int(11) PRIMARY KEY,
  `hotel_id` int(11) NOT NULL,
  `Fname` varchar(20) DEFAULT NULL,
  `Lname` varchar(20) DEFAULT NULL,
  `NumPhone` int(10) DEFAULT NULL,
  `NumRoom` int(11) NOT NULL,
  `dateFrom` date,
  `dateTo` date,
  `DateOfBooking` timestamp NOT NULL DEFAULT current_timestamp(),
  
  FOREIGN KEY (`hotel_id`) REFERENCES `hotel_info`(`id`),
  FOREIGN KEY (`NumRoom`) REFERENCES `room_info`(`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`id`, `Fname`, `Lname`, `NumPhone`, `NumRoom`, `dateFrom`, `dateTo`, `DateOfBooking`, `hotel_id`) VALUES
(1, 'boukrouna', 'zakaria', 4444444,'1', '2025-04-20', '2025-05-01', '2025-04-23 22:14:22','1'),
(2, 'boukrouna', 'zakaria', 4444444,'2', '2025-04-20', '2025-05-01', '2025-04-23 22:14:22','1'),
(3, 'boukrouna', 'zakaria', 4444444,'3', '2025-04-20', '2025-05-01', '2025-04-23 22:14:22','2'),
(4, 'boukrouna', 'zakaria', 4444444,'4', '2025-04-20', '2025-05-01', '2025-04-23 22:14:22','3');

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
  ADD PRIMARY KEY (`id`),
  ADD KEY `hotel_id` (`hotel_id`);

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
-- Indexes for table `room_images`
--
ALTER TABLE `room_images`
  ADD PRIMARY KEY (`id`),
  ADD KEY `room_id` (`room_id`);


--
-- Indexes for table `user`
-
--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `hotel_image`
--
ALTER TABLE `hotel_image`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `room_images`
--
ALTER TABLE `room_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bissness_users`
--
ALTER TABLE `bissness_users`
  ADD CONSTRAINT `bissness_users_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel_info` (`id`);

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
