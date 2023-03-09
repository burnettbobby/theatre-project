-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 07, 2023 at 01:04 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `theatre`
--

-- --------------------------------------------------------

--
-- Table structure for table `blog`
--

CREATE TABLE `blog` (
  `id` int(11) NOT NULL,
  `title` varchar(132) NOT NULL,
  `blog_content` varchar(644) NOT NULL,
  `created_on` date NOT NULL DEFAULT current_timestamp(),
  `img_path` varchar(32) DEFAULT NULL,
  `show_name` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `blog`
--

INSERT INTO `blog` (`id`, `title`, `blog_content`, `created_on`, `img_path`, `show_name`) VALUES
(8, 'Pretty Woman', 'Lorem ipsum dolor sit, amet consectetur adipisicin...\n\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit adipisci exercitationem quam ex id tenetur esse sint soluta, architecto earum consequuntur labore minus asperiores optio! Et aliquid fugiat sint ea!\n\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit adipisci exercitationem quam ex id tenetur esse sint soluta, architecto earum consequuntur labore minus asperiores optio! Et aliquid fugiat sint ea!', '2023-03-05', 'pretty_woman.jpeg', 'Mary Poppins'),
(13, 'Shrek is Back!', 'Lorem ipsum dolor sit, amet consectetur adipisicin...\n\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit adipisci exercitationem quam ex id tenetur esse sint soluta, architecto earum consequuntur labore minus asperiores optio! Et aliquid fugiat sint ea!\n\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit adipisci exercitationem quam ex id tenetur esse sint soluta, architecto earum consequuntur labore minus asperiores optio! Et aliquid fugiat sint ea!', '2023-03-06', 'shrek_the_movie.jpeg', 'Shrek the Movie'),
(14, 'Life of Pi', 'Lorem ipsum dolor sit, amet consectetur adipisicin...\n\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit adipisci exercitationem quam ex id tenetur esse sint soluta, architecto earum consequuntur labore minus asperiores optio! Et aliquid fugiat sint ea!\n\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit adipisci exercitationem quam ex id tenetur esse sint soluta, architecto earum consequuntur labore minus asperiores optio! Et aliquid fugiat sint ea!', '2023-03-07', 'life_of_pi.jpeg', 'Life of Pi'),
(15, 'Grease is as slick as ever!', 'Lorem ipsum dolor sit, amet consectetur adipisicin...\n\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit adipisci exercitationem quam ex id tenetur esse sint soluta, architecto earum consequuntur labore minus asperiores optio! Et aliquid fugiat sint ea!\n\nLorem ipsum dolor sit, amet consectetur adipisicing elit. Fugit adipisci exercitationem quam ex id tenetur esse sint soluta, architecto earum consequuntur labore minus asperiores optio! Et aliquid fugiat sint ea!', '2023-03-07', 'grease_musical.jpg', 'Grease');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `heading` varchar(64) DEFAULT NULL,
  `comment` text NOT NULL,
  `date_added` date NOT NULL DEFAULT current_timestamp(),
  `fk_userBlog` int(11) NOT NULL,
  `pending` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `heading`, `comment`, `date_added`, `fk_userBlog`, `pending`) VALUES
(17, 'I love this musical', 'This is a comment for pretty woman', '2023-03-06', 27, 0),
(18, 'Another comment for pretty woman', 'more info here', '2023-03-06', 28, 0),
(19, 'comment header', 'comment ', '2023-03-07', 29, 0),
(20, 'Pretty woman review (Tuesday)', 'asdf', '2023-03-07', 30, 0),
(21, 'shrek comment', 'new comment', '2023-03-07', 33, 1),
(22, 'shrek comment', 'new comment', '2023-03-07', 34, 1),
(23, 'shrek comment', 'shrek comment', '2023-03-07', 35, 0),
(24, 'shrek comment', 'shrek comment', '2023-03-07', 36, 0);

-- --------------------------------------------------------

--
-- Table structure for table `userblog`
--

CREATE TABLE `userblog` (
  `id` int(11) NOT NULL,
  `fk_user_id` int(11) NOT NULL,
  `fk_blog_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userblog`
--

INSERT INTO `userblog` (`id`, `fk_user_id`, `fk_blog_id`) VALUES
(11, 15, 8),
(16, 15, 8),
(17, 15, 8),
(26, 14, 13),
(27, 15, 8),
(28, 14, 8),
(29, 15, 8),
(30, 15, 8),
(31, 14, 14),
(32, 14, 15),
(33, 14, 13),
(34, 14, 13),
(35, 14, 13),
(36, 14, 13);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(264) NOT NULL,
  `email` varchar(64) NOT NULL,
  `active` tinyint(1) NOT NULL,
  `is_admin` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `active`, `is_admin`) VALUES
(14, 'admin', '$2y$10$bihFWrC8SLISdric/zq8lecnOKhO908Dkn8Hh43SZQ4bRmJ/h2yyC', 'admin@email.com', 1, 1),
(15, 'user', '$2y$10$tCiq99p3PfLKj1VdWXEv4e.ZNyq.MFPQrauRLuLkg90DRUE7cgNWa', 'user@email.com', 1, 0),
(16, 'user2', '$2y$10$sYWzIvh3ORu3PleHlHV4pOVy2K0SMSm7fkhfePJOisolRpWuq9Req', 'user2@email.com', 1, 0),
(17, 'user3', '$2y$10$UnKYp0zvzquedzrTQU1l9.4PgCaC9.HRQmGphOP1IU9yPPK37RdTu', 'user3@email.com', 1, 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_join` (`fk_userBlog`);

--
-- Indexes for table `userblog`
--
ALTER TABLE `userblog`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`fk_user_id`),
  ADD KEY `fk_blog` (`fk_blog_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blog`
--
ALTER TABLE `blog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `userblog`
--
ALTER TABLE `userblog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `fk_join` FOREIGN KEY (`fk_userBlog`) REFERENCES `userblog` (`id`);

--
-- Constraints for table `userblog`
--
ALTER TABLE `userblog`
  ADD CONSTRAINT `fk_blog` FOREIGN KEY (`fk_blog_id`) REFERENCES `blog` (`id`),
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`fk_user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
