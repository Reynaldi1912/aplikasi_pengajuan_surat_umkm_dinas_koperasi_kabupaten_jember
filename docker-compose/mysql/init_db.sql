-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Okt 2021 pada 18.29
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 7.3.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `proyek2`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` int(10) UNSIGNED NOT NULL,
  `scan_ktp` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `pas_foto_berwarna` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `foto_produk` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `surat_pernyataan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sku_dari_desa` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `sertifikat` text COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `berkas`
--

INSERT INTO `berkas` (`id_berkas`, `scan_ktp`, `pas_foto_berwarna`, `foto_produk`, `surat_pernyataan`, `sku_dari_desa`, `sertifikat`, `created_at`, `updated_at`) VALUES
(1, 'ktp.png', 'pas_foto.jpeg', 'makanan.jpg', 'sp.jpeg', 'sku.png', '1633883093.png', NULL, '2021-10-10 09:24:53'),
(18, '16338823221.png', '16338823223.jpg', '16338823222.jpg', '16338823224.jpg', '16338823225.png', NULL, '2021-10-10 09:12:02', '2021-10-10 09:12:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_diri`
--

CREATE TABLE `data_diri` (
  `id_data_diri` int(10) UNSIGNED NOT NULL,
  `nama_pengaju` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `kelurahan_desa` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `dusun_jalan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kecamatan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telp` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `data_diri`
--

INSERT INTO `data_diri` (`id_data_diri`, `nama_pengaju`, `tanggal_pengajuan`, `kelurahan_desa`, `dusun_jalan`, `kecamatan`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 'Vina TabiTabi', '2021-10-07', 'Desa Krasak', 'Dusun Gondang ', 'Kedungjajang', '08123456789', NULL, NULL),
(53, 'Sinarmi', '2021-10-10', 'Desa Selok', 'Dusun LimaKarang', 'Kedungjajang', '08123456789', '2021-10-10 09:12:02', '2021-10-10 09:12:02');

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
-- Struktur dari tabel `konsultasi`
--

CREATE TABLE `konsultasi` (
  `id_konsultasi` int(10) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `nama_pengaju` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_pengajuan` date NOT NULL,
  `sesi_konsultasi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_konsultasi` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `konsultasi`
--

INSERT INTO `konsultasi` (`id_konsultasi`, `users_id`, `nama_pengaju`, `tanggal_pengajuan`, `sesi_konsultasi`, `keterangan`, `status_konsultasi`, `created_at`, `updated_at`) VALUES
(7, 3, 'Sinarmi', '2021-10-10', '2 , 12.00', 'Konsultasi Tentang Usaha Rintisan', 'selesai_konsul', '2021-10-10 09:16:59', '2021-10-10 09:21:10');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konsultasi_ditolak`
--

CREATE TABLE `konsultasi_ditolak` (
  `id_konsultasi_ditolak` int(10) UNSIGNED NOT NULL,
  `konsultasi_id` int(10) UNSIGNED NOT NULL,
  `keterangan` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `konsultasi_ditolak`
--

INSERT INTO `konsultasi_ditolak` (`id_konsultasi_ditolak`, `konsultasi_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(5, 7, 'Alasan Tidak Jelas', '2021-10-10 09:18:35', '2021-10-10 09:18:35');

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
(20, '2014_10_12_000000_create_users_table', 1),
(21, '2014_10_12_100000_create_password_resets_table', 1),
(22, '2019_08_19_000000_create_failed_jobs_table', 1),
(23, '2021_10_07_053831_create_pengajuan_table', 1),
(24, '2021_10_07_054551_create_konsultasi_table', 1),
(25, '2021_10_07_054909_create_data_diri_table', 1),
(26, '2021_10_07_055045_create_usaha_table', 1),
(27, '2021_10_07_055355_create_berkas_table', 1),
(28, '2021_10_07_055617_create_nilai_usaha_table', 1),
(29, '2021_10_07_062418_create_konsultasi_ditolak_table', 1),
(30, '2021_10_07_071009_add_pengajuan_table', 1),
(31, '2021_10_07_071312_add_konsultasi_table', 1),
(32, '2021_10_07_071342_add_usaha_table', 1),
(33, '2021_10_07_071419_add_konsultasi_ditolak_table', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai_usaha`
--

CREATE TABLE `nilai_usaha` (
  `id_nilai_usaha` int(10) UNSIGNED NOT NULL,
  `modal_usaha` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asset` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `omset` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keuntungan` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jumlah_tenaga_kerja` int(11) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `nilai_usaha`
--

INSERT INTO `nilai_usaha` (`id_nilai_usaha`, `modal_usaha`, `asset`, `omset`, `keuntungan`, `jumlah_tenaga_kerja`, `created_at`, `updated_at`) VALUES
(1, '30.000.000', '50.000.000', '4.000.000', '1.000.000', 3, NULL, NULL),
(52, '4000000', '3000000', '2000000', '1000000', 10, '2021-10-10 09:12:02', '2021-10-10 09:12:02');

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
-- Struktur dari tabel `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(10) UNSIGNED NOT NULL,
  `users_id` bigint(20) UNSIGNED NOT NULL,
  `data_diri_id` int(10) UNSIGNED NOT NULL,
  `usaha_id` int(10) UNSIGNED NOT NULL,
  `berkas_id` int(10) UNSIGNED NOT NULL,
  `status` varchar(50) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `users_id`, `data_diri_id`, `usaha_id`, `berkas_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 2, 1, 1, 1, 'sertifikat tertandatangan', NULL, '2021-10-10 09:24:53'),
(9, 3, 53, 51, 1, 'ditolak', '2021-10-10 09:12:02', '2021-10-10 09:15:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengajuan_ditolak`
--

CREATE TABLE `pengajuan_ditolak` (
  `id_pengajuan_ditolak` int(11) UNSIGNED NOT NULL,
  `pengajuan_id` int(11) UNSIGNED NOT NULL,
  `keterangan` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pengajuan_ditolak`
--

INSERT INTO `pengajuan_ditolak` (`id_pengajuan_ditolak`, `pengajuan_id`, `keterangan`, `created_at`, `updated_at`) VALUES
(63, 1, 'Desa Salah Mas', '2021-10-07 06:08:27', '2021-10-07 06:08:27'),
(72, 9, 'Nama Pengaju Tidak lengkap', '2021-10-10 09:15:13', '2021-10-10 09:15:13'),
(73, 9, 'Nama Dusun Tidak ada', '2021-10-10 09:15:13', '2021-10-10 09:15:13'),
(74, 9, 'salah upload foto', '2021-10-10 09:15:13', '2021-10-10 09:15:13'),
(75, 9, 'SK tidak diisi dengan benar', '2021-10-10 09:15:13', '2021-10-10 09:15:13'),
(76, 9, 'Nama Toko sudah ada', '2021-10-10 09:15:13', '2021-10-10 09:15:13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `usaha`
--

CREATE TABLE `usaha` (
  `id_usaha` int(10) UNSIGNED NOT NULL,
  `nilai_usaha_id` int(10) UNSIGNED NOT NULL,
  `nama_usaha` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_usaha` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kegiatan_usaha` varchar(100) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_usaha_mulai` date NOT NULL,
  `pinjaman_dana` tinyint(1) NOT NULL,
  `ikut_pembinaan_usaha` tinyint(1) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `usaha`
--

INSERT INTO `usaha` (`id_usaha`, `nilai_usaha_id`, `nama_usaha`, `jenis_usaha`, `kegiatan_usaha`, `tanggal_usaha_mulai`, `pinjaman_dana`, `ikut_pembinaan_usaha`, `created_at`, `updated_at`) VALUES
(1, 1, 'Lima Jaya', 'Pertanian', 'Penjualan Beras', '2021-10-08', 1, 0, NULL, NULL),
(51, 52, 'Lima Jaya', 'Perdagangan', 'Penjualan Hasil Tangkap Ikan', '2020-01-10', 1, 0, '2021-10-10 09:12:02', '2021-10-10 09:12:02');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `username` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `role` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `role`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Reynaldi', 'nexrey19@gmail.com', 'admin', NULL, '$2y$10$1sWT5fDZh8dD0MlMfX1eYOs/vxRYCkn3EcBneBkQ9DaxodtSELNI2', NULL, '2021-10-07 00:40:35', '2021-10-07 00:40:35'),
(2, 'Vina TabiTabi', 'reynaldi.rl14@gmail.com', 'user', NULL, '$2y$10$7f5mMw/4J0kcBNyOpfGNauidDMadcvshARSYWZmIRSH0eb8UQqN2u', NULL, '2021-10-07 00:55:36', '2021-10-07 00:55:36'),
(3, 'sinarmi', 'coc847964@gmail.com', 'user', NULL, '$2y$10$5j./wjV8w.HGiI8Pe/Pe4eBK9y19fvw6pyzHA5Vux6NpTHKxGmE4y', NULL, '2021-10-09 02:53:21', '2021-10-09 02:53:21');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`);

--
-- Indeks untuk tabel `data_diri`
--
ALTER TABLE `data_diri`
  ADD PRIMARY KEY (`id_data_diri`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indeks untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD PRIMARY KEY (`id_konsultasi`),
  ADD KEY `konsultasi_users_id_foreign` (`users_id`);

--
-- Indeks untuk tabel `konsultasi_ditolak`
--
ALTER TABLE `konsultasi_ditolak`
  ADD PRIMARY KEY (`id_konsultasi_ditolak`),
  ADD KEY `konsultasi_ditolak_konsultasi_id_foreign` (`konsultasi_id`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `nilai_usaha`
--
ALTER TABLE `nilai_usaha`
  ADD PRIMARY KEY (`id_nilai_usaha`);

--
-- Indeks untuk tabel `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indeks untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`),
  ADD KEY `pengajuan_users_id_foreign` (`users_id`),
  ADD KEY `pengajuan_data_diri_id_foreign` (`data_diri_id`),
  ADD KEY `pengajuan_usaha_id_foreign` (`usaha_id`),
  ADD KEY `pengajuan_berkas_id_foreign` (`berkas_id`);

--
-- Indeks untuk tabel `pengajuan_ditolak`
--
ALTER TABLE `pengajuan_ditolak`
  ADD PRIMARY KEY (`id_pengajuan_ditolak`),
  ADD KEY `pengajuan_id` (`pengajuan_id`);

--
-- Indeks untuk tabel `usaha`
--
ALTER TABLE `usaha`
  ADD PRIMARY KEY (`id_usaha`),
  ADD KEY `usaha_nilai_usaha_id_foreign` (`nilai_usaha_id`);

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
-- AUTO_INCREMENT untuk tabel `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_berkas` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `data_diri`
--
ALTER TABLE `data_diri`
  MODIFY `id_data_diri` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  MODIFY `id_konsultasi` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `konsultasi_ditolak`
--
ALTER TABLE `konsultasi_ditolak`
  MODIFY `id_konsultasi_ditolak` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `nilai_usaha`
--
ALTER TABLE `nilai_usaha`
  MODIFY `id_nilai_usaha` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=53;

--
-- AUTO_INCREMENT untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `pengajuan_ditolak`
--
ALTER TABLE `pengajuan_ditolak`
  MODIFY `id_pengajuan_ditolak` int(11) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT untuk tabel `usaha`
--
ALTER TABLE `usaha`
  MODIFY `id_usaha` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `konsultasi`
--
ALTER TABLE `konsultasi`
  ADD CONSTRAINT `konsultasi_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `konsultasi_ditolak`
--
ALTER TABLE `konsultasi_ditolak`
  ADD CONSTRAINT `konsultasi_ditolak_konsultasi_id_foreign` FOREIGN KEY (`konsultasi_id`) REFERENCES `konsultasi` (`id_konsultasi`);

--
-- Ketidakleluasaan untuk tabel `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD CONSTRAINT `pengajuan_berkas_id_foreign` FOREIGN KEY (`berkas_id`) REFERENCES `berkas` (`id_berkas`),
  ADD CONSTRAINT `pengajuan_data_diri_id_foreign` FOREIGN KEY (`data_diri_id`) REFERENCES `data_diri` (`id_data_diri`),
  ADD CONSTRAINT `pengajuan_usaha_id_foreign` FOREIGN KEY (`usaha_id`) REFERENCES `usaha` (`id_usaha`),
  ADD CONSTRAINT `pengajuan_users_id_foreign` FOREIGN KEY (`users_id`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `pengajuan_ditolak`
--
ALTER TABLE `pengajuan_ditolak`
  ADD CONSTRAINT `pengajuan_ditolak_ibfk_1` FOREIGN KEY (`pengajuan_id`) REFERENCES `pengajuan` (`id_pengajuan`);

--
-- Ketidakleluasaan untuk tabel `usaha`
--
ALTER TABLE `usaha`
  ADD CONSTRAINT `usaha_nilai_usaha_id_foreign` FOREIGN KEY (`nilai_usaha_id`) REFERENCES `nilai_usaha` (`id_nilai_usaha`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
