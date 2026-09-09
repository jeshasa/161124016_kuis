-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 09, 2026 at 09:41 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `knowms`
--

-- --------------------------------------------------------

--
-- Table structure for table `barangs`
--

CREATE TABLE `barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `harga` decimal(9,2) NOT NULL,
  `stok` int(11) NOT NULL DEFAULT 0,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `barangs`
--

INSERT INTO `barangs` (`id`, `nama`, `harga`, `stok`, `kategori_id`, `created_at`, `updated_at`) VALUES
(38, 'Nasi Goreng Spesial', 15000.00, 20, 1, '2026-09-09 00:26:45', '2026-09-09 00:26:45'),
(39, 'Ayam Goreng Lengkuas', 22000.00, 15, 1, '2026-09-09 00:26:45', '2026-09-09 00:26:45'),
(40, 'Bakso Sapi Urat', 18000.00, 25, 1, '2026-09-09 00:26:45', '2026-09-09 00:26:45'),
(41, 'Mie Ayam Jamur', 16000.00, 18, 1, '2026-09-09 00:26:45', '2026-09-09 00:26:45'),
(42, 'Mie Goreng Seafood', 20000.00, 12, 1, '2026-09-09 00:26:45', '2026-09-09 00:26:45'),
(43, 'Keripik Singkong Balado', 8000.00, 30, 2, '2026-09-09 00:26:45', '2026-09-09 00:26:45'),
(44, 'Kentang Goreng Crispy', 12000.00, 25, 2, '2026-09-09 00:26:45', '2026-09-09 00:26:45'),
(45, 'Roti Bakar Cokelat Keju', 14000.00, 15, 2, '2026-09-09 00:26:45', '2026-09-09 00:26:45'),
(46, 'Cireng Crispy Bumbu Rujak', 10000.00, 20, 2, '2026-09-09 00:26:45', '2026-09-09 00:26:45'),
(47, 'Jus Mangga Manalagi', 12000.00, 20, 3, '2026-09-09 00:26:45', '2026-09-09 00:26:45'),
(48, 'Jus Apel Segar', 13000.00, 18, 3, '2026-09-09 00:26:45', '2026-09-09 00:26:45'),
(49, 'Jus Alpukat Kocok', 15000.00, 15, 3, '2026-09-09 00:26:45', '2026-09-09 00:26:45'),
(50, 'Jus Jeruk Peras Dingin', 10000.00, 22, 3, '2026-09-09 00:26:45', '2026-09-09 00:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `cache`
--

CREATE TABLE `cache` (
  `key` varchar(255) NOT NULL,
  `value` mediumtext NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `cache_locks`
--

CREATE TABLE `cache_locks` (
  `key` varchar(255) NOT NULL,
  `owner` varchar(255) NOT NULL,
  `expiration` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `uuid` varchar(255) NOT NULL,
  `connection` text NOT NULL,
  `queue` text NOT NULL,
  `payload` longtext NOT NULL,
  `exception` longtext NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `informasis`
--

CREATE TABLE `informasis` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kategori_id` bigint(20) UNSIGNED NOT NULL,
  `judul` varchar(255) NOT NULL,
  `ringkasan` text NOT NULL,
  `isi` longtext NOT NULL,
  `sumber` varchar(255) DEFAULT NULL,
  `status` enum('draft','published') NOT NULL DEFAULT 'published',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `informasis`
--

