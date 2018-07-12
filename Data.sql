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
-- Dumping data for table `language`
--

INSERT INTO `language` (`language_id`, `name`, `created_at`, `modified_at`) VALUES
  (1, 'Bahasa Indonesia', '2018-07-07 21:52:05', NULL),
  (2, 'English', '2018-07-07 21:52:05', NULL);

--
-- Dumping data for table `layout`
--

INSERT INTO `layout` (`layout_id`, `name`, `created_at`, `modified_at`) VALUES
  (1, 'title', '2018-06-20 21:06:35', NULL),
  (2, 'song_title_writer', '2018-06-20 21:06:35', NULL),
  (3, 'song_title', '2018-06-20 21:07:03', NULL),
  (4, 'song', '2018-06-20 21:07:03', NULL),
  (5, 'sermon_title', '2018-06-20 21:07:29', NULL),
  (6, 'sermon', '2018-06-20 21:07:29', NULL),
  (7, 'blank', '2018-06-20 21:07:35', NULL);

--
-- Dumping data for table `song_structure`
--

INSERT INTO `song_structure` (`song_structure_id`, `name`, `created_at`, `modified_at`) VALUES
  (1, 'Introduction', '2018-07-07 22:00:11', NULL),
  (2, 'Verse', '2018-07-07 22:01:49', NULL),
  (3, 'Pre-chorus', '2018-07-07 22:01:49', NULL),
  (4, 'Chorus', '2018-07-07 22:01:49', NULL),
  (5, 'Bridge', '2018-07-07 22:01:49', NULL),
  (6, 'Outro', '2018-07-07 22:01:49', NULL);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
