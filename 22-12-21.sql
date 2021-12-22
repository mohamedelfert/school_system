-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Dec 22, 2021 at 02:14 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `school_system`
--

-- --------------------------------------------------------

--
-- Table structure for table `attendances`
--

CREATE TABLE `attendances` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `grade_id` int(10) UNSIGNED NOT NULL,
  `chapter_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `attendance_date` date NOT NULL,
  `attendance_status` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `attendances`
--

INSERT INTO `attendances` (`id`, `student_id`, `grade_id`, `chapter_id`, `section_id`, `teacher_id`, `attendance_date`, `attendance_status`, `created_at`, `updated_at`) VALUES
(1, 1, 2, 9, 12, 1, '2021-12-22', 1, '2021-12-22 08:36:42', '2021-12-22 08:36:42'),
(2, 5, 2, 9, 12, 1, '2021-12-22', 0, '2021-12-22 08:36:42', '2021-12-22 08:36:42'),
(3, 6, 2, 9, 12, 1, '2021-12-22', 1, '2021-12-22 08:36:42', '2021-12-22 08:36:42');

-- --------------------------------------------------------

--
-- Table structure for table `bloods`
--

CREATE TABLE `bloods` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bloods`
--

INSERT INTO `bloods` (`id`, `name`, `created_at`, `updated_at`) VALUES
(17, 'O +', '2021-11-27 21:09:04', '2021-11-27 21:09:04'),
(18, 'O -', '2021-11-27 21:09:04', '2021-11-27 21:09:04'),
(19, 'A +', '2021-11-27 21:09:04', '2021-11-27 21:09:04'),
(20, 'A -', '2021-11-27 21:09:04', '2021-11-27 21:09:04'),
(21, 'B +', '2021-11-27 21:09:04', '2021-11-27 21:09:04'),
(22, 'B -', '2021-11-27 21:09:04', '2021-11-27 21:09:04'),
(23, 'AB +', '2021-11-27 21:09:04', '2021-11-27 21:09:04'),
(24, 'AB -', '2021-11-27 21:09:04', '2021-11-27 21:09:04');

-- --------------------------------------------------------

--
-- Table structure for table `chapters`
--

