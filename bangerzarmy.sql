-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Nov 14, 2018 at 12:25 PM
-- Server version: 5.7.24-0ubuntu0.18.04.1
-- PHP Version: 5.6.38-3+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bangerzarmy`
--

-- --------------------------------------------------------

--
-- Table structure for table `beats`
--

CREATE TABLE `beats` (
  `beat_id` int(11) NOT NULL,
  `beat_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `beat_description` text COLLATE utf8_unicode_ci,
  `beat_graph_art` text COLLATE utf8_unicode_ci,
  `beat_file` text COLLATE utf8_unicode_ci NOT NULL,
  `beat_type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beat_key` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beat_bpm` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `uploaded_by` int(11) NOT NULL,
  `beat_featured` enum('yes','no') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'no',
  `create_dt` datetime NOT NULL,
  `modify_dt` datetime NOT NULL,
  `category_id` text COLLATE utf8_unicode_ci,
  `beat_tag` text COLLATE utf8_unicode_ci,
  `status` enum('active','deactive') COLLATE utf8_unicode_ci NOT NULL,
  `created_by` int(11) NOT NULL,
  `search_field` text COLLATE utf8_unicode_ci
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `beats`
--

INSERT INTO `beats` (`beat_id`, `beat_name`, `beat_description`, `beat_graph_art`, `beat_file`, `beat_type`, `beat_key`, `beat_bpm`, `uploaded_by`, `beat_featured`, `create_dt`, `modify_dt`, `category_id`, `beat_tag`, `status`, `created_by`, `search_field`) VALUES
(7, 'Beats1', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>I finally get to share some of my signature samples in a big way with my community of producers in this sample pack. These samples focus mostly on my drums, 808s, percussion and FX. The majority of them are my go-to sounds right now for creating punchy trap or future tracks. I&rsquo;ve pulled my drum, FX and synth samples from my most popular tracks and a couple of unreleased ones as well so you should recognize most of them if you&rsquo;re familiar with my productions. I&rsquo;ve relied greatly on sample packs like this that other friends and producers have shared so I&rsquo;m happy to give back. We are all pushing each other to grow and get better with our work.&nbsp;</p>\r\n</body>\r\n</html>', 'http://beatsupply.coregensolution.com/uploads/beats/7262858614_8f351b9046_o.jpg', 'http://beatsupply.coregensolution.com/uploads/beats/Daniel_Birch_-_09_-_Start_As_You_Mean_To_Go_On1.mp3', '', 'F', '107', 3, 'yes', '2018-05-21 05:45:41', '2018-06-25 08:14:17', '[\"classical\",\"country\",\"dance\"]', '[\"bass\",\"drurms\",\"hip-hop\"]', 'active', 0, '{\"beat_name\":\"Beats1\",\"category\":\"[\\\"classical\\\",\\\"country\\\",\\\"dance\\\"]\",\"tag\":\"[\\\"bass\\\",\\\"drurms\\\",\\\"hip-hop\\\"]\",\"beat_bpm\":\"107\",\"beat_key\":\"F\",\"producer\":\"Josephine Darakjy\"}'),
(8, 'Beats2', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>\r\n</body>\r\n</html>', 'http://beatsupply.coregensolution.com/uploads/beats/flageoline24.jpg', 'http://beatsupply.coregensolution.com/uploads/beats/Blue_Dot_Sessions_-_02_-_UpUpUp_and_Over3.mp3', '', 'A', '130', 3, 'yes', '2018-05-24 08:58:28', '2018-06-25 08:16:19', '[\"blues\",\"comedy\"]', '[\"bass\",\"hip-hop\"]', 'active', 0, '{\"beat_name\":\"Beats2\",\"category\":\"[\\\"blues\\\",\\\"comedy\\\"]\",\"tag\":\"[\\\"bass\\\",\\\"hip-hop\\\"]\",\"beat_bpm\":\"130\",\"beat_key\":\"A\",\"producer\":\"Josephine Darakjy\"}'),
(9, 'KRANE', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>I finally get to share some of my signature samples in a big way with my community of producers in this sample pack. These samples focus mostly on my drums, 808s, percussion and FX. The majority of them are my go-to sounds right now for creating punchy trap or future tracks. I&rsquo;ve pulled my drum, FX and synth samples from my most popular tracks and a couple of unreleased ones as well so you should recognize most of them if you&rsquo;re familiar with my productions. I&rsquo;ve relied greatly on sample packs like this that other friends and producers have shared so I&rsquo;m happy to give back. We are all pushing each other to grow and get better with our work.</p>\r\n</body>\r\n</html>', 'http://beatsupply.coregensolution.com/uploads/beats/rosegold_V2.png', 'http://beatsupply.coregensolution.com/uploads/beats/Daniel_Birch_-_09_-_Start_As_You_Mean_To_Go_On.mp3', '', 'C', '115', 3, 'yes', '2018-06-01 08:18:08', '2018-06-25 08:17:27', '[\"classical\",\"comedy\"]', '[\"drurms\",\"kicks\",\"synth\",\"trap\"]', 'active', 3, '{\"beat_name\":\"KRANE\",\"category\":\"[\\\"classical\\\",\\\"comedy\\\"]\",\"tag\":\"[\\\"drurms\\\",\\\"kicks\\\",\\\"synth\\\",\\\"trap\\\"]\",\"beat_bpm\":\"115\",\"beat_key\":\"C\",\"producer\":\"Josephine Darakjy\"}'),
(10, 'TT The Artist - Club Queen Vocal Sample Pack', '\r\n<p>Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source.</p>\r\n', 'http://beatsupply.coregensolution.com/uploads/beats/watercolor-word-art1.jpg', 'http://beatsupply.coregensolution.com/uploads/beats/13_Dramatic_Into1.mp3', NULL, '102', '102', 4, 'yes', '2018-08-08 09:28:37', '2018-08-08 12:36:30', '[\"classical\",\"comedy\",\"country\"]', '[\"bass\",\"drurms\",\"hip-hop\"]', 'active', 4, '{\"beat_name\":\"TT The Artist - Club Queen Vocal Sample Pack\",\"category\":\"[\\\"classical\\\",\\\"comedy\\\",\\\"country\\\"]\",\"tag\":\"[\\\"bass\\\",\\\"drurms\\\",\\\"hip-hop\\\"]\",\"beat_bpm\":\"102\",\"beat_key\":\"102\",\"producer\":\"Donette Foller\"}'),
(11, 'SOPHIE Samples', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', 'http://beatsupply.coregensolution.com/uploads/beats/Stormy_waves-copy3.jpg', 'http://beatsupply.coregensolution.com/uploads/beats/06b_Instrumental_Theme_06_(Version_2).mp3', NULL, '102', '102', 4, 'yes', '2018-08-08 12:58:10', '2018-08-08 12:58:10', '[\"blues\",\"classical\",\"comedy\",\"country\"]', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\"]', 'active', 4, '{\"beat_name\":\"SOPHIE Samples\",\"category\":\"[\\\"blues\\\",\\\"classical\\\",\\\"comedy\\\",\\\"country\\\"]\",\"tag\":\"[\\\"bass\\\",\\\"drurms\\\",\\\"hip-hop\\\",\\\"kicks\\\"]\",\"beat_bpm\":\"102\",\"beat_key\":\"102\",\"producer\":\"Donette Foller\"}'),
(12, 'Bighead Sample Pack', 'It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English.', 'http://beatsupply.coregensolution.com/uploads/beats/watercolor-word-art1.jpg', 'http://beatsupply.coregensolution.com/uploads/beats/06b_Instrumental_Theme_06_(Version_2)1.mp3', NULL, '102', '102', 5, 'yes', '2018-08-08 13:12:42', '2018-08-08 14:48:07', '[\"comedy\",\"country\",\"dance\",\"electronic\"]', '[\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 5, '{\"beat_name\":\"Bighead Sample Pack\",\"category\":\"[\\\"comedy\\\",\\\"country\\\",\\\"dance\\\",\\\"electronic\\\"]\",\"tag\":\"[\\\"drurms\\\",\\\"hip-hop\\\",\\\"kicks\\\",\\\"synth\\\",\\\"trap\\\"]\",\"beat_bpm\":\"102\",\"beat_key\":\"102\",\"producer\":\"Simona Morasca\"}'),
(15, 'Party Beat', 'This is a great music for party lovers', 'http://beatsupply.coregensolution.com/uploads/beats/hqdefault2.jpg', 'http://beatsupply.coregensolution.com/uploads/beats/nature_ring.mp3', NULL, 'F', '107', 3, 'no', '2018-10-01 14:15:58', '2018-10-01 14:16:48', '[\"dance\",\"electronic\"]', '[\"bass\",\"drurms\",\"hip-hop\"]', 'active', 3, '{\"beat_name\":\"Party Beat\",\"category\":\"[\\\"dance\\\",\\\"electronic\\\"]\",\"tag\":\"[\\\"bass\\\",\\\"drurms\\\",\\\"hip-hop\\\"]\",\"beat_bpm\":\"107\",\"beat_key\":\"F\",\"producer\":\"Josephine Darakjy\"}');

-- --------------------------------------------------------

--
-- Table structure for table `beats_details`
--

CREATE TABLE `beats_details` (
  `beat_details_id` int(11) NOT NULL,
  `beat_id` int(11) NOT NULL,
  `beat_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beat_file_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beat_file` text COLLATE utf8_unicode_ci NOT NULL,
  `beat_type` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beat_key` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beat_bpm` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beat_tag` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `beat_status` enum('active','deactive') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'active',
  `created_by` int(11) NOT NULL,
  `create_dt` datetime DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `beats_details`
--

