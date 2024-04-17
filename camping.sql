-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 17, 2023 at 03:57 AM
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
-- Database: `camping`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `AdminID` int(11) NOT NULL,
  `AdminName` varchar(30) DEFAULT NULL,
  `AdminProfile` varchar(255) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `PhoneNumber` varchar(30) DEFAULT NULL,
  `Age` int(11) DEFAULT NULL,
  `Address` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`AdminID`, `AdminName`, `AdminProfile`, `Email`, `Password`, `PhoneNumber`, `Age`, `Address`) VALUES
(1, 'Marcus', 'Image/_AdminProfile1.jpg', 'Marcus12@gmail.com', 'Marcus12', '09789587911', 37, 'Singapore'),
(2, 'Rebecca Ophelia', 'Image/_AdminProfile2.jpg', 'Rebecca99@gmail.com', 'Rebecca99', '09235869971', 29, 'Thailand');

-- --------------------------------------------------------

--
-- Table structure for table `booking`
--

CREATE TABLE `booking` (
  `BookingID` int(11) NOT NULL,
  `Date` date DEFAULT NULL,
  `Quantity` int(11) DEFAULT NULL,
  `Tax` int(11) DEFAULT NULL,
  `TotalCost` int(11) DEFAULT NULL,
  `PitchID` int(11) DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `booking`
--

INSERT INTO `booking` (`BookingID`, `Date`, `Quantity`, `Tax`, `TotalCost`, `PitchID`, `CustomerID`) VALUES
(1, '2023-10-16', 2, 30, 270, 1, 1),
(2, '2023-10-20', 3, 45, 405, 1, 1),
(3, '2023-10-25', 3, 45, 405, 1, 2),
(4, '2023-10-27', 1, 15, 135, 1, 2),
(5, '2023-10-24', 4, 60, 540, 1, 2),
(6, '2023-10-18', 4, 80, 720, 2, 3),
(7, '2023-10-16', 3, 60, 540, 2, 3);

-- --------------------------------------------------------

--
-- Table structure for table `campsite`
--

CREATE TABLE `campsite` (
  `CampsiteID` int(11) NOT NULL,
  `Campsitename` varchar(30) DEFAULT NULL,
  `Location` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `campsite`
--

INSERT INTO `campsite` (`CampsiteID`, `Campsitename`, `Location`) VALUES
(1, 'Whispering Woods Campground', 'New Forest'),
(2, 'Crystal Lake Campsite', 'Lake Vyrnwy');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `ContactID` int(11) NOT NULL,
  `CustomerID` int(11) DEFAULT NULL,
  `Phonenumber` varchar(30) DEFAULT NULL,
  `EmailAddress` varchar(30) DEFAULT NULL,
  `Message` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`ContactID`, `CustomerID`, `Phonenumber`, `EmailAddress`, `Message`) VALUES
(1, 2, '09693856621', 'PyaePhyo07@gmail.com', 'About the service');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `CustomerID` int(11) NOT NULL,
  `FirstName` varchar(30) DEFAULT NULL,
  `LastName` varchar(30) DEFAULT NULL,
  `Profile` varchar(255) DEFAULT NULL,
  `Email` varchar(30) DEFAULT NULL,
  `Password` varchar(30) DEFAULT NULL,
  `PhoneNumber` varchar(30) DEFAULT NULL,
  `Gender` varchar(30) DEFAULT NULL,
  `Viewcount` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`CustomerID`, `FirstName`, `LastName`, `Profile`, `Email`, `Password`, `PhoneNumber`, `Gender`, `Viewcount`) VALUES
