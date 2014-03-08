-- phpMyAdmin SQL Dump
-- version 4.0.5
-- http://www.phpmyadmin.net
--
-- Host: 127.13.134.2:3306
-- Generation Time: Mar 07, 2014 at 11:44 PM
-- Server version: 5.1.73
-- PHP Version: 5.3.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `freefood`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE IF NOT EXISTS `comment` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(16) NOT NULL,
  `event_id` int(16) unsigned NOT NULL,
  `content` varchar(256) NOT NULL,
  `create_time` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=114 ;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `user_id`, `event_id`, `content`, `create_time`) VALUES
(1, '100001523793534', 1, 'test', '2014-02-10 08:00:00'),
(4, '100001523793534', 1, 'test2', '2014-02-17 00:20:42'),
(5, '100001523793534', 1, 'test2', '2014-02-17 00:23:02'),
(6, '100001523793534', 1, 'test3', '2014-02-17 00:24:13'),
(7, '100001523793534', 2, 'test', '2014-02-17 00:25:33'),
(8, '100001523793534', 2, 'vvvv', '2014-02-17 00:25:49'),
(9, '100001523793534', 3, 'zzz', '2014-02-17 00:29:16'),
(10, '100001523793534', 1, 'zzz', '2014-02-17 00:31:52'),
(11, '100001523793534', 1, 'aaa', '2014-02-17 00:34:21'),
(12, '100001523793534', 3, 'aaa', '2014-02-17 00:38:13'),
(13, '100001523793534', 3, 'dddd', '2014-02-17 00:38:38'),
(14, '100001523793534', 3, 'rrrr', '2014-02-17 00:41:51'),
(15, '100001523793534', 3, 'fffff', '2014-02-17 00:51:54'),
(16, '100001523793534', 1, 'sssss', '2014-02-17 00:52:29'),
(17, '100001523793534', 1, 'test', '2014-02-17 10:49:08'),
(18, '100001523793534', 1, 'hhhh', '2014-02-17 10:58:41'),
(19, '100001523793534', 1, 'ttt', '2014-02-17 10:58:59'),
(20, '100001523793534', 1, 'jjj', '2014-02-17 10:59:15'),
(21, '100001523793534', 2, 'sdfsdf', '2014-02-18 21:52:05'),
(22, '100001523793534', 1, 'wdasdas', '2014-02-18 21:52:38'),
(23, '100001523793534', 1, 'xvxcvx', '2014-02-18 21:52:41'),
(24, '100001523793534', 1, 'fsg', '2014-02-18 21:52:45'),
(25, '1179786543', 2, 'New comment', '2014-02-21 20:56:38'),
(26, '1179786543', 2, 'Second comment', '2014-02-21 20:56:45'),
(27, '1179786543', 2, 'Third comment', '2014-02-21 20:56:52'),
(28, '100001523793534', 1, 'test', '2014-02-21 20:57:31'),
(29, '100001523793534', 2, 'asdasd', '2014-02-28 14:43:23'),
(30, '100001523793534', 3, 'hellp', '2014-02-28 21:42:14'),
(31, '100001523793534', 1, 'asdasd', '2014-02-28 21:42:24'),
(32, '100001523793534', 1, 'aaaa', '2014-02-28 21:42:26'),
(33, '100001523793534', 1, 'aasd', '2014-02-28 21:42:27'),
(34, '1179786543', 1, 'Test comment.', '2014-02-28 21:58:32'),
(35, '1179786543', 1, 'Try to input a long comment to crash the website.Try to input a long comment to crash the website.Try to input a long comment to crash the website.Try to input a long comment to crash the website.Try to input a long comment to crash the website.Try to inpu', '2014-02-28 21:59:30'),
(36, '100001523793534', 1, 'Try to input a long comment to crash the website.Try to input a long comment to crash the website.Try to input a long comment to crash the website.Try to input a long comment to crash the website.Try to input a long comment to crash the website.Try to inpu', '2014-02-28 22:18:10'),
(37, '100001523793534', 1, 'Try to input a long comment to crash the website.Try to input a long comment to crash the website.Try to input a long comment to crash the website.Try to input a long comment to crash the website.Try to input a long comment to crash the website.Try to inpu', '2014-02-28 22:18:18'),
(38, '100001523793534', 8, 'aaaa', '2014-03-01 21:22:56'),
(39, '100001523793534', 6, 'good', '2014-03-01 21:23:00'),
(40, '100001523793534', 7, 'goo', '2014-03-01 21:23:06'),
(41, '100001523793534', 7, 'sdasd', '2014-03-02 20:18:51'),
(42, '100001523793534', 7, 'asdasd', '2014-03-02 20:18:53'),
(43, '100001523793534', 7, 'sadasd', '2014-03-02 20:19:46'),
(44, '100001523793534', 7, 'adasddddd', '2014-03-02 20:19:48'),
(45, '100001523793534', 7, 'asdasd', '2014-03-02 20:19:52'),
(46, '100001523793534', 7, 'test', '2014-03-02 23:53:06'),
(47, '100001523793534', 7, 'teeee', '2014-03-02 23:53:30'),
(48, '100001523793534', 7, 'asdasdasd', '2014-03-02 23:53:43'),
(49, '100001523793534', 7, 'testss', '2014-03-02 23:59:07'),
(50, '100001523793534', 7, 'aa', '2014-03-02 23:59:09'),
(51, '100001523793534', 7, 'asd', '2014-03-02 23:59:12'),
(52, '100001523793534', 6, 'tttt', '2014-03-03 00:06:41'),
(53, '100001523793534', 6, 'tewet', '2014-03-03 00:06:43'),
(54, '100001523793534', 6, 'tewet', '2014-03-03 00:06:43'),
(55, '100001523793534', 6, 'te', '2014-03-03 00:06:44'),
(56, '100001523793534', 6, 'te', '2014-03-03 00:06:44'),
(57, '100001523793534', 6, 'te', '2014-03-03 00:06:44'),
(58, '100001523793534', 6, 'te', '2014-03-03 00:06:44'),
(59, '100001523793534', 6, 'aaa', '2014-03-03 00:06:51'),
(60, '100001523793534', 6, 'aaa', '2014-03-03 00:06:51'),
(61, '100001523793534', 6, 'aaa', '2014-03-03 00:06:51'),
(62, '100001523793534', 6, 'aaa', '2014-03-03 00:06:51'),
(63, '100001523793534', 6, 'aaa', '2014-03-03 00:06:51'),
(64, '100001523793534', 6, 'aaa', '2014-03-03 00:06:51'),
(65, '100001523793534', 6, 'aaa', '2014-03-03 00:06:51'),
(66, '100001523793534', 6, 'aaa', '2014-03-03 00:06:51'),
(67, '100001523793534', 8, 'aaa', '2014-03-03 00:10:41'),
(68, '100001523793534', 10, 'pppp', '2014-03-03 00:16:10'),
(69, '100001523793534', 10, 'aaa', '2014-03-03 00:16:30'),
(70, '100001523793534', 9, 'test', '2014-03-03 00:18:23'),
(71, '100001523793534', 9, 'ssss', '2014-03-03 00:18:27'),
(72, '100001523793534', 9, 'sasas', '2014-03-03 00:18:29'),
(73, '100001523793534', 9, 'aaa', '2014-03-03 00:18:36'),
(74, '100001523793534', 11, 'aaa', '2014-03-03 00:23:59'),
(75, '100001523793534', 11, 'helll', '2014-03-03 00:24:02'),
(76, '100001523793534', 10, '....', '2014-03-03 00:24:32'),
(77, '100001523793534', 9, 'hell', '2014-03-03 00:27:57'),
(78, '100001523793534', 11, 'a', '2014-03-03 00:28:06'),
(79, '100001523793534', 9, 'aaa', '2014-03-03 00:33:26'),
(80, '100001523793534', 9, 'good', '2014-03-03 00:33:30'),
(81, '100001523793534', 9, 'aaa', '2014-03-03 00:33:38'),
(82, '100001523793534', 13, 'try a comment', '2014-03-03 01:09:09'),
(83, '100001523793534', 7, 'test', '2014-03-03 02:19:02'),
(84, '100001523793534', 9, '&lt;a href=&quot;#&quot;&gt;Test&lt;/a&gt;', '2014-03-03 15:54:33'),
(85, '100001321683740', 14, 'hi', '2014-03-03 17:12:57'),
(86, '1179786543', 8, 'Write a comment here', '2014-03-03 20:19:53'),
(87, '100001523793534', 6, 'asdasd', '2014-03-03 20:54:37'),
(88, '100001523793534', 16, 'teststtt', '2014-03-03 21:18:08'),
(89, '100001523793534', 6, 'test', '2014-03-03 23:02:31'),
(90, '100001523793534', 13, 'aaaa', '2014-03-03 23:02:48'),
(91, '1179786543', 13, 'abc', '2014-03-03 23:04:33'),
(92, '1179786543', 13, 'wrong', '2014-03-03 23:08:18'),
(93, '100001523793534', 15, 'aaa', '2014-03-03 23:12:57'),
(94, '100001523793534', 15, 'aaa', '2014-03-03 23:12:57'),
(95, '100001523793534', 15, 'aaa', '2014-03-03 23:12:57'),
(96, '100001523793534', 15, 'aaa', '2014-03-03 23:12:57'),
(97, '100001523793534', 15, 'aaa', '2014-03-03 23:12:57'),
(98, '100001523793534', 11, 'llll', '2014-03-03 23:14:06'),
(99, '100001523793534', 11, 'asdad', '2014-03-03 23:14:12'),
(100, '100001523793534', 11, 'asdad', '2014-03-03 23:14:12'),
(101, '100001523793534', 11, 'asdad', '2014-03-03 23:14:12'),
(102, '100001523793534', 14, 'testt', '2014-03-03 23:34:27'),
(103, '1179786543', 6, 'comment', '2014-03-03 23:52:57'),
(104, '1179786543', 24, 'comment', '2014-03-04 22:24:04'),
(105, '100001523793534', 26, 'comment', '2014-03-05 09:34:33'),
(106, '1388552703', 29, 'Testing!', '2014-03-05 12:18:22'),
(107, '100006892834799', 1, 'what a good website recommended by Yinchen Yang', '2014-03-05 17:04:14'),
(108, '1388552703', 34, 'lol!', '2014-03-05 17:15:47'),
(109, '100001523793534', 7, 'aaa', '2014-03-05 17:46:58'),
(110, '100001523793534', 29, 'sadasdhasd', '2014-03-05 18:04:23'),
(111, '100002054351066', 16, 'zhen de me...?', '2014-03-07 11:06:19'),
(112, '100002054351066', 16, 'ms still has call out this semester? ', '2014-03-07 11:06:49'),
(113, '100002054351066', 7, '&egrave;”š&aelig;•™&aelig;Žˆ&atilde;€‚&atilde;€‚&atilde;€‚', '2014-03-07 11:09:13');

