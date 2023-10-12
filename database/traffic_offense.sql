-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 25, 2022 at 11:00 AM
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
-- Database: `traffic_offense`
--

-- --------------------------------------------------------

--
-- Table structure for table `drivers_list`
--

CREATE TABLE `drivers_list` (
  `id` int(30) NOT NULL,
  `age` varchar(100) NOT NULL,
  `name` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 1 COMMENT '1 = active, 2 = suspended, 3 = banned',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drivers_list`
--

INSERT INTO `drivers_list` (`id`, `age`, `name`, `status`, `date_created`, `date_updated`) VALUES
(1, '45', 'Smith, Johnny D', 1, '2021-08-19 10:45:48', '2022-10-23 02:18:51'),
(4, '22', 'Blake, Claire C', 1, '2021-08-19 14:56:09', '2022-10-23 02:24:09'),
(6, '54', 'Baalsrud, Jan Hyenhygy', 1, '2022-06-06 21:50:42', '2022-10-23 02:19:23'),
(7, '22', 'Musashi, Ayami Koshimi', 1, '2022-06-28 18:05:05', '2022-10-23 02:13:28'),
(8, '24', 'Oyasumi, Kenneth Musashi', 1, '2022-10-18 18:37:36', NULL),
(9, '32', 'Yamato, Nobunaga Kirishima', 1, '2022-10-18 18:39:06', NULL),
(10, '29', 'Yamashita, Gregory Kolls', 1, '2022-10-18 20:04:03', NULL),
(11, '23', 'Mary, Desmond Orlando', 1, '2022-10-24 19:13:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `drivers_meta`
--

CREATE TABLE `drivers_meta` (
  `id` int(11) NOT NULL,
  `driver_id` int(30) DEFAULT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL,
  `date_updated` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `drivers_meta`
--

INSERT INTO `drivers_meta` (`id`, `driver_id`, `meta_field`, `meta_value`, `date_updated`) VALUES
(1, 4, 'age', 'GBN-10140715', '2021-08-19 14:56:09'),
(2, 4, 'lastname', 'Blake', '2021-08-19 14:56:09'),
(3, 4, 'firstname', 'Claire', '2021-08-19 14:56:09'),
(4, 4, 'middlename', 'C', '2021-08-19 14:56:09'),
(5, 4, 'dob', '1992-10-14', '2021-08-19 14:56:09'),
(6, 4, 'present_city', 'Caloocan City', '2022-10-22 19:53:00'),
(7, 4, 'permanent_address', 'Sample Address 123', '2021-08-19 14:56:09'),
(8, 4, 'sex', 'female', '2022-10-24 19:18:50'),
(9, 4, 'age', '25', '2022-10-24 19:19:00'),
(10, 4, 'contact', '09123789456', '2021-08-19 14:56:09'),
(11, 4, 'license_type', 'Non-Professional', '2021-08-19 14:56:09'),
(12, 4, 'image_path', '', '2021-08-19 14:56:09'),
(13, 4, 'driver_id', '4', '2021-08-19 14:56:09'),
(14, 4, 'image_path', 'uploads/drivers/4.jpg', '2021-08-19 14:56:09'),
(15, 8, 'lastname', 'Oyasumi', '2022-10-18 18:37:36'),
(16, 8, 'firstname', 'Kenneth', '2022-10-18 18:37:36'),
(17, 8, 'middlename', 'Musashi', '2022-10-18 18:37:36'),
(18, 8, 'dob', '1993-07-02', '2022-10-18 18:37:36'),
(19, 8, 'present_city', 'Caloocan', '2022-10-18 18:37:36'),
(20, 8, 'permanent_address', 'Caloocan, NCR, Philippines', '2022-10-18 18:37:36'),
(21, 8, 'sex', 'male', '2022-10-18 18:37:36'),
(22, 8, 'age', '24', '2022-10-18 18:37:36'),
(23, 8, 'contact', '0932416161733', '2022-10-18 18:37:36'),
(24, 8, 'license_type', 'Non-Professional', '2022-10-18 18:37:36'),
(25, 8, 'image_path', '', '2022-10-18 18:37:36'),
(26, 8, 'driver_id', '8', '2022-10-18 18:37:36'),
(27, 9, 'lastname', 'Yamato', '2022-10-18 18:39:06'),
(28, 9, 'firstname', 'Nobunaga', '2022-10-18 18:39:06'),
(29, 9, 'middlename', 'Kirishima', '2022-10-18 18:39:06'),
(30, 9, 'dob', '1988-10-28', '2022-10-18 18:39:06'),
(31, 9, 'present_city', 'Marikina', '2022-10-18 18:39:06'),
(32, 9, 'permanent_address', 'Marikina, NCR, Philippines', '2022-10-18 18:39:06'),
(33, 9, 'sex', 'male', '2022-10-18 18:39:06'),
(34, 9, 'age', '32', '2022-10-18 18:39:06'),
(35, 9, 'contact', '0932416341733', '2022-10-18 18:39:06'),
(36, 9, 'license_type', 'Professional', '2022-10-18 18:39:06'),
(37, 9, 'image_path', '', '2022-10-18 18:39:06'),
(38, 9, 'driver_id', '9', '2022-10-18 18:39:06'),
(39, 9, 'image_path', 'uploads/drivers/9.jpg', '2022-10-18 18:39:06'),
(40, 7, 'lastname', 'Musashi', '2022-10-23 02:13:28'),
(41, 7, 'firstname', 'Ayami', '2022-10-23 02:13:28'),
(42, 7, 'middlename', 'Koshimi', '2022-10-23 02:13:28'),
(43, 7, 'dob', '1994-02-09', '2022-10-23 02:13:28'),
(44, 7, 'present_city', 'Caloocan City', '2022-10-23 02:13:28'),
(45, 7, 'permanent_address', 'Valenzuela City', '2022-10-23 02:13:28'),
(46, 7, 'sex', 'female', '2022-10-23 02:13:28'),
(47, 7, 'age', '22', '2022-10-23 02:13:28'),
(48, 7, 'contact', '0932416153', '2022-10-23 02:13:28'),
(49, 7, 'license_type', 'Non-Professional', '2022-10-23 02:13:28'),
(50, 7, 'image_path', '', '2022-10-23 02:13:28'),
(51, 7, 'driver_id', '7', '2022-10-23 02:13:28'),
(52, 1, 'lastname', 'Smith', '2022-10-23 02:18:51'),
(53, 1, 'firstname', 'Johnny', '2022-10-23 02:18:51'),
(54, 1, 'middlename', 'D', '2022-10-23 02:18:51'),
(55, 1, 'dob', '1997-06-23', '2022-10-23 02:18:51'),
(56, 1, 'present_city', 'Valenzuela City', '2022-10-23 02:18:51'),
(57, 1, 'permanent_address', 'Valenzuela, City', '2022-10-23 02:18:51'),
(58, 1, 'sex', 'male', '2022-10-23 02:18:51'),
(59, 1, 'age', '45', '2022-10-23 02:18:51'),
(60, 1, 'contact', '09123456789', '2022-10-23 02:18:51'),
(61, 1, 'license_type', 'Professional', '2022-10-23 02:18:51'),
(62, 1, 'image_path', 'uploads/drivers/1.jpg', '2022-10-23 02:18:51'),
(63, 1, 'driver_id', '1', '2022-10-23 02:18:51'),
(64, 6, 'lastname', 'Baalsrud', '2022-10-23 02:19:23'),
(65, 6, 'firstname', 'Jan', '2022-10-23 02:19:23'),
(66, 6, 'middlename', 'Hyenhygy', '2022-10-23 02:19:23'),
(67, 6, 'dob', '2022-06-06', '2022-10-23 02:19:23'),
(68, 6, 'present_city', 'Taguig City', '2022-10-23 02:19:23'),
(69, 6, 'permanent_address', 'Valenzuela City', '2022-10-23 02:19:23'),
(70, 6, 'sex', 'male', '2022-10-23 02:19:23'),
(71, 6, 'age', '54', '2022-10-23 02:19:23'),
(72, 6, 'contact', '0932416161733', '2022-10-23 02:19:23'),
(73, 6, 'license_type', 'Professional', '2022-10-23 02:19:23'),
(74, 6, 'image_path', '', '2022-10-23 02:19:23'),
(75, 6, 'driver_id', '6', '2022-10-23 02:19:23'),
(76, 10, 'lastname', 'Yamashita', '2022-10-24 18:55:27'),
(77, 10, 'firstname', 'Gregory', '2022-10-24 18:55:27'),
(78, 10, 'middlename', 'Kolls', '2022-10-24 18:55:27'),
(79, 10, 'dob', '1995-08-17', '2022-10-24 18:55:27'),
(80, 10, 'present_city', 'Manila City', '2022-10-24 18:55:27'),
(81, 10, 'permanent_address', 'Manila, NCR, Philippines', '2022-10-24 18:55:27'),
(82, 10, 'sex', 'male', '2022-10-24 19:19:31'),
(83, 10, 'age', '29', '2022-10-24 18:55:27'),
(84, 10, 'contact', '09331149516', '2022-10-24 18:55:27'),
(85, 10, 'license_type', 'Non-Professional', '2022-10-24 18:55:27'),
(86, 10, 'image_path', '', '2022-10-24 18:55:27'),
(87, 10, 'driver_id', '10', '2022-10-24 18:55:27'),
(88, 11, 'lastname', 'Mary', '2022-10-24 19:13:38'),
(89, 11, 'firstname', 'Desmond', '2022-10-24 19:13:38'),
(90, 11, 'middlename', 'Orlando', '2022-10-24 19:13:38'),
(91, 11, 'dob', '2000-07-26', '2022-10-24 19:13:38'),
(92, 11, 'present_city', 'Muntinlupa City', '2022-10-24 19:13:38'),
(93, 11, 'permanent_address', 'Navotas City', '2022-10-24 19:13:38'),
(94, 11, 'sex', 'female', '2022-10-24 19:13:38'),
(95, 11, 'age', '23', '2022-10-24 19:13:38'),
(96, 11, 'contact', '0932416161733', '2022-10-24 19:13:38'),
(97, 11, 'license_type', 'Student', '2022-10-24 19:13:38'),
(98, 11, 'image_path', '', '2022-10-24 19:13:38'),
(99, 11, 'driver_id', '11', '2022-10-24 19:13:38');

-- --------------------------------------------------------

--
-- Table structure for table `offenses`
--

CREATE TABLE `offenses` (
  `id` int(30) NOT NULL,
  `code` varchar(50) NOT NULL,
  `name` text NOT NULL,
  `description` text NOT NULL,
  `fine` float NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 1 COMMENT '0=Inactive, 1=Active',
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp(),
  `color` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offenses`
--

INSERT INTO `offenses` (`id`, `code`, `name`, `description`, `fine`, `status`, `date_created`, `date_updated`, `color`) VALUES
(1, 'OT-1001', 'Driving without License', 'This is a traffic offense for driving without License', 650, 1, '2021-08-19 09:14:43', '2022-06-02 19:55:33', '#0000FF'),
(2, 'TO-1002', 'Running Over Speed Limit', '&lt;p&gt;Sample Traffic offense or violation for over speed limit.&lt;/p&gt;', 1000, 1, '2021-08-19 13:54:51', '2022-06-02 19:56:10', '#FF00FF'),
(3, 'OT-3342', 'Disregarding Traffic Signs', '&lt;p&gt;Disregarding Traffic Signs Violation&amp;nbsp;&lt;/p&gt;', 800, 1, '2022-06-02 19:40:16', '2022-06-02 19:56:51', '#FF0000'),
(4, 'OT-33423', 'Reckless Driving', '&lt;p&gt;Sample Offense&lt;/p&gt;', 10000, 1, '2022-06-02 20:01:18', '2022-10-20 16:57:30', '#FFA500'),
(7, 'OT-5543', 'Illegal Parking', 'Illegal Parking Offense Sample', 3000, 1, '2022-06-02 20:15:14', '2022-06-02 20:26:39', '#557789'),
(8, 'OT-3344', 'Obstruction violation', 'Sample Only', 500, 1, '2022-06-02 20:16:56', NULL, ''),
(9, 'OT-123', 'Truck Ban', '&lt;p&gt;Sample&lt;/p&gt;', 2000, 1, '2022-06-02 20:26:39', NULL, ''),
(10, 'OC-4344', 'Illegal Counterflow', '&lt;p&gt;Sample&lt;/p&gt;', 5000, 1, '2022-06-02 20:27:51', '2022-06-02 20:46:01', '#2ee50d'),
(11, 'OT-65354', 'test', '&lt;p&gt;sample&lt;/p&gt;', 300, 1, '2022-06-02 20:46:01', '2022-06-02 20:46:33', '#8491ec'),
(12, 'OT-65553', 'TETSN', '&lt;p&gt;DKJABSKJF&lt;/p&gt;', 400, 1, '2022-06-02 20:46:33', NULL, ''),
(13, 'OT-777', 'NZBFKJSABFJK', '&lt;p&gt;MNBJSAJF&lt;/p&gt;', 30000, 1, '2022-06-02 20:48:27', NULL, ''),
(14, 'OT-7856735', 'MAS KSF', '&lt;p&gt;NBC BJAS&lt;/p&gt;', 100, 1, '2022-06-02 20:50:07', '2022-06-02 20:51:03', '#340748'),
(15, 'OT-583754', 'LKDFMMKN', '&lt;p&gt;NBFJSABFHA&lt;/p&gt;', 2000, 1, '2022-06-02 20:51:03', NULL, ''),
(16, 'OT-0996858', 'ZCKJXK', '&lt;p&gt;NKDBF OASDHGFCUIEWF&lt;/p&gt;', 300000, 1, '2022-06-02 20:52:40', '2022-06-02 20:52:40', '#ac9f3e');

-- --------------------------------------------------------

--
-- Table structure for table `offense_items`
--

CREATE TABLE `offense_items` (
  `driver_offense_id` int(30) NOT NULL,
  `offense_id` int(30) DEFAULT NULL,
  `fine` float NOT NULL,
  `area` varchar(300) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=paid',
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offense_items`
--

INSERT INTO `offense_items` (`driver_offense_id`, `offense_id`, `fine`, `area`, `status`, `date_created`) VALUES
(1, 1, 650, '', 1, '2021-08-18 15:00:00'),
(1, 2, 1000, '', 1, '2021-08-18 15:00:00'),
(3, 1, 650, '', 0, '2022-05-31 10:20:00'),
(4, 4, 10000, '', 0, '2022-06-02 22:24:00'),
(5, 10, 5000, '', 0, '2022-06-03 02:17:00'),
(6, 10, 5000, '', 0, '2022-06-03 02:19:00'),
(7, 2, 1000, '', 0, '2022-06-03 02:34:00'),
(8, 7, 3000, '', 0, '2022-06-03 02:40:00'),
(10, 7, 3000, '', 0, '2022-10-22 19:17:00'),
(11, 10, 5000, '', 0, '2022-10-23 05:24:00'),
(12, 3, 800, '', 0, '2022-10-23 05:34:00');

-- --------------------------------------------------------

--
-- Table structure for table `offense_list`
--

CREATE TABLE `offense_list` (
  `id` int(30) NOT NULL,
  `driver_id` int(30) NOT NULL,
  `officer_name` text NOT NULL,
  `prone_places` text NOT NULL,
  `ticket_no` text NOT NULL,
  `total_amount` float NOT NULL,
  `remarks` text NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT 0 COMMENT '0=pending, 1=paid',
  `vehicle_type` text NOT NULL,
  `public_or_private` text NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `offense_list`
--

INSERT INTO `offense_list` (`id`, `driver_id`, `officer_name`, `prone_places`, `ticket_no`, `total_amount`, `remarks`, `status`, `vehicle_type`, `public_or_private`, `date_created`, `date_updated`) VALUES
(1, 1, 'George Wilson', 'Maysan', '123456789', 1650, 'Sample Traffic Offense Record Only.', 1, 'Car', 'private', '2021-08-18 15:00:00', '2022-10-22 19:38:34'),
(3, 1, 'John Doe', 'Wawang Pulo', '209843', 650, 'Negative over and out', 0, 'Taxi', 'public', '2022-05-31 10:20:00', '2022-10-22 19:38:34'),
(4, 4, 'Gregory Chant', 'Dalandanan', '56543', 10000, 'Lasing nakainom tas nakadroga', 0, 'Bus', 'public', '2022-06-02 22:24:00', '2022-10-22 19:38:34'),
(5, 4, 'Blake Jayson Turado', 'Dalandanan', '786756454', 5000, '', 0, 'Motorcycle', 'private', '2022-06-03 02:17:00', '2022-10-22 19:38:34'),
(6, 1, 'Ding DOng', 'Dalandanan', '55555555555555555', 5000, 'lhjcjaHFOCIEAWHNCIUEW', 0, 'AUV', 'private', '2022-06-03 02:19:00', '2022-10-22 19:38:34'),
(7, 1, 'Gusion Goddess', 'Karuhatan', 'u8735834584', 1000, 'Ilang beses na nahuli ikulong na salamat', 0, 'Jeepney', 'public', '2022-06-03 02:34:00', '2022-10-22 19:38:34'),
(8, 1, 'Harvey Alipio', 'Maysan', '35356754', 3000, 'Huli ka', 0, 'Van', 'private', '2022-06-03 02:40:00', '2022-10-22 19:38:34'),
(10, 10, 'Gusion Goddess', 'Maysan', '532432', 3000, 'Nagpark sa gitna ng kalsada', 0, 'tricycle', 'public', '2022-10-22 19:17:00', NULL),
(11, 1, 'John Doe', 'Maysan', '747323', 5000, 'Lasing po itong driver na to', 0, 'motorcycle', 'private', '2022-10-23 05:24:00', NULL),
(12, 7, 'Gusion Goddess', 'Lingunan', '33213', 800, 'Walang mata', 0, 'motorcycle', 'private', '2022-10-23 05:34:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `system_info`
--

CREATE TABLE `system_info` (
  `id` int(30) NOT NULL,
  `meta_field` text NOT NULL,
  `meta_value` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_info`
--

INSERT INTO `system_info` (`id`, `meta_field`, `meta_value`) VALUES
(1, 'name', 'Movva - Traffic Offense shit'),
(6, 'short_name', 'Movva - Traffic'),
(11, 'logo', 'uploads/1629334140_traffic_light_logo.png'),
(13, 'user_avatar', 'uploads/user_avatar.jpg'),
(14, 'cover', 'uploads/1629334140_traffic_bg.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(50) NOT NULL,
  `firstname` varchar(250) NOT NULL,
  `lastname` varchar(250) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `avatar` text DEFAULT NULL,
  `last_login` timestamp NULL DEFAULT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 0,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_updated` datetime DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `username`, `password`, `avatar`, `last_login`, `type`, `date_added`, `date_updated`) VALUES
(1, 'Adminstrator', 'Admin', 'admin', '0192023a7bbd73250516f069df18b500', 'uploads/1624240500_avatar.png', '2022-10-25 08:57:30', 1, '2021-01-20 14:02:37', '2022-10-25 16:57:30'),
(9, 'John', 'Smith', 'jsmith', '1254737c076cf867dc53d60a0364f38e', 'uploads/1629336240_avatar.jpg', NULL, 2, '2021-08-19 09:24:25', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `vehicle_color`
--

CREATE TABLE `vehicle_color` (
  `id` int(11) NOT NULL,
  `vehicle_type` varchar(300) NOT NULL,
  `color` varchar(500) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `vehicle_color`
--

INSERT INTO `vehicle_color` (`id`, `vehicle_type`, `color`, `date_created`, `updated_at`) VALUES
(1, 'Bus', 'Blue', '2022-10-22 13:55:42', NULL),
(2, 'Car', 'Red', '2022-10-22 13:55:42', NULL),
(3, 'AUV', 'Orange', '2022-10-22 13:56:49', NULL),
(4, 'Jeepney', 'Violet', '2022-10-22 13:56:49', NULL),
(5, 'Motorcycle', 'Gold', '2022-10-22 13:58:42', NULL),
(6, 'Taxi', 'Chocolate', '2022-10-22 13:58:42', NULL),
(7, 'Trailer', 'Green', '2022-10-22 13:59:21', NULL),
(8, 'Tricycle', 'LightBlue', '2022-10-22 13:59:21', NULL),
(9, 'Truck', 'Coral', '2022-10-22 14:00:23', NULL),
(10, 'Utility', 'Aqua', '2022-10-22 14:00:23', NULL),
(11, 'Van', 'DarkRed', '2022-10-22 14:00:55', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `drivers_list`
--
ALTER TABLE `drivers_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `drivers_meta`
--
ALTER TABLE `drivers_meta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Indexes for table `offenses`
--
ALTER TABLE `offenses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offense_items`
--
ALTER TABLE `offense_items`
  ADD KEY `driver_offense_id` (`driver_offense_id`),
  ADD KEY `offense_id` (`offense_id`);

--
-- Indexes for table `offense_list`
--
ALTER TABLE `offense_list`
  ADD PRIMARY KEY (`id`),
  ADD KEY `driver_id` (`driver_id`);

--
-- Indexes for table `system_info`
--
ALTER TABLE `system_info`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vehicle_color`
--
ALTER TABLE `vehicle_color`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `drivers_list`
--
ALTER TABLE `drivers_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `drivers_meta`
--
ALTER TABLE `drivers_meta`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=100;

--
-- AUTO_INCREMENT for table `offenses`
--
ALTER TABLE `offenses`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `offense_list`
--
ALTER TABLE `offense_list`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `system_info`
--
ALTER TABLE `system_info`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `vehicle_color`
--
ALTER TABLE `vehicle_color`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `drivers_meta`
--
ALTER TABLE `drivers_meta`
  ADD CONSTRAINT `drivers_meta_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `drivers_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Constraints for table `offense_items`
--
ALTER TABLE `offense_items`
  ADD CONSTRAINT `offense_items_ibfk_1` FOREIGN KEY (`driver_offense_id`) REFERENCES `offense_list` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `offense_items_ibfk_2` FOREIGN KEY (`offense_id`) REFERENCES `offenses` (`id`) ON DELETE SET NULL ON UPDATE NO ACTION;

--
-- Constraints for table `offense_list`
--
ALTER TABLE `offense_list`
  ADD CONSTRAINT `offense_list_ibfk_1` FOREIGN KEY (`driver_id`) REFERENCES `drivers_list` (`id`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