INSERT INTO `informasis` (`id`, `kategori_id`, `judul`, `ringkasan`, `isi`, `sumber`, `status`, `created_at`, `updated_at`) VALUES
(6, 1, 'Resep Rahasia Nasi Goreng Spesial Restoran', 'Panduan lengkap cara memasak nasi goreng lezat dengan aroma harum khas wok restoran.', 'Kunci utama dari nasi goreng yang lezat adalah menggunakan nasi pera yang sudah diinapkan semalam di lemari es. \n\nGunakan api besar saat menumis bumbu halus (bawang merah, bawang putih, dan cabai) serta tambahkan sedikit kecap ikan dan saus tiram di pinggir wajan agar tercipta aroma smokey yang sedap.', 'Dapur Kuliner Nusantara', 'published', '2026-09-09 00:26:45', '2026-09-09 00:26:45'),
(7, 1, 'Tips Mengolah Daging Ayam Goreng Tetap Juicy dan Crispy', 'Teknik marinasi dan penggorengan agar daging ayam tidak kering saat disajikan.', 'Sebelum digoreng, lumuri ayam dengan perasan jeruk nipis dan garam, lalu marinasi minimal 30 menit dengan bawang putih halus, ketumbar, dan jahe. \n\nGoreng dengan metode deep-frying pada minyak bersuhu 170°C hingga berwarna kuning keemasan.', 'Chef Ragil Masterclass', 'published', '2026-09-09 00:26:45', '2026-09-09 00:26:45'),
(8, 3, 'Khasiat Jus Mangga dan Apel untuk Kesehatan Tubuh', 'Mengenal berbagai vitamin dan manfaat antioksidan dalam jus buah segar.', 'Jus buah segar seperti mangga dan apel kaya akan vitamin C, vitamin A, dan serat larut. \n\nMengonsumsi segelas jus buah dingin tanpa tambahan gula pasir berlebih sangat efektif untuk menjaga daya tahan tubuh, melancarkan pencernaan, dan menyegarkan stamina setelah beraktivitas.', 'Jurnal Gizi dan Kesehatan', 'published', '2026-09-09 00:26:45', '2026-09-09 00:26:45'),
(9, 2, 'Cara Menyimpan Stok Makanan Ringan Agar Tetap Renyah', 'Tips sederhana menjaga kerenyahan snack dan kerupuk dalam toples kedap udara.', 'Kelembapan udara adalah musuh utama kerenyahan camilan. Selalu simpan makanan ringan di dalam toples kedap udara dan letakkan di tempat yang sejuk serta terhindar dari paparan sinar matahari langsung.', 'Tips Dapur Harian', 'published', '2026-09-09 00:26:45', '2026-09-09 00:26:45'),
(10, 1, 'Draf Eksperimen Menu Baru: Sup Buntut Bakar Madu', 'Catatan formulasi bumbu bakar madu untuk menu baru bulan depan.', 'Menu ini masih dalam tahap uji coba di dapur internal. Mengkombinasikan buntut sapi empuk dengan olesan madu dan kecap manis sebelum dibakar di atas arang batok kelapa.', 'Catatan Dapur Internal', 'draft', '2026-09-09 00:26:45', '2026-09-09 00:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `queue` varchar(255) NOT NULL,
  `payload` longtext NOT NULL,
  `attempts` tinyint(3) UNSIGNED NOT NULL,
  `reserved_at` int(10) UNSIGNED DEFAULT NULL,
  `available_at` int(10) UNSIGNED NOT NULL,
  `created_at` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `job_batches`
--

CREATE TABLE `job_batches` (
  `id` varchar(255) NOT NULL,
  `name` varchar(255) NOT NULL,
  `total_jobs` int(11) NOT NULL,
  `pending_jobs` int(11) NOT NULL,
  `failed_jobs` int(11) NOT NULL,
  `failed_job_ids` longtext NOT NULL,
  `options` mediumtext DEFAULT NULL,
  `cancelled_at` int(11) DEFAULT NULL,
  `created_at` int(11) NOT NULL,
  `finished_at` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kategoris`
--

CREATE TABLE `kategoris` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kategoris`
--

INSERT INTO `kategoris` (`id`, `nama_kategori`, `deskripsi`, `created_at`, `updated_at`) VALUES
(1, 'Makanan Berat', 'ini adalah makan yang akan memberatkan perutmu', NULL, '2026-09-08 09:17:59'),
(2, 'Makanan Ringan', ' ini adalah makan yang akan meringankan perutmu', NULL, NULL),
(3, 'Jus', ' ini adalah minuman yang berasalah dari olahan buah', NULL, NULL),
(11, 'Makanan Berat', ' ini adalah makan yang akan memberatkan perutmu', NULL, NULL),
(12, 'Makanan Ringan', ' ini adalah makan yang akan meringankan perutmu', NULL, NULL),
(13, 'Jus', ' ini adalah minuman yang berasalah dari olahan buah', NULL, NULL),
(14, 'Soda', ' ini adalah minuman yang membuatmu bersendawa', NULL, NULL),
(15, 'Susu', ' ini adalah minuman yang menyehatkan', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int(10) UNSIGNED NOT NULL,
  `migration` varchar(255) NOT NULL,
  `batch` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '0001_01_01_000000_create_users_table', 1),
(2, '0001_01_01_000001_create_cache_table', 1),
(3, '0001_01_01_000002_create_jobs_table', 1),
(4, '2026_09_04_084335_create_kategoris_table', 1),
(5, '2026_09_04_084347_create_barangs_table', 1),
(6, '2026_09_08_054201_create_pegawais_table', 2),
(7, '2026_09_08_054300_create_pelanggans_table', 2),
(8, '2026_09_08_054400_create_notas_table', 2),
(9, '2026_09_08_054500_create_nota_barangs_table', 2),
(11, '2026_09_09_045603_create_informasis_table', 3);

-- --------------------------------------------------------

--
-- Table structure for table `notas`
--

CREATE TABLE `notas` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nomor_nota` varchar(50) NOT NULL,
  `tanggal` date NOT NULL,
  `pegawai_id` bigint(20) UNSIGNED NOT NULL,
  `pelanggan_id` bigint(20) UNSIGNED NOT NULL,
  `total_harga` decimal(12,2) NOT NULL DEFAULT 0.00,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `notas`
--

INSERT INTO `notas` (`id`, `nomor_nota`, `tanggal`, `pegawai_id`, `pelanggan_id`, `total_harga`, `created_at`, `updated_at`) VALUES
(5, 'NOTA-001', '2026-09-09', 1, 1, 52000.00, '2026-09-09 00:26:45', '2026-09-09 00:26:45'),
(6, 'NOTA-002', '2026-09-08', 1, 2, 45000.00, '2026-09-09 00:26:45', '2026-09-09 00:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `nota_barangs`
--

CREATE TABLE `nota_barangs` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nota_id` bigint(20) UNSIGNED NOT NULL,
  `barang_id` bigint(20) UNSIGNED NOT NULL,
  `jumlah` int(11) NOT NULL DEFAULT 1,
  `harga_satuan` decimal(9,2) NOT NULL,
  `subtotal` decimal(12,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nota_barangs`
--

INSERT INTO `nota_barangs` (`id`, `nota_id`, `barang_id`, `jumlah`, `harga_satuan`, `subtotal`, `created_at`, `updated_at`) VALUES
(7, 5, 38, 2, 15000.00, 30000.00, '2026-09-09 00:26:45', '2026-09-09 00:26:45'),
(8, 5, 39, 1, 22000.00, 22000.00, '2026-09-09 00:26:45', '2026-09-09 00:26:45'),
(9, 6, 38, 3, 15000.00, 45000.00, '2026-09-09 00:26:45', '2026-09-09 00:26:45');

-- --------------------------------------------------------

--
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pegawais`
--

CREATE TABLE `pegawais` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pegawais`
--

INSERT INTO `pegawais` (`id`, `nama`, `alamat`, `telepon`, `created_at`, `updated_at`) VALUES
(1, 'Budi Santoso', 'Jl. Merdeka No. 10, Jakarta', '081234567890', NULL, NULL),
(2, 'Siti Rahma', 'Jl. Mawar No. 45, Bandung', '081298765432', NULL, NULL),
(3, 'Ahmad Fauzi', 'Jl. Sudirman No. 12, Surabaya', '081377889900', NULL, NULL),
(4, 'Budi Santoso', 'Jl. Merdeka No. 10, Jakarta', '081234567890', NULL, NULL),
(5, 'Siti Rahma', 'Jl. Mawar No. 45, Bandung', '081298765432', NULL, NULL),
(6, 'Ahmad Fauzi', 'Jl. Sudirman No. 12, Surabaya', '081377889900', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pelanggans`
--

CREATE TABLE `pelanggans` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `alamat` text DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pelanggans`
--

INSERT INTO `pelanggans` (`id`, `nama`, `alamat`, `telepon`, `created_at`, `updated_at`) VALUES
(1, 'Andi Wijaya', 'Jl. Kenanga No. 5, Jakarta', '082111223344', NULL, NULL),
(2, 'Dewi Lestari', 'Jl. Melati No. 88, Yogyakarta', '085612345678', NULL, NULL),
(3, 'Rian Pratama', 'Jl. Diponegoro No. 17, Semarang', '087812349999', NULL, NULL),
(4, 'Andi Wijaya', 'Jl. Kenanga No. 5, Jakarta', '082111223344', NULL, NULL),
(5, 'Dewi Lestari', 'Jl. Melati No. 88, Yogyakarta', '085612345678', NULL, NULL),
(6, 'Rian Pratama', 'Jl. Diponegoro No. 17, Semarang', '087812349999', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) NOT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) DEFAULT NULL,
  `user_agent` text DEFAULT NULL,
  `payload` longtext NOT NULL,
  `last_activity` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('UxGTQZg654YM5yNdUvLxskClcnLwKCkCn3o8Nx2V', 1, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/152.0.0.0 Safari/537.36', 'YTo0OntzOjY6Il90b2tlbiI7czo0MDoicW4ySW5kNmdsU3VyZzRTTXBSQzR4WkRoYWcya0xmS2dOY01QbURQYiI7czo5OiJfcHJldmlvdXMiO2E6Mjp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9kYWZ0YXItaW5mb3JtYXNpIjtzOjU6InJvdXRlIjtzOjE2OiJpbmZvcm1hc2kuZGFmdGFyIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319czo1MDoibG9naW5fd2ViXzU5YmEzNmFkZGMyYjJmOTQwMTU4MGYwMTRjN2Y1OGVhNGUzMDk4OWQiO2k6MTt9', 1788939010);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 'Pegawai Kasir', 'pegawai@gmail.com', NULL, '$2y$12$UbLkkAHyW1O.NnQjh05V1exmXlbecWG1OpnxbmpmFFMFvfKDIx7ta', NULL, '2026-09-09 00:26:44', '2026-09-09 00:26:44');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barangs`
--
ALTER TABLE `barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `barangs_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `cache`
--
ALTER TABLE `cache`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_expiration_index` (`expiration`);

--
-- Indexes for table `cache_locks`
--
ALTER TABLE `cache_locks`
  ADD PRIMARY KEY (`key`),
  ADD KEY `cache_locks_expiration_index` (`expiration`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `informasis`
--
ALTER TABLE `informasis`
  ADD PRIMARY KEY (`id`),
  ADD KEY `informasis_kategori_id_foreign` (`kategori_id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jobs_queue_index` (`queue`);

--
-- Indexes for table `job_batches`
--
ALTER TABLE `job_batches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kategoris`
--
ALTER TABLE `kategoris`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notas`
--
ALTER TABLE `notas`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `notas_nomor_nota_unique` (`nomor_nota`),
  ADD KEY `notas_pegawai_id_foreign` (`pegawai_id`),
  ADD KEY `notas_pelanggan_id_foreign` (`pelanggan_id`);

--
-- Indexes for table `nota_barangs`
--
ALTER TABLE `nota_barangs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nota_barangs_nota_id_foreign` (`nota_id`),
  ADD KEY `nota_barangs_barang_id_foreign` (`barang_id`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pegawais`
--
ALTER TABLE `pegawais`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pelanggans`
--
ALTER TABLE `pelanggans`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

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
-- AUTO_INCREMENT for table `barangs`
--
ALTER TABLE `barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `informasis`
--
ALTER TABLE `informasis`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kategoris`
--
ALTER TABLE `kategoris`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `notas`
--
ALTER TABLE `notas`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `nota_barangs`
--
ALTER TABLE `nota_barangs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pegawais`
--
ALTER TABLE `pegawais`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `pelanggans`
--
ALTER TABLE `pelanggans`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barangs`
--
ALTER TABLE `barangs`
  ADD CONSTRAINT `barangs_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`);

--
-- Constraints for table `informasis`
--
ALTER TABLE `informasis`
  ADD CONSTRAINT `informasis_kategori_id_foreign` FOREIGN KEY (`kategori_id`) REFERENCES `kategoris` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `notas`
--
ALTER TABLE `notas`
  ADD CONSTRAINT `notas_pegawai_id_foreign` FOREIGN KEY (`pegawai_id`) REFERENCES `pegawais` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `notas_pelanggan_id_foreign` FOREIGN KEY (`pelanggan_id`) REFERENCES `pelanggans` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nota_barangs`
--
ALTER TABLE `nota_barangs`
  ADD CONSTRAINT `nota_barangs_barang_id_foreign` FOREIGN KEY (`barang_id`) REFERENCES `barangs` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nota_barangs_nota_id_foreign` FOREIGN KEY (`nota_id`) REFERENCES `notas` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
