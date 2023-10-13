-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 13, 2023 at 10:02 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `calling_point`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` int(11) NOT NULL,
  `user` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `user`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'ensober', 'ensober', '', '2019-04-21 12:15:15', '0000-00-00 00:00:00'),
(2, 'itinerary', '123456', '', '2019-04-21 12:15:15', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `assign_contacts`
--

CREATE TABLE `assign_contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `contact_type` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `contact_id` int(11) NOT NULL,
  `spoker_id` int(11) NOT NULL,
  `status` enum('ACTIVE','INACTIVE','COMPLETE','CLOSE','FOLLOWUP') DEFAULT 'ACTIVE',
  `follow_up` enum('DONE','NOTDONE') DEFAULT 'NOTDONE',
  `follow_up_date` date DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `favorite_status` enum('favorite','unfavorite','normal') DEFAULT 'normal',
  `type` enum('CREATE','ASSIGN') DEFAULT 'ASSIGN',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `assign_contacts`
--

INSERT INTO `assign_contacts` (`id`, `name`, `mobile`, `email`, `location`, `contact_type`, `source`, `contact_id`, `spoker_id`, `status`, `follow_up`, `follow_up_date`, `website`, `additional_info`, `favorite_status`, `type`, `created_at`, `updated_at`) VALUES
(11, 'Kaneri123', '9974010870', 'travel@holidaykraft.in', 'jhkl;kjh', NULL, 'Operator-NEERAJ_KUMAR', 123, 14, 'ACTIVE', 'NOTDONE', NULL, 'Testhjkl', NULL, 'normal', 'ASSIGN', '2023-10-03 18:00:53', '2023-10-03 18:00:53'),
(10, 'Ajeet Kumar', '8114278805', '485kumarajeet@gmail.com', 'Chanda, Sultanpur', 'Admin', 'Admin', 127, 16, 'FOLLOWUP', 'NOTDONE', '2023-10-13', 'www.ajeet.com', 'Testing 2', 'favorite', 'ASSIGN', '2023-10-13 17:14:26', '2023-10-12 19:28:12'),
(8, 'Ami Kumar', '8114278806', '485kumaramit@gmail.com', 'Koiripr, Sultanpur', 'Vendor', 'Vendr', 128, 16, 'FOLLOWUP', 'DONE', '2023-10-14', 'www.amit.com', 'Testing 3', 'favorite', 'ASSIGN', '2023-10-13 19:03:00', '2023-10-13 19:03:00'),
(9, 'test Update', '81142788044', 'testing12Update@gmail.com', 'A  Update', 'A  Update', 'A Update', 125, 16, 'FOLLOWUP', 'NOTDONE', '2023-10-14', 'A  Update', 'A Update', 'normal', 'ASSIGN', '2023-10-13 19:21:31', '2023-10-13 19:21:31'),
(12, 'Cecily', '512-486-3817', 'cecily@hollack.org', '59 N Groesbeck Hwy', 'Vendor', 'Vendr', 200, 16, 'FOLLOWUP', 'NOTDONE', '2023-10-21', 'www.amit.com', 'Testing 63', 'favorite', 'ASSIGN', '2023-10-13 19:41:15', '2023-10-13 19:41:15'),
(13, 'Carmelina', '303-724-7371', 'carmelina_lindall@lindall.com', '2664 Lewis Rd', 'Direct', 'Direct', 201, 16, 'FOLLOWUP', 'NOTDONE', '2023-10-18', 'www.ashish.com', 'Testing 64', 'normal', 'ASSIGN', '2023-10-13 20:00:53', '2023-10-13 20:00:53'),
(14, 'Maurine', '414-748-1374', 'maurine_yglesias@yglesias.com', '59 Shady Ln #53', 'Admin', 'Admin', 202, 16, 'ACTIVE', 'NOTDONE', NULL, 'www.ajeet.com', 'Testing 65', 'normal', 'ASSIGN', '2023-10-13 19:39:40', '2023-10-13 19:39:40'),
(15, 'Johnetta', '919-225-9345', 'johnetta_abdallah@aol.com', '1088 Pinehurst St', 'Vendor', 'Vendr', 209, 16, 'ACTIVE', 'NOTDONE', NULL, 'www.amit.com', 'Testing 72', 'normal', 'ASSIGN', '2023-10-13 19:39:40', '2023-10-13 19:39:40'),
(16, 'Bobbye', '650-528-5783', 'brhym@rhym.com', '30 W 80th St #1995', 'Direct', 'Direct', 210, 16, 'ACTIVE', 'NOTDONE', NULL, 'www.ashish.com', 'Testing 73', 'normal', 'ASSIGN', '2023-10-13 19:39:40', '2023-10-13 19:39:40'),
(17, 'Micaela', '925-647-3298', 'micaela_rhymes@gmail.com', '20932 Hedley St', 'Admin', 'Admin', 211, 16, 'ACTIVE', 'NOTDONE', NULL, 'www.ajeet.com', 'Testing 74', 'normal', 'ASSIGN', '2023-10-13 19:39:40', '2023-10-13 19:39:40'),
(18, 'Tamar', '740-343-8575', 'tamar@hotmail.com', '2737 Pistorio Rd #9230', 'Vendor', 'Vendr', 212, 16, 'ACTIVE', 'NOTDONE', NULL, 'www.amit.com', 'Testing 75', 'normal', 'ASSIGN', '2023-10-13 19:39:40', '2023-10-13 19:39:40'),
(19, 'Moon', '585-866-8313', 'moon@yahoo.com', '74989 Brandon St', 'Direct', 'Direct', 213, 16, 'ACTIVE', 'NOTDONE', NULL, 'www.ashish.com', 'Testing 76', 'normal', 'ASSIGN', '2023-10-13 19:39:40', '2023-10-13 19:39:40'),
(20, 'Laurel', '410-520-4832', 'laurel_reitler@reitler.com', '6 Kains Ave', 'Admin', 'Admin', 214, 16, 'ACTIVE', 'NOTDONE', NULL, 'www.ajeet.com', 'Testing 77', 'normal', 'ASSIGN', '2023-10-13 19:39:40', '2023-10-13 19:39:40');

