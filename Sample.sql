-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2018 at 10:06 PM
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
(5, 4, 'Chorus', 2, '2018-06-17 01:04:49', NULL);

--
-- Dumping data for table `page`
--

INSERT INTO `page` (`page_id`, `checkpoint_id`, `layout_id`, `content`, `number`, `background`, `created_at`, `modified_at`) VALUES
(1, 1, 1, '{\"title\":\"Welcome to Basileia Christian Fellowship\",\"mainContent\":\"<p class=\\\"main_content\\\">Halo</p><p class=\\\"main_content_translated\\\">Hello</p>\",\"disclaimer\":\"<p class=\\\"disclaimer\\\">Harap untuk mematikan/me-mode getarkan telepon genggam anda selama pelayanan<br>Terima kasih</p><p class=\\\"disclaimer_translated\\\">Please turn off/vibrate your mobile phone during service<br>Thank you</p>\"}', 1, NULL, '2018-06-20 21:21:35', '2018-06-20 21:29:04'),
(2, 2, 3, '{\"title\":\"I SING PRAISES\",\"song\":\"<p class=\\\"song_content\\\">I sing praises to Your name, oh Lord</p><p class=\\\"song_content_translated\\\">Nyanyi pujian bagi-Mu, Tuhan</p><p class=\\\"song_content\\\">Praises to Your name, oh Lord</p><p class=\\\"song_content_translated\\\">Pujian bagi-Mu, Tuhan</p><p class=\\\"song_content\\\">For Your name is great</p><p class=\\\"song_content_translated\\\">S\'bab engkau besar</p><p class=\\\"song_content\\\">And greatly to be praised</p><p class=\\\"song_content_translated\\\">Dan layak dipuji</p>\"}', 1, NULL, '2018-06-20 21:21:35', '2018-06-20 21:29:04'),
(3, 2, 4, '{\"song\":\"<p class=\\\"song_content\\\">I give glory to Your name, oh Lord</p><p class=\\\"song_content_translated\\\">Nyanyi pujian bagi-Mu, Tuhan</p><p class=\\\"song_content\\\">Glory to Your name, oh Lord</p><p class=\\\"song_content_translated\\\">Pujian bagi-Mu, Tuhan</p><p class=\\\"song_content\\\">For Your name is great</p><p class=\\\"song_content_translated\\\">S\'bab engkau besar</p><p class=\\\"song_content\\\">And greatly to be praised</p><p class=\\\"song_content_translated\\\">Dan layak dipuji</p>\"}', 2, NULL, '2018-06-20 21:28:42', NULL),
(4, 3, 5, '{\"title\":\"<p class=\\\"sermon_title\\\">Kepenuhan Roh Kudus</p><p class=\\\"sermon_title_translated\\\">The fullness of Holy Spirit</p>\"}', 1, NULL, '2018-06-20 21:28:42', NULL);

--
-- Dumping data for table `page_log`
--

INSERT INTO `page_log` (`page_log_id`, `page_id`, `old`, `created_at`) VALUES
(1, 1, '{\"number\": 1, \"content\": \"{\\\"title\\\":\\\"Welcome to Basileia Christian Fellowship\\\",\\\"mainContent\\\":\\\"<p class=\\\\\\\"main_content\\\\\\\">Halo</p><p class=\\\\\\\"main_content_translated\\\\\\\">Hello</p>\\\",\\\"disclaimer\\\":\\\"<p class=\\\\\\\"disclaimer\\\\\\\">Harap untuk mematikan/me-mode getarkan telepon genggam anda selama pelayanan<br>Terima kasih</p><p class=\\\\\\\"disclaimer_translated\\\\\\\">Please turn off/vibrate your mobile phone during service<br>Thank you</p>\\\"\", \"layout_id\": 1, \"background\": null, \"checkpoint_id\": 1}', '2018-06-20 21:29:04'),
(2, 2, '{\"number\": 1, \"content\": \"{\\\"title\\\":\\\"I SING PRAISES\\\",\\\"song\\\":\\\"<p class=\\\\\\\"song_content\\\\\\\">I sing praises to Your name, oh Lord</p><p class=\\\\\\\"song_content_translated\\\\\\\">Nyanyi pujian bagi-Mu, Tuhan</p><p class=\\\\\\\"song_content\\\\\\\">Praises to Your name, oh Lord</p><p class=\\\\\\\"song_content_translated\\\\\\\">Pujian bagi-Mu, Tuhan</p><p class=\\\\\\\"song_content\\\\\\\">For Your name is great</p><p class=\\\\\\\"song_content_translated\\\\\\\">S\'bab engkau besar</p><p class=\\\\\\\"song_content\\\\\\\">And greatly to be praised</p><p class=\\\\\\\"song_content_translated\\\\\\\">Dan layak dipuji</p>\\\"\", \"layout_id\": 3, \"background\": null, \"checkpoint_id\": 2}', '2018-06-20 21:29:04');

--
-- Dumping data for table `section`
--

INSERT INTO `section` (`section_id`, `slide_id`, `name`, `number`, `created_at`, `modified_at`) VALUES
(1, 1, 'Main title', 1, '2018-06-17 01:01:32', NULL),
(2, 1, 'I sing praises', 2, '2018-06-17 01:01:32', NULL),
(3, 1, 'Sermon', 3, '2018-06-17 01:02:06', NULL),
(4, 1, 'Offering', 4, '2018-06-17 01:02:06', NULL);

--
-- Dumping data for table `slide`
--

INSERT INTO `slide` (`slide_id`, `name`, `created_at`, `modified_at`) VALUES
(1, '20180623', '2018-06-17 01:00:18', NULL),
(2, '20180630', '2018-06-17 01:05:17', NULL);

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `username`, `email`, `password`, `created_at`, `updated_at`) VALUES
(2, 'admin', 'admin@bcf.com', 'admin', '2018-06-07 22:56:09', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