-- --------------------------------------------------------

--
-- Table structure for table `event`
--

CREATE TABLE IF NOT EXISTS `event` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(16) DEFAULT NULL,
  `event_name` varchar(256) DEFAULT NULL,
  `event_time` datetime DEFAULT NULL,
  `event_location` varchar(256) DEFAULT NULL,
  `event_detail` varchar(4096) DEFAULT NULL,
  `event_poster_url` varchar(2083) DEFAULT NULL,
  `event_likes` int(16) unsigned DEFAULT '0',
  `event_comments` int(16) unsigned DEFAULT '0',
  `create_time` datetime DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `user_id` (`user_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=38 ;

--
-- Dumping data for table `event`
--

INSERT INTO `event` (`id`, `user_id`, `event_name`, `event_time`, `event_location`, `event_detail`, `event_poster_url`, `event_likes`, `event_comments`, `create_time`) VALUES
(1, '1', 'test event', '2014-03-06 18:00:00', 'Purdue University, Purdue Mall, West Lafayette, IN, United States', 'This is a very very long description. I don''t know exactly how long is this, but I ''m pretty sure this is long enough.\r\nThis is a very very long description. I don''t know exactly how long is this, but I ''m pretty sure this is long enough.\r\nThis is a very very long description. I don''t know exactly how long is this, but I ''m pretty sure this is long enough.\r\nThis is a very very long description. I don''t know exactly how long is this, but I ''m pretty sure this is long enough.\r\nThis is a very very long description. I don''t know exac', '1', 9, 1, '2014-02-05 07:00:00'),
(2, '1', 'test event2', '2014-02-06 08:00:00', 'Lafayette, IN, United States', 'bbbb', '2', 1, 0, '2014-02-02 03:00:00'),
(3, '1', 'test event3', '2014-03-07 08:00:00', 'Campus Suites on the Lake, Campus Suites Boulevard, West Lafayette, IN, United States', 'tes', NULL, 0, 0, '2014-02-04 09:00:00'),
(6, '100001523793534', 'Get pizza', '2014-03-15 17:00:00', 'Purdue University, Purdue Mall, West Lafayette, IN, United States', 'This is a very very long description. I don''t know exactly how long is this, but I ''m pretty sure this is long enough.This is a very very long description. I don''t know exactly how long is this, but I ''m pretty sure this is long enough.This is a very very long description. I don''t know exactly how long is this, but I ''m pretty sure this is long enough.This is a very very long description. I don''t know exactly how long is this, but I ''m pretty sure this is long enough.This is a very very long description. I don''t know exacThis is a very very long description. I don''t know exactly how long is this, but I ''m pretty sure this is long enough.This is a very very long description. I don''t know exactly how long is this, but I ''m pretty sure this is long enough.This is a very very long description. I don''t know exactly how long is this, but I ''m pretty sure this is long enough.This is a very very long description. I don''t know exactly how long is this, but I ''m pretty sure this is long enough.This is a very very long description. I don''t know exacThis is a very very long description. I don''t know exactly how long is this, but I ''m pretty sure this is long enough.This is a very very long description. I don''t know exactly how long is this, but I ''m pretty sure this is long enough.This is a very very long description. I don''t know exactly how long is this, but I ''m pretty sure this is long enough.This is a very very long description. I don''t know exactly how long is this, but I ''m pretty sure this is long enough.This is a very very long description. I don''t know exac', 'null', 6, 0, '2014-03-01 20:45:56'),
(7, '100001523793534', 'Land O''Lakes Company Recruiting Day Tech Talk', '2014-03-10 17:00:00', 'LWSN', 'asdasd', '', 5, 0, '2014-03-01 20:54:23'),
(8, '100001523793534', 'another callout', '2014-03-13 17:00:00', 'electrical engineering Building', 'adzxczzxc', '', 10, 0, '2014-03-01 20:55:37'),
(20, '1179786543', 'CS Career Callout', '2014-03-12 12:02:00', 'pmu', 'I can have a very long description.', 'Nothing here', 2, 0, '2014-03-04 00:57:23'),
(16, '100001523793534', 'Microsoft Callout', '2014-03-10 16:00:00', 'lawson', '', '', 2, 0, '2014-03-03 21:17:57'),
(35, '1179786543', 'Hi', '2014-03-27 02:01:00', 'phys, purdue', 'Description', 'A url', 0, 0, '2014-03-05 17:50:40'),
(34, '100006892834799', 'Yinchen Yang is very Sao', '2014-03-13 00:00:00', 'Beering Hall on University St, United States', 'Too Sao to be a friend. He is just everyone''s super hero with free food all the time.', '', 1, 0, '2014-03-05 17:07:06'),
(36, '100001523793534', '408demo', '2014-03-12 18:00:00', 'lwsn', 'qwdasdasdasd', '', 0, 0, '2014-03-05 18:06:25');

-- --------------------------------------------------------

--
-- Table structure for table `food_type`
--

CREATE TABLE IF NOT EXISTS `food_type` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `name` varchar(256) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `like_rel`
--

CREATE TABLE IF NOT EXISTS `like_rel` (
  `id` int(16) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(16) NOT NULL,
  `event_id` int(16) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 AUTO_INCREMENT=39 ;

--
-- Dumping data for table `like_rel`
--

INSERT INTO `like_rel` (`id`, `user_id`, `event_id`) VALUES
(33, '1179786543', 29),
(34, '1179786543', 1),
(35, '100001523793534', 7),
(36, '100001523793534', 29),
(37, '100001523793534', 8),
(38, '1388552703', 29);

-- --------------------------------------------------------

--
-- Table structure for table `loc`
--

CREATE TABLE IF NOT EXISTS `loc` (
  `abbr` varchar(8) NOT NULL,
  `location` varchar(256) NOT NULL,
  PRIMARY KEY (`abbr`),
  UNIQUE KEY `location` (`location`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `loc`
--

INSERT INTO `loc` (`abbr`, `location`) VALUES
('ABE', 'Agricultural And Biological Engineering'),
('ADDL', 'Animal Disease Diagnostic Lab'),
('ADM', 'Adm Agricultural Innovation Center'),
('AERO', 'Aerospace Science Laboratory'),
('AGAD', 'Agricultural Administration Building'),
('AHF', 'Animal Holding Facility'),
('AQUA', 'Boilermaker Aquatic Center'),
('AR', 'Armory'),
('ARMS', 'Armstrong (neil) Hall Of Engineering'),
('ASB', 'Airport Service Building'),
('ASTL', 'Animal Sciences Teaching Laboratory'),
('BCC', 'Black Cultural Center'),
('BCHM', 'Biochemistry Building'),
('BIND', 'Bindley (William E.) Bioscience Center'),
('BRK', 'Birck Nanotechnology Center'),
('BRNG', 'Beering (steven C.) Hall Of Liberal Arts And Education'),
('BRWN', 'Brown (Herbert C.) Laboratory Of Chemistry'),
('BSG', 'Building Services And Grounds'),
('CHAF', 'Chaffee Hall'),
('CIVL', 'Civil Engineering Building'),
('CL50', 'Class Of 1950 Lecture Hall'),
('COMP', 'Composites Laboratory'),
('CREC', 'France A. Córdova Recreational Sports Center'),
('DANL', 'Daniel (William H.) Turfgrass Center'),
('DAUC', 'Dauch (dick And Sandy) Alumni Center'),
('DLR', 'Hall For Discovery And Learning Research'),
('DOYL', 'Doyle (leo Philip) Laboratory'),
('DYE', 'Pete Dye Clubhouse'),
('EE', 'Electrical Engineering Building'),
('EEL', 'Entomology Environmental Laboratory'),
('EHSA', 'Equine Health Sciences Annex'),
('EHSB', 'Equine Health Sciences Building'),
('ELLT', 'Elliott (edward C.) Hall Of Music'),
('ENAD', 'Engineering Administration Building'),
('EXPT', 'Exponent'),
('FOOD', 'Food Stores Building'),
('FOPN', 'Flight Operations Building'),
('FORS', 'Forestry Building'),
('FPRD', 'Forest Products Building'),
('FREH', 'Freehafer (lytle J.) Hall Of Administrative Services'),
('FRNY', 'Forney Hall Of Chemical Engineering'),
('FWLR', 'Fowler (Harriet O. And James M., Jr.) Memorial House'),
('GCMB', 'Golf Course Maintenance Barn'),
('GMF', 'Grounds Maintenance Facility'),
('GRIS', 'Grissom Hall'),
('GSMB', 'Golf Storage Maintenance Building'),
('HAAS', 'Haas (Felix) Hall'),
('HAMP', 'Delon And Elizabeth Hampton Hall Of Civil Engineering'),
('HANS', 'Hansen (arthur G.) Life Sciences Research Building'),
('HEAV', 'Heavilon Hall'),
('HERL', 'Herrick Laboratories'),
('HGR4-6', 'Hangars, Numbers 4 Through 6'),
('HGRH', 'Horticulture Greenhouses'),
('HIKS', 'Hicks (John W.) Undergraduate Library'),
('HMMT', 'Hazardous Materials Management Trailer'),
('HNLY', 'Bill And Sally Hanley Hall'),
('HOCK', 'Wayne T. And Mary T. Hockmeyer Hall Of Structural Biology'),
('HORT', 'Horticulture Building'),
('HOVD', 'Hovde (Frederick L.) Hall Of Administration'),
('HPN', 'Heating And Power Plant-north'),
('IAF', 'Intercollegiate Athletic Facility'),
('JNSN', 'Johnson (Helen R.) Hall Of Nursing'),
('KCTR', 'Krannert Center For Executive Education And Research'),
('KNOY', 'Knoy (maurice G.) Hall Of Technology'),
('KRAN', 'Krannert Building'),
('LAMB', 'Lambert (Ward L.) Fieldhouse And Gymnasium'),
('LCC', 'Latino Cultural Center (600 Russell St.)'),
('LILY', 'Lilly Hall Of Life Sciences'),
('LMSB', 'Laboratory Materials Storage Building'),
('LMST', 'Laboratory Materials Storage Trailer'),
('LSA', 'Life Science Animal Building'),
('LSPS', 'Life Science Plant And Soils Laboratory'),
('LSR', 'Life Science Ranges (greenhouse And Service Building)'),
('LWSN', 'Lawson (richard And Patricia) Computer Science Building'),
('LYNN', 'Lynn (Charles J.) Hall Of Veterinary Medicine'),
('MACK', 'Mackey (guy J.) Arena'),
('MANN', 'Mann (gerald D. And Edna E.) Hall'),
('MATH', 'Mathematical Sciences Building'),
('ME', 'Mechanical Engineering Building'),
('MGL', 'Michael Golden Engineering Laboratories And Shops'),
('MJIS', 'Martin C. Jischke Hall Of Biomedical Engineering'),
('MMDC', 'Materials Management And Distribution Center'),
('MMS1', 'Materials Management Storage Building'),
('MOLL', 'Mollenkopf Athletic Center'),
('MRGN', 'Morgan (Burton D.) Center For Entrepreneurship'),
('MRRT', 'Marriott Hall'),
('MSEE', 'Materials And Electrical Engineering Building'),
('MTHW', 'Matthews (mary L.) Hall'),
('NAECC', 'Native American Educational And Cultural Center (south Campus Courts, Building B)'),
('NLSN', 'Phillip E. Nelson Hall Of Food Science'),
('NISW', 'Niswonger Aviation Technology Building'),
('NUCL', 'Nuclear Engineering Building'),
('OLMN', 'Ollman (melvin L.) Golfcart Barn'),
('PAO', 'Pao (Yue-Kong) Hall Of Visual And Performing Arts'),
('PFEN', 'Pfendler Hall (david C.) Of Agriculture'),
('PFSB', 'Physical Facilities Service Building'),
('PHYS', 'Physics Building'),
('PJIS', 'Patty Jischke Early Care And Education Center'),
('PMU', 'Purdue Memorial Union'),
('PMUC', 'Purdue Memorial Union Club'),
('POAN', 'Poultry Science Annex'),
('POTR', 'Potter (a. A.) Engineering Center'),
('POUL', 'Poultry Science Building'),
('PRCE', 'Peirce Hall'),
('PRSV', 'Printing Services Facility'),
('PSYC', 'Psychological Sciences Building'),
('PUSH', 'Purdue University Student Health Center'),
('PVCC', 'Purdue Village Community Center'),
('PWD', 'Parking Facilities'),
('RAIL', 'American Railway Building'),
('RAWL', 'Rawls (Jerry S.) Hall'),
('REC', 'Recitation Building'),
('RHPH', 'Heine (robert E.) Pharmacy Building'),
('SC', 'Stanley Coulter Hall'),
('SCCA-E', 'South Campus Courts, Buildings A-e'),
('SCHL', 'Schleman (Helen B.) Hall Of Student Services'),
('SCHO', 'Global Policy Research Institute (schowe House)'),
('SCPA', 'Slayter Center Of Performing Arts'),
('SMTH', 'Smith Hall'),
('SOIL', 'Soil Erosion Laboratory, National'),
('SPUR', 'Spurgeon (tom) Golf Training Center'),
('SSOF', 'State Street Office Facility'),
('STDM', 'Ross-ade Stadium (includes Ross-ade Pavilion [raP])'),
('STEW', 'Stewart Center'),
('STON', 'Stone (Winthrop E.) Hall'),
('TEL', 'Telecommunications Building'),
('TERM', 'Terminal Building'),
('TERY', 'Terry (oliver P.) Memorial House'),
('TH1-6', 'Tee-Hangars 1 Through 6'),
('TREC', 'Turf Recreation Exercise Center'),
('TSWF', 'Transportation Service Wash Facility'),
('UNIV', 'University Hall'),
('UPOB', 'Utility Plant Office Building'),
('UPOF', 'Utility Plant Office Facility'),
('UPSB', 'Utility Plant Storage Building'),
('VA1', 'Veterinary Animal Isolation Building 1'),
('VA2', 'Veterinary Animal Isolation Building 2'),
('VCPR', 'Veterinary Center For Paralysis Research'),
('VLAB', 'Veterinary Laboratory Animal Building'),
('VMIF', 'Veterinary Medicine Isolation Facility'),
('VOIN', 'Voinoff (samuel) Golf Pavilion'),
('VPRB', 'Veterinary Pathobiology Research Building'),
('VPTH', 'Veterinary Pathology Building'),
('WADE', 'Wade (Walter W.) Utility Plant'),
('WEST', 'Westwood (President’s Home)'),
('WGLR', 'Women’s Golf Locker Room'),
('WSLR', 'Whistler (roy L.) Hall Of Agricultural Research'),
('WTHR', 'Wetherill (richard Benbridge) Laboratory Of Chemistry'),
('YONG', 'Young (ernest C.) Hall'),
('ZL1', 'Combustion Research Laboratory'),
('ZL2', 'Gas Dynamics Research Laboratory'),
('ZL3', 'High Pressure Research Laboratory'),
('ZL4', 'Propulsion Research Laboratory'),
('ZL5', 'Turbomachinery Fluid Dynamics Laboratory'),
('CARY', 'Cary (Franklin Levering) Quadrangle'),
('DUHM', 'Duhme (ophelia) Residence Hall'),
('ERHT', 'Earhart (amelia) Residence Hall'),
('FORD', 'Ford (Fred And Mary) Dining Court'),
('FST', 'First Street Towers'),
('HARR', 'Harrison (Benjamin) Residence Hall'),
('HAWK', 'Hawkins (george A.) Hall'),
('HILL', 'Hillenbrand Residence Hall'),
('HLTP', 'Hilltop Apartments'),
('MCUT', 'McCutcheon (John T.) Residence Hall'),
('MRDH', 'Meredith (virginia C.) Residence Hall'),
('OWEN', 'Owen (richard) Residence Hall'),
('PVAB', 'Purdue Village Administration Building'),
('PVIL', 'Purdue Village'),
('PVP', 'Purdue Village Preschool'),
('SHLY', 'Shealy (Frances M.) Residence Hall'),
('SHRV', 'Shreve (eleanor B.) Residence Hall'),
('SMLY', 'Smalley (John C.) Center For Housing And Food Services Administration, Residence Hall'),
('VAWT', 'Vawter (everett B.) Residence Hall'),
('WARN', 'Warren (martha E. And Eugene K.) Residence Hall'),
('WDCT', 'Wiley Dining Court'),
('WILY', 'Wiley (Harvey W.) Residence Hall'),
('WOOD', 'Wood (elizabeth G. And William R.) Residence Hall'),
('ALEX', 'John And Anna Margaret Ross Alexander Field'),
('SOCC', 'Soccer Complex'),
('SCHW', 'Dennis J. And Mary Lou Schwartz Tennis Center'),
('PGG', 'Parking Garage, Grant Street'),
('PGW', 'Parking Garage, Wood Street'),
('PGM', 'Parking Garage, Marsteller Street'),
('PGMD', 'Parking Garage, McCutcheon Drive'),
('PGNW', 'Parking Garage, Northwestern Avenue (includes Visitor Information Center And Parking Services)'),
('PGU', 'Parking Garage, University Street');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE IF NOT EXISTS `userinfo` (
  `userid` varchar(16) NOT NULL,
  `username` varchar(32) DEFAULT NULL,
  `avatar_url` varchar(2083) DEFAULT NULL,
  `email` varchar(256) DEFAULT NULL,
  PRIMARY KEY (`userid`),
  UNIQUE KEY `userid` (`userid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`userid`, `username`, `avatar_url`, `email`) VALUES
