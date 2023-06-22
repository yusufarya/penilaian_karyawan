-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 21 Jun 2023 pada 08.18
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.0.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bapenda`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `divisi`
--

CREATE TABLE `divisi` (
  `id` int(11) NOT NULL,
  `inisial` char(3) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `update_oleh` varchar(30) NOT NULL,
  `update_pada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `divisi`
--

INSERT INTO `divisi` (`id`, `inisial`, `nama`, `update_oleh`, `update_pada`) VALUES
(1, 'ADM', 'ADMIN', 'Yusuf Aryadilla', '2023-06-01'),
(2, 'KPB', 'KEPALA BAGIAN', 'Yusuf Aryadilla', '2023-06-01'),
(3, 'PNP', 'PELAKSANA NON PNS', 'Yusuf Aryadilla', '2023-06-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE `jabatan` (
  `id` int(11) NOT NULL,
  `inisial` char(3) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `level` int(1) NOT NULL,
  `update_oleh` varchar(30) NOT NULL,
  `update_pada` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`id`, `inisial`, `nama`, `level`, `update_oleh`, `update_pada`) VALUES
(1, 'MNG', 'MANAGER', 1, 'Yusuf Aryadilla', '2023-06-01'),
(2, 'AMG', 'ASISTEN MANAGER', 2, 'Yusuf Aryadilla', '2023-06-01'),
(3, 'SVP', 'SUPERVISOR', 3, 'Yusuf Aryadilla', '2023-06-01'),
(4, 'SST', 'SENIOR STAF', 4, 'Yusuf Aryadilla', '2023-06-17'),
(5, 'STF', 'STAFF', 5, 'Yusuf Aryadilla', '2023-06-17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pekerjaan`
--

CREATE TABLE `pekerjaan` (
  `id` int(11) NOT NULL,
  `uraian_tugas` text DEFAULT NULL,
  `output_kerja` varchar(20) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `user_id` int(11) NOT NULL,
  `update_oleh` varchar(50) DEFAULT NULL,
  `update_pada` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pekerjaan`
--

INSERT INTO `pekerjaan` (`id`, `uraian_tugas`, `output_kerja`, `tanggal`, `user_id`, `update_oleh`, `update_pada`) VALUES
(1, 'Mengarsipkan Surat Masuk dan Surat Keluar', '20 dok', '2023-06-19', 4, 'Burhan Unru', '2023-06-17'),
(3, 'Membuat Laporan Surat Masuk dan Surat Keluar', '2 laporan', '2023-06-19', 4, 'Burhan Unru', '2023-06-17'),
(4, 'Penginputan Pernomoran Surat', '354 Dok', '2023-06-19', 5, 'Siti Ainun', '2023-06-18'),
(5, 'Penginputan Surat Masuk dan Keluar', '345 Dok', '2023-06-19', 5, 'Siti Ainun', '2023-06-18'),
(6, 'Membantu Mengelola Sisumaker', '2 Keg', '2023-06-18', 5, 'Siti Ainun', '2023-06-18');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penilaian`
--

CREATE TABLE `penilaian` (
  `id` int(11) NOT NULL,
  `nik` char(16) NOT NULL,
  `pekerjaan_id` int(11) DEFAULT NULL,
  `nilai1` double NOT NULL DEFAULT 0,
  `ketentuan_nilai1` varchar(50) DEFAULT NULL,
  `sikap_kerja` char(10) DEFAULT NULL,
  `nilai2` double NOT NULL DEFAULT 0,
  `ketentuan_nilai2` varchar(50) DEFAULT NULL,
  `bulan` varchar(50) DEFAULT NULL,
  `tahun` varchar(20) DEFAULT NULL,
  `komentar` varchar(100) DEFAULT NULL,
  `update_pada` date NOT NULL,
  `update_oleh` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penilaian`
--

INSERT INTO `penilaian` (`id`, `nik`, `pekerjaan_id`, `nilai1`, `ketentuan_nilai1`, `sikap_kerja`, `nilai2`, `ketentuan_nilai2`, `bulan`, `tahun`, `komentar`, `update_pada`, `update_oleh`) VALUES
(1, 'BPD230601003', 1, 88, 'Dilaksanakan', 'Penyelesai', 78, 'Cukup Baik', '06', '2023', 'Catatan Atasan', '2023-06-18', 'Yusuf Aryadilla'),
(2, 'BPD230601003', 3, 69, 'Nilai B : Sedang Dilaksanakan', 'Penyelesai', 67, 'Cukup Baik', '06', '2023', '', '2023-06-18', 'Yusuf Aryadilla'),
(6, 'BPD230617004', 4, 88, 'Nilai A : Terelah Dilaksanakan', 'Penyelesai', 67, 'Cukup Baik', '06', '2023', ' ', '2023-06-18', 'Yusuf Aryadilla'),
(7, 'BPD230617004', 5, 88, 'Dilaksanakan', 'Penyelesai', 78, 'Cukup Baik', '06', '2023', ' ', '2023-06-18', 'Yusuf Aryadilla'),
(8, 'BPD230617004', 6, 69, 'Nilai B : Sedang Dilaksanakan', 'Penyelesai', 67, 'Cukup Baik', '06', '2023', ' ', '2023-06-18', 'Yusuf Aryadilla');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `nik` char(16) NOT NULL,
  `nama` varchar(35) NOT NULL,
  `jenis_kel` enum('Laki-laki','Perempuan') NOT NULL,
  `email` varchar(100) NOT NULL,
  `no_telp` char(20) NOT NULL,
  `alamat` varchar(128) NOT NULL,
  `password` varchar(128) NOT NULL,
  `status` int(1) NOT NULL,
  `jabatan_id` int(1) NOT NULL,
  `divisi_id` int(1) NOT NULL,
  `tgl_dibuat` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `nik`, `nama`, `jenis_kel`, `email`, `no_telp`, `alamat`, `password`, `status`, `jabatan_id`, `divisi_id`, `tgl_dibuat`) VALUES
(1, '', 'Admin', 'Laki-laki', 'admin@gmail.com', '0899990999981', 'Tangerang Banten', '$2y$10$qKbvgtBrgTtyLL3l45/uJuJFBC6W2j2fp0ByOAz9RevM0gZXtPvtq', 1, 1, 0, '2023-06-01'),
(2, 'BPD230601001', 'Samsul Mardodo', 'Laki-laki', 'samsul@gmail.com', '0899990999981', 'Tangerang Selatan', '$2y$10$uZxzLMUUYiGjNnFZM8bF2.gnFOK1elvOiyFDYhg1UzLpBkNC56W4m', 1, 1, 2, '2023-06-01'),
(3, 'BPD230601002', 'Linda Amanda', 'Perempuan', 'linda@gmail.com', '0821929220000', 'Jakarta Selatan', '$2y$10$eLKEWWGsOD5jNB/MSj0Rb.gJsxjzx1AgAUDeTxrNJjDY3qAz0DhX.', 1, 2, 2, '2023-06-01'),
(4, 'BPD230601003', 'Burhan Unru', 'Laki-laki', 'burhan_u@gmail.com', '0987647789009', 'Jakarta Barat', '$2y$10$OTjBxV7pBH7rrtXk7B7GXOkJS21fDlAfydIQ15jdylX0Nlvj4X2u6', 1, 4, 3, '2023-06-17'),
(5, 'BPD230617004', 'Siti Ainun', 'Perempuan', 'ainun@gmail.com', '021500999809', 'Tangerang Selatan', '$2y$10$Y5jAGQVgSzXfGEAiy50zE.Y.OscLd3QJAqixbdxA70e93onAh1.A.', 1, 5, 3, '2023-06-17');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `divisi_id` (`divisi_id`),
  ADD KEY `jabatan_id` (`jabatan_id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `pekerjaan`
--
ALTER TABLE `pekerjaan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `penilaian`
--
ALTER TABLE `penilaian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
