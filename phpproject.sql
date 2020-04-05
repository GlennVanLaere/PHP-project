-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Gegenereerd op: 05 apr 2020 om 17:58
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
  `buddy` varchar(300) NOT NULL DEFAULT 'Make a choice',
  `description` varchar(300) NOT NULL,
  `avatar` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `firstName`, `lastName`, `password`, `music`, `movies`, `games`, `tvShows`, `books`, `buddy`, `description`, `avatar`) VALUES
(12, 'amber.waltens@student.thomasmore.be', 'Amber', 'Waltens', '$2y$16$Yj5Zor0gjvvNoZ6JTGLnpeCXOTx8xmZwxQ79Jgc/Phcc3nrrVnxNC', '', '', '', '', '', 'Maak een keuze', 'hehehehe', ''),
(13, 'r0696794@student.thomasmore.be', 'Mae-ly', 'Waltens', '$2y$16$21sY0VvpYLtEEO6v18EPJuQ1sQEI0o.3JNpak6lMML.r6H.nwBejy', '', '', '', '', '', 'Maak een keuze', '', ''),
(26, 'test@thomasmore.be', 'Maarten', 'Wegner', '$2y$14$MnxoB4VYfdJ72ig8nia.settmRMzFfwzllsszfz9o2Vl/nv/GjpXO', 'Rock', 'Western', 'Sandbox', 'Vlaamse series', 'Romantiek', 'Maak een keuze', '', ''),
(27, 'greg@student.thomasmore.be', 'Greg', 'Max', '$2y$14$XRAlnE2iB6PC0N9ViUoZDOPPnZFQ1k0KAid9FxbRUl56BttMjk/2y', 'Klassieke', 'Superheldenfilm', 'Actie', 'Quiz', 'Comedy', 'I want to be a buddy', '', ''),
(30, 'rnummer@student.thomasmore.be', 'Greg', 'Max', '$2y$16$2TEJAnQP/.zyeMVryMWaiOZ6vbJ6cM/Cv33c15Ya2AqbcxUljCe2e', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'I am searching a buddy', '', ''),
(31, 'clean@student.thomasmore.be', 'Joris', 'Clean', '$2y$16$bG3PXZvFareGFAToi0TB.erZrrfNKQpR.hRAkykT37nbN.j/Frob6', 'Jazz', 'Avonturenfilm', 'First-person', 'Quiz', 'Detectieve', 'Ik wil een buddy die mij helpt', '', ''),
(32, 'r0706426@student.thomasmore.be', 'Glenn', 'Van Laere', '$2y$16$NuXBpu.OyUBQ0LSrzh8ThupJkrLmRlDgf8zNw1umNxXYfLV2B7Zy.', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', '', ''),
(33, 'studiosviper@student.thomasmore.be', 'Glenn', 'vl', '$2y$16$MWEC/3LqP.U2F00I4NG8P.HxjNaWXwEwqRKsMyxQIRrCsN9fciReS', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'test', ''),
(34, 'theragebeat998@student.thomasmore.be', 'Dobbenie', 'Karla', '$2y$16$NLBHEJkXO/s5w4deDNijp.vthMs89VnrcZe7SHP.JWuR3cFovU5HW', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'here comes your description', ''),
(35, 'debomb@student.thomasmore.be', 'tim', 'de Bakker', '$2y$16$rmApKGpdrBLrz7kUE2WX7eOd1R7baDtCI7aokt/SGpaMhDuhAlHQi', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', 'Make a choice', ' descirption... ', 'uploads/5e89fdeb7c6b52.43498168.jpg');

--
-- Indexen voor geëxporteerde tabellen
--

--
-- Indexen voor tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT voor geëxporteerde tabellen
--

--
-- AUTO_INCREMENT voor een tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=36;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
