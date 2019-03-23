-- phpMyAdmin SQL Dump
-- version 4.4.14
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2019 at 09:14 PM
-- Server version: 5.6.26
-- PHP Version: 5.6.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ml`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `password`) VALUES
(1, 'Abhinav', 'abhi123');

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE IF NOT EXISTS `favourite` (
  `user_id` int(11) NOT NULL,
  `folder_id` int(11) NOT NULL,
  `song_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `favourite`
--

INSERT INTO `favourite` (`user_id`, `folder_id`, `song_id`) VALUES
(2, 69, 0),
(2, 0, 64);

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `subject` text NOT NULL,
  `message` text NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `e_mail`, `subject`, `message`, `date`) VALUES
(3, 'Abhinav Verma', 'abhi@gmail.com', 'About Design', 'Improve the design of the site.', '2016-05-14');

-- --------------------------------------------------------

--
-- Table structure for table `folder`
--

CREATE TABLE IF NOT EXISTS `folder` (
  `id` int(11) NOT NULL,
  `category` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `year` int(11) NOT NULL,
  `star1` varchar(255) NOT NULL,
  `star2` varchar(255) NOT NULL,
  `star3` varchar(255) NOT NULL,
  `star4` varchar(255) NOT NULL,
  `director` varchar(255) NOT NULL,
  `music_director1` varchar(255) NOT NULL,
  `music_director2` varchar(255) NOT NULL,
  `composer1` varchar(255) NOT NULL,
  `composer2` varchar(255) NOT NULL,
  `poster` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=74 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `folder`
--

INSERT INTO `folder` (`id`, `category`, `name`, `year`, `star1`, `star2`, `star3`, `star4`, `director`, `music_director1`, `music_director2`, `composer1`, `composer2`, `poster`) VALUES
(4, 'DJ Remix Mp3 Songs', 'DJ Shadow Dubai', 2015, '', '', '', '', '', '', '', '', '', '57618-Love Mashup.jpg'),
(23, 'Bollywood Music', 'Dil Se', 1998, 'Shahrukh Khan', 'Manisha Koirala', '', '', 'Mani Ratnam', 'A. R. Rahman', '', 'A. R. Rahman', '', 'Dil-se.jpg'),
(44, 'Punjabi Music', 'Dr. Zeus', 2015, '', '', '', '', '', '', '', '', '', 'Inch-Zora-Randhawa-Ft-Dr.-Zeus-Fateh-Mp3-Song-Download.jpg'),
(57, 'IndianPop Mp3 Songs', 'Tu Dua Hai', 2016, '', '', '', '', '', '', '', '', '', '35757-Tu Dua Hai (Darshan Raval).jpg'),
(67, 'Instrumental Songs Collections', 'Mohd. Rafi', 2011, '', '', '', '', '', '', '', '', '', '64795-859711965067_cover.600x600-75.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE IF NOT EXISTS `song` (
  `id` int(11) NOT NULL,
  `folder_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `singer1` varchar(255) NOT NULL,
  `singer2` varchar(255) NOT NULL,
  `singer3` varchar(255) NOT NULL,
  `singer4` varchar(255) NOT NULL,
  `size` decimal(65,2) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=105 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`id`, `folder_id`, `name`, `singer1`, `singer2`, `singer3`, `singer4`, `size`) VALUES
(23, 23, 'Dil Se Re', 'A. R. Rahman', '', '', '', '3.07'),
(50, 4, 'Deewani Mastani', 'DJ Shadow', '', '', '', '4.12'),
(66, 57, 'Tu Dua Hai', 'Darshan Raval', '', '', '', '3.61'),
(80, 67, 'Tujhko Pukare Mera Pyar', 'Mohd. Rafi', '', '', '', '4.03'),
(87, 44, 'Kangna Tera Ni', 'Dr. Zeus', '', '', '', '3.23');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `e_mail` varchar(255) NOT NULL,
  `phone` bigint(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `e_mail`, `phone`, `username`, `password`) VALUES
(1, 'Abhinav Verma', 'abhinav1995.1995@gmail.com', 9792207596, 'Abhinav8rk', 'abhi123'),
(2, 'Devansh', 'dev@gmail.com', 9878768456, 'dev', 'devd');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `folder`
--
ALTER TABLE `folder`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `folder`
--
ALTER TABLE `folder`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=105;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
