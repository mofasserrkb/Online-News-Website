-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2021 at 04:31 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `newsonline`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(20) NOT NULL,
  `post` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`, `post`) VALUES
(1, 'Health', 1),
(2, 'International news', 1),
(3, 'Sports', 0),
(4, 'Bangladesh', 1),
(6, 'Politics', 1);

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE `post` (
  `post_id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `category` varchar(100) NOT NULL,
  `post_date` varchar(50) NOT NULL,
  `author` int(11) NOT NULL,
  `post_img` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`post_id`, `title`, `description`, `category`, `post_date`, `author`, `post_img`) VALUES
(16, '20 injured as ferry hits Padma Bridge pillar', 'The accident was caused by strong current in the river, says ferry master At least 20 people have been injured in a ferry accident in the Padma River in Munshiganj, officials said on Friday. The accident occurred when a ro-ro ferry, named Shahjalal, crashed into a pillar of the Padma Bridge near the Mawa area of Munshiganj at around 9am, reports UNB. Though the front part of the vessel has been mangled, there was no structural damage to the bridge, the officials said, adding that all the injured had been admitted to nearby hospitals. Bangladesh Inland Water Transport Corporation (BIWTC) Assistant General Manager Shafiqul Islam said the passengers fell over each other as the ferry hit the pillar.Ads The accident was caused by strong current in the river, says ferry master At least 20 people have been injured in a ferry accident in the Padma River in Munshiganj, officials said on Friday. The accident occurred when a ro-ro ferry, named Shahjalal, crashed into a pillar of the Padma Bridge near the Mawa area of Munshiganj at around 9am, reports UNB. Though the front part of the vessel has been mangled, there was no structural damage to the bridge, the officials said, adding that all the injured had been admitted to nearby hospitals. Bangladesh Inland Water Transport Corporation (BIWTC) Assistant General Manager Shafiqul Islam said the passengers fell over each other as the ferry hit the pillar. Also Read - Cargo ship with Padma Bridge construction materials sinks in Hatiya 2021/07/bill-pay-news-portel-770-x-90-1-1627508116890.gif \"Some 33 vehicles that the ferry was carrying also sustained minor damages due to the impact of the crash, which completely destroyed the pantry area of the vessel,\" he said. The ferry master, Abdur Rahman, said the steering wheel got dislocated as the vessel\'s electrical circuit broke down suddenly and strong river current triggered the crash. BIWTC suspended the ferry master later in the day for failing to operate the vessel properly, reports BSS. The bridge authority has expressed concern as three ferries have collided with the pillars this month alone. ', '4', '10 Sep, 2021', 1, '20210910040039.jpg'),
(17, 'Bangladesh to stop first jab of Moderna vaccine', 'The government has decided to suspend administering the first dose of the Moderna vaccine from Thursday and start administering the second dose. The decision was announced on Tuesday through a notice signed by Dr Shamsul Haque, line director of the Directorate General of Health Services (DGHS) and member secretary of the Covid-19 Vaccine Deployment Taskforce Committee. The DGHS started administering the Moderna vaccine from July 13 after receiving the first consignment of 2.5 million doses from the US under Covax facilities. Bangladesh later received another consignment of 3 million doses of vaccine under the same scheme. As the country has a stock of 5.5 million doses, the health authorities decided to keep half of it for the second dose. In general, there is a gap of 28 days between the two doses. Till Monday afternoon, the DGHS administered 1,908,549 doses of the vaccine. The circular however said administering the Moderna vaccine as the first dose would continue at the centres depending on the stock.The DGHS administered some 6,844,085 doses of Sinopharm vaccine till Monday afternoon, leaving 1,255,915 doses of the vaccine in government hand', '1', '10 Sep, 2021', 1, '20210910040354.jpg'),
(18, 'Peace in Afghanistan, won’t harm anyone. What have Taliban said so far', 'The Taliban captured Kabul on Sunday with a stunning speed after the government collapsed suddenly and Afghanistan president Ashraf Ghani left the country.The Taliban have declared the war in Afghanistan over and on Monday the group’s fighters were seen all over Kabul, including in the formerly heavily fortified district of Green Zone, even as they sought to assure Afghans and other countries alike that they mean no harm. On Sunday, they seized Kabul in just over a week and entered the presidential palace as President Ashraf Ghani fled from the country, saying he wanted to avoid bloodshed.', '2', '10 Sep, 2021', 1, '20210910040508.jpg'),
(19, 'GM Quader: No alternative to building field hospitals to save lives', 'The Bangladesh Army can be given the responsibility to build the field hospitals if necessary, says the JaPa chairman As Covid cases continue to surge in Bangladesh, Jatiya Party (JaPa) Chairman GM Quader on Friday said there was no alternative to setting up field hospitals to save the lives of the virus-infected people. In a statement, he said it had become urgent to construct field hospitals for Covid treatment in the areas where the virus transmission is very high. “Since the outbreak of corona is not waning, there’s no alternative to building the field hospitals at this moment to save the lives of the country’s people,” he said.', '6', '10 Sep, 2021', 1, '20210910040621.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(10) NOT NULL,
  `first_name` varchar(30) NOT NULL,
  `last_name` varchar(30) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `first_name`, `last_name`, `username`, `password`, `role`) VALUES
(1, 'Md.Mofasser', 'Hossain', 'mofasser', '05077c0a1aafed6e9c6b46d2b71dd3bb', 1),
(2, 'Rakib', 'Hossain', 'rakibhossain', 'a36949228c1d9146cace6359d88968e8', 1),
(8, 'Imran', 'Hossain', 'imranhossain', '4122605857d2ebea9fed1354edbb96c1', 1),
(9, 'Ajmal', 'hasan', 'ajmalhasan', '211224667056ec0c1f63df28058fc6ec', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`post_id`),
  ADD KEY `post_id` (`post_id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `post_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
