-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 04 Des 2022 pada 18.34
-- Versi server: 8.0.31-0ubuntu0.22.04.1
-- Versi PHP: 8.1.2-1ubuntu2.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus_sma`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `biaya_denda`
--

CREATE TABLE `biaya_denda` (
  `id_biaya_denda` int NOT NULL,
  `harga_denda` varchar(255) NOT NULL,
  `stat` varchar(255) NOT NULL,
  `tgl_tetap` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `kd_buku` varchar(10) NOT NULL,
  `judul_buku` varchar(100) NOT NULL,
  `pengarang` varchar(100) NOT NULL,
  `tahun_terbit` year NOT NULL,
  `penerbit` varchar(100) NOT NULL,
  `isbn` varchar(50) NOT NULL,
  `id_kategori` int NOT NULL,
  `jumlah_buku` int NOT NULL,
  `cover` varchar(100) NOT NULL,
  `file` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`kd_buku`, `judul_buku`, `pengarang`, `tahun_terbit`, `penerbit`, `isbn`, `id_kategori`, `jumlah_buku`, `cover`, `file`) VALUES
('BK0010', 'Bahasa Indonesia', 'Maman Suryaman', 2018, 'Kemekibud', '9786024270988', 5, 100, 'cover-2211111668175167.jpg', 'file-2212031670072774.pdf'),
('BK0011', 'Bicara Itu Ada Seninya', 'Oh Su Hyang', 2018, 'Bhuana Ilmu Populer', '9786230404030', 4, 100, 'cover-2211111668215191.jpg', 'file-2212031670072835.pdf'),
('BK0012', 'Berani Tidak Disukai', 'Ichiro Kishimi, Fumitake Koga', 2019, 'Gramedia Pustaka Utama', '9786020633213', 4, 100, 'cover-2211111668215421.jpg', 'file-2212031670072820.pdf'),
('BK0013', 'Bahasa Inggris ', 'Utami Widianti', 2018, 'Kemenkibud', '9786024271138', 5, 100, 'cover-2211111668215960.jpg', 'file-2212031670072796.pdf'),
('BK0014', 'Seperti Hujan Yang Jatuh Ke Bumi', 'Boy Candra', 2016, 'Media Kita', '9789797945282', 6, 100, 'cover-2211111668216372.jpg', 'file-2212031670072977.pdf'),
('BK002', 'Galaksi', 'Poppi Pertiwi', 2018, 'Coconut Books', '9786025508455', 6, 100, 'cover-2211111668164057.jpg', 'file-2212031670072880.pdf'),
('BK003', 'Antares', 'Rweinda', 2020, 'Loveable', '9786236533789', 6, 100, 'cover-2211111668165274.jpg', 'file-2212031670072753.pdf'),
('BK004', 'Mariposa', 'Hidayatul Fajriyah (Luluk HF)', 2018, 'Coconut Books', '9786025508615', 6, 100, 'cover-2211111668165563.jpeg', 'file-2212031670072933.pdf'),
('BK005', 'RPUL', 'Yudhistira Ikranegara', 2009, 'Pustaka Sandro Jaya Jakarta', '9793967978', 4, 100, 'cover-2211111668171643.jpg', 'file-2212031670072962.pdf'),
('BK006', 'Marmut Merah Jambu', 'Raditya Dika', 2010, 'Bukune', '6028066648', 6, 100, 'cover-2211111668171737.jpg', 'file-2212031670072948.pdf'),
('BK007', 'Bumi', 'Tereliye', 2014, 'Gramedia Pustaka Utama (Jakarta)', '9786020627526', 6, 100, 'cover-2211111668172505.jpg', 'file-2212031670072861.pdf'),
('BK008', 'Garis waktu', 'Fiersa Besari', 2016, 'Media Kita', '9789797945251', 6, 100, 'cover-2211111668172850.jpeg', 'file-2212031670072898.pdf'),
('BK009', 'Laskar Pelangi', 'Andrea Hirata', 2005, 'Bentang Pustaka', '9793062797', 6, 100, 'cover-2211111668173224.jpg', 'file-2212031670072912.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `denda`
--

CREATE TABLE `denda` (
  `id_denda` int NOT NULL,
  `no_pinjam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `denda` varchar(255) NOT NULL,
  `lama_waktu` int NOT NULL,
  `tgl_denda` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `denda`
--

INSERT INTO `denda` (`id_denda`, `no_pinjam`, `denda`, `lama_waktu`, `tgl_denda`) VALUES
(13, 'PJ001', '0', 0, '2022-11-29'),
(14, 'PJ0037', '0', 0, '2022-11-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(4, 'Buku Bacaan Siswa'),
(5, 'Buku Siswa'),
(6, 'Novel');

-- --------------------------------------------------------

--
-- Struktur dari tabel `peminjaman`
--

CREATE TABLE `peminjaman` (
  `id_pinjam` int NOT NULL,
  `no_pinjam` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `id_user` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `kd_buku` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `status` varchar(255) NOT NULL,
  `tgl_pinjam` varchar(255) NOT NULL,
  `lama_pinjam` int NOT NULL,
  `tgl_balik` varchar(255) NOT NULL,
  `tgl_kembali` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `peminjaman`
--

INSERT INTO `peminjaman` (`id_pinjam`, `no_pinjam`, `id_user`, `kd_buku`, `status`, `tgl_pinjam`, `lama_pinjam`, `tgl_balik`, `tgl_kembali`) VALUES
(34, 'PJ001', '10', 'BK003', 'Di Kembalikan', '2022-11-29', 1, '2022-11-30', '2022-11-29'),
(35, 'PJ001', '10', 'BK0013', 'Di Kembalikan', '2022-11-29', 1, '2022-11-30', '2022-11-29'),
(36, 'PJ001', '10', 'BK007', 'Di Kembalikan', '2022-11-29', 1, '2022-11-30', '2022-11-29'),
(37, 'PJ0037', '10', 'BK003', 'Di Kembalikan', '2022-11-29', 1, '2022-11-30', '2022-11-29'),
(38, 'PJ0037', '10', 'BK0010', 'Di Kembalikan', '2022-11-29', 1, '2022-11-30', '2022-11-29'),
(39, 'PJ0037', '10', 'BK008', 'Di Kembalikan', '2022-11-29', 1, '2022-11-30', '2022-11-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int NOT NULL,
  `username` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `create_at` int NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto` varchar(255) NOT NULL,
  `role` enum('admin','anggota') CHARACTER SET utf8mb4 COLLATE utf8mb4_0900_ai_ci NOT NULL,
  `is_active` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `nama`, `email`, `no_telp`, `create_at`, `password`, `foto`, `role`, `is_active`) VALUES
(1, 'admin', 'Administrator', 'admin@gmail.com', '082389324', 1636668594, '123', 'team-4.jpg', 'admin', '1'),
(10, 'popo', 'popo', 'popo@gmail.com', '0808', 1667928021, '123', '', 'anggota', '1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `biaya_denda`
--
ALTER TABLE `biaya_denda`
  ADD PRIMARY KEY (`id_biaya_denda`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kd_buku`);

--
-- Indeks untuk tabel `denda`
--
ALTER TABLE `denda`
  ADD PRIMARY KEY (`id_denda`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`id_pinjam`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `biaya_denda`
--
ALTER TABLE `biaya_denda`
  MODIFY `id_biaya_denda` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `denda`
--
ALTER TABLE `denda`
  MODIFY `id_denda` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `peminjaman`
--
ALTER TABLE `peminjaman`
  MODIFY `id_pinjam` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
