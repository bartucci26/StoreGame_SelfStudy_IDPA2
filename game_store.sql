-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Aug 30, 2021 at 07:56 PM
-- Server version: 5.7.24
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `game_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `status` varchar(255) NOT NULL,
  `games` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `games`
--

CREATE TABLE `games` (
  `id` int(11) NOT NULL,
  `game_name` varchar(255) NOT NULL,
  `game_type` varchar(255) NOT NULL,
  `game_price` decimal(9,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `games`
--

INSERT INTO `games` (`id`, `game_name`, `game_type`, `game_price`) VALUES
(1, 'Diablo 2', 'RPG', '25.00'),
(2, 'World of Warcraft', 'MMORPG', '39.00'),
(3, 'The Elder Scrolls V: Skyrim', 'RPG', '99.00'),
(4, 'World of Warcraft Wrath of the Lich King', 'MMORPG', '58.50'),
(5, 'Assassin\'s Creed', 'Adventure', '22.50'),
(6, 'Last of Us', 'Adventure', '89.99'),
(7, 'Psychonauts', 'Action', '25.50'),
(8, 'Batman Arkham Knights', 'Action', '40.00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `hashed_password` varchar(255) NOT NULL,
  `streetname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `username`, `hashed_password`, `streetname`) VALUES
(1, 'Lucas', 'Bartucci', 'r0788316@student.thomasmore.be', 'lucas', '$2y$10$JsAJVPZSar8MhoLniP5SIecm77Zh3oX5REs89h3eT0bpo8wQy5tLG', 'Rue Colonel Chaltin 3'),
(2, 'Lucas', 'Bartucci', 'lucas.bartucci@gmail.com', 'bartucci123', '$2y$10$T07aZTh6CjKlIOTfA2DWkuIm1b.6fd7hiKEYjw.uIjQvWK/DnasRu', 'Rio de Janeiro uhuuuu'),
(3, 'Lucas', 'Bartucci', 'lucas@gmail.com', 'bartucci26', '$2y$10$zs0EyRRI31MSX6mgbQtEFOOHar8NiyLJuKbIlPH/bai2zvP2pBrlW', 'Casa Nostra'),
(4, 'Lucas', 'Bartucci', 'lucas.bartucci@gmail.com', 'leroth701', '$2y$10$J6MEpEx4kcPqys9Ccryvx.fp5GIG3Jza7PxMaJhOY2W..zAFX2O8.', 'Rua Esteves Junior');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `games`
--
ALTER TABLE `games`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `index_username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `games`
--
ALTER TABLE `games`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
