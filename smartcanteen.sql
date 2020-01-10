-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Jan 2020 pada 17.53
-- Versi server: 10.4.6-MariaDB
-- Versi PHP: 7.3.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smartcanteen`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dompet`
--

CREATE TABLE `dompet` (
  `id_dompet` varchar(20) NOT NULL,
  `saldo` bigint(50) NOT NULL,
  `id_user` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dompet`
--

INSERT INTO `dompet` (`id_dompet`, `saldo`, `id_user`) VALUES
('DP1071719752', 6890, 'alvin'),
('DP1749451241', 53110, 'rona123');

-- --------------------------------------------------------

--
-- Struktur dari tabel `download`
--

CREATE TABLE `download` (
  `id_download` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `link` text NOT NULL,
  `icon` varchar(50) NOT NULL,
  `warna` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_topup`
--

CREATE TABLE `log_topup` (
  `id` varchar(20) NOT NULL,
  `tgl_diterima` datetime NOT NULL,
  `saldo_awal` bigint(20) NOT NULL,
  `saldo_akhir` bigint(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `id_topup` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_topup`
--

INSERT INTO `log_topup` (`id`, `tgl_diterima`, `saldo_awal`, `saldo_akhir`, `id_user`, `id_topup`) VALUES
('LGTP-1502595206', '2020-01-10 21:14:31', 0, 0, 'rona123', 'TP-916308900'),
('LGTP-486320060', '2020-01-10 21:17:14', 0, 331200, 'rona123', 'TP-1335224077');

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` varchar(20) NOT NULL,
  `name_menu` varchar(50) NOT NULL,
  `harga` int(20) NOT NULL,
  `id_pedagang` varchar(20) NOT NULL,
  `file` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `name_menu`, `harga`, `id_pedagang`, `file`) VALUES
('MN-44976317', 'SOTO', 9000, 'PDG-1969649877BAKSO-', '../assets/img/menu/shutterstock_1469046305-780x440.jpg'),
('MN-982522278', 'BAKSO', 10000, 'PDG-1969649877BAKSO-', '../assets/img/menu/Bakso_mi_bihun.jpg'),
('MN-993303374', 'SATE', 15000, 'PDG-1969649877BAKSO-', '../assets/img/menu/Sate_Ponorogo.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pedagang`
--

CREATE TABLE `pedagang` (
  `id_pedagang` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `alamat` text NOT NULL,
  `id_admin` varchar(20) NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pedagang`
--

INSERT INTO `pedagang` (`id_pedagang`, `nama`, `password`, `email`, `jk`, `telepon`, `alamat`, `id_admin`, `level`) VALUES
('PDG-1969649877BAKSO-', 'BAKSO PAK NUN', 'bakso', 'a@gmail.com', 'L', '082230381413', 'Lantai GF Hartono Mall, Jl. Ring Road Utara Jl. Kaliwaru, Kaliwaru, Condongcatur, Kec. Depok, Kabupaten Sleman, Daerah Istimewa Yogyakarta 55281', 'anangwp', 'pedagang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasanan`
--

CREATE TABLE `pemasanan` (
  `no_invoce` varchar(20) NOT NULL,
  `jml_pesan` varchar(50) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `total_bayar` int(50) NOT NULL,
  `id_menu` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pemasanan`
--

INSERT INTO `pemasanan` (`no_invoce`, `jml_pesan`, `tgl_pesan`, `total_bayar`, `id_menu`, `id_user`, `status`) VALUES
('PS-547401394', '1', '2020-01-10', 9000, 'MN-44976317', 'rona123', 'SELESAI'),
('PS-709502140', '1', '2020-01-10', 9000, 'MN-44976317', 'rona123', 'SELESAI');

-- --------------------------------------------------------

--
-- Struktur dari tabel `personal_identity`
--

CREATE TABLE `personal_identity` (
  `id_personal_identity` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `ktp` text NOT NULL,
  `ktm` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `personal_identity`
--

INSERT INTO `personal_identity` (`id_personal_identity`, `id_user`, `ktp`, `ktm`) VALUES
('344640153', 'rona123', 'WhatsApp Image 2019-10-07 at 23.02.40.jpeg', 'copy_of_copy_of_handshake_-_hand_holding_on_black_background_0_1_8_0.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `profil_img`
--

CREATE TABLE `profil_img` (
  `id_profil` varchar(20) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `profil_img`
--

INSERT INTO `profil_img` (`id_profil`, `id_user`, `status`) VALUES
('1042179839', 'rona123', '5e187861324071.21880603.jpg'),
('1471227110', 'anangwp', '5e1847f007ade8.30403304.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `topup`
--

CREATE TABLE `topup` (
  `id_topup` varchar(50) NOT NULL,
  `id_user` varchar(20) NOT NULL,
  `jml_topup` bigint(20) NOT NULL,
  `tgl_topup` datetime NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `topup`
--

INSERT INTO `topup` (`id_topup`, `id_user`, `jml_topup`, `tgl_topup`, `status`) VALUES
('TP-1237117049', 'anangwp', 10, '2020-01-10 21:13:05', 'SELESAI'),
('TP-1335224077', 'rona123', 1200, '2020-01-10 21:17:14', 'SELESAI'),
('TP-1445480284', 'rona123', 1200, '2020-01-10 21:17:02', 'SELESAI'),
('TP-1661350246', 'rona123', 1200, '2020-01-10 21:16:43', 'SELESAI'),
('TP-1838484522', 'rona123', 1200, '2020-01-10 21:16:20', 'SELESAI'),
('TP-1933957173', 'anangwp', 10, '2020-01-10 21:12:45', 'SELESAI'),
('TP-386774072', 'rona123', 1200, '2020-01-10 21:16:50', 'SELESAI'),
('TP-434520187', 'anangwp', 10, '2020-01-10 21:13:46', 'SELESAI'),
('TP-476846474', 'rona123', 10000, '2020-01-10 21:14:21', 'SELESAI'),
('TP-480214724', 'anangwp', 10, '2020-01-10 21:12:33', 'SELESAI'),
('TP-916308900', 'rona123', 10000, '2020-01-10 21:14:31', 'SELESAI'),
('TP11271946062020-01-10', 'rona123', 90000, '2020-01-10 22:33:50', ''),
('TP8541108652020-01-10', 'rona123', 28000, '2020-01-10 22:15:26', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `jk` enum('L','P') NOT NULL,
  `alamat` text NOT NULL,
  `tgl_lahir` date NOT NULL,
  `telepon` varchar(15) NOT NULL,
  `level` varchar(20) NOT NULL,
  `img` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `password`, `email`, `jk`, `alamat`, `tgl_lahir`, `telepon`, `level`, `img`) VALUES
('1', '1', 'c4ca4238a0b923820dcc509a6f75849b', '1@gmail', 'L', '', '0000-00-00', '', 'user', ''),
('alvin', 'ALVIN ADWITYA R', '202cb962ac59075b964b07152d234b70', 'alvin@gmail.com', 'L', '', '0000-00-00', '', 'user', ''),
('anangwp', 'ANANG WAHYU PRADANA', '21232f297a57a5a743894a0e4a801fc3', 'a@gmail.com', 'L', 'sasas', '1900-10-30', '', 'admin', ''),
('rona123', 'RONA WARDANI', 'ee11cbb19052e40b07aac0ca060c23ee', '212@gmail.com', 'L', '1212121', '1900-11-13', '121212', 'user', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `website`
--

CREATE TABLE `website` (
  `id_website` varchar(20) NOT NULL,
  `nama` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dompet`
--
ALTER TABLE `dompet`
  ADD PRIMARY KEY (`id_dompet`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `download`
--
ALTER TABLE `download`
  ADD PRIMARY KEY (`id_download`);

--
-- Indeks untuk tabel `log_topup`
--
ALTER TABLE `log_topup`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_topup` (`id_topup`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`),
  ADD KEY `id_pedagang` (`id_pedagang`);

--
-- Indeks untuk tabel `pedagang`
--
ALTER TABLE `pedagang`
  ADD PRIMARY KEY (`id_pedagang`),
  ADD KEY `id_admin` (`id_admin`);

--
-- Indeks untuk tabel `pemasanan`
--
ALTER TABLE `pemasanan`
  ADD PRIMARY KEY (`no_invoce`),
  ADD KEY `id_menu` (`id_menu`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `personal_identity`
--
ALTER TABLE `personal_identity`
  ADD PRIMARY KEY (`id_personal_identity`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `profil_img`
--
ALTER TABLE `profil_img`
  ADD PRIMARY KEY (`id_profil`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`id_topup`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- Indeks untuk tabel `website`
--
ALTER TABLE `website`
  ADD PRIMARY KEY (`id_website`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dompet`
--
ALTER TABLE `dompet`
  ADD CONSTRAINT `dompet_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `log_topup`
--
ALTER TABLE `log_topup`
  ADD CONSTRAINT `log_topup_ibfk_1` FOREIGN KEY (`id_topup`) REFERENCES `topup` (`id_topup`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `log_topup_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD CONSTRAINT `menu_ibfk_1` FOREIGN KEY (`id_pedagang`) REFERENCES `pedagang` (`id_pedagang`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pedagang`
--
ALTER TABLE `pedagang`
  ADD CONSTRAINT `pedagang_ibfk_1` FOREIGN KEY (`id_admin`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `pemasanan`
--
ALTER TABLE `pemasanan`
  ADD CONSTRAINT `pemasanan_ibfk_3` FOREIGN KEY (`id_menu`) REFERENCES `menu` (`id_menu`) ON DELETE CASCADE ON UPDATE NO ACTION,
  ADD CONSTRAINT `pemasanan_ibfk_4` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `profil_img`
--
ALTER TABLE `profil_img`
  ADD CONSTRAINT `profil_img_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `topup`
--
ALTER TABLE `topup`
  ADD CONSTRAINT `topup_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON DELETE CASCADE ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
