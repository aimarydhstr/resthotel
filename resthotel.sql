-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 11 Apr 2021 pada 06.26
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 7.4.14

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `resthotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bookings`
--

CREATE TABLE `bookings` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `check_in` datetime NOT NULL,
  `check_out` datetime NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `bookings`
--

INSERT INTO `bookings` (`id`, `user_id`, `room_id`, `check_in`, `check_out`, `created_at`, `updated_at`) VALUES
(3, 2, 1, '2021-04-10 00:00:00', '2021-04-12 00:00:00', '2021-04-10 00:21:06', '2021-04-10 00:21:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `facilities`
--

CREATE TABLE `facilities` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `facilities`
--

INSERT INTO `facilities` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'AC', '2021-04-08 00:42:53', '2021-04-08 00:42:53'),
(2, 'Television', '2021-04-08 00:44:54', '2021-04-08 00:56:40'),
(3, 'Toilet', '2021-04-08 00:57:00', '2021-04-08 00:57:00'),
(4, 'Single Bed', '2021-04-08 00:57:21', '2021-04-08 00:57:21'),
(5, 'Double Bed', '2021-04-08 00:57:37', '2021-04-08 00:57:37'),
(6, 'Bathroom', '2021-04-08 00:58:32', '2021-04-08 00:58:32'),
(7, 'Video Game', '2021-04-08 00:59:44', '2021-04-08 00:59:44'),
(8, 'Radio', '2021-04-08 01:00:06', '2021-04-08 01:00:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `features`
--

CREATE TABLE `features` (
  `id` int(10) UNSIGNED NOT NULL,
  `room_id` int(10) UNSIGNED NOT NULL,
  `facility_id` int(10) UNSIGNED NOT NULL,
  `status` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `features`
--

INSERT INTO `features` (`id`, `room_id`, `facility_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, 1, '2021-04-08 03:58:25', '2021-04-09 08:34:37'),
(2, 1, 6, 1, '2021-04-08 03:58:26', '2021-04-09 08:34:37'),
(3, 1, 5, 1, '2021-04-08 03:58:26', '2021-04-09 08:34:37'),
(4, 1, 8, 1, '2021-04-08 03:58:27', '2021-04-09 08:34:37'),
(5, 1, 4, 0, '2021-04-08 03:58:27', '2021-04-09 08:29:40'),
(6, 1, 2, 0, '2021-04-08 03:58:27', '2021-04-09 08:29:40'),
(7, 1, 3, 1, '2021-04-08 03:58:28', '2021-04-09 08:34:37'),
(8, 1, 7, 1, '2021-04-08 03:58:28', '2021-04-09 08:34:37');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2019_08_19_000000_create_failed_jobs_table', 1),
(4, '2021_04_06_120714_create_rooms_table', 1),
(5, '2021_04_06_121030_create_facilities_table', 1),
(6, '2021_04_06_121124_create_features_table', 1),
(7, '2021_04_06_121500_create_bookings_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rooms`
--

CREATE TABLE `rooms` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `price` double NOT NULL,
  `quantity` int(11) NOT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `class` varchar(1) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `rooms`
--

INSERT INTO `rooms` (`id`, `name`, `slug`, `image`, `price`, `quantity`, `type`, `class`, `created_at`, `updated_at`) VALUES
(1, 'Room Number 1', 'room-number-1', 'kamar 1.jpg', 850000, 2, 'Couple', 'A', '2021-04-08 03:58:25', '2021-04-09 08:34:36');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `phone` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `role`, `phone`, `created_at`, `updated_at`) VALUES
(1, 'Aimar Yudhistira', 'admin@resthotel.co.id', '$2y$10$O5IoTEdpNTUGJ07GoWoEJuYWNFMgZiGyK.IcqL3jBQ6G2pwakK8MC', 'admin', '089530539114', '2021-04-07 22:35:45', '2021-04-07 22:35:45'),
(2, 'Uchiha Senjuu', 'user@resthotel.co.id', '$2y$10$a71y0455it0Sj9/dlGYh.OkbZ4JYaWf/t7MgHx7inlwC3fDZm3Ow6', 'user', '0895324774832', '2021-04-07 22:35:55', '2021-04-07 22:35:55');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD PRIMARY KEY (`id`),
  ADD KEY `bookings_user_id_foreign` (`user_id`),
  ADD KEY `bookings_room_id_foreign` (`room_id`);

--
-- Indeks untuk tabel `facilities`
--
ALTER TABLE `facilities`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `features`
--
ALTER TABLE `features`
  ADD PRIMARY KEY (`id`),
  ADD KEY `features_room_id_foreign` (`room_id`),
  ADD KEY `features_facility_id_foreign` (`facility_id`);

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
-- Indeks untuk tabel `rooms`
--
ALTER TABLE `rooms`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `rooms_slug_unique` (`slug`);

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
-- AUTO_INCREMENT untuk tabel `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `facilities`
--
ALTER TABLE `facilities`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `features`
--
ALTER TABLE `features`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `rooms`
--
ALTER TABLE `rooms`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bookings`
--
ALTER TABLE `bookings`
  ADD CONSTRAINT `bookings_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`),
  ADD CONSTRAINT `bookings_user_id_foreign` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `features`
--
ALTER TABLE `features`
  ADD CONSTRAINT `features_facility_id_foreign` FOREIGN KEY (`facility_id`) REFERENCES `facilities` (`id`),
  ADD CONSTRAINT `features_room_id_foreign` FOREIGN KEY (`room_id`) REFERENCES `rooms` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
