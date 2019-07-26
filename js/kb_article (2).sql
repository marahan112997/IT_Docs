-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 12, 2019 at 05:46 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.3.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kb_article`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblaccounts`
--

CREATE TABLE `tblaccounts` (
  `user_ID` int(11) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `privilege` varchar(100) NOT NULL,
  `team` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblaccounts`
--

INSERT INTO `tblaccounts` (`user_ID`, `firstname`, `lastname`, `fullname`, `email`, `username`, `password`, `privilege`, `team`) VALUES
(1, 'marc', 'arahan', 'marc arahan', 'marc@yahoo.com', 'marc', 'marc', 'Super Admin', 'DSE'),
(2, 'ian', 'lastimoso', 'ian lastimoso', 'ian@gmail.com', 'ian', 'password', 'User', 'Network'),
(3, 'Marlon', 'De Guzman', 'Marlon De Guzman', 'madeguzman@gmail.com', 'marlon', 'marlon', 'User', 'Server'),
(4, 'rovie', 'salvatierra', 'rovie salvatierra', 'rsalvatierra@openaccessmarketing.com', 'rovie', 'rovie', 'Team Leader', 'Server'),
(5, 'Honey', 'De Guzman', 'Honey De Guzman', 'hdeguzman@openaccessbpo.com', 'honey', 'honey', 'User', 'IT Asset'),
(6, 'Jeremiah', 'Nantona', 'Jeremiah Nantona', 'jnantona@openaccessbpo.com', 'jeremiah', 'jeremiah', 'User', 'Site Security'),
(7, 'jim', 'villanueva', 'jim villanueva', 'jim@openaccessbpo.com', 'jim', 'jim', 'Team Leader', 'DSE'),
(8, 'mau', 'mendoza', 'mau mendoza', 'mau@openaccessbpo.com', 'mau', 'mau', 'Team Leader', 'Network'),
(9, 'Rynel ', 'Yanes', 'Rynel  Yanes', 'ryanes@openaccessbpo.net', 'Ryanes', 'Rynel', 'Super Admin', 'Network'),
(10, 'joemil', 'de guzman', 'joemil de guzman', 'jadeguzman@openaccessbpo.net', 'jadeguzman', 'joemil', 'User', 'DSE'),
(11, 'Jeremiah ', 'Nantona', 'Jeremiah  Nantona', 'jnantona@openaccessbpo.net', 'jnantona', 'password', 'User', 'Site Security');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_audittrail`
--

CREATE TABLE `tbl_audittrail` (
  `audit_trail_ID` int(11) NOT NULL,
  `Name` varchar(100) NOT NULL,
  `Date_Time_action` varchar(100) NOT NULL,
  `action` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_audittrail`
--

INSERT INTO `tbl_audittrail` (`audit_trail_ID`, `Name`, `Date_Time_action`, `action`) VALUES
(1, 'marc arahan', '2018-12-05 04:39:26pm', 'Added a KB Article'),
(3, 'marc arahan', '2018-12-05 04:45:10pm', 'Deleted a KB Article'),
(4, 'marc arahan', '2018-12-05 04:45:20pm', 'Deleted a KB Article'),
(5, 'marc arahan', '2018-12-05 04:48:14pm', 'Uploaded a KB Article'),
(6, 'marc arahan', '2019-01-12 01:47:00pm', 'Deleted a KB Article'),
(7, 'marc arahan', '2019-01-12 01:47:46pm', 'Uploaded a KB Article'),
(8, 'marc arahan', '2019-01-12 01:49:47pm', 'Uploaded a KB Article'),
(9, 'marc arahan', '2019-01-12 01:56:17pm', 'Uploaded a KB Article'),
(10, 'marc arahan', '2019-01-12 01:57:50pm', 'Deleted a KB Article'),
(11, 'Marlon De Guzman', '2019-01-12 02:03:09pm', 'Deleted a KB Article'),
(12, 'Marlon De Guzman', '2019-01-12 02:10:51pm', 'Uploaded a KB Article'),
(13, 'Marlon De Guzman', '2019-01-12 02:13:21pm', 'Uploaded a KB Article'),
(14, 'Marlon De Guzman', '2019-01-12 02:13:58pm', 'Uploaded a KB Article'),
(15, 'Marlon De Guzman', '2019-01-12 02:14:25pm', 'Uploaded a KB Article'),
(16, 'Marlon De Guzman', '2019-01-12 02:15:01pm', 'Uploaded a KB Article'),
(17, 'Marlon De Guzman', '2019-01-12 02:15:16pm', 'Uploaded a KB Article'),
(18, 'Marlon De Guzman', '2019-01-12 02:17:11pm', 'Uploaded a KB Article'),
(19, 'Marlon De Guzman', '2019-01-12 03:32:45pm', 'Deleted a KB Article'),
(20, 'marc arahan', '2019-01-29 01:51:33pm', 'Uploaded a KB Article'),
(21, 'marc arahan', '2019-01-29 02:02:26pm', 'Uploaded a KB Article'),
(22, ' ', '2019-01-29 05:24:00pm', 'Added a Account'),
(23, 'marc arahan', '2019-01-29 05:25:52pm', 'Deleted a Account'),
(24, ' ', '2019-01-29 05:26:15pm', 'Added a Account'),
(25, 'marc arahan', '2019-01-29 05:26:55pm', 'Deleted a Account'),
(26, 'marc arahan', '2019-01-29 05:27:18pm', 'Added a Account'),
(27, 'Marlon De Guzman', '2019-01-31 02:52:01pm', 'Uploaded a KB Article'),
(28, 'Marlon De Guzman', '2019-01-31 02:53:42pm', 'Uploaded a KB Article'),
(29, 'Marlon De Guzman', '2019-01-31 02:54:41pm', 'Uploaded a KB Article'),
(30, 'Marlon De Guzman', '2019-01-31 02:55:06pm', 'Uploaded a KB Article'),
(31, 'Marlon De Guzman', '2019-01-31 02:55:13pm', 'Uploaded a KB Article'),
(32, 'Marlon De Guzman', '2019-01-31 02:55:52pm', 'Uploaded a KB Article'),
(33, 'Marlon De Guzman', '2019-01-31 02:56:03pm', 'Uploaded a KB Article'),
(34, 'Marlon De Guzman', '2019-01-31 02:56:37pm', 'Uploaded a KB Article'),
(35, 'Marlon De Guzman', '2019-01-31 02:57:11pm', 'Uploaded a KB Article'),
(36, 'Marlon De Guzman', '2019-02-19', 'Uploaded a KB Article'),
(37, 'marc arahan', '2019-02-19', 'Uploaded a KB Article'),
(38, 'marc arahan', '2019-02-19 02:34:21pm', 'Deleted a KB Article'),
(39, 'marc arahan', '2019-02-19', 'Approved a KB Article'),
(40, 'Marlon De Guzman', '2019-02-20', 'Uploaded a KB Article'),
(41, 'marc arahan', '2019-02-20 05:39:42pm', 'Dispproved a KB Article'),
(42, 'marc arahan', '2019-02-26 02:37:11pm', 'Added a Account'),
(43, 'marc arahan', '2019-02-26 02:39:52pm', 'Added a Account'),
(44, 'Marlon De Guzman', '2019-02-26', 'Uploaded a KB Article'),
(45, 'marc arahan', '2019-02-26 02:55:51pm', 'Dispproved a KB Article'),
(46, 'Marlon De Guzman', '2019-02-26', 'Uploaded a KB Article'),
(47, 'marc arahan', '2019-02-26 03:02:55pm', 'Dispproved a KB Article'),
(48, 'marc arahan', '2019-02-26 03:03:21pm', 'Deleted a KB Article'),
(49, 'Marlon De Guzman', '2019-02-26', 'Uploaded a KB Article'),
(50, 'marc arahan', '2019-02-26 03:07:57pm', 'Dispproved a KB Article'),
(51, 'marc arahan', '2019-02-26 03:08:03pm', 'Deleted a KB Article'),
(52, 'marc arahan', '2019-02-26 03:08:07pm', 'Deleted a KB Article'),
(53, 'marc arahan', '2019-02-26 03:08:10pm', 'Deleted a KB Article'),
(54, 'marc arahan', '2019-02-26 03:08:14pm', 'Deleted a KB Article'),
(55, 'marc arahan', '2019-02-26 03:08:18pm', 'Deleted a KB Article'),
(56, 'marc arahan', '2019-02-26 03:08:21pm', 'Deleted a KB Article'),
(57, 'Marlon De Guzman', '2019-02-26', 'Uploaded a KB Article'),
(58, 'marc arahan', '2019-02-26 03:12:16pm', 'Dispproved a KB Article'),
(59, 'marc arahan', '2019-02-26 03:12:19pm', 'Deleted a KB Article'),
(60, 'marc arahan', '2019-02-26', 'Approved a KB Article'),
(61, 'marc arahan', '2019-02-26 03:43:40pm', 'Deleted a KB Article'),
(62, 'marc arahan', '2019-02-26', 'Approved a KB Article'),
(63, 'marc arahan', '2019-02-26', 'Approved a KB Article'),
(64, 'marc arahan', '2019-02-26', 'Approved a KB Article'),
(65, 'marc arahan', '2019-02-26', 'Approved a KB Article'),
(66, 'marc arahan', '2019-02-26', 'Approved a KB Article'),
(67, 'marc arahan', '2019-02-26', 'Approved a KB Article'),
(68, 'marc arahan', '2019-02-26', 'Approved a KB Article'),
(69, 'marc arahan', '2019-02-26', 'Approved a KB Article'),
(70, 'marc arahan', '2019-02-26', 'Approved a KB Article'),
(71, 'marc arahan', '2019-02-26', 'Update a KB Article'),
(72, 'marc arahan', '2019-02-26', 'Update a KB Article'),
(73, 'marc arahan', '2019-02-26', 'Update a KB Article'),
(74, 'marc arahan', '2019-02-26', 'Update a KB Article'),
(75, 'marc arahan', '2019-02-26', 'Update a KB Article'),
(76, 'marc arahan', '2019-02-26', 'Update a KB Article'),
(77, 'marc arahan', '2019-02-26', 'Update a KB Article'),
(78, 'marc arahan', '2019-02-26', 'Update a KB Article'),
(79, 'marc arahan', '2019-02-26', 'Update a KB Article'),
(80, 'marc arahan', '2019-02-26', 'Update a KB Article'),
(81, 'marc arahan', '2019-02-26', 'Update a KB Article'),
(82, 'Marlon De Guzman', '2019-02-26', 'Uploaded a KB Article'),
(83, 'marc arahan', '2019-02-28 02:58:27pm', 'Added a Account'),
(84, 'marc arahan', '2019-02-28 02:59:09pm', 'Added a Account'),
(85, 'marc arahan', '2019-03-05', 'Update a KB Article'),
(86, 'marc arahan', '2019-03-05', 'Update a KB Article'),
(87, 'marc arahan', '2019-03-05', 'Update a KB Article'),
(88, 'marc arahan', '2019-03-05', 'Approved a KB Article'),
(89, 'marc arahan', '2019-03-05', 'Approved a KB Article'),
(90, 'marc arahan', '2019-03-05', 'Uploaded a KB Article'),
(91, 'marc arahan', '2019-03-05', 'Approved a KB Article'),
(92, 'marc arahan', '2019-03-05', 'Uploaded a KB Article'),
(93, 'marc arahan', '2019-03-05', 'Approved a KB Article'),
(94, 'marc arahan', '2019-03-05', 'Uploaded a KB Article'),
(95, 'marc arahan', '2019-03-05', 'Approved a KB Article'),
(96, 'marc arahan', '2019-03-05', 'Update a KB Article'),
(97, 'marc arahan', '2019-03-05', 'Uploaded a KB Article'),
(98, 'marc arahan', '2019-03-05', 'Approved a KB Article'),
(99, 'marc arahan', '2019-03-05', 'Uploaded a KB Article'),
(100, 'marc arahan', '2019-03-05', 'Approved a KB Article'),
(101, 'marc arahan', '2019-03-05', 'Uploaded a KB Article'),
(102, 'marc arahan', '2019-03-05', 'Uploaded a KB Article'),
(103, 'marc arahan', '2019-03-05', 'Uploaded a KB Article'),
(104, 'marc arahan', '2019-03-05', 'Approved a KB Article'),
(105, 'marc arahan', '2019-03-05', 'Update a KB Article'),
(106, 'marc arahan', '2019-03-05', 'Uploaded a KB Article'),
(107, 'marc arahan', '2019-03-05', 'Approved a KB Article'),
(108, 'marc arahan', '2019-03-05', 'Update a KB Article'),
(109, 'marc arahan', '2019-03-05', 'Approved a KB Article'),
(110, 'marc arahan', '2019-03-05', 'Update a KB Article'),
(111, 'marc arahan', '2019-03-05', 'Approved a KB Article'),
(112, 'marc arahan', '2019-03-05', 'Update a KB Article'),
(113, 'marc arahan', '2019-03-05', 'Approved a KB Article'),
(114, 'marc arahan', '2019-03-05', 'Update a KB Article'),
(115, 'marc arahan', '2019-03-05', 'Uploaded a KB Article'),
(116, 'marc arahan', '2019-03-05', 'Approved a KB Article'),
(117, 'marc arahan', '2019-03-05', 'Uploaded a KB Article'),
(118, 'marc arahan', '2019-03-05', 'Approved a KB Article'),
(119, 'marc arahan', '2019-03-05', 'Update a KB Article'),
(120, 'marc arahan', '2019-03-06', 'Uploaded a KB Article'),
(121, 'marc arahan', '2019-03-06', 'Approved a KB Article'),
(122, 'marc arahan', '2019-03-06', 'Update a KB Article'),
(123, 'marc arahan', '2019-03-06', 'Approved a KB Article'),
(124, 'marc arahan', '2019-03-06', 'Update a KB Article'),
(125, 'marc arahan', '2019-03-06', 'Approved a KB Article'),
(126, 'marc arahan', '2019-03-06', 'Update a KB Article'),
(127, 'marc arahan', '2019-03-07', 'Uploaded a KB Article'),
(128, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(129, 'marc arahan', '2019-03-07', 'Uploaded a KB Article'),
(130, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(131, 'marc arahan', '2019-03-07', 'Uploaded a KB Article'),
(132, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(133, 'marc arahan', '2019-03-07', 'Uploaded a KB Article'),
(134, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(135, 'Marlon De Guzman', '2019-03-07', 'Uploaded a KB Article'),
(136, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(137, 'Marlon De Guzman', '2019-03-07', 'Uploaded a KB Article'),
(138, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(139, 'Marlon De Guzman', '2019-03-07', 'Uploaded a KB Article'),
(140, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(141, 'marc arahan', '2019-03-07', 'Uploaded a KB Article'),
(142, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(143, 'Marlon De Guzman', '2019-03-07', 'Uploaded a KB Article'),
(144, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(145, 'Marlon De Guzman', '2019-03-07', 'Update a KB Article'),
(146, 'Marlon De Guzman', '2019-03-07', 'Update a KB Article'),
(147, 'Marlon De Guzman', '2019-03-07', 'Uploaded a KB Article'),
(148, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(149, 'marc arahan', '2019-03-07', 'Uploaded a KB Article'),
(150, 'Marlon De Guzman', '2019-03-07', 'Uploaded a KB Article'),
(151, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(152, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(153, 'marc arahan', '2019-03-07', 'Update a KB Article'),
(154, 'marc arahan', '2019-03-07', 'Uploaded a KB Article'),
(155, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(156, 'marc arahan', '2019-03-07', 'Update a KB Article'),
(157, 'marc arahan', '2019-03-07', 'Update a KB Article'),
(158, 'marc arahan', '2019-03-07', 'Uploaded a KB Article'),
(159, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(160, 'marc arahan', '2019-03-07', 'Update a KB Article'),
(161, 'marc arahan', '2019-03-07', 'Update a KB Article'),
(162, 'marc arahan', '2019-03-07', 'Update a KB Article'),
(163, 'marc arahan', '2019-03-07', 'Update a KB Article'),
(164, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(165, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(166, 'marc arahan', '2019-03-07', 'Update a KB Article'),
(167, 'marc arahan', '2019-03-07', 'Update a KB Article'),
(168, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(169, 'marc arahan', '2019-03-07', 'Update a KB Article'),
(170, 'marc arahan', '2019-03-07', 'Update a KB Article'),
(171, 'marc arahan', '2019-03-07', 'Uploaded a KB Article'),
(172, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(173, 'marc arahan', '2019-03-07', 'Update a KB Article'),
(174, 'marc arahan', '2019-03-07', 'Update a KB Article'),
(175, 'Marlon De Guzman', '2019-03-07', 'Uploaded a KB Article'),
(176, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(177, 'Marlon De Guzman', '2019-03-07', 'Update a KB Article'),
(178, 'Marlon De Guzman', '2019-03-07', 'Uploaded a KB Article'),
(179, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(180, 'Marlon De Guzman', '2019-03-07', 'Update a KB Article'),
(181, 'marc arahan', '2019-03-07', 'Update a KB Article'),
(182, 'marc arahan', '2019-03-07 02:58:46pm', 'Added a Account'),
(183, 'Marlon De Guzman', '2019-03-07', 'Uploaded a KB Article'),
(184, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(185, 'marc arahan', '2019-03-07 03:04:16pm', 'Dispproved a KB Article'),
(186, 'rovie salvatierra', '2019-03-07 03:09:27pm', 'Deleted a KB Article'),
(187, 'Marlon De Guzman', '2019-03-07', 'Uploaded a KB Article'),
(188, 'rovie salvatierra', '2019-03-07', 'Approved a KB Article'),
(189, 'rovie salvatierra', '2019-03-07', 'Uploaded a KB Article'),
(190, 'rovie salvatierra', '2019-03-07', 'Approved a KB Article'),
(191, 'mau mendoza', '2019-03-07', 'Uploaded a KB Article'),
(192, 'mau mendoza', '2019-03-07', 'Approved a KB Article'),
(193, 'marc arahan', '2019-03-07', 'Uploaded a KB Article'),
(194, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(195, 'mau mendoza', '2019-03-07', 'Update a KB Article'),
(196, 'marc arahan', '2019-03-07 03:22:00pm', 'Added a Account'),
(197, 'marc arahan', '2019-03-07', 'Update a KB Article'),
(198, 'Marlon De Guzman', '2019-03-07', 'Update a KB Article'),
(199, 'marc arahan', '2019-03-07', 'Uploaded a KB Article'),
(200, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(201, 'rovie salvatierra', '2019-03-07', 'Uploaded a KB Article'),
(202, 'rovie salvatierra', '2019-03-07', 'Approved a KB Article'),
(203, 'mau mendoza', '2019-03-07', 'Uploaded a KB Article'),
(204, 'mau mendoza', '2019-03-07', 'Approved a KB Article'),
(205, 'mau mendoza', '2019-03-07', 'Update a KB Article'),
(206, 'marc arahan', '2019-03-07 05:53:24pm', 'Added a Account'),
(207, 'Jeremiah  Nantona', '2019-03-07', 'Uploaded a KB Article'),
(208, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(209, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(210, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(211, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(212, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(213, 'marc arahan', '2019-03-07 06:03:54pm', 'Dispproved a KB Article'),
(214, 'marc arahan', '2019-03-07 06:04:30pm', 'Deleted a KB Article'),
(215, 'mau mendoza', '2019-03-07', 'Update a KB Article'),
(216, 'mau mendoza', '2019-03-07', 'Uploaded a KB Article'),
(217, 'mau mendoza', '2019-03-07', 'Approved a KB Article'),
(218, 'mau mendoza', '2019-03-07', 'Update a KB Article'),
(219, 'mau mendoza', '2019-03-07', 'Update a KB Article'),
(220, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(221, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(222, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(223, 'marc arahan', '2019-03-07', 'Approved a KB Article'),
(224, 'marc arahan', '2019-03-07', 'Uploaded a KB Article'),
(225, 'marc arahan', '2019-03-07', 'Uploaded a KB Article'),
(226, 'marc arahan', '2019-03-07', 'Uploaded a KB Article'),
(227, 'marc arahan', '2019-03-07', 'Uploaded a KB Article');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kb`
--

CREATE TABLE `tbl_kb` (
  `kb_id` int(11) NOT NULL,
  `kb_title` varchar(100) NOT NULL,
  `kb_author` varchar(100) NOT NULL,
  `kb_type` varchar(100) NOT NULL,
  `kb_number` varchar(100) NOT NULL,
  `kb_date` date NOT NULL,
  `kb_status` varchar(100) NOT NULL,
  `user_ID` int(11) DEFAULT NULL,
  `team` varchar(100) NOT NULL,
  `date_approve` date NOT NULL,
  `comment` varchar(100) NOT NULL,
  `update_file` varchar(100) NOT NULL,
  `temp_number` varchar(100) NOT NULL,
  `title_kb` varchar(100) NOT NULL,
  `status` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kb`
--

INSERT INTO `tbl_kb` (`kb_id`, `kb_title`, `kb_author`, `kb_type`, `kb_number`, `kb_date`, `kb_status`, `user_ID`, `team`, `date_approve`, `comment`, `update_file`, `temp_number`, `title_kb`, `status`) VALUES
(117, '5c80e5ca96a68', 'rovie salvatierra', 'Server', 'KB-SVR-2019-03-07-1', '2019-03-07', 'Approved', 4, 'Server', '2019-03-07', '', '', '', 'Update Ticket', 'marc arahan'),
(118, '5c80e5e7bd8ee', 'mau mendoza', 'Network', 'KB-NOC-2019-03-07-1', '2019-03-07', 'Approved', 8, 'Network', '2019-03-07', '', '', '', 'ticket update', 'marc arahan'),
(120, '5c80ea520cab3', 'Jeremiah  Nantona', 'Site Security', 'KB-SEC-2019-03-07-1', '2019-03-07', 'Approved', 11, 'Site Security', '2019-03-07', '', '', '', 'CCTV ', 'marc arahan'),
(122, '5c80ed10d9a09', 'mau mendoza', 'Network', 'KB-NOC-2019-03-07-2', '2019-03-07', 'Approved', 8, 'Network', '2019-03-07', '', '', '', 'SIMPLE PAST TENSE', 'marc arahan');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_policy`
--

CREATE TABLE `tbl_policy` (
  `policy_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `date` date NOT NULL,
  `policy_number` varchar(100) NOT NULL,
  `author` varchar(100) NOT NULL,
  `temp_title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_policy`
--

INSERT INTO `tbl_policy` (`policy_id`, `title`, `date`, `policy_number`, `author`, `temp_title`) VALUES
(3, 'dasdas', '2019-03-07', 'dasdsadasds', 'marc arahan', '5c80f95c79223'),
(4, 'dasdas', '2019-03-07', 'dasdsadasds', 'marc arahan', '5c80f97b0b868');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblaccounts`
--
ALTER TABLE `tblaccounts`
  ADD PRIMARY KEY (`user_ID`),
  ADD KEY `user_ID` (`user_ID`),
  ADD KEY `user_ID_2` (`user_ID`);

--
-- Indexes for table `tbl_audittrail`
--
ALTER TABLE `tbl_audittrail`
  ADD PRIMARY KEY (`audit_trail_ID`);

--
-- Indexes for table `tbl_kb`
--
ALTER TABLE `tbl_kb`
  ADD PRIMARY KEY (`kb_id`),
  ADD KEY `user_ID` (`user_ID`);

--
-- Indexes for table `tbl_policy`
--
ALTER TABLE `tbl_policy`
  ADD PRIMARY KEY (`policy_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblaccounts`
--
ALTER TABLE `tblaccounts`
  MODIFY `user_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `tbl_audittrail`
--
ALTER TABLE `tbl_audittrail`
  MODIFY `audit_trail_ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=228;

--
-- AUTO_INCREMENT for table `tbl_kb`
--
ALTER TABLE `tbl_kb`
  MODIFY `kb_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=123;

--
-- AUTO_INCREMENT for table `tbl_policy`
--
ALTER TABLE `tbl_policy`
  MODIFY `policy_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_kb`
--
ALTER TABLE `tbl_kb`
  ADD CONSTRAINT `tbl_kb_ibfk_1` FOREIGN KEY (`user_ID`) REFERENCES `tblaccounts` (`user_ID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
