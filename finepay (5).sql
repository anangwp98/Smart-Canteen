-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Des 2019 pada 17.11
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
-- Database: `finepay`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `barang`
--

CREATE TABLE `barang` (
  `id_barang` varchar(20) NOT NULL,
  `nama_barang` varchar(50) NOT NULL,
  `harga` decimal(10,0) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `barang`
--

INSERT INTO `barang` (`id_barang`, `nama_barang`, `harga`) VALUES
('110', 'IPHONE XS MAX 256GB', '15370000'),
('BRG-1040081025Xiaomi', 'Xiaomi Redmi Note 8 (4GB/64GB)', '2255000'),
('BRG-2077250955Oppo-A', 'Oppo A5 2020 3/64', '2399000'),
('BRG-713633850ACER-PR', 'ACER PREDATOR', '12000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dompet`
--

CREATE TABLE `dompet` (
  `id_dompet` varchar(10) NOT NULL,
  `id_user` varchar(15) DEFAULT NULL,
  `jenis_dompet` varchar(20) DEFAULT NULL,
  `saldo` bigint(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dompet`
--

INSERT INTO `dompet` (`id_dompet`, `id_user`, `jenis_dompet`, `saldo`) VALUES
('1211', 'FNuser09122019-', NULL, 120000),
('2', 'FNyusthaff98081', NULL, 900000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(10) NOT NULL,
  `id_dompet` varchar(10) DEFAULT NULL,
  `tgl_pembayaran` date DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `id_tagihan` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pesanan`
--

CREATE TABLE `pesanan` (
  `id_pesanan` varchar(10) NOT NULL,
  `id_user` varchar(15) DEFAULT NULL,
  `id_barang` varchar(10) DEFAULT 'NULL',
  `nama_pesanan` varchar(50) NOT NULL,
  `tgl_pesanan` date DEFAULT NULL,
  `ket_pesanan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pesanan`
--

INSERT INTO `pesanan` (`id_pesanan`, `id_user`, `id_barang`, `nama_pesanan`, `tgl_pesanan`, `ket_pesanan`) VALUES
('1', 'FNuser09122019-', '110', 'ORD028192', '2019-12-09', '12121');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tagihan`
--

CREATE TABLE `tagihan` (
  `id_tagihan` varchar(10) NOT NULL,
  `id_pesanan` varchar(10) DEFAULT NULL,
  `jml_dp` bigint(20) DEFAULT NULL,
  `jml_tagihan` bigint(20) DEFAULT NULL,
  `tgl_jatuh_tempo` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `topup`
--

CREATE TABLE `topup` (
  `id_topup` varchar(10) NOT NULL,
  `id_dompet` varchar(10) DEFAULT NULL,
  `jumlah_topup` bigint(20) DEFAULT NULL,
  `keterangan_topup` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `transfer`
--

CREATE TABLE `transfer` (
  `id_transfer` varchar(10) NOT NULL,
  `id_dompet` varchar(10) DEFAULT NULL,
  `tgl_transfer` date DEFAULT NULL,
  `jumlah_transfer` bigint(20) DEFAULT NULL,
  `keterangan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` varchar(15) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `tglLahir` date DEFAULT NULL,
  `jk` enum('L','P','','') NOT NULL,
  `alamat` text DEFAULT NULL,
  `nomorTelp` varchar(12) DEFAULT NULL,
  `level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `nama`, `email`, `password`, `tglLahir`, `jk`, `alamat`, `nomorTelp`, `level`) VALUES
('0', '0', '0', '0', '0', NULL, 'L', NULL, NULL, '0'),
('ADM001', 'anangwp', 'ANANG WAHYU PRADANA', 'anang.pradana@students.amikom.ac.id', '21232f297a57a5a743894a0e4a801fc3', '2019-12-04', 'L', NULL, NULL, 'admin'),
('FNanangwp980812', 'anangwp98', 'ANANG WAHYU PRADANA', 'anangwahyupradanaofficial@gmail.com', '2326af735beba37279d41c7f0ab62e73', '1998-08-22', 'L', 'Jl Sambi, Dukuh Patran, Desa Sambilawang, Kec. Bungkal PONOROGO - JAWA TIMUR', '087758532425', 'user'),
('FNrona123091220', 'rona123', 'M RONA SETYOWARDANI', 'rona.1125@students.amikom.ac.id', '689b6f533e39e77830b46315ab4cb501', '1998-12-02', 'L', 'Jl. Nusa Indah II no 57 Condong Catur, Sleman, Yogyakarta', '087758532425', 'admin'),
('FNuser09122019-', 'user', 'USER TEST', 'user@gmail.com', 'ee11cbb19052e40b07aac0ca060c23ee', '0000-00-00', 'L', '', '', 'user'),
('FNyusthaff98081', 'yusthaff98', 'YUSTHA FAUZIYAH FIRDAUS', 'yusthafauziahfirdaus59@gmail.com', 'd58df9d65a52f8e368d4edff7d0778a3', '1998-03-30', 'P', 'Jalan Singosaren no C26 PONOROGO', '082230381413', 'user');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `dompet`
--
ALTER TABLE `dompet`
  ADD PRIMARY KEY (`id_dompet`),
  ADD KEY `dompet` (`id_user`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `pembayaran` (`id_dompet`),
  ADD KEY `id_tagihan` (`id_tagihan`);

--
-- Indeks untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD PRIMARY KEY (`id_pesanan`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_user` (`id_user`);

--
-- Indeks untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD PRIMARY KEY (`id_tagihan`),
  ADD KEY `id_pesanan` (`id_pesanan`);

--
-- Indeks untuk tabel `topup`
--
ALTER TABLE `topup`
  ADD PRIMARY KEY (`id_topup`),
  ADD KEY `topup` (`id_dompet`);

--
-- Indeks untuk tabel `transfer`
--
ALTER TABLE `transfer`
  ADD PRIMARY KEY (`id_transfer`),
  ADD KEY `transfer` (`id_dompet`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dompet`
--
ALTER TABLE `dompet`
  ADD CONSTRAINT `dompet` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran` FOREIGN KEY (`id_dompet`) REFERENCES `dompet` (`id_dompet`),
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`id_tagihan`) REFERENCES `tagihan` (`id_tagihan`);

--
-- Ketidakleluasaan untuk tabel `pesanan`
--
ALTER TABLE `pesanan`
  ADD CONSTRAINT `id_barang` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`),
  ADD CONSTRAINT `id_user` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `tagihan`
--
ALTER TABLE `tagihan`
  ADD CONSTRAINT `id_pesanan` FOREIGN KEY (`id_pesanan`) REFERENCES `pesanan` (`id_pesanan`);

--
-- Ketidakleluasaan untuk tabel `topup`
--
ALTER TABLE `topup`
  ADD CONSTRAINT `topup` FOREIGN KEY (`id_dompet`) REFERENCES `dompet` (`id_dompet`);

--
-- Ketidakleluasaan untuk tabel `transfer`
--
ALTER TABLE `transfer`
  ADD CONSTRAINT `transfer` FOREIGN KEY (`id_dompet`) REFERENCES `dompet` (`id_dompet`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
