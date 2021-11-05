-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 05, 2021 at 05:47 PM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 8.0.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `docbook`
--

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `doctor_email`, `title`, `content`, `created_at`, `updated_at`) VALUES
(2, 'tanzim@gmail.com', 'Blog A', 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry\'s standard dummy text ever since the 1500s, when an unknown printer took a galley of type and scrambled it to make a type specimen book. It has survived not only five centuries, but also the leap into electronic typesetting, remaining essentially unchanged. It was popularised in the 1960s with the release of Letraset sheets containing Lorem Ipsum passages, and more recently with desktop publishing software like Aldus PageMaker including versions of Lorem Ipsum.', '2021-09-08 11:57:03', NULL),
(3, 'tanzim@gmail.com', 'Blog B', 'There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in some form, by injected humour, or randomised words which don\'t look even slightly believable. If you are going to use a passage of Lorem Ipsum, you need to be sure there isn\'t anything embarrassing hidden in the middle of text. All the Lorem Ipsum generators on the Internet tend to repeat predefined chunks as necessary, making this the first true generator on the Internet. It uses a dictionary of over 200 Latin words, combined with a handful of model sentence structures, to generate Lorem Ipsum which looks reasonable. The generated Lorem Ipsum is therefore always free from repetition, injected humour, or non-characteristic words etc.', '2021-09-08 11:57:48', NULL),
(4, 'tanzim@gmail.com', 'Blog Last', 'Hello world', '2021-10-29 14:45:11', NULL),
(5, 'tanzim@gmail.com', 'Blog New', 'Testing', '2021-10-29 14:55:24', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `user_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `blog_id` int(11) NOT NULL,
  `content` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `user_email`, `blog_id`, `content`, `created_at`, `updated_at`) VALUES
(1, 'iftekhar@gmail.com', 3, 'Very informative blog.', '2021-09-13 16:27:56', NULL),
(2, 'iftekhar@gmail.com', 3, 'Changed my mind.. this blog is not so good :3', '2021-09-13 16:34:01', NULL),
(3, 'iftekhar@gmail.com', 2, 'Nice!!! :)', '2021-09-13 16:38:05', NULL),
(4, 'iftekhar@gmail.com', 3, 'New comment', '2021-09-13 16:51:20', NULL),
(5, 'iftekhar@gmail.com', 3, 'addsadas', '2021-09-16 07:44:38', NULL),
(6, 'iftekhar@gmail.com', 2, 'Nice2', '2021-09-16 07:44:52', NULL),
(7, 'iftekhar@gmail.com', 2, 'Very informative blog. :)\r\nThanks', '2021-09-16 07:45:59', NULL),
(8, 'tanzim@gmail.com', 2, 'doctor comment', '2021-09-17 04:03:05', NULL),
(9, 'auni@gmail.com', 3, 'Thank you for this amazing information.', '2021-10-15 13:03:48', NULL),
(10, 'auni@gmail.com', 3, 'Thank You for this amazing information.', '2021-10-15 13:04:41', NULL),
(11, 'auni@gmail.com', 3, 'Nice blog :)', '2021-10-29 14:24:45', NULL),
(12, 'tanzim@gmail.com', 2, 'Doctor comment 3', '2021-10-29 14:44:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `doctors`
--

CREATE TABLE `doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `propic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homeaddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chamberaddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nidno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medcollege` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gradyear` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `speciality` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` decimal(8,2) NOT NULL,
  `experience` int(11) NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bmdc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `doctors`
--

INSERT INTO `doctors` (`id`, `email`, `fname`, `lname`, `propic`, `password`, `homeaddress`, `chamberaddress`, `hospital`, `nidno`, `medcollege`, `gradyear`, `speciality`, `rating`, `experience`, `degree`, `bmdc`, `age`, `gender`, `phone`, `created_at`) VALUES
(4, 'tanzim@gmail.com', 'Tanzim', 'Uddin', 'doctor_propics/1630497478.jpg', '$2y$10$Yobvsa7Fk5xNCKvQSixx3.guPnfBryuf5oxnSAITlmtbY/Mx8abt2', 'Dhaka', 'Dhaka', 'Jawdri Hospital', '11111', 'Jackinsd College', '2015', 'Cardiology', '4.00', 5, 'MD', '2132312', 30, 'male', '0172363587563', '2021-09-16 11:20:48'),
(5, 'shihab@gmail.com', 'Shihab', 'Uddin', 'doctor_propics/1630497623.jpg', '$2y$10$sqpLl/TtcEh3K1YuYwT5qOjE6kZtKBzQk1dEt7NpGhR0dJRJBnpj2', 'Dhaka', 'Mohammedpur, Dhaka', 'United Hospital', '1221', 'Jackinsd College', '2015', 'Nutritionist', '5.00', 5, 'MD', '2343443', 40, 'male', '01723313213', '2021-10-15 13:06:36'),
(6, 'alvi@gmail.com', 'Alvi', 'Sultan', 'doctor_propics/1630499033.jpg', '$2y$10$LDdZpKv5PGaMK3NkTNoC1.b5utdoTO1.2BobQ6O39IrMKgTyzBDMW', 'Moghbazar, Dhaka', 'Dhaka', 'United Hospital', '21223', 'Jackinsd College', '2017', 'Kidney', '5.00', 3, 'DO', '2343443', 28, 'male', '01784238884', '2021-10-29 14:29:55'),
(7, 't@gmail.com', 'Tanzim', 'Ahmed', 'doctor_propics/1634117433.jpg', '$2y$10$YWqQgGSbjE6Qn7HiTFUtp.v5h4VYFiPBFrC7cd8.5fHQt6B/RUAJG', 'Gbbnb', 'Hbccfhb', 'Hgfcvnjh', '456778557', 'Hjionvv', '2014', 'Vbbjhg', '0.00', 4, 'Phd', '67896543', 36, 'male', '01622454327', '2021-10-13 09:30:33');

-- --------------------------------------------------------

--
-- Table structure for table `doc_schedules`
--

CREATE TABLE `doc_schedules` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `start_time` time NOT NULL,
  `end_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `follow_ups`
--

CREATE TABLE `follow_ups` (
  `id` int(11) NOT NULL,
  `p_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `d_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `follow_ups`
--

INSERT INTO `follow_ups` (`id`, `p_email`, `d_email`, `type`, `message`, `image`, `created_at`, `updated_at`) VALUES
(1, 'iftekhar@gmail.com', 'tanzim@gmail.com', 'P', 'First followup.', '', '2021-09-14 06:13:03', NULL),
(1, 'iftekhar@gmail.com', 'tanzim@gmail.com', 'D', 'Doctors first follow up.', '', '2021-09-14 06:20:04', NULL),
(1, 'iftekhar@gmail.com', 'tanzim@gmail.com', 'P', 'latest patient follow up.', 'followups/1631600443.jpg', '2021-09-14 06:20:43', NULL),
(4, 'iftekhar@gmail.com', 'shihab@gmail.com', 'P', 'Another follow up.', '', '2021-09-14 06:27:13', NULL),
(4, 'iftekhar@gmail.com', 'shihab@gmail.com', 'D', 'testing', '', '2021-09-14 06:27:38', NULL),
(1, 'iftekhar@gmail.com', 'tanzim@gmail.com', 'P', 'dasdasdas', '', '2021-09-16 07:45:08', NULL),
(1, 'iftekhar@gmail.com', 'tanzim@gmail.com', 'P', 'testing', '', '2021-09-16 08:59:54', NULL),
(1, 'iftekhar@gmail.com', 'tanzim@gmail.com', 'P', 'salam', '', '2021-09-16 09:05:17', NULL),
(9, 'iftekhar@gmail.com', 'tanzim@gmail.com', 'P', 'hello world', '', '2021-09-29 02:52:47', NULL),
(9, 'iftekhar@gmail.com', 'tanzim@gmail.com', 'D', 'How are you sir?', '', '2021-09-29 02:53:16', NULL),
(11, 'iftekhar@gmail.com', 'shihab@gmail.com', 'P', 'Assalamualikum doctor, according to your advice my skin peel-off problem is gone. Thank you.', '', '2021-10-10 06:04:40', NULL),
(11, 'iftekhar@gmail.com', 'shihab@gmail.com', 'D', 'ahsdoidhasoidas', 'followups/1633845963.jpg', '2021-10-10 06:06:03', NULL),
(13, 'iftekhar@gmail.com', 'shihab@gmail.com', 'P', '1asddsaasddas', 'followups/1633846325.jpg', '2021-10-10 06:12:05', NULL),
(14, 'iftekhar@gmail.com', 'shihab@gmail.com', 'P', 'asddadasdas shihab patietn', '', '2021-10-10 06:22:30', NULL),
(15, 'shihab@patient.com', 'shihab@gmail.com', 'P', 'asdasddasdas', '', '2021-10-10 06:26:55', NULL),
(15, 'shihab@patient.com', 'shihab@gmail.com', 'P', 'dsdfsdf', '', '2021-10-10 06:27:15', NULL),
(15, 'shihab@patient.com', 'shihab@gmail.com', 'D', 'DASASD', '', '2021-10-10 06:27:56', NULL),
(18, 'iftekhar@gmail.com', 'tanzim@gmail.com', 'P', 'I had consultation with you .\r\nregarding a matter could you please give \r\nfeedback.', '', '2021-10-13 08:55:07', NULL),
(19, 'auni@gmail.com', 'tanzim@gmail.com', 'P', 'I would like to consult you personally please.', '', '2021-10-27 13:37:20', NULL),
(20, 'auni@gmail.com', 'tanzim@gmail.com', 'P', 'I have a problem', '', '2021-10-29 14:29:16', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hospital_admins`
--

CREATE TABLE `hospital_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospital_admins`
--

INSERT INTO `hospital_admins` (`id`, `email`, `password`) VALUES
(1, 'tanzim@admin.com', '1');

-- --------------------------------------------------------

--
-- Table structure for table `hospital_tests`
--

CREATE TABLE `hospital_tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `hospital_tests`
--

INSERT INTO `hospital_tests` (`id`, `doctor_email`, `patient_email`, `test_name`, `time`, `hospital`) VALUES
(2, 'alvi@gmail.com', 'iftekhar@gmail.com', 'NO TEST', 'NO TEST', 'NO TEST'),
(7, 'tanzim@gmail.com', 'iftekhar@gmail.com', 'n', 'n', 'n');

-- --------------------------------------------------------

--
-- Table structure for table `medicines`
--

CREATE TABLE `medicines` (
  `Brand_Name` varchar(30) NOT NULL,
  `Generic_Name` varchar(40) NOT NULL,
  `Dosage_Form` varchar(13) NOT NULL,
  `Drugs_Class` varchar(70) NOT NULL,
  `Drugs_For` varchar(80) NOT NULL,
  `Manufacturer` varchar(39) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `medicines`
--

INSERT INTO `medicines` (`Brand_Name`, `Generic_Name`, `Dosage_Form`, `Drugs_Class`, `Drugs_For`, `Manufacturer`) VALUES
('MAXIFLOX', 'Moxifloxacin hydrochloride', 'Eye Drop', 'Ophthalmic Antibacterial products', 'Ophthalmic preparations', 'ACI Ltd.'),
('IVENTI', 'Moxifloxacin hydrochloride', 'Eye Drop', 'Ophthalmic Antibacterial products', 'Ophthalmic preparations', 'Square Pharmaceuticals Ltd.'),
('MOXIBAC', 'Moxifloxacin hydrochloride', 'Eye Drop', 'Ophthalmic Antibacterial products', 'Ophthalmic preparations', 'Popular Pharmaceuticals Ltd.'),
('OPTIMOX', 'Moxifloxacin hydrochloride', 'Eye Drop', 'Ophthalmic Antibacterial products', 'Ophthalmic preparations', 'Aristopharma Ltd.'),
('FLOROMOX', 'Moxifloxacin hydrochloride', 'Eye Drop', 'Ophthalmic Antibacterial products', 'Ophthalmic preparations', 'Ibn Sina Pharmaceutical Ind. Ltd.'),
('IMOTIL', 'Loperamide', 'Capsule', 'Antimotility drugs', 'For diarrhoea', 'Square Pharmaceuticals Ltd.'),
('LOPAMID', 'Loperamide', 'Capsule', 'Antimotility drugs', 'For diarrhoea', 'Acme Laboratories Ltd.'),
('LOPERIN', 'Loperamide', 'Capsule', 'Antimotility drugs', 'For diarrhoea', 'Opsonin Pharma Ltd.'),
('LOPERDIUM', 'Loperamide', 'Capsule', 'Antimotility drugs', 'For diarrhoea', 'Gaco Pharmaceutical Ltd.'),
('NOMOTIL', 'Loperamide', 'Capsule', 'Antimotility drugs', 'For diarrhoea', 'Ziska Pharmaceuticals Ltd.'),
('ALUCIL-S', 'Simethicone', 'Tablet', 'Antacids', 'Drugs for peptic ulcer', 'Opsonin pharma Ltd.'),
('ANTANIL Plus', 'Simethicone', 'Suspension', 'Antacids', 'Drugs for peptic ulcer', 'IBN SINA Pharmaceutical Industry Ltd.'),
('BIOCID Plus', 'Simethicone', 'Tablet', 'Antacids', 'Drugs for peptic ulcer', 'BIOPHARMA Laboratories Limited'),
('BIOCID Plus', 'Simethicone', 'Suspension', 'Antacids', 'Drugs for peptic ulcer', 'BIOPHARMA Laboratories Limited'),
('NEUTRAL-S', 'Simethicone', 'Suspension', 'Antacids', 'Drugs for peptic ulcer', 'Hallmark Pharmaceuticals Ltd.'),
('BROFEX', 'Dextromethorphn', 'Syrup', 'Cough suppressants', 'Drugs for cough & cold ', 'Square Pharmaceuticals Ltd.'),
('D-COUGH', 'Dextromethorphn', 'Syrup', 'Cough suppressants', 'Drugs for cough & cold ', 'Opsonin Pharma Limited'),
('DEXTROMETHORPHAN', 'Dextromethorphn', 'Syrup', 'Cough suppressants', 'Drugs for cough & cold ', 'Beximco Pharmaceuticals Ltd.'),
('EXOPHAN', 'Dextromethorphn', 'Syrup', 'Cough suppressants', 'Drugs for cough & cold ', 'Apollo Pharmaceutical Laboratories Ltd.'),
('TOMEPHEN', 'Dextromethorphn', 'Syrup', 'Cough suppressants', 'Drugs for cough & cold ', 'Incepta Pharmaceuticals Ltd.'),
('ALSTOMIN', 'Glucosamine', 'Tablet', 'Stimulation of Cartilage formation', 'Drugs for cartilage formation', 'Hallmark Pharmaceuticals Ltd'),
('CARTILEX', 'Glucosamine', 'Tablet', 'Stimulation of Cartilage formation', 'Drugs for cartilage formation', 'ACI Ltd.'),
('C-JOINTIN', 'Glucosamine', 'Capsule', 'Stimulation of Cartilage formation', 'Drugs for cartilage formation', '	Holland & Barrett Retail Limited.'),
('CONTILEX', 'Glucosamine', 'Tablet', 'Stimulation of Cartilage formation', 'Drugs for cartilage formation', 'Square Pharmaceuticals Ltd.'),
('JOINTEC Plus', 'Glucosamine', 'Tablet', 'Stimulation of Cartilage formation', 'Drugs for cartilage formation', 'Beximco Pharmaceuticals Ltd.'),
('HYRONATE', 'Sodium hyaluronate', 'Injection ', ' Drugs for Osteoarthritis', 'Drugs used in inflammatory diseases of bones & joints', 'Incepta Pharmaceuticals Ltd.'),
('ITRA', 'Itraconazole', 'Capsule', 'Subcutaneous and systemic mycoses', 'Drugs for fungal infections', 'Square Pharmaceuticals Ltd.'),
('ITRACON', 'Itraconazole', 'Capsule', 'Subcutaneous and systemic mycoses', 'Drugs for fungal infections', 'Navana Pharmaceuticals Ltd.'),
('I-ZOL', 'Itraconazole', 'Capsule', 'Subcutaneous and systemic mycoses', 'Drugs for fungal infections', 'Popular Pharmaceuticals Ltd.'),
('VIOLA', 'Gentian violet', 'Lotion', 'Crystal violet/ Gentian violet preparations', 'Drugs for antiseptics & Skin disinfectants', 'Hudson Pharmaceuticals Ltd.'),
('VIOLA', 'Gentian violet', 'Lotion', 'Crystal violet/ Gentian violet preparations', 'Drugs for antiseptics & Skin disinfectants', 'Kawsar Chemicals'),
('VIOLA', 'Gentian violet', 'Lotion', 'Crystal violet/ Gentian violet preparations', 'Drugs for antiseptics & Skin disinfectants', 'M.R Chemicals'),
('SPOTCLEN', 'Hydroquinone', 'Cream', 'Hydroquinone Preparations\r\n', 'For hyperpigmentation ', 'Incepta Pharmaceuticals Ltd.'),
('ELDOPAQUE Forte 4%', 'Hydroquinone', 'Cream', 'Hydroquinone Preparations\r\n', 'For hyperpigmentation ', 'ICN Pharma/Janata'),
('SPOTCLEN Plus', 'Hydroquinone', 'Cream', 'Hydroquinone Preparations\r\n', 'For hyperpigmentation ', 'Incepta Pharmaceuticals Ltd.');

-- --------------------------------------------------------

--
-- Table structure for table `med_posts`
--

CREATE TABLE `med_posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `problem_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `prescription_count` int(11) NOT NULL,
  `specialist_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `med_posts`
--

INSERT INTO `med_posts` (`id`, `patient_email`, `post_type`, `problem_type`, `details`, `image`, `pdf`, `created_at`, `prescription_count`, `specialist_count`) VALUES
(4, 'iftekhar@gmail.com', 'Post Anonymously', 'Nutrition', 'Very thin in appearance. Not gaining weight. Is there any medicines which can fix my issue?', 'patient_post_images/1630498654.png', 'patient_post_pdfs/1630498654.pdf', '2021-09-01 12:27:28', 3, 0),
(5, 'iftekhar@gmail.com', 'Post With Name', 'Mens Health', 'Feeling not manly.', 'patient_post_images/1631106951.jpg', 'patient_post_pdfs/1631106951.pdf', '2021-09-08 13:17:14', 0, 0),
(6, 'iftekhar@gmail.com', 'Post With Name', 'Cardiology', 'dasdasdasdas', 'patient_post_images/1631107151.png', 'patient_post_pdfs/1631107151.pdf', '2021-10-02 05:18:10', 3, 0),
(7, 'iftekhar@gmail.com', 'Post Anonymously', 'Uncategorized', 'I am suffering from Dengue.', 'patient_post_images/1631367592.jpg', 'patient_post_pdfs/1631367592.pdf', '2021-09-11 14:01:22', 3, 0),
(8, 'shihab@patient.com', 'Post Anonymously', 'Skin', 'During the winter season, my palm\'s skin peels off. How can I get rid of this problem?', 'patient_post_images/1633845148.jpg', 'patient_post_pdfs/1633845148.pdf', '2021-10-10 06:00:52', 3, 0),
(9, 'iftekhar@gmail.com', 'Post With Name', 'Uncategorized', 'dasdasdass', 'patient_post_images/noimage.png', 'patient_post_pdfs/nopdf.pdf', '2021-10-10 06:45:56', 0, 0),
(10, 'iftekhar@gmail.com', 'Post Anonymously', 'Nutrition', 'dasdasdasdasdasdasasd', 'patient_post_images/1633848446.jpg', 'patient_post_pdfs/1633848446.pdf', '2021-10-10 06:47:26', 0, 0),
(11, 'tanzimahmed74@gmail.com', 'Post With Name', 'Uncategorized', 'Yoo', 'patient_post_images/1634116950.jpg', 'patient_post_pdfs/nopdf.pdf', '2021-10-13 09:22:30', 0, 0),
(12, 'auni@gmail.com', 'Post Anonymously', 'Respiratory', 'I am suffering from breathlessness for 2months now. I have visited one doctor. He suggested to me 2 powerful medicine, one X-Ray, and 4test. After I showed the results to my doctor he suggested me to undergo one surgery. With that information, I consulted 3 more doctors and some said I don\'t require surgery and one said I need to do the surgery. I am highly confused now. Please help me with some reliable information. I am attaching my tests reports below.\r\nThank You.', 'patient_post_images/noimage.png', 'patient_post_pdfs/nopdf.pdf', '2021-10-27 15:29:16', 3, 0),
(13, 'iftekhar@gmail.com', 'Post With Name', 'Mental Health', 'Feeling sad.', 'patient_post_images/noimage.png', 'patient_post_pdfs/nopdf.pdf', '2021-10-15 13:24:52', 0, 0),
(14, 'auni@gmail.com', 'Post Anonymously', 'Skin', 'White patches on my hand and feet. It itches sometimes at night.', 'patient_post_images/1634304366.jpg', 'patient_post_pdfs/1634304366.pdf', '2021-10-29 15:07:08', 3, 0),
(15, 'auni@gmail.com', 'Post With Name', 'Fitness', 'My age is 25 and my height is 5 feet 9. What should be my appropriate weight?', 'patient_post_images/1634304475.jpg', 'patient_post_pdfs/nopdf.pdf', '2021-10-27 15:19:10', 3, 0);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2021_06_30_042349_create_patients_table', 1),
(2, '2021_06_30_042415_create_doctors_table', 1),
(3, '2021_06_30_042432_create_specialist_doctors_table', 1),
(4, '2021_06_30_042447_create_admins_table', 2),
(5, '2021_07_04_042155_create_doc_schedules_table', 2),
(6, '2021_07_04_042858_create_hospital_admins_table', 2),
(7, '2021_07_08_095003_create_med_posts_table', 2),
(8, '2021_07_11_045345_create_prescriptions_table', 2),
(9, '2021_07_29_083754_create_follow_ups_table', 2),
(10, '2021_08_03_185355_create_notifications_table', 2),
(11, '2021_08_05_172618_create_ratings_table', 2),
(12, '2021_08_26_181926_create_blogs_table', 2),
(13, '2021_09_13_191008_create_comments_table', 3),
(14, '2021_09_14_080826_create_follow_ups_table', 4),
(15, '2021_09_14_091509_create_follow_ups_table', 5),
(16, '2021_09_14_101145_create_follow_ups_table', 6),
(17, '2021_09_14_120739_create_follow_ups_table', 7),
(18, '2021_10_02_104158_create_s__posts_table', 8),
(19, '2021_10_02_104250_create_s__prescriptions_table', 8),
(20, '2021_10_02_113950_create_post_statuses_table', 9),
(21, '2021_10_20_150021_create_tests_table', 10),
(22, '2021_10_20_162201_create_hospital_tests_table', 11);

-- --------------------------------------------------------

--
-- Table structure for table `notifications`
--

CREATE TABLE `notifications` (
  `id` char(36) COLLATE utf8mb4_unicode_ci NOT NULL,
  `type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notifiable_id` bigint(20) UNSIGNED NOT NULL,
  `data` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `read_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notifications`
--

INSERT INTO `notifications` (`id`, `type`, `notifiable_type`, `notifiable_id`, `data`, `read_at`, `created_at`, `updated_at`) VALUES
('005182d4-29ae-4fe1-bfba-de66c1fad77d', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 5, '{\"id\":\"23750\",\"message\":\" has posted his issue at 06:17:34pm \",\"category\":\"Nutrition\"}', NULL, '2021-09-01 12:17:36', '2021-09-01 12:17:36'),
('0bd95ca1-46fa-4a6f-9404-441ecc53ca19', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 6, '{\"id\":\"23750\",\"message\":\"Admin message\",\"category\":\"Womens Health\"}', NULL, '2021-09-11 07:37:50', '2021-09-11 07:37:50'),
('127edfbe-508b-4d9c-ab4e-938b2e224f7f', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 6, '{\"id\":\"23750\",\"message\":\" has posted his issue at 07:15:51pm \",\"category\":\"Mens Health\"}', NULL, '2021-09-08 13:15:52', '2021-09-08 13:15:52'),
('18569f56-725b-4bc1-af1e-a13c2aa7f794', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 5, '{\"id\":\"23750\",\"message\":\" has posted his issue at 07:24:52pm \",\"category\":\"Mental Health\"}', NULL, '2021-10-15 13:24:52', '2021-10-15 13:24:52'),
('1d0b7936-bdec-4582-87a4-1a66ae28f2a8', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 4, '{\"id\":\"23750\",\"message\":\" has posted his issue at 07:15:51pm \",\"category\":\"Mens Health\"}', NULL, '2021-09-08 13:15:52', '2021-09-08 13:15:52'),
('1db36836-939d-4366-9706-b8b78ba64eb4', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 6, '{\"id\":\"22973\",\"message\":\" has posted his issue at 07:24:19pm \",\"category\":\"Respiratory\"}', NULL, '2021-10-15 13:24:20', '2021-10-15 13:24:20'),
('1f9658ae-e497-4fac-8a48-706f9628b3c0', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 5, '{\"id\":\"23750\",\"message\":\" has posted his issue at 07:19:11pm \",\"category\":\"Womens Health\"}', NULL, '2021-09-08 13:19:12', '2021-09-08 13:19:12'),
('213a5c19-e000-4625-bc5b-53b334c330aa', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 2, '{\"id\":\"24129\",\"message\":\" has posted his issue at 12:07:56am \",\"category\":\"Nutrition\"}', NULL, '2021-08-31 18:07:57', '2021-08-31 18:07:57'),
('222057f0-cdd8-41aa-a69b-786bfba5f871', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 4, '{\"id\":\"25301\",\"message\":\" has posted his issue at 03:22:30pm \",\"category\":\"Uncategorized\"}', NULL, '2021-10-13 09:22:31', '2021-10-13 09:22:31'),
('235f78f9-7a75-4d2d-9a56-971da447da6a', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 6, '{\"id\":\"24909\",\"message\":\" has posted his issue at 11:52:28am \",\"category\":\"Skin\"}', NULL, '2021-10-10 05:52:29', '2021-10-10 05:52:29'),
('2547022d-386f-4527-8c90-4da567985e81', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 6, '{\"id\":\"23750\",\"message\":\" has posted his issue at 07:39:52pm \",\"category\":\"Uncategorized\"}', NULL, '2021-09-11 13:39:53', '2021-09-11 13:39:53'),
('2836eda6-68dd-434e-aa6b-5dddeeaa6068', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 6, '{\"id\":\"23750\",\"message\":\"Admin message\",\"category\":\"Womens Health\"}', NULL, '2021-09-11 07:41:46', '2021-09-11 07:41:46'),
('298ae864-c2e6-4510-833a-70e236fc6d82', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 4, '{\"id\":\"22973\",\"message\":\" has posted his issue at 07:26:06pm \",\"category\":\"Skin\"}', NULL, '2021-10-15 13:26:06', '2021-10-15 13:26:06'),
('3606c33c-8a62-40ab-bc7b-824a7253f026', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 7, '{\"id\":\"22973\",\"message\":\" has posted his issue at 07:27:55pm \",\"category\":\"Fitness\"}', NULL, '2021-10-15 13:27:55', '2021-10-15 13:27:55'),
('36fda7d2-1c98-4750-a986-d6046d73b35f', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 6, '{\"id\":\"25301\",\"message\":\" has posted his issue at 03:22:30pm \",\"category\":\"Uncategorized\"}', NULL, '2021-10-13 09:22:31', '2021-10-13 09:22:31'),
('385d7226-abd2-4d75-a8ac-482adb079c9e', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 5, '{\"id\":\"23750\",\"message\":\"Admin message\",\"category\":\"Womens Health\"}', NULL, '2021-09-11 07:41:46', '2021-09-11 07:41:46'),
('3a06456c-57bc-4e41-b1b8-1402e503e28b', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 4, '{\"id\":\"24909\",\"message\":\" has posted his issue at 11:52:28am \",\"category\":\"Skin\"}', NULL, '2021-10-10 05:52:29', '2021-10-10 05:52:29'),
('3b3842f2-07af-4bfd-96d9-2a642db1c6b4', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 5, '{\"id\":\"23750\",\"message\":\"Admin message\",\"category\":\"Womens Health\"}', NULL, '2021-09-11 07:42:01', '2021-09-11 07:42:01'),
('43f247e4-c313-47d8-8c49-50162e842d83', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 4, '{\"id\":\"23750\",\"message\":\"Admin message\",\"category\":\"Womens Health\"}', NULL, '2021-09-11 07:37:49', '2021-09-11 07:37:49'),
('483ff01b-6328-4de1-a855-b94288c91137', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 5, '{\"id\":\"23750\",\"message\":\" has posted his issue at 07:15:51pm \",\"category\":\"Mens Health\"}', NULL, '2021-09-08 13:15:52', '2021-09-08 13:15:52'),
('499cd591-f42b-416d-a61f-181afd1842aa', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 6, '{\"id\":\"23750\",\"message\":\" has posted his issue at 07:19:11pm \",\"category\":\"Womens Health\"}', NULL, '2021-09-08 13:19:12', '2021-09-08 13:19:12'),
('50a5d723-154c-4b9f-ab8c-6109b01d95f0', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 7, '{\"id\":\"22973\",\"message\":\" has posted his issue at 07:26:06pm \",\"category\":\"Skin\"}', NULL, '2021-10-15 13:26:07', '2021-10-15 13:26:07'),
('5419ebaa-1e2c-4c93-8ea8-df2ac2b2b1a2', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 5, '{\"id\":\"23750\",\"message\":\"Admin message\",\"category\":\"Womens Health\"}', NULL, '2021-09-11 07:39:39', '2021-09-11 07:39:39'),
('5b61d5bd-7405-46f2-8a23-e1899ecfff4e', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 4, '{\"id\":\"23750\",\"message\":\" has posted his issue at 07:24:52pm \",\"category\":\"Mental Health\"}', NULL, '2021-10-15 13:24:52', '2021-10-15 13:24:52'),
('603c338e-3317-470c-96b3-0a43b86324c7', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 5, '{\"id\":\"25301\",\"message\":\" has posted his issue at 03:22:30pm \",\"category\":\"Uncategorized\"}', NULL, '2021-10-13 09:22:31', '2021-10-13 09:22:31'),
('67cbf5ec-1f35-4c58-9f67-426ad79dd988', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 6, '{\"id\":\"23750\",\"message\":\" has posted his issue at 12:47:26pm \",\"category\":\"Nutrition\"}', NULL, '2021-10-10 06:47:26', '2021-10-10 06:47:26'),
('6ee22172-bd91-4513-b4ad-87827ea656a4', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 5, '{\"id\":\"24909\",\"message\":\" has posted his issue at 11:52:28am \",\"category\":\"Skin\"}', NULL, '2021-10-10 05:52:29', '2021-10-10 05:52:29'),
('6f5c62da-592b-46e6-bd97-85bf4b5e837f', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 5, '{\"id\":\"23750\",\"message\":\"Admin message\",\"category\":\"Mens Health\"}', NULL, '2021-09-11 07:31:36', '2021-09-11 07:31:36'),
('7330ad99-3960-4740-8ed9-ab2d96ceaa18', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 4, '{\"id\":\"23750\",\"message\":\" has posted his issue at 07:39:52pm \",\"category\":\"Uncategorized\"}', NULL, '2021-09-11 13:39:53', '2021-09-11 13:39:53'),
('75280522-1247-498c-8c06-98552c468720', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 6, '{\"id\":\"22973\",\"message\":\" has posted his issue at 07:26:06pm \",\"category\":\"Skin\"}', NULL, '2021-10-15 13:26:07', '2021-10-15 13:26:07'),
('776036f4-56d6-4be9-971e-139eb97fc15f', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 4, '{\"id\":\"23750\",\"message\":\" has posted his issue at 12:45:56pm \",\"category\":\"Uncategorized\"}', NULL, '2021-10-10 06:45:56', '2021-10-10 06:45:56'),
('79e8071d-9b80-4a99-ba4b-3dc489b25c5f', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 5, '{\"id\":\"22973\",\"message\":\" has posted his issue at 07:24:19pm \",\"category\":\"Respiratory\"}', NULL, '2021-10-15 13:24:20', '2021-10-15 13:24:20'),
('7c761b75-ef00-4d80-9f87-d3c6b3cb8881', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 2, '{\"id\":\"24129\",\"message\":\" has posted his issue at 08:08:25pm \",\"category\":\"Skin\"}', NULL, '2021-08-29 14:08:25', '2021-08-29 14:08:25'),
('851d5c4e-6554-4c1a-828d-99e96c4b69f6', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 1, '{\"id\":\"24129\",\"message\":\" has posted his issue at 08:08:25pm \",\"category\":\"Skin\"}', NULL, '2021-08-29 14:08:25', '2021-08-29 14:08:25'),
('8718c84c-52cf-4d7a-b3d4-17c0a42ecf15', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 6, '{\"id\":\"23750\",\"message\":\"Admin message\",\"category\":\"Womens Health\"}', NULL, '2021-09-11 07:39:40', '2021-09-11 07:39:40'),
('8c01691a-3025-4b84-aaba-ca07087d4e44', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 4, '{\"id\":\"23750\",\"message\":\"Admin message\",\"category\":\"Womens Health\"}', NULL, '2021-09-11 07:39:39', '2021-09-11 07:39:39'),
('92fd3a34-e67e-4a75-8cf5-7132cc3e699a', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 4, '{\"id\":\"23750\",\"message\":\"Admin message\",\"category\":\"Womens Health\"}', NULL, '2021-09-11 07:41:46', '2021-09-11 07:41:46'),
('9a219e44-3d9d-4632-bc13-2da0f18644d8', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 5, '{\"id\":\"23750\",\"message\":\"Admin message\",\"category\":\"Womens Health\"}', NULL, '2021-09-11 07:37:50', '2021-09-11 07:37:50'),
('9ccbfdab-dea8-40d2-a64f-8ffbe7b136c1', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 6, '{\"id\":\"23750\",\"message\":\"Admin message\",\"category\":\"Mens Health\"}', NULL, '2021-09-11 07:31:36', '2021-09-11 07:31:36'),
('b2f62ceb-aedc-4153-99ec-6cccea713595', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 4, '{\"id\":\"22973\",\"message\":\" has posted his issue at 07:24:19pm \",\"category\":\"Respiratory\"}', NULL, '2021-10-15 13:24:20', '2021-10-15 13:24:20'),
('bd4bcb54-e163-4ce1-9348-408059422b2c', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 6, '{\"id\":\"23750\",\"message\":\" has posted his issue at 07:24:52pm \",\"category\":\"Mental Health\"}', NULL, '2021-10-15 13:24:52', '2021-10-15 13:24:52'),
('bf606ced-e961-4d2a-897e-0aa535ef9388', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 5, '{\"id\":\"23750\",\"message\":\" has posted his issue at 12:47:26pm \",\"category\":\"Nutrition\"}', NULL, '2021-10-10 06:47:26', '2021-10-10 06:47:26'),
('ccd5cf06-7abc-4324-9734-018acadc7013', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 6, '{\"id\":\"23750\",\"message\":\"Admin message\",\"category\":\"Womens Health\"}', NULL, '2021-09-11 07:42:01', '2021-09-11 07:42:01'),
('cdd02fdb-8160-46de-a53a-6859895dc5ed', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 2, '{\"id\":\"24129\",\"message\":\" has posted his issue at 08:07:49pm \",\"category\":\"Mens Health\"}', NULL, '2021-08-29 14:07:50', '2021-08-29 14:07:50'),
('d3f89b8c-0265-4016-9d91-c2dfc56f85bc', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 4, '{\"id\":\"22973\",\"message\":\" has posted his issue at 07:27:55pm \",\"category\":\"Fitness\"}', NULL, '2021-10-15 13:27:55', '2021-10-15 13:27:55'),
('d5ab352e-01f3-4ebe-b087-248a42aeace1', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 4, '{\"id\":\"23750\",\"message\":\"Admin message\",\"category\":\"Womens Health\"}', NULL, '2021-09-11 07:42:01', '2021-09-11 07:42:01'),
('de29b01e-ed24-4454-9915-5b7bb3d9947d', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 6, '{\"id\":\"23750\",\"message\":\" has posted his issue at 12:45:56pm \",\"category\":\"Uncategorized\"}', NULL, '2021-10-10 06:45:56', '2021-10-10 06:45:56'),
('df538697-0e85-4a51-af6a-96229813658d', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 4, '{\"id\":\"23750\",\"message\":\" has posted his issue at 12:47:26pm \",\"category\":\"Nutrition\"}', NULL, '2021-10-10 06:47:26', '2021-10-10 06:47:26'),
('e296333b-aa87-4fee-93a0-b8c00b505a67', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 5, '{\"id\":\"23750\",\"message\":\" has posted his issue at 07:39:52pm \",\"category\":\"Uncategorized\"}', NULL, '2021-09-11 13:39:53', '2021-09-11 13:39:53'),
('e43247c1-6fba-4fa7-8d2f-3410c4a5d5ef', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 5, '{\"id\":\"22973\",\"message\":\" has posted his issue at 07:26:06pm \",\"category\":\"Skin\"}', NULL, '2021-10-15 13:26:07', '2021-10-15 13:26:07'),
('e66dab02-dc86-4892-8fdd-938e8e9390ad', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 1, '{\"id\":\"24129\",\"message\":\" has posted his issue at 08:07:49pm \",\"category\":\"Mens Health\"}', NULL, '2021-08-29 14:07:50', '2021-08-29 14:07:50'),
('e75ba299-893f-4718-babc-2a39534bbb48', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 7, '{\"id\":\"22973\",\"message\":\" has posted his issue at 07:24:19pm \",\"category\":\"Respiratory\"}', NULL, '2021-10-15 13:24:20', '2021-10-15 13:24:20'),
('eb048921-619e-4232-90bc-f0c4c203fa80', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 1, '{\"id\":\"24129\",\"message\":\" has posted his issue at 12:07:56am \",\"category\":\"Nutrition\"}', NULL, '2021-08-31 18:07:57', '2021-08-31 18:07:57'),
('f6d82172-2832-45f2-8a76-305a3147c1a9', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 6, '{\"id\":\"22973\",\"message\":\" has posted his issue at 07:27:55pm \",\"category\":\"Fitness\"}', NULL, '2021-10-15 13:27:55', '2021-10-15 13:27:55'),
('f7ac07c5-7609-4c81-96e0-08d4d520a285', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 5, '{\"id\":\"22973\",\"message\":\" has posted his issue at 07:27:55pm \",\"category\":\"Fitness\"}', NULL, '2021-10-15 13:27:55', '2021-10-15 13:27:55'),
('faaeb544-5ec5-46e2-a620-a05391a96946', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 4, '{\"id\":\"23750\",\"message\":\" has posted his issue at 07:19:11pm \",\"category\":\"Womens Health\"}', NULL, '2021-09-08 13:19:11', '2021-09-08 13:19:11'),
('fb0d8b54-f350-45fe-866c-72495d4956cc', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 7, '{\"id\":\"23750\",\"message\":\" has posted his issue at 07:24:52pm \",\"category\":\"Mental Health\"}', NULL, '2021-10-15 13:24:52', '2021-10-15 13:24:52'),
('fcfc0547-1b44-4914-9f7b-bf9cc72dcb0f', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 5, '{\"id\":\"23750\",\"message\":\" has posted his issue at 12:45:56pm \",\"category\":\"Uncategorized\"}', NULL, '2021-10-10 06:45:56', '2021-10-10 06:45:56');

-- --------------------------------------------------------

--
-- Table structure for table `patients`
--

CREATE TABLE `patients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `userid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `propic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bloodgroup` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `patients`
--

INSERT INTO `patients` (`id`, `userid`, `email`, `fname`, `lname`, `propic`, `password`, `age`, `gender`, `phone`, `bloodgroup`, `created_at`) VALUES
(2, '23750', 'iftekhar@gmail.com', 'Iftekhar', 'Hyder', 'patient_propics/1630497159.jpg', '$2y$10$wUAWl.Bp6PX9tPCwnj6WoeERvDJxGHDiD0.3PrzvSdQzvZQgcaGB.', 25, 'male', '0172363587563', 'B+', '2021-09-01 11:52:39'),
(3, '23412', 'asma@gmail.com', 'Asma', 'Bakar', 'patient_propics/1630497360.png', '$2y$10$ThTf413P6UHR7aty0zIn9Oza1RkWWnJ5gQ6i4JpQ/nKoXwTKz0XRe', 25, 'female', '017823467542', 'A+', '2021-09-01 11:56:00'),
(4, '24909', 'shihab@patient.com', 'Md. Shihab', 'Hossain', 'patient_propics/1633844820.png', '$2y$10$8hlc6s9myIHRAImB7Xdj/Oimp5X2ctYZOwZzNJ6wsiSRiWKi2Lk3.', 24, 'male', '01622789743', 'O+', '2021-10-10 05:47:00'),
(5, '25301', 'tanzimahmed74@gmail.com', 'Tanzim', 'Ahmed', 'patient_propics/1634116773.jpg', '$2y$10$fvMQ3XZh8LPVRkiOXYSAEOd8XSNUrdzXkoSZQOPZCpnoLxJOKWgJK', 25, 'male', '+101622543273', 'A+', '2021-10-13 09:19:33'),
(6, '22973', 'auni@gmail.com', 'Auni', 'Hossain', 'patient_propics/1634302794.jpg', '$2y$10$xXj7heUBCZM0/ltOlv191O3JmzmgixaqBghKpJylz/ZK69TMuRlOa', 24, 'male', '01223232312', 'O+', '2021-10-15 12:59:54');

-- --------------------------------------------------------

--
-- Table structure for table `post_statuses`
--

CREATE TABLE `post_statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `post_statuses`
--

INSERT INTO `post_statuses` (`id`, `post_id`, `status`, `created_at`, `updated_at`) VALUES
(10, 6, 'done', NULL, '2021-10-02 09:10:58'),
(11, 12, 'done', NULL, '2021-10-27 15:47:46'),
(12, 14, 'done', NULL, '2021-10-29 15:12:30');

-- --------------------------------------------------------

--
-- Table structure for table `prescriptions`
--

CREATE TABLE `prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `information` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `prescriptions`
--

INSERT INTO `prescriptions` (`id`, `post_id`, `doctor_email`, `patient_email`, `information`, `created_at`) VALUES
(4, '4', 'tanzim@gmail.com', 'iftekhar@gmail.com', 'Protien Pill#daytime#1 month#2 mg#This medicine might help you gain weight.#NO TEST#NO TEST#NO TEST#NO TEST#NO TEST', '2021-09-01 12:20:39'),
(5, '4', 'alvi@gmail.com', 'iftekhar@gmail.com', 'Protien Pill#daytime#1 month#2 mg#This might help.#NO TEST#NO TEST#NO TEST#NO TEST#NO TEST', '2021-09-01 12:25:32'),
(6, '4', 'shihab@gmail.com', 'iftekhar@gmail.com', 'Super Gain Tablet#nighttime#1 month#3 mg#This will help gain wieght fast#NO TEST#NO TEST#NO TEST#NO TEST#NO TEST', '2021-09-01 12:27:28'),
(7, '7', 'tanzim@gmail.com', 'iftekhar@gmail.com', 'Napa#2:00 PM#7#2 mg#Take it everyday on the specified time.#Fever testing#4:00 PM#United Hospital#BLANK#BLANK', '2021-09-11 13:58:21'),
(8, '7', 'alvi@gmail.com', 'iftekhar@gmail.com', 'Tylenol#2:00 PM#6#3 mg#Take it two times in a day.#no test needed#0#No hospital#Blank#Blank', '2021-09-11 13:59:46'),
(9, '7', 'shihab@gmail.com', 'iftekhar@gmail.com', 'Napa#2:00 PM#7#5 mg#Take it at specified time.#Fever Test#4:00 PM#United Hospital#Blank#Blank', '2021-09-11 14:01:22'),
(10, '6', 'tanzim@gmail.com', 'iftekhar@gmail.com', 'percitamol#2#3#2#n#n#n#n#n#n', '2021-10-02 05:10:41'),
(11, '6', 'shihab@gmail.com', 'iftekhar@gmail.com', 'Napa#34#3#3#n#n#n#n#n#n', '2021-10-02 05:11:22'),
(12, '6', 'alvi@gmail.com', 'iftekhar@gmail.com', 'Eye Drop#8#3#8#8#2#2#2#2#2', '2021-10-02 05:11:59'),
(13, '8', 'tanzim@gmail.com', 'shihab@patient.com', 'coconut oil#before shower#30#2 table spoon#Use coconut oil before shower and after shower.#BLANK#BLANK#BLANK#follow this for 30 days and let me know after thirty days.#eat food with lemon.', '2021-10-10 05:56:04'),
(14, '8', 'alvi@gmail.com', 'shihab@patient.com', 'olive oil#before shower and after shower and before sleep#30#2 table spoons#Use only olive oil#BLANK#BLANK#BLANK#follow this for 30 days and let me know after thirty days.#eat food with lemon.', '2021-10-10 05:58:21'),
(15, '8', 'shihab@gmail.com', 'shihab@patient.com', 'olive oil#before shower and after shower and before sleep#30#2 table spoons#Use only olive oil#BLANK#BLANK#BLANK#follow this for 30 days and let me know after thirty days.#eat food with lemon', '2021-10-10 06:00:52'),
(16, '15', 'tanzim@gmail.com', 'auni@gmail.com', 'Peracitamol#2 PM#3#2 mg#take it everyday#Height Test#3:00 PM#Bardem Hospital#....#...', '2021-10-27 15:12:05'),
(17, '15', 'alvi@gmail.com', 'auni@gmail.com', 'Napa#2 PM#5#2 mg#Take it 3 times a week.#Height test#6 pm#United Hospital#....#....', '2021-10-27 15:16:20'),
(18, '15', 't@gmail.com', 'auni@gmail.com', 'Peracitamol#3 pm#4#2 mg#Take it everyday#Height test#10 AM#Square Hospital#....#....', '2021-10-27 15:19:10'),
(19, '12', 'tanzim@gmail.com', 'auni@gmail.com', 'Eye drop#9 am#3#0.5 mg#Take it in the morning.#...#...#..#..#...', '2021-10-27 15:27:15'),
(20, '12', 'alvi@gmail.com', 'auni@gmail.com', 'Napa#4 pm#5#3 mg#Take it on mondays#..#...#..#..#..', '2021-10-27 15:28:04'),
(21, '12', 't@gmail.com', 'auni@gmail.com', 'Salbutamol#9 pm#10#4 mg#Take it on fridays#..#..#..#.#..', '2021-10-27 15:29:15'),
(22, '14', 'tanzim@gmail.com', 'auni@gmail.com', 'Peracitamol#9 PM#3#2 mg#Take it on fridays#...#...#...#..#...', '2021-10-29 15:01:07'),
(23, '14', 'alvi@gmail.com', 'auni@gmail.com', 'Aripdex#10 AM#3#3 mg#Take it on Tuesdays#..#...#..#..#...', '2021-10-29 15:04:04'),
(24, '14', 't@gmail.com', 'auni@gmail.com', 'Jacruk#9 AM#5#3 mg#Take it on Saturdays#..#..#..#..#..', '2021-10-29 15:07:08');

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `rating` decimal(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `patient_id`, `doctor_id`, `rating`, `created_at`, `updated_at`) VALUES
(1, '1', '1', '5.00', '2021-08-31 18:06:50', NULL),
(2, '2', '4', '5.00', '2021-09-11 14:08:08', NULL),
(3, '3', '4', '3.00', '2021-09-11 14:09:34', NULL),
(4, '6', '5', '5.00', '2021-10-15 13:06:35', NULL),
(5, '6', '6', '5.00', '2021-10-28 14:33:55', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `specialist_doctors`
--

CREATE TABLE `specialist_doctors` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `lname` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `propic` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `homeaddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `chamberaddress` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nidno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `medcollege` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gradyear` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `licenseno` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `experience` int(11) NOT NULL,
  `degree` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `field` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `age` int(11) NOT NULL,
  `gender` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specialist_doctors`
--

INSERT INTO `specialist_doctors` (`id`, `email`, `fname`, `lname`, `phone`, `propic`, `password`, `homeaddress`, `chamberaddress`, `hospital`, `nidno`, `medcollege`, `gradyear`, `licenseno`, `experience`, `degree`, `field`, `age`, `gender`, `created_at`) VALUES
(1, 'kazi@gmail.com', 'Kazi', 'Ibrahim', '01784521323', 'specialist_propics/1633149123.jpg', '$2y$10$6xhuvBi9YgJD9s3K7xp6gunP2tKGzNBYERTbaU7vyULFT082w0lhW', 'Dhaka', 'Dhaka', 'Special Jawdri Hospital', '122131', 'Jackinsd College', '1990', '89738', 15, 'Specialist Doctor Degree', 'Cardiology', 40, 'male', '2021-10-27 11:23:43'),
(2, 'khan@gmail.com', 'Khan', 'Mazi', '11111111111', 'specialist_propics/1633165630.jpg', '$2y$10$SerPIteDb/G6Pfyzb8h4B.pv1/HYydDqaYl4brkBaE1.irN4be73m', 'Dhaka', 'Dhaka', 'United International Hospital', '12122121', 'Jackinsd College', '1991', '121221', 20, 'Specialist Doctor Degree', 'Nutrition', 50, 'female', '2021-10-02 09:07:10'),
(3, 'barhan@gmail.com', 'Barhan', 'Zaman', '01782346664', 'specialist_propics/1635349168.jpg', '$2y$10$pHJFwR8at.Qa6slzrKFqbu78WfD.XOjYEGZhM3E9oxC0Dyvoytjhu', 'Dhaka', 'Dhaka', 'Square Hospital', '12345678543', 'Dhaka Medical College', '2000', '12312313', 18, 'MD', 'Respiratory', 40, 'male', '2021-10-27 15:39:28'),
(4, 'ahmed@gmail.com', 'Ahmed', 'Rabbi', '213124313213', 'specialist_propics/1635507257.jpg', '$2y$10$yBeQ0MsyTjpdmWOsYklV9uF/so2wTfo/q82NJuHP/.5n2BZZhqvw2', 'Jikatola, Dhaka, Bangladesh', 'Jikatola Bus Stand, Dhaka, Bangladesh', 'Ahmed Hospital', '123241232', 'Dhaka Medical', '2000', '123241232', 21, 'A,x,s,w', 'Mental Health', 35, 'male', '2021-10-29 11:34:17'),
(5, 'fit@gmail.com', 'Dr. FIten', 'Fiten', '01722789743', 'specialist_propics/1635508563.jpg', '$2y$10$enZ2/8r.aN.RNA/a33FXFO9nK.j3ddlCytd58rXzcHfKXlOiugDVq', '12/9-A, Tajmahal Road, Dhaka', '12/9-A, Tajmahal Road, Dhaka', 'Square Hospital', '123421312', 'Dhaka Medical', '2001', '123421312', 20, 'A,x,s,w', 'Fitness', 39, 'male', '2021-10-29 11:56:03'),
(6, 'nut@gmail.com', 'Dr. Nutrieat', 'AB', '01655789743', 'specialist_propics/1635508831.jpg', '$2y$10$cw59J0nAtoTL1qyJThcVYOid/FryfuehO72yKRp7PyeIVYYfwzm0O', '12/9-A, Mirpur, Dhaka', '12/9-A, Mirpur, Dhaka', 'Dhaka Medical', '123421312', 'Dhaka Medical', '1999', '123421312', 21, 'A,x,s,w', 'Nutrition', 38, 'female', '2021-10-29 12:00:31'),
(7, 'men@gmail.com', 'Meni', 'Haq', '01622789794', 'specialist_propics/1635509035.jpg', '$2y$10$pl6.U2HY/6GZbnKyBaIO2uEEab4rjAwPEuaIVMBVfmiP0lIHEmXpu', '12/9-A, Tajmahal Road, Dhaka', '12/9-A, Tajmahal Road, Dhaka', 'Square Hospital', '123421312', 'Dhaka Medical', '1998', '123421312', 20, 'A,x,s,w', 'Men\'s Health', 29, 'male', '2021-10-29 12:03:55'),
(8, 'ert@gmail.com', 'mr', 'doc', '01741032997', 'specialist_propics/1635509523.jpg', '$2y$10$DdxYjEdmCyA4txddJ7OqvuqVNsf7vZ.1ioLdkZwkFMEGP6hSjrDRK', 'wery', '2345', '543', '111222333', 'DMC', '2003', '345', 3, 'MBBS', 'Mental Health', 34, 'male', '2021-10-29 12:12:03'),
(9, 'woman@gmail.com', 'Dr. Haq', 'Haq', '01522789743', 'specialist_propics/1635510333.jpg', '$2y$10$9gsuE9LCeg608OVkQD1ZBOfARxyUJnxcqXUbbb7EzuD4KdPfuAw1O', '12/9-A, Mirpur, Dhaka', '12/9-A, Mirpur, Dhaka', 'Dhaka Medical', '123456789', 'Dhaka Medical', '1999', '123456789', 18, 'A,x,s,w', 'Women\'s Health', 39, 'female', '2021-10-29 12:25:33'),
(10, 'rony@gmai.com', 'Dr', 'tyu', '01513269896', 'specialist_propics/1635510620.jpg', '$2y$10$0Wgj4jikgCdG/ux4FXWRo.gwRAYPf33yMGQgmuBeAp32ryhQa7M.u', '12/A , Mirpur,Dhaka', '12/A , Mirpur,Dhaka', 'DMC', '111222333', 'Dhaka Medical College', '1992', '111222333', 8, 'MBBS', 'Romantic Relationship', 32, 'male', '2021-10-29 13:07:46'),
(11, 'alvi@mail.com', 'Dr.', 'who', '01513269896', 'specialist_propics/1635510908.jpg', '$2y$10$cRRCLNI68ralsx9RTRXZHO6ssccBgq/.j0OpJrZubcHJw3p2VTkD2', 'Malibagh', 'Malibagh', 'DMC', '123123123', 'Dhaka Medical College', '1990', '12234321', 13, 'MBBS', 'Fitness', 44, 'male', '2021-10-29 12:35:08'),
(12, 'ishm2412@gmail.com', 'Dr.', 'Chris', '01716546345', 'specialist_propics/1635511379.jpg', '$2y$10$MFKsBp6msyTEcnP2drZ6.uug0W5ebQjc6iQd5pt7hS02SlAdKXUja', 'Malibagh', 'Malibagh', 'Popular', '1122333', 'Dhaka Medical College', '1990', '112233', 20, 'MBBS', 'Nutrition', 34, 'male', '2021-10-29 12:42:59'),
(13, 'i@mail.com', 'Ron', 'Gill', '01716546345', 'specialist_propics/1635511557.jpg', '$2y$10$VY3ARkjPwYLx3wAPk6eN9uZ7ShiYQOzVyiIXSo0.EMRBYeMsRp/0y', '12/A , Mirpur,Dhaka', '12/A , Mirpur,Dhaka', 'DMC', '112233', 'Dhaka Medical College', '2000', '12233212', 5, 'MBBS', 'Men\'s Health', 45, 'male', '2021-10-29 12:45:57'),
(14, 'mahi@gmail.com', 'mahi', 'hos', '01741032997', 'specialist_propics/1635511707.jpg', '$2y$10$JNskl.CcgKJzaAyxY0FbMeSKbDREQIDD4KCvPF.RsSHy4ekUDELB6', 'Malibagh', 'Malibagh', 'Popular', '1122333456', 'DMC', '1995', '1122333456', 13, 'MBBS', 'Women;s Health', 35, 'male', '2021-10-29 12:48:28'),
(15, 'marzia@mail.com', 'marzia', 'mosarrat', '01716546345', 'specialist_propics/1635511863.jpg', '$2y$10$l54RX9EBwMZ0Ayk5avLRfuVq/kUaC/fM12DGm.RBbJytGEMLEIjE6', '12/A , Mirpur,Dhaka', '12/A , Mirpur,Dhaka', 'DMC', '1122333456', 'DMC', '1990', '091234345', 13, 'MBBS', 'Pregnancy', 30, 'female', '2021-10-29 12:51:03'),
(16, 'ia_12@rocketmail.com', 'Dr.', 'e', '01513-269896', 'specialist_propics/1635512127.jpg', '$2y$10$EpDBUpGzrYCTVYwjXLQ4YOhAHcquVXNqGpHybkZaIgCXWVxqQjNMW', '12/A , Mirpur,Dhaka', '12/A , Mirpur,Dhaka', 'Popular', '11223334563', 'DMC', '1990', '11223334563', 12, 'A,X,Y,Z', 'Ear Nose Throat', 40, 'male', '2021-10-29 12:55:28'),
(17, 'new@mail.com', 'alvi', 'ahmed', '01716911938', 'specialist_propics/1635512213.jpg', '$2y$10$iTOtVhGRm24rcG6jdmUdv.cDTE/ZWjj3E7E287Ma2Gnibu.ePD0BS', 'Malibagh', 'Malibagh', 'DMC', '55345612', 'DMC', '1985', '55345612', 20, 'FRCP', 'Skin', 45, 'male', '2021-10-29 12:56:53'),
(18, 'r@gmail.com', 'Ron', 'eng', '01770156633', 'specialist_propics/1635512327.jpg', '$2y$10$HSRo4JB4Yi7bEULD1byLqusBlbUNt6sqfqyYs7c4E0T0.Lqlmkw2K', 'Demra', 'Demra', 'Exim bank hospital', '55345467', 'DMC', '1980', '55345467', 20, 'MBBS', 'Urology', 38, 'male', '2021-10-29 12:58:47'),
(19, 'Abdul@mail.com', 'Abdul', 'Gafoor', '01741032997', 'specialist_propics/1635512525.jpg', '$2y$10$5SiLUy3gPDwrFf3z613UFuYDyJsaMhvIA/MLyBYc96Xi6X4SRhAHm', 'Demra', 'Demra', 'Exim bank hospital', '11223334563', 'Dhaka Medical College', '1998', '1122333456', 24, 'A,X,Y,Z', 'Child Care', 44, 'male', '2021-10-29 13:02:06'),
(20, 'uota@mail.com', 'Dr.', 'Uota', '01716566345', 'specialist_propics/1635512632.jpg', '$2y$10$zr87O0JyzzkpRnwhPg3SMehxlG8ptzDTqnLqQlA6VP7CpdWSUqlSa', 'Demra', 'Demra', 'Popular', '114455678', 'Dhaka Medical College', '1998', '11456767', 24, 'FRCP', 'Sex Education', 49, 'male', '2021-10-29 13:03:52'),
(21, 'tyu@gmail.com', 'Dr.', 'Wan', '01716566345', 'specialist_propics/1635512768.jpg', '$2y$10$X5f.M3c9rADtI.ta4TtMtuZTGv34cYXjDAWUDXiwGfK1mmmCQUi1u', 'Malibagh', 'Malibagh', 'DMC', '12121212', 'DMC', '1980', '1122334567', 25, 'MBBS', 'Gynecology', 45, 'male', '2021-10-29 13:08:17'),
(22, 'mahir@gmail.com', 'Mahir', 'Matthews', '01716988236', 'specialist_propics/1635512878.jpg', '$2y$10$smgfDpyLEC6HrJ3t.7ePReShQ0E3/eTxBta7fyGUv8W1zCJFCWLgi', 'Malibagh', 'Mirpur', 'Alok', '69012345', 'DMC', '1990', '112234523', 22, 'A,X,Y,Z', 'Menstruation', 48, 'male', '2021-10-29 13:07:58'),
(23, 'tan@gmail.com', 'Ahmed', 'Feeroz', '01306989653', 'specialist_propics/1635512992.jpg', '$2y$10$m844FoSmSiW16.GnBM3JGu742Adahwd5zFt8Mhkeq/jq0KeBlrjq.', 'Malibagh', 'Mirpur', 'Apollo', '1123456', 'DMC', '1992', '1122333566', 26, 'MBBS,FRCP', 'Respiratory', 50, 'male', '2021-10-29 13:09:52');

-- --------------------------------------------------------

--
-- Table structure for table `s__posts`
--

CREATE TABLE `s__posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `specialist_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `s__posts`
--

INSERT INTO `s__posts` (`id`, `post_id`, `specialist_id`, `created_at`, `updated_at`) VALUES
(11, 6, 1, NULL, NULL),
(12, 12, 3, NULL, NULL),
(13, 14, 17, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `s__prescriptions`
--

CREATE TABLE `s__prescriptions` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `post_id` int(11) NOT NULL,
  `specialist_id` int(11) NOT NULL,
  `prescription_id` int(11) NOT NULL,
  `comment` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `s__prescriptions`
--

INSERT INTO `s__prescriptions` (`id`, `post_id`, `specialist_id`, `prescription_id`, `comment`, `created_at`, `updated_at`) VALUES
(7, 6, 1, 11, 'Choose this one and sleep well.', NULL, NULL),
(8, 12, 3, 20, 'I suggest you take the prescription 21.\r\nHave a healthy day! :)', NULL, NULL),
(9, 14, 17, 23, 'I suggest this prescription. :)', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tests`
--

CREATE TABLE `tests` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `doctor_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `patient_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `test_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `time` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `hospital` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tests`
--

INSERT INTO `tests` (`id`, `doctor_email`, `patient_email`, `test_name`, `time`, `hospital`) VALUES
(1, 'tanzim@gmail.com', 'iftekhar@gmail.com', 'NO TEST', 'NO TEST', 'NO TEST'),
(2, 'shihab@gmail.com', 'iftekhar@gmail.com', 'NO TEST', 'NO TEST', 'NO TEST'),
(3, 'tanzim@gmail.com', 'iftekhar@gmail.com', 'Fever testing', '4:00 PM', 'United Hospital'),
(4, 'alvi@gmail.com', 'iftekhar@gmail.com', 'no test needed', '0', 'No hospital'),
(5, 'shihab@gmail.com', 'iftekhar@gmail.com', 'Fever Test', '4:00 PM', 'United Hospital'),
(6, 'shihab@gmail.com', 'iftekhar@gmail.com', 'n', 'n', 'n'),
(7, 'alvi@gmail.com', 'iftekhar@gmail.com', '2', '2', '2'),
(8, 'tanzim@gmail.com', 'shihab@patient.com', 'BLANK', 'BLANK', 'BLANK'),
(9, 'alvi@gmail.com', 'shihab@patient.com', 'BLANK', 'BLANK', 'BLANK'),
(10, 'shihab@gmail.com', 'shihab@patient.com', 'BLANK', 'BLANK', 'BLANK');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doctors`
--
ALTER TABLE `doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `doc_schedules`
--
ALTER TABLE `doc_schedules`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital_admins`
--
ALTER TABLE `hospital_admins`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital_tests`
--
ALTER TABLE `hospital_tests`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `med_posts`
--
ALTER TABLE `med_posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `notifications_notifiable_type_notifiable_id_index` (`notifiable_type`,`notifiable_id`);

--
-- Indexes for table `patients`
--
ALTER TABLE `patients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post_statuses`
--
ALTER TABLE `post_statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescriptions`
--
ALTER TABLE `prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `specialist_doctors`
--
ALTER TABLE `specialist_doctors`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s__posts`
--
ALTER TABLE `s__posts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `s__prescriptions`
--
ALTER TABLE `s__prescriptions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tests`
--
ALTER TABLE `tests`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `doc_schedules`
--
ALTER TABLE `doc_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hospital_admins`
--
ALTER TABLE `hospital_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hospital_tests`
--
ALTER TABLE `hospital_tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `med_posts`
--
ALTER TABLE `med_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `post_statuses`
--
ALTER TABLE `post_statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `specialist_doctors`
--
ALTER TABLE `specialist_doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `s__posts`
--
ALTER TABLE `s__posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `s__prescriptions`
--
ALTER TABLE `s__prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `tests`
--
ALTER TABLE `tests`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
