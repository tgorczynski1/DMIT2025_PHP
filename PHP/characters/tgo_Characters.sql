-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 19, 2020 at 05:35 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.3.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `tgorczynski1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tgo_Characters`
--

CREATE TABLE `tgo_Characters` (
  `cid` int(11) NOT NULL,
  `tgo_firstname` text NOT NULL,
  `tgo_lastname` text NOT NULL,
  `tgo_description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tgo_Characters`
--

INSERT INTO `tgo_Characters` (`cid`, `tgo_firstname`, `tgo_lastname`, `tgo_description`) VALUES
(12, 'Eddard', 'Stark', 'The Lord of Winterfell and new Hand of the King. A devoted father and dutiful lord, he is best characterized by his strong sense of honor, and he strives to always do what is right, regardless of his personal feelings.'),
(13, 'Catelyn', 'Tully', 'Nedâ€™s wife and Lady Stark of Winterfell. She is intelligent, strong, and fiercely devoted to her family, leading her to seek out the person responsible for trying to kill her son Bran.'),
(14, 'Daenerys', 'Stormborn Targaryen', 'The Dothraki khaleesi (queen) and Targaryen princess. She and her brother are the only surviving members of the Targaryen family, and she grows from a frightened girl to a confident ruler, while still maintaining her kindness, over the course of the novel.'),
(15, 'Jon', 'Snow', 'Ned Starkâ€™s bastard son. Since Catelyn is not his mother, he is not a proper member of the Stark family, and he often feels himself an outsider. He is also a highly capable swordsman and thinker, with a knack for piercing observations.'),
(16, 'Tyrion', 'Lannister', 'A small man with a giant intellect and sharp tongue. Tyrion does not pity himself but rather accepts his shortcomings as a little person and turns them to his advantage. He loves his family but recognizes their greed and ambition.'),
(17, 'Bran', 'Stark', 'One of the youngest of the Stark children. Bran is fascinated by stories of knights and adventure, but when is paralyzed in a fall and realizes he is no longer able to become a knight, he is forced to reconsider his life.'),
(18, 'Sansa', 'Stark', 'The elder Stark daughter and a beautiful, but extremely naÃ¯ve, young girl. The twelve-year-old Sansa imagines her life as though it were a storybook, ignoring cruel realities around her and concerning herself only with marrying Joffrey Baratheon.'),
(20, 'Cersei', 'Lannister', 'Queen of the realm and wife of Robert Baratheon. She despises Robert (as well as most other people it seems), and she is cunning and extremely ambitious.'),
(21, 'Petyr', 'Baelish', 'The Red Keepâ€™s master of coin. He is shrewd, conniving, and selfish, and he keeps informed about everything that goes on in Kingâ€™s Landing. He holds a grudge against the Starks because he wanted to marry Catelyn when he was younger.'),
(22, 'Varys', '(The Spider)', 'The Red Keepâ€™s master of whispers and a eunuch. His role in the court is to run a network of spies and keep the king informed, and he often uses what he knows to manipulate those around him, including the king.'),
(23, 'Robert', 'Baratheon', 'The corpulent king of Westeros. He loves to fight, drink, and sleep with women, and he hates the duties of ruling. He and Ned are long-time friends, and he was engaged to Nedâ€™s sister until she died.'),
(24, 'Ser Jorah', 'Mormont', 'An exiled knight who serves unofficially as Daenerysâ€™s chief advisor. Though he was exiled by Ned Stark for selling slaves, he is intelligent, valiant, and a great fighter. He swears allegiance to Viserys as true king of Westeros, but he also feeds information about the Targaryens back to Varys.'),
(25, 'Khal', 'Drogo', 'A powerful khal (king) among the Dothraki people and the husband of Daenerys Targaryen. Stoic and brave, Drogo is an exceptional warrior who shows his enemies no mercy. He controls a massive nomadic tribe, or khalasar.'),
(26, 'Ser Jaime', 'Lannister', 'Brother to Tyrion and Cersei, as well as Cerseiâ€™s lover. Jaime is arrogant, short-tempered, and rash, but heâ€™s also a gifted swordsman. He is widely mistrusted and called Kingslayer because he murdered the previous king.'),
(27, 'Sandor (The Hound)', 'Clegane', 'Prince Joffâ€™s unofficial bodyguard. Proud that he is not a knight, The Hound appears to have no scruples whatsoever and does what Joffrey orders, however cruel or unjust, without question. His face is scarred on one side by extensive burning inflicted by his brother, Gregor.'),
(28, 'Arya', 'Stark', 'The youngest Stark girl and a wild, willful, but very intelligent child. What the ten-year-old Ayra lacks in her sisterâ€™s refinement, she makes up for with skill in swordfighting and riding. Arya rejects the idea of a womanâ€™s role being to marry and have babies.'),
(29, 'Tywin', 'Lannister', 'The calculating lord of Casterly Rock and the richest man in the realm. A fierce general, Tywin will go to great ends to protect the honor of the Lannister name.'),
(31, 'Prince Joffrey', 'Baratheon', 'The repulsive prince of Westeros. The twelve-year-old Joff is the eldest child of Cersei and Robert, and he is spoiled, impulsive, and cruel when using his power as prince and heir to the throne.');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tgo_Characters`
--
ALTER TABLE `tgo_Characters`
  ADD PRIMARY KEY (`cid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tgo_Characters`
--
ALTER TABLE `tgo_Characters`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
