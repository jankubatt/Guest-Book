-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Počítač: 127.0.0.1
-- Vytvořeno: Pát 30. říj 2020, 15:43
-- Verze serveru: 10.4.14-MariaDB
-- Verze PHP: 7.4.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Databáze: `navstevni_kniha`
--

-- --------------------------------------------------------

--
-- Struktura tabulky `prispevky`
--

CREATE TABLE `prispevky` (
  `id_pri` int(11) NOT NULL,
  `jmeno` varchar(65) NOT NULL,
  `text` text NOT NULL,
  `hodnoceni` tinyint(5) NOT NULL DEFAULT 1,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Vypisuji data pro tabulku `prispevky`
--

INSERT INTO `prispevky` (`id_pri`, `jmeno`, `text`, `hodnoceni`, `timestamp`) VALUES
(1, 'Honza', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris dolor lectus, consectetur a auctor id, placerat non est. Suspendisse a lacus cursus, pharetra nunc a, accumsan nisl. Fusce ac posuere tellus, id vehicula turpis. Quisque sit amet rutrum dui. Pellentesque sed pharetra nulla. Suspendisse potenti. Maecenas laoreet lectus a justo faucibus fringilla. Morbi blandit nisl posuere mauris luctus ultricies. Quisque porttitor sagittis porttitor. Donec sit amet accumsan quam. In pretium et massa a vestibulum. Donec tempus, metus ac semper dapibus, ante quam posuere augue, eu pretium quam ante sit amet mi. Phasellus volutpat gravida enim, et bibendum urna tincidunt sit amet. Maecenas in feugiat turpis. In pharetra neque sem, a fringilla eros commodo sit amet. Pellentesque nibh libero, pretium eget convallis at, commodo ac lacus.', 1, '2020-10-29 14:07:36'),
(2, 'Aneta', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris dolor lectus, consectetur a auctor id, placerat non est. Suspendisse a lacus cursus, pharetra nunc a, accumsan nisl. Fusce ac posuere tellus, id vehicula turpis. Quisque sit amet rutrum dui. Pellentesque sed pharetra nulla. Suspendisse potenti. Maecenas laoreet lectus a justo faucibus fringilla. Morbi blandit nisl posuere mauris luctus ultricies. Quisque porttitor sagittis porttitor. Donec sit amet accumsan quam. In pretium et massa a vestibulum. Donec tempus, metus ac semper dapibus, ante quam posuere augue, eu pretium quam ante sit amet mi. Phasellus volutpat gravida enim, et bibendum urna tincidunt sit amet. Maecenas in feugiat turpis. In pharetra neque sem, a fringilla eros commodo sit amet. Pellentesque nibh libero, pretium eget convallis at, commodo ac lacus.', 2, '2020-10-29 14:08:55'),
(3, 'Jakub', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris dolor lectus, consectetur a auctor id, placerat non est. Suspendisse a lacus cursus, pharetra nunc a, accumsan nisl. Fusce ac posuere tellus, id vehicula turpis. Quisque sit amet rutrum dui. Pellentesque sed pharetra nulla. Suspendisse potenti. Maecenas laoreet lectus a justo faucibus fringilla. Morbi blandit nisl posuere mauris luctus ultricies. Quisque porttitor sagittis porttitor. Donec sit amet accumsan quam. In pretium et massa a vestibulum. Donec tempus, metus ac semper dapibus, ante quam posuere augue, eu pretium quam ante sit amet mi. Phasellus volutpat gravida enim, et bibendum urna tincidunt sit amet. Maecenas in feugiat turpis. In pharetra neque sem, a fringilla eros commodo sit amet. Pellentesque nibh libero, pretium eget convallis at, commodo ac lacus.', 3, '2020-10-29 14:09:57'),
(4, 'Petr', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris dolor lectus, consectetur a auctor id, placerat non est. Suspendisse a lacus cursus, pharetra nunc a, accumsan nisl. Fusce ac posuere tellus, id vehicula turpis. Quisque sit amet rutrum dui. Pellentesque sed pharetra nulla. Suspendisse potenti. Maecenas laoreet lectus a justo faucibus fringilla. Morbi blandit nisl posuere mauris luctus ultricies. Quisque porttitor sagittis porttitor. Donec sit amet accumsan quam. In pretium et massa a vestibulum. Donec tempus, metus ac semper dapibus, ante quam posuere augue, eu pretium quam ante sit amet mi. Phasellus volutpat gravida enim, et bibendum urna tincidunt sit amet. Maecenas in feugiat turpis. In pharetra neque sem, a fringilla eros commodo sit amet. Pellentesque nibh libero, pretium eget convallis at, commodo ac lacus.', 4, '2020-10-29 14:10:02'),
(5, 'Tereza', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris dolor lectus, consectetur a auctor id, placerat non est. Suspendisse a lacus cursus, pharetra nunc a, accumsan nisl. Fusce ac posuere tellus, id vehicula turpis. Quisque sit amet rutrum dui. Pellentesque sed pharetra nulla. Suspendisse potenti. Maecenas laoreet lectus a justo faucibus fringilla. Morbi blandit nisl posuere mauris luctus ultricies. Quisque porttitor sagittis porttitor. Donec sit amet accumsan quam. In pretium et massa a vestibulum. Donec tempus, metus ac semper dapibus, ante quam posuere augue, eu pretium quam ante sit amet mi. Phasellus volutpat gravida enim, et bibendum urna tincidunt sit amet. Maecenas in feugiat turpis. In pharetra neque sem, a fringilla eros commodo sit amet. Pellentesque nibh libero, pretium eget convallis at, commodo ac lacus.', 5, '2020-10-29 14:11:05');

--
-- Klíče pro exportované tabulky
--

--
-- Klíče pro tabulku `prispevky`
--
ALTER TABLE `prispevky`
  ADD PRIMARY KEY (`id_pri`);

--
-- AUTO_INCREMENT pro tabulky
--

--
-- AUTO_INCREMENT pro tabulku `prispevky`
--
ALTER TABLE `prispevky`
  MODIFY `id_pri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
