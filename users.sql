-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2021 at 05:45 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `famousfurnituredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` mediumint(6) UNSIGNED NOT NULL,
  `title` varchar(10) DEFAULT NULL,
  `first_name` varchar(30) NOT NULL,
  `middle_name` varchar(40) NOT NULL,
  `last_name` varchar(40) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` char(60) NOT NULL,
  `phone` char(15) DEFAULT NULL,
  `zcode_pcode` char(10) NOT NULL,
  `country` char(25) NOT NULL,
  `state` char(25) NOT NULL,
  `address1` varchar(50) NOT NULL,
  `address2` varchar(50) NOT NULL,
  `mobile_phone` char(15) NOT NULL,
  `fax` char(15) DEFAULT NULL,
  `registration_date` datetime NOT NULL,
  `user_level` tinyint(1) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `title`, `first_name`, `middle_name`, `last_name`, `email`, `password`, `phone`, `zcode_pcode`, `country`, `state`, `address1`, `address2`, `mobile_phone`, `fax`, `registration_date`, `user_level`) VALUES
(51, 'Sir.', 'Mohammad', 'Hassan', 'Ali', 'malimember@example.com', '$2y$10$Uriq/YCMRhOy.OX26YkYOueXHJaWyOzAgn1ClqOuxaQeYfL.YF48C', '021345678910', 'EX4 4pp', 'Pakistan', 'punjab', 'R-123 Block 1, Fedral A, Area', 'ABC Street', '03132398556', NULL, '2020-12-30 09:03:45', 0),
(52, 'Mr.', 'Mohammad', 'Hassan', 'Ali', 'maliadmin@example.com', '$2y$10$COzhJVOpYMlcinq0v5crz.YZP6Q55nUE8cLNK.NZ74HOqSoJpcGQG', '012347779999', 'EX4 4pp', 'Pakistan', 'punjab', 'F-123, Block-1, Fedral A Area', 'Pani Street', '03132398556', NULL, '2020-12-30 09:31:54', 0),
(54, 'Mr.', 'Mohammad', 'Hassan', 'Iftikhar', 'maliadmin2@example.com', '$2y$10$7g8t6xefyb3H4aYpMEW02uTpa3iOPfduvHu4TnG7Um70yP5vafZQO', '012347779999', 'EX4 4pp', 'Pakistan', 'punjab', 'F-123, Block-1, Fedral A Area', 'Pani Street', '03132398556', NULL, '2020-12-30 09:33:52', 0),
(55, 'Mr.', 'Mohammad', 'Hassan', 'Ali', 'maliadmin4@example.com', '$2y$10$MhdNM0TRFlqr52CpiKLVW.88TtvIRrXVx5yib/r1utQfsFBgNSIWa', '012347779999', 'EX4 4pp', 'Pakistan', 'punjab', 'F-123, Block-1, Fedral A Area', 'Pani Street', '03132398556', NULL, '2020-12-30 09:39:04', 1),
(56, 'Mr.', 'Mohammad', 'Hassan', 'Ali', 'maliadmin5@example.com', '$2y$10$IgNHOEl9kshqoxdIr53.NuLA4cjTo77TD49bdt6JqkK4.OUn3aC/a', '012347779999', 'EX4 4pp', 'Pakistan', 'punjab', 'F-123, Block-1, Fedral A Area', 'Pani Street', '03132398556', NULL, '2020-12-30 09:39:32', 0),
(57, 'Mr.', 'Jack', 'Hassan', 'Smith', 'ms@a.com', '$2y$10$VE8OZqPvE3wGpAAkNZeLje8PS5rHsxQqQZBjEdv232lsOz8D3Xa8K', '01234777888', 'EX2 2pp', 'Pakistan', 'punjab', 'R-123 Block 1, Fedral A, Area', 'ABC Street', '03132398556', NULL, '2020-12-30 11:12:07', 0),
(58, 'Mr.', 'James', 'Hassan', 'Ali', 'jh@exam.com', '$2y$10$Xma/MUzqEUzyOduSQg34weHORCWrOnBneNf98cXFOpJMk4MbzqBvC', '012347779999', 'EX4 4pp', 'Pakistan', 'punjab', 'F-123, Block-1, Fedral A Area', 'Pani Street', '03132398556', NULL, '2020-12-30 11:14:21', 0),
(59, 'Mr.', 'Olive', 'Hassan', 'Ali', 'Oali@example.com', '$2y$10$A/bVAB8PtMS7cjkWYxWYGuEKjPNZz8.cEp81Zr/zq79mwG09aQtQi', '01234777888', 'EX4 4pp', 'Pakistan', 'punjab', 'R-123 Block 1, Fedral A, Area', 'ABC Street', '03132398556', NULL, '2020-12-30 11:15:28', 0),
(60, 'Mr.', 'Annie', 'Hassan', 'Branch', 'anbranch@example.com', '$2y$10$xwwwEBcs2H04V9FCLUXgUOsYaksfEfXBWi6ErhmNHn/.C4Qhevr/m', '012347779999', 'EX4 4pp', 'Pakistan', 'punjab', 'F-123, Block-1, Fedral A Area', 'Pani Street', '03132398556', NULL, '2020-12-30 11:16:42', 0),
(61, 'Mr.', 'Frank', 'Hassan', 'Smith', 'franks@example.com', '$2y$10$2TtbkHEb9XG/ogwELRlJmel53bAJ9SlSWTvfYHjGshcydjGcBV7M6', '012347779999', 'EX4 4pp', 'Pakistan', 'punjab', 'F-123, Block-1, Fedral A Area', 'ABC Street', '03132398556', NULL, '2020-12-30 11:18:40', 0),
(62, 'Mr.', 'Mike', 'Hassan', 'Jected', 'mikeject@example.com', '$2y$10$kDdHSGDkULDxJcbidjISnehc1dRQ.VW7lPjHRAUUMm3nhIRL4F3F.', '012347779999', 'EX2 2pp', 'Pakistan', 'punjab', 'F-123, Block-1, Fedral A Area', 'ABC Street', '03132398556', NULL, '2020-12-30 11:19:47', 0),
(63, 'Mr.', 'Rose', 'Hassan', 'West', 'rowest@example.com', '$2y$10$gaQ0nOr1kVo4ldXl1VwCeOScJJs4dhPJWnjUmn7aKfSZU8y5kAE56', '012347779999', 'EX4 4pp', 'Pakistan', 'punjab', 'C-123, Block-1, Fedral A Area', 'Pani Street', '03132398556', NULL, '2020-12-30 11:20:58', 0),
(64, 'Mr.', 'Mohammad', 'Hassan', 'Ali', 'mhali@example.com', '$2y$10$qdGdPdPOJDtiwQcsT..oxuALEnCce/RFgAomhVw4y5s1uc2wH3kqG', '012347779999', 'EX4 4pp', 'Pakistan', 'punjab', 'A-123, Block-1, Fedral A Area', 'Pani Street', '03132398556', NULL, '2020-12-31 07:57:41', 0),
(65, 'Mr.', 'Dee', 'Hassan', 'Dard', 'dhd@example.com', '$2y$10$hVd0wcYk01.ZoOBIsYEvw.snbjOOsvgTO07dXW41M6PBRRMJz2scG', '012347779999', 'EX1 1pp', 'Pakistan', 'punjab', 'F-123, Block-1, Fedral A Area', 'Pani Street', '03132398556', NULL, '2021-01-01 11:56:14', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` mediumint(6) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
