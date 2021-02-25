-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 18 Jan 2020 pada 04.31
-- Versi server: 10.1.32-MariaDB
-- Versi PHP: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_simbama`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bakat`
--

CREATE TABLE `bakat` (
  `id_bakat` int(30) NOT NULL,
  `bidang_bakat` varchar(50) NOT NULL,
  `nama_bakat` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bakat_mahasiswa`
--

CREATE TABLE `bakat_mahasiswa` (
  `bakat_id` int(30) NOT NULL,
  `nim_mhs` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jenis`
--

CREATE TABLE `jenis` (
  `id_jenis` int(11) NOT NULL,
  `kode_jenis` varchar(20) NOT NULL,
  `nama_jenis` varchar(50) NOT NULL,
  `keterangan` text,
  `urutan` int(11) DEFAULT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `link`
--

CREATE TABLE `link` (
  `id_link` int(11) NOT NULL,
  `nama_link` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `mahasiswa`
--

CREATE TABLE `mahasiswa` (
  `id_user` int(11) NOT NULL,
  `nama_mhs` varchar(40) NOT NULL,
  `nim` varchar(30) NOT NULL,
  `prodi` varchar(40) NOT NULL,
  `jurusan` varchar(40) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(255) NOT NULL,
  `jlh_sertifikat` varchar(40) NOT NULL,
  `ktr_sertifikat` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mahasiswa`
--

INSERT INTO `mahasiswa` (`id_user`, `nama_mhs`, `nim`, `prodi`, `jurusan`, `username`, `password`, `jlh_sertifikat`, `ktr_sertifikat`, `tanggal`) VALUES
(11, 'Mulyana Anita', '1108001010006', 'Biologi', 'Biologi', '1108001010006', '1108001010006', '2', 'Juara MTQ Tingkat Kecamatan, Juara MTQ Tingkat Provinsi', '2019-12-16 15:10:48'),
(4, 'Mahwel Farsa', '1208001010006', 'Informatika', 'Informatika', '1208001010006', 'f8c4c910048b9b18d0ab0a94f270c5d150a1c4b9', '1', 'Juara 3 MTQ Kota Banda Aceh', '2019-12-16 15:06:49'),
(7, 'Nailil Muna', '1308001010002', 'Manajemen Informatika', 'Manajemen Informatika', '1308001010002', '1308001010002', '1', 'Juara 1 Melukis Tingkat Banda Aceh', '2019-12-16 14:57:36'),
(1, 'Adhi Karya', '1408001010002', 'Fisika', 'Fisika', '1408001010002', '1408001010002', '1', 'Juara Olimpiade Fisika', '2019-12-16 14:53:12'),
(5, 'Abdul ', '1508001010002', 'Biologi', 'Biologi', '1508001010002', '1508001010002', '5', 'Juara melukis, juara catur, juara memanah, juara lari, juara cerdas cermat, juara pembuatan aplikasi', '2019-12-16 14:51:45'),
(10, 'Salma Amran', '1508001010021', 'Farmasi', 'Farmasi', '1508001010021', '1508001010021', '1', 'Juara 1 Catur Tingkat Kabupaten Aceh Besar', '2019-12-16 15:04:02'),
(3, 'Bambang Pamungkas', '1508105010002', 'Matematika', 'Matematika', '1508105010002', '1508105010002', '2', 'juara menembak, juara memanah', '2019-12-16 14:51:09'),
(2, 'Andina Sutianda', '1608001010009', 'Informatika', 'Informatika', '1608001010009', '1608001010009', '2', 'juara karate, juara taekwando', '2019-12-16 14:52:01'),
(8, 'Usiana Dewi', '1608001010012', 'Manajemen Informatika', 'Manajemen Informatika', '1608001010012', '1608001010012', '1', 'Juara 1 Lomba Pembuatan Film Animasi', '2019-12-16 15:00:13'),
(9, 'Nanta Setia', '1608001010014', 'Manajemen Informatika', 'Manajemen Informatika', '1608001010014', '1608001010014', '1', 'Juara 1 Design Web', '2019-12-16 15:01:54'),
(6, 'Nailul Audhar', '1808001010002', 'Farmasi', 'Farmasi', '1808001010002', '1808001010002', '1', 'Juara MTQ', '2019-12-16 14:55:15'),
(12, 'Dian Agustin', '1808001010012', 'Farmasi', 'Farmasi', '1808001010012', '1808001010012', '1', 'Juara Lari Marathon', '2019-12-16 15:12:11');

-- --------------------------------------------------------

--
-- Struktur dari tabel `minat`
--

CREATE TABLE `minat` (
  `id_minat` int(11) NOT NULL,
  `nama_minat` varchar(30) NOT NULL,
  `bidang_minat` int(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `sertifikat`
--

CREATE TABLE `sertifikat` (
  `id_sertifikat` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nama_sertifikat` varchar(40) NOT NULL,
  `juara` varchar(40) NOT NULL,
  `bidang_sertifikat` varchar(60) NOT NULL,
  `tingkat_penghargaan` varchar(30) NOT NULL,
  `tahun_sertifikat` varchar(60) DEFAULT NULL,
  `upload_sertifikat` longblob NOT NULL,
  `tanggal_entri` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `sertifikat`
--

INSERT INTO `sertifikat` (`id_sertifikat`, `id_user`, `nama_sertifikat`, `juara`, `bidang_sertifikat`, `tingkat_penghargaan`, `tahun_sertifikat`, `upload_sertifikat`, `tanggal_entri`) VALUES
(1, 10, 'Sertifikat Lomba Aplikasi', '1', 'Komputer', 'Kecamatan', '2018', 0x7365727466696b6174332d312e6a7067, '2019-09-23 16:09:39'),
(2, 10, 'Sertifikat Olimpiade Matematika', '1', 'Sains', 'Kecamatan', '2015', 0x7365727466696b6174342d31312e6a7067, '2019-09-23 16:10:20'),
(6, 4, 'Sertifikat Balap karung', '1', 'Olahraga', 'Kecamatan', '2017', 0x536572746966696b61742e6a7067, '2019-09-27 11:46:00'),
(7, 4, 'Sertifikat Olimpiade Biologi', '2', 'Olahraga', 'Kecamatan', '2018', 0x536572746966696b6174312e6a7067, '2019-09-27 11:46:33'),
(9, 4, 'Sertifikat Lomba Aplikasi Smart City', '1', 'Sains', 'Kecamatan', '2019', 0x536572746966696b6174332e6a7067, '2019-12-04 04:23:55'),
(11, 4, 'Sertifikat Olimpiade Kimia', '3', 'Sains', 'Kabupaten/Kota', '2015', 0x696a617a61687331312e6a7067, '2019-12-16 16:15:53'),
(12, 4, 'Sertifikat Olimpiade Biologi', '1', 'Sains', 'Provinsi', '2012', 0x536572746966696b6174342e6a7067, '2019-12-30 03:19:24');

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukm`
--

CREATE TABLE `ukm` (
  `id_ukm` int(11) NOT NULL,
  `nama_ukm` varchar(50) NOT NULL,
  `bidang_ukm` varchar(60) NOT NULL,
  `tahun_berdiri` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `jurusan` varchar(40) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `akses_level` varchar(20) NOT NULL,
  `foto` varchar(255) DEFAULT NULL,
  `keterangan` text,
  `tanggal` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `jurusan`, `username`, `password`, `akses_level`, `foto`, `keterangan`, `tanggal`) VALUES
(1, 'andi', 'fachriakbar86@gmail.com', 'Matematika', '1608001010006', '1234567890', 'Admin', NULL, 'Juara Olimpiade Matematika', '2019-12-16 14:44:55'),
(4, 'Fachri Siddiq Akbar', 'fachri@gmail.com', 'Informatika', '123456789', '7c4a8d09ca3762af61e59520943dc26494f8941b', 'Admin', NULL, 'Juara Melukis', '2019-12-16 14:44:16'),
(9, 'Ismail Ahmad', 'abdul@gmail.com', 'Manajemen Informatika', '1504105010036', 'f7c3bc1d808e04732adf679965ccc34ca7ae3441', 'Admin', NULL, 'Juara Memanah', '2019-10-03 09:05:49'),
(12, 'Ana Dinia Cama', 'fachriakbar86@gmail.com', 'Informatika', 'admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'Admin', NULL, 'Juara 1 Memanah', '2019-12-08 05:24:11'),
(13, 'Zhulfian', 'abdul@gmail.com', 'Farmasi', 'admin123', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'Admin', NULL, 'Juara Memanah', '2019-12-16 14:45:45'),
(14, 'Zhulfian Luthfan', 'fachriakbar86@gmail.com', 'Manajemen Informatika', '123admin', 'f865b53623b121fd34ee5426c792e5c33af8c227', 'Admin', NULL, 'Juara Memanah', '2019-12-08 05:28:25'),
(15, 'Fachri Siddiq ', 'socmedia.id@gmail.com', 'Biologi', 'fah212', 'b1058bb80ca434eba643cd46db17714c9ab59b11', 'Admin', NULL, 'Juara Lari', '2019-12-16 14:46:17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bakat`
--
ALTER TABLE `bakat`
  ADD PRIMARY KEY (`id_bakat`);

--
-- Indeks untuk tabel `bakat_mahasiswa`
--
ALTER TABLE `bakat_mahasiswa`
  ADD KEY `bakat_id` (`bakat_id`),
  ADD KEY `nim_mhs` (`nim_mhs`);

--
-- Indeks untuk tabel `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`),
  ADD UNIQUE KEY `judul_berita` (`judul_berita`);

--
-- Indeks untuk tabel `jenis`
--
ALTER TABLE `jenis`
  ADD PRIMARY KEY (`id_jenis`),
  ADD UNIQUE KEY `kode_jenis` (`kode_jenis`),
  ADD UNIQUE KEY `nama_jenis` (`nama_jenis`);

--
-- Indeks untuk tabel `link`
--
ALTER TABLE `link`
  ADD PRIMARY KEY (`id_link`);

--
-- Indeks untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  ADD PRIMARY KEY (`nim`),
  ADD UNIQUE KEY `UNIQUE` (`id_user`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `username_2` (`username`),
  ADD UNIQUE KEY `username_4` (`username`),
  ADD UNIQUE KEY `id_user_2` (`id_user`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `username_3` (`username`);

--
-- Indeks untuk tabel `minat`
--
ALTER TABLE `minat`
  ADD PRIMARY KEY (`id_minat`);

--
-- Indeks untuk tabel `sertifikat`
--
ALTER TABLE `sertifikat`
  ADD PRIMARY KEY (`id_sertifikat`);

--
-- Indeks untuk tabel `ukm`
--
ALTER TABLE `ukm`
  ADD PRIMARY KEY (`id_ukm`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `link`
--
ALTER TABLE `link`
  MODIFY `id_link` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `mahasiswa`
--
ALTER TABLE `mahasiswa`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `sertifikat`
--
ALTER TABLE `sertifikat`
  MODIFY `id_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `bakat_mahasiswa`
--
ALTER TABLE `bakat_mahasiswa`
  ADD CONSTRAINT `bakat_mahasiswa_ibfk_1` FOREIGN KEY (`bakat_id`) REFERENCES `bakat` (`id_bakat`) ON UPDATE CASCADE,
  ADD CONSTRAINT `bakat_mahasiswa_ibfk_2` FOREIGN KEY (`nim_mhs`) REFERENCES `mahasiswa` (`nim`) ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
