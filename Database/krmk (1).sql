-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 15 Jul 2024 pada 06.26
-- Versi server: 10.4.28-MariaDB
-- Versi PHP: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `krmk`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `artikel`
--

CREATE TABLE `artikel` (
  `id` int(11) NOT NULL,
  `no_artikel` varchar(255) NOT NULL,
  `isi` text NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `artikel`
--

INSERT INTO `artikel` (`id`, `no_artikel`, `isi`, `username`) VALUES
(2, '1', 'generasi muda adalah kelompok, golongan, angkatan, kaum muda yang hidup dalam jangka waktu tertentu dan mempunyai tugas untuk melanjutkan pembangunan bangsanya. Tugas tersebut sebagaimana tugas-tugas para angkatan yang hidup sebelum mereka.', 'root'),
(3, '2', 'Syukur dalam Islam adalah suatu konsep penting yang mencakup pengakuan, perbuatan, dan sikap terima kasih kepada Allah SWT atas segala nikmat dan karunia-Nya. Ini adalah kunci hidup tenang dan bahagia.', 'root'),
(4, '3', 'Kata rizq setelah diserap kedalam bahasa indonesia menjadi rezeki diartikan menjadi segala sesuatu yang dipakai untuk memelihara kehidupan yang diberikan Tuhan, dapat berupa makanan sehari-hari, nafkah, pendapatan, keuntungan dan sebagainya.', 'root');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dokumentasi`
--

CREATE TABLE `dokumentasi` (
  `id` int(11) NOT NULL,
  `no_dokumentasi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `no_kajian` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `dokumentasi`
--

INSERT INTO `dokumentasi` (`id`, `no_dokumentasi`, `gambar`, `no_kajian`, `username`) VALUES
(4, '1', 'a.jpg', '0', 'Chairul Iman'),
(7, '4', 'd.jpg', '4', 'Chairul Iman'),
(8, '3', '2.jpg', '3', 'Chairul Iman'),
(9, '4', 'd.jpg', '4', 'Chairul Iman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `forum_messages`
--

CREATE TABLE `forum_messages` (
  `id` int(11) NOT NULL,
  `sender_username` varchar(100) NOT NULL,
  `message` text NOT NULL,
  `timestamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `forum_messages`
--

INSERT INTO `forum_messages` (`id`, `sender_username`, `message`, `timestamp`) VALUES
(1, '', 'MasyaAllah', '2024-06-27 03:00:59'),
(2, '', 'MasyaAllah', '2024-06-27 03:01:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_kajian`
--

CREATE TABLE `jadwal_kajian` (
  `id` int(11) NOT NULL,
  `no_kajian` varchar(255) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `pengisi` varchar(255) NOT NULL,
  `gambar` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `jadwal_kajian`
--

INSERT INTO `jadwal_kajian` (`id`, `no_kajian`, `tema`, `tempat`, `pengisi`, `gambar`) VALUES
(4, '2', 'Kunci Hidup Bahagia', 'Lapangan Wangsaf', 'Yuu Aozora', 'c.jpg'),
(5, '3', 'Rezeki', 'Rumah Bapak Rehan', 'Rekhan', 'jdwl.jpg'),
(6, '4', 'Kunci Surga', 'Tokyo', 'Himeya', 'jdwl.jpg'),
(8, '4', 'generasi muda', 'Rumah bapak rehan', 'mas rifqi', 'c.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `j_kajian`
--

CREATE TABLE `j_kajian` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tema` varchar(255) DEFAULT NULL,
  `tempat` varchar(255) DEFAULT NULL,
  `pengisi` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `rangkuman_ceramah`
--

CREATE TABLE `rangkuman_ceramah` (
  `id` int(11) NOT NULL,
  `no_resume` varchar(255) NOT NULL,
  `no_kajian` varchar(255) NOT NULL,
  `tema` varchar(255) NOT NULL,
  `rangkuman` text NOT NULL,
  `username` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `rangkuman_ceramah`
--

INSERT INTO `rangkuman_ceramah` (`id`, `no_resume`, `no_kajian`, `tema`, `rangkuman`, `username`) VALUES
(1, '1', '1', 'Generasi Muda Yang Unggul', 'generasi muda adalah kelompok, golongan, angkatan, kaum muda yang hidup dalam jangka waktu tertentu dan mempunyai tugas untuk melanjutkan pembangunan bangsanya. Tugas tersebut sebagaimana tugas-tugas para angkatan yang hidup sebelum mereka.', 'Chairul Iman'),
(2, '2', '2', 'Kunci Hidup Bahagia', 'yukur dalam Islam adalah suatu konsep penting yang mencakup pengakuan, perbuatan, dan sikap terima kasih kepada Allah SWT atas segala nikmat dan karunia-Nya. Ini adalah kunci hidup tenang dan bahagia.', 'root'),
(3, '3', '3', 'Rezeki', 'Kata rizq setelah diserap kedalam bahasa indonesia menjadi rezeki diartikan menjadi segala sesuatu yang dipakai untuk memelihara kehidupan yang diberikan Tuhan, dapat berupa makanan sehari-hari, nafkah, pendapatan, keuntungan dan sebagainya.', 'root'),
(4, '4', '4', 'Kunci Surga', 'Syahadat adalah kunci masuk surga. Barang siapa memegang kunci itu dan ada geriginya maka pintu surga akan terbuka. Jika kunci yang dipegang tidak bergerigi, maka pintu surga itu tidak akan terbuka. Jika Syahadat adalah kuncinya, maka Rukun Islam yang lain adalah geriginya.', 'root');

-- --------------------------------------------------------

--
-- Struktur dari tabel `resume_kajian`
--

CREATE TABLE `resume_kajian` (
  `id` int(11) NOT NULL,
  `tema` varchar(255) DEFAULT NULL,
  `rangkuman` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('pengurus','jamaah') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`) VALUES
(1, 'admin', 'admin123', 'pengurus'),
(2, 'user1', 'password1', 'jamaah'),
(3, 'user2', 'password2', 'jamaah'),
(42, 'anggota', '', 'jamaah'),
(43, 'pengurus', 'password3', 'pengurus'),
(49, 'root', '$2y$10$EUeyxK2R6KdViu9VNh8ZTuy1Cew/xTm1WxRcPjQlGqTEX9G13TPha', 'pengurus'),
(51, 'Renn', '$2y$10$WuSHGIYZYrJj8IJ89HcrvunyQD/YNiYJiNlBxqTs0bipjHi/CrN9m', 'jamaah'),
(52, 'Wangsaf', '$2y$10$HZ9MQP9O4z/xBgtwlOsbLOA6eWiW9R1X4y2lp7NAgl5O1QbiGIiEa', 'jamaah'),
(53, 'Chairul Iman', '$2y$10$kuiyscu3goReaTSrP8oBD.y2djEMcwDdotDBoQ7MQM9OUqV6kW/6a', 'pengurus'),
(54, 'Ilham', '$2y$10$fKZb.Dikjh9EodCuAHVh/OObIuxQXpFFcRpocnjT/mu5savv4vkN.', 'jamaah'),
(55, 'Mas Rehan', '$2y$10$XAbSyrQQ.g5oQYIVDIYk3.9/R9LcArr4CJ9frdgKjN/n5G6YXrPQK', 'jamaah'),
(56, 'Rehan wa', '$2y$10$8JFLI/Z.6wC3MsoTOA36VOIYSf4NcWHLv0xt368gWjV6puG8EKjhW', 'pengurus'),
(57, 'Mas faris', '$2y$10$RydiFFTrlcM0zsNihletze36qSSiBPTbEfXfby2HLF5lXypY7VYOq', 'jamaah');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `artikel`
--
ALTER TABLE `artikel`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `dokumentasi`
--
ALTER TABLE `dokumentasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `forum_messages`
--
ALTER TABLE `forum_messages`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jadwal_kajian`
--
ALTER TABLE `jadwal_kajian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `j_kajian`
--
ALTER TABLE `j_kajian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `rangkuman_ceramah`
--
ALTER TABLE `rangkuman_ceramah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `resume_kajian`
--
ALTER TABLE `resume_kajian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `artikel`
--
ALTER TABLE `artikel`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `dokumentasi`
--
ALTER TABLE `dokumentasi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `forum_messages`
--
ALTER TABLE `forum_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `jadwal_kajian`
--
ALTER TABLE `jadwal_kajian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `j_kajian`
--
ALTER TABLE `j_kajian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `rangkuman_ceramah`
--
ALTER TABLE `rangkuman_ceramah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `resume_kajian`
--
ALTER TABLE `resume_kajian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
