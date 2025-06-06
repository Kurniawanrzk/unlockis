-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jun 06, 2025 at 10:43 AM
-- Server version: 8.0.30
-- PHP Version: 8.1.31

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_unlockis`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int NOT NULL,
  `nama_admin` varchar(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `background`
--

CREATE TABLE `background` (
  `id_background` int NOT NULL,
  `nama_background` varchar(255) NOT NULL,
  `kapasitas_min` int NOT NULL,
  `kapasitas_max` int NOT NULL,
  `gambar_bg` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `background`
--

INSERT INTO `background` (`id_background`, `nama_background`, `kapasitas_min`, `kapasitas_max`, `gambar_bg`, `status`) VALUES
(1, 'Huge White Limbo', 2, 25, 'backgrounds/wQVHNRgq4H1sFfnq42AdHB7SKgzqsc43C6cTz31i.png', NULL),
(2, 'Homeroom Background', 2, 8, 'backgrounds/5yMTEuQeVklXmbTQxspyMARCsYtTrqqv3zyKlS6o.png', NULL),
(11, 'Dark Room', 8, 15, 'image_support/backgrounds/d5ZT7OH9ijaytM3OxINROG19OuQAGlhvFHUPotTp.png', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `failed_jobs`
--

CREATE TABLE `failed_jobs` (
  `id` bigint UNSIGNED NOT NULL,
  `uuid` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `connection` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `queue` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `exception` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `failed_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `file_sent`
--

CREATE TABLE `file_sent` (
  `id_file_sent` int NOT NULL,
  `nama_file_sent` varchar(255) NOT NULL,
  `harga_file_sent` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `file_sent`
--

INSERT INTO `file_sent` (`id_file_sent`, `nama_file_sent`, `harga_file_sent`) VALUES
(1, 'Edited File Only', '0.00'),
(2, 'Edited File + Low-Res Raw File', '50000.00'),
(3, 'Edited File + High-Res Raw File', '100000.00'),
(4, 'Original Raw File Only', '350000.00'),
(5, 'Simple Face Retouches', '7500.00'),
(8, 'Advanced Face Retouch', '20000.00');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `uuid` varchar(255) NOT NULL,
  `id_pemesanan` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`uuid`, `id_pemesanan`) VALUES
