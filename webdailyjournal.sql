-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2025 pada 11.40
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webdailyjournal`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `judul` text DEFAULT NULL,
  `isi` text DEFAULT NULL,
  `gambar` text DEFAULT NULL,
  `tanggal` datetime DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `article`
--

INSERT INTO `article` (`id`, `judul`, `isi`, `gambar`, `tanggal`, `username`) VALUES
(1, 'Kecapean Ketika Belajar', 'Ketika mendekati UTS namun materi yang harus dipelajari terlalu banyak.', 'artikel1.jpg', '2024-12-05 12:30:44', 'admin'),
(2, 'Galau Ketika Belajar', 'Mikirin nilai sambil mikirin dia jalan sama orang lain...', 'artikel2.jpeg', '2024-12-24 22:52:33', 'admin'),
(3, 'Pusing Mikir Probabilitas', 'Berusaha memahami tapi gak paham satupun rumus pelajarannya.', 'lazy students.jpg', '2024-12-04 09:30:00', 'admin'),
(4, 'Di Spam Tugas Pas Mau UTS', 'Lelah serasa energi terkuras habis dan tak tersisa.', 'malas belajar.jpg', '2024-12-05 20:52:10', 'admin'),
(5, 'Pusing Mikir Mau Makan Apa', 'Pusing belajar, lebih pusing lagi mikir mau makan apa.', '61_anak-malas-belajar.jpg', '2024-12-03 21:19:04', 'admin'),
(6, 'Ketika Coding Berhasil Padahal Yang Lain Error', 'Sering terjadi serasa paling hebat padahal nyonto Gpt awokawok.', 'penyebab-malas-belajar.jpg', '2024-12-05 21:19:54', 'admin'),
(16, 'Last', 'Hawoo', '20250103235258.jpeg', '2025-01-03 23:52:58', 'admin'),
(18, 'Last', 'Sheess', '20250105143455.jpg', '2025-01-12 10:14:43', 'admin'),
(19, 'Last', 'Hawoo', '20250105144602.jpg', '2025-01-12 10:14:33', 'admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `gambar` text DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `gallery`
--

INSERT INTO `gallery` (`id`, `gambar`, `tanggal`, `username`) VALUES
(1, '20250111223215.jpg', '2025-01-11', 'admin'),
(2, '20250111223102.jpg', '2025-01-11', 'admin'),
(3, '20250111223416.jpg', '2025-01-11', 'admin'),
(8, '20250112004423.jpg', '2025-01-12', 'admin'),
(9, '20250112153305.jpeg', '2025-01-12', 'danny'),
(11, '20250112154316.jpg', '2025-01-12', 'danny');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` text NOT NULL,
  `foto` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `foto`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '20250112113832.jpg'),
(4, 'danny', '21232f297a57a5a743894a0e4a801fc3', '20250112003336.jpg'),
(5, 'Yeji', 'e10adc3949ba59abbe56e057f20f883e', '20250112114115.jpg'),
(6, 'Killua ', 'e10adc3949ba59abbe56e057f20f883e', '20250112004123.jpg'),
(8, 'Jihyo', 'e10adc3949ba59abbe56e057f20f883e', '20250112114033.jpg'),
(9, 'Eminem', 'e10adc3949ba59abbe56e057f20f883e', '20250112114133.jpg'),
(13, 'Eminem', '827ccb0eea8a706c4c34a16891f84e7b', '20250112154459.jpg');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
