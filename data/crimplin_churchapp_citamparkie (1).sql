-- phpMyAdmin SQL Dump
-- version 4.1.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 02, 2017 at 01:38 PM
-- Server version: 5.6.17
-- PHP Version: 5.5.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `crimplin_churchapp_citamparkie`
--

-- --------------------------------------------------------

--
-- Table structure for table `eventgoers`
--

CREATE TABLE IF NOT EXISTS `eventgoers` (
  `r_id` int(3) NOT NULL AUTO_INCREMENT,
  `event_id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `liked_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `attending` int(11) NOT NULL,
  PRIMARY KEY (`r_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=94 ;

--
-- Dumping data for table `eventgoers`
--

INSERT INTO `eventgoers` (`r_id`, `event_id`, `user_email`, `liked_date`, `attending`) VALUES
(89, 1, 'cantosauric@gmail.com', '2017-04-20 17:04:56', 1),
(90, 2, 'cantosauric@gmail.com', '2017-04-20 19:01:20', 0),
(93, 7, 'joefaithfulgroup@gmail.com', '2017-04-28 19:20:39', 1),
(34, 7, 'churchapp@tentoglory.org', '2017-04-27 15:34:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `events`
--

CREATE TABLE IF NOT EXISTS `events` (
  `event_idm` int(4) NOT NULL AUTO_INCREMENT,
  `ename` varchar(50) NOT NULL,
  `evenue` varchar(50) NOT NULL,
  `tfrom` varchar(50) NOT NULL,
  `tto` varchar(50) NOT NULL,
  `des` varchar(200) NOT NULL,
  `time` varchar(50) NOT NULL,
  `eposter` varchar(50) NOT NULL,
  PRIMARY KEY (`event_idm`),
  UNIQUE KEY `ename` (`ename`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `events`
--

INSERT INTO `events` (`event_idm`, `ename`, `evenue`, `tfrom`, `tto`, `des`, `time`, `eposter`) VALUES
(1, 'TEEN''S CAMP', 'Albasha,Dubai', '15-04-2017', '15-04-2017', 'Let no one despise your youth but be an example and set a pattern\n1 Tim 4:12.\n', '09:00AM-4:00PM', 'tog_teen'),
(2, 'MAIN SERVICE-MAIN SERVICE-MAIN SERVICE-MAIN SERVIC', 'St. Philips Hall,St. Martinn', '15-04-2017', '15-04-2017', 'Every Friday', '4:00PM-6:00PM', 'main_service');

-- --------------------------------------------------------

--
-- Table structure for table `prayers`
--

CREATE TABLE IF NOT EXISTS `prayers` (
  `prayer_id` int(7) NOT NULL AUTO_INCREMENT,
  `about` varchar(30) NOT NULL,
  `description` varchar(200) NOT NULL,
  `prayer_type` varchar(10) NOT NULL DEFAULT 'personal',
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user` varchar(40) NOT NULL,
  `prayedby` varchar(100) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`prayer_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=41 ;

--
-- Dumping data for table `prayers`
--

INSERT INTO `prayers` (`prayer_id`, `about`, `description`, `prayer_type`, `time`, `user`, `prayedby`, `status`) VALUES
(38, 'for job and family life-for jo', 'praise the Lord..  please pray for me and my wife.she needs a job.And please pray for us to growingâ€‹ up in spiritual life.we struggling a lot now.so we need your prayers.thank you', 'personal', '2017-04-23 03:19:39', 'kondoorhouse@gmail.com', 'you', 0);

-- --------------------------------------------------------

--
-- Table structure for table `preachings`
--

CREATE TABLE IF NOT EXISTS `preachings` (
  `preaching_id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(200) NOT NULL,
  `preached_on` varchar(25) NOT NULL,
  `by` varchar(200) NOT NULL,
  `streams` int(5) NOT NULL DEFAULT '0',
  `downloads` int(5) NOT NULL DEFAULT '0',
  `likes` int(5) DEFAULT '0',
  PRIMARY KEY (`preaching_id`),
  UNIQUE KEY `preaching_id` (`preaching_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=103 ;

--
-- Dumping data for table `preachings`
--

INSERT INTO `preachings` (`preaching_id`, `title`, `preached_on`, `by`, `streams`, `downloads`, `likes`) VALUES
(1, 'Casting_Crownsss', 'qwertyu', 'Casting Crowns Band', 0, 0, 1),
(2, 'March_31st', '31-03-2017', 'Rev. Saji N Joy', 0, 0, 1),
(4, 'God_thy_reward', '14-3-2017', 'Rev. Saji N Joy', 2, 0, 5),
(3, 'Bless_the_Lord', '', 'Kids Worship Team(The Revival)', 2, 0, 3),
(5, 'Enduring_Unjust_Suffering', '14-4-2017', 'Rev. Saji N Joy', 0, 0, 5),
(6, 'Jesus_Perfect_Redeemer', '21-4-2017', 'Rev. Saji N Joy', 5, 0, 6),
(102, 'Twitter.mp4', 'trial', 'tril', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `testimonies`
--

CREATE TABLE IF NOT EXISTS `testimonies` (
  `testimony_id` smallint(6) NOT NULL AUTO_INCREMENT,
  `testimony_title` varchar(50) NOT NULL,
  `testimony_desc` longtext NOT NULL,
  `testimony_time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tstatus` text,
  `user` varchar(50) NOT NULL,
  `likes` int(11) NOT NULL DEFAULT '0',
  `shares` int(3) NOT NULL DEFAULT '0',
  PRIMARY KEY (`testimony_id`),
  UNIQUE KEY `testimony_id` (`testimony_id`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=104 ;

--
-- Dumping data for table `testimonies`
--

INSERT INTO `testimonies` (`testimony_id`, `testimony_title`, `testimony_desc`, `testimony_time`, `tstatus`, `user`, `likes`, `shares`) VALUES
(101, 'praise', 'Jesus died for my son, He is my Lord', '2017-04-19 01:24:04', '0', 'sajinjoy@hotmail.com', 15, 3),
(102, 'Healing', 'God has healed me', '2017-04-20 20:51:45', '0', 'cantosauric@gmail.com', 8, 4),
(103, 'praise', 'we had a blessed time of prayer and worship. thank you Jesus for everything', '2017-04-22 03:19:18', '0', 'sajinjoy@hotmail.com', 1, 0);

-- --------------------------------------------------------

--
-- Table structure for table `testimonylikers`
--

CREATE TABLE IF NOT EXISTS `testimonylikers` (
  `test_id` int(11) NOT NULL,
  `user_email` varchar(100) NOT NULL,
  `like_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `liked` int(11) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonylikers`
--

INSERT INTO `testimonylikers` (`test_id`, `user_email`, `like_date`, `liked`) VALUES
(95, 'cantosauric@gmail.com', '2017-04-07 11:41:37', 1),
(92, 'glomutheu33@gmail.com', '2017-04-09 14:41:15', 1),
(90, 'cantosauric@gmail.com', '2017-04-12 15:08:07', 1),
(92, 'cantosauric@gmail.com', '2017-04-12 15:49:42', 1),
(99, 'cantosauric@gmail.com', '2017-04-12 17:30:46', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:05:37', 1),
(100, 'cantosauric@gmail.com', '2017-04-13 15:08:45', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:09:15', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:10:28', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:14:31', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:14:48', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:16:26', 1),
(100, 'cantosauric@gmail.com', '2017-04-13 15:16:36', 1),
(100, 'cantosauric@gmail.com', '2017-04-13 15:16:42', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:33:03', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:33:27', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:33:51', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:34:05', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:34:24', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:34:42', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:35:29', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:35:51', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:36:19', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:39:37', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:39:45', 1),
(0, '', '2017-04-13 15:41:15', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:43:06', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:43:29', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:43:39', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:45:43', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:46:45', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:46:46', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:46:52', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:46:52', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:47:04', 1),
(99, 'cantosauric@gmail.com', '2017-04-13 15:47:17', 1),
(0, '', '2017-04-13 15:52:41', 1),
(90, 'cantosauric@gmail.com', '2017-04-13 19:21:40', 1),
(90, 'cantosauric@gmail.com', '2017-04-13 20:52:30', 1),
(101, 'talenttechnouae@gmail.com', '2017-04-19 11:41:31', 1),
(0, '', '2017-04-19 11:41:32', 1),
(101, 'talenttechnouae@gmail.com', '2017-04-19 11:41:45', 1),
(101, 'talenttechnouae@gmail.com', '2017-04-19 11:42:08', 1),
(101, 'sajinjoy@hotmail.com', '2017-04-20 03:20:18', 1),
(101, 'cantosauric@gmail.com', '2017-04-20 15:51:18', 1),
(0, '', '2017-04-20 20:50:30', 1),
(101, 'cantosauric@gmail.com', '2017-04-20 20:51:55', 1),
(101, 'sajinjoy@hotmail.com', '2017-04-22 03:19:54', 1),
(101, 'sajinjoy@hotmail.com', '2017-04-22 03:19:59', 1),
(101, 'cantosauric@gmail.com', '2017-04-22 06:28:37', 1),
(101, 'jijomongeorge84@gmail.com', '2017-04-22 17:18:34', 1),
(101, 'ashwy2006@yahoo.com', '2017-04-23 10:45:17', 1),
(101, 'jerinbramwell@gmail.com', '2017-04-23 17:23:53', 1),
(101, 'cantosauric@gmail.com', '2017-04-23 19:46:17', 1),
(101, 'cantosauric@gmail.com', '2017-04-25 19:28:33', 1),
(101, 'cantosauric@gmail.com', '2017-04-25 19:35:14', 1),
(102, 'cantosauric@gmail.com', '2017-04-25 19:39:46', 1),
(103, 'cantosauric@gmail.com', '2017-04-27 12:38:46', 1),
(102, 'cantosauric@gmail.com', '2017-04-27 12:44:58', 1),
(102, 'cantosauric@gmail.com', '2017-04-27 12:45:05', 1),
(102, 'cantosauric@gmail.com', '2017-04-27 12:49:50', 1),
(102, 'cantosauric@gmail.com', '2017-04-27 13:06:00', 1),
(102, 'cantosauric@gmail.com', '2017-04-27 13:07:21', 1),
(102, 'cantosauric@gmail.com', '2017-04-27 13:12:52', 1),
(102, 'cantosauric@gmail.com', '2017-04-27 19:25:27', 1);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