('100001523793534', 'Qing Wei', 'https://graph.facebook.com/100001523793534/picture', 'weiqing@email.arizona.edu'),
('1179786543', 'Yinchen Yang', 'https://graph.facebook.com/1179786543/picture', 'yinchen.yang@gmail.com'),
('1388552703', 'Kishen Sivalingam', 'https://graph.facebook.com/1388552703/picture', 'nehsik5423@gmail.com'),
('100001321683740', 'Sagar Pujara', 'https://graph.facebook.com/100001321683740/picture', 'sagarpujara@gmail.com'),
('100006892834799', 'Zhihao  Hu', 'https://graph.facebook.com/100006892834799/picture', 'daniel__hu@163.com'),
('100000269597534', 'Annisa Sivalingam', 'https://graph.facebook.com/100000269597534/picture', 'rukumani66@yahoo.com'),
('1445505565', 'Thivviyan Amirthalingam', 'https://graph.facebook.com/1445505565/picture', 'thivviyan_90@yahoo.com'),
('718121608', 'Tinesh Palaniappan', 'https://graph.facebook.com/718121608/picture', 'tinesh_2@hotmail.com'),
('100002054351066', 'Guanqun Mao', 'https://graph.facebook.com/100002054351066/picture', 'maog@purdue.edu');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
