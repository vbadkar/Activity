-- phpMyAdmin SQL Dump
-- version 4.9.7deb1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 01, 2021 at 10:46 AM
-- Server version: 8.0.27-0ubuntu0.21.04.1
-- PHP Version: 7.4.16

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
(6, 'Vivek', 'Nice food post', 37),
(7, 'Vivek', 'good post', 38);

-- --------------------------------------------------------

--
-- Table structure for table `contact_info`
--

CREATE TABLE `contact_info` (
  `id` int NOT NULL,
  `name` text NOT NULL,
  `email` varchar(255) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `contact_info`
--

INSERT INTO `contact_info` (`id`, `name`, `email`, `message`) VALUES
(1, 'Vivek', 'vivekbadkar@gmail.com', 'Hello world'),
(2, 'Vbad', 'dilasi7016@tst999.com', 'Hello '),
(3, 'Ray', 'hebidi5644@specialistblog.com', 'adjkhajdhqdjlqkwdhiqhuiqfhw');

-- --------------------------------------------------------

--
-- Table structure for table `languages`
--

CREATE TABLE `languages` (
  `lang_id` int NOT NULL,
  `lang_name` varchar(255) NOT NULL,
  `lang_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

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
  `email` varchar(255) NOT NULL,
  `user_type` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `username`, `password`, `email`, `user_type`) VALUES
(9, 'vbad1271', '$2y$10$.VymMwqn7LUmjTsAu3gvTuykawjVpLGKYmrIE2v2tx.TiweUU62py', 'vivekbadkar@gmail.com', 'user'),
(10, 'Spidey1271', '$2y$10$NzuE5jmDcdy3VQZoaUOw/ec2A2LY5px7722V6WuSZRACz8onjGu8y', '', 'user'),
(11, 'vbad', '$2y$10$B02YnOBPlPMaWY4w/w9zze6SryNPFzkqmE.sF3BflEEZlRbBfbHTu', '', 'user'),
(12, 'Vivek', '$2y$10$5xYqU3pp1W56KU04uBYYUud99FQiW7E.bMOzYsXaboRDTPhD8Aeca', '', 'admin'),
(14, 'LetsGo', '$2y$10$feEYuK/x9eLCOtBFp/Jeq.Rz5anaUS9Ja4b7zWaEkGDYtHhWdoImO', 'letsgo@gmail.com', 'user'),
(15, 'NewUser', '$2y$10$B.n7.S/nwthiOO37PP5VHef0bCQ7DqFb5Jz.kaahKbzIr2k3wEJDC', 'example@gmail.com', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `p_id` int NOT NULL,
  `dup_id` int NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` longtext CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `category` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int NOT NULL,
  `lang_code` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb3;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`p_id`, `dup_id`, `title`, `description`, `category`, `image`, `user_id`, `lang_code`) VALUES
(37, 37, 'Weight Lifting', 'The two competition lifts in order are the snatch and the clean and jerk. The snatch is a wide-grip, one-move lift. The clean and jerk is a close-grip, two-move lift. The two competition lifts in order are the snatch and the clean and jerk. The snatch is a wide-grip, one-move lift.\r\nThe clean and jerk is a close-grip, two-move lift. The two competition lifts in order are the snatch and the clean and jerk. The snatch is a wide-grip, one-move lift.\r\n\r\n', 'Gymnastics', 'gymnastics2.jpg', 9, 'en'),
(38, 38, 'Let’s not judge our sports culture', 'This is one of the best times for Indian sports. India gave her best Olympics performance in several decades at Tokyo. In cricket, we remain one of the top ranked teams and the Tokyo Paralympics', 'Sports', 'sports3.jpg', 9, 'en'),
(39, 39, 'Delusions of grandeur.', '<p>It&rsquo;s a great idea. Take competitions with completely different judges. Plugin scores from competitions from the last 2 years and viola! Romania wins silver at the Olympics.</p>\r\n\r\n\r\n', 'Gymnastics', 'gymnastics.jpg', 9, 'en'),
(41, 41, 'Your EDM (Electronic Dance Music)', 'A source that is focused on covering Electronic Dance Music, Interviews, Music Reviews & EDM news. YourEDM is the most recognized publication in the world of Electronic Dance Music.', 'Music', 'music.jpg', 11, 'en'),
(42, 42, 'IPL Mega auction – Who will be retained', 'The Indian Premier League (IPL) is set to see two new teams added to the competition', 'Sports', 'sports2.jpg', 11, 'en'),
(43, 43, 'Serious Eats', 'Here is a packed food and drink award-winning culinary website that began life in 2006, “a leading resource for all food and drink”. ', 'Food', 'food2.jpg', 9, 'en'),
(44, 44, 'Tokyo to Paris in 1000 days', 'For one Neeraj Chopra Gold, there would have been thousands who made efforts, had dreams and aspirations but got lost into the anonymity of despair and disapproval. ', 'Sports', 'sports4.jpg', 9, 'en'),
(45, 45, 'Trap Music Blog', 'Your source for all things trap music, EDM, hip hop news, club music, 808 bass music & everything in between. A new order for underground music and culture.', 'Music', 'music2.jpg', 11, 'en'),
(48, 48, 'How Innovative Ideas Arise', 'Thwaites had assumed the toaster would be a relatively simple machine. By the time he was finished deconstructing it, however, there were more than 400 components laid out on his floor. The toaster contained over 100 different materials with three of the primary ones being plastic, nickel, and steel.', 'Food', 'food2.jpg', 9, 'en'),
(49, 49, 'Aquarium Drunkard', 'Aquarium Drunkard is an music blog with reviews, interviews, features, mp3 samples and sessions. It accepts all sorts of submissions and covers contemporary sounds with vintage garage, psych, folk, country, soul, funk, R&B and everything that falls in between.', 'Music', 'music2.jpg', 9, 'en'),
(52, 37, ' भारोत्तोलन', 'स्नैच और क्लीन एंड जर्क क्रम में दो प्रतियोगिता लिफ्ट हैं। स्नैच एक वाइड-ग्रिप, वन-मूव लिफ्ट है। क्लीन एंड जर्क एक क्लोज-ग्रिप, टू-मूव लिफ्ट है। स्नैच और क्लीन एंड जर्क क्रम में दो प्रतियोगिता लिफ्ट हैं। स्नैच एक वाइड-ग्रिप, वन-मूव लिफ्ट है।\r\nक्लीन एंड जर्क एक क्लोज-ग्रिप, टू-मूव लिफ्ट है। स्नैच और क्लीन एंड जर्क क्रम में दो प्रतियोगिता लिफ्ट हैं। स्नैच एक वाइड-ग्रिप, वन-मूव लिफ्ट है।', 'Gymnastics', 'gymnastics2.jpg', 9, 'hi'),
(69, 39, ' भव्यता के भ्रम।', 'यह बहुत ही सुदर विचार है। पूरी तरह से अलग न्यायाधीशों के साथ प्रतियोगिताएं लें। पिछले 2 वर्षों की प्रतियोगिताओं से प्लगइन स्कोर और वायोला! रोमानिया ने ओलंपिक में रजत पदक जीता।', 'Gymnastics', 'gymnastics.jpg', 9, 'hi'),
(70, 38, ' आइए अपनी खेल संस्कृति को न आंकें', 'यह भारतीय खेलों के लिए सबसे अच्छे समय में से एक है। भारत ने कई दशकों में टोक्यो में अपना सर्वश्रेष्ठ ओलंपिक प्रदर्शन दिया। क्रिकेट में, हम शीर्ष क्रम वाली टीमों और टोक्यो पैरालिंपिक में से एक बने हुए हैं', 'Sports', 'sports3.jpg', 9, 'hi'),
(71, 41, ' आपका ईडीएम (इलेक्ट्रॉनिक नृत्य संगीत)', 'एक स्रोत जो इलेक्ट्रॉनिक नृत्य संगीत, साक्षात्कार, संगीत समीक्षा और ईडीएम समाचार को कवर करने पर केंद्रित है। YourEDM इलेक्ट्रॉनिक डांस म्यूजिक की दुनिया में सबसे ज्यादा मान्यता प्राप्त प्रकाशन है।', 'Music', 'music.jpg', 11, 'hi'),
(72, 42, ' आईपीएल मेगा नीलामी - किसे रिटेन किया जाएगा', '\r\nइंडियन प्रीमियर लीग (आईपीएल) प्रतियोगिता में दो नई टीमों को जोड़ने के लिए तैयार है', 'Sports', 'sports2.jpg', 11, 'hi'),
(73, 45, ' ट्रैप संगीत ब्लॉग', '\r\nसभी चीजों के लिए आपका स्रोत संगीत, ईडीएम, हिप हॉप समाचार, क्लब संगीत, 808 बास संगीत और बीच में सब कुछ ट्रैप करता है। भूमिगत संगीत और संस्कृति के लिए एक नया आदेश।', 'Music', 'music2.jpg', 11, 'hi'),
(74, 43, ' सीरियस ईट्स', '\r\nयहाँ एक पैक्ड फूड एंड ड्रिंक पुरस्कार विजेता पाक वेबसाइट है जिसने 2006 में जीवन शुरू किया, \"सभी खाद्य और पेय के लिए एक प्रमुख संसाधन\"।', 'Food', 'food2.jpg', 9, 'hi'),
(75, 44, ' 1000 दिनों में टोक्यो से पेरिस', 'एक नीरज चोपड़ा गोल्ड के लिए, हजारों लोग होंगे जिन्होंने प्रयास किए, सपने और आकांक्षाएं थीं लेकिन निराशा और अस्वीकृति की गुमनामी में खो गए।', 'Sports', 'sports4.jpg', 9, 'hi'),
(76, 48, ' कैसे अभिनव विचार उत्पन्न होते हैं', '\r\nथ्वाइट्स ने मान लिया था कि टोस्टर अपेक्षाकृत सरल मशीन होगी। जब तक उन्होंने इसका पुनर्निर्माण समाप्त किया, तब तक, उनके फर्श पर 400 से अधिक घटक रखे गए थे। टोस्टर में 100 से अधिक विभिन्न सामग्रियां थीं जिनमें से तीन प्राथमिक प्लास्टिक, निकल और स्टील हैं।', 'Food', 'food2.jpg', 9, 'hi'),
(77, 49, ' एक्वेरियम शराबी', '\r\nएक्वेरियम ड्रंकार्ड एक संगीत ब्लॉग है जिसमें समीक्षाएं, साक्षात्कार, विशेषताएं, एमपी3 नमूने और सत्र हैं। यह सभी प्रकार की प्रस्तुतियाँ स्वीकार करता है और विंटेज गैरेज, मनोविज्ञान, लोक, देश, आत्मा, दुर्गंध, आर एंड बी और बीच में आने वाली हर चीज के साथ समकालीन ध्वनियों को शामिल करता है।', 'Music', 'music2.jpg', 9, 'hi');

-- --------------------------------------------------------

--
-- Table structure for table `reset_password`
--

CREATE TABLE `reset_password` (
  `id` int NOT NULL,
  `reset_email` text NOT NULL,
  `tokenAuth` text NOT NULL,
  `tokenValidator` longtext NOT NULL,
  `expire_time` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `reset_password`
--

INSERT INTO `reset_password` (`id`, `reset_email`, `tokenAuth`, `tokenValidator`, `expire_time`) VALUES
(16, 'hadavol942@ergowiki.com', '83c8a21cd8acd158', '$2y$10$dPZzsZG1I1ACzYKmeT8w7.NnMc4ygLBEsjJoPUni0WAFFnBNzDh8q', '1632882765');

-- --------------------------------------------------------

--
-- Table structure for table `subscribe`
--

CREATE TABLE `subscribe` (
  `id` int NOT NULL,
  `user_email` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `subscribe`
--

INSERT INTO `subscribe` (`id`, `user_email`) VALUES
(1, 'vivekbadkar25@gmail.com'),
(2, 'vivekbadkar@gmail.com');

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
-- Indexes for table `contact_info`
--
ALTER TABLE `contact_info`
  ADD PRIMARY KEY (`id`);

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
-- Indexes for table `reset_password`
--
ALTER TABLE `reset_password`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id`);

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
  MODIFY `cat_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `contact_info`
--
ALTER TABLE `contact_info`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `languages`
--
ALTER TABLE `languages`
  MODIFY `lang_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `likes`
--
ALTER TABLE `likes`
  MODIFY `like_id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `login`
--
ALTER TABLE `login`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `p_id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=78;

--
-- AUTO_INCREMENT for table `reset_password`
--
ALTER TABLE `reset_password`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

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
