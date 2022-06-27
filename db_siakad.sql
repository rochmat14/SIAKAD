-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 11, 2022 at 04:41 PM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 7.1.25

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakulikuler`
--

CREATE TABLE `ekstrakulikuler` (
  `id` int(10) UNSIGNED NOT NULL,
  `ekstrakulikuler` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ekstrakulikuler`
--

INSERT INTO `ekstrakulikuler` (`id`, `ekstrakulikuler`, `created_at`, `updated_at`) VALUES
(3, 'Paskibraka', '2020-10-23 21:20:03', '2022-06-03 18:35:24'),
(4, 'Drumben', '2020-11-03 07:12:15', '2020-11-03 07:12:15'),
(5, 'Pramuka', '2022-05-10 20:14:30', '2022-05-10 20:14:30'),
(6, 'pencak silat', '2022-06-03 18:24:38', '2022-06-03 18:24:38');

-- --------------------------------------------------------

--
-- Table structure for table `ekstrakulikuler_siswa`
--

CREATE TABLE `ekstrakulikuler_siswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `ekstrakulikuler_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ekstrakulikuler_siswa`
--

INSERT INTO `ekstrakulikuler_siswa` (`id`, `siswa_id`, `ekstrakulikuler_id`, `created_at`, `updated_at`) VALUES
(9, 1, 3, NULL, NULL),
(12, 2, 4, NULL, NULL),
(14, 4, 6, NULL, NULL),
(16, 5, 4, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE `guru` (
  `id` int(10) UNSIGNED NOT NULL,
  `noRef` varchar(20) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nip` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`id`, `noRef`, `nip`, `nama`, `jenis_kelamin`, `alamat`, `created_at`, `updated_at`) VALUES
