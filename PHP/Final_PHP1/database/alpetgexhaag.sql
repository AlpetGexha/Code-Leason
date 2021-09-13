-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 05, 2021 at 09:59 PM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `alpetgexhaag`
--

-- --------------------------------------------------------

--
-- Table structure for table `mesazhi`
--

CREATE TABLE `mesazhi` (
  `mesazhi` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `mesazhi`
--

INSERT INTO `mesazhi` (`mesazhi`) VALUES
('SHUM I FORT JE'),
('hjhjkhjkhjk'),
('ghjghjghjghjghjghjghjghjghjghjghjghjghjghj'),
('dasdasd'),
('das'),
('ea'),
('dsads'),
('dsad'),
('dsad'),
('das'),
('hfghfg'),
('gfd'),
('da'),
('ffdsf'),
('ca'),
('das'),
('fds'),
('gfd'),
('gdgdf'),
('das'),
('gdf'),
('gdf'),
('gfh'),
('hgf'),
('das'),
('das'),
('dasdas'),
('dasd');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `id` int(11) NOT NULL,
  `body` text NOT NULL,
  `emri_post` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `user_id` int(11) NOT NULL,
  `post_time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `body`, `emri_post`, `image`, `user_id`, `post_time`) VALUES
(53, 'PHP is a general-purpose scripting language especially suited to web development.[5] It was originally created by Danish-Canadian programmer Rasmus Lerdorf in 1994.[6] The PHP reference implementation is now produced by The PHP Group.[7] PHP originally stood for Personal Home Page,[6] but it now stands for the recursive initialism PHP: Hypertext Preprocessor.[8]\r\n\r\nPHP code is usually processed on a web server by a PHP interpreter implemented as a module, a daemon or as a Common Gateway Interface (CGI) executable. On a web server, the result of the interpreted and executed PHP code – which may be any type of data, such as generated HTML or binary image data – would form the whole or part of an HTTP response. Various web template systems, web content management systems, and web frameworks exist which can be employed to orchestrate or facilitate the generation of that response. Additionally, PHP can be used for many programming tasks outside of the web context, such as standalone graphical applications[9] and robotic drone control.[10] Arbitrary PHP code can also be interpreted and executed via command-line interface (CLI).', 'PHP', '.6023192747a2a6.80343340.png', 2, '2021-02-26 21:36:51'),
(56, 'JavaScript (/ˈdʒɑːvəˌskrɪpt/),[8] often abbreviated as JS, is a programming language that conforms to the ECMAScript specification.[9] JavaScript is high-level, often just-in-time compiled, and multi-paradigm. It has curly-bracket syntax, dynamic typing, prototype-based object-orientation, and first-class functions.\r\n\r\nAlongside HTML and CSS, JavaScript is one of the core technologies of the World Wide Web.[10] JavaScript enables interactive web pages and is an essential part of web applications. The vast majority of websites use it for client-side page behavior,[11] and all major web browsers have a dedicated JavaScript engine to execute it.\r\n\r\nAs a multi-paradigm language, JavaScript supports event-driven, functional, and imperative programming styles. It has application programming interfaces (APIs) for working with text, dates, regular expressions, standard data structures, and the Document Object Model (DOM).', 'JavaScript', '.602338bcd9ce12.46987055.jpg', 2, '2021-02-26 21:36:51'),
(57, 'Arduino (/ɑːrˈdwiːnoʊ/) is an open-source hardware and software company, project and user community that designs and manufactures single-board microcontrollers and microcontroller kits for building digital devices. Its hardware products are licensed under a CC-BY-SA license, while software is licensed under the GNU Lesser General Public License (LGPL) or the GNU General Public License (GPL),[1] permitting the manufacture of Arduino boards and software distribution by anyone. Arduino boards are available commercially from the official website or through authorized distributors.\r\n\r\nArduino board designs use a variety of microprocessors and controllers. The boards are equipped with sets of digital and analog input/output (I/O) pins that may be interfaced to various expansion boards (\'shields\') or breadboards (for prototyping) and other circuits. The boards feature serial communications interfaces, including Universal Serial Bus (USB) on some models, which are also used for loading programs. The microcontrollers can be programmed using the C and C++ programming languages, using a standard API which is also known as the \"Arduino language\".', 'Arduino', '.6023394a7b8c04.89131521.jpg', 2, '2021-02-26 21:36:51'),
(58, 'Cascading Style Sheets (CSS) is a style sheet language used for describing the presentation of a document written in a markup language such as HTML.[1] CSS is a cornerstone technology of the World Wide Web, alongside HTML and JavaScript.[2] CSS is designed to enable the separation of presentation and content, including layout, colors, and fonts.[3] This separation can improve content accessibility, provide more flexibility and control in the specification of presentation characteristics, enable multiple web pages to share formatting by specifying the relevant CSS in a separate .css file which reduces complexity and repetition in the structural content as well as enabling the .css file to be cached to improve the page load speed between the pages that share the file and its formatting. Separation of formatting and content also makes it feasible to present the same markup page in different styles for different rendering methods, such as on-screen, in print, by voice (via speech-based browser or screen reader), and on Braille-based tactile devices. CSS also has rules for alternate formatting if the content is accessed on a mobile device.[4]', 'CSS', '.602339eb86f4a7.97949760.png', 2, '2021-02-26 21:36:51'),
(59, 'Hypertext Markup Language (HTML) is the standard markup language for documents designed to be displayed in a web browser. It can be assisted by technologies such as Cascading Style Sheets (CSS) and scripting languages such as JavaScript. Web browsers receive HTML documents from a web server or from local storage and render the documents into multimedia web pages. HTML describes the structure of a web page semantically and originally included cues for the appearance of the document.', 'HTML', '.60233a1a8ce0b3.15437451.png', 2, '2021-02-26 21:36:51'),
(109, 'TEST\r\n\r\n', 'TEST', 'pc 1.jpg', 2, '2021-03-01 21:13:06');

-- --------------------------------------------------------

--
-- Table structure for table `todo`
--

CREATE TABLE `todo` (
  `id` int(11) NOT NULL,
  `gjerat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `todo`
--

INSERT INTO `todo` (`id`, `gjerat`) VALUES
(2, 'sot te te shkoj ne shtpi ne 9:00'),
(3, '12'),
(4, 'sot te te shkoj ne shtpi ne 9:00'),
(5, 'to hard');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `emri` varchar(255) NOT NULL,
  `mbiemri` varchar(255) NOT NULL,
  `username` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `password` varchar(300) NOT NULL,
  `token` varchar(255) NOT NULL,
  `tokenExpire` varchar(255) NOT NULL,
  `mosha` varchar(3) NOT NULL,
  `gjinia` int(1) NOT NULL,
  `image` varchar(255) DEFAULT 'profiledefault.jpg',
  `joindate` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `emri`, `mbiemri`, `username`, `email`, `password`, `token`, `tokenExpire`, `mosha`, `gjinia`, `image`, `joindate`) VALUES
(2, 'Alpet', 'Gexha', 'AlpetG', 'agexha@gmail.com', '$2y$10$VmXjPtp6BghxHDCdyFpDFedV8SgAtbfoH1oyrEqCSwLBILpts84pi', 'jm9daf6oexvu1gn', '2021-03-05 21:59:24', '16', 0, 'DrK1LL3R  logo.jpg', '2021-02-26 20:33:05'),
(11, 'Alpet Gexha', 'Gexha', 'alpet_gexha1', 'agexha10@gmail.com', '$2y$10$VmXjPtp6BghxHDCdyFpDFedV8SgAtbfoH1oyrEqCSwLBILpts84pi', '', '', '', 0, 'profiledefault.jpg', '2021-03-04 20:47:01');

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id`, `username`, `password`) VALUES
(1, 'Admin_AlpetG', '$2y$10$IQs5xM6029ptwUgwxBUvpe5FfME2FCz4CDtooyx7yEUcmmbTBJZqC');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `todo`
--
ALTER TABLE `todo`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=124;

--
-- AUTO_INCREMENT for table `todo`
--
ALTER TABLE `todo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `post`
--
ALTER TABLE `post`
  ADD CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
