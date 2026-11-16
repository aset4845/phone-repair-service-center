-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Май 30 2025 г., 12:34
-- Версия сервера: 9.1.0
-- Версия PHP: 8.3.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `acrsdb`
--

-- --------------------------------------------------------

--
-- Структура таблицы `tbladmin`
--

DROP TABLE IF EXISTS `tbladmin`;
CREATE TABLE IF NOT EXISTS `tbladmin` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `AdminName` varchar(200) DEFAULT NULL,
  `UserName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `Regdate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tbladmin`
--

INSERT INTO `tbladmin` (`ID`, `AdminName`, `UserName`, `MobileNumber`, `Email`, `Password`, `Regdate`) VALUES
(1, 'Test', 'admin', 4654664564, 'admin@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2020-06-14 11:29:43');

-- --------------------------------------------------------

--
-- Структура таблицы `tblbrand`
--

DROP TABLE IF EXISTS `tblbrand`;
CREATE TABLE IF NOT EXISTS `tblbrand` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `BrandName` varchar(200) DEFAULT NULL,
  `BrandLogo` varchar(200) DEFAULT NULL,
  `CreationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `BrandName` (`BrandName`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tblbrand`
--

INSERT INTO `tblbrand` (`ID`, `BrandName`, `BrandLogo`, `CreationDate`) VALUES
(1, 'LG(Life Good)', '8b7029a2a97c7df455dfb110aa75285c1592202199.jpg', '2020-06-15 06:23:19'),
(2, 'Samsung', '8fa6e052261f1158fdcbd08ea66fa27c1748605931.png', '2020-06-15 06:24:44'),
(3, 'Apple', 'b1da06d3142be0cc87fd99209c2885d71748606085.png', '2020-06-15 06:26:30'),
(4, 'Google Pixel', '8127cf9ba9443a5a99536b8c5cf322c61748606177.jpg', '2020-06-15 06:27:17'),
(5, 'Windows Phone', 'da2037dc6f7d503bcda1d840fbec814d1748606238.png', '2020-06-15 06:28:11'),
(6, 'xiaomi', '41b586905e6233e72b076191f8bf95121748608339.png', '2020-06-15 06:28:58');

-- --------------------------------------------------------

--
-- Структура таблицы `tblpage`
--

DROP TABLE IF EXISTS `tblpage`;
CREATE TABLE IF NOT EXISTS `tblpage` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `PageType` varchar(200) DEFAULT NULL,
  `PageTitle` varchar(200) DEFAULT NULL,
  `PageDescription` mediumtext,
  `Email` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tblpage`
--

INSERT INTO `tblpage` (`ID`, `PageType`, `PageTitle`, `PageDescription`, `Email`, `MobileNumber`, `UpdationDate`) VALUES
(1, 'aboutus', 'О нас', '<p data-start=\"82\" data-end=\"333\"><strong data-start=\"82\" data-end=\"127\">Наш сервис по ремонту мобильных телефонов</strong> выполняет работы с использованием только оригинальных комплектующих, что позволяет сохранить качество устройства и обеспечить надежность ремонта по доступной и фиксированной цене. У нас нет скрытых доплат.</p>\r\n<p data-start=\"335\" data-end=\"523\">Ищете, где отремонтировать смартфон в Казахстане, заменить неисправные детали или восстановить программное обеспечение? Специалисты <strong data-start=\"467\" data-end=\"477\">ProOne</strong> быстро и профессионально решат вашу проблему.</p>\r\n<p data-start=\"525\" data-end=\"701\">Наша команда квалифицированных мастеров по ремонту мобильных телефонов обслуживает как частных, так и корпоративных клиентов. Мы оказываем услуги по всей территории Казахстана.</p>', NULL, NULL, '2025-05-30 11:30:29'),
(2, 'contactus', 'Связаться с нами', '<span style=\"font-size: 13px;\">г.Караганда, ТЦ ЦУМ ​Проспект Бухар-жырау, 53/8, бутик - 56</span>', 'info@gmail.com', 7077070707, '2025-05-30 11:32:25');

-- --------------------------------------------------------

--
-- Структура таблицы `tblrequest`
--

DROP TABLE IF EXISTS `tblrequest`;
CREATE TABLE IF NOT EXISTS `tblrequest` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `UserID` int DEFAULT NULL,
  `ServiceNumber` varchar(10) DEFAULT NULL,
  `BrandName` varchar(50) DEFAULT NULL,
  `ACtype` varchar(100) DEFAULT NULL,
  `ACcapcity` varchar(50) DEFAULT NULL,
  `Problem` varchar(200) DEFAULT NULL,
  `ProblemDesc` mediumtext,
  `Address` varchar(200) DEFAULT NULL,
  `DateofService` varchar(200) DEFAULT NULL,
  `SuitableTime` varchar(200) DEFAULT NULL,
  `ReqDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `Status` varchar(50) DEFAULT NULL,
  `AssignTo` varchar(120) DEFAULT NULL,
  `Remark` varchar(200) DEFAULT NULL,
  `ServiceCharge` decimal(10,2) DEFAULT NULL,
  `PartCharge` decimal(10,2) DEFAULT NULL,
  `OtherCharge` decimal(10,2) DEFAULT NULL,
  `ResponseDate` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `ServiceNumber` (`ServiceNumber`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tblrequest`
--

INSERT INTO `tblrequest` (`ID`, `UserID`, `ServiceNumber`, `BrandName`, `ACtype`, `ACcapcity`, `Problem`, `ProblemDesc`, `Address`, `DateofService`, `SuitableTime`, `ReqDate`, `Status`, `AssignTo`, `Remark`, `ServiceCharge`, `PartCharge`, `OtherCharge`, `ResponseDate`) VALUES
(1, 1, '608624570', 'LG(Life Good)', 'Split AC', '1.5 ton', 'Service', ' AC Service needs', ' K-908 Laxmi Nagar, New Delhi-110098, Near reliance fresh', '2019-06-25', '13:00', '2020-06-17 06:07:30', 'Completed', 'Tech101', 'Request has been completed', 99.00, 99.00, 99.00, '2020-06-23 06:05:14'),
(2, 1, '853376934', 'Lloyd', 'Window AC', '2 ton', 'Installation', ' Window ac intallation', ' L-678 Laxmi Nagar New Delhi-110098', '2020-06-20', '07:00', '2020-06-17 06:08:51', 'Request Cancelled', '', 'Technician not available', NULL, NULL, NULL, '2020-06-23 06:05:48'),
(3, 1, '618119209', 'Lloyd', 'Window AC', '2 ton', 'Installation', ' Window ac intallation', ' L-678 Laxmi Nagar New Delhi-110098', '2020-06-27', '14:30', '2020-06-17 06:34:03', 'Approved', 'Tech101', 'Your request has been approved', NULL, NULL, NULL, '2020-06-23 06:06:41'),
(4, 1, '242792788', 'LG(Life Good)', 'Window AC', '1 ton', 'Service', ' gjhgjhgjhgjhg', 'ggjgjhgjhgj ', '2020-06-25', '12:30', '2020-06-20 06:58:07', 'Request Cancelled', NULL, 'I want to cancel this request', NULL, NULL, NULL, '2020-06-23 06:06:30'),
(5, 2, '253051923', 'Voltas', 'Split AC', '2 ton', 'Faulty AC', ' Some leakage occurs in the ac', ' Q-880, HVIP apartment near hera sweets Ghaziabad', '2020-06-24', '11:30', '2020-06-22 06:19:46', 'Request Cancelled', NULL, 'Cancel', NULL, NULL, NULL, '2020-06-23 06:06:23'),
(6, 2, '939366164', 'Mitsubishi ELectric.', 'Split AC', '1.5 ton', 'Installation', ' Installation and uninstallation of ac', ' L-890, Gore Gao East Delhi 221001', '2020-06-27', '09:30', '2020-06-22 06:21:10', 'Request Cancelled', '', 'Cancelled due to insufficient data', NULL, NULL, NULL, '2020-06-23 06:06:11'),
(7, 2, '372023717', 'Mitsubishi ELectric.', 'Split AC', '1.5 ton', 'Installation', ' Installation and uninstallation of ac', ' L-890, Gore Gao East Delhi 221001', '2020-06-28', '08:30', '2020-06-22 06:22:48', 'Completed', 'Tech102', 'Service has been completed', 890.00, 850.00, 0.00, '2020-06-23 11:34:41'),
(8, 2, '514345404', 'Daikin', 'Window AC', '1.5 ton', 'Service', ' Service of ac', ' J-567, J&K Laxmi Nagar New Delhi', '2020-06-25', '16:00', '2020-06-23 06:03:04', 'Approved', 'Tech102', 'Your request has been approved', NULL, NULL, NULL, '2020-06-23 11:20:19'),
(9, 4, '379832267', 'LG(Life Good)', 'Split AC', '1 ton', 'Service', 'ингпормика', 'уцкаыац', '2025-12-12', '12:12', '2025-05-30 11:41:07', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(10, 4, '105128583', 'LG(Life Good)', 'Split AC', 'Android', 'Faulty AC', 'wad', 'awfe', '2025-06-12', '12:12', '2025-05-30 11:43:48', NULL, NULL, NULL, NULL, NULL, NULL, NULL),
(11, 4, '848243308', 'LG(Life Good)', 'Смартфон', 'Android', 'Заменить аккумулятор', 'укуцф', 'укйцік', '2025-05-30', '16:48', '2025-05-30 11:48:56', 'Approved', 'Tech101', 'ощшло', NULL, NULL, NULL, '2025-05-30 11:49:52');

-- --------------------------------------------------------

--
-- Структура таблицы `tbltechnician`
--

DROP TABLE IF EXISTS `tbltechnician`;
CREATE TABLE IF NOT EXISTS `tbltechnician` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `TechnicianID` varchar(50) DEFAULT NULL,
  `Name` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Address` varchar(200) NOT NULL,
  `ProfilePic` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `JoiningDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`),
  KEY `TechnicianID` (`TechnicianID`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tbltechnician`
--

INSERT INTO `tbltechnician` (`ID`, `TechnicianID`, `Name`, `MobileNumber`, `Email`, `Address`, `ProfilePic`, `Password`, `JoiningDate`) VALUES
(1, 'Tech101', 'Harish Singh', 4987798756, 'harish@gmail.com', 'j&k block j-125 laxmi nagar', 'b9fb9d37bdf15a699bc071ce49baea531592309556.jpg', '81dc9bdb52d04dc20036dbd8313ed055', '2020-06-16 12:12:36'),
(2, 'Tech102', 'John', 9788798789, 'john@gmail.com', 'j&k block K-890 laxmi nagar New Delhi-110097', 'b9fb9d37bdf15a699bc071ce49baea531592309917.jpg', '202cb962ac59075b964b07152d234b70', '2020-06-16 12:18:37'),
(3, 'Tech103', 'Mohan Rao', 7464713871, 'mohan@gmail.com', 'L-0345, Nehru Nagar Ghaziabad-201017', 'b9fb9d37bdf15a699bc071ce49baea531592310080.jpg', '202cb962ac59075b964b07152d234b70', '2020-06-16 12:21:20');

-- --------------------------------------------------------

--
-- Структура таблицы `tbltracking`
--

DROP TABLE IF EXISTS `tbltracking`;
CREATE TABLE IF NOT EXISTS `tbltracking` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `ServiceNumber` varchar(200) DEFAULT NULL,
  `Remark` varchar(200) DEFAULT NULL,
  `Status` varchar(200) DEFAULT NULL,
  `OrderCanclledByUser` int DEFAULT NULL,
  `UpdationDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=21 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tbltracking`
--

INSERT INTO `tbltracking` (`ID`, `ServiceNumber`, `Remark`, `Status`, `OrderCanclledByUser`, `UpdationDate`) VALUES
(1, '608624570', 'Assign to technician', 'Approved', NULL, NULL),
(2, '853376934', 'Technician not available', 'Unapproved', NULL, NULL),
(9, '608624570', 'Request has been completed', 'Completed', NULL, NULL),
(10, '618119209', 'Your request has been approved', 'Approved', NULL, '2020-06-19 11:44:33'),
(11, '618119209', 'Your request has been approved', 'Approved', NULL, '2020-06-19 11:59:53'),
(14, '242792788', 'I want to cancel this request', 'Request Cancelled', 1, '2020-06-20 07:22:30'),
(15, '253051923', 'Cancel', 'Request Cancelled', 1, '2020-06-22 06:32:33'),
(16, '939366164', 'Cancelled due to insufficient data', 'Request Cancelled', NULL, '2020-06-22 06:48:28'),
(17, '372023717', 'Your request has been approved', 'Approved', NULL, '2020-06-23 06:32:43'),
(18, '514345404', 'Your request has been approved', 'Approved', NULL, '2020-06-23 11:20:18'),
(19, '372023717', 'Service has been completed', 'Completed', NULL, '2020-06-23 11:34:41'),
(20, '848243308', 'ощшло', 'Approved', NULL, '2025-05-30 11:49:52');

-- --------------------------------------------------------

--
-- Структура таблицы `tbluser`
--

DROP TABLE IF EXISTS `tbluser`;
CREATE TABLE IF NOT EXISTS `tbluser` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(200) DEFAULT NULL,
  `LastName` varchar(200) DEFAULT NULL,
  `MobileNumber` bigint DEFAULT NULL,
  `Email` varchar(200) DEFAULT NULL,
  `Password` varchar(200) DEFAULT NULL,
  `RegDate` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Дамп данных таблицы `tbluser`
--

INSERT INTO `tbluser` (`ID`, `FirstName`, `LastName`, `MobileNumber`, `Email`, `Password`, `RegDate`) VALUES
(1, 'Kiran', 'Mukherji', 6789797979, 'kiran@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-06-16 14:50:21'),
(2, 'Test', 'Sample', 6546454654, 'test@gmail.com', '202cb962ac59075b964b07152d234b70', '2020-06-16 14:52:26'),
(4, 'Aset', 'Aset', 7077070707, 'aset@gmail.com', '81dc9bdb52d04dc20036dbd8313ed055', '2025-05-30 08:43:12');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