(20, 'GR-1', '1987465', 'Anggun Maharani S.Kom M.H', 'Perempuan', 'Jl. MANGKUSUMO ADI WOJOYONO', '2020-10-12 08:00:09', '2022-06-08 09:00:25'),
(24, 'GR-4', '12345', 'samarudin simanjuntak', 'Laki-Laki', 'jl bangun ruang', '2021-01-18 20:31:26', '2021-01-18 20:31:26'),
(25, 'GR-5', '1234', 'setia budi', 'Laki-Laki', 'jl.manjuntak', '2021-01-18 20:35:30', '2021-01-18 20:35:30');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(10) UNSIGNED NOT NULL,
  `tahunAjaran_id` int(10) UNSIGNED NOT NULL,
  `semester` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `hari` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `waktu_mulai` time NOT NULL,
  `waktu_selesai` time NOT NULL,
  `guru_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `tahunAjaran_id`, `semester`, `nama_kelas`, `mapel_id`, `hari`, `waktu_mulai`, `waktu_selesai`, `guru_id`, `created_at`, `updated_at`) VALUES
(2, 1, 'Genap', 'VII A', 2, 'Kamis', '09:00:00', '10:14:00', 20, '2020-10-12 16:58:03', '2020-12-13 17:09:27'),
(3, 1, 'Ganjil', 'VIII A', 1, 'Sabtu', '11:00:00', '14:00:00', 20, '2020-10-13 18:33:04', '2020-12-13 17:09:42'),
(4, 1, 'Ganjil', 'IX B', 6, 'Kamis', '09:00:00', '10:00:00', 24, '2022-04-24 21:16:56', '2022-04-24 21:16:56');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE `kelas` (
  `id` int(10) UNSIGNED NOT NULL,
  `tahunAjaran_id` int(10) UNSIGNED NOT NULL,
  `nama_kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `guru_id` int(10) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id`, `tahunAjaran_id`, `nama_kelas`, `guru_id`, `created_at`, `updated_at`) VALUES
(2, 2, 'VIII A', 20, '2020-10-12 17:56:21', '2020-12-13 17:02:33'),
(4, 2, 'IX A', 20, '2020-10-12 18:08:24', '2022-06-04 21:49:41'),
(5, 1, 'IX B', 24, '2022-04-23 22:50:17', '2022-04-23 23:08:32');

-- --------------------------------------------------------

--
-- Table structure for table `kkm`
--

CREATE TABLE `kkm` (
  `id` int(10) UNSIGNED NOT NULL,
  `idRef` int(11) UNSIGNED NOT NULL,
  `tahunAjaran_id` int(10) UNSIGNED DEFAULT NULL,
  `nama_kelas` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `kkm` double(8,2) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `kkm`
--

INSERT INTO `kkm` (`id`, `idRef`, `tahunAjaran_id`, `nama_kelas`, `mapel_id`, `kkm`, `created_at`, `updated_at`) VALUES
(15, 5, 1, 'VII A', 4, 65.00, '2020-12-13 21:53:41', '2022-03-26 20:16:20'),
(16, 5, 1, 'VIII A', 4, 69.00, '2020-12-13 21:53:41', '2022-03-26 20:16:21'),
(17, 5, 1, 'IX A', 4, 70.00, '2020-12-13 21:53:41', '2022-03-26 20:16:21'),
(18, 5, 1, 'IX B', 4, 80.00, '2020-12-13 21:53:41', '2022-03-26 20:16:21'),
(19, 6, 1, 'VII A', 5, 79.00, '2020-12-13 21:54:04', '2022-03-26 20:17:12'),
(20, 6, 1, 'VIII A', 5, 77.00, '2020-12-13 21:54:04', '2022-03-26 20:17:12'),
(21, 6, 1, 'IX A', 5, 78.00, '2020-12-13 21:54:04', '2022-03-26 20:17:12'),
(22, 6, 1, 'IX B', 5, 70.00, '2020-12-13 21:54:04', '2022-03-26 20:17:12'),
(23, 7, 1, 'VII A', 6, 77.00, '2020-12-13 21:54:22', '2022-03-26 20:17:59'),
(24, 7, 1, 'VIII A', 6, 79.00, '2020-12-13 21:54:22', '2022-03-26 20:17:59'),
(25, 7, 1, 'IX A', 6, 80.00, '2020-12-13 21:54:22', '2022-03-26 20:17:59'),
(26, 7, 1, 'IX B', 6, 85.00, '2020-12-13 21:54:22', '2022-03-26 20:17:59'),
(27, 8, 1, 'VII A', 7, 77.00, '2020-12-13 21:54:43', '2022-03-26 20:18:36'),
(28, 8, 1, 'VIII A', 7, 80.00, '2020-12-13 21:54:43', '2022-03-26 20:18:36'),
(29, 8, 1, 'IX A', 7, 89.00, '2020-12-13 21:54:43', '2022-03-26 20:18:36'),
(30, 8, 1, 'IX B', 7, 67.00, '2020-12-13 21:54:43', '2022-03-26 20:18:36'),
(31, 9, 1, 'VII A', 8, 89.00, '2020-12-13 21:54:59', '2022-03-26 20:19:03'),
(32, 9, 1, 'VIII A', 8, 87.00, '2020-12-13 21:54:59', '2022-03-26 20:19:03'),
(33, 9, 1, 'IX A', 8, 77.00, '2020-12-13 21:54:59', '2022-03-26 20:19:03'),
(34, 9, 1, 'IX B', 8, 72.00, '2020-12-13 21:54:59', '2022-03-26 20:19:03'),
(61, 10, 2, 'VIII A', 9, 80.00, '2022-03-26 20:06:14', '2022-03-26 20:06:14'),
(62, 10, 2, 'IX A', 9, 75.00, '2022-03-26 20:06:14', '2022-03-26 20:06:14'),
(65, 12, 1, 'VIII A', 2, 65.00, '2022-03-26 20:14:50', '2022-03-26 20:14:50'),
(66, 12, 1, 'IX A', 2, 70.00, '2022-03-26 20:14:50', '2022-03-26 20:14:50'),
(69, 14, 1, 'VIII A', 9, 80.00, '2022-03-26 21:04:22', '2022-04-04 19:08:03'),
(70, 14, 1, 'IX A', 9, 90.00, '2022-03-26 21:04:22', '2022-03-26 21:04:22'),
(81, 15, 1, 'VIII A', 1, 60.00, '2022-06-08 08:45:05', '2022-06-08 08:45:05'),
(82, 15, 1, 'IX A', 1, 60.00, '2022-06-08 08:45:05', '2022-06-08 08:45:05'),
(83, 15, 1, 'IX B', 1, 60.00, '2022-06-08 08:45:05', '2022-06-08 08:45:05');

-- --------------------------------------------------------

--
-- Table structure for table `mapel`
--

CREATE TABLE `mapel` (
  `id` int(10) UNSIGNED NOT NULL,
  `mata_pelajaran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `mapel`
