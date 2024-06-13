-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 12, 2024 at 09:51 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `web_project_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `summary` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `title`, `summary`, `image`, `category`, `content`) VALUES
(8, 'Cristiano Ronaldo\'s Secret to Success: A Hidden Pact with the Goalposts!', 'This article reveals the \"true\" secret behind Cristiano Ronaldo\'s uncanny ability to score penalties: a mythical pact with the goalposts, ensuring they always sway in his favor.', 'art4.png', 'sport', 'Ever wondered how Cristiano Ronaldo manages to maintain his extraordinary penalty scoring rate? Rumor has it that during a mystical night in his early career, Ronaldo entered a secret pact with the goalposts themselves. According to our entirely fictitious sources, these goalposts vowed eternal allegiance to Ronaldo, bending and swaying to accommodate his shots. The article includes a humorous, imagined interview with the left goalpost, who apparently idolizes Ronaldo and occasionally takes vacations with the crossbar. We even delve into the \"scientific\" mechanics of how the posts subtly shift positions during penalties. To conclude, a tongue-in-cheek warning advises other footballers about the high cost of attempting similar negotiations with their local goalposts.'),
(9, 'Unveiling Tom Brady\'s Secret: Is He a Time Traveler?', 'This satirical piece suggests that Tom Brady’s prolonged football success is due to him being a time traveler, using future insights to perfect his game.', 'art5.png', 'sport', 'Tom Brady, the age-defying NFL star, has long been a subject of awe. But what if the real reason behind his enduring prowess isn\'t just skill and diet? What if it\'s time travel? This article offers a playful exploration of the idea that Brady has been hopping through time, gathering knowledge from the future to enhance his current game. We \"uncover\" photos of Brady alongside historical figures and share quotes from fictitious experts theorizing how time travel could explain his tactical genius. There\'s even a spoof segment where Brady inadvertently uses future slang, baffling his teammates and sports journalists alike.'),
(10, 'The Magic Racket: Serena Williams\' Secret Weapon Explained!', 'A tongue-in-cheek exposé on how Serena Williams\' tennis racket is enchanted, giving her superhuman abilities on the court.', 'art2.png', 'sport', 'Serena Williams has dominated the world of tennis with what seems like supernatural force. Could the secret lie within her racket? This article humorously suggests that Serena\'s racket is not just a piece of equipment but a magical artifact, imbued with special powers that enhance her play. We provide a mock expose from an alleged insider who claims to have witnessed the racket levitating and glowing during midnight training sessions. The story playfully describes the racket\'s mythical features, such as \"auto-targeting\" and \"energy boosting,\" and ends with a faux plea from competitors begging for the magic to be shared.'),
(11, 'Lewis Hamilton\'s Helmet: AI Co-Pilot or Alien Technology?', 'Satirical speculation that Lewis Hamilton\'s racing success is helped by his high-tech helmet, possibly containing alien technology or an AI co-pilot.', 'art3.png', 'sport', 'F1 champion Lewis Hamilton is no stranger to speed, but could his helmet be the real MVP? This article jests that Hamilton\'s helmet is equipped with either advanced AI or alien technology, offering him an otherworldly advantage on the track. We spin a yarn about the helmet\'s origin, humorously claiming it was discovered in a mysterious crater and has since been adapted for Hamilton\'s exclusive use. The piece includes \"interviews\" with faux engineers marveling at the helmet\'s capabilities, such as telepathic communication with the car and predictive analytics for perfect turns.'),
(12, 'The Diet Behind Messi\'s Magic: Unicorn Steaks?', 'This piece jests that Lionel Messi\'s agility and skills are fueled by an extraordinary diet of mythical unicorn steaks.', 'ART1.png', 'sport', 'Lionel Messi\'s agility and football prowess are legendary, but perhaps his diet is what truly sets him apart. This article tongue-in-cheekily claims that Messi\'s secret diet includes unicorn steaks—known for their mythical power-boosting properties. We describe how this exclusive culinary choice enhances his performance, providing him with the speed and stamina of mythical creatures. The piece features fictional interviews with nutritionists and chefs who \"confirm\" the existence of this magical diet, and concludes with playful advice for aspiring footballers looking to find their own mythical meal plan.'),
(13, 'The Real Reason Behind The 24-Hour Workday Proposal: More Coffee Breaks!', 'Politicians Propose 24-Hour Workdays to Boost National Coffee Consumption\"\r\nSummary: This satirical piece explores the absurdity of a proposed 24-hour workday by politicians, ostensibly to increase productivity but actually intended to boost coffee sales ', 'art6.png', 'politics', 'In a shocking twist of logic, lawmakers have recently proposed extending the workday to a full 24 hours. Sources—none of whom could be named because, frankly, they don\'t exist—claim the move is aimed at skyrocketing national coffee consumption and thus supporting our struggling coffee shop chains. The article humorously outlines the supposed benefits of this policy, such as unlimited coffee breaks and nighttime productivity spurts, while sarcastically questioning the need for sleep or personal lives. We \"interview\" a fictitious lawmaker who passionately defends the proposal, arguing that sleep is a less productive use of time compared to drinking coffee and working.'),
(14, 'Alien Endorsements: The New Trend in Presidential Campaigns', 'A humorous look at the fictional trend of presidential candidates seeking endorsements from aliens to win over the conspiracy theorist vote.', 'art7.png', 'politics', 'As the election heats up, candidates are turning to unconventional sources for endorsements—namely, extraterrestrial beings. This article pokes fun at the absurdity of the situation with fabricated interviews and \"leaked\" government documents showing candidates attempting to communicate with aliens. The piece imagines a scenario where one candidate claims to have secured an exclusive endorsement from Martian leaders, promising voters a new interstellar alliance. This satirical exposé ends with a spoof poll indicating a surprising number of voters would indeed feel more inclined to vote for a candidate with alien approval.'),
(15, 'Why Politicians Are Wearing Clown Shoes to Debates', 'This article jests that politicians have started wearing oversized clown shoes to debates to distract from their policies and connect with a more whimsical electorate.', 'art8.png', 'politics', 'In the latest political fashion trend, candidates across the spectrum have been spotted wearing brightly colored, oversized clown shoes during debates. This humorous article suggests the shoes are not just a bold fashion statement but a strategic ploy to distract voters from more contentious policy discussions. We fabricate quotes from a fictional fashion expert who analyzes the implications of this trend on voter perception and debate dynamics. The piece concludes with a tongue-in-cheek call for voters to pay more attention to the issues rather than the footwear.'),
(16, 'World Leaders Agree: Naps Mandatory During Summits', 'Satirically reporting on a new global agreement among world leaders to incorporate mandatory nap times during lengthy summits to increase efficiency and reduce tensions.', 'art9.png', 'politics', 'In an unprecedented move, world leaders have agreed to introduce mandatory nap times during all future international summits. This article humorously explores the rationale behind the decision, citing the need to combat decision fatigue and reduce diplomatic tensions. We invent quotes from various heads of state praising the health benefits of mid-meeting naps and claiming remarkable improvements in negotiation outcomes. The piece wraps up with a satirical \"leaked\" schedule of the next summit, highlighting designated nap zones and sleep-friendly policies.'),
(17, 'Secrets of the Congressional Gym: Lawmakers\' True Legislative Powerhouse', 'This playful article claims that the real decisions in Congress are made in the congressional gym, where lawmakers flex more than just their political muscles.', 'art10.png', 'politics', 'Contrary to popular belief, the true locus of legislative power isn\'t the Senate floor or the House chamber—it\'s the congressional gym. This satirical piece reveals how major political decisions are actually hashed out on treadmills and weight benches, with lawmakers using physical endurance contests to settle policy disputes. We create humorous anecdotes involving fictionalized gym challenges that determine the fate of legislation, from bench press competitions to deciding tax reform to treadmill races influencing foreign policy. The article concludes with a spoof call for transparency, urging televised coverage of these gym sessions to give voters a real insight into political processes.');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` enum('admin','member') NOT NULL DEFAULT 'member'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role`) VALUES
(2, 'member1', 'memberpass', 'member'),
(3, 'momeragic', '$2y$10$10N//0CaH./ZI4T0gud.oulgMn0wJ/YA9P4R/pUlLTOGz.QUsaP9W', 'member'),
(5, 'Admin', '$2y$10$JX73wPWC50N3v2owkLxDyuW2mKs0xJI3/o7geQQfPV7ZDTNTWPx1q', 'admin'),
(6, 'lukaskoko', '$2y$10$qeOjasGDljPpdvswFqIIh.651ZKBfz/e77bHl1wSoLtdCzbq1DQMu', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
