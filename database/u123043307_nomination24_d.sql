-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Nov 29, 2024 at 05:43 AM
-- Server version: 10.11.9-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `u123043307_nomination24_d`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminId` int(11) NOT NULL,
  `Username` varchar(255) NOT NULL,
  `Password` varchar(255) NOT NULL,
  `DeletedStatus` int(11) NOT NULL DEFAULT 0,
  `LastLogin` varchar(255) DEFAULT NULL,
  `UpdateAt` datetime DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminId`, `Username`, `Password`, `DeletedStatus`, `LastLogin`, `UpdateAt`, `CreatedAt`) VALUES
(1, 'mainadmin@icai.org', '202cb962ac59075b964b07152d234b70', 0, '2024-08-21 14:10:28', NULL, '2024-08-21 08:40:28');

-- --------------------------------------------------------

--
-- Table structure for table `applicationregistration`
--

CREATE TABLE `applicationregistration` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `RegistrationNo` varchar(255) DEFAULT NULL,
  `NominationType` varchar(255) DEFAULT NULL,
  `PersonName` varchar(255) DEFAULT NULL,
  `ICAIMembershipNo` varchar(255) DEFAULT NULL,
  `EmailID` varchar(255) DEFAULT NULL,
  `AltEmail` varchar(255) DEFAULT NULL,
  `MobileNo` varchar(15) DEFAULT NULL,
  `AltMobile` varchar(15) DEFAULT NULL,
  `BirthDate` varchar(255) DEFAULT NULL,
  `DoBProofe` varchar(255) DEFAULT NULL,
  `NomineePresentAddress` text DEFAULT NULL,
  `NomineePermanentAddress` text DEFAULT NULL,
  `CertificatePractice` varchar(255) DEFAULT NULL,
  `DisciplinaryCase` varchar(255) DEFAULT NULL,
  `CompanyName` varchar(255) DEFAULT NULL,
  `Designation` varchar(255) DEFAULT NULL,
  `AvrageBusinessTurnover3Year` varchar(255) DEFAULT NULL,
  `ThreeYearCompanyAudit` varchar(255) DEFAULT NULL,
  `ExperienceCurrentCompany` varchar(255) DEFAULT NULL,
  `AppointmentLetter` varchar(255) DEFAULT NULL,
  `TotalExperience` varchar(255) DEFAULT NULL,
  `OverallExperience` varchar(255) DEFAULT NULL,
  `ProjectDetails` varchar(255) DEFAULT NULL,
  `ProjectObjectiveSpecification` text DEFAULT NULL,
  `InnovativeMethodologyApplied` text DEFAULT NULL,
  `NewDigitalTechnologies` text DEFAULT NULL,
  `FeasibilityofThePlanProject` text DEFAULT NULL,
  `RiskInolvementMitigationStrategyDevised` text DEFAULT NULL,
  `ValueAdditionCreateStakeholder` text DEFAULT NULL,
  `ProjectExecutioneffectivenessterms` text DEFAULT NULL,
  `AchievementsAnyPersonAward` text DEFAULT NULL,
  `SpeciyYourSocietyContribution` text DEFAULT NULL,
  `PPTAvailable` varchar(255) DEFAULT NULL,
  `Declarations` text DEFAULT NULL,
  `FinalStatus` int(11) NOT NULL DEFAULT 0,
  `DeletedStatus` tinyint(1) DEFAULT 0,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `applicationregistration`
--

