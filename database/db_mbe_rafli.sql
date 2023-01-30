-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Jan 2023 pada 02.56
-- Versi server: 10.4.17-MariaDB
-- Versi PHP: 8.0.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_mbe_rafli`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `billings`
--

CREATE TABLE `billings` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status_id` bigint(20) UNSIGNED DEFAULT NULL,
  `no_biling` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'not downloaded',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `billings`
--

INSERT INTO `billings` (`id`, `file`, `status_id`, `no_biling`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Invoice-files/sE0i4UahptusQiILp4GrCpbm6cEPgde2sxDxJDfB.pdf', NULL, NULL, 'not downloaded', '2023-01-26 13:29:45', '2023-01-26 13:29:45');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cancles`
--

CREATE TABLE `cancles` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `categories`
--

CREATE TABLE `categories` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `categories`
--

INSERT INTO `categories` (`id`, `name`, `slug`, `created_at`, `updated_at`) VALUES
(1, 'Web Programing', 'web-programing', '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(2, 'Personal', 'personal', '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(3, 'Desain Web', 'desain-web', '2023-01-21 05:54:39', '2023-01-21 05:54:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `clients`
--

CREATE TABLE `clients` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `kode_client` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `company_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `contact_person` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan_cp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `kota` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `clients`
--

INSERT INTO `clients` (`id`, `kode_client`, `company_name`, `alamat`, `contact_person`, `jabatan_cp`, `kota`, `no_tlp`, `created_at`, `updated_at`) VALUES
(1, 'CLN2301001', 'PD Utami', 'Ds. Salak No. 640, Bengkulu 41999, Maluku', 'Sakura Mulyani S.E.', 'Programmer', 'Lubuklinggau', '(+62) 876 8322 3163', '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(2, 'CLN2301002', 'CV Prastuti', 'Jln. Dago No. 460, Pekalongan 78265, Jambi', 'Anastasia Karen Aryani M.TI.', 'Atlet', 'Ternate', '(+62) 540 5172 4356', '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(3, 'CLN2301003', 'CV Anggraini', 'Psr. Basoka Raya No. 824, Manado 68898, Sumut', 'Hani Gasti Namaga S.Kom', 'Pengacara', 'Cimahi', '021 1239 300', '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(4, 'CLN2301004', 'PT Maryadi Hidayat', 'Ds. Bagis Utama No. 132, Samarinda 34570, Malut', 'Gamani Yoga Jailani', 'Tukang Las / Pandai Besi', 'Tanjungbalai', '0675 2469 8981', '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(5, 'CLN2301005', 'PD Rahmawati Tbk', 'Dk. Cokroaminoto No. 153, Manado 91225, Riau', 'Zelaya Yani Pratiwi S.Sos', 'Ustaz / Mubaligh', 'Pematangsiantar', '0708 1371 1750', '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(6, 'CLN2301006', 'PT. Mandri Persero Tbk.', 'Jl. Gatot Subroto No.1, RW.3, Gelora, Kecamatan Tanah Abang, Kota Jakarta Pusat, Daerah Khusus Ibukota Jakarta 10270', 'Indra Ariyanto', 'Manager', 'Jakarta', '+62-21-30023674', '2023-01-21 06:12:05', '2023-01-21 06:12:05');

-- --------------------------------------------------------

--
-- Struktur dari tabel `doneproyeks`
--

CREATE TABLE `doneproyeks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proyek_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `doneproyeks`
--

INSERT INTO `doneproyeks` (`id`, `proyek_id`, `created_at`, `updated_at`) VALUES
(1, 1, '2023-01-26 13:29:56', '2023-01-26 13:29:56');

-- --------------------------------------------------------

--
-- Struktur dari tabel `donesales`
--

CREATE TABLE `donesales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `sale_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` int(11) NOT NULL DEFAULT 0,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `donesales`
--

INSERT INTO `donesales` (`id`, `sale_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 1, '2023-01-21 06:17:11', '2023-01-26 13:20:18'),
(2, 3, 1, '2023-01-26 13:14:18', '2023-01-26 13:21:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `employees`
--

CREATE TABLE `employees` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT '0',
  `name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jenis_kelamin` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tempat_lahir` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `agama` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `no_tlp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `pendidikan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `jabatan` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_ktp` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `alamat_domisili` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file_pendukung` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `employees`
--

INSERT INTO `employees` (`id`, `nik`, `user`, `name`, `email`, `jenis_kelamin`, `tempat_lahir`, `tanggal_lahir`, `agama`, `no_tlp`, `pendidikan`, `jabatan`, `alamat_ktp`, `alamat_domisili`, `file_pendukung`, `created_at`, `updated_at`) VALUES
(1, '22101408001', '1', 'Rafli Unpam', 'rafli.unpam@gmail.com', 'Pria', 'Tangerang', '1999-08-14', 'Islam', '0895337323544', 'Strata 3 (Doctoral)', 'CEO', 'Kp. Parung Serab RT002/RW010 Kel. Sudimara Selatan Kec. Ciledug Kota Tangerang', 'Kp. Parung Serab RT002/RW010 Kel. Sudimara Selatan Kec. Ciledug Kota Tangerang', NULL, '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(2, '202312108002', '1', 'Kiti Diyanti', 'mbe_au02@gmail.com', 'Wanita', 'Jakarta', '1997-08-21', 'Islam', '0895337323544', 'S1 - Strata 1 (Undergraduate, Bachelor)', 'HRD & Admin Umum', 'Serpong', 'Serpong', NULL, '2023-01-21 05:57:35', '2023-01-21 05:57:45'),
(3, '202311001003', '0', 'Ir. Robertus Yopan', 'mbe_direktur01@gmail.com', 'Pria', 'Makasar', '1965-01-10', 'Katolik', '0895337323544', 'S1 - Strata 1 (Undergraduate, Bachelor)', 'Director', 'Jakarta', 'Jakarta', NULL, '2023-01-21 06:00:45', '2023-01-21 06:00:45'),
(4, '202312110004', '0', 'Ir. Uno N. Bahano', 'mbe_direktur02@gmail.com', 'Pria', 'Jombang', '1978-10-21', 'Kristen', '0895337323544', 'S1 - Strata 1 (Undergraduate, Bachelor)', 'Director', 'Jakarta', 'Jakarta', NULL, '2023-01-21 06:03:47', '2023-01-21 06:03:47'),
(5, '202311010005', '0', 'Siswanto, SAP', 'mbe_au01@gmail.com', 'Pria', 'Jakarta', '2010-10-10', 'Islam', '0895337323544', 'S1 - Strata 1 (Undergraduate, Bachelor)', 'HRD & Admin Umum', 'Jakarta', 'Jakarta', NULL, '2023-01-21 06:04:50', '2023-01-21 06:04:50'),
(6, '202311010006', '1', 'Bob Abdulrahman, SST', 'mbe_ms01@gmail.com', 'Pria', 'Tangerang', '2010-10-10', 'Katolik', '0895337323544', 'S1 - Strata 1 (Undergraduate, Bachelor)', 'Admin Project', 'Tangerang', 'Tangerang', NULL, '2023-01-21 06:05:31', '2023-01-21 06:10:11'),
(7, '202311010007', '1', 'Kasiyono', 'mbe_mp@gmail.com', 'Pria', 'Banjarnegara', '2010-10-10', 'Islam', '0895337323544', 'S1 - Strata 1 (Undergraduate, Bachelor)', 'Admin Project', 'Tangerang Selatan', 'Tangerang Selatan', NULL, '2023-01-21 06:06:19', '2023-01-21 06:10:41'),
(8, '202311010008', '1', 'Ade Sugianto', 'mbe_ts01@gmail.com', 'Pria', 'Tangerang', '2010-10-10', 'Islam', '0895337323544', 'S1 - Strata 1 (Undergraduate, Bachelor)', 'Survey & Report', 'Tangerang Selatan', 'Tangerang Selatan', NULL, '2023-01-21 06:07:26', '2023-01-21 06:10:53'),
(9, '202311010009', '1', 'Hadi Susanto, ST', 'mbe_tp01@gmail.com', 'Pria', 'Tangerang', '2010-10-10', 'Islam', '0895337323544', 'S1 - Strata 1 (Undergraduate, Bachelor)', 'Electrical', 'Tangerang', 'Tangerang', NULL, '2023-01-21 06:08:35', '2023-01-21 06:11:04'),
(10, '202311010010', '0', 'Sopian Subandi', 'mbe_ts02@gmail.com', 'Pria', 'Jakarta', '2010-10-10', 'Islam', '0895337323544', 'S1 - Strata 1 (Undergraduate, Bachelor)', 'Survey & Report', 'Jakarta', 'Jakarta', NULL, '2023-01-21 06:21:13', '2023-01-21 06:21:13'),
(14, '202311010011', '0', 'Sukadam, ST', 'mbe_tp02@gmail.com', 'Pria', 'Jakarta', '2010-10-10', 'Islam', '0895337323544', 'S1 - Strata 1 (Undergraduate, Bachelor)', 'VAC & Escalator', 'Jakarta', 'Jakarta', NULL, '2023-01-21 06:24:57', '2023-01-21 06:24:57'),
(15, '202311408010', '1', 'Super Admin', 'super.admin@gmail.com', 'Pria', 'Jakarta', '1999-08-14', 'Islam', '0895337323544', 'S1 - Strata 1 (Undergraduate, Bachelor)', 'Director', 'Jakarta', 'Jakarta', NULL, '2023-01-30 01:53:06', '2023-01-30 01:53:42');

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
(5, '2022_06_10_194002_create_posts_table', 1),
(6, '2022_06_13_201308_create_categories_table', 1),
(7, '2022_08_05_095831_create_clients_table', 1),
(8, '2022_08_05_172134_create_proyeks_table', 1),
(9, '2022_08_13_024456_create_statuses_table', 1),
(10, '2022_08_13_034358_create_sales_table', 1),
(11, '2022_08_14_175456_create_donesales_table', 1),
(12, '2022_08_15_011125_create_doneproyeks_table', 1),
(13, '2022_08_23_071115_create_billings_table', 1),
(14, '2022_10_06_073759_create_employees_table', 1),
(15, '2022_10_13_085221_create_cancles_table', 1);

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
-- Struktur dari tabel `posts`
--

CREATE TABLE `posts` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `category_id` bigint(20) UNSIGNED NOT NULL,
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `slug` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `image` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `excerpt` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `body` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `posts`
--

INSERT INTO `posts` (`id`, `category_id`, `user_id`, `title`, `slug`, `image`, `excerpt`, `body`, `published_at`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'Animi commodi tenetur eos et exercitationem.', 'et-tempora-accusantium-consequatur-fugit', NULL, 'Aut provident repudiandae qui totam. Necessitatibus et ut doloremque dolorem.', '<p>Hic cumque autem non facilis id voluptatem et. Esse repellendus deserunt inventore qui delectus. Harum similique non mollitia tempora in et saepe.</p><p>Illum fuga mollitia aut eius adipisci aut minus delectus. Quia neque voluptas vitae maxime earum. Est corrupti voluptas quas. Perspiciatis libero odio voluptatem reprehenderit cupiditate accusamus qui.</p><p>Necessitatibus qui enim ipsa quis quaerat. Quidem sint a placeat possimus doloribus. Minima alias ipsam vel velit laudantium autem. Praesentium itaque deleniti qui magnam nulla nam.</p><p>Voluptas deleniti voluptatem omnis autem dolores quas. Nulla et suscipit sint qui sapiente officia. Dignissimos architecto enim nesciunt minus inventore temporibus. Omnis non explicabo est nesciunt consequatur earum. Ipsa quia alias animi similique modi voluptas et iste.</p><p>Nihil occaecati consequuntur nulla vitae nulla vero laudantium. Eum praesentium aut in ullam officia consectetur architecto. Eum adipisci placeat aut quidem quam. Voluptate officia a quia autem tenetur ipsa reprehenderit iure.</p><p>Veniam suscipit consequatur sed quia ut illo. Nihil harum aspernatur atque dolor. Eum nihil voluptas praesentium dolorem et necessitatibus nostrum. Tempora fuga occaecati itaque.</p><p>Itaque atque odit excepturi molestiae unde. Suscipit et incidunt nostrum voluptatem sed ut. Quae odio quae non optio voluptates sed nostrum in. Error consequatur perferendis voluptatem reprehenderit.</p>', NULL, '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(2, 3, 2, 'Sit in officiis odio molestias doloribus est ex.', 'cumque-nihil-at-error-et-cum', NULL, 'Praesentium pariatur deleniti vel asperiores dignissimos mollitia quo explicabo. Sunt sint velit maiores ipsa consectetur facere. Ipsum autem voluptatem omnis quam similique assumenda.', '<p>Repudiandae rem quae veritatis est sed. Minus perferendis atque aut nesciunt incidunt natus. Id id libero quis ab reiciendis aut. Rem voluptas placeat quae quas dolorem rerum distinctio voluptatem.</p><p>Tenetur ad esse autem ut aperiam odit. Reiciendis natus at et ipsum veniam quia. Cumque et sint repudiandae odit sapiente perspiciatis.</p><p>Similique accusantium ut porro ut tempora et. Illo vero voluptatem dolore alias doloribus. Et exercitationem amet consequuntur sed consectetur. Molestiae cum eveniet sint inventore autem ut. Recusandae repellendus rem dignissimos et autem quibusdam laborum.</p><p>Delectus labore nulla rerum sed. Pariatur laboriosam at et non qui debitis temporibus. Laborum nisi voluptates ipsa officiis.</p><p>Ut illo nobis est quam suscipit. Fugit voluptatem maiores deserunt eveniet. Eos corrupti dignissimos autem dolorem veniam provident velit.</p><p>Atque quia tempore sint fugit corporis voluptates inventore. Aspernatur ullam aliquid commodi omnis accusantium perspiciatis recusandae. Et qui in et ut odit aliquid. Dolores perferendis nesciunt et id culpa suscipit harum.</p><p>Asperiores ullam eos dolorum qui sed quo nihil. Enim quibusdam harum adipisci voluptates ducimus. Maxime quas cupiditate sit earum asperiores non.</p><p>Accusamus quos voluptatibus reiciendis officiis sunt. Ipsum quae autem incidunt nulla eaque. Ut nesciunt quaerat autem voluptatem. Quod tempore et ut nemo iste.</p><p>Non sequi nisi libero commodi odit eos. Tempore ut pariatur consequatur et facilis suscipit rerum. Architecto inventore esse sit tenetur tempora officiis minus fuga.</p><p>Nulla natus odit optio sit incidunt. Deserunt perferendis quo qui optio.</p>', NULL, '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(3, 3, 3, 'Quibusdam rerum modi.', 'quaerat-in-perspiciatis-quod-harum-et-reprehenderit-minima', NULL, 'Ad repudiandae illum quia. Itaque omnis at minima nobis libero officiis. Occaecati excepturi exercitationem illum harum illo corporis architecto.', '<p>Tempore eaque fugiat eligendi deserunt sapiente. Exercitationem illo accusamus et illum.</p><p>Iusto et possimus est nulla sit natus facere. Sed illo culpa cumque quis. Dicta blanditiis ratione saepe laudantium.</p><p>Rerum aut iure ipsum suscipit. Consequatur magnam exercitationem harum. Velit asperiores laborum laborum sit aut. Et voluptas quod aspernatur commodi sit rerum aut.</p><p>Velit animi soluta qui cum. Incidunt et labore sit nam eius quia vero. Ullam fugiat sapiente eaque non omnis. Aperiam temporibus labore et non perspiciatis quis optio.</p><p>Aperiam nihil dolores ut et dolorem neque. Quisquam tempora dolorem fugiat asperiores inventore et aut. Aspernatur voluptatibus accusantium quas assumenda ut aut ut.</p>', NULL, '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(4, 3, 2, 'Eligendi labore optio laborum sed doloribus quasi dolore ullam sunt non.', 'voluptatibus-placeat-enim-voluptas-doloremque-qui-at-assumenda', NULL, 'Illo fugit libero hic omnis quia. Ea dolores doloribus qui ad exercitationem. Labore facilis est labore dolor ut assumenda.', '<p>Suscipit dicta unde quia. Repellendus harum ullam aspernatur ut quia. Aut a est cum incidunt.</p><p>Corporis occaecati non ullam enim quia. Est accusantium est possimus numquam. Et et quo voluptate aperiam aut qui. Nulla eos quaerat qui porro et dolor. Est delectus voluptas nemo possimus ab hic in quia.</p><p>Esse odio nam sapiente consectetur ab ad nisi. Accusantium placeat asperiores qui aut temporibus. Ducimus molestiae voluptates saepe ab earum qui. Eligendi voluptatibus aut itaque vitae autem.</p><p>Officia tempora ad et fugit aut ipsa qui aut. Nisi quam voluptatibus est quia non sapiente.</p><p>Non molestias ea suscipit. Ut repellendus dolor dolores dolor est temporibus. Id sapiente neque debitis sed est.</p><p>Iste ut omnis dolores dolor eligendi et rerum. Doloremque omnis velit odit vero quae sint dolores. Aut sequi nam et sunt.</p><p>Iure inventore enim voluptatem aperiam. Nostrum molestiae esse similique necessitatibus autem consequuntur.</p><p>Ut autem tempore hic maxime. Perferendis dicta at quod recusandae. Quia facere ab in.</p><p>Voluptates consequatur sequi perspiciatis veniam sint laboriosam nisi. Qui cum modi ut quae quod dignissimos. Beatae quod sunt nemo earum quas repellendus consectetur.</p>', NULL, '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(5, 1, 2, 'Porro earum qui eius.', 'numquam-autem-fugit-repudiandae-nemo-nostrum-expedita', NULL, 'Magni voluptas et enim temporibus laudantium asperiores. Corporis nihil et fuga laboriosam. Et ea et possimus cupiditate impedit mollitia.', '<p>Tempore ut culpa sit possimus. Quam fuga ullam sapiente sit. Sunt nostrum labore consequatur aperiam officia sequi facilis qui. Quibusdam ut iste facilis et tempore rem.</p><p>Et vero nobis officia consequatur asperiores corrupti eos et. Esse atque officiis reiciendis autem excepturi. Doloremque optio unde et cumque sed est. Animi autem quia repellendus est sequi ipsam nisi qui.</p><p>Eum autem vitae voluptas et. Corrupti sint omnis aut itaque sapiente eligendi repellendus. Qui tempore ratione id culpa autem optio.</p><p>Delectus autem molestiae quia et. Quas odio sed suscipit. Possimus doloremque a et et aut provident est aut. Rem iusto nihil quia deserunt expedita cupiditate.</p><p>Ut ut est exercitationem vel laborum. Qui rerum architecto maxime aliquid perspiciatis error voluptatem. Saepe tempora porro officiis itaque saepe. Ut qui quia laborum ut vitae est enim.</p><p>Quidem adipisci accusamus nihil animi nulla doloremque odit. Sed temporibus expedita accusantium quibusdam. Nesciunt et consequatur dolor. Ut in soluta rerum aut.</p><p>Omnis molestias adipisci autem sed sint. Nostrum voluptas autem quo. Fugiat quia qui rerum libero et alias.</p><p>Laboriosam rerum quidem rerum labore animi aut. Nulla molestias officiis alias hic quis voluptatem quaerat. A adipisci amet et et natus qui enim minus. Fugiat quia perferendis ipsum perspiciatis excepturi eos.</p><p>Quis dicta eaque doloremque voluptas sint. Eum nobis vel aperiam voluptatibus ut inventore ullam. Ut fugiat cumque aperiam ullam quibusdam odit.</p><p>Veniam aspernatur dolores consequatur quidem eligendi. Sed voluptatem asperiores quam perspiciatis. Quos id molestias provident sit veniam rerum beatae qui. Consequuntur maiores voluptatem accusamus magni.</p>', NULL, '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(6, 1, 3, 'Aperiam sint dolorem similique similique cumque.', 'harum-tempore-maxime-sit-unde', NULL, 'Ut nemo ex tenetur. Voluptatem occaecati recusandae temporibus eum ut aliquam. Quis inventore voluptate eum facilis et. Voluptas nemo deserunt sunt quia.', '<p>Commodi eos quasi cum dolorem. Officia inventore ut dolorem rerum nihil aut odit. Blanditiis ea possimus ducimus natus ut qui quas. Nihil minima tempore et rerum dolore.</p><p>Quia consequuntur mollitia reiciendis ut et quia perferendis. Temporibus mollitia nobis repellendus eveniet tenetur et. Omnis corporis eligendi repellendus quia.</p><p>Non totam nesciunt rerum. Qui corporis eum enim molestiae. Totam non eligendi saepe sed expedita est consequatur sint.</p><p>Quia ut ipsa culpa temporibus. A saepe et tempora molestiae incidunt. Qui reprehenderit doloribus omnis doloribus. Quo ipsum quod explicabo facere veniam officiis est similique.</p><p>Recusandae laboriosam non eligendi pariatur dolor aut placeat. Iure nesciunt quae temporibus minus voluptatem sed illo. Aspernatur est consectetur modi quo. Quasi distinctio et officia. Ex omnis quasi iste voluptates eum quia tempore.</p><p>Omnis et nihil consequuntur qui quo. Quidem in eligendi eaque ab. Quis fugit omnis explicabo corrupti saepe. Velit cum ducimus rerum tenetur enim voluptatem minus.</p><p>Eveniet eveniet aliquid quia temporibus quidem pariatur. Illo culpa officiis cum voluptatum. Voluptatem sit nam molestiae voluptatem.</p><p>Consequatur nihil itaque eos optio natus hic sunt. Suscipit nobis quo beatae ullam ut ut. Natus quibusdam nihil et placeat.</p><p>Unde sapiente provident culpa dolorum. Aut adipisci eaque explicabo. Provident aut est atque eligendi sed est saepe.</p>', NULL, '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(7, 2, 1, 'Similique voluptatem omnis ratione aspernatur.', 'exercitationem-maiores-ipsam-qui-eum-natus-adipisci-ipsa', NULL, 'Fugit quae id fugiat qui distinctio earum. Non sunt laboriosam dolor consectetur veritatis.', '<p>Tenetur qui quisquam veniam alias corrupti quo ut ut. Sunt ut excepturi quas ut. Deleniti libero aspernatur et a qui natus. Vitae reprehenderit iure dignissimos alias et porro sequi. Voluptatem aut iste molestias animi aut rerum non.</p><p>Sapiente voluptates autem sint quis occaecati rem neque. Enim voluptatem voluptate labore aut possimus odit. Ad quaerat eveniet pariatur consequatur aut quis.</p><p>Vitae laboriosam quasi voluptas dicta inventore. Molestias iste qui quidem nulla hic. Expedita corrupti est molestiae ullam.</p><p>Velit expedita at aliquam eveniet quae ipsum in omnis. Fugit sunt quos qui alias minima beatae molestiae. Iste sint quo adipisci debitis. Sunt modi explicabo autem rem voluptatem optio explicabo.</p><p>Corporis est maiores consequatur ut odio placeat aut. Doloremque voluptate iure aut quia facilis cupiditate. Id iure qui voluptate quia.</p><p>Ut assumenda id quidem ut. Et magni quaerat at aspernatur. Quam debitis aut inventore unde quis sapiente voluptas nostrum.</p>', NULL, '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(8, 1, 2, 'Omnis est quasi accusamus.', 'qui-consequatur-nihil-quam-sed', NULL, 'Accusantium consequatur mollitia consequatur sequi sed omnis dolorem. Voluptatem et minus sit perspiciatis velit officiis dolorum sunt. Similique veniam incidunt non expedita rem id placeat. Et officiis fugiat dolore necessitatibus nihil hic incidunt et.', '<p>Aut aut quisquam laudantium vel corporis. Accusantium excepturi delectus occaecati optio quod. Assumenda illo sit harum atque quidem voluptatum. Vel est quisquam laborum a rem quae officia. Voluptates repellendus ea et qui accusantium occaecati voluptatem.</p><p>Cum saepe in magni qui. Velit voluptas unde nihil accusantium et quo. Repellat et accusamus qui ut exercitationem temporibus. Qui sit mollitia ullam sint.</p><p>Reprehenderit officia nobis quos dolores illo eius ut. Dolore voluptate adipisci ex similique iure blanditiis voluptatem ad. Ab aperiam veniam sit ipsa labore consequatur eos.</p><p>Voluptas nostrum nesciunt sit rerum et maxime iste. Velit facere quis sit facilis. Qui voluptas laboriosam aut ducimus.</p><p>In non molestiae sit soluta. Ut asperiores ea repellendus. Autem sed et soluta exercitationem similique sint.</p><p>Ad adipisci atque rerum non sint. Quisquam qui molestiae soluta et fugiat numquam vero possimus. Voluptatem sint sint fugiat quia esse.</p><p>Suscipit aut et et aliquam officia neque. Voluptatem consequatur vel consectetur eos sequi eum quis ullam. Commodi dolor libero dolorum.</p><p>Animi id quaerat quisquam adipisci. Fugiat iste aut ut. Maxime eum consequatur sed eum exercitationem maxime.</p><p>Commodi quia consequatur veritatis aspernatur sunt eos qui. Est et ut enim magnam debitis aut.</p>', NULL, '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(9, 1, 1, 'Similique fugit cum sit aut.', 'illum-ut-alias-quas-sunt-sint', NULL, 'Quasi suscipit dolor odio. Dignissimos tenetur dignissimos odit sunt. Ad nihil et consequatur consequatur. Neque id inventore dicta soluta inventore.', '<p>Quisquam perspiciatis quas ipsam. Et laborum tenetur autem ea odio quia.</p><p>Fugiat deleniti sit quis eos et aspernatur. Eaque perspiciatis quos consequatur distinctio numquam. Officiis nihil sed vel fugit sed et cum. Et illo at voluptatem vero.</p><p>Quisquam quo odio exercitationem natus dolores ut dolore. Laboriosam aut omnis voluptatem aut. Aut ut animi non expedita ipsa reiciendis.</p><p>Harum dignissimos minus sed voluptas. Quibusdam recusandae molestiae itaque dignissimos. Ullam velit laudantium aut dolores.</p><p>Nulla harum qui quibusdam minus et ut. Voluptatem quos distinctio voluptatum amet quibusdam perferendis. Corrupti natus aut quam eos. Assumenda et dicta id omnis.</p><p>In dignissimos hic eaque provident harum et qui. Ut praesentium quae minus repellat in magnam enim culpa. Sunt omnis voluptatem sit maxime. Quia facere ipsum molestiae rem.</p><p>Architecto qui deserunt et nam voluptatem quam. Consequatur autem illum dolorum placeat in est. Repellat est id accusantium ut corporis iusto et perspiciatis. Laboriosam iusto sapiente aut est eaque a ad.</p><p>Facilis enim amet occaecati iusto magni est. Ea est veritatis eum veritatis rerum vel est. Sed voluptas consectetur molestias. Id et est nihil aut et animi earum.</p>', NULL, '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(10, 3, 1, 'Saepe facilis soluta nobis.', 'corrupti-voluptas-quo-repellendus-magnam-molestiae-alias', NULL, 'Quis explicabo ab ratione ad aliquid et. Accusantium omnis voluptatum hic eveniet omnis nihil. Ad quia quia repudiandae sit est.', '<p>Voluptas omnis error qui et. Voluptatem optio esse rerum inventore. Magni quas cumque est quo.</p><p>Iure dolorum et voluptatem non autem earum ut. Aliquam repellendus molestiae est voluptas.</p><p>Nam cum provident eum fugit soluta. Sit dolorum natus vero sint aliquid pariatur ad. Est doloribus consequatur et est. Dolor facilis impedit dicta magni in et.</p><p>Ut optio qui quia cupiditate animi velit. Amet non et in odio ut eum aliquam. Suscipit maxime reprehenderit sunt consequatur. Omnis cum ab et accusantium maiores amet.</p><p>Deserunt officia ut quibusdam voluptatem. Eos perferendis veritatis possimus eligendi sequi deserunt expedita. Harum nesciunt perferendis eum. Recusandae voluptate sit velit sint. Quo voluptatem rerum at rerum ex atque.</p>', NULL, '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(11, 1, 2, 'Omnis aperiam consequatur ut et.', 'laboriosam-aliquid-totam-atque-deserunt-veritatis-dolore', NULL, 'Nobis iste et porro quisquam. Omnis quas est omnis rerum sequi. Exercitationem laborum dolor itaque ea et quos.', '<p>Voluptate aliquid autem ipsa officiis iste qui. Et ea aut et provident. Minus provident explicabo accusantium ea et. Ex tempore quidem est est doloremque facere nobis.</p><p>Iure quisquam possimus non dolores libero fugiat sint sit. Commodi distinctio voluptates culpa animi dicta aut aliquid. Ad natus exercitationem quis occaecati.</p><p>Officiis eveniet corporis et ducimus. Porro id id amet excepturi. Quidem amet ea expedita hic. Laborum sed modi rerum id distinctio voluptatem.</p><p>Nisi facere suscipit quo inventore nulla. Eum commodi tempora qui cum. Omnis alias sit quia omnis fugiat. Exercitationem qui non dolorem animi repellendus. Veniam beatae aut neque cupiditate.</p><p>Magni dicta fugiat possimus itaque nihil commodi minima sunt. Et ipsum voluptas officia illum sed. Qui eaque eos fuga qui molestias.</p>', NULL, '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(12, 2, 2, 'Facere eos.', 'doloribus-recusandae-et-nobis-suscipit-ipsam-praesentium', NULL, 'Aut cupiditate ea numquam natus enim. Quisquam ad blanditiis quas id soluta provident qui. Qui sint odit veniam molestias sint perspiciatis. Et omnis et delectus incidunt qui quos.', '<p>Enim consequuntur ab ex dolorem temporibus nemo culpa. Nemo quia aliquam voluptas eveniet consequatur doloremque. Et error omnis cupiditate rem culpa est.</p><p>Sint molestiae fuga voluptate minima porro corrupti a. Dolor quidem assumenda odio. Corporis amet qui quibusdam quasi similique aperiam tempore.</p><p>Odio natus officia nostrum nihil incidunt fugit nam. Voluptas consequuntur minus odit fugiat deserunt ea. Praesentium et distinctio blanditiis asperiores delectus nihil dolore eos. Nihil aut quidem qui minus voluptatum.</p><p>Ratione minima modi tempora repudiandae aut. Vel aliquam at sed laudantium. Possimus veniam minus tempore.</p><p>Mollitia blanditiis nesciunt harum excepturi odit sunt. Necessitatibus possimus magnam quas fuga vel soluta ea. Assumenda et ut unde beatae quam.</p><p>Reiciendis nostrum omnis modi odio vel soluta. Accusamus ad eius debitis assumenda vero. Dolores dolorem dolor ea ducimus.</p><p>Itaque suscipit voluptatem voluptatem corporis qui. A sunt praesentium vitae fugit laborum. Recusandae molestias omnis temporibus non. Autem ipsam et et.</p><p>Id in unde praesentium. Vel ut quis aut et quo. Odit iusto quas et sunt. Nisi praesentium quisquam quaerat explicabo illo molestiae.</p>', NULL, '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(13, 2, 3, 'Dicta perspiciatis officiis.', 'dignissimos-atque-vel-in-rerum-rerum-itaque-quia-earum', NULL, 'Quasi inventore fugiat asperiores necessitatibus. Nobis reiciendis repellat quidem consectetur sint. Aut quibusdam sint dignissimos adipisci ut consequatur natus. Et id recusandae inventore asperiores molestiae.', '<p>Et labore optio id nihil excepturi qui. Molestiae ut praesentium id ab voluptas voluptates. Explicabo molestiae id ducimus corrupti. Facere qui quos numquam nulla nihil qui.</p><p>Distinctio quas voluptas ut explicabo. Id reiciendis qui officiis animi quos et.</p><p>Quisquam sunt aspernatur labore perspiciatis quo aut. Voluptatum voluptatem fuga dolorum voluptas dolores voluptatum. Aliquam fugiat ut distinctio provident assumenda.</p><p>Expedita quam consectetur error recusandae eaque voluptatem. Voluptatum tenetur animi molestiae laboriosam provident facere. Porro quibusdam aspernatur quia veniam ut consequuntur.</p><p>Ut dolor est soluta cum. Doloribus quia veritatis autem eligendi voluptas. Quia dicta debitis eum officia voluptatem. Natus provident ab nihil animi porro qui dolore.</p><p>Impedit ut cum velit nisi et velit autem. Quo nihil veritatis veritatis corrupti.</p><p>A iste esse ut consectetur sequi commodi. Labore dolorem et eaque voluptatem voluptatem possimus. Aliquid quasi quod vitae aut nihil ut accusantium molestiae. Eaque doloremque libero expedita voluptates tempora est consequatur quisquam.</p><p>Voluptas enim perspiciatis tempore quam minus sit. Enim id ut aut odio. Iure et aliquid possimus blanditiis est. Minima ipsa veniam explicabo eum et ut quos.</p>', NULL, '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(14, 1, 2, 'Sed expedita quo unde dolorem molestias.', 'et-in-ea-dolorum-id-autem', NULL, 'Est molestiae nihil modi quam. Optio facilis minima unde error. Distinctio similique expedita temporibus sequi et dolores enim.', '<p>Itaque adipisci ex dolores et ratione. Asperiores quod velit vitae. Iusto in ad ullam harum pariatur consequatur consectetur.</p><p>Ducimus expedita porro temporibus autem delectus laudantium veritatis. Rerum aut est expedita animi accusantium. Autem ex eum eaque autem reprehenderit rerum assumenda.</p><p>Quaerat et omnis nisi excepturi voluptatem explicabo non eos. Quia quae minima recusandae est culpa. Eius accusantium ex similique ullam.</p><p>Omnis voluptas animi aperiam aut maiores necessitatibus. Facilis repellendus quisquam quae aliquam est voluptatem accusantium. Blanditiis velit sunt quia sit. Delectus molestiae laboriosam occaecati et qui magni laborum cumque.</p><p>Blanditiis sequi itaque iure minus consectetur. Et ut culpa distinctio unde numquam magnam aliquam.</p><p>Pariatur modi repellendus qui dolores illo ipsam dolorem. Assumenda et temporibus laborum illum. Nisi eum et facilis pariatur. Veniam est omnis quo omnis ut ex saepe.</p><p>Qui et quia autem iure necessitatibus vero. Cumque praesentium id itaque voluptatem quaerat quaerat vitae fugiat. At laboriosam quas ab hic. Ex illum harum voluptas expedita et reiciendis.</p>', NULL, '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(15, 1, 3, 'Vel et quis qui totam quaerat.', 'eligendi-ut-voluptas-ducimus-vitae-suscipit-porro-ut', NULL, 'Et exercitationem ipsum cumque fugit laborum. Animi et et officiis qui nesciunt et voluptatem fugit. Libero iusto deserunt placeat aut incidunt inventore ratione quia.', '<p>Rem ratione consequuntur qui corporis. Dignissimos est eum possimus quo.</p><p>Enim quos vero explicabo consectetur sint mollitia quia. Dolorem sequi fugit aperiam eligendi soluta unde asperiores. Aliquam consequatur quia tempora. Dolores asperiores quo incidunt fugiat dolore sunt id voluptas. Ab itaque debitis dolores accusamus eos unde expedita.</p><p>Quisquam voluptatem qui facere illo modi. Adipisci nihil sapiente hic enim culpa. Laborum odio eos nobis rem eveniet qui. Deleniti et corporis porro consequuntur.</p><p>Qui quas consequatur nobis atque. Veritatis et blanditiis ipsam eius dolores ut rerum. Ut non occaecati est explicabo eveniet.</p><p>Voluptatum veritatis et impedit eaque. Nobis dolorem at ab praesentium. Amet dolores voluptatem quod quia quia et.</p><p>Repudiandae fugit placeat odit dolorem officiis quibusdam et. Aut dolores ipsam quis nihil error culpa atque. Soluta ut et voluptatum unde quasi sapiente excepturi.</p><p>Quis temporibus ratione tempore et minus officia velit. Qui adipisci deleniti corrupti cum. Sunt corporis delectus rerum provident itaque facilis voluptate.</p><p>Facere ab consequatur qui mollitia corporis. Praesentium quisquam magni animi odit. Quaerat ut qui earum natus. Officiis deserunt dolores est eos est omnis.</p>', NULL, '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(16, 2, 3, 'Et ratione dolorem rem quas.', 'neque-ut-repudiandae-voluptatum-dolorem', NULL, 'Numquam quaerat molestiae velit impedit. Eum pariatur quo dolor eum. Facere consequuntur et distinctio deserunt hic dolor distinctio.', '<p>Enim non sit voluptatem quis saepe similique minima ut. Harum animi occaecati ab. Numquam ea deserunt atque repudiandae quos vero illum. Quam facere omnis aliquid et.</p><p>Cum molestiae voluptatibus aut dolorem et omnis fuga. Ut enim vel consequatur fuga culpa. Reiciendis possimus tempora rem est. Explicabo perferendis accusantium officia.</p><p>Ducimus enim ducimus ipsa aut non dolorem. Et aut et rerum. Sed sit neque magnam libero tenetur iure. Nisi hic consequatur ipsum a nihil laboriosam autem.</p><p>Provident odit suscipit quae voluptas nostrum rem. Dolorem consequatur dolor qui mollitia non. Consequatur excepturi repellat nobis sunt aut minima architecto.</p><p>Inventore officia qui assumenda voluptates. Voluptatibus deserunt officia magni. Quidem quia eveniet et porro vitae porro. Explicabo rem autem eum rerum repudiandae autem maiores. Voluptatem est vel fugit optio dolore.</p><p>Dicta vero suscipit placeat. Fuga quae assumenda aperiam illo perspiciatis dolores. Placeat voluptates quia adipisci consectetur quos dolor. Similique temporibus labore voluptate omnis quisquam hic laboriosam.</p>', NULL, '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(17, 2, 1, 'Dolorem et odio dolorem quod optio est molestias qui saepe beatae.', 'dolore-quaerat-delectus-non-nisi-ipsa-repudiandae-maiores-culpa', NULL, 'Veritatis aut aliquid exercitationem. Aut dolorem nihil tempore suscipit. Excepturi recusandae minus et inventore aspernatur fugiat minus.', '<p>Consequatur vero sapiente consequatur qui reprehenderit. Quod assumenda autem neque sit expedita. Exercitationem hic dolores maiores ullam placeat.</p><p>Dolor aut ut mollitia eveniet inventore nostrum. Id optio sapiente et quae qui omnis. Reprehenderit ipsam possimus adipisci blanditiis.</p><p>Blanditiis sit id sed ut. Recusandae fugit magnam necessitatibus tempore fugit modi.</p><p>Ut earum architecto culpa ut a ipsum. At et et quaerat sed.</p><p>Aut officiis laboriosam labore laudantium. Rerum in et ipsam alias aut.</p><p>Nisi dolores ipsa et ea quia voluptatem mollitia. Quod et aliquam deleniti facilis. Iusto voluptate vel totam illum. Sint non et voluptas illo consequatur.</p><p>Sint reprehenderit nihil minima reprehenderit pariatur est fuga. Corporis quidem et et nostrum id. Aut tempore perferendis libero voluptatem. Quia alias non et unde fugit occaecati.</p>', NULL, '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(18, 3, 2, 'Enim est minus.', 'hic-aut-possimus-officiis-eius', NULL, 'Natus aut repudiandae quaerat eum quis. Dolores consequatur ea doloremque sed harum occaecati voluptas. Corrupti et dolorum aspernatur et perferendis numquam. Necessitatibus officia assumenda quas necessitatibus veritatis.', '<p>Blanditiis dolor assumenda qui eum ratione. Labore non dolor quibusdam at officiis asperiores quo. Perspiciatis ex assumenda incidunt ut quod et nobis.</p><p>Ab minima laborum vero asperiores rem. Animi aliquid nam libero mollitia quia. Ut quia necessitatibus quod laborum. Dolores vitae sapiente sit et vero inventore.</p><p>Illum illo aut dolorem vero minima quod est. Reiciendis est incidunt sunt. Quo deleniti ipsa vero est qui quia enim. Ut dolore modi omnis aperiam in enim sunt laborum.</p><p>Ab facilis consequatur harum corrupti deserunt. Sint fuga et illo consequatur et praesentium. Et libero expedita dolores deleniti tempore. Facere quia odit eum ut. Accusamus sed sit animi veniam quibusdam et ut enim.</p><p>Aut pariatur et quia aut reiciendis. Sed minima aut rem nihil. Eum quia vel totam et sed. Ut eum autem impedit necessitatibus nemo inventore aut minus.</p><p>Consequuntur iusto omnis eaque id amet dolor quia. Alias ullam adipisci recusandae amet commodi. Facilis ratione labore qui culpa quaerat delectus cumque quis.</p><p>Molestiae illo magni officiis aut inventore ratione. Quam consequatur error voluptate aspernatur. Sed rerum voluptatem in dolorum.</p><p>Delectus placeat ut aut totam. In et amet adipisci deleniti. Culpa voluptatibus odit laborum et. Sunt rerum accusantium qui cupiditate.</p><p>Deleniti perspiciatis explicabo quo commodi rem ex pariatur. Deleniti velit laudantium asperiores consequuntur et fugit quo. Suscipit omnis quas nobis. Aut quis corporis ratione neque consectetur corrupti quidem.</p><p>Molestias excepturi odio doloribus consequatur aspernatur id laborum. Est accusantium minus expedita qui. At ducimus dicta qui ad autem fugiat vel. Rerum inventore inventore voluptas fugiat dolore.</p>', NULL, '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(19, 3, 1, 'Quaerat quo dolor dolor et.', 'recusandae-voluptas-sed-nemo-dolor-unde', NULL, 'Dolores quae quo aut nihil. Sunt at sequi dolorum. Nisi consequatur placeat aut sit laudantium temporibus qui. Aut voluptates molestiae harum omnis consectetur impedit.', '<p>Placeat aut deserunt ipsum voluptatem ut praesentium sit. Voluptatem perferendis magni quasi voluptatem eos quia nulla. Ipsum est distinctio sunt eius. Explicabo quas numquam necessitatibus veniam. Ut non modi rerum qui est sapiente provident.</p><p>Molestiae praesentium ad necessitatibus non dolores. Perspiciatis totam sit voluptatem facere sed. Voluptatem et explicabo quo adipisci voluptatem ipsam.</p><p>Molestias id illum est. Aut sunt rerum ullam placeat recusandae. Voluptas consequatur numquam tempora accusantium illo.</p><p>Corrupti reiciendis optio eum impedit ducimus. Neque et aut repellat deserunt ut sunt. Facere commodi nihil qui est sint sed est.</p><p>Labore eius deserunt expedita et et consequuntur ut. Saepe suscipit dolore aut nostrum corrupti molestiae sit. Distinctio veniam consequatur rerum odit dignissimos tenetur et harum.</p><p>Et libero in exercitationem et quia. Rerum excepturi quia nostrum aut. Accusamus quidem quae odio veritatis debitis consequuntur. Accusantium et ratione ut eum perspiciatis ut.</p><p>Eos qui molestiae id laborum accusantium. Maxime rerum at et itaque. Sint et cumque sequi aliquam quia provident. In magni aut et et id.</p><p>Repudiandae vero ducimus porro deserunt sequi et. Ut impedit maxime porro magnam iste voluptatibus aut sunt. Labore aut vero sit exercitationem aut deleniti. Quia enim repudiandae dignissimos in aut et. Sit quia animi omnis nobis.</p><p>Perspiciatis ratione delectus dolore. Quibusdam est voluptatum aliquid error. Adipisci rerum alias nulla voluptas qui ipsa.</p><p>Est nobis eum accusamus enim. Sunt qui et aut quibusdam qui aliquam sit. Omnis vero nostrum deleniti molestiae officiis repudiandae.</p>', NULL, '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(20, 3, 1, 'Ad reprehenderit laborum porro similique similique tenetur.', 'et-a-sunt-fugiat-similique-officiis', NULL, 'Autem incidunt dolores error nemo delectus commodi fuga. In voluptate saepe saepe provident ipsam eligendi eaque. Voluptatem et earum reprehenderit perspiciatis unde omnis.', '<p>Adipisci quis autem facilis labore voluptatem ea. Enim rem explicabo quo molestiae debitis voluptate et. Itaque tempore occaecati enim nulla.</p><p>Dicta corrupti sit sed non sed rerum. Quam eaque quas voluptatem est. Molestias voluptatem est suscipit quia. Enim aut soluta in facere fugit nihil.</p><p>Laboriosam quisquam ea iure id. Enim debitis cum est sit et dolor. Beatae non fugiat occaecati earum magnam. Mollitia quisquam omnis quod reiciendis sed a aut.</p><p>Adipisci quos veritatis quia aut dolorem. Repellendus dolores sed cum voluptates. In voluptatem sint enim atque doloremque iste saepe.</p><p>Nemo doloribus atque eos omnis quam tempora. Modi praesentium ea eaque temporibus qui blanditiis. Fugiat omnis ipsam nisi. Quod autem aperiam dolores aut.</p><p>Minus id eos dolor. Et laborum ut esse aperiam. Labore nemo quo reprehenderit et.</p><p>Error id minima dolores eligendi error quis dolores. Et cupiditate et in et. Aliquid illo eveniet omnis quas deleniti perferendis. Aperiam eos maiores et dolores assumenda.</p>', NULL, '2023-01-21 05:54:39', '2023-01-21 05:54:39');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyeks`
--

CREATE TABLE `proyeks` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_tiket_proyek` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `donesale_id` bigint(20) UNSIGNED NOT NULL,
  `title` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unprocessed',
  `user_id` bigint(20) UNSIGNED NOT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `proyeks`
--

INSERT INTO `proyeks` (`id`, `no_tiket_proyek`, `donesale_id`, `title`, `status`, `user_id`, `file`, `created_at`, `updated_at`) VALUES
(1, 'MBE23012620001001', 1, 'Proyek Masa Depan', 'Solved', 6, 'SPK-files/sFszUPvK0fmAQz5guP3YvUHYQSbHgD4jK7p9zVAh.pdf', '2023-01-26 13:20:18', '2023-01-26 13:29:56'),
(2, 'MBE23012620003002', 2, 'Sollar Panel', 'Process', 6, 'SPK-files/RateNoaeZ9nVan5GVA6fMnLetj2KKFAHaVdBluiN.pdf', '2023-01-26 13:21:09', '2023-01-26 13:22:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sales`
--

CREATE TABLE `sales` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_tiket_sales` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `client_id` bigint(20) UNSIGNED DEFAULT NULL,
  `user_id` bigint(20) UNSIGNED DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT 'Unprocessed',
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `sales`
--

INSERT INTO `sales` (`id`, `no_tiket_sales`, `client_id`, `user_id`, `status`, `keterangan`, `file`, `created_at`, `updated_at`) VALUES
(1, '2301212301001001', 1, 5, 'Solved', 'Selesai', 'Tim-Sales/0JbvHYdjX5PQW3zQ60ohbFHShfL0zSnqXpXMrtOP.pdf', '2023-01-21 06:13:02', '2023-01-21 06:17:11'),
(2, '2301212301004002', 4, 5, 'Process', NULL, NULL, '2023-01-21 06:13:31', '2023-01-21 06:15:53'),
(3, '2301212301004003', 4, 5, 'Solved', 'Selesai', 'Tim-Sales/upb8VUJEq5ZxvwrbCb5AMuoBw33rjQPSd8GSAZBW.pdf', '2023-01-21 06:15:18', '2023-01-26 13:14:18'),
(4, '2301212301004004', 4, 5, 'Unprocessed', NULL, NULL, '2023-01-21 06:26:50', '2023-01-21 06:26:50'),
(5, '2301212301006005', 6, 5, 'Process', NULL, NULL, '2023-01-21 06:55:41', '2023-01-21 06:57:21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `proyek_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tahapan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `keterangan` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `status` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'Unprocessed',
  `billing_id` bigint(20) DEFAULT NULL,
  `file` varchar(255) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `statuses`
--

INSERT INTO `statuses` (`id`, `proyek_id`, `tahapan`, `keterangan`, `status`, `billing_id`, `file`, `created_at`, `updated_at`) VALUES
(10, 1, 'BAST I', 'A', 'Solved', 1, 'Tim-Proyek/ghxEORgE4EMdaOrOCNPaIBECHksunMs30nk22ghm.pdf', '2023-01-26 13:18:30', '2023-01-26 13:29:45'),
(11, 1, 'BAST II', 'B', 'Solved', 1, 'Tim-Proyek/ZnKmTBGjn17NlI6sR5yMTlKyWqj7Vgmn9ivhMciA.pdf', '2023-01-26 13:18:30', '2023-01-26 13:29:45'),
(12, 1, 'BAST III', 'C', 'Solved', 1, 'Tim-Proyek/KVGIHMDBnPDoiq8s77noU0mybag5iinKvqVEmWkc.pdf', '2023-01-26 13:18:30', '2023-01-26 13:29:45'),
(16, 2, 'BAST I', 'Gambar For Tender', 'Process', NULL, NULL, '2023-01-26 13:21:08', '2023-01-26 13:22:33'),
(17, 2, 'BAST II', 'Gambar For Tender', 'Unprocessed', NULL, NULL, '2023-01-26 13:21:08', '2023-01-26 13:21:08'),
(18, 2, 'BAST III', 'Tahap Pengawasan Berkala', 'Unprocessed', NULL, NULL, '2023-01-26 13:21:08', '2023-01-26 13:21:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `employee_id` bigint(20) UNSIGNED DEFAULT NULL,
  `nik` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `level_user` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `status` int(11) NOT NULL DEFAULT 1,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `employee_id`, `nik`, `password`, `level_user`, `status`, `remember_token`, `created_at`, `updated_at`) VALUES
(1, 1, '221014080001', '$2y$10$i8VUcC/MlTNCUBQpAg/jh.ISOmrjuoxKCN9rTc.zf/j0IbonuvV96', 'super_admin', 1, NULL, '2023-01-21 05:54:39', '2023-01-21 05:54:39'),
(2, 2, '202312108002', '$2y$10$eGue2AFS/hDRU1RttuPQ8OXehFjDHkxgR7eqYKD/axwdtx0myHWXq', 'admin', 1, NULL, '2023-01-21 05:57:45', '2023-01-21 05:57:45'),
(3, 6, '202311010006', '$2y$10$gavRv4iksauVPofa8fO8seJFpQEqVaYIUDrTgPB1WDVzkHqh312.O', 'manajer_sales', 1, NULL, '2023-01-21 06:10:11', '2023-01-21 06:10:11'),
(4, 7, '202311010007', '$2y$10$1GARsu9dk0qZrePE1C9jiuqIbSYDzeAuFujmVJ3SVr9CR1s.vwNV6', 'manajer_proyek', 1, NULL, '2023-01-21 06:10:41', '2023-01-21 06:10:41'),
(5, 8, '202311010008', '$2y$10$db4XW4MCycquDQ7OC6ClWeYCAQXrn3I/w1Ms1koEprxHkF7zo1Pue', 'tim_sales', 1, NULL, '2023-01-21 06:10:53', '2023-01-21 06:10:53'),
(6, 9, '202311010009', '$2y$10$3Whil1ZP3OqlYAyZR.3yYOu1tQtDRGdHouJC5EaLI3mNLLW0pgx0a', 'tim_proyek', 1, NULL, '2023-01-21 06:11:04', '2023-01-21 06:11:04'),
(7, 15, 'super_admin', '$2y$10$kWcjsT1lBU4.GwuyV.Kn0e2jmdK/qg2xfrAMuyXTtcn1ik7BknfH2', 'admin', 1, NULL, '2023-01-30 01:53:42', '2023-01-30 01:55:12');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `billings`
--
ALTER TABLE `billings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `billings_status_id_unique` (`status_id`),
  ADD UNIQUE KEY `billings_no_biling_unique` (`no_biling`);

--
-- Indeks untuk tabel `cancles`
--
ALTER TABLE `cancles`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `cancles_sale_id_unique` (`sale_id`);

--
-- Indeks untuk tabel `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `clients_kode_client_unique` (`kode_client`);

--
-- Indeks untuk tabel `doneproyeks`
--
ALTER TABLE `doneproyeks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `doneproyeks_proyek_id_unique` (`proyek_id`);

--
-- Indeks untuk tabel `donesales`
--
ALTER TABLE `donesales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `donesales_sale_id_unique` (`sale_id`);

--
-- Indeks untuk tabel `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `employees_nik_unique` (`nik`),
  ADD UNIQUE KEY `employees_email_unique` (`email`);

--
-- Indeks untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `failed_jobs_uuid_unique` (`uuid`);

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
-- Indeks untuk tabel `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `proyeks`
--
ALTER TABLE `proyeks`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `proyeks_no_tiket_proyek_unique` (`no_tiket_proyek`),
  ADD UNIQUE KEY `proyeks_donesale_id_unique` (`donesale_id`);

--
-- Indeks untuk tabel `sales`
--
ALTER TABLE `sales`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `sales_no_tiket_sales_unique` (`no_tiket_sales`);

--
-- Indeks untuk tabel `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `users_nik_unique` (`nik`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `billings`
--
ALTER TABLE `billings`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `cancles`
--
ALTER TABLE `cancles`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `categories`
--
ALTER TABLE `categories`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `clients`
--
ALTER TABLE `clients`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `doneproyeks`
--
ALTER TABLE `doneproyeks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `donesales`
--
ALTER TABLE `donesales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `employees`
--
ALTER TABLE `employees`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `failed_jobs`
--
ALTER TABLE `failed_jobs`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `personal_access_tokens`
--
ALTER TABLE `personal_access_tokens`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `posts`
--
ALTER TABLE `posts`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `proyeks`
--
ALTER TABLE `proyeks`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `sales`
--
ALTER TABLE `sales`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `statuses`
--
ALTER TABLE `statuses`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
