-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 05 apr 2020 om 17:25
-- Serverversie: 10.1.38-MariaDB
-- PHP-versie: 7.3.2

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
-- Tabelstructuur voor tabel `requests`
--

CREATE TABLE `requests` (
  `id` int(11) NOT NULL,
  `sender` int(11) NOT NULL,
  `receiver` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `requests`
--

INSERT INTO `requests` (`id`, `sender`, `receiver`) VALUES
(1, 13, 26),
(4, 33, 34);

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
  `music` varchar(300) NOT NULL DEFAULT 'Make a choice',
  `movies` varchar(300) NOT NULL DEFAULT 'Make a choice',
  `games` varchar(300) NOT NULL DEFAULT 'Make a choice',
  `tvShows` varchar(300) NOT NULL DEFAULT 'Make a choice',
  `books` varchar(300) NOT NULL DEFAULT 'Make a choice',
  `buddy` varchar(300) CHARACTER SET armscii8 NOT NULL DEFAULT 'Make a choice',
  `buddyId` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `firstName`, `lastName`, `password`, `music`, `movies`, `games`, `tvShows`, `books`, `buddy`, `buddyId`) VALUES
(12, 'amber.waltens@student.thomasmore.be', 'Amber', 'Waltens', '$2y$16$Yj5Zor0gjvvNoZ6JTGLnpeCXOTx8xmZwxQ79Jgc/Phcc3nrrVnxNC', '', '', '', '', '', 'Maak een keuze', 34),
(13, 'r0696794@student.thomasmore.be', 'Mae-ly', 'Waltens', '$2y$16$21sY0VvpYLtEEO6v18EPJuQ1sQEI0o.3JNpak6lMML.r6H.nwBejy', '', '', '', '', '', 'Maak een keuze', 0),
(26, 'test@thomasmore.be', 'Maarten', 'Wegner', '$2y$14$MnxoB4VYfdJ72ig8nia.settmRMzFfwzllsszfz9o2Vl/nv/GjpXO', 'Rock', 'Western', 'Sandbox', 'Vlaamse series', 'Romantiek', 'Maak een keuze', 0),
(27, 'greg@student.thomasmore.be', 'Greg', 'Max', '$2y$14$XRAlnE2iB6PC0N9ViUoZDOPPnZFQ1k0KAid9FxbRUl56BttMjk/2y', 'Klassieke', 'Superheldenfilm', 'Actie', 'Quiz', 'Comedy', 'I want to be a buddy', 0),
(30, 'rnummer@student.thomasmore.be', 'Greg', 'Max', '$2y$16$2TEJAnQP/.zyeMVryMWaiOZ6vbJ6cM/Cv33c15Ya2AqbcxUljCe2e', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'I am searching a buddy', 0),
(31, 'clean@student.thomasmore.be', 'Joris', 'Clean', '$2y$16$bG3PXZvFareGFAToi0TB.erZrrfNKQpR.hRAkykT37nbN.j/Frob6', 'Jazz', 'Avonturenfilm', 'First-person', 'Quiz', 'Detectieve', 'Ik wil een buddy die mij helpt', 0),
(33, 'r0745699@student.thomasmore.be', 'Wannes', 'Verboven', '$2y$16$7C3Ebdor5PeQUevuTu4pWeQNQYfj1aMMOUcjZWX46ePD9r.tPLBsy', 'Jazz', 'Comedy', 'Action', 'News', 'Action', 'I want to be a buddy', 0),
(34, 'Hello@student.thomasmore.be', 'Hello', 'Hi', '$2y$16$JYk6fkgunu/GWnnv6XFDZekKrUksy9ce51IDXNISLGqsBHSSQJlj.', 'Classic', 'Comedy', 'Adventure', 'Dutch series', 'Comics', 'I am searching a buddy', 12);

--
-- Indexen voor geëxporteerde tabellen
--

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
-- AUTO_INCREMENT voor een tabel `requests`
--
ALTER TABLE `requests`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