--

INSERT INTO `mapel` (`id`, `mata_pelajaran`, `created_at`, `updated_at`) VALUES
(1, 'Bahasa Indonesia dan Sastra', '2020-10-11 00:18:38', '2022-05-16 19:21:25'),
(2, 'Pendidikan Agama Islam', '2020-10-11 00:18:54', '2020-12-13 17:24:53'),
(3, 'Pendidikan Kewarganegaraan', '2020-12-13 17:25:27', '2020-12-13 17:25:27'),
(4, 'Bahasa Inggris', '2020-12-13 17:25:46', '2020-12-13 17:25:46'),
(5, 'Matematika', '2020-12-13 17:25:59', '2020-12-13 17:25:59'),
(6, 'Ilmu Pengetahuan Alam', '2020-12-13 17:26:14', '2020-12-13 17:26:14'),
(7, 'Ilmu Pengetahuan Sosial', '2020-12-13 17:26:34', '2020-12-13 17:26:34'),
(8, 'Seni Budaya', '2020-12-13 17:26:50', '2020-12-13 17:26:50'),
(9, 'pendidikan pasmani, plahraga, dan pesehatan', '2020-12-13 17:27:30', '2022-06-08 05:21:54');

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
(7, '2014_10_12_000000_create_users_table', 1),
(8, '2014_10_12_100000_create_password_resets_table', 1),
(9, '2020_10_05_102204_create_table_pengumuman', 1),
(10, '2020_10_05_102409_create_table_guru', 1),
(11, '2020_10_05_103442_create_table_siswa', 1),
(12, '2020_10_05_104851_create_table_mapel', 1),
(14, '2020_10_05_150827_create_table_kelas_siswa', 3),
(15, '2020_10_05_151325_create_table_jadwal', 4),
(16, '2020_10_05_152718_create_table_kkm', 5),
(17, '2020_10_12_221637_create_table_ekstrakulikuler', 6),
(18, '2020_10_12_225025_create_table_tahun_ajaran', 7),
(19, '2020_10_05_105437_create_table_kelas', 8),
(21, '2020_10_13_071739_create_table_nilai_siswa', 9),
(22, '2020_11_06_010416_create_table_nilai_rapor', 10),
(26, '2020_11_06_224444_table_ekstrakulikuler_siswa', 11);

-- --------------------------------------------------------

--
-- Table structure for table `nilaiRapor`
--

