-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 04, 2019 at 01:42 PM
-- Server version: 5.7.26-0ubuntu0.18.04.1
-- PHP Version: 7.2.17-1+ubuntu18.04.1+deb.sury.org+3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ems`
--

-- --------------------------------------------------------

--
-- Table structure for table `md_bank`
--

CREATE TABLE `md_bank` (
  `org_id` bigint(20) NOT NULL,
  `bank_id` int(11) NOT NULL,
  `bank_name` varchar(75) NOT NULL,
  `created_by` varchar(25) NOT NULL,
  `created_dt` date NOT NULL,
  `modified_by` varchar(75) DEFAULT NULL,
  `modified_dt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_bank`
--

INSERT INTO `md_bank` (`org_id`, `bank_id`, `bank_name`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(0, 1, 'Bank 1', 'SSS', '2019-05-22', NULL, NULL),
(0, 2, 'Bank 2', 'SSS', '2019-05-22', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `md_claim_head`
--

CREATE TABLE `md_claim_head` (
  `org_id` bigint(20) NOT NULL,
  `head_cd` int(11) NOT NULL,
  `head_desc` varchar(100) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_claim_head`
--

INSERT INTO `md_claim_head` (`org_id`, `head_cd`, `head_desc`) VALUES
(0, 1, 'FOOD & REFRESHMENT'),
(0, 2, 'OTHER VEHICLES'),
(0, 3, 'HOTEL LODGING'),
(0, 4, 'WATER/COFFEE/TEA'),
(0, 5, 'OTHERS'),
(0, 6, 'TRAIN'),
(0, 7, 'MOTOR CYCLE'),
(0, 8, 'CAR RENT'),
(0, 9, 'Photocopy'),
(0, 10, 'LAUNDRY'),
(0, 11, 'BUS'),
(0, 12, 'METRO CARD'),
(0, 13, 'CAR PARKING'),
(0, 14, 'METRO'),
(0, 15, 'CUSTOMER REFRESHMENT'),
(0, 16, 'TOLL TAX'),
(0, 17, 'BUSINESS DEVELOPMENT'),
(0, 18, 'REVENUE STAMP'),
(0, 19, 'DELIVERY CHARGES'),
(0, 20, 'RICKSHAW'),
(0, 21, 'LAUNCH & BOAT'),
(0, 22, 'OFFICE STATIONARY EXPENSES'),
(0, 23, 'COURIER CHARGES'),
(0, 24, 'BANK CHARGES'),
(0, 25, 'COURT PAPER'),
(0, 26, 'TAXI'),
(0, 27, 'FUEL'),
(0, 28, 'ACCOUNTING CHARGES'),
(0, 29, 'PER DIEM@150'),
(0, 30, 'PER DIEM@200'),
(0, 31, 'PER DIEM@100'),
(0, 32, 'HALF PER DIEM @ 75'),
(0, 33, 'TELEPHONE CHARGES'),
(0, 34, 'AIR TICKET'),
(0, 35, 'GAS CYLINDER'),
(0, 36, 'LUGGAGE FREIGHT(TRAIN)'),
(0, 37, 'TRAM'),
(0, 38, 'PRINTING & LAMINATION'),
(0, 39, 'PARKING'),
(0, 40, 'WATER'),
(0, 41, 'DRIVER'),
(0, 42, 'MOBILE RECHARGE'),
(0, 43, 'SYSTEM SOFTWARE'),
(0, 44, 'VAN'),
(0, 45, 'Projector'),
(0, 46, 'APPLICATION SOFTWARE'),
(0, 47, 'AUTO'),
(0, 48, 'TOTO RICKSHAW'),
(0, 49, 'MAGIC CAR'),
(0, 50, 'PER DIEM 250'),
(0, 51, 'Web Server/Domain/Templates/Others'),
(0, 52, 'Milk'),
(0, 53, 'Sugar'),
(0, 54, 'Biscuit'),
(0, 55, 'Gift for Customer'),
(0, 56, 'Advertisement');

-- --------------------------------------------------------

--
-- Table structure for table `md_countries`
--

