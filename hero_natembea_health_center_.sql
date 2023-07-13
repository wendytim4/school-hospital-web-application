-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 03, 2023 at 02:27 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.0.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `natembea_health_centre`
--

-- --------------------------------------------------------

--
-- Table structure for table `medical_profile`
--

CREATE TABLE `medical_profile` (
  `patient_id` int(11) NOT NULL,
  `vaccinations` varchar(50) DEFAULT NULL,
  `full_blood_count_test` varchar(50) DEFAULT NULL,
  `hepatitis` varchar(100) DEFAULT NULL,
  `allergy` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `medical_profile`
--

INSERT INTO `medical_profile` (`patient_id`, `vaccinations`, `full_blood_count_test`, `hepatitis`, `allergy`) VALUES
(1, 'None', 'Platelet Count', 'Vaccinated', 'Hay Fever'),
(2, 'COVID-19', 'Mean Corpuscular Volume', 'Not Vaccinated', 'Insect Sting'),
(3, 'Flu', 'Prothrombin Time', 'Vaccinated', 'Drug allergies'),
(4, 'Chickenpox', 'Hemoglobin A1c', 'Vaccinated', 'Allergic to peanuts'),
(5, 'Diphtheria', 'Complete Blood Count', 'Not Vaccinated', 'Allergic to milk'),
(6, 'Dengue', 'None', 'Vaccinated', 'Allergic to seafood'),
(7, 'Diptheria', 'Mean Corpuscular Volume', 'Not Vaccinated', 'Allergic to floral perfumes'),
(8, 'Hepatitis A', 'None', 'Vaccinated', 'Allergic to balloons'),
(9, ' Hepatitis B', 'White Blood Cell Count', 'Not Vaccinated', 'Allergic to antibiotics'),
(10, 'COVID-19', 'Platelet Count', 'Vaccinated', 'Allergic to dust'),
(11, 'COVID-19', 'Complete Blood Count', 'Vaccinated', 'Allergic to smoke'),
(12, 'HPV', 'Prothrombin Time', 'Vaccinated', 'Allergic to rubber bands'),
(13, 'Flu', 'Mean Corpuscular Volume', ' Not Vaccinated', 'Allergic to wheat'),
(14, 'Flu', 'Hemoglobin A1c', 'Not Vaccinated', 'Allergic to shrimp'),
(15, 'COVID-19', 'Hemoglobin A1c', 'Not Vaccinated', 'Allergic to peanuts'),
(16, 'Tetanus', 'White Blood Cell Count', 'Vaccinated', 'Allergic to shrimp'),
(17, 'Polio', 'White Blood Cell Count', 'Vaccinated', 'Allergic to eggs'),
(18, 'Measles', 'White Blood Cell Count', 'Not Vaccinated', 'Allergic to eggs'),
(19, 'COVID-19', 'White Blood Cell Count', 'Not Vaccinated', 'Allergic to hives'),
(20, 'COVID-19', 'Hemoglobin A1c', 'Vaccinated', 'Allergic to cinnamon');

-- --------------------------------------------------------

--
-- Table structure for table `patient`
--

CREATE TABLE `patient` (
  `patient_id` int(11) NOT NULL CHECK (`patient_id` > 0),
  `Name` varchar(50) NOT NULL,
  `email` varchar(50) DEFAULT NULL,
  `DOB` date DEFAULT NULL,
  `occupation` varchar(50) DEFAULT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `contact` varchar(50) NOT NULL,
  `address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `patient`
--

INSERT INTO `patient` (`patient_id`, `Name`, `email`, `DOB`, `occupation`, `gender`, `contact`, `address`) VALUES
(1, 'Miriam Uwingabiye', 'miriam.uwingabiye@ashesi.edu.gh', '1999-05-11', 'Student', 'Female', '599486999', 'PR/ND/588'),
(2, 'Ariena Boatche', 'ariena.boatche@ashesi.edu.gh', '2000-02-01', 'Lecturer', 'Female', '247945690', 'JN/UJ/990'),
(3, 'Niyogushimrwa', 'delphine.niyogushimrwa@ashesi.edu.gh', '2001-05-11', 'Student', 'Female', '599670092', 'WE/SD/23'),
(4, 'Pfungwa Chipulu', 'pfungwa.chipulu@ashesi.edu.gh', '1998-03-22', 'Faculty Intern', 'Male', '246097720', 'ML/ZD/878'),
(5, 'Ewuraesi Owiredu', 'ewuraesi.owiredu@ashesi.edu.gh', '2002-08-30', 'Student', 'Female', '209082828', 'VB/UI/68'),
(6, 'Wendy Tima', 'wendy.tima@ashesi.edu.gh', '1999-02-28', 'Student', 'Female', '205082973', 'DK/PO/120'),
(7, 'Ariel Atunka', 'ariel.atunka@ashesi.edu.gh', '1990-03-29', 'Cook', 'Female', '599456999', 'ZY/MW/O79'),
(8, 'Brian Nikoi', 'brian.nikoi@ashesi.edu.gh', '2000-05-18', 'Student', 'Male', '201378072', 'AP/EN/94'),
(9, 'Chrison Pasiah', 'chrison.pasiah@ashesi.edu.gh', '2003-06-23', 'Student', 'Female', '549699901', 'ZI/EF/345'),
(10, 'Favor Gozah', 'favor.gozah@ashesi.edu.gh', '1992-09-09', 'Cleaner', 'Male', '264931299', 'SD/RT/005'),
(11, 'Pamela Essien', 'pamela.essien@ashesi.edu.gh', '1992-09-09', 'Cleaner', 'Female', '264931299', 'SD/RT/005'),
(12, 'Justine Aderson', 'justine.aderson@ashesi.edu.gh', '1950-04-22', 'Lecturer', 'Male', '201378072', 'HY/RH/111'),
(13, 'Ezinne Zara', 'ezinne.zara@ashesi.edu.gh', '1991-09-27', 'Student', 'Female', '56148202', 'LC/MR/831'),
(14, 'James Tetteh', 'james.tetteh@ashesi.edu.gh', '1997-12-31', 'Faculty Intern', 'Male', '545025055', 'SR/PH/100'),
(15, 'Alberta Kuvodu', 'alberta.kuvodu@ashesi.edu.gh', '2003-09-18', 'Student', 'Female', '274320689', 'WF/HK/57'),
(16, 'Alfred Bamfo', 'alfred.bamfo@ashesi.edu.gh', '1977-01-01', 'Lecturer', 'Male', '558268006', 'RM/OZ/007'),
(17, 'Wisdom Governor', 'wisdom.governer@ashesi.edu.gh', '2002-02-02', 'Student', 'Male', '244239464', 'XO/MW/013'),
(18, 'Evan Mills', 'evans.mills@ashesi.edu.gh', '2002-02-02', 'Student', 'Male', '244239464', 'XO/MW/013'),
(19, 'Abena Peprah', 'abena.peprah@ashesi.edu.gh', '2002-10-07', 'Student', 'Female', '502454291', 'HE/ED/117'),
(20, 'Kwabena Gyemfi', 'kwabena.gyemfi@ashesi.edu.gh', '1997-04-24', 'Lecturer', 'Male', '268134032', 'EG/MM/1345');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL,
  `fullName` varchar(70) NOT NULL,
  `gender` varchar(50) DEFAULT NULL,
  `position` varchar(50) DEFAULT NULL,
  `contact` varchar(50) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `degree` varchar(50) NOT NULL,
  `DOB` date DEFAULT NULL,
  `address` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`staff_id`, `fullName`, `gender`, `position`, `contact`, `email`, `degree`, `DOB`, `address`) VALUES
(1, 'Bridgette Addo Aseidu', 'Female', 'Nurse Administrator', '501331668', 'babakah@ashesi.edu.gh', 'PHD', '1979-05-11', 'PL/GH/55'),
(2, 'Selase Aku Tsiagbe', 'Male', 'Senior Nurse Officer', '206373405', 'stsiagbe@ashesi.edu.gh', 'Masters', '1980-02-18', 'OP/ZC/631'),
(3, 'Charles Adu Yaw Laryea', 'Male', 'Nursing Officer', '233478328', 'claryea@ashesi.edu.gh', 'Bachelors', '1982-11-04', 'JM/QW/12'),
(4, 'Jane Bingham', 'Female', 'Consultant', '502149949', 'jbingham@ashesi.edu.gh', 'Master', '1983-09-01', 'CV/TY/123'),
(5, 'Tomiwa Rodia', 'Female', 'Doctor', '274320689', 'trodia@ashesi.edu.gh', 'PHD', '1988-10-25', 'DS/NV/001');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'Wendy Pasiah', 'wendy.gamvah@gmail.com', 'd56a03e30cd4a7aa5ba94321f59b3579'),
(2, 'wendy', 'wendy.gamvah@gmail.com', 'f11d0d94e3bb501a22f6efd1b12e56d5');

-- --------------------------------------------------------

--
-- Table structure for table `visit`
--

CREATE TABLE `visit` (
  `staff_id` int(11) NOT NULL,
  `patient_id` int(11) NOT NULL,
  `visit_date` datetime DEFAULT NULL,
  `visit_diagnosis` varchar(100) DEFAULT NULL,
  `visit_prescriptions` varchar(100) DEFAULT NULL,
  `visit_id` int(11) NOT NULL,
  `symptoms` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `visit`
--

INSERT INTO `visit` (`staff_id`, `patient_id`, `visit_date`, `visit_diagnosis`, `visit_prescriptions`, `visit_id`, `symptoms`) VALUES
(1, 1, '2023-01-03 10:30:45', 'Massage', 'Ointment', 1, ''),
(2, 2, '2022-09-01 08:30:00', 'Common cold', '', 2, ''),
(3, 3, '2020-08-01 11:00:00', 'Pneumonia', 'Levaquin', 3, 'Blood Pressure'),
(4, 4, '2022-11-01 09:15:00', 'Bowel Syndrome', 'dicyclomine (Bentyl)', 4, ''),
(5, 5, '2021-11-01 10:30:45', 'Depression', 'fluoxetine (Prozac) ', 5, ''),
(1, 6, '2023-02-01 13:30:45', 'Asthma', 'Ventolin', 6, ''),
(2, 7, '2021-05-25 13:30:45', 'Migraines', 'Pain killers', 7, ''),
(4, 9, '2022-01-31 00:30:00', 'Rheumatoid Arthritis', 'hydroxychloroquine', 8, ''),
(5, 10, '2023-02-12 12:00:00', 'Diabetes', 'Metformin', 9, ''),
(1, 11, '2023-01-27 16:00:00', 'Chronic kidney disease', 'Glomerulonephritis', 10, ''),
(2, 12, '2022-07-21 21:00:15', 'Chronic kidney disease', 'Glomerulonephritis', 11, ''),
(3, 13, '2022-07-21 21:00:15', 'Cough', 'Robitussin', 12, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `medical_profile`
--
ALTER TABLE `medical_profile`
  ADD KEY `patient_id` (`patient_id`);

--
-- Indexes for table `patient`
--
ALTER TABLE `patient`
  ADD PRIMARY KEY (`patient_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `staff`
--
ALTER TABLE `staff`
  ADD PRIMARY KEY (`staff_id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visit`
--
ALTER TABLE `visit`
  ADD PRIMARY KEY (`visit_id`),
  ADD KEY `staff_id` (`staff_id`),
  ADD KEY `patient_id` (`patient_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `visit`
--
ALTER TABLE `visit`
  MODIFY `visit_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `medical_profile`
--
ALTER TABLE `medical_profile`
  ADD CONSTRAINT `medical_profile_ibfk_1` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `visit`
--
ALTER TABLE `visit`
  ADD CONSTRAINT `visit_ibfk_1` FOREIGN KEY (`staff_id`) REFERENCES `staff` (`staff_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `visit_ibfk_2` FOREIGN KEY (`patient_id`) REFERENCES `patient` (`patient_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