-- --------------------------------------------------------

--
-- Table structure for table `contacts`
--

CREATE TABLE `contacts` (
  `id` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `mobile` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `contact_type` varchar(255) DEFAULT NULL,
  `source` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `additional_info` text DEFAULT NULL,
  `status` enum('ACTIVE','INACTIVE') DEFAULT NULL,
  `assigned_status` enum('ASSIGNED','UNASSIGNED') NOT NULL DEFAULT 'UNASSIGNED',
  `created_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `contacts`
--

INSERT INTO `contacts` (`id`, `name`, `mobile`, `email`, `location`, `contact_type`, `source`, `website`, `additional_info`, `status`, `assigned_status`, `created_at`, `updated_at`) VALUES
(122, 'vihaan', '9916433303', 'vihaan@gmail.com', NULL, NULL, 'Operator-NEERAJ_KUMAR', NULL, NULL, 'ACTIVE', 'UNASSIGNED', '2023-10-03 16:57:15', '2023-10-02 18:15:41'),
(123, 'Kaneri123', '9974010870', 'travel@holidaykraft.in', 'jhkl;kjh', NULL, 'Operator-NEERAJ_KUMAR', 'Testhjkl', NULL, 'ACTIVE', 'ASSIGNED', '2023-10-03 18:00:53', '2023-10-03 18:00:53'),
(126, 'Ashish Kumar', '8114278804', '485kumarashish@gmail.com', 'Malhipur, Sultanpur', 'Direct', 'Direct', 'www.ashish.com', 'Testing 1', 'ACTIVE', 'UNASSIGNED', '2023-10-03 16:57:20', '2023-10-02 18:09:23'),
(125, 'test Update', '81142788044', 'testing12Update@gmail.com', 'A  Update', 'A  Update', 'A Update', 'A  Update', 'A Update', 'ACTIVE', 'ASSIGNED', '2023-10-03 17:58:56', '2023-10-03 17:58:56'),
(127, 'Ajeet Kumar', '8114278805', '485kumarajeet@gmail.com', 'Chanda, Sultanpur', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 2', 'ACTIVE', 'ASSIGNED', '2023-10-03 17:58:56', '2023-10-03 17:58:56'),
(128, 'Ami Kumar', '8114278806', '485kumaramit@gmail.com', 'Koiripr, Sultanpur', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 3', 'ACTIVE', 'ASSIGNED', '2023-10-03 17:58:56', '2023-10-03 17:58:56'),
(129, 'Arpit', '8765432190', '485kumararpit@gmail.com', NULL, NULL, NULL, NULL, NULL, 'INACTIVE', 'UNASSIGNED', '2023-10-03 16:57:47', '2023-10-02 18:15:41'),
(136, 'Ami Kumar', '8114278806', '485kumaramit@gmail.com', 'Koiripr, Sultanpur', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 3', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:24:08', '2023-10-13 19:24:08'),
(137, 'Arpit', '8765432190', '485kumararpit@gmail.com', NULL, NULL, NULL, NULL, NULL, 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:24:08', '2023-10-13 19:24:08'),
(138, 'James', '504-621-8927', 'jbutt@gmail.com', '6649 N Blue Gum St', 'Direct', 'Direct', 'www.ashish.com', 'Testing 1', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(139, 'Josephine', '810-292-9388', 'josephine_darakjy@darakjy.org', '4 B Blue Ridge Blvd', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 2', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(140, 'Art', '856-636-8749', 'art@venere.org', '8 W Cerritos Ave #54', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 3', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(141, 'Lenna', '907-385-4412', 'lpaprocki@hotmail.com', '639 Main St', 'Direct', 'Direct', 'www.ashish.com', 'Testing 4', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(142, 'Donette', '513-570-1893', 'donette.foller@cox.net', '34 Center St', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 5', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(143, 'Simona', '419-503-2484', 'simona@morasca.com', '3 Mcauley Dr', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 6', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(144, 'Mitsue', '773-573-6914', 'mitsue_tollner@yahoo.com', '7 Eads St', 'Direct', 'Direct', 'www.ashish.com', 'Testing 7', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(145, 'Leota', '408-752-3500', 'leota@hotmail.com', '7 W Jackson Blvd', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 8', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(146, 'Sage', '605-414-2147', 'sage_wieser@cox.net', '5 Boston Ave #88', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 9', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(147, 'Kris', '410-655-8723', 'kris@gmail.com', '228 Runamuck Pl #2808', 'Direct', 'Direct', 'www.ashish.com', 'Testing 10', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(148, 'Minna', '215-874-1229', 'minna_amigon@yahoo.com', '2371 Jerrold Ave', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 11', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(149, 'Abel', '631-335-3414', 'amaclead@gmail.com', '37275 St  Rt 17m M', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 12', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(150, 'Kiley', '310-498-5651', 'kiley.caldarera@aol.com', '25 E 75th St #69', 'Direct', 'Direct', 'www.ashish.com', 'Testing 13', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(151, 'Graciela', '440-780-8425', 'gruta@cox.net', '98 Connecticut Ave Nw', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 14', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(152, 'Cammy', '956-537-6195', 'calbares@gmail.com', '56 E Morehead St', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 15', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(153, 'Mattie', '602-277-4385', 'mattie@aol.com', '73 State Road 434 E', 'Direct', 'Direct', 'www.ashish.com', 'Testing 16', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(154, 'Meaghan', '931-313-9635', 'meaghan@hotmail.com', '69734 E Carrillo St', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 17', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(155, 'Gladys', '414-661-9598', 'gladys.rim@rim.org', '322 New Horizon Blvd', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 18', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(156, 'Yuki', '313-288-7937', 'yuki_whobrey@aol.com', '1 State Route 27', 'Direct', 'Direct', 'www.ashish.com', 'Testing 19', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(157, 'Fletcher', '815-828-2147', 'fletcher.flosi@yahoo.com', '394 Manchester Blvd', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 20', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(158, 'Bette', '610-545-3615', 'bette_nicka@cox.net', '6 S 33rd St', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 21', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(159, 'Veronika', '408-540-1785', 'vinouye@aol.com', '6 Greenleaf Ave', 'Direct', 'Direct', 'www.ashish.com', 'Testing 22', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(160, 'Willard', '972-303-9197', 'willard@hotmail.com', '618 W Yakima Ave', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 23', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(161, 'Maryann', '518-966-7987', 'mroyster@royster.com', '74 S Westgate St', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 24', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(162, 'Alisha', '732-658-3154', 'alisha@slusarski.com', '3273 State St', 'Direct', 'Direct', 'www.ashish.com', 'Testing 25', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(163, 'Allene', '715-662-6764', 'allene_iturbide@cox.net', '1 Central Ave', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 26', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(164, 'Chanel', '913-388-2079', 'chanel.caudy@caudy.org', '86 Nw 66th St #8673', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 27', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(165, 'Ezekiel', '410-669-1642', 'ezekiel@chui.com', '2 Cedar Ave #84', 'Direct', 'Direct', 'www.ashish.com', 'Testing 28', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(166, 'Willow', '212-582-4976', 'wkusko@yahoo.com', '90991 Thorburn Ave', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 29', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(167, 'Bernardo', '936-336-3951', 'bfigeroa@aol.com', '386 9th Ave N', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 30', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(168, 'Ammie', '614-801-9788', 'ammie@corrio.com', '74874 Atlantic Ave', 'Direct', 'Direct', 'www.ashish.com', 'Testing 31', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(169, 'Francine', '505-977-3911', 'francine_vocelka@vocelka.com', '366 South Dr', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 32', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(170, 'Ernie', '201-709-6245', 'ernie_stenseth@aol.com', '45 E Liberty St', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 33', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(171, 'Albina', '732-924-7882', 'albina@glick.com', '4 Ralph Ct', 'Direct', 'Direct', 'www.ashish.com', 'Testing 34', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(172, 'Alishia', '212-860-1579', 'asergi@gmail.com', '2742 Distribution Way', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 35', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(173, 'Solange', '504-979-9175', 'solange@shinko.com', '426 Wolf St', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 36', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(174, 'Jose', '212-675-8570', 'jose@yahoo.com', '128 Bransten Rd', 'Direct', 'Direct', 'www.ashish.com', 'Testing 37', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(175, 'Rozella', '805-832-6163', 'rozella.ostrosky@ostrosky.com', '17 Morena Blvd', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 38', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(176, 'Valentine', '210-812-9597', 'valentine_gillian@gmail.com', '775 W 17th St', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 39', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(177, 'Kati', '785-463-7829', 'kati.rulapaugh@hotmail.com', '6980 Dorsett Rd', 'Direct', 'Direct', 'www.ashish.com', 'Testing 40', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(178, 'Youlanda', '541-548-8197', 'youlanda@aol.com', '2881 Lewis Rd', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 41', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(179, 'Dyan', '913-413-4604', 'doldroyd@aol.com', '7219 Woodfield Rd', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 42', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(180, 'Roxane', '907-231-4722', 'roxane@hotmail.com', '1048 Main St', 'Direct', 'Direct', 'www.ashish.com', 'Testing 43', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(181, 'Lavera', '305-606-7291', 'lperin@perin.org', '678 3rd Ave', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 44', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(182, 'Erick', '907-741-1044', 'erick.ferencz@aol.com', '20 S Babcock St', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 45', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(183, 'Fatima', '952-768-2416', 'fsaylors@saylors.org', '2 Lighthouse Ave', 'Direct', 'Direct', 'www.ashish.com', 'Testing 46', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(184, 'Jina', '617-399-5124', 'jina_briddick@briddick.com', '38938 Park Blvd', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 47', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(185, 'Kanisha', '323-453-2780', 'kanisha_waycott@yahoo.com', '5 Tomahawk Dr', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 48', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(186, 'Emerson', '608-336-7444', 'emerson.bowley@bowley.org', '762 S Main St', 'Direct', 'Direct', 'www.ashish.com', 'Testing 49', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(187, 'Blair', '215-907-9111', 'bmalet@yahoo.com', '209 Decker Dr', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 50', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(188, 'Brock', '212-402-9216', 'bbolognia@yahoo.com', '4486 W O St #1', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 51', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(189, 'Lorrie', '931-875-6644', 'lnestle@hotmail.com', '39 S 7th St', 'Direct', 'Direct', 'www.ashish.com', 'Testing 52', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(190, 'Sabra', '803-925-5213', 'sabra@uyetake.org', '98839 Hawthorne Blvd #6101', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 53', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(191, 'Marjory', '610-814-5533', 'mmastella@mastella.com', '71 San Mateo Ave', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 54', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(192, 'Karl', '908-877-6135', 'karl_klonowski@yahoo.com', '76 Brooks St #9', 'Direct', 'Direct', 'www.ashish.com', 'Testing 55', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(193, 'Tonette', '516-968-6051', 'twenner@aol.com', '4545 Courthouse Rd', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 56', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(194, 'Amber', '215-934-8655', 'amber_monarrez@monarrez.org', '14288 Foster Ave #4121', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 57', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(195, 'Shenika', '818-423-4007', 'shenika@gmail.com', '4 Otis St', 'Direct', 'Direct', 'www.ashish.com', 'Testing 58', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(196, 'Delmy', '401-458-2547', 'delmy.ahle@hotmail.com', '65895 S 16th St', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 59', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(197, 'Deeanna', '215-211-9589', 'deeanna_juhas@gmail.com', '14302 Pennsylvania Ave', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 60', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(198, 'Blondell', '401-960-8259', 'bpugh@aol.com', '201 Hawk Ct', 'Direct', 'Direct', 'www.ashish.com', 'Testing 61', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:21', '2023-10-13 19:28:21'),
(199, 'Jamal', '732-234-1546', 'jamal@vanausdal.org', '53075 Sw 152nd Ter #615', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 62', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(200, 'Cecily', '512-486-3817', 'cecily@hollack.org', '59 N Groesbeck Hwy', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 63', 'ACTIVE', 'ASSIGNED', '2023-10-13 19:39:40', '2023-10-13 19:39:40'),
(201, 'Carmelina', '303-724-7371', 'carmelina_lindall@lindall.com', '2664 Lewis Rd', 'Direct', 'Direct', 'www.ashish.com', 'Testing 64', 'ACTIVE', 'ASSIGNED', '2023-10-13 19:39:40', '2023-10-13 19:39:40'),
(202, 'Maurine', '414-748-1374', 'maurine_yglesias@yglesias.com', '59 Shady Ln #53', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 65', 'ACTIVE', 'ASSIGNED', '2023-10-13 19:39:40', '2023-10-13 19:39:40'),
(203, 'Tawna', '212-674-9610', 'tawna@gmail.com', '3305 Nabell Ave #679', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 66', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(204, 'Penney', '907-797-9628', 'penney_weight@aol.com', '18 Fountain St', 'Direct', 'Direct', 'www.ashish.com', 'Testing 67', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(205, 'Elly', '814-393-5571', 'elly_morocco@gmail.com', '7 W 32nd St', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 68', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(206, 'Ilene', '410-914-9018', 'ilene.eroman@hotmail.com', '2853 S Central Expy', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 69', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(207, 'Vallie', '208-862-5339', 'vmondella@mondella.com', '74 W College St', 'Direct', 'Direct', 'www.ashish.com', 'Testing 70', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(208, 'Kallie', '415-315-2761', 'kallie.blackwood@gmail.com', '701 S Harrison Rd', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 71', 'ACTIVE', 'ASSIGNED', '2023-10-13 19:38:27', '2023-10-13 19:38:27'),
(209, 'Johnetta', '919-225-9345', 'johnetta_abdallah@aol.com', '1088 Pinehurst St', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 72', 'ACTIVE', 'ASSIGNED', '2023-10-13 19:39:40', '2023-10-13 19:39:40'),
(210, 'Bobbye', '650-528-5783', 'brhym@rhym.com', '30 W 80th St #1995', 'Direct', 'Direct', 'www.ashish.com', 'Testing 73', 'ACTIVE', 'ASSIGNED', '2023-10-13 19:39:40', '2023-10-13 19:39:40'),
(211, 'Micaela', '925-647-3298', 'micaela_rhymes@gmail.com', '20932 Hedley St', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 74', 'ACTIVE', 'ASSIGNED', '2023-10-13 19:39:40', '2023-10-13 19:39:40'),
(212, 'Tamar', '740-343-8575', 'tamar@hotmail.com', '2737 Pistorio Rd #9230', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 75', 'ACTIVE', 'ASSIGNED', '2023-10-13 19:39:40', '2023-10-13 19:39:40'),
(213, 'Moon', '585-866-8313', 'moon@yahoo.com', '74989 Brandon St', 'Direct', 'Direct', 'www.ashish.com', 'Testing 76', 'ACTIVE', 'ASSIGNED', '2023-10-13 19:39:40', '2023-10-13 19:39:40'),
(214, 'Laurel', '410-520-4832', 'laurel_reitler@reitler.com', '6 Kains Ave', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 77', 'ACTIVE', 'ASSIGNED', '2023-10-13 19:39:40', '2023-10-13 19:39:40'),
(215, 'Delisa', '973-354-2040', 'delisa.crupi@crupi.com', '47565 W Grand Ave', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 78', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(216, 'Viva', '773-446-5569', 'viva.toelkes@gmail.com', '4284 Dorigo Ln', 'Direct', 'Direct', 'www.ashish.com', 'Testing 79', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(217, 'Elza', '973-927-3447', 'elza@yahoo.com', '6794 Lake Dr E', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 80', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(218, 'Devorah', '505-975-8559', 'devorah@hotmail.com', '31 Douglas Blvd #950', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 81', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(219, 'Timothy', '718-332-6527', 'timothy_mulqueen@mulqueen.org', '44 W 4th St', 'Direct', 'Direct', 'www.ashish.com', 'Testing 82', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(220, 'Arlette', '904-775-4480', 'ahoneywell@honeywell.com', '11279 Loytan St', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 83', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(221, 'Dominque', '510-993-3758', 'dominque.dickerson@dickerson.org', '69 Marquette Ave', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 84', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(222, 'Lettie', '216-657-7668', 'lettie_isenhower@yahoo.com', '70 W Main St', 'Direct', 'Direct', 'www.ashish.com', 'Testing 85', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(223, 'Myra', '817-914-7518', 'mmunns@cox.net', '461 Prospect Pl #316', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 86', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(224, 'Stephaine', '310-774-7643', 'stephaine@barfield.com', '47154 Whipple Ave Nw', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 87', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(225, 'Lai', '847-728-7286', 'lai.gato@gato.org', '37 Alabama Ave', 'Direct', 'Direct', 'www.ashish.com', 'Testing 88', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(226, 'Stephen', '330-537-5358', 'stephen_emigh@hotmail.com', '3777 E Richmond St #900', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 89', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(227, 'Tyra', '215-255-1641', 'tshields@gmail.com', '3 Fort Worth Ave', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 90', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(228, 'Tammara', '650-803-1936', 'twardrip@cox.net', '4800 Black Horse Pike', 'Direct', 'Direct', 'www.ashish.com', 'Testing 91', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(229, 'Cory', '626-572-1096', 'cory.gibes@gmail.com', '83649 W Belmont Ave', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 92', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(230, 'Danica', '254-782-8569', 'danica_bruschke@gmail.com', '840 15th Ave', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 93', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(231, 'Wilda', '907-870-5536', 'wilda@cox.net', '1747 Calle Amanecer #2', 'Direct', 'Direct', 'www.ashish.com', 'Testing 94', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(232, 'Elvera', '408-703-8505', 'elvera.benimadho@cox.net', '99385 Charity St #840', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 95', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(233, 'Carma', '510-503-7169', 'carma@cox.net', '68556 Central Hwy', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 96', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(234, 'Malinda', '317-722-5066', 'malinda.hochard@yahoo.com', '55 Riverside Ave', 'Direct', 'Direct', 'www.ashish.com', 'Testing 97', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(235, 'Natalie', '307-704-8713', 'natalie.fern@hotmail.com', '7140 University Ave', 'Admin', 'Admin', 'www.ajeet.com', 'Testing 98', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22'),
(236, 'Lisha', '703-235-3937', 'lisha@centini.org', '64 5th Ave #1153', 'Vendor', 'Vendr', 'www.amit.com', 'Testing 99', 'ACTIVE', 'UNASSIGNED', '2023-10-13 19:28:22', '2023-10-13 19:28:22');

-- --------------------------------------------------------

--
-- Table structure for table `followup_contacts`
--

CREATE TABLE `followup_contacts` (
  `id` int(11) NOT NULL,
  `assign_contact_id` int(11) NOT NULL,
  `spoker_id` int(11) NOT NULL,
  `followup_date` date NOT NULL,
  `comment` longtext NOT NULL,
  `flag` enum('0','1') NOT NULL DEFAULT '0',
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `followup_contacts`
--

INSERT INTO `followup_contacts` (`id`, `assign_contact_id`, `spoker_id`, `followup_date`, `comment`, `flag`, `created_at`, `updated_at`) VALUES
(3, 10, 16, '2023-10-13', 'HI testing', '1', '2023-10-12 19:20:51', '2023-10-12 19:20:51'),
(4, 9, 16, '2023-10-13', 'HIii', '1', '2023-10-12 19:24:02', '2023-10-12 19:24:02'),
(5, 9, 16, '2023-10-13', 'HIii', '1', '2023-10-12 19:24:07', '2023-10-12 19:24:07'),
(6, 10, 16, '2023-10-13', 'Live testing', '1', '2023-10-12 19:28:12', '2023-10-12 19:28:12'),
(7, 9, 16, '2023-10-13', 'd', '1', '2023-10-13 17:29:23', '2023-10-13 17:29:23'),
(8, 9, 16, '2023-10-13', 'ok', '1', '2023-10-13 17:29:58', '2023-10-13 17:29:58'),
(9, 9, 16, '2023-10-13', 'ok', '1', '2023-10-13 17:31:29', '2023-10-13 17:31:29'),
(10, 9, 16, '2023-10-13', 'ok', '1', '2023-10-13 17:32:15', '2023-10-13 17:32:15'),
(11, 9, 16, '2023-10-13', 'a', '1', '2023-10-13 17:47:34', '2023-10-13 17:47:34'),
(12, 9, 16, '2023-10-13', 'a', '1', '2023-10-13 17:53:19', '2023-10-13 17:53:19'),
(13, 9, 16, '2023-10-13', 'OK', '1', '2023-10-13 18:06:32', '2023-10-13 18:06:32'),
(14, 9, 16, '2023-10-15', 'asdfghjk', '1', '2023-10-13 18:14:03', '2023-10-13 18:14:03'),
(15, 8, 16, '2023-10-14', 'Follow Testing .', '1', '2023-10-13 19:03:00', '2023-10-13 19:03:00'),
(16, 9, 16, '2023-10-13', 'Go Back testing.', '1', '2023-10-13 19:16:46', '2023-10-13 19:16:46'),
(17, 9, 16, '2023-10-14', 'Today Testing.', '1', '2023-10-13 19:21:31', '2023-10-13 19:21:31'),
(18, 12, 16, '2023-10-21', 'Please Conact me after 20 October', '1', '2023-10-13 19:41:15', '2023-10-13 19:41:15'),
(19, 13, 16, '2023-10-18', 'Future Testing.', '1', '2023-10-13 20:00:53', '2023-10-13 20:00:53');

-- --------------------------------------------------------

--
-- Table structure for table `spokers`
--

CREATE TABLE `spokers` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` enum('ACTIVE','INACTIVE') NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `spokers`
--

INSERT INTO `spokers` (`id`, `name`, `email`, `password`, `status`, `created_at`, `updated_at`) VALUES
(14, 'parvesh', 'info@ensoberhotels.com', '$2y$10$CQNjbmxkwNjk5T0Ytkp.pehaw7F/i7u4VC9MlBRHgDU9LJwGgIMXy', 'ACTIVE', '2021-02-05 05:03:46', '2021-02-05 17:33:46'),
(16, 'Ashish Kumar', '485ashishkumar@gmail.com', '$2y$10$804RwZ.y84GbJR.cISiod.y0fPSKomLM9zq44xHFKzZRZhwBRLHC2', 'ACTIVE', '2023-09-26 17:46:52', '2023-09-26 17:46:52'),
(17, 'Ritesh Shah', 'camprillriver@gmail.com', '$2y$10$y1WeZ2ngP8xBn6NlwzM1AuWvSu2M4n5dK2Wqar9t5d6/99YixB4nO', 'ACTIVE', '2023-09-26 17:28:31', '2023-09-26 17:28:31');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `assign_contacts`
--
ALTER TABLE `assign_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contacts`
--
ALTER TABLE `contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `followup_contacts`
--
ALTER TABLE `followup_contacts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `spokers`
--
ALTER TABLE `spokers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `assign_contacts`
--
ALTER TABLE `assign_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `contacts`
--
ALTER TABLE `contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=237;

--
-- AUTO_INCREMENT for table `followup_contacts`
--
ALTER TABLE `followup_contacts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `spokers`
--
ALTER TABLE `spokers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
