-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 21, 2022 at 06:35 PM
-- Server version: 10.4.19-MariaDB
-- PHP Version: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fyp`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL COMMENT 'Admin id, Auto increment',
  `name` varchar(10) NOT NULL COMMENT 'Admin Name',
  `username` varchar(50) NOT NULL COMMENT 'Username of admin',
  `password` varchar(20) NOT NULL COMMENT 'Admin password',
  `dob` date NOT NULL COMMENT 'Admin Date of birth',
  `address` varchar(100) NOT NULL COMMENT 'Admin address',
  `gender` varchar(6) NOT NULL COMMENT 'Admin gender'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `name`, `username`, `password`, `dob`, `address`, `gender`) VALUES
(1, 'ujwal', 'admin', 'admin', '2022-02-17', 'kim,surat', 'male');

-- --------------------------------------------------------

--
-- Table structure for table `agent`
--

CREATE TABLE `agent` (
  `agent_id` int(11) NOT NULL COMMENT 'Agent id, Auto increment',
  `username` varchar(50) NOT NULL COMMENT 'username of agent for login',
  `password` varchar(15) NOT NULL COMMENT 'Password for login',
  `agent_name` varchar(20) NOT NULL COMMENT 'Name of agent',
  `email` varchar(50) NOT NULL COMMENT 'Email id of agent',
  `dob` date NOT NULL COMMENT 'Date of birth',
  `address` varchar(100) NOT NULL COMMENT 'Address of agent',
  `city` varchar(12) NOT NULL COMMENT 'City of agent',
  `state` varchar(12) NOT NULL COMMENT 'State of agent',
  `zipcode` int(6) NOT NULL COMMENT 'Zip code of agent''s address',
  `branch` varchar(15) NOT NULL COMMENT 'Branch of agent',
  `gender` varchar(6) NOT NULL COMMENT 'Gender of agent',
  `phone` bigint(11) NOT NULL COMMENT 'Contact number of agent',
  `status` varchar(12) NOT NULL DEFAULT 'pending' COMMENT 'Status Of Agent'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agent`
--

INSERT INTO `agent` (`agent_id`, `username`, `password`, `agent_name`, `email`, `dob`, `address`, `city`, `state`, `zipcode`, `branch`, `gender`, `phone`, `status`) VALUES
(1, 'Ramsey', 'qwerty', 'Ramsey Dann', 'rmee@gmail.com', '2022-03-25', '  102,abc xyz', '  surat', '  gujarat', 154212, '  surat', 'female', 1234567890, 'approved'),
(9, 'DomToretto', 'qwerty', 'Dom Torreto', 'domTorr@gmail.com', '2022-03-18', ' xyz', ' kim', ' Guj', 394110, '  Kim', 'male', 7698298660, 'approved'),
(10, 'Xavier', 'qwerty', 'Charles Xavier', 'meXavier@gmail.com', '2022-03-24', 'Bharuch', 'Bharuch', 'Guj', 155864, 'Bharuch', 'male', 1234567890, 'approved'),
(12, 'ujwal', 'qwerty', 'Ujwal Sadharia', 'patelujwal8@gmail.com', '2022-03-19', 'kim', 'Surat', 'Gujarat', 394110, 'Kudsad', 'male', 7698298660, 'approved'),
(13, 'Harshal', 'qwerty', 'Harshal Sadharia', 'patelujwal8@gmail.com', '2022-03-20', 'Kim', 'Surat', 'Gujarat', 394110, 'Kudsad', 'male', 7698298660, 'rejected'),
(15, 'om', '123qwe', 'om modi', 'modiom9942@gmail.com', '2022-04-20', 'kim', 'Surat', 'Gujarat', 394110, 'Kudsad', 'male', 7698298660, 'approved'),
(16, 'Sunny', 'qwerty', 'sunny Yadav', 'sunny@gmail.com', '2022-04-01', 'Ganesh nagar', 'Kim', 'Gujarat', 394110, 'Kudsad', 'male', 7698298660, 'pending'),
(18, 'Dhyey', 'Dhyey@123', 'Dhyey Ghetiya', 'Dhyey7607@gmail.com', '2022-04-16', 'Neelam Park', 'Kim', 'Gujarat', 3565566, 'Kudsad', 'male', 7878424250, 'rejected'),
(19, 'Bhaumik', 'Bhaumik@123', 'Bhaumik Sharma', 'patelujwal8@gmail.com', '2022-04-13', 'Kosamba ', 'Kosamba', 'Gujarat', 394111, 'Kosamba', 'male', 9727842878, 'pending'),
(21, 'Meet', 'Meet@123', 'Meet kalola', 'Meet@gmail.com', '2022-04-23', 'Navsari Gujarat', 'Navsari', 'Gujarat', 394115, 'Shantadevi', 'male', 1234567892, 'approved');

