-- phpMyAdmin SQL Dump
-- version 4.9.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 29 Agu 2020 pada 20.04
-- Versi server: 10.4.8-MariaDB
-- Versi PHP: 7.3.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `penilaian`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buka`
--

CREATE TABLE `buka` (
  `id` int(11) NOT NULL,
  `aksi` int(11) NOT NULL,
  `tahun` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buka`
--

INSERT INTO `buka` (`id`, `aksi`, `tahun`) VALUES
(1, 1, '2020-2021_Ganjil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kriteria`
--

CREATE TABLE `kriteria` (
  `id` int(255) NOT NULL,
  `kriteria` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `bobot` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kriteria`
--

INSERT INTO `kriteria` (`id`, `kriteria`, `level`, `bobot`) VALUES
(1, 'kepribadian', 'mahasiswa', 0.12258904461875),
(2, 'pendagogik', 'mahasiswa', 0.55716285914306),
(3, 'sosial', 'mahasiswa', 0.3202480962382),
(4, 'kepribadian', 'rekan', 0.072621236878401),
(5, 'pendagogik', 'rekan', 0.31045987505078),
(6, 'sosial', 'rekan', 0.15596882190594),
(7, 'profesional', 'rekan', 0.46095006616488),
(8, 'kepribadian', 'atasan', 0.61966155554279),
(9, 'profesional', 'atasan', 0.22435983333014),
(10, 'sosial', 'atasan', 0.15597861112706);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kuesioner`
--

CREATE TABLE `kuesioner` (
  `id` int(255) NOT NULL,
  `id_kriteria` int(255) DEFAULT NULL,
  `kuesioner` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kuesioner`
--

INSERT INTO `kuesioner` (`id`, `id_kriteria`, `kuesioner`) VALUES
(1, 8, 'Selalu dapat menyelesaikan tugas'),
(2, NULL, ''),
(3, 8, 'selalu sungguh - sungguh menegakkan ideologi, UUD, NkRI'),
(4, 8, 'menaati peraturan kedisiplinan, ketentuan jam kerja, memelihara barang milik negara'),
(5, 10, 'mampu bekerja sama dengan atasan, bawahan dan rekan kerja'),
(6, 10, 'mampu bertindak tegas, tidak memihak, memberi teladan, menggerakkan tim, mengambil keputusan dengan cepat dan tepat'),
(7, 2, 'Buku ajar / jobsheet /modul praktikum yang diberikan sangat membantu dalam memahami perkuliahan'),
(8, 2, 'Dosen mengajarkan kuliah / praktikum yang bersangkutan sesuai rencana pengajaran'),
(9, 2, 'Dosen selalu menggunakan media pembelajaran seperti LCD / alat peraga / software / lainnya'),
(10, 2, 'Dosen memberikan buku ajar / jobsheet / modul praktikum'),
(11, 2, 'Dosen menggunakan buku rujukan atau penunjang (textbook) untuk mata kuliah / praktikum'),
(12, 2, 'Dosen Menjelaskan silabus perkuliahan'),
(13, 2, 'Dosen memberikan materi mata kuliah sesuai dengan kurikulum dan silabus yang berlaku'),
(14, 2, 'Dosen yang bersangkutan memberi kesempatan untuk berkonsultasi di luar jam mengajar'),
(15, 2, 'Dosen menjelaskan sistem evaluasi untuk mata kuliah / praktikum pada awal perkuliahan'),
(16, 2, 'Dosen memberi ujian yang sesuai dengan materi perkuliahan / praktikum'),
(17, 2, 'Dosen menjelaskan hasil ujian yang telah dilakukan mahasiswa'),
(18, 2, 'Dosen memberi penilaian secara obyektif terhadap evaluasi yang dilakukan'),
(19, 2, 'Dosen mengembangkan materi perkuliahan sesuai dengan kemampuan mahasiswa'),
(20, 2, 'Dosen menyampaikan materi perkuliahan secara sistematis'),
(21, 2, 'Dosen memberikan penguatan/apresiasi terhadap respon positif mahasiswa'),
(22, 2, 'Dosen mengupayakan partisipasi aktif mahasiswa dalam perkuliahan'),
(23, 2, 'Dosen menjelaskan tujuan dan manfaat kuliah / praktikum'),
(24, 1, 'Dosen menjelaskan rencana pengajaran di awal perkuliahan\r\n'),
(25, 1, 'Dosen menyerahkan kontrak perkuliahan di awal semester'),
(26, 1, 'Dosen selalu hadir dan menyampaikan materi dalam setiap perkuliahan'),
(27, 1, 'Dosen selalu memulai dan mengakhiri perkuliahan secara tepat waktu'),
(28, 1, 'Perkuliahan sesuai dengan kontrak kuliah yang sudah disepakai sebelumnya'),
(29, 3, 'Pada saat mengajar dosen memberi kuliah dengan jelas dan mudah dimengerti'),
(30, 3, 'Dosen memberi kesempatan bagi mahasiswa untuk bertanya'),
(31, 3, 'Dosen memberikan tanggapan yang memuaskan terhadap pertanyaan yang diajukan mahasiswa'),
(32, 3, 'Dosen dapat membangkitkan minat mahasiswa pada pokok materi mata kuliah / praktikum'),
(33, 3, 'Dosen memberi kesempatan untuk memperbaiki nilai ujian'),
(34, 3, 'Memberikan perkuliahan dengan bahasa yang dapat dipahami mahasiswa'),
(35, 3, 'Memberikan kesempatan kepada mahasiswa untuk menanggapi perkuliahan'),
(36, 3, 'Menerima kritik dan saran mahasiswa'),
(37, 3, 'Berkomunikasi lisan dalam pembelajaran secara santun dengan mahasiswa'),
(38, 3, 'Memperhatikan perbedaan kemampuan mahasiswa'),
(39, 8, 'jujur dalam menjalankan tugas'),
(40, 9, 'Menerapkan berbagai pendekatan, strategi, metode, dan teknik pembelajaran yang mendidik secara kreatif dalam mata kuliah'),
(41, 9, 'Menata materi pembelajaran secara benar sesuai dengan pendekatan yang dipilih'),
(42, 9, 'Memahami berbagai teori belajar dan prinsip-prinsip pembelajaran yang mendidik'),
(43, 9, 'Mengaitkan perkuliahan dengan isu-isu pendidikan yang aktual dan mutakhir'),
(44, 10, 'dosen bersedia diajak berdikusi tentang segala hal terkait kepentingan peserta didik dan kampus.'),
(45, 10, 'memberi keputusan cepat dan tepat'),
(46, 10, 'tidak mementingkan diri sendiri'),
(47, 5, 'Mengaitkan perkuliahan dengan isu-isu pendidikan yang aktual dan mutakhir'),
(48, 5, 'Membuat bahan ajar perkuliahan (buku ajar, modul, hand-out)'),
(49, 5, 'Memberikan tugas sesuai dengan tujuan perkuliahan'),
(50, 5, 'Memberikan materi perkuliahan sesuai silabus'),
(51, 5, 'Menggunakan media yang bervariasi dalam pembelajaran'),
(52, 5, 'Memberikan tugas-tugas yang relevan dengan perkuliahan mahasiswa '),
(53, 5, 'Memberikan umpan balik terhadap tugas mahasiswa'),
(54, 5, 'Melaksanakan penilaian sesuai dengan tujuan perkuliahan'),
(55, 5, 'Mempunyai dokumen penilaian yang dapat dan boleh diketahui oleh mahasiswa'),
(56, 5, 'Menggunakan referensi wajib/pendukung dalam perkuliahan'),
(58, 5, 'Memberikan contoh yang relevan dengan materi yang diajarkan'),
(59, 4, 'Dosen memelihara barang negara'),
(60, 4, 'dosen mentaati peraturan yang berlaku di kampus. '),
(61, 4, 'dosen bekerja sesuai jadwal yang ditetapkan.'),
(62, 4, 'dosen berperilaku baik terhadap saya dan dosen lain'),
(63, 4, 'Menyelesaikan Tugas dengan penuh tanggung jawab'),
(64, 6, 'Tidak mementingkan diri sendiri'),
(65, 6, 'dosen bersedia diajak berdikusi tentang segala hal terkait kepentingan peserta didik dan kampus.'),
(66, 6, 'dosen menghargai kemampuan saya dan dosen lainnya.'),
(67, 6, 'dosen bersedia membantu menyelesaikan masalah saya dan dosen lainnya.'),
(68, 6, 'Menjalin hubungan secara efektif dengan aktivitas akademika (dosen dan pegawai)'),
(69, 6, 'selalu bertindak tegas, tidak memihak, memberi teladan, menggerakkan tim'),
(70, 6, 'dosen mudah bekerjasama dengan saya atau dosen lainnya.'),
(71, 6, 'dosen bersedia menerima kritik dan saran dari saya atau dosen lain'),
(72, 6, 'memberi keputusan cepat dan tepat'),
(73, 7, 'Menguasai materi perkuliahan secara luas'),
(74, 7, 'Menguasai materi perkuliahan secara mendalam'),
(75, 7, 'Menguasai konsep keilmuan'),
(76, 7, 'Menguasai metode pengembangan keilmuan dalam mata kuliah yang diajarkannya'),
(77, 7, 'Menghubungkan materi yang diajarkan dengan bidang/topik lain'),
(78, 7, 'Menghubungkan topik yang diajarkan dengan konteks kehidupan'),
(79, 7, 'Menguasai isu-isu mutakhir dalam bidang yang diajarkan'),
(80, 7, 'Menggunakan hasil penelitian untuk meningkatkan kualitas perkuliahan'),
(81, 7, 'Melibatkan mahasiswa dalam penelitian/kajian yang dilakukan dosen'),
(82, 7, 'dosen memiliki kretivitas dalam pembelajaran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` int(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `nama`) VALUES
(2, 'PCD'),
(5, 'Algoritma Pemrogranan1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skor_awal`
--

CREATE TABLE `skor_awal` (
  `id` int(255) NOT NULL,
  `id_dosen` bigint(255) NOT NULL,
  `skor` varchar(255) NOT NULL,
  `id_penilai` bigint(255) NOT NULL,
  `matakuliah` int(255) DEFAULT NULL,
  `tahun` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `skor_awal`
--

INSERT INTO `skor_awal` (`id`, `id_dosen`, `skor`, `id_penilai`, `matakuliah`, `tahun`) VALUES
(1, 1641720062, '{\"kepribadian\": 3, \"pendagogik\": 2,\"sosial\":2}', 1641720061, 2, '2019-2020_Genap'),
(2, 1641720062, '{\"kepribadian\": 5, \"pendagogik\": 2,\"sosial\":2}', 1641720061, 5, '2019-2020_Genap'),
(3, 1641720062, '{\"kepribadian\": 5, \"pendagogik\": 3, \"profesional\":2,\"sosial\":1}', 1641720063, 5, '2019-2020_Genap'),
(4, 1641720063, '{\"kepribadian\": 5, \"pendagogik\": 3, \"profesional\":2,\"sosial\":1}', 1641720062, 5, '2019-2020_Genap'),
(5, 1641720062, '{\"kepribadian\": 3, \"profesional\": 2,\"sosial\":2}', 1641720060, NULL, '2019-2020_Genap'),
(6, 1641720062, '{\"kepribadian\":2.5,\"profesional\":2,\"sosial\":2}', 1641720065, NULL, '2019-2020_Genap'),
(7, 1641720062, '{\"kepribadian\": 3, \"pendagogik\": 3, \"profesional\":4,\"sosial\":1}', 1641720066, 2, '2019-2020_Genap'),
(8, 1641720063, '{\"kepribadian\": 5, \"profesional\": 1,\"sosial\":1}', 1641720060, NULL, '2019-2020_Genap'),
(9, 1641720063, '{\"kepribadian\": 2, \"profesional\": 1,\"sosial\":1}', 1641720060, NULL, '2019-2020_Genap'),
(10, 1641720063, ' {\"kepribadian\": 3, \"pendagogik\": 1,\"sosial\":4}', 1641720061, 5, '2019-2020_Genap'),
(11, 1641720063, ' {\"kepribadian\": 2, \"pendagogik\": 2,\"sosial\":4}', 1641720064, 2, '2019-2020_Genap'),
(12, 1641720063, '{\"kepribadian\": 1, \"pendagogik\": 3, \"profesional\":3,\"sosial\":2}', 1641720066, 2, '2019-2020_Genap'),
(13, 1641720063, '{\"kepribadian\": 2, \"pendagogik\": 1, \"profesional\":2,\"sosial\":3}', 1641720066, 5, '2019-2020_Genap'),
(14, 1641720066, '{\"kepribadian\": 2, \"profesional\": 1,\"sosial\":1}', 1641720060, NULL, '2019-2020_Genap'),
(15, 1641720066, '{\"kepribadian\":3,\"profesional\":1,\"sosial\":2}', 1641720065, NULL, '2019-2020_Genap'),
(16, 1641720066, ' {\"kepribadian\": 2, \"pendagogik\": 5,\"sosial\":1}', 1641720061, 2, '2019-2020_Genap'),
(17, 1641720066, '{\"kepribadian\": 3, \"pendagogik\": 1, \"profesional\":2,\"sosial\":1}', 1641720067, 5, '2019-2020_Genap'),
(18, 1641720066, '{\"kepribadian\": 1, \"pendagogik\": 3, \"profesional\":2,\"sosial\":4}', 1641720063, 5, '2019-2020_Genap'),
(19, 1641720066, ' {\"kepribadian\": 2, \"pendagogik\": 4,\"sosial\":2}', 1641720064, 5, '2019-2020_Genap'),
(20, 1641720067, ' {\"kepribadian\": 2, \"profesional\": 1,\"sosial\":2}', 1641720060, NULL, '2019-2020_Genap'),
(21, 1641720067, ' {\"kepribadian\": 5, \"profesional\": 1,\"sosial\":1}', 1641720065, NULL, '2019-2020_Genap'),
(22, 1641720067, ' {\"kepribadian\": 3, \"pendagogik\": 1,\"sosial\":4}', 1641720061, 5, '2019-2020_Genap'),
(23, 1641720067, ' {\"kepribadian\": 4, \"pendagogik\": 1,\"sosial\":1}', 1641720064, 5, '2019-2020_Genap'),
(24, 1641720067, '{\"kepribadian\": 2, \"pendagogik\": 4, \"profesional\":2,\"sosial\":1}', 1641720066, 2, '2019-2020_Genap'),
(25, 1641720067, '{\"kepribadian\": 4, \"pendagogik\": 3, \"profesional\":2,\"sosial\":3}', 1641720062, 2, '2019-2020_Genap'),
(26, 1641720062, '{\"kepribadian\": 3, \"pendagogik\": 2,\"sosial\":2}', 1641720061, 2, '2019-2020_Ganjil'),
(27, 1641720062, '{\"kepribadian\": 5, \"pendagogik\": 2,\"sosial\":2}', 1641720061, 5, '2019-2020_Ganjil'),
(28, 1641720062, '{\"kepribadian\": 5, \"pendagogik\": 3, \"profesional\":2,\"sosial\":1}', 1641720063, 5, '2019-2020_Ganjil'),
(29, 1641720063, '{\"kepribadian\": 5, \"pendagogik\": 3, \"profesional\":2,\"sosial\":1}', 1641720062, 5, '2019-2020_Ganjil'),
(30, 1641720062, '{\"kepribadian\": 3, \"profesional\": 2,\"sosial\":2}', 1641720060, NULL, '2019-2020_Ganjil'),
(31, 1641720062, '{\"kepribadian\": 4, \"profesional\": 3,\"sosial\":3}', 1641720065, NULL, '2019-2020_Ganjil'),
(32, 1641720062, '{\"kepribadian\": 3, \"pendagogik\": 3, \"profesional\":4,\"sosial\":1}', 1641720066, 2, '2019-2020_Ganjil'),
(33, 1641720063, '{\"kepribadian\": 5, \"profesional\": 1,\"sosial\":1}', 1641720060, NULL, '2019-2020_Ganjil'),
(34, 1641720063, '{\"kepribadian\": 2, \"profesional\": 1,\"sosial\":1}', 1641720060, NULL, '2019-2020_Ganjil'),
(35, 1641720063, ' {\"kepribadian\": 3, \"pendagogik\": 1,\"sosial\":4}', 1641720061, 5, '2019-2020_Ganjil'),
(36, 1641720063, ' {\"kepribadian\": 2, \"pendagogik\": 2,\"sosial\":4}', 1641720064, 2, '2019-2020_Ganjil'),
(37, 1641720063, '{\"kepribadian\": 1, \"pendagogik\": 3, \"profesional\":3,\"sosial\":2}', 1641720066, 2, '2019-2020_Ganjil'),
(38, 1641720063, '{\"kepribadian\": 2, \"pendagogik\": 1, \"profesional\":2,\"sosial\":3}', 1641720066, 5, '2019-2020_Ganjil'),
(39, 1641720066, '{\"kepribadian\": 2, \"profesional\": 1,\"sosial\":1}', 1641720060, NULL, '2019-2020_Ganjil'),
(40, 1641720066, '{\"kepribadian\":3,\"profesional\":1,\"sosial\":2}', 1641720065, NULL, '2019-2020_Ganjil'),
(41, 1641720066, ' {\"kepribadian\": 2, \"pendagogik\": 5,\"sosial\":1}', 1641720061, 2, '2019-2020_Ganjil'),
(42, 1641720066, '{\"kepribadian\": 3, \"pendagogik\": 1, \"profesional\":2,\"sosial\":1}', 1641720067, 5, '2019-2020_Ganjil'),
(43, 1641720066, '{\"kepribadian\": 1, \"pendagogik\": 3, \"profesional\":2,\"sosial\":4}', 1641720063, 5, '2019-2020_Ganjil'),
(44, 1641720066, ' {\"kepribadian\": 2, \"pendagogik\": 4,\"sosial\":2}', 1641720064, 5, '2019-2020_Ganjil'),
(45, 1641720067, ' {\"kepribadian\": 2, \"profesional\": 1,\"sosial\":2}', 1641720060, NULL, '2019-2020_Ganjil'),
(46, 1641720067, ' {\"kepribadian\": 5, \"profesional\": 1,\"sosial\":1}', 1641720065, NULL, '2019-2020_Ganjil'),
(47, 1641720067, ' {\"kepribadian\": 3, \"pendagogik\": 1,\"sosial\":4}', 1641720061, 5, '2019-2020_Ganjil'),
(48, 1641720067, ' {\"kepribadian\": 4, \"pendagogik\": 1,\"sosial\":1}', 1641720064, 5, '2019-2020_Ganjil'),
(49, 1641720067, '{\"kepribadian\": 2, \"pendagogik\": 4, \"profesional\":2,\"sosial\":1}', 1641720066, 2, '2019-2020_Ganjil'),
(50, 1641720067, '{\"kepribadian\": 4, \"pendagogik\": 3, \"profesional\":2,\"sosial\":3}', 1641720062, 2, '2019-2020_Ganjil'),
(1641720077, 3, '{\"kepribadian\":4.5,\"profesional\":3.75,\"sosial\":4}', 1, NULL, '2020-2021_Ganjil'),
(1641720078, 3, '{\"kepribadian\":5,\"pendagogik\":5,\"sosial\":5}', 2, NULL, '2020-2021_Ganjil'),
(1641720079, 3, '{\"kepribadian\":5,\"pendagogik\":5,\"profesional\":1,\"sosial\":5}', 4, NULL, '2020-2021_Ganjil'),
(1641720080, 4, '{\"kepribadian\":4,\"profesional\":4,\"sosial\":4}', 1, NULL, '2020-2021_Ganjil'),
(1641720081, 4, '{\"kepribadian\":5,\"pendagogik\":4.823529411764706,\"sosial\":3.8}', 2, NULL, '2020-2021_Ganjil'),
(1641720082, 4, '{\"kepribadian\":4.2,\"pendagogik\":3.909090909090909,\"profesional\":1,\"sosial\":4}', 3, NULL, '2020-2021_Ganjil'),
(1641720083, 5, '{\"kepribadian\":4,\"profesional\":4,\"sosial\":4}', 1, NULL, '2020-2021_Ganjil'),
(1641720084, 5, '{\"kepribadian\":4.2,\"pendagogik\":4.411764705882353,\"sosial\":5}', 2, NULL, '2020-2021_Ganjil'),
(1641720085, 5, '{\"kepribadian\":4.6,\"pendagogik\":4.636363636363637,\"profesional\":1,\"sosial\":4.666666666666667}', 6, NULL, '2020-2021_Ganjil'),
(1641720086, 6, '{\"kepribadian\":4,\"profesional\":4.25,\"sosial\":4.8}', 1, NULL, '2020-2021_Ganjil'),
(1641720087, 6, '{\"kepribadian\":4,\"pendagogik\":4.764705882352941,\"sosial\":4.6}', 2, NULL, '2020-2021_Ganjil'),
(1641720088, 6, '{\"kepribadian\":5,\"pendagogik\":5,\"profesional\":1,\"sosial\":5}', 5, NULL, '2020-2021_Ganjil'),
(1641720089, 7, '{\"kepribadian\":4.75,\"profesional\":4.75,\"sosial\":4.4}', 1, NULL, '2020-2021_Ganjil'),
(1641720090, 7, '{\"kepribadian\":4,\"pendagogik\":4,\"sosial\":4}', 2, NULL, '2020-2021_Ganjil'),
(1641720091, 7, '{\"kepribadian\":5,\"pendagogik\":5,\"profesional\":1\r\n,\"sosial\":5}', 8, NULL, '2020-2021_Ganjil'),
(1641720092, 8, '{\"kepribadian\":4,\"profesional\":4,\"sosial\":4}', 1, NULL, '2020-2021_Ganjil'),
(1641720093, 8, '{\"kepribadian\":1,\"pendagogik\":4.117647058823529,\"sosial\":4}', 2, NULL, '2020-2021_Ganjil'),
(1641720094, 9, '{\"kepribadian\":4.5,\"profesional\":4.25,\"sosial\":4.4}', 1, NULL, '2020-2021_Ganjil'),
(1641720095, 8, '{\"kepribadian\":5,\"pendagogik\":4.909090909090909,\"profesional\":1,\"sosial\":5}', 7, NULL, '2020-2021_Ganjil'),
(1641720096, 9, '{\"kepribadian\":4,\"pendagogik\":3.823529411764706,\"sosial\":3.2}', 2, NULL, '2020-2021_Ganjil'),
(1641720097, 9, '{\"kepribadian\":3,\"pendagogik\":3,\"profesional\":1,\"sosial\":3}', 10, NULL, '2020-2021_Ganjil'),
(1641720098, 10, '{\"kepribadian\":4.5,\"profesional\":4.5,\"sosial\":4.8}', 1, NULL, '2020-2021_Ganjil'),
(1641720099, 10, '{\"kepribadian\":5,\"pendagogik\":4.823529411764706,\"sosial\":4.4}', 2, NULL, '2020-2021_Ganjil'),
(1641720100, 10, '{\"kepribadian\":1,\"pendagogik\":1,\"profesional\":1,\"sosial\":1}', 9, NULL, '2020-2021_Ganjil'),
(1641720101, 11, '{\"kepribadian\":5,\"profesional\":5,\"sosial\":5}', 1, NULL, '2020-2021_Ganjil'),
(1641720102, 11, '{\"kepribadian\":5,\"pendagogik\":5,\"sosial\":5}', 2, NULL, '2020-2021_Ganjil'),
(1641720103, 11, '{\"kepribadian\":4.4,\"pendagogik\":4.2727272727272725,\"profesional\":1,\"sosial\":4.333333333333333}', 12, NULL, '2020-2021_Ganjil'),
(1641720104, 12, '{\"kepribadian\":5,\"profesional\":5,\"sosial\":5}', 1, NULL, '2020-2021_Ganjil'),
(1641720105, 12, '{\"kepribadian\":3.4,\"pendagogik\":4.705882352941177,\"sosial\":4.6}', 2, NULL, '2020-2021_Ganjil'),
(1641720106, 12, '{\"kepribadian\":4,\"pendagogik\":4,\"profesional\":1,\"sosial\":4}', 11, NULL, '2020-2021_Ganjil');

-- --------------------------------------------------------

--
-- Struktur dari tabel `skor_kriteria`
--

CREATE TABLE `skor_kriteria` (
  `id` int(255) NOT NULL,
  `kriteria` int(255) NOT NULL,
  `kriteria_pembanding` int(255) NOT NULL,
  `nilai` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `skor_kriteria`
--

INSERT INTO `skor_kriteria` (`id`, `kriteria`, `kriteria_pembanding`, `nilai`) VALUES
(1, 1, 2, 0.25),
(2, 1, 2, 0.333),
(3, 2, 3, 2),
(4, 4, 5, 0.25),
(5, 4, 6, 0.333),
(6, 4, 7, 0.2),
(7, 5, 6, 3),
(8, 5, 7, 0.5),
(9, 6, 7, 0.333),
(10, 8, 9, 4),
(11, 8, 10, 3),
(12, 9, 10, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` bigint(255) NOT NULL,
  `password` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `alamat` varchar(255) NOT NULL,
  `hp` varchar(255) NOT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `password`, `nama`, `tanggal_lahir`, `alamat`, `hp`, `level`) VALUES
(1, 'c4ca4238a0b923820dcc509a6f75849b', 'a', '1121-01-01', 'malang', '1', 'atasan'),
(2, 'c81e728d9d4c2f636f067f89cc14862c', 'b', '0002-02-02', 'mala', '2', 'mahasiswa'),
(3, 'eccbc87e4b5ce2fe28308fd9f2a7baf3', 'c', '0012-02-12', 'mala', '123', 'dosen'),
(4, 'a87ff679a2f3e71d9181a67b7542122c', 'd', '0002-02-02', 'malang', '123', 'dosen'),
(5, '4e44f1ac85cd60e3caa56bfd4afb675e', 'e', '0002-02-12', 'malang', '123', 'dosen'),
(6, '1679091c5a880faf6fb5e6087eb1b2dc', 'f', '0002-02-12', 'malang', '123', 'dosen'),
(7, '8f14e45fceea167a5a36dedd4bea2543', 'g', '0002-02-12', 'malang', '123', 'dosen'),
(8, 'c9f0f895fb98ab9159f51fd0297e236d', 'h', '0002-02-22', 'malang', '123', 'dosen'),
(9, '4c0d13d3ad6cc317017872e51d01b238', 'i', '0001-11-11', 'malang', '12', 'dosen'),
(10, 'd3d9446802a44259755d38e6d163e820', 'j', '0001-01-01', 'mLn', '1', 'dosen'),
(11, '6512bd43d9caa6e02c990b0a82652dca', 'k', '0002-02-02', '2', '1', 'dosen'),
(12, 'c20ad4d76fe97759aa27a0c99bff6710', 'l', '0002-02-02', 'malang', '12', 'dosen'),
(123, '202cb962ac59075b964b07152d234b70', 'nidu', '2020-06-10', 'permanu', '86277193829', 'admin'),
(1641720060, '01ba85593b8dff765ea060f7c9addff2', 'Bambang', '2020-06-10', 'permanu', '86277193829', 'atasan'),
(1641720061, '23ced35b3d5787a39bd520ce55e98f82', 'Rendy', '2020-06-10', 'permanu', '86277193829', 'mahasiswa'),
(1641720062, '6bec9c852847242e384a4d5ac0962ba0', 'udin', '2020-07-10', 'permanu', '86277193829', 'dosen'),
(1641720063, 'e5cf6b360793ce3ff91038f9dfc74042', 'Jaja', '2020-06-10', 'permanu', '86277193829', 'dosen'),
(1641720064, '4f9b30bcb757e9f60412d810c46617be', 'boni', '2020-06-10', 'permanu', '86277193829', 'mahasiswa'),
(1641720065, '2da9cd653f63c010b6d6c5a5ad73fe32', 'doni', '2020-06-10', 'permanu', '86277193829', 'atasan'),
(1641720066, '41008f06b76981093c7aa369d83c08ea', 'sumi', '2020-06-10', 'permanu', '86277193829', 'dosen'),
(1641720067, 'ffecba6889b7f73d28b55794d9727593', 'milos', '2020-06-10', 'permanu', '86277193829', 'dosen');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buka`
--
ALTER TABLE `buka`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`);

--
-- Indeks untuk tabel `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id` (`id`),
  ADD KEY `id_kriteria` (`id_kriteria`);

--
-- Indeks untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `skor_awal`
--
ALTER TABLE `skor_awal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_dosen` (`id_dosen`),
  ADD KEY `skor_awal_ibfk_3` (`id_penilai`),
  ADD KEY `matakuliah` (`matakuliah`);

--
-- Indeks untuk tabel `skor_kriteria`
--
ALTER TABLE `skor_kriteria`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kriteria` (`kriteria`),
  ADD KEY `kriteria_pembanding` (`kriteria_pembanding`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kriteria`
--
ALTER TABLE `kriteria`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `kuesioner`
--
ALTER TABLE `kuesioner`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=83;

--
-- AUTO_INCREMENT untuk tabel `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `skor_awal`
--
ALTER TABLE `skor_awal`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1641720107;

--
-- AUTO_INCREMENT untuk tabel `skor_kriteria`
--
ALTER TABLE `skor_kriteria`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kuesioner`
--
ALTER TABLE `kuesioner`
  ADD CONSTRAINT `kuesioner_ibfk_1` FOREIGN KEY (`id_kriteria`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `skor_awal`
--
ALTER TABLE `skor_awal`
  ADD CONSTRAINT `skor_awal_ibfk_2` FOREIGN KEY (`id_dosen`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `skor_awal_ibfk_3` FOREIGN KEY (`id_penilai`) REFERENCES `user` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `skor_awal_ibfk_4` FOREIGN KEY (`matakuliah`) REFERENCES `matakuliah` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `skor_kriteria`
--
ALTER TABLE `skor_kriteria`
  ADD CONSTRAINT `skor_kriteria_ibfk_1` FOREIGN KEY (`kriteria`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `skor_kriteria_ibfk_2` FOREIGN KEY (`kriteria_pembanding`) REFERENCES `kriteria` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
