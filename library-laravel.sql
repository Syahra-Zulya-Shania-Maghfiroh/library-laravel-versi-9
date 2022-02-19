-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Feb 2022 pada 16.45
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `library-laravel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `book`
--

CREATE TABLE `book` (
  `id_book` bigint(20) UNSIGNED NOT NULL,
  `book_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `author` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `description` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `book`
--

INSERT INTO `book` (`id_book`, `book_name`, `author`, `description`, `created_at`, `updated_at`) VALUES
(1, 'Hujan', 'Boy Candra', 'Seperti hujan yang jatuh ke bumi, aku sangat menunggu kehadiranmu', '2022-02-17 19:56:15', '2022-02-17 20:02:39'),
(2, 'Hujan', 'Boy Candra', 'Seoerti hujan yang jatuh ke bumi, aku sangat menunggu kehadiranmu', '2022-02-17 19:57:23', '2022-02-17 19:57:23'),
(3, 'Hujan', 'Boy Candra', 'Seperti hujan yang jatuh ke bumi, aku sangat menunggu kehadiranmu', '2022-02-19 08:29:17', '2022-02-19 08:29:17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `book_loan_details`
--

CREATE TABLE `book_loan_details` (
  `id_book_loan_details` bigint(20) UNSIGNED NOT NULL,
  `id_borrowing_book` bigint(20) UNSIGNED NOT NULL,
  `id_book` bigint(20) UNSIGNED NOT NULL,
  `qty` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `book_return`
--

CREATE TABLE `book_return` (
  `id_book_return` bigint(20) UNSIGNED NOT NULL,
  `id_borrowing_book` bigint(20) UNSIGNED NOT NULL,
  `dateOfReturn` date NOT NULL,
  `fine` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `borrowing_book`
--

CREATE TABLE `borrowing_book` (
  `id_borrowing_book` bigint(20) UNSIGNED NOT NULL,
  `id_student` bigint(20) UNSIGNED NOT NULL,
  `borrow_date` date NOT NULL,
  `return_date` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
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
-- Struktur dari tabel `grade`
--

CREATE TABLE `grade` (
  `id_grade` bigint(20) UNSIGNED NOT NULL,
  `grade_name` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `group` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(5, '2022_02_17_135020_create_grade_table', 1),
(6, '2022_02_17_141012_create_student_table', 2),
(7, '2022_02_17_141439_create_book_table', 3),
(8, '2022_02_17_141700_create_borrowing_book', 4),
(9, '2022_02_17_141931_create_book_return', 5),
(10, '2022_02_17_142029_create_book_loan_details', 6),
(11, '2022_02_19_132336_add_type_to_users', 7);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_access_tokens`
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
-- Struktur dari tabel `student`
--

CREATE TABLE `student` (
  `id_student` bigint(20) UNSIGNED NOT NULL,
  `id_grade` bigint(20) UNSIGNED NOT NULL,
  `student_name` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `born` date NOT NULL,
  `gender` enum('M','F') COLLATE utf8mb4_unicode_ci NOT NULL,
  `address` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `type` enum('superadmin','admin','user') COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `type`) VALUES
(1, 'Luna Putri', 'luna@gmail.com', NULL, '$2y$10$AVcOXtkzgopDxo8dn8yy0eBimOfJeXfN8RAWUlfRkKIIUlcizLER.', NULL, '2022-02-18 03:36:37', '2022-02-18 03:36:37', 'superadmin'),
(2, 'Putri Ana', 'putri@gmail.com', NULL, '$2y$10$chmWiLTgsbGhjsPFajBjOObyHdUDDk50GWZ6qSmMtfRbYraqIqWpe', NULL, '2022-02-18 06:19:53', '2022-02-18 06:19:53', 'superadmin'),
(3, 'diana putri', 'diana@gmail.com', NULL, '$2y$10$V7gKKVpYbvkiiD6mIRwYr.Zm8132kzkO.nJiO5dXXhEiz50chk4sC', NULL, '2022-02-19 08:25:03', '2022-02-19 08:25:03', ''),
(4, 'diandra aulia', 'dian@gmail.com', NULL, '$2y$10$r3iJHhb7xndEiw5so31Q5eJYsLbb44fwNSbQO.nxDG2R3an16hfE6', NULL, '2022-02-19 08:25:54', '2022-02-19 08:25:54', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `book`
--
ALTER TABLE `book`
  ADD PRIMARY KEY (`id_book`);

--
-- Indeks untuk tabel `book_loan_details`
--
ALTER TABLE `book_loan_details`
  ADD PRIMARY KEY (`id_book_loan_details`),
  ADD KEY `book_loan_details_id_borrowing_book_foreign` (`id_borrowing_book`),
  ADD KEY `book_loan_details_id_book_foreign` (`id_book`);

--
-- Indeks untuk tabel `book_return`
--
ALTER TABLE `book_return`
  ADD PRIMARY KEY (`id_book_return`),
  ADD KEY `book_return_id_borrowing_book_foreign` (`id_borrowing_book`);

--
-- Indeks untuk tabel `borrowing_book`
--
ALTER TABLE `borrowing_book`
  ADD PRIMARY KEY (`id_borrowing_book`),
  ADD KEY `borrowing_book_id_student_foreign` (`id_student`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `grade`
--
ALTER TABLE `grade`
  ADD PRIMARY KEY (`id_grade`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indeks untuk tabel `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id_student`),
  ADD KEY `student_id_grade_foreign` (`id_grade`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_email_unique` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `book`
--
ALTER TABLE `book`
  MODIFY `id_book` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `book_loan_details`
--
ALTER TABLE `book_loan_details`
  MODIFY `id_book_loan_details` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `book_return`
--
ALTER TABLE `book_return`
  MODIFY `id_book_return` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `borrowing_book`
--
ALTER TABLE `borrowing_book`
  MODIFY `id_borrowing_book` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `grade`
--
ALTER TABLE `grade`
  MODIFY `id_grade` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `student`
--
ALTER TABLE `student`
  MODIFY `id_student` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `book_loan_details`
--
ALTER TABLE `book_loan_details`
  ADD CONSTRAINT `book_loan_details_id_book_foreign` FOREIGN KEY (`id_book`) REFERENCES `book` (`id_book`),
  ADD CONSTRAINT `book_loan_details_id_borrowing_book_foreign` FOREIGN KEY (`id_borrowing_book`) REFERENCES `borrowing_book` (`id_borrowing_book`);

--
-- Ketidakleluasaan untuk tabel `book_return`
--
ALTER TABLE `book_return`
  ADD CONSTRAINT `book_return_id_borrowing_book_foreign` FOREIGN KEY (`id_borrowing_book`) REFERENCES `borrowing_book` (`id_borrowing_book`);

--
-- Ketidakleluasaan untuk tabel `borrowing_book`
--
ALTER TABLE `borrowing_book`
  ADD CONSTRAINT `borrowing_book_id_student_foreign` FOREIGN KEY (`id_student`) REFERENCES `student` (`id_student`);

--
-- Ketidakleluasaan untuk tabel `student`
--
ALTER TABLE `student`
  ADD CONSTRAINT `student_id_grade_foreign` FOREIGN KEY (`id_grade`) REFERENCES `grade` (`id_grade`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