CREATE TABLE `chapters` (
  `id` int(10) UNSIGNED NOT NULL,
  `chapter_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `chapters`
--

INSERT INTO `chapters` (`id`, `chapter_name`, `grade_id`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u0627\\u0648\\u0644\",\"en\":\"first class\"}', 1, '2021-11-29 20:39:29', '2021-11-29 20:39:29'),
(2, '{\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a\",\"en\":\"second class\"}', 1, '2021-11-29 20:39:29', '2021-11-29 20:39:29'),
(3, '{\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u062b\\u0627\\u0644\\u062b\",\"en\":\"third class\"}', 1, '2021-11-29 20:39:29', '2021-11-29 20:39:29'),
(4, '{\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u0627\\u0648\\u0644 \\u0627\\u0644\\u0627\\u0628\\u062a\\u062f\\u0627\\u0626\\u064a\",\"en\":\"first class primary\"}', 2, '2021-11-29 20:40:31', '2021-11-29 20:40:31'),
(5, '{\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a \\u0627\\u0644\\u0627\\u0628\\u062a\\u062f\\u0627\\u0626\\u064a\",\"en\":\"second class primary\"}', 2, '2021-11-29 20:40:31', '2021-11-29 20:40:31'),
(6, '{\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u062b\\u0627\\u0644\\u062b \\u0627\\u0644\\u0627\\u0628\\u062a\\u062f\\u0627\\u0626\\u064a\",\"en\":\"third class primary\"}', 2, '2021-11-29 20:40:31', '2021-11-29 20:40:31'),
(7, '{\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u0631\\u0627\\u0628\\u0639 \\u0627\\u0644\\u0627\\u0628\\u062a\\u062f\\u0627\\u0626\\u064a\",\"en\":\"forth class primary\"}', 2, '2021-11-29 20:40:31', '2021-11-29 20:40:31'),
(8, '{\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u062e\\u0627\\u0645\\u0633 \\u0627\\u0644\\u0627\\u0628\\u062a\\u062f\\u0627\\u0626\\u064a\",\"en\":\"fifth class primary\"}', 2, '2021-11-29 20:40:31', '2021-11-29 20:40:31'),
(9, '{\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u0633\\u0627\\u062f\\u0633 \\u0627\\u0644\\u0627\\u0628\\u062a\\u062f\\u0627\\u0626\\u064a\",\"en\":\"sixth class primary\"}', 2, '2021-11-29 20:40:31', '2021-11-29 20:40:31'),
(10, '{\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u0627\\u0648\\u0644 \\u0627\\u0644\\u0627\\u0639\\u062f\\u0627\\u062f\\u064a\",\"en\":\"first class preparatory\"}', 3, '2021-11-29 20:41:33', '2021-11-29 20:41:33'),
(11, '{\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a \\u0627\\u0644\\u0627\\u0639\\u062f\\u0627\\u062f\\u064a\",\"en\":\"second class preparatory\"}', 3, '2021-11-29 20:41:33', '2021-11-29 20:41:33'),
(12, '{\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u062b\\u0627\\u0644\\u062b \\u0627\\u0644\\u0627\\u0639\\u062f\\u0627\\u062f\\u064a\",\"en\":\"third class preparatory\"}', 3, '2021-11-29 20:41:33', '2021-11-29 20:41:33'),
(13, '{\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u0627\\u0648\\u0644 \\u0627\\u0644\\u062b\\u0627\\u0646\\u0648\\u064a\",\"en\":\"first class secondary\"}', 4, '2021-11-29 20:43:45', '2021-11-29 20:43:45'),
(14, '{\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u062b\\u0627\\u0646\\u064a \\u0627\\u0644\\u062b\\u0627\\u0646\\u0648\\u064a\",\"en\":\"second class secondary\"}', 4, '2021-11-29 20:43:45', '2021-11-29 20:43:45'),
(15, '{\"ar\":\"\\u0627\\u0644\\u0635\\u0641 \\u0627\\u0644\\u062b\\u0627\\u0644\\u062b \\u0627\\u0644\\u062b\\u0627\\u0646\\u0648\\u064a\",\"en\":\"third class secondary\"}', 4, '2021-11-29 20:43:45', '2021-11-29 20:43:45');

-- --------------------------------------------------------

--
-- Table structure for table `exams`
--

CREATE TABLE `exams` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `subject_id` int(10) UNSIGNED NOT NULL,
  `grade_id` int(10) UNSIGNED NOT NULL,
  `chapter_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `date_start` date NOT NULL,
  `date_end` date NOT NULL,
  `score` int(10) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `exams`
--

INSERT INTO `exams` (`id`, `name`, `subject_id`, `grade_id`, `chapter_id`, `section_id`, `teacher_id`, `date_start`, `date_end`, `score`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0627\\u0645\\u062a\\u062d\\u0627\\u0646 \\u0639\\u0631\\u0628\\u064a\",\"en\":\"arabic exam\"}', 1, 2, 9, 12, 1, '2021-12-22', '2021-12-31', 50, '2021-12-22 08:55:23', '2021-12-22 09:59:58'),
(2, '{\"ar\":\"\\u0627\\u0645\\u062a\\u062d\\u0627\\u0646 \\u0627\\u0646\\u062c\\u0644\\u064a\\u0632\\u064a\",\"en\":\"english exam\"}', 2, 2, 9, 12, 3, '2021-12-22', '2021-12-31', 50, '2021-12-22 09:01:05', '2021-12-22 10:00:06'),
(3, '{\"ar\":\"\\u0627\\u0645\\u062a\\u062d\\u0627\\u0646 \\u0639\\u0631\\u0628\\u064a\",\"en\":\"arabic exam\"}', 1, 3, 10, 6, 1, '2021-12-22', '2022-01-01', 100, '2021-12-22 09:13:54', '2021-12-22 10:00:17');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `fees_invoices`
--

CREATE TABLE `fees_invoices` (
  `id` int(10) UNSIGNED NOT NULL,
  `invoice_date` date NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `grade_id` int(10) UNSIGNED NOT NULL,
  `chapter_id` int(10) UNSIGNED NOT NULL,
  `fee_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fees_invoices`
--

INSERT INTO `fees_invoices` (`id`, `invoice_date`, `student_id`, `grade_id`, `chapter_id`, `fee_id`, `amount`, `notes`, `created_at`, `updated_at`) VALUES
(1, '2021-12-19', 1, 2, 9, 3, '10000.00', 'مصاريف العام الدراسي', '2021-12-19 13:40:12', '2021-12-19 13:40:12'),
(2, '2021-12-19', 1, 2, 9, 6, '5000.00', 'مصاريف الباص السنويه', '2021-12-19 13:40:12', '2021-12-19 13:40:12'),
(3, '2021-12-19', 1, 2, 9, 7, '8000.00', 'رسوم تسجيل اول مره', '2021-12-19 13:40:12', '2021-12-19 13:40:12');

-- --------------------------------------------------------

--
-- Table structure for table `fund_accounts`
--

CREATE TABLE `fund_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `receipt_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_id` int(10) UNSIGNED DEFAULT NULL,
  `debit` decimal(8,2) DEFAULT NULL,
  `credit` decimal(8,2) DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `fund_accounts`
--

INSERT INTO `fund_accounts` (`id`, `date`, `receipt_id`, `payment_id`, `debit`, `credit`, `notes`, `created_at`, `updated_at`) VALUES
(1, '2021-12-19', 2, NULL, '12000.00', '0.00', 'دفعه اولي رسوم التسجيل وجزء من رسوم الباص والرسوم للترم الاول', '2021-12-19 13:44:33', '2021-12-19 13:44:33'),
(3, '2021-12-19', NULL, 2, '0.00', '2500.00', 'المبلغ المسترجع للطالب لعدم استخدامه للباص', '2021-12-19 14:22:47', '2021-12-19 14:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `genders`
--

CREATE TABLE `genders` (
  `id` int(10) UNSIGNED NOT NULL,
  `gender_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `genders`
--

INSERT INTO `genders` (`id`, `gender_name`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0630\\u0643\\u0631\",\"en\":\"Male\"}', '2021-11-27 21:13:45', '2021-11-27 21:13:45'),
(2, '{\"ar\":\"\\u0627\\u0646\\u062b\\u064a\",\"en\":\"Female\"}', '2021-11-27 21:13:45', '2021-11-27 21:13:45');

-- --------------------------------------------------------

--
-- Table structure for table `grades`
--

CREATE TABLE `grades` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `notes` text COLLATE utf8mb4_unicode_ci,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `grades`
--

INSERT INTO `grades` (`id`, `name`, `notes`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0645\\u0631\\u062d\\u0644\\u0647 \\u0631\\u064a\\u0627\\u0636 \\u0627\\u0644\\u0627\\u0637\\u0641\\u0627\\u0644\",\"en\":\"Kindergarten stage\"}', NULL, '2021-11-29 20:37:57', '2021-11-29 20:37:57'),
(2, '{\"ar\":\"\\u0627\\u0644\\u0645\\u0631\\u062d\\u0644\\u0647 \\u0627\\u0644\\u0627\\u0628\\u062a\\u062f\\u0627\\u0626\\u064a\\u0647\",\"en\":\"Primary Stage\"}', NULL, '2021-11-29 20:38:04', '2021-11-29 20:38:04'),
(3, '{\"ar\":\"\\u0627\\u0644\\u0645\\u0631\\u062d\\u0644\\u0647 \\u0627\\u0644\\u0627\\u0639\\u062f\\u0627\\u062f\\u064a\\u0647\",\"en\":\"Preparatory Stage\"}', NULL, '2021-11-29 20:38:16', '2021-11-29 20:38:16'),
(4, '{\"ar\":\"\\u0627\\u0644\\u0645\\u0631\\u062d\\u0644\\u0647 \\u0627\\u0644\\u062b\\u0627\\u0646\\u0648\\u064a\\u0647\",\"en\":\"Secondary School\"}', NULL, '2021-11-29 20:38:24', '2021-11-29 20:38:24');

-- --------------------------------------------------------

--
-- Table structure for table `images`
--

CREATE TABLE `images` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image_id` int(11) NOT NULL,
  `image_type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `images`
--

INSERT INTO `images` (`id`, `file_name`, `image_id`, `image_type`, `created_at`, `updated_at`) VALUES
(4, 'FRqzlTXozBrX4MYAUTuw5AKWgQboRAPUmTrrKafz.jpeg', 2, 'App\\Models\\Student', '2021-12-12 22:11:23', '2021-12-12 22:11:23'),
(5, 'MYnI4EGsizPQjKbHZHCp4qfw0fHxBRfuxCQtBQ8J.jpeg', 2, 'App\\Models\\Student', '2021-12-12 22:11:23', '2021-12-12 22:11:23'),
(6, 'aH1vGy9mL4MxkDB7bZOt1wramYo5bl2pdywWkspq.jpeg', 4, 'App\\Models\\Student', '2021-12-12 22:14:35', '2021-12-12 22:14:35'),
(7, 'FRqzlTXozBrX4MYAUTuw5AKWgQboRAPUmTrrKafz.jpeg', 4, 'App\\Models\\Student', '2021-12-12 22:14:35', '2021-12-12 22:14:35'),
(11, 'DFC6EKe7OhX10VqhhhiVyIQemAAbcvlGdYW8BFr7.jpeg', 3, 'App\\Models\\Student', '2021-12-13 12:36:47', '2021-12-13 12:36:47'),
(12, 'Jt7qpNLvyIrAbrHD35sEJh1mlAzEvu2Z1eOZszKV.jpeg', 3, 'App\\Models\\Student', '2021-12-13 12:36:47', '2021-12-13 12:36:47'),
(14, 'aXCH7cIw1ycCk0uZmDnQ6djuoW80bncF8rHMd19y.jpeg', 3, 'App\\Models\\Student', '2021-12-13 13:29:57', '2021-12-13 13:29:57'),
(16, 'DFC6EKe7OhX10VqhhhiVyIQemAAbcvlGdYW8BFr7.jpeg', 1, 'App\\Models\\Student', '2021-12-13 14:30:01', '2021-12-13 14:30:01'),
(17, 'Jt7qpNLvyIrAbrHD35sEJh1mlAzEvu2Z1eOZszKV.jpeg', 1, 'App\\Models\\Student', '2021-12-13 14:30:01', '2021-12-13 14:30:01');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_11_14_150551_create_grades_table', 1),
(5, '2021_11_17_222325_create_chapters_table', 1),
(6, '2021_11_21_122553_create_sections_table', 1),
(7, '2021_11_24_162133_create_bloods_table', 1),
(8, '2021_11_24_163337_create_religions_table', 1),
(9, '2021_11_24_164105_create_nationalities_table', 1),
(10, '2021_11_24_213931_create_my_parents_table', 1),
(11, '2021_11_26_191140_create_parent_attachments_table', 2),
(12, '2021_11_27_180137_create_specializations_table', 3),
(13, '2021_11_27_224054_create_genders_table', 4),
(14, '2021_11_27_224414_create_teachers_table', 4),
(15, '2021_11_29_010150_create_teachers_sections_table', 5),
(16, '2021_12_07_125241_create_students_table', 6),
(17, '2021_12_12_232730_create_images_table', 7),
(18, '2021_12_13_195559_create_promotions_table', 8),
(19, '2021_12_16_140022_create_study_fees_table', 9),
(20, '2021_12_17_185803_create_fees_invoices_table', 10),
(21, '2021_12_17_190019_create_student_accounts_table', 10),
(22, '2021_12_17_223635_create_student_accounts_table', 11),
(23, '2021_12_18_192102_create_receipt_students_table', 12),
(24, '2021_12_18_192158_create_fund_accounts_table', 12),
(25, '2021_12_18_223635_create_student_accounts_table', 13),
(26, '2021_12_19_115133_create_processing_fees_table', 14),
(27, '2021_12_19_223635_create_student_accounts_table', 14),
(28, '2021_12_19_150815_create_payments_students_table', 15),
(29, '2021_12_20_223635_create_student_accounts_table', 16),
(30, '2021_12_19_192158_create_fund_accounts_table', 17),
(31, '2021_12_20_272520_create_attendances_table', 18),
(32, '2021_12_20_230555_create_subjects_table', 19),
(33, '2021_12_21_185855_create_exams_table', 20),
(34, '2021_12_21_185955_create_exams_table', 21),
(35, '2021_12_20_223720_create_attendances_table', 22),
(36, '2021_12_22_120236_create_questions_table', 23);

-- --------------------------------------------------------

--
-- Table structure for table `my_parents`
--

CREATE TABLE `my_parents` (
  `id` int(10) UNSIGNED NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_passport` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_job` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `father_nationality_id` int(10) UNSIGNED NOT NULL,
  `father_religion_id` int(10) UNSIGNED NOT NULL,
  `father_blood_id` int(10) UNSIGNED NOT NULL,
  `mother_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_phone` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_id` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_passport` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_job` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mother_nationality_id` int(10) UNSIGNED NOT NULL,
  `mother_religion_id` int(10) UNSIGNED NOT NULL,
  `mother_blood_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `my_parents`
--

INSERT INTO `my_parents` (`id`, `email`, `password`, `father_name`, `father_address`, `father_phone`, `father_id`, `father_passport`, `father_job`, `father_nationality_id`, `father_religion_id`, `father_blood_id`, `mother_name`, `mother_address`, `mother_phone`, `mother_id`, `mother_passport`, `mother_job`, `mother_nationality_id`, `mother_religion_id`, `mother_blood_id`, `created_at`, `updated_at`) VALUES
(1, 'ahmed@yahoo.com', '$2y$10$qc4nfvWvcJ.3hutQOSnc7uraF0EFWBtjCuAdmJzqDRLzia/fuvL3G', '{\"ar\":\"\\u0627\\u062d\\u0645\\u062f \\u062d\\u0627\\u0645\\u062f \\u0627\\u0644\\u0633\\u064a\\u062f \\u062d\\u0633\\u064a\\u0646\",\"en\":\"ahmed hamed elsyed hussen\"}', 'القاهره - السيده زينب', '01129554027', '90354160031507', 'A23901485', '{\"ar\":\"\\u0645\\u062d\\u0627\\u0633\\u0628\",\"en\":\"accountant\"}', 310, 4, 17, '{\"ar\":\"\\u0633\\u0627\\u0631\\u0647 \\u0639\\u0645\\u0627\\u062f \\u0639\\u0628\\u062f\\u0647\",\"en\":\"sara emad abdo\"}', 'القاهره - السيده زينب', '01164850248', '93001642800760', 'A66304820', '{\"ar\":\"\\u0645\\u062d\\u0627\\u0633\\u0628\",\"en\":\"accountant\"}', 310, 4, 18, '2021-11-29 20:47:10', '2021-11-29 20:47:10'),
(2, 'samy@yahoo.com', '$2y$10$5CZDOWepA72B1pl9Sg/ZFuodnWVNLR.G3hhK4OKUy24Mco2/UzYDa', '{\"ar\":\"\\u0633\\u0627\\u0645\\u064a \\u062d\\u0633\\u0646 \\u0645\\u062d\\u0645\\u062f\",\"en\":\"samy hasan mohamed\"}', 'القاهره ', '01221547054', '45613879215467', 'A2165fd01', '{\"ar\":\"\\u0645\\u062f\\u0631\\u0633\",\"en\":\"teacher\"}', 310, 4, 17, '{\"ar\":\"\\u064a\\u0633\\u0631\\u0627 \\u0639\\u0644\\u064a \\u062d\\u0633\\u0646\",\"en\":\"yosra ali hasan\"}', 'القاهره', '01145428754', '45123486112123', 'A00387054', '{\"ar\":\"\\u0644\\u0627 \\u064a\\u0648\\u062c\\u062f\",\"en\":\"no\"}', 310, 4, 17, '2021-12-07 14:36:29', '2021-12-07 14:36:29'),
(3, 'khaled@yahoo.com', '$2y$10$sCRMb.XbxpkdnuBPx8fcf.hKf4lunG/vb8bYiVJ1rs8t/o.EfafCK', '{\"ar\":\"\\u062e\\u0627\\u0644\\u062f \\u0639\\u0644\\u064a \\u0627\\u0644\\u0633\\u064a\\u062f\",\"en\":\"khaled ali elsyed\"}', 'القاهره', '01245558544', '45612378021548', 'A54564564', '{\"ar\":\"\\u0645\\u062f\\u0631\\u0633\",\"en\":\"teacher\"}', 310, 4, 22, '{\"ar\":\"\\u0627\\u0644\\u0647\\u0627\\u0645 \\u0645\\u062d\\u0645\\u062f \\u0639\\u0628\\u062f\\u0647\",\"en\":\"elham mohamed abdo\"}', 'القاهره', '0132148854455', '54231187213564', 'A21348874', '{\"ar\":\"\\u0644\\u0627 \\u064a\\u0648\\u062c\\u062f\",\"en\":\"no\"}', 310, 4, 17, '2021-12-12 20:54:27', '2021-12-12 20:54:27');

-- --------------------------------------------------------

--
-- Table structure for table `nationalities`
--

CREATE TABLE `nationalities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nationalities`
--

INSERT INTO `nationalities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(247, '{\"en\":\"Afghan\",\"ar\":\"\\u0623\\u0641\\u063a\\u0627\\u0646\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(248, '{\"en\":\"Albanian\",\"ar\":\"\\u0623\\u0644\\u0628\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(249, '{\"en\":\"Aland Islander\",\"ar\":\"\\u0622\\u0644\\u0627\\u0646\\u062f\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(250, '{\"en\":\"Algerian\",\"ar\":\"\\u062c\\u0632\\u0627\\u0626\\u0631\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(251, '{\"en\":\"American Samoan\",\"ar\":\"\\u0623\\u0645\\u0631\\u064a\\u0643\\u064a \\u0633\\u0627\\u0645\\u0648\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(252, '{\"en\":\"Andorran\",\"ar\":\"\\u0623\\u0646\\u062f\\u0648\\u0631\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(253, '{\"en\":\"Angolan\",\"ar\":\"\\u0623\\u0646\\u0642\\u0648\\u0644\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(254, '{\"en\":\"Anguillan\",\"ar\":\"\\u0623\\u0646\\u063a\\u0648\\u064a\\u0644\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(255, '{\"en\":\"Antarctican\",\"ar\":\"\\u0623\\u0646\\u062a\\u0627\\u0631\\u0643\\u062a\\u064a\\u0643\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(256, '{\"en\":\"Antiguan\",\"ar\":\"\\u0628\\u0631\\u0628\\u0648\\u062f\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(257, '{\"en\":\"Argentinian\",\"ar\":\"\\u0623\\u0631\\u062c\\u0646\\u062a\\u064a\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(258, '{\"en\":\"Armenian\",\"ar\":\"\\u0623\\u0631\\u0645\\u064a\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(259, '{\"en\":\"Aruban\",\"ar\":\"\\u0623\\u0648\\u0631\\u0648\\u0628\\u0647\\u064a\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(260, '{\"en\":\"Australian\",\"ar\":\"\\u0623\\u0633\\u062a\\u0631\\u0627\\u0644\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(261, '{\"en\":\"Austrian\",\"ar\":\"\\u0646\\u0645\\u0633\\u0627\\u0648\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(262, '{\"en\":\"Azerbaijani\",\"ar\":\"\\u0623\\u0630\\u0631\\u0628\\u064a\\u062c\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(263, '{\"en\":\"Bahamian\",\"ar\":\"\\u0628\\u0627\\u0647\\u0627\\u0645\\u064a\\u0633\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(264, '{\"en\":\"Bahraini\",\"ar\":\"\\u0628\\u062d\\u0631\\u064a\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(265, '{\"en\":\"Bangladeshi\",\"ar\":\"\\u0628\\u0646\\u063a\\u0644\\u0627\\u062f\\u064a\\u0634\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(266, '{\"en\":\"Barbadian\",\"ar\":\"\\u0628\\u0631\\u0628\\u0627\\u062f\\u0648\\u0633\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(267, '{\"en\":\"Belarusian\",\"ar\":\"\\u0631\\u0648\\u0633\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(268, '{\"en\":\"Belgian\",\"ar\":\"\\u0628\\u0644\\u062c\\u064a\\u0643\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(269, '{\"en\":\"Belizean\",\"ar\":\"\\u0628\\u064a\\u0644\\u064a\\u0632\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(270, '{\"en\":\"Beninese\",\"ar\":\"\\u0628\\u0646\\u064a\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(271, '{\"en\":\"Saint Barthelmian\",\"ar\":\"\\u0633\\u0627\\u0646 \\u0628\\u0627\\u0631\\u062a\\u064a\\u0644\\u0645\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(272, '{\"en\":\"Bermudan\",\"ar\":\"\\u0628\\u0631\\u0645\\u0648\\u062f\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(273, '{\"en\":\"Bhutanese\",\"ar\":\"\\u0628\\u0648\\u062a\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(274, '{\"en\":\"Bolivian\",\"ar\":\"\\u0628\\u0648\\u0644\\u064a\\u0641\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(275, '{\"en\":\"Bosnian \\/ Herzegovinian\",\"ar\":\"\\u0628\\u0648\\u0633\\u0646\\u064a\\/\\u0647\\u0631\\u0633\\u0643\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(276, '{\"en\":\"Botswanan\",\"ar\":\"\\u0628\\u0648\\u062a\\u0633\\u0648\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(277, '{\"en\":\"Bouvetian\",\"ar\":\"\\u0628\\u0648\\u0641\\u064a\\u0647\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(278, '{\"en\":\"Brazilian\",\"ar\":\"\\u0628\\u0631\\u0627\\u0632\\u064a\\u0644\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(279, '{\"en\":\"British Indian Ocean Territory\",\"ar\":\"\\u0625\\u0642\\u0644\\u064a\\u0645 \\u0627\\u0644\\u0645\\u062d\\u064a\\u0637 \\u0627\\u0644\\u0647\\u0646\\u062f\\u064a \\u0627\\u0644\\u0628\\u0631\\u064a\\u0637\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(280, '{\"en\":\"Bruneian\",\"ar\":\"\\u0628\\u0631\\u0648\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(281, '{\"en\":\"Bulgarian\",\"ar\":\"\\u0628\\u0644\\u063a\\u0627\\u0631\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(282, '{\"en\":\"Burkinabe\",\"ar\":\"\\u0628\\u0648\\u0631\\u0643\\u064a\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(283, '{\"en\":\"Burundian\",\"ar\":\"\\u0628\\u0648\\u0631\\u0648\\u0646\\u064a\\u062f\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(284, '{\"en\":\"Cambodian\",\"ar\":\"\\u0643\\u0645\\u0628\\u0648\\u062f\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(285, '{\"en\":\"Cameroonian\",\"ar\":\"\\u0643\\u0627\\u0645\\u064a\\u0631\\u0648\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(286, '{\"en\":\"Canadian\",\"ar\":\"\\u0643\\u0646\\u062f\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(287, '{\"en\":\"Cape Verdean\",\"ar\":\"\\u0627\\u0644\\u0631\\u0623\\u0633 \\u0627\\u0644\\u0623\\u062e\\u0636\\u0631\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(288, '{\"en\":\"Caymanian\",\"ar\":\"\\u0643\\u0627\\u064a\\u0645\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(289, '{\"en\":\"Central African\",\"ar\":\"\\u0623\\u0641\\u0631\\u064a\\u0642\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(290, '{\"en\":\"Chadian\",\"ar\":\"\\u062a\\u0634\\u0627\\u062f\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(291, '{\"en\":\"Chilean\",\"ar\":\"\\u0634\\u064a\\u0644\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(292, '{\"en\":\"Chinese\",\"ar\":\"\\u0635\\u064a\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(293, '{\"en\":\"Christmas Islander\",\"ar\":\"\\u062c\\u0632\\u064a\\u0631\\u0629 \\u0639\\u064a\\u062f \\u0627\\u0644\\u0645\\u064a\\u0644\\u0627\\u062f\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(294, '{\"en\":\"Cocos Islander\",\"ar\":\"\\u062c\\u0632\\u0631 \\u0643\\u0648\\u0643\\u0648\\u0633\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(295, '{\"en\":\"Colombian\",\"ar\":\"\\u0643\\u0648\\u0644\\u0648\\u0645\\u0628\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(296, '{\"en\":\"Comorian\",\"ar\":\"\\u062c\\u0632\\u0631 \\u0627\\u0644\\u0642\\u0645\\u0631\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(297, '{\"en\":\"Congolese\",\"ar\":\"\\u0643\\u0648\\u0646\\u063a\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(298, '{\"en\":\"Cook Islander\",\"ar\":\"\\u062c\\u0632\\u0631 \\u0643\\u0648\\u0643\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(299, '{\"en\":\"Costa Rican\",\"ar\":\"\\u0643\\u0648\\u0633\\u062a\\u0627\\u0631\\u064a\\u0643\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(300, '{\"en\":\"Croatian\",\"ar\":\"\\u0643\\u0648\\u0631\\u0627\\u062a\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(301, '{\"en\":\"Cuban\",\"ar\":\"\\u0643\\u0648\\u0628\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(302, '{\"en\":\"Cypriot\",\"ar\":\"\\u0642\\u0628\\u0631\\u0635\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(303, '{\"en\":\"Curacian\",\"ar\":\"\\u0643\\u0648\\u0631\\u0627\\u0633\\u0627\\u0648\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(304, '{\"en\":\"Czech\",\"ar\":\"\\u062a\\u0634\\u064a\\u0643\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(305, '{\"en\":\"Danish\",\"ar\":\"\\u062f\\u0646\\u0645\\u0627\\u0631\\u0643\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(306, '{\"en\":\"Djiboutian\",\"ar\":\"\\u062c\\u064a\\u0628\\u0648\\u062a\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(307, '{\"en\":\"Dominican\",\"ar\":\"\\u062f\\u0648\\u0645\\u064a\\u0646\\u064a\\u0643\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(308, '{\"en\":\"Dominican\",\"ar\":\"\\u062f\\u0648\\u0645\\u064a\\u0646\\u064a\\u0643\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(309, '{\"en\":\"Ecuadorian\",\"ar\":\"\\u0625\\u0643\\u0648\\u0627\\u062f\\u0648\\u0631\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(310, '{\"en\":\"Egyptian\",\"ar\":\"\\u0645\\u0635\\u0631\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(311, '{\"en\":\"Salvadoran\",\"ar\":\"\\u0633\\u0644\\u0641\\u0627\\u062f\\u0648\\u0631\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(312, '{\"en\":\"Equatorial Guinean\",\"ar\":\"\\u063a\\u064a\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(313, '{\"en\":\"Eritrean\",\"ar\":\"\\u0625\\u0631\\u064a\\u062a\\u064a\\u0631\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(314, '{\"en\":\"Estonian\",\"ar\":\"\\u0627\\u0633\\u062a\\u0648\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(315, '{\"en\":\"Ethiopian\",\"ar\":\"\\u0623\\u062b\\u064a\\u0648\\u0628\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(316, '{\"en\":\"Falkland Islander\",\"ar\":\"\\u0641\\u0648\\u0643\\u0644\\u0627\\u0646\\u062f\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(317, '{\"en\":\"Faroese\",\"ar\":\"\\u062c\\u0632\\u0631 \\u0641\\u0627\\u0631\\u0648\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(318, '{\"en\":\"Fijian\",\"ar\":\"\\u0641\\u064a\\u062c\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(319, '{\"en\":\"Finnish\",\"ar\":\"\\u0641\\u0646\\u0644\\u0646\\u062f\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(320, '{\"en\":\"French\",\"ar\":\"\\u0641\\u0631\\u0646\\u0633\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(321, '{\"en\":\"French Guianese\",\"ar\":\"\\u063a\\u0648\\u064a\\u0627\\u0646\\u0627 \\u0627\\u0644\\u0641\\u0631\\u0646\\u0633\\u064a\\u0629\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(322, '{\"en\":\"French Polynesian\",\"ar\":\"\\u0628\\u0648\\u0644\\u064a\\u0646\\u064a\\u0632\\u064a\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(323, '{\"en\":\"French\",\"ar\":\"\\u0623\\u0631\\u0627\\u0636 \\u0641\\u0631\\u0646\\u0633\\u064a\\u0629 \\u062c\\u0646\\u0648\\u0628\\u064a\\u0629 \\u0648\\u0623\\u0646\\u062a\\u0627\\u0631\\u062a\\u064a\\u0643\\u064a\\u0629\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(324, '{\"en\":\"Gabonese\",\"ar\":\"\\u063a\\u0627\\u0628\\u0648\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(325, '{\"en\":\"Gambian\",\"ar\":\"\\u063a\\u0627\\u0645\\u0628\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(326, '{\"en\":\"Georgian\",\"ar\":\"\\u062c\\u064a\\u0648\\u0631\\u062c\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(327, '{\"en\":\"German\",\"ar\":\"\\u0623\\u0644\\u0645\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(328, '{\"en\":\"Ghanaian\",\"ar\":\"\\u063a\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(329, '{\"en\":\"Gibraltar\",\"ar\":\"\\u062c\\u0628\\u0644 \\u0637\\u0627\\u0631\\u0642\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(330, '{\"en\":\"Guernsian\",\"ar\":\"\\u063a\\u064a\\u0631\\u0646\\u0632\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(331, '{\"en\":\"Greek\",\"ar\":\"\\u064a\\u0648\\u0646\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(332, '{\"en\":\"Greenlandic\",\"ar\":\"\\u062c\\u0631\\u064a\\u0646\\u0644\\u0627\\u0646\\u062f\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(333, '{\"en\":\"Grenadian\",\"ar\":\"\\u063a\\u0631\\u064a\\u0646\\u0627\\u062f\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(334, '{\"en\":\"Guadeloupe\",\"ar\":\"\\u062c\\u0632\\u0631 \\u062c\\u0648\\u0627\\u062f\\u0644\\u0648\\u0628\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(335, '{\"en\":\"Guamanian\",\"ar\":\"\\u062c\\u0648\\u0627\\u0645\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(336, '{\"en\":\"Guatemalan\",\"ar\":\"\\u063a\\u0648\\u0627\\u062a\\u064a\\u0645\\u0627\\u0644\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(337, '{\"en\":\"Guinean\",\"ar\":\"\\u063a\\u064a\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(338, '{\"en\":\"Guinea-Bissauan\",\"ar\":\"\\u063a\\u064a\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(339, '{\"en\":\"Guyanese\",\"ar\":\"\\u063a\\u064a\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(340, '{\"en\":\"Haitian\",\"ar\":\"\\u0647\\u0627\\u064a\\u062a\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(341, '{\"en\":\"Heard and Mc Donald Islanders\",\"ar\":\"\\u062c\\u0632\\u064a\\u0631\\u0629 \\u0647\\u064a\\u0631\\u062f \\u0648\\u062c\\u0632\\u0631 \\u0645\\u0627\\u0643\\u062f\\u0648\\u0646\\u0627\\u0644\\u062f\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(342, '{\"en\":\"Honduran\",\"ar\":\"\\u0647\\u0646\\u062f\\u0648\\u0631\\u0627\\u0633\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(343, '{\"en\":\"Hongkongese\",\"ar\":\"\\u0647\\u0648\\u0646\\u063a \\u0643\\u0648\\u0646\\u063a\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(344, '{\"en\":\"Hungarian\",\"ar\":\"\\u0645\\u062c\\u0631\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(345, '{\"en\":\"Icelandic\",\"ar\":\"\\u0622\\u064a\\u0633\\u0644\\u0646\\u062f\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(346, '{\"en\":\"Indian\",\"ar\":\"\\u0647\\u0646\\u062f\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(347, '{\"en\":\"Manx\",\"ar\":\"\\u0645\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(348, '{\"en\":\"Indonesian\",\"ar\":\"\\u0623\\u0646\\u062f\\u0648\\u0646\\u064a\\u0633\\u064a\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(349, '{\"en\":\"Iranian\",\"ar\":\"\\u0625\\u064a\\u0631\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(350, '{\"en\":\"Iraqi\",\"ar\":\"\\u0639\\u0631\\u0627\\u0642\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(351, '{\"en\":\"Irish\",\"ar\":\"\\u0625\\u064a\\u0631\\u0644\\u0646\\u062f\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(352, '{\"en\":\"Italian\",\"ar\":\"\\u0625\\u064a\\u0637\\u0627\\u0644\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(353, '{\"en\":\"Ivory Coastian\",\"ar\":\"\\u0633\\u0627\\u062d\\u0644 \\u0627\\u0644\\u0639\\u0627\\u062c\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(354, '{\"en\":\"Jersian\",\"ar\":\"\\u062c\\u064a\\u0631\\u0632\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(355, '{\"en\":\"Jamaican\",\"ar\":\"\\u062c\\u0645\\u0627\\u064a\\u0643\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(356, '{\"en\":\"Japanese\",\"ar\":\"\\u064a\\u0627\\u0628\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(357, '{\"en\":\"Jordanian\",\"ar\":\"\\u0623\\u0631\\u062f\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(358, '{\"en\":\"Kazakh\",\"ar\":\"\\u0643\\u0627\\u0632\\u0627\\u062e\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(359, '{\"en\":\"Kenyan\",\"ar\":\"\\u0643\\u064a\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(360, '{\"en\":\"I-Kiribati\",\"ar\":\"\\u0643\\u064a\\u0631\\u064a\\u0628\\u0627\\u062a\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(361, '{\"en\":\"North Korean\",\"ar\":\"\\u0643\\u0648\\u0631\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(362, '{\"en\":\"South Korean\",\"ar\":\"\\u0643\\u0648\\u0631\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(363, '{\"en\":\"Kosovar\",\"ar\":\"\\u0643\\u0648\\u0633\\u064a\\u0641\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(364, '{\"en\":\"Kuwaiti\",\"ar\":\"\\u0643\\u0648\\u064a\\u062a\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(365, '{\"en\":\"Kyrgyzstani\",\"ar\":\"\\u0642\\u064a\\u0631\\u063a\\u064a\\u0632\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(366, '{\"en\":\"Laotian\",\"ar\":\"\\u0644\\u0627\\u0648\\u0633\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(367, '{\"en\":\"Latvian\",\"ar\":\"\\u0644\\u0627\\u062a\\u064a\\u0641\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(368, '{\"en\":\"Lebanese\",\"ar\":\"\\u0644\\u0628\\u0646\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(369, '{\"en\":\"Basotho\",\"ar\":\"\\u0644\\u064a\\u0648\\u0633\\u064a\\u062a\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(370, '{\"en\":\"Liberian\",\"ar\":\"\\u0644\\u064a\\u0628\\u064a\\u0631\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(371, '{\"en\":\"Libyan\",\"ar\":\"\\u0644\\u064a\\u0628\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(372, '{\"en\":\"Liechtenstein\",\"ar\":\"\\u0644\\u064a\\u062e\\u062a\\u0646\\u0634\\u062a\\u064a\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(373, '{\"en\":\"Lithuanian\",\"ar\":\"\\u0644\\u062a\\u0648\\u0627\\u0646\\u064a\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(374, '{\"en\":\"Luxembourger\",\"ar\":\"\\u0644\\u0648\\u0643\\u0633\\u0645\\u0628\\u0648\\u0631\\u063a\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(375, '{\"en\":\"Sri Lankian\",\"ar\":\"\\u0633\\u0631\\u064a\\u0644\\u0627\\u0646\\u0643\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(376, '{\"en\":\"Macanese\",\"ar\":\"\\u0645\\u0627\\u0643\\u0627\\u0648\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(377, '{\"en\":\"Macedonian\",\"ar\":\"\\u0645\\u0642\\u062f\\u0648\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(378, '{\"en\":\"Malagasy\",\"ar\":\"\\u0645\\u062f\\u063a\\u0634\\u0642\\u0631\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(379, '{\"en\":\"Malawian\",\"ar\":\"\\u0645\\u0627\\u0644\\u0627\\u0648\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(380, '{\"en\":\"Malaysian\",\"ar\":\"\\u0645\\u0627\\u0644\\u064a\\u0632\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(381, '{\"en\":\"Maldivian\",\"ar\":\"\\u0645\\u0627\\u0644\\u062f\\u064a\\u0641\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(382, '{\"en\":\"Malian\",\"ar\":\"\\u0645\\u0627\\u0644\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(383, '{\"en\":\"Maltese\",\"ar\":\"\\u0645\\u0627\\u0644\\u0637\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(384, '{\"en\":\"Marshallese\",\"ar\":\"\\u0645\\u0627\\u0631\\u0634\\u0627\\u0644\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(385, '{\"en\":\"Martiniquais\",\"ar\":\"\\u0645\\u0627\\u0631\\u062a\\u064a\\u0646\\u064a\\u0643\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(386, '{\"en\":\"Mauritanian\",\"ar\":\"\\u0645\\u0648\\u0631\\u064a\\u062a\\u0627\\u0646\\u064a\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(387, '{\"en\":\"Mauritian\",\"ar\":\"\\u0645\\u0648\\u0631\\u064a\\u0634\\u064a\\u0648\\u0633\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(388, '{\"en\":\"Mahoran\",\"ar\":\"\\u0645\\u0627\\u064a\\u0648\\u062a\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(389, '{\"en\":\"Mexican\",\"ar\":\"\\u0645\\u0643\\u0633\\u064a\\u0643\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(390, '{\"en\":\"Micronesian\",\"ar\":\"\\u0645\\u0627\\u064a\\u0643\\u0631\\u0648\\u0646\\u064a\\u0632\\u064a\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(391, '{\"en\":\"Moldovan\",\"ar\":\"\\u0645\\u0648\\u0644\\u062f\\u064a\\u0641\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(392, '{\"en\":\"Monacan\",\"ar\":\"\\u0645\\u0648\\u0646\\u064a\\u0643\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(393, '{\"en\":\"Mongolian\",\"ar\":\"\\u0645\\u0646\\u063a\\u0648\\u0644\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(394, '{\"en\":\"Montenegrin\",\"ar\":\"\\u0627\\u0644\\u062c\\u0628\\u0644 \\u0627\\u0644\\u0623\\u0633\\u0648\\u062f\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(395, '{\"en\":\"Montserratian\",\"ar\":\"\\u0645\\u0648\\u0646\\u062a\\u0633\\u064a\\u0631\\u0627\\u062a\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(396, '{\"en\":\"Moroccan\",\"ar\":\"\\u0645\\u063a\\u0631\\u0628\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(397, '{\"en\":\"Mozambican\",\"ar\":\"\\u0645\\u0648\\u0632\\u0645\\u0628\\u064a\\u0642\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(398, '{\"en\":\"Myanmarian\",\"ar\":\"\\u0645\\u064a\\u0627\\u0646\\u0645\\u0627\\u0631\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(399, '{\"en\":\"Namibian\",\"ar\":\"\\u0646\\u0627\\u0645\\u064a\\u0628\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(400, '{\"en\":\"Nauruan\",\"ar\":\"\\u0646\\u0648\\u0631\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(401, '{\"en\":\"Nepalese\",\"ar\":\"\\u0646\\u064a\\u0628\\u0627\\u0644\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(402, '{\"en\":\"Dutch\",\"ar\":\"\\u0647\\u0648\\u0644\\u0646\\u062f\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(403, '{\"en\":\"Dutch Antilier\",\"ar\":\"\\u0647\\u0648\\u0644\\u0646\\u062f\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(404, '{\"en\":\"New Caledonian\",\"ar\":\"\\u0643\\u0627\\u0644\\u064a\\u062f\\u0648\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(405, '{\"en\":\"New Zealander\",\"ar\":\"\\u0646\\u064a\\u0648\\u0632\\u064a\\u0644\\u0646\\u062f\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(406, '{\"en\":\"Nicaraguan\",\"ar\":\"\\u0646\\u064a\\u0643\\u0627\\u0631\\u0627\\u062c\\u0648\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(407, '{\"en\":\"Nigerien\",\"ar\":\"\\u0646\\u064a\\u062c\\u064a\\u0631\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(408, '{\"en\":\"Nigerian\",\"ar\":\"\\u0646\\u064a\\u062c\\u064a\\u0631\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(409, '{\"en\":\"Niuean\",\"ar\":\"\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(410, '{\"en\":\"Norfolk Islander\",\"ar\":\"\\u0646\\u0648\\u0631\\u0641\\u0648\\u0644\\u064a\\u0643\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(411, '{\"en\":\"Northern Marianan\",\"ar\":\"\\u0645\\u0627\\u0631\\u064a\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(412, '{\"en\":\"Norwegian\",\"ar\":\"\\u0646\\u0631\\u0648\\u064a\\u062c\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(413, '{\"en\":\"Omani\",\"ar\":\"\\u0639\\u0645\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(414, '{\"en\":\"Pakistani\",\"ar\":\"\\u0628\\u0627\\u0643\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(415, '{\"en\":\"Palauan\",\"ar\":\"\\u0628\\u0627\\u0644\\u0627\\u0648\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(416, '{\"en\":\"Palestinian\",\"ar\":\"\\u0641\\u0644\\u0633\\u0637\\u064a\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(417, '{\"en\":\"Panamanian\",\"ar\":\"\\u0628\\u0646\\u0645\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(418, '{\"en\":\"Papua New Guinean\",\"ar\":\"\\u0628\\u0627\\u0628\\u0648\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(419, '{\"en\":\"Paraguayan\",\"ar\":\"\\u0628\\u0627\\u0631\\u063a\\u0627\\u0648\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(420, '{\"en\":\"Peruvian\",\"ar\":\"\\u0628\\u064a\\u0631\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(421, '{\"en\":\"Filipino\",\"ar\":\"\\u0641\\u0644\\u0628\\u064a\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(422, '{\"en\":\"Pitcairn Islander\",\"ar\":\"\\u0628\\u064a\\u062a\\u0643\\u064a\\u0631\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(423, '{\"en\":\"Polish\",\"ar\":\"\\u0628\\u0648\\u0644\\u064a\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(424, '{\"en\":\"Portuguese\",\"ar\":\"\\u0628\\u0631\\u062a\\u063a\\u0627\\u0644\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(425, '{\"en\":\"Puerto Rican\",\"ar\":\"\\u0628\\u0648\\u0631\\u062a\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(426, '{\"en\":\"Qatari\",\"ar\":\"\\u0642\\u0637\\u0631\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(427, '{\"en\":\"Reunionese\",\"ar\":\"\\u0631\\u064a\\u0648\\u0646\\u064a\\u0648\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(428, '{\"en\":\"Romanian\",\"ar\":\"\\u0631\\u0648\\u0645\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(429, '{\"en\":\"Russian\",\"ar\":\"\\u0631\\u0648\\u0633\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(430, '{\"en\":\"Rwandan\",\"ar\":\"\\u0631\\u0648\\u0627\\u0646\\u062f\\u0627\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(431, '{\"ar\":\"Kittitian\\/Nevisian\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(432, '{\"en\":\"St. Martian(French)\",\"ar\":\"\\u0633\\u0627\\u064a\\u0646\\u062a \\u0645\\u0627\\u0631\\u062a\\u0646\\u064a \\u0641\\u0631\\u0646\\u0633\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(433, '{\"en\":\"St. Martian(Dutch)\",\"ar\":\"\\u0633\\u0627\\u064a\\u0646\\u062a \\u0645\\u0627\\u0631\\u062a\\u0646\\u064a \\u0647\\u0648\\u0644\\u0646\\u062f\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(434, '{\"en\":\"St. Pierre and Miquelon\",\"ar\":\"\\u0633\\u0627\\u0646 \\u0628\\u064a\\u064a\\u0631 \\u0648\\u0645\\u064a\\u0643\\u0644\\u0648\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(435, '{\"en\":\"Saint Vincent and the Grenadines\",\"ar\":\"\\u0633\\u0627\\u0646\\u062a \\u0641\\u0646\\u0633\\u0646\\u062a \\u0648\\u062c\\u0632\\u0631 \\u063a\\u0631\\u064a\\u0646\\u0627\\u062f\\u064a\\u0646\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(436, '{\"en\":\"Samoan\",\"ar\":\"\\u0633\\u0627\\u0645\\u0648\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(437, '{\"en\":\"Sammarinese\",\"ar\":\"\\u0645\\u0627\\u0631\\u064a\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(438, '{\"en\":\"Sao Tomean\",\"ar\":\"\\u0633\\u0627\\u0648 \\u062a\\u0648\\u0645\\u064a \\u0648\\u0628\\u0631\\u064a\\u0646\\u0633\\u064a\\u0628\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(439, '{\"en\":\"Saudi Arabian\",\"ar\":\"\\u0633\\u0639\\u0648\\u062f\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(440, '{\"en\":\"Senegalese\",\"ar\":\"\\u0633\\u0646\\u063a\\u0627\\u0644\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(441, '{\"en\":\"Serbian\",\"ar\":\"\\u0635\\u0631\\u0628\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(442, '{\"en\":\"Seychellois\",\"ar\":\"\\u0633\\u064a\\u0634\\u064a\\u0644\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(443, '{\"en\":\"Sierra Leonean\",\"ar\":\"\\u0633\\u064a\\u0631\\u0627\\u0644\\u064a\\u0648\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(444, '{\"en\":\"Singaporean\",\"ar\":\"\\u0633\\u0646\\u063a\\u0627\\u0641\\u0648\\u0631\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(445, '{\"en\":\"Slovak\",\"ar\":\"\\u0633\\u0648\\u0644\\u0641\\u0627\\u0643\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(446, '{\"en\":\"Slovenian\",\"ar\":\"\\u0633\\u0648\\u0644\\u0641\\u064a\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(447, '{\"en\":\"Solomon Island\",\"ar\":\"\\u062c\\u0632\\u0631 \\u0633\\u0644\\u064a\\u0645\\u0627\\u0646\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(448, '{\"en\":\"Somali\",\"ar\":\"\\u0635\\u0648\\u0645\\u0627\\u0644\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(449, '{\"en\":\"South African\",\"ar\":\"\\u0623\\u0641\\u0631\\u064a\\u0642\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(450, '{\"en\":\"South Georgia and the South Sandwich\",\"ar\":\"\\u0644\\u0645\\u0646\\u0637\\u0642\\u0629 \\u0627\\u0644\\u0642\\u0637\\u0628\\u064a\\u0629 \\u0627\\u0644\\u062c\\u0646\\u0648\\u0628\\u064a\\u0629\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(451, '{\"en\":\"South Sudanese\",\"ar\":\"\\u0633\\u0648\\u0627\\u062f\\u0646\\u064a \\u062c\\u0646\\u0648\\u0628\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(452, '{\"en\":\"Spanish\",\"ar\":\"\\u0625\\u0633\\u0628\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(453, '{\"en\":\"St. Helenian\",\"ar\":\"\\u0647\\u064a\\u0644\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(454, '{\"en\":\"Sudanese\",\"ar\":\"\\u0633\\u0648\\u062f\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(455, '{\"en\":\"Surinamese\",\"ar\":\"\\u0633\\u0648\\u0631\\u064a\\u0646\\u0627\\u0645\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(456, '{\"en\":\"Svalbardian\\/Jan Mayenian\",\"ar\":\"\\u0633\\u0641\\u0627\\u0644\\u0628\\u0627\\u0631\\u062f \\u0648\\u064a\\u0627\\u0646 \\u0645\\u0627\\u064a\\u0646\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(457, '{\"en\":\"Swazi\",\"ar\":\"\\u0633\\u0648\\u0627\\u0632\\u064a\\u0644\\u0646\\u062f\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(458, '{\"en\":\"Swedish\",\"ar\":\"\\u0633\\u0648\\u064a\\u062f\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(459, '{\"en\":\"Swiss\",\"ar\":\"\\u0633\\u0648\\u064a\\u0633\\u0631\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(460, '{\"en\":\"Syrian\",\"ar\":\"\\u0633\\u0648\\u0631\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(461, '{\"en\":\"Taiwanese\",\"ar\":\"\\u062a\\u0627\\u064a\\u0648\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(462, '{\"en\":\"Tajikistani\",\"ar\":\"\\u0637\\u0627\\u062c\\u064a\\u0643\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(463, '{\"en\":\"Tanzanian\",\"ar\":\"\\u062a\\u0646\\u0632\\u0627\\u0646\\u064a\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(464, '{\"en\":\"Thai\",\"ar\":\"\\u062a\\u0627\\u064a\\u0644\\u0646\\u062f\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(465, '{\"en\":\"Timor-Lestian\",\"ar\":\"\\u062a\\u064a\\u0645\\u0648\\u0631\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(466, '{\"en\":\"Togolese\",\"ar\":\"\\u062a\\u0648\\u063a\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(467, '{\"en\":\"Tokelaian\",\"ar\":\"\\u062a\\u0648\\u0643\\u064a\\u0644\\u0627\\u0648\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(468, '{\"en\":\"Tongan\",\"ar\":\"\\u062a\\u0648\\u0646\\u063a\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(469, '{\"en\":\"Trinidadian\\/Tobagonian\",\"ar\":\"\\u062a\\u0631\\u064a\\u0646\\u064a\\u062f\\u0627\\u062f \\u0648\\u062a\\u0648\\u0628\\u0627\\u063a\\u0648\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(470, '{\"en\":\"Tunisian\",\"ar\":\"\\u062a\\u0648\\u0646\\u0633\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(471, '{\"en\":\"Turkish\",\"ar\":\"\\u062a\\u0631\\u0643\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(472, '{\"en\":\"Turkmen\",\"ar\":\"\\u062a\\u0631\\u0643\\u0645\\u0627\\u0646\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(473, '{\"en\":\"Turks and Caicos Islands\",\"ar\":\"\\u062c\\u0632\\u0631 \\u062a\\u0648\\u0631\\u0643\\u0633 \\u0648\\u0643\\u0627\\u064a\\u0643\\u0648\\u0633\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(474, '{\"en\":\"Tuvaluan\",\"ar\":\"\\u062a\\u0648\\u0641\\u0627\\u0644\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(475, '{\"en\":\"Ugandan\",\"ar\":\"\\u0623\\u0648\\u063a\\u0646\\u062f\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(476, '{\"en\":\"Ukrainian\",\"ar\":\"\\u0623\\u0648\\u0643\\u0631\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(477, '{\"en\":\"Emirati\",\"ar\":\"\\u0625\\u0645\\u0627\\u0631\\u0627\\u062a\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(478, '{\"en\":\"British\",\"ar\":\"\\u0628\\u0631\\u064a\\u0637\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(479, '{\"en\":\"American\",\"ar\":\"\\u0623\\u0645\\u0631\\u064a\\u0643\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(480, '{\"en\":\"US Minor Outlying Islander\",\"ar\":\"\\u0623\\u0645\\u0631\\u064a\\u0643\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(481, '{\"en\":\"Uruguayan\",\"ar\":\"\\u0623\\u0648\\u0631\\u063a\\u0648\\u0627\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(482, '{\"en\":\"Uzbek\",\"ar\":\"\\u0623\\u0648\\u0632\\u0628\\u0627\\u0643\\u0633\\u062a\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(483, '{\"en\":\"Vanuatuan\",\"ar\":\"\\u0641\\u0627\\u0646\\u0648\\u0627\\u062a\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(484, '{\"en\":\"Venezuelan\",\"ar\":\"\\u0641\\u0646\\u0632\\u0648\\u064a\\u0644\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(485, '{\"en\":\"Vietnamese\",\"ar\":\"\\u0641\\u064a\\u062a\\u0646\\u0627\\u0645\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(486, '{\"en\":\"American Virgin Islander\",\"ar\":\"\\u0623\\u0645\\u0631\\u064a\\u0643\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(487, '{\"en\":\"Vatican\",\"ar\":\"\\u0641\\u0627\\u062a\\u064a\\u0643\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(488, '{\"en\":\"Wallisian\\/Futunan\",\"ar\":\"\\u0641\\u0648\\u062a\\u0648\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(489, '{\"en\":\"Sahrawian\",\"ar\":\"\\u0635\\u062d\\u0631\\u0627\\u0648\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(490, '{\"en\":\"Yemeni\",\"ar\":\"\\u064a\\u0645\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(491, '{\"en\":\"Zambian\",\"ar\":\"\\u0632\\u0627\\u0645\\u0628\\u064a\\u0627\\u0646\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(492, '{\"en\":\"Zimbabwean\",\"ar\":\"\\u0632\\u0645\\u0628\\u0627\\u0628\\u0648\\u064a\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09');

-- --------------------------------------------------------

--
-- Table structure for table `parent_attachments`
--

CREATE TABLE `parent_attachments` (
  `id` int(10) UNSIGNED NOT NULL,
  `file_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `payments_students`
--

CREATE TABLE `payments_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `payments_students`
--

INSERT INTO `payments_students` (`id`, `date`, `student_id`, `amount`, `notes`, `created_at`, `updated_at`) VALUES
(2, '2021-12-19', 1, '2500.00', 'المبلغ المسترجع للطالب لعدم استخدامه للباص', '2021-12-19 14:22:47', '2021-12-19 14:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `processing_fees`
--

CREATE TABLE `processing_fees` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `amount` decimal(8,2) DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `processing_fees`
--

INSERT INTO `processing_fees` (`id`, `date`, `student_id`, `amount`, `notes`, `created_at`, `updated_at`) VALUES
(1, '2021-12-19', 1, '2500.00', 'استبعاد رسوم الباص للترم الثاني لعدم استخدامه من جهه الطالب', '2021-12-19 13:45:51', '2021-12-19 13:45:51');

-- --------------------------------------------------------

--
-- Table structure for table `promotions`
--

CREATE TABLE `promotions` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `from_grade_id` int(10) UNSIGNED NOT NULL,
  `from_chapter_id` int(10) UNSIGNED NOT NULL,
  `from_section_id` int(10) UNSIGNED NOT NULL,
  `to_grade_id` int(10) UNSIGNED NOT NULL,
  `to_chapter_id` int(10) UNSIGNED NOT NULL,
  `to_section_id` int(10) UNSIGNED NOT NULL,
  `academic_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `academic_year_new` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

CREATE TABLE `questions` (
  `id` int(10) UNSIGNED NOT NULL,
  `title` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `answers` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `right_answer` varchar(500) COLLATE utf8mb4_unicode_ci NOT NULL,
  `score` int(11) NOT NULL,
  `exam_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `receipt_students`
--

CREATE TABLE `receipt_students` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `debit` decimal(8,2) DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `receipt_students`
--

INSERT INTO `receipt_students` (`id`, `date`, `student_id`, `debit`, `notes`, `created_at`, `updated_at`) VALUES
(2, '2021-12-19', 1, '12000.00', 'دفعه اولي رسوم التسجيل وجزء من رسوم الباص والرسوم للترم الاول', '2021-12-19 13:44:33', '2021-12-19 13:44:33');

-- --------------------------------------------------------

--
-- Table structure for table `religions`
--

CREATE TABLE `religions` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `religions`
--

INSERT INTO `religions` (`id`, `name`, `created_at`, `updated_at`) VALUES
(4, '{\"ar\":\"\\u0645\\u0633\\u0644\\u0645\",\"en\":\"Muslim\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(5, '{\"ar\":\"\\u0645\\u0633\\u064a\\u062d\\u064a\",\"en\":\"Christian\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09'),
(6, '{\"ar\":\"\\u063a\\u064a\\u0631 \\u0630\\u0644\\u0643\",\"en\":\"Other\"}', '2021-11-24 22:41:09', '2021-11-24 22:41:09');

-- --------------------------------------------------------

--
-- Table structure for table `sections`
--

CREATE TABLE `sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `section_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL,
  `grade_id` int(10) UNSIGNED NOT NULL,
  `chapter_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sections`
--

INSERT INTO `sections` (`id`, `section_name`, `status`, `grade_id`, `chapter_id`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0623 - 1- \\u062d\\u0636\\u0627\\u0646\\u0647\",\"en\":\"A - 1 - kinder\"}', 1, 1, 1, '2021-11-29 20:55:12', '2021-12-13 19:09:50'),
(2, '{\"ar\":\"\\u0628 - 1 - \\u062d\\u0636\\u0627\\u0646\\u0647\",\"en\":\"B - 1 - kinder\"}', 1, 1, 1, '2021-11-29 20:55:41', '2021-12-13 19:10:14'),
(3, '{\"ar\":\"\\u0623 - 2 - \\u062d\\u0636\\u0627\\u0646\\u0647\",\"en\":\"A - 2 - kinder\"}', 1, 1, 2, '2021-11-29 20:56:24', '2021-12-13 19:10:29'),
(4, '{\"ar\":\"\\u0628 - 2 - \\u062d\\u0636\\u0627\\u0646\\u0647\",\"en\":\"B - 2 - kinder\"}', 1, 1, 2, '2021-11-29 20:56:45', '2021-12-13 19:11:01'),
(5, '{\"ar\":\"\\u0623 - 1- \\u0627\\u0628\\u062a\\u062f\\u0627\\u0626\\u064a\",\"en\":\"A - 1 - primary\"}', 1, 2, 4, '2021-11-29 20:58:21', '2021-12-13 19:11:34'),
(6, '{\"ar\":\"\\u0623 - 1- \\u0627\\u0639\\u062f\\u0627\\u062f\\u064a\",\"en\":\"A - 1 - preparatory\"}', 1, 3, 10, '2021-11-29 20:59:32', '2021-12-13 19:12:06'),
(7, '{\"ar\":\"\\u0628 - 1 - \\u0627\\u0639\\u062f\\u0627\\u062f\\u064a\",\"en\":\"B - 1 - preparatory\"}', 1, 3, 10, '2021-11-29 21:00:22', '2021-12-13 19:12:32'),
(8, '{\"ar\":\"\\u0627 - 1 - \\u062b\\u0627\\u0646\\u0648\\u064a\",\"en\":\"A - 1 - scandary\"}', 1, 4, 13, '2021-12-13 19:13:30', '2021-12-13 19:13:30'),
(9, '{\"ar\":\"\\u0627 - 3 - \\u062d\\u0636\\u0627\\u0646\\u0647\",\"en\":\"A - 3 - kinder\"}', 1, 1, 3, '2021-12-14 12:16:02', '2021-12-14 12:16:02'),
(10, '{\"ar\":\"\\u0628 - 3 - \\u062d\\u0636\\u0627\\u0646\\u0647\",\"en\":\"B - 3 - kinder\"}', 1, 1, 3, '2021-12-14 12:16:25', '2021-12-14 12:16:25'),
(11, '{\"ar\":\"\\u0628 - 1- \\u0627\\u0628\\u062a\\u062f\\u0627\\u0626\\u064a\",\"en\":\"B - 1 - primary\"}', 1, 2, 4, '2021-12-14 12:17:29', '2021-12-14 12:17:29'),
(12, '{\"ar\":\"\\u0627 - 6 - \\u0627\\u0628\\u062a\\u062f\\u0627\\u0626\\u064a\",\"en\":\"A - 6 - primary\"}', 1, 2, 9, '2021-12-14 12:18:31', '2021-12-14 12:18:31'),
(13, '{\"ar\":\"\\u0628 - 6 - \\u0627\\u0628\\u062a\\u062f\\u0627\\u0626\\u064a\",\"en\":\"B - 6 - primary\"}', 1, 2, 9, '2021-12-14 12:18:57', '2021-12-14 12:18:57'),
(14, '{\"ar\":\"\\u0627 - 2 - \\u062b\\u0627\\u0646\\u0648\\u064a\",\"en\":\"A - 2 - scandary\"}', 1, 4, 14, '2021-12-14 12:19:39', '2021-12-14 12:21:10'),
(15, '{\"ar\":\"\\u0627 - 3 - \\u062b\\u0627\\u0646\\u0648\\u064a\",\"en\":\"A - 3 - scandary\"}', 1, 4, 15, '2021-12-14 12:20:07', '2021-12-14 12:21:20'),
(16, '{\"ar\":\"\\u0627 - 2 - \\u0627\\u0639\\u062f\\u0627\\u062f\\u064a\",\"en\":\"A - 2 - scandary\"}', 2, 3, 11, '2021-12-20 20:28:12', '2021-12-20 20:28:12');

-- --------------------------------------------------------

--
-- Table structure for table `specializations`
--

CREATE TABLE `specializations` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `specializations`
--

INSERT INTO `specializations` (`id`, `name`, `created_at`, `updated_at`) VALUES
(6, '{\"ar\":\"\\u0644\\u063a\\u0647 \\u0639\\u0631\\u0628\\u064a\\u0647\",\"en\":\"arabic language\"}', '2021-11-27 21:13:45', '2021-12-20 20:37:35'),
(7, '{\"ar\":\"\\u0639\\u0644\\u0648\\u0645\",\"en\":\"Science\"}', '2021-11-27 21:13:45', '2021-11-27 21:13:45'),
(8, '{\"ar\":\"\\u062d\\u0627\\u0633\\u0628 \\u0627\\u0644\\u064a\",\"en\":\"Computer\"}', '2021-11-27 21:13:45', '2021-11-27 21:13:45'),
(9, '{\"ar\":\"\\u0644\\u063a\\u0647 \\u0627\\u0646\\u062c\\u0644\\u064a\\u0632\\u064a\\u0647\",\"en\":\"english language\"}', '2021-11-27 21:13:45', '2021-12-20 20:38:12'),
(10, '{\"ar\":\"\\u0631\\u064a\\u0627\\u0636\\u064a\\u0627\\u062a\",\"en\":\"Math\"}', '2021-11-27 21:13:45', '2021-11-27 21:13:45');

-- --------------------------------------------------------

--
-- Table structure for table `students`
--

CREATE TABLE `students` (
  `id` int(10) UNSIGNED NOT NULL,
  `student_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `student_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `gender_id` int(10) UNSIGNED NOT NULL,
  `nationality_id` int(10) UNSIGNED NOT NULL,
  `blood_id` int(10) UNSIGNED NOT NULL,
  `parent_id` int(10) UNSIGNED NOT NULL,
  `date_of_birth` date NOT NULL,
  `grade_id` int(10) UNSIGNED NOT NULL,
  `chapter_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL,
  `joining_at` date NOT NULL,
  `academic_year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `students`
--

INSERT INTO `students` (`id`, `student_name`, `student_email`, `password`, `gender_id`, `nationality_id`, `blood_id`, `parent_id`, `date_of_birth`, `grade_id`, `chapter_id`, `section_id`, `joining_at`, `academic_year`, `deleted_at`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0645\\u062d\\u0645\\u062f\",\"en\":\"mohamed\"}', 'medo@yahoo.com', '$2y$10$zt8WvW6BdYtD2bOofv.tZO5uYjTQh4Dc0qa/pLJNiVRo4FsjAMflq', 1, 310, 17, 1, '2000-11-01', 2, 9, 12, '2018-12-31', '2022', NULL, '2021-12-12 22:10:12', '2021-12-17 14:23:54'),
(3, '{\"ar\":\"\\u0639\\u0645\\u0627\\u062f\",\"en\":\"emad\"}', 'emad@yahoo.com', '$2y$10$kV6wtVdMEwZCdV70YWeNM.SUGfiruxMP1PgrylVdx/PnENuuPfvLG', 1, 310, 22, 3, '2009-12-26', 3, 10, 6, '2019-12-20', '2021', NULL, '2021-12-12 22:13:40', '2021-12-17 14:23:54'),
(4, '{\"ar\":\"\\u0627\\u0633\\u0645\\u0627\\u0621\",\"en\":\"asmaa\"}', 'asmaa10@yahoo.com', '$2y$10$TN.3UBBU.qOro8KMHsACdeiUUClsjdbutriqCFh.Vu1/z81SlOhXS', 2, 310, 23, 2, '2006-08-31', 4, 13, 8, '2018-09-28', '2021', NULL, '2021-12-12 22:14:35', '2021-12-17 14:23:54'),
(5, '{\"ar\":\"\\u062e\\u0627\\u0644\\u062f\",\"en\":\"khaled\"}', 'khaled20@yahoo.com', '$2y$10$X72.NgYgb8.SX4f/4Rwvm.BG9oHJrHPowF4aOemOl5HaGrcuE16te', 1, 310, 20, 3, '2008-12-31', 2, 9, 12, '2016-12-31', '2022', NULL, '2021-12-16 08:55:59', '2021-12-17 14:23:54'),
(6, '{\"ar\":\"\\u0633\\u0644\\u0645\\u064a \\u0627\\u062d\\u0645\\u062f\",\"en\":\"salma ahmed\"}', 'salmaahmed10@yahoo.com', '$2y$10$oQxjb3Q0xbrhkrzz3rvxX.dwbA7Dtcpc26CUMORIzybcTseXyQih.', 2, 310, 20, 1, '2000-12-31', 2, 9, 12, '2019-12-31', '2021', NULL, '2021-12-20 19:56:58', '2021-12-20 19:56:58');

-- --------------------------------------------------------

--
-- Table structure for table `student_accounts`
--

CREATE TABLE `student_accounts` (
  `id` int(10) UNSIGNED NOT NULL,
  `date` date NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fees_invoice_id` int(10) UNSIGNED DEFAULT NULL,
  `receipt_student_id` int(10) UNSIGNED DEFAULT NULL,
  `processing_fee_id` int(10) UNSIGNED DEFAULT NULL,
  `payment_student_id` int(10) UNSIGNED DEFAULT NULL,
  `student_id` int(10) UNSIGNED NOT NULL,
  `debit` decimal(8,2) DEFAULT NULL,
  `credit` decimal(8,2) DEFAULT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `student_accounts`
--

INSERT INTO `student_accounts` (`id`, `date`, `type`, `fees_invoice_id`, `receipt_student_id`, `processing_fee_id`, `payment_student_id`, `student_id`, `debit`, `credit`, `notes`, `created_at`, `updated_at`) VALUES
(1, '2021-12-19', 'invoice', 1, NULL, NULL, NULL, 1, '10000.00', '0.00', 'مصاريف العام الدراسي', '2021-12-19 13:40:12', '2021-12-19 13:40:12'),
(2, '2021-12-19', 'invoice', 2, NULL, NULL, NULL, 1, '5000.00', '0.00', 'مصاريف الباص السنويه', '2021-12-19 13:40:12', '2021-12-19 13:40:12'),
(3, '2021-12-19', 'invoice', 3, NULL, NULL, NULL, 1, '8000.00', '0.00', 'رسوم تسجيل اول مره', '2021-12-19 13:40:12', '2021-12-19 13:40:12'),
(4, '2021-12-19', 'receipt', NULL, 2, NULL, NULL, 1, '0.00', '12000.00', 'دفعه اولي رسوم التسجيل وجزء من رسوم الباص والرسوم للترم الاول', '2021-12-19 13:44:33', '2021-12-19 13:44:33'),
(5, '2021-12-19', 'processing', NULL, NULL, 1, NULL, 1, '0.00', '2500.00', 'استبعاد رسوم الباص للترم الثاني لعدم استخدامه من جهه الطالب', '2021-12-19 13:45:51', '2021-12-19 13:45:51'),
(7, '2021-12-19', 'payment', NULL, NULL, NULL, 2, 1, '2500.00', '0.00', 'المبلغ المسترجع للطالب لعدم استخدامه للباص', '2021-12-19 14:22:47', '2021-12-19 14:22:47');

-- --------------------------------------------------------

--
-- Table structure for table `study_fees`
--

CREATE TABLE `study_fees` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `amount` decimal(8,2) NOT NULL,
  `grade_id` int(10) UNSIGNED NOT NULL,
  `chapter_id` int(10) UNSIGNED NOT NULL,
  `year` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `fee_type` int(11) NOT NULL,
  `notes` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `study_fees`
--

INSERT INTO `study_fees` (`id`, `name`, `amount`, `grade_id`, `chapter_id`, `year`, `fee_type`, `notes`, `created_at`, `updated_at`) VALUES
(3, '{\"ar\":\"\\u0645\\u0635\\u0631\\u0648\\u0641\\u0627\\u062a \\u062f\\u0631\\u0627\\u0633\\u064a\\u0647\",\"en\":\"study fees\"}', '10000.00', 2, 9, '2021', 1, 'رسوم الدراسه السنويه', '2021-12-16 15:47:46', '2021-12-17 18:35:06'),
(5, '{\"ar\":\"\\u0645\\u0635\\u0631\\u0648\\u0641\\u0627\\u062a \\u062f\\u0631\\u0627\\u0633\\u064a\\u0647\",\"en\":\"study fees\"}', '10500.00', 2, 5, '2021', 1, 'رسوم الدراسه السنويه', '2021-12-16 16:20:45', '2021-12-17 15:58:38'),
(6, '{\"ar\":\"\\u0631\\u0633\\u0648\\u0645 \\u0627\\u0644\\u062a\\u0646\\u0642\\u0644 \\u062e\\u0637\\u064a\\u0646\",\"en\":\"transport fee two way\"}', '5000.00', 2, 9, '2021', 2, 'رسوم التنقل اتجاهين', '2021-12-17 15:06:02', '2021-12-17 18:35:27'),
(7, '{\"ar\":\"\\u0631\\u0633\\u0648\\u0645 \\u062a\\u0633\\u062c\\u064a\\u0644\",\"en\":\"registration fees\"}', '8000.00', 2, 9, '2021', 4, 'رسوم تسجيل الطالب اول مره', '2021-12-17 16:03:17', '2021-12-17 18:35:43');

-- --------------------------------------------------------

--
-- Table structure for table `subjects`
--

CREATE TABLE `subjects` (
  `id` int(10) UNSIGNED NOT NULL,
  `subject_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `grade_id` int(10) UNSIGNED NOT NULL,
  `chapter_id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `subjects`
--

INSERT INTO `subjects` (`id`, `subject_name`, `grade_id`, `chapter_id`, `teacher_id`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u0639\\u0631\\u0628\\u064a\",\"en\":\"arbic\"}', 2, 4, 1, '2021-12-20 22:04:47', '2021-12-20 22:04:47'),
(2, '{\"ar\":\"\\u0627\\u0646\\u062c\\u0644\\u064a\\u0632\\u064a\",\"en\":\"english\"}', 2, 4, 3, '2021-12-20 22:05:33', '2021-12-20 22:17:05');

-- --------------------------------------------------------

--
-- Table structure for table `teachers`
--

CREATE TABLE `teachers` (
  `id` int(10) UNSIGNED NOT NULL,
  `teacher_name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `teacher_address` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `specialization_id` int(10) UNSIGNED NOT NULL,
  `gender_id` int(10) UNSIGNED NOT NULL,
  `joining_at` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers`
--

INSERT INTO `teachers` (`id`, `teacher_name`, `teacher_email`, `password`, `teacher_address`, `specialization_id`, `gender_id`, `joining_at`, `created_at`, `updated_at`) VALUES
(1, '{\"ar\":\"\\u062d\\u0627\\u0645\\u062f \\u0639\\u0644\\u064a \\u0645\\u062d\\u0645\\u062f\",\"en\":\"hamed ali mohamed\"}', 'hamed2020@yahoo.com', '$2y$10$JKLab5WNHUcl77yA.U81.e0pM8OpWjdDki2y4C2ULr8VQ0L1d1uDm', 'القاهره', 6, 1, '2009-12-31', '2021-11-29 20:48:50', '2021-11-29 20:48:50'),
(2, '{\"ar\":\"\\u0633\\u0627\\u0631\\u0647 \\u0627\\u0644\\u0633\\u064a\\u062f \\u062d\\u0633\\u0646\",\"en\":\"sara elsyed hasan\"}', 'sara@yahoo.com', '$2y$10$smpN3nZHcJflLG.tBATAf.5upaufgEidGYsIc/nR/NtIQkurwN0Wi', 'المنصوره', 7, 2, '2015-12-31', '2021-11-29 20:49:31', '2021-11-29 20:49:31'),
(3, '{\"ar\":\"\\u0627\\u062d\\u0645\\u062f \\u0639\\u0645\\u0627\\u062f \\u0639\\u0628\\u062f\\u0647\",\"en\":\"ahmed emad abdo\"}', 'ahmed20@yahoo.com', '$2y$10$F6278v1fcHXCKF61mH/0Cuax.5EwD3H8/kggN74o6GPi1oYXB9dMK', '6 اكتوبر', 9, 1, '2017-12-31', '2021-11-29 20:50:14', '2021-11-29 20:50:14'),
(4, '{\"ar\":\"\\u062e\\u0627\\u0644\\u062f \\u0627\\u0644\\u0633\\u064a\\u062f \\u062d\\u0633\\u064a\\u0646\",\"en\":\"khaled elsyed hussen\"}', 'khaled20@yahoo.com', '$2y$10$lEZ/J0PvUnrB/tXJ9NwvzONQR.H2qJvTrTb1sRDP9ZQKy63HOgn2i', 'القاهره', 8, 1, '2014-12-31', '2021-11-29 20:51:27', '2021-11-29 20:51:27'),
(5, '{\"ar\":\"\\u0639\\u0628\\u062f\\u0627\\u0644\\u0631\\u062d\\u0645\\u0646 \\u0645\\u062d\\u0645\\u062f \\u0627\\u062d\\u0645\\u062f\",\"en\":\"abdoulrhman mohamed ahmed\"}', 'abdo2020@yahoo.com', '$2y$10$HO.lI89b0l5JiPulOK5Z/OBuB8Q6NCY5nNJdzqJYXUv7a/j3DeGOS', 'السيده زينب', 10, 1, '2018-12-31', '2021-11-29 20:52:22', '2021-11-29 20:52:22'),
(6, '{\"ar\":\"\\u064a\\u0633\\u0631\\u0627 \\u0645\\u062d\\u0645\\u062f \\u0627\\u0644\\u0633\\u064a\\u062f\",\"en\":\"yousra mohamed elsyed\"}', 'yousra@yahoo.com', '$2y$10$rKvD0Q/Q4A.tEUIjpmKddOHXgy8oUIU1.BVzi3DlGf4P4pw5YyVTa', 'القاهره', 9, 2, '2017-12-31', '2021-11-29 20:53:20', '2021-11-29 20:53:20');

-- --------------------------------------------------------

--
-- Table structure for table `teachers_sections`
--

CREATE TABLE `teachers_sections` (
  `id` int(10) UNSIGNED NOT NULL,
  `teacher_id` int(10) UNSIGNED NOT NULL,
  `section_id` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `teachers_sections`
--

INSERT INTO `teachers_sections` (`id`, `teacher_id`, `section_id`) VALUES
(1, 1, 1),
(2, 6, 1),
(3, 1, 2),
(4, 6, 2),
(5, 1, 3),
(6, 3, 3),
(7, 1, 4),
(8, 3, 4),
(9, 5, 4),
(10, 1, 5),
(11, 2, 5),
(12, 3, 5),
(13, 5, 5),
(14, 1, 6),
(15, 2, 6),
(16, 3, 6),
(17, 4, 6),
(18, 5, 6),
(19, 1, 7),
(20, 2, 7),
(21, 4, 7),
(22, 5, 7),
(23, 6, 7),
(24, 1, 8),
(25, 2, 8),
(26, 3, 8),
(27, 4, 8),
(28, 5, 8),
(29, 6, 8),
(30, 1, 9),
(31, 2, 9),
(32, 1, 10),
(33, 2, 10),
(34, 5, 10),
(35, 2, 11),
(36, 4, 11),
(37, 5, 11),
(38, 1, 12),
(39, 2, 12),
(40, 3, 12),
(41, 4, 12),
(42, 5, 12),
(43, 1, 13),
(44, 2, 13),
(45, 3, 13),
(46, 4, 13),
(47, 5, 13),
(48, 1, 14),
(49, 2, 14),
(50, 3, 14),
(51, 4, 14),
(52, 5, 14),
(53, 1, 15),
(54, 2, 15),
(55, 4, 15),
(56, 5, 15);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'm7md elfert', 'medo@yahoo.com', NULL, '$2y$10$ED8MYw/LRQZEJyAZQbArZu1iplyab1sAm8HzkWS.OpcJYbh8RMR4m', NULL, '2021-11-24 20:05:38', '2021-11-24 20:05:38');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `attendances`
--
ALTER TABLE `attendances`
  ADD PRIMARY KEY (`id`),
  ADD KEY `attendances_student_id_foreign` (`student_id`),
  ADD KEY `attendances_grade_id_foreign` (`grade_id`),
  ADD KEY `attendances_chapter_id_foreign` (`chapter_id`),
  ADD KEY `attendances_section_id_foreign` (`section_id`),
  ADD KEY `attendances_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `bloods`
--
ALTER TABLE `bloods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `chapters`
--
ALTER TABLE `chapters`
  ADD PRIMARY KEY (`id`),
  ADD KEY `chapters_grade_id_foreign` (`grade_id`);

--
-- Indexes for table `exams`
--
ALTER TABLE `exams`
  ADD PRIMARY KEY (`id`),
  ADD KEY `exams_subject_id_foreign` (`subject_id`),
  ADD KEY `exams_grade_id_foreign` (`grade_id`),
  ADD KEY `exams_chapter_id_foreign` (`chapter_id`),
  ADD KEY `exams_section_id_foreign` (`section_id`),
  ADD KEY `exams_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fees_invoices`
--
ALTER TABLE `fees_invoices`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fees_invoices_student_id_foreign` (`student_id`),
  ADD KEY `fees_invoices_grade_id_foreign` (`grade_id`),
  ADD KEY `fees_invoices_chapter_id_foreign` (`chapter_id`),
  ADD KEY `fees_invoices_fee_id_foreign` (`fee_id`);

--
-- Indexes for table `fund_accounts`
--
ALTER TABLE `fund_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fund_accounts_receipt_id_foreign` (`receipt_id`),
  ADD KEY `fund_accounts_payment_id_foreign` (`payment_id`);

--
-- Indexes for table `genders`
--
ALTER TABLE `genders`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `grades`
--
ALTER TABLE `grades`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `grades_name_unique` (`name`);

--
-- Indexes for table `images`
--
ALTER TABLE `images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `my_parents`
--
ALTER TABLE `my_parents`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `my_parents_email_unique` (`email`),
  ADD UNIQUE KEY `my_parents_father_name_unique` (`father_name`),
  ADD UNIQUE KEY `my_parents_mother_name_unique` (`mother_name`),
  ADD UNIQUE KEY `father_phone` (`father_phone`),
  ADD UNIQUE KEY `father_id` (`father_id`),
  ADD UNIQUE KEY `father_passport` (`father_passport`),
  ADD UNIQUE KEY `mother_phone` (`mother_phone`),
  ADD UNIQUE KEY `mother_id` (`mother_id`),
  ADD UNIQUE KEY `mother_passport` (`mother_passport`),
  ADD KEY `my_parents_father_nationality_id_foreign` (`father_nationality_id`),
  ADD KEY `my_parents_father_religion_id_foreign` (`father_religion_id`),
  ADD KEY `my_parents_father_blood_id_foreign` (`father_blood_id`),
  ADD KEY `my_parents_mother_nationality_id_foreign` (`mother_nationality_id`),
  ADD KEY `my_parents_mother_religion_id_foreign` (`mother_religion_id`),
  ADD KEY `my_parents_mother_blood_id_foreign` (`mother_blood_id`);

--
-- Indexes for table `nationalities`
--
ALTER TABLE `nationalities`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parent_attachments`
--
ALTER TABLE `parent_attachments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `parent_attachments_parent_id_foreign` (`parent_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `payments_students`
--
ALTER TABLE `payments_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `payments_students_student_id_foreign` (`student_id`);

--
-- Indexes for table `processing_fees`
--
ALTER TABLE `processing_fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `processing_fees_student_id_foreign` (`student_id`);

--
-- Indexes for table `promotions`
--
ALTER TABLE `promotions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `promotions_student_id_foreign` (`student_id`),
  ADD KEY `promotions_from_grade_id_foreign` (`from_grade_id`),
  ADD KEY `promotions_from_chapter_id_foreign` (`from_chapter_id`),
  ADD KEY `promotions_from_section_id_foreign` (`from_section_id`),
  ADD KEY `promotions_to_grade_id_foreign` (`to_grade_id`),
  ADD KEY `promotions_to_chapter_id_foreign` (`to_chapter_id`),
  ADD KEY `promotions_to_section_id_foreign` (`to_section_id`);

--
-- Indexes for table `questions`
--
ALTER TABLE `questions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `questions_exam_id_foreign` (`exam_id`);

--
-- Indexes for table `receipt_students`
--
ALTER TABLE `receipt_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `receipt_students_student_id_foreign` (`student_id`);

--
-- Indexes for table `religions`
--
ALTER TABLE `religions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sections`
--
ALTER TABLE `sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sections_grade_id_foreign` (`grade_id`),
  ADD KEY `sections_chapter_id_foreign` (`chapter_id`);

--
-- Indexes for table `specializations`
--
ALTER TABLE `specializations`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `specializations_name_unique` (`name`);

--
-- Indexes for table `students`
--
ALTER TABLE `students`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `students_student_email_unique` (`student_email`),
  ADD KEY `students_gender_id_foreign` (`gender_id`),
  ADD KEY `students_nationality_id_foreign` (`nationality_id`),
  ADD KEY `students_blood_id_foreign` (`blood_id`),
  ADD KEY `students_parent_id_foreign` (`parent_id`),
  ADD KEY `students_grade_id_foreign` (`grade_id`),
  ADD KEY `students_chapter_id_foreign` (`chapter_id`),
  ADD KEY `students_section_id_foreign` (`section_id`);

--
-- Indexes for table `student_accounts`
--
ALTER TABLE `student_accounts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_accounts_fees_invoice_id_foreign` (`fees_invoice_id`),
  ADD KEY `student_accounts_receipt_student_id_foreign` (`receipt_student_id`),
  ADD KEY `student_accounts_processing_fee_id_foreign` (`processing_fee_id`),
  ADD KEY `student_accounts_payment_student_id_foreign` (`payment_student_id`),
  ADD KEY `student_accounts_student_id_foreign` (`student_id`);

--
-- Indexes for table `study_fees`
--
ALTER TABLE `study_fees`
  ADD PRIMARY KEY (`id`),
  ADD KEY `study_fees_grade_id_foreign` (`grade_id`),
  ADD KEY `study_fees_chapter_id_foreign` (`chapter_id`);

--
-- Indexes for table `subjects`
--
ALTER TABLE `subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subjects_grade_id_foreign` (`grade_id`),
  ADD KEY `subjects_chapter_id_foreign` (`chapter_id`),
  ADD KEY `subjects_teacher_id_foreign` (`teacher_id`);

--
-- Indexes for table `teachers`
--
ALTER TABLE `teachers`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `teachers_teacher_name_unique` (`teacher_name`),
  ADD UNIQUE KEY `teachers_teacher_email_unique` (`teacher_email`),
  ADD KEY `teachers_specialization_id_foreign` (`specialization_id`),
  ADD KEY `teachers_gender_id_foreign` (`gender_id`);

--
-- Indexes for table `teachers_sections`
--
ALTER TABLE `teachers_sections`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teachers_sections_teacher_id_foreign` (`teacher_id`),
  ADD KEY `teachers_sections_section_id_foreign` (`section_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `attendances`
--
ALTER TABLE `attendances`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `bloods`
--
ALTER TABLE `bloods`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `chapters`
--
ALTER TABLE `chapters`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `exams`
--
ALTER TABLE `exams`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `fees_invoices`
--
ALTER TABLE `fees_invoices`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `fund_accounts`
--
ALTER TABLE `fund_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `genders`
--
ALTER TABLE `genders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `grades`
--
ALTER TABLE `grades`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `images`
--
ALTER TABLE `images`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `my_parents`
--
ALTER TABLE `my_parents`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nationalities`
--
ALTER TABLE `nationalities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=493;

--
-- AUTO_INCREMENT for table `parent_attachments`
--
ALTER TABLE `parent_attachments`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `payments_students`
--
ALTER TABLE `payments_students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `processing_fees`
--
ALTER TABLE `processing_fees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `promotions`
--
ALTER TABLE `promotions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `questions`
--
ALTER TABLE `questions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `receipt_students`
--
ALTER TABLE `receipt_students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `religions`
--
ALTER TABLE `religions`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `sections`
--
ALTER TABLE `sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `specializations`
--
ALTER TABLE `specializations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `students`
--
ALTER TABLE `students`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `student_accounts`
--
ALTER TABLE `student_accounts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `study_fees`
--
ALTER TABLE `study_fees`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `subjects`
--
ALTER TABLE `subjects`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `teachers`
--
ALTER TABLE `teachers`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `teachers_sections`
--
ALTER TABLE `teachers_sections`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `attendances`
--
ALTER TABLE `attendances`
  ADD CONSTRAINT `attendances_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendances_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendances_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendances_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `attendances_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `chapters`
--
ALTER TABLE `chapters`
  ADD CONSTRAINT `chapters_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `exams`
--
ALTER TABLE `exams`
  ADD CONSTRAINT `exams_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exams_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exams_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exams_subject_id_foreign` FOREIGN KEY (`subject_id`) REFERENCES `subjects` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `exams_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fees_invoices`
--
ALTER TABLE `fees_invoices`
  ADD CONSTRAINT `fees_invoices_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fees_invoices_fee_id_foreign` FOREIGN KEY (`fee_id`) REFERENCES `study_fees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fees_invoices_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fees_invoices_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `fund_accounts`
--
ALTER TABLE `fund_accounts`
  ADD CONSTRAINT `fund_accounts_payment_id_foreign` FOREIGN KEY (`payment_id`) REFERENCES `payments_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `fund_accounts_receipt_id_foreign` FOREIGN KEY (`receipt_id`) REFERENCES `receipt_students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `my_parents`
--
ALTER TABLE `my_parents`
  ADD CONSTRAINT `my_parents_father_blood_id_foreign` FOREIGN KEY (`father_blood_id`) REFERENCES `bloods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `my_parents_father_nationality_id_foreign` FOREIGN KEY (`father_nationality_id`) REFERENCES `nationalities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `my_parents_father_religion_id_foreign` FOREIGN KEY (`father_religion_id`) REFERENCES `religions` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `my_parents_mother_blood_id_foreign` FOREIGN KEY (`mother_blood_id`) REFERENCES `bloods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `my_parents_mother_nationality_id_foreign` FOREIGN KEY (`mother_nationality_id`) REFERENCES `nationalities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `my_parents_mother_religion_id_foreign` FOREIGN KEY (`mother_religion_id`) REFERENCES `religions` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `parent_attachments`
--
ALTER TABLE `parent_attachments`
  ADD CONSTRAINT `parent_attachments_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `my_parents` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `payments_students`
--
ALTER TABLE `payments_students`
  ADD CONSTRAINT `payments_students_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `processing_fees`
--
ALTER TABLE `processing_fees`
  ADD CONSTRAINT `processing_fees_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `promotions`
--
ALTER TABLE `promotions`
  ADD CONSTRAINT `promotions_from_chapter_id_foreign` FOREIGN KEY (`from_chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promotions_from_grade_id_foreign` FOREIGN KEY (`from_grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promotions_from_section_id_foreign` FOREIGN KEY (`from_section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promotions_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promotions_to_chapter_id_foreign` FOREIGN KEY (`to_chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promotions_to_grade_id_foreign` FOREIGN KEY (`to_grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `promotions_to_section_id_foreign` FOREIGN KEY (`to_section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `questions`
--
ALTER TABLE `questions`
  ADD CONSTRAINT `questions_exam_id_foreign` FOREIGN KEY (`exam_id`) REFERENCES `exams` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `receipt_students`
--
ALTER TABLE `receipt_students`
  ADD CONSTRAINT `receipt_students_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `sections`
--
ALTER TABLE `sections`
  ADD CONSTRAINT `sections_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `sections_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `students`
--
ALTER TABLE `students`
  ADD CONSTRAINT `students_blood_id_foreign` FOREIGN KEY (`blood_id`) REFERENCES `bloods` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_nationality_id_foreign` FOREIGN KEY (`nationality_id`) REFERENCES `nationalities` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_parent_id_foreign` FOREIGN KEY (`parent_id`) REFERENCES `my_parents` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `students_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `student_accounts`
--
ALTER TABLE `student_accounts`
  ADD CONSTRAINT `student_accounts_fees_invoice_id_foreign` FOREIGN KEY (`fees_invoice_id`) REFERENCES `fees_invoices` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_accounts_payment_student_id_foreign` FOREIGN KEY (`payment_student_id`) REFERENCES `payments_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_accounts_processing_fee_id_foreign` FOREIGN KEY (`processing_fee_id`) REFERENCES `processing_fees` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_accounts_receipt_student_id_foreign` FOREIGN KEY (`receipt_student_id`) REFERENCES `receipt_students` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `student_accounts_student_id_foreign` FOREIGN KEY (`student_id`) REFERENCES `students` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `study_fees`
--
ALTER TABLE `study_fees`
  ADD CONSTRAINT `study_fees_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `study_fees_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `subjects`
--
ALTER TABLE `subjects`
  ADD CONSTRAINT `subjects_chapter_id_foreign` FOREIGN KEY (`chapter_id`) REFERENCES `chapters` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subjects_grade_id_foreign` FOREIGN KEY (`grade_id`) REFERENCES `grades` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `subjects_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teachers`
--
ALTER TABLE `teachers`
  ADD CONSTRAINT `teachers_gender_id_foreign` FOREIGN KEY (`gender_id`) REFERENCES `genders` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teachers_specialization_id_foreign` FOREIGN KEY (`specialization_id`) REFERENCES `specializations` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `teachers_sections`
--
ALTER TABLE `teachers_sections`
  ADD CONSTRAINT `teachers_sections_section_id_foreign` FOREIGN KEY (`section_id`) REFERENCES `sections` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `teachers_sections_teacher_id_foreign` FOREIGN KEY (`teacher_id`) REFERENCES `teachers` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
