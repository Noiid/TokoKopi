-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Jun 2021 pada 09.27
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.3.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kopi_rakjat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id_artikel` int(11) NOT NULL,
  `id` bigint(20) DEFAULT NULL,
  `judul_artikel` varchar(100) NOT NULL,
  `deskripsi_artikel` varchar(10000) DEFAULT NULL,
  `waktu_upload` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `gambar_artikel` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id_artikel`, `id`, `judul_artikel`, `deskripsi_artikel`, `waktu_upload`, `gambar_artikel`, `created_at`, `updated_at`) VALUES
(3, 1, 'Fakta-fakta kopi robusta', '<p>Para pencinta kopi pasti udah tau kalau terdapat berbagai jenis kopi yang dijual di pasaran. Ada kopi yang dibagi sesuai takarannya, cara penyeduhannya, dan juga rasanya. Tapi, kayaknya kamu juga perlu tau variasi yang paling mendasar banget, yaitu berdasarkan jenis kopinya.</p>\r\n\r\n<p>Secara umum, biji kopi terbagi menjadi 3 jenis, yakni Robusta, Arabika, dan juga Liberika. Namun, kali ini kita akan mengetahui lanjut seputar kopi Robusta dan kenapa jenis kopi ini spesial di mata penikmat kopi di seluruh dunia.</p>\r\n\r\n<p>Langsung aja, yuk, simak beberapa fakta menarik seputar kopi Robusta berikut ini!</p>\r\n\r\n<h2>Robusta Lebih Pahit dan Punya Efek yang Lebih Kuat</h2>\r\n\r\n<p>Robusta dan Arabika adalah dua jenis biji kopi yang paling umum dikonsumsi dan diproduksi di seluruh dunia. Keduanya memiliki kualitas yang tinggi dan nikmat buat dikonsumsi sehari-hari.</p>\r\n\r\n<p>Tapi, rupanya terdapat salah satu perbedaan kopi Robusta dan Arabika yang paling penting, yaitu yang terletak pada cita rasanya. Kopi Arabika memiliki rasa yang lebih lembut dan manis, sedangkan Robusta memiliki rasa yang cenderung kuat dan pahit.</p>\r\n\r\n<p>Hal ini bukan berarti Robusta nggak lebih oke. Rasa yang dimiliki Robusta nyatanya disukai banyak banget penikmat kopi yang lebih pahit. Terlebih lagi, rasa pahit itu sebenarnya juga menandakan kadar kafein pada Robusta yang tinggi, yaitu 1.5-3.3%, atau 2 kali lipat dari kandungan kafein Arabika.</p>\r\n\r\n<h2>Bentuk yang Berbeda dengan Arabika</h2>\r\n\r\n<p>Perbedaan kopi Robusta dan Arabika kedua ada pada bentuknya. Bentuk dari biji kopi yang dihasilkannya pun juga berbeda. Biji Arabika berbentuk lonjong dengan belahan di tengah yang bergelombang. Tetapi pada Robusta, bentuk biji lebih bulat dan belahan yang dimiliki juga cenderung lebih lurus.</p>', '2021-05-26 14:19:54', 'artikel/Artikel3_1622038794460robusta.jpg', '2021-05-26 07:19:54', '2021-05-26 07:19:54'),
(4, 1, '5 Jenis Kopi Asal Indonesia', '<p><em>Indonesia adalah satu negara yang memproduksi kopi terbesar di dunia. Terdapat berbagai macam dengan ciri khas kopi dari masing-masing daerah di Indonesia.</em></p>\r\n\r\n<hr />\r\n<p>Kamu tahu enggak kalau Indonesia itu menempati posisi ke-4 dari segi hasil produksi kopi, loh. Kenikmatan kopi asal Indonesia tidak perlu diragukan lagi dan sudah mendunia.&nbsp;</p>\r\n\r\n<p>Jenis kopi Indonesia biasanya terbagi atas tiga macam, yaitu arabika, robusta, dan liberika. Macam-macam kopi di Indonesia ini terkenal dan punya cita rasa masing-masing. Ini dia 10 jenis kopi Indonesia yang harus kamu ketahui dan coba!</p>\r\n\r\n<ol>\r\n	<li>\r\n	<h3><strong>Kopi Gayo&nbsp;</strong></h3>\r\n\r\n	<p>Kopi Gayo ini berasal dari Aceh yang banyak tumbuh di dataran tinggi daerah Kabupaten Bener Meriah dan Gayo Lues. Dari total seluruh panen kopi di Indonesia, Aceh merupakan salah satu daerah penghasil arabika terbesar.</p>\r\n\r\n	<p>Kalau soal rasa, menurut para penikmat kopi, rasa Kopi Gayo berbeda dari arabika kebanyakan. Selain rasanya yang unik dan tidak terlalu pahit, wanginya pun enak.</p>\r\n\r\n	<p>Rasa dan aromanya itulah yang membuat kopi gayo terkenal dan menjadi salah satu kopi terbaik dan termahal.</p>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Kopi Lanang&nbsp;</strong></h3>\r\n\r\n	<p>Kalau kamu suka untuk mencoba kopi-kopi langka, kamu harus coba Kopi Lanang. Kopi Lanang berasal dari biji kopi pasca panen yang mengalami anomali atau kelainan.</p>\r\n\r\n	<p>Biji Kopi Lanang biasanya berbentuk bulat lonjong tanpa belah, yang tentu berbeda dari biji kopi pada umumnya.</p>\r\n\r\n	<p>Kopi lanang dapat berasal dari jenis arabika, robusta, dan lainnya, Toppers. Hal inilah yang membuat produksi kopi lanang tidak&nbsp; sebanyak lainnya.</p>\r\n\r\n	<p>Soal rasa, Kopi Lanang memiliki rasa yang lebih lembut, tekstur yang lebih padat, dan mengandung kafein yang lebih tinggi.</p>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Kopi Toraja&nbsp;</strong></h3>\r\n\r\n	<p>Dari namanya saja, kamu pasti tahu kalau kopi ini berasal dari Toraja, Sulawesi Selatan. Proses kopi ini menggunakan metode giling basah, Toppers.</p>\r\n\r\n	<p>Kopi Toraja terkenal di dalam negeri hingga mancanegara. Bahkan, sekarang sudah banyak tersebar ke Jepang dan Amerika.</p>\r\n\r\n	<p>Kopi Toraja memiliki dua varian, yaitu arabika dan robusta. Rasanya tidak terlalu kuat dan sentuhan rasa khas Indonesia, seperti kayu manis dan kapulaga.</p>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Kopi Kintamani Bali&nbsp;</strong></h3>\r\n\r\n	<p>Kopi Kintamani Bali ini masuk ke dalam jenis arabika. Salah satu faktor yang membuat rasa Kopi Kintamani spesial adalah cara pengolahannya, yaitu menggunakan sistem irigasi.</p>\r\n\r\n	<p>Hal menarik dari kopi asal Bali ini adalah menghadirkan rasa pahit dengan cita rasa jeruk.&nbsp;<em>Aftertaste</em>&nbsp;yang segar menjadi ciri khas Kopi Kintamani.</p>\r\n	</li>\r\n	<li>\r\n	<h3><strong>Kopi Java Ijen Raung&nbsp;</strong></h3>\r\n\r\n	<p>Kopi Ijen Raung berasal dari Bondowoso, Jawa Timur, masuk ke dalam jenis arabika. Rasa yang dihasilkan dari jenis kopi Indonesia yang satu ini adalah kacang-kacangan dan sedikit rasa coklat..</p>\r\n\r\n	<p>Tingkat keasaman dari kopi Java Ijen Raung ini lebih rendah daripada jenis arabika lainnya, Toppers.</p>\r\n	</li>\r\n</ol>', '2021-06-02 03:20:58', 'artikel/Artikel4_1622604058305membuat-kopi-813x420.jpg', '2021-06-01 20:20:58', '2021-06-01 20:20:58');

