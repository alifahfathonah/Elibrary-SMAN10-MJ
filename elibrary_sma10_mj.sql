-- phpMyAdmin SQL Dump
-- version 5.1.1deb5ubuntu1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 20 Des 2022 pada 22.12
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
-- Database: `elibrary_sma10_mj`
--

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
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`kd_buku`, `judul_buku`, `pengarang`, `tahun_terbit`, `penerbit`, `isbn`, `id_kategori`, `jumlah_buku`, `cover`, `file`) VALUES
('BK0010', 'Bahasa Indonesia SMA Kelas XII', 'Maman Suryaman', 2018, 'Kemekibud', '9786024270988', 5, 100, 'cover-2211111668175167.jpg', 'file-2212031670072774.pdf'),
('BK0011', 'Bicara Itu Ada Seninya', 'Oh Su Hyang', 2018, 'Bhuana Ilmu Populer', '9786230404030', 4, 100, 'cover-2211111668215191.jpg', 'file-2212031670072835.pdf'),
('BK0012', 'Berani Tidak Disukai', 'Ichiro Kishimi, Fumitake Koga', 2019, 'Gramedia Pustaka Utama', '9786020633213', 4, 100, 'cover-2211111668215421.jpg', 'file-2212031670072820.pdf'),
('BK0013', 'Bahasa Inggris SMA Kelas XII', 'Utami Widianti', 2018, 'Kemendikbud', '9786024271138', 5, 100, 'cover-2211111668215960.jpg', 'file-2212031670072796.pdf'),
('BK0014', 'Seperti Hujan Yang Jatuh Ke Bumi', 'Boy Candra', 2016, 'Media Kita', '9789797945282', 6, 100, 'cover-2211111668216372.jpg', 'file-2212031670072977.pdf'),
('BK0015', 'Tulus Untuk Orang Yang Salah', 'Boy Candra', 2022, 'Grasindo', '978602052963-9', 6, 1, 'cover-2212181671417134.jpg', 'file-2212181671417134.jpg'),
('BK0016', 'This Is Mee', 'Muhajjah Saratina', 2019, 'C-Klik Media', '9786025992230', 4, 1, 'cover-2212181671417572.jpg', 'file-2212181671417572.jpg'),
('BK0017', 'Puncak Ilmu Adalah Akhlak', 'Mhd. Rois Almaududy', 2021, 'Syalmahat Publishing', '9786239299545 ', 4, 1, 'cover-2212181671418090.jpg', 'file-2212181671418090.jpg'),
('BK0018', 'Matematika', 'Abdur Rahman As’ari, Tjang Daniel Chandra, Ipung Yuwono, Lathiful Anwar, Syaiful Hamzah Nasution, Da', 2018, 'Kemenkibud', '9786024271213', 5, 1, 'cover-2212181671418492.jpg', 'file-2212181671418492.jpg'),
('BK0019', 'Geez And Ann', 'Nadhifa Allya Tsana', 2017, 'Gagas Media', '9789797809062', 6, 1, 'cover-2212181671418822.jpg', 'file-2212181671418822.jpg'),
('BK002', 'Galaksi', 'Poppi Pertiwi', 2018, 'Coconut Books', '9786025508455', 6, 100, 'cover-2211111668164057.jpg', 'file-2212031670072880.pdf'),
('BK0020', 'Hidup Berjaya Dan Sejahtera', 'Agusman', 2021, 'Gemilang', '9786237162728', 4, 1, 'cover-2212181671419139.jpg', 'file-2212181671419139.jpg'),
('BK0021', 'Esok Lebih Baik', 'Dr.Abdullah Al-Maghluts', 2022, 'Gemilang', '9786237162902', 4, 1, 'cover-2212181671419398.jpg', 'file-2212181671419398.jpg'),
('BK0022', 'PENEMUAN ILMU PENGETAHUAN : LANGIT DAN CUACA', 'Tim Penerbit Quality Press', 2007, 'Kharisma', '9786028981989', 4, 1, 'cover-2212191671501907.jpg', 'file-2212191671501907.jpg'),
('BK0023', 'Bahasa Indonesia SMA Kelas X', 'Suherli, Maman Suryaman, Aji Septiaji, Istiqomah', 2016, 'Kemdikbud', '978-602-427-098-8', 5, 100, 'cover-2212201671540288.jpg', 'file-2212201671540290.pdf'),
('BK0024', 'Seni Budaya Sem 1 SMA Kelas XI', 'Sem Cornelyoes Bangun, Siswandi, Tati Narawati, dan Jose Rizal Manua', 2017, 'Kemendikbud', '978-602-427-142-8 ', 5, 100, 'cover-2212201671540869.jpg', 'file-2212201671540871.pdf'),
('BK0025', 'Pendidikan Agama Islam SMA Kelas XII', 'HA. Sholeh Dimyathi dan Feisal Ghozali', 2018, 'Kemendikbud', '978-602-427-042-1', 5, 100, 'cover-2212201671541780.jpg', 'file-2212201671541782.pdf'),
('BK0026', 'Pendidikan Jasmani, Olahraga dan Kesehatan SMA Kelas X', 'Sudrajat Wiradihardja dan Syarifudin.', 2016, 'Kemendikbud', '978-602-427-134-3', 5, 100, 'cover-2212201671542313.jpg', 'file-2212201671542313.pdf'),
('BK0027', 'Matematika SMA Kelas XII', 'Abdur Rahman As’ari, Tjang Daniel Chandra, Ipung Yuwono, Lathiful Anwar, Syaiful Hamzah Nasution, Da', 2018, 'Kemendikbud', '978-602-427-114-5', 5, 100, 'cover-2212201671542488.jpg', 'file-2212201671542490.pdf'),
('BK0028', 'PJOK SMA Kelas XI', 'Sumaryoto dan Soni Nopembri', 2017, 'Kemendikbud', '978-602-427-130-5', 5, 100, 'cover-2212201671542729.jpg', 'file-2212201671542729.pdf'),
('BK0029', 'Seni Budaya SMA Kelas XII Semester 2', 'Agus Budiman, Dewi Suryati Budiwati, Sukanta, dan Zakaria S.  Soetedja', 2018, 'Kemendikbud', '978-602-427-142-8 ', 5, 100, 'cover-2212201671543651.jpg', 'file-2212201671543651.pdf'),
('BK003', 'Antares', 'Rweinda', 2020, 'Loveable', '9786236533789', 6, 100, 'cover-2211111668165274.jpg', 'file-2212031670072753.pdf'),
('BK0030', 'Pendidikan Agam Islam SMA Kelas XII', 'HA. Sholeh Dimyathi dan Feisal Ghozali.', 2018, 'Kemendikbud', '978-602-427-046-9', 5, 100, 'cover-2212201671543834.jpg', 'file-2212201671543834.pdf'),
('BK0031', 'Sejarah Indonesia SMA Kelas X', 'Restu Gunawan, Amurwani Dwi Lestariningsih, dan Sardiman', 2016, 'Kemendikbud', '978-602-427-122-0 ', 5, 100, 'cover-2212201671544148.jpg', 'file-2212201671544148.pdf'),
('BK0032', 'Pendidikan Pancasila dan Kewarganegaraan SMA Kelas XI', 'Yusnawan Lubis dan Mohamad Sodeli', 2017, 'Kemendikbud', '978-602-427-090-2', 5, 100, 'cover-2212201671544318.jpg', 'file-2212201671544318.pdf'),
('BK0033', 'Prakarya dan Kewirausahaan SMA Kelas X Semester 1', 'Hendriana Werdhaningsih, Alberta Haryudanti, Rinrin Jamrianti, dan Desta Wirmas.', 2016, 'Kemendikbud', '978-602-427-153-4', 5, 100, 'cover-2212201671544461.jpg', 'file-2212201671544461.pdf'),
('BK0034', 'Pendidikan Pancasila dan Kewarganegaraan SMA Kelas XII', 'Yusnawan Lubis dan Mohamad Sodeli', 2018, 'Kemendikbud', '978-602-427-090-2', 5, 100, 'cover-2212201671544820.jpg', 'file-2212201671544820.pdf'),
('BK0035', 'Pendidikan Pancasila dan Kewarganegaraan SMA Kelas X', 'Nuryadi dan Tolib.', 2016, 'Kemendikbud', '978-602-427-090-2', 5, 100, 'cover-2212201671545392.jpg', 'file-2212201671545392.pdf'),
('BK0036', 'PJOK SMA Kelas XII', 'Suroto dan Taufi q Hidayah.', 2018, 'Kemendikbud', '978-602-427-130-5', 5, 100, 'cover-2212201671545671.jpg', 'file-2212201671545671.pdf'),
('BK0037', 'Matematika SMA Kelas XI', 'Sudianto Manullang, Andri Kristianto S., Tri Andri Hutapea, Lasker Pangarapan Sinaga, Bornok Sinaga,', 2017, 'Kemendikbud', '978-602-427-114-5', 5, 100, 'cover-2212201671545811.jpg', 'file-2212201671545811.pdf'),
('BK0038', 'Seni Budaya Sem 1 SMA Kelas X', 'Zackaria Soetedja, Dewi Suryati, Milasari, Agus Supriatna', 2016, 'Kemendikbud', '978-602-427-142-8', 5, 100, 'cover-2212201671545996.jpg', 'file-2212201671545996.pdf'),
('BK0039', 'Bahasa Inggris SMA Kelas X', 'Utami Widiati, Zuliati Rohmah, dan Furaidah', 2016, 'Kemendikbud', '978-602-427-106-0', 5, 100, 'cover-2212201671546214.jpg', 'file-2212201671546214.pdf'),
('BK004', 'Mariposa', 'Hidayatul Fajriyah (Luluk HF)', 2018, 'Coconut Books', '9786025508615', 6, 100, 'cover-2211111668165563.jpeg', 'file-2212031670072933.pdf'),
('BK0040', 'Seni Budaya Sem 2 SMA Kelas XI', 'Sem Cornelyoes Bangun, Siswandi, Tati Narawati, dan Jose Rizal Manua', 2017, 'Kemendikbud', '978-602-427-142-8', 5, 100, 'cover-2212201671546354.jpg', 'file-2212201671546354.pdf'),
('BK0041', 'Sejarah Indonesia Sem 1 SMA Kelas XI', 'Sardiman AM, dan Amurwani Dwi Lestariningsih', 2017, 'Kemendikbud', '978-602-427-122-0', 5, 100, 'cover-2212201671546517.jpg', 'file-2212201671546517.pdf'),
('BK0042', 'Sejarah Indonesia SMA Kelas XII', 'Abdurakhman, Arif Pradono, Linda Sunarti dan Susanto Zuhdi', 2018, 'Kemendikbud', '978-602-427-122-0', 5, 100, 'cover-2212201671546729.jpg', 'file-2212201671546729.pdf'),
('BK0043', 'Bahasa Inggris SMA Kelas XI', 'Mahrukh Bashir', 2017, 'Kemendikbud', '978-602-427-106-0', 5, 100, 'cover-2212201671546934.jpg', 'file-2212201671546934.pdf'),
('BK0044', 'Prakarya dan Kewirausahaan SMA Kelas XI Semester 1', ': RR. Indah Setyowati, Wawat Naswati, Heatiningsih, Miftakhodin, Cahyadi, dan Dwi Ayu.', 2017, 'Kemendikbud', '978-602-427-153-4', 5, 100, 'cover-2212201671547056.jpg', 'file-2212201671547056.pdf'),
('BK0045', 'Prakarya dan Kewirausahaan SMA Kelas X Semester 2', ': Hendriana Werdhaningsih, Alberta Haryudanti, Rinrin Jamrianti dan Desta Wirmas', 2016, 'Kemendikbud', '978-602-427-153-4', 5, 100, 'cover-2212201671547178.jpg', 'file-2212201671547178.pdf'),
('BK0046', 'Prakarya Dan Kewirausahaan SMA Kelas XII', 'Hendriana Werdhaningsih, Wawat Naswati, Desta Wirnas,  Rinrin Jamriati.', 2018, 'Kemendikbud', '978-602-427-153-4', 5, 100, 'cover-2212201671547317.jpg', 'file-2212201671547317.pdf'),
('BK0047', 'Sejarah Indonesia Sem 2 SMA Kelas XI', 'Sardiman AM, dan Amurwani Dwi Lestariningsih', 2017, 'Kemendikbud', '978-602-427-122-0', 5, 100, 'cover-2212201671547768.jpg', 'file-2212201671547768.pdf'),
('BK0048', 'Matematika SMA Kelas X', 'Bornok Sinaga, Pardomuan N.J.M Sinambela, Andri Kristianto Sitanggang, Tri Andri Hutapea, Sudianto M', 2012, 'Kemendikbud', '978-602-427-114-5', 5, 100, 'cover-2212201671547928.jpg', 'file-2212201671547928.pdf'),
('BK0049', 'Prakarya Dan Kewirausahaan SMA Sem 2 Kelas XI', 'RR. Indah Setyowati, Wawat Naswati, Heatiningsih, Miftakhodin, Cahyadi, dan Dwi Ayu.', 2017, 'Kemendikbud', '978-602-427-153-4', 5, 100, 'cover-2212201671548055.jpg', 'file-2212201671548055.pdf'),
('BK005', 'RPUL', 'Yudhistira Ikranegara', 2009, 'Pustaka Sandro Jaya Jakarta', '9793967978', 4, 100, 'cover-2211111668171643.jpg', 'file-2212031670072962.pdf'),
('BK0050', 'Seni Budaya Sem 2 SMA Kelas X', 'Zackaria Soetedja, Dewi Suryati, Milasari, Agus Supriatna, ', 2016, 'Kemendikbud', '978-602-427-142-8', 5, 100, 'cover-2212201671548190.jpg', 'file-2212201671548190.pdf'),
('BK0051', 'Bahasa Indonesia SMA Kelas XI', 'Suherli, Maman Suryaman, Aji Septiaji, Istiqomah', 2017, 'Kemendikbud', '978-602-427-098-8', 5, 100, 'cover-2212201671548294.jpg', 'file-2212201671548294.pdf'),
('BK0052', 'Pendidikan Agama Islam SMA Kelas X', 'Nelty Khairiyah dan Endi Suhendi Zen.', 2016, 'Kemendikbud', '978-602-427-042-1', 5, 100, 'cover-2212201671548461.jpg', 'file-2212201671548461.pdf'),
('BK006', 'Marmut Merah Jambu', 'Raditya Dika', 2010, 'Bukune', '6028066648', 6, 100, 'cover-2211111668171737.jpg', 'file-2212031670072948.pdf'),
('BK007', 'Bumi', 'Tereliye', 2014, 'Gramedia Pustaka Utama (Jakarta)', '9786020627526', 6, 100, 'cover-2211111668172505.jpg', 'file-2212031670072861.pdf'),
('BK008', 'Garis waktu', 'Fiersa Besari', 2016, 'Media Kita', '9789797945251', 6, 100, 'cover-2211111668172850.jpeg', 'file-2212031670072898.pdf'),
('BK009', 'Laskar Pelangi', 'Andrea Hirata', 2005, 'Bentang Pustaka', '9793062797', 6, 100, 'cover-2211111668173224.jpg', 'file-2212031670072912.pdf');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(4, 'Buku Bacaan Siswa'),
(5, 'Buku Siswa'),
(6, 'Novel');

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
  `role` enum('admin','anggota') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `is_active` enum('0','1') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

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
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kd_buku`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
