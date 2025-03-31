-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 10, 2024 at 11:49 AM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bitvaultwallet`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `username`, `password`) VALUES
(1, 'admin', '123456');

-- --------------------------------------------------------

--
-- Table structure for table `investment_history`
--

CREATE TABLE `investment_history` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `investment_id` text NOT NULL,
  `amount` double NOT NULL,
  `currency` text NOT NULL,
  `start_date` datetime NOT NULL,
  `end_date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `investment_type`
--

CREATE TABLE `investment_type` (
  `id` int(11) NOT NULL,
  `name` text NOT NULL,
  `min_amount` text NOT NULL,
  `max_amount` text NOT NULL,
  `duration` int(11) NOT NULL,
  `percentage` int(11) NOT NULL,
  `description` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kyc`
--

CREATE TABLE `kyc` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `email` text NOT NULL,
  `fname` text NOT NULL,
  `lname` text NOT NULL,
  `dob` date NOT NULL,
  `gender` text NOT NULL,
  `address` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `country` text NOT NULL,
  `doc_type` text NOT NULL,
  `idfront` text NOT NULL,
  `idback` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp(),
  `status` varchar(12) NOT NULL DEFAULT 'Pending'
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `logs`
--

CREATE TABLE `logs` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `device` text NOT NULL,
  `location` text NOT NULL,
  `datetime` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `logs`
--

INSERT INTO `logs` (`id`, `username`, `device`, `location`, `datetime`) VALUES
(1909, 'user', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:130.0) Gecko/20100101 Firefox/130.0', '127.0.0.1', '2024-09-10 09:48:42');

-- --------------------------------------------------------

--
-- Table structure for table `swaps`
--

CREATE TABLE `swaps` (
  `id` int(11) NOT NULL,
  `username` text NOT NULL,
  `amount` text NOT NULL,
  `swapfrom` text NOT NULL,
  `swapto` text NOT NULL,
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `ticket`
--

CREATE TABLE `ticket` (
  `id` int(11) NOT NULL,
  `ticket_id` text NOT NULL,
  `username` text NOT NULL,
  `title` text NOT NULL,
  `message` text NOT NULL,
  `priority` text NOT NULL,
  `date` date NOT NULL,
  `expiry` date NOT NULL,
  `status` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Inprogress'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `id` int(11) NOT NULL,
  `transaction_id` text NOT NULL,
  `username` text NOT NULL,
  `amount` text NOT NULL,
  `crypto_amount` float NOT NULL,
  `currency` text NOT NULL,
  `type` text NOT NULL,
  `wallet_address` text NOT NULL,
  `proof` text NOT NULL,
  `details` text NOT NULL,
  `date` date NOT NULL,
  `status` varchar(150) NOT NULL DEFAULT 'Processing...'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `user_email` text NOT NULL,
  `phone` text NOT NULL,
  `user_name` text NOT NULL,
  `user_password` text NOT NULL,
  `referral` text NOT NULL,
  `resetpin` int(11) NOT NULL,
  `total_balance` float NOT NULL,
  `investment_balance` float NOT NULL,
  `doge` float NOT NULL,
  `btc` float NOT NULL,
  `eth` float NOT NULL,
  `ltc` float NOT NULL,
  `usdt` float NOT NULL,
  `bnb` float NOT NULL,
  `trx` float NOT NULL,
  `date` date NOT NULL,
  `currency` varchar(255) NOT NULL DEFAULT 'dollar',
  `message_title` text NOT NULL,
  `message` text NOT NULL,
  `messenger` varchar(20) NOT NULL DEFAULT 'off',
  `status` varchar(255) NOT NULL DEFAULT 'active'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `user_email`, `phone`, `user_name`, `user_password`, `referral`, `resetpin`, `total_balance`, `investment_balance`, `doge`, `btc`, `eth`, `ltc`, `usdt`, `bnb`, `trx`, `date`, `currency`, `message_title`, `message`, `messenger`, `status`) VALUES
(179, 'user@gmail.com', '423452345', 'user', '123456', 'Referred by System', 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, '2024-09-10', 'dollar', '', '', 'off', 'active');

-- --------------------------------------------------------

--
-- Table structure for table `wallets`
--

CREATE TABLE `wallets` (
  `id` int(11) NOT NULL,
  `btc` text NOT NULL,
  `eth` text NOT NULL,
  `trx` text NOT NULL,
  `ltc` text NOT NULL,
  `bnb` text NOT NULL,
  `doge` text NOT NULL,
  `usdterc20` text NOT NULL,
  `usdttrc20` text NOT NULL,
  `paypal` text NOT NULL,
  `bank_name` text NOT NULL,
  `acct_name` text NOT NULL,
  `acct_number` text NOT NULL,
  `swift_code` text NOT NULL,
  `whatsappno` text NOT NULL,
  `min_sending` varchar(255) NOT NULL,
  `min_receiving` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `wallets`
--

INSERT INTO `wallets` (`id`, `btc`, `eth`, `trx`, `ltc`, `bnb`, `doge`, `usdterc20`, `usdttrc20`, `paypal`, `bank_name`, `acct_name`, `acct_number`, `swift_code`, `whatsappno`, `min_sending`, `min_receiving`) VALUES
(1, 'Btczzczdzdc', 'Ethzzxczxc', 'Tronzczxczxczc', 'Ltcasdasdasd', 'BNBsdfsdf', 'DOGEsdfsdf', 'USDTERC20sdfsdf', 'USDTERC20sdfsdf', 'Payxcvxcvxcvc', 'banksdfsdf', 'accnaesfsdf', 'accnum3534345344', '342423', '23423423423', '50', '50');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`(737));

--
-- Indexes for table `investment_history`
--
ALTER TABLE `investment_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `investment_type`
--
ALTER TABLE `investment_type`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kyc`
--
ALTER TABLE `kyc`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `logs`
--
ALTER TABLE `logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `swaps`
--
ALTER TABLE `swaps`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ticket`
--
ALTER TABLE `ticket`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD UNIQUE KEY `user_email` (`user_email`(737));

--
-- Indexes for table `wallets`
--
ALTER TABLE `wallets`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `investment_history`
--
ALTER TABLE `investment_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=106;

--
-- AUTO_INCREMENT for table `investment_type`
--
ALTER TABLE `investment_type`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `kyc`
--
ALTER TABLE `kyc`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT for table `logs`
--
ALTER TABLE `logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1910;

--
-- AUTO_INCREMENT for table `swaps`
--
ALTER TABLE `swaps`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `ticket`
--
ALTER TABLE `ticket`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=245;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=180;

--
-- AUTO_INCREMENT for table `wallets`
--
ALTER TABLE `wallets`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