-- --------------------------------------------------------

--
-- Struktur dari tabel `cart`
--

CREATE TABLE `cart` (
  `id_cart` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id` bigint(20) DEFAULT NULL,
  `qty_cart` int(11) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `cart`
--

INSERT INTO `cart` (`id_cart`, `id_produk`, `id`, `qty_cart`, `created_at`, `updated_at`) VALUES
(3, 2, 2, 3, '2021-06-03 03:09:49', '2021-06-07 09:36:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `comment`
--

CREATE TABLE `comment` (
  `id_comment` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `isi_comment` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `comment`
--

INSERT INTO `comment` (`id_comment`, `id_produk`, `id_transaksi`, `isi_comment`, `created_at`, `updated_at`) VALUES
(1, 3, 2, 'Apik sangar', '2021-06-17 03:12:29', '2021-06-17 03:12:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_comment`
--

CREATE TABLE `gambar_comment` (
  `id_gambar_comment` int(11) NOT NULL,
  `id_comment` int(11) DEFAULT NULL,
  `gambar_comment` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar_comment`
--

INSERT INTO `gambar_comment` (`id_gambar_comment`, `id_comment`, `gambar_comment`, `created_at`, `updated_at`) VALUES
(1, 1, 'rating/comment_tr2_Will_pro3_1623924749913toraja.jpeg', '2021-06-17 03:12:29', '2021-06-17 03:12:29'),
(2, 1, 'rating/comment_tr2_Will_pro3_1623924749322kintamani.jpg', '2021-06-17 03:12:29', '2021-06-17 03:12:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_produk`
--

CREATE TABLE `gambar_produk` (
  `id_gambar_produk` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `gambar_produk` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar_produk`
--

INSERT INTO `gambar_produk` (`id_gambar_produk`, `id_produk`, `gambar_produk`, `created_at`, `updated_at`) VALUES
(2, 2, 'produk/Kintamani_1622020761959bali-kintamani-sentrakopi.jpg', '2021-05-26 02:19:21', '2021-05-26 02:19:21'),
(3, 2, 'produk/Kintamani_1622604279214kintamani.jpg', '2021-06-01 20:24:39', '2021-06-01 20:24:39'),
(4, 3, 'produk/Kopi Toraja_1622604460425toraja.jpeg', '2021-06-01 20:27:40', '2021-06-01 20:27:40'),
(5, 3, 'produk/Kopi Toraja_1622604492473OIP.jpg', '2021-06-01 20:28:12', '2021-06-01 20:28:12');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `created_at`, `updated_at`) VALUES
(2, 'Robusta', '2021-04-30 12:21:14', '2021-04-30 12:21:14'),
(3, 'Arabika', '2021-06-01 20:25:08', '2021-06-01 20:25:08');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_transaksi` int(11) NOT NULL,
  `tgl_pembayaran` date NOT NULL,
  `bukti_pembayaran` varchar(255) NOT NULL,
  `status_pembayaran` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_transaksi`, `tgl_pembayaran`, `bukti_pembayaran`, `status_pembayaran`, `created_at`, `updated_at`) VALUES
(1, 2, '2021-06-14', 'pembayaran/Pembayaran_Will_1623679083272membuat-kopi-813x420.jpg', 'Tidak Valid', '2021-06-14 06:58:03', '2021-06-14 07:44:32'),
(2, 2, '2021-06-14', 'pembayaran/Pembayaran_Will_162368260371kintamani.jpg', 'Valid', '2021-06-14 07:56:43', '2021-06-14 07:58:19');

-- --------------------------------------------------------

--
-- Struktur dari tabel `petani`
--

CREATE TABLE `petani` (
  `id_petani` int(11) NOT NULL,
  `nama_petani` varchar(255) NOT NULL,
  `alamat_petani` varchar(255) DEFAULT NULL,
  `telp_petani` varchar(20) DEFAULT NULL,
  `gambar_petani` varchar(255) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `berat` decimal(10,2) DEFAULT NULL,
  `kadaluarsa` date DEFAULT NULL,
  `stok` int(11) NOT NULL,
  `deskripsi_produk` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_kategori`, `nama_produk`, `harga_produk`, `berat`, `kadaluarsa`, `stok`, `deskripsi_produk`, `created_at`, `updated_at`) VALUES
(2, 2, 'Kintamani', 43000, '2.50', '2022-05-11', 100, 'Kintamani, biji kopi yang selalu dinantikan oleh banyak orang karena aroma nya yang wangi', '2021-05-26 01:02:20', '2021-05-26 01:02:20'),
(3, 3, 'Kopi Toraja', 65000, '300.00', '2023-06-02', 40, 'Kopi Toraja Kalosi merupakan nama sebuah kopi yang berasal dari dua daerah yang berbeda. Biji kopi Toraja Kalosi di tanam di daerah pegunungan tinggi Sulawesi Selatan.', '2021-06-01 20:26:43', '2021-06-01 20:26:43');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_toko`
--

CREATE TABLE `profil_toko` (
  `id_toko` int(11) NOT NULL,
  `nama_toko` varchar(100) DEFAULT NULL,
  `deskripsi_toko` varchar(1000) DEFAULT NULL,
  `alamat_toko` varchar(1000) DEFAULT NULL,
  `nomor_telp` varchar(20) DEFAULT NULL,
  `email_toko` varchar(100) DEFAULT NULL,
  `wa_toko` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `profil_toko`
--

INSERT INTO `profil_toko` (`id_toko`, `nama_toko`, `deskripsi_toko`, `alamat_toko`, `nomor_telp`, `email_toko`, `wa_toko`, `created_at`, `updated_at`) VALUES
(1, 'Kopi Rakjat1', 'Toko ini', 'Malang11', '0341-27276871', 'kopirakjat@gmail.com1', '08977681', '2021-04-30 22:09:33', '2021-04-30 22:11:42');

-- --------------------------------------------------------

--
-- Struktur dari tabel `rating`
--

CREATE TABLE `rating` (
  `id_rating` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `besar_rating` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rating`
--

INSERT INTO `rating` (`id_rating`, `id_transaksi`, `id_produk`, `besar_rating`, `created_at`, `updated_at`) VALUES
(1, 2, 3, 4, '2021-06-17 03:12:29', '2021-06-17 03:12:29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `sosmed`
--

CREATE TABLE `sosmed` (
  `id_sosmed` int(11) NOT NULL,
  `jenis_sosmed` varchar(100) NOT NULL,
  `nama_sosmed` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `sosmed`
--

INSERT INTO `sosmed` (`id_sosmed`, `jenis_sosmed`, `nama_sosmed`, `created_at`, `updated_at`) VALUES
(2, 'Instagram', '@kopi_rakjat', '2021-04-30 22:16:35', '2021-04-30 22:16:35');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_transaksi`
--

CREATE TABLE `status_transaksi` (
  `id_pengiriman` int(11) NOT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `waktu_checkpoint` datetime NOT NULL,
  `status_pengiriman` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id` bigint(20) DEFAULT NULL,
  `kode_transaksi` char(6) NOT NULL,
  `tgl_transaksi` datetime NOT NULL,
  `alamat_pengiriman` varchar(1000) DEFAULT NULL,
  `biaya_pengiriman` int(11) DEFAULT NULL,
  `total_bayar` int(11) DEFAULT NULL,
  `status_transaksi` varchar(100) NOT NULL,
  `info_pengiriman` varchar(1000) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id`, `kode_transaksi`, `tgl_transaksi`, `alamat_pengiriman`, `biaya_pengiriman`, `total_bayar`, `status_transaksi`, `info_pengiriman`, `created_at`, `updated_at`) VALUES
(2, 2, '2', '2021-06-07 13:20:19', 'Surabaya, Gubeng.', 25000, 545000, 'Selesai', 'Dikirim melalui JNE dengan no. resi 09889918', '2021-06-07 09:59:20', '2021-06-16 10:46:07');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi_produk`
--

CREATE TABLE `transaksi_produk` (
  `id_transaksi_produk` int(11) NOT NULL,
  `id_produk` int(11) DEFAULT NULL,
  `id_transaksi` int(11) DEFAULT NULL,
  `qty_transaksi` int(11) NOT NULL,
  `harga_transaksi` int(11) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi_produk`
--

INSERT INTO `transaksi_produk` (`id_transaksi_produk`, `id_produk`, `id_transaksi`, `qty_transaksi`, `harga_transaksi`, `created_at`, `updated_at`) VALUES
(3, 3, 2, 8, 65000, '2021-06-07 09:59:20', '2021-06-07 09:59:20');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` bigint(20) NOT NULL,
  `id_level` int(11) DEFAULT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `remember_token` varchar(100) DEFAULT NULL,
  `telp_user` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `id_level`, `name`, `email`, `email_verified_at`, `password`, `remember_token`, `telp_user`, `created_at`, `updated_at`) VALUES
(1, 3, 'Admin', 'admin@gmail.com', '2021-06-02 03:28:20', '$2y$10$aQgQOGF4x3xHbx1L7lXWcO3dUh7qnbiuT90BbncYIc6z3EumRS6Tu', 'UCAMBtni5Srr525s6yCBB5wvLXRPQ8AaoTMaIWm07q3VoV0cCgAHh3AbHKQ6', '087665555', '2021-04-30 12:03:41', '2021-04-30 12:12:51'),
(2, 4, 'Will', 'will@gmail.com', '2021-06-02 15:24:33', '$2y$10$FfpeD/zDsEMD6fGlPwA3uO13KFRM6j32D0fTgx37zoP5LHTYtFOsi', 'CUijizRQMO72HdW0RRMjjp8Lk65jbxX4uFfnkNbjw5GtW8FzlsX3lvbTJZbh', '0876779', '2021-05-26 07:54:41', '2021-05-26 08:21:55'),
(3, 3, 'Admin 2', 'admin2@gmail.com', NULL, '$2y$10$Qt9sTPAkBZWrAcBuneH3q.0QVAZrJZzJuTzy5b/WwswnsClJCgihW', 'Y4IGT2jddlbVcqOYvgQ51mjaxs72zStG6RU4mZSOJdBddJ4uc04ISawy0Es6', '0987667', '2021-06-22 21:25:21', '2021-06-22 21:25:21'),
(14, 4, 'Dion', 'mwilliawarma13@gmail.com', '2021-06-28 09:28:28', '$2y$10$0pAzy6PAcsj6tUkxG61wouiccQ97ndHC.tXaI6U3IcxvSZy669qRW', 'BHIqYI7bem25BM740IBGW6u8APlUDLIZBwPIYxqEwCE4drfQLIBsOr5f9hdB', '0987', '2021-06-28 09:26:47', '2021-06-28 09:28:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_level`
--

CREATE TABLE `user_level` (
  `id_level` int(11) NOT NULL,
  `deskripsi_level` varchar(100) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_level`
--

INSERT INTO `user_level` (`id_level`, `deskripsi_level`, `created_at`, `updated_at`) VALUES
(3, 'Admin', '2021-04-30 11:31:06', '2021-04-30 11:31:06'),
(4, 'Pelanggan', '2021-05-26 07:51:10', '2021-05-26 07:51:10');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id_artikel`),
  ADD KEY `fk_artikel_user_arti_user` (`id`);

--
-- Indeks untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id_cart`),
  ADD KEY `fk_cart_produk_ca_produk` (`id_produk`),
  ADD KEY `fk_cart_user_cart_user` (`id`);

--
-- Indeks untuk tabel `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id_comment`),
  ADD KEY `fk_comment_comment_p_produk` (`id_produk`),
  ADD KEY `fk_comment_comment_t_transaks` (`id_transaksi`);

--
-- Indeks untuk tabel `gambar_comment`
--
ALTER TABLE `gambar_comment`
  ADD PRIMARY KEY (`id_gambar_comment`),
  ADD KEY `fk_gambar_c_gambar_co_comment` (`id_comment`);

--
-- Indeks untuk tabel `gambar_produk`
--
ALTER TABLE `gambar_produk`
  ADD PRIMARY KEY (`id_gambar_produk`),
  ADD KEY `fk_gambar_p_gambar_pr_produk` (`id_produk`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `fk_pembayar_transaksi_transaks` (`id_transaksi`);

--
-- Indeks untuk tabel `petani`
--
ALTER TABLE `petani`
  ADD PRIMARY KEY (`id_petani`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `fk_produk_kat_produ_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `profil_toko`
--
ALTER TABLE `profil_toko`
  ADD PRIMARY KEY (`id_toko`);

--
-- Indeks untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`id_rating`),
  ADD KEY `fk_rating_rating_pr_produk` (`id_produk`),
  ADD KEY `fk_rating_rating_tr_transaks` (`id_transaksi`);

--
-- Indeks untuk tabel `sosmed`
--
ALTER TABLE `sosmed`
  ADD PRIMARY KEY (`id_sosmed`);

--
-- Indeks untuk tabel `status_transaksi`
--
ALTER TABLE `status_transaksi`
  ADD PRIMARY KEY (`id_pengiriman`),
  ADD KEY `fk_status_t_transaksi_transaks` (`id_transaksi`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_transaks_user_tran_user` (`id`);

--
-- Indeks untuk tabel `transaksi_produk`
--
ALTER TABLE `transaksi_produk`
  ADD PRIMARY KEY (`id_transaksi_produk`),
  ADD KEY `fk_transaks_produk_be_produk` (`id_produk`),
  ADD KEY `fk_transaks_produk_tr_transaks` (`id_transaksi`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_user_lvl_user_lev` (`id_level`);

--
-- Indeks untuk tabel `user_level`
--
ALTER TABLE `user_level`
  ADD PRIMARY KEY (`id_level`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id_artikel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `cart`
--
ALTER TABLE `cart`
  MODIFY `id_cart` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `comment`
--
ALTER TABLE `comment`
  MODIFY `id_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `gambar_comment`
--
ALTER TABLE `gambar_comment`
  MODIFY `id_gambar_comment` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `gambar_produk`
--
ALTER TABLE `gambar_produk`
  MODIFY `id_gambar_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `petani`
--
ALTER TABLE `petani`
  MODIFY `id_petani` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `profil_toko`
--
ALTER TABLE `profil_toko`
  MODIFY `id_toko` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `rating`
--
ALTER TABLE `rating`
  MODIFY `id_rating` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `sosmed`
--
ALTER TABLE `sosmed`
  MODIFY `id_sosmed` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `status_transaksi`
--
ALTER TABLE `status_transaksi`
  MODIFY `id_pengiriman` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `transaksi_produk`
--
ALTER TABLE `transaksi_produk`
  MODIFY `id_transaksi_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user_level`
--
ALTER TABLE `user_level`
  MODIFY `id_level` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD CONSTRAINT `fk_artikel_user_arti_user` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart_produk_ca_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_cart_user_cart_user` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `comment`
--
ALTER TABLE `comment`
  ADD CONSTRAINT `fk_comment_comment_p_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_comment_comment_t_transaks` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `gambar_comment`
--
ALTER TABLE `gambar_comment`
  ADD CONSTRAINT `fk_gambar_c_gambar_co_comment` FOREIGN KEY (`id_comment`) REFERENCES `comment` (`id_comment`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `gambar_produk`
--
ALTER TABLE `gambar_produk`
  ADD CONSTRAINT `fk_gambar_p_gambar_pr_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pembayar_transaksi_transaks` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_produk_kat_produ_kategori` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `fk_rating_rating_pr_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_rating_rating_tr_transaks` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `status_transaksi`
--
ALTER TABLE `status_transaksi`
  ADD CONSTRAINT `fk_status_t_transaksi_transaks` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_transaks_user_tran_user` FOREIGN KEY (`id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `transaksi_produk`
--
ALTER TABLE `transaksi_produk`
  ADD CONSTRAINT `fk_transaks_produk_be_produk` FOREIGN KEY (`id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_transaks_produk_tr_transaks` FOREIGN KEY (`id_transaksi`) REFERENCES `transaksi` (`id_transaksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_user_lvl_user_lev` FOREIGN KEY (`id_level`) REFERENCES `user_level` (`id_level`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
