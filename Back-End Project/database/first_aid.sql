-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 14, 2022 at 02:18 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `first_aid`
--

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `duration` varchar(15) NOT NULL,
  `address` varchar(255) NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `price_private` int(11) NOT NULL,
  `price_business` int(11) DEFAULT NULL,
  `price_student` int(11) NOT NULL,
  `fk_trainer` int(11) NOT NULL,
  `capacity` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `duration`, `address`, `start_date`, `end_date`, `price_private`, `price_business`, `price_student`, `fk_trainer`, `capacity`, `image`, `description`) VALUES
(487652, 'First Aid Driving License', '6 hours', 'Troststrasse 45, 1100 Vienna', '2022-12-21 12:00:00', '2022-12-21 18:00:00', 55, 70, 45, 1, 30, 'https://www.smd.at/data/temp/Kurse_SMD_Erste_Hilfe_Fuehrerscheinkurs_250_122_cut.jpg', 'First Aid at a Traffic Accident | First Aid Course Driving License (6 Lessons)\r\n\r\nThis course is needed to get an Austrian driving license. Professional teachers are educating topics like the emergency call, the chain of survival life saving measures and so on. This topics are brought to you threw theoretival education and practical lessons.'),
(613482, 'How to use a defibrillator', '6 hours', 'Strudlhofgasse 5, 1090 Vienna', '2022-12-18 09:00:00', '2022-12-18 15:00:00', 45, 65, 35, 1, 30, 'https://www.smd.at/data/temp/Kurse_SMD_Erste_Hilfe_Defibrillatorschulung_250_122_cut.jpg', 'Our instructors are showing you the correct use of a defibrillator and explain and train with you the basic knowledge after sudden cardic arrest.'),
(649692, 'First Aid at Work (FAW)', '2 days', 'Favoritenstraße 111, 1100 Vienna', '2023-01-18 09:00:00', '2023-01-19 18:00:00', 110, NULL, 90, 1, 30, 'https://cdn-fhgji.nitrocdn.com/nRpEKQmaJGkqDIIeevbFfsNXoSXGXUHA/assets/static/optimized/rev-29f104d/c0c0fd38-b87b-41d8-9f31-abd902c751ce.jpeg', 'We offer courses for the First Aiders in your company. Following the Austrian regulations you have to have one First Aider for every 10 employees. Even if you only have one or two employed persons, you need to have one person with a First Aid Course. We offer those courses that are conform to the Austrian regulations.\r\n\r\nBusiness price on request.'),
(794136, 'Safety for babies & children\r\n', '8 days', 'Strudlhofgasse 5, 1090 Vienna', '2023-04-09 09:00:00', '2023-04-18 15:00:00', 240, 350, 200, 3, 20, 'https://www.smd.at/data/temp/Kurse_Kurse_SMD_Sicher_mit_Kindern_01_240_159_cut_250_122_cut.jpg', 'You have got children at home? You have to care for children? We will teach you all measures which are needed to feel safe. We especially care about the topic of accident prevention and life saving measures.\r\n\r\nTo offer both parents the possibility to visit the course we offer the possibilty to educate you at home.\r\n\r\nYou are taught by  pedagogically trained and professional teachers | Certificate | Courseware will be provided | Final examination\r\n'),
(987264, 'First Aid Course', '9 days', 'Holbeingasse 10, 1100 Vienna', '2022-12-18 09:00:00', '2022-12-28 15:00:00', 270, 400, 220, 3, 20, 'https://www.smd.at/data/temp/Kurse_SMD_Kursangebote_Erste_Hilfe_01_250_122_cut.jpg', 'This basic education offers you the possibiliy to spend professional help after an accident, injury our illness.\r\nYou are thaught how to react after an emergency and which live saving measures are needed.\r\n\r\nCourse Content:\r\nWhy should I help | The chain of survival | The emergency call | Danger zones | The non responsive casuality | The unconscious casuality | Removment of helmets | How to get people out of there car | The sudden cardic arrest | The defibrillator | The shock | Sever bleedings | Mechanical wounds | Chemical and thermal wounds | Intoxications | Injury after accidents');

-- --------------------------------------------------------

--
-- Table structure for table `registration_course`
--

CREATE TABLE `registration_course` (
  `id` int(11) NOT NULL,
  `fk_course` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `reservations`
--

CREATE TABLE `reservations` (
  `id` int(11) NOT NULL,
  `fk_course` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reservations`
--

INSERT INTO `reservations` (`id`, `fk_course`, `fk_user`) VALUES
(25, 487652, 1),
(26, 613482, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `birth_date` date NOT NULL,
  `profile_img` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `birth_date`, `profile_img`, `password`, `email`, `address`, `phone_number`, `status`) VALUES
(1, 'Gangarig', 'Nyamsurenghjkghjk', '2022-12-13', '6399596099bae.jpg', 'ae7dece7337e7bee49dda595e5bcd94f48f2da0b2e306926cec0868435e5150f', 'enkhmurun@gmail.com', '151b/1/12 Leopoldauer straße', '2147483647', 'trainer'),
(3, 'Gangarig', 'Nyamsuren', '2022-12-04', 'noimage.png', '97bb101f9ecf31ffd3788d77c1a02c431c1607e8168aaa53e38a89d445324428', 'enkhmasdfasdfurasdfun@gmail.com', '151b/1/12 Leopoldauer straße', '2147483647', 'STUDENT'),
(4, 'Gangarig', 'Nyamsuren', '2022-12-04', 'noimage.png', '421c76d77563afa1914846b010bd164f395bd34c2102e5e99e0cb9cf173c1d87', 'enkhmasdfasdfasdfurasdfun@gmail.com', '151b/1/12 Leopoldauer straße', '2147483647', 'STUDENT'),
(8, 'Gangarig', 'Nyamsuren', '2022-12-01', 'noimage.png', '932f3c1b56257ce8539ac269d7aab42550dacf8818d075f0bdf1990562aae3ef', 'enkhmurun@gmail.comiuh', '151b/1/12 Leopoldauer straße', '2147483647', 'trainer');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `registration_course`
--
ALTER TABLE `registration_course`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`fk_user`),
  ADD KEY `fk_course` (`fk_course`);

--
-- Indexes for table `reservations`
--
ALTER TABLE `reservations`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_customer` (`fk_course`),
  ADD KEY `fk_user` (`fk_user`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=987265;

--
-- AUTO_INCREMENT for table `registration_course`
--
ALTER TABLE `registration_course`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `reservations`
--
ALTER TABLE `reservations`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `registration_course`
--
ALTER TABLE `registration_course`
  ADD CONSTRAINT `registration_course_ibfk_2` FOREIGN KEY (`fk_user`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `registration_course_ibfk_3` FOREIGN KEY (`fk_course`) REFERENCES `courses` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `reservations`
--
ALTER TABLE `reservations`
  ADD CONSTRAINT `reservations_ibfk_1` FOREIGN KEY (`fk_course`) REFERENCES `courses` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `reservations_ibfk_2` FOREIGN KEY (`fk_user`) REFERENCES `user` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
