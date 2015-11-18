-- phpMyAdmin SQL Dump
-- version 4.5.0.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2015 at 02:55 PM
-- Server version: 10.0.17-MariaDB
-- PHP Version: 5.6.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `server`
--

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_awards`
--

CREATE TABLE `tbl_awards` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `priod_id` int(11) NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_awards`
--

INSERT INTO `tbl_awards` (`id`, `student_id`, `priod_id`, `content`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 19, 2, 'giải 3 toán học cấp tỉnh', '2015-11-08 02:46:17', '2015-11-15 09:37:57', '2015-11-15 09:37:57'),
(2, 20, 3, 'Giải nhì toán cấp tỉnh ', '2015-11-15 09:38:46', '2015-11-15 09:38:46', NULL),
(3, 18, 3, 'Giải Nhì toán cấp tỉnh', '2015-11-15 09:39:39', '2015-11-15 09:39:39', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_class`
--

CREATE TABLE `tbl_class` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `teacher_manage_id` int(11) NOT NULL,
  `priod_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_class`
--

INSERT INTO `tbl_class` (`id`, `name`, `teacher_manage_id`, `priod_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'lop 12A', 14, 1, '2015-11-01 09:24:31', '2015-11-01 09:25:15', NULL),
(2, 'lop 12B', 1, 2, '2015-11-08 01:23:23', '2015-11-08 01:23:23', NULL),
(3, 'Lop 13C', 1, 3, '2015-11-14 05:03:42', '2015-11-14 05:03:42', NULL),
(4, 'Lớp 10A', 1, 3, '2015-11-14 07:38:53', '2015-11-14 07:38:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_conducts`
--

CREATE TABLE `tbl_conducts` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_conducts`
--

INSERT INTO `tbl_conducts` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Tốt', '2015-11-08 03:24:06', '2015-11-15 03:35:33', NULL),
(2, 'Điểm 15 phút', '2015-11-14 08:18:02', '2015-11-15 03:39:09', '2015-11-15 03:39:09'),
(3, 'Good', '2015-11-15 03:39:30', '2015-11-15 03:39:30', NULL),
(4, 'Excellent', '2015-11-15 03:39:39', '2015-11-15 03:39:39', NULL),
(5, 'Middle', '2015-11-15 03:39:51', '2015-11-15 03:55:18', '2015-11-15 03:55:18'),
(6, 'Middle', '2015-11-15 03:55:24', '2015-11-15 03:58:02', '2015-11-15 03:58:02'),
(7, 'Middle', '2015-11-15 03:58:12', '2015-11-15 04:06:02', '2015-11-15 04:06:02'),
(8, 'Middle', '2015-11-15 04:06:08', '2015-11-15 04:06:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_favorite_students`
--

CREATE TABLE `tbl_favorite_students` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `favorite_type_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_favorite_types`
--

CREATE TABLE `tbl_favorite_types` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_logs`
--

CREATE TABLE `tbl_logs` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL,
  `reason` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_password_resets`
--

CREATE TABLE `tbl_password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_priods`
--

CREATE TABLE `tbl_priods` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `date_begin` date NOT NULL,
  `date_end` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_priods`
--

INSERT INTO `tbl_priods` (`id`, `name`, `date_begin`, `date_end`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Học kì 1', '2015-10-09', '2015-11-20', '2015-10-29 10:55:52', '2015-11-14 18:53:54', NULL),
(2, 'Học kì 2', '2015-11-08', '2016-01-29', '2015-11-08 01:17:30', '2015-11-08 05:03:12', NULL),
(3, 'Học kì 3', '2015-12-17', '2016-02-11', '2015-11-08 01:49:10', '2015-11-08 01:49:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_ranking_academics`
--

CREATE TABLE `tbl_ranking_academics` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_ranking_academics`
--

INSERT INTO `tbl_ranking_academics` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Giỏi', '2015-11-14 19:25:14', '2015-11-15 09:47:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_schools`
--

CREATE TABLE `tbl_schools` (
  `id` int(11) NOT NULL,
  `name` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `code` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_scores`
--

CREATE TABLE `tbl_scores` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `score` float NOT NULL,
  `score_type_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `priod_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_scores`
--

INSERT INTO `tbl_scores` (`id`, `student_id`, `subject_id`, `score`, `score_type_id`, `teacher_id`, `priod_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 19, 1, 10, 1, 1, 1, '2015-11-14 18:32:04', '2015-11-15 03:48:41', '2015-11-15 03:48:41'),
(2, 19, 2, 8, 1, 14, 1, '2015-11-14 18:33:13', '2015-11-15 03:48:41', '2015-11-15 03:48:41'),
(3, 18, 1, 9.5, 3, 1, 1, '2015-11-15 04:33:58', '2015-11-15 04:38:09', '2015-11-15 04:38:09');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_score_types`
--

CREATE TABLE `tbl_score_types` (
  `id` int(11) NOT NULL,
  `name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_score_types`
--

INSERT INTO `tbl_score_types` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Điểm 15 phút', '2015-11-14 08:18:49', '2015-11-15 03:48:41', '2015-11-15 03:48:41'),
(2, 'Điểm 15 phút', '2015-11-15 04:00:10', '2015-11-15 04:00:59', '2015-11-15 04:00:59'),
(3, 'Điểm 15 phút', '2015-11-15 04:01:04', '2015-11-15 04:01:04', NULL),
(4, 'Điểm 1 tiết ', '2015-11-15 04:01:15', '2015-11-15 09:35:27', '2015-11-15 09:35:27');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_students`
--

CREATE TABLE `tbl_students` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `birth_day` date NOT NULL,
  `address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `native_place` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `ethnic` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `religion` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `date_in` date NOT NULL,
  `date_out` date NOT NULL,
  `name_father` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `job_father` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `name_mother` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `job_mother` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `status` tinyint(1) NOT NULL,
  `is_new` tinyint(1) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_students`
--

INSERT INTO `tbl_students` (`id`, `school_id`, `student_id`, `name`, `birth_day`, `address`, `native_place`, `gender`, `ethnic`, `religion`, `date_in`, `date_out`, `name_father`, `job_father`, `name_mother`, `job_mother`, `status`, `is_new`, `created_at`, `updated_at`, `deleted_at`) VALUES
(18, 0, 0, 'Phùng Văn Dũng', '1992-10-16', 'Hội Hợp Vĩnh Yên Vĩnh Phúc', 'Hội Hợp Vĩnh Yên Vĩnh Phúc', 0, 'kinh', 'không', '2010-08-20', '2015-11-18', 'Phùng Văn Cẩn', 'Làm ruộng ', 'Phùng Thị Nga ', 'Làm ruộng', 1, 0, '2015-10-27 09:19:43', '2015-11-14 07:39:08', NULL),
(19, 0, 0, 'Phùng Văn Cường', '1992-08-12', 'Hội Hợp Vĩnh Yên Vĩnh Phúc', 'Hội Hợp Vĩnh Yên Vĩnh Phúc', 0, 'kinh', 'không', '2010-08-20', '2015-11-12', 'Phùng Văn Cẩn', 'Làm ruộng ', 'Phùng Thị Nga ', 'Làm ruộng', 1, 0, '2015-10-27 09:19:43', '2015-11-14 07:39:08', NULL),
(20, 0, 0, 'Phùng Văn Mạnh', '1992-10-12', 'Hội Hợp Vĩnh Yên Vĩnh Phúc', 'Hội Hợp Vĩnh Yên Vĩnh Phúc', 0, 'kinh', 'không', '2010-08-20', '2015-11-05', 'Phùng Văn Cẩn', 'Làm ruộng ', 'Phùng Thị Nga ', 'Làm ruộng', 1, 0, '2015-10-27 09:19:43', '2015-11-14 07:39:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_student_learning_class`
--

CREATE TABLE `tbl_student_learning_class` (
  `id` int(11) NOT NULL,
  `student_id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `priod_id` int(11) NOT NULL,
  `is_current` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_student_learning_class`
--

INSERT INTO `tbl_student_learning_class` (`id`, `student_id`, `class_id`, `priod_id`, `is_current`, `created_at`, `updated_at`, `deleted_at`) VALUES
(20, 18, 4, 3, 1, '2015-11-14 07:39:08', '2015-11-14 07:39:08', NULL),
(21, 19, 4, 3, 1, '2015-11-14 07:39:08', '2015-11-14 07:39:08', NULL),
(22, 20, 4, 3, 1, '2015-11-14 07:39:08', '2015-11-14 07:39:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_subjects`
--

CREATE TABLE `tbl_subjects` (
  `id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_subjects`
--

INSERT INTO `tbl_subjects` (`id`, `name`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'Toán', '2015-10-31 06:37:01', '2015-10-31 06:37:01', NULL),
(2, 'Văn', '2015-10-31 06:56:14', '2015-10-31 06:56:14', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_summaries`
--

CREATE TABLE `tbl_summaries` (
  `id` int(11) NOT NULL,
  `student_learning_class_id` int(11) NOT NULL,
  `conduct_id` int(11) NOT NULL,
  `ranking_academic_id` int(11) NOT NULL,
  `score_average` float NOT NULL,
  `comment` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_summaries`
--

INSERT INTO `tbl_summaries` (`id`, `student_learning_class_id`, `conduct_id`, `ranking_academic_id`, `score_average`, `comment`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 21, 1, 1, 8.5, 'ewfwfw', '2015-11-14 21:31:37', '2015-11-15 01:50:32', '2015-11-15 01:50:32'),
(2, 21, 1, 1, 8.5, '', '2015-11-15 01:59:35', '2015-11-15 03:35:33', '2015-11-15 03:35:33'),
(3, 20, 3, 1, 8.5, 'ewfewfew', '2015-11-15 09:46:42', '2015-11-15 09:47:08', '2015-11-15 09:47:08');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teachers`
--

CREATE TABLE `tbl_teachers` (
  `id` int(11) NOT NULL,
  `school_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `name` varchar(128) COLLATE utf8_unicode_ci NOT NULL,
  `identity_number` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `birth_day` date NOT NULL,
  `address` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `gender` tinyint(1) NOT NULL,
  `native_place` varchar(256) COLLATE utf8_unicode_ci NOT NULL,
  `experience` text COLLATE utf8_unicode_ci NOT NULL,
  `date_in` date DEFAULT NULL,
  `date_out` date DEFAULT NULL,
  `favorite` text COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_teachers`
--

INSERT INTO `tbl_teachers` (`id`, `school_id`, `teacher_id`, `name`, `identity_number`, `birth_day`, `address`, `gender`, `native_place`, `experience`, `date_in`, `date_out`, `favorite`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 0, 0, 'DũngIct', '13551655888', '1992-10-15', 'Hội Hợp Vĩnh Yên Vĩnh Phúc', 0, 'Hội Hợp Vĩnh Yên Vĩnh Phúc', 'Java,.NET,C#,MySql,Android', '2015-10-29', '0000-00-00', 'Đánh cầu lông,Bơi lội ,xem phim ,đi du lịch..vv', '2015-10-29 09:30:23', '2015-10-29 09:48:43', NULL),
(14, 0, 0, 'Đỗ Thị Linh', '13256124326', '2015-10-22', 'Tam đảo -Vĩnh Yên -Vĩnh Phúc', 1, 'Tam đảo -Vĩnh Yên -Vĩnh Phúc', '2 năm làm giáo viên', '2015-10-28', '2015-10-30', 'nghe nhạc ,xem phim ,chơi thể thao', '2015-10-31 09:05:51', '2015-10-31 09:05:51', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teacher_leaning_subjects`
--

CREATE TABLE `tbl_teacher_leaning_subjects` (
  `id` int(11) NOT NULL,
  `subject_id` int(11) NOT NULL,
  `teacher_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_teacher_leaning_subjects`
--

INSERT INTO `tbl_teacher_leaning_subjects` (`id`, `subject_id`, `teacher_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 2, 14, '2015-11-01 07:21:15', '2015-11-01 08:27:31', NULL),
(3, 2, 1, '2015-11-01 07:26:00', '2015-11-01 07:26:00', NULL),
(4, 1, 1, '2015-11-01 08:27:23', '2015-11-01 08:27:23', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_teaching_class`
--

CREATE TABLE `tbl_teaching_class` (
  `id` int(11) NOT NULL,
  `class_id` int(11) NOT NULL,
  `teacher_leaning_subjects_id` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_teaching_class`
--

INSERT INTO `tbl_teaching_class` (`id`, `class_id`, `teacher_leaning_subjects_id`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 2, '2015-11-02 01:12:11', '2015-11-02 01:38:17', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(60) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `updated_at` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00'
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`id`, `name`, `email`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'admin', 'admin@gmail.com', '$2y$10$QVElMSOERm4g8ijWH9d7nenE79ClBryOmjo2BdSXOIcIuO.mpuhrm', 's6X6bnop2f7EzwLDDxQj8fji3YFknIuT7Vqk6Q6iuKHiqkQeWZnb0ID1qupM', '2015-10-25 04:03:03', '2015-11-15 09:30:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_awards`
--
ALTER TABLE `tbl_awards`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `priod_id` (`priod_id`);

--
-- Indexes for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `teacher_manage_id` (`teacher_manage_id`),
  ADD KEY `priod_id` (`priod_id`);

--
-- Indexes for table `tbl_conducts`
--
ALTER TABLE `tbl_conducts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_favorite_students`
--
ALTER TABLE `tbl_favorite_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `favorite_type_id` (`favorite_type_id`),
  ADD KEY `student_id` (`student_id`);

--
-- Indexes for table `tbl_favorite_types`
--
ALTER TABLE `tbl_favorite_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_password_resets`
--
ALTER TABLE `tbl_password_resets`
  ADD KEY `tbl_password_resets_email_index` (`email`),
  ADD KEY `tbl_password_resets_token_index` (`token`);

--
-- Indexes for table `tbl_priods`
--
ALTER TABLE `tbl_priods`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_ranking_academics`
--
ALTER TABLE `tbl_ranking_academics`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_schools`
--
ALTER TABLE `tbl_schools`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_scores`
--
ALTER TABLE `tbl_scores`
  ADD PRIMARY KEY (`id`),
  ADD KEY `score_type_id` (`score_type_id`),
  ADD KEY `teaching_class_id` (`teacher_id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `teacher_id` (`teacher_id`),
  ADD KEY `priod_id` (`priod_id`);

--
-- Indexes for table `tbl_score_types`
--
ALTER TABLE `tbl_score_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_students`
--
ALTER TABLE `tbl_students`
  ADD PRIMARY KEY (`id`),
  ADD KEY `school_id` (`school_id`);

--
-- Indexes for table `tbl_student_learning_class`
--
ALTER TABLE `tbl_student_learning_class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_id` (`student_id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `priod_id` (`priod_id`);

--
-- Indexes for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_summaries`
--
ALTER TABLE `tbl_summaries`
  ADD PRIMARY KEY (`id`),
  ADD KEY `student_learning_class_id` (`student_learning_class_id`),
  ADD KEY `conduct_id` (`conduct_id`),
  ADD KEY `ranking_academic_id` (`ranking_academic_id`);

--
-- Indexes for table `tbl_teachers`
--
ALTER TABLE `tbl_teachers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_teacher_leaning_subjects`
--
ALTER TABLE `tbl_teacher_leaning_subjects`
  ADD PRIMARY KEY (`id`),
  ADD KEY `subject_id` (`subject_id`),
  ADD KEY `teacher_id` (`teacher_id`);

--
-- Indexes for table `tbl_teaching_class`
--
ALTER TABLE `tbl_teaching_class`
  ADD PRIMARY KEY (`id`),
  ADD KEY `class_id` (`class_id`),
  ADD KEY `teacher_leaning_subjects_id` (`teacher_leaning_subjects_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `tbl_users_email_unique` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_awards`
--
ALTER TABLE `tbl_awards`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_class`
--
ALTER TABLE `tbl_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_conducts`
--
ALTER TABLE `tbl_conducts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `tbl_favorite_students`
--
ALTER TABLE `tbl_favorite_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_favorite_types`
--
ALTER TABLE `tbl_favorite_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_logs`
--
ALTER TABLE `tbl_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_priods`
--
ALTER TABLE `tbl_priods`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_ranking_academics`
--
ALTER TABLE `tbl_ranking_academics`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_schools`
--
ALTER TABLE `tbl_schools`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `tbl_scores`
--
ALTER TABLE `tbl_scores`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_score_types`
--
ALTER TABLE `tbl_score_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_students`
--
ALTER TABLE `tbl_students`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;
--
-- AUTO_INCREMENT for table `tbl_student_learning_class`
--
ALTER TABLE `tbl_student_learning_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;
--
-- AUTO_INCREMENT for table `tbl_subjects`
--
ALTER TABLE `tbl_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_summaries`
--
ALTER TABLE `tbl_summaries`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_teachers`
--
ALTER TABLE `tbl_teachers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `tbl_teacher_leaning_subjects`
--
ALTER TABLE `tbl_teacher_leaning_subjects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `tbl_teaching_class`
--
ALTER TABLE `tbl_teaching_class`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_awards`
--
ALTER TABLE `tbl_awards`
  ADD CONSTRAINT `tbl_awards_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `tbl_students` (`id`),
  ADD CONSTRAINT `tbl_awards_ibfk_2` FOREIGN KEY (`priod_id`) REFERENCES `tbl_priods` (`id`);

--
-- Constraints for table `tbl_class`
--
ALTER TABLE `tbl_class`
  ADD CONSTRAINT `tbl_class_ibfk_1` FOREIGN KEY (`teacher_manage_id`) REFERENCES `tbl_teachers` (`id`),
  ADD CONSTRAINT `tbl_class_ibfk_2` FOREIGN KEY (`priod_id`) REFERENCES `tbl_priods` (`id`);

--
-- Constraints for table `tbl_favorite_students`
--
ALTER TABLE `tbl_favorite_students`
  ADD CONSTRAINT `tbl_favorite_students_ibfk_1` FOREIGN KEY (`favorite_type_id`) REFERENCES `tbl_favorite_types` (`id`),
  ADD CONSTRAINT `tbl_favorite_students_ibfk_2` FOREIGN KEY (`student_id`) REFERENCES `tbl_students` (`id`);

--
-- Constraints for table `tbl_scores`
--
ALTER TABLE `tbl_scores`
  ADD CONSTRAINT `tbl_scores_ibfk_1` FOREIGN KEY (`score_type_id`) REFERENCES `tbl_score_types` (`id`),
  ADD CONSTRAINT `tbl_scores_ibfk_2` FOREIGN KEY (`priod_id`) REFERENCES `tbl_priods` (`id`),
  ADD CONSTRAINT `tbl_scores_ibfk_3` FOREIGN KEY (`student_id`) REFERENCES `tbl_students` (`id`),
  ADD CONSTRAINT `tbl_scores_ibfk_4` FOREIGN KEY (`teacher_id`) REFERENCES `tbl_teachers` (`id`);

--
-- Constraints for table `tbl_student_learning_class`
--
ALTER TABLE `tbl_student_learning_class`
  ADD CONSTRAINT `tbl_student_learning_class_ibfk_1` FOREIGN KEY (`student_id`) REFERENCES `tbl_students` (`id`),
  ADD CONSTRAINT `tbl_student_learning_class_ibfk_2` FOREIGN KEY (`class_id`) REFERENCES `tbl_class` (`id`),
  ADD CONSTRAINT `tbl_student_learning_class_ibfk_3` FOREIGN KEY (`priod_id`) REFERENCES `tbl_priods` (`id`);

--
-- Constraints for table `tbl_summaries`
--
ALTER TABLE `tbl_summaries`
  ADD CONSTRAINT `tbl_summaries_ibfk_1` FOREIGN KEY (`student_learning_class_id`) REFERENCES `tbl_student_learning_class` (`id`),
  ADD CONSTRAINT `tbl_summaries_ibfk_2` FOREIGN KEY (`conduct_id`) REFERENCES `tbl_conducts` (`id`),
  ADD CONSTRAINT `tbl_summaries_ibfk_3` FOREIGN KEY (`ranking_academic_id`) REFERENCES `tbl_ranking_academics` (`id`);

--
-- Constraints for table `tbl_teacher_leaning_subjects`
--
ALTER TABLE `tbl_teacher_leaning_subjects`
  ADD CONSTRAINT `tbl_teacher_leaning_subjects_ibfk_1` FOREIGN KEY (`subject_id`) REFERENCES `tbl_subjects` (`id`),
  ADD CONSTRAINT `tbl_teacher_leaning_subjects_ibfk_2` FOREIGN KEY (`teacher_id`) REFERENCES `tbl_teachers` (`id`);

--
-- Constraints for table `tbl_teaching_class`
--
ALTER TABLE `tbl_teaching_class`
  ADD CONSTRAINT `tbl_teaching_class_ibfk_1` FOREIGN KEY (`class_id`) REFERENCES `tbl_class` (`id`),
  ADD CONSTRAINT `tbl_teaching_class_ibfk_2` FOREIGN KEY (`teacher_leaning_subjects_id`) REFERENCES `tbl_teacher_leaning_subjects` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
