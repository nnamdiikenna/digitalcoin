-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.7.33 - MySQL Community Server (GPL)
-- Server OS:                    Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Dumping database structure for crypto
CREATE DATABASE IF NOT EXISTS `crypto` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `crypto`;

-- Dumping structure for table crypto.account
CREATE TABLE IF NOT EXISTS `account` (
  `id` int(1) NOT NULL AUTO_INCREMENT,
  `stcredit1` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `stdebit2` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `stdate3` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `stdecribe4` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `stcredit5` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `stdebit6` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `stdate7` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `stdecribe8` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `stcredit9` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `stdebit10` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `stdate11` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `stdecribe12` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `stcredit13` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `ac_currency` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `otptime` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `otp` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `cab` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `ccb` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `stdate19` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `lastLogin` varchar(50) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `firstname` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `lastname` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `email` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `zipcode` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `gender` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `streetaddress` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `state` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `country` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `city` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `despositor` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `accountbalance` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '0',
  `accountstatus` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `description` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `transaction` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `occupation` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `accountnumber` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `accounttype` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `sortcode` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `bankaddress` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `amountpaid` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `activationdate` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `phone` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `dob` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `routingnumber` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `accountid` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `accountpin` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `tellnumber` varchar(100) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `picID` varchar(90) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `comp_name` varchar(90) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  `picname` varchar(90) COLLATE latin1_general_ci NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

-- Dumping data for table crypto.account: 0 rows
/*!40000 ALTER TABLE `account` DISABLE KEYS */;
/*!40000 ALTER TABLE `account` ENABLE KEYS */;

-- Dumping structure for table crypto.accounttype
CREATE TABLE IF NOT EXISTS `accounttype` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(50) NOT NULL,
  `minAmt` double NOT NULL,
  `duration` int(11) NOT NULL,
  `interest` double NOT NULL,
  `referalAmt` int(11) NOT NULL DEFAULT '0',
  `maxAmt` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

-- Dumping data for table crypto.accounttype: ~4 rows (approximately)
/*!40000 ALTER TABLE `accounttype` DISABLE KEYS */;
INSERT INTO `accounttype` (`id`, `name`, `minAmt`, `duration`, `interest`, `referalAmt`, `maxAmt`) VALUES
	(1, 'Starter Plan', 500, 21, 10, 5, 1000),
	(2, 'Premium Plan', 1000, 7, 15, 5, 5000),
	(4, 'Delux  Plan', 5000, 7, 20, 20, 20000),
	(6, 'EXCLUSIVE Plan', 20000, 7, 20, 30, 200000);
/*!40000 ALTER TABLE `accounttype` ENABLE KEYS */;

-- Dumping structure for table crypto.admin
CREATE TABLE IF NOT EXISTS `admin` (
  `id` int(11) NOT NULL,
  `user` varchar(50) NOT NULL,
  `passme` varchar(50) NOT NULL,
  `btcAddress` varchar(50) DEFAULT NULL,
  `qrCode` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Dumping data for table crypto.admin: ~1 rows (approximately)
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` (`id`, `user`, `passme`, `btcAddress`, `qrCode`) VALUES
	(1, 'admin', 'better@this', NULL, NULL);
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;

-- Dumping structure for table crypto.nft
CREATE TABLE IF NOT EXISTS `nft` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nftdetails` varchar(250) NOT NULL DEFAULT '',
  `nftpics` varchar(250) NOT NULL DEFAULT '',
  `status` varchar(50) NOT NULL DEFAULT '',
  `price` varchar(100) DEFAULT NULL,
  `views` varchar(100) DEFAULT NULL,
  `favourite` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

-- Dumping data for table crypto.nft: ~0 rows (approximately)
/*!40000 ALTER TABLE `nft` DISABLE KEYS */;
INSERT INTO `nft` (`id`, `nftdetails`, `nftpics`, `status`, `price`, `views`, `favourite`) VALUES
	(1, 'Moon', 'whatsapp image 2022-06-07 at 10.09.10 pm.jpeg.jpeg', '1', '1000', '21', '56'),
	(2, 'Zoon', 'whatsapp image 2022-06-07 at 10.09.12 pm.jpeg.jpeg', '1', '1200', '51', '67');
/*!40000 ALTER TABLE `nft` ENABLE KEYS */;

-- Dumping structure for table crypto.paymentrequests
CREATE TABLE IF NOT EXISTS `paymentrequests` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transID` varchar(50) NOT NULL DEFAULT '0',
  `amt` int(11) NOT NULL DEFAULT '0',
  `requestDate` varchar(50) NOT NULL DEFAULT '0',
  `uid` varchar(50) NOT NULL DEFAULT '0',
  `notes` varchar(1000) NOT NULL DEFAULT '0',
  `accountType` varchar(50) NOT NULL DEFAULT '0',
  `status` varchar(2) NOT NULL DEFAULT '0',
  `dateApproved` varchar(50) DEFAULT NULL,
  `datePaid` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

-- Dumping data for table crypto.paymentrequests: ~2 rows (approximately)
/*!40000 ALTER TABLE `paymentrequests` DISABLE KEYS */;
INSERT INTO `paymentrequests` (`id`, `transID`, `amt`, `requestDate`, `uid`, `notes`, `accountType`, `status`, `dateApproved`, `datePaid`) VALUES
	(1, '131318848bdcb4dce51278c7cf60f032', 5001, '1649330376', '20b5f72502', 'is this for me', '4', '2', '1649330467', '1649330502'),
	(2, '9a1ec6acf141c9d955b3d710ca3c3c76', 200, '1649332937', '20b5f72502', 'pay this please', '4', '1', '1649332969', NULL),
	(3, '411ea280bb9ac7c1a167d8b0e6aa7d54', 500, '1649343733', '20b5f72502', 'please credit me', '4', '0', NULL, NULL);
/*!40000 ALTER TABLE `paymentrequests` ENABLE KEYS */;

-- Dumping structure for table crypto.payments
CREATE TABLE IF NOT EXISTS `payments` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transID` varchar(50) DEFAULT NULL,
  `accountType` varchar(50) DEFAULT NULL,
  `uid` varchar(50) DEFAULT '0',
  `amt` double DEFAULT '0',
  `notes` varchar(500) DEFAULT '0',
  `datePosted` varchar(50) DEFAULT '0',
  `confirmed` varchar(50) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `interest` int(11) DEFAULT NULL,
  `dateConfirmed` varchar(50) DEFAULT '0',
  `referalAmt` int(11) DEFAULT NULL,
  `transType` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=latin1 ROW_FORMAT=DYNAMIC;

-- Dumping data for table crypto.payments: ~16 rows (approximately)
/*!40000 ALTER TABLE `payments` DISABLE KEYS */;
INSERT INTO `payments` (`id`, `transID`, `accountType`, `uid`, `amt`, `notes`, `datePosted`, `confirmed`, `duration`, `interest`, `dateConfirmed`, `referalAmt`, `transType`) VALUES
	(1, 'b1dd2ab4c36329216ba995a59fc57629', '1', '20b5f72502', 5000, 'just sent 500', '2022-04-01', '1', '21', 122, '1648842443', 2, 'debit'),
	(2, '9226957607d4cafee71c4ba1ea439ccd', '4', '20b5f72502', 5000, '', '2022-04-07', '1', '7', 20, '1649288097', 20, 'debit'),
	(3, '6bd650c455af4ff1d1f05fc5979cdd41', '6', 'ad82e271bc', 5000, 'this is a test', '2022-04-08', '1', '7', 20, '1649386757', 30, 'debit'),
	(4, '1c2300bfc8bb52f58002a27c567c974e', '6', 'ad82e271bc', 5000, '', '2022-04-08', '1', '7', 20, '1649386760', 30, 'debit'),
	(5, '697a01e541fffad6c7d619c784baafa7', '6', 'ad82e271bc', 5000, '', '2022-04-08', '1', '7', 20, '1649386804', 30, 'debit'),
	(6, 'a1be44c926c64a130064867a35c99438', '4', 'ca140b07eb', 5000, 'confirmed', '2022-04-08', '1', '7', 20, '0', 20, 'debit'),
	(7, 'db8d6fe66a91c56b6a417ed1ec6e0ad7', '4', 'ca140b07eb', 500, '', '2022-04-08', '1', '7', 20, '1649387072', 20, 'debit'),
	(8, '600b51169f800d29c77c1e41bede2f1d', '6', 'ad82e271bc', 300, 'check admin confirmation', '2022-04-07', '1', '7', 20, '1649387200', 30, 'debit'),
	(9, 'bf4bfad65cc38c7608c4463495038ec4', '4', 'ca140b07eb', 300, 'ruth 1st', '2022-04-08', '1', '7', 20, '1649412738', 20, 'debit'),
	(10, '1f0f8c98d73ea0101e9f3ed923be10f5', '4', 'ca140b07eb', 200, '', '2022-04-07', '1', '7', 20, '1649413022', 20, 'debit'),
	(11, '9ad574f23e4f7fc46783d7835378b8b9', '4', 'ca140b07eb', 100, '100 usd', '2022-04-08', '1', '7', 20, '0', 20, 'debit'),
	(14, 'a4a0d1ca7a575a853a45e9c523fa1c44', '2', 'df6353b2c5', 300, 'ruth11`', '2022-04-08', '1', '7', 15, '1649416034', 5, 'debit'),
	(15, '344d3a2866b4b51c595f38b1c3730250', '2', 'df6353b2c5', 200, 'ruth12', '2022-04-08', '1', '7', 15, '0', 5, 'debit'),
	(16, '20c428a1673970ba9f6d00824f53704f', '1', '38a3409aa4', 500, 'please fund', '2022-05-23', '1', '21', 10, '1653277680', 5, 'debit'),
	(17, 'a3d1fe18119a91f8aa4b54d1665bd2f9', '4', 'f4fa85aae5', 1000, 'Grace funded', '2022-05-24', '1', '7', 20, '1653278372', 20, 'debit'),
	(18, 'de2d26e017180ab9e57eab711700938c', '4', '7a55e6899b', 5000, 'graced', '2022-05-16', '1', '7', 20, '1653284350', 20, 'debit'),
	(19, '850aaa33719626fcb0b3d0809eb6f728', '1', '20b5f72502', 1200, 'afasfgsse', '2022-06-16', '1', '21', 10, '1654695438', 5, 'debit'),
	(20, '193ef339d99155a2b7d47265527dabbc', '1', '20b5f72502', 300, '', '2023-04-19', '0', '21', 10, '0', 5, 'debit');
/*!40000 ALTER TABLE `payments` ENABLE KEYS */;

-- Dumping structure for table crypto.pwreset
CREATE TABLE IF NOT EXISTS `pwreset` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `email` varchar(50) DEFAULT NULL,
  `tmodi` varchar(50) DEFAULT NULL,
  `confCode` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

-- Dumping data for table crypto.pwreset: ~4 rows (approximately)
/*!40000 ALTER TABLE `pwreset` DISABLE KEYS */;
INSERT INTO `pwreset` (`id`, `email`, `tmodi`, `confCode`) VALUES
	(1, 'tecomswebserver@gmail.com', '1653249153', 'f19b0f2d420fb94596e49e5faddcc281'),
	(2, 'tecomswebserver@gmail.com', '1653249402', '9e727a1bf2fe6eaa1a2e98a57291ce95'),
	(3, 'tecomswebserver@gmail.com', '1653249442', 'd2ad025371f32fe80286e8991958d90b'),
	(4, 'tecomswebserver@gmail.com', '1653250003', 'cbc9bc0e793d81ab7ff7f005dd4d22c8'),
	(5, 'beffe@gmail.com', '1653250641', 'faf3fa808b31d89651cf01334ab526a4');
/*!40000 ALTER TABLE `pwreset` ENABLE KEYS */;

-- Dumping structure for table crypto.referrals
CREATE TABLE IF NOT EXISTS `referrals` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `amt` int(11) NOT NULL DEFAULT '0',
  `referrer` varchar(50) NOT NULL DEFAULT '0',
  `referree` varchar(50) NOT NULL DEFAULT '0',
  `refDate` varchar(50) NOT NULL DEFAULT '0',
  `paid` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table crypto.referrals: ~0 rows (approximately)
/*!40000 ALTER TABLE `referrals` DISABLE KEYS */;
INSERT INTO `referrals` (`id`, `amt`, `referrer`, `referree`, `refDate`, `paid`) VALUES
	(1, 1000, 'f4fa85aae5', '7a55e6899b', '1653284350', 0);
/*!40000 ALTER TABLE `referrals` ENABLE KEYS */;

-- Dumping structure for table crypto.settings
CREATE TABLE IF NOT EXISTS `settings` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `btcAddress` varchar(50) NOT NULL DEFAULT '0',
  `qrCode` varchar(50) NOT NULL DEFAULT '0',
  `requestID` int(11) DEFAULT '0',
  `bchAddress` varchar(50) NOT NULL DEFAULT '0',
  `ethAddress` varchar(50) NOT NULL DEFAULT '0',
  `usdtron` varchar(50) NOT NULL DEFAULT '0',
  `qrCode1` varchar(50) NOT NULL,
  `qrCode2` varchar(50) NOT NULL,
  `qrCode3` varchar(50) NOT NULL,
  `payoneer` varchar(50) NOT NULL,
  `qrCode4` varchar(50) NOT NULL,
  `perfectm` varchar(50) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

-- Dumping data for table crypto.settings: ~1 rows (approximately)
/*!40000 ALTER TABLE `settings` DISABLE KEYS */;
INSERT INTO `settings` (`id`, `btcAddress`, `qrCode`, `requestID`, `bchAddress`, `ethAddress`, `usdtron`, `qrCode1`, `qrCode2`, `qrCode3`, `payoneer`, `qrCode4`, `perfectm`) VALUES
	(1, '1B2uowVTYBCqUVM6xgEU1BgFFMxJMfpguy', 'adminpic.jpg', 1, 'qq9m7c4lpgtqpt70wdkp9nqtv6r6ajh5zy7u9frfvp', '567645456576435rv454etfvrrvfbzv', 'qq9m7c4lpgtqpt70wdkp9nqtv6r6ajh5zy7u9frfvp', 'adminbch.jpg', 'adminusdt.jpg', 'admineth.jpg', '10900910', 'adminpay.JPG', '');
/*!40000 ALTER TABLE `settings` ENABLE KEYS */;

-- Dumping structure for table crypto.transactions
CREATE TABLE IF NOT EXISTS `transactions` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `transID` varchar(50) DEFAULT NULL,
  `accountType` varchar(50) DEFAULT NULL,
  `uid` varchar(50) DEFAULT '0',
  `amt` double DEFAULT '0',
  `notes` varchar(500) DEFAULT '0',
  `datePosted` varchar(50) DEFAULT '0',
  `confirmed` varchar(50) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `interest` int(11) DEFAULT NULL,
  `dateConfirmed` varchar(50) DEFAULT '0',
  `referalAmt` int(11) DEFAULT NULL,
  `currentBalance` double DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;

-- Dumping data for table crypto.transactions: ~6 rows (approximately)
/*!40000 ALTER TABLE `transactions` DISABLE KEYS */;
INSERT INTO `transactions` (`id`, `transID`, `accountType`, `uid`, `amt`, `notes`, `datePosted`, `confirmed`, `duration`, `interest`, `dateConfirmed`, `referalAmt`, `currentBalance`) VALUES
	(1, 'b1dd2ab4c36329216ba995a59fc57629', '1', '20b5f72502', 21250, 'just sent 500', '2022-04-01', '1', '21', 122, '0', 2, 30650),
	(2, '6bd650c455af4ff1d1f05fc5979cdd41', '3', 'ad82e271bc', 15350, 'this is a test', '2022-04-08', '1', '7', 20, '0', 30, 15350),
	(3, 'db8d6fe66a91c56b6a417ed1ec6e0ad7', '7', 'ca140b07eb', 1050, '', '2022-04-08', '1', '7', 20, '0', 20, 1050),
	(4, 'a4a0d1ca7a575a853a45e9c523fa1c44', '14', 'df6353b2c5', 350, 'ruth11`', '2022-04-08', '1', '7', 15, '0', 5, 350),
	(5, '20c428a1673970ba9f6d00824f53704f', '16', '38a3409aa4', 550, 'please fund', '2022-05-23', '1', '21', 10, '0', 5, 550),
	(6, 'a3d1fe18119a91f8aa4b54d1665bd2f9', '17', 'f4fa85aae5', 1050, 'Grace funded', '2022-05-24', '1', '7', 20, '0', 20, 1050),
	(7, 'de2d26e017180ab9e57eab711700938c', '18', '7a55e6899b', 5050, 'graced', '2022-05-16', '1', '7', 20, '0', 20, 5050);
/*!40000 ALTER TABLE `transactions` ENABLE KEYS */;

-- Dumping structure for table crypto.users
CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` varchar(50) DEFAULT NULL,
  `fname` varchar(50) DEFAULT NULL,
  `lname` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `passme` varchar(50) DEFAULT NULL,
  `phone` varchar(50) DEFAULT NULL,
  `zipcode` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `accountType` varchar(50) DEFAULT NULL,
  `referrer` varchar(50) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `regDate` varchar(50) DEFAULT NULL,
  `tmodi` datetime DEFAULT CURRENT_TIMESTAMP,
  `confirmationCode` varchar(50) DEFAULT NULL,
  `confirmationDate` varchar(50) DEFAULT NULL,
  `lastLogin` varchar(50) DEFAULT NULL,
  `btc` varchar(50) DEFAULT NULL,
  `pic` varchar(50) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

-- Dumping data for table crypto.users: ~3 rows (approximately)
/*!40000 ALTER TABLE `users` DISABLE KEYS */;
INSERT INTO `users` (`id`, `uid`, `fname`, `lname`, `email`, `passme`, `phone`, `zipcode`, `country`, `accountType`, `referrer`, `status`, `regDate`, `tmodi`, `confirmationCode`, `confirmationDate`, `lastLogin`, `btc`, `pic`) VALUES
	(1, '20b5f72502', 'Don', 'Mac', 'tecomswebserver@gmail.com', '12345', '98900878778', '103241', 'Nigeria', '1', '', '1', '1648842006', '2022-04-01 20:40:06', 'ed1be62d8ef50fc9ad463715488bc564', '1664300049', '1682260372', '5567897979896655juyy', 'id20b5f72502.jpg'),
	(2, 'ca140b07eb', 'Brooks', 'Walters', 'mushin@gmail.com', '12345', '0887667484', '23451', 'United States', '4', '', '1', '1649346299', '2022-04-07 16:44:59', 'bb3cad382bfc19b4b56766aedcb5d556', '1649346742', '1649415230', '5 got bnsn', 'idca140b07eb.png'),
	(3, 'ad82e271bc', 'grace', 'boy', 'graceboy@gmail.com', '12345', '49857475', '', 'Anguilla', '6', '', '1', '1649347626', '2022-04-07 17:07:06', '0abd5a581e55aa4106a8938a37ec84d9', '1649347724', '1649347748', '2123423453454647567rged', 'idad82e271bc.jpg'),
	(4, 'df6353b2c5', 'ruth', 'zac', 'ruthzac@gmail.com', '12345', '345465777', '', 'Bahamas', '2', '', '1', '1649348241', '2022-04-07 17:17:21', 'b85e0727c75918ce39af04da2ac3bfa2', '1649412548', '1649415418', '124234r24f24vb56g5gh5', NULL),
	(5, 'f4fa85aae5', 'Honest', 'Lampad', 'honest@gmail.com', '12345', '0987666554', '', 'United Kingdom', '4', '', '1', '1653240441', '2022-05-22 18:27:21', '2ada726722e0d1ae0df55670784ae7eb', '1653278181', '1653278240', '', NULL),
	(6, '38a3409aa4', 'Begge', 'Mouris', 'beffe@gmail.com', '12345', '09877654684', '', 'Egypt', '1', '', '1', '1653245324', '2022-05-22 19:48:44', '3dcf6f72d3f3b5a110d77a936b513199', '1653277249', '1653277545', 'kjdvjbfvjdfvd87585858', NULL),
	(7, '7a55e6899b', 'Grace', 'Bearded', 'gracebearded@gmail.com', '123456', '0989876657', '', 'United States', '4', 'f4fa85aae5', '1', '1653278529', '2022-05-23 05:02:09', '98eee707e19ff393ff11d09377b50a39', '1653284057', '1653284078', 'jhdsfdjbfjf766hfjffjf87', NULL),
	(8, 'd830a05470', 'Nnamdi', 'Nwoke', 'nnamdiikenna@yahoo.com', 'Solitude', '+2348063877907', '103241', 'Nigeria', '6', '', '0', '1689619535', '2023-07-17 19:45:35', '4db2eed7ef35c3ee52267ccd511a7d79', NULL, NULL, '', NULL);
/*!40000 ALTER TABLE `users` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
