-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 19, 2021 at 06:57 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sem_4`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender_username` varchar(255) NOT NULL,
  `receiver_username` varchar(255) NOT NULL,
  `message` varchar(280) NOT NULL,
  `seen` int(1) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender_username`, `receiver_username`, `message`, `seen`, `time`) VALUES
(1, 'henil_mehta', 'jay_mehta', 'sdf', 1, '2021-02-16 17:25:23'),
(2, 'henil_mehta', 'jay_mehta', 'gjhgjhgj', 1, '2021-02-16 17:25:31'),
(3, 'henil_mehta', 'jay_mehta', 'ghj', 1, '2021-02-16 17:25:40'),
(4, 'Mahendra_mehta', 'henil_mehta', 'helo', 1, '2021-02-16 17:25:55'),
(5, 'Mahendra_mehta', 'henil_mehta', 'helo', 1, '2021-02-16 17:25:55'),
(6, 'henil_mehta', 'Mahendra_mehta', 'bruuh', 1, '2021-02-16 17:26:52'),
(7, 'henil_mehta', 'Mahendra_mehta', 'hwello', 1, '2021-02-16 18:15:06'),
(8, 'henil_mehta', 'Mahendra_mehta', 'how areyou ', 1, '2021-02-16 18:15:16'),
(9, 'henil_mehta', 'Mahendra_mehta', 'i am fine what about you ', 1, '2021-02-16 18:15:43'),
(10, 'henil_mehta', 'Mahendra_mehta', 'hello  !!!!', 1, '2021-02-16 18:16:09'),
(11, 'henil_mehta', 'Mahendra_mehta', 'gg', 1, '2021-02-16 18:17:01'),
(12, 'henil_mehta', 'jay_mehta', 'helo ', 1, '2021-02-18 09:53:25'),
(13, 'henil_mehta', 'jay_mehta', 'helo ', 1, '2021-02-18 09:53:27'),
(14, 'jay_mehta', 'henil_mehta', 'hello msmmmmm', 1, '2021-02-18 09:55:07'),
(15, 'jay_mehta', 'henil_mehta', 'hiiii ', 1, '2021-02-18 09:55:35'),
(16, 'jay_mehta', 'henil_mehta', 'hiiii ', 1, '2021-02-18 09:55:40'),
(17, 'jay_mehta', 'henil_mehta', 'hellllllllalalalalalalalalalalalalalalalalalalalaa', 1, '2021-02-18 09:56:12'),
(18, 'henil_mehta', 'jay_mehta', 'lhfdshfkdshf', 1, '2021-02-18 09:56:30'),
(19, 'henil_mehta', 'jay_mehta', 'Henil Mehta this side ', 1, '2021-02-22 06:55:24'),
(20, 'henil_mehta', 'jay_mehta', 'How are you ?', 1, '2021-02-22 06:55:34'),
(21, 'henil_mehta', 'jay_mehta', 'where are you from ', 1, '2021-02-22 06:55:44'),
(22, 'henil_mehta', 'jay_mehta', 'How\"s your work goind on ?', 1, '2021-02-22 06:56:30'),
(23, 'Mahendra_mehta', 'henil_mehta', 'hows your day ', 1, '2021-02-22 07:01:09'),
(24, 'Mahendra_mehta', 'henil_mehta', 'My day is as usual and do know how the day My going on', 1, '2021-02-22 07:05:25'),
(25, 'henil_mehta', 'jay_mehta', 'hello maam ', 1, '2021-02-25 15:23:35'),
(26, 'henil_mehta', 'jay_mehta', 'hiiii', 1, '2021-02-25 15:23:48'),
(27, 'henil_mehta', 'Mahendra_mehta', 'hekjhks', 1, '2021-02-25 15:24:31'),
(28, 'henil_mehta', 'jay_mehta', 'Henil Mehta this side', 1, '2021-03-03 18:09:49'),
(29, 'henil_mehta', 'jay_mehta', 'heelooo', 1, '2021-03-03 18:11:47'),
(30, 'henil_mehta', 'jay_mehta', 'heelooo', 1, '2021-03-03 18:11:49'),
(31, 'henil_mehta', 'jay_mehta', 'shadkl fhalksdh fjksdh aklfasdklhf klsdafasdfsd  afasd a afsad as asd', 1, '2021-03-03 18:17:22'),
(32, 'henil_mehta', 'Mahendra_mehta', 'hjkldh jkhsd jkfhkasdhfksdahflkjsdahflksd hfklsd fklasdkl ksdah kfl sdfh ksaj hfkas fkasd fklasdh kf hsdkf sdkf kasd fksd afk adsdf kasd fk daskf ak fkalhjkldh jkhsd jkfhkasdhfksdahflkjsdahflksd hfklsd fklasdkl ksdah kfl sdfh ksaj hfkas fkasd fklasdh kf hsdkf sdkf kasd fksd afk a', 1, '2021-03-03 22:20:31'),
(33, 'henil_mehta', 'Mahendra_mehta', 'hjkldh jkhsd jkfhkasdhfksdahflkjsdahflksd hfklsd fklasdkl ksdah kfl sdfh ksaj hfkas fkasd fklasdh kf hsdkf sdkf kasd fksd afk adsdf kasd fk daskf ak fkalhjkldh jkhsd jkfhkasdhfksdahflkjsdahflksd hfklsd fklasdkl ksdah kfl sdfh ksaj hfkas fkasd fklasdh kf hsdkf sdkf kasd fksd afk a', 1, '2021-03-03 22:20:51'),
(34, 'jay_mehta', 'henil_mehtaas', 'Hello Henil Mehta I am jay ', 1, '2021-03-04 05:26:31'),
(35, 'henil_mehtaas', 'jay_mehta', 'Yes jay whats your dought please let me know', 1, '2021-03-04 05:42:01'),
(36, 'jay_mehta', 'henil_mehtaas', 'I have dought in php ajax ', 1, '2021-03-04 05:42:20'),
(37, 'henil_mehtaas', 'jay_mehta', 'ok can you breif? please', 1, '2021-03-04 05:42:51'),
(38, 'jay_mehta', 'henil_mehtaas', 'My load function is not been working can you please see my code ?', 1, '2021-03-04 05:43:24'),
(39, 'jay_mehta', 'henil_mehtaas', 'My load function is not been working can you please see my code ?', 1, '2021-03-04 05:43:24'),
(40, 'henil_mehtaas', 'jay_mehta', 'Yes sure we are here for that only share it ', 1, '2021-03-04 05:43:50'),
(41, 'jay_mehta', 'henil_mehtaas', 'yes sir thanks for that', 1, '2021-03-04 06:00:39'),
(42, 'henil_mehtaas', 'jay_mehta', 'Welcome student ', 1, '2021-03-04 06:00:56'),
(43, 'henil_mehtaas', 'jay_mehta', 'Share me your dought full error', 1, '2021-03-04 06:02:20'),
(44, 'henil_mehtaas', 'Mahendra_mehta', 'hello sir ', 1, '2021-03-04 06:05:13'),
(45, 'henil_mehtaas', 'jay_mehta', 'please do it soon ', 1, '2021-03-04 06:06:52'),
(46, 'jay_mehta', 'henil_mehtaas', 'Yes sir shareing it soon ', 1, '2021-03-04 06:08:31'),
(47, 'Mahendra_mehta', 'henil_mehtaas', 'hello student ', 1, '2021-03-04 06:09:45'),
(48, 'Mahendra_mehta', 'henil_mehtaas', 'yes student whats your dought ', 1, '2021-03-04 06:09:59'),
(49, 'henil_mehtaas', 'Mahendra_mehta', 'Nothing sir but their is a problem in my code can you please solve it ?', 1, '2021-03-04 06:10:52'),
(50, 'Mahendra_mehta', 'henil_mehtaas', 'ok share the code please', 1, '2021-03-04 06:11:21'),
(51, 'henil_mehtaas', 'Mahendra_mehta', 'success: function(data) {                      if(data == ){     window.location = login_main.php; }', 1, '2021-03-04 06:11:53'),
(52, 'Mahendra_mehta', 'henil_mehtaas', 'ok wait for a while ', 1, '2021-03-04 06:12:26'),
(53, 'Mahendra_mehta', 'henil_mehtaas', 'ok wait for a while ', 1, '2021-03-04 06:12:27'),
(54, 'henil_mehta', 'henil_mehtaas', 'Hello Man', 1, '2021-03-18 05:35:51'),
(55, 'henil_mehta', 'jay_mehta', 'Hello maaannnnn', 1, '2021-03-18 06:50:55'),
(56, 'henil_mehta', 'jay_mehta', 'hello', 1, '2021-03-18 06:53:08'),
(57, 'jay_mehta', 'henil_mehta', 'hi how are you', 1, '2021-03-18 06:53:27'),
(58, 'henil_mehta', 'henil_mehtaas', 'lahfkjhashk', 1, '2021-03-18 06:53:57'),
(59, 'jay_mehta', 'henil_mehtaas', 'hello maan', 1, '2021-03-18 13:33:23'),
(60, 'henil_mehta', 'jay_mehta', 'hello', 1, '2021-03-18 15:39:39'),
(61, 'henil_mehta', 'jay_mehta', 'hello maaam', 1, '2021-03-18 15:48:33');

-- --------------------------------------------------------

--
-- Table structure for table `playlist`
--

CREATE TABLE `playlist` (
  `id` int(11) NOT NULL,
  `uploader_username` varchar(255) NOT NULL,
  `playlist_title` varchar(255) NOT NULL,
  `video_title` varchar(255) NOT NULL,
  `heading` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `language` varchar(20) NOT NULL,
  `date_time` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `playlist`
--

INSERT INTO `playlist` (`id`, `uploader_username`, `playlist_title`, `video_title`, `heading`, `description`, `language`, `date_time`) VALUES
(11, 'Henil Mehta', 'Hello Playlist ', '5298.mp4', 'Hello titile ', 'dafhdsa hfjkldsh fksdaf haksd fklasd hfkl asdklfh asdklfh asdkfhasdhfkjasdh fklahfkdha', 'php', '2021-03-18 05:35:06'),
(12, 'Henil Mehta', 'Playlist ', '5125.mp4', 'mfkadfasd f df ', 'sdh fjklsdh fkljsdahf kdasdkjfhklsdf kasd fkasd fkhasdfhasdkjf sdsd fsdfsd fsd fsd fsd fsd fsdf sdf sdfa ff dsaf safasd fasdf asdf asdfasdf asdf asf safasd f', 'php', '2021-03-18 06:39:27'),
(13, 'Henil Mehta', 'Playlist ', '5483.mp4', 'kjfksdhfkljasdhfkjsdakfj sd', 'hkjsh jksdfh kjsd fksdhfkdh kfh asdkjlfh kasdhfklasdhfsdfasdkljfh laksdhf', 'php', '2021-03-18 06:39:42'),
(14, 'Henil Mehta', 'SAFASDFASDF', '5851.mp4', 'fsdjhfklasfhdkash f', 'FKLJASH FJKDHSFKHSD AKF', 'php', '2021-03-18 07:25:01'),
(15, 'Henil Mehta', 'jlskadjflkasd', '5771.mp4', 'jhdsgfjsgdf', 'hsdkjfhdskjfh fsdfdsfsfsdfsfsdf', 'php', '2021-03-18 07:47:33');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `fullname` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `contact` varchar(11) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(15) NOT NULL,
  `profile_pic` varchar(255) NOT NULL,
  `activity` varchar(15) NOT NULL,
  `entry` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `fullname`, `username`, `email`, `contact`, `password`, `role`, `profile_pic`, `activity`, `entry`) VALUES
(1, 'Henil Mehta', 'henil_mehtaas', 'henilpic@gmail.com', '9925905612', '$2y$10$MwQByhgQrzPK0s3JUIHs2eogQckznB8lMHvfSelhPJkALh4T.5qPa', 'tutor', '60407682c25be6.89159262.jpg', 'Offline', '0000-00-00 00:00:00'),
(2, 'Jay Mehta', 'jay_mehta', 'jay@gmail.com', '9409123330', '$2y$10$lkz.OzqwCII9M5UAuBahNO4dzHWIurwYL9oRunZQexc6UhhzMhRHu', 'learner', '6053053e58d848.81592121.jpg', 'Offline', '0000-00-00 00:00:00'),
(3, 'Mahendra Mehta ', 'Mahendra_mehta', 'mahendra@gmail.com', '9913884806', '$2y$10$9W9btBMwqQq24vG4nunTYOqwHnUEp2eovmODGgxTvfqY.dtYI9EMC', 'tutor', '603355d03fc4e2.03191502.jpg', 'Online', '0000-00-00 00:00:00'),
(4, 'Henil Mehta', 'henil_mehtaksjdh', 'he@gmail.com', '9925905631', '$2y$10$38U/X6Dz871K0Z2d4lXmNeYm2iceiG6XpcFT457iyJO.C0MMEM5Z6', 'tutor', '6037c34714c157.43191448.jpg', 'Offline', '0000-00-00 00:00:00'),
(5, 'Henil Mehta', 'henil_mehta', 'henilpica@gmail.com', '9541254125', '$2y$10$W3XI93OJmZz4BMvGU9inTOkBKEFs/j.Hb3KJwaH3QAv4T4vGpPAse', 'tutor', '', 'Online', '0000-00-00 00:00:00'),
(7, 'Neel', 'Neel_parmar', 'neel@gmail.com', '6548754875', '$2y$10$a2FgbWsc/pvQ9GyN7WU4Qu5u9ThsF3hyrut1T5HwwHLUUUTXUc8de', 'learner', '', '', '2021-03-04 05:13:27'),
(8, 'asdf', 'asdfasdf', 'asdfafadsf@gmail.com', '1234567891', '$2y$10$4QrocCUy/In5jd0VxVLj3OfcnytX0p17WWNKksyeaSFkQFq0atHaC', 'learner', '', '', '2021-03-04 05:14:14'),
(9, 'jay mehta', 'henil_mehta', 'henilpica@gmail.com', '9925905639', '$2y$10$u28WcELBS9u0RoODKmTIcOVCtiiKXrjAo63YLrzOR4NrLL7sfCqNa', 'learner', '', '', '2021-03-04 05:38:51'),
(10, 'Garav', 'Gaurav_', 'gaurav@gmail.com', '6487548459', '$2y$10$GqgCdwfARBjUGlAiOdjjvOzr2.kMYdrP/Shl0jd3Ruzdp.hCzkl.u', 'learner', '', 'Online', '2021-03-04 05:47:53'),
(11, 'Gaurav', 'Gaurav_mishra', 'gaurav_mishra@gmail.com', '6487549545', '$2y$10$ITwNAi6hWCefgwIFNeJ8eOzONBLP6HAHczTOHKVsfS84p8/mw/Vi2', 'learner', '', 'Online', '2021-03-04 05:49:23'),
(12, 'Henil Mehta', 'henil_1708', 'henilpica@gmail.com', '9925905611', '$2y$10$nvCDGpX65S4QBjxkGHWyZe9kGKAVhUAwIjv4SS5LEHcR8NRStPnaS', 'tutor', '', '', '2021-03-16 16:20:13');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `playlist`
--
ALTER TABLE `playlist`
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
-- AUTO_INCREMENT for table `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `playlist`
--
ALTER TABLE `playlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