-- --------------------------------------------------------

--
-- Table structure for table `chatbot`
--

CREATE TABLE `chatbot` (
  `id` int(11) NOT NULL COMMENT 'Id of chatbot row',
  `question` varchar(255) NOT NULL COMMENT 'Question from user',
  `reply` varchar(255) NOT NULL COMMENT 'Reply from bot'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `chatbot`
--

INSERT INTO `chatbot` (`id`, `question`, `reply`) VALUES
(1, 'hi||hola||hii||hey||hello', 'Hello, How Are You?'),
(2, 'who are you?', 'i am LifeTree.com'),
(3, 'what is life insurance?||what is life insurance ?||what is life insurance', 'Life insurance is a contract between an insurance policy holder and an insurer or assurer, where the insurer promises to pay a designated beneficiary a sum of money upon the death of an insured person. Depending on the contract, other events such as termi'),
(4, 'Good morning || GM || gm', 'Hello, Good Morning.'),
(5, 'Benefits of life insurance? || benefits of life insurance ?|| Benefits of life insurance?', '1. Life Insurance Payouts Are Tax-Free\n2. Your Dependents Won’t Have to Worry About Living Expenses\n3. Life Insurance Can Cover Final Expenses');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `customer_id` int(11) NOT NULL COMMENT 'customer id , Auto Generated',
  `c_name` varchar(20) NOT NULL COMMENT 'Name of customer',
  `email` varchar(255) NOT NULL COMMENT 'Any email id',
  `username` varchar(50) NOT NULL COMMENT 'Username of customer',
  `password` varchar(255) NOT NULL COMMENT 'Password for login',
  `phone` bigint(11) NOT NULL COMMENT 'customer''s contact number',
  `image` varchar(255) DEFAULT NULL COMMENT 'customer''s image',
  `address` varchar(100) NOT NULL COMMENT 'customer''s address for future contact',
  `city` varchar(12) NOT NULL COMMENT 'City of customer',
  `state` varchar(12) NOT NULL COMMENT 'State of customer',
  `zipcode` int(11) NOT NULL COMMENT 'Zipcode of customer''s address',
  `marital_status` varchar(11) NOT NULL COMMENT 'Marital status of customer',
  `dob` date NOT NULL COMMENT 'customer''s date of birth',
  `gender` varchar(6) NOT NULL COMMENT 'customer''s gender'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`customer_id`, `c_name`, `email`, `username`, `password`, `phone`, `image`, `address`, `city`, `state`, `zipcode`, `marital_status`, `dob`, `gender`) VALUES
