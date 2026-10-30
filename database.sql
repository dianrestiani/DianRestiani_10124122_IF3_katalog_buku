-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 30 Okt 2026 pada 12.22
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `katalog_buku`
--
CREATE DATABASE IF NOT EXISTS `katalog_buku` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `katalog_buku`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `isbn` varchar(20) NOT NULL,
  `judul` varchar(150) NOT NULL,
  `penulis` varchar(100) NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `tahun` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `isbn`, `judul`, `penulis`, `penerbit`, `tahun`) VALUES
(1, '9786020332956', 'Laskar Pelangi', 'Andrea Hirata', 'Bentang Pustaka', 2005),
(2, '9786024246945', 'Bumi', 'Tere Liye', 'Gramedia', 2014),
(3, '978-602-424-694-5', 'Laut Bercerita', 'Leila S. Chudori', 'KPG (Kepustakaan Populer Gramedia', 2017),
(4, '978-623-89440-2-6', 'Makanya, Mikir!', 'Abigail Limuria & Cania Citta', 'PT Simpul Aksara Grup', 2025),
(5, '978-623-310-259-9', '3726 MDPL', 'Nurwina Sari', 'Romancious', 2024),
(6, '978-602-03-2478-4', 'Hujan', 'Tere Liye', 'PT Gramedia Pustaka Utama', 2016),
(7, '978-602-03-1258-3', 'Cantik Itu Luka', 'Eka Kurniawan', 'Gramedia Pustaka Utama', 2002),
(8, '978-979-025-017-8', '5 cm', 'Donny Dhirgantoro', 'Grasindo', 2005),
(9, '978-979-97312-3-4', 'Bumi Manusia', 'Pramoedya Ananta Toer', 'Lentera Dipantara', 2005),
(10, '978-602-412-518-9', 'Filosofi Teras', 'Henry Manampiring', 'Penerbit Buku Kompas', 2019);

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`) VALUES
(1, 'admin', '$2y$10$3siii/4txPzGIrgkWGJmt.VCe9gnS.QCgPMy/x1ahpzY5.TN/J1RW');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `isbn` (`isbn`);

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
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
