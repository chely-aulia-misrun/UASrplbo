-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Dec 17, 2021 at 03:46 PM
-- Server version: 5.7.33
-- PHP Version: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rplbochely`
--

-- --------------------------------------------------------

--
-- Table structure for table `eskul`
--

CREATE TABLE `eskul` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `eskul`
--

INSERT INTO `eskul` (`id`, `nama`, `deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'nama', 'nama', '2021-12-10 20:43:08', '2021-12-10 20:43:08', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(11) NOT NULL,
  `nip` varchar(16) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `nip`, `user_id`, `nama`, `created_at`, `updated_at`, `deleted_at`) VALUES
(4, '12341234', 7, 'Guru 1', '2021-12-16 13:58:48', '2021-12-16 13:58:48', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `mata_pelajaran_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `guru_id` int(11) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `jam` time NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `mata_pelajaran_id`, `kelas_id`, `guru_id`, `hari`, `jam`, `created_at`, `updated_at`, `deleted_at`) VALUES
(5, 1, 3, 4, 'Senin', '20:59:00', '2021-12-16 13:59:53', '2021-12-16 13:59:53', NULL),
(6, 2, 3, 4, 'Selasa', '21:59:00', '2021-12-16 13:59:53', '2021-12-16 13:59:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(11) NOT NULL,
  `tahun_ajaran_id` int(11) NOT NULL,
  `tingkat` varchar(4) NOT NULL,
  `wali_kelas_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `siswa` json NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `tahun_ajaran_id`, `tingkat`, `wali_kelas_id`, `nama`, `siswa`, `created_at`, `updated_at`, `deleted_at`) VALUES
(3, 1, 'VIII', 4, 'A', '[1]', '2021-12-16 13:59:53', '2021-12-16 13:59:53', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kurikulum`
--

CREATE TABLE `kurikulum` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `deskripsi` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `kurikulum`
--

INSERT INTO `kurikulum` (`id`, `nama`, `deskripsi`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'kurikulum 1', 'awdwadwa', '2021-12-10 20:48:07', '2021-12-10 20:48:07', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `id` int(11) NOT NULL,
  `kurikulum_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `kkm` int(11) NOT NULL,
  `kelompok` enum('A','B') DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`id`, `kurikulum_id`, `nama`, `kkm`, `kelompok`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'mp1', 80, NULL, '2021-12-10 21:00:43', '2021-12-10 21:00:43', NULL),