('e2e6423e-9fe5-11ef-b5d6-0a0027000009', 1),
('1d8d3da9-9fed-11ef-b5d6-0a0027000009', 2),
('3494fe2c-9fed-11ef-b5d6-0a0027000009', 3),
('8d63c3ed-9ffb-11ef-b9b7-0a0027000009', 4),
('b2254203-9ffb-11ef-b9b7-0a0027000009', 5),
('e51f5db1-9ffe-11ef-b9b7-0a0027000009', 6),
('06f3a264-a3cd-11ef-9a68-0a0027000009', 7),
('fe63bd22-b002-11ef-9597-0a0027000009', 8),
('1c227615-b003-11ef-9597-0a0027000009', 9),
('32a2e0d5-b003-11ef-9597-0a0027000009', 10),
('5301e12c-b05f-11ef-a9df-0a0027000009', 11),
('4c96b3fe-b060-11ef-a9df-0a0027000009', 12),
('7c670fb7-b060-11ef-a9df-0a0027000009', 13),
('8786bc4f-b060-11ef-a9df-0a0027000009', 14),
('d68a888a-b061-11ef-a9df-0a0027000009', 15),
('30a8dd33-b065-11ef-a9df-0a0027000009', 16),
('2243d9b0-b067-11ef-a9df-0a0027000009', 17),
('ff83ad39-b076-11ef-a9df-0a0027000009', 18),
('ccae1b92-b56d-11ef-b5b2-0a0027000009', 19),
('969db74e-9a1a-11ef-a147-0a0027000008', 20),
('ca75ab0b-b570-11ef-b5b2-0a0027000009', 20),
('7cae346c-9a4e-11ef-a147-0a0027000008', 21),
('96a97340-b57e-11ef-b5b2-0a0027000009', 21),
('8a07b1d0-9a4e-11ef-a147-0a0027000008', 22),
('9e6d836a-b57e-11ef-b5b2-0a0027000009', 22),
('18c8ef31-b58a-11ef-b5b2-0a0027000009', 23),
('e33226a2-9a4e-11ef-a147-0a0027000008', 23),
('51848eed-b58a-11ef-b5b2-0a0027000009', 24),
('f6faef66-9a4e-11ef-a147-0a0027000008', 24),
('04a5a829-9a4f-11ef-a147-0a0027000008', 25),
('a16e7bd6-b58a-11ef-b5b2-0a0027000009', 25),
('46bc5389-9a4f-11ef-a147-0a0027000008', 26),
('4d7ed81c-b58c-11ef-b5b2-0a0027000009', 26),
('768f02d5-b58c-11ef-b5b2-0a0027000009', 27),
('99971be5-9a4f-11ef-a147-0a0027000008', 27),
('471c5721-b58d-11ef-b5b2-0a0027000009', 28),
('acdf95b9-9a4f-11ef-a147-0a0027000008', 28),
('6a16d035-b58d-11ef-b5b2-0a0027000009', 29),
('bfdd1fa8-9a4f-11ef-a147-0a0027000008', 29),
('a607c58a-b58d-11ef-b5b2-0a0027000009', 30),
('c6e93918-9a4f-11ef-a147-0a0027000008', 30),
('494dcbef-9a50-11ef-a147-0a0027000008', 31),
('d549e638-b58d-11ef-b5b2-0a0027000009', 31),
('5acaaf34-9a51-11ef-a147-0a0027000008', 32),
('a1343c26-b5a0-11ef-b5b2-0a0027000009', 32),
('9ad1be89-9a53-11ef-a147-0a0027000008', 33),
('bc05ffea-b5a0-11ef-b5b2-0a0027000009', 33),
('068fd5ee-b5a1-11ef-b5b2-0a0027000009', 34),
('b023ad89-9a53-11ef-a147-0a0027000008', 34),
('1698a964-9a75-11ef-a147-0a0027000008', 35),
('72037d8f-b5a1-11ef-b5b2-0a0027000009', 35),
('5449577d-9a80-11ef-a147-0a0027000008', 36),
('794430a7-b5a1-11ef-b5b2-0a0027000009', 36),
('7a24c89a-9a80-11ef-a147-0a0027000008', 37),
('8e9185eb-b5a1-11ef-b5b2-0a0027000009', 37),
('c29a3131-9ab4-11ef-9048-0a0027000008', 38),
('d5b36b43-b5a1-11ef-b5b2-0a0027000009', 38),
('335eafa3-b5a2-11ef-b5b2-0a0027000009', 39),
('d272448f-9ab4-11ef-9048-0a0027000008', 39),
('66fdadf7-b5a2-11ef-b5b2-0a0027000009', 40),
('df4f4b37-9ab4-11ef-9048-0a0027000008', 40),
('27f838d8-9ab5-11ef-9048-0a0027000008', 41),
('7313172b-b5a2-11ef-b5b2-0a0027000009', 41),
('300109e0-9ab5-11ef-9048-0a0027000008', 42),
('87baa983-b5a2-11ef-b5b2-0a0027000009', 42),
('41e0b9ae-9ab6-11ef-9048-0a0027000008', 43),
('bdcf6548-b5a3-11ef-b5b2-0a0027000009', 43),
('9d2aca51-9ab6-11ef-9048-0a0027000008', 44),
('d53ca073-b5cf-11ef-970c-0a0027000009', 44),
('18b4590c-b5e2-11ef-970c-0a0027000009', 45),
('fa976962-9ab6-11ef-9048-0a0027000008', 45),
('0d80c207-9b12-11ef-9b73-0a0027000008', 46),
('28d467ae-9b12-11ef-9b73-0a0027000008', 47),
('794af2dd-9b12-11ef-9b73-0a0027000008', 48),
('859e7549-9b12-11ef-9b73-0a0027000008', 49),
('05acbb71-9b13-11ef-9b73-0a0027000008', 50),
('3dd44610-9b13-11ef-9b73-0a0027000008', 51),
('69bf18ce-9b13-11ef-9b73-0a0027000008', 52),
('6eb97544-9b13-11ef-9b73-0a0027000008', 53),
('6fbcede0-9b13-11ef-9b73-0a0027000008', 54),
('70b1549f-9b13-11ef-9b73-0a0027000008', 55),
('71d50eef-9b13-11ef-9b73-0a0027000008', 56),
('730367dc-9b13-11ef-9b73-0a0027000008', 57),
('7427484a-9b13-11ef-9b73-0a0027000008', 58),
('752b73b2-9b13-11ef-9b73-0a0027000008', 59),
('770c04b7-9b13-11ef-9b73-0a0027000008', 60),
('7814e2c8-9b13-11ef-9b73-0a0027000008', 61),
('78c3a998-9b13-11ef-9b73-0a0027000008', 62),
('79c21d8e-9b13-11ef-9b73-0a0027000008', 63),
('7aced906-9b13-11ef-9b73-0a0027000008', 64),
('7d77b206-9b13-11ef-9b73-0a0027000008', 65),
('7f41cf7d-9b13-11ef-9b73-0a0027000008', 66),
('80608a9d-9b13-11ef-9b73-0a0027000008', 67),
('818232fb-9b13-11ef-9b73-0a0027000008', 68),
('825cc69c-9b13-11ef-9b73-0a0027000008', 69),
('83db0cab-9b13-11ef-9b73-0a0027000008', 70),
('850082c0-9b13-11ef-9b73-0a0027000008', 71),
('86139dad-9b13-11ef-9b73-0a0027000008', 72),
('87c3a2de-9b13-11ef-9b73-0a0027000008', 73),
('892a72df-9b13-11ef-9b73-0a0027000008', 74),
('8ac075f3-9b13-11ef-9b73-0a0027000008', 75),
('8be3dbbf-9b13-11ef-9b73-0a0027000008', 76),
('8e7102ad-9b13-11ef-9b73-0a0027000008', 77),
('8ffbbe88-9b13-11ef-9b73-0a0027000008', 78),
('923ab42d-9b68-11ef-ab68-0a0027000008', 79),
('9b3f819a-9b72-11ef-ab68-0a0027000008', 80),
('4aa79f04-9b73-11ef-ab68-0a0027000008', 81),
('1facb357-9b81-11ef-ab68-0a0027000008', 82),
('621cb915-9b81-11ef-ab68-0a0027000008', 83),
('785e650f-9b81-11ef-ab68-0a0027000008', 84),
('98a628a5-9b81-11ef-ab68-0a0027000008', 85),
('b904fcae-9b81-11ef-ab68-0a0027000008', 86),
('de1d83d5-9b81-11ef-ab68-0a0027000008', 87),
('e19174ad-9b81-11ef-ab68-0a0027000008', 88),
('e87a7584-9b81-11ef-ab68-0a0027000008', 89),
('ee7b8e9d-9b81-11ef-ab68-0a0027000008', 90),
('f20a3af6-9b81-11ef-ab68-0a0027000008', 91),
('6a85f6ad-9b82-11ef-ab68-0a0027000008', 92),
('7eb62a41-9b82-11ef-ab68-0a0027000008', 93),
('9e9594f9-9b82-11ef-ab68-0a0027000008', 94),
('a9a0830d-9b82-11ef-ab68-0a0027000008', 95),
('b5df33dc-9b82-11ef-ab68-0a0027000008', 96),
('f25873e5-9b82-11ef-ab68-0a0027000008', 97),
('f082481d-9eb6-11ef-8aba-0a0027000009', 98),
('e0bcddbd-9eb7-11ef-8aba-0a0027000009', 99),
('00c75efe-9eb8-11ef-8aba-0a0027000009', 100),
('189e9755-9eb8-11ef-8aba-0a0027000009', 101),
('21df4c58-9eb8-11ef-8aba-0a0027000009', 102),
('4b2c420d-9eb8-11ef-8aba-0a0027000009', 103),
('ba21aef7-9eb8-11ef-8aba-0a0027000009', 104),
('d2d0adfa-9eba-11ef-8aba-0a0027000009', 105),
('d59a5e2c-9eba-11ef-8aba-0a0027000009', 106),
('02959133-9ebb-11ef-8aba-0a0027000009', 107),
('0801f695-9ebb-11ef-8aba-0a0027000009', 108),
('3e573e31-9ebb-11ef-8aba-0a0027000009', 109),
('41549617-9ebb-11ef-8aba-0a0027000009', 110),
('42aa4e56-9ebb-11ef-8aba-0a0027000009', 111),
('4429bc81-9ebb-11ef-8aba-0a0027000009', 112),
('45b7974d-9ebb-11ef-8aba-0a0027000009', 113),
('47172eef-9ebb-11ef-8aba-0a0027000009', 114),
('48685e2c-9ebb-11ef-8aba-0a0027000009', 115),
('4a9f7850-9ebb-11ef-8aba-0a0027000009', 116),
('53bd8eaa-9ebb-11ef-8aba-0a0027000009', 117),
('55284890-9ebb-11ef-8aba-0a0027000009', 118),
('5709813f-9ebb-11ef-8aba-0a0027000009', 119),
('588e8490-9ebb-11ef-8aba-0a0027000009', 120),
('5a1aa435-9ebb-11ef-8aba-0a0027000009', 121),
('f703540e-9ebc-11ef-8aba-0a0027000009', 122),
('63901d92-9f77-11ef-b5d6-0a0027000009', 123),
('be2d56f2-9f77-11ef-b5d6-0a0027000009', 124),
('cfbdaa00-9f77-11ef-b5d6-0a0027000009', 125),
('e0d07f7b-9f77-11ef-b5d6-0a0027000009', 126),
('e6fabab5-9f77-11ef-b5d6-0a0027000009', 127),
('225b92c3-9f78-11ef-b5d6-0a0027000009', 128),
('23ce5381-9f78-11ef-b5d6-0a0027000009', 129),
('3b6be8f8-9f78-11ef-b5d6-0a0027000009', 130),
('6a261268-9f78-11ef-b5d6-0a0027000009', 131),
('8008548d-9f78-11ef-b5d6-0a0027000009', 132),
('190a2eeb-9f79-11ef-b5d6-0a0027000009', 133),
('359c2f59-9f79-11ef-b5d6-0a0027000009', 134),
('4e7a6a6d-9f79-11ef-b5d6-0a0027000009', 135),
('985c27fc-9f79-11ef-b5d6-0a0027000009', 136),
('e0b6aa5f-9f79-11ef-b5d6-0a0027000009', 137),
('e0fe6e8f-9f79-11ef-b5d6-0a0027000009', 138),
('e145815f-9f79-11ef-b5d6-0a0027000009', 139),
('e17f19c1-9f79-11ef-b5d6-0a0027000009', 140),
('e1be7fa2-9f79-11ef-b5d6-0a0027000009', 141),
('e205aa27-9f79-11ef-b5d6-0a0027000009', 142),
('e24b454b-9f79-11ef-b5d6-0a0027000009', 143),
('e28b71ed-9f79-11ef-b5d6-0a0027000009', 144),
('e2d27c27-9f79-11ef-b5d6-0a0027000009', 145),
('e30c94b4-9f79-11ef-b5d6-0a0027000009', 146),
('e34d4049-9f79-11ef-b5d6-0a0027000009', 147),
('110bbb96-9f7a-11ef-b5d6-0a0027000009', 148),
('2a03b950-9f7a-11ef-b5d6-0a0027000009', 149),
('5d1f7e52-9f7a-11ef-b5d6-0a0027000009', 150),
('7c8b3774-9f7a-11ef-b5d6-0a0027000009', 151),
('866f3da0-9f7a-11ef-b5d6-0a0027000009', 152),
('936ff5ed-9f7a-11ef-b5d6-0a0027000009', 153),
('b4e50992-9f7a-11ef-b5d6-0a0027000009', 154),
('c594038d-9f7a-11ef-b5d6-0a0027000009', 155),
('018956da-9f7b-11ef-b5d6-0a0027000009', 156),
('133649b3-9f7b-11ef-b5d6-0a0027000009', 157),
('387a82a0-9f7b-11ef-b5d6-0a0027000009', 158),
('450c6602-9f7b-11ef-b5d6-0a0027000009', 159),
('48f829ca-9f7b-11ef-b5d6-0a0027000009', 160),
('bed1857f-9fde-11ef-b5d6-0a0027000009', 161),
('762efb27-9fe5-11ef-b5d6-0a0027000009', 162);