INSERT INTO `beats_details` (`beat_details_id`, `beat_id`, `beat_name`, `beat_file_name`, `beat_file`, `beat_type`, `beat_key`, `beat_bpm`, `beat_tag`, `beat_status`, `created_by`, `create_dt`) VALUES
(1, 7, 'SONNY_DBlue_Dot_Sessions_-_02_-_UpUpUp_and_Over_808_22_F', 'SONNY_DBlue_Dot_Sessions_-_02_-_UpUpUp_and_Over.mp3_808_22_F.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/SONNY_DBlue_Dot_Sessions_-_02_-_UpUpUp_and_Over_mp3_808_22_F.mp3', 'T', 'F', '106', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 3, '2018-06-01 06:39:37'),
(2, 7, 'Daniel_Birch_-_01_-_Sound_Of_Belonging', 'Daniel_Birch_-_01_-_Sound_Of_Belonging.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Daniel_Birch_-_01_-_Sound_Of_Belonging.mp3', 'T', 'F', '107', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 3, '2018-06-01 06:39:37'),
(3, 9, 'KRNE_Propane_Bamboo_Snare', 'KRNE_Propane_Bamboo_Snare.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/KRNE_Propane_Bamboo_Snare.mp3', 'T', 'F', '106', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 3, '2018-06-01 08:30:51'),
(4, 9, 'KRNE_Hold_Fast_Kick_Duo', 'KRNE_Hold_Fast_Kick_Duo.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/KRNE_Hold_Fast_Kick_Duo.mp3', 'T', 'F', '107', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 3, '2018-06-01 08:30:51'),
(5, 8, 'KRNE_Propane_Bamboo_Snare', 'KRNE_Propane_Bamboo_Snare.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/KRNE_Propane_Bamboo_Snare1.mp3', 'T', 'F', '106', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 3, '2018-06-01 08:42:40'),
(6, 8, 'KRNE_Hold_Fast_Kick_Duo', 'KRNE_Hold_Fast_Kick_Duo.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/KRNE_Hold_Fast_Kick_Duo1.mp3', 'T', 'F', '107', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 3, '2018-06-01 08:42:40'),
(7, 7, NULL, 'flute-fusion.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/flute-fusion.mp3', 'T', 'F', '106', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 3, '2018-06-14 06:44:27'),
(8, 7, NULL, 'Guitar-Ringtones-2.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Guitar-Ringtones-2.mp3', 'T', 'F', '107', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 3, '2018-06-14 06:44:27'),
(9, 7, NULL, 'Guitar-Ringtones-4.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Guitar-Ringtones-4.mp3', 'T', 'F', '108', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 3, '2018-06-14 06:44:27'),
(10, 7, NULL, 'Morning.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Morning.mp3', 'T', 'F', '109', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 3, '2018-06-14 06:44:27'),
(11, 7, NULL, 'Nice-Flute.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Nice-Flute.mp3', 'T', 'F', '110', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 3, '2018-06-14 06:44:27'),
(12, 7, NULL, 'Saxophone.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '111', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 3, '2018-06-14 06:44:27'),
(13, 10, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '106', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:36:43'),
(14, 10, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '107', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:36:43'),
(15, 10, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '108', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:36:43'),
(16, 10, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '109', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:36:43'),
(17, 10, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '110', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:36:43'),
(18, 10, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '111', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:36:43'),
(19, 10, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '112', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:36:43'),
(20, 10, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '113', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:36:43'),
(21, 10, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '114', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:36:43'),
(22, 10, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '115', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:36:43'),
(23, 10, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '116', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:36:43'),
(24, 10, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '117', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 02:00:00'),
(25, 10, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '118', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:36:43'),
(26, 10, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '119', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:36:43'),
(27, 10, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '120', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:36:43'),
(28, 10, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '121', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:36:43'),
(29, 10, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '122', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:36:43'),
(30, 11, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '106', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:58:43'),
(31, 11, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '107', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:58:43'),
(32, 11, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '108', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:58:43'),
(33, 11, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '109', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:58:43'),
(34, 11, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '110', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:58:43'),
(35, 11, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '111', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:58:43'),
(36, 11, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '112', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:58:43'),
(37, 11, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '113', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:58:43'),
(38, 11, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '114', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:58:43'),
(39, 11, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '115', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:58:43'),
(40, 11, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '116', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:58:43'),
(41, 11, 'Dramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '117', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:58:43'),
(42, 11, 'ramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '118', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:58:43'),
(43, 11, 'ramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '119', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:58:43'),
(44, 11, 'ramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '120', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:58:43'),
(45, 11, 'ramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '121', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:58:43'),
(46, 11, 'ramati_ Into.mp3', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/Saxophone.mp3', 'T', 'F', '122', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 4, '2018-08-08 12:58:43'),
(47, 12, 'Dramatic Intro', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/06b_Instrumental_Theme_06_(Version_2).mp3', 'T', 'F', '106', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 5, '2018-08-08 13:16:34'),
(48, 12, 'Dramatic Intro', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/06b_Instrumental_Theme_06_(Version_2).mp3', 'T', 'F', '107', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 5, '2018-08-08 13:16:34'),
(49, 12, 'Dramatic Intro', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/06b_Instrumental_Theme_06_(Version_2).mp3', 'T', 'F', '108', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 5, '2018-08-08 13:16:34'),
(50, 12, 'Dramatic Intro', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/06b_Instrumental_Theme_06_(Version_2).mp3', 'T', 'F', '109', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 5, '2018-08-08 13:16:34'),
(51, 12, 'Dramatic Intro', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/06b_Instrumental_Theme_06_(Version_2).mp3', 'T', 'F', '110', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 5, '2018-08-08 13:16:34'),
(52, 12, 'Dramatic Intro', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/06b_Instrumental_Theme_06_(Version_2).mp3', 'T', 'F', '111', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 5, '2018-08-08 13:16:34'),
(53, 12, 'Dramatic Intro', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/06b_Instrumental_Theme_06_(Version_2).mp3', 'T', 'F', '112', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 5, '2018-08-08 13:16:34'),
(54, 12, 'Dramatic Intro', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/06b_Instrumental_Theme_06_(Version_2).mp3', 'T', 'F', '113', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 5, '2018-08-08 13:16:34'),
(55, 12, 'Dramatic Intro', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/06b_Instrumental_Theme_06_(Version_2).mp3', 'T', 'F', '114', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 5, '2018-08-08 13:16:34'),
(56, 12, 'Dramatic Intro', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/06b_Instrumental_Theme_06_(Version_2).mp3', 'T', 'F', '115', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 5, '2018-08-08 13:16:34'),
(57, 12, 'Dramatic Intro', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/06b_Instrumental_Theme_06_(Version_2).mp3', 'T', 'F', '116', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 5, '2018-08-08 13:16:34'),
(58, 12, 'Dramatic Intro', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/06b_Instrumental_Theme_06_(Version_2).mp3', 'T', 'F', '117', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 5, '2018-08-08 13:16:34'),
(59, 12, 'Dramatic Intro', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/06b_Instrumental_Theme_06_(Version_2).mp3', 'T', 'F', '118', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 5, '2018-08-08 13:16:34'),
(60, 12, 'Dramatic Intro', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/06b_Instrumental_Theme_06_(Version_2).mp3', 'T', 'F', '119', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 5, '2018-08-08 13:16:34'),
(61, 12, 'Dramatic Intro', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/06b_Instrumental_Theme_06_(Version_2).mp3', 'T', 'F', '120', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 5, '2018-08-08 13:16:34'),
(62, 12, 'Dramatic Intro', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/06b_Instrumental_Theme_06_(Version_2).mp3', 'T', 'F', '121', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 5, '0000-00-00 00:00:00'),
(63, 12, 'Dramatic Intro', '13_Dramati_ Into.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/06b_Instrumental_Theme_06_(Version_2).mp3', 'T', 'F', '122', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 5, '2018-08-08 13:16:34'),
(64, 13, NULL, 'natures_music.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/natures_music.mp3', 'T', 'F', '106', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 3, '2018-10-01 13:44:20'),
(65, 13, NULL, 'party_ringtone.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/party_ringtone.mp3', 'T', 'F', '106', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 3, '2018-10-01 13:44:20'),
(66, 13, NULL, 'party_time.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/party_time.mp3', 'T', 'F', '106', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 3, '2018-10-01 13:44:20'),
(67, 14, NULL, 'SONNY_D_808_22_F.wav', '', 'T', 'F', '106', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 3, '2018-10-01 14:12:25'),
(68, 14, NULL, 'natures_music.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/natures_music2.mp3', 'T', 'F', '106', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 3, '2018-10-01 14:13:54'),
(69, 14, NULL, 'party_ringtone.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/party_ringtone2.mp3', 'T', 'F', '106', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 3, '2018-10-01 14:13:54'),
(70, 14, NULL, 'party_time.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/party_time2.mp3', 'T', 'F', '106', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 3, '2018-10-01 14:13:54'),
(71, 15, NULL, 'natures_music.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/natures_music3.mp3', 'T', 'F', '106', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 3, '2018-10-01 14:16:18'),
(72, 15, NULL, 'party_ringtone.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/party_ringtone3.mp3', 'T', 'F', '106', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 3, '2018-10-01 14:16:18'),
(73, 15, NULL, 'party_time.mp3', 'http://beatsupply.coregensolution.com/uploads/beats/subbeats/party_time3.mp3', 'T', 'F', '106', '[\"bass\",\"drurms\",\"hip-hop\",\"kicks\",\"synth\",\"trap\"]', 'active', 3, '2018-10-01 14:16:18');

-- --------------------------------------------------------

--
-- Table structure for table `beat_tags`
--

CREATE TABLE `beat_tags` (
  `tag_id` int(11) NOT NULL,
  `tag_name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tag_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `tag_img` text COLLATE utf8_unicode_ci,
  `create_dt` datetime NOT NULL,
  `created_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `beat_tags`
--

INSERT INTO `beat_tags` (`tag_id`, `tag_name`, `tag_slug`, `tag_img`, `create_dt`, `created_by`) VALUES
(1, 'Bass', 'bass', NULL, '2018-05-24 04:34:12', 1),
(2, 'Drurms', 'drurms', NULL, '2018-05-24 04:34:40', 1),
(3, 'hip hop', 'hip-hop', NULL, '2018-05-24 04:34:56', 1),
(4, 'kicks', 'kicks', NULL, '2018-05-24 04:35:15', 1),
(5, 'synth', 'synth', NULL, '2018-05-24 04:35:23', 1),
(6, 'trap', 'trap', NULL, '2018-05-24 04:35:32', 1);

-- --------------------------------------------------------

--
-- Table structure for table `category_master`
--

CREATE TABLE `category_master` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `cat_slug` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `cat_desc` text COLLATE utf8_unicode_ci,
  `cat_img` text COLLATE utf8_unicode_ci,
  `created_by` int(11) NOT NULL,
  `create_dt` datetime DEFAULT NULL,
  `status` enum('enable','disable') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'enable'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category_master`
--

INSERT INTO `category_master` (`cat_id`, `cat_name`, `cat_slug`, `cat_desc`, `cat_img`, `created_by`, `create_dt`, `status`) VALUES
(1, 'Blues', 'blues', '<p style=\"margin: 0px 0px 20px; padding: 0px; outline: 0px; border: 0px; background: #fefefe; vertical-align: baseline; font-size: 12px; color: #333333; font-family: Arial, Helvetica, Garuda, sans-serif;\">At its core, the blues has remained the same since its inception. Most blues feature simple, usually three-chord, progressions and have simple structures that are open to endless improvisations, both lyrical and musical.</p>\r\n<p style=\"margin: 0px 0px 20px; padding: 0px; outline: 0px; border: 0px; background: #fefefe; vertical-align: baseline; font-size: 12px; color: #333333; font-family: Arial, Helvetica, Garuda, sans-serif;\">Classic 12-bar country blues moved to the city in the black diaspora that accompanied the depression of the 30&rsquo;s, and as a result, gave us urban electric Blues.</p>\r\n<p style=\"margin: 0px 0px 20px; padding: 0px; outline: 0px; border: 0px; background: #fefefe; vertical-align: baseline; font-size: 12px; color: #333333; font-family: Arial, Helvetica, Garuda, sans-serif;\">Soon there were jump blues, which became Rhythm &rsquo;n&rsquo; Blues, which then crossed over into Rock &rsquo;n&rsquo; Roll. Then Gospel got a taste of the &lsquo;Devil&rsquo;s music&rsquo;, and morphed into Soul.</p>\r\n<p style=\"margin: 0px 0px 20px; padding: 0px; outline: 0px; border: 0px; background: #fefefe; vertical-align: baseline; font-size: 12px; color: #333333; font-family: Arial, Helvetica, Garuda, sans-serif;\">Following the Civil War, the blues arose as &ldquo;a distillate of the African music brought over by slaves. Field hollers, ballads, church music and rhythmic dance tunes called jump-ups evolved into a music for a singer who would engage in call-and-response with his guitar. He would sing a line, and the guitar would answer it.&rdquo; By the 1890s the blues were sung in many of the rural areas of the South. And by 1910, the word &lsquo;blues&rsquo; as applied to the musical tradition was in fairly common use.</p>', 'http://beatsupply.coregensolution.com/uploads/category/6a920abc9697ccc40ec26b31ac0144431.jpg', 1, '2018-05-14 06:25:30', 'enable'),
(2, 'Classical', 'classical', '<h2 style=\"margin: 0px 0px 0.6em; padding: 0px; outline: 0px; border: 0px; background: #fefefe; vertical-align: baseline; font-size: 15px; font-weight: normal; line-height: 1em; color: #333333; font-family: Arial, Helvetica, Garuda, sans-serif;\"><strong>Medieval Classical Music</strong></h2>\r\n<p style=\"margin: 0px 0px 20px; padding: 0px; outline: 0px; border: 0px; background: #fefefe; vertical-align: baseline; font-size: 12px; color: #333333; font-family: Arial, Helvetica, Garuda, sans-serif;\">When we explore Medieval music, we are dealing with the longest and most distant period of musical history. It includes the Gregorian chant. Gregorian chant is monophonic, meaning music that consists of only one melodic line without accompaniment. Polyphony, music where two or more melodic lines are heard simultaneously, did not exist (or was not knotted) until the 11th century. Unlike chant, polyphony required the participation of a composer to combine the melodic lines in a pleasing manner. I don&rsquo;t know much about this period because I don&rsquo;t like this kind of music.</p>\r\n<h2 style=\"margin: 0px 0px 0.6em; padding: 0px; outline: 0px; border: 0px; background: #fefefe; vertical-align: baseline; font-size: 15px; font-weight: normal; line-height: 1em; color: #333333; font-family: Arial, Helvetica, Garuda, sans-serif;\"><strong>Renaissance Classical Music</strong></h2>\r\n<p style=\"margin: 0px 0px 20px; padding: 0px; outline: 0px; border: 0px; background: #fefefe; vertical-align: baseline; font-size: 12px; color: #333333; font-family: Arial, Helvetica, Garuda, sans-serif;\">In the mid-1500s, a prominent bishop commented that music composed for the church should reflect the meaning of the words so that the listeners would be moved to piety. This concept seems like a no-brainer today, but it was a fairly new idea at the time. To suggest that Medieval composers had no desire to write &ldquo;expressive&rdquo; music would be unfair. But, it was the rediscovery of ancient Greek ideals in the Renaissance that inspired many musicians to explore the eloquent possibilities of their art.</p>\r\n<p style=\"margin: 0px 0px 20px; padding: 0px; outline: 0px; border: 0px; background: #fefefe; vertical-align: baseline; font-size: 12px; color: #333333; font-family: Arial, Helvetica, Garuda, sans-serif;\">The increased value of individualism in the Renaissance is reflected by the changing role of the composer in society. Unlike most of their Medieval predecessors, the great masters of the Renaissance were revered in their own lifetimes.<br />Sacred music was still predominant, though secular music became more prevalent and more sophisticated. The repertory of instrumental music also began to expand significantly. New instruments were invented, including the clavichord and virginal (both keyboard instruments) and many existing instruments were improved.</p>', 'http://beatsupply.coregensolution.com/uploads/category/7262858614_8f351b9046_o.jpg', 1, '2018-05-14 07:50:24', 'enable'),
(3, 'Comedy', 'comedy', '<p><span style=\"color: #333333; font-family: Arial, Helvetica, Garuda, sans-serif; font-size: 12px; background-color: #fefefe;\">IF there is one man who can be singled out as the father of musical comedy as we know it today he is George M. Cohan. Musicals like Little Johnny Jones (1904) and Forty-Five Minutes from Broadway (1906) were neither extravaganza nor burlesque, neither operetta nor revue. This was a completely new form, combining some of the elements of all these branches of our musical theater.</span></p>', 'http://beatsupply.coregensolution.com/uploads/category/learn-english-tv-2-3.jpg', 1, '2018-05-14 07:53:12', 'enable'),
(4, 'Country', 'country', '<p style=\"margin: 0px 0px 20px; padding: 0px; outline: 0px; border: 0px; background: #fefefe; vertical-align: baseline; font-size: 12px; color: #333333; font-family: Arial, Helvetica, Garuda, sans-serif;\">Although musicians had been recording fiddle tunes (known as Old Time Music at that time) in the southern Appalachians for several years, country music truly found its footing in the early 1920s. The first commercial recording of &ldquo;country music&rdquo; was &ldquo;Sallie Gooden&rdquo; by fiddlist A.C. (Eck) Robertson in 1922 for Victor Records.</p>\r\n<p style=\"margin: 0px 0px 20px; padding: 0px; outline: 0px; border: 0px; background: #fefefe; vertical-align: baseline; font-size: 12px; color: #333333; font-family: Arial, Helvetica, Garuda, sans-serif;\">Country music was a federation of styles, rather than a monolithic style. Its origins were lost in the early decades of colonization, when the folk dances (Scottish reels, Irish jigs, and square dances, the poor man&rsquo;s version of the French &ldquo;cotillion&rdquo; and &ldquo;quadrille&rdquo;) and the British ballad got transplanted into the new world and got contaminated by the religious hymns of church and camp meetings.</p>', 'http://beatsupply.coregensolution.com/uploads/category/flageoline24.jpg', 1, '2018-05-14 07:55:30', 'enable'),
(5, 'Dance', 'dance', '<p>I<span style=\"font-family: \'Open Sans\', Arial, sans-serif; font-size: 14px; text-align: justify;\">t is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using \'Content here, content here\', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for \'lorem ipsum\' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humor and the like).</span></p>', 'http://beatsupply.coregensolution.com/uploads/category/dance.jpg', 1, '2018-05-14 08:59:38', 'enable'),
(6, 'Electronic', 'electronic', '<p><span style=\"color: #333333; font-family: Arial, Helvetica, Garuda, sans-serif; font-size: 12px; background-color: #fefefe;\">Collins Dictionary: a form of music consisting of sounds produced by oscillating electric currents either controlled from an instrument panel or keyboard or prerecorded on magnetic tape.</span></p>', 'http://beatsupply.coregensolution.com/uploads/category/i8Mahm8.jpg', 1, '2018-05-14 09:01:15', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`comment_id`, `user_id`, `post_id`, `comment`, `date_added`) VALUES
(2, 1, 9, 'Hi, this is a comment. Thanks for this nice post. I like to see you blog. ', '2014-08-26 15:38:00'),
(3, 1, 9, 'Oh, thanks for reading this blog. Thanks for being with me.', '2014-08-26 15:39:05'),
(4, 1, 9, 'hello testing blogin\r\n', '2018-06-26 06:52:43'),
(5, 1, 9, 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old.', '2018-08-07 13:57:20');

-- --------------------------------------------------------

--
-- Table structure for table `contact_form`
--

CREATE TABLE `contact_form` (
  `contact_id` int(11) NOT NULL,
  `name` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `message` text COLLATE utf8_unicode_ci NOT NULL,
  `create_dt` datetime NOT NULL,
  `status` enum('enable','disable') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'enable'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `contact_form`
--

INSERT INTO `contact_form` (`contact_id`, `name`, `email`, `phone`, `message`, `create_dt`, `status`) VALUES
(1, 'Arghya', 'arghya.mitra@mailinator.com', '1221212222', 'testing', '2018-06-27 07:31:25', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `favorites`
--

CREATE TABLE `favorites` (
  `fav_id` int(11) NOT NULL,
  `beat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `beat_type` varchar(11) COLLATE utf8_unicode_ci NOT NULL,
  `favorite_array` text COLLATE utf8_unicode_ci,
  `status` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `favorites`
--

INSERT INTO `favorites` (`fav_id`, `beat_id`, `user_id`, `beat_type`, `favorite_array`, `status`) VALUES
(1, 1, 2, 'subbeat', '{\"2\":\"0\"}', 0),
(6, 2, 0, 'subbeat', '[\"0\"]', 0),
(7, 6, 3, 'subbeat', '{\"3\":\"1\"}', 1);

-- --------------------------------------------------------

--
-- Table structure for table `featured_subscription`
--

CREATE TABLE `featured_subscription` (
  `feat_ord_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `order_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `card_num` int(11) NOT NULL,
  `card_cvc` int(11) NOT NULL,
  `card_exp_month` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `card_exp_year` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `beat_id` int(11) NOT NULL,
  `beat_price` float NOT NULL,
  `price_currency` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount` float NOT NULL,
  `paid_currency` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `featured_subscription`
--

INSERT INTO `featured_subscription` (`feat_ord_id`, `name`, `email`, `user_id`, `order_id`, `card_num`, `card_cvc`, `card_exp_month`, `card_exp_year`, `beat_id`, `beat_price`, `price_currency`, `paid_amount`, `paid_currency`, `txn_id`, `payment_status`, `create_date`) VALUES
(3, 'josephine darakjy', 'josephinedarakjy@mailinator.com', 3, '20180625D312', 2147483647, 123, '06', '2019', 7, 5, 'usd', 500, 'usd', 'txn_1Cgsp7F7Pjsw26k1Q4KFFN6L', 'succeeded', '2018-06-25 06:25:33'),
(4, 'josephine darakjy', 'josephinedarakjy@mailinator.com', 3, '20180625E158', 2147483647, 123, '06', '2019', 7, 5, 'usd', 500, 'usd', 'txn_1CgstlF7Pjsw26k1a3yIu6W7', 'succeeded', '2018-06-25 06:30:22'),
(5, 'josephine darakjy', 'josephinedarakjy@mailinator.com', 3, '20180625131D', 2147483647, 123, '06', '2019', 7, 5, 'usd', 500, 'usd', 'txn_1CgsvKF7Pjsw26k1gaOLQWa7', 'succeeded', '2018-06-25 06:31:59');

-- --------------------------------------------------------

--
-- Table structure for table `general_settings`
--

CREATE TABLE `general_settings` (
  `settings_id` int(11) NOT NULL,
  `stripe_publishable_key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_secrete_key` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `stripe_client_id` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `download_price` float NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `general_settings`
--

INSERT INTO `general_settings` (`settings_id`, `stripe_publishable_key`, `stripe_secrete_key`, `stripe_client_id`, `download_price`) VALUES
(1, 'pk_test_hYJla09a6jrwrIRNUJkUuVFi', 'sk_test_f2utWAk8ieyHmZ8enW8WDWrB', 'ca_CrmZHRvZHZVbziaqIRFbEQjRvFxJzSnR', 1);

-- --------------------------------------------------------

--
-- Table structure for table `graphic_art`
--

CREATE TABLE `graphic_art` (
  `graphic_art_id` int(11) NOT NULL,
  `graphic_art_title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `graphic_art_img` text COLLATE utf8_unicode_ci NOT NULL,
  `cat_id` int(11) NOT NULL,
  `create_dt` datetime NOT NULL,
  `status` enum('enable','disable') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'enable',
  `created_by` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `graphic_art`
--

INSERT INTO `graphic_art` (`graphic_art_id`, `graphic_art_title`, `graphic_art_img`, `cat_id`, `create_dt`, `status`, `created_by`) VALUES
(2, 'A1', 'http://beatsupply.coregensolution.com/uploads/beats/71CjYk1FBmL__SY500_1.jpg', 2, '2018-05-17 04:26:24', 'enable', 1),
(3, 'A2', 'http://beatsupply.coregensolution.com/uploads/beats/Stormy_waves-copy3.jpg', 1, '2018-05-17 04:26:56', 'enable', 1),
(4, 'A3', 'http://beatsupply.coregensolution.com/uploads/beats/watercolor-word-art1.jpg', 6, '2018-05-17 04:27:22', 'enable', 1);

-- --------------------------------------------------------

--
-- Table structure for table `memberships`
--

CREATE TABLE `memberships` (
  `membership_id` int(11) NOT NULL,
  `title` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `duration` int(11) NOT NULL,
  `download_no` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `create_dt` datetime NOT NULL,
  `modify_dt` datetime DEFAULT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) DEFAULT NULL,
  `status` enum('enable','disable') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'enable'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `memberships`
--

INSERT INTO `memberships` (`membership_id`, `title`, `duration`, `download_no`, `price`, `create_dt`, `modify_dt`, `created_by`, `modified_by`, `status`) VALUES
(1, 'Basic', 30, 5, 40, '2018-05-09 04:47:02', '2018-05-09 06:46:01', 21, 21, 'disable'),
(4, 'Basic', 30, 5, 40, '2018-05-10 01:26:10', '2018-05-10 01:26:10', 21, 21, 'disable'),
(5, 'Premium', 30, 10, 60, '2018-05-10 01:26:30', '2018-05-10 01:26:30', 21, 21, 'disable'),
(6, 'Basic1', 30, 5, 40, '2018-05-10 01:43:38', '2018-06-08 07:30:41', 21, 1, 'disable'),
(7, 'Premium', 30, 10, 60, '2018-05-10 04:28:53', '2018-05-10 04:28:53', 21, 21, 'disable'),
(8, 'Basic', 30, 5, 40, '2018-06-08 07:33:58', '2018-06-08 07:33:58', 1, 1, 'enable'),
(9, 'Basic', 30, 5, 40, '2018-06-08 07:34:49', '2018-06-08 07:34:49', 1, 1, 'disable'),
(10, 'Premium', 30, 10, 60, '2018-06-08 07:35:38', '2018-06-08 07:35:38', 1, 1, 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `order_unique_id` varchar(150) NOT NULL,
  `order_date` datetime NOT NULL,
  `user_id` int(11) NOT NULL,
  `producer_id` int(11) NOT NULL,
  `beat_id` int(11) NOT NULL,
  `cat_id` text,
  `beat_type` varchar(15) NOT NULL,
  `price` float NOT NULL,
  `payment_status` varchar(100) DEFAULT NULL,
  `paid_amount` float DEFAULT NULL,
  `paid_currency` varchar(100) DEFAULT NULL,
  `txn_id` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `order_unique_id`, `order_date`, `user_id`, `producer_id`, `beat_id`, `cat_id`, `beat_type`, `price`, `payment_status`, `paid_amount`, `paid_currency`, `txn_id`) VALUES
(2, 'BS2018062607422', '2018-06-26 07:42:24', 2, 3, 8, '[\"blues\",\"comedy\"]', 'mainbeat', 0, 'success', 1, 'usd', NULL),
(3, 'BS2018062607424', '2018-06-26 07:42:45', 2, 3, 8, '[\"blues\",\"comedy\"]', 'mainbeat', 0, 'success', 1, 'usd', NULL),
(4, 'BS2018062607435', '2018-06-26 07:43:52', 2, 3, 8, '[\"blues\",\"comedy\"]', 'mainbeat', 0, 'success', 1, 'usd', NULL),
(5, 'BS2018062608270', '2018-06-26 08:27:02', 2, 3, 7, '[\"classical\",\"country\",\"dance\"]', 'mainbeat', 0, 'success', 1, 'usd', NULL),
(6, 'BS2018062706535', '2018-06-27 06:53:54', 2, 3, 7, '[\"classical\",\"country\",\"dance\"]', 'mainbeat', 0, 'success', 1, 'usd', NULL),
(7, 'BS2018062708032', '2018-06-27 08:03:23', 2, 3, 7, '[\"classical\",\"country\",\"dance\"]', 'mainbeat', 0, 'success', 1, 'usd', NULL),
(8, 'BS2018062708051', '2018-06-27 08:05:19', 2, 3, 7, '[\"classical\",\"country\",\"dance\"]', 'mainbeat', 0, 'success', 1, 'usd', NULL),
(9, 'BS2018070906510', '2018-07-09 06:51:06', 2, 3, 9, '[\"classical\",\"comedy\"]', 'mainbeat', 0, 'success', 1, 'usd', NULL),
(10, 'BS20180822121619', '2018-08-22 12:16:19', 2, 3, 8, '[\"blues\",\"comedy\"]', 'mainbeat', 1, 'success', 1, 'usd', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pages`
--

CREATE TABLE `pages` (
  `page_id` int(11) NOT NULL,
  `page` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `page_title` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `page_content` text COLLATE utf8_unicode_ci NOT NULL,
  `create_dt` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modify_dt` datetime NOT NULL,
  `meta_keyword` varchar(150) COLLATE utf8_unicode_ci NOT NULL,
  `meta_description` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `status` enum('enable','disable') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'enable'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `pages`
--

INSERT INTO `pages` (`page_id`, `page`, `page_title`, `page_content`, `create_dt`, `modify_dt`, `meta_keyword`, `meta_description`, `status`) VALUES
(1, 'About', 'About us', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec condimentum leo. Maecenas ligula sapien, efficitur quis odio a, suscipit rutrum nisl. Nulla finibus imperdiet nunc sed porttitor. Donec et purus metus. Vestibulum nec pharetra risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>\r\n<p>Donec quis aliquam ligula. Nunc ut lectus et dolor mollis tempus. Morbi blandit nibh sed ex commodo interdum. Mauris tempus et sapien eu maximus. Nunc quis turpis nisi. In consequat sit amet mauris sit amet tempor. Phasellus maximus ut sapien ac finibus. Donec convallis sapien facilisis mauris bibendum tempor.</p>\r\n<p>Quisque tempus maximus nisl sed egestas. Aliquam erat volutpat. Curabitur convallis id velit et faucibus. Pellentesque vehicula elit sit amet faucibus fringilla. Donec pulvinar nibh orci, nec consectetur risus finibus in. Nunc maximus arcu eu mauris tempor pretium. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse ut congue nisi. Nulla rhoncus neque in sapien suscipit, id commodo elit blandit. Vivamus ac euismod urna. Vestibulum et congue ante.</p>\r\n<p>Suspendisse eleifend condimentum felis, in porttitor nulla consequat vel. Integer eget pharetra libero, a condimentum erat. Nam facilisis erat justo, non varius ipsum interdum quis. Nullam fermentum turpis quis magna eleifend elementum. Aenean luctus rutrum pharetra. Quisque sagittis ac augue et auctor. Suspendisse consectetur a orci in accumsan. Duis mauris ipsum, placerat et faucibus tincidunt, suscipit et est. Suspendisse dapibus nulla risus, congue congue velit tincidunt eget. Phasellus condimentum convallis est in finibus. Duis fringilla laoreet nunc, id luctus nulla finibus vel. Donec viverra pellentesque tincidunt. Etiam dictum lectus a consectetur molestie.</p>\r\n<p>Curabitur ac ornare magna. Suspendisse convallis efficitur nibh, et ullamcorper magna lobortis semper. Donec vel risus mollis, tincidunt odio ut, vulputate ante. Phasellus fermentum nec urna et porta. Integer sagittis rhoncus justo ut gravida. Nullam convallis odio et libero cursus consectetur elementum sed augue. Praesent ac arcu odio. Sed in porttitor risus. Sed semper tellus eu felis efficitur accumsan. Mauris finibus sit amet enim id maximus. Integer mattis eget neque eget consequat. Vestibulum quis vehicula ex, eget pretium tortor.</p>\r\n</body>\r\n</html>', '2018-06-27 04:19:50', '2018-06-27 06:20:55', 'About us', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec condimentum leo. Maecenas ligula sapien, efficitur quis odio a, suscipit rutrum nisl. Nulla finibus imperdiet nunc sed porttitor. Donec et purus metus. Vestibulum nec pharetra risus. Lore', 'enable'),
(2, 'Contact', 'Contact us', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p>Nam auctor consequat ex, non dignissim velit. Maecenas tincidunt volutpat commodo.</p>\r\n<p><strong>Email :</strong> <a href=\"mailto:info@beatsupply.com\">info@beatsupply.com </a></p>\r\n<p><strong>Phone :</strong> <a href=\"tel:3332452934\">(333) 245 -2934</a></p>\r\n</body>\r\n</html>', '2018-06-27 04:19:50', '2018-06-27 08:47:57', '', '', 'enable'),
(3, 'Faqs', 'FAQs', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<div class=\"panel\">\r\n<h4 class=\"panel-title\"><a class=\"accordion-toggle\" href=\"#collapseOne\" data-toggle=\"collapse\" data-parent=\"#accordion\">Lorem ipsum dolor sit amet, consectetur adipiscing elit.</a></h4>\r\n<div id=\"collapseOne\" class=\"panel-collapse collapse show\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris eu sagittis felis. Nam a maximus nisl. Integer augue ante, bibendum et iaculis et, ultricies vitae lacus. Maecenas nec ornare est. Aliquam sollicitudin purus non dictum blandit. Quisque quis nisi mi. Etiam blandit, justo in bibendum pulvinar, nulla ante suscipit nisl, tempus pretium nulla mi non augue. Integer felis augue, consequat sed eros in, laoreet laoreet nisl. In hac habitasse platea dictumst.</div>\r\n</div>\r\n<div class=\"panel\">\r\n<h4 class=\"panel-title\"><a class=\"accordion-toggle collapsed\" href=\"#collapseTwo\" data-toggle=\"collapse\" data-parent=\"#accordion\">Sed euismod erat eu neque suscipit auctor.</a></h4>\r\n<div id=\"collapseTwo\" class=\"panel-collapse collapse\">Quisque varius odio in auctor condimentum. Duis pulvinar tempor consectetur. Donec libero est, imperdiet facilisis aliquet eget, mattis elementum felis. Vestibulum sollicitudin enim a hendrerit ullamcorper. Donec sit amet vulputate turpis. Donec ullamcorper sodales odio</div>\r\n</div>\r\n<div class=\"panel\">\r\n<h4 class=\"panel-title\"><a class=\"accordion-toggle collapsed\" href=\"#collapseThree\" data-toggle=\"collapse\" data-parent=\"#accordion\">Donec ultricies lacinia velit et bibendum.</a></h4>\r\n<div id=\"collapseThree\" class=\"panel-collapse collapse\">Morbi dui enim, rutrum eu ligula sit amet, volutpat posuere nulla. Nam rutrum non justo commodo efficitur. Pellentesque eget risus felis. Quisque quis massa auctor, faucibus turpis et, lobortis ipsum</div>\r\n</div>\r\n<div class=\"panel\">\r\n<h4 class=\"panel-title\"><a class=\"accordion-toggle collapsed\" href=\"#collapseFour\" data-toggle=\"collapse\" data-parent=\"#accordion\">Vivamus in ultrices metus.</a></h4>\r\n<div id=\"collapseFour\" class=\"panel-collapse collapse\">Vivamus in ultrices metus. Nam maximus ante eget mauris mollis, sed sagittis erat euismod. Curabitur volutpat ligula pulvinar lacinia venenatis. Curabitur nec leo arcu. Nullam et neque sed nisl ornare ornare.</div>\r\n</div>\r\n<div class=\"panel\">\r\n<h4 class=\"panel-title\"><a class=\"accordion-toggle collapsed\" href=\"#collapseFive\" data-toggle=\"collapse\" data-parent=\"#accordion\">Suspendisse nec lorem eget neque dapibus pharetra. </a></h4>\r\n<div id=\"collapseFive\" class=\"panel-collapse collapse\">Cras lorem orci, finibus non elementum ut, sagittis ac libero. Integer laoreet sagittis accumsan. Duis posuere orci ut libero efficitur, in fringilla mi sagittis. Aenean mattis turpis dolor, vitae congue urna gravida in. Mauris porta pharetra sagittis.</div>\r\n</div>\r\n<div class=\"panel\">\r\n<h4 class=\"panel-title\"><a class=\"accordion-toggle collapsed\" href=\"#collapseSix\" data-toggle=\"collapse\" data-parent=\"#accordion\">Maecenas malesuada nisl sed dolor pulvinar sagittis</a></h4>\r\n<div id=\"collapseSix\" class=\"panel-collapse collapse\">Fusce et vestibulum odio. Nullam vulputate sem nisi. Nullam fringilla eleifend elementum. Aliquam scelerisque eros ac risus dictum ornare.</div>\r\n</div>\r\n</body>\r\n</html>', '2018-06-27 04:20:19', '2018-06-27 09:48:43', '', '', 'enable'),
(6, 'terms', 'Terms of Uses', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"color: #626262;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec condimentum leo. Maecenas ligula sapien, efficitur quis odio a, suscipit rutrum nisl. Nulla finibus imperdiet nunc sed porttitor. Donec et purus metus. Vestibulum nec pharetra risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>\r\n<p style=\"color: #626262;\">Donec quis aliquam ligula. Nunc ut lectus et dolor mollis tempus. Morbi blandit nibh sed ex commodo interdum. Mauris tempus et sapien eu maximus. Nunc quis turpis nisi. In consequat sit amet mauris sit amet tempor. Phasellus maximus ut sapien ac finibus. Donec convallis sapien facilisis mauris bibendum tempor.</p>\r\n<p style=\"color: #626262;\">Quisque tempus maximus nisl sed egestas. Aliquam erat volutpat. Curabitur convallis id velit et faucibus. Pellentesque vehicula elit sit amet faucibus fringilla. Donec pulvinar nibh orci, nec consectetur risus finibus in. Nunc maximus arcu eu mauris tempor pretium. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse ut congue nisi. Nulla rhoncus neque in sapien suscipit, id commodo elit blandit. Vivamus ac euismod urna. Vestibulum et congue ante.</p>\r\n<p style=\"color: #626262;\">Suspendisse eleifend condimentum felis, in porttitor nulla consequat vel. Integer eget pharetra libero, a condimentum erat. Nam facilisis erat justo, non varius ipsum interdum quis. Nullam fermentum turpis quis magna eleifend elementum. Aenean luctus rutrum pharetra. Quisque sagittis ac augue et auctor. Suspendisse consectetur a orci in accumsan. Duis mauris ipsum, placerat et faucibus tincidunt, suscipit et est. Suspendisse dapibus nulla risus, congue congue velit tincidunt eget. Phasellus condimentum convallis est in finibus. Duis fringilla laoreet nunc, id luctus nulla finibus vel. Donec viverra pellentesque tincidunt. Etiam dictum lectus a consectetur molestie.</p>\r\n<p style=\"color: #626262;\">Curabitur ac ornare magna. Suspendisse convallis efficitur nibh, et ullamcorper magna lobortis semper. Donec vel risus mollis, tincidunt odio ut, vulputate ante. Phasellus fermentum nec urna et porta. Integer sagittis rhoncus justo ut gravida. Nullam convallis odio et libero cursus consectetur elementum sed augue. Praesent ac arcu odio. Sed in porttitor risus. Sed semper tellus eu felis efficitur accumsan. Mauris finibus sit amet enim id maximus. Integer mattis eget neque eget consequat. Vestibulum quis vehicula ex, eget pretium tortor.</p>\r\n</body>\r\n</html>', '2018-08-08 06:00:00', '2018-08-08 14:57:16', 'terms', '', 'enable'),
(7, 'privacy', 'Privacy Policy', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"color: #626262;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec condimentum leo. Maecenas ligula sapien, efficitur quis odio a, suscipit rutrum nisl. Nulla finibus imperdiet nunc sed porttitor. Donec et purus metus. Vestibulum nec pharetra risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>\r\n<p style=\"color: #626262;\">Donec quis aliquam ligula. Nunc ut lectus et dolor mollis tempus. Morbi blandit nibh sed ex commodo interdum. Mauris tempus et sapien eu maximus. Nunc quis turpis nisi. In consequat sit amet mauris sit amet tempor. Phasellus maximus ut sapien ac finibus. Donec convallis sapien facilisis mauris bibendum tempor.</p>\r\n<p style=\"color: #626262;\">Quisque tempus maximus nisl sed egestas. Aliquam erat volutpat. Curabitur convallis id velit et faucibus. Pellentesque vehicula elit sit amet faucibus fringilla. Donec pulvinar nibh orci, nec consectetur risus finibus in. Nunc maximus arcu eu mauris tempor pretium. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse ut congue nisi. Nulla rhoncus neque in sapien suscipit, id commodo elit blandit. Vivamus ac euismod urna. Vestibulum et congue ante.</p>\r\n<p style=\"color: #626262;\">Suspendisse eleifend condimentum felis, in porttitor nulla consequat vel. Integer eget pharetra libero, a condimentum erat. Nam facilisis erat justo, non varius ipsum interdum quis. Nullam fermentum turpis quis magna eleifend elementum. Aenean luctus rutrum pharetra. Quisque sagittis ac augue et auctor. Suspendisse consectetur a orci in accumsan. Duis mauris ipsum, placerat et faucibus tincidunt, suscipit et est. Suspendisse dapibus nulla risus, congue congue velit tincidunt eget. Phasellus condimentum convallis est in finibus. Duis fringilla laoreet nunc, id luctus nulla finibus vel. Donec viverra pellentesque tincidunt. Etiam dictum lectus a consectetur molestie.</p>\r\n<p style=\"color: #626262;\">Curabitur ac ornare magna. Suspendisse convallis efficitur nibh, et ullamcorper magna lobortis semper. Donec vel risus mollis, tincidunt odio ut, vulputate ante. Phasellus fermentum nec urna et porta. Integer sagittis rhoncus justo ut gravida. Nullam convallis odio et libero cursus consectetur elementum sed augue. Praesent ac arcu odio. Sed in porttitor risus. Sed semper tellus eu felis efficitur accumsan. Mauris finibus sit amet enim id maximus. Integer mattis eget neque eget consequat. Vestibulum quis vehicula ex, eget pretium tortor.</p>\r\n</body>\r\n</html>', '2018-08-08 07:00:00', '2018-08-08 14:57:34', 'privacy', '', 'enable'),
(8, 'help', 'Help', '<!DOCTYPE html>\r\n<html>\r\n<head>\r\n</head>\r\n<body>\r\n<p style=\"color: #626262;\">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris nec condimentum leo. Maecenas ligula sapien, efficitur quis odio a, suscipit rutrum nisl. Nulla finibus imperdiet nunc sed porttitor. Donec et purus metus. Vestibulum nec pharetra risus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>\r\n<p style=\"color: #626262;\">Donec quis aliquam ligula. Nunc ut lectus et dolor mollis tempus. Morbi blandit nibh sed ex commodo interdum. Mauris tempus et sapien eu maximus. Nunc quis turpis nisi. In consequat sit amet mauris sit amet tempor. Phasellus maximus ut sapien ac finibus. Donec convallis sapien facilisis mauris bibendum tempor.</p>\r\n<p style=\"color: #626262;\">Quisque tempus maximus nisl sed egestas. Aliquam erat volutpat. Curabitur convallis id velit et faucibus. Pellentesque vehicula elit sit amet faucibus fringilla. Donec pulvinar nibh orci, nec consectetur risus finibus in. Nunc maximus arcu eu mauris tempor pretium. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Suspendisse ut congue nisi. Nulla rhoncus neque in sapien suscipit, id commodo elit blandit. Vivamus ac euismod urna. Vestibulum et congue ante.</p>\r\n<p style=\"color: #626262;\">Suspendisse eleifend condimentum felis, in porttitor nulla consequat vel. Integer eget pharetra libero, a condimentum erat. Nam facilisis erat justo, non varius ipsum interdum quis. Nullam fermentum turpis quis magna eleifend elementum. Aenean luctus rutrum pharetra. Quisque sagittis ac augue et auctor. Suspendisse consectetur a orci in accumsan. Duis mauris ipsum, placerat et faucibus tincidunt, suscipit et est. Suspendisse dapibus nulla risus, congue congue velit tincidunt eget. Phasellus condimentum convallis est in finibus. Duis fringilla laoreet nunc, id luctus nulla finibus vel. Donec viverra pellentesque tincidunt. Etiam dictum lectus a consectetur molestie.</p>\r\n<p style=\"color: #626262;\">Curabitur ac ornare magna. Suspendisse convallis efficitur nibh, et ullamcorper magna lobortis semper. Donec vel risus mollis, tincidunt odio ut, vulputate ante. Phasellus fermentum nec urna et porta. Integer sagittis rhoncus justo ut gravida. Nullam convallis odio et libero cursus consectetur elementum sed augue. Praesent ac arcu odio. Sed in porttitor risus. Sed semper tellus eu felis efficitur accumsan. Mauris finibus sit amet enim id maximus. Integer mattis eget neque eget consequat. Vestibulum quis vehicula ex, eget pretium tortor.</p>\r\n</body>\r\n</html>', '2018-08-08 06:00:00', '2018-08-08 14:57:49', 'help', '', 'enable'),
(9, 'home', '', '', '2018-08-08 03:06:00', '2018-08-08 03:06:00', '', '', 'enable');

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `post_id` int(11) NOT NULL,
  `post_title` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` varchar(255) NOT NULL,
  `post` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `post_img` text,
  `active` int(11) NOT NULL,
  `date_added` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `user_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`post_id`, `post_title`, `slug`, `post`, `post_img`, `active`, `date_added`, `user_id`) VALUES
(1, 'Post 1', 'post-1', 'This is a demo post. This post is just only to test the functionality of the blog. If this post works properly then I could say that I am done for today. Thank you my dear.', 'http://beatsupply.coregensolution.com/uploads/post/92135118.jpg', 1, '2014-08-18 11:29:30', 1),
(2, 'Post 2', 'post-2', 'This is the 2nd post. This post is to test the insert functionality of my blog. If this method works properly then I can say that I am done with insert. Thanks for being with me.', 'http://beatsupply.coregensolution.com/uploads/post/4088819-nature-images.jpg', 1, '2014-08-18 11:50:17', 1),
(3, 'Post 3', 'post-3', 'Yahh! It\'s working properly. I have done the operation of CRUD on database. I feel really cool with codeigniter. This framework is really very easy to learn for the first time you start.', 'http://beatsupply.coregensolution.com/uploads/post/511977294-612x612.jpg', 1, '2014-08-18 11:50:36', 1),
(4, 'Post 4 ', 'post-4', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac, enim. Aliquam lorem ante, dapibus in, viverra quis, feugiat a, tellus. Phasellus viverra nulla ut metus varius laoreet. Quisque rutrum. Aenean imperdiet. Etiam ultricies nisi vel augue. Curabitur ullamcorper ultricies nisi. Nam eget dui. Etiam rhoncus. Maecenas tempus, tellus eget condimentum rhoncus, sem quam semper libero, sit amet adipiscing sem neque sed ipsum. Nam quam nunc, blandit vel, luctus pulvinar, hendrerit id, lorem. Maecenas nec odio et ante tincidunt tempus. Donec vitae sapien ut libero venenatis faucibus. Nullam quis ante. Etiam sit amet orci eget eros faucibus tincidunt. Duis leo. Sed fringilla mauris sit amet nibh. Donec sodales sagittis magna. Sed consequat, leo eget bibendum sodales, augue velit cursus nunc,', 'http://beatsupply.coregensolution.com/uploads/post/avenue-2215317__340.jpg', 1, '2014-08-18 18:23:29', 1),
(5, 'Post 5', 'post-5', 'Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam, eaque ipsa quae ab illo inventore veritatis et quasi architecto beatae vitae dicta sunt explicabo. Nemo enim ipsam voluptatem quia voluptas sit aspernatur aut odit aut fugit, sed quia consequuntur magni dolores eos qui ratione voluptatem sequi nesciunt. Neque porro quisquam est, qui dolorem ipsum quia dolor sit amet, consectetur, adipisci velit, sed quia non numquam eius modi tempora incidunt ut labore et dolore magnam aliquam quaerat voluptatem. Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem vel eum iure reprehenderit qui in ea voluptate velit esse quam nihil molestiae consequatur, vel illum qui dolorem eum fugiat quo voluptas nulla pariatur? At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa qui officia deserunt mollitia animi, id est laborum et dolorum fuga. Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi optio cumque nihil impedit quo minus id quod maxime placeat facere', 'http://beatsupply.coregensolution.com/uploads/post/bird.jpg', 1, '2014-08-18 18:23:40', 1),
(6, 'Post 6', 'post-6', 'But I must explain to you how all this mistaken idea of denouncing pleasure and praising pain was born and I will give you a complete account of the system, and expound the actual teachings of the great explorer of the truth, the master-builder of human happiness. No one rejects, dislikes, or avoids pleasure itself, because it is pleasure, but because those who do not know how to pursue pleasure rationally encounter consequences that are extremely painful. Nor again is there anyone who loves or pursues or desires to obtain pain of itself, because it is pain, but because occasionally circumstances occur in which toil and pain can procure him some great pleasure. To take a trivial example, which of us ever undertakes laborious physical exercise, except to obtain some advantage from it? But who has any right to find fault with a man who chooses to enjoy a pleasure that has no annoying consequences, or one who avoids a pain that produces no resultant pleasure? On the other hand, we denounce with righteous indignation and dislike men who are so beguiled and demoralized by the charms of pleasure of the moment, so blinded by desire, that they cannot foresee', 'http://beatsupply.coregensolution.com/uploads/post/Free-nature-wallpaper-autumn-leaves-and-straight-street-500x313.jpg', 1, '2014-08-18 18:23:49', 1),
(7, 'Post 7', 'post-7', 'Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles. Ma quande lingues coalesce, li grammatica del resultant lingue es plu simplic e regulari quam ti del coalescent lingues. Li nov lingua franca va esser plu simplic e regulari quam li existent Europan lingues. It va esser tam simplic quam Occidental in fact, it va esser Occidental. A un Angleso it va semblar un simplificat Angles, quam un skeptic Cambridge amico dit me que Occidental es.Li Europan lingues es membres del sam familie. Lor separat existentie es un myth. Por scientie, musica, sport etc, litot Europa usa li sam vocabular. Li lingues differe solmen in li grammatica, li pronunciation e li plu commun vocabules. Omnicos directe al desirabilite de un nov lingua franca: On refusa continuar payar custosi traductores. At solmen va esser necessi far uniform grammatica, pronunciation e plu sommun paroles.', 'http://beatsupply.coregensolution.com/uploads/post/i8Mahm8.jpg', 1, '2014-08-18 18:24:00', 1),
(8, 'Post 8', 'post-8', 'The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To achieve this, it would be necessary to have uniform grammar, pronunciation and more common words. If several languages coalesce, the grammar of the resulting language is more simple and regular than that of the individual languages. The new common language will be more simple and regular than the existing European languages. It will be as simple as Occidental; in fact, it will be Occidental. To an English person, it will seem like simplified English, as a skeptical Cambridge friend of mine told me what Occidental is.The European languages are members of the same family. Their separate existence is a myth. For science, music, sport, etc, Europe uses the same vocabulary. The languages only differ in their grammar, their pronunciation and their most common words. Everyone realizes why a new common language would be desirable: one could refuse to pay expensive translators. To', 'http://beatsupply.coregensolution.com/uploads/post/7262858614_8f351b9046_o.jpg', 1, '2014-08-18 18:24:11', 1),
(9, 'Post 9', 'post-9', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'http://beatsupply.coregensolution.com/uploads/post/6a920abc9697ccc40ec26b31ac014443.jpg', 1, '2014-08-18 18:24:18', 1);

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `settings_id` int(11) NOT NULL,
  `social_media` text COLLATE utf8_unicode_ci,
  `admin_mail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `contact_mail` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `protocol` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `smtp_host` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `smtp_port` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `smtp_crypto` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `smtp_user` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `smtp_pass` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `secrete_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `publishable_key` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `client_id` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `commision_type` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `commision_rate` float DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`settings_id`, `social_media`, `admin_mail`, `contact_mail`, `protocol`, `smtp_host`, `smtp_port`, `smtp_crypto`, `smtp_user`, `smtp_pass`, `secrete_key`, `publishable_key`, `client_id`, `commision_type`, `commision_rate`) VALUES
(1, '{\"facebook\":\"#\",\"twitter\":\"#\",\"google_plus\":\"#\",\"instragram\":\"#\",\"youtube\":\"#\"}', 'smtp@cgsthemes.com', 'smtp@cgsthemes.com', 'smtp', 'gator4070.hostgator.com', '465', 'ssl', 'smtp@cgsthemes.com', 'qweQWE123!@#', 'sk_test_f2utWAk8ieyHmZ8enW8WDWrB', 'pk_test_hYJla09a6jrwrIRNUJkUuVFi', 'ca_CrmZHRvZHZVbziaqIRFbEQjRvFxJzSnR', 'flat', 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscriptions`
--

CREATE TABLE `subscriptions` (
  `subscription_id` int(11) NOT NULL,
  `order_id` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `user_id` int(11) NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_num` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `card_cvc` int(11) NOT NULL,
  `card_exp_month` varchar(2) COLLATE utf8_unicode_ci NOT NULL,
  `card_exp_year` varchar(4) COLLATE utf8_unicode_ci NOT NULL,
  `membership_id` int(11) NOT NULL,
  `membership_price` float NOT NULL,
  `price_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `paid_amount` float NOT NULL,
  `paid_currency` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `txn_id` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `payment_status` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `create_date` datetime NOT NULL,
  `expiry_date` datetime NOT NULL,
  `download_limits` int(11) DEFAULT NULL,
  `downloaded` int(11) DEFAULT NULL,
  `status` enum('active','deactive') COLLATE utf8_unicode_ci DEFAULT 'active'
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `subscriptions`
--

INSERT INTO `subscriptions` (`subscription_id`, `order_id`, `user_id`, `name`, `email`, `card_num`, `card_cvc`, `card_exp_month`, `card_exp_year`, `membership_id`, `membership_price`, `price_currency`, `paid_amount`, `paid_currency`, `txn_id`, `payment_status`, `create_date`, `expiry_date`, `download_limits`, `downloaded`, `status`) VALUES
(1, '20180611BD9A', 2, 'James Butt', 'jamesbutt@mailinator.com', '2147483647', 123, '06', '2021', 8, 40, 'usd', 4000, '0', 'txn_1Cbpt0F7Pjsw26k1RJW4CUH0', 'succeeded', '2018-06-11 08:16:42', '2018-07-11 00:00:00', 5, 0, 'deactive'),
(2, '20180611F844', 2, 'James Butt', 'jamesbutt@mailinator.com', '2147483647', 123, '06', '2021', 10, 60, 'usd', 6000, '0', 'txn_1Cbqd3F7Pjsw26k1VekbWU0e', 'succeeded', '2018-06-11 09:04:17', '2018-07-11 00:00:00', 10, 3, 'deactive'),
(3, '201808138157', 2, 'James Butt', 'jamesbutt@mailinator.com', '2147483647', 123, '06', '2021', 10, 60, 'usd', 6000, '0', 'txn_1CyhbPF7Pjsw26k1JMh5NfZq', 'succeeded', '2018-08-13 10:05:04', '2018-09-12 00:00:00', 10, 3, 'deactive'),
(4, '20180822A116', 9, 'Test', 'testuser1@mailinator.com', '4242424242424242', 123, '12', '2020', 8, 40, 'usd', 4000, 'usd', 'txn_1D1usxF7Pjsw26k1CF3XNzao', 'succeeded', '2018-08-22 11:52:28', '2018-09-21 00:00:00', 5, 0, 'active'),
(5, '20180918F463', 2, 'james butt', 'jamesbutt@mailinator.com', '4242424242424242', 123, '06', '21', 10, 60, 'usd', 6000, 'usd', 'txn_1DBjTQF7Pjsw26k1qHfM6IED', 'succeeded', '2018-09-18 08:42:40', '2018-10-18 00:00:00', 10, 0, 'active'),
(6, '20181001F49B', 2, 'james butt', 'jamesbutt@mailinator.com', '4242424242424242', 123, '06', '2022', 8, 40, 'usd', 4000, 'usd', 'txn_1DGX0dF7Pjsw26k1P7JsfJza', 'succeeded', '2018-10-01 14:24:47', '2018-10-31 00:00:00', 5, 0, 'active');

-- --------------------------------------------------------

--
-- Table structure for table `testimonials`
--

CREATE TABLE `testimonials` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) DEFAULT NULL,
  `image` text,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `testimonials`
--

INSERT INTO `testimonials` (`id`, `name`, `designation`, `image`, `content`) VALUES
(4, '@beat supply', '@imcaseyreynolds', 'http://beatsupply.coregensolution.com/uploads/testimonials/testimonial-bg1.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(5, '@beat supply', '@imcaseyreynolds', 'http://beatsupply.coregensolution.com/uploads/testimonials/testimonial-bg2.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.'),
(6, '@beat supply', '@imcaseyreynolds', 'http://beatsupply.coregensolution.com/uploads/testimonials/testimonial-bg3.jpg', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_types` enum('admin','producer','artist','user') COLLATE utf8_unicode_ci NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `display_name` varchar(255) COLLATE utf8_unicode_ci DEFAULT NULL,
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `username` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `bio` text COLLATE utf8_unicode_ci,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `create_dt` datetime NOT NULL,
  `modify_dt` datetime NOT NULL,
  `status` enum('active','deactive','email not verified') COLLATE utf8_unicode_ci NOT NULL,
  `profile_img` text COLLATE utf8_unicode_ci,
  `activation_code` text COLLATE utf8_unicode_ci,
  `stripe_resp` text COLLATE utf8_unicode_ci,
  `stripe_customer_id` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `featured` enum('true','false') COLLATE utf8_unicode_ci NOT NULL DEFAULT 'false'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_types`, `name`, `display_name`, `email`, `username`, `bio`, `password`, `phone`, `create_dt`, `modify_dt`, `status`, `profile_img`, `activation_code`, `stripe_resp`, `stripe_customer_id`, `featured`) VALUES
(1, 'admin', 'bangerzarmy', 'bangerzarmy', 'bangerzarmyy@bangerzarmy.com', 'admin', NULL, 'KQhrXK25jg9dkSSIIoleTV8Zl0Ag3kXlKjZJXbLrmQK3BocPi7bjilZJoDWqX//thzFiqbYujG1RCMb1hsVsyw==', '810-292-9388', '2018-05-08 00:00:00', '2018-05-08 00:00:00', 'active', NULL, NULL, NULL, NULL, 'false'),
(2, 'artist', 'James Butt', 'James', 'jamesbutt@mailinator.com', '', NULL, '6gUcvuh/p2rlWWuy+Um59qgmShTPw1IIaszNGxXt8mC3RSMw3/7XJjGTS58yfDwRu9NLy2j7JA/57b+M07ZxwQ==', '856-636-8749', '2018-05-08 06:17:27', '2018-07-10 15:34:12', 'active', 'http://beatsupply.coregensolution.com/uploads/profile/john-d-sutter__53938.png', NULL, NULL, 'cus_DhwumDikrUyfhz', 'false'),
(3, 'producer', 'Josephine Darakjy', 'Josephine', 'josephinedarakjy@mailinator.com', '', 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim. Donec pede justo, fringilla vel, aliquet nec, vulputate eget, arcu. In enim justo, rhoncus ut, imperdiet a, venenatis vitae, justo. Nullam dictum felis eu pede mollis pretium. Integer tincidunt. Cras dapibus. Vivamus elementum semper nisi. Aenean vulputate eleifend tellus. Aenean leo ligula, ', 'Ms7hmHPtMZqR8fGjwJuhqc5S5vxE8dUBChMLPld9wc+Q8kx3NwlNr41gpoh82+YNuzWNT7kVMArLL7q3jnCuGA==', '810-292-9388', '2018-05-10 04:47:41', '2018-07-09 09:53:48', 'active', 'http://beatsupply.coregensolution.com/uploads/profile/342.jpg', NULL, '{\"access_token\":\"sk_test_X5lFBHWmhUOy3llkWbT3mIXh\",\"livemode\":false,\"refresh_token\":\"rt_D7WD8gWQQ8o35PTQGw9RXRx8m3tk6yN14esRnIhm3cB1O5st\",\"token_type\":\"bearer\",\"stripe_publishable_key\":\"pk_test_6Nm4NdYlri4YOx3bWE1iCqoQ\",\"stripe_user_id\":\"acct_1ChHAEAfHPTsgGPY\",\"scope\":\"read_write\"}', 'cus_D7790gotDvP8pA', 'true'),
(4, 'producer', 'Donette Foller', 'Donette', 'donettefoller@mailinator.com', '', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.', '0vr1et9ONltLufv163M4TYGjBS3YijuIuVtm+eQe2F6wy31of4fz+5p7ghbpLyx2ei0F2iyeWSwa/3vuUCkaQw==', '419-503-2484', '2018-08-08 09:16:48', '2018-08-08 10:01:14', 'active', 'http://beatsupply.coregensolution.com/uploads/profile/pr.jpg', NULL, NULL, NULL, 'true'),
(5, 'producer', 'Simona Morasca', 'Simona', 'simonamorasca@mailinator.com', '', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet.', '2tJgbYfahjpVgqG7+WOIUxQFLi1UB1GdXv1bnNVRfmrxBjLDfnLbJeZvN14s0TZvYkP9ugd6YpqgsXY+zNl0Fg==', '419-800-6759', '2018-08-08 09:24:26', '2018-08-08 10:02:43', 'active', 'http://beatsupply.coregensolution.com/uploads/profile/t-o-p-profile-picture-759x500.jpg', NULL, NULL, NULL, 'true'),
(6, 'artist', 'Josh', 'Josh', 'iwearsaladshoes@gmail.com', '', NULL, 'srPtZq8m2xuTH+U3LYWdxiDSzgGvXpMR5EazIc7LLIILJP7yzrB1TLijC92SgkH/VTKYbohlQAS8wXSs4n5Nkg==', '', '2018-08-10 12:02:56', '2018-08-10 12:02:56', 'active', NULL, NULL, NULL, NULL, 'false'),
(7, 'producer', 'Landon', 'Landon', 'landonrossRE@Gmail.com', '', NULL, '3hLXzA4NBsjQXHy/T3hZKkcYUgNWliEtZwpSUTxXBUdgFZJm9YgIladYxl9wyrwx9KseBnRqJF6OzY6wU/ABPQ==', '', '2018-08-10 15:26:42', '2018-08-10 15:26:42', 'active', NULL, NULL, NULL, NULL, 'false'),
(8, 'producer', 'Test', 'Test', 'testuser@mailinator.com', '', '', 'XoQbeVLAaQzMfn0Pr4c8jeHpJ7zmMcyE0UR4OD6HbRtrqSIhXhzPRsUU5QpUpoJb2cU0mEB3Ejxx+xwYfMyIKA==', '21323423453', '2018-08-22 11:41:36', '2018-08-22 11:48:04', 'active', 'http://beatsupply.coregensolution.com/uploads/profile/unnamed.jpg', NULL, NULL, NULL, 'false'),
(9, 'artist', 'Test', 'Test', 'testuser1@mailinator.com', '', NULL, 'ko33zafe2xsMEy8JB0sGZvhUA9Sltm/wdEb2yuWc3flycrZZSQYs0v/j5BiUZnhSqxbWc47wrJtnqiSjzN+2bA==', '21323423453', '2018-08-22 11:48:44', '2018-08-22 11:48:44', 'active', NULL, NULL, NULL, 'cus_DSqaOrGwb87RP9', 'false'),
(10, 'artist', 'Test', 'Test', 'testuser123@mailinator.com', '', NULL, '2moHQzrdrM1rACiAVkO6gZum1m/ZFXBopRUu4wca9M0Z9hSE2SSJS7jS7z3qyo7z5mYV0IRFqn+owrD9gkonKw==', '21323423453', '2018-08-22 11:49:25', '2018-08-22 11:49:25', 'email not verified', NULL, NULL, NULL, NULL, 'false');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `beats`
--
ALTER TABLE `beats`
  ADD PRIMARY KEY (`beat_id`);

--
-- Indexes for table `beats_details`
--
ALTER TABLE `beats_details`
  ADD PRIMARY KEY (`beat_details_id`);

--
-- Indexes for table `beat_tags`
--
ALTER TABLE `beat_tags`
  ADD PRIMARY KEY (`tag_id`);

--
-- Indexes for table `category_master`
--
ALTER TABLE `category_master`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `contact_form`
--
ALTER TABLE `contact_form`
  ADD PRIMARY KEY (`contact_id`);

--
-- Indexes for table `favorites`
--
ALTER TABLE `favorites`
  ADD PRIMARY KEY (`fav_id`);

--
-- Indexes for table `featured_subscription`
--
ALTER TABLE `featured_subscription`
  ADD PRIMARY KEY (`feat_ord_id`);

--
-- Indexes for table `general_settings`
--
ALTER TABLE `general_settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `graphic_art`
--
ALTER TABLE `graphic_art`
  ADD PRIMARY KEY (`graphic_art_id`);

--
-- Indexes for table `memberships`
--
ALTER TABLE `memberships`
  ADD PRIMARY KEY (`membership_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `pages`
--
ALTER TABLE `pages`
  ADD PRIMARY KEY (`page_id`);

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`post_id`);

--
-- Indexes for table `site_settings`
--
ALTER TABLE `site_settings`
  ADD PRIMARY KEY (`settings_id`);

--
-- Indexes for table `subscriptions`
--
ALTER TABLE `subscriptions`
  ADD PRIMARY KEY (`subscription_id`),
  ADD UNIQUE KEY `order_id` (`order_id`);

--
-- Indexes for table `testimonials`
--
ALTER TABLE `testimonials`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `beats`
--
ALTER TABLE `beats`
  MODIFY `beat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;
--
-- AUTO_INCREMENT for table `beats_details`
--
ALTER TABLE `beats_details`
  MODIFY `beat_details_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;
--
-- AUTO_INCREMENT for table `beat_tags`
--
ALTER TABLE `beat_tags`
  MODIFY `tag_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `category_master`
--
ALTER TABLE `category_master`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `contact_form`
--
ALTER TABLE `contact_form`
  MODIFY `contact_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `favorites`
--
ALTER TABLE `favorites`
  MODIFY `fav_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `featured_subscription`
--
ALTER TABLE `featured_subscription`
  MODIFY `feat_ord_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `general_settings`
--
ALTER TABLE `general_settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `graphic_art`
--
ALTER TABLE `graphic_art`
  MODIFY `graphic_art_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `memberships`
--
ALTER TABLE `memberships`
  MODIFY `membership_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `pages`
--
ALTER TABLE `pages`
  MODIFY `page_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `posts`
--
ALTER TABLE `posts`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `site_settings`
--
ALTER TABLE `site_settings`
  MODIFY `settings_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `subscriptions`
--
ALTER TABLE `subscriptions`
  MODIFY `subscription_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `testimonials`
--
ALTER TABLE `testimonials`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