(2, 1, 'ayam', 90, NULL, '2021-12-11 00:10:10', '2021-12-11 00:10:10', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `rapor_id` int(11) NOT NULL,
  `mata_pelajaran_id` int(11) NOT NULL,
  `nilai_pengetahuan` int(11) DEFAULT NULL,
  `predikat_pengetahuan` enum('A','B','C','D') DEFAULT NULL,
  `deskripsi_pengetahuan` text,
  `nilai_keterampilan` int(11) DEFAULT NULL,
  `predikat_keterampilan` enum('A','B','C','D') DEFAULT NULL,
  `deskripsi_keterampilan` text,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `rapor_id`, `mata_pelajaran_id`, `nilai_pengetahuan`, `predikat_pengetahuan`, `deskripsi_pengetahuan`, `nilai_keterampilan`, `predikat_keterampilan`, `deskripsi_keterampilan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 2, 1, 80, 'A', NULL, NULL, NULL, NULL, '2021-12-16 16:59:01', '2021-12-17 02:46:28', NULL),
(2, 2, 2, NULL, NULL, NULL, NULL, NULL, NULL, '2021-12-16 16:59:01', '2021-12-16 16:59:01', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `rapor`
--

CREATE TABLE `rapor` (
  `id` int(11) NOT NULL,
  `siswa_id` int(11) NOT NULL,
  `tahun_ajaran_id` int(11) NOT NULL,
  `kelas_id` int(11) NOT NULL,
  `predikat_spiritual` enum('A','B','C','D') DEFAULT NULL,
  `deskripsi_spiritual` text,
  `predikat_sosial` enum('A','B','C','D') DEFAULT NULL,
  `deskripsi_sosial` text,
  `eskul` json NOT NULL,
  `sakit` int(11) NOT NULL,
  `izin` int(11) NOT NULL,
  `tanpa_keterangan` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `rapor`
--

INSERT INTO `rapor` (`id`, `siswa_id`, `tahun_ajaran_id`, `kelas_id`, `predikat_spiritual`, `deskripsi_spiritual`, `predikat_sosial`, `deskripsi_sosial`, `eskul`, `sakit`, `izin`, `tanpa_keterangan`, `created_at`, `updated_at`, `deleted_at`) VALUES
(2, 1, 1, 3, 'B', NULL, 'B', NULL, '[1]', 0, 0, 0, '2021-12-16 16:59:01', '2021-12-16 17:00:05', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `sekolah`
--

CREATE TABLE `sekolah` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `alamat` text NOT NULL,
  `kepala_sekolah` varchar(255) NOT NULL,
  `nip_kepala_sekolah` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sekolah`
--

INSERT INTO `sekolah` (`id`, `nama`, `alamat`, `kepala_sekolah`, `nip_kepala_sekolah`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'MAN 3', 'adwadwad', 'DADWADA', '12313131', '2021-12-11 04:19:47', '2021-12-10 21:26:19', '2021-12-10 21:26:19'),
(2, 'MAN 3', 'adwadwad', 'DADWADA', '12313131', '2021-12-10 21:26:19', '2021-12-10 21:26:22', '2021-12-10 21:26:22'),
(3, 'MAN 3', 'adwadwad', 'DADWADA', '12313131', '2021-12-10 21:26:22', '2021-12-10 21:26:22', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nis` varchar(255) NOT NULL,
  `nisn` varchar(255) NOT NULL,
  `tempat_lahir` varchar(255) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `is_aktif` int(11) NOT NULL,
  `tahun_masuk` year(4) NOT NULL,
  `tahun_keluar` year(4) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `user_id`, `nama`, `nis`, `nisn`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `is_aktif`, `tahun_masuk`, `tahun_keluar`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 6, 'favian', '12345', '12341234', 'dwadad', '2021-12-11', 'Laki-laki', 1, 2000, 2020, '2021-12-11 03:41:13', '2021-12-11 03:41:13', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tahun_ajaran`
--

CREATE TABLE `tahun_ajaran` (
  `id` int(11) NOT NULL,
  `kurikulum_id` int(11) NOT NULL,
  `tahun_aktif` varchar(255) NOT NULL,
  `semester` enum('Ganjil','Genap') NOT NULL,
  `tanggal_rapor` date NOT NULL,
  `is_aktif` int(11) NOT NULL,
  `nama_kepala_sekolah` varchar(255) NOT NULL,
  `nip_kepala_sekolah` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tahun_ajaran`
--

INSERT INTO `tahun_ajaran` (`id`, `kurikulum_id`, `tahun_aktif`, `semester`, `tanggal_rapor`, `is_aktif`, `nama_kepala_sekolah`, `nip_kepala_sekolah`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, '2021/2022', 'Ganjil', '1999-05-04', 1, 'DADWADA', '12313131', '2021-12-10 21:45:33', '2021-12-10 21:45:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `tingkat`
--

CREATE TABLE `tingkat` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `id_masuk` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `role` enum('Admin','Non-admin','Siswa') NOT NULL,
  `is_aktif` tinyint(4) NOT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `deleted_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `id_masuk`, `nama`, `role`, `is_aktif`, `password`, `remember_token`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 'admin', 'admin', 'Admin', 1, '$2y$10$Pp1vrF2ExbeEYRuap/.p8.Pxdry4ZiBw9OVU3ACDW0fEgf.Kmiq0y', NULL, '2021-12-01 04:07:42', '2021-12-01 04:07:42', NULL),
(6, '12345', 'favian', 'Siswa', 1, '$2y$10$KS2NNTan/oGx7KhBNJXtkO8jRxp/KjPAbjmjjeTUdp6bfPQlxIOEC', NULL, '2021-12-11 03:41:13', '2021-12-17 15:21:08', NULL),
(7, '12341234', 'Guru 1', 'Non-admin', 1, '$2y$10$wTYA1NkVuXucKM1hHW9PCO1QFXuKv5Pa9bXC8SnAZb5dgbyczai1m', NULL, '2021-12-16 13:58:48', '2021-12-17 15:10:20', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `eskul`
--
ALTER TABLE `eskul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `kurikulum`
--
ALTER TABLE `kurikulum`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `rapor`
--
ALTER TABLE `rapor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sekolah`
--
ALTER TABLE `sekolah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tingkat`
--
ALTER TABLE `tingkat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `eskul`
--
ALTER TABLE `eskul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `kurikulum`
--
ALTER TABLE `kurikulum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `rapor`
--
ALTER TABLE `rapor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `sekolah`
--
ALTER TABLE `sekolah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tahun_ajaran`
--
ALTER TABLE `tahun_ajaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tingkat`
--
ALTER TABLE `tingkat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