CREATE TABLE `md_countries` (
  `id` int(11) NOT NULL,
  `country_code` varchar(2) NOT NULL DEFAULT '',
  `country_name` varchar(100) NOT NULL DEFAULT ''
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_countries`
--

INSERT INTO `md_countries` (`id`, `country_code`, `country_name`) VALUES
(1, 'AF', 'Afghanistan'),
(2, 'AL', 'Albania'),
(3, 'DZ', 'Algeria'),
(4, 'DS', 'American Samoa'),
(5, 'AD', 'Andorra'),
(6, 'AO', 'Angola'),
(7, 'AI', 'Anguilla'),
(8, 'AQ', 'Antarctica'),
(9, 'AG', 'Antigua and Barbuda'),
(10, 'AR', 'Argentina'),
(11, 'AM', 'Armenia'),
(12, 'AW', 'Aruba'),
(13, 'AU', 'Australia'),
(14, 'AT', 'Austria'),
(15, 'AZ', 'Azerbaijan'),
(16, 'BS', 'Bahamas'),
(17, 'BH', 'Bahrain'),
(18, 'BD', 'Bangladesh'),
(19, 'BB', 'Barbados'),
(20, 'BY', 'Belarus'),
(21, 'BE', 'Belgium'),
(22, 'BZ', 'Belize'),
(23, 'BJ', 'Benin'),
(24, 'BM', 'Bermuda'),
(25, 'BT', 'Bhutan'),
(26, 'BO', 'Bolivia'),
(27, 'BA', 'Bosnia and Herzegovina'),
(28, 'BW', 'Botswana'),
(29, 'BV', 'Bouvet Island'),
(30, 'BR', 'Brazil'),
(31, 'IO', 'British Indian Ocean Territory'),
(32, 'BN', 'Brunei Darussalam'),
(33, 'BG', 'Bulgaria'),
(34, 'BF', 'Burkina Faso'),
(35, 'BI', 'Burundi'),
(36, 'KH', 'Cambodia'),
(37, 'CM', 'Cameroon'),
(38, 'CA', 'Canada'),
(39, 'CV', 'Cape Verde'),
(40, 'KY', 'Cayman Islands'),
(41, 'CF', 'Central African Republic'),
(42, 'TD', 'Chad'),
(43, 'CL', 'Chile'),
(44, 'CN', 'China'),
(45, 'CX', 'Christmas Island'),
(46, 'CC', 'Cocos (Keeling) Islands'),
(47, 'CO', 'Colombia'),
(48, 'KM', 'Comoros'),
(49, 'CG', 'Congo'),
(50, 'CK', 'Cook Islands'),
(51, 'CR', 'Costa Rica'),
(52, 'HR', 'Croatia (Hrvatska)'),
(53, 'CU', 'Cuba'),
(54, 'CY', 'Cyprus'),
(55, 'CZ', 'Czech Republic'),
(56, 'DK', 'Denmark'),
(57, 'DJ', 'Djibouti'),
(58, 'DM', 'Dominica'),
(59, 'DO', 'Dominican Republic'),
(60, 'TP', 'East Timor'),
(61, 'EC', 'Ecuador'),
(62, 'EG', 'Egypt'),
(63, 'SV', 'El Salvador'),
(64, 'GQ', 'Equatorial Guinea'),
(65, 'ER', 'Eritrea'),
(66, 'EE', 'Estonia'),
(67, 'ET', 'Ethiopia'),
(68, 'FK', 'Falkland Islands (Malvinas)'),
(69, 'FO', 'Faroe Islands'),
(70, 'FJ', 'Fiji'),
(71, 'FI', 'Finland'),
(72, 'FR', 'France'),
(73, 'FX', 'France, Metropolitan'),
(74, 'GF', 'French Guiana'),
(75, 'PF', 'French Polynesia'),
(76, 'TF', 'French Southern Territories'),
(77, 'GA', 'Gabon'),
(78, 'GM', 'Gambia'),
(79, 'GE', 'Georgia'),
(80, 'DE', 'Germany'),
(81, 'GH', 'Ghana'),
(82, 'GI', 'Gibraltar'),
(83, 'GK', 'Guernsey'),
(84, 'GR', 'Greece'),
(85, 'GL', 'Greenland'),
(86, 'GD', 'Grenada'),
(87, 'GP', 'Guadeloupe'),
(88, 'GU', 'Guam'),
(89, 'GT', 'Guatemala'),
(90, 'GN', 'Guinea'),
(91, 'GW', 'Guinea-Bissau'),
(92, 'GY', 'Guyana'),
(93, 'HT', 'Haiti'),
(94, 'HM', 'Heard and Mc Donald Islands'),
(95, 'HN', 'Honduras'),
(96, 'HK', 'Hong Kong'),
(97, 'HU', 'Hungary'),
(98, 'IS', 'Iceland'),
(99, 'IN', 'India'),
(100, 'IM', 'Isle of Man'),
(101, 'ID', 'Indonesia'),
(102, 'IR', 'Iran (Islamic Republic of)'),
(103, 'IQ', 'Iraq'),
(104, 'IE', 'Ireland'),
(105, 'IL', 'Israel'),
(106, 'IT', 'Italy'),
(107, 'CI', 'Ivory Coast'),
(108, 'JE', 'Jersey'),
(109, 'JM', 'Jamaica'),
(110, 'JP', 'Japan'),
(111, 'JO', 'Jordan'),
(112, 'KZ', 'Kazakhstan'),
(113, 'KE', 'Kenya'),
(114, 'KI', 'Kiribati'),
(115, 'KP', 'Korea, Democratic People\'s Republic of'),
(116, 'KR', 'Korea, Republic of'),
(117, 'XK', 'Kosovo'),
(118, 'KW', 'Kuwait'),
(119, 'KG', 'Kyrgyzstan'),
(120, 'LA', 'Lao People\'s Democratic Republic'),
(121, 'LV', 'Latvia'),
(122, 'LB', 'Lebanon'),
(123, 'LS', 'Lesotho'),
(124, 'LR', 'Liberia'),
(125, 'LY', 'Libyan Arab Jamahiriya'),
(126, 'LI', 'Liechtenstein'),
(127, 'LT', 'Lithuania'),
(128, 'LU', 'Luxembourg'),
(129, 'MO', 'Macau'),
(130, 'MK', 'Macedonia'),
(131, 'MG', 'Madagascar'),
(132, 'MW', 'Malawi'),
(133, 'MY', 'Malaysia'),
(134, 'MV', 'Maldives'),
(135, 'ML', 'Mali'),
(136, 'MT', 'Malta'),
(137, 'MH', 'Marshall Islands'),
(138, 'MQ', 'Martinique'),
(139, 'MR', 'Mauritania'),
(140, 'MU', 'Mauritius'),
(141, 'TY', 'Mayotte'),
(142, 'MX', 'Mexico'),
(143, 'FM', 'Micronesia, Federated States of'),
(144, 'MD', 'Moldova, Republic of'),
(145, 'MC', 'Monaco'),
(146, 'MN', 'Mongolia'),
(147, 'ME', 'Montenegro'),
(148, 'MS', 'Montserrat'),
(149, 'MA', 'Morocco'),
(150, 'MZ', 'Mozambique'),
(151, 'MM', 'Myanmar'),
(152, 'NA', 'Namibia'),
(153, 'NR', 'Nauru'),
(154, 'NP', 'Nepal'),
(155, 'NL', 'Netherlands'),
(156, 'AN', 'Netherlands Antilles'),
(157, 'NC', 'New Caledonia'),
(158, 'NZ', 'New Zealand'),
(159, 'NI', 'Nicaragua'),
(160, 'NE', 'Niger'),
(161, 'NG', 'Nigeria'),
(162, 'NU', 'Niue'),
(163, 'NF', 'Norfolk Island'),
(164, 'MP', 'Northern Mariana Islands'),
(165, 'NO', 'Norway'),
(166, 'OM', 'Oman'),
(167, 'PK', 'Pakistan'),
(168, 'PW', 'Palau'),
(169, 'PS', 'Palestine'),
(170, 'PA', 'Panama'),
(171, 'PG', 'Papua New Guinea'),
(172, 'PY', 'Paraguay'),
(173, 'PE', 'Peru'),
(174, 'PH', 'Philippines'),
(175, 'PN', 'Pitcairn'),
(176, 'PL', 'Poland'),
(177, 'PT', 'Portugal'),
(178, 'PR', 'Puerto Rico'),
(179, 'QA', 'Qatar'),
(180, 'RE', 'Reunion'),
(181, 'RO', 'Romania'),
(182, 'RU', 'Russian Federation'),
(183, 'RW', 'Rwanda'),
(184, 'KN', 'Saint Kitts and Nevis'),
(185, 'LC', 'Saint Lucia'),
(186, 'VC', 'Saint Vincent and the Grenadines'),
(187, 'WS', 'Samoa'),
(188, 'SM', 'San Marino'),
(189, 'ST', 'Sao Tome and Principe'),
(190, 'SA', 'Saudi Arabia'),
(191, 'SN', 'Senegal'),
(192, 'RS', 'Serbia'),
(193, 'SC', 'Seychelles'),
(194, 'SL', 'Sierra Leone'),
(195, 'SG', 'Singapore'),
(196, 'SK', 'Slovakia'),
(197, 'SI', 'Slovenia'),
(198, 'SB', 'Solomon Islands'),
(199, 'SO', 'Somalia'),
(200, 'ZA', 'South Africa'),
(201, 'GS', 'South Georgia South Sandwich Islands'),
(202, 'SS', 'South Sudan'),
(203, 'ES', 'Spain'),
(204, 'LK', 'Sri Lanka'),
(205, 'SH', 'St. Helena'),
(206, 'PM', 'St. Pierre and Miquelon'),
(207, 'SD', 'Sudan'),
(208, 'SR', 'Suriname'),
(209, 'SJ', 'Svalbard and Jan Mayen Islands'),
(210, 'SZ', 'Swaziland'),
(211, 'SE', 'Sweden'),
(212, 'CH', 'Switzerland'),
(213, 'SY', 'Syrian Arab Republic'),
(214, 'TW', 'Taiwan'),
(215, 'TJ', 'Tajikistan'),
(216, 'TZ', 'Tanzania, United Republic of'),
(217, 'TH', 'Thailand'),
(218, 'TG', 'Togo'),
(219, 'TK', 'Tokelau'),
(220, 'TO', 'Tonga'),
(221, 'TT', 'Trinidad and Tobago'),
(222, 'TN', 'Tunisia'),
(223, 'TR', 'Turkey'),
(224, 'TM', 'Turkmenistan'),
(225, 'TC', 'Turks and Caicos Islands'),
(226, 'TV', 'Tuvalu'),
(227, 'UG', 'Uganda'),
(228, 'UA', 'Ukraine'),
(229, 'AE', 'United Arab Emirates'),
(230, 'GB', 'United Kingdom'),
(231, 'US', 'United States'),
(232, 'UM', 'United States minor outlying islands'),
(233, 'UY', 'Uruguay'),
(234, 'UZ', 'Uzbekistan'),
(235, 'VU', 'Vanuatu'),
(236, 'VA', 'Vatican City State'),
(237, 'VE', 'Venezuela'),
(238, 'VN', 'Vietnam'),
(239, 'VG', 'Virgin Islands (British)'),
(240, 'VI', 'Virgin Islands (U.S.)'),
(241, 'WF', 'Wallis and Futuna Islands'),
(242, 'EH', 'Western Sahara'),
(243, 'YE', 'Yemen'),
(244, 'ZR', 'Zaire'),
(245, 'ZM', 'Zambia'),
(246, 'ZW', 'Zimbabwe');

-- --------------------------------------------------------

--
-- Table structure for table `md_departments`
--

CREATE TABLE `md_departments` (
  `org_id` bigint(20) NOT NULL,
  `sl_no` int(11) NOT NULL,
  `dept_name` varchar(30) NOT NULL,
  `emp_code` varchar(20) NOT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_departments`
--

INSERT INTO `md_departments` (`org_id`, `sl_no`, `dept_name`, `emp_code`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(0, 1, 'SSS', ' ', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `md_employee`
--

CREATE TABLE `md_employee` (
  `org_id` bigint(20) NOT NULL,
  `emp_code` varchar(25) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `gurd_name` varchar(100) DEFAULT NULL,
  `marital_status` char(1) DEFAULT NULL,
  `gender` char(1) DEFAULT NULL,
  `doc_sub` text,
  `emp_file_no` varchar(100) DEFAULT NULL,
  `passport` varchar(25) DEFAULT NULL,
  `present_addr` text,
  `country` int(11) DEFAULT NULL,
  `state` int(11) DEFAULT NULL,
  `city` varchar(15) DEFAULT NULL,
  `pin` varchar(10) DEFAULT NULL,
  `permanent_add` text,
  `primary_mob` varchar(14) DEFAULT NULL,
  `secondary_mob` varchar(14) DEFAULT NULL,
  `personal_email` varchar(50) DEFAULT NULL,
  `prof_email` varchar(50) DEFAULT NULL,
  `identity_marks` varchar(50) DEFAULT NULL,
  `blood_group` varchar(5) DEFAULT NULL,
  `bank_name` varchar(75) DEFAULT NULL,
  `branch_name` varchar(20) DEFAULT NULL,
  `acc_no` varchar(20) DEFAULT NULL,
  `pan_no` varchar(20) DEFAULT NULL,
  `pf_no` varchar(20) DEFAULT NULL,
  `esi_no` varchar(20) DEFAULT NULL,
  `adhar_no` varchar(20) DEFAULT NULL,
  `emg_name` varchar(25) DEFAULT NULL,
  `relation` varchar(15) DEFAULT NULL,
  `contact_no` varchar(12) DEFAULT NULL,
  `contact_address` text,
  `designation` varchar(50) DEFAULT NULL,
  `department` int(11) DEFAULT NULL,
  `emp_catg` char(1) DEFAULT NULL,
  `joining_date` date DEFAULT '2019-01-01',
  `emp_status` char(1) NOT NULL DEFAULT 'A',
  `termination_date` date DEFAULT NULL,
  `img_path` text,
  `created_by` varchar(50) NOT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_employee`
--

INSERT INTO `md_employee` (`org_id`, `emp_code`, `emp_name`, `gurd_name`, `marital_status`, `gender`, `doc_sub`, `emp_file_no`, `passport`, `present_addr`, `country`, `state`, `city`, `pin`, `permanent_add`, `primary_mob`, `secondary_mob`, `personal_email`, `prof_email`, `identity_marks`, `blood_group`, `bank_name`, `branch_name`, `acc_no`, `pan_no`, `pf_no`, `esi_no`, `adhar_no`, `emg_name`, `relation`, `contact_no`, `contact_address`, `designation`, `department`, `emp_catg`, `joining_date`, `emp_status`, `termination_date`, `img_path`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(0, 'sss', 'Synergic Softek', '', '', 'O', '', '', '', 'Rabindra Sarabar', 99, 35, 'Kolkata', '700001', 'Rabindra Sarabar', '1233211234', '', '', 'sss@synergicsoftek.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '0000-00-00', 'A', '0000-00-00', 'assets/images/users/profile.png', 'Synergic Softek', '2019-05-17 11:14:16', NULL, NULL),
(0, '116', 'Subhankar Bhowmik', '', 'U', 'M', '', '', '', 'Address', 99, 35, 'Kolkata', '700123', '', '', '', '', '', 'NA', 'O+', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '0000-00-00', 'A', '0000-00-00', 'assets/images/users/profile.png', 'Synergic Softek', '2019-05-17 04:11:49', NULL, NULL),
(0, '32', 'Tanmoy Mondal', '', 'M', 'M', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '0000-00-00', 'A', '0000-00-00', 'assets/images/users/profile.png', 'Synergic Softek', '2019-05-17 04:22:48', NULL, NULL),
(0, '36', 'Sanjay Sardar', '', 'M', 'M', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '0000-00-00', 'A', '0000-00-00', 'assets/images/users/profile.png', 'Synergic Softek', '2019-05-17 04:23:35', NULL, NULL),
(0, '105', 'Pritam Maity', '', 'U', 'M', '', '', '', '', 0, 0, '', '', '', '', '', '', 'pritam@synergicsoftek.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '0000-00-00', 'A', '0000-00-00', 'assets/images/users/profile.png', 'Synergic Softek', '2019-05-17 04:24:17', 'Raj Nath', '2019-05-17 05:28:39'),
(0, '450', 'Tarun', '', '', 'F', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '0000-00-00', 'A', '0000-00-00', 'assets/images/users/profile.png', 'Synergic Softek', '2019-05-17 04:33:31', NULL, NULL),
(0, '100', 'Unknown', 'Elo Pathari', 'M', 'M', '', '', '', '', 0, 0, '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '0000-00-00', 'A', '0000-00-00', 'assets/images/users/profile.png', 'Synergic Softek', '2019-05-17 04:35:13', 'Synergic Softek', '2019-05-17 05:17:51'),
(0, '10', 'Raj Nath', '', 'M', 'M', '', '', '', '', 99, 21, 'Delhi', '', '', '', '', '', 'r@bjp.com', '', '', '', '', '', '', '', '', '', '', '', '', '', '', 1, '', '0000-00-00', 'A', '0000-00-00', 'assets/images/users/profile.png', 'Synergic Softek', '2019-05-17 05:23:01', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `md_emp_edu`
--

CREATE TABLE `md_emp_edu` (
  `org_id` bigint(20) NOT NULL,
  `sl_no` int(11) NOT NULL,
  `emp_code` varchar(50) NOT NULL,
  `board` varchar(75) DEFAULT NULL,
  `passing_yr` varchar(5) DEFAULT NULL,
  `score` varchar(5) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_emp_edu`
--

INSERT INTO `md_emp_edu` (`org_id`, `sl_no`, `emp_code`, `board`, `passing_yr`, `score`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(0, 1, '10', 'MSE', '1995', '75%', 'Synergic Softek', '2019-05-17 05:23:01', NULL, NULL),
(0, 1, '100', 'WBSE', '2009', '50', NULL, NULL, 'Synergic Softek', '2019-05-17 05:17:51'),
(0, 1, '116', 'WBSE', '2011', '90', 'Synergic Softek', '2019-05-17 04:11:49', NULL, NULL),
(0, 1, '32', '', '', '', 'Synergic Softek', '2019-05-17 04:22:48', NULL, NULL),
(0, 1, '36', '', '', '', 'Synergic Softek', '2019-05-17 04:23:35', NULL, NULL),
(0, 2, '10', 'MHSE', '1997', '61%', 'Synergic Softek', '2019-05-17 05:23:01', NULL, NULL),
(0, 2, '100', 'WBCHSE', '2011', '60', NULL, NULL, 'Synergic Softek', '2019-05-17 05:17:51'),
(0, 2, '116', 'WBCHSE', '2013', '85', 'Synergic Softek', '2019-05-17 04:11:49', NULL, NULL),
(0, 3, '100', 'MAKAUT', '2016', '9.5', NULL, NULL, 'Synergic Softek', '2019-05-17 05:17:51'),
(0, 3, '116', 'MAKAUT', '2017', '9.2', 'Synergic Softek', '2019-05-17 04:11:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `md_emp_exp`
--

CREATE TABLE `md_emp_exp` (
  `org_id` bigint(20) NOT NULL,
  `sl_no` int(11) NOT NULL,
  `emp_code` varchar(25) NOT NULL,
  `job_title` varchar(50) DEFAULT NULL,
  `from_dt` date DEFAULT NULL,
  `to_dt` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_emp_exp`
--

INSERT INTO `md_emp_exp` (`org_id`, `sl_no`, `emp_code`, `job_title`, `from_dt`, `to_dt`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(0, 1, '10', 'Politics', '2004-02-12', '0000-00-00', 'Synergic Softek', '2019-05-17 05:23:01', NULL, NULL),
(0, 1, '100', 'Software Developer', '2019-05-01', '2019-05-02', NULL, NULL, 'Synergic Softek', '2019-05-17 05:17:51'),
(0, 1, '116', 'Trainee', '2018-01-01', '2018-03-31', 'Synergic Softek', '2019-05-17 04:11:49', NULL, NULL),
(0, 1, '32', '', '0000-00-00', '0000-00-00', 'Synergic Softek', '2019-05-17 04:22:48', NULL, NULL),
(0, 1, '36', '', '0000-00-00', '0000-00-00', 'Synergic Softek', '2019-05-17 04:23:35', NULL, NULL),
(0, 2, '100', 'Software Engineer', '2019-05-03', '0000-00-00', NULL, NULL, 'Synergic Softek', '2019-05-17 05:17:51'),
(0, 2, '116', 'Coder', '2018-04-01', '2018-08-28', 'Synergic Softek', '2019-05-17 04:11:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `md_emp_skills`
--

CREATE TABLE `md_emp_skills` (
  `org_id` bigint(20) NOT NULL,
  `sl_no` int(11) NOT NULL,
  `emp_code` varchar(25) NOT NULL,
  `skill_name` varchar(20) DEFAULT NULL,
  `tot_exp` varchar(10) DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_emp_skills`
--

INSERT INTO `md_emp_skills` (`org_id`, `sl_no`, `emp_code`, `skill_name`, `tot_exp`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(0, 1, '10', 'Vul Boka', '18 Years', 'Synergic Softek', '2019-05-17 05:23:01', NULL, NULL),
(0, 1, '100', 'PHP', '6 month', NULL, NULL, 'Synergic Softek', '2019-05-17 05:17:51'),
(0, 1, '116', 'PHP', '3 Months', 'Synergic Softek', '2019-05-17 04:11:49', NULL, NULL),
(0, 1, '32', '', '', 'Synergic Softek', '2019-05-17 04:22:48', NULL, NULL),
(0, 1, '36', '', '', 'Synergic Softek', '2019-05-17 04:23:35', NULL, NULL),
(0, 2, '10', 'Vul Bojhano', '15 Years', 'Synergic Softek', '2019-05-17 05:23:01', NULL, NULL),
(0, 2, '100', 'Database', '6 months', NULL, NULL, 'Synergic Softek', '2019-05-17 05:17:51'),
(0, 2, '116', 'React', '1 Months', 'Synergic Softek', '2019-05-17 04:11:49', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `md_emp_training`
--

CREATE TABLE `md_emp_training` (
  `org_id` bigint(20) NOT NULL,
  `sl_no` int(11) NOT NULL,
  `emp_code` varchar(50) NOT NULL,
  `training_type` varchar(50) DEFAULT NULL,
  `training_place` varchar(50) DEFAULT NULL,
  `from_dt` date DEFAULT NULL,
  `to_dt` date DEFAULT NULL,
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_emp_training`
--

INSERT INTO `md_emp_training` (`org_id`, `sl_no`, `emp_code`, `training_type`, `training_place`, `from_dt`, `to_dt`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(0, 1, '100', 'Angular', 'Kolkata', '2019-05-01', '0000-00-00', NULL, NULL, 'Synergic Softek', '2019-05-17 05:17:51'),
(0, 1, '116', '', '', '0000-00-00', '0000-00-00', 'Synergic Softek', '2019-05-17 04:11:49', NULL, NULL),
(0, 1, '32', '', '', '0000-00-00', '0000-00-00', 'Synergic Softek', '2019-05-17 04:22:48', NULL, NULL),
(0, 1, '450', 'dfgdfg', '', '0000-00-00', '0000-00-00', 'Synergic Softek', '2019-05-17 04:29:38', NULL, NULL),
(0, 2, '100', 'Node', 'Pune', '2019-05-03', '2019-05-11', NULL, NULL, 'Synergic Softek', '2019-05-17 05:17:51');

-- --------------------------------------------------------

--
-- Table structure for table `md_heads`
--

CREATE TABLE `md_heads` (
  `org_id` bigint(20) NOT NULL,
  `sl_no` int(11) NOT NULL,
  `head_desc` varchar(100) NOT NULL,
  `flag` char(1) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_dt` date NOT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_heads`
--

INSERT INTO `md_heads` (`org_id`, `sl_no`, `head_desc`, `flag`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(0, 1, 'Basic', 'E', 'Synergic Softek', '2019-05-27', 'Synergic Softek', '2019-05-27'),
(0, 2, 'DA', 'E', 'Synergic Softek', '2019-05-27', 'Synergic Softek', '2019-05-27'),
(0, 3, 'HRA', 'E', 'Synergic Softek', '2019-05-27', NULL, NULL),
(0, 4, 'Conveyance', 'E', 'Synergic Softek', '2019-05-27', NULL, NULL),
(0, 5, 'Incentives', 'E', 'Synergic Softek', '2019-05-27', NULL, NULL),
(0, 6, 'Others', 'E', 'Synergic Softek', '2019-05-27', NULL, NULL),
(0, 7, 'EPF', 'D', 'Synergic Softek', '2019-05-27', NULL, NULL),
(0, 8, 'ESI', 'D', 'Synergic Softek', '2019-05-27', NULL, NULL),
(0, 9, 'PTAX', 'D', 'Synergic Softek', '2019-05-27', NULL, NULL),
(0, 10, 'LWF', 'D', 'Synergic Softek', '2019-05-27', NULL, NULL),
(0, 11, 'Food/Accommodation', 'D', 'Synergic Softek', '2019-05-27', NULL, NULL),
(0, 12, 'Loans & Advance', 'D', 'Synergic Softek', '2019-05-27', NULL, NULL),
(0, 13, 'Laundry', 'D', 'Synergic Softek', '2019-05-27', NULL, NULL),
(0, 14, 'Misc. Deductions', 'D', 'Synergic Softek', '2019-05-27', 'Synergic Softek', '2019-05-27');

-- --------------------------------------------------------

--
-- Table structure for table `md_leave_type`
--

CREATE TABLE `md_leave_type` (
  `org_id` bigint(20) NOT NULL,
  `type_cd` int(11) NOT NULL,
  `type_desc` varchar(50) NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_dt` datetime NOT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_leave_type`
--

INSERT INTO `md_leave_type` (`org_id`, `type_cd`, `type_desc`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(0, 1, 'EL', 'SSS', '2019-06-04 00:00:00', NULL, NULL),
(0, 2, 'CL', 'SSS', '2019-06-04 00:00:00', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `md_month`
--

CREATE TABLE `md_month` (
  `id` int(11) NOT NULL,
  `month_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_month`
--

INSERT INTO `md_month` (`id`, `month_name`) VALUES
(1, 'January'),
(2, 'February'),
(3, 'March'),
(4, 'April'),
(5, 'May'),
(6, 'June'),
(7, 'July'),
(8, 'August'),
(9, 'September'),
(10, 'October'),
(11, 'November'),
(12, 'December');

-- --------------------------------------------------------

--
-- Table structure for table `md_organisation`
--

CREATE TABLE `md_organisation` (
  `org_id` bigint(20) NOT NULL,
  `org_name` varchar(100) NOT NULL,
  `org_addr` text NOT NULL,
  `org_phno` varchar(15) NOT NULL,
  `org_email` varchar(25) NOT NULL,
  `org_website` varchar(50) NOT NULL,
  `cnct_person` varchar(25) NOT NULL,
  `designation` varchar(25) NOT NULL,
  `org_state` int(11) NOT NULL,
  `start_dt` date NOT NULL,
  `no_of_user` int(11) NOT NULL,
  `one_time_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `monthly_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `org_status` tinyint(1) NOT NULL DEFAULT '0',
  `created_by` varchar(50) NOT NULL,
  `created_dt` datetime NOT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `md_purpose`
--

CREATE TABLE `md_purpose` (
  `org_id` bigint(20) NOT NULL,
  `id` int(11) NOT NULL,
  `purpose_desc` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_purpose`
--

INSERT INTO `md_purpose` (`org_id`, `id`, `purpose_desc`) VALUES
(0, 211401, 'Other Assets'),
(0, 221202, 'Preliminary Expences (Assets)'),
(0, 221501, 'Plant & Machinery'),
(0, 221601, 'Furntiure & Fittings'),
(0, 221801, 'Patents, Trademarks & Designs'),
(0, 222401, 'Electrical Equipments'),
(0, 222402, 'Air Conditioned'),
(0, 222901, 'Computer Accessories'),
(0, 222902, 'Laptop Computer'),
(0, 222903, 'Office Equipment'),
(0, 222904, 'Computer & Accessories for Rent'),
(0, 222905, 'Software ( TeamViewer )'),
(0, 411101, 'Tours & Travels - Execution'),
(0, 411102, 'Tours & Travels - Marketing'),
(0, 411201, 'Telephone Charges'),
(0, 411301, 'Postage & Telegraphs'),
(0, 411401, 'Office Maintenance'),
(0, 411501, 'Business Development'),
(0, 411502, 'Preliminary Expenses (w/o)'),
(0, 411503, 'Misc.Expenditure'),
(0, 411504, 'General Expences'),
(0, 411505, 'SUNDRY BALANCE W/O'),
(0, 411601, 'Refreshment'),
(0, 411602, 'Customer Entertainment'),
(0, 411701, 'Electricity Charges'),
(0, 411801, 'Printing & Stationary'),
(0, 411901, 'Salary'),
(0, 411903, 'Compensation'),
(0, 412101, 'Bank Charges'),
(0, 412201, 'Interest paid on Loan'),
(0, 412202, 'Interest paid on VAT'),
(0, 412203, 'Interest paid on Service Tax'),
(0, 412204, 'Interest Paid On CST'),
(0, 412205, 'Interest Paid on TDS'),
(0, 412206, 'Interest Paid on Entry Tax'),
(0, 412207, 'Interest Paid On Prof. Tax'),
(0, 412301, 'Audit Fees'),
(0, 412302, 'Statutary Expence(VAT/CST F.Y 08-09)'),
(0, 412303, 'Statutary Expence(VAT/CST F.Y 09-10 & 10-11)'),
(0, 412501, 'Rent & Taxes'),
(0, 412502, 'VAT & Service Tax Consultation Fees'),
(0, 412601, 'Data Entry A/C'),
(0, 412701, 'Tender Charges'),
(0, 412801, 'Commission Paid'),
(0, 412802, 'Commission Paid On ePariseva'),
(0, 413001, 'Purchase'),
(0, 413101, 'Donation'),
(0, 413201, 'Festival Bonus'),
(0, 413501, 'Lunch Subsidy'),
(0, 413601, 'Local Conveyance'),
(0, 413602, 'Fuel Charges'),
(0, 413603, 'Advertisment'),
(0, 413604, 'Filling Charges'),
(0, 413801, 'Sub Contract'),
(0, 413901, 'Drawings'),
(0, 414001, 'Insurance Premium'),
(0, 414201, 'Arrear Salary'),
(0, 415101, 'Current Profit Adjustment Code'),
(0, 415401, 'Accounts Consultancy Charges'),
(0, 415501, 'Depriciation'),
(0, 415601, 'Staff Welfare A/C'),
(0, 415701, 'Income Tax'),
(0, 416101, 'Delivery Charges'),
(0, 416201, 'Car Maintenance'),
(0, 416301, 'Proff Tax.'),
(0, 416302, 'Incentive'),
(0, 416303, 'Consultency fees '),
(0, 416401, 'FBD Tax'),
(0, 416402, 'Work Contract Tax'),
(0, 416403, 'Purchase Tax'),
(0, 416404, 'Trade License'),
(0, 416405, 'Bad Debt'),
(0, 416406, 'Website Hosting Charges'),
(0, 416501, 'Assessed Tax'),
(0, 416502, 'Entry Tax'),
(0, 416503, 'Web Hosting & Other Related Charges');

-- --------------------------------------------------------

--
-- Table structure for table `md_states`
--

CREATE TABLE `md_states` (
  `id` int(10) UNSIGNED NOT NULL,
  `state` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_states`
--

INSERT INTO `md_states` (`id`, `state`) VALUES
(1, 'ANDAMAN AND NICOBAR ISLANDS'),
(2, 'ANDHRA PRADESH'),
(3, 'ARUNACHAL PRADESH'),
(4, 'ASSAM'),
(5, 'BIHAR'),
(6, 'CHATTISGARH'),
(7, 'CHANDIGARH'),
(8, 'DAMAN AND DIU'),
(9, 'DELHI'),
(10, 'DADRA AND NAGAR HAVELI'),
(11, 'GOA'),
(12, 'GUJARAT'),
(13, 'HIMACHAL PRADESH'),
(14, 'HARYANA'),
(15, 'JAMMU AND KASHMIR'),
(16, 'JHARKHAND'),
(17, 'KERALA'),
(18, 'KARNATAKA'),
(19, 'LAKSHADWEEP'),
(20, 'MEGHALAYA'),
(21, 'MAHARASHTRA'),
(22, 'MANIPUR'),
(23, 'MADHYA PRADESH'),
(24, 'MIZORAM'),
(25, 'NAGALAND'),
(26, 'ORISSA'),
(27, 'PUNJAB'),
(28, 'PONDICHERRY'),
(29, 'RAJASTHAN'),
(30, 'SIKKIM'),
(31, 'TAMIL NADU'),
(32, 'TRIPURA'),
(33, 'UTTARAKHAND'),
(34, 'UTTAR PRADESH'),
(35, 'WEST BENGAL'),
(36, 'TELANGANA');

-- --------------------------------------------------------

--
-- Table structure for table `md_users`
--

CREATE TABLE `md_users` (
  `org_id` int(11) NOT NULL,
  `emp_code` varchar(25) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `user_id` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `org_status` tinyint(1) NOT NULL DEFAULT '0',
  `user_status` char(1) NOT NULL DEFAULT 'A',
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `md_users`
--

INSERT INTO `md_users` (`org_id`, `emp_code`, `user_name`, `user_id`, `password`, `org_status`, `user_status`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(0, '10', 'Raj Nath', '10', '$2y$10$I5RflPqwjOrxRneEL0V/ROxvDIgXy9eUkjSiTAnPbBj3LnFSRuwJy', 0, 'A', 'Synergic Softek', '2019-05-17 05:23:01', NULL, NULL),
(0, '100', 'Unknown', '100', '$2y$10$I5RflPqwjOrxRneEL0V/ROxvDIgXy9eUkjSiTAnPbBj3LnFSRuwJy', 0, 'A', 'Synergic Softek', '2019-05-17 04:35:13', NULL, NULL),
(0, '105', 'Pritam Maity', '105', '$2y$10$I5RflPqwjOrxRneEL0V/ROxvDIgXy9eUkjSiTAnPbBj3LnFSRuwJy', 0, 'A', 'Synergic Softek', '2019-05-17 04:24:17', NULL, NULL),
(0, '116', 'Subhankar Bhowmik', '116', '$2y$10$I5RflPqwjOrxRneEL0V/ROxvDIgXy9eUkjSiTAnPbBj3LnFSRuwJy', 0, 'A', 'Synergic Softek', '2019-05-17 04:11:49', NULL, NULL),
(0, '32', 'Tanmoy Mondal', '32', '$2y$10$I5RflPqwjOrxRneEL0V/ROxvDIgXy9eUkjSiTAnPbBj3LnFSRuwJy', 0, 'A', 'Synergic Softek', '2019-05-17 04:22:48', NULL, NULL),
(0, '36', 'Sanjay Sardar', '36', '$2y$10$I5RflPqwjOrxRneEL0V/ROxvDIgXy9eUkjSiTAnPbBj3LnFSRuwJy', 0, 'A', 'Synergic Softek', '2019-05-17 04:23:35', NULL, NULL),
(0, 'sss', 'Synergic Softek', 'sss', '$2y$10$I5RflPqwjOrxRneEL0V/ROxvDIgXy9eUkjSiTAnPbBj3LnFSRuwJy', 0, 'A', 'Synergic Softek', '2019-05-17 11:14:16', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `td_audit_trail`
--

CREATE TABLE `td_audit_trail` (
  `sl_no` int(5) UNSIGNED NOT NULL,
  `login_dt` datetime DEFAULT NULL,
  `user_id` varchar(30) DEFAULT NULL,
  `terminal_name` varchar(50) DEFAULT NULL,
  `logout` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_audit_trail`
--

INSERT INTO `td_audit_trail` (`sl_no`, `login_dt`, `user_id`, `terminal_name`, `logout`) VALUES
(1, '2019-05-07 12:05:25', 'sss', '::1', NULL),
(2, '2019-05-07 12:05:09', 'sss', '::1', NULL),
(3, '2019-05-07 02:05:57', 'sss', '::1', '2019-05-07 03:05:22'),
(4, '2019-05-07 03:05:29', 'sss', '::1', '2019-05-07 03:05:07'),
(5, '2019-05-07 03:05:18', 'sss', '::1', '2019-05-07 03:05:40'),
(6, '2019-05-07 03:05:46', 'sss', '::1', NULL),
(7, '2019-05-08 10:05:48', 'sss', '::1', NULL),
(8, '2019-05-08 04:05:11', 'sss', '::1', '2019-05-08 05:05:48'),
(9, '2019-05-08 05:05:14', 'sss', '::1', '2019-05-08 06:05:55'),
(10, '2019-05-08 06:05:53', 'sss', '::1', '2019-05-08 06:05:59'),
(11, '2019-05-09 10:05:10', 'sss', '::1', NULL),
(12, '2019-05-09 03:05:15', 'sss', '::1', '2019-05-09 03:05:20'),
(13, '2019-05-10 10:05:25', 'sss', '::1', '2019-05-10 11:05:24'),
(14, '2019-05-10 11:05:45', 'sss', '::1', '2019-05-10 11:05:55'),
(15, '2019-05-10 11:05:04', 't@gmail.com', '::1', '2019-05-10 11:05:00'),
(16, '2019-05-10 11:05:05', 'sss', '::1', '2019-05-10 11:05:07'),
(17, '2019-05-10 11:05:48', 'sss', '::1', NULL),
(18, '2019-05-10 03:05:17', 'sss', '::1', '2019-05-10 04:05:38'),
(19, '2019-05-10 05:05:22', 'sss', '::1', NULL),
(20, '2019-05-14 03:05:45', 'sss', '::1', '2019-05-14 03:05:56'),
(21, '2019-05-14 04:05:35', 'sss', '::1', '2019-05-14 04:05:50'),
(22, '2019-05-14 04:05:14', 'sss', '::1', NULL),
(23, '2019-05-15 10:05:47', 'sss', '::1', '2019-05-15 10:05:38'),
(24, '2019-05-15 10:05:42', 'sss', '::1', '2019-05-15 10:05:45'),
(25, '2019-05-15 10:05:50', 'sss', '::1', '2019-05-15 11:05:19'),
(26, '2019-05-15 11:05:02', 'sss', '::1', '2019-05-15 01:05:48'),
(27, '2019-05-15 01:05:52', 'sss', '::1', NULL),
(28, '2019-05-16 10:05:15', 'sss', '::1', NULL),
(29, '2019-05-16 01:05:03', 'sss', '::1', '2019-05-16 02:05:45'),
(30, '2019-05-16 02:05:53', '1', '::1', NULL),
(31, '2019-05-17 10:05:26', 'sss', '::1', '2019-05-17 05:05:18'),
(32, '2019-05-17 05:05:49', '10', '::1', '2019-05-17 05:05:26'),
(33, '2019-05-17 05:05:34', '10', '::1', NULL),
(34, '2019-05-20 10:05:27', 'sss', '::1', NULL),
(35, '2019-05-21 11:05:14', 'sss', '::1', NULL),
(36, '2019-05-22 10:05:59', 'sss', '::1', NULL),
(37, '2019-05-23 11:05:43', 'sss', '::1', NULL),
(38, '2019-05-24 10:05:44', 'sss', '::1', NULL),
(39, '2019-05-27 11:05:23', 'sss', '::1', NULL),
(40, '2019-05-28 09:05:57', 'sss', '::1', '2019-05-28 04:05:47'),
(41, '2019-05-28 04:05:52', '105', '::1', NULL),
(42, '2019-05-29 10:05:08', 'sss', '::1', '2019-05-29 11:05:21'),
(43, '2019-05-29 11:05:30', 'sss', '::1', '2019-06-03 12:06:43'),
(44, '2019-05-29 11:05:40', '105', '::1', NULL),
(45, '2019-05-30 02:05:57', 'sss', '::1', '2019-05-30 05:05:25'),
(46, '2019-05-30 05:05:29', 'sss', '::1', NULL),
(47, '2019-05-31 01:05:21', 'sss', '::1', '2019-05-31 04:05:05'),
(48, '2019-05-31 04:05:09', '105', '::1', '2019-05-31 05:05:20'),
(49, '2019-05-31 05:05:24', 'sss', '::1', '2019-05-31 05:05:24'),
(50, '2019-05-31 05:05:32', '105', '::1', '2019-05-31 05:05:59'),
(51, '2019-05-31 05:05:05', 'sss', '::1', '2019-05-31 05:05:16'),
(52, '2019-05-31 05:05:22', '105', '::1', NULL),
(53, '2019-05-31 06:05:26', 'sss', '::1', NULL),
(54, '2019-05-31 06:05:26', 'sss', '::1', NULL),
(55, '2019-05-31 06:05:56', 'sss', '::1', NULL),
(56, '2019-05-31 06:05:23', 'sss', '::1', '2019-05-31 06:05:39'),
(57, '2019-06-03 10:06:46', 'sss', '::1', NULL),
(58, '2019-06-03 11:06:01', 'sss', '182.19.28.133', '2019-06-03 11:06:40'),
(59, '2019-06-03 11:06:46', 'sss', '182.19.28.133', NULL),
(60, '2019-06-03 12:06:50', 'sss', '103.75.160.210', '2019-06-03 01:06:32'),
(61, '2019-06-04 10:06:54', 'sss', '::1', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `td_balance_amt`
--

CREATE TABLE `td_balance_amt` (
  `org_id` bigint(20) NOT NULL,
  `balance_dt` date NOT NULL,
  `emp_code` varchar(50) NOT NULL,
  `claim_amt` decimal(10,2) DEFAULT '0.00',
  `rcvd_amt` decimal(10,2) DEFAULT '0.00',
  `balance_amt` decimal(10,2) DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_balance_amt`
--

INSERT INTO `td_balance_amt` (`org_id`, `balance_dt`, `emp_code`, `claim_amt`, `rcvd_amt`, `balance_amt`) VALUES
(0, '2019-05-15', 'sss', '250.00', '0.00', '250.00'),
(0, '2019-05-20', 'sss', '1500.00', '200.00', '1750.00'),
(0, '2019-05-22', 'sss', '250.00', '200.00', '1800.00'),
(0, '2019-05-22', '105', '0.00', '100.00', '-100.00'),
(0, '2019-05-24', 'sss', '0.00', '100.00', '1700.00');

-- --------------------------------------------------------

--
-- Table structure for table `td_claim`
--

CREATE TABLE `td_claim` (
  `org_id` bigint(20) NOT NULL,
  `claim_cd` bigint(20) NOT NULL,
  `emp_code` varchar(25) NOT NULL,
  `claim_dt` date NOT NULL,
  `purpose` varchar(50) NOT NULL,
  `from_dt` date NOT NULL,
  `to_dt` date NOT NULL,
  `narration` text NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00',
  `approval_status` tinyint(4) NOT NULL DEFAULT '0',
  `approval_remarks` text,
  `approved_by` varchar(50) NOT NULL,
  `approval_dt` datetime NOT NULL,
  `rejection_status` tinyint(1) NOT NULL DEFAULT '0',
  `rejection_remarks` text,
  `rejected_by` varchar(50) DEFAULT NULL,
  `rejected_dt` datetime DEFAULT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_dt` varchar(50) NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  `modified_dt` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_claim`
--

INSERT INTO `td_claim` (`org_id`, `claim_cd`, `emp_code`, `claim_dt`, `purpose`, `from_dt`, `to_dt`, `narration`, `amount`, `approval_status`, `approval_remarks`, `approved_by`, `approval_dt`, `rejection_status`, `rejection_remarks`, `rejected_by`, `rejected_dt`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(0, 20193, 'sss', '2019-05-22', '211401', '2019-05-02', '2019-05-05', 'Narration', '1500.00', 1, 'OK', 'Synergic Softek', '2019-05-22 11:44:02', 0, 'Not Okay', 'Synergic Softek', '2019-05-22 11:39:12', 'Synergic Softek', '2019-05-22 10:35:38', 'Synergic Softek', '2019-05-22 11:43:31'),
(0, 20192, 'sss', '2019-05-22', '211401', '2019-05-01', '2019-05-02', 'Narration', '250.00', 1, 'OK', 'Synergic Softek', '2019-05-22 11:29:14', 0, NULL, NULL, NULL, 'Synergic Softek', '2019-05-22 10:34:57', '', ''),
(0, 20194, 'sss', '2019-05-22', '221601', '2019-05-01', '2019-05-04', 'OK', '250.00', 1, 'ok', 'Synergic Softek', '2019-05-22 05:32:11', 0, NULL, NULL, NULL, 'Synergic Softek', '2019-05-22 05:25:00', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `td_claim_trans`
--

CREATE TABLE `td_claim_trans` (
  `org_id` bigint(20) NOT NULL,
  `claim_cd` bigint(20) NOT NULL,
  `emp_code` varchar(50) NOT NULL,
  `claim_hd` varchar(25) NOT NULL,
  `remarks` text NOT NULL,
  `amount` decimal(10,2) NOT NULL DEFAULT '0.00'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_claim_trans`
--

INSERT INTO `td_claim_trans` (`org_id`, `claim_cd`, `emp_code`, `claim_hd`, `remarks`, `amount`) VALUES
(0, 20192, 'sss', '1', 'Remarks', '100.00'),
(0, 20192, 'sss', '2', '', '150.00'),
(0, 20191, 'sss', '3', '', '1000.00'),
(0, 20193, 'sss', '3', '', '1000.00'),
(0, 20193, 'sss', '9', '', '500.00'),
(0, 20194, 'sss', '2', '', '150.00'),
(0, 20194, 'sss', '9', '', '100.00');

-- --------------------------------------------------------

--
-- Table structure for table `td_leaves_trans`
--

CREATE TABLE `td_leaves_trans` (
  `org_id` bigint(20) NOT NULL,
  `trans_cd` bigint(20) NOT NULL,
  `trans_dt` date NOT NULL,
  `emp_code` varchar(50) NOT NULL,
  `department` tinyint(4) NOT NULL,
  `leave_type` char(1) NOT NULL,
  `reason` varchar(50) NOT NULL,
  `from_dt` date NOT NULL,
  `to_dt` date NOT NULL,
  `remarks` text NOT NULL,
  `amount` int(11) NOT NULL,
  `recommendation_status` tinyint(1) NOT NULL DEFAULT '0',
  `recommend_by` varchar(50) DEFAULT NULL,
  `recommend_dt` datetime DEFAULT NULL,
  `recommend_remarks` text,
  `approval_status` tinyint(4) NOT NULL DEFAULT '0',
  `approved_by` varchar(50) NOT NULL,
  `approval_dt` datetime NOT NULL,
  `approve_remarks` text,
  `rejection_status` int(11) NOT NULL DEFAULT '0',
  `rejection_remarks` text NOT NULL,
  `rejected_by` varchar(50) NOT NULL,
  `rejected_dt` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_dt` datetime NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  `modified_dt` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_leaves_trans`
--

INSERT INTO `td_leaves_trans` (`org_id`, `trans_cd`, `trans_dt`, `emp_code`, `department`, `leave_type`, `reason`, `from_dt`, `to_dt`, `remarks`, `amount`, `recommendation_status`, `recommend_by`, `recommend_dt`, `recommend_remarks`, `approval_status`, `approved_by`, `approval_dt`, `approve_remarks`, `rejection_status`, `rejection_remarks`, `rejected_by`, `rejected_dt`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(0, 20191, '2019-06-04', 'sss', 1, '1', 'Family and Medical Leave', '2019-06-04', '2019-06-04', 'Emni', 1, 0, NULL, NULL, NULL, 0, '', '0000-00-00 00:00:00', NULL, 0, '', '', '0000-00-00 00:00:00', 'Synergic Softek', '2019-06-04 12:38:12', '', '0000-00-00 00:00:00'),
(0, 20192, '2019-06-04', 'sss', 1, '2', 'Adverse weather', '2019-06-04', '2019-06-07', 'Need It', 4, 0, NULL, NULL, NULL, 0, '', '0000-00-00 00:00:00', NULL, 0, '', '', '0000-00-00 00:00:00', 'Synergic Softek', '2019-06-04 01:09:31', 'Synergic Softek', '2019-06-04 01:32:19');

-- --------------------------------------------------------

--
-- Table structure for table `td_leave_dates`
--

CREATE TABLE `td_leave_dates` (
  `org_id` bigint(20) NOT NULL,
  `trans_cd` bigint(20) NOT NULL,
  `emp_code` varchar(50) NOT NULL,
  `leave_dt` date NOT NULL,
  `status` char(1) NOT NULL DEFAULT 'U'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_leave_dates`
--

INSERT INTO `td_leave_dates` (`org_id`, `trans_cd`, `emp_code`, `leave_dt`, `status`) VALUES
(0, 20191, 'sss', '2019-06-04', 'U'),
(0, 20192, 'sss', '2019-06-05', 'U'),
(0, 20192, 'sss', '2019-06-06', 'U'),
(0, 20192, 'sss', '2019-06-04', 'U'),
(0, 20192, 'sss', '2019-06-07', 'U');

-- --------------------------------------------------------

--
-- Table structure for table `td_notices`
--

CREATE TABLE `td_notices` (
  `org_id` bigint(20) NOT NULL,
  `notice_cd` int(11) NOT NULL,
  `notice_dt` date NOT NULL,
  `subject` varchar(100) NOT NULL,
  `notice` text NOT NULL,
  `created_by` varchar(50) NOT NULL,
  `created_dt` datetime NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  `modified_dt` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_notices`
--

INSERT INTO `td_notices` (`org_id`, `notice_cd`, `notice_dt`, `subject`, `notice`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(0, 1, '2019-05-30', 'sdfd', '<p>sfdfFDfDFSddfs</p>\r\n', 'Synergic Softek', '2019-05-30 06:10:33', 'Synergic Softek', '2019-05-31 06:31:00'),
(0, 2, '2019-05-30', 'Subject 1', '<p>Notice DFSAFOjp sdfpoifj0siejfisjdfpojsdpofkjspodfsdfsefsef</p>\r\n\r\n<p>sdfsdfsdf</p>\r\n', 'Synergic Softek', '2019-05-30 06:12:17', 'Synergic Softek', '2019-05-31 06:31:13'),
(0, 3, '2019-05-31', 'Subject 12', '<h1>Hello</h1>\r\n', 'Synergic Softek', '2019-05-31 03:15:39', '', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `td_payment`
--

CREATE TABLE `td_payment` (
  `org_id` bigint(20) NOT NULL,
  `payment_cd` bigint(20) NOT NULL,
  `payment_dt` date NOT NULL,
  `emp_code` varchar(50) NOT NULL,
  `payment_mode` varchar(15) NOT NULL,
  `payment_type` varchar(50) NOT NULL,
  `chq_dt` date DEFAULT NULL,
  `chq_no` varchar(11) DEFAULT NULL,
  `bank` varchar(15) DEFAULT NULL,
  `paid_amt` decimal(10,2) NOT NULL DEFAULT '0.00',
  `created_by` varchar(50) NOT NULL,
  `created_dt` datetime NOT NULL,
  `modified_by` varchar(50) NOT NULL,
  `modified_dt` date NOT NULL,
  `approval_status` tinyint(4) NOT NULL DEFAULT '0',
  `approved_by` varchar(50) NOT NULL,
  `approval_dt` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_payment`
--

INSERT INTO `td_payment` (`org_id`, `payment_cd`, `payment_dt`, `emp_code`, `payment_mode`, `payment_type`, `chq_dt`, `chq_no`, `bank`, `paid_amt`, `created_by`, `created_dt`, `modified_by`, `modified_dt`, `approval_status`, `approved_by`, `approval_dt`) VALUES
(0, 20192, '2019-05-22', '105', 'CASH', 'NORMAL', '2019-05-02', '32135453132', '1', '100.00', 'Synergic Softek', '2019-05-22 04:20:03', '', '0000-00-00', 1, 'Synergic Softek', '2019-05-22'),
(0, 20193, '2019-05-22', 'sss', 'CASH', 'ADVANCE', '0000-00-00', '', '2', '200.00', 'Synergic Softek', '2019-05-22 04:20:48', 'Synergic Softek', '2019-05-22', 1, 'Synergic Softek', '2019-05-22'),
(0, 20194, '2019-05-24', 'sss', 'CASH', 'ADVANCE', '0000-00-00', '', '1', '100.00', 'Synergic Softek', '2019-05-24 02:03:11', '', '0000-00-00', 1, 'Synergic Softek', '2019-05-24');

-- --------------------------------------------------------

--
-- Table structure for table `td_pay_slip`
--

CREATE TABLE `td_pay_slip` (
  `org_id` bigint(20) NOT NULL,
  `trans_dt` date NOT NULL,
  `month` varchar(10) NOT NULL,
  `year` int(11) NOT NULL,
  `emp_code` varchar(25) NOT NULL,
  `emp_name` varchar(100) NOT NULL,
  `phn_no` varchar(11) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `designation` varchar(50) DEFAULT NULL,
  `department` varchar(50) DEFAULT NULL,
  `joining_date` date DEFAULT NULL,
  `bank_name` varchar(50) DEFAULT NULL,
  `bank_ac_no` varchar(50) DEFAULT NULL,
  `location` varchar(100) DEFAULT NULL,
  `pf_ac_no` varchar(50) DEFAULT NULL,
  `esi_no` char(15) DEFAULT NULL,
  `pan_no` varchar(50) DEFAULT NULL,
  `created_dt` datetime NOT NULL,
  `created_by` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_pay_slip`
--

INSERT INTO `td_pay_slip` (`org_id`, `trans_dt`, `month`, `year`, `emp_code`, `emp_name`, `phn_no`, `email`, `designation`, `department`, `joining_date`, `bank_name`, `bank_ac_no`, `location`, `pf_ac_no`, `esi_no`, `pan_no`, `created_dt`, `created_by`) VALUES
(0, '2019-05-28', 'February', 2019, '10', 'Raj Nath', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-28 03:47:00', 'Synergic Softek'),
(0, '2019-05-28', 'January', 2019, '10', 'Raj Nath', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-28 03:47:05', 'Synergic Softek'),
(0, '2019-05-29', 'March', 2019, '10', 'Raj Nath', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-29 12:02:18', 'Pritam Maity'),
(0, '2019-05-28', 'February', 2019, '100', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-28 03:47:00', 'Synergic Softek'),
(0, '2019-05-28', 'January', 2019, '100', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-28 03:47:05', 'Synergic Softek'),
(0, '2019-05-29', 'March', 2019, '100', 'Unknown', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-29 12:02:18', 'Pritam Maity'),
(0, '2019-05-28', 'February', 2019, '105', 'Pritam Maity', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-28 03:47:00', 'Synergic Softek'),
(0, '2019-05-28', 'January', 2019, '105', 'Pritam Maity', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-28 03:47:05', 'Synergic Softek'),
(0, '2019-05-29', 'March', 2019, '105', 'Pritam Maity', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-29 12:02:18', 'Pritam Maity'),
(0, '2019-05-28', 'February', 2019, '116', 'Subhankar Bhowmik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-28 03:47:00', 'Synergic Softek'),
(0, '2019-05-28', 'January', 2019, '116', 'Subhankar Bhowmik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-28 03:47:05', 'Synergic Softek'),
(0, '2019-05-29', 'March', 2019, '116', 'Subhankar Bhowmik', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-29 12:02:18', 'Pritam Maity'),
(0, '2019-05-28', 'February', 2019, '32', 'Tanmoy Mondal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-28 03:47:00', 'Synergic Softek'),
(0, '2019-05-28', 'January', 2019, '32', 'Tanmoy Mondal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-28 03:47:05', 'Synergic Softek'),
(0, '2019-05-29', 'March', 2019, '32', 'Tanmoy Mondal', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-29 12:02:18', 'Pritam Maity'),
(0, '2019-05-28', 'February', 2019, '36', 'Sanjay Sardar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-28 03:47:00', 'Synergic Softek'),
(0, '2019-05-28', 'January', 2019, '36', 'Sanjay Sardar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-28 03:47:05', 'Synergic Softek'),
(0, '2019-05-29', 'March', 2019, '36', 'Sanjay Sardar', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-29 12:02:18', 'Pritam Maity'),
(0, '2019-05-28', 'February', 2019, '450', 'Tarun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-28 03:47:00', 'Synergic Softek'),
(0, '2019-05-28', 'January', 2019, '450', 'Tarun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-28 03:47:05', 'Synergic Softek'),
(0, '2019-05-29', 'March', 2019, '450', 'Tarun', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-29 12:02:18', 'Pritam Maity'),
(0, '2019-05-28', 'February', 2019, 'sss', 'Synergic Softek', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-28 03:47:00', 'Synergic Softek'),
(0, '2019-05-28', 'January', 2019, 'sss', 'Synergic Softek', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-28 03:47:05', 'Synergic Softek'),
(0, '2019-05-29', 'March', 2019, 'sss', 'Synergic Softek', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-05-29 12:02:18', 'Pritam Maity');

-- --------------------------------------------------------

--
-- Table structure for table `td_pay_statement`
--

CREATE TABLE `td_pay_statement` (
  `org_id` bigint(20) NOT NULL,
  `emp_code` varchar(25) NOT NULL,
  `head_cd` int(50) NOT NULL,
  `amount` decimal(10,2) DEFAULT '0.00',
  `created_by` varchar(50) DEFAULT NULL,
  `created_dt` datetime DEFAULT NULL,
  `modified_by` varchar(50) DEFAULT NULL,
  `modified_dt` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_pay_statement`
--

INSERT INTO `td_pay_statement` (`org_id`, `emp_code`, `head_cd`, `amount`, `created_by`, `created_dt`, `modified_by`, `modified_dt`) VALUES
(0, '10', 1, '5000.00', 'Synergic Softek', '2019-05-28 12:22:56', NULL, NULL),
(0, '10', 2, '4000.00', 'Synergic Softek', '2019-05-28 12:22:56', NULL, NULL),
(0, '10', 3, '1000.00', 'Synergic Softek', '2019-05-28 12:22:56', NULL, NULL),
(0, '10', 7, '1000.00', 'Synergic Softek', '2019-05-28 12:22:56', NULL, NULL),
(0, '10', 14, '1000.00', 'Synergic Softek', '2019-05-28 12:22:56', NULL, NULL),
(0, '105', 1, '5000.00', 'Pritam Maity', '2019-05-29 12:02:06', NULL, NULL),
(0, '105', 2, '1500.00', 'Pritam Maity', '2019-05-29 12:02:06', NULL, NULL),
(0, '105', 10, '500.00', 'Pritam Maity', '2019-05-29 12:02:06', NULL, NULL),
(0, '105', 11, '500.00', 'Pritam Maity', '2019-05-29 12:02:06', NULL, NULL),
(0, '105', 14, '500.00', 'Pritam Maity', '2019-05-29 12:02:06', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `td_pay_trans`
--

CREATE TABLE `td_pay_trans` (
  `trans_dt` date NOT NULL,
  `org_id` bigint(20) NOT NULL,
  `month` varchar(15) NOT NULL,
  `year` int(11) NOT NULL,
  `emp_code` varchar(25) NOT NULL,
  `head_cd` int(50) NOT NULL,
  `amount` decimal(10,2) DEFAULT '0.00'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `td_pay_trans`
--

INSERT INTO `td_pay_trans` (`trans_dt`, `org_id`, `month`, `year`, `emp_code`, `head_cd`, `amount`) VALUES
('2019-05-28', 0, 'February', 2020, '10', 1, '5000.00'),
('2019-05-28', 0, 'January', 2019, '10', 1, '5000.00'),
('2019-05-29', 0, 'March', 2019, '10', 1, '5000.00'),
('2019-05-28', 0, 'February', 2019, '10', 2, '4000.00'),
('2019-05-28', 0, 'January', 2019, '10', 2, '4000.00'),
('2019-05-29', 0, 'March', 2019, '10', 2, '4000.00'),
('2019-05-28', 0, 'February', 2019, '10', 3, '1000.00'),
('2019-05-28', 0, 'January', 2019, '10', 3, '1000.00'),
('2019-05-29', 0, 'March', 2019, '10', 3, '1000.00'),
('2019-05-28', 0, 'February', 2019, '10', 7, '1000.00'),
('2019-05-28', 0, 'January', 2019, '10', 7, '1000.00'),
('2019-05-29', 0, 'March', 2019, '10', 7, '1000.00'),
('2019-05-28', 0, 'February', 2019, '10', 14, '1000.00'),
('2019-05-28', 0, 'January', 2019, '10', 14, '1000.00'),
('2019-05-29', 0, 'March', 2019, '10', 14, '1000.00'),
('2019-05-28', 0, 'February', 2020, '105', 1, '5000.00'),
('2019-05-28', 0, 'January', 2019, '105', 1, '5000.00'),
('2019-05-29', 0, 'March', 2019, '105', 1, '5000.00'),
('2019-05-28', 0, 'February', 2019, '105', 2, '1500.00'),
('2019-05-28', 0, 'January', 2019, '105', 2, '1500.00'),
('2019-05-29', 0, 'March', 2019, '105', 2, '1500.00'),
('2019-05-29', 0, 'March', 2019, '105', 10, '500.00'),
('2019-05-28', 0, 'February', 2019, '105', 11, '500.00'),
('2019-05-28', 0, 'January', 2019, '105', 11, '500.00'),
('2019-05-29', 0, 'March', 2019, '105', 11, '500.00'),
('2019-05-28', 0, 'February', 2019, '105', 14, '500.00'),
('2019-05-28', 0, 'January', 2019, '105', 14, '500.00'),
('2019-05-29', 0, 'March', 2019, '105', 14, '500.00');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `md_bank`
--
ALTER TABLE `md_bank`
  ADD PRIMARY KEY (`org_id`,`bank_id`);

--
-- Indexes for table `md_claim_head`
--
ALTER TABLE `md_claim_head`
  ADD PRIMARY KEY (`org_id`,`head_cd`);

--
-- Indexes for table `md_countries`
--
ALTER TABLE `md_countries`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `md_departments`
--
ALTER TABLE `md_departments`
  ADD PRIMARY KEY (`sl_no`,`org_id`) USING BTREE;

--
-- Indexes for table `md_employee`
--
ALTER TABLE `md_employee`
  ADD PRIMARY KEY (`org_id`,`emp_code`);

--
-- Indexes for table `md_emp_edu`
--
ALTER TABLE `md_emp_edu`
  ADD PRIMARY KEY (`org_id`,`sl_no`,`emp_code`);

--
-- Indexes for table `md_emp_exp`
--
ALTER TABLE `md_emp_exp`
  ADD PRIMARY KEY (`org_id`,`sl_no`,`emp_code`);

--
-- Indexes for table `md_emp_skills`
--
ALTER TABLE `md_emp_skills`
  ADD PRIMARY KEY (`org_id`,`sl_no`,`emp_code`);

--
-- Indexes for table `md_emp_training`
--
ALTER TABLE `md_emp_training`
  ADD PRIMARY KEY (`org_id`,`sl_no`,`emp_code`);

--
-- Indexes for table `md_heads`
--
ALTER TABLE `md_heads`
  ADD PRIMARY KEY (`org_id`,`sl_no`);

--
-- Indexes for table `md_month`
--
ALTER TABLE `md_month`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `md_organisation`
--
ALTER TABLE `md_organisation`
  ADD PRIMARY KEY (`org_id`);

--
-- Indexes for table `md_purpose`
--
ALTER TABLE `md_purpose`
  ADD PRIMARY KEY (`org_id`,`id`);

--
-- Indexes for table `md_states`
--
ALTER TABLE `md_states`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `md_users`
--
ALTER TABLE `md_users`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `td_audit_trail`
--
ALTER TABLE `td_audit_trail`
  ADD PRIMARY KEY (`sl_no`);

--
-- Indexes for table `td_balance_amt`
--
ALTER TABLE `td_balance_amt`
  ADD PRIMARY KEY (`org_id`,`balance_dt`,`emp_code`);

--
-- Indexes for table `td_claim`
--
ALTER TABLE `td_claim`
  ADD PRIMARY KEY (`claim_cd`,`org_id`) USING BTREE;

--
-- Indexes for table `td_claim_trans`
--
ALTER TABLE `td_claim_trans`
  ADD PRIMARY KEY (`org_id`,`claim_cd`,`claim_hd`) USING BTREE;

--
-- Indexes for table `td_leaves_trans`
--
ALTER TABLE `td_leaves_trans`
  ADD PRIMARY KEY (`org_id`,`trans_cd`);

--
-- Indexes for table `td_leave_dates`
--
ALTER TABLE `td_leave_dates`
  ADD PRIMARY KEY (`org_id`,`trans_cd`,`leave_dt`);

--
-- Indexes for table `td_notices`
--
ALTER TABLE `td_notices`
  ADD PRIMARY KEY (`org_id`,`notice_cd`);

--
-- Indexes for table `td_payment`
--
ALTER TABLE `td_payment`
  ADD PRIMARY KEY (`org_id`,`payment_cd`);

--
-- Indexes for table `td_pay_slip`
--
ALTER TABLE `td_pay_slip`
  ADD PRIMARY KEY (`emp_code`,`month`,`year`,`org_id`) USING BTREE;

--
-- Indexes for table `td_pay_statement`
--
ALTER TABLE `td_pay_statement`
  ADD PRIMARY KEY (`emp_code`,`org_id`,`head_cd`) USING BTREE;

--
-- Indexes for table `td_pay_trans`
--
ALTER TABLE `td_pay_trans`
  ADD PRIMARY KEY (`emp_code`,`org_id`,`head_cd`,`trans_dt`,`month`,`year`) USING BTREE;

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `md_countries`
--
ALTER TABLE `md_countries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=247;
--
-- AUTO_INCREMENT for table `md_departments`
--
ALTER TABLE `md_departments`
  MODIFY `sl_no` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `md_month`
--
ALTER TABLE `md_month`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `md_states`
--
ALTER TABLE `md_states`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;
--
-- AUTO_INCREMENT for table `td_audit_trail`
--
ALTER TABLE `td_audit_trail`
  MODIFY `sl_no` int(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
