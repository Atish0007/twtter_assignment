-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2020 at 11:56 AM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 5.6.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `twitter`
--

-- --------------------------------------------------------

--
-- Table structure for table `tweets`
--

CREATE TABLE `tweets` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `tweet_desc` varchar(250) NOT NULL,
  `image` varchar(200) NOT NULL,
  `date` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tweets`
--

INSERT INTO `tweets` (`id`, `user_id`, `tweet_desc`, `image`, `date`) VALUES
(1, 1, 'Jay Shivray..!!!', 'images/maharaj1.jpg', '2020-03-05 04:19:07'),
(2, 1, 'A for Atish..!!!', 'images/Apple.jpg', '2020-03-04 07:19:09'),
(4, 1, 'This is Demo', 'images/brd1.jpg', '2020-03-03 06:11:24'),
(5, 2, 'Hello,\r\n I am Suraj', 'images/brdImg.png', '2020-03-02 05:17:19'),
(8, 1, 'Demo tweet', 'images/1489876.jpg', '2020-03-06 12:51:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(40) NOT NULL,
  `lastname` varchar(40) NOT NULL,
  `age` int(11) DEFAULT NULL,
  `description` varchar(250) DEFAULT NULL,
  `profile_image` varchar(250) DEFAULT NULL,
  `email` varchar(60) NOT NULL,
  `password` varchar(250) NOT NULL,
  `date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `age`, `description`, `profile_image`, `email`, `password`, `date`, `status`) VALUES
(1, 'Atish', 'sanas', 25, 'This is my twetter description....!!', 'images/profile_images/Apple1.jpg', 'atishsanas@ymail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-03-05 19:52:25', 1),
(2, 'Suraj', 'Patil', 26, NULL, NULL, 'surajp@ymail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-03-05 19:53:38', 1),
(3, 'Rahul', 'Sharma', 27, NULL, NULL, 'rahulsharma@ymail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-03-05 19:54:14', 1),
(4, 'Karan', 'Gupta', 28, 'This is my tweeter description', NULL, 'karangupta@ymail.com', 'e10adc3949ba59abbe56e057f20f883e', '2020-03-05 20:19:56', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tweets`
--
ALTER TABLE `tweets`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tweets`
--
ALTER TABLE `tweets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
