-- phpMyAdmin SQL Dump
-- version 4.9.5deb2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 28, 2021 at 01:17 AM
-- Server version: 8.0.26-0ubuntu0.20.04.3
-- PHP Version: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blogsite`
--

-- --------------------------------------------------------

--
-- Table structure for table `banners`
--

CREATE TABLE `banners` (
  `b_id` int NOT NULL,
  `image` varchar(255) NOT NULL,
  `banner_title` varchar(255) NOT NULL,
  `banner_snippet` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `banners`
--

INSERT INTO `banners` (`b_id`, `image`, `banner_title`, `banner_snippet`) VALUES
(11, 'template-banner.jpg', 'Template Banner', 'Image of a guy working on laptop'),
(12, 'gymnastics.jpg', 'Gymnastics', 'A guy doing gymnastics'),
(15, 'travel.jpg', 'Crossing train', 'A train passing by on the bridge'),
(16, 'music.jpg', 'Music for life', 'Headphones lying on the casio'),
(19, 'sports.jpg', 'Sports-Basketball', 'Group of people playing basketball');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `cat_id` int NOT NULL,
  `dup_id` int NOT NULL,
  `cat_name` varchar(255) NOT NULL,
  `lang_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`cat_id`, `dup_id`, `cat_name`, `lang_code`) VALUES
(1, 0, 'Food', 'en'),
(2, 0, 'Music', 'en'),
(3, 0, 'Sports', 'en'),
(4, 0, 'Gymnastics', 'en'),
(5, 0, 'Travel', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int NOT NULL,
  `name` varchar(255) NOT NULL,
  `comment` varchar(255) NOT NULL,
  `p_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comment`, `p_id`) VALUES
(5, 'Vivek', 'Hello', 36),
(6, 'Vivel', 'Nice food post', 37),
(7, 'Vivek', 'good post', 38),
(8, 'Vivek', '2nd comment', 36),
(9, 'Vivek', '3rd comment', 36),
(10, 'Vivek', '4th comment', 36);

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `lang_id` int NOT NULL,
  `lang_name` varchar(255) NOT NULL,
  `lang_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `languages`
--

INSERT INTO `languages` (`lang_id`, `lang_name`, `lang_code`) VALUES
(1, 'Hindi', 'hi'),
(2, 'English', 'en');

-- --------------------------------------------------------

--
-- Table structure for table `likes`
--

CREATE TABLE `likes` (
  `like_id` int NOT NULL,
  `user_id` int NOT NULL,
  `p_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE `login` (
  `id` int NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `user_type`) VALUES
(9, 'vbad1271', '$2y$10$rEzAEiIigu/0YnPznB5tw.sg0tgI48TLqKO4S51KWQ.LFWDDBqLPO', 'user'),
(10, 'Spidey1271', '$2y$10$NzuE5jmDcdy3VQZoaUOw/ec2A2LY5px7722V6WuSZRACz8onjGu8y', 'user'),
(11, 'vbad', '$2y$10$B02YnOBPlPMaWY4w/w9zze6SryNPFzkqmE.sF3BflEEZlRbBfbHTu', 'user'),
(12, 'Vivek', '$2y$10$5xYqU3pp1W56KU04uBYYUud99FQiW7E.bMOzYsXaboRDTPhD8Aeca', 'admin'),
(13, 'hello', '$2y$10$ZK4cfoYOhGv0R77EgPpCyO3ifUW7anNXQjh4ui1mtZnWoXshQ0YDK', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `p_id` int NOT NULL,
  `dup_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `lang_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`p_id`, `dup_id`, `title`, `description`, `category`, `image`, `user_id`, `lang_code`) VALUES
