-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Bulan Mei 2020 pada 07.15
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
-- Struktur dari tabel `bayar`
--

CREATE TABLE `bayar` (
  `id_bayar` varchar(7) NOT NULL,
  `nama_pemilik` varchar(30) NOT NULL,
  `bank` varchar(45) DEFAULT NULL,
  `bukti_pembayaran` varchar(100) DEFAULT NULL,
  `kode_pesan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `bayar`
--

INSERT INTO `bayar` (`id_bayar`, `nama_pemilik`, `bank`, `bukti_pembayaran`, `kode_pesan`) VALUES
('BR0001', 'farid', 'bri', 'assets/images/squishy.jpg', 'ps0034'),
('BR0002', 'Aji Pratama', '', '1200x630wa1.png', 'PS0005');

-- --------------------------------------------------------

--
-- Struktur dari tabel `faq`
--

CREATE TABLE `faq` (
  `id_faq` int(11) NOT NULL,
  `id_kostumer_id` varchar(35) NOT NULL,
  `kritik` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` varchar(20) NOT NULL,
  `nama_kategori` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
('KG0002', 'Tas'),
('KG0003', 'Pernak Pernik'),
('KG0004', 'Playmat'),
('KG0005', 'asas');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang`
--

CREATE TABLE `keranjang` (
  `jumlah` varchar(45) DEFAULT NULL,
  `total` varchar(45) DEFAULT NULL,
  `panjang` varchar(11) DEFAULT NULL,
  `lebar` varchar(11) DEFAULT NULL,
  `tinggi` varchar(11) DEFAULT NULL,
  `id_kostumer_id` int(11) DEFAULT NULL,
  `produk_id_produk` varchar(20) NOT NULL,
  `pesan_id_pesan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keranjang`
--

INSERT INTO `keranjang` (`jumlah`, `total`, `panjang`, `lebar`, `tinggi`, `id_kostumer_id`, `produk_id_produk`, `pesan_id_pesan`) VALUES
('1', '100000', '120', '220', '1221', 5, 'PR0001', 'PS0004'),
('1', '100000', '120', '220', '1221', 5, 'PR0001', 'PS0005'),
('1', '100000', '120', '220', '1221', 5, 'PR0001', 'PS0006'),
('2', '20000', '1000', '90', '1221', 5, 'PR0003', 'PS0007'),
('3', '300000', '120', '220', '1221', 5, 'PR0001', 'PS0008'),
('3', '300000', '900', '720', '3321', 5, 'PR0001', 'PS0009');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komentar`
--

CREATE TABLE `komentar` (
  `id_komentar` int(11) NOT NULL,
  `id_kostumer_id` varchar(50) NOT NULL,
  `komentar` text NOT NULL,
  `id_produk_id` varchar(50) NOT NULL,
  `date` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `komentar`
--

INSERT INTO `komentar` (`id_komentar`, `id_kostumer_id`, `komentar`, `id_produk_id`, `date`) VALUES
(3, '5', 'aaa', 'PR0001', '20-05-2020 20:50:15'),
(4, '5', 'sasas', 'PR0001', '20-05-2020 20:50:28');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kostumer`
--

CREATE TABLE `kostumer` (
  `id_kostumer` int(11) NOT NULL,
  `nama_kostumer` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` int(13) NOT NULL,
  `password` varchar(256) NOT NULL,
  `date_created` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kostumer`
--

INSERT INTO `kostumer` (`id_kostumer`, `nama_kostumer`, `email`, `no_telp`, `password`, `date_created`) VALUES
(3, 'farid', 'farid@gmail.com', 568290093, '$2y$10$IZk0IIYOEvQHH9yQWpVf4uwWImT1Xe.nw9WYNAjkgmY.xZ9oNlD1i', 1580305647),
(4, 'mega', 'megasilvia5555@gmail.com', 2147483647, '$2y$10$9iH.3Ic.OkDD.MWjKXjmkOzkZ4kqc9kTgOv0.Q6dUe95okz5RdMJi', 1580401824),
(5, 'Aji Pratama', 'ajip2606@yahoo.com', 2147483647, '12345', 1584884797),
(6, 'fabi', 'fabiputra55@gmail.com', 81277366, 'fabiputra', 1584979829),
(7, 'novita', 'novi@gmail.com', 2147483647, '12345', 1589653964);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengiriman`
--

CREATE TABLE `pengiriman` (
  `id_kirim` varchar(20) NOT NULL,
  `nama_pengirim` varchar(30) NOT NULL,
  `provinsi` varchar(45) DEFAULT NULL,
  `kabupaten` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `desa` varchar(30) NOT NULL,
  `rt` varchar(45) DEFAULT NULL,
  `rw` varchar(30) DEFAULT NULL,
  `harga_kirim` int(20) NOT NULL,
  `kodepos` int(10) NOT NULL,
  `telp` varchar(13) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pengiriman`
--

INSERT INTO `pengiriman` (`id_kirim`, `nama_pengirim`, `provinsi`, `kabupaten`, `kecamatan`, `desa`, `rt`, `rw`, `harga_kirim`, `kodepos`, `telp`) VALUES
('S00001', 'Aji Pratama', 'Jawa Timur', 'Lumajang', 'Yosowilangun', 'Wonokerto', 'OKE', 'jne', 77000, 68168, '081515868592'),
('S00002', 'Aji Pratama', 'Jawa Timur', 'Jember', 'Sumbersari', 'Sumbersair', 'CTC', 'jne', 12000, 68168, '2147483647'),
('S00003', 'Aji Pratama', 'Jawa Timur', 'Bangkalan', 'as', 'as', 'OKE', 'jne', 7000, 12, '2147483647'),
('S00004', 'Aji Pratama', '1', '17', 'Jombang', 'Keting', '006', '003', 60000, 68168, '2147483647'),
('S00005', 'Aji Pratama', 'Jawa Timur', 'Jember', 'Jombang', 'Keting', '006', '003', 40000, 68168, '2147483647'),
('S00006', 'Aji Pratama', 'Bengkulu', 'Bengkulu', 'Jombang', 'a', '1', '12', 60000, 12, '2147483647'),
('S00007', 'Aji Pratama', 'Jawa Timur', 'Jember', 'Jombang', 'Keting', '006', '003', 40000, 68168, '2147483647'),
('S00008', 'Aji Pratama', 'Bangka Belitung', 'Bangka', 'Jombang', 'Keting', '12', '12', 60000, 1, '2147483647'),
('S00009', 'Aji Pratama', 'DI Yogyakarta', 'Bantul', 'Jombang', 'Keting', '12', '21', 60000, 11, '2147483647');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` varchar(20) NOT NULL,
  `id_kostumer_id` int(11) NOT NULL,
  `tanggal_pesan` datetime DEFAULT NULL,
  `jatuh_tempo` datetime NOT NULL,
  `status` varchar(45) DEFAULT NULL,
  `pengiriman_id_kirim` varchar(20) NOT NULL,
  `total_pesan` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `id_kostumer_id`, `tanggal_pesan`, `jatuh_tempo`, `status`, `pengiriman_id_kirim`, `total_pesan`) VALUES
('PS0001', 5, '2020-03-22 23:59:18', '2020-03-23 23:59:18', 'Terbayar', 'S00001', 2910000),
('PS0002', 5, '2020-03-23 11:47:33', '2020-03-24 11:47:33', 'Terbayar', 'S00002', 287000),
('PS0003', 5, '2020-03-26 11:06:55', '2020-03-27 11:06:55', 'Terbayar', 'S00003', 162000),
('PS0004', 5, '2020-05-19 20:16:35', '2020-05-20 20:16:35', 'Proses', 'S00004', 160000),
('PS0005', 5, '2020-05-19 20:24:32', '2020-05-20 20:24:32', 'Proses', 'S00005', 140000),
('PS0006', 5, '2020-05-19 20:29:01', '2020-05-20 20:29:01', 'Proses', 'S00006', 160000),
('PS0007', 5, '2020-05-20 03:53:34', '2020-05-21 03:53:34', 'Proses', 'S00007', 60000),
('PS0008', 5, '2020-05-20 23:24:31', '2020-05-21 23:24:31', 'Proses', 'S00008', 360000),
('PS0009', 5, '2020-05-20 23:26:42', '2020-05-21 23:26:42', 'Proses', 'S00009', 360000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(45) DEFAULT NULL,
  `keterangan` varchar(500) DEFAULT NULL,
  `kategori_id_kategori` varchar(20) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `panjang` varchar(25) NOT NULL,
  `lebar` varchar(25) NOT NULL,
  `tinggi` varchar(25) NOT NULL,
  `harga` int(11) DEFAULT NULL,
  `gambar` varchar(45) DEFAULT NULL,
  `gambar2` varchar(50) DEFAULT NULL,
  `gambar3` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `nama_produk`, `keterangan`, `kategori_id_kategori`, `stok`, `panjang`, `lebar`, `tinggi`, `harga`, `gambar`, `gambar2`, `gambar3`) VALUES
('PR0001', 'Apapun', 'aa', 'KG0002', 2112, '120', '220', '1221', 100000, 'diindri-hijab-6936-8554461-1.jpg', 'diindri-hijab-6936-8554461-1.jpg', 'diindri-hijab-6936-8554461-1.jpg'),
('PR0002', 'sdfsfd', 'xx', 'KG0004', 12, '120', '220', '1221', 300000, 'lonceng.jpg', 'lonceng.jpg', 'lonceng.jpg'),
('PR0003', 'asasas', 'v', 'KG0002', 1212, '1000', '90', '1221', 10000, 'lonceng.jpg', 'alaspurwo.jpg', '1200x630wa.png'),
('PR0004', 'Apapun', 'aaa', 'KG0002', 12, '120', '121', '1221', 100000, '1200x630wa.png', '1200x630wa.png', '1200x630wa.png'),
('PR0005', 'ffafaffadas', 'fff', 'KG0002', 12, '120', '100', '1221', 12000, '1200x630wa.png', 'alaspurwo.jpg', 'camera.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `testimoni`
--

CREATE TABLE `testimoni` (
  `id_testimoni` int(11) NOT NULL,
  `id_kostumer_id` varchar(35) NOT NULL,
  `gambar` varchar(50) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `password` varchar(30) NOT NULL,
  `nama_user` varchar(45) DEFAULT NULL,
  `no_telp` varchar(45) DEFAULT NULL,
  `alamat` varchar(45) DEFAULT NULL,
  `kode_pos` int(11) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `password`, `nama_user`, `no_telp`, `alamat`, `kode_pos`, `email`) VALUES
('100000', 'owner', 'owner', '098454637289', 'jember', 950846, 'owner@gmail.com'),
('100001', 'saya', 'saya', '0923762476384', 'nganjuk', 38403, 'saya@gmail.com'),
('100002', 'fikal', 'fikal', '0987678986679', 'nganjuk', 98979, 'fikal@gmail.com'),
('100003', 'mega', 'mega', '0083478473463', 'jember', 974938, 'mega@gmail.com'),
('100004', 'a', 'q', '1', 'a', 11, 'arrumzakiyah@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bayar`
--
ALTER TABLE `bayar`
  ADD PRIMARY KEY (`id_bayar`);

--
-- Indeks untuk tabel `faq`
--
ALTER TABLE `faq`
  ADD PRIMARY KEY (`id_faq`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD KEY `fk_keranjang_produk1` (`produk_id_produk`),
  ADD KEY `id_kostumer_id` (`id_kostumer_id`),
  ADD KEY `pesan_id_pesan` (`pesan_id_pesan`);

--
-- Indeks untuk tabel `komentar`
--
ALTER TABLE `komentar`
  ADD PRIMARY KEY (`id_komentar`);

--
-- Indeks untuk tabel `kostumer`
--
ALTER TABLE `kostumer`
  ADD PRIMARY KEY (`id_kostumer`);

--
-- Indeks untuk tabel `pengiriman`
--
ALTER TABLE `pengiriman`
  ADD PRIMARY KEY (`id_kirim`);

--
-- Indeks untuk tabel `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`),
  ADD KEY `fk_pesan_pengiriman1_idx` (`pengiriman_id_kirim`),
  ADD KEY `id_kostumer_id` (`id_kostumer_id`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD KEY `fk_produk_kategori1_idx` (`kategori_id_kategori`);

--
-- Indeks untuk tabel `testimoni`
--
ALTER TABLE `testimoni`
  ADD PRIMARY KEY (`id_testimoni`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `faq`
--
ALTER TABLE `faq`
  MODIFY `id_faq` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `komentar`
--
ALTER TABLE `komentar`
  MODIFY `id_komentar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kostumer`
--
ALTER TABLE `kostumer`
  MODIFY `id_kostumer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `keranjang`
--
ALTER TABLE `keranjang`
  ADD CONSTRAINT `fk_keranjang_produk1` FOREIGN KEY (`produk_id_produk`) REFERENCES `produk` (`id_produk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keranjang_ibfk_1` FOREIGN KEY (`id_kostumer_id`) REFERENCES `kostumer` (`id_kostumer`),
  ADD CONSTRAINT `keranjang_ibfk_2` FOREIGN KEY (`pesan_id_pesan`) REFERENCES `pesan` (`id_pesan`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD CONSTRAINT `fk_produk_kategori1` FOREIGN KEY (`kategori_id_kategori`) REFERENCES `kategori` (`id_kategori`) ON DELETE CASCADE ON UPDATE CASCADE;

DELIMITER $$
--
-- Event
--
CREATE DEFINER=`root`@`localhost` EVENT `hapus_data` ON SCHEDULE EVERY 1 SECOND STARTS '2020-03-23 22:51:20' ON COMPLETION NOT PRESERVE ENABLE COMMENT 'Hapus data yang bukan hari ini' DO DELETE pesan, keranjang FROM pesan INNER JOIN keranjang ON keranjang.pesan_id_pesan=pesan.id_pesan WHERE pesan.status='Proses' AND NOW() > pesan.jatuh_tempo$$

DELIMITER ;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
