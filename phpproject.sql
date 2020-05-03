-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3308
-- Generation Time: Apr 24, 2020 at 05:50 PM
-- Server version: 8.0.18
-- PHP Version: 7.3.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `phpproject`
--

-- --------------------------------------------------------

--
-- Table structure for table `chat`
--

DROP TABLE IF EXISTS `chat`;
CREATE TABLE IF NOT EXISTS `chat` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `read` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=19 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `chat`
--

INSERT INTO `chat` (`id`, `sender`, `receiver`, `message`, `timestamp`, `read`) VALUES
(1, 33, 12, 'hello', '2020-04-06 14:32:13', 0),
(2, 33, 34, 'wat is je naam?', '2020-04-06 14:52:06', 0),
(3, 33, 34, 'hello', '2020-04-06 15:01:15', 0),
(4, 33, 34, 'banaan', '2020-04-06 15:04:07', 0),
(5, 34, 33, 'jaaaaa!', '2020-04-06 15:19:32', 1),
(6, 33, 34, 'hello', '2020-04-06 15:40:05', 0),
(7, 33, 34, 'myy', '2020-04-06 15:40:11', 0),
(8, 33, 34, 'ddffd', '2020-04-06 15:52:34', 0),
(9, 33, 34, 'walrus', '2020-04-06 15:58:18', 0),
(10, 33, 34, 'ffddfsdf', '2020-04-06 16:02:50', 0),
(11, 33, 34, 'hello', '2020-04-06 16:06:32', 0),
(12, 33, 34, 'how', '2020-04-06 16:06:37', 0),
(13, 33, 12, 'hi', '2020-04-14 09:50:12', 0),
(14, 33, 12, 'hello', '2020-04-14 09:51:09', 0),
(15, 33, 12, 'hoow', '2020-04-14 09:51:57', 0),
(16, 33, 12, 'hello', '2020-04-14 09:52:58', 0),
(17, 33, 12, 'zzzi', '2020-04-14 09:54:22', 0),
(18, 33, 12, 'sss', '2020-04-14 09:54:50', 0);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

DROP TABLE IF EXISTS `comments`;
CREATE TABLE IF NOT EXISTS `comments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `comment` varchar(300) NOT NULL,
  `commentId` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `comment`, `commentId`) VALUES
(1, 'Place a comment', 19),
(2, 'Place a comment', 19),
(3, 'test', 19),
(4, 'nog een test', 19),
(5, 'dat kan zeker', 14),
(6, 'dat kan zeker', 14),
(7, '<script>alert(\"Hello! I am an alert box!!\");</script>', 19),
(8, '🏎🏎🏎🏎', 19),
(9, '😁', 19),
(10, 'hier is nog een comment', 18),
(11, 'hier is een comment', 21),
(12, 'nog iets', 19);

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `question` varchar(300) NOT NULL,
  `pinned` tinyint(1) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=22 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `question`, `pinned`) VALUES
(18, 'hier is nog een vraag?', 0),
(17, 'is dees ook eeen vraag?', 0),
(15, 'dit is een vraag toch?', 0),
(14, 'Kan ik een vraag stellen?', 0),
(19, 'wat als hier een script is? <script>alert(\"Hello! I am an alert box!!\");</script>', 0),
(20, 'een nieuwe vraag', 0),
(21, 'nog een vraagje?', 1);

-- --------------------------------------------------------

--
-- Table structure for table `requests`
--

DROP TABLE IF EXISTS `requests`;
CREATE TABLE IF NOT EXISTS `requests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `reason` text NOT NULL,
  `active` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=47 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `requests`
--

INSERT INTO `requests` (`id`, `sender`, `receiver`, `reason`, `active`) VALUES
(45, 12, 33, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(300) NOT NULL,
  `firstName` varchar(300) NOT NULL,
  `lastName` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `moderator` int(1) NOT NULL,
  `music` varchar(300) NOT NULL DEFAULT 'Make a choice',
  `movies` varchar(300) NOT NULL DEFAULT 'Make a choice',
  `games` varchar(300) NOT NULL DEFAULT 'Make a choice',
  `tvShows` varchar(300) NOT NULL DEFAULT 'Make a choice',
  `books` varchar(300) NOT NULL DEFAULT 'Make a choice',
  `buddy` varchar(300) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL DEFAULT 'Make a choice',
  `buddyId` int(11) NOT NULL,
  `description` varchar(300) NOT NULL,
  `avatar` varchar(300) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=45 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `firstName`, `lastName`, `password`, `moderator`, `music`, `movies`, `games`, `tvShows`, `books`, `buddy`, `buddyId`, `description`, `avatar`) VALUES
