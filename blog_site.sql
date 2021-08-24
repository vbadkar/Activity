-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:8889
-- Generation Time: Aug 24, 2021 at 05:21 AM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog_site`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `b_id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`b_id`, `image`) VALUES
(11, 'food.jpg'),
(12, 'gymnastics.jpg'),
(15, 'travel.jpg'),
(16, 'music.jpg'),
(17, 'sports.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int(20) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`) VALUES
(9, 'vbad1271', '$2y$10$rEzAEiIigu/0YnPznB5tw.sg0tgI48TLqKO4S51KWQ.LFWDDBqLPO'),
(10, 'Spidey1271', '$2y$10$NzuE5jmDcdy3VQZoaUOw/ec2A2LY5px7722V6WuSZRACz8onjGu8y');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `p_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`p_id`, `title`, `description`, `category`, `image`) VALUES
(19, 'Food blog', 'Food blogs are where cookbooks meet lifestyle magazines. The bloggers range from home cooks who enjoy sharing their favorite creations, to the famous top chef who uses the virtual space to share their ultimate recipes and top tips.', 'Food', 'food.jpg'),
(20, 'Sports blog', 'Sports Social Blog: Chase Your Sport aims to create a sustainable platform for Indian sports lovers to provide latest updates on Indian Sports', 'Sports', 'sports.jpg'),
(21, 'Music blog', ' An MP3 blog is a type of blog in which the creator makes music files, normally in the MP3 format, available for download. They are also known as musicblogs, audioblogs or soundblogs (the latter two can also mean podcasts).', 'Music', 'music.jpg'),
(22, 'Travel blog', 'It began with just articles about travel in India, but as she has expanded her horizon since she gave up her academic career and decided to focus solely on writing, her blog now covers articles from her personal travels outwit India.', 'Travel', 'travel.jpg'),
(25, 'Gymnastics blog', 'he Medal Count (TMC) is a gymnastics blog focusing on the gymnasts of the past. Here you will find gymnastics content from an era when the Cold War was raging, judges gave out 10s, and someone other than Chusovitina was the oldest athlete in WAG', 'Gymnastics', 'gymnastics.jpg'),
(26, 'Food title', 'Food description', 'Food', 'food.jpg'),
(28, 'Travel title', 'Travel description', 'Travel', 'travel.jpg'),
(29, 'Music title', 'Music description', 'Music', 'music.jpg'),
(30, 'test title1', 'test description 1', 'Gymnastics', 'gymnastics.jpg'),
(31, 'test title 2', 'test description 2', 'Sports', 'sports.jpg'),
(32, 'test title 3 ', 'test description 3', 'Travel', 'travel.jpg'),
(33, 'test title 4', 'test description 4', 'Music', 'music.jpg'),
(34, 'test title 5', 'test description 5', 'Food', 'food.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`p_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `b_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `p_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
