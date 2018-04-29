-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 29 Apr 2018 pada 18.19
-- Versi Server: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `e-absen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen`
--

CREATE TABLE `absen` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `keterangan` enum('Sakit','Alpa','Izin') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `absen`
--

INSERT INTO `absen` (`id`, `siswa_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(11, 4, 'Sakit', '2018-04-23 17:00:00', '2018-04-14 17:00:00'),
(12, 1, 'Sakit', '2018-04-28 10:02:28', '2018-04-28 10:02:28'),
(14, 1, 'Sakit', '2018-04-28 20:05:47', '2018-04-28 20:05:47'),
(15, 2, 'Sakit', '2018-04-29 00:13:19', '2018-04-29 00:13:19'),
(16, 6, 'Izin', '2018-04-29 00:45:48', '2018-04-29 00:45:48'),
(17, 5, 'Sakit', '2018-04-29 00:46:27', '2018-04-29 00:46:27'),
(18, 4, 'Sakit', '2018-04-29 01:10:22', '2018-04-29 01:10:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `absen_gurus`
--

CREATE TABLE `absen_gurus` (
  `id` int(10) UNSIGNED NOT NULL,
  `guru_id` int(10) UNSIGNED NOT NULL,
  `keterangan` enum('Sakit','Alpa','Izin') COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `id` int(10) UNSIGNED NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `mapel` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`id`, `nama`, `mapel`, `email`, `created_at`, `updated_at`) VALUES
(1, 'Sutisna', 'IPS', 'sutisna@sutisna.sutisna', '2018-04-28 19:32:40', '2018-04-28 19:32:40');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) NOT NULL,
  `nama_kelas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`id`, `nama_kelas`) VALUES
(1, 'XII - RPL 1'),
(2, 'XII - RPL 2'),
(3, 'XII TKJ - 1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `migration` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`migration`, `batch`) VALUES
('2014_10_12_000000_create_users_table', 1),
('2014_10_12_100000_create_password_resets_table', 1),
('2017_08_13_072141_create_siswas_table', 1),
('2017_08_13_102845_create_gurus_table', 1),
('2017_08_13_122853_create_absens_table', 1),
('2017_08_14_072438_create_absen_gurus_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `password_resets`
--

CREATE TABLE `password_resets` (
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `kelas_id` int(10) NOT NULL,
  `nama` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `alamat` text COLLATE utf8_unicode_ci NOT NULL,
  `ttl` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`id`, `kelas_id`, `nama`, `alamat`, `ttl`, `created_at`, `updated_at`) VALUES
(1, 1, 'Dhafa Gustiadi Kurniawan', '', '16-08-2000', '2018-04-28 05:19:39', '2018-04-28 07:41:23'),
(2, 1, 'ss', '', '07-04-2018', '2018-04-28 05:20:48', '2018-04-28 05:20:48'),
(4, 2, 'Asede', '', '01-04-2018', '2018-04-28 05:26:27', '2018-04-28 05:26:27'),
(5, 1, 'Ucok', '', '05-04-2018', '2018-04-28 05:37:32', '2018-04-28 05:37:32'),
(6, 2, 'Halo', '', '03-04-2018', '2018-04-28 05:59:55', '2018-04-28 05:59:55'),
(7, 1, 'Mengapa', '', '04-04-2018', '2018-04-28 10:09:23', '2018-04-28 10:09:23'),
(8, 1, 'Nur Hidayatullah', '', '12-04-2018', '2018-04-28 19:42:42', '2018-04-28 19:42:42'),
(9, 1, 'Sela', '', '04-04-2018', '2018-04-28 19:54:22', '2018-04-28 19:54:22');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8_unicode_ci DEFAULT NULL,
  `level` int(11) NOT NULL DEFAULT '1',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `remember_token`, `level`, `created_at`, `updated_at`) VALUES
(1, 'Admin', 'adm@gmail.com', '$2y$10$ZT/26wEWofy02fwU5Raxi.KZj1gZJc4bur.uDD/Vk5y1r.l0tDF7K', 'HZugN1JRLyH9XYEeHXEwT5xvGScWa2VvOTcSwya5jQFhVzyV3ObwccLjMY3X', 0, '2018-04-28 04:35:35', '2018-04-29 08:50:29'),
(2, 'saya guru', 'guru@guru.guru', '$2y$10$bjx5DzIkObdrw/EZS7.X7uzaQ81.7/4sMBAcNby.aTuQTX82o3f16', '6haNqkfRzGirkcsRbZ8dB74vzZ0g3Y4Q1C2eew1zsAusThx4Gu0lHryDWYTI', 1, '2018-04-29 06:05:10', '2018-04-29 08:17:39');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `absen`
--
ALTER TABLE `absen`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absen_siswa_id_foreign` (`siswa_id`);

--
-- Indexes for table `absen_gurus`
--
ALTER TABLE `absen_gurus`
  ADD PRIMARY KEY (`id`),
  ADD KEY `absen_gurus_guru_id_foreign` (`guru_id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`),
  ADD KEY `password_resets_token_index` (`token`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `siswa_kelas_foreign` (`kelas_id`);

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
-- AUTO_INCREMENT for table `absen`
--
ALTER TABLE `absen`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `absen_gurus`
--
ALTER TABLE `absen_gurus`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `absen`
--
ALTER TABLE `absen`
  ADD CONSTRAINT `absen_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `absen_gurus`
--
ALTER TABLE `absen_gurus`
  ADD CONSTRAINT `absen_gurus_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD CONSTRAINT `siswa_kelas_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
