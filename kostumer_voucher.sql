-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jun 2020 pada 13.00
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.2.26

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mebel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kostumer_voucher`
--

CREATE TABLE `kostumer_voucher` (
  `id_kostumer_voucher` int(50) NOT NULL,
  `id_voucher` varchar(50) NOT NULL,
  `idpesan` varchar(50) NOT NULL,
  `id_kostumer_id` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kostumer_voucher`
--

INSERT INTO `kostumer_voucher` (`id_kostumer_voucher`, `id_voucher`, `idpesan`, `id_kostumer_id`) VALUES
(26, '1', 'PS0004', '5'),
(28, '1', 'PS0005', '6'),
(29, '2', 'PS0006', '6');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kostumer_voucher`
--
ALTER TABLE `kostumer_voucher`
  ADD PRIMARY KEY (`id_kostumer_voucher`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kostumer_voucher`
--
ALTER TABLE `kostumer_voucher`
  MODIFY `id_kostumer_voucher` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
