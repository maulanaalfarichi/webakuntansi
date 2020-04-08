-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Bulan Mei 2019 pada 12.59
-- Versi server: 10.1.38-MariaDB
-- Versi PHP: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `webakuntansi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bagan_akun`
--

CREATE TABLE `bagan_akun` (
  `id_baganakun` int(11) NOT NULL,
  `kode_akun` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nama_akun` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `posisi` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `status_akun` enum('Debit','Kredit') COLLATE utf8_unicode_ci NOT NULL,
  `posisi_neraca` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `pm` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `jenis` varchar(10) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `bagan_akun`
--

INSERT INTO `bagan_akun` (`id_baganakun`, `kode_akun`, `nama_akun`, `posisi`, `status_akun`, `posisi_neraca`, `pm`, `jenis`) VALUES
(1, '101', 'Kas', 'L', 'Debit', 'N', '0', 'Lancar'),
(2, '102', 'Perlengkapan', 'L', 'Debit', 'N', '0', 'Lancar'),
(3, '103', 'Peralatan', 'L', 'Debit', 'N', '0', 'Tetap'),
(5, '201', 'Hutang Bank', 'R', 'Kredit', 'N', '0', ''),
(7, '301', 'Modal', 'M', 'Kredit', 'N', '1', ''),
(8, '302', 'Prive', '', 'Debit', 'N', '1', ''),
(9, '401', 'Pendapatan Jasa', '', 'Kredit', 'T', '0', ''),
(10, '501', 'Beban Listrik', '', 'Debit', 'B', '0', ''),
(11, '502', 'Beban Air', '', 'Debit', 'B', '0', ''),
(12, '503', 'Beban Telepon', '', 'Debit', 'B', '0', ''),
(13, '504', 'Beban Wifi', '', 'Debit', 'B', '0', ''),
(14, '505', 'Beban Gaji dan Komisi', '', 'Debit', 'B', '0', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `hutang`
--

CREATE TABLE `hutang` (
  `id_hutang` int(11) NOT NULL,
  `id_baganakun` int(11) NOT NULL,
  `nomortransaksi_hutang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_hutang` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan_hutang` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_hutang` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `hutang`
--

INSERT INTO `hutang` (`id_hutang`, `id_baganakun`, `nomortransaksi_hutang`, `tanggal_hutang`, `keterangan_hutang`, `total_hutang`) VALUES
(10, 5, 'H0001', '2018-07-09', 'Meminjam uang ke Bank', '5000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jurnal_umum`
--

CREATE TABLE `jurnal_umum` (
  `id_jurnalumum` int(255) NOT NULL,
  `tanggal_jurnalumum` date NOT NULL,
  `nomorbukti_jurnalumum` varchar(100) NOT NULL,
  `keterangan_jurnalumum` varchar(225) NOT NULL,
  `id_baganakun` int(255) NOT NULL,
  `debit_jurnalumum` varchar(225) NOT NULL,
  `kredit_jurnalumum` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jurnal_umum`
--

INSERT INTO `jurnal_umum` (`id_jurnalumum`, `tanggal_jurnalumum`, `nomorbukti_jurnalumum`, `keterangan_jurnalumum`, `id_baganakun`, `debit_jurnalumum`, `kredit_jurnalumum`) VALUES
(111, '2018-07-07', 'K0001', 'Membeli solder', 3, '3000000', '0'),
(112, '2018-07-02', 'J0001', 'Membayar gaji 3 orang karyawan', 14, '7500000', '0'),
(113, '2018-07-21', 'K0001', 'Mengambil uang untuk kepentingan pribadi', 8, '10000000', '0'),
(114, '2018-07-09', 'H0001', 'Meminjam uang ke Bank', 5, '0', '5000000'),
(115, '2018-07-01', 'G0001', 'Menyetorkan modal awal', 7, '0', '20000000'),
(116, '2018-07-05', 'F0001', 'Menerima pendapatan jasa service', 9, '0', '500000'),
(117, '2018-07-13', 'K0002', 'Membeli alat tulis kantor', 2, '1089800', '0'),
(118, '2018-07-19', 'J0002', 'Membayar biaya listrik', 10, '103000', '0'),
(119, '2018-07-28', 'J0003', 'Membayar biaya listrik', 10, '103000', '0'),
(120, '2018-07-28', 'J0004', 'Membayar biaya air', 11, '34500', '0'),
(121, '2018-07-28', 'J0005', 'Membayar biaya telepon', 12, '74700', '0'),
(122, '2018-07-28', 'J0006', 'Membayar biaya wifi Republic', 13, '260400', '0'),
(123, '2018-07-27', 'K0002', 'Mengambil uang untuk kepentingan pribadi', 8, '7000000', '0'),
(124, '2018-07-06', 'F0002', 'Menerima pendapatan jasa service', 9, '0', '1750000'),
(125, '2018-07-10', 'F0003', 'Menerima pendapatan jasa service', 9, '0', '200000'),
(126, '2018-07-11', 'F0004', 'Menerima pendapatan jasa service', 9, '0', '980000'),
(127, '2018-07-17', 'F0005', 'Menerima pendapatan jasa service', 9, '0', '1900000'),
(128, '2018-07-20', 'F0006', 'Menerima pendapatan jasa service', 9, '0', '100000'),
(129, '2018-07-25', 'F0007', 'Menerima pendapatan jasa service', 9, '0', '2750000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kas`
--

CREATE TABLE `kas` (
  `id_kas` int(11) NOT NULL,
  `nomortransaksi_kas` varchar(100) NOT NULL,
  `tanggal_kas` varchar(100) NOT NULL,
  `keterangan_kas` varchar(200) NOT NULL,
  `id_baganakun` int(100) NOT NULL,
  `debit_kas` varchar(200) NOT NULL,
  `kredit_kas` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kas`
--

INSERT INTO `kas` (`id_kas`, `nomortransaksi_kas`, `tanggal_kas`, `keterangan_kas`, `id_baganakun`, `debit_kas`, `kredit_kas`) VALUES
(38, 'K0001', '2018-07-07', 'Membeli solder', 3, '0', '3000000'),
(39, 'J0001', '2018-07-02', 'Membayar gaji 3 orang karyawan', 14, '0', '7500000'),
(40, 'K0001', '2018-07-21', 'Mengambil uang untuk kepentingan pribadi', 8, '0', '10000000'),
(41, 'H0001', '2018-07-09', 'Meminjam uang ke Bank', 5, '5000000', '0'),
(42, 'G0001', '2018-07-01', 'Menyetorkan modal awal', 7, '20000000', '0'),
(43, 'F0001', '2018-07-05', 'Menerima pendapatan jasa service', 9, '500000', '0'),
(44, 'K0002', '2018-07-13', 'Membeli alat tulis kantor', 2, '0', '1089800'),
(45, 'J0002', '2018-07-19', 'Membayar biaya listrik', 10, '0', '103000'),
(46, 'J0003', '2018-07-28', 'Membayar biaya listrik', 10, '0', '103000'),
(47, 'J0004', '2018-07-28', 'Membayar biaya air', 11, '0', '34500'),
(48, 'J0005', '2018-07-28', 'Membayar biaya telepon', 12, '0', '74700'),
(49, 'J0006', '2018-07-28', 'Membayar biaya wifi Republic', 13, '0', '260400'),
(50, 'K0002', '2018-07-27', 'Mengambil uang untuk kepentingan pribadi', 8, '0', '7000000'),
(51, 'F0002', '2018-07-06', 'Menerima pendapatan jasa service', 9, '1750000', '0'),
(52, 'F0003', '2018-07-10', 'Menerima pendapatan jasa service', 9, '200000', '0'),
(53, 'F0004', '2018-07-11', 'Menerima pendapatan jasa service', 9, '980000', '0'),
(54, 'F0005', '2018-07-17', 'Menerima pendapatan jasa service', 9, '1900000', '0'),
(55, 'F0006', '2018-07-20', 'Menerima pendapatan jasa service', 9, '100000', '0'),
(56, 'F0007', '2018-07-25', 'Menerima pendapatan jasa service', 9, '2750000', '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `modal`
--

CREATE TABLE `modal` (
  `id_modal` int(11) NOT NULL,
  `id_baganakun` int(11) NOT NULL,
  `nomortransaksi_modal` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_modal` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan_modal` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_modal` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `modal`
--

INSERT INTO `modal` (`id_modal`, `id_baganakun`, `nomortransaksi_modal`, `tanggal_modal`, `keterangan_modal`, `total_modal`) VALUES
(11, 7, 'G0001', '2018-07-01', 'Menyetorkan modal awal', '20000000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `id_baganakun` int(11) NOT NULL,
  `nomortransaksi_pembayaran` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_pembayaran` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan_pembayaran` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_pembayaran` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `id_baganakun`, `nomortransaksi_pembayaran`, `tanggal_pembayaran`, `keterangan_pembayaran`, `total_pembayaran`) VALUES
(24, 14, 'J0001', '2018-07-02', 'Membayar gaji 3 orang karyawan', '7500000'),
(25, 10, 'J0002', '2018-07-19', 'Membayar biaya listrik', '103000'),
(26, 10, 'J0003', '2018-07-28', 'Membayar biaya listrik', '103000'),
(27, 11, 'J0004', '2018-07-28', 'Membayar biaya air', '34500'),
(28, 12, 'J0005', '2018-07-28', 'Membayar biaya telepon', '74700'),
(29, 13, 'J0006', '2018-07-28', 'Membayar biaya wifi Republic', '260400');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembelian`
--

CREATE TABLE `pembelian` (
  `id_pembelian` int(11) NOT NULL,
  `id_baganakun` int(11) NOT NULL,
  `nomortransaksi_pembelian` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_pembelian` date NOT NULL,
  `keterangan_pembelian` varchar(255) CHARACTER SET latin1 NOT NULL,
  `total_pembelian` varchar(100) CHARACTER SET latin1 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `pembelian`
--

INSERT INTO `pembelian` (`id_pembelian`, `id_baganakun`, `nomortransaksi_pembelian`, `tanggal_pembelian`, `keterangan_pembelian`, `total_pembelian`) VALUES
(26, 3, 'K0001', '2018-07-07', 'Membeli solder', '3000000'),
(27, 2, 'K0002', '2018-07-13', 'Membeli alat tulis kantor', '1089800');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendapatan`
--

CREATE TABLE `pendapatan` (
  `id_pendapatan` int(11) NOT NULL,
  `id_baganakun` int(11) NOT NULL,
  `nomortransaksi_pendapatan` varchar(10) COLLATE utf8_unicode_ci NOT NULL,
  `tanggal_pendapatan` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `keterangan_pendapatan` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `total_pendapatan` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data untuk tabel `pendapatan`
--

INSERT INTO `pendapatan` (`id_pendapatan`, `id_baganakun`, `nomortransaksi_pendapatan`, `tanggal_pendapatan`, `keterangan_pendapatan`, `total_pendapatan`) VALUES
(32, 9, 'F0001', '2018-07-05', 'Menerima pendapatan jasa service', '500000'),
(33, 9, 'F0002', '2018-07-06', 'Menerima pendapatan jasa service', '1750000'),
(34, 9, 'F0003', '2018-07-10', 'Menerima pendapatan jasa service', '200000'),
(35, 9, 'F0004', '2018-07-11', 'Menerima pendapatan jasa service', '980000'),
(36, 9, 'F0005', '2018-07-17', 'Menerima pendapatan jasa service', '1900000'),
(37, 9, 'F0006', '2018-07-20', 'Menerima pendapatan jasa service', '100000'),
(38, 9, 'F0007', '2018-07-25', 'Menerima pendapatan jasa service', '2750000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `prive`
--

CREATE TABLE `prive` (
  `id_prive` int(100) NOT NULL,
  `id_baganakun` varchar(100) NOT NULL,
  `nomortransaksi_prive` varchar(100) NOT NULL,
  `tanggal_prive` date NOT NULL,
  `keterangan_prive` varchar(100) NOT NULL,
  `total_prive` int(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `prive`
--

INSERT INTO `prive` (`id_prive`, `id_baganakun`, `nomortransaksi_prive`, `tanggal_prive`, `keterangan_prive`, `total_prive`) VALUES
(13, '8', 'K0001', '2018-07-21', 'Mengambil uang untuk kepentingan pribadi', 10000000),
(14, '8', 'K0002', '2018-07-27', 'Mengambil uang untuk kepentingan pribadi', 7000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` varchar(100) NOT NULL,
  `kontak` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`, `kontak`) VALUES
(21, 'asep', 'asep', '1', '085648818534'),
(22, 'renanda', 'renanda', '2', '987456'),
(23, 'candra', 'candra', '3', '085101404001'),
(24, 'dava', 'dava', '2', '082265598874'),
(26, 'tian', 'tian', '2', '082123456789');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bagan_akun`
--
ALTER TABLE `bagan_akun`
  ADD PRIMARY KEY (`id_baganakun`);

--
-- Indeks untuk tabel `hutang`
--
ALTER TABLE `hutang`
  ADD PRIMARY KEY (`id_hutang`);

--
-- Indeks untuk tabel `jurnal_umum`
--
ALTER TABLE `jurnal_umum`
  ADD PRIMARY KEY (`id_jurnalumum`);

--
-- Indeks untuk tabel `kas`
--
ALTER TABLE `kas`
  ADD PRIMARY KEY (`id_kas`);

--
-- Indeks untuk tabel `modal`
--
ALTER TABLE `modal`
  ADD PRIMARY KEY (`id_modal`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indeks untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  ADD PRIMARY KEY (`id_pembelian`);

--
-- Indeks untuk tabel `pendapatan`
--
ALTER TABLE `pendapatan`
  ADD PRIMARY KEY (`id_pendapatan`);

--
-- Indeks untuk tabel `prive`
--
ALTER TABLE `prive`
  ADD PRIMARY KEY (`id_prive`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bagan_akun`
--
ALTER TABLE `bagan_akun`
  MODIFY `id_baganakun` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `hutang`
--
ALTER TABLE `hutang`
  MODIFY `id_hutang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `jurnal_umum`
--
ALTER TABLE `jurnal_umum`
  MODIFY `id_jurnalumum` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=130;

--
-- AUTO_INCREMENT untuk tabel `kas`
--
ALTER TABLE `kas`
  MODIFY `id_kas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT untuk tabel `modal`
--
ALTER TABLE `modal`
  MODIFY `id_modal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=30;

--
-- AUTO_INCREMENT untuk tabel `pembelian`
--
ALTER TABLE `pembelian`
  MODIFY `id_pembelian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT untuk tabel `pendapatan`
--
ALTER TABLE `pendapatan`
  MODIFY `id_pendapatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `prive`
--
ALTER TABLE `prive`
  MODIFY `id_prive` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
