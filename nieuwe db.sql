-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Gegenereerd op: 31 mrt 2020 om 14:01
-- Serverversie: 8.0.18
-- PHP-versie: 7.3.12

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

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(300) NOT NULL,
  `firstName` varchar(300) NOT NULL,
  `lastName` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `muziek` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Maak een keuze',
  `films` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Maak een keuze',
  `games` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Maak een keuze',
  `tvprogrammas` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Maak een keuze',
  `boeken` varchar(300) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Maak een keuze',
  `buddy` varchar(300) CHARACTER SET armscii8 COLLATE armscii8_general_ci NOT NULL DEFAULT 'Maak een keuze',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=32 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Gegevens worden geëxporteerd voor tabel `users`
--

INSERT INTO `users` (`id`, `email`, `firstName`, `lastName`, `password`, `muziek`, `films`, `games`, `tvprogrammas`, `boeken`, `buddy`) VALUES
(12, 'amber.waltens@student.thomasmore.be', 'Amber', 'Waltens', '$2y$16$Yj5Zor0gjvvNoZ6JTGLnpeCXOTx8xmZwxQ79Jgc/Phcc3nrrVnxNC', '', '', '', '', '', 'Maak een keuze'),
(13, 'r0696794@student.thomasmore.be', 'Mae-ly', 'Waltens', '$2y$16$21sY0VvpYLtEEO6v18EPJuQ1sQEI0o.3JNpak6lMML.r6H.nwBejy', '', '', '', '', '', 'Maak een keuze'),
(26, 'test@thomasmore.be', 'Maarten', 'Wegner', '$2y$14$MnxoB4VYfdJ72ig8nia.settmRMzFfwzllsszfz9o2Vl/nv/GjpXO', 'Rock', 'Western', 'Sandbox', 'Vlaamse series', 'Romantiek', 'Maak een keuze'),
(27, 'greg@student.thomasmore.be', 'Greg', 'Max', '$2y$14$XRAlnE2iB6PC0N9ViUoZDOPPnZFQ1k0KAid9FxbRUl56BttMjk/2y', 'Klassieke', 'Avonturenfilm', 'Komedie', 'Vlaamse series', 'Thriller', 'Ik wil een buddy die mij helpt'),
(30, 'rnummer@student.thomasmore.be', 'Greg', 'Max', '$2y$16$2TEJAnQP/.zyeMVryMWaiOZ6vbJ6cM/Cv33c15Ya2AqbcxUljCe2e', 'Maak een keuze', 'Maak een keuze', 'Maak een keuze', 'Maak een keuze', 'Maak een keuze', 'Ik wil een buddy helpen'),
(31, 'clean@student.thomasmore.be', 'Joris', 'Clean', '$2y$16$bG3PXZvFareGFAToi0TB.erZrrfNKQpR.hRAkykT37nbN.j/Frob6', 'Jazz', 'Avonturenfilm', 'First-person', 'Quiz', 'Detectieve', 'Ik wil een buddy die mij helpt');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
