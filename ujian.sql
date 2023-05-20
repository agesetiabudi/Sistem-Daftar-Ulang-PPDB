-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 17, 2023 at 12:52 AM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ujian`
--

-- --------------------------------------------------------

--
-- Table structure for table `admins`
--

CREATE TABLE `admins` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `admins`
--

INSERT INTO `admins` (`id`, `nama`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Super Admin', 'admin@development.com', NULL, '$2y$10$ArJhYlju29wsTlOOCmxnnuGYwNcNe8vtMIf2SkthT7Hk3EtWEMbfa', NULL, '2023-05-13 08:41:34', '2023-05-13 08:41:36');

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategori_ujian`
--

CREATE TABLE `kategori_ujian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategori_ujian`
--

INSERT INTO `kategori_ujian` (`id`, `code`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'susfejv', 'Pemrograman Dasar', '2023-05-13 02:07:53', '2023-05-13 02:12:33');

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
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2023_05_13_080452_create_admins_table', 1),
(6, '2023_05_13_080536_create_kategori_ujians_table', 1),
(7, '2023_05_13_080917_create_ujians_table', 1),
(8, '2023_05_13_081013_create_soals_table', 1),
(9, '2023_05_13_081523_create_user_ujians_table', 1),
(10, '2023_05_13_081813_create_user_jawaban_ujians_table', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `soal`
--

CREATE TABLE `soal` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_ujian` bigint(20) UNSIGNED DEFAULT NULL,
  `pertanyaan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pilihan_a` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pilihan_b` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pilihan_c` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `pilihan_d` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `jawaban` varchar(200) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `soal`
--

INSERT INTO `soal` (`id`, `id_ujian`, `pertanyaan`, `pilihan_a`, `pilihan_b`, `pilihan_c`, `pilihan_d`, `jawaban`, `created_at`, `updated_at`) VALUES
(1, 1, 'Apa yang dimaksud dengan pemrograman', 'gatau', 'apa ya', 'pas', 'tidak mengerti', 'B', '2023-05-13 02:55:35', '2023-05-13 02:59:51'),
(3, 3, 'css adalah', 'ADAWD', 'AWDAW', 'AWDA', 'AWDAWDWAD', 'A', '2023-05-13 18:58:31', '2023-05-13 18:58:31'),
(4, 4, 'Sebutkan Sintak php', 'echo', 'dir', 'console.log()', 'this.soal', 'A', '2023-05-16 05:32:54', '2023-05-16 05:32:54'),
(5, 4, 'mana yang bukan sintak php', 'echo', 'return', '$data', 'console.log()', 'D', '2023-05-16 05:33:28', '2023-05-16 05:33:28'),
(6, 4, 'bagaimana sintak untuk menampilkan nilai', 'echo', 'return', 'log', 'print()', 'B', '2023-05-16 05:34:10', '2023-05-16 05:34:10');

-- --------------------------------------------------------

--
-- Table structure for table `ujian`
--

CREATE TABLE `ujian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `code` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `id_kategori` bigint(20) UNSIGNED DEFAULT NULL,
  `judul` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `tanggal_mulai` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `tipe` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ujian`
--

INSERT INTO `ujian` (`id`, `code`, `id_kategori`, `judul`, `tanggal_mulai`, `tanggal_akhir`, `tipe`, `created_at`, `updated_at`) VALUES
(1, 'psfhjhr', 1, 'Tes Pemrograman Siswa', '2023-05-01', '2023-05-31', 'publik', '2023-05-13 02:32:51', '2023-05-13 02:32:51'),
(3, NULL, 1, 'Apa itu css', '2023-05-14', '2023-06-03', 'private', '2023-05-13 18:58:05', '2023-05-13 18:58:05'),
(4, NULL, 1, 'Php Native', '2023-05-15', '2023-06-01', 'publik', '2023-05-16 05:31:57', '2023-05-16 05:31:57');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Mira Santika Sari', 'mirasantika1539@gmail.com', NULL, '$2y$10$ArJhYlju29wsTlOOCmxnnuGYwNcNe8vtMIf2SkthT7Hk3EtWEMbfa', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_jawaban_ujian`
--

CREATE TABLE `user_jawaban_ujian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `id_ujian` bigint(20) UNSIGNED DEFAULT NULL,
  `id_soal` bigint(20) UNSIGNED DEFAULT NULL,
  `jawaban` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_jawaban_ujian`
--

INSERT INTO `user_jawaban_ujian` (`id`, `id_user`, `id_ujian`, `id_soal`, `jawaban`, `created_at`, `updated_at`) VALUES
(1, NULL, 1, 1, 'D', '2023-05-13 10:06:20', '2023-05-13 10:06:23'),
(2, 1, 1, 1, 'b', '2023-05-15 17:17:00', '2023-05-15 17:17:00'),
(3, 1, 4, 4, 'a', '2023-05-16 05:34:42', '2023-05-16 05:40:14'),
(4, 1, 4, 5, 'd', '2023-05-16 05:34:42', '2023-05-16 05:34:42'),
(5, 1, 4, 6, 'c', '2023-05-16 05:34:42', '2023-05-16 05:40:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_ujian`
--

CREATE TABLE `user_ujian` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `id_user` bigint(20) UNSIGNED DEFAULT NULL,
  `id_ujian` bigint(20) UNSIGNED DEFAULT NULL,
  `tanggal_mulai` datetime NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `ujian` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nilai` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user_ujian`
--

INSERT INTO `user_ujian` (`id`, `id_user`, `id_ujian`, `tanggal_mulai`, `status`, `ujian`, `nilai`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-05-14 01:34:26', 'disetujui', 'selesai', '100.00', '2023-05-13 18:34:26', '2023-05-15 17:17:38'),
(4, 1, 3, '2023-05-14 02:01:50', 'ditolak', 'selesai', '66.67', '2023-05-13 19:01:50', '2023-05-16 05:40:14'),
(5, 1, 4, '2023-05-16 12:34:27', 'disetujui', 'selesai', '66.67', '2023-05-16 05:34:27', '2023-05-16 05:43:42');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admins`
--
ALTER TABLE `admins`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `admins_email_unique` (`email`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `kategori_ujian`
--
ALTER TABLE `kategori_ujian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `soal`
--
ALTER TABLE `soal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `soal_id_ujian_foreign` (`id_ujian`);

--
-- Indexes for table `ujian`
--
ALTER TABLE `ujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ujian_id_kategori_foreign` (`id_kategori`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- Indexes for table `user_jawaban_ujian`
--
ALTER TABLE `user_jawaban_ujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_jawaban_ujian_id_ujian_foreign` (`id_ujian`),
  ADD KEY `user_jawaban_ujian_id_soal_foreign` (`id_soal`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `user_ujian`
--
ALTER TABLE `user_ujian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_ujian_id_ujian_foreign` (`id_ujian`),
  ADD KEY `id_user` (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admins`
--
ALTER TABLE `admins`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategori_ujian`
--
ALTER TABLE `kategori_ujian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `soal`
--
ALTER TABLE `soal`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ujian`
--
ALTER TABLE `ujian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_jawaban_ujian`
--
ALTER TABLE `user_jawaban_ujian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `user_ujian`
--
ALTER TABLE `user_ujian`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `soal`
--
ALTER TABLE `soal`
  ADD CONSTRAINT `soal_id_ujian_foreign` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `ujian`
--
ALTER TABLE `ujian`
  ADD CONSTRAINT `ujian_id_kategori_foreign` FOREIGN KEY (`id_kategori`) REFERENCES `kategori_ujian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_jawaban_ujian`
--
ALTER TABLE `user_jawaban_ujian`
  ADD CONSTRAINT `user_jawaban_ujian_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_jawaban_ujian_id_soal_foreign` FOREIGN KEY (`id_soal`) REFERENCES `soal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_jawaban_ujian_id_ujian_foreign` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `user_ujian`
--
ALTER TABLE `user_ujian`
  ADD CONSTRAINT `user_ujian_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_ujian_id_ujian_foreign` FOREIGN KEY (`id_ujian`) REFERENCES `ujian` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
