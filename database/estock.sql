-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 11, 2019 at 11:22 AM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.19-0ubuntu0.18.04.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `estock`
--

-- --------------------------------------------------------

--
-- Table structure for table `m_allot_scale`
--

CREATE TABLE `m_allot_scale` (
  `sl_no` int(11) NOT NULL,
  `effective_dt` date NOT NULL,
  `prod_desc` varchar(150) NOT NULL,
  `prod_catg` varchar(50) NOT NULL,
  `per_unit` varchar(20) DEFAULT NULL,
  `unit_val` decimal(10,4) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_allot_scale`
--

INSERT INTO `m_allot_scale` (`sl_no`, `effective_dt`, `prod_desc`, `prod_catg`, `per_unit`, `unit_val`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, '2018-08-06', 'Rice', 'AAY', 'Family', '7.5000', 'sss', '2018-08-06 12:58:16', NULL, NULL),
(2, '2018-08-06', 'Rice', 'PHH', 'Family', '1.0000', 'sss', '2018-08-06 12:59:42', NULL, NULL),
(3, '2018-08-06', 'Rice', 'SPHH', 'Head', '1.0000', 'sss', '2018-08-06 01:00:08', NULL, NULL),
(4, '2018-08-06', 'Rice', 'RKSY-I', 'Head', '1.0000', 'sss', '2018-08-06 01:00:50', NULL, NULL),
(5, '2018-08-06', 'Rice', 'RKSY-II', 'Head', '0.5000', 'sss', '2018-08-06 01:01:55', NULL, NULL),
(6, '2018-08-06', 'Wheat', 'AAY', 'Family', '9.5000', 'sss', '2018-08-06 01:03:26', NULL, NULL),
(7, '2018-08-06', 'Wheat', 'PHH', 'Head', '1.4250', 'sss', '2018-08-06 01:03:54', NULL, NULL),
(8, '2018-08-06', 'Wheat', 'SPHH', 'Head', '1.4250', 'sss', '2018-08-06 01:04:27', NULL, NULL),
(9, '2018-08-06', 'Wheat', 'RKSY-I', 'Head', '1.5000', 'sss', '2018-08-06 01:04:56', NULL, NULL),
(10, '2018-08-06', 'Wheat', 'RKSY-II', 'Head', '0.5000', 'sss', '2018-08-06 01:05:12', NULL, NULL),
(11, '2018-08-06', 'Atta', 'AAY', 'Family', '9.5000', 'sss', '2018-08-06 01:07:58', NULL, NULL),
(12, '2018-08-06', 'Atta', 'PHH', 'Head', '1.4250', 'sss', '2018-08-06 01:08:21', NULL, NULL),
(13, '2018-08-06', 'Atta', 'RKSY-I', 'Head', '1.5000', 'sss', '2018-08-06 01:08:49', NULL, NULL),
(14, '2018-08-06', 'Atta', 'RKSY-II', 'Head', '0.5000', 'sss', '2018-08-06 01:09:15', NULL, NULL),
(15, '2018-08-06', 'Atta', 'SPHH', 'Head', '1.4250', 'sss', '2018-08-06 01:09:37', NULL, NULL),
(16, '2018-08-06', 'Sugar', 'AAY', 'Family', '1.0000', 'sss', '2018-08-06 01:10:09', NULL, NULL),
(18, '2018-08-06', 'Sugar', 'SPHH', 'Head', '1.2000', 'sss', '2018-08-06 01:10:53', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_dealers`
--

CREATE TABLE `m_dealers` (
  `sl_no` int(10) NOT NULL,
  `del_cd` int(10) NOT NULL,
  `del_name` varchar(100) NOT NULL,
  `del_adr` varchar(100) DEFAULT NULL,
  `del_reg` varchar(20) DEFAULT NULL,
  `del_dist` varchar(20) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_dealers`
--

INSERT INTO `m_dealers` (`sl_no`, `del_cd`, `del_name`, `del_adr`, `del_reg`, `del_dist`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 1, 'P.K Ghosh', 'Udaynarayanpur\r\nHowrah', 'R.D.A', 'Howrah', 'sss', '2018-08-06 12:35:25', NULL, NULL),
(2, 2, 'M.K Bhowmick', 'Udaynarayanpur\r\nHowrah', 'R.D.A', 'Howrah', 'sss', '2018-08-06 12:36:02', NULL, NULL),
(3, 42, 'A.K Adak', 'Udaynarayanpur\r\nHowrah', 'R.D.A', 'Howrah', 'sss', '2018-08-06 12:36:22', NULL, NULL),
(4, 51, 'A.B Kamila', 'Udaynarayanpur\r\nHowrah', 'R.D.A', 'Howrah', 'sss', '2018-08-06 12:37:26', NULL, NULL),
(5, 3, 'HP SKUS Ltd.', 'Udaynarayanpur\r\nHowrah', 'Hunpur', 'Howrah', 'sss', '2018-08-06 12:38:39', NULL, NULL),
(6, 4, 'S.K Samanta', 'Udaynarayanpur\r\nHowrah', 'Hunpur', 'Howrah', 'sss', '2018-08-06 12:39:09', NULL, NULL),
(7, 31, 'S.N Manna', 'Udaynarayanpur\r\nHowrah', 'Hunpur', 'Howrah', 'sss', '2018-08-06 12:39:49', NULL, NULL),
(8, 41, 'M.Shaw', 'Udaynarayanpur\r\nHowrah', 'Hunpur', 'Howrah', 'sss', '2018-08-06 12:40:11', NULL, NULL),
(9, 6, 'M.Chattoraj', 'Udaynarayanpur\r\nHowrah', 'K.Shibpur', 'Howrah', 'sss', '2018-08-06 12:40:46', NULL, NULL),
(10, 7, 'J.Ash', 'Udaynarayanpur\r\nHowrah', 'K.Shibpur', 'Howrah', 'sss', '2018-08-06 12:41:11', NULL, NULL),
(11, 47, 'T.K Dhara', 'Udaynarayanpur\r\nHowrah', 'K.Shibpur', 'Howrah', 'sss', '2018-08-06 12:41:45', NULL, NULL),
(12, 8, 'M.Golui', 'Udaynarayanpur\r\nHowrah', 'Pacharul', 'Howrah', 'sss', '2018-08-06 12:42:20', NULL, NULL),
(13, 9, 'Smt.C.Hazra', 'Udaynarayanpur\r\nHowrah', 'Pacharul', 'Howrah', 'sss', '2018-08-06 12:42:46', NULL, NULL),
(14, 50, 'A.K Chakraborty', 'Udaynarayanpur\r\nHowrah', 'Pacharul', 'Howrah', 'sss', '2018-08-06 12:43:14', NULL, NULL),
(15, 53, 'P.Jana', 'Udaynarayanpur\r\nHowrah', 'Pacharul', 'Howrah', 'sss', '2018-08-06 12:43:46', NULL, NULL),
(16, 24, 'K.C Mondal', 'Enter Address Here..', 'Singti', 'Howrah', 'sss', '2018-08-06 12:44:28', NULL, NULL),
(17, 25, 'R &amp; S Bhowmick', 'Udaynarayanpur\r\nHowrah', 'Singti', 'Howrah', 'sss', '2018-08-06 12:44:49', NULL, NULL),
(18, 26, 'N.C Bhowmick', 'Udaynarayanpur\r\nHowrah', 'Singti', 'Howrah', 'sss', '2018-08-06 12:45:16', NULL, NULL),
(19, 40, 'H Bera', 'Udaynarayanpur\r\nHowrah', 'Singti', 'Howrah', 'sss', '2018-08-06 12:45:39', NULL, NULL),
(20, 21, 'P.K Chongder', 'Udaynarayanpur\r\nHowrah', 'K.Monsuka', 'Howrah', 'sss', '2018-08-06 12:46:40', NULL, NULL),
(21, 22, 'S Pachal', 'Udaynarayanpur\r\nHowrah', 'K.Monsuka', 'Howrah', 'sss', '2018-08-06 12:47:12', NULL, NULL),
(22, 23, 'P.K Mondal', 'Udaynarayanpur\r\nHowrah', 'K.Monsuka', 'Howrah', 'sss', '2018-08-06 12:47:39', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_login_user`
--

CREATE TABLE `m_login_user` (
  `user_id` varchar(30) NOT NULL,
  `password` varchar(100) DEFAULT NULL,
  `user_type` varchar(1) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_status` varchar(1) NOT NULL,
  `created_by` varchar(30) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(30) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_login_user`
--

INSERT INTO `m_login_user` (`user_id`, `password`, `user_type`, `user_name`, `user_status`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
('105', '$2y$10$AwfgilW/XrvXEk8.2F84r.834Og1CUtiFZ9jpCjZK/JH8AxQOliyW', 'A', '123', 'A', 'sss', '2018-08-03 12:06:31', NULL, NULL),
('321', '$2y$10$E5S6d5qlfYHxtihosIUy9ew1ITlqtznBGU4x4olopyUoWokiJK.5G', 'A', 'PK', 'A', 'sss', '2018-08-03 12:34:21', NULL, NULL),
('pk', '$2y$10$sGY1F0L5N8Q09NgUjWKbPejpEWroWQB9upGFzDM6i2.3FhoNB7BYm', 'G', 'Pritam Kumar', 'A', 'sss', '2018-06-28 12:28:49', NULL, NULL),
('sss', '$2y$10$yOLmZk477ytT1Wqg5OJ4EOfn4S242YiWvbFT5jqiVxqPOKwNld/Yq', 'A', 'Synergic', 'A', 'pk', '2018-06-28 02:23:50', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_params`
--

CREATE TABLE `m_params` (
  `paran_no` int(11) NOT NULL,
  `param_name` varchar(50) DEFAULT NULL,
  `param_value` varchar(100) DEFAULT NULL,
  `edit_flag` varchar(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_params`
--

INSERT INTO `m_params` (`paran_no`, `param_name`, `param_value`, `edit_flag`) VALUES
(1, 'Name of the Distributor', 'Laxmi Narayan Stores', 'Y'),
(2, 'Distributor No.', '95', 'N'),
(3, 'Address', 'Belgram PS:Udaynarayanpur', 'Y'),
(4, 'District', 'Howrah', 'Y'),
(5, 'Memo No.', '/INS/F & S/U.N.PUR/', 'Y'),
(6, 'Last allotment no.', '54', 'Y');

-- --------------------------------------------------------

--
-- Table structure for table `m_products`
--

CREATE TABLE `m_products` (
  `sl_no` int(11) NOT NULL,
  `prod_type` varchar(20) NOT NULL,
  `prod_desc` varchar(150) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_products`
--

INSERT INTO `m_products` (`sl_no`, `prod_type`, `prod_desc`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 'PDS', 'Rice', 'sss', '2018-08-06 12:28:08', NULL, NULL),
(2, 'PDS', 'Wheat', 'sss', '2018-08-06 12:28:19', NULL, NULL),
(3, 'PDS', 'Atta', 'sss', '2018-08-06 12:28:28', NULL, NULL),
(4, 'PDS', 'Sugar', 'sss', '2018-08-06 12:28:44', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_prod_catg`
--

CREATE TABLE `m_prod_catg` (
  `sl_no` int(11) NOT NULL,
  `prod_catg` varchar(50) NOT NULL,
  `per_unit` varchar(20) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_prod_catg`
--

INSERT INTO `m_prod_catg` (`sl_no`, `prod_catg`, `per_unit`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 'AAY', 'Family', 'sss', '2018-08-06 12:22:54', NULL, NULL),
(2, 'PHH', 'Head', 'sss', '2018-08-06 12:23:19', NULL, NULL),
(3, 'SPHH', 'Head', 'sss', '2018-08-06 12:23:37', NULL, NULL),
(4, 'RKSY-I', 'Head', 'sss', '2018-08-06 12:24:03', NULL, NULL),
(5, 'RKSY-II', 'Head', 'sss', '2018-08-06 12:24:15', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_prod_qty`
--

CREATE TABLE `m_prod_qty` (
  `sl_no` int(11) NOT NULL,
  `prod_qty` varchar(50) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_prod_qty`
--

INSERT INTO `m_prod_qty` (`sl_no`, `prod_qty`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 'Quintal', 'sss', '2018-08-06 12:25:15', NULL, NULL),
(2, 'Kg', 'sss', '2018-08-06 12:26:00', 'sss', '2018-08-10 01:58:27'),
(3, 'Gram', 'sss', '2018-08-06 12:26:22', 'sss', '2018-08-10 01:58:35');

-- --------------------------------------------------------

--
-- Table structure for table `m_prod_type`
--

CREATE TABLE `m_prod_type` (
  `sl_no` int(11) NOT NULL,
  `prod_type` varchar(100) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_prod_type`
--

INSERT INTO `m_prod_type` (`sl_no`, `prod_type`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(1, 'PDS', 'sss', '2018-08-06 12:20:47', NULL, NULL),
(2, 'Non PDS', 'sss', '2018-08-06 12:20:56', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_rate_master`
--

CREATE TABLE `m_rate_master` (
  `effective_dt` date NOT NULL,
  `prod_cd` int(10) NOT NULL,
  `prod_desc` varchar(100) NOT NULL,
  `prod_type` varchar(20) NOT NULL,
  `catg_cd` int(10) NOT NULL,
  `prod_catg` varchar(20) NOT NULL,
  `per_unit` varchar(30) DEFAULT NULL,
  `prod_rate` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_rate_master`
--

INSERT INTO `m_rate_master` (`effective_dt`, `prod_cd`, `prod_desc`, `prod_type`, `catg_cd`, `prod_catg`, `per_unit`, `prod_rate`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
('2018-08-06', 1, 'Rice', 'PDS', 1, 'AAY', 'Quintal', '146.00', 'sss', '2018-08-06 01:27:09', NULL, NULL),
('2018-08-06', 1, 'Rice', 'PDS', 2, 'PHH', 'Quintal', '146.00', 'sss', '2018-08-06 01:27:33', NULL, NULL),
('2018-08-06', 1, 'Rice', 'PDS', 4, 'RKSY-I', 'Quintal', '146.00', 'sss', '2018-08-06 01:28:31', NULL, NULL),
('2018-08-06', 1, 'Rice', 'PDS', 5, 'RKSY-II', 'Quintal', '246.00', 'sss', '2018-08-06 01:28:54', NULL, NULL),
('2018-08-06', 1, 'Rice', 'PDS', 3, 'SPHH', 'Quintal', '146.00', 'sss', '2018-08-06 01:27:59', NULL, NULL),
('2018-08-06', 4, 'Sugar', 'PDS', 1, 'AAY', 'Quintal', '296.00', 'sss', '2018-08-06 01:33:19', NULL, NULL),
('2018-08-06', 4, 'Sugar', 'PDS', 3, 'SPHH', 'Quintal', '250.00', 'sss', '2018-08-06 01:33:40', NULL, NULL),
('2018-08-06', 2, 'Wheat', 'PDS', 1, 'AAY', 'Quintal', '146.00', 'sss', '2018-08-06 01:30:23', NULL, NULL),
('2018-08-06', 2, 'Wheat', 'PDS', 2, 'PHH', 'Quintal', '246.00', 'sss', '2018-08-06 01:30:45', NULL, NULL),
('2018-08-06', 2, 'Wheat', 'PDS', 4, 'RKSY-I', 'Quintal', '146.00', 'sss', '2018-08-06 01:31:51', NULL, NULL),
('2018-08-06', 2, 'Wheat', 'PDS', 5, 'RKSY-II', 'Quintal', '846.00', 'sss', '2018-08-06 01:32:08', NULL, NULL),
('2018-08-06', 2, 'Wheat', 'PDS', 3, 'SPHH', 'Quintal', '296.00', 'sss', '2018-08-06 01:31:24', NULL, NULL),
('2018-08-08', 3, 'Atta', 'PDS', 1, 'AAY', 'Quintal', '146.00', 'sss', '2018-08-08 06:11:31', NULL, NULL),
('2018-08-08', 3, 'Atta', 'PDS', 2, 'PHH', 'Quintal', '246.00', 'sss', '2018-08-08 06:11:59', NULL, NULL),
('2018-08-08', 3, 'Atta', 'PDS', 4, 'RKSY-I', 'Quintal', '146.00', 'sss', '2018-08-08 06:12:55', NULL, NULL),
('2018-08-08', 3, 'Atta', 'PDS', 5, 'RKSY-II', 'Quintal', '846.00', 'sss', '2018-08-08 06:13:19', NULL, NULL),
('2018-08-08', 3, 'Atta', 'PDS', 3, 'SPHH', 'Quintal', '296.00', 'sss', '2018-08-08 06:12:25', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `m_shortage`
--

CREATE TABLE `m_shortage` (
  `effective_dt` date NOT NULL,
  `prod_desc` varchar(100) NOT NULL,
  `prod_type` varchar(20) NOT NULL,
  `prod_catg` varchar(20) NOT NULL,
  `short_flag` varchar(1) NOT NULL,
  `short_factor` decimal(10,6) NOT NULL DEFAULT '0.000000',
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `m_shortage`
--

INSERT INTO `m_shortage` (`effective_dt`, `prod_desc`, `prod_type`, `prod_catg`, `short_flag`, `short_factor`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
('2018-08-06', 'Atta', 'PDS', 'AAY', 'N', '0.000000', 'sss', '2018-08-06 12:54:58', NULL, NULL),
('2018-08-06', 'Atta', 'PDS', 'PHH', 'N', '0.000000', 'sss', '2018-08-06 12:55:12', NULL, NULL),
('2018-08-06', 'Atta', 'PDS', 'RKSY-I', 'N', '0.000000', 'sss', '2018-08-06 12:55:48', NULL, NULL),
('2018-08-06', 'Atta', 'PDS', 'RKSY-II', 'N', '0.000000', 'sss', '2018-08-06 12:56:01', NULL, NULL),
('2018-08-06', 'Atta', 'PDS', 'SPHH', 'N', '0.000000', 'sss', '2018-08-06 12:55:28', NULL, NULL),
('2018-08-06', 'Rice', 'PDS', 'AAY', 'Y', '0.003000', 'sss', '2018-08-06 12:50:29', NULL, NULL),
('2018-08-06', 'Rice', 'PDS', 'PHH', 'Y', '0.001000', 'sss', '2018-08-06 12:51:25', NULL, NULL),
('2018-08-06', 'Rice', 'PDS', 'RKSY-I', 'N', '0.000000', 'sss', '2018-08-06 12:52:37', NULL, NULL),
('2018-08-06', 'Rice', 'PDS', 'RKSY-II', 'N', '0.000000', 'sss', '2018-08-06 12:53:07', NULL, NULL),
('2018-08-06', 'Rice', 'PDS', 'SPHH', 'Y', '0.001000', 'sss', '2018-08-06 12:52:15', NULL, NULL),
('2018-08-06', 'Sugar', 'PDS', 'AAY', 'Y', '0.004000', 'sss', '2018-08-06 12:56:30', NULL, NULL),
('2018-08-06', 'Sugar', 'PDS', 'PHH', 'Y', '0.004000', 'sss', '2018-08-06 12:56:45', NULL, NULL),
('2018-08-06', 'Sugar', 'PDS', 'RKSY-I', 'N', '0.000000', 'sss', '2018-08-06 12:57:20', NULL, NULL),
('2018-08-06', 'Sugar', 'PDS', 'RKSY-II', 'N', '0.000000', 'sss', '2018-08-06 12:57:32', NULL, NULL),
('2018-08-06', 'Sugar', 'PDS', 'SPHH', 'Y', '0.001000', 'sss', '2018-08-06 12:57:02', NULL, NULL),
('2018-08-06', 'Wheat', 'PDS', 'AAY', 'N', '0.000000', 'sss', '2018-08-06 12:53:31', NULL, NULL),
('2018-08-06', 'Wheat', 'PDS', 'PHH', 'N', '0.000000', 'sss', '2018-08-06 12:53:47', NULL, NULL),
('2018-08-06', 'Wheat', 'PDS', 'RKSY-I', 'N', '0.000000', 'sss', '2018-08-06 12:54:21', NULL, NULL),
('2018-08-06', 'Wheat', 'PDS', 'RKSY-II', 'N', '0.000000', 'sss', '2018-08-06 12:54:36', NULL, NULL),
('2018-08-06', 'Wheat', 'PDS', 'SPHH', 'N', '0.000000', 'sss', '2018-08-06 12:54:04', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `td_allotment_sheet`
--

CREATE TABLE `td_allotment_sheet` (
  `memo_no` varchar(100) NOT NULL,
  `alt_month` int(10) NOT NULL,
  `alt_year` int(10) NOT NULL,
  `gen_date` date NOT NULL,
  `mr_no` int(10) NOT NULL,
  `delr_name` varchar(100) NOT NULL,
  `delr_region` varchar(50) NOT NULL,
  `aay_family` int(10) NOT NULL DEFAULT '0',
  `aay_rice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ar_unit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ar_tot` decimal(10,2) NOT NULL DEFAULT '0.00',
  `aay_wheat` decimal(10,2) NOT NULL DEFAULT '0.00',
  `aw_unit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `aw_tot` decimal(10,2) NOT NULL DEFAULT '0.00',
  `aay_atta` decimal(10,2) NOT NULL DEFAULT '0.00',
  `aa_unit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `aa_tot` decimal(10,2) NOT NULL DEFAULT '0.00',
  `aay_sugar` decimal(10,2) NOT NULL DEFAULT '0.00',
  `as_unit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `as_tot` decimal(10,2) NOT NULL DEFAULT '0.00',
  `phh_head` int(10) NOT NULL DEFAULT '0',
  `phh_rice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pr_unit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pr_tot` decimal(10,2) NOT NULL DEFAULT '0.00',
  `phh_wheat` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pw_unit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pw_tot` decimal(10,2) NOT NULL DEFAULT '0.00',
  `phh_atta` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pa_unit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `pa_tot` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sphh_head` int(10) NOT NULL DEFAULT '0',
  `sphh_rice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sr_unit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sr_tot` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sphh_wheat` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sw_unit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sw_tot` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sphh_atta` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sa_unit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sa_tot` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sphh_sugar` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ss_unit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ss_tot` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rksy1_head` int(10) NOT NULL DEFAULT '0',
  `rksy1_rice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rr1_unit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rr1_tot` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rksy1_wheat` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rw1_unit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rw1_tot` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rksy1_atta` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ra1_unit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ra1_tot` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rksy2_head` int(10) NOT NULL DEFAULT '0',
  `rksy2_rice` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rr2_unit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rr2_tot` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rksy2_wheat` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rw2_unit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rw2_tot` decimal(10,2) NOT NULL DEFAULT '0.00',
  `rksy2_atta` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ra2_unit` decimal(10,2) NOT NULL DEFAULT '0.00',
  `ra2_tot` decimal(10,2) NOT NULL DEFAULT '0.00',
  `addi_head` int(10) NOT NULL DEFAULT '0',
  `addi_aay` decimal(10,2) NOT NULL DEFAULT '0.00',
  `addi_apl_bpl` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_by` varchar(50) NOT NULL,
  `created_dt` datetime NOT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL,
  `approval_status` char(1) NOT NULL DEFAULT 'U',
  `approved_by` varchar(50) DEFAULT NULL,
  `approved_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_allotment_sheet`
--

INSERT INTO `td_allotment_sheet` (`memo_no`, `alt_month`, `alt_year`, `gen_date`, `mr_no`, `delr_name`, `delr_region`, `aay_family`, `aay_rice`, `ar_unit`, `ar_tot`, `aay_wheat`, `aw_unit`, `aw_tot`, `aay_atta`, `aa_unit`, `aa_tot`, `aay_sugar`, `as_unit`, `as_tot`, `phh_head`, `phh_rice`, `pr_unit`, `pr_tot`, `phh_wheat`, `pw_unit`, `pw_tot`, `phh_atta`, `pa_unit`, `pa_tot`, `sphh_head`, `sphh_rice`, `sr_unit`, `sr_tot`, `sphh_wheat`, `sw_unit`, `sw_tot`, `sphh_atta`, `sa_unit`, `sa_tot`, `sphh_sugar`, `ss_unit`, `ss_tot`, `rksy1_head`, `rksy1_rice`, `rr1_unit`, `rr1_tot`, `rksy1_wheat`, `rw1_unit`, `rw1_tot`, `rksy1_atta`, `ra1_unit`, `ra1_tot`, `rksy2_head`, `rksy2_rice`, `rr2_unit`, `rr2_tot`, `rksy2_wheat`, `rw2_unit`, `rw2_tot`, `rksy2_atta`, `ra2_unit`, `ra2_tot`, `addi_head`, `addi_aay`, `addi_apl_bpl`, `created_by`, `created_dt`, `modified_by`, `modified_dt`, `approval_status`, `approved_by`, `approved_dt`) VALUES
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 1, 'P.K Ghosh', 'R.D.A', 30, '2.25', '0.00', '0.00', '0.00', '0.00', '0.00', '2.85', '0.00', '0.00', '0.30', '0.00', '0.00', 1794, '17.94', '0.00', '0.00', '0.00', '0.00', '0.00', '25.56', '0.00', '0.00', 716, '7.16', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 632, '6.32', '0.00', '0.00', '9.48', '0.00', '0.00', '13.08', '0.00', '0.00', 2616, '13.08', '0.00', '0.00', '13.08', '0.00', '0.00', '13.08', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 2, 'M.K Bhowmick', 'R.D.A', 8, '0.60', '0.00', '0.00', '0.00', '0.00', '0.00', '0.76', '0.00', '0.00', '0.08', '0.00', '0.00', 1351, '13.51', '0.00', '0.00', '0.00', '0.00', '0.00', '19.25', '0.00', '0.00', 562, '5.62', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 656, '6.56', '0.00', '0.00', '9.84', '0.00', '0.00', '6.95', '0.00', '0.00', 1390, '6.95', '0.00', '0.00', '6.95', '0.00', '0.00', '6.95', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 3, 'HP SKUS Ltd.', 'Hunpur', 24, '1.80', '0.00', '0.00', '0.00', '0.00', '0.00', '2.28', '0.00', '0.00', '0.24', '0.00', '0.00', 1197, '11.97', '0.00', '0.00', '0.00', '0.00', '0.00', '17.06', '0.00', '0.00', 809, '8.09', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 831, '8.31', '0.00', '0.00', '12.46', '0.00', '0.00', '5.28', '0.00', '0.00', 1055, '5.28', '0.00', '0.00', '5.28', '0.00', '0.00', '5.28', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 4, 'S.K Samanta', 'Hunpur', 34, '2.55', '0.00', '0.00', '0.00', '0.00', '0.00', '3.23', '0.00', '0.00', '0.34', '0.00', '0.00', 1502, '15.02', '0.00', '0.00', '0.00', '0.00', '0.00', '21.40', '0.00', '0.00', 636, '6.36', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 1052, '10.52', '0.00', '0.00', '15.78', '0.00', '0.00', '8.96', '0.00', '0.00', 1791, '8.96', '0.00', '0.00', '8.96', '0.00', '0.00', '8.96', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 10, 'L.M.Hazra', 'Debipur', 68, '5.10', '0.00', '0.00', '0.00', '0.00', '0.00', '6.46', '0.00', '0.00', '0.68', '0.00', '0.00', 941, '9.41', '0.00', '0.00', '0.00', '0.00', '0.00', '13.41', '0.00', '0.00', 1253, '12.53', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 135, '1.35', '0.00', '0.00', '2.02', '0.00', '0.00', '3.24', '0.00', '0.00', 648, '3.24', '0.00', '0.00', '3.24', '0.00', '0.00', '3.24', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 11, 'Smt. M.M.Singharay', 'G.B.Pur-Sonatala', 65, '4.88', '0.00', '0.00', '0.00', '0.00', '0.00', '6.17', '0.00', '0.00', '0.65', '0.00', '0.00', 1970, '19.70', '0.00', '0.00', '0.00', '0.00', '0.00', '28.07', '0.00', '0.00', 1402, '14.02', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 520, '5.20', '0.00', '0.00', '7.80', '0.00', '0.00', '2.32', '0.00', '0.00', 464, '2.32', '0.00', '0.00', '2.32', '0.00', '0.00', '2.32', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 12, 'N.R.Dhara', 'G.B.Pur-Sonatala', 7, '0.53', '0.00', '0.00', '0.00', '0.00', '0.00', '0.67', '0.00', '0.00', '0.07', '0.00', '0.00', 1430, '14.30', '0.00', '0.00', '0.00', '0.00', '0.00', '20.38', '0.00', '0.00', 449, '4.49', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 296, '2.96', '0.00', '0.00', '4.44', '0.00', '0.00', '3.33', '0.00', '0.00', 665, '3.33', '0.00', '0.00', '3.33', '0.00', '0.00', '3.33', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 13, 'D.D.Mondal', 'B.Pur-B.Ch.Pur', 4, '0.30', '0.00', '0.00', '0.00', '0.00', '0.00', '0.38', '0.00', '0.00', '0.04', '0.00', '0.00', 738, '7.38', '0.00', '0.00', '0.00', '0.00', '0.00', '10.52', '0.00', '0.00', 388, '3.88', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 745, '7.45', '0.00', '0.00', '11.18', '0.00', '0.00', '4.91', '0.00', '0.00', 982, '4.91', '0.00', '0.00', '4.91', '0.00', '0.00', '4.91', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 14, 'S.K.Shee', 'B.Pur-B.Ch.Pur', 44, '3.30', '0.00', '0.00', '0.00', '0.00', '0.00', '4.18', '0.00', '0.00', '0.44', '0.00', '0.00', 1992, '19.92', '0.00', '0.00', '0.00', '0.00', '0.00', '28.39', '0.00', '0.00', 1797, '17.97', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 812, '8.12', '0.00', '0.00', '12.18', '0.00', '0.00', '3.90', '0.00', '0.00', 780, '3.90', '0.00', '0.00', '3.90', '0.00', '0.00', '3.90', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 15, 'G.C.Chakrabarty', 'B.Pur-B.Ch.Pur', 73, '5.47', '0.00', '0.00', '0.00', '0.00', '0.00', '6.93', '0.00', '0.00', '0.73', '0.00', '0.00', 945, '9.45', '0.00', '0.00', '0.00', '0.00', '0.00', '13.47', '0.00', '0.00', 1343, '13.43', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 628, '6.28', '0.00', '0.00', '9.42', '0.00', '0.00', '1.93', '0.00', '0.00', 385, '1.93', '0.00', '0.00', '1.93', '0.00', '0.00', '1.93', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 16, 'D.P.Ganguly A/c- U.K.Pal', 'Harishpur', 48, '3.60', '0.00', '0.00', '0.00', '0.00', '0.00', '4.56', '0.00', '0.00', '0.48', '0.00', '0.00', 2408, '24.08', '0.00', '0.00', '0.00', '0.00', '0.00', '34.31', '0.00', '0.00', 787, '7.87', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 1096, '10.96', '0.00', '0.00', '16.44', '0.00', '0.00', '3.88', '0.00', '0.00', 776, '3.88', '0.00', '0.00', '3.88', '0.00', '0.00', '3.88', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 17, 'D.P.Ganguly', 'Harishpur', 36, '2.70', '0.00', '0.00', '0.00', '0.00', '0.00', '3.42', '0.00', '0.00', '0.36', '0.00', '0.00', 2287, '22.87', '0.00', '0.00', '0.00', '0.00', '0.00', '32.59', '0.00', '0.00', 1468, '14.68', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 683, '6.83', '0.00', '0.00', '10.24', '0.00', '0.00', '5.42', '0.00', '0.00', 1085, '5.42', '0.00', '0.00', '5.42', '0.00', '0.00', '5.42', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 18, 'P.Pal A/c-Smt.T.Kanrar A/c-M.R.Mondal', 'Khila', 8, '0.60', '0.00', '0.00', '0.00', '0.00', '0.00', '0.76', '0.00', '0.00', '0.08', '0.00', '0.00', 1985, '19.85', '0.00', '0.00', '0.00', '0.00', '0.00', '28.29', '0.00', '0.00', 874, '8.74', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 961, '9.61', '0.00', '0.00', '14.41', '0.00', '0.00', '7.59', '0.00', '0.00', 1518, '7.59', '0.00', '0.00', '7.59', '0.00', '0.00', '7.59', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 19, 'P.Pal', 'Khila', 24, '1.80', '0.00', '0.00', '0.00', '0.00', '0.00', '2.28', '0.00', '0.00', '0.24', '0.00', '0.00', 1907, '19.07', '0.00', '0.00', '0.00', '0.00', '0.00', '27.17', '0.00', '0.00', 904, '9.04', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 511, '5.11', '0.00', '0.00', '7.67', '0.00', '0.00', '4.70', '0.00', '0.00', 939, '4.70', '0.00', '0.00', '4.70', '0.00', '0.00', '4.70', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 20, 'P.Pal A/c- Smt.T.Kanrar', 'Khila', 46, '3.45', '0.00', '0.00', '0.00', '0.00', '0.00', '4.37', '0.00', '0.00', '0.46', '0.00', '0.00', 2154, '21.54', '0.00', '0.00', '0.00', '0.00', '0.00', '30.69', '0.00', '0.00', 1446, '14.46', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 1045, '10.45', '0.00', '0.00', '15.68', '0.00', '0.00', '9.15', '0.00', '0.00', 1830, '9.15', '0.00', '0.00', '9.15', '0.00', '0.00', '9.15', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 21, 'P.K Chongder', 'K.Monsuka', 51, '3.83', '0.00', '0.00', '0.00', '0.00', '0.00', '4.84', '0.00', '0.00', '0.51', '0.00', '0.00', 3412, '34.12', '0.00', '0.00', '0.00', '0.00', '0.00', '48.62', '0.00', '0.00', 919, '9.19', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 1232, '12.32', '0.00', '0.00', '18.48', '0.00', '0.00', '5.79', '0.00', '0.00', 1159, '5.79', '0.00', '0.00', '5.79', '0.00', '0.00', '5.79', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 22, 'S Pachal', 'K.Monsuka', 16, '1.20', '0.00', '0.00', '0.00', '0.00', '0.00', '1.52', '0.00', '0.00', '0.16', '0.00', '0.00', 621, '6.21', '0.00', '0.00', '0.00', '0.00', '0.00', '8.85', '0.00', '0.00', 357, '3.57', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 473, '4.73', '0.00', '0.00', '7.09', '0.00', '0.00', '3.98', '0.00', '0.00', 797, '3.98', '0.00', '0.00', '3.98', '0.00', '0.00', '3.98', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 23, 'T.K Mondal', 'K.Monsuka', 22, '1.65', '0.00', '0.00', '0.00', '0.00', '0.00', '2.09', '0.00', '0.00', '0.22', '0.00', '0.00', 1379, '13.79', '0.00', '0.00', '0.00', '0.00', '0.00', '19.65', '0.00', '0.00', 802, '8.02', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 871, '8.71', '0.00', '0.00', '13.06', '0.00', '0.00', '6.24', '0.00', '0.00', 1248, '6.24', '0.00', '0.00', '6.24', '0.00', '0.00', '6.24', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 24, 'K.C Mondal', 'Singti', 18, '1.35', '0.00', '0.00', '0.00', '0.00', '0.00', '1.71', '0.00', '0.00', '0.18', '0.00', '0.00', 2109, '21.09', '0.00', '0.00', '0.00', '0.00', '0.00', '30.05', '0.00', '0.00', 637, '6.37', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 1538, '15.38', '0.00', '0.00', '23.07', '0.00', '0.00', '3.83', '0.00', '0.00', 767, '3.83', '0.00', '0.00', '3.83', '0.00', '0.00', '3.83', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 25, 'R &amp; S Bhowmick', 'Singti', 48, '3.60', '0.00', '0.00', '0.00', '0.00', '0.00', '4.56', '0.00', '0.00', '0.48', '0.00', '0.00', 959, '9.59', '0.00', '0.00', '0.00', '0.00', '0.00', '13.67', '0.00', '0.00', 901, '9.01', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 975, '9.75', '0.00', '0.00', '14.63', '0.00', '0.00', '4.07', '0.00', '0.00', 814, '4.07', '0.00', '0.00', '4.07', '0.00', '0.00', '4.07', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 26, 'N.C Bhowmick', 'Singti', 26, '1.95', '0.00', '0.00', '0.00', '0.00', '0.00', '2.47', '0.00', '0.00', '0.26', '0.00', '0.00', 2037, '20.37', '0.00', '0.00', '0.00', '0.00', '0.00', '29.03', '0.00', '0.00', 930, '9.30', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 966, '9.66', '0.00', '0.00', '14.49', '0.00', '0.00', '5.95', '0.00', '0.00', 1189, '5.95', '0.00', '0.00', '5.95', '0.00', '0.00', '5.95', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 27, 'G.N.Nandy', 'Debipur', 61, '4.58', '0.00', '0.00', '0.00', '0.00', '0.00', '5.79', '0.00', '0.00', '0.61', '0.00', '0.00', 1404, '14.04', '0.00', '0.00', '0.00', '0.00', '0.00', '20.01', '0.00', '0.00', 1570, '15.70', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 412, '4.12', '0.00', '0.00', '6.18', '0.00', '0.00', '4.81', '0.00', '0.00', 962, '4.81', '0.00', '0.00', '4.81', '0.00', '0.00', '4.81', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 30, 'M.Chongder', 'Khila', 33, '2.48', '0.00', '0.00', '0.00', '0.00', '0.00', '3.13', '0.00', '0.00', '0.33', '0.00', '0.00', 2658, '26.58', '0.00', '0.00', '0.00', '0.00', '0.00', '37.88', '0.00', '0.00', 859, '8.59', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 929, '9.29', '0.00', '0.00', '13.94', '0.00', '0.00', '9.12', '0.00', '0.00', 1824, '9.12', '0.00', '0.00', '9.12', '0.00', '0.00', '9.12', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 31, 'S.N Manna', 'Hunpur', 30, '2.25', '0.00', '0.00', '0.00', '0.00', '0.00', '2.85', '0.00', '0.00', '0.30', '0.00', '0.00', 1298, '12.98', '0.00', '0.00', '0.00', '0.00', '0.00', '18.50', '0.00', '0.00', 835, '8.35', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 830, '8.30', '0.00', '0.00', '12.45', '0.00', '0.00', '3.69', '0.00', '0.00', 738, '3.69', '0.00', '0.00', '3.69', '0.00', '0.00', '3.69', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 36, 'A.K. Show', 'Debipur', 23, '2.19', '0.00', '0.00', '0.23', '0.00', '0.00', '0.00', '0.00', '0.00', '1.73', '0.00', '0.00', 756, '7.56', '0.00', '0.00', '0.00', '0.00', '0.00', '10.77', '0.00', '0.00', 777, '7.77', '0.00', '0.00', '0.00', '0.00', '0.00', '11.07', '0.00', '0.00', '0.00', '0.00', '0.00', 398, '3.98', '0.00', '0.00', '0.00', '0.00', '0.00', '5.97', '0.00', '0.00', 993, '4.96', '0.00', '0.00', '4.96', '0.00', '0.00', '0.00', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 37, 'D.K.Mondal', 'G.B.Pur-Sonatala', 39, '2.92', '0.00', '0.00', '0.00', '0.00', '0.00', '3.71', '0.00', '0.00', '0.39', '0.00', '0.00', 1126, '11.26', '0.00', '0.00', '0.00', '0.00', '0.00', '16.05', '0.00', '0.00', 981, '9.81', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 456, '4.56', '0.00', '0.00', '6.84', '0.00', '0.00', '3.15', '0.00', '0.00', 629, '3.15', '0.00', '0.00', '3.15', '0.00', '0.00', '3.15', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 38, 'P.K.Das', 'B.Pur-B.Ch.Pur', 33, '2.48', '0.00', '0.00', '0.00', '0.00', '0.00', '3.13', '0.00', '0.00', '0.33', '0.00', '0.00', 1472, '14.72', '0.00', '0.00', '0.00', '0.00', '0.00', '20.98', '0.00', '0.00', 689, '6.89', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 1135, '11.35', '0.00', '0.00', '17.02', '0.00', '0.00', '4.41', '0.00', '0.00', 882, '4.41', '0.00', '0.00', '4.41', '0.00', '0.00', '4.41', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 40, 'H Bera', 'Singti', 5, '0.38', '0.00', '0.00', '0.00', '0.00', '0.00', '0.47', '0.00', '0.00', '0.05', '0.00', '0.00', 1188, '11.88', '0.00', '0.00', '0.00', '0.00', '0.00', '16.93', '0.00', '0.00', 280, '2.80', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 1263, '12.63', '0.00', '0.00', '18.95', '0.00', '0.00', '4.06', '0.00', '0.00', 812, '4.06', '0.00', '0.00', '4.06', '0.00', '0.00', '4.06', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 41, 'M.Shaw', 'Hunpur', 34, '2.55', '0.00', '0.00', '0.00', '0.00', '0.00', '3.23', '0.00', '0.00', '0.34', '0.00', '0.00', 1242, '12.42', '0.00', '0.00', '0.00', '0.00', '0.00', '17.70', '0.00', '0.00', 843, '8.43', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 1091, '10.91', '0.00', '0.00', '16.36', '0.00', '0.00', '5.29', '0.00', '0.00', 1059, '5.29', '0.00', '0.00', '5.29', '0.00', '0.00', '5.29', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 42, 'A.K Adak', 'R.D.A', 52, '4.94', '0.00', '0.00', '0.52', '0.00', '0.00', '0.00', '0.00', '0.00', '3.90', '0.00', '0.00', 1773, '17.73', '0.00', '0.00', '0.00', '0.00', '0.00', '25.27', '0.00', '0.00', 879, '8.79', '0.00', '0.00', '0.00', '0.00', '0.00', '12.53', '0.00', '0.00', '0.00', '0.00', '0.00', 801, '8.01', '0.00', '0.00', '0.00', '0.00', '0.00', '12.02', '0.00', '0.00', 1777, '8.88', '0.00', '0.00', '8.88', '0.00', '0.00', '0.00', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 45, 'G.Nandy   A/c- N.C.Koley', 'Debipur', 66, '4.95', '0.00', '0.00', '0.00', '0.00', '0.00', '6.27', '0.00', '0.00', '0.66', '0.00', '0.00', 2181, '21.81', '0.00', '0.00', '0.00', '0.00', '0.00', '31.08', '0.00', '0.00', 1447, '14.47', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 287, '2.87', '0.00', '0.00', '4.30', '0.00', '0.00', '0.76', '0.00', '0.00', 151, '0.76', '0.00', '0.00', '0.76', '0.00', '0.00', '0.76', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 46, 'Smt. A.B. Chakrabarty', 'Debipur', 42, '3.99', '0.00', '0.00', '0.42', '0.00', '0.00', '0.00', '0.00', '0.00', '3.15', '0.00', '0.00', 878, '8.78', '0.00', '0.00', '0.00', '0.00', '0.00', '12.51', '0.00', '0.00', 865, '8.65', '0.00', '0.00', '0.00', '0.00', '0.00', '12.33', '0.00', '0.00', '0.00', '0.00', '0.00', 355, '3.55', '0.00', '0.00', '0.00', '0.00', '0.00', '5.33', '0.00', '0.00', 435, '2.17', '0.00', '0.00', '2.17', '0.00', '0.00', '0.00', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 47, 'T.K Dhara', 'K.Shibpur', 105, '7.88', '0.00', '0.00', '0.00', '0.00', '0.00', '9.97', '0.00', '0.00', '1.05', '0.00', '0.00', 1451, '14.51', '0.00', '0.00', '0.00', '0.00', '0.00', '20.68', '0.00', '0.00', 1488, '14.88', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 2320, '23.20', '0.00', '0.00', '34.80', '0.00', '0.00', '5.88', '0.00', '0.00', 1176, '5.88', '0.00', '0.00', '5.88', '0.00', '0.00', '5.88', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 48, 'M.D.Ghosh', 'Harishpur', 24, '1.80', '0.00', '0.00', '0.00', '0.00', '0.00', '2.28', '0.00', '0.00', '0.24', '0.00', '0.00', 2970, '29.70', '0.00', '0.00', '0.00', '0.00', '0.00', '42.32', '0.00', '0.00', 869, '8.69', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 959, '9.59', '0.00', '0.00', '14.38', '0.00', '0.00', '7.83', '0.00', '0.00', 1566, '7.83', '0.00', '0.00', '7.83', '0.00', '0.00', '7.83', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 49, 'B.N.Chatterjee', 'G.B.Pur-Sonatala', 12, '0.90', '0.00', '0.00', '0.00', '0.00', '0.00', '1.14', '0.00', '0.00', '0.12', '0.00', '0.00', 1195, '11.95', '0.00', '0.00', '0.00', '0.00', '0.00', '17.03', '0.00', '0.00', 367, '3.67', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 331, '3.31', '0.00', '0.00', '4.96', '0.00', '0.00', '4.58', '0.00', '0.00', 917, '4.58', '0.00', '0.00', '4.58', '0.00', '0.00', '4.58', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 50, 'A.K Chakraborty', 'Pacharul', 31, '2.94', '0.00', '0.00', '0.31', '0.00', '0.00', '0.00', '0.00', '0.00', '2.33', '0.00', '0.00', 717, '7.17', '0.00', '0.00', '0.00', '0.00', '0.00', '10.22', '0.00', '0.00', 770, '7.70', '0.00', '0.00', '0.00', '0.00', '0.00', '10.97', '0.00', '0.00', '0.00', '0.00', '0.00', 647, '6.47', '0.00', '0.00', '0.00', '0.00', '0.00', '9.71', '0.00', '0.00', 763, '3.81', '0.00', '0.00', '3.81', '0.00', '0.00', '0.00', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 51, 'A.B Kamila', 'R.D.A', 41, '3.90', '0.00', '0.00', '0.41', '0.00', '0.00', '0.00', '0.00', '0.00', '3.08', '0.00', '0.00', 1659, '16.59', '0.00', '0.00', '0.00', '0.00', '0.00', '23.64', '0.00', '0.00', 608, '6.08', '0.00', '0.00', '0.00', '0.00', '0.00', '8.66', '0.00', '0.00', '0.00', '0.00', '0.00', 587, '5.87', '0.00', '0.00', '0.00', '0.00', '0.00', '8.80', '0.00', '0.00', 1640, '8.20', '0.00', '0.00', '8.20', '0.00', '0.00', '0.00', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 52, 'B.N.Chatterjee A/c- N.Kanrar', 'B.Pur-B.Ch.Pur', 11, '0.82', '0.00', '0.00', '0.00', '0.00', '0.00', '1.04', '0.00', '0.00', '0.11', '0.00', '0.00', 1303, '13.03', '0.00', '0.00', '0.00', '0.00', '0.00', '18.57', '0.00', '0.00', 387, '3.87', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 460, '4.60', '0.00', '0.00', '6.90', '0.00', '0.00', '3.00', '0.00', '0.00', 599, '3.00', '0.00', '0.00', '3.00', '0.00', '0.00', '3.00', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('15/INS/F&S/U.N.PUR/19', 2, 2019, '2019-02-22', 53, 'P.Jana', 'Pacharul', 115, '8.63', '0.00', '0.00', '0.00', '0.00', '0.00', '10.93', '0.00', '0.00', '1.15', '0.00', '0.00', 1514, '15.14', '0.00', '0.00', '0.00', '0.00', '0.00', '21.57', '0.00', '0.00', 1356, '13.56', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 1382, '13.82', '0.00', '0.00', '20.73', '0.00', '0.00', '5.14', '0.00', '0.00', 1029, '5.14', '0.00', '0.00', '5.14', '0.00', '0.00', '5.14', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-22 00:00:00', NULL, NULL, 'U', NULL, NULL),
('TF/128905', 2, 2019, '2019-02-18', 13, 'D.D.Mondal', 'B.Pur-B.Ch.Pur', 2, '0.19', '0.00', '0.00', '0.02', '0.00', '0.00', '0.19', '0.00', '0.00', '0.15', '0.00', '0.00', 5, '0.05', '0.00', '0.00', '0.07', '0.00', '0.00', '0.07', '0.00', '0.00', 9, '0.09', '0.00', '0.00', '0.13', '0.00', '0.00', '0.13', '0.00', '0.00', '0.11', '0.00', '0.00', 2, '0.02', '0.00', '0.00', '0.03', '0.00', '0.00', '0.03', '0.00', '0.00', 8, '0.04', '0.00', '0.00', '0.04', '0.00', '0.00', '0.04', '0.00', '0.00', 0, '0.00', '0.00', 'sss', '2019-02-18 00:00:00', NULL, NULL, 'A', '', '2019-02-22 06:25:48');

-- --------------------------------------------------------

--
-- Table structure for table `td_allot_dtls`
--

CREATE TABLE `td_allot_dtls` (
  `trans_dt` date NOT NULL,
  `allot_no` varchar(100) NOT NULL,
  `catg_cd` int(10) NOT NULL,
  `prod_cd` int(10) NOT NULL,
  `prod_qty` decimal(10,2) NOT NULL DEFAULT '0.00',
  `balance_qty` decimal(10,2) NOT NULL DEFAULT '0.00',
  `allot_status` char(1) NOT NULL DEFAULT 'O',
  `close_dt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_allot_dtls`
--

INSERT INTO `td_allot_dtls` (`trans_dt`, `allot_no`, `catg_cd`, `prod_cd`, `prod_qty`, `balance_qty`, `allot_status`, `close_dt`) VALUES
('2018-08-07', '55/INS/F & S/U.N.PUR/18', 1, 1, '49.37', '49.37', 'O', NULL),
('2018-08-07', '55/INS/F & S/U.N.PUR/18', 1, 2, '62.51', '62.51', 'O', NULL),
('2018-08-07', '55/INS/F & S/U.N.PUR/18', 1, 3, '62.51', '62.51', 'O', NULL),
('2018-08-07', '55/INS/F & S/U.N.PUR/18', 1, 4, '6.58', '6.58', 'O', NULL),
('2018-08-07', '55/INS/F & S/U.N.PUR/18', 2, 1, '239.35', '239.35', 'O', NULL),
('2018-08-07', '55/INS/F & S/U.N.PUR/18', 2, 2, '341.06', '341.06', 'O', NULL),
('2018-08-07', '55/INS/F & S/U.N.PUR/18', 2, 3, '341.06', '341.06', 'O', NULL),
('2018-08-07', '55/INS/F & S/U.N.PUR/18', 3, 1, '137.28', '137.28', 'O', NULL),
('2018-08-07', '55/INS/F & S/U.N.PUR/18', 3, 2, '195.63', '195.63', 'O', NULL),
('2018-08-07', '55/INS/F & S/U.N.PUR/18', 3, 3, '195.63', '195.63', 'O', NULL),
('2018-08-07', '55/INS/F & S/U.N.PUR/18', 3, 4, '164.75', '164.75', 'O', NULL),
('2018-08-07', '55/INS/F & S/U.N.PUR/18', 4, 1, '139.97', '139.97', 'O', NULL),
('2018-08-07', '55/INS/F & S/U.N.PUR/18', 4, 2, '209.98', '209.98', 'O', NULL),
('2018-08-07', '55/INS/F & S/U.N.PUR/18', 4, 3, '98.95', '98.95', 'O', NULL),
('2018-08-07', '55/INS/F & S/U.N.PUR/18', 5, 1, '97.99', '97.99', 'O', NULL),
('2018-08-07', '55/INS/F & S/U.N.PUR/18', 5, 2, '97.99', '97.99', 'O', NULL),
('2018-08-07', '55/INS/F & S/U.N.PUR/18', 5, 3, '97.99', '97.99', 'O', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `td_stock_balance`
--

CREATE TABLE `td_stock_balance` (
  `trans_dt` date NOT NULL,
  `trans_cd` int(10) NOT NULL,
  `prod_sl_no` int(10) NOT NULL,
  `prod_desc` varchar(100) NOT NULL,
  `prod_type` varchar(10) NOT NULL,
  `prod_catg` varchar(10) NOT NULL,
  `bag_bal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `qnt_bal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `kg_bal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `gm_bal` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `td_stock_trans_pds`
--

CREATE TABLE `td_stock_trans_pds` (
  `trans_dt` date NOT NULL,
  `trans_cd` int(10) NOT NULL,
  `do_no` varchar(50) DEFAULT NULL,
  `allot_no` varchar(50) DEFAULT NULL,
  `prod_sl_no` int(10) NOT NULL,
  `prod_desc` varchar(30) NOT NULL,
  `prod_type` varchar(10) NOT NULL,
  `prod_catg` varchar(10) NOT NULL,
  `trans_type` varchar(5) NOT NULL,
  `qty_bag` decimal(10,2) NOT NULL DEFAULT '0.00',
  `qty_qnt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `qty_kg` decimal(10,2) NOT NULL DEFAULT '0.00',
  `qty_gm` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sht_kg` decimal(10,2) NOT NULL DEFAULT '0.00',
  `sht_gm` decimal(10,2) NOT NULL DEFAULT '0.00',
  `bag_bal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `qnt_bal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `kg_bal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `gm_bal` decimal(10,2) NOT NULL DEFAULT '0.00',
  `remarks` varchar(100) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `approval_status` varchar(2) NOT NULL,
  `approved_by` varchar(50) DEFAULT NULL,
  `approved_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_stock_trans_pds`
--

INSERT INTO `td_stock_trans_pds` (`trans_dt`, `trans_cd`, `do_no`, `allot_no`, `prod_sl_no`, `prod_desc`, `prod_type`, `prod_catg`, `trans_type`, `qty_bag`, `qty_qnt`, `qty_kg`, `qty_gm`, `sht_kg`, `sht_gm`, `bag_bal`, `qnt_bal`, `kg_bal`, `gm_bal`, `remarks`, `created_by`, `created_dt`, `approval_status`, `approved_by`, `approved_dt`, `modified_by`, `modified_dt`) VALUES
('2018-07-20', 1, '18A0887', NULL, 1, 'Rice', 'PDS', 'AAY', 'I', '498.00', '246.00', '90.00', '0.00', '0.00', '0.00', '498.00', '246.00', '90.00', '0.00', 'Rice AAY\r\n\r\n                                ', 'sss', '2018-08-10 11:46:11', 'A', 'sss', '2018-08-10 11:08:50', NULL, NULL),
('2018-07-20', 2, '18A0887', NULL, 3, 'Atta', 'PDS', 'AAY', 'I', '241.00', '119.00', '33.00', '0.00', '0.00', '0.00', '241.00', '119.00', '33.00', '0.00', 'Atta AAY', 'sss', '2018-08-10 11:47:23', 'A', 'sss', '2018-08-10 11:08:51', 'sss', '2018-08-10 11:51:11'),
('2018-07-20', 3, '18A0887', NULL, 4, 'Sugar', 'PDS', 'AAY', 'I', '1000.00', '500.00', '80.00', '0.00', '0.00', '0.00', '1000.00', '500.00', '80.00', '0.00', 'Sugar AAY', 'sss', '2018-08-10 11:48:28', 'A', 'sss', '2018-08-10 11:08:51', 'sss', '2018-08-10 11:51:29'),
('2018-07-20', 4, '18A0887', NULL, 1, 'Rice', 'PDS', 'SPHH', 'I', '458.00', '256.00', '77.00', '0.00', '0.00', '0.00', '458.00', '256.00', '77.00', '0.00', 'SPHH Rice\r\n\r\n                                ', 'sss', '2018-08-10 11:49:22', 'A', 'sss', '2018-08-10 11:08:51', NULL, NULL),
('2018-07-20', 5, '18A0887', NULL, 4, 'Sugar', 'PDS', 'SPHH', 'I', '667.00', '76.00', '23.00', '0.00', '0.00', '0.00', '667.00', '76.00', '23.00', '0.00', 'Sugar SPHH\r\n\r\n                                ', 'sss', '2018-08-10 11:50:39', 'A', 'sss', '2018-08-10 11:08:51', NULL, NULL),
('2018-08-05', 1, '18A0888', NULL, 1, 'Rice', 'PDS', 'AAY', 'I', '852.00', '296.00', '86.00', '0.00', '0.00', '0.00', '1350.00', '542.00', '176.00', '0.00', 'AAY Rice', 'sss', '2018-08-10 12:05:56', 'A', 'sss', '2018-08-10 12:08:13', 'sss', '2018-08-10 12:10:51'),
('2018-08-05', 2, '18A0888', NULL, 3, 'Atta', 'PDS', 'AAY', 'I', '578.00', '147.00', '36.00', '0.00', '0.00', '0.00', '819.00', '266.00', '69.00', '0.00', 'AAY Atta\r\n\r\n                                ', 'sss', '2018-08-10 12:07:12', 'A', 'sss', '2018-08-10 12:08:13', NULL, NULL),
('2018-08-05', 3, '18A0888', NULL, 4, 'Sugar', 'PDS', 'AAY', 'I', '187.00', '29.00', '0.00', '0.00', '0.00', '0.00', '1187.00', '529.00', '80.00', '0.00', 'AAY Sugar\r\n\r\n                                ', 'sss', '2018-08-10 12:07:54', 'A', 'sss', '2018-08-10 12:08:13', NULL, NULL),
('2018-08-05', 4, '18A0888', NULL, 4, 'Sugar', 'PDS', 'SPHH', 'I', '885.00', '587.00', '29.00', '0.00', '0.00', '0.00', '1552.00', '663.00', '52.00', '0.00', 'SPHH Sugar\r\n\r\n                                ', 'sss', '2018-08-10 12:08:41', 'A', 'sss', '2018-08-10 12:08:13', NULL, NULL),
('2018-08-05', 5, '18A0888', NULL, 1, 'Rice', 'PDS', 'SPHH', 'I', '200.00', '90.00', '12.00', '0.00', '0.00', '0.00', '658.00', '346.00', '89.00', '0.00', 'SPHH Rice\r\n\r\n                                ', 'sss', '2018-08-10 12:09:23', 'A', 'sss', '2018-08-10 12:08:13', NULL, NULL),
('2018-08-10', 1, NULL, '55/INS/F & S/U.N.PUR/18', 1, 'Rice', 'PDS', 'AAY', 'O', '100.00', '100000.00', '5000.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', '0.00', 'Enter Remarks If Any..\r\n\r\n                                ', 'sss', '2018-08-10 04:35:38', 'U', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `t_audit_trail`
--

CREATE TABLE `t_audit_trail` (
  `sl_no` int(5) UNSIGNED NOT NULL,
  `login_dt` datetime DEFAULT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  `terminal_name` varchar(50) DEFAULT NULL,
  `logout` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_audit_trail`
--

INSERT INTO `t_audit_trail` (`sl_no`, `login_dt`, `user_id`, `terminal_name`, `logout`) VALUES
(37, '2018-06-28 01:19:18', 'pk', 'Tanmoy', '2018-06-28 01:20:03'),
(38, '2018-06-28 01:21:58', 'pk', 'Tanmoy', NULL),
(39, '2018-06-28 02:18:10', 'pk', 'Tanmoy', '2018-06-28 02:19:02'),
(40, '2018-06-28 02:23:35', 'pk', 'Tanmoy', '2018-06-28 02:23:54'),
(41, '2018-06-28 02:25:24', 'sss', 'Tanmoy', '2018-06-28 03:02:01'),
(42, '2018-06-28 03:02:08', 'pk', 'Tanmoy', '2018-06-28 03:32:17'),
(43, '2018-06-28 03:32:21', 'sss', 'Tanmoy', '2018-06-28 03:49:43'),
(44, '2018-06-28 04:14:38', 'sss', 'Tanmoy', '2018-06-28 06:31:24'),
(45, '2018-06-29 02:51:34', 'pk', 'Tanmoy', '2018-06-29 03:46:03'),
(46, '2018-06-29 03:46:18', 'sss', 'Tanmoy', NULL),
(47, '2018-07-02 11:31:55', 'sss', 'Tanmoy', '2018-07-02 11:33:00'),
(48, '2018-07-02 03:06:20', 'sss', 'Tanmoy', '2018-07-02 03:06:45'),
(49, '2018-07-02 03:09:57', 'sss', 'Tanmoy', '2018-07-02 03:31:12'),
(50, '2018-07-02 03:31:17', 'pk', 'Tanmoy', '2018-07-02 03:45:43'),
(51, '2018-07-02 03:39:12', 'sss', 'Tanmoy', NULL),
(52, '2018-07-02 03:39:54', 'pk', 'Tanmoy', '2018-07-02 03:41:40'),
(53, '2018-07-02 03:40:55', 'pk', 'Tanmoy', '2018-07-02 03:41:33'),
(54, '2018-07-02 03:45:50', 'sss', 'Tanmoy', '2018-07-02 06:08:12'),
(55, '2018-07-02 04:35:17', 'pk', 'Tanmoy', '2018-07-02 04:36:12'),
(56, '2018-07-02 06:08:23', 'sss', 'Tanmoy', '2018-07-02 06:08:23'),
(57, '2018-07-02 06:08:39', 'sss', 'Tanmoy', '2018-07-02 06:08:39'),
(58, '2018-07-02 06:09:02', 'pk', 'Tanmoy', '2018-07-02 06:09:02'),
(59, '2018-07-02 06:09:49', 'sss', 'Tanmoy', '2018-07-02 06:09:49'),
(60, '2018-07-02 06:10:16', 'sss', 'Tanmoy', '2018-07-02 06:10:21'),
(61, '2018-07-02 06:16:36', 'sss', 'Tanmoy', '2018-07-02 06:16:36'),
(62, '2018-07-02 06:20:11', 'sss', 'Tanmoy', '2018-07-02 06:24:14'),
(63, '2018-07-02 06:24:20', 'sss', 'Tanmoy', '2018-07-02 06:27:44'),
(64, '2018-07-02 06:27:49', 'sss', 'Tanmoy', '2018-07-02 06:28:32'),
(65, '2018-07-02 06:28:22', 'pk', 'Tanmoy', '2018-07-02 06:29:25'),
(66, '2018-07-02 06:40:31', 'pk', 'Tanmoy', '2018-07-02 06:42:55'),
(67, '2018-07-03 11:32:38', 'sss', 'Tanmoy', '2018-07-03 11:52:25'),
(68, '2018-07-03 11:52:31', 'sss', 'Tanmoy', '2018-07-03 12:04:09'),
(69, '2018-07-03 12:05:01', 'sss', 'Tanmoy', '2018-07-03 12:05:14'),
(70, '2018-07-03 12:05:19', 'sss', 'Tanmoy', NULL),
(71, '2018-07-03 12:06:08', 'sss', 'Tanmoy', NULL),
(72, '2018-07-03 12:07:30', 'pk', 'Tanmoy', NULL),
(73, '2018-07-03 01:03:59', 'sss', 'Tanmoy', '2018-07-03 01:04:23'),
(74, '2018-07-03 01:04:41', 'sss', 'Tanmoy', NULL),
(75, '2018-07-03 05:00:16', 'sss', 'Tanmoy', '2018-07-03 05:00:19'),
(76, '2018-07-03 06:33:44', 'sss', 'Tanmoy', '2018-07-03 06:34:47'),
(77, '2018-07-03 06:43:28', 'sss', 'Tanmoy', '2018-07-03 06:43:53'),
(78, '2018-07-04 12:05:10', 'sss', 'Tanmoy', '2018-07-04 12:05:23'),
(79, '2018-07-04 12:27:09', 'sss', 'Tanmoy', '2018-07-04 12:27:12'),
(80, '2018-07-04 12:31:34', 'sss', 'Tanmoy', NULL),
(81, '2018-07-04 12:37:23', 'sss', 'Tanmoy', '2018-07-04 12:43:12'),
(82, '2018-07-04 01:18:41', 'sss', 'Tanmoy', NULL),
(83, '2018-07-04 01:26:14', 'pk', 'Tanmoy', '2018-07-04 01:26:24'),
(84, '2018-07-04 02:19:19', 'sss', 'Tanmoy', '2018-07-04 02:20:46'),
(85, '2018-07-04 02:44:59', 'pk', 'Tanmoy', NULL),
(86, '2018-07-04 04:11:22', 'sss', 'Tanmoy', NULL),
(87, '2018-07-06 12:54:53', 'sss', 'Tanmoy', '2018-07-06 12:55:08'),
(88, '2018-07-06 12:55:14', 'sss', 'Tanmoy', '2018-07-06 12:59:16'),
(89, '2018-07-06 12:59:24', 'sss', 'Tanmoy', NULL),
(90, '2018-07-06 03:57:29', 'sss', 'Tanmoy', '2018-07-06 03:57:38'),
(91, '2018-07-06 04:04:28', 'sss', 'Tanmoy', NULL),
(92, '2018-07-06 04:10:26', 'sss', 'Tanmoy', NULL),
(93, '2018-07-06 04:26:05', 'sss', 'Tanmoy', NULL),
(94, '2018-07-06 05:08:22', 'sss', 'Tanmoy', '2018-07-06 05:10:20'),
(95, '2018-07-06 05:10:26', 'pk', 'Tanmoy', '2018-07-06 05:26:56'),
(96, '2018-07-06 05:27:03', 'pk', 'Tanmoy', '2018-07-06 05:27:34'),
(97, '2018-07-06 05:28:01', 'pk', 'Tanmoy', '2018-07-06 06:34:37'),
(98, '2018-07-06 06:23:42', 'sss', 'Tanmoy', NULL),
(99, '2018-07-06 06:24:33', 'sss', 'Tanmoy', NULL),
(100, '2018-07-09 11:36:01', 'pk', 'Tanmoy', '2018-07-09 12:16:53'),
(101, '2018-07-09 12:16:59', 'pk', 'Tanmoy', NULL),
(102, '2018-07-09 12:41:36', 'sss', 'Tanmoy', NULL),
(103, '2018-07-09 01:56:37', 'sss', 'Tanmoy', '2018-07-09 01:57:29'),
(104, '2018-07-09 02:03:14', 'sss', 'Tanmoy', '2018-07-09 02:03:37'),
(105, '2018-07-09 02:03:53', 'sss', 'Tanmoy', '2018-07-09 02:04:00'),
(106, '2018-07-09 02:04:29', 'pk', 'Tanmoy', '2018-07-09 02:04:51'),
(107, '2018-07-09 02:40:17', 'sss', 'Tanmoy', NULL),
(108, '2018-07-09 03:08:25', 'sss', 'Tanmoy', NULL),
(109, '2018-07-09 03:13:08', 'sss', 'Tanmoy', '2018-07-09 03:13:49'),
(110, '2018-07-09 03:13:54', 'sss', 'Tanmoy', '2018-07-09 03:15:32'),
(111, '2018-07-09 03:18:50', 'sss', 'Tanmoy', NULL),
(112, '2018-07-09 03:43:42', 'sss', 'Tanmoy', NULL),
(113, '2018-07-09 03:48:49', 'sss', 'Tanmoy', '2018-07-09 03:49:03'),
(114, '2018-07-09 05:04:40', 'sss', 'Tanmoy', NULL),
(115, '2018-07-09 05:14:06', 'sss', 'Tanmoy', NULL),
(116, '2018-07-10 11:05:43', 'pk', 'Tanmoy', '2018-07-10 11:32:23'),
(117, '2018-07-10 11:32:28', 'sss', 'Tanmoy', '2018-07-10 11:34:13'),
(118, '2018-07-10 11:34:19', 'sss', 'Tanmoy', '2018-07-10 11:35:44'),
(119, '2018-07-10 11:35:49', 'sss', 'Tanmoy', '2018-07-10 11:38:16'),
(120, '2018-07-10 11:38:24', 'pk', 'Tanmoy', '2018-07-10 11:40:04'),
(121, '2018-07-10 11:40:13', 'pk', 'Tanmoy', '2018-07-10 11:41:37'),
(122, '2018-07-10 11:42:25', 'sss', 'Tanmoy', NULL),
(123, '2018-07-10 02:30:25', 'sss', 'Tanmoy', NULL),
(124, '2018-07-10 03:51:51', 'pk', 'Tanmoy', '2018-07-10 04:12:57'),
(125, '2018-07-10 04:13:01', 'sss', 'Tanmoy', NULL),
(126, '2018-07-10 05:15:02', 'sss', 'Tanmoy', NULL),
(127, '2018-07-10 05:43:41', 'pk', 'Tanmoy', '2018-07-10 06:03:12'),
(128, '2018-07-10 06:03:17', 'pk', 'Tanmoy', '2018-07-10 06:14:36'),
(129, '2018-07-10 06:14:42', 'pk', 'Tanmoy', '2018-07-10 06:28:20'),
(130, '2018-07-10 06:18:55', 'pk', 'Tanmoy', NULL),
(131, '2018-07-11 12:11:56', 'sss', 'Tanmoy', NULL),
(132, '2018-07-12 02:38:51', 'sss', 'Tanmoy', NULL),
(133, '2018-07-12 05:05:24', 'pk', 'Tanmoy', NULL),
(134, '2018-07-12 05:51:53', 'pk', 'Tanmoy', NULL),
(135, '2018-07-12 06:55:40', 'pk', 'Tanmoy', '2018-07-12 06:56:16'),
(136, '2018-07-13 02:27:34', 'sss', 'Tanmoy', NULL),
(137, '2018-07-13 02:34:11', 'pk', 'Tanmoy', NULL),
(138, '2018-07-13 05:07:34', 'pk', 'Tanmoy', NULL),
(139, '2018-07-13 06:13:10', 'sss', 'Tanmoy', '2018-07-13 06:15:01'),
(140, '2018-07-16 01:48:40', 'sss', 'Tanmoy', '2018-07-16 01:51:11'),
(141, '2018-07-16 01:51:32', 'pk', 'Tanmoy', '2018-07-16 02:09:00'),
(142, '2018-07-16 03:24:11', 'sss', '', NULL),
(143, '2018-07-16 03:28:14', 'sss', '', NULL),
(144, '2018-07-16 03:28:17', 'sss', '', NULL),
(145, '2018-07-16 03:28:27', 'sss', '', NULL),
(146, '2018-07-16 03:31:52', 'sss', '', '2018-07-16 03:31:56'),
(147, '2018-07-16 03:32:12', 'pk', 'Tanmoy', '2018-07-16 03:32:15'),
(148, '2018-07-16 03:32:27', 'pk', 'Tanmoy', '2018-07-16 03:32:29'),
(149, '2018-07-16 03:33:25', 'pk', '', NULL),
(150, '2018-07-16 03:34:16', 'pk', '', NULL),
(151, '2018-07-16 03:34:42', 'sss', '', NULL),
(152, '2018-07-16 03:42:25', 'sss', '', NULL),
(153, '2018-07-16 03:43:47', 'sss', '192.168.1.252', '2018-07-16 03:43:50'),
(154, '2018-07-16 03:44:57', 'sss', '192.168.1.27', '2018-07-16 03:46:13'),
(155, '2018-07-17 11:23:32', 'sss', '192.168.1.252', '2018-07-17 11:41:51'),
(156, '2018-07-17 11:41:56', 'sss', 'Tanmoy', '2018-07-17 11:42:12'),
(157, '2018-07-17 11:45:09', 'sss', '192.168.1.252', '2018-07-17 11:45:53'),
(158, '2018-07-17 11:46:51', 'sss', '192.168.1.252', '2018-07-17 11:49:51'),
(159, '2018-07-17 11:49:58', 'pk', '192.168.1.252', '2018-07-17 12:21:36'),
(160, '2018-07-17 01:06:53', 'pk', '192.168.1.252', NULL),
(161, '2018-07-17 02:06:13', 'pk', '192.168.1.252', NULL),
(162, '2018-07-17 03:02:01', 'sss', '192.168.1.252', NULL),
(163, '2018-07-17 04:09:50', 'pk', '192.168.1.252', NULL),
(164, '2018-07-17 04:48:24', 'sss', '192.168.1.252', NULL),
(165, '2018-07-17 04:49:34', 'pk', '192.168.1.252', NULL),
(166, '2018-07-17 05:21:40', 'sss', '127.0.0.1', '2018-07-17 06:38:12'),
(167, '2018-07-18 11:41:56', 'pk', '127.0.0.1', '2018-07-18 11:54:06'),
(168, '2018-07-18 11:55:44', 'sss', '127.0.0.1', '2018-07-18 12:04:04'),
(169, '2018-07-18 12:04:23', 'pk', '127.0.0.1', '2018-07-18 12:05:01'),
(170, '2018-07-18 12:05:07', 'sss', '127.0.0.1', '2018-07-18 12:05:27'),
(171, '2018-07-18 12:05:32', 'pk', '127.0.0.1', '2018-07-18 12:16:09'),
(172, '2018-07-18 12:16:14', 'pk', '127.0.0.1', '2018-07-18 03:15:36'),
(173, '2018-07-18 03:15:42', 'sss', '127.0.0.1', '2018-07-18 06:33:14'),
(174, '2018-07-18 06:33:21', 'pk', '127.0.0.1', NULL),
(175, '2018-07-18 06:44:36', 'sss', '127.0.0.1', '2018-07-18 06:50:30'),
(176, '2018-07-19 11:42:23', 'pk', '127.0.0.1', '2018-07-19 11:48:07'),
(177, '2018-07-19 01:46:35', 'sss', '127.0.0.1', '2018-07-19 01:46:37'),
(178, '2018-07-19 03:24:53', 'pk', '127.0.0.1', '2018-07-19 03:25:00'),
(179, '2018-07-19 03:26:45', 'pk', '127.0.0.1', '2018-07-19 03:26:47'),
(180, '2018-07-19 03:29:21', 'pk', '192.168.1.34', '2018-07-19 03:29:56'),
(181, '2018-07-19 03:31:49', 'sss', '127.0.0.1', NULL),
(182, '2018-07-19 06:11:30', 'sss', '127.0.0.1', NULL),
(183, '2018-07-19 06:28:10', 'sss', '127.0.0.1', '2018-07-19 06:30:43'),
(184, '2018-07-20 11:53:43', 'pk', '127.0.0.1', NULL),
(185, '2018-07-20 02:49:34', 'sss', '127.0.0.1', NULL),
(186, '2018-07-20 04:41:06', 'sss', '127.0.0.1', NULL),
(187, '2018-07-20 04:59:10', 'sss', '127.0.0.1', NULL),
(188, '2018-07-20 05:51:20', 'sss', '127.0.0.1', NULL),
(189, '2018-07-20 06:06:57', 'sss', '127.0.0.1', NULL),
(190, '2018-07-23 11:24:30', 'sss', '127.0.0.1', '2018-07-23 11:59:58'),
(191, '2018-07-23 12:00:14', 'pk', '127.0.0.1', '2018-07-23 12:56:41'),
(192, '2018-07-23 12:56:45', 'sss', '127.0.0.1', '2018-07-23 12:59:20'),
(193, '2018-07-23 12:59:34', 'sss', '127.0.0.1', NULL),
(194, '2018-07-23 04:22:16', 'sss', '127.0.0.1', '2018-07-23 04:22:43'),
(195, '2018-07-23 04:54:44', 'sss', '127.0.0.1', '2018-07-23 05:10:24'),
(196, '2018-07-24 03:19:22', 'pk', '127.0.0.1', '2018-07-24 03:19:55'),
(197, '2018-07-24 03:28:32', 'pk', '127.0.0.1', '2018-07-24 05:30:41'),
(198, '2018-07-24 05:34:57', 'pk', '127.0.0.1', NULL),
(199, '2018-07-25 11:38:28', 'sss', '127.0.0.1', '2018-07-25 11:58:54'),
(200, '2018-07-25 11:58:58', 'sss', '127.0.0.1', NULL),
(201, '2018-07-25 05:03:47', 'sss', '192.168.1.27', NULL),
(202, '2018-07-25 05:06:50', 'sss', '127.0.0.1', NULL),
(203, '2018-07-25 05:53:40', 'sss', '192.168.1.248', NULL),
(204, '2018-07-25 06:10:22', 'pk', '127.0.0.1', '2018-07-25 06:16:48'),
(205, '2018-07-25 06:16:53', 'pk', '127.0.0.1', NULL),
(206, '2018-07-26 11:33:49', 'sss', '127.0.0.1', NULL),
(207, '2018-07-26 12:22:55', 'sss', '127.0.0.1', '2018-07-26 01:30:44'),
(208, '2018-07-26 01:30:55', 'pk', '127.0.0.1', NULL),
(209, '2018-07-26 03:06:26', 'sss', '192.168.1.248', NULL),
(210, '2018-07-26 04:04:37', 'sss', '192.168.1.248', NULL),
(211, '2018-07-26 04:13:06', 'pk', '127.0.0.1', NULL),
(212, '2018-07-26 05:11:35', 'sss', '192.168.1.248', NULL),
(213, '2018-07-26 05:24:38', 'sss', '127.0.0.1', '2018-07-26 06:36:04'),
(214, '2018-07-26 06:38:33', 'sss', '192.168.1.248', NULL),
(215, '2018-07-27 10:51:25', 'sss', '127.0.0.1', '2018-07-27 10:58:46'),
(216, '2018-07-27 10:58:52', 'pk', '127.0.0.1', NULL),
(217, '2018-07-27 11:02:26', 'sss', '127.0.0.1', '2018-07-27 11:04:00'),
(218, '2018-07-27 11:05:09', 'sss', '127.0.0.1', NULL),
(219, '2018-07-27 11:57:35', 'sss', '192.168.1.248', NULL),
(220, '2018-07-27 12:39:33', 'sss', '192.168.1.248', NULL),
(221, '2018-07-27 01:34:57', 'pk', '127.0.0.1', NULL),
(222, '2018-07-27 02:09:51', 'pk', '127.0.0.1', NULL),
(223, '2018-07-27 02:31:33', 'sss', '192.168.1.248', NULL),
(224, '2018-07-27 03:27:23', 'sss', '192.168.1.248', NULL),
(225, '2018-07-27 06:09:52', 'sss', '127.0.0.1', '2018-07-27 06:27:08'),
(226, '2018-07-30 12:01:11', 'sss', '127.0.0.1', '2018-07-30 12:15:12'),
(227, '2018-07-30 12:15:16', 'sss', '127.0.0.1', NULL),
(228, '2018-07-30 12:16:04', 'sss', '192.168.1.248', NULL),
(229, '2018-07-30 02:34:44', 'sss', '192.168.1.248', NULL),
(230, '2018-07-30 04:35:54', 'sss', '192.168.1.248', NULL),
(231, '2018-07-30 05:16:03', 'sss', '127.0.0.1', NULL),
(232, '2018-07-30 05:16:50', 'sss', '127.0.0.1', NULL),
(233, '2018-07-31 03:27:02', 'sss', '::1', '2018-07-31 03:51:49'),
(234, '2018-07-31 03:51:58', 'sss', '::1', '2018-07-31 04:00:54'),
(235, '2018-07-31 04:01:03', 'sss', '::1', NULL),
(236, '2018-07-31 04:05:32', 'sss', '127.0.0.1', NULL),
(237, '2018-07-31 05:36:46', 'sss', '::1', NULL),
(238, '2018-08-02 10:35:51', 'sss', '::1', NULL),
(239, '2018-08-02 10:49:52', 'sss', '::1', '2018-08-02 10:51:56'),
(240, '2018-08-02 10:52:01', 'sss', '::1', '2018-08-02 12:24:03'),
(241, '2018-08-02 10:59:08', 'sss', '192.168.1.252', NULL),
(242, '2018-08-02 11:08:15', 'sss', '192.168.1.252', NULL),
(243, '2018-08-02 01:51:50', 'sss', '::1', '2018-08-02 02:56:04'),
(244, '2018-08-02 02:56:08', 'sss', '::1', '2018-08-06 03:49:07'),
(245, '2018-08-02 03:19:04', 'sss', '192.168.1.26', '2018-08-02 03:22:12'),
(246, '2018-08-02 04:44:40', 'sss', '192.168.1.252', NULL),
(247, '2018-08-02 05:43:09', 'sss', '::1', NULL),
(248, '2018-08-03 10:03:33', 'sss', '::1', '2018-08-03 01:01:30'),
(249, '2018-08-03 12:37:07', 'sss', '192.168.1.27', '2018-08-03 12:37:40'),
(250, '2018-08-03 12:38:47', 'sss', '192.168.1.27', '2018-08-03 01:02:03'),
(251, '2018-08-03 01:06:32', 'sss', '::1', '2018-08-03 02:01:23'),
(252, '2018-08-03 01:56:27', 'sss', '192.168.1.27', NULL),
(253, '2018-08-03 02:01:30', 'sss', '::1', '2018-08-03 02:06:36'),
(254, '2018-08-03 02:06:40', 'sss', '::1', NULL),
(255, '2018-08-03 03:24:10', 'sss', '192.168.1.27', NULL),
(256, '2018-08-03 05:05:29', 'sss', '::1', '2018-08-03 05:23:45'),
(257, '2018-08-06 10:07:36', 'sss', '::1', NULL),
(258, '2018-08-06 10:54:47', 'sss', '::1', NULL),
(259, '2018-08-06 05:27:40', 'sss', '127.0.0.1', NULL),
(260, '2018-08-07 03:09:22', 'sss', '127.0.0.1', '2018-08-07 03:10:23'),
(261, '2018-08-07 03:16:13', 'sss', '127.0.0.1', '2018-08-07 03:25:24'),
(262, '2018-08-07 03:31:00', 'pk', '127.0.0.1', '2018-08-07 03:58:39'),
(263, '2018-08-07 04:06:06', 'pk', '127.0.0.1', '2018-08-07 04:44:21'),
(264, '2018-08-07 06:20:22', 'sss', '127.0.0.1', '2018-08-07 06:38:37'),
(265, '2018-08-08 10:47:23', 'sss', '127.0.0.1', NULL),
(266, '2018-08-08 11:41:47', 'sss', '127.0.0.1', NULL),
(267, '2018-08-08 12:58:46', 'sss', '127.0.0.1', NULL),
(268, '2018-08-08 02:59:35', 'sss', '127.0.0.1', '2018-08-08 04:48:56'),
(269, '2018-08-08 04:49:40', 'sss', '127.0.0.1', NULL),
(270, '2018-08-08 06:07:17', 'sss', '127.0.0.1', '2018-08-08 06:34:42'),
(271, '2018-08-09 11:21:17', 'sss', '127.0.0.1', NULL),
(272, '2018-08-09 12:55:38', 'sss', '127.0.0.1', NULL),
(273, '2018-08-09 02:23:40', 'sss', '127.0.0.1', '2018-08-09 03:32:46'),
(274, '2018-08-09 03:39:05', 'sss', '127.0.0.1', '2018-08-09 04:00:17'),
(275, '2018-08-10 11:21:53', 'sss', '127.0.0.1', NULL),
(276, '2018-08-10 03:19:54', 'sss', '127.0.0.1', '2018-08-10 03:54:10'),
(277, '2018-08-10 03:54:15', 'sss', '127.0.0.1', NULL),
(278, '2019-02-25 04:02:52', 'sss', '::1', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `m_allot_scale`
--
ALTER TABLE `m_allot_scale`
  ADD PRIMARY KEY (`sl_no`,`effective_dt`,`prod_desc`,`prod_catg`) USING BTREE;

--
-- Indexes for table `m_dealers`
--
ALTER TABLE `m_dealers`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `m_login_user`
--
ALTER TABLE `m_login_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `m_params`
--
ALTER TABLE `m_params`
  ADD PRIMARY KEY (`paran_no`);

--
-- Indexes for table `m_products`
--
ALTER TABLE `m_products`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `m_prod_catg`
--
ALTER TABLE `m_prod_catg`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `m_prod_qty`
--
ALTER TABLE `m_prod_qty`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `m_prod_type`
--
ALTER TABLE `m_prod_type`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `m_rate_master`
--
ALTER TABLE `m_rate_master`
  ADD PRIMARY KEY (`effective_dt`,`prod_desc`,`prod_type`,`prod_catg`);

--
-- Indexes for table `m_shortage`
--
ALTER TABLE `m_shortage`
  ADD PRIMARY KEY (`effective_dt`,`prod_desc`,`prod_catg`);

--
-- Indexes for table `td_allotment_sheet`
--
ALTER TABLE `td_allotment_sheet`
  ADD PRIMARY KEY (`memo_no`,`alt_month`,`alt_year`,`mr_no`);

--
-- Indexes for table `td_allot_dtls`
--
ALTER TABLE `td_allot_dtls`
  ADD PRIMARY KEY (`trans_dt`,`allot_no`,`catg_cd`,`prod_cd`);

--
-- Indexes for table `td_stock_balance`
--
ALTER TABLE `td_stock_balance`
  ADD PRIMARY KEY (`trans_dt`,`trans_cd`);

--
-- Indexes for table `td_stock_trans_pds`
--
ALTER TABLE `td_stock_trans_pds`
  ADD PRIMARY KEY (`trans_dt`,`trans_cd`);

--
-- Indexes for table `t_audit_trail`
--
ALTER TABLE `t_audit_trail`
  ADD PRIMARY KEY (`sl_no`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `m_allot_scale`
--
ALTER TABLE `m_allot_scale`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `m_dealers`
--
ALTER TABLE `m_dealers`
  MODIFY `sl_no` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `m_params`
--
ALTER TABLE `m_params`
  MODIFY `paran_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `m_products`
--
ALTER TABLE `m_products`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `m_prod_catg`
--
ALTER TABLE `m_prod_catg`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `m_prod_qty`
--
ALTER TABLE `m_prod_qty`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `m_prod_type`
--
ALTER TABLE `m_prod_type`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_audit_trail`
--
ALTER TABLE `t_audit_trail`
  MODIFY `sl_no` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=279;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