(12, 'amber.waltens@student.thomasmore.be', 'Amber', 'Waltens', '$2y$16$Yj5Zor0gjvvNoZ6JTGLnpeCXOTx8xmZwxQ79Jgc/Phcc3nrrVnxNC', 0, '', '', '', '', '', 'Maak een keuze', 0, 'hehehehe', ''),
(13, 'r0696794@student.thomasmore.be', 'Mae-ly', 'Waltens', '$2y$16$21sY0VvpYLtEEO6v18EPJuQ1sQEI0o.3JNpak6lMML.r6H.nwBejy', 0, '', '', '', '', '', 'Maak een keuze', 0, '', ''),
(26, 'test@thomasmore.be', 'Maarten', 'Wegner', '$2y$14$MnxoB4VYfdJ72ig8nia.settmRMzFfwzllsszfz9o2Vl/nv/GjpXO', 0, 'Rock', 'Western', 'Sandbox', 'Vlaamse series', 'Romantiek', 'Maak een keuze', 0, '', ''),
(31, 'clean@student.thomasmore.be', 'Joris', 'Clean', '$2y$16$bG3PXZvFareGFAToi0TB.erZrrfNKQpR.hRAkykT37nbN.j/Frob6', 0, 'Jazz', 'Avonturenfilm', 'First-person', 'Quiz', 'Detectieve', 'Ik wil een buddy die mij helpt', 0, '', ''),
(32, 'r0706426@student.thomasmore.be', 'Glenn', 'Van Laere', '$2y$16$NuXBpu.OyUBQ0LSrzh8ThupJkrLmRlDgf8zNw1umNxXYfLV2B7Zy.', 0, 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 0, '', ''),
(33, 'r0745699@student.thomasmore.be', 'Wannes', 'Verboven', '$2y$16$7C3Ebdor5PeQUevuTu4pWeQNQYfj1aMMOUcjZWX46ePD9r.tPLBsy', 0, 'Jazz', 'Comedy', 'Action', 'News', 'Action', 'I want to be a buddy', 0, 'here comes your description', ''),
(34, 'Hello@student.thomasmore.be', 'Hello', 'Hi', '$2y$16$JYk6fkgunu/GWnnv6XFDZekKrUksy9ce51IDXNISLGqsBHSSQJlj.', 0, 'Classic', 'Comedy', 'Adventure', 'Dutch series', 'Comics', 'I am searching a buddy', 0, 'here comes your description', ''),
(35, 'debomb@student.thomasmore.be', 'tim', 'de Bakker', '$2y$16$rmApKGpdrBLrz7kUE2WX7eOd1R7baDtCI7aokt/SGpaMhDuhAlHQi', 0, 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 0, ' descirption... ', 'uploads/5e89fdeb7c6b52.43498168.jpg'),
(36, 'studiosviper@student.thomasmore.be', 'Glenn', 'vl', '$2y$16$MWEC/3LqP.U2F00I4NG8P.HxjNaWXwEwqRKsMyxQIRrCsN9fciReS', 0, 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 0, 'test', ''),
(37, 'theragebeat998@student.thomasmore.be', 'Dobbenie', 'Karla', '$2y$16$NLBHEJkXO/s5w4deDNijp.vthMs89VnrcZe7SHP.JWuR3cFovU5HW', 0, 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 38, 'here comes your description', ''),
(38, 'r07456992@student.thomasmore.be', 'Wannes2', 'Verboven', '$2y$16$KOHEirEzC0gNl9sudxxH.ui6ji/THOvgbt7kmo4UB7DB6gUZhjfEq', 0, 'Electro', 'Make a choice', 'First-person', 'Other', 'Comedy', 'I am searching a buddy', 37, 'here comes your description', 'uploads/standard.png'),
(41, 'bla@student.thomasmore.be', 'Wannes', 'Verboven', '$2y$16$GeTMKmS87DZP5vstjRkGZu975cVdFqdm66kGCYF1CnQqwzPBj1SfC', 0, 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 0, 'here comes your description', 'uploads/standard.png'),
(42, 'greg@student.thomasmore.be', 'Greg', 'Moderator', '$2y$16$J367Sy60wfMr75aTANwMkOdO6SaG0myjpCz2wx6XWVNSRmHYqp0ui', 1, 'Electro', 'Action', 'Action', 'American series', 'Action', 'I am searching a buddy', 0, 'here comes your description', 'uploads/standard.png'),
(43, 'rnummer@student.thomasmore.be', 'rnummer', 'student', '$2y$16$N786IRT8U78pkajGkp5r/.gbijQpsym/cIIfbysHTQuO7tRsGezVi', 1, 'Electro', 'Action', 'Action', 'American series', 'Action', 'I am searching a buddy', 0, 'here comes your description', 'uploads/standard.png');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
