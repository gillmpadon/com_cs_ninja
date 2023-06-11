-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 10, 2023 at 04:49 PM
-- Server version: 5.7.17
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `csninja`
--

-- --------------------------------------------------------

--
-- Table structure for table `quiz`
--

CREATE TABLE `quiz` (
  `id` int(11) NOT NULL,
  `name` varchar(200) NOT NULL,
  `question` varchar(220) DEFAULT NULL,
  `template` varchar(220) NOT NULL,
  `solution` varchar(220) DEFAULT NULL,
  `output` varchar(200) DEFAULT NULL,
  `date_created` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `quiz`
--

INSERT INTO `quiz` (`id`, `name`, `question`, `template`, `solution`, `output`, `date_created`) VALUES
(1, 'add', 'Write a function that adds two numbers together.', 'function add(a, b) {\n  \n}\n\nadd(2, 3)', 'function add(a, b) {\n  return a + b;\n}', '5', '2023-06-10 13:07:52'),
(2, 'multiply', 'Write a function that multiplies two numbers.', 'function multiply(a, b) {\n  \n}\n\nmultiply(4, 5)', 'function multiply(a, b) {\n  return a * b;\n}', '20', '2023-06-10 13:07:52'),
(3, 'divide', 'Write a function that divides two numbers.', 'function divide(a, b) {\n  \n}\n\ndivide(10, 2)', 'function divide(a, b) {\n  return a / b;\n}', '5', '2023-06-10 13:07:52'),
(4, 'subtract', 'Write a function that subtracts two numbers.', 'function subtract(a, b) {\n  \n}\n\nsubtract(8, 3)', 'function subtract(a, b) {\n  return a - b;\n}', '5', '2023-06-10 13:07:52'),
(5, 'modulo', 'Write a function that calculates the modulo of two numbers.', 'function modulo(a, b) {\n  \n}\n\nmodulo(17, 4)', 'function modulo(a, b) {\n  return a % b;\n}', '1', '2023-06-10 13:07:52');
update quiz set date_created = CURRENT_TIMESTAMP();
--
-- Indexes for dumped tables
--

--
-- Indexes for table `quiz`
--
ALTER TABLE `quiz`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `quiz`
--
ALTER TABLE `quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
