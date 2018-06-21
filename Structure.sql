-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 20, 2018 at 10:05 PM
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

-- --------------------------------------------------------

--
-- Table structure for table `checkpoint`
--

CREATE TABLE `checkpoint` (
  `checkpoint_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` tinyint(3) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `checkpoint`
--
DELIMITER $$
CREATE TRIGGER `log_checkpoint_update` AFTER UPDATE ON `checkpoint` FOR EACH ROW INSERT INTO checkpoint_log(checkpoint_id, old)
VALUES(
    NEW.checkpoint_id,
    json_object('section_id',OLD.section_id,'name',OLD.name,'number',OLD.number)
    )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `checkpoint_log`
--

CREATE TABLE `checkpoint_log` (
  `checkpoint_log_id` bigint(20) UNSIGNED NOT NULL,
  `checkpoint_id` bigint(20) UNSIGNED NOT NULL,
  `old` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `language`
--

CREATE TABLE `language` (
  `language_id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `language`
--
DELIMITER $$
CREATE TRIGGER `log_language_update` AFTER UPDATE ON `language` FOR EACH ROW INSERT INTO language_log(language_id, old)
VALUES(
    NEW.language_id,
    json_object('name',OLD.name)
    )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `language_log`
--

CREATE TABLE `language_log` (
  `language_log_id` bigint(20) UNSIGNED NOT NULL,
  `language_id` tinyint(3) UNSIGNED NOT NULL,
  `old` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `layout`
--

CREATE TABLE `layout` (
  `layout_id` smallint(5) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `layout`
--
DELIMITER $$
CREATE TRIGGER `log_layout_update` AFTER UPDATE ON `layout` FOR EACH ROW INSERT INTO layout_log(layout_id, old)
VALUES(
    NEW.layout_id,
    json_object('name',OLD.name)
    )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `layout_log`
--

CREATE TABLE `layout_log` (
  `layout_log_id` bigint(20) UNSIGNED NOT NULL,
  `layout_id` smallint(5) UNSIGNED NOT NULL,
  `old` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `lyric`
--

CREATE TABLE `lyric` (
  `lyric_id` bigint(20) UNSIGNED NOT NULL,
  `song_song_structure_id` bigint(20) UNSIGNED NOT NULL,
  `language_id` tinyint(3) UNSIGNED NOT NULL,
  `number` tinyint(3) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `lyric`
--
DELIMITER $$
CREATE TRIGGER `log_lyric_update` AFTER UPDATE ON `lyric` FOR EACH ROW INSERT INTO lyric_log(lyric_id, old)
VALUES(
    NEW.lyric_id,
    json_object('song_song_structure_id',OLD.song_song_structure_id,'language_id',OLD.language_id,	'number',OLD.number,'content',	OLD.content	)
    )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `lyric_log`
--

CREATE TABLE `lyric_log` (
  `lyric_log_id` bigint(20) UNSIGNED NOT NULL,
  `lyric_id` bigint(20) UNSIGNED NOT NULL,
  `old` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `page`
--

CREATE TABLE `page` (
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `checkpoint_id` bigint(20) UNSIGNED NOT NULL,
  `layout_id` smallint(5) UNSIGNED NOT NULL,
  `content` text NOT NULL,
  `number` tinyint(3) UNSIGNED NOT NULL,
  `background` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `page`
--
DELIMITER $$
CREATE TRIGGER `log_page_update` AFTER UPDATE ON `page` FOR EACH ROW INSERT INTO page_log(page_id, old)
VALUES(
    NEW.page_id,
    json_object('checkpoint_id',OLD.checkpoint_id,	'layout_id',OLD.layout_id,	'content',OLD.content,	'number',OLD.number,'background',OLD.background)
    )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `page_log`
--

CREATE TABLE `page_log` (
  `page_log_id` bigint(20) UNSIGNED NOT NULL,
  `page_id` bigint(20) UNSIGNED NOT NULL,
  `old` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `section`
--

CREATE TABLE `section` (
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `slide_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `number` tinyint(3) UNSIGNED NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `section`
--
DELIMITER $$
CREATE TRIGGER `log_section_update` AFTER UPDATE ON `section` FOR EACH ROW INSERT INTO section_log(section_id, old)
VALUES(
    NEW.section_id,
    json_object('slide_id',OLD.slide_id,	'name',OLD.name,	'number',OLD.number)
    )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `section_log`
--

CREATE TABLE `section_log` (
  `section_log_id` bigint(20) UNSIGNED NOT NULL,
  `section_id` bigint(20) UNSIGNED NOT NULL,
  `old` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `slide`
--

CREATE TABLE `slide` (
  `slide_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `slide`
--
DELIMITER $$
CREATE TRIGGER `log_slide_update` AFTER UPDATE ON `slide` FOR EACH ROW INSERT INTO slide_log(slide_id, old)
VALUES(
    NEW.slide_id,
    json_object('name',OLD.name)
    )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `slide_log`
--

CREATE TABLE `slide_log` (
  `slide_log_id` bigint(20) UNSIGNED NOT NULL,
  `slide_id` bigint(20) UNSIGNED NOT NULL,
  `old` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `song`
--

CREATE TABLE `song` (
  `song_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `song`
--
DELIMITER $$
CREATE TRIGGER `log_song_update` AFTER UPDATE ON `song` FOR EACH ROW INSERT INTO song_log(song_id, old)
VALUES(
    NEW.song_id,
    json_object('name',OLD.name)
    )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `song_language`
--

CREATE TABLE `song_language` (
  `song_language_id` bigint(20) UNSIGNED NOT NULL,
  `song_id` bigint(20) UNSIGNED NOT NULL,
  `language_id` tinyint(3) UNSIGNED NOT NULL,
  `title` varchar(255) NOT NULL,
  `writer` varchar(255) NOT NULL,
  `singable` tinyint(1) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `song_language`
--
DELIMITER $$
CREATE TRIGGER `log_song_language_update` AFTER UPDATE ON `song_language` FOR EACH ROW INSERT INTO song_language_log(song_language_id, old)
VALUES(
    NEW.song_language_id,
    json_object('song_id', OLD.song_id,	'language_id', OLD.language_id,	'title', OLD.title,	'writer',OLD.writer,	'singable',OLD.singable)
    )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `song_language_log`
--

CREATE TABLE `song_language_log` (
  `song_language_log_id` bigint(20) UNSIGNED NOT NULL,
  `song_language_id` bigint(20) UNSIGNED NOT NULL,
  `old` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `song_log`
--

CREATE TABLE `song_log` (
  `song_log_id` bigint(20) UNSIGNED NOT NULL,
  `song_id` bigint(20) UNSIGNED NOT NULL,
  `old` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `song_song_structure`
--

CREATE TABLE `song_song_structure` (
  `song_song_structure_id` bigint(20) UNSIGNED NOT NULL,
  `song_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `song_song_structure`
--
DELIMITER $$
CREATE TRIGGER `log_song_song_structure_update` AFTER UPDATE ON `song_song_structure` FOR EACH ROW INSERT INTO song_song_structure_log(song_song_structure_id, old)
VALUES(
    NEW.song_song_structure_id,
    json_object('song_id', OLD.song_id,'name',OLD.name)
    )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `song_song_structure_log`
--

CREATE TABLE `song_song_structure_log` (
  `song_song_structure_log_id` bigint(20) UNSIGNED NOT NULL,
  `song_song_structure_id` bigint(20) UNSIGNED NOT NULL,
  `old` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `song_structure`
--

CREATE TABLE `song_structure` (
  `song_structure_id` tinyint(3) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `modified_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `song_structure`
--
DELIMITER $$
CREATE TRIGGER `log_song_structure_update` AFTER UPDATE ON `song_structure` FOR EACH ROW INSERT INTO song_structure_log(song_structure_id, old)
VALUES(
    NEW.song_structure_id,
    json_object('name',OLD.name)
    )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `song_structure_log`
--

CREATE TABLE `song_structure_log` (
  `song_structure_log_id` bigint(20) UNSIGNED NOT NULL,
  `song_structure_id` tinyint(3) UNSIGNED NOT NULL,
  `old` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` datetime DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Triggers `user`
--
DELIMITER $$
CREATE TRIGGER `log_user_update` AFTER UPDATE ON `user` FOR EACH ROW INSERT INTO user_log(user_id, old)
VALUES(
    NEW.user_id,
    json_object('username',OLD.username,'email',OLD.email,'password',OLD.password)
    )
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user_log`
--

CREATE TABLE `user_log` (
  `user_log_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `old` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `checkpoint`
--
ALTER TABLE `checkpoint`
  ADD PRIMARY KEY (`checkpoint_id`),
  ADD KEY `slide_id` (`section_id`);

--
-- Indexes for table `checkpoint_log`
--
ALTER TABLE `checkpoint_log`
  ADD PRIMARY KEY (`checkpoint_log_id`),
  ADD KEY `checkpoint_id` (`checkpoint_id`) USING BTREE;

--
-- Indexes for table `language`
--
ALTER TABLE `language`
  ADD PRIMARY KEY (`language_id`);

--
-- Indexes for table `language_log`
--
ALTER TABLE `language_log`
  ADD PRIMARY KEY (`language_log_id`),
  ADD KEY `song_structure_id` (`language_id`) USING BTREE;

--
-- Indexes for table `layout`
--
ALTER TABLE `layout`
  ADD PRIMARY KEY (`layout_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `layout_log`
--
ALTER TABLE `layout_log`
  ADD PRIMARY KEY (`layout_log_id`),
  ADD KEY `layout_id` (`layout_id`) USING BTREE;

--
-- Indexes for table `lyric`
--
ALTER TABLE `lyric`
  ADD PRIMARY KEY (`lyric_id`),
  ADD KEY `song_song_structure_id` (`song_song_structure_id`),
  ADD KEY `language_id` (`language_id`);

--
-- Indexes for table `lyric_log`
--
ALTER TABLE `lyric_log`
  ADD PRIMARY KEY (`lyric_log_id`),
  ADD KEY `page_id` (`lyric_id`) USING BTREE;

--
-- Indexes for table `page`
--
ALTER TABLE `page`
  ADD PRIMARY KEY (`page_id`),
  ADD KEY `checkpoint_id` (`checkpoint_id`),
  ADD KEY `layout_id` (`layout_id`);

--
-- Indexes for table `page_log`
--
ALTER TABLE `page_log`
  ADD PRIMARY KEY (`page_log_id`),
  ADD KEY `page_id` (`page_id`) USING BTREE;

--
-- Indexes for table `section`
--
ALTER TABLE `section`
  ADD PRIMARY KEY (`section_id`),
  ADD KEY `slide_id` (`slide_id`);

--
-- Indexes for table `section_log`
--
ALTER TABLE `section_log`
  ADD PRIMARY KEY (`section_log_id`),
  ADD KEY `section_id` (`section_id`) USING BTREE;

--
-- Indexes for table `slide`
--
ALTER TABLE `slide`
  ADD PRIMARY KEY (`slide_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `slide_log`
--
ALTER TABLE `slide_log`
  ADD PRIMARY KEY (`slide_log_id`),
  ADD KEY `slide_id` (`slide_id`);

--
-- Indexes for table `song`
--
ALTER TABLE `song`
  ADD PRIMARY KEY (`song_id`);

--
-- Indexes for table `song_language`
--
ALTER TABLE `song_language`
  ADD PRIMARY KEY (`song_language_id`),
  ADD UNIQUE KEY `song_id` (`song_id`,`language_id`) USING BTREE,
  ADD KEY `song_language_ibfk_2` (`language_id`);

--
-- Indexes for table `song_language_log`
--
ALTER TABLE `song_language_log`
  ADD PRIMARY KEY (`song_language_log_id`),
  ADD KEY `slide_id` (`song_language_id`);

--
-- Indexes for table `song_log`
--
ALTER TABLE `song_log`
  ADD PRIMARY KEY (`song_log_id`),
  ADD KEY `song_id` (`song_id`) USING BTREE;

--
-- Indexes for table `song_song_structure`
--
ALTER TABLE `song_song_structure`
  ADD PRIMARY KEY (`song_song_structure_id`),
  ADD KEY `song_id` (`song_id`);

--
-- Indexes for table `song_song_structure_log`
--
ALTER TABLE `song_song_structure_log`
  ADD PRIMARY KEY (`song_song_structure_log_id`),
  ADD KEY `song_song_structure_id` (`song_song_structure_id`) USING BTREE;

--
-- Indexes for table `song_structure`
--
ALTER TABLE `song_structure`
  ADD PRIMARY KEY (`song_structure_id`),
  ADD UNIQUE KEY `name` (`name`);

--
-- Indexes for table `song_structure_log`
--
ALTER TABLE `song_structure_log`
  ADD PRIMARY KEY (`song_structure_log_id`),
  ADD KEY `song_structure_id` (`song_structure_id`) USING BTREE;

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `username` (`username`),
  ADD KEY `email` (`email`);

--
-- Indexes for table `user_log`
--
ALTER TABLE `user_log`
  ADD PRIMARY KEY (`user_log_id`),
  ADD KEY `user_id` (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `checkpoint`
--
ALTER TABLE `checkpoint`
  MODIFY `checkpoint_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `checkpoint_log`
--
ALTER TABLE `checkpoint_log`
  MODIFY `checkpoint_log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `language`
--
ALTER TABLE `language`
  MODIFY `language_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `language_log`
--
ALTER TABLE `language_log`
  MODIFY `language_log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `layout`
--
ALTER TABLE `layout`
  MODIFY `layout_id` smallint(5) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `layout_log`
--
ALTER TABLE `layout_log`
  MODIFY `layout_log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lyric`
--
ALTER TABLE `lyric`
  MODIFY `lyric_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `lyric_log`
--
ALTER TABLE `lyric_log`
  MODIFY `lyric_log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `page`
--
ALTER TABLE `page`
  MODIFY `page_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `page_log`
--
ALTER TABLE `page_log`
  MODIFY `page_log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `section`
--
ALTER TABLE `section`
  MODIFY `section_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `section_log`
--
ALTER TABLE `section_log`
  MODIFY `section_log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `slide`
--
ALTER TABLE `slide`
  MODIFY `slide_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `slide_log`
--
ALTER TABLE `slide_log`
  MODIFY `slide_log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `song`
--
ALTER TABLE `song`
  MODIFY `song_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `song_language`
--
ALTER TABLE `song_language`
  MODIFY `song_language_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `song_language_log`
--
ALTER TABLE `song_language_log`
  MODIFY `song_language_log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `song_log`
--
ALTER TABLE `song_log`
  MODIFY `song_log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `song_song_structure_log`
--
ALTER TABLE `song_song_structure_log`
  MODIFY `song_song_structure_log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `song_structure`
--
ALTER TABLE `song_structure`
  MODIFY `song_structure_id` tinyint(3) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `song_structure_log`
--
ALTER TABLE `song_structure_log`
  MODIFY `song_structure_log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `user_log`
--
ALTER TABLE `user_log`
  MODIFY `user_log_id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `checkpoint`
--
ALTER TABLE `checkpoint`
  ADD CONSTRAINT `checkpoint_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `section` (`section_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `checkpoint_log`
--
ALTER TABLE `checkpoint_log`
  ADD CONSTRAINT `checkpoint_log_ibfk_1` FOREIGN KEY (`checkpoint_id`) REFERENCES `checkpoint` (`checkpoint_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `language_log`
--
ALTER TABLE `language_log`
  ADD CONSTRAINT `language_log_ibfk_1` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `layout_log`
--
ALTER TABLE `layout_log`
  ADD CONSTRAINT `layout_log_ibfk_1` FOREIGN KEY (`layout_id`) REFERENCES `layout` (`layout_id`);

--
-- Constraints for table `lyric`
--
ALTER TABLE `lyric`
  ADD CONSTRAINT `lyric_ibfk_1` FOREIGN KEY (`song_song_structure_id`) REFERENCES `song_song_structure` (`song_song_structure_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `lyric_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `lyric_log`
--
ALTER TABLE `lyric_log`
  ADD CONSTRAINT `lyric_log_ibfk_1` FOREIGN KEY (`lyric_id`) REFERENCES `lyric` (`lyric_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `page`
--
ALTER TABLE `page`
  ADD CONSTRAINT `page_ibfk_1` FOREIGN KEY (`checkpoint_id`) REFERENCES `checkpoint` (`checkpoint_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `page_ibfk_2` FOREIGN KEY (`layout_id`) REFERENCES `layout` (`layout_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `page_log`
--
ALTER TABLE `page_log`
  ADD CONSTRAINT `page_log_ibfk_1` FOREIGN KEY (`page_id`) REFERENCES `page` (`page_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `section`
--
ALTER TABLE `section`
  ADD CONSTRAINT `section_ibfk_1` FOREIGN KEY (`slide_id`) REFERENCES `slide` (`slide_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `section_log`
--
ALTER TABLE `section_log`
  ADD CONSTRAINT `section_log_ibfk_1` FOREIGN KEY (`section_id`) REFERENCES `section` (`section_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `slide_log`
--
ALTER TABLE `slide_log`
  ADD CONSTRAINT `slide_log_ibfk_1` FOREIGN KEY (`slide_id`) REFERENCES `slide` (`slide_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `song_language`
--
ALTER TABLE `song_language`
  ADD CONSTRAINT `song_language_ibfk_1` FOREIGN KEY (`song_id`) REFERENCES `song` (`song_id`) ON DELETE NO ACTION ON UPDATE CASCADE,
  ADD CONSTRAINT `song_language_ibfk_2` FOREIGN KEY (`language_id`) REFERENCES `language` (`language_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `song_language_log`
--
ALTER TABLE `song_language_log`
  ADD CONSTRAINT `song_language_log_ibfk_1` FOREIGN KEY (`song_language_id`) REFERENCES `song_language` (`song_language_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `song_log`
--
ALTER TABLE `song_log`
  ADD CONSTRAINT `song_ibfk_1` FOREIGN KEY (`song_id`) REFERENCES `song` (`song_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `song_song_structure`
--
ALTER TABLE `song_song_structure`
  ADD CONSTRAINT `song_structure_ibfk_1` FOREIGN KEY (`song_id`) REFERENCES `song` (`song_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `song_song_structure_log`
--
ALTER TABLE `song_song_structure_log`
  ADD CONSTRAINT `song_song_structure_log_ibfk_1` FOREIGN KEY (`song_song_structure_id`) REFERENCES `song_song_structure` (`song_song_structure_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `song_structure_log`
--
ALTER TABLE `song_structure_log`
  ADD CONSTRAINT `song_structure_log_ibfk_1` FOREIGN KEY (`song_structure_id`) REFERENCES `song_structure` (`song_structure_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

--
-- Constraints for table `user_log`
--
ALTER TABLE `user_log`
  ADD CONSTRAINT `user_log_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`user_id`) ON DELETE NO ACTION ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