(2, 'Rahul Gupta', 'Rahulrs@gmail.com', 'rs45', '$2y$10$I/6Ef1/Rg2YqRa88ka4G1uunK6hBRqWLRZMp7MwIM6VnCwM5xGCGq', 123456789, 'c5.jpg', 'janakpuri', 'kim', 'gujarat', 394110, 'Married', '2022-03-25', 'male'),
(3, 'Het Prajapati', 'hets@gmail.com', 'het', '$2y$10$s1kQxpuA5fAHySmyAa3K/uQXW9w4p4GpUjzn0vrOzKYzeFv2bC6ra', 1234567898, 'c14.jpg', '76 Rangkrupa  society', 'kim', 'Gujarat', 394110, 'Unmarried', '2022-03-19', 'male'),
(7, 'Dhyey Ghetiya', 'patelujwal8@gmail.com', 'dhyey69', '$2y$10$FTCIcOUnYgHNr4XYvNdAJeQXcoR9m4hj5ddvJFJl7pjI2KtkYikVe', 9924624184, 'c11.jpg', 'Neelam Park', 'Kim', 'Gujarat', 394110, 'Unmarried', '2005-12-30', 'male'),
(8, 'Dan Joseph', 'Dan@gmail.com', 'danJose', '$2y$10$OF3oVF07QXdKNqKWhGFToeEuvbxFJwy9vB1oTQqzCuhiG5aqLTfmO', 9726005808, '927721054.jpg', 'Rupa panna kim', 'Kim', 'Gujarat', 394110, 'Unmarried', '2022-04-01', 'male'),
(9, 'Nikita Suthar', 'Nikita@gmail.com', 'Nikki', '$2y$10$QUAr97rNscFG38VxD72SAO0XC8ygstNnSSWkoEMayETm1LJr1bVdi', 2147483647, '739750269.jpg', 'Navapara Kim', 'Kim', 'Gujarat', 394110, 'Unmarried', '2022-04-13', 'female'),
(12, 'Vivek Acharya', 'vivek@gmail.com', 'vivek', '$2y$10$.2NDZm1aVupdiw7ha3.7hejE9tRh6dLVQzWsCB5PDaJ262HtdJXgC', 7698298660, '931369471.jpg', 'pratistha kim', 'kim', 'Gujarat', 394110, 'Unmarried', '2022-04-13', 'male'),
(13, 'Vickey Patel', 'vickey1@gmail.com', 'vickey1', '$2y$10$8FiCOSlUkvurfgR48ycEmeuNrIMfLX6kiIyzgiL0gB3cEUOoE66K2', 9797121231, '1003713627.jpg', 'kim', 'kim', 'Gujarat', 394110, 'Unmarried', '2022-04-13', 'male'),
(14, 'Rajni Patel', 'rajni@gmail.com', 'IamRajni', '$2y$10$GIfgoMQBBIzoBRlu8t8fk.pKPTYTJAkcRCz12cMZ36AnzhjbexM3C', 9727842878, '1356507388.jpg', 'Pramukh park kim', 'kim', 'gujarat', 394110, 'Married', '2022-04-26', 'male'),
(15, 'Asha Negi', 'Asha@gmail.com', 'Asha', '$2y$10$odFAbNuc1HnkI2v0Wuij9eE3F6PNC2eiKRjN7mEhlA/cHpB0J9z2K', 7203047886, '482886457.jpg', 'Mumbai', 'Mumbai', 'Maharashtra', 476551, 'Married', '2022-04-16', 'female'),
(16, 'Vaibhavi Patel', 'Vaibhavi@gmail.com', 'vaibhavi', '$2y$10$fZox8aRGYclWx4ICKh6L4uydkiSkR.4fJvDrPaWqCgBcmVsKuJIp.', 9879876541, '1353348516.jpg', 'Rajkot', 'Rajkot', 'Gujarat', 394444, 'Unmarried', '2022-04-16', 'female'),
(17, 'Krupa Vagh', 'Krupa@gmail.com', 'Krupa', '$2y$10$llCcai/GNaJKR1irCIizP.CxOE0G6so2Fbe5H1YTjoSE80JV5QHX6', 7698298660, '222633995.jpg', 'Adajan, Surat', 'Surat', 'gujarat', 394110, 'Unmarried', '2022-04-13', 'female'),
(18, 'Neha Sharma', 'Neha@gmail.com', 'Neha', '$2y$10$uCUPwQZlkufMBYP7LZX6SO66ykBKDm8OD48iYe7Bs8zCmBrGAfCo6', 7878424258, '1021968659.jpeg', 'Navsari', 'Navsari', 'Gujarat', 394122, 'Unmarried', '2022-04-30', 'female');

-- --------------------------------------------------------

--
-- Table structure for table `customer_policy`
--

