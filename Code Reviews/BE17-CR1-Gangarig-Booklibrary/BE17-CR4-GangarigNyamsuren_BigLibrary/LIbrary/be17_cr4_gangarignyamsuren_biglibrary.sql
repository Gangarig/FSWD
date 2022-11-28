-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 14, 2022 at 12:51 PM
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
-- Database: `be17_cr4_gangarignyamsuren_biglibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(255) NOT NULL,
  `price` decimal(13,2) NOT NULL,
  `details` text NOT NULL,
  `picture` varchar(255) DEFAULT NULL,
  `qtty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `price`, `details`, `picture`, `qtty`) VALUES
(1, 'The Lord of the Rings: Fellowship of the Ring', 'J. R. R. Tolkien', '25.00', 'An ancient Ring thought lost for centuries has been found, and through a strange twist of fate has been given to a small Hobbit named Frodo. When Gandalf discovers the Ring is in fact the One Ring of the Dark Lord Sauron, Frodo must make an epic quest to the Cracks of Doom in order to destroy it. However, he does not go alone. He is joined by Gandalf, Legolas the elf, Gimli the Dwarf, Aragorn, Boromir, and his three Hobbit friends Merry, Pippin, and Samwise. Through mountains, snow, darkness, forests, rivers and plains, facing evil and danger at every corner the Fellowship of the Ring must go. Their quest to destroy the One Ring is the only hope for the end of the Dark Lords reign.', 'fellowship_of_the_ring.jpg', 10),
(2, 'The Lord of the Rings: Twin Towers', 'J. R. R. Tolkien', '25.00', 'The two towers between Mordor and Isengard, Barad-dûr and Orthanc, have united in their lust for destruction. The corrupt wizard Saruman, under the power of the Dark Lord Sauron, and his slimy assistant, Gríma Wormtongue, have created a grand Uruk-hai army bent on the destruction of Man and Middle-earth.', 'the_two_towers.jpg', 0),
(3, 'The Lord of the Rings: Return of the King', 'J. R. R. Tolkien', '25.00', 'The final confrontation between the forces of good and evil fighting for control of the future of Middle-earth. Frodo and Sam reach Mordor in their quest to destroy the One Ring, while Aragorn leads the forces of good against Sauron\'s evil army at the stone city of Minas Tirith.', 'Return_of_the_King.jpg', 0),
(4, 'Harry Potter and the Philosopher\'s Stone ', 'J. K. Rowling', '25.00', 'This is the tale of Harry Potter (Daniel Radcliffe), an ordinary eleven-year-old boy serving as a sort of slave for his aunt and uncle who learns that he is actually a wizard and has been invited to attend the Hogwarts School for Witchcraft and Wizardry. Harry is snatched away from his mundane existence by Rubeus Hagrid (Robbie Coltrane), the groundskeeper for Hogwarts, and quickly thrown into a world completely foreign to both him and the viewer. Famous for an incident that happened at his birth, Harry makes friends easily at his new school. He soon finds, however, that the wizarding world is far more dangerous for him than he would have imagined, and he quickly learns that not all wizards are ones to be trusted.', 'philosophers_stone.jpg', 0),
(5, 'Harry Potter and the Chamber of Secrets', 'J. K. Rowling', '25.00', 'The story follows Harry\'s second year at Hogwarts School of Witchcraft and Wizardry, where the Heir of Salazar Slytherin opens the Chamber of Secrets, unleashing a monster that petrifies the school\'s students. The film is the sequel to Harry Potter and the Philosopher\'s Stone (2001).', 'chamber_of_Secrets.jpg', 0),
(6, 'Harry Potter and the Prisoner of Azkaban', 'J. K. Rowling', '25.00', 'The book follows Harry Potter, a young wizard, in his third year at Hogwarts School of Witchcraft and Wizardry. Along with friends Ronald Weasley and Hermione Granger, Harry investigates Sirius Black, an escaped prisoner from Azkaban, the wizard prison, believed to be one of Lord Voldemort\'s old allies.', 'prisoner_of_azkaban.jpg', 0),
(7, 'Harry Potter and the Goblet of Fire', 'J. K. Rowling', '25.00', 'Harry\'s (Daniel Radcliffe\'s) fourth year at Hogwarts is about to start and he is enjoying the summer vacation with his friends. They get the tickets to The Quidditch World Cup Final, but after the match is over, people dressed like Lord Voldemort\'s (Ralph Fiennes\') \"Death Eaters\" set a fire to all of the visitors\' tents, coupled with the appearance of Voldemort\'s symbol, the \"Dark Mark\" in the sky, which causes a frenzy across the magical community. That same year, Hogwarts is hosting \"The Triwizard Tournament\", a magical tournament between three well-known schools of magic : Hogwarts, Beauxbatons, and Durmstrang. The contestants have to be above the age of seventeen, and are chosen by a magical object called \"The Goblet of Fire\". On the night of selection, however, the Goblet spews out four names instead of the usual three, with Harry unwittingly being selected as the Fourth Champion. Since the magic cannot be reversed, Harry is forced to go with it and brave three exceedingly difficult tasks.', 'goblet_of_fire.jpg', 0),
(8, 'Harry Potter and the Order of the Phoenix', 'J. K. Rowling', '25.00', 'It follows Harry Potter\'s struggles through his fifth year at Hogwarts School of Witchcraft and Wizardry, including the surreptitious return of the antagonist Lord Voldemort, O.W.L. exams, and an obstructive Ministry of Magic.', 'order_of_the_phoenix.jpg', 0),
(9, 'Harry Potter and the Half-Blood Prince', 'J. K. Rowling', '25.00', 'In this book, Harry Potter learns a lot about Lord Voldemort\'s past, and Harry Potter prepares for the final battle against his nemesis with the help of Headmaster Dumbledore. But in that time, Voldemort returns to power, and makes a plan to destroy Harry.', 'half_blood_prince.jpg', 0),
(10, 'Harry Potter and the Deathly Hallows', 'J. K. Rowling', '25.00', 'While villainous Lord Voldemort begins taking over the Ministry of Magic, Harry, Ron and Hermione must race against time to finish Dumbledore\'s quest to find and destroy Voldemort\'s Horcruxes in order to stop the Dark Lord once and for all.', 'deathly_hallows.jpg', 0),
(25, 'asdfasdf', 'asdfasdf', '69.00', '', '6371fa336dd96.jpg', 0);

-- --------------------------------------------------------

--
-- Table structure for table `dvd`
--

CREATE TABLE `dvd` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `price` decimal(13,2) NOT NULL,
  `picture` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `dvd`
--

INSERT INTO `dvd` (`id`, `name`, `price`, `picture`) VALUES
(1, 'PHP course', '100.00', 'php'),
(2, 'Python course', '100.00', 'python'),
(3, 'HTML course', '50.00', 'html'),
(4, 'CSS course', '50.00', 'css'),
(5, 'Javascript course', '100.00', 'javascript'),
(6, 'Java course', '500.00', 'java'),
(7, 'C++ course', '500.00', 'c++'),
(8, 'C# course', '500.00', 'csharp'),
(9, 'AJAX course', '100.00', 'ajax'),
(10, 'MongoDB course', '100.00', 'mongodb');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dvd`
--
ALTER TABLE `dvd`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `dvd`
--
ALTER TABLE `dvd`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
