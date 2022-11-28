-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 21, 2022 at 05:01 PM
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
-- Database: `be17_cr5_animal_adoption_gangarig`
--

-- --------------------------------------------------------

--
-- Table structure for table `adoption_request`
--

CREATE TABLE `adoption_request` (
  `id` int(11) NOT NULL,
  `fk_pet` int(11) NOT NULL,
  `fk_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `adoption_request`
--

INSERT INTO `adoption_request` (`id`, `fk_pet`, `fk_user`) VALUES
(25, 82, 21),
(29, 82, 21),
(31, 82, 32);

-- --------------------------------------------------------

--
-- Table structure for table `animal`
--

CREATE TABLE `animal` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` varchar(1000) NOT NULL,
  `size` varchar(255) NOT NULL,
  `age` int(11) NOT NULL,
  `breed` varchar(255) NOT NULL,
  `vaccine_status` varchar(255) NOT NULL DEFAULT 'Vaccinated',
  `adoption_status` varchar(255) NOT NULL DEFAULT 'Available',
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `animal`
--

INSERT INTO `animal` (`id`, `name`, `location`, `description`, `size`, `age`, `breed`, `vaccine_status`, `adoption_status`, `picture`) VALUES
(82, 'Labrador Retriever', '1210 Wien', 'The Labrador Retriever or simply Labrador is a British breed of retriever gun dog. It was developed in the United Kingdom from fishing dogs imported from the colony of Newfoundland, and was named after the Labrador region of that colony.', 'big', 3, 'Labrador Retriever', 'Vaccinated', 'Available', '637b66b6aec92.jpg'),
(83, 'Cassi', 'Salzburg // Austria', 'The Golden Retriever is a Scottish breed of retriever dog of medium size. It is characterised by a gentle and affectionate nature and a striking golden coat. It is commonly kept as a pet and is among the most frequently registered breeds in several Western countries.', 'Big', 10, 'Golden Retriever', 'Vaccinated', 'Currently not available for adoption', '637b673bb7df8.jpg'),
(84, 'Roy', '1010 Wien', 'The German Shepherd or Alsatian is a German breed of working dog of medium to large size. The breed was developed by Max von Stephanitz using various traditional German herding dogs from 1899. It was originally bred as a herding dog, for herding sheep.', 'Big', 12, 'German Shepherd', 'Vaccinated', 'Available', '637b694673586.jpg'),
(85, 'Bree', 'Tirol // Austria', 'The Bulldog is a British breed of dog of mastiff type. It may also be known as the English Bulldog or British Bulldog. It is of medium size, a muscular, hefty dog with a wrinkled face and a distinctive pushed-in nose.', 'Middle', 15, 'Bulldog', 'Vaccinated', 'Available', '637b6995e8f94.jpg'),
(88, 'Corson', '1150 Wien', 'The beagle is a breed of small scent hound, similar in appearance to the much larger foxhound. The beagle was developed primarily for hunting hare known as beagling.', 'Middle', 14, 'Beagle', 'Vaccinated', 'Currently not available for adoption', '637b6a1b96d99.jpg'),
(89, 'Carloy', '1160 Wien', 'The French Bulldog, French: Bouledogue Français, is a French breed of companion dog or toy dog. It appeared in Paris in the mid-nineteenth century, apparently the result of cross-breeding of Toy Bulldogs imported from England and local Parisian ratters.', 'Small', 5, 'French Bulldog', 'Vaccinated', 'Available', '637b6a5f67276.jpg'),
(90, 'Prun', '1170', 'The Rottweiler is a breed of domestic dog, regarded as medium-to-large or large. The dogs were known in German as Rottweiler Metzgerhund, meaning Rottweil butchers&#039; dogs, because their main use was to herd livestock and pull carts laden with butchered meat to market.', 'Big', 2, 'Rottweiler', 'Vaccinated', 'Available', '637b6ab391f3e.jpg'),
(91, 'Tom', 'Tirol // Austria', 'The Great Dane is a large sized dog breed originating from Germany. The Great Dane descends from hunting dogs from the Middle Ages used to hunt wild boar and deer, and as guardians of German nobility. It is one of the largest breeds in the world along with its relative, the Irish Wolfhound.', 'Giant', 4, 'Great Dane', 'Vaccinated', 'Available', '637b6af06590c.jpg'),
(92, 'Harold', 'Linz // Austria', 'The Pembroke Welsh Corgi is a cattle herding dog breed that originated in Pembrokeshire, Wales. It is one of two breeds known as a Welsh Corgi. Pembroke Welsh Corgis descended from the Spitz family of dogs.', 'small', 1, 'Pembroke Welsh Corgi', 'Vaccinated', 'Available', '637b6b308ed71.jpg'),
(93, 'Bambar', 'Gobi //  Mongolei', 'The Alaskan Malamute is a large breed of dog that was originally bred for its strength and endurance to haul heavy freight as a sled dog and hound. It is similar to other arctic breeds such as the husky, the spitz, the Greenland Dog, Canadian Eskimo Dog, the Siberian Husky, and the Samoyed.', 'Giant', 9, 'Alaskan Malamute', 'Vaccinated', 'Available', '637b6c1e9e501.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `fname` varchar(255) NOT NULL,
  `lname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `phone_number` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(5) NOT NULL DEFAULT 'user'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `fname`, `lname`, `email`, `phone_number`, `address`, `picture`, `password`, `status`) VALUES
(21, 'Gangarig', 'Nyamsuren', 'enkhmurun@gmail.com', '+436603911915', '151b/1/12 Leopoldauer straße', '637b8e179124a.png', 'ae7dece7337e7bee49dda595e5bcd94f48f2da0b2e306926cec0868435e5150f', 'admin'),
(22, 'User', 'Surname', 'User1@gmail.com', '1234567891', 'Floridsdorf Wien', 'noimage.png', 'b759803bc6037a05e6564b6447a755b7f3862ba4d0d746785dbe133dcb6c8f4d', 'user'),
(23, 'User', 'Surname', 'User2@gmail.com', '1234567891', 'Floridsdorf Wien', 'noimage.png', 'b759803bc6037a05e6564b6447a755b7f3862ba4d0d746785dbe133dcb6c8f4d', 'user'),
(24, 'User', 'Surname', 'User3@gmail.com', '1234567891', 'Floridsdorf Wien', 'noimage.png', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'user'),
(25, 'User', 'Surname', 'User4@gmail.com', '1234567891', 'Floridsdorf Wien', 'noimage.png', 'ef797c8118f02dfb649607dd5d3f8c7623048c9c063d532cc95c5ed7a898a64f', 'user'),
(26, 'User', 'Surname', 'User5@gmail.com', '1234567891', 'Floridsdorf Wien', 'noimage.png', '15e2b0d3c33891ebb0f1ef609ec419420c20e320ce94c65fbc8c3312448eb225', 'user'),
(27, 'User', 'Surname', 'User6@gmail.com', '1234567891', 'Floridsdorf Wien', 'noimage.png', '523aa18ecb892c51fbdbe28c57e10a92419e0a73e8931e578b98baffccf99cdd', 'user'),
(28, 'User', 'Surname', 'User7@gmail.com', '1234567891', 'Floridsdorf Wien', 'noimage.png', '523aa18ecb892c51fbdbe28c57e10a92419e0a73e8931e578b98baffccf99cdd', 'user'),
(32, 'Gangarig', 'Nyamsuren', 'enkhmurun1@gmail.com', '+436603911915', '151b/1/12 Leopoldauer straße', '637b73cd24526.png', '932f3c1b56257ce8539ac269d7aab42550dacf8818d075f0bdf1990562aae3ef', 'user');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `adoption_request`
--
ALTER TABLE `adoption_request`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `animal`
--
ALTER TABLE `animal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `adoption_request`
--
ALTER TABLE `adoption_request`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT for table `animal`
--
ALTER TABLE `animal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
