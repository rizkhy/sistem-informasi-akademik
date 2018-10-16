-- phpMyAdmin SQL Dump
-- version 4.7.9
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 07 Jul 2018 pada 16.20
-- Versi server: 10.1.31-MariaDB
-- Versi PHP: 7.2.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrator`
--

CREATE TABLE `administrator` (
  `id_admin` int(2) NOT NULL,
  `nama` varchar(40) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `administrator`
--

INSERT INTO `administrator` (`id_admin`, `nama`, `username`, `password`) VALUES
(1717, 'Rizky Kurniawan', 'ryuzaki', '12345');

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `username` int(9) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`username`, `password`, `level`) VALUES
(1717, '99', 4),
(5678, '123', 3),
(82201, '123', 1),
(98110, '0000', 2),
(98117, '123', 2),
(98118, 'sdaf', 2),
(98119, 'adg', 2),
(98120, 'a', 2),
(98121, 'adf', 2),
(98122, '123', 2),
(98123, '123', 2),
(98124, 'zz', 2),
(98125, 'pp', 2),
(98126, '123', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE `guru` (
  `nip` int(9) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `nama`, `alamat`) VALUES
(82201, 'Parjono', 'Kuwon Bantul'),
(82202, 'Sukarmin', 'Bantul'),
(82203, 'Gunaryoso', 'Bantul'),
(82204, 'Dedi Ismoyo', 'Sleman'),
(82205, 'Susi', 'Sleman');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_pelajaran`
--

