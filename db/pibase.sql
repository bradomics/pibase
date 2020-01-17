-- phpMyAdmin SQL Dump
-- version 4.6.6deb5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jan 13, 2020 at 10:04 PM
-- Server version: 10.0.28-MariaDB-2+b1
-- PHP Version: 7.3.11-1~deb10u1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pibase`
--
CREATE DATABASE IF NOT EXISTS `pibase` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `pibase`;

-- --------------------------------------------------------

--
-- Table structure for table `apiKeys`
--

CREATE TABLE `apiKeys` (
  `apiKeyId` int(11) NOT NULL,
  `googleAPIKey` varchar(100) NOT NULL DEFAULT 'googleAPIKey',
  `owmAPIKey` varchar(100) NOT NULL DEFAULT 'owmAPIKey',
  `twitterConsumerAPIKey` varchar(100) NOT NULL DEFAULT 'twitterAPIKey',
  `twitterConsumerSecretAPIKey` varchar(200) NOT NULL DEFAULT 'twitterConsumerSecretAPIKey',
  `twitterAccessToken` varchar(200) NOT NULL DEFAULT 'twitterAccessToken',
  `twitterAccessTokenSecret` varchar(200) NOT NULL DEFAULT 'twitterAccessTokenSecret'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `apiKeys`
--

INSERT INTO `apiKeys` (`apiKeyId`, `googleAPIKey`, `owmAPIKey`, `twitterConsumerAPIKey`, `twitterConsumerSecretAPIKey`, `twitterAccessToken`, `twitterAccessTokenSecret`) VALUES
(1, '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `appSettings`
--

CREATE TABLE `appSettings` (
  `appSettingId` int(11) NOT NULL,
  `appName` varchar(100) NOT NULL DEFAULT 'PiBase',
  `theme` varchar(40) NOT NULL DEFAULT 'light',
  `backgroundImage` varchar(100) NOT NULL DEFAULT 'backgroundImage',
  `screenChangeInterval` varchar(10) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `appSettings`
--

INSERT INTO `appSettings` (`appSettingId`, `appName`, `theme`, `backgroundImage` `screenChangeInterval`) VALUES
(1, 'PiBase', 'light', '', '0');

-- --------------------------------------------------------


-- --------------------------------------------------------

--

--
-- Table structure for table `mapSettings`
--

CREATE TABLE `mapSettings` (
  `mapSettingId` int(11) NOT NULL,
  `homeAddress` varchar(100) NOT NULL DEFAULT 'homeAddress',
  `homeCity` varchar(100) NOT NULL DEFAULT 'homeCity',
  `homeState` varchar(100) NOT NULL DEFAULT 'homeState',
  `homeZip` varchar(40) NOT NULL DEFAULT '78704',
  `workAddress` varchar(100) NOT NULL DEFAULT 'workAddress',
  `workCity` varchar(100) NOT NULL DEFAULT 'workCity',
  `workState` varchar(100) NOT NULL DEFAULT 'workState',
  `workZip` varchar(40) NOT NULL DEFAULT '78704',
  `zoomLevel` int(10) NOT NULL DEFAULT '15',
  `transitMode` varchar(40) NOT NULL DEFAULT 'driving'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mapSettings`
--

INSERT INTO `mapSettings` (`mapSettingId`, `homeAddress`, `homeCity`, `homeState`, `homeZip`, `workAddress`, `workCity`, `workState`, `workZip`, `zoomLevel`, `transitMode`) VALUES
(1, '123 Broadway St', 'Austin', 'TX', '78702', '701 Brazos St.', 'Austin', 'TX', '78701', 14, 'driving');

-- --------------------------------------------------------

--
-- Table structure for table `newsSettings`
--

CREATE TABLE `newsSettings` (
  `newsSettingId` int(11) NOT NULL,
  `sourceCNN` varchar(12) NOT NULL DEFAULT 'true',
  `sourceCBS` varchar(12) NOT NULL DEFAULT 'true',
  `sourceNBC` varchar(12) NOT NULL DEFAULT 'true',
  `sourceFox` varchar(12) NOT NULL DEFAULT 'true',
  `sourceYahoo` varchar(12) NOT NULL DEFAULT 'true',
  `showTrendingTwitterTopics` varchar(12) NOT NULL DEFAULT 'true',
  `showTopRedditPosts` varchar(12) NOT NULL DEFAULT 'true'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `newsSettings`
--

INSERT INTO `newsSettings` (`newsSettingId`, `sourceCNN`, `sourceCBS`, `sourceNBC`, `sourceFox`, `sourceYahoo`, `showTrendingTwitterTopics`, `showTopRedditPosts`) VALUES
(1, 'true', 'true', 'true', 'true', 'true', 'true', 'true');

-- --------------------------------------------------------


--
-- Table structure for table `weatherSettings`
--

CREATE TABLE `weatherSettings` (
  `weatherSettingId` int(11) NOT NULL,
  `weatherZipCode` varchar(16) NOT NULL DEFAULT 'weatherZipCode',
  `temperatureUnits` varchar(24) NOT NULL DEFAULT 'Fahrenheit'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `weatherSettings`
--

INSERT INTO `weatherSettings` (`weatherSettingId`, `weatherZipCode`, `temperatureUnits`) VALUES
(1, '78702', 'Fahrenheit');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `apiKeys`
--
ALTER TABLE `apiKeys`
  ADD PRIMARY KEY (`apiKeyId`);

--
-- Indexes for table `appSettings`
--
ALTER TABLE `appSettings`
  ADD PRIMARY KEY (`appSettingId`);

--
-- Indexes for table `mapSettings`
--
ALTER TABLE `mapSettings`
  ADD PRIMARY KEY (`mapSettingId`);

--
-- Indexes for table `newsSettings`
--
ALTER TABLE `newsSettings`
  ADD PRIMARY KEY (`newsSettingId`);
--
-- Indexes for table `weatherSettings`
--
ALTER TABLE `weatherSettings`
  ADD PRIMARY KEY (`weatherSettingId`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `apiKeys`
--
ALTER TABLE `apiKeys`
  MODIFY `apiKeyId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `appSettings`
--
ALTER TABLE `appSettings`
  MODIFY `appSettingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `mapSettings`
--
ALTER TABLE `mapSettings`
  MODIFY `mapSettingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `newsSettings`
--
ALTER TABLE `newsSettings`
  MODIFY `newsSettingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `weatherSettings`
--
ALTER TABLE `weatherSettings`
  MODIFY `weatherSettingId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
  
-- Database: `phpmyadmin`
--
CREATE DATABASE IF NOT EXISTS `phpmyadmin` DEFAULT CHARACTER SET utf8 COLLATE utf8_bin;
USE `phpmyadmin`;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