(1, 'Hsu', 'Myat', 'Image/_CustomerProfile1.jpg', 'HsuMyat09@gmail.com', 'HsuMyat09', '09789456121', 'F', 46),
(2, 'Pyae', 'Phyo', 'Image/_CustomerProfile2.jpg', 'PyaePhyo07@gmail.com', 'PyaePhyo07', '09693856621', 'M', 40),
(3, 'Yadanar', 'Shwe', 'Image/_CustomerProfile3.jpg', 'Yadanar11@gmail.com', 'Yadanar11', '09254889631', 'F', 5),
(4, 'Aung', 'Bo Bo', 'Image/_CustomerProfile4.jpg', 'AungBoBo3@gmail.com', 'AungBoBo3', '09693889788', 'M', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pitch`
--

CREATE TABLE `pitch` (
  `PitchID` int(11) NOT NULL,
  `PitchName` varchar(30) DEFAULT NULL,
  `PitchImg` varchar(255) DEFAULT NULL,
  `Map` varchar(255) DEFAULT NULL,
  `Facilitiesname1` varchar(50) DEFAULT NULL,
  `Facilitiesname2` varchar(50) DEFAULT NULL,
  `Facilitiesname3` varchar(50) DEFAULT NULL,
  `Facilitiesimg1` varchar(255) DEFAULT NULL,
  `Facilitiesimg2` varchar(255) DEFAULT NULL,
  `Facilitiesimg3` varchar(255) DEFAULT NULL,
  `Localname1` varchar(50) DEFAULT NULL,
  `Localname2` varchar(50) DEFAULT NULL,
  `Localname3` varchar(50) DEFAULT NULL,
  `Localimg1` varchar(255) DEFAULT NULL,
  `Localimg2` varchar(255) DEFAULT NULL,
  `Localimg3` varchar(255) DEFAULT NULL,
  `Price` int(11) DEFAULT NULL,
  `Description` varchar(200) DEFAULT NULL,
  `Status` varchar(100) DEFAULT NULL,
  `CampsiteID` int(11) DEFAULT NULL,
  `PitchtypeID` int(11) DEFAULT NULL,
  `Viewcount` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pitch`
--

INSERT INTO `pitch` (`PitchID`, `PitchName`, `PitchImg`, `Map`, `Facilitiesname1`, `Facilitiesname2`, `Facilitiesname3`, `Facilitiesimg1`, `Facilitiesimg2`, `Facilitiesimg3`, `Localname1`, `Localname2`, `Localname3`, `Localimg1`, `Localimg2`, `Localimg3`, `Price`, `Description`, `Status`, `CampsiteID`, `PitchtypeID`, `Viewcount`) VALUES
(1, 'Vyrnwy Waterside Haven', 'Image/_PitchImage1.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2410.958769358645!2d-3.399912323634273!3d52.823106813744836!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x486551d6f613d9e1%3A0xbb5de542dffc3c9c!2sHenstent%20Park!5e0!3m2!1sen!2smm!4v1695983003631', 'Portable Chair', 'Fishing Gear', 'Binocular and Optics', 'Image/_Facility9.jpg', 'Image/_Facility3.jpg', 'Image/_Facility4.jpg', 'Llanwddyn', 'Llanfyllin', 'Oswestry', 'Image/_Local11.jpg', 'Image/_Local12.jpg', 'Image/_Local13.jpg', 150, 'Vyrnwy Waterside Haven is popular among people due to the beautiful view and the nature around the Lake. This is one of the place that you should visit at least one time in your life time.', 'Avaliable', 2, 2, 959),
(2, 'New Matley Wood', 'Image/__PitchImage2.jpg', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2517.554600876674!2d-1.6338122230591048!3d50.876444956599755!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x487386cfa8ded667%3A0x9b56057a373c022a!2sNew%20Forest%20National%20Park!5e0!3m2!1sen!2smm', 'Portable Chair', 'Fire Starter Kits', 'Footwear', 'Image/__Facility9.jpg', 'Image/__Facility8.jpg', 'Image/__Facility6.jpg', 'Bucklers Hard', 'Beaulieu', 'New Forest Water Park', 'Image/__Local21.jpg', 'Image/__Local22.jpg', 'Image/__Local23.jpg', 200, 'New Forest has a lot of places to visit and it is one of the places that customers can take time to wonder around. It is one of the highly recommended pitch by customers', 'Avaliable', 1, 2, 11);

-- --------------------------------------------------------

--
-- Table structure for table `pitchtype`
--

CREATE TABLE `pitchtype` (
  `PitchTypeID` int(11) NOT NULL,
  `PitchTypeName` varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pitchtype`
--

INSERT INTO `pitchtype` (`PitchTypeID`, `PitchTypeName`) VALUES
(1, 'Tent Pitch'),
(2, 'Caravan Pitch'),
(3, 'RV Pitch'),
(4, 'Group Camping Pitch');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `ReviewID` int(11) NOT NULL,
  `Rating` int(11) DEFAULT NULL,
  `Feedback` text DEFAULT NULL,
  `CustomerID` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`ReviewID`, `Rating`, `Feedback`, `CustomerID`) VALUES
(1, 5, 'The Facilities provided is good and campsite views are also stunning. I had a good memory which i will never forget.', 2),
(2, 3, 'Decent Quality', 1),
(3, 5, 'Very Good', 1),
(4, 5, 'The Customer Service is good enough for me to choose this website again for camping service next time.', 3);

-- --------------------------------------------------------

--
-- Table structure for table `rssfeed`
--

CREATE TABLE `rssfeed` (
  `RSSFeedID` int(11) NOT NULL,
  `Title` varchar(30) DEFAULT NULL,
  `Description` text DEFAULT NULL,
  `Url` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `rssfeed`
--

INSERT INTO `rssfeed` (`RSSFeedID`, `Title`, `Description`, `Url`) VALUES
(1, 'Home', 'Home Page for Camp Paradise', 'http://localhost/Assignment/Home.php');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`AdminID`);

--
-- Indexes for table `booking`
--
ALTER TABLE `booking`
  ADD PRIMARY KEY (`BookingID`),
  ADD KEY `PitchID` (`PitchID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `campsite`
--
ALTER TABLE `campsite`
  ADD PRIMARY KEY (`CampsiteID`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`ContactID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`CustomerID`);

--
-- Indexes for table `pitch`
--
ALTER TABLE `pitch`
  ADD PRIMARY KEY (`PitchID`),
  ADD KEY `CampsiteID` (`CampsiteID`),
  ADD KEY `PitchtypeID` (`PitchtypeID`);

--
-- Indexes for table `pitchtype`
--
ALTER TABLE `pitchtype`
  ADD PRIMARY KEY (`PitchTypeID`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`ReviewID`),
  ADD KEY `CustomerID` (`CustomerID`);

--
-- Indexes for table `rssfeed`
--
ALTER TABLE `rssfeed`
  ADD PRIMARY KEY (`RSSFeedID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `AdminID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `booking`
--
ALTER TABLE `booking`
  MODIFY `BookingID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `campsite`
--
ALTER TABLE `campsite`
  MODIFY `CampsiteID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `ContactID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `CustomerID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pitch`
--
ALTER TABLE `pitch`
  MODIFY `PitchID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pitchtype`
--
ALTER TABLE `pitchtype`
  MODIFY `PitchTypeID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `ReviewID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `rssfeed`
--
ALTER TABLE `rssfeed`
  MODIFY `RSSFeedID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `booking`
--
ALTER TABLE `booking`
  ADD CONSTRAINT `booking_ibfk_1` FOREIGN KEY (`PitchID`) REFERENCES `pitch` (`PitchID`),
  ADD CONSTRAINT `booking_ibfk_2` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`);

--
-- Constraints for table `contact`
--
ALTER TABLE `contact`
  ADD CONSTRAINT `contact_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`);

--
-- Constraints for table `pitch`
--
ALTER TABLE `pitch`
  ADD CONSTRAINT `pitch_ibfk_1` FOREIGN KEY (`CampsiteID`) REFERENCES `campsite` (`CampsiteID`),
  ADD CONSTRAINT `pitch_ibfk_2` FOREIGN KEY (`PitchtypeID`) REFERENCES `pitchtype` (`PitchTypeID`);

--
-- Constraints for table `review`
--
ALTER TABLE `review`
  ADD CONSTRAINT `review_ibfk_1` FOREIGN KEY (`CustomerID`) REFERENCES `customer` (`CustomerID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
