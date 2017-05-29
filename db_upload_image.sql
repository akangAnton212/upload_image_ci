-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 28, 2017 at 04:14 AM
-- Server version: 5.6.14
-- PHP Version: 5.5.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_upload_image`
--

-- --------------------------------------------------------

--
-- Table structure for table `data_image`
--

CREATE TABLE IF NOT EXISTS `data_image` (
  `id` int(4) NOT NULL AUTO_INCREMENT,
  `nm_img` varchar(50) NOT NULL,
  `ket_img` varchar(140) NOT NULL,
  `path_img` varchar(100) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=29 ;

--
-- Dumping data for table `data_image`
--

INSERT INTO `data_image` (`id`, `nm_img`, `ket_img`, `path_img`, `date`) VALUES
(25, 'dfg', 'gfd', 'file_1497985316.JPG', '2017-06-20 19:01:56'),
(26, 'goceng', 'apa bae', 'file_1497988938.jpg', '2017-06-20 20:02:18'),
(27, 'monyong', 'kampret', 'file_1497988841.jpg', '2017-06-20 20:00:41'),
(28, 'Apa coba?', 'Coba Apa?', 'file_1497990805.jpg', '2017-06-20 20:33:25');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