CREATE TABLE `nilaiRapor` (
  `id` int(10) UNSIGNED NOT NULL,
  `tahunAjaran_id` int(10) UNSIGNED NOT NULL,
  `semester` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `ekstrakulikuler_id` int(10) UNSIGNED NOT NULL,
  `nilai_eskul` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `keterangan_eskul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_akhlak` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nilai_keperibadian` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `izin` double NOT NULL,
  `sakit` double NOT NULL,
  `tanpa_keterangan` double NOT NULL,
  `keputusan` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilaiRapor`
--

INSERT INTO `nilaiRapor` (`id`, `tahunAjaran_id`, `semester`, `kelas_id`, `siswa_id`, `ekstrakulikuler_id`, `nilai_eskul`, `keterangan_eskul`, `nilai_akhlak`, `nilai_keperibadian`, `izin`, `sakit`, `tanpa_keterangan`, `keputusan`, `created_at`, `updated_at`) VALUES
(2, 1, 'Ganjil', 2, 2, 4, '100', 'SANGAT BAIK', 'A', 'A', 0, 0, 0, 'naik kelas', '2022-04-21 20:33:56', '2022-04-21 20:33:56'),
(3, 1, 'Genap', 2, 1, 3, '90', 'BAIK', 'B', 'B', 2, 2, 2, 'naik kelas', '2022-06-07 05:34:16', '2022-06-07 05:38:06');

-- --------------------------------------------------------

--
-- Table structure for table `nilaiSiswa`
--

CREATE TABLE `nilaiSiswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `idRef` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tahunAjaran_id` int(10) UNSIGNED NOT NULL,
  `semester` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_id` int(10) UNSIGNED NOT NULL,
  `mapel_id` int(10) UNSIGNED NOT NULL,
  `kkm_id` int(10) UNSIGNED NOT NULL,
  `siswa_id` int(10) UNSIGNED NOT NULL,
  `nilai_tugas` double NOT NULL,
  `nilai_ujian_harian` double NOT NULL,
  `nilai_ujian_semester` double NOT NULL,
  `nilai_akhir` double NOT NULL,
  `keterangan` varchar(15) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `nilaiSiswa`
--

INSERT INTO `nilaiSiswa` (`id`, `idRef`, `tahunAjaran_id`, `semester`, `kelas_id`, `mapel_id`, `kkm_id`, `siswa_id`, `nilai_tugas`, `nilai_ujian_harian`, `nilai_ujian_semester`, `nilai_akhir`, `keterangan`, `created_at`, `updated_at`) VALUES
(3, '2', 1, 'Ganjil', 2, 2, 65, 1, 75, 75, 88, 81.5, 'terlampaui', '2022-04-18 20:43:35', '2022-04-18 20:43:35'),
(4, '2', 1, 'Ganjil', 2, 2, 65, 2, 85, 75, 66, 72.5, 'terlampaui', '2022-04-18 20:43:35', '2022-04-18 20:43:35'),
(21, '10', 1, 'Ganjil', 4, 2, 66, 4, 80, 80, 80, 80, 'terlampaui', '2022-06-05 20:10:00', '2022-06-05 20:10:00'),
(22, '10', 1, 'Ganjil', 4, 2, 66, 5, 80, 80, 80, 80, 'terlampaui', '2022-06-05 20:10:00', '2022-06-05 20:10:00');

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
-- Table structure for table `pengumuman`
--

CREATE TABLE `pengumuman` (
  `id` int(10) UNSIGNED NOT NULL,
  `judul` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal` date NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `pengumuman`
--

INSERT INTO `pengumuman` (`id`, `judul`, `tanggal`, `created_at`, `updated_at`) VALUES
(1, 'Gotong Royong Seluruh Kelas 11', '2020-10-12', '2020-10-06 19:58:21', '2020-10-06 22:00:27'),
(3, 'upacara peringatan 17 agustus', '2020-08-17', '2022-06-08 03:00:53', '2022-06-08 03:02:10');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE `siswa` (
  `id` int(10) UNSIGNED NOT NULL,
  `noRef` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nis` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nisn` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `jenis_kelamin` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `agama` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `anak_ke` int(11) NOT NULL,
  `alamat` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_telepon` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `asal_sekolah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kelas_awal` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_diterima` date NOT NULL,
  `nama_ayah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `nama_ibu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_ortu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `telepon_ortu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ayah` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pekerjaan_ibu` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`id`, `noRef`, `nis`, `nisn`, `nama`, `tempat_lahir`, `tanggal_lahir`, `jenis_kelamin`, `agama`, `anak_ke`, `alamat`, `no_telepon`, `asal_sekolah`, `kelas_awal`, `tanggal_diterima`, `nama_ayah`, `nama_ibu`, `alamat_ortu`, `telepon_ortu`, `pekerjaan_ayah`, `pekerjaan_ibu`, `created_at`, `updated_at`) VALUES
(1, 'SW-1', '1256789', '1987467', 'Mahmud Amirudin', 'JAKARTA PUSAT', '1999-06-24', 'Perempuan', 'Sikhisme', 2, 'Jl. MANGKUSUMO ADI WOJOYONO', '0812786456', 'SMP NEGERI 3 PASIR PANTAI TIMUR', 'VIII A', '2020-10-11', 'SUHAIMIN', 'ANISAH PUTRI', 'Jl. MANGKUSUMO ADI WOJOYONO', '081274748367', 'BURUH', 'GURU SD', '2020-10-10 01:56:33', '2022-04-18 03:18:27'),
(2, 'SW-2', '1245767', '26578998', 'Saprizal Anwar', 'Sukabumi', '2006-06-28', 'Laki-Laki', 'Islam', 5, 'Karang Panjang', '082746544', 'SMP NEGERI 3 PASIR PANTAI', 'VIII A', '2020-10-15', 'Suhaymin', 'Sumarni', 'Karang Panjang', '0892874', 'WIRASWASTA', 'Ibu Rumah Tangga', '2020-10-13 00:00:59', '2022-06-08 19:34:23'),
(4, 'SW-3', '8897', '9187465', 'ujang samiun', 'blitar', '2020-11-20', 'Laki-Laki', 'Islam', 4, 'Jl. MANGKUSUMO ADI WOJOYO', '08XXXX', 'sd 30', 'IX A', '2020-11-30', 'naim', 'nimas', 'Jl. MANGKUSUMO ADI WOJOYONO', '08375757755', 'WIRASWASTA', 'IBU RUMAH TANGGA', '2020-11-07 20:32:15', '2021-01-18 21:26:40'),
(5, 'SW-4', '112233', '1234456', 'muhammad jafar', 'bogor', '2022-03-02', 'Laki-Laki', 'Islam', 1, 'jl. siliwangi no. 07 kp. bakan maung', '0812897382', 'sd 009 trisetya', 'IX A', '2022-03-10', 'baharudin', 'ningsih', 'jl. siliwangi no. 07 kp. bakan maung', '081279273829', 'swasta', 'ibu rumah tangga', '2022-03-23 02:41:00', '2022-06-07 02:04:11');

-- --------------------------------------------------------

--
-- Table structure for table `tahunAjaran`
--

CREATE TABLE `tahunAjaran` (
  `id` int(10) UNSIGNED NOT NULL,
  `tahun_ajaran` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `tahunAjaran`
--

INSERT INTO `tahunAjaran` (`id`, `tahun_ajaran`, `created_at`, `updated_at`) VALUES
(1, '2017/2018', '2020-10-12 16:12:32', '2020-10-12 16:15:53'),
(2, '2018/2019', '2020-10-12 16:52:35', '2020-10-12 16:52:35'),
(8, '2023/2024', '2022-06-06 23:04:13', '2022-06-06 23:04:13');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) NOT NULL,
  `noRef` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `username` varchar(20) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `role` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `noRef`, `name`, `username`, `password`, `remember_token`, `role`, `created_at`, `updated_at`) VALUES
(4, 'SW-1', 'Mahmud Amirudin', 'mahmudin', '$2y$10$9dTDj8prhylQOc4NOEOydOj47wdynfjB31hrD8fvoTqdGUUjk0h9W', 'hFxqITR43XiS3W1gUL2OyQRgo0J2eQHTf30CAFAUKGtrXaFZS8f5GSZUYOFj', 'siswa', '2020-10-10 01:56:33', '2022-04-18 03:18:27'),
(7, 'GR-1', 'Anggun Maharani S.Kom M.H', 'anggun', '$2y$10$BXM/xfP26swLiwAfaH905OFOPvNO7naEz2sXr2oYMi1HQQ5Ooatua', 'RGCrkN6vUbGUtBRnCEyZSWzXVjRbmJJgLqN9JPEpeaBGNlXAcepSQmBgHbgK', 'guru', '2020-10-12 08:00:09', '2022-06-08 09:00:25'),
(8, 'SW-2', 'Saprizal Anwar', 'sap123', '$2y$10$m1DeTl4wvqjgZ6aigQap/u14IFW28qL1IIsus9eis0lxoV2FkKdDC', NULL, 'siswa', '2020-10-13 00:00:59', '2022-06-08 19:34:22'),
(15, 'SW-3', 'ujang samiun', 'ujang', 'bcsQ6guVwLA86', 'ntlJT1sukRt0ueu0yxpF2f1kXhB3qHiVVXilnNaHZJm4gorpez9vSAK9eqbc', 'siswa', '2020-11-07 20:32:15', '2021-01-18 21:26:40'),
(17, 'GR-4', 'samarudin simanjuntak', 'samarudin', '$2y$10$uoc5G.ng4Z9X5FsUVTuCj.gWVD39r38/xspb7lvvZZqkBTY0M/idW', 'r5xkAbgkOrAs3rZuQZ5l9QyNJcgwXIaFyhSHMJA3CHVlycB3iSOMPOWgfPNP', 'guru', '2021-01-18 20:31:26', '2021-01-18 20:31:26'),
(18, 'GR-5', 'setia budi', 'budi', '$2y$10$4JPW.3ERTqMjKPLEJgdb2uOUJ5pYMEPQZAQp4ega2NzHsW.lZTE4K', '0NdSPuZa9Mp201Uzmz1nur1PkqrApL7bw9NjQEJ4ONVW4inwSKC6lceU9DhG', 'guru', '2021-01-18 20:35:30', '2021-01-18 20:35:30'),
(23, 'UR', 'jajang nurjaman. ST', 'jajang', '$2y$10$JgNA0PYxBgPe7V5Wo5VK5.DhzX88BCFdwjIRBEMJbh1oAy9drmmDu', 'sjfTSu0wrkMXPXNGhTolq9aptSUGLcoTRxpa2g0XQjQakD04KubSCAssA9gz', 'admin', '2022-03-23 01:16:25', '2022-06-08 04:13:37'),
(24, 'SW-4', 'muhammad jafar', 'jafar', '$2y$10$zNU7gLq0I883ELjIaUol3O9X10vy77hG9cFnwgi.YK2yFe2uKgnvG', 'DjZHcLOMuz', 'siswa', '2022-03-23 02:41:00', '2022-06-07 02:04:11'),
(25, 'UR', 'sulaiman', 'sulaiman', '$2y$10$90FOdegdBEqnV1tiyN6px.vQ/d0alGyvoxbRmZXPDAGORcQojqhJG', '7zp6iExIbe', 'admin', '2022-06-08 04:20:01', '2022-06-08 04:21:34');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ekstrakulikuler_siswa`
--
ALTER TABLE `ekstrakulikuler_siswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `ekstrakulikuler_siswa_siswa_id_foreign` (`siswa_id`),
  ADD KEY `ekstrakulikuler_siswa_ekstrakulikuler_id_foreign` (`ekstrakulikuler_id`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `jadwal_mapel_id_foreign` (`mapel_id`),
  ADD KEY `jadwal_guru_id_foreign` (`guru_id`),
  ADD KEY `jadwal_tahunAjaran_id_foreign` (`tahunAjaran_id`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kelas_tahunajaran_id_foreign` (`tahunAjaran_id`),
  ADD KEY `kelas_guru_id_foreign` (`guru_id`);

--
-- Indexes for table `kkm`
--
ALTER TABLE `kkm`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kkm_mapel_id_foreign` (`mapel_id`),
  ADD KEY `kkm_tahunAjaran_id_foreign` (`tahunAjaran_id`);

--
-- Indexes for table `mapel`
--
ALTER TABLE `mapel`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilaiRapor`
--
ALTER TABLE `nilaiRapor`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilairapor_tahunajaran_id_foreign` (`tahunAjaran_id`),
  ADD KEY `nilairapor_kelas_id_foreign` (`kelas_id`),
  ADD KEY `nilairapor_siswa_id_foreign` (`siswa_id`),
  ADD KEY `nilairapor_ekstrakulikuler_id_foreign` (`ekstrakulikuler_id`);

--
-- Indexes for table `nilaiSiswa`
--
ALTER TABLE `nilaiSiswa`
  ADD PRIMARY KEY (`id`),
  ADD KEY `nilaisiswa_tahunajaran_id_foreign` (`tahunAjaran_id`),
  ADD KEY `nilaisiswa_kelas_id_foreign` (`kelas_id`),
  ADD KEY `nilaisiswa_mapel_id_foreign` (`mapel_id`),
  ADD KEY `nilaisiswa_kkm_id_foreign` (`kkm_id`),
  ADD KEY `nilaisiswa_siswa_id_foreign` (`siswa_id`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `pengumuman`
--
ALTER TABLE `pengumuman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tahunAjaran`
--
ALTER TABLE `tahunAjaran`
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
-- AUTO_INCREMENT for table `ekstrakulikuler`
--
ALTER TABLE `ekstrakulikuler`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `ekstrakulikuler_siswa`
--
ALTER TABLE `ekstrakulikuler_siswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kelas`
--
ALTER TABLE `kelas`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kkm`
--
ALTER TABLE `kkm`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=84;

--
-- AUTO_INCREMENT for table `mapel`
--
ALTER TABLE `mapel`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `nilaiRapor`
--
ALTER TABLE `nilaiRapor`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `nilaiSiswa`
--
ALTER TABLE `nilaiSiswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pengumuman`
--
ALTER TABLE `pengumuman`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tahunAjaran`
--
ALTER TABLE `tahunAjaran`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ekstrakulikuler_siswa`
--
ALTER TABLE `ekstrakulikuler_siswa`
  ADD CONSTRAINT `ekstrakulikuler_siswa_ekstrakulikuler_id_foreign` FOREIGN KEY (`ekstrakulikuler_id`) REFERENCES `ekstrakulikuler` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `ekstrakulikuler_siswa_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `jadwal_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `jadwal_tahunAjaran_id_foreign` FOREIGN KEY (`tahunAjaran_id`) REFERENCES `tahunAjaran` (`id`);

--
-- Constraints for table `kelas`
--
ALTER TABLE `kelas`
  ADD CONSTRAINT `kelas_guru_id_foreign` FOREIGN KEY (`guru_id`) REFERENCES `guru` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kelas_tahunajaran_id_foreign` FOREIGN KEY (`tahunAjaran_id`) REFERENCES `tahunAjaran` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `kkm`
--
ALTER TABLE `kkm`
  ADD CONSTRAINT `kkm_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `kkm_tahunAjaran_id_foreign` FOREIGN KEY (`tahunAjaran_id`) REFERENCES `tahunAjaran` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nilaiRapor`
--
ALTER TABLE `nilaiRapor`
  ADD CONSTRAINT `nilairapor_ekstrakulikuler_id_foreign` FOREIGN KEY (`ekstrakulikuler_id`) REFERENCES `ekstrakulikuler` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilairapor_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilairapor_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilairapor_tahunajaran_id_foreign` FOREIGN KEY (`tahunAjaran_id`) REFERENCES `tahunAjaran` (`id`) ON DELETE CASCADE;

--
-- Constraints for table `nilaiSiswa`
--
ALTER TABLE `nilaiSiswa`
  ADD CONSTRAINT `nilaisiswa_kelas_id_foreign` FOREIGN KEY (`kelas_id`) REFERENCES `kelas` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilaisiswa_kkm_id_foreign` FOREIGN KEY (`kkm_id`) REFERENCES `kkm` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilaisiswa_mapel_id_foreign` FOREIGN KEY (`mapel_id`) REFERENCES `mapel` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilaisiswa_siswa_id_foreign` FOREIGN KEY (`siswa_id`) REFERENCES `siswa` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `nilaisiswa_tahunajaran_id_foreign` FOREIGN KEY (`tahunAjaran_id`) REFERENCES `tahunAjaran` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
