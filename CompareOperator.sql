-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: mysql
-- Generation Time: Apr 05, 2023 at 05:08 PM
-- Server version: 10.6.11-MariaDB-1:10.6.11+maria~ubu2004-log
-- PHP Version: 8.1.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `CompareOperator`
--

-- --------------------------------------------------------

--
-- Table structure for table `author`
--

CREATE TABLE `author` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `destinations`
--

CREATE TABLE `destinations` (
  `id` int(11) NOT NULL,
  `location` varchar(255) NOT NULL,
  `country` varchar(255) NOT NULL,
  `flag` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `starting_price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `destinations`
--

INSERT INTO `destinations` (`id`, `location`, `country`, `flag`, `image`, `starting_price`) VALUES
(1, 'New York', 'USA', 'ICONS/usa.png', 'IMAGES/nyc.jpg', 800),
(2, 'Bangkok', 'Thailand', 'ICONS/thailand.png', 'IMAGES/bangkok.jpg', 630),
(3, 'Helsinki', 'Finland', 'ICONS/finland.png', 'IMAGES/helsinki.avif', 449),
(4, 'Los Angeles', 'USA', 'ICONS/usa.png', 'IMAGES/losangeles.jpg', 1255),
(5, 'Sydney', 'Australia', 'ICONS/australia.png', 'IMAGES/sydney.jpg', 1499),
(6, 'Santorini', 'Greece', 'ICONS/greece.png', 'IMAGES/santorini.jpg', 799),
(7, 'London', 'United Kingdom', 'ICONS/uk.png', 'IMAGES/london.jpg', 239),
(8, 'Florence', 'Italy', 'ICONS/italy.png', 'IMAGES/florence.jpg', 289),
(9, 'Tbilisi', 'Georgia', 'ICONS/georgia.png', 'IMAGES/tbilisi.jpg', 320),
(10, 'Ajaccio', 'France', 'ICONS/france.png', 'IMAGES/ajaccio.jpeg', 99),
(11, 'Erevan', 'Armenia', 'ICONS/armenia.png', 'IMAGES/erevan.webp', 499),
(12, 'Amsterdam', 'Netherlands', 'ICONS/netherlands.png', 'IMAGES/amsterdam.jpg', 149);

-- --------------------------------------------------------

--
-- Table structure for table `offers`
--

CREATE TABLE `offers` (
  `id` int(11) NOT NULL,
  `destination_id` int(255) NOT NULL,
  `tour_operator_id` int(255) NOT NULL,
  `price` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `offers`
--

INSERT INTO `offers` (`id`, `destination_id`, `tour_operator_id`, `price`) VALUES
(1, 1, 1, 800),
(2, 1, 5, 949),
(3, 1, 2, 1199),
(4, 2, 6, 630),
(5, 2, 5, 689),
(6, 2, 7, 866),
(7, 3, 8, 449),
(8, 3, 9, 451),
(9, 3, 1, 667),
(10, 4, 2, 1255),
(11, 4, 1, 1267),
(12, 4, 6, 1299),
(13, 5, 1, 1499),
(14, 5, 7, 1555),
(15, 5, 2, 1647),
(16, 6, 10, 799),
(17, 6, 3, 801),
(18, 6, 8, 821),
(19, 7, 8, 239),
(20, 7, 3, 255),
(21, 7, 1, 306),
(22, 8, 10, 289),
(23, 8, 8, 299),
(24, 8, 1, 310),
(25, 9, 9, 320),
(26, 9, 1, 414),
(27, 9, 5, 421),
(28, 10, 3, 99),
(29, 10, 8, 104),
(30, 10, 1, 149),
(31, 11, 4, 499),
(32, 11, 1, 586),
(33, 11, 6, 749),
(34, 12, 5, 149),
(35, 12, 8, 154),
(36, 12, 1, 165);

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `message` varchar(255) NOT NULL,
  `tour_operator_id` int(255) NOT NULL,
  `author_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `score`
--

CREATE TABLE `score` (
  `id` int(11) NOT NULL,
  `value` int(255) NOT NULL,
  `tour_operator_id` int(255) NOT NULL,
  `author_id` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tour_operator`
--

CREATE TABLE `tour_operator` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `link` varchar(255) NOT NULL,
  `icon` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `tour_operator`
--

INSERT INTO `tour_operator` (`id`, `name`, `link`, `icon`) VALUES
(1, 'AirFrance', 'https://wwws.airfrance.fr/', 'TOUR_OPERATOR_ICON/airfrance.png'),
(2, 'American', 'https://www.americanairlines.fr/intl/fr/index.jsp', 'TOUR_OPERATOR_ICON/american.png'),
(3, 'EasyJet', 'https://www.easyjet.com/en', 'TOUR_OPERATOR_ICON/easyjet.png'),
(4, 'FlyOne', 'https://flyone.eu/am/', 'TOUR_OPERATOR_ICON/flyone.png'),
(5, 'KLM', 'https://www.klm.fr/en', 'TOUR_OPERATOR_ICON/klm.png'),
(6, 'Lufthansa', 'https://www.lufthansa.com/', 'TOUR_OPERATOR_ICON/lufthansa.png'),
(7, 'Qatar', 'https://www.qatarairways.com/', 'TOUR_OPERATOR_ICON/qatar.png'),
(8, 'RyanAir', 'https://www.ryanair.com/', 'TOUR_OPERATOR_ICON/ryanair.webp'),
(9, 'Turkish Airlines', 'https://www.turkishairlines.com/', 'TOUR_OPERATOR_ICON/turkish.png'),
(10, 'Volotea', 'https://www.volotea.com/', 'TOUR_OPERATOR_ICON/volotea.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `firstname` varchar(255) NOT NULL,
  `lastname` varchar(255) NOT NULL,
  `admin` int(11) NOT NULL DEFAULT 0,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `admin`, `email`, `password`) VALUES
(1, 'Gueram', 'Hovhannisyan', 0, 'geram.hov@gmail.com', '202cb962ac59075b964b07152d234b70'),
(2, 'Baba', 'Yaga', 0, 'baba@yaga.com', '202cb962ac59075b964b07152d234b70'),
(3, 'Marco', 'Polo', 0, 'marco@polo.com', '698d51a19d8a121ce581499d7b701668'),
(4, 'Alessandro', 'Del Piero', 0, 'panther@panther.com', '81dc9bdb52d04dc20036dbd8313ed055'),
(5, 'Buggs', 'Bunny', 0, 'bugs@bunny.com', '202cb962ac59075b964b07152d234b70'),
(6, 'Tom', 'Jerry', 0, 'tom@tom.com', '698d51a19d8a121ce581499d7b701668');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `author`
--
ALTER TABLE `author`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `destinations`
--
ALTER TABLE `destinations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `offers`
--
ALTER TABLE `offers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `score`
--
ALTER TABLE `score`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tour_operator`
--
ALTER TABLE `tour_operator`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `author`
--
ALTER TABLE `author`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `destinations`
--
ALTER TABLE `destinations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `offers`
--
ALTER TABLE `offers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `score`
--
ALTER TABLE `score`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tour_operator`
--
ALTER TABLE `tour_operator`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
