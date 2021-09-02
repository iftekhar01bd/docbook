-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 02, 2021 at 05:56 AM
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
(4, 'tanzim@gmail.com', 'Tanzim', 'Uddin', 'doctor_propics/1630497478.jpg', '$2y$10$Yobvsa7Fk5xNCKvQSixx3.guPnfBryuf5oxnSAITlmtbY/Mx8abt2', 'Dhaka', 'Dhaka', 'Jawdri Hospital', '11111', 'Jackinsd College', '2015', 'Cardiology', '0.00', 5, 'MD', '2132312', 30, 'male', '0172363587563', '2021-09-01 11:57:58'),
(5, 'shihab@gmail.com', 'Shihab', 'Uddin', 'doctor_propics/1630497623.jpg', '$2y$10$sqpLl/TtcEh3K1YuYwT5qOjE6kZtKBzQk1dEt7NpGhR0dJRJBnpj2', 'Dhaka', 'Mohammedpur, Dhaka', 'United Hospital', '1221', 'Jackinsd College', '2015', 'Nutritionist', '0.00', 5, 'MD', '2343443', 40, 'male', '01723313213', '2021-09-01 12:00:23'),
(6, 'alvi@gmail.com', 'Alvi', 'Sultan', 'doctor_propics/1630499033.jpg', '$2y$10$LDdZpKv5PGaMK3NkTNoC1.b5utdoTO1.2BobQ6O39IrMKgTyzBDMW', 'Moghbazar, Dhaka', 'Dhaka', 'United Hospital', '21223', 'Jackinsd College', '2017', 'Kidney', '0.00', 3, 'DO', '2343443', 28, 'male', '01784238884', '2021-09-01 12:23:53');

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
  `id` bigint(20) UNSIGNED NOT NULL,
  `patient_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doctor_email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `post_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `problem_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `details` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pdf` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `prescription_count` int(11) NOT NULL,
  `specialist_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `hospital_admins`
--

CREATE TABLE `hospital_admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

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
(4, 'iftekhar@gmail.com', 'Post Anonymously', 'Nutrition', 'Very thin in appearance. Not gaining weight. Is there any medicines which can fix my issue?', 'patient_post_images/1630498654.png', 'patient_post_pdfs/1630498654.pdf', '2021-09-01 12:27:28', 3, 0);

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
(12, '2021_08_26_181926_create_blogs_table', 2);

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
('213a5c19-e000-4625-bc5b-53b334c330aa', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 2, '{\"id\":\"24129\",\"message\":\" has posted his issue at 12:07:56am \",\"category\":\"Nutrition\"}', NULL, '2021-08-31 18:07:57', '2021-08-31 18:07:57'),
('7c761b75-ef00-4d80-9f87-d3c6b3cb8881', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 2, '{\"id\":\"24129\",\"message\":\" has posted his issue at 08:08:25pm \",\"category\":\"Skin\"}', NULL, '2021-08-29 14:08:25', '2021-08-29 14:08:25'),
('851d5c4e-6554-4c1a-828d-99e96c4b69f6', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 1, '{\"id\":\"24129\",\"message\":\" has posted his issue at 08:08:25pm \",\"category\":\"Skin\"}', NULL, '2021-08-29 14:08:25', '2021-08-29 14:08:25'),
('cdd02fdb-8160-46de-a53a-6859895dc5ed', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 2, '{\"id\":\"24129\",\"message\":\" has posted his issue at 08:07:49pm \",\"category\":\"Mens Health\"}', NULL, '2021-08-29 14:07:50', '2021-08-29 14:07:50'),
('e66dab02-dc86-4892-8fdd-938e8e9390ad', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 1, '{\"id\":\"24129\",\"message\":\" has posted his issue at 08:07:49pm \",\"category\":\"Mens Health\"}', NULL, '2021-08-29 14:07:50', '2021-08-29 14:07:50'),
('eb048921-619e-4232-90bc-f0c4c203fa80', 'App\\Notifications\\PostNotification', 'App\\Models\\Doctor', 1, '{\"id\":\"24129\",\"message\":\" has posted his issue at 12:07:56am \",\"category\":\"Nutrition\"}', NULL, '2021-08-31 18:07:57', '2021-08-31 18:07:57');

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
(3, '23412', 'asma@gmail.com', 'Asma', 'Bakar', 'patient_propics/1630497360.png', '$2y$10$ThTf413P6UHR7aty0zIn9Oza1RkWWnJ5gQ6i4JpQ/nKoXwTKz0XRe', 25, 'female', '017823467542', 'A+', '2021-09-01 11:56:00');

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
(6, '4', 'shihab@gmail.com', 'iftekhar@gmail.com', 'Super Gain Tablet#nighttime#1 month#3 mg#This will help gain wieght fast#NO TEST#NO TEST#NO TEST#NO TEST#NO TEST', '2021-09-01 12:27:28');

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
(1, '1', '1', '5.00', '2021-08-31 18:06:50', NULL);

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
-- Indexes for dumped tables
--

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
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
-- Indexes for table `follow_ups`
--
ALTER TABLE `follow_ups`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hospital_admins`
--
ALTER TABLE `hospital_admins`
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
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `doctors`
--
ALTER TABLE `doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `doc_schedules`
--
ALTER TABLE `doc_schedules`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `follow_ups`
--
ALTER TABLE `follow_ups`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `hospital_admins`
--
ALTER TABLE `hospital_admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `med_posts`
--
ALTER TABLE `med_posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `patients`
--
ALTER TABLE `patients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `prescriptions`
--
ALTER TABLE `prescriptions`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `specialist_doctors`
--
ALTER TABLE `specialist_doctors`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
