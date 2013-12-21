-- phpMyAdmin SQL Dump
-- version 4.0.6
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 21, 2013 at 04:47 AM
-- Server version: 5.5.33
-- PHP Version: 5.5.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";

--
-- Database: `maryasht_p4_maryashtoninglis_com`
--

-- --------------------------------------------------------

--
-- Table structure for table `meals`
--

CREATE TABLE `meals` (
  `meal_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `date` date NOT NULL,
  `meal_kind` varchar(255) NOT NULL,
  `shift_head` varchar(255) NOT NULL,
  `vibe` varchar(255) NOT NULL,
  `number_served_unique` int(11) NOT NULL,
  `menu` text NOT NULL,
  `volunteers` text NOT NULL,
  `notes` text NOT NULL,
  `meal_photo` blob NOT NULL,
  PRIMARY KEY (`meal_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `meals`
--

INSERT INTO `meals` (`meal_id`, `created`, `modified`, `user_id`, `date`, `meal_kind`, `shift_head`, `vibe`, `number_served_unique`, `menu`, `volunteers`, `notes`, `meal_photo`) VALUES
(1, 0, 0, 0, '2013-12-24', 'check box (breakfast/lunch)', 'Pick from drop down ', 'Drop down again ', 75, 'lis†ˆng lots of items', '', '', ''),
(2, 1387373954, 1387373954, 3, '0000-00-00', '', '', '', 0, '', '', '', ''),
(3, 1387505141, 1387505141, 3, '0000-00-00', '', '', '', 0, '', '', '', ''),
(4, 1387505286, 1387505286, 3, '0000-00-00', '', '', '', 0, '', '', '', ''),
(5, 1387506163, 1387506163, 3, '0000-00-00', '', '', '', 0, 'Lamb, grits', '', 'Not really', ''),
(6, 1387506225, 1387506225, 3, '0000-00-00', '', '', '', 0, 'Lamb, grits', '', 'Not really', ''),
(7, 1387506233, 1387506233, 3, '0000-00-00', '', '', '', 0, 'Lamb, grits', '', 'Not really', ''),
(8, 1387506241, 1387506241, 3, '0000-00-00', '', '', '', 0, 'Lamb, grits', '', 'Not really', ''),
(10, 0, 0, 0, '2013-12-26', 'lunch', 'melanie', 'deena', 70, 'something wonderful', '', '', ''),
(11, 1387589829, 1387589829, 3, '0000-00-00', '', '', '', 0, '', '', '', ''),
(12, 1387589833, 1387589833, 3, '0000-00-00', '', '', '', 0, '', '', '', ''),
(13, 1387590116, 1387590116, 4, '0000-00-00', '', '', '', 0, 'sdf', '', 'asdf', ''),
(14, 1387591009, 1387591009, 4, '0000-00-00', '', '', '', 0, 'sdf', '', 'asdf', ''),
(15, 1387591083, 1387591083, 4, '0000-00-00', '', '', '', 0, 'trying this again', '', '', ''),
(16, 1387591112, 1387591112, 4, '0000-00-00', '', '', '', 0, 'trying this again', '', '', ''),
(17, 1387591172, 1387591172, 4, '0000-00-00', '', '', '', 0, 'trying this again', '', '', ''),
(18, 1387591176, 1387591176, 4, '0000-00-00', '', '', '', 0, 'trying this again', '', '', ''),
(19, 1387591235, 1387591235, 4, '0000-00-00', '', '', '', 0, 'trying this again', '', '', ''),
(20, 1387591262, 1387591262, 4, '0000-00-00', '', '', '', 0, 'trying this again', '', '', ''),
(21, 1387591264, 1387591264, 4, '0000-00-00', '', '', '', 0, 'trying this again', '', '', ''),
(22, 1387591275, 1387591275, 4, '0000-00-00', '', '', '', 0, '', '', '', ''),
(23, 1387591278, 1387591278, 4, '0000-00-00', '', '', '', 0, '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `recipes`
--

CREATE TABLE `recipes` (
  `recipe_id` int(11) NOT NULL AUTO_INCREMENT,
  `rank` int(11) NOT NULL,
  PRIMARY KEY (`recipe_id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT,
  `created` int(11) NOT NULL,
  `modified` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `last_login` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  PRIMARY KEY (`user_id`)
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=5 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `created`, `modified`, `token`, `password`, `last_login`, `first_name`, `last_name`, `email`) VALUES
(1, 0, 0, 'cdd4467c240cbaa8a9da02f0bf2efb721ac6374d', 'test', 0, 'Sam', 'Seaborn', 'sam@gmail.com'),
(2, 0, 0, 'cdd4467c240cbaa8a9da02f0bf2efb721ac6374d', 'will', 0, 'Mary', 'Inglis', 'maryashton.inglis@gmail.com'),
(3, 1387235172, 0, 'e4427f0844d23a09d37a22f7f5d62c46444bf403', 'a4ea076c5d990651ee9875de312e716fbd0d18d1', 0, 'Mary ', 'Ashton', 'maryashton.inglis@gmail.com'),
(4, 1387590090, 0, 'd20be31dba32fda9878b63439355a5dcd75ea384', 'b07b4e7a996b96aa55e2d587ecff0a93b44d66c9', 0, 'maryashton', 'inglis', 'maryashton.inglis@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `volunteers`
--

CREATE TABLE `volunteers` (
  `volunteer_id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `last_name` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email_address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `current_street_address` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `current_city` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `zip_code` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `meal_id` varchar(255) CHARACTER SET utf8 NOT NULL,
  `created` datetime NOT NULL,
  `updated` datetime NOT NULL,
  PRIMARY KEY (`volunteer_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;