INSERT INTO `applicationregistration` (`ID`, `UserID`, `RegistrationNo`, `NominationType`, `PersonName`, `ICAIMembershipNo`, `EmailID`, `AltEmail`, `MobileNo`, `AltMobile`, `BirthDate`, `DoBProofe`, `NomineePresentAddress`, `NomineePermanentAddress`, `CertificatePractice`, `DisciplinaryCase`, `CompanyName`, `Designation`, `AvrageBusinessTurnover3Year`, `ThreeYearCompanyAudit`, `ExperienceCurrentCompany`, `AppointmentLetter`, `TotalExperience`, `OverallExperience`, `ProjectDetails`, `ProjectObjectiveSpecification`, `InnovativeMethodologyApplied`, `NewDigitalTechnologies`, `FeasibilityofThePlanProject`, `RiskInolvementMitigationStrategyDevised`, `ValueAdditionCreateStakeholder`, `ProjectExecutioneffectivenessterms`, `AchievementsAnyPersonAward`, `SpeciyYourSocietyContribution`, `PPTAvailable`, `Declarations`, `FinalStatus`, `DeletedStatus`, `Created_At`) VALUES
(2, 2, '2024080002', 'An independent search committee nominating a deserving member', 'sunny', '564654', 'sunnysinghrajput54@gmail.com', 's@gmail.com', '9135589148', '5948645684', '1986-08-14', '1724302891-1232.pdf', 'hgcg', 'bfxgf', 'No', 'No', 'Arete', 'MD', '2000', '1724302891-3884.pdf', '9 Years 0 Months 0 Days', '1724302891-1249.pdf', '9 Years 0 Months 0 Days', '1724302891-9850.pdf', '1724302891-7597.pdf', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently ', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently ', 'test', 'test 2', '1724302891-9227.pptx', 'Yes', 0, 1, '2024-08-22 05:01:31'),
(3, 4, '2024080003', 'An independent search committee nominating a deserving member', 'sunny', '354525', 'nagina.arete@gmail.com', 'n@gmail.com', '7686725757', '8757578575', '1984-10-01', '1724396306-3710.pdf', 'shivpuri saharsa', 'shivpuri saharsa', 'No', 'No', 'A', 'CEO', '2001', '1724396306-5849.pdf', '3 Years 0 Months 0 Days', '1724396306-8635.pdf', '8 Years 1 Months 26 Days', '1724396306-5272.pdf', '1724396306-9947.pdf', 'ghn ', 'fgbrg', 'fbgfg', 'gf', 'fdgvf', 'dfg', 'fdgv', 'gf', 'gh', '1724396306-6967.pptx', 'Yes', 0, 1, '2024-08-23 06:58:26'),
(4, 6, '2024080004', 'An independent search committee nominating a deserving member', 'harsh', '332626', 'harsh@aretecon.com', 'ds@gmail.com', '5646545646', '3546545645', '1984-10-23', '1724411483-9805.pdf', 'New Delhi,110022', 'bihar', 'No', 'No', 'A', 'Chairperson', '2001', '1724411483-8860.pdf', '3 Years 0 Months 0 Days', '1724411483-6823.pdf', '7 Years 0 Months 0 Days', '1724411483-3933.pdf', '1724411483-1300.pdf', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'hgxchg', 'hgctg', '1724411483-8153.pptx', 'Yes', 0, 1, '2024-08-23 11:11:23'),
(5, 5, '2024080005', 'Self-Nomination', 'LAKSHIT AGGARWAL', '569154', 'lakshitagg2012@yahoo.com', '', '9911545516', '', '1996-12-20', '1724412333-4032.pdf', 'DELHI', 'DELHI', 'No', 'No', 'ICAI', 'President', '10000', '1724412333-1668.pdf', '7 Years 1 Months 7 Days', '1724412333-7779.pdf', '7 Years 1 Months 7 Days', '1724412333-2514.pdf', '1724412333-3917.pdf', 'Not available', 'Not available', 'Not available', 'Not available', 'Not available', 'Not available', 'Not available', '', '', '1724412333-3152.pptx', 'Yes', 0, 0, '2024-08-23 11:25:33'),
(7, 7, '2024080007', 'A senior member nominate a deserving member', 'sunny', '987654', 'sunnysinghrajput54@gmail.com', 'krrish@gmail.com', '3415346546', '5646456465', '1986-01-01', '1724492576-1992-DOC-Abhijeet_Anand (1).pdf', 'Delhi,Bihar, 110022', 'Delhi,Bihar, 110022', 'Part Time', 'No', 'Arete', 'CEO', '20001', '1724492576-5600-DOC-screencapture-acpltest-co-in-icai-preview-2024-08-24-15_05_47.pdf', '3 Years 0 Months 0 Days', '1724492576-1179-DOC-screencapture-acpltest-co-in-icai-preview-2024-08-24-15_05_47.pdf', '10 Years 0 Months 0 Days', '1724492725-9932-DOC-screencapture-acpltest-co-in-icai-preview-2024-08-24-15_05_47.pdf', '1724492725-3494-DOC-screencapture-acpltest-co-in-icai-preview-2024-08-24-15_05_47.pdf', 'a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', '1724492725-6999-DOC-1724492083-2807.pptx', 'Yes', 1, 1, '2024-08-24 09:34:43'),
(8, 8, '2024080008', 'Self-Nomination', 'Sagar', '456121', 'sagar.arete@gmail.com', '', '9876543210', '', '2001-01-02', '1724492593-8555-DOC-Lorem_ipsum.pdf', 'test delhi india', 'test delhi india', 'No', 'No', 'testing company', 'CEO', '5000', '1724492552-8123.pdf', '5 Years 0 Months 0 Days', '1724492552-7324.pdf', '9 Years 0 Months 0 Days', '1724492552-5531.pdf', '1724492552-7359.pdf', 'sdf', 'dfs', 'dsdf', 'sdf', 'sdf', 'sdf', 'sdf', 'NO', 'NO', '1724492552-1970.pptx', 'Yes', 1, 1, '2024-08-24 09:42:32'),
(10, 10, '2024080010', 'A senior member nominate a deserving member', 'abhijeet', '564654', '21mca011.abhijeetanand@giet.edu', 'kd@gmail.com', '6464665665', '6465464646', '1985-01-01', '1724595530-3613-DOC-screencapture-acpltest-co-in-icai-registration-2024-08-24-14_36_47.pdf', 'New Delhi,110022', 'New Delhi,110022', 'Part Time', 'No', 'AJK', 'Chairperson', '19999', '1724594587-4364.pdf', '3 Years 0 Months 0 Days', '1724594587-5459.pdf', '3 Years 0 Months 0 Days', '1724595675-9423-DOC-test.pdf', '1724594587-2918.pdf', 'champ', 'B', 'C', 'D', 'E', 'F', 'T', 'N', 'K', '1724594587-5632.pptx', 'Yes', 1, 1, '2024-08-25 14:03:07'),
(11, 10, '2024080011', 'A senior member nominate a deserving member', 'A', '987654', '21mca011.abhijeetanand@giet.edu', 'shivansh@gmail.com', '1234569874', '6549873219', '1986-01-01', '1724649111-9022-DOC-screencapture-acpltest-co-in-icai-preview-2024-08-24-15_05_47.pdf', 'New Delhi,110022', 'New Delhi,110022', 'Part Time', 'No', 'KTM', 'President', '2000', '1724596211-1081.pdf', '2 Years 0 Months 0 Days', '1724596211-8112.pdf', '8 Years 0 Months 0 Days', '1724596211-3878.pdf', '1724596211-6837.pdf', 'I', 'H', 'G', 'F', 'E', 'D', 'C', 'A', 'B', '1724596211-1403.pptx', 'Yes', 0, 1, '2024-08-25 14:30:11'),
(12, 10, '2024080012', 'Self-Nomination', 'Abhijeet singh', '159357', '21mca011.abhijeetanand@giet.edu', 'k@gmail.com', '9798798798', '6874986798', '1984-10-10', '1724664435-2167-DOC-screencapture-acpltest-co-in-icai-registration-2024-08-24-15_11_03.pdf', 'New Delhi,110022', 'New Delhi,110022', 'Part Time', 'No', 'SzPM', 'Chairperson', '2000', '1724663819-8738.pdf', '3 Years 0 Months 0 Days', '1724663819-4326.pdf', '7 Years 0 Months 0 Days', '1724663819-4594.pdf', '1724663819-5069.pdf', 'AB', 'BC', 'CD', 'DE', 'EF', 'FG', 'GH', 'H', 'I', '1724663819-5889.pptx', 'Yes', 0, 1, '2024-08-26 09:16:59'),
(13, 10, '2024080013', 'An independent search committee\r\n                                                    nominating a deserving member', 'harsh', '498798', '21mca011.abhijeetanand@giet.edu', 't@gmail.com', '2222222222', '2646545646', '1999-09-16', '1724739106-5098.pdf', 'NeW Delhi ,110022', 'Bihar', 'No', 'No', 'A', 'CEO', '2000', '1724739106-5679.pdf', '3 Years 0 Months 0 Days', '1724739106-6132.pdf', '9 Years 0 Months 0 Days', '1724739106-1624.pdf', '1724739106-2857.pdf', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', '1724740200-8208-DOC-CA BUSINESS LEADERS AWARD NOMINATION FORM.pptx', 'Yes', 0, 1, '2024-08-27 06:11:46'),
(14, 10, '2024080014', 'An independent search committee nominating a deserving member', 'Champ', '544646', '21mca011.abhijeetanand@giet.edu', 's@gmail.com', '4545456464', '6465465465', '0000-00-00', '1724756309-2123.pdf', 'New Delhi 11022', '', 'No', 'No', 'A', 'Chairperson', '2000', '1724756309-3636.pdf', '9 Years 0 Months 0 Days', '1724756309-8037.pdf', '9 Years 0 Months 0 Days', '1724756309-2638.pdf', '1724756309-4977.pdf', 'A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', '1724756309-9804.pptx', 'Yes', 0, 1, '2024-08-27 10:58:29'),
(15, 10, '2024080015', 'An independent search committee nominating a deserving member', 'Abhi', '646654', '21mca011.abhijeetanand@giet.edu', 's@gmail.com', '6564654654', '6456465456', '0000-00-00', '1724758909-8759.pdf', 'New delhi,11022', 'New delhi,11022', 'No', 'No', 'A', 'President', '2000', '1724758909-7555.pdf', '3 Years 0 Months 0 Days', '1724758909-3171.pdf', '9 Years 0 Months 0 Days', '1724758909-2420.pdf', '1724758909-5423.pdf', 'A', 'B', 'C', 'DE', 'F', 'G', 'H', 'fdgv', 'fg', '1724758909-9699.pptx', 'Yes', 0, 1, '2024-08-27 11:41:49'),
(16, 10, '2024080016', 'A senior member nominate a deserving member', 'karan', '535469', '21mca011.abhijeetanand@giet.edu', 'ks@gmail.com', '5997987987', '1234567899', '10/02/1985', '1724760327-4247.pdf', 'New delhi,110022', 'Bihar,852201', 'Part Time', 'No', 'A', 'MD', '2000', '1724760327-6254.pdf', '9 Years 0 Months 0 Days', '1724760327-8784.pdf', '9 Years 0 Months 0 Days', '1724760327-6738.pdf', '1724760327-9159.pdf', 'A', 'B', 'C', 'D', 'Edsfv', 'sdvdssdf', 'dfv', 'G', 'H', '1724760327-6884.pptx', 'Yes', 0, 1, '2024-08-27 12:05:27'),
(17, 10, '2024080017', 'Self-Nomination', 'ARYAN OBERAI', '987654', '21mca011.abhijeetanand@giet.edu', 'k@gmail.com', '1234567891', '9876543210', '10/01/1984', '1724818619-4350-DOC-Employees List - Copy.pdf', 'New Delhi,11022', 'BIHAR,852201', 'No', 'No', 'C', 'Chairperson', '20222', '1724818619-3541-DOC-Employees List - Copy.pdf', '3 Years 0 Months 0 Days', '1724818619-8106-DOC-My Tasks List.pdf', '8 Years 0 Months 0 Days', '1724761501-3788.pdf', '1724761501-2760.pdf', 'AB', 'CD', 'EF', 'GH', 'IJ', 'KL', 'MN', 'ABCD', 'EFGH', '1724818666-2083-DOC-1708325106-1289-DOC-65d2f8f2b129b.pptx', 'Yes', 1, 1, '2024-08-27 12:25:01'),
(18, 11, '2024080018', 'A senior member nominate a deserving member', 'g', '645645', 'amit@aretecon.com', '', '6546545645', '', '10/20/2024', '1724771377-5400.pdf', 'qwwwwwww', 'qwwwwwww', 'No', 'No', 'qq', 'CEO', '22222', '1724771377-3430.pdf', '7 Years 0 Months 0 Days', '1724771377-7467.pdf', '13 Years 0 Months 0 Days', '1724771377-1118.pdf', '1724771377-4924.pdf', 'aa', 'aaaa', 'aaaa', 'aaa', 'aaaa', 'aaaa', 'aaa', 'aaa', 'aaaa', '1724771377-1024.pptx', 'Yes', 1, 0, '2024-08-27 15:09:37'),
(19, 7, '2024080019', 'An independent search committee nominating a deserving member', 'A', '354654', 'sunnysinghrajput54@gmail.com', 's@gmail.com', '5646545645', '5646546545', '09/16/1999', '1724823551-1315.pdf', 'A', 'A', 'Part Time', 'No', 'B', 'Chairperson', '2000', '1724823551-8614.pdf', '3 Years 0 Months 0 Days', '', '9 Years 0 Months 0 Days', '1724823551-2469.pdf', '1724823551-3979.pdf', 'ABCD', 'C', 'D', 'E', 'F', 'I', 'H', 'I', 'J', '1724823551-9567.pptx', 'Yes', 0, 1, '2024-08-28 05:39:11'),
(20, 8, '2024080020', 'A senior member nominate a deserving member', 'Sagar Testing', '999999', 'sagar.arete@gmail.com', '', '8510872717', '', '10/20/1998', '1724839110-3098.pdf', 'Testing Address', 'Testing Address', 'No', 'No', 'Arete Company', 'CEO', '50000', '1724839110-4217.pdf', '3 Years 7 Months 27 Days', '1724839110-4970.pdf', '34 Years 7 Months 27 Days', '1724839110-1440.pdf', '1724839110-4374.pdf', 'A TEST', 'B Test', 'C TEst', 'D Test', 'E TEST', 'F TEST', 'G TEST', 'No', 'No', '1724839110-4860.pptx', 'Yes', 0, 1, '2024-08-28 09:58:30'),
(23, 1, '2024080023', 'An independent search committee nominating a deserving member', 'Abhijeet Anand', '123456', 'abhijeet.arete@gmail.com', 'k@gmail.com', '7631094312', '6654564564', '10/01/1984', '1724904793-6017.pdf', 'New Delhi,110022', 'New Delhi,110022', 'No', 'No', 'A', 'Chairperson', '64654', '1724904793-3632.pdf', '6 Years 0 Months 0 Days', '1724904793-1860.pdf', '13 Years 0 Months 0 Days', '1724904793-4090.pdf', '1724904793-3948.pdf', 'AB', 'CD', 'EF', 'GH', 'IJ', 'KL', 'MN', 'AB', 'CD', '1724904793-4854.pptx', 'Yes', 1, 0, '2024-08-29 04:13:13'),
(24, 7, '2024080024', 'A senior member nominate a deserving member', 'Abhi', '646564', 'sunnysinghrajput54@gmail.com', 'k@gmail.com', '3456465464', '', '10/01/1984', '1724910722-5698.pdf', 'New delhi 11022', 'Bihar,852201', 'Part Time', 'No', 'A', 'MD', '2001', '1724910722-4551.pdf', '3 Years 0 Months 0 Days', '1724910722-4034.pdf', '10 Years 0 Months 0 Days', '1724910722-1062.pdf', '1724910722-3844.pdf', 'Ab', 'CD', 'EF', 'GH', 'IJ', 'KL', 'MN', 'OP', '6741', '1724910722-5074.pptx', 'Yes', 0, 1, '2024-08-29 05:52:02'),
(25, 7, '2024080025', 'An independent search committee nominating a deserving member', 'fdv ', '354353', 'sunnysinghrajput54@gmail.com', '', '2322132132', '5346546546', '10/01/1984', '1724913674-4272.pdf', 'New delhi,11022,Laxmi Nagar', 'New delhi,11022,Laxmi Nagar', 'Part Time', 'No', 'A', 'MD', '2000', '1724913674-7569.pdf', '3 Years 0 Months 0 Days', '1724913674-3876.pdf', '7 Years 0 Months 0 Days', '1724913674-6160.pdf', '1724913674-7732.pdf', 'dsfdsfvg', 'sdfdsf', 'nhgc', 'mn', 'mn', ',mn', ' nn ', 'mndsdfvsedfced', 'nbdfvgfddsdfsd', '1724913815-5510-DOC-1708325106-1289-DOC-65d2f8f2b129b.pptx', 'Yes', 1, 1, '2024-08-29 06:41:14'),
(26, 7, '2024080026', 'An independent search committee nominating a deserving member', 'Abhi', '354564', 'sunnysinghrajput54@gmail.com', 't@gmail.com', '6456465464', '3556565664', '10/01/1984', '1724933499-4457.pdf', 'New Delhi,11022', 'Bihar,852201', 'Part Time', 'No', 'A', 'CEO', '2000', '1724933499-8134.pdf', '4 Years 6 Months 27 Days', '1724933499-7154.pdf', '9 Years 8 Months 5 Days', '1724933499-3395.pdf', '1724933499-1071.pdf', 'dfvdsv', 'sv c ', 'dsc ', 'xc', 'asx', 'asxasx', 'asx', 'sax', 'xsax', '1724933499-2650.pptx', 'Yes', 0, 1, '2024-08-29 12:11:39'),
(27, 7, '2024090027', 'An independent search committee nominating a deserving member', 'Abhi', '564564', 'sunnysinghrajput54@gmail.com', 'k@gmail.com', '5654654564', '5646545645', '10/01/1984', '1726210809-1555.pdf', 'shivpuri', 'shivpuri', 'No', 'No', 'A', 'MD', '19999', '1726210809-8504.pdf', '3 Years 0 Months 0 Days', '1726210809-2763.pdf', '9 Years 0 Months 0 Days', '1726210809-5429.pdf', '1726210809-7321.pdf', 'bv', ',kj', 'hn', 'jhv', 'mnm', 'nh', 'bhj', 'bhv', 'bn', '1726210809-4665.pptx', 'Yes', 0, 1, '2024-09-13 07:00:09'),
(28, 7, '2024090028', 'An independent search committee nominating a deserving member', 'Abhi', '564564', 'sunnysinghrajput54@gmail.com', 'k@gmail.com', '5654654564', '5646545645', '10/01/1984', '1726210811-4102.pdf', 'shivpuri', 'shivpuri', 'No', 'No', 'A', 'MD', '19999', '1726210811-8969.pdf', '3 Years 0 Months 0 Days', '1726210811-8450.pdf', '9 Years 0 Months 0 Days', '1726210811-2986.pdf', '1726210811-2420.pdf', 'bv', ',kj', 'hn', 'jhv', 'mnm', 'nh', 'bhj', 'bhv', 'bn', '1726210811-7520.pptx', 'Yes', 0, 1, '2024-09-13 07:00:11'),
(29, 7, '2024090029', 'Self-Nomination', 'Arjun', '123456', 'sunnysinghrajput54@gmail.com', 'arjun@aretecon.com', '9876543210', '9876543210', '10/04/1993', '1726211518-8621.pdf', 'Delhi', 'Delhi', 'Part Time', 'No', 'Arete Software', 'CEO', '2000', '1726211518-9834.pdf', '8 Years 7 Months 23 Days', '1726211518-7454.pdf', '13 Years 7 Months 23 Days', '1726211518-8705.pdf', '1726211518-2628.pdf', '9876543210', '9876543210', '9876543210', '9876543210', '9876543210', '9876543210', '9876543210', '9876543210', '9876543210', '1726211518-1973.pptx', 'Yes', 1, 1, '2024-09-13 07:11:58'),
(30, 8, '2024090030', 'An independent search committee nominating a deserving member', 'Christen Lane', '123456', 'sagar.arete@gmail.com', 'vebu@mailinator.com', '1705797428', '1705797428', '17-May-2012', '1726219448-8872.pdf', 'Eos consectetur et', 'Consequatur tempor ', 'No', 'No', 'Norris Walsh Traders', 'Chairperson', '2014', '1726219448-8955.pdf', '13 Years 0 Months 0 Days', '1726219448-2714.pdf', '13 Years 9 Months 18 Days', '1726219448-4951.pdf', '1726219448-6240.pdf', 'Quia aliqua A eiusm', 'Quo et labore enim s', 'Minus illum veniam', 'Nihil similique exce', 'Nihil vitae nostrud ', 'Omnis quas corrupti', 'Sed ad quasi at nesc', 'Ex enim perspiciatis', 'Ullam impedit obcae', '1726219448-3617.pptx', 'Yes', 0, 0, '2024-09-13 09:24:08'),
(31, 14, '2024090031', 'Self-Nomination', 'ABCD', '123456', 'abcd@gmail.com', '', '1234567890', '', '10/01/1984', '1726222784-9311.pdf', 'DELHI', 'DELHI', 'Part Time', 'No', 'ABC LIMITED', 'President', '2000', '1726222784-5233.pdf', '8 Years 1 Months 24 Days', '1726222784-5299.pdf', '8 Years 1 Months 24 Days', '1726222784-2340.pdf', '1726222784-1414.pdf', 'PRODUCT PLANNING', 'SIX SIGMA, KAIZEN COSTING', 'VARIOUS AI TOOLS', 'FEASIBLE', 'YES', 'CREATED LONG TERM WEALTH FOR ALL THE STAKEHOLDERS', 'EFFECTVELY EXCUTED WITH LOWER COST BY ATTAINING ECONOMICS OF SCALE', 'BUSINESS LEADER AWARD', 'CONTRIBUTED BY RUNNING COORPORATIVE SOCIETIES AT VARIOUS ACROSS INDIA', '1726222784-5705.pptx', 'Yes', 0, 0, '2024-09-13 10:19:44'),
(32, 18, '2024100032', 'Self-Nomination', 'Arjun', '111111', 'arjun@aretecon.com', '', '9999999999', '', '10/01/1984', '1728034029-6451.pdf', 'Delhi', 'Delhi', 'No', 'No', 'Arete', 'Chairperson', '60000', '1728034029-9388.pdf', '10 Years 0 Months 0 Days', '1728034029-8988.pdf', '10 Years 0 Months 0 Days', '1728034029-3038.pdf', '1728034029-5016.pdf', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', 'TEST', '1728034029-9872.pptx', 'Yes', 1, 0, '2024-10-04 09:27:09'),
(33, 22, '2024100033', 'A senior member nominate a deserving member', 'Phoebe Roy', '564654', 'nagina.arete@gmail.com', 'soweguluq@mailinator.com', '1518545497', '5346554657', '13-May-2023', '1728379776-1908.pdf', 'Autem adipisicing ut', '', 'Part Time', 'No', 'Marks and Herring Traders', 'CEO', '2000', '1728379776-1312.pdf', '8 Years 9 Months 6 Days', '1728379776-7032.pdf', '8 Years 9 Months 6 Days', '1728379776-7814.pdf', '1728379776-4056.pdf', 'Rem fugiat ad cupid', 'Suscipit voluptatibu', 'Assumenda consectetu', 'Elit saepe aut quos', 'Illo voluptatem Vel', 'Natus est in omnis e', 'Eos ea tenetur et v', 'Quibusdam molestias ', 'Consequatur Digniss', '1728379776-8872.pptx', 'Yes', 0, 0, '2024-10-08 09:29:36'),
(34, 23, '2024100034', 'A senior member nominate a deserving member', 'SAkshay', '355466', '21mca011.abhijeetanand@giet.edu', 'sam@gmail.com', '6666666666', '6666666666', '09/16/1999', '1729486638-6233.pdf', 'New Delhi,110022', 'New Delhi,110022', 'No', 'No', 'Arete', 'CEO', '2000', '1729486638-7206.pdf', '11 Years 0 Months 0 Days', '1729486638-5930.pdf', '11 Years 0 Months 0 Days', '1729486638-4942.pdf', '1729486638-6149.pdf', 'Filler text is text that shares some characteristics of a real written text, but is random or otherwise generated. It may be used to display a sample of fonts, generate text for testing, or to spoof an e-mail spam filter', 'Filler text is text that shares some characteristics of a real written text, but is random or otherwise generated. It may be used to display a sample of fonts, generate text for testing, or to spoof an e-mail spam filter', 'Filler text is text that shares some characteristics of a real written text, but is random or otherwise generated. It may be used to display a sample of fonts, generate text for testing, or to spoof an e-mail spam filter', 'Filler text is text that shares some characteristics of a real written text, but is random or otherwise generated. It may be used to display a sample of fonts, generate text for testing, or to spoof an e-mail spam filter', 'Filler text is text that shares some characteristics of a real written text, but is random or otherwise generated. It may be used to display a sample of fonts, generate text for testing, or to spoof an e-mail spam filter', 'Filler text is text that shares some characteristics of a real written text, but is random or otherwise generated. It may be used to display a sample of fonts, generate text for testing, or to spoof an e-mail spam filter', 'Filler text is text that shares some characteristics of a real written text, but is random or otherwise generated. It may be used to display a sample of fonts, generate text for testing, or to spoof an e-mail spam filter', 'Filler text is text that shares some characteristics of a real written text, but is random or otherwise generated. It may be used to display a sample of fonts, generate text for testing, or to spoof an e-mail spam filter', 'Filler text is text that shares some characteristics of a real written text, but is random or otherwise generated. It may be used to display a sample of fonts, generate text for testing, or to spoof an e-mail spam filter', '1729486638-4395.pptx', 'Yes', 0, 0, '2024-10-21 04:57:18');

-- --------------------------------------------------------

--
-- Table structure for table `totalexperience`
--

CREATE TABLE `totalexperience` (
  `ID` int(11) NOT NULL,
  `UserID` int(11) DEFAULT NULL,
  `ApplicationRegisterID` varchar(255) NOT NULL,
  `WorkingHere` varchar(255) DEFAULT NULL,
  `FromDate` varchar(255) DEFAULT NULL,
  `ToDate` varchar(255) DEFAULT NULL,
  `Duration` varchar(255) DEFAULT NULL,
  `CompaniesNames` varchar(255) DEFAULT NULL,
  `Designations` varchar(255) DEFAULT NULL,
  `DeletedStatus` tinyint(1) DEFAULT 0,
  `Created_At` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `totalexperience`
--

INSERT INTO `totalexperience` (`ID`, `UserID`, `ApplicationRegisterID`, `WorkingHere`, `FromDate`, `ToDate`, `Duration`, `CompaniesNames`, `Designations`, `DeletedStatus`, `Created_At`) VALUES
(3, 2, '2', 'Yes', '2015-01-01', '2024-01-01', '9 Years 0 Months 0 Days', 'gf', 's', 1, '2024-08-22 05:01:34'),
(4, 4, '3', 'Yes', '2021-01-01', '2024-01-01', '3 Years 0 Months 0 Days', 'gfn', 'gfbg', 1, '2024-08-23 06:58:31'),
(5, 4, '3', '', '2015-12-01', '2021-01-27', '5 Y 1 M 26 D', 'fghb', 'gh', 1, '2024-08-23 06:58:31'),
(6, 6, '4', 'Yes', '2021-01-01', '2024-01-01', '3 Years 0 Months 0 Days', 'b', 'test', 1, '2024-08-23 11:11:27'),
(7, 6, '4', '', '2017-01-01', '2021-01-01', '4 Y 0 M 0 D', 'c', 'd', 1, '2024-08-23 11:11:27'),
(8, 5, '5', 'Yes', '2017-07-01', '2024-08-08', '7 Years 1 Months 7 Days', 'ICAI', 'PRESIDENT', 1, '2024-08-23 11:25:37'),
(13, 8, '8', 'Yes', '2015-01-01', '2020-01-01', '5 Years 0 Months 0 Days', 'TESTIN Commahy', 'test', 1, '2024-08-24 09:42:32'),
(14, 8, '8', '', '2020-01-01', '2024-01-01', '4 Y 0 M 0 D', 'TES', 'abcd', 1, '2024-08-24 09:42:32'),
(17, 10, '10', 'Yes', '2021-01-01', '2024-01-01', '3 Years 0 Months 0 Days', 'LTE', 'test', 1, '2024-08-25 14:03:07'),
(18, 10, '10', '', '06/29/2018', '06/29/2024', '6 Years 0 Months 0 Days', 'aaaa', 'qwe', 1, '2024-08-25 14:03:07'),
(19, 10, '11', 'Yes', '2022-01-01', '2024-01-01', '2 Years 0 Months 0 Days', 'h', 'k', 1, '2024-08-25 14:30:11'),
(20, 10, '12', '', '01/01/2000', '01/01/2021', '21 Years 0 Months 0 Days', 'B Comany', 'B Designation', 1, '2024-08-26 09:16:59'),
(21, 10, '12', '', '2017-01-01', '2021-01-01', '4 Years 0 Months 0 Days', 'C', 'C', 1, '2024-08-26 09:16:59'),
(22, 10, '13', '', '2018-02-23', '2024-08-23', '6 Years 6 Months 0 Days', 'AS', 'AS', 1, '2024-08-27 06:11:46'),
(23, 10, '13', '', '01/01/2012', '01/01/2020', '8 Years 0 Months 0 Days', 'C', 'D', 1, '2024-08-27 06:11:46'),
(24, 10, '14', 'Yes', '2014-01-01', '0000-00-00', '9 Years 0 Months 0 Days', 'A', 'B', 1, '2024-08-27 10:58:29'),
(25, 10, '15', 'Yes', '2014-01-01', '0000-00-00', '3 Years 0 Months 0 Days', 'hg', 'ef', 1, '2024-08-27 11:41:49'),
(26, 10, '15', '', '2014-01-01', '0000-00-00', '6 Years 0 Months 0 Days', 'C', 'D', 1, '2024-08-27 11:41:49'),
(27, 10, '16', 'Yes', '01/01/2015', '01/01/2024', '9 Years 0 Months 0 Days', 'C', 'C', 1, '2024-08-27 12:05:27'),
(28, 10, '16', '', '01/01/2015', '01/01/2021', '6 Years 0 Months 0 Days', 'C', 'D', 1, '2024-08-27 12:05:27'),
(29, 10, '17', 'Yes', '01/01/2021', '01/01/2024', '3 Years 0 Months 0 Days', 'A', 'B', 1, '2024-08-27 12:25:01'),
(30, 10, '17', '', '01/01/2017', '01/01/2022', '5 Years 0 Months 0 Days', 'D', 'F', 1, '2024-08-27 12:25:01'),
(31, 11, '18', 'Yes', '06/29/2011', '06/29/2018', '7 Years 0 Months 0 Days', 'qqq', 'qq', 1, '2024-08-27 15:09:37'),
(32, 11, '18', '', '06/29/2018', '06/29/2024', '6 Years 0 Months 0 Days', 'aaaa', 'qwe', 1, '2024-08-27 15:09:37'),
(34, 8, '20', 'Yes', '01/01/2021', '08/28/2024', '3 Years 7 Months 27 Days', 'A Company', 'A Designation', 1, '2024-08-28 09:58:30'),
(35, 8, '20', '', '01/01/2000', '01/01/2021', '21 Years 0 Months 0 Days', 'B Comany', 'B Designation', 1, '2024-08-28 09:58:30'),
(56, 8, '', '', '01/01/1990', '01/01/2000', '10 Years 0 Months 0 Days', 'C Com', 'C Des', 1, '2024-08-28 12:31:21'),
(57, 1, '23', 'Yes', '01/01/2018', '01/01/2024', '6 Years 0 Months 0 Days', 'test', 'test 1', 1, '2024-08-29 04:13:13'),
(58, 1, '23', '', '01/01/2014', '01/01/2021', '7 Years 0 Months 0 Days', 'test 3', 'test 4', 1, '2024-08-29 04:13:13'),
(63, 1, '', '', '01/01/2014', '01/01/2020', '6 Y 0 M 0 D', 'Saghch', 'jhgfuh', 1, '2024-08-29 05:14:57'),
(64, 1, '', '', '01/01/2012', '01/01/2020', '8 Y 0 M 0 D', 'C', 'D', 1, '2024-08-29 05:18:03'),
(65, 1, '', '', '01/01/2015', '01/01/2021', '6 Years 0 Months 0 Days', 'hnv', 'nbv', 1, '2024-08-29 05:27:29'),
(66, 1, '', '', '01/01/2009', '01/01/2015', '6 Y 0 M 0 D', 'hjvj', 'hbjh', 1, '2024-08-29 05:27:29'),
(67, 1, '', '', '01/01/2012', '01/01/2014', '2 Y 0 M 0 D', 'Test 5', 'test 6', 1, '2024-08-29 05:30:01'),
(68, 7, '24', 'Yes', '01/01/2022', '01/01/2025', '3 Years 0 Months 0 Days', 'abhi', 'sam', 1, '2024-08-29 05:52:02'),
(69, 7, '24', '', '01/01/2017', '01/01/2021', '4 Years 0 Months 0 Days', 'dfsv', 'fdsv', 1, '2024-08-29 05:52:02'),
(70, 7, '24', '', '01/01/2017', '01/01/2018', '1 Years 0 Months 0 Days', 'C', 'D', 1, '2024-08-29 05:52:02'),
(71, 7, '', '', '01/01/2014', '01/01/2017', '3 Years 0 Months 0 Days', 'jkbdvf', 'jbdsv', 1, '2024-08-29 06:04:52'),
(72, 7, '', '', '01/01/2000', '01/01/2010', '10 Years 0 Months 0 Days', '10 year', '10 year', 1, '2024-08-29 06:06:05'),
(73, 7, '', '', '01/01/2012', '01/01/2018', '6 Years 0 Months 0 Days', 'xdv', 'dsfv', 1, '2024-08-29 06:07:25'),
(74, 7, '', '', '01/01/2009', '01/01/2011', '2 Years 0 Months 0 Days', 'fgb', 'fdvgd', 1, '2024-08-29 06:08:19'),
(75, 7, '', '', '01/01/2014', '01/01/2021', '7 Years 0 Months 0 Days', 'fdg', 'dfs', 1, '2024-08-29 06:09:43'),
(76, 7, '25', 'Yes', '01/01/2021', '01/01/2024', '3 Years 0 Months 0 Days', 'Adsf', 'Bdsf', 1, '2024-08-29 06:41:14'),
(77, 7, '25', '', '01/01/2015', '01/01/2021', '6 Years 0 Months 0 Days', 'C', 'D', 1, '2024-08-29 06:41:14'),
(78, 7, '25', '', '01/01/2014', '01/01/2015', '1 Years 0 Months 0 Days', 'E', 'F', 1, '2024-08-29 06:41:14'),
(79, 7, '', '', '01/01/2012', '01/01/2015', '3 Years 0 Months 0 Days', 'Gsdf', 'Hdf', 1, '2024-08-29 06:42:28'),
(80, 7, '', '', '01/01/2011', '01/01/2012', '1 Years 0 Months 0 Days', 'Isdc', 'Jdsf', 1, '2024-08-29 06:42:28'),
(81, 7, '26', 'Yes', '01/12/2020', '08/08/2024', '4 Years 6 Months 27 Days', 'sun', 'test B', 1, '2024-08-29 12:11:39'),
(82, 7, '26', '', '06/12/2016', '07/21/2021', '5 Years 1 Months 9 Days', 'Abhi', 'Teste', 1, '2024-08-29 12:11:39'),
(83, 7, '26', '', '01/01/2014', '01/01/2018', '4 Years 0 Months 0 Days', 'd', 'd', 1, '2024-08-29 12:11:39'),
(84, 7, '', '', '07/10/1985', '09/07/2024', '39 Years 1 Months 28 Days', 'bdffdgv', 'dfgv', 1, '2024-08-29 12:15:24'),
(85, 7, '27', 'Yes', '01/01/2021', '01/01/2024', '3 Years 0 Months 0 Days', 'A', 'V', 1, '2024-09-13 07:00:09'),
(86, 7, '27', '', '01/01/2015', '01/01/2021', '6 Years 0 Months 0 Days', 'C', 'D', 1, '2024-09-13 07:00:09'),
(87, 7, '28', '', '01/01/2021', '01/01/2024', '3 Years 0 Months 0 Days', 'A', 'V', 1, '2024-09-13 07:00:11'),
(88, 7, '28', '', '01/01/2015', '01/01/2021', '6 Years 0 Months 0 Days', 'C', 'D', 1, '2024-09-13 07:00:11'),
(89, 7, '29', 'Yes', '01/10/2016', '09/02/2024', '8 Years 7 Months 23 Days', 'TESTING', 'A', 1, '2024-09-13 07:11:58'),
(90, 7, '29', '', '01/01/2010', '01/01/2015', '5 Years 0 Months 0 Days', 'TEST', 'B', 1, '2024-09-13 07:11:58'),
(91, 8, '30', 'Yes', '01/01/1985', '01/01/1998', '13 Years 0 Months 0 Days', 'Mejia Calhoun Plc', 'Inventore totam eos ', 0, '2024-09-13 09:24:09'),
(92, 14, '31', 'Yes', '07/20/2016', '09/13/2024', '8 Years 1 Months 24 Days', 'ABCD', 'PRESIDENT', 0, '2024-09-13 10:19:44'),
(93, 18, '32', 'Yes', '01/01/2000', '01/01/2010', '10 Years 0 Months 0 Days', 'TEST', 'Developer', 0, '2024-10-04 09:27:09'),
(94, 18, '32', '', '01/01/2011', '01/01/2020', '9 Years 0 Months 0 Days', 'TEST 1', 'Network', 1, '2024-10-04 09:27:09'),
(95, 18, '', '', '01/01/2012', '01/01/2020', '8 Years 0 Months 0 Days', 'TEST123', 'NETWORKING', 1, '2024-10-04 09:30:08'),
(96, 22, '33', 'Yes', '10/02/2015', '07/08/2024', '8 Years 9 Months 6 Days', 'Preston Hinton Inc', 'Do qui cupidatat eiu', 0, '2024-10-08 09:29:36'),
(97, 8, '', '', '02/01/1982', '01/01/1985', '2 Years 11 Months 0 Days', 'ABC', 'Developer', 1, '2024-10-16 10:43:32'),
(98, 23, '34', 'Yes', '01/01/2010', '01/01/2021', '11 Years 0 Months 0 Days', 'A', 'B', 0, '2024-10-21 04:57:18'),
(99, 23, '34', '', '01/01/2005', '01/01/2010', '5 Years 0 Months 0 Days', 'C', 'D', 1, '2024-10-21 04:57:18'),
(100, 23, '', '', '01/01/2004', '01/01/2005', '1 Years 0 Months 0 Days', 'E', 'F', 1, '2024-10-21 04:57:59'),
(101, 8, '', '', '01/01/2000', '01/01/2010', '10 Years 0 Months 0 Days', 'test', 'deve', 1, '2024-10-25 04:44:43'),
(102, 8, '', '', '01/01/2011', '01/01/2020', '9 Years 0 Months 0 Days', 'test1', 'tester', 1, '2024-10-25 04:44:43'),
(103, 23, '', '', '10/28/2022', '11/23/2025', '3 Years 0 Months 26 Days', 'F', 'F', 1, '2024-11-28 08:49:30'),
(104, 8, '', '', '01/01/2016', '10/19/2016', '0 Years 9 Months 18 Days', 'tewshj', 'hjkj', 0, '2024-11-28 11:27:52');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `ID` int(11) NOT NULL,
  `AdminName` varchar(255) NOT NULL,
  `EmailID` text NOT NULL,
  `Password` varchar(255) NOT NULL,
  `MobileNo` varchar(255) DEFAULT NULL,
  `DateofIncorporation` date DEFAULT NULL,
  `DeletedStatus` int(11) NOT NULL DEFAULT 0,
  `LastLogin` datetime DEFAULT NULL,
  `CreatedAt` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`ID`, `AdminName`, `EmailID`, `Password`, `MobileNo`, `DateofIncorporation`, `DeletedStatus`, `LastLogin`, `CreatedAt`) VALUES
(1, 'Abhijeet', 'abhijeet.arete@gmail.com', '123', '7631094312', '2024-08-21', 0, NULL, '2024-08-21 05:28:01'),
(2, 'sunny', 'sunnysinghrajput54@gmail.com', '1234', '9876543210', '2024-08-21', 1, NULL, '2024-08-21 07:21:32'),
(3, 'Arjun', 'arjun@aretecon.com', '123', '1564697456', '2024-08-22', 1, NULL, '2024-08-22 04:18:26'),
(4, 'test', 'nagina.arete@gmail.com', '123', '1234567890', '0000-00-00', 1, NULL, '2024-08-22 07:14:06'),
(5, 'LAKSHIT AGGARWAL', 'lakshitagg2012@yahoo.com', '123', '9911545516', '0000-00-00', 0, NULL, '2024-08-22 07:27:05'),
(6, 'harsh', 'harsh@aretecon.com', '123', '6546465465', '0000-00-00', 1, NULL, '2024-08-23 07:11:20'),
(7, 'Sunny', 'sunnysinghrajput54@gmail.com', '1234', '9155764895', '0000-00-00', 1, NULL, '2024-08-24 08:59:29'),
(8, 'Sagar', 'sagar.arete@gmail.com', '123', '9876543210', '0000-00-00', 0, NULL, '2024-08-24 09:16:15'),
(9, 'Nagina', 'nagina.arete@gmail.com', '123', '7777777777', '0000-00-00', 1, NULL, '2024-08-25 13:50:53'),
(10, 'A', '21mca011.abhijeetanand@giet.edu', '123', '7631094311', '0000-00-00', 1, NULL, '2024-08-25 13:53:41'),
(11, 'Amit', 'amit@aretecon.com', '123', '9898989898', '0000-00-00', 1, NULL, '2024-08-27 05:01:31'),
(12, 'abc', 'abc@gmail.com', '123', '1234567890', '0000-00-00', 1, NULL, '2024-08-30 11:01:14'),
(13, 'harsh', 'harsh@aretecon.com', '123', '9873237847', '0000-00-00', 1, NULL, '2024-08-31 06:06:59'),
(14, 'ABCD', 'abcd@gmail.com', '123', '1245789634', '0000-00-00', 0, NULL, '2024-09-02 05:24:54'),
(15, 'ggghvv', 'suraj765@gmail.com', '123', '9874280685', '0000-00-00', 0, NULL, '2024-09-21 11:05:27'),
(16, 'Suraj', 'Suraj7428@gmail.com', '123', '9874547163', '0000-00-00', 0, NULL, '2024-09-21 11:06:28'),
(17, 'NAgina', 'nagina.arete@gmail.com', '123', '6549873211', '0000-00-00', 1, NULL, '2024-09-24 05:14:47'),
(18, 'arjun', 'arjun@aretecon.com', '123', '9999999999', '0000-00-00', 1, NULL, '2024-10-04 09:23:52'),
(19, 'Arjun', 'arjun@aretecon.com', '123', '5647986789', '0000-00-00', 0, NULL, '2024-10-04 12:29:55'),
(20, 'amit', 'amit@aretecon.com', '1234', '6545987498', '0000-00-00', 0, NULL, '2024-10-04 12:31:00'),
(21, 'Sunny Singh', 'sunnysinghrajput54@gmail.com', '1234', '6549871232', '0000-00-00', 0, NULL, '2024-10-05 04:37:57'),
(22, 'qq', 'nagina.arete@gmail.com', '123', '3231123232', '0000-00-00', 0, NULL, '2024-10-05 07:38:09'),
(23, 'Abhi', '21mca011.abhijeetanand@giet.edu', '123', '6597188888', '0000-00-00', 0, NULL, '2024-10-21 04:48:48');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminId`);

--
-- Indexes for table `applicationregistration`
--
ALTER TABLE `applicationregistration`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `totalexperience`
--
ALTER TABLE `totalexperience`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `applicationregistration`
--
ALTER TABLE `applicationregistration`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `totalexperience`
--
ALTER TABLE `totalexperience`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=105;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
