-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 29 apr 2020 om 16:11
-- Serverversie: 10.4.11-MariaDB
-- PHP-versie: 7.4.3

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
-- Tabelstructuur voor tabel `chat`
--

CREATE TABLE `chat` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp(),
  `read` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `chat`
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
(13, 39, 12, 'appel', '2020-04-24 12:14:52', 0),
(14, 39, 12, 'peer', '2020-04-24 12:49:39', 0);

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL,
  `reason` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `requests`
--

INSERT INTO `requests` (`id`, `sender`, `receiver`, `reason`) VALUES
(1, 13, 26, ''),
(4, 33, 34, '');

-- --------------------------------------------------------

--
-- Tabelstructuur voor tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `firstName` varchar(300) NOT NULL,
  `lastName` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `securityQuestion` varchar(600) NOT NULL,
  `securityAwnser` varchar(600) NOT NULL,
  `failedAttempts` int(11) NOT NULL DEFAULT 1,
  `music` varchar(300) NOT NULL DEFAULT 'Make a choice',
  `movies` varchar(300) NOT NULL DEFAULT 'Make a choice',
  `games` varchar(300) NOT NULL DEFAULT 'Make a choice',
  `tvShows` varchar(300) NOT NULL DEFAULT 'Make a choice',
  `books` varchar(300) NOT NULL DEFAULT 'Make a choice',
  `buddy` varchar(300) CHARACTER SET armscii8 NOT NULL DEFAULT 'Make a choice',
  `buddyId` int(11) NOT NULL,
  `description` varchar(300) NOT NULL,
  `avatar` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `firstName`, `lastName`, `password`, `securityQuestion`, `securityAwnser`, `failedAttempts`, `music`, `movies`, `games`, `tvShows`, `books`, `buddy`, `buddyId`, `description`, `avatar`) VALUES
(12, 'amber.waltens@student.thomasmore.be', 'Amber', 'Waltens', '$2y$16$Yj5Zor0gjvvNoZ6JTGLnpeCXOTx8xmZwxQ79Jgc/Phcc3nrrVnxNC', '', '', 1, '', '', '', '', '', 'Maak een keuze', 34, 'hehehehe', 'uploads/standard.png'),
(13, 'r0696794@student.thomasmore.be', 'Mae-ly', 'Waltens', '$2y$16$21sY0VvpYLtEEO6v18EPJuQ1sQEI0o.3JNpak6lMML.r6H.nwBejy', '', '', 0, '', '', '', '', '', 'Maak een keuze', 0, 'here comes your description', 'uploads/standard.png'),
(26, 'test@thomasmore.be', 'Maarten', 'Wegner', '$2y$14$MnxoB4VYfdJ72ig8nia.settmRMzFfwzllsszfz9o2Vl/nv/GjpXO', '', '', 0, 'Rock', 'Western', 'Sandbox', 'Vlaamse series', 'Romantiek', 'Maak een keuze', 0, '', ''),
(27, 'greg@student.thomasmore.be', 'Greg', 'Max', '$2y$14$XRAlnE2iB6PC0N9ViUoZDOPPnZFQ1k0KAid9FxbRUl56BttMjk/2y', '', '', 0, 'Klassieke', 'Superheldenfilm', 'Actie', 'Quiz', 'Comedy', 'I want to be a buddy', 0, '', ''),
(30, 'rnummer@student.thomasmore.be', 'Greg', 'Max', '$2y$16$2TEJAnQP/.zyeMVryMWaiOZ6vbJ6cM/Cv33c15Ya2AqbcxUljCe2e', '', '', 0, 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'I am searching a buddy', 0, '', ''),
(31, 'clean@student.thomasmore.be', 'Joris', 'Clean', '$2y$16$bG3PXZvFareGFAToi0TB.erZrrfNKQpR.hRAkykT37nbN.j/Frob6', '', '', 0, 'Jazz', 'Avonturenfilm', 'First-person', 'Quiz', 'Detectieve', 'Ik wil een buddy die mij helpt', 0, '', ''),
(32, 'r0706426@student.thomasmore.be', 'Glenn', 'Van Laere', '$2y$16$NuXBpu.OyUBQ0LSrzh8ThupJkrLmRlDgf8zNw1umNxXYfLV2B7Zy.', '', '', 0, 'Jazz', 'Comedy', 'Sandbox', 'Sport', 'Comics', 'I am searching a buddy', 0, '', ''),
(33, 'r0745699@student.thomasmore.be', 'Wannes', 'Verboven', '$2y$16$7C3Ebdor5PeQUevuTu4pWeQNQYfj1aMMOUcjZWX46ePD9r.tPLBsy', '', '', 0, 'Jazz', 'Comedy', 'Action', 'News', 'Action', 'I want to be a buddy', 0, 'here comes your description', ''),
(34, 'Hello@student.thomasmore.be', 'Hello', 'Hi', '$2y$16$JYk6fkgunu/GWnnv6XFDZekKrUksy9ce51IDXNISLGqsBHSSQJlj.', '', '', 0, 'Classic', 'Comedy', 'Adventure', 'Dutch series', 'Comics', 'I am searching a buddy', 12, 'here comes your description', ''),
(35, 'debomb@student.thomasmore.be', 'tim', 'de Bakker', '$2y$16$rmApKGpdrBLrz7kUE2WX7eOd1R7baDtCI7aokt/SGpaMhDuhAlHQi', '', '', 0, 'Hiphop', 'Animation', 'First-person', 'News', 'Comics', 'I want to be a buddy', 0, ' descirption... ', 'uploads/5e89fdeb7c6b52.43498168.jpg'),
(36, 'studiosviper@student.thomasmore.be', 'Glenn', 'vl', '$2y$16$MWEC/3LqP.U2F00I4NG8P.HxjNaWXwEwqRKsMyxQIRrCsN9fciReS', '', '', 0, 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 0, 'test', ''),
(37, 'theragebeat998@student.thomasmore.be', 'Dobbenie', 'Karla', '$2y$16$NLBHEJkXO/s5w4deDNijp.vthMs89VnrcZe7SHP.JWuR3cFovU5HW', '', '', 0, 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 0, 'here comes your description', ''),
(38, 'appel@student.thomasmore.be', 'peer', 'appel', '$2y$16$g/ZddOnQiFj4S.r0uug6oulbUIgMdydrF8drdew7bUBs9qaj1Ndou', '', '', 0, 'Jazz', 'Crime', 'First-person', 'Dutch series', 'Drama', 'I want to be a buddy', 0, 'here comes your description', 'uploads/standard.png'),
(42, 'peertje@student.thomasmore.be', 'Glenn', 'Van Laere', '$2y$16$/juFUefDsElBwevlhQkUQOOdkhfXc1YP/IL40wuezNara2iSLfbpq', 'What is your favourite book? ', 'appel', 0, 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 0, 'here comes your description', 'uploads/standard.png'),
(43, 'jan@student.thomasmore.be', 'Glenn', 'Van Laere', '$2y$16$Ho/EsG6tdOnes4jWsUVC..hEm7mP0nKKAAvvKR33bDqOcCqMiz26G', 'What is your favourite book? ', 'The davinci Code', 0, 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 0, 'here comes your description', 'uploads/standard.png');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `chat`
--
ALTER TABLE `chat`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `requests`
--
ALTER TABLE `requests`
  ADD PRIMARY KEY (`id`);

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `chat`
--
ALTER TABLE `chat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT voor een tabel `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