-- --------------------------------------------------------

--
-- Table structure for table `layanan_detail_foto`
--

CREATE TABLE `layanan_detail_foto` (
  `id_detail_layanan_foto` int NOT NULL,
  `id_layanan_foto` int NOT NULL,
  `gambar` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `layanan_detail_foto`
--

INSERT INTO `layanan_detail_foto` (`id_detail_layanan_foto`, `id_layanan_foto`, `gambar`) VALUES
(16, 17, 'image_support/layanan_foto/nvKYOEWuy0mwuaXf22kS4jYpyTIcPskLkwWS1fcJ.jpg'),
(17, 18, 'image_support/layanan_foto/XyD7wEc4FCAEcortaRS9GfEejHnHPdFHYxSIVDY5.jpg'),
(18, 19, 'image_support/layanan_foto/lsZx0y08jGWdZ3Ro2eZlDtCDwrxer3prl2OrNadN.jpg'),
(20, 21, 'image_support/layanan_foto/y91sUobregD6073XXhImfT6LnAodmuH5X4BKwTJc.jpg'),
(21, 22, 'image_support/layanan_foto/ZAnSx39s4yCF4jMXr9DZTOs6MJsGjA9aZR3LynL7.jpg'),
(23, 24, 'image_support/layanan_foto/Oi3Nb9MV1QR7Cg3gzDMfYR26QGSKEaUV3W88vr6O.jpg'),
(27, 20, 'image_support/layanan_foto/kyS53G8PFYlSoZRSbYhrGivMrBXc3Mvps3Izzx1Q.jpg'),
(28, 20, 'image_support/layanan_foto/i0freXIjQgd1rwzCrtPJu4Cc8SAnjVlRs2ZJPGix.jpg'),
(29, 20, 'image_support/layanan_foto/y783GM0GXyEfHp4pEOJKsmmmmSNwGQls7HGeZ6nn.jpg'),
(30, 20, 'image_support/layanan_foto/X6zg6kQoIIJWc5qwwS5Rg5rQkC7BMcIJr44jz4nb.jpg'),
(32, 25, 'image_support/layanan_foto/xWYK1TCv9gQZiZkBNyrXWU3EBMPX1ffgCgib70KO.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `layanan_foto`
--

CREATE TABLE `layanan_foto` (
  `id_layanan_foto` int NOT NULL,
  `nama_layanan_foto` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `slug` varchar(100) NOT NULL,
  `deskripsi` varchar(500) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `layanan_foto`
--

INSERT INTO `layanan_foto` (`id_layanan_foto`, `nama_layanan_foto`, `slug`, `deskripsi`) VALUES
(17, 'Group Photosession', 'group-photosession', '-d'),
(18, 'Family Photosession', 'Family-Photosession', '-'),
(19, 'Outdoor Graduation', 'Outdoor-Graduation', '-'),
(20, 'Studio Graduation', 'studio-graduation', 'Unlock Studio akan mengabadikan momen kelulusan Anda dengan sentuhan elegan dan penuh makna. Kami menyediakan berbagai pilihan paket dengan konsep foto graduation yang modern, mulai dari formal hingga kreatif, serta fasilitas lengkap untuk memastikan setiap foto mencerminkan pencapaian istimewa Anda. Dengan tim fotografer berpengalaman dan peralatan canggih, kami siap membantu Anda menciptakan kenangan abadi yang dapat dibagikan dengan keluarga dan sahabat.'),
(21, 'Personal Photosession', 'Personal-Photosession', '-'),
(22, 'Prewedding Photosession', 'Prewedding-Photosession', '-'),
(24, 'Rent Studio', 'Rent-Studio', '-'),
(25, 'Product Photosession', 'product-photosession', '-');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

CREATE TABLE `migrations` (
  `id` int UNSIGNED NOT NULL,
  `migration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_reset_tokens_table', 1),
(3, '2014_10_12_100000_create_password_resets_table', 1),
(4, '2019_08_19_000000_create_failed_jobs_table', 1),
(5, '2019_12_14_000001_create_personal_access_tokens_table', 1),
(6, '2024_10_07_164236_create_sessions_table', 2);

-- --------------------------------------------------------

--
-- Table structure for table `paket_foto`
--

CREATE TABLE `paket_foto` (
  `id_paket` int NOT NULL,
  `nama_paket` varchar(255) NOT NULL,
  `deskripsi` text,
  `harga` decimal(10,2) NOT NULL,
  `id_layanan_foto` int DEFAULT NULL,
  `tipe_paket` int NOT NULL,
  `durasi_pemotretan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `paket_foto`
--

INSERT INTO `paket_foto` (`id_paket`, `nama_paket`, `deskripsi`, `harga`, `id_layanan_foto`, `tipe_paket`, `durasi_pemotretan`) VALUES
(6, 'Basic Graduation', '2-8 Orang, Unlimited Shoot, File Via Gdrive, Huge White Limbo', '300000.00', 20, 0, '30'),
(9, 'Luxury Graduation', 'Professional Photographer, 60 Menit Sesi, 2 Background By Req, 1 Wisudawan, Foto Personal Wisudawan, Foto Keluarga, 2 - 20 Orang, Unlimited Shoot, Edited file via GDrive, Cetak 12Rs + Pigura', '450000.00', 20, 2, '60');

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
-- Table structure for table `password_reset_tokens`
--

CREATE TABLE `password_reset_tokens` (
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `pelanggan`
--

CREATE TABLE `pelanggan` (
  `id_pelanggan` int NOT NULL,
  `nama_lengkap` varchar(255) NOT NULL,
  `no_wa` varchar(20) DEFAULT NULL,
  `no_rekening` varchar(50) DEFAULT NULL,
  `nama_bank` varchar(15) NOT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `foto_kartu_member` varchar(255) DEFAULT NULL,
  `member_id` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pelanggan`
--

INSERT INTO `pelanggan` (`id_pelanggan`, `nama_lengkap`, `no_wa`, `no_rekening`, `nama_bank`, `instagram`, `foto_kartu_member`, `member_id`) VALUES
(1, 'Nabil', '082232504103', '12', 'BCA', 'nabil', NULL, NULL),
(2, 'Nabil pramodhana', '082232504103', '123', 'BCA', 'nabil', NULL, NULL),
(3, 'Nabil pramodhana', '082232504103', '123', 'BCA', 'nabil', NULL, NULL),
(4, 'Kurniawana Rizki Trinanta Sembiring', '085845820300', '23', 'sd', 'aksjd', NULL, NULL),
(5, 'Nabil Pramodhana Nugraha', '082232504103', '23', 'BCA', 'nabil', NULL, NULL),
(6, 'Nabil Pramodhana', '082232504103', '123', 'BCA', 'Nabil', NULL, NULL),
(7, 'wawaa', '08666', '66666', 'bca', 'rerere', NULL, NULL),
(8, 'Kurniawan Rizki Trinanta Sembiring', '085845820300', '123', 'BCA', 'test', NULL, NULL),
(9, 'Kurniawan Rizki Trinanta Sembiring', '085845820300', '123', 'BCA', 'test', NULL, NULL),
(10, 'Kurniawan Rizki Trinanta Sembiring', '085845820300', '123', 'BCA', 'test', NULL, NULL),
(11, 'Kurniawan Rizki Trinanta Sembiring', '085845820300', '234123123', 'BCA', 'trinantaasembiring', NULL, NULL),
(12, 'Kurniawan Rizki Trinanta Sembiring', '085845820300', '234123123', 'BCA', 'trinantaasembiring', NULL, NULL),
(13, 'Kurniawan Rizki Trinanta Sembiring', '085845820300', '234123123', 'BCA', 'trinantaasembiring', NULL, NULL),
(14, 'Kurniawan Rizki Trinanta Sembiring', '085845820300', '234123123', 'BCA', 'trinantaasembiring', NULL, NULL),
(15, 'Kurniawan Rizki Trinanta Sembiring', NULL, '234123123', 'BCA', 'trinantaasembiring', NULL, NULL),
(16, 'Kurniawan Rizki Trinanta Sembiring', '085845820300', '234123123', 'BCA', 'trinantaasembiring', NULL, NULL),
(17, 'Kurniawan Rizki Trinanta Sembiring', '085845820300', '234123123', 'BCA', 'trinantaasembiring', NULL, NULL),
(18, 'Kurniawan Rizki Trinanta', '085845820300', '12313', 'BCA', 'tri', NULL, NULL),
(19, 'Kurniawan Rizki Trinanta', '085845820300', '12313', 'BCA', 'tri', NULL, NULL),
(20, 'Kurniawan Rizki Trinanta', '085845820300', '12313', 'BCA', 'tri', NULL, NULL),
(21, 'd', '2', '2', 'BCA', 'd', NULL, NULL),
(22, 'd', '2', '2', 'BCA', 'd', NULL, NULL),
(23, 'd', '2', '2', 'BCA', 'd', NULL, NULL),
(24, 'd', '2', '2', 'BCA', 'd', NULL, NULL),
(25, 'Kurniawan Rizki Trinanta Sembiring', '085845820300', '23', 'BCA', 'trinantaasembiring', NULL, NULL),
(26, 'Kurniawan Rizki Trinanta Sembiring', '085845820300', '23', 'BCA', 'trinantaasembiring', NULL, NULL),
(27, 'Kurniawan Rizki', '1231', '123', 'BCA', 'asd', NULL, NULL),
(28, 'Kurniawan Rizki', '1231', '123', 'BCA', 'asd', NULL, NULL),
(29, 'Kurniawan Rizki', '1231', '123', 'BCA', 'asd', NULL, NULL),
(30, 'Kurniawan Rizki', '1231', '123', 'BCA', 'asd', NULL, NULL),
(31, 'Kurniawan Rizki', '1231', '123', 'BCA', 'asd', NULL, NULL),
(32, 'Kurniawan Rizki', '1231', '123', 'BCA', 'asd', NULL, NULL),
(33, 'Kurniawan RIzki', '12313', '23', 'Ba', 'asdasd', NULL, NULL),
(34, 'Kurniawan RIzki', '12313', '23', 'Ba', 'asdasd', NULL, NULL),
(35, 'Kurniawan Rizki', '12313', '12123', 'BCa', 'asd', NULL, NULL),
(36, 'Kurniawan Rizki', '12313', '12123', 'BCa', 'asd', NULL, NULL),
(37, 'Kurniawan RIzki', '085845820300', '1231', 'BCA', 'trinantaasembiring', NULL, NULL),
(38, 'Kurniawan Rizki Trinanta Sembiring', '085845820300', '123', 'BCA', 'trinantaasembiring', NULL, NULL),
(39, 'Nabil Pramodhana Nugraha', '085845820300', '123', 'BCA', 'nabilig', NULL, NULL),
(40, 'Kurniawan Rizki Trinanta Sembiring', '085845820300', '23', 'BCA', 'as', NULL, NULL),
(41, 'Kurniawan Rizki Trinanta Sembiring', '085845820300', '23', 'BCA', 'as', NULL, NULL),
(42, 'Nadia Fida', '085845820300', '123', 'BCA', 'nadiafida', NULL, NULL),
(43, 'Nadia Fida', '085845820300', '123', 'BCA', 'nadiafida', NULL, NULL),
(44, 'Nadia Fida', '085845820300', '123', 'BCA', 'nadiafida', NULL, NULL),
(45, 'Nadia Fida', '085845820300', '123', 'BCA', 'nadiafida', NULL, NULL),
(46, 'asd', '123', '123', 'asd', 'asd', NULL, NULL),
(47, 'asd', '123', '123', 'asd', 'asd', NULL, NULL),
(48, 'asd', '123', '123', 'asd', 'asd', NULL, NULL),
(49, 'asd', '132', '123', 'asd', 'asd', NULL, NULL),
(50, 'asd', '132', '123', 'asd', 'asd', NULL, NULL),
(51, 'asd', '085845820300', '123', 'asd', 'asd', NULL, NULL),
(52, 'asd', '085845820300', '123', 'asd', 'asd', NULL, NULL),
(53, 'asd', '085845820300', '123', 'asd', 'asd', NULL, NULL),
(54, 'asd', '123', '123', 'asd', 'asd', NULL, NULL),
(55, 'asd', '123', '123', 'asd', 'asd', NULL, NULL),
(56, 'asd', '123', '123', 'asd', 'asd', NULL, NULL),
(57, 'asd', '123', '123', 'asd', 'asd', NULL, NULL),
(58, 'asd', '123', '123', 'asd', 'asd', NULL, NULL),
(59, 'asd', '123', '123', 'asd', 'asd', NULL, NULL),
(60, 'asd', '123', '123', 'asd', 'asd', NULL, NULL),
(61, 'asd', '123', '123', 'asd', 'asd', NULL, NULL),
(62, 'Hisyam Fauzan', '085845820300', '123', 'BCA', 'hisyamfauzan', NULL, NULL),
(63, 'Mochammad Haidar Ridho', '08993382377', '123', 'BCA', 'mhidar', NULL, NULL),
(64, 'Mochammad Haidar Ridho', '08993382377', '123', 'BCA', 'haidar', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan`
--

CREATE TABLE `pemesanan` (
  `id_pemesanan` int NOT NULL,
  `id_pelanggan` int DEFAULT NULL,
  `total_harga` decimal(10,2) NOT NULL,
  `catatan` text,
  `referensi` varchar(255) DEFAULT NULL,
  `total_orang_foto` int NOT NULL,
  `tanggal_booking` date NOT NULL,
  `jam_booking` time NOT NULL,
  `id_paket` int DEFAULT NULL,
  `id_admin_verifikasi` int DEFAULT NULL,
  `id_photographer` bigint UNSIGNED DEFAULT NULL,
  `status_pembayaran` enum('Belum DP','DP','Pelunasan') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'Belum DP',
  `status_pengerjaan` enum('File belum diedit','revisi','Belum cetak','orderan selesai') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL DEFAULT 'File belum diedit',
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pemesanan`
--

INSERT INTO `pemesanan` (`id_pemesanan`, `id_pelanggan`, `total_harga`, `catatan`, `referensi`, `total_orang_foto`, `tanggal_booking`, `jam_booking`, `id_paket`, `id_admin_verifikasi`, `id_photographer`, `status_pembayaran`, `status_pengerjaan`, `created_at`, `updated_at`) VALUES
(20, 39, '740000.00', '-', '-', 6, '2024-12-10', '08:00:00', 6, NULL, NULL, 'DP', 'File belum diedit', '2024-12-08 07:29:10', '2024-12-08 07:33:53'),
(21, 40, '300000.00', 'ad', '12', 4, '2024-12-10', '01:29:00', 6, NULL, NULL, 'Belum DP', 'File belum diedit', '2024-12-08 09:07:56', '2024-12-08 09:07:56'),
(23, 42, '875000.00', '-', '-', 4, '2024-12-10', '16:29:00', 6, NULL, NULL, 'Belum DP', 'File belum diedit', '2024-12-08 10:30:19', '2024-12-08 10:30:19'),
(43, 62, '550000.00', NULL, NULL, 4, '2024-12-16', '17:17:00', 6, NULL, NULL, 'Belum DP', 'File belum diedit', '2024-12-08 13:33:54', '2024-12-08 13:33:54'),
(44, 63, '595000.00', NULL, NULL, 6, '2024-12-17', '10:49:00', 6, NULL, NULL, 'Belum DP', 'File belum diedit', '2024-12-08 18:49:31', '2024-12-08 18:49:31'),
(45, 64, '895000.00', NULL, NULL, 8, '2024-12-14', '14:00:00', 6, NULL, NULL, 'Pelunasan', 'File belum diedit', '2024-12-08 21:00:15', '2024-12-08 21:03:51');

--
-- Triggers `pemesanan`
--
DELIMITER $$
CREATE TRIGGER `createInvoice` AFTER INSERT ON `pemesanan` FOR EACH ROW BEGIN
INSERT INTO invoice(uuid, id_pemesanan) values(uuid(), new.id_pemesanan);
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_background`
--

CREATE TABLE `pemesanan_background` (
  `id_pemesanan_bg` int NOT NULL,
  `id_pemesanan` int NOT NULL,
  `id_background` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pemesanan_background`
--

INSERT INTO `pemesanan_background` (`id_pemesanan_bg`, `id_pemesanan`, `id_background`) VALUES
(1, 1, 2),
(2, 2, 2),
(3, 3, 2),
(4, 4, 2),
(5, 5, 2),
(6, 6, 2),
(7, 7, 2),
(8, 8, 1),
(9, 8, 2),
(10, 9, 1),
(11, 9, 2),
(12, 10, 1),
(13, 10, 2),
(14, 11, 1),
(15, 11, 2),
(16, 12, 1),
(17, 12, 2),
(28, 20, 1),
(29, 20, 2),
(30, 21, 1),
(32, 23, 1),
(52, 43, 1),
(53, 44, 1),
(54, 45, 1);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_file_sent`
--

CREATE TABLE `pemesanan_file_sent` (
  `id_file_sent_pemesanan` int NOT NULL,
  `id_pemesanan` int NOT NULL,
  `id_file_sent` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `pemesanan_file_sent`
--

INSERT INTO `pemesanan_file_sent` (`id_file_sent_pemesanan`, `id_pemesanan`, `id_file_sent`) VALUES
(1, 2, 1),
(2, 2, 2),
(3, 3, 1),
(4, 3, 2),
(5, 17, 2),
(6, 18, 1),
(7, 18, 2),
(8, 19, 1),
(9, 19, 2),
(10, 19, 3),
(11, 20, 1),
(12, 20, 2),
(13, 20, 3),
(14, 23, 3),
(15, 23, 4),
(16, 24, 3),
(17, 24, 4),
(18, 25, 3),
(19, 25, 4),
(20, 26, 3),
(21, 26, 4),
(22, 45, 2);

-- --------------------------------------------------------

--
-- Table structure for table `pemesanan_terbayar`
--

CREATE TABLE `pemesanan_terbayar` (
  `id_pemesanan_terbayar` int NOT NULL,
  `id_pemesanan` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `penerima_notif`
--

CREATE TABLE `penerima_notif` (
  `id_penerima` int NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `penerima_notif`
--

INSERT INTO `penerima_notif` (`id_penerima`, `email`) VALUES
(5, 'kurniawan.rizki.2305356@students.um.ac.id'),
(6, 'krizki.work@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `personal_access_tokens`
--

CREATE TABLE `personal_access_tokens` (
  `id` bigint UNSIGNED NOT NULL,
  `tokenable_type` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tokenable_id` bigint UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(64) COLLATE utf8mb4_unicode_ci NOT NULL,
  `abilities` text COLLATE utf8mb4_unicode_ci,
  `last_used_at` timestamp NULL DEFAULT NULL,
  `expires_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `personal_access_tokens`
--

INSERT INTO `personal_access_tokens` (`id`, `tokenable_type`, `tokenable_id`, `name`, `token`, `abilities`, `last_used_at`, `expires_at`, `created_at`, `updated_at`) VALUES
(1, 'App\\Models\\User', 2, 'myAppToken', '32a0b9699d827c852e02835c1a08185a67bc05af55bb899cf2b4fd5718aa172c', '[\"*\"]', NULL, NULL, '2024-10-07 22:48:28', '2024-10-07 22:48:28');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id_role` int NOT NULL,
  `nama_role` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id_role`, `nama_role`) VALUES
(1, 'Admin'),
(2, 'Photographer');

-- --------------------------------------------------------

--
-- Table structure for table `servis_tambahan`
--

CREATE TABLE `servis_tambahan` (
  `id_servis` int NOT NULL,
  `nama_servis` varchar(255) NOT NULL,
  `key` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL,
  `harga_servis` decimal(10,2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `servis_tambahan`
--

INSERT INTO `servis_tambahan` (`id_servis`, `nama_servis`, `key`, `harga_servis`) VALUES
(1, 'Sameday Edit', 'day', '100000.00'),
(2, 'Make Up', 'makeup', '275000.00'),
(3, 'Make Up + Hijab/Hairdo', 'makeup', '325000.00'),
(4, 'Cetak 2R', 'cetak', '2000.00'),
(5, 'Cetak 4R', 'cetak', '5000.00'),
(6, 'Cetak 10R', 'cetak', '12000.00'),
(7, 'Cetak 10Rs', 'cetak', '15000.00'),
(8, 'Cetak 12R', 'cetak', '40000.00'),
(9, 'Cetak 14R', 'cetak', '70000.00'),
(10, 'Cetak 16R', 'cetak', '85000.00'),
(11, 'Cetak 16Rs', 'cetak', '95000.00'),
(12, 'Cetak 20R', 'cetak', '125000.00'),
(13, 'Cetak 20Rs', 'cetak', '150000.00'),
(14, 'Cetak 30R', 'cetak', '210000.00'),
(15, 'Additional Time', 'day', '150000.00');

-- --------------------------------------------------------

--
-- Table structure for table `servis_tambahan_pemesanan`
--

CREATE TABLE `servis_tambahan_pemesanan` (
  `id_pemesanan` int NOT NULL,
  `id_servis` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `servis_tambahan_pemesanan`
--

INSERT INTO `servis_tambahan_pemesanan` (`id_pemesanan`, `id_servis`) VALUES
(2, 1),
(3, 1),
(20, 1),
(23, 1),
(43, 1),
(44, 1),
(45, 1),
(2, 2),
(3, 2),
(45, 2),
(20, 4),
(44, 4),
(45, 4),
(20, 5),
(23, 5),
(44, 5),
(20, 6),
(43, 15),
(44, 15),
(45, 15);

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user_id` bigint UNSIGNED DEFAULT NULL,
  `ip_address` varchar(45) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `user_agent` text COLLATE utf8mb4_unicode_ci,
  `payload` longtext COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_activity` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `user_id`, `ip_address`, `user_agent`, `payload`, `last_activity`) VALUES
('6IIp9AbuYNyhgNHljQO03sdPSQwZOVdyPcNasGcN', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiUkpienJDajZ3eWVSMjJabUhjRWo2S1A4Mk41SXBEU056eXRxU084ZCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9hdXRoL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1728361968),
('ewMAiCI9NBbp7vfUw3X2v4GxravDApKT35qBvFfi', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoiR251dE5uZURIYk5YNFI1MEFtVjc3bzJDOGdOcG5uM3VDMGRVTFdXSSI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6Mzg6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMC9hZG1pbi9hdXRoL2xvZ2luIjt9czo2OiJfZmxhc2giO2E6Mjp7czozOiJvbGQiO2E6MDp7fXM6MzoibmV3IjthOjA6e319fQ==', 1728355824),
('Y9Gf9clGBeXqaVByy9e7SCciygY0H2R3NMb70wi9', NULL, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/129.0.0.0 Safari/537.36', 'YTozOntzOjY6Il90b2tlbiI7czo0MDoia2Jpb1VCc2FhbzJQeWxBaG5vYVU4YWQxSUpTTjdpMFc1eDBUS1UxUCI7czo5OiJfcHJldmlvdXMiO2E6MTp7czozOiJ1cmwiO3M6MjE6Imh0dHA6Ly8xMjcuMC4wLjE6ODAwMCI7fXM6NjoiX2ZsYXNoIjthOjI6e3M6Mzoib2xkIjthOjA6e31zOjM6Im5ldyI7YTowOnt9fX0=', 1728354340);

-- --------------------------------------------------------

--
-- Table structure for table `tb_isi_qiraah`
--

CREATE TABLE `tb_isi_qiraah` (
  `id` int NOT NULL,
  `id_qiraah` int NOT NULL,
  `teks_bacaan` int NOT NULL,
  `created_at` timestamp NOT NULL,
  `updated_at` timestamp NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` bigint UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `id_role` int NOT NULL,
  `remember_token` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nama`, `username`, `password`, `id_role`, `remember_token`) VALUES
(2, 'Jhon Doe', 'unlockisadmin', '$2y$10$VRkqSRnth4guwTvQE2JhW.ZYdZANuGkQVuB6EUUzN/O2GAhXDpd6K', 1, NULL),
(7, 'Farhan', 'farhan', '$2y$10$OBWQgMRs2AHT32mIOkdfneBMssk5ksxRzBpiTcBDl6Vm9A.TeaQ/O', 2, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `verifikasi`
--

CREATE TABLE `verifikasi` (
  `id_verifikasi` int NOT NULL,
  `id_admin_verifikasi` int DEFAULT NULL,
  `terverifikasi` tinyint(1) NOT NULL,
  `id_pemesanan` int DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `background`
--
ALTER TABLE `background`
  ADD PRIMARY KEY (`id_background`);

--
-- Indexes for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

--
-- Indexes for table `file_sent`
--
ALTER TABLE `file_sent`
  ADD PRIMARY KEY (`id_file_sent`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`uuid`),
  ADD KEY `pemesanan` (`id_pemesanan`);

--
-- Indexes for table `layanan_detail_foto`
--
ALTER TABLE `layanan_detail_foto`
  ADD PRIMARY KEY (`id_detail_layanan_foto`),
  ADD KEY `id_layanan_foto` (`id_layanan_foto`);

--
-- Indexes for table `layanan_foto`
--
ALTER TABLE `layanan_foto`
  ADD PRIMARY KEY (`id_layanan_foto`);

--
-- Indexes for table `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `paket_foto`
--
ALTER TABLE `paket_foto`
  ADD PRIMARY KEY (`id_paket`),
  ADD KEY `id_layanan_foto` (`id_layanan_foto`);

--
-- Indexes for table `password_resets`
--
ALTER TABLE `password_resets`
  ADD KEY `password_resets_email_index` (`email`);

--
-- Indexes for table `password_reset_tokens`
--
ALTER TABLE `password_reset_tokens`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `pelanggan`
--
ALTER TABLE `pelanggan`
  ADD PRIMARY KEY (`id_pelanggan`);

--
-- Indexes for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`),
  ADD KEY `id_photographer` (`id_photographer`),
  ADD KEY `pemesanan_ibfk_1` (`id_pelanggan`),
  ADD KEY `pemesanan_ibfk_2` (`id_paket`),
  ADD KEY `pemesanan_ibfk_3` (`id_admin_verifikasi`);

--
-- Indexes for table `pemesanan_background`
--
ALTER TABLE `pemesanan_background`
  ADD PRIMARY KEY (`id_pemesanan_bg`),
  ADD KEY `id_pemesanan` (`id_pemesanan`),
  ADD KEY `pemesanan_background_ibfk_2` (`id_background`);

--
-- Indexes for table `pemesanan_file_sent`
--
ALTER TABLE `pemesanan_file_sent`
  ADD PRIMARY KEY (`id_file_sent_pemesanan`),
  ADD KEY `id_pemesanan` (`id_pemesanan`),
  ADD KEY `pemesanan_file_sent_ibfk_2` (`id_file_sent`);

--
-- Indexes for table `pemesanan_terbayar`
--
ALTER TABLE `pemesanan_terbayar`
  ADD PRIMARY KEY (`id_pemesanan_terbayar`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- Indexes for table `penerima_notif`
--
ALTER TABLE `penerima_notif`
  ADD PRIMARY KEY (`id_penerima`);

--
-- Indexes for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `personal_access_tokens_token_unique` (`token`),
  ADD KEY `personal_access_tokens_tokenable_type_tokenable_id_index` (`tokenable_type`,`tokenable_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id_role`);

--
-- Indexes for table `servis_tambahan`
--
ALTER TABLE `servis_tambahan`
  ADD PRIMARY KEY (`id_servis`);

--
-- Indexes for table `servis_tambahan_pemesanan`
--
ALTER TABLE `servis_tambahan_pemesanan`
  ADD PRIMARY KEY (`id_pemesanan`,`id_servis`),
  ADD KEY `servis_tambahan_pemesanan_ibfk_2` (`id_servis`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sessions_user_id_index` (`user_id`),
  ADD KEY `sessions_last_activity_index` (`last_activity`);

--
-- Indexes for table `tb_isi_qiraah`
--
ALTER TABLE `tb_isi_qiraah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_qiraah` (`id_qiraah`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `id_role` (`id_role`);

--
-- Indexes for table `verifikasi`
--
ALTER TABLE `verifikasi`
  ADD PRIMARY KEY (`id_verifikasi`),
  ADD KEY `id_admin_verifikasi` (`id_admin_verifikasi`),
  ADD KEY `id_pemesanan` (`id_pemesanan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `background`
--
ALTER TABLE `background`
  MODIFY `id_background` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `file_sent`
--
ALTER TABLE `file_sent`
  MODIFY `id_file_sent` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `layanan_detail_foto`
--
ALTER TABLE `layanan_detail_foto`
  MODIFY `id_detail_layanan_foto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `layanan_foto`
--
ALTER TABLE `layanan_foto`
  MODIFY `id_layanan_foto` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `paket_foto`
--
ALTER TABLE `paket_foto`
  MODIFY `id_paket` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `pelanggan`
--
ALTER TABLE `pelanggan`
  MODIFY `id_pelanggan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=65;

--
-- AUTO_INCREMENT for table `pemesanan`
--
ALTER TABLE `pemesanan`
  MODIFY `id_pemesanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `pemesanan_background`
--
ALTER TABLE `pemesanan_background`
  MODIFY `id_pemesanan_bg` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=55;

--
-- AUTO_INCREMENT for table `pemesanan_file_sent`
--
ALTER TABLE `pemesanan_file_sent`
  MODIFY `id_file_sent_pemesanan` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `pemesanan_terbayar`
--
ALTER TABLE `pemesanan_terbayar`
  MODIFY `id_pemesanan_terbayar` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `penerima_notif`
--
ALTER TABLE `penerima_notif`
  MODIFY `id_penerima` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id_role` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `servis_tambahan`
--
ALTER TABLE `servis_tambahan`
  MODIFY `id_servis` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `tb_isi_qiraah`
--
ALTER TABLE `tb_isi_qiraah`
  MODIFY `id` int NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` bigint UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `verifikasi`
--
ALTER TABLE `verifikasi`
  MODIFY `id_verifikasi` int NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `layanan_detail_foto`
--
ALTER TABLE `layanan_detail_foto`
  ADD CONSTRAINT `layanan_detail_foto_ibfk_1` FOREIGN KEY (`id_layanan_foto`) REFERENCES `layanan_foto` (`id_layanan_foto`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `paket_foto`
--
ALTER TABLE `paket_foto`
  ADD CONSTRAINT `paket_foto_ibfk_1` FOREIGN KEY (`id_layanan_foto`) REFERENCES `layanan_foto` (`id_layanan_foto`);

--
-- Constraints for table `pemesanan`
--
ALTER TABLE `pemesanan`
  ADD CONSTRAINT `pemesanan_ibfk_1` FOREIGN KEY (`id_pelanggan`) REFERENCES `pelanggan` (`id_pelanggan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_2` FOREIGN KEY (`id_paket`) REFERENCES `paket_foto` (`id_paket`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_3` FOREIGN KEY (`id_admin_verifikasi`) REFERENCES `admin` (`id_admin`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_ibfk_4` FOREIGN KEY (`id_photographer`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan_background`
--
ALTER TABLE `pemesanan_background`
  ADD CONSTRAINT `pemesanan_background_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pemesanan_background_ibfk_2` FOREIGN KEY (`id_background`) REFERENCES `background` (`id_background`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan_file_sent`
--
ALTER TABLE `pemesanan_file_sent`
  ADD CONSTRAINT `pemesanan_file_sent_ibfk_2` FOREIGN KEY (`id_file_sent`) REFERENCES `file_sent` (`id_file_sent`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `pemesanan_terbayar`
--
ALTER TABLE `pemesanan_terbayar`
  ADD CONSTRAINT `pemesanan_terbayar_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`);

--
-- Constraints for table `servis_tambahan_pemesanan`
--
ALTER TABLE `servis_tambahan_pemesanan`
  ADD CONSTRAINT `servis_tambahan_pemesanan_ibfk_1` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `servis_tambahan_pemesanan_ibfk_2` FOREIGN KEY (`id_servis`) REFERENCES `servis_tambahan` (`id_servis`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `sessions`
--
ALTER TABLE `sessions`
  ADD CONSTRAINT `sessions_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`id_role`) REFERENCES `role` (`id_role`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `verifikasi`
--
ALTER TABLE `verifikasi`
  ADD CONSTRAINT `verifikasi_ibfk_1` FOREIGN KEY (`id_admin_verifikasi`) REFERENCES `admin` (`id_admin`),
  ADD CONSTRAINT `verifikasi_ibfk_2` FOREIGN KEY (`id_pemesanan`) REFERENCES `pemesanan` (`id_pemesanan`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
