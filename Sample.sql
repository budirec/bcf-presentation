-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 10, 2018 at 05:11 PM
-- Server version: 5.7.22-0ubuntu18.04.1
-- PHP Version: 7.0.30-1+ubuntu18.04.1+deb.sury.org+1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bcf_presentation`
--

--
-- Dumping data for table `checkpoint`
--

INSERT INTO `checkpoint` (`checkpoint_id`, `section_id`, `name`, `number`, `created_at`, `modified_at`) VALUES
  (1, 1, 'chck1', 1, '2018-06-17 01:03:34', NULL),
  (2, 2, 'verse1', 1, '2018-06-17 01:03:34', NULL),
  (3, 3, 'chck1', 1, '2018-06-17 01:04:25', NULL),
  (4, 4, 'verse1', 1, '2018-06-17 01:04:25', NULL),
  (5, 4, 'Chorus', 2, '2018-06-17 01:04:49', NULL),
  (6, 9, 'chck1', 1, '2018-06-26 22:04:53', NULL),
  (7, 10, 'verse1', 1, '2018-06-26 22:04:53', NULL),
  (8, 11, 'chck1', 1, '2018-06-26 22:04:53', NULL),
  (9, 12, 'verse1', 1, '2018-06-26 22:04:53', NULL),
  (10, 12, 'Chorus', 2, '2018-06-26 22:04:53', NULL),
  (11, 13, 'verse1', 1, '2018-06-26 22:13:04', NULL),
  (12, 13, 'Chorus', 2, '2018-06-26 22:13:04', NULL);

--
-- Dumping data for table `lyric`
--

INSERT INTO `lyric` (`lyric_id`, `song_song_structure_id`, `language_id`, `number`, `content`, `created_at`, `modified_at`) VALUES
  (5, 1, 1, 1, 'Nyanyi pujian bagi-Mu Tuhan\r\nPujian bagi-Mu Tuhan\r\nNama-Mu besar\r\nDan layak dipuji', '2018-07-07 22:14:05', NULL),
  (6, 2, 1, 1, 'Nyanyi pujian bagi-Mu Tuhan\r\nPujian bagi-Mu Tuhan\r\nNama-Mu besar\r\nDan layak dipuji', '2018-07-07 22:14:05', NULL),
  (7, 1, 2, 1, 'I sing praises to Your name, O Lord \r\nPraises to Your name, O Lord\r\nFor Your name is great\r\nAnd greatly to be praised', '2018-07-07 22:14:05', NULL),
  (8, 2, 2, 1, 'I give glory to Your name, O Lord\r\nGlory to Your name, O Lord\r\nFor Your name is great\r\nAnd greatly to be praised', '2018-07-07 22:14:05', NULL),
  (9, 3, 1, 1, 'Yesus, kami puja\r\nKami sembah s\'bagai Raja\r\nBerdiri di tengah kami\r\nDitinggikan dan dipuji', '2018-07-07 22:16:23', NULL),
  (10, 4, 1, 1, 'Sembah dan puji, p\'nuhi tahta-Mu\r\nSembah dan puji, p\'nuhi tahta-Mu\r\nSembah dan puji, p\'nuhi tahta-Mu\r\nYesus Tuhan adalah Raja', '2018-07-07 22:16:23', NULL),
  (11, 3, 2, 1, 'Jesus, we enthrone You\r\nWe proclaim You are king\r\nStanding here, in the midst of us\r\nWe raise You up with our praise', '2018-07-07 22:16:23', NULL),
  (12, 4, 2, 1, 'And as we worship build Your throne\r\nAnd as we worship build Your throne\r\nAnd as we worship build Your throne\r\nCome Lord Jesus and take Your place', '2018-07-07 22:16:23', NULL);

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`page_id`, `checkpoint_id`, `layout_id`, `content`, `number`, `background`, `created_at`, `modified_at`) VALUES
  (1, 1, 1, '{\"title\":\"Welcome to Basileia Christian Fellowship\",\"mainContent\":\"<p class=\\\"main_content\\\">Halo</p><p class=\\\"main_content_translated\\\">Hello</p>\",\"disclaimer\":\"<p class=\\\"disclaimer\\\">Harap untuk mematikan/me-mode getarkan telepon genggam anda selama pelayanan<br>Terima kasih</p><p class=\\\"disclaimer_translated\\\">Please turn off/vibrate your mobile phone during service<br>Thank you</p>\"}', 1, NULL, '2018-06-20 21:21:35', '2018-06-20 21:29:04'),
  (2, 2, 3, '{\"title\":\"I SING PRAISES\",\"song\":\"<p class=\\\"song_content\\\">I sing praises to Your name, oh Lord</p><p class=\\\"song_content_translated\\\">Nyanyi pujian bagi-Mu, Tuhan</p><p class=\\\"song_content\\\">Praises to Your name, oh Lord</p><p class=\\\"song_content_translated\\\">Pujian bagi-Mu, Tuhan</p><p class=\\\"song_content\\\">For Your name is great</p><p class=\\\"song_content_translated\\\">S\'bab engkau besar</p><p class=\\\"song_content\\\">And greatly to be praised</p><p class=\\\"song_content_translated\\\">Dan layak dipuji</p>\"}', 1, NULL, '2018-06-20 21:21:35', '2018-06-20 21:29:04'),
  (3, 2, 4, '{\"song\":\"<p class=\\\"song_content\\\">I give glory to Your name, oh Lord</p><p class=\\\"song_content_translated\\\">Nyanyi pujian bagi-Mu, Tuhan</p><p class=\\\"song_content\\\">Glory to Your name, oh Lord</p><p class=\\\"song_content_translated\\\">Pujian bagi-Mu, Tuhan</p><p class=\\\"song_content\\\">For Your name is great</p><p class=\\\"song_content_translated\\\">S\'bab engkau besar</p><p class=\\\"song_content\\\">And greatly to be praised</p><p class=\\\"song_content_translated\\\">Dan layak dipuji</p>\"}', 2, NULL, '2018-06-20 21:28:42', NULL),
  (4, 3, 5, '{\"title\":\"<p class=\\\"sermon_title\\\">Kepenuhan Roh Kudus</p><p class=\\\"sermon_title_translated\\\">The fullness of Holy Spirit</p>\"}', 1, NULL, '2018-06-20 21:28:42', NULL),
  (5, 6, 1, '{\"title\":\"Selamat datang di Basileia Christian Fellowship\",\"mainContent\":\"<p class=\\\"main_content\\\">Halo</p><p class=\\\"main_content_translated\\\">Hello</p>\",\"disclaimer\":\"<p class=\\\"disclaimer\\\">Harap untuk mematikan/me-mode getarkan telepon genggam anda selama pelayanan<br>Terima kasih</p><p class=\\\"disclaimer_translated\\\">Please turn off/vibrate your mobile phone during service<br>Thank you</p>\"}', 1, NULL, '2018-06-26 22:04:53', '2018-06-26 23:16:47'),
  (6, 7, 3, '{\"title\":\"I SING PRAISES\",\"song\":\"<p class=\\\"song_content\\\">I sing praises to Your name, oh Lord</p><p class=\\\"song_content_translated\\\">Nyanyi pujian bagi-Mu, Tuhan</p><p class=\\\"song_content\\\">Praises to Your name, oh Lord</p><p class=\\\"song_content_translated\\\">Pujian bagi-Mu, Tuhan</p><p class=\\\"song_content\\\">For Your name is great</p><p class=\\\"song_content_translated\\\">S\'bab engkau besar</p><p class=\\\"song_content\\\">And greatly to be praised</p><p class=\\\"song_content_translated\\\">Dan layak dipuji</p>\"}', 1, NULL, '2018-06-26 22:04:53', NULL),
  (7, 7, 4, '{\"song\":\"<p class=\\\"song_content\\\">I give glory to Your name, oh Lord</p><p class=\\\"song_content_translated\\\">Nyanyi pujian bagi-Mu, Tuhan</p><p class=\\\"song_content\\\">Glory to Your name, oh Lord</p><p class=\\\"song_content_translated\\\">Pujian bagi-Mu, Tuhan</p><p class=\\\"song_content\\\">For Your name is great</p><p class=\\\"song_content_translated\\\">S\'bab engkau besar</p><p class=\\\"song_content\\\">And greatly to be praised</p><p class=\\\"song_content_translated\\\">Dan layak dipuji</p>\"}', 2, NULL, '2018-06-26 22:04:53', NULL),
  (8, 8, 5, '{\"title\":\"<p class=\\\"sermon_title\\\">Kepenuhan Roh Kudus</p><p class=\\\"sermon_title_translated\\\">The fullness of Holy Spirit</p>\"}', 1, NULL, '2018-06-26 22:04:53', NULL);

--
-- Dumping data for table `page_log`
--

INSERT INTO `page_log` (`page_log_id`, `page_id`, `old`, `created_at`) VALUES
  (1, 5, '{\"number\": 1, \"content\": \"{\\\"title\\\":\\\"Selamat datang di Basileia Christian Fellowship\\\",\\\"mainContent\\\":\\\"<p class=\\\\\\\"main_content\\\\\\\">Halo</p><p class=\\\\\\\"main_content_translated\\\\\\\">Hello</p>\\\",\\\"disclaimer\\\":\\\"<p class=\\\\\\\"disclaimer\\\\\\\">Harap untuk mematikan/me-mode getarkan telepon genggam anda selama pelayanan<br>Terima kasih</p><p class=\\\\\\\"disclaimer_translated\\\\\\\">Please turn off/vibrate your mobile phone during service<br>Thank you</p>\\\"}\", \"layout_id\": 1, \"background\": null, \"checkpoint_id\": 6}', '2018-06-26 23:16:30'),
  (2, 5, '{\"number\": 1, \"content\": \"{\\\"title\\\":\\\"Selamat datang di Basileia Christian Fellowship\\\",\\\"mainContent\\\":\\\"<p class=\\\\\\\"main_content\\\\\\\">Halo</p><p class=\\\\\\\"main_content_translated\\\\\\\">Hsello</p>\\\",\\\"disclaimer\\\":\\\"<p class=\\\\\\\"disclaimer\\\\\\\">Harap untuk mematikan/me-mode getarkan telepon genggam anda selama pelayanan<br>Terima kasih</p><p class=\\\\\\\"disclaimer_translated\\\\\\\">Please turn off/vibrate your mobile phone during service<br>Thank you</p>\\\"}\", \"layout_id\": 1, \"background\": null, \"checkpoint_id\": 6}', '2018-06-26 23:16:47');

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `slide_id`, `name`, `number`, `created_at`, `modified_at`) VALUES
  (1, 1, 'Main title', 1, '2018-06-17 01:01:32', NULL),
  (2, 1, 'I sing praises', 2, '2018-06-17 01:01:32', NULL),
  (3, 1, 'Sermon', 3, '2018-06-17 01:02:06', NULL),
  (4, 1, 'Offering', 4, '2018-06-17 01:02:06', NULL),
  (5, 3, 'Main title', 1, '2018-06-26 21:57:32', NULL),
  (6, 3, 'I sing praises', 2, '2018-06-26 21:57:32', NULL),
  (7, 3, 'Sermon', 3, '2018-06-26 21:57:32', NULL),
  (8, 3, 'Offering', 4, '2018-06-26 21:57:32', NULL),
  (9, 4, 'Main title', 1, '2018-06-26 22:04:53', NULL),
  (10, 4, 'I sing praises', 2, '2018-06-26 22:04:53', NULL),
  (11, 4, 'Sermon', 3, '2018-06-26 22:04:53', NULL),
  (12, 4, 'Offering test', 4, '2018-06-26 22:04:53', NULL),
  (13, 4, 'Offering 2', 5, '2018-06-26 22:13:04', NULL);

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`slide_id`, `name`, `created_at`, `modified_at`) VALUES
  (1, '20180623', '2018-06-17 01:00:18', NULL),
  (2, '20180630', '2018-06-17 01:05:17', NULL),
  (3, '20180710', '2018-06-26 21:57:32', NULL),
  (4, '20180711', '2018-06-26 22:04:53', NULL);

--
-- Dumping data for table `song`
--

INSERT INTO `song` (`song_id`, `name`, `created_at`, `modified_at`) VALUES
  (1, 'Jesus we enthrone You', '2018-07-07 21:50:45', NULL),
  (2, 'I sing praises', '2018-07-07 21:50:45', NULL);

--
-- Dumping data for table `song_language`
--

INSERT INTO `song_language` (`song_language_id`, `song_id`, `language_id`, `title`, `writer`, `singable`, `created_at`, `modified_at`) VALUES
  (1, 1, 1, 'YESUS KAMI PUJA', '', 1, '2018-07-07 21:54:20', NULL),
  (2, 1, 2, 'Jesus we enthrone You', 'Don Moen', 1, '2018-07-07 21:54:20', NULL),
  (3, 2, 1, 'NYANYI PUJIAN BAGIMU', '', 1, '2018-07-07 21:57:47', NULL),
  (4, 2, 2, 'I sing praises', 'Terry MacAlmon', 1, '2018-07-07 21:57:47', NULL);

--
-- Dumping data for table `song_song_structure`
--

INSERT INTO `song_song_structure` (`song_song_structure_id`, `song_id`, `name`, `created_at`, `modified_at`) VALUES
  (1, 2, 'Verse 1', '2018-07-07 22:08:08', NULL),
  (2, 2, 'Verse 2', '2018-07-07 22:08:08', NULL),
  (3, 1, 'Verse', '2018-07-07 22:08:08', NULL),
  (4, 1, 'Chorus', '2018-07-07 22:08:08', NULL);

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `created_at`, `modified_at`) VALUES
  (2, 'admin', 'admin@bcf.com', 'admin', '2018-06-07 22:56:09', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
