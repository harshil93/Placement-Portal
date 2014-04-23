-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Apr 23, 2014 at 10:08 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `placement`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_details`
--

CREATE TABLE IF NOT EXISTS `admin_details` (
  `admin_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  PRIMARY KEY (`admin_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `apply`
--

CREATE TABLE IF NOT EXISTS `apply` (
  `st_id` int(11) NOT NULL,
  `j_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL,
  `tstamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`st_id`,`j_id`,`c_id`),
  KEY `apply_fk1` (`j_id`),
  KEY `apply_fk2` (`c_id`),
  KEY `apply_fk4` (`cv_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `apply`
--

INSERT INTO `apply` (`st_id`, `j_id`, `c_id`, `cv_id`, `tstamp`) VALUES
(4, 2, 1, 0, '2014-04-18 06:12:36'),
(4, 4, 1, 0, '2014-04-21 07:13:06'),
(5, 3, 1, 0, '2014-04-18 06:12:36'),
(6, 2, 1, 0, '2014-04-18 06:12:36'),
(6, 3, 1, 3, '2014-04-21 03:46:16'),
(9, 4, 1, 1, '2014-04-21 03:44:37'),
(10, 5, 12, 4, '2014-04-21 09:00:45');

-- --------------------------------------------------------

--
-- Stand-in structure for view `btJobProfiles`
--
CREATE TABLE IF NOT EXISTS `btJobProfiles` (
`c_id` int(11)
,`j_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `btOffers`
--
CREATE TABLE IF NOT EXISTS `btOffers` (
`c_id` int(11)
,`j_id` int(11)
,`st_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `ceJobProfiles`
--
CREATE TABLE IF NOT EXISTS `ceJobProfiles` (
`c_id` int(11)
,`j_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `ceOffers`
--
CREATE TABLE IF NOT EXISTS `ceOffers` (
`c_id` int(11)
,`j_id` int(11)
,`st_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `clJobProfiles`
--
CREATE TABLE IF NOT EXISTS `clJobProfiles` (
`c_id` int(11)
,`j_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `clOffers`
--
CREATE TABLE IF NOT EXISTS `clOffers` (
`c_id` int(11)
,`j_id` int(11)
,`st_id` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE IF NOT EXISTS `comments` (
  `comment_id` int(11) NOT NULL AUTO_INCREMENT,
  `txt` varchar(1000) NOT NULL,
  `st_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `j_id` int(11) NOT NULL,
  `pr_id` int(11) NOT NULL,
  `tstamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`comment_id`),
  KEY `comment_map_fk1` (`j_id`),
  KEY `comment_map_fk2` (`c_id`),
  KEY `comment_map_fk3` (`st_id`),
  KEY `comment_map_fk4` (`pr_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `txt`, `st_id`, `c_id`, `j_id`, `pr_id`, `tstamp`) VALUES
(1, 'nalla', 4, 1, 2, 2, '2014-04-18 06:17:58'),
(2, 'aur bhi bada nalla', 4, 1, 3, 3, '2014-04-18 06:17:58'),
(3, 'the bond', 5, 1, 3, 2, '2014-04-18 06:17:58'),
(4, 'the longer bond', 6, 1, 2, 3, '2014-04-18 06:17:58'),
(5, 'gadha saala', 4, 1, 2, 2, '2014-04-18 20:03:38'),
(6, 'dfghgfhgfh', 6, 1, 2, 2, '2014-04-18 20:36:12'),
(7, 'awesome CV man', 6, 1, 2, 2, '2014-04-20 15:19:22'),
(8, 'add pic', 5, 1, 3, 2, '2014-04-20 15:22:29'),
(9, 'ok', 5, 1, 3, 2, '2014-04-20 15:24:38'),
(10, 'new comments', 4, 1, 2, 2, '2014-04-21 09:03:20');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE IF NOT EXISTS `company` (
  `c_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `details` varchar(1000) DEFAULT NULL,
  `phone_no` bigint(10) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  PRIMARY KEY (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`c_id`, `name`, `details`, `phone_no`, `email_id`) VALUES
(1, 'microsoft', 'the bond company', 12111, 'ms@bond.com'),
(12, 'Adobe', 'ece guys only', 2020202020, 'adobe@adobe.com'),
(13, 'Reliance', 'cst company', 4545454545, 'ril@ril.com'),
(14, 'directi', 'codechef', 454545454, 'di@support.com');

-- --------------------------------------------------------

--
-- Stand-in structure for view `cseJobProfiles`
--
CREATE TABLE IF NOT EXISTS `cseJobProfiles` (
`c_id` int(11)
,`j_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `cseOffers`
--
CREATE TABLE IF NOT EXISTS `cseOffers` (
`c_id` int(11)
,`j_id` int(11)
,`st_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `cstJobProfiles`
--
CREATE TABLE IF NOT EXISTS `cstJobProfiles` (
`c_id` int(11)
,`j_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `cstOffers`
--
CREATE TABLE IF NOT EXISTS `cstOffers` (
`c_id` int(11)
,`j_id` int(11)
,`st_id` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `cv_table`
--

CREATE TABLE IF NOT EXISTS `cv_table` (
  `st_id` int(11) NOT NULL,
  `cv_id` int(11) NOT NULL AUTO_INCREMENT,
  `cv` blob,
  `cv_name` varchar(50) NOT NULL,
  PRIMARY KEY (`cv_id`),
  KEY `cv_table_fk` (`st_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `cv_table`
--

INSERT INTO `cv_table` (`st_id`, `cv_id`, `cv`, `cv_name`) VALUES
(4, 0, NULL, ''),
(9, 1, 0x75706c6f6164732f39313339383035313739372e747874, 'proxy.txt'),
(9, 2, 0x75706c6f6164732f39313339383035313836322e747874, 'proxy.txt'),
(6, 3, 0x75706c6f6164732f36313339383035313936342e6363, 'mysol-2.cc'),
(10, 4, 0x75706c6f6164732f3130313339383037303737372e747874, 'proxy.txt'),
(10, 5, 0x75706c6f6164732f3130313339383037303739332e6363, '2.cc');

-- --------------------------------------------------------

--
-- Stand-in structure for view `dodJobProfiles`
--
CREATE TABLE IF NOT EXISTS `dodJobProfiles` (
`c_id` int(11)
,`j_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `dodOffers`
--
CREATE TABLE IF NOT EXISTS `dodOffers` (
`c_id` int(11)
,`j_id` int(11)
,`st_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `eceJobProfiles`
--
CREATE TABLE IF NOT EXISTS `eceJobProfiles` (
`c_id` int(11)
,`j_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `eceOffers`
--
CREATE TABLE IF NOT EXISTS `eceOffers` (
`c_id` int(11)
,`j_id` int(11)
,`st_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `eeeJobProfiles`
--
CREATE TABLE IF NOT EXISTS `eeeJobProfiles` (
`c_id` int(11)
,`j_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `eeeOffers`
--
CREATE TABLE IF NOT EXISTS `eeeOffers` (
`c_id` int(11)
,`j_id` int(11)
,`st_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `epJobProfiles`
--
CREATE TABLE IF NOT EXISTS `epJobProfiles` (
`c_id` int(11)
,`j_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `epOffers`
--
CREATE TABLE IF NOT EXISTS `epOffers` (
`c_id` int(11)
,`j_id` int(11)
,`st_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `hssJobProfiles`
--
CREATE TABLE IF NOT EXISTS `hssJobProfiles` (
`c_id` int(11)
,`j_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `hssOffers`
--
CREATE TABLE IF NOT EXISTS `hssOffers` (
`c_id` int(11)
,`j_id` int(11)
,`st_id` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `job_profile`
--

CREATE TABLE IF NOT EXISTS `job_profile` (
  `j_id` int(11) NOT NULL AUTO_INCREMENT,
  `ctc` int(11) NOT NULL,
  `cpi_cutoff` decimal(3,2) DEFAULT '0.00',
  `description` varchar(500) DEFAULT NULL,
  `approved` enum('Y','N','P') DEFAULT 'P',
  `tstamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `c_id` int(11) NOT NULL,
  `deadline` datetime NOT NULL,
  PRIMARY KEY (`j_id`,`c_id`),
  KEY `job_profile_fk` (`c_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `job_profile`
--

INSERT INTO `job_profile` (`j_id`, `ctc`, `cpi_cutoff`, `description`, `approved`, `tstamp`, `c_id`, `deadline`) VALUES
(2, 12, '0.00', 'Windows', 'Y', '2014-04-18 06:03:31', 1, '2014-04-30 00:00:00'),
(3, 45, '0.00', 'windows phone', 'Y', '2014-04-21 08:51:33', 1, '2014-04-15 00:00:00'),
(4, 15, '0.00', 'Design', 'Y', '2014-04-21 07:14:21', 1, '2014-04-20 00:00:00'),
(5, 20, '8.00', 'ece related work', 'Y', '2014-04-21 08:56:44', 12, '2014-04-25 00:00:00'),
(6, 25, '0.00', 'usa based', 'Y', '2014-04-21 08:23:36', 13, '2014-04-23 00:00:00'),
(7, 20, '0.00', '', 'Y', '2014-04-21 08:54:02', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `job_profile_branches`
--

CREATE TABLE IF NOT EXISTS `job_profile_branches` (
  `j_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `dept` enum('CSE','MNC','EEE','ECE','CL','CE','EP','BT','DOD','ME','CST','HSS','ALL') NOT NULL DEFAULT 'ALL',
  PRIMARY KEY (`j_id`,`c_id`,`dept`),
  KEY `job_profile_branches_fk2` (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `job_profile_branches`
--

INSERT INTO `job_profile_branches` (`j_id`, `c_id`, `dept`) VALUES
(2, 1, 'CSE'),
(3, 1, 'CSE'),
(4, 1, 'CSE'),
(4, 1, 'DOD'),
(7, 1, 'MNC'),
(7, 1, 'EEE'),
(7, 1, 'ECE'),
(5, 12, 'CSE'),
(5, 12, 'ECE'),
(5, 12, 'CST'),
(6, 13, 'CSE'),
(6, 13, 'CST');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email_id` varchar(50) NOT NULL,
  `level` int(11) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`email_id`),
  UNIQUE KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=15 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `email_id`, `level`, `password`) VALUES
(12, 'adobe', 2, '3d801aa532c1cec3ee82d87a99fdf63f'),
(4, 'c.shobhit', 1, '3d801aa532c1cec3ee82d87a99fdf63f'),
(11, 'cststud', 1, '3d801aa532c1cec3ee82d87a99fdf63f'),
(14, 'directi', 2, '3d801aa532c1cec3ee82d87a99fdf63f'),
(10, 'ecestud', 1, '3d801aa532c1cec3ee82d87a99fdf63f'),
(5, 'harshil', 1, '3d801aa532c1cec3ee82d87a99fdf63f'),
(6, 'j.aditya', 1, '3d801aa532c1cec3ee82d87a99fdf63f'),
(1, 'ms', 2, '3d801aa532c1cec3ee82d87a99fdf63f'),
(2, 'prcse', 3, '3d801aa532c1cec3ee82d87a99fdf63f'),
(3, 'prece', 3, '3d801aa532c1cec3ee82d87a99fdf63f'),
(13, 'ril', 2, '3d801aa532c1cec3ee82d87a99fdf63f'),
(9, 'sad', 1, '3d801aa532c1cec3ee82d87a99fdf63f');

-- --------------------------------------------------------

--
-- Stand-in structure for view `meJobProfiles`
--
CREATE TABLE IF NOT EXISTS `meJobProfiles` (
`c_id` int(11)
,`j_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `meOffers`
--
CREATE TABLE IF NOT EXISTS `meOffers` (
`c_id` int(11)
,`j_id` int(11)
,`st_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `mncJobProfiles`
--
CREATE TABLE IF NOT EXISTS `mncJobProfiles` (
`c_id` int(11)
,`j_id` int(11)
);
-- --------------------------------------------------------

--
-- Stand-in structure for view `mncOffers`
--
CREATE TABLE IF NOT EXISTS `mncOffers` (
`c_id` int(11)
,`j_id` int(11)
,`st_id` int(11)
);
-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE IF NOT EXISTS `offers` (
  `st_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `j_id` int(11) NOT NULL,
  `joining_date` datetime DEFAULT NULL,
  `ppo` enum('Y','N') NOT NULL,
  `location` varchar(50) DEFAULT NULL,
  `accepted` enum('Y','N') NOT NULL DEFAULT 'N',
  `offer_deadline` datetime NOT NULL,
  `tstamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`st_id`,`j_id`,`c_id`),
  KEY `offers_fk1` (`j_id`),
  KEY `offers_fk2` (`c_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`st_id`, `c_id`, `j_id`, `joining_date`, `ppo`, `location`, `accepted`, `offer_deadline`, `tstamp`) VALUES
(4, 1, 3, NULL, 'N', NULL, 'Y', '2014-04-08 00:00:00', '2014-04-21 08:55:51'),
(4, 1, 4, NULL, 'N', NULL, 'N', '0000-00-00 00:00:00', '2014-04-21 08:36:01'),
(5, 1, 2, '2014-04-30 00:00:00', 'N', 'USA', 'N', '2014-04-29 00:00:00', '2014-04-20 15:43:39'),
(5, 1, 3, '2014-05-07 00:00:00', 'N', 'BNGLR', 'N', '2014-04-30 00:00:00', '2014-04-20 15:51:03'),
(6, 1, 3, NULL, 'Y', NULL, 'N', '0000-00-00 00:00:00', '2014-04-21 08:53:20');

-- --------------------------------------------------------

--
-- Table structure for table `placement_rep`
--

CREATE TABLE IF NOT EXISTS `placement_rep` (
  `name` varchar(50) NOT NULL,
  `phone_no` bigint(10) NOT NULL,
  `pr_id` int(11) NOT NULL,
  `dept` enum('CSE','MNC','EEE','ECE','CL','CE','EP','BT','DOD','ME','CST','HSS') NOT NULL,
  `programme` enum('BTECH','MTECH','PhD','MSc','BSc','BA','MA') NOT NULL,
  PRIMARY KEY (`pr_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `placement_rep`
--

INSERT INTO `placement_rep` (`name`, `phone_no`, `pr_id`, `dept`, `programme`) VALUES
('harsha tirumala', 4545, 2, 'CSE', 'BTECH'),
('akshay gulati', 2020202000, 3, 'ECE', 'BTECH');

-- --------------------------------------------------------

--
-- Table structure for table `ppt_slots`
--

CREATE TABLE IF NOT EXISTS `ppt_slots` (
  `slot_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  PRIMARY KEY (`c_id`,`slot_id`),
  KEY `ppt_slots_fk2` (`slot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `recruiter_details`
--

CREATE TABLE IF NOT EXISTS `recruiter_details` (
  `name` varchar(50) NOT NULL,
  `c_id` int(11) NOT NULL,
  `e_id` int(11) NOT NULL,
  `phone_no` bigint(10) DEFAULT NULL,
  PRIMARY KEY (`c_id`,`e_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slots`
--

CREATE TABLE IF NOT EXISTS `slots` (
  `slot_id` int(11) NOT NULL,
  `room_no` varchar(20) NOT NULL,
  `start_time` datetime NOT NULL,
  `end_time` datetime NOT NULL,
  PRIMARY KEY (`slot_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slot_alloted`
--

CREATE TABLE IF NOT EXISTS `slot_alloted` (
  `slot_id` int(11) NOT NULL,
  `c_id` int(11) NOT NULL,
  `j_id` int(11) NOT NULL,
  PRIMARY KEY (`c_id`,`j_id`,`slot_id`),
  KEY `slot_alloted_fk2` (`slot_id`),
  KEY `slot_alloted_fk3` (`j_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `spi_table`
--

CREATE TABLE IF NOT EXISTS `spi_table` (
  `st_id` int(11) NOT NULL,
  `sem` tinyint(4) NOT NULL,
  `spi` decimal(3,2) NOT NULL,
  PRIMARY KEY (`st_id`,`sem`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `student`
--

CREATE TABLE IF NOT EXISTS `student` (
  `roll_no` int(11) NOT NULL,
  `st_id` int(11) NOT NULL DEFAULT '0',
  `name` varchar(50) NOT NULL,
  `gender` enum('M','F') NOT NULL DEFAULT 'F',
  `cpi` decimal(3,2) NOT NULL,
  `dept` enum('CSE','MNC','EEE','ECE','CL','CE','EP','BT','DOD','ME','CST','HSS') NOT NULL,
  `programme` enum('BTECH','MTECH','PhD','MSc','BSc','BA','MA') NOT NULL,
  `category` enum('GEN','SC','ST','OBC','PD') NOT NULL,
  `phone_no` bigint(10) DEFAULT NULL,
  `current_address` varchar(200) NOT NULL,
  `home_address` varchar(200) NOT NULL,
  PRIMARY KEY (`st_id`),
  UNIQUE KEY `roll_no` (`roll_no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `student`
--

INSERT INTO `student` (`roll_no`, `st_id`, `name`, `gender`, `cpi`, `dept`, `programme`, `category`, `phone_no`, `current_address`, `home_address`) VALUES
(11010179, 4, 'Shobhit', 'M', '9.00', 'CSE', 'BTECH', 'GEN', 2121212121, 'guwahati', 'delhi'),
(11010121, 5, 'Harshil', '', '9.50', 'ECE', 'BTECH', 'GEN', 4545454545, 'guwahati', 'nagpur'),
(11010102, 6, 'Jha2', 'M', '9.99', 'CSE', 'BTECH', 'GEN', 1010101010, 'guwahati', 'patna'),
(11010999, 9, 'Mr. Sad', 'M', '9.99', 'DOD', 'BSc', 'GEN', 2121212121, 'ghy', 'ghy'),
(11010155, 10, 'Akshay', 'F', '9.00', 'ECE', 'MTECH', 'GEN', 8080808080, 'ghy', 'delhi'),
(110101010, 11, 'Mayank', 'M', '9.00', 'CST', 'MTECH', 'GEN', 9999999999, 'ghy', 'punjab');

-- --------------------------------------------------------

--
-- Structure for view `btJobProfiles`
--
DROP TABLE IF EXISTS `btJobProfiles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `btJobProfiles` AS select `j`.`c_id` AS `c_id`,`j`.`j_id` AS `j_id` from (`job_profile` `j` join `job_profile_branches` `jb`) where ((`j`.`j_id` = `jb`.`j_id`) and (`j`.`c_id` = `jb`.`c_id`) and (`jb`.`dept` = 'BT'));

-- --------------------------------------------------------

--
-- Structure for view `btOffers`
--
DROP TABLE IF EXISTS `btOffers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `btOffers` AS select `o`.`c_id` AS `c_id`,`o`.`j_id` AS `j_id`,`o`.`st_id` AS `st_id` from (`offers` `o` join `student` `s`) where ((`o`.`st_id` = `s`.`st_id`) and (`s`.`dept` = 'BT'));

-- --------------------------------------------------------

--
-- Structure for view `ceJobProfiles`
--
DROP TABLE IF EXISTS `ceJobProfiles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ceJobProfiles` AS select `j`.`c_id` AS `c_id`,`j`.`j_id` AS `j_id` from (`job_profile` `j` join `job_profile_branches` `jb`) where ((`j`.`j_id` = `jb`.`j_id`) and (`j`.`c_id` = `jb`.`c_id`) and (`jb`.`dept` = 'CE'));

-- --------------------------------------------------------

--
-- Structure for view `ceOffers`
--
DROP TABLE IF EXISTS `ceOffers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `ceOffers` AS select `o`.`c_id` AS `c_id`,`o`.`j_id` AS `j_id`,`o`.`st_id` AS `st_id` from (`offers` `o` join `student` `s`) where ((`o`.`st_id` = `s`.`st_id`) and (`s`.`dept` = 'CE'));

-- --------------------------------------------------------

--
-- Structure for view `clJobProfiles`
--
DROP TABLE IF EXISTS `clJobProfiles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `clJobProfiles` AS select `j`.`c_id` AS `c_id`,`j`.`j_id` AS `j_id` from (`job_profile` `j` join `job_profile_branches` `jb`) where ((`j`.`j_id` = `jb`.`j_id`) and (`j`.`c_id` = `jb`.`c_id`) and (`jb`.`dept` = 'CL'));

-- --------------------------------------------------------

--
-- Structure for view `clOffers`
--
DROP TABLE IF EXISTS `clOffers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `clOffers` AS select `o`.`c_id` AS `c_id`,`o`.`j_id` AS `j_id`,`o`.`st_id` AS `st_id` from (`offers` `o` join `student` `s`) where ((`o`.`st_id` = `s`.`st_id`) and (`s`.`dept` = 'CL'));

-- --------------------------------------------------------

--
-- Structure for view `cseJobProfiles`
--
DROP TABLE IF EXISTS `cseJobProfiles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cseJobProfiles` AS select `j`.`c_id` AS `c_id`,`j`.`j_id` AS `j_id` from (`job_profile` `j` join `job_profile_branches` `jb`) where ((`j`.`j_id` = `jb`.`j_id`) and (`j`.`c_id` = `jb`.`c_id`) and (`jb`.`dept` = 'CSE'));

-- --------------------------------------------------------

--
-- Structure for view `cseOffers`
--
DROP TABLE IF EXISTS `cseOffers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cseOffers` AS select `o`.`c_id` AS `c_id`,`o`.`j_id` AS `j_id`,`o`.`st_id` AS `st_id` from (`offers` `o` join `student` `s`) where ((`o`.`st_id` = `s`.`st_id`) and (`s`.`dept` = 'CSE'));

-- --------------------------------------------------------

--
-- Structure for view `cstJobProfiles`
--
DROP TABLE IF EXISTS `cstJobProfiles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cstJobProfiles` AS select `j`.`c_id` AS `c_id`,`j`.`j_id` AS `j_id` from (`job_profile` `j` join `job_profile_branches` `jb`) where ((`j`.`j_id` = `jb`.`j_id`) and (`j`.`c_id` = `jb`.`c_id`) and (`jb`.`dept` = 'CST'));

-- --------------------------------------------------------

--
-- Structure for view `cstOffers`
--
DROP TABLE IF EXISTS `cstOffers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `cstOffers` AS select `o`.`c_id` AS `c_id`,`o`.`j_id` AS `j_id`,`o`.`st_id` AS `st_id` from (`offers` `o` join `student` `s`) where ((`o`.`st_id` = `s`.`st_id`) and (`s`.`dept` = 'CST'));

-- --------------------------------------------------------

--
-- Structure for view `dodJobProfiles`
--
DROP TABLE IF EXISTS `dodJobProfiles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dodJobProfiles` AS select `j`.`c_id` AS `c_id`,`j`.`j_id` AS `j_id` from (`job_profile` `j` join `job_profile_branches` `jb`) where ((`j`.`j_id` = `jb`.`j_id`) and (`j`.`c_id` = `jb`.`c_id`) and (`jb`.`dept` = 'DOD'));

-- --------------------------------------------------------

--
-- Structure for view `dodOffers`
--
DROP TABLE IF EXISTS `dodOffers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `dodOffers` AS select `o`.`c_id` AS `c_id`,`o`.`j_id` AS `j_id`,`o`.`st_id` AS `st_id` from (`offers` `o` join `student` `s`) where ((`o`.`st_id` = `s`.`st_id`) and (`s`.`dept` = 'DOD'));

-- --------------------------------------------------------

--
-- Structure for view `eceJobProfiles`
--
DROP TABLE IF EXISTS `eceJobProfiles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `eceJobProfiles` AS select `j`.`c_id` AS `c_id`,`j`.`j_id` AS `j_id` from (`job_profile` `j` join `job_profile_branches` `jb`) where ((`j`.`j_id` = `jb`.`j_id`) and (`j`.`c_id` = `jb`.`c_id`) and (`jb`.`dept` = 'ECE'));

-- --------------------------------------------------------

--
-- Structure for view `eceOffers`
--
DROP TABLE IF EXISTS `eceOffers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `eceOffers` AS select `o`.`c_id` AS `c_id`,`o`.`j_id` AS `j_id`,`o`.`st_id` AS `st_id` from (`offers` `o` join `student` `s`) where ((`o`.`st_id` = `s`.`st_id`) and (`s`.`dept` = 'ECE'));

-- --------------------------------------------------------

--
-- Structure for view `eeeJobProfiles`
--
DROP TABLE IF EXISTS `eeeJobProfiles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `eeeJobProfiles` AS select `j`.`c_id` AS `c_id`,`j`.`j_id` AS `j_id` from (`job_profile` `j` join `job_profile_branches` `jb`) where ((`j`.`j_id` = `jb`.`j_id`) and (`j`.`c_id` = `jb`.`c_id`) and (`jb`.`dept` = 'EEE'));

-- --------------------------------------------------------

--
-- Structure for view `eeeOffers`
--
DROP TABLE IF EXISTS `eeeOffers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `eeeOffers` AS select `o`.`c_id` AS `c_id`,`o`.`j_id` AS `j_id`,`o`.`st_id` AS `st_id` from (`offers` `o` join `student` `s`) where ((`o`.`st_id` = `s`.`st_id`) and (`s`.`dept` = 'EEE'));

-- --------------------------------------------------------

--
-- Structure for view `epJobProfiles`
--
DROP TABLE IF EXISTS `epJobProfiles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `epJobProfiles` AS select `j`.`c_id` AS `c_id`,`j`.`j_id` AS `j_id` from (`job_profile` `j` join `job_profile_branches` `jb`) where ((`j`.`j_id` = `jb`.`j_id`) and (`j`.`c_id` = `jb`.`c_id`) and (`jb`.`dept` = 'EP'));

-- --------------------------------------------------------

--
-- Structure for view `epOffers`
--
DROP TABLE IF EXISTS `epOffers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `epOffers` AS select `o`.`c_id` AS `c_id`,`o`.`j_id` AS `j_id`,`o`.`st_id` AS `st_id` from (`offers` `o` join `student` `s`) where ((`o`.`st_id` = `s`.`st_id`) and (`s`.`dept` = 'EP'));

-- --------------------------------------------------------

--
-- Structure for view `hssJobProfiles`
--
DROP TABLE IF EXISTS `hssJobProfiles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hssJobProfiles` AS select `j`.`c_id` AS `c_id`,`j`.`j_id` AS `j_id` from (`job_profile` `j` join `job_profile_branches` `jb`) where ((`j`.`j_id` = `jb`.`j_id`) and (`j`.`c_id` = `jb`.`c_id`) and (`jb`.`dept` = 'HSS'));

-- --------------------------------------------------------

--
-- Structure for view `hssOffers`
--
DROP TABLE IF EXISTS `hssOffers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `hssOffers` AS select `o`.`c_id` AS `c_id`,`o`.`j_id` AS `j_id`,`o`.`st_id` AS `st_id` from (`offers` `o` join `student` `s`) where ((`o`.`st_id` = `s`.`st_id`) and (`s`.`dept` = 'HSS'));

-- --------------------------------------------------------

--
-- Structure for view `meJobProfiles`
--
DROP TABLE IF EXISTS `meJobProfiles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `meJobProfiles` AS select `j`.`c_id` AS `c_id`,`j`.`j_id` AS `j_id` from (`job_profile` `j` join `job_profile_branches` `jb`) where ((`j`.`j_id` = `jb`.`j_id`) and (`j`.`c_id` = `jb`.`c_id`) and (`jb`.`dept` = 'ME'));

-- --------------------------------------------------------

--
-- Structure for view `meOffers`
--
DROP TABLE IF EXISTS `meOffers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `meOffers` AS select `o`.`c_id` AS `c_id`,`o`.`j_id` AS `j_id`,`o`.`st_id` AS `st_id` from (`offers` `o` join `student` `s`) where ((`o`.`st_id` = `s`.`st_id`) and (`s`.`dept` = 'ME'));

-- --------------------------------------------------------

--
-- Structure for view `mncJobProfiles`
--
DROP TABLE IF EXISTS `mncJobProfiles`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mncJobProfiles` AS select `j`.`c_id` AS `c_id`,`j`.`j_id` AS `j_id` from (`job_profile` `j` join `job_profile_branches` `jb`) where ((`j`.`j_id` = `jb`.`j_id`) and (`j`.`c_id` = `jb`.`c_id`) and (`jb`.`dept` = 'MNC'));

-- --------------------------------------------------------

--
-- Structure for view `mncOffers`
--
DROP TABLE IF EXISTS `mncOffers`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `mncOffers` AS select `o`.`c_id` AS `c_id`,`o`.`j_id` AS `j_id`,`o`.`st_id` AS `st_id` from (`offers` `o` join `student` `s`) where ((`o`.`st_id` = `s`.`st_id`) and (`s`.`dept` = 'MNC'));

--
-- Constraints for dumped tables
--

--
-- Constraints for table `admin_details`
--
ALTER TABLE `admin_details`
  ADD CONSTRAINT `admin_fk1` FOREIGN KEY (`admin_id`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `apply`
--
ALTER TABLE `apply`
  ADD CONSTRAINT `apply_fk1` FOREIGN KEY (`j_id`) REFERENCES `job_profile` (`j_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apply_fk2` FOREIGN KEY (`c_id`) REFERENCES `company` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apply_fk3` FOREIGN KEY (`st_id`) REFERENCES `student` (`st_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `apply_fk4` FOREIGN KEY (`cv_id`) REFERENCES `cv_table` (`cv_id`);

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comment_map_fk1` FOREIGN KEY (`j_id`) REFERENCES `job_profile` (`j_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_map_fk2` FOREIGN KEY (`c_id`) REFERENCES `company` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_map_fk3` FOREIGN KEY (`st_id`) REFERENCES `student` (`st_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `comment_map_fk4` FOREIGN KEY (`pr_id`) REFERENCES `placement_rep` (`pr_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `company`
--
ALTER TABLE `company`
  ADD CONSTRAINT `company_fk` FOREIGN KEY (`c_id`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `cv_table`
--
ALTER TABLE `cv_table`
  ADD CONSTRAINT `cv_table_fk` FOREIGN KEY (`st_id`) REFERENCES `student` (`st_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_profile`
--
ALTER TABLE `job_profile`
  ADD CONSTRAINT `job_profile_fk` FOREIGN KEY (`c_id`) REFERENCES `company` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `job_profile_branches`
--
ALTER TABLE `job_profile_branches`
  ADD CONSTRAINT `job_profile_branches_fk1` FOREIGN KEY (`j_id`) REFERENCES `job_profile` (`j_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `job_profile_branches_fk2` FOREIGN KEY (`c_id`) REFERENCES `company` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `offers`
--
ALTER TABLE `offers`
  ADD CONSTRAINT `offers_fk1` FOREIGN KEY (`j_id`) REFERENCES `job_profile` (`j_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offers_fk2` FOREIGN KEY (`c_id`) REFERENCES `company` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `offers_fk3` FOREIGN KEY (`st_id`) REFERENCES `student` (`st_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `placement_rep`
--
ALTER TABLE `placement_rep`
  ADD CONSTRAINT `placement_rep_fk` FOREIGN KEY (`pr_id`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ppt_slots`
--
ALTER TABLE `ppt_slots`
  ADD CONSTRAINT `ppt_slots_fk1` FOREIGN KEY (`c_id`) REFERENCES `company` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `ppt_slots_fk2` FOREIGN KEY (`slot_id`) REFERENCES `slots` (`slot_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `recruiter_details`
--
ALTER TABLE `recruiter_details`
  ADD CONSTRAINT `recruiter_details_fk` FOREIGN KEY (`c_id`) REFERENCES `company` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `slot_alloted`
--
ALTER TABLE `slot_alloted`
  ADD CONSTRAINT `slot_alloted_fk1` FOREIGN KEY (`c_id`) REFERENCES `company` (`c_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `slot_alloted_fk2` FOREIGN KEY (`slot_id`) REFERENCES `slots` (`slot_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `slot_alloted_fk3` FOREIGN KEY (`j_id`) REFERENCES `job_profile` (`j_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `spi_table`
--
ALTER TABLE `spi_table`
  ADD CONSTRAINT `spi_table_fk` FOREIGN KEY (`st_id`) REFERENCES `student` (`st_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_fk` FOREIGN KEY (`st_id`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
