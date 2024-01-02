-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 02, 2024 at 01:15 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `chatbot`
--

-- --------------------------------------------------------

--
-- Table structure for table `query`
--

CREATE TABLE `query` (
  `id` int(11) NOT NULL,
  `query` text NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `query`
--

INSERT INTO `query` (`id`, `query`, `message`) VALUES
(1, 'hi|hello|hello?|hi?|good day', 'Hi, welcome to SciAstra'),
(2, 'what is SciAstra|what is sciastra|who is sciastra|who we are', 'SciAstra is an online learning platform that offers courses for IAT and NEST. The courses are designed to help students prepare for the exams by providing them with access to video lectures, practice questions, and mock tests.'),
(3, 'what is your mission|mission|our mission|your mission|mission statement| what is our mission', 'Our mission is to make you think like a scientist.<br>Learn from Top Scientists around the world.<br>Full guidance for IISc Bangalore, IISERs, NISER, ISI, CMI, IACS, CUET, ICAR, etc.'),
(4, 'area of specialties |what are your specialties |specialties| Specialty| any Specialties|what are your Specialty| what are your area specialization', 'Our are of specialties are Science, Research, E-Learning, and Education'),
(5, 'when were you founded|founded| year founded', 'Founded in the year 2021'),
(6, 'were are you located|location|how can we find you|what is your address| physical address|Where are you located', 'Plot-964, Saikrupa, Patharagadia, Chandaka Bhubaneswar, Odisha 754005, IN'),
(7, 'where is your headquarter|do you have headquarter| headquarter| any headquarter| headquarters', 'Our headquarter is Bhubaneswar, Odisha'),
(8, 'email address|email contact|support address| what is your email address', 'You can contact us via support@sciastra.com'),
(9, 'mobile app| have app|do you have app| apps| any app| do you have mobile app', 'Yes. Download SciAstra app to reach us out there too. <a href=\"https://play.google.com/store/apps/details?id=co.tarly.voaaf&hl=en_IN&gl=US&pli=1\">Android</a> OR <a href=\"https://apps.apple.com/us/app/sciastra/id6469692732\">IOS</a>'),
(10, 'Institutes|any Institutes| list of Institutes| partners Institutes| Partnering Institution| list of Institution| Institution', 'We partner with IISC, IISER, NISER, ISI, CMI, IACS, CEBS'),
(11, 'sponsors|sponsorship|sponsor|sponsorship program|do you have sponsorship program', 'SciAstra is now the official sponsor of Anvesha- the Science Fest of IISER Thiruvananthapuram'),
(12, 'courses|offer courses|course|any courses|do you offer courses', 'Yes we offer courses');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `query`
--
ALTER TABLE `query`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `query`
--
ALTER TABLE `query`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