CREATE TABLE `customer_policy` (
  `id` int(10) NOT NULL COMMENT 'Row id of customer policy',
  `policy_id` int(11) NOT NULL COMMENT 'policy id of policy table',
  `customer_id` int(11) NOT NULL COMMENT 'policy holder''s customer id',
  `nominee_id` int(11) NOT NULL COMMENT 'Nominee id of customer',
  `aadhar_card` varchar(255) NOT NULL COMMENT 'Aadhar id of policy holder',
  `agent_id` int(11) DEFAULT NULL COMMENT 'Agent id, If any',
  `date` date DEFAULT NULL,
  `renew_date` date NOT NULL COMMENT 'Renew date of customer''s purchased \r\npolicy'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer_policy`
--

INSERT INTO `customer_policy` (`id`, `policy_id`, `customer_id`, `nominee_id`, `aadhar_card`, `agent_id`, `date`, `renew_date`) VALUES
(2, 4, 3, 5, '6th sem Fees.pdf', NULL, '2022-03-30', '2023-03-30'),
(5, 1, 2, 7, 'Learning Licence.pdf', 12, '2022-03-30', '2023-03-30'),
(6, 2, 3, 5, 'csmsdb.pdf', NULL, '2022-04-01', '2023-04-01'),
(9, 1, 3, 5, 'Bhaumik 6th Sem Recipt.pdf', 10, '2022-04-01', '2023-04-02'),
(10, 2, 2, 7, 'Online Payment Receipt GPSSB.pdf', 9, '2022-04-04', '2023-04-04'),
(13, 4, 7, 8, '579505734.pdf', 10, '2022-04-12', '2023-04-12'),
(14, 126, 9, 9, '856979587.pdf', NULL, '2022-04-13', '2023-04-13'),
(15, 130, 9, 9, '1812338504.pdf', 10, '2022-04-16', '2023-04-16'),
(16, 125, 16, 10, '736256887.pdf', 10, '2022-04-16', '2023-04-16'),
(17, 131, 18, 12, '635207994.pdf', NULL, '2022-04-21', '2023-04-21');

-- --------------------------------------------------------

--
-- Table structure for table `nominee`
--

CREATE TABLE `nominee` (
  `nominee_id` int(11) NOT NULL COMMENT 'Nominee id, Auto increment',
  `name` varchar(255) NOT NULL COMMENT 'Name of nominee',
  `customer_id` int(11) NOT NULL COMMENT 'customer id of nominee',
  `email` varchar(50) NOT NULL COMMENT 'Email id of nominee',
  `address` varchar(100) NOT NULL COMMENT 'Address of nominee',
  `relation` varchar(11) NOT NULL COMMENT 'Nominee relation with customer',
  `gender` varchar(6) NOT NULL COMMENT 'Gender of nominee',
  `phone` bigint(11) NOT NULL COMMENT 'Contact number of nominee',
  `dob` date NOT NULL COMMENT 'Date of birth of nominee'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `nominee`
--

INSERT INTO `nominee` (`nominee_id`, `name`, `customer_id`, `email`, `address`, `relation`, `gender`, `phone`, `dob`) VALUES
(5, 'Samir Prajapati', 3, 'samir@gmail.com', 'kim', 'Father', 'Male', 9979761911, '2022-03-17'),
(7, 'Deep Gupta', 2, 'deep3110@gmail.com', 'kim', 'Brother', 'Male', 9987564218, '2022-03-25'),
(8, 'Ramesh Bhai', 7, 'Ramesh@gmail.com', 'Neelam Park', 'Father', 'Male', 7849568797, '2022-04-01'),
(9, 'Laljibhai Suthar', 9, 'LalBhai@gmail.com', 'navapara kim', 'Father', 'Male', 7382584627, '2022-04-13'),
(10, 'Harshad Bhai Patel', 16, 'Harshad@123', 'Rajkot', 'Father', 'male', 9988774542, '2022-04-23'),
(11, 'Paresh Negi', 15, 'Paresh@gmail.com', 'Mumbai', 'Brother', 'male', 9924624184, '2022-04-23'),
(12, 'Satish Sharma', 18, 'Satish@gmail.com', 'Navsari', 'Father', 'male', 9797424262, '2022-04-30'),
(13, 'Shantilal Patel', 14, 'sgghetiya@gmail.com', 'Rajkot', 'Father', 'male', 9727842888, '2022-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `policy`
--

CREATE TABLE `policy` (
  `policy_id` int(11) NOT NULL COMMENT 'Policy id, Auto increment',
  `policy_name` varchar(50) NOT NULL COMMENT 'Name of the policy',
  `policy_description` varchar(150) NOT NULL COMMENT 'Description of policy',
  `category` varchar(15) NOT NULL COMMENT 'Category of policy',
  `sum_assured` int(11) NOT NULL COMMENT 'A fixed amount that is paid to nominee',
  `premium` int(11) NOT NULL COMMENT 'An amount paid periodically to the insurer by insured for policy',
  `age_limit` int(11) NOT NULL COMMENT 'Age limit of customer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `policy`
--

INSERT INTO `policy` (`policy_id`, `policy_name`, `policy_description`, `category`, `sum_assured`, `premium`, `age_limit`) VALUES
(1, 'Arogya Shield', 'Secure both Health & Life with Arogya Shield –a health plus life combi product that offers you a comprehensive health cover for medical emergencies an', 'individual', 1000000, 2000, 60),
(2, 'Saral Jeevan Bima', 'Now get Protection and security for your family with a standard term plan at an affordable cost. With SBI Life - Saral Jeevan Bima a pure term plan en', 'individual', 1000000, 25000, 65),
(4, 'Swarna Jeevan ', 'Life– Swarna Jeevan Plus, is specially designed for Corporate Clients, who wish to purchase annuity to provide for their annuity liability', 'individual', 1500000, 10500, 60),
(125, 'E-Shield Next', 'With SBI Life- eShield Next, give a boost to your financial immunity. It is a new age protection plan which has been thoughtfully crafted for you to m', 'Group', 100000, 3600, 55),
(126, 'Smart platina Assure', 'SBI Life - Smart Platina Assure, an individual, non-linked, non-participating life endowment assurance savings product which assures guaranteed return', 'individual', 5000000, 10000, 65),
(128, 'Retire Smart', 'Enjoy an assured maturity benefit that secures your investment from market volatility, with SBI Life – Retire Smart. Secure your future by creating a ', 'individual', 200000, 4000, 50),
(129, 'Sampoorn Cancer Suraksha', 'Avail the comprehensive benefits of SBI Life - Sampoorn Cancer Suraksha and prepare yourself financially to defeat Cancer. Buy online & get 5% discoun', 'Group', 500000, 3600, 50),
(130, 'Cap Assure Gold', 'CapAssure Gold plan fulfills the needs of Employers/ Trustees/ State Governments/ Central Government/ PSUs who wish to fund their employees’ retiremen', 'individual', 100000, 6000, 65),
(131, 'Swarna jeevan plus', 'Swarna Jeevan Plus, is specially designed for Corporate Clients, who wish to purchase annuity to provide for their annuity liability', 'individual', 400000, 8500, 60);

-- --------------------------------------------------------

--
-- Table structure for table `subscribers`
--

CREATE TABLE `subscribers` (
  `SrNo` int(11) NOT NULL COMMENT 'unique id of email ',
  `email` varchar(255) NOT NULL COMMENT 'email address of subscriber'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `subscribers`
--

INSERT INTO `subscribers` (`SrNo`, `email`) VALUES
(1, 'patelujwal8@gmail.com'),
(2, 'hetprajapati0002@gmail.com'),
(3, 'kingvivekjha@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `agent`
--
ALTER TABLE `agent`
  ADD PRIMARY KEY (`agent_id`);

--
-- Indexes for table `chatbot`
--
ALTER TABLE `chatbot`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`customer_id`);

--
-- Indexes for table `customer_policy`
--
ALTER TABLE `customer_policy`
  ADD PRIMARY KEY (`id`),
  ADD KEY `agent_id` (`agent_id`),
  ADD KEY `customer_id` (`customer_id`),
  ADD KEY `nominee_id` (`nominee_id`),
  ADD KEY `policy_id` (`policy_id`);

--
-- Indexes for table `nominee`
--
ALTER TABLE `nominee`
  ADD PRIMARY KEY (`nominee_id`),
  ADD KEY `customer_id` (`customer_id`);

--
-- Indexes for table `policy`
--
ALTER TABLE `policy`
  ADD PRIMARY KEY (`policy_id`);

--
-- Indexes for table `subscribers`
--
ALTER TABLE `subscribers`
  ADD PRIMARY KEY (`SrNo`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Admin id, Auto increment', AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `agent`
--
ALTER TABLE `agent`
  MODIFY `agent_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Agent id, Auto increment', AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `chatbot`
--
ALTER TABLE `chatbot`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Id of chatbot row', AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `customer_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'customer id , Auto Generated', AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `customer_policy`
--
ALTER TABLE `customer_policy`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT COMMENT 'Row id of customer policy', AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `nominee`
--
ALTER TABLE `nominee`
  MODIFY `nominee_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Nominee id, Auto increment', AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `policy`
--
ALTER TABLE `policy`
  MODIFY `policy_id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Policy id, Auto increment', AUTO_INCREMENT=133;

--
-- AUTO_INCREMENT for table `subscribers`
--
ALTER TABLE `subscribers`
  MODIFY `SrNo` int(11) NOT NULL AUTO_INCREMENT COMMENT 'unique id of email ', AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `customer_policy`
--
ALTER TABLE `customer_policy`
  ADD CONSTRAINT `customer_policy_ibfk_1` FOREIGN KEY (`agent_id`) REFERENCES `agent` (`agent_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_policy_ibfk_3` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_policy_ibfk_4` FOREIGN KEY (`nominee_id`) REFERENCES `nominee` (`nominee_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `customer_policy_ibfk_5` FOREIGN KEY (`policy_id`) REFERENCES `policy` (`policy_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `nominee`
--
ALTER TABLE `nominee`
  ADD CONSTRAINT `nominee_ibfk_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`customer_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