CREATE TABLE `jadwal_pelajaran` (
  `id_jadwal` int(4) NOT NULL,
  `kode_mp` int(9) NOT NULL,
  `jam` varchar(5) NOT NULL,
  `kode_kelas` varchar(5) NOT NULL,
  `hari` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `jadwal_pelajaran`
--

INSERT INTO `jadwal_pelajaran` (`id_jadwal`, `kode_mp`, `jam`, `kode_kelas`, `hari`) VALUES
(1, 126, '10.00', '2', 'Senin'),
(2, 127, '08.00', '3', 'Selasa'),
(3, 125, '08:00', '3', 'Selasa'),
(4, 125, '07.00', '1', 'Senin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE `kelas` (
  `kode_kelas` int(5) NOT NULL,
  `nama_kelas` varchar(10) NOT NULL,
  `jumlah_siswa` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `nama_kelas`, `jumlah_siswa`) VALUES
(1, 'B.1.1', 16),
(2, 'B.1.2', 15),
(3, 'B.1.3', 12),
(4, 't.6.6', 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE `mata_pelajaran` (
  `kode_mp` int(9) NOT NULL,
  `nama_mp` varchar(25) NOT NULL,
  `KKM` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kode_mp`, `nama_mp`, `KKM`) VALUES
(125, 'Bahasa Inggris', 85),
(126, 'IPA', 75),
(127, 'IPS', 75),
(128, 'Penjaskes', 70),
(129, 'pkn', 90),
(130, 'ipaaa', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mengajar`
--

CREATE TABLE `mengajar` (
  `nip` int(9) NOT NULL,
  `kode_mp` int(9) NOT NULL,
  `kode_kelas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mengajar`
--

INSERT INTO `mengajar` (`nip`, `kode_mp`, `kode_kelas`) VALUES
(82205, 125, 4),
(82201, 125, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE `nilai` (
  `kode_nilai` int(9) NOT NULL,
  `nis` int(9) NOT NULL,
  `kode_mp` int(9) NOT NULL,
  `semester` varchar(15) NOT NULL,
  `tahun_ajaran` varchar(9) NOT NULL,
  `nilai_harian` int(3) NOT NULL,
  `nilai_uts` int(3) NOT NULL,
  `nilai_uas` int(3) NOT NULL,
  `rata` decimal(3,0) NOT NULL,
  `nilai_harian2` int(3) NOT NULL,
  `nilai_uts2` int(3) NOT NULL,
  `nilai_uas2` int(3) NOT NULL,
  `rata2` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`kode_nilai`, `nis`, `kode_mp`, `semester`, `tahun_ajaran`, `nilai_harian`, `nilai_uts`, `nilai_uas`, `rata`, `nilai_harian2`, `nilai_uts2`, `nilai_uas2`, `rata2`) VALUES
(1126, 98112, 125, 'Ganjil', '2019', 48, 48, 47, '2', 48, 47, 47, 2),
(1127, 98113, 125, 'Ganjil', '2019', 47, 65, 47, '2', 47, 65, 48, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE `presensi` (
  `id` int(4) NOT NULL,
  `nis` int(9) NOT NULL,
  `kode_mp` int(9) NOT NULL,
  `tanggal` date NOT NULL,
  `semester` varchar(7) NOT NULL,
  `Keterangan` varchar(10) NOT NULL,
  `thn_ajaran` varchar(9) NOT NULL,
  `kode_kelas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`id`, `nis`, `kode_mp`, `tanggal`, `semester`, `Keterangan`, `thn_ajaran`, `kode_kelas`) VALUES
(3, 98112, 126, '2018-07-02', 'Ganjil', 'izin', '2011-2012', 1),
(4, 98113, 126, '2018-07-02', 'Ganjil', 'izin', '2011-2012', 1),
(5, 98111, 128, '2018-07-03', 'Ganjil', 'sakit', '2010-2011', 1),
(6, 98112, 128, '2018-07-03', 'Ganjil', 'hadir', '2010-2011', 1),
(7, 98113, 128, '2018-07-03', 'Ganjil', 'sakit', '2010-2011', 1),
(8, 98110, 128, '2018-07-03', 'Ganjil', 'hadir', '2009-2010', 2),
(9, 98114, 128, '2018-07-03', 'Ganjil', 'hadir', '2009-2010', 2),
(10, 98115, 128, '2018-07-03', 'Ganjil', 'hadir', '2009-2010', 2),
(11, 98126, 128, '2018-07-03', 'Ganjil', 'hadir', '2009-2010', 2),
(16, 98111, 125, '2018-07-03', 'Ganjil', 'izin', '2011-2012', 1),
(17, 98112, 125, '2018-07-03', 'Ganjil', 'sakit', '2011-2012', 1),
(18, 98113, 125, '2018-07-03', 'Ganjil', 'izin', '2011-2012', 1),
(19, 98111, 129, '2018-07-03', 'Genap', 'alpa', '2011-2012', 1),
(20, 98112, 129, '2018-07-03', 'Genap', 'alpa', '2011-2012', 1),
(21, 98113, 129, '2018-07-03', 'Genap', 'alpa', '2011-2012', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE `siswa` (
  `nis` int(9) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nama_ortu` varchar(25) NOT NULL,
  `pkjr_ortu` varchar(15) NOT NULL,
  `kode_kelas` int(5) NOT NULL,
  `semester` varchar(6) NOT NULL,
  `thn_ajaran` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `alamat`, `nama_ortu`, `pkjr_ortu`, `kode_kelas`, `semester`, `thn_ajaran`) VALUES
(98110, 'Aji Putra', 'Kuwon', 'hasji', 'wirausaha', 2, 'GANJIL', '2019-2020'),
(98111, 'Heru Dwi Prasetyoo', 'Yogyakarta', '123', 'Polisi', 3, 'Ganjil', '2024-2025'),
(98112, 'Idham Rohadi', 'Yogyakarta', 'Alip', 'Wiraswasta', 1, '', '2019'),
(98113, 'Rizky Kurniawan', 'Yogyakarta', 'Rujianto', 'Wiraswasta', 1, '', '2019'),
(98114, 'Wirawan Sujatmiko', 'Yogyakarta', 'Sutijo', 'PNS', 2, '', '2019'),
(98115, 'Ryu', 'asd', '', '', 2, '', '2019'),
(98122, 'adel', 'kalasan', 'padang', 'security', 3, '', '2020'),
(98126, 'Adelia', 'Kalasan', 'padang', 'wiraswasta', 2, 'genap', '2018');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tata_usaha`
--

CREATE TABLE `tata_usaha` (
  `nip` int(9) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tata_usaha`
--

INSERT INTO `tata_usaha` (`nip`, `nama`) VALUES
(9999, 'susi');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`username`);

--
-- Indeks untuk tabel `guru`
--
ALTER TABLE `guru`
  ADD PRIMARY KEY (`nip`);

--
-- Indeks untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `kelas`
--
ALTER TABLE `kelas`
  ADD PRIMARY KEY (`kode_kelas`);

--
-- Indeks untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  ADD PRIMARY KEY (`kode_mp`);

--
-- Indeks untuk tabel `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`kode_nilai`);

--
-- Indeks untuk tabel `presensi`
--
ALTER TABLE `presensi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `siswa`
--
ALTER TABLE `siswa`
  ADD PRIMARY KEY (`nis`);

--
-- Indeks untuk tabel `tata_usaha`
--
ALTER TABLE `tata_usaha`
  ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `username` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98127;

--
-- AUTO_INCREMENT untuk tabel `guru`
--
ALTER TABLE `guru`
  MODIFY `nip` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=82206;

--
-- AUTO_INCREMENT untuk tabel `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
  MODIFY `id_jadwal` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
  MODIFY `kode_mp` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=131;

--
-- AUTO_INCREMENT untuk tabel `nilai`
--
ALTER TABLE `nilai`
  MODIFY `kode_nilai` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1128;

--
-- AUTO_INCREMENT untuk tabel `presensi`
--
ALTER TABLE `presensi`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `siswa`
--
ALTER TABLE `siswa`
  MODIFY `nis` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=98127;

--
-- AUTO_INCREMENT untuk tabel `tata_usaha`
--
ALTER TABLE `tata_usaha`
  MODIFY `nip` int(9) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10000;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