(36, 36, 'Weight Lifting', 'The two competition lifts in order are the snatch and the clean and jerk. The snatch is a wide-grip, one-move lift. The clean and jerk is a close-grip, two-move lift.\r\nThe two competition lifts in order are the snatch and the clean and jerk. The snatch is a wide-grip, one-move lift. The clean and jerk is a close-grip, two-move lift.\r\nThe two competition lifts in order are the snatch and the clean and jerk. The snatch is a wide-grip, one-move lift. The clean and jerk is a close-grip, two-move lift.\r\nThe two competition lifts in order are the snatch and the clean and jerk. The snatch is a wide-grip, one-move lift. The clean and jerk is a close-grip, two-move lift.\r\nThe two competition lifts in order are the snatch and the clean and jerk. The snatch is a wide-grip, one-move lift. The clean and jerk is a close-grip, two-move lift.\r\nThe two competition lifts in order are the snatch and the clean and jerk. The snatch is a wide-grip, one-move lift. The clean and jerk is a close-grip, two-move lift.\r\nThe two competition lifts in order are the snatch and the clean and jerk. The snatch is a wide-grip, one-move lift. The clean and jerk is a close-grip, two-move lift.\r\nThe two competition lifts in order are the snatch and the clean and jerk. The snatch is a wide-grip, one-move lift. The clean and jerk is a close-grip, two-move lift.\r\nThe two competition lifts in order are the snatch and the clean and jerk. The snatch is a wide-grip, one-move lift. The clean and jerk is a close-grip, two-move lift.', 'Gymnastics', 'gymnastics2.jpg', 11, 'en'),
(37, 37, 'Food52', 'When it comes to the ‘official version’, so to speak, of food blogging, the culinary magazines are on top. This is literary the case with Food52, which ranks amongst the gods of the social media food show with no less than 2.7m followers on Instagram.', 'Food', 'food.jpg', 9, 'en'),
(38, 38, 'Let’s not judge our sports culture by medals', 'This is one of the best times for Indian sports. India gave her best Olympics performance in several decades at Tokyo. In cricket, we remain one of the top ranked teams and the Tokyo Paralympics', 'Sports', 'sports3.jpg', 9, 'en\r\n'),
(39, 39, 'Delusions of grandeur. Romania wins team silver at the Olympics', 'It’s a great idea. Take competitions with completely different judges. Plugin scores from competitions from the last 2 years and viola! Romania wins silver at the Olympics.', 'Gymnastics', 'gymnastics.jpg', 9, 'en'),
(41, 41, 'Your EDM (Electronic Dance Music) hasdhadahjdhbjddbb', 'A source that is focused on covering Electronic Dance Music, Interviews, Music Reviews & EDM news. YourEDM is the most recognized publication in the world of Electronic Dance Music.', 'Music', 'music.jpg', 11, 'en'),
(42, 42, 'IPL Mega auction – Who will be retained', 'The Indian Premier League (IPL) is set to see two new teams added to the competition', 'Sports', 'sports2.jpg', 11, 'en'),
(43, 43, 'Serious Eats', 'Here is a packed food and drink award-winning culinary website that began life in 2006, “a leading resource for all food and drink”. ', 'Food', 'food2.jpg', 9, 'en'),
(44, 44, 'Tokyo to Paris in 1000 days', 'For one Neeraj Chopra Gold, there would have been thousands who made efforts, had dreams and aspirations but got lost into the anonymity of despair and disapproval. ', 'Sports', 'sports4.jpg', 9, 'en'),
(45, 45, 'Trap Music Blog', 'Your source for all things trap music, EDM, hip hop news, club music, 808 bass music & everything in between. A new order for underground music and culture.', 'Music', 'music2.jpg', 11, 'en'),
(46, 0, ' भोजन52', 'जब \'आधिकारिक संस्करण\' की बात आती है, तो बोलने के लिए, खाद्य ब्लॉगिंग की, पाक पत्रिकाएं शीर्ष पर हैं। Food52 के मामले में यह साहित्यिक मामला है, जो सोशल मीडिया फूड शो के देवताओं में शुमार है, जिसके इंस्टाग्राम पर 2.7m से कम फॉलोअर्स नहीं हैं।\r\n', 'Food', 'food.jpg', 9, 'hi'),
(47, 36, 'भारोत्तोलन', 'स्नैच और क्लीन एंड जर्क क्रम में दो प्रतियोगिता लिफ्ट हैं। स्नैच एक वाइड-ग्रिप, वन-मूव लिफ्ट है। क्लीन एंड जर्क एक क्लोज-ग्रिप, टू-मूव लिफ्ट है।\r\n', 'Gymnastics', 'gymnastics2.jpg', 11, 'hi');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `banners`
--
ALTER TABLE `banners`
  ADD PRIMARY KEY (`b_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `p_id` (`p_id`);

--
-- Indexes for table `languages`
--
ALTER TABLE `languages`
  ADD PRIMARY KEY (`lang_id`);

--
-- Indexes for table `likes`
--
ALTER TABLE `likes`
  ADD PRIMARY KEY (`like_id`);

--
-- Indexes for table `login`
--
ALTER TABLE `login`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`p_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `banners`
--
ALTER TABLE `banners`
  MODIFY `b_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `cat_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `lang_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `p_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`p_id`) REFERENCES `posts` (`p_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `login` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;