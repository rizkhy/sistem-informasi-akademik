-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 10 Jul 2018 pada 02.52
-- Versi Server: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `siakad`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `administrator`
--

CREATE TABLE IF NOT EXISTS `administrator` (
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

CREATE TABLE IF NOT EXISTS `akun` (
`username` int(9) NOT NULL,
  `password` varchar(25) NOT NULL,
  `level` int(1) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91468 ;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`username`, `password`, `level`) VALUES
(215, '123', 2),
(216, '123', 2),
(219, '123', 2),
(220, '123', 2),
(222, '123', 2),
(223, '123', 2),
(244, '123', 2),
(248, '123', 2),
(256, '123', 2),
(257, '123', 2),
(261, '123', 2),
(272, '123', 2),
(278, '123', 2),
(282, '123', 2),
(294, '123', 2),
(1717, '12345', 4),
(5497, '123', 1),
(18367, '123', 1),
(24577, '123', 3),
(31547, '123', 1),
(36477, '123', 3),
(39527, '123', 1),
(70397, '123', 1),
(91467, '123', 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
`nip` int(5) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=70398 ;

--
-- Dumping data untuk tabel `guru`
--

INSERT INTO `guru` (`nip`, `nama`, `alamat`) VALUES
(18367, 'Purwa Lestari', 'Kaliurang'),
(31547, 'Wasis', 'Kretek'),
(39527, 'Ambar', 'Turi'),
(54972, 'Anggun Suprayekti', 'Gading Daton'),
(70397, 'Hidayat Setiawan', 'Gedangan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal_pelajaran`
--

CREATE TABLE IF NOT EXISTS `jadwal_pelajaran` (
`id_jadwal` int(4) NOT NULL,
  `kode_mp` int(9) NOT NULL,
  `jam` varchar(5) NOT NULL,
  `kode_kelas` varchar(5) NOT NULL,
  `hari` varchar(10) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data untuk tabel `jadwal_pelajaran`
--

INSERT INTO `jadwal_pelajaran` (`id_jadwal`, `kode_mp`, `jam`, `kode_kelas`, `hari`) VALUES
(1, 10125, '07.00', '101', 'Senin'),
(2, 10126, '09.30', '101', 'Selasa'),
(3, 10127, '10.00', '102', 'Selasa'),
(4, 10128, '09.30', '102', 'Selasa'),
(5, 11125, '07.00', '111', 'Senin'),
(6, 11127, '14.00', '112', 'Kamis');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `kode_kelas` int(5) NOT NULL,
  `nama_kelas` varchar(25) NOT NULL,
  `jumlah_siswa` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelas`
--

INSERT INTO `kelas` (`kode_kelas`, `nama_kelas`, `jumlah_siswa`) VALUES
(101, 'X - Akomodasi Perhotelan', 13),
(102, 'X - Busana Butik', 12),
(111, 'XI - Akomodasi Perhotelan', 27),
(112, 'XI - Busana Butik', 17),
(121, 'XII - Akomodasi Perhotela', 13),
(122, 'XII - Busana Butik', 13);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_pelajaran`
--

CREATE TABLE IF NOT EXISTS `mata_pelajaran` (
`kode_mp` int(9) NOT NULL,
  `nama_mp` varchar(25) NOT NULL,
  `KKM` int(2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12131 ;

--
-- Dumping data untuk tabel `mata_pelajaran`
--

INSERT INTO `mata_pelajaran` (`kode_mp`, `nama_mp`, `KKM`) VALUES
(10125, 'Kewirausahaan 1', 75),
(10126, 'IPS Sejarah 1', 75),
(10127, 'Bahasa Indonesia 1', 80),
(10128, 'Produktif Busana Butik 1', 80),
(11125, 'Kewirausahaan 2', 75),
(11126, 'IPS Sejarah 2', 75),
(11127, 'Bahasa Indonesia 2', 80),
(12127, 'Bahasa Indonesia 3', 80),
(12129, 'Matematika 3', 75),
(12130, 'IPA 3', 75);

-- --------------------------------------------------------

--
-- Struktur dari tabel `mengajar`
--

CREATE TABLE IF NOT EXISTS `mengajar` (
  `nip` int(9) NOT NULL,
  `kode_mp` int(9) NOT NULL,
  `kode_kelas` int(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mengajar`
--

INSERT INTO `mengajar` (`nip`, `kode_mp`, `kode_kelas`) VALUES
(18367, 10125, 101),
(31547, 10126, 101),
(39527, 10127, 102),
(54972, 10128, 102),
(70397, 11125, 111),
(54972, 11127, 112),
(39527, 12129, 121),
(70397, 12130, 122);

-- --------------------------------------------------------

--
-- Struktur dari tabel `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
`kode_nilai` int(9) NOT NULL,
  `nis` int(9) NOT NULL,
  `kode_mp` int(9) NOT NULL,
  `semester` varchar(15) NOT NULL,
  `tahun_ajaran` varchar(9) NOT NULL,
  `nilai_harian` int(3) NOT NULL,
  `nilai_uts` int(3) NOT NULL,
  `nilai_uas` int(3) NOT NULL,
  `nilai_harian2` int(3) NOT NULL,
  `nilai_uts2` int(3) NOT NULL,
  `nilai_uas2` int(3) NOT NULL,
  `nilai_akhir` decimal(4,2) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=14 ;

--
-- Dumping data untuk tabel `nilai`
--

INSERT INTO `nilai` (`kode_nilai`, `nis`, `kode_mp`, `semester`, `tahun_ajaran`, `nilai_harian`, `nilai_uts`, `nilai_uas`, `nilai_harian2`, `nilai_uts2`, `nilai_uas2`, `nilai_akhir`) VALUES
(1, 215, 10126, 'Ganjil', '2017-2018', 80, 90, 80, 70, 80, 90, '81.67'),
(2, 219, 10126, 'Ganjil', '2017-2018', 80, 90, 90, 90, 90, 80, '86.67'),
(3, 222, 10126, 'Ganjil', '2017-2018', 80, 70, 60, 60, 70, 70, '68.33'),
(4, 248, 10126, 'Ganjil', '2017-2018', 80, 80, 70, 60, 60, 60, '68.33'),
(5, 278, 10126, 'Ganjil', '2017-2018', 70, 80, 80, 90, 90, 90, '83.33'),
(6, 215, 10125, 'Ganjil', '2017-2018', 70, 70, 70, 70, 80, 90, '75.00'),
(7, 219, 10125, 'Ganjil', '2017-2018', 80, 70, 80, 80, 90, 80, '80.00'),
(8, 222, 10125, 'Ganjil', '2017-2018', 90, 71, 70, 87, 85, 50, '75.50'),
(9, 248, 10125, 'Ganjil', '2017-2018', 98, 85, 75, 85, 64, 50, '76.17'),
(10, 278, 10125, 'Ganjil', '2017-2018', 75, 75, 86, 67, 97, 85, '80.83'),
(11, 216, 10128, 'Ganjil', '2016-2017', 70, 80, 86, 97, 86, 75, '82.33'),
(12, 220, 10128, 'Ganjil', '2016-2017', 78, 89, 87, 76, 87, 98, '85.83'),
(13, 244, 10128, 'Ganjil', '2016-2017', 87, 76, 87, 87, 98, 87, '87.00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `presensi`
--

CREATE TABLE IF NOT EXISTS `presensi` (
`id` int(4) NOT NULL,
  `nis` int(9) NOT NULL,
  `kode_mp` int(9) NOT NULL,
  `tanggal` date NOT NULL,
  `semester` varchar(7) NOT NULL,
  `Keterangan` varchar(10) NOT NULL,
  `thn_ajaran` varchar(9) NOT NULL,
  `kode_kelas` int(5) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=12 ;

--
-- Dumping data untuk tabel `presensi`
--

INSERT INTO `presensi` (`id`, `nis`, `kode_mp`, `tanggal`, `semester`, `Keterangan`, `thn_ajaran`, `kode_kelas`) VALUES
(1, 215, 10125, '2018-07-09', 'Ganjil', 'hadir', '2017-2018', 101),
(2, 219, 10125, '2018-07-09', 'Ganjil', 'sakit', '2017-2018', 101),
(3, 222, 10125, '2018-07-09', 'Ganjil', 'hadir', '2017-2018', 101),
(4, 248, 10125, '2018-07-09', 'Ganjil', 'hadir', '2017-2018', 101),
(5, 278, 10125, '2018-07-09', 'Ganjil', 'hadir', '2017-2018', 101),
(6, 216, 10126, '2018-07-09', 'Ganjil', 'hadir', '2017-2018', 102),
(7, 220, 10126, '2018-07-09', 'Ganjil', 'hadir', '2017-2018', 102),
(8, 244, 10126, '2018-07-09', 'Ganjil', 'hadir', '2017-2018', 102),
(9, 223, 11125, '2018-07-09', 'Ganjil', 'hadir', '2016-2017', 111),
(10, 272, 11125, '2018-07-09', 'Ganjil', 'alpa', '2016-2017', 111),
(11, 282, 11125, '2018-07-09', 'Ganjil', 'alpa', '2016-2017', 111);

-- --------------------------------------------------------

--
-- Struktur dari tabel `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
`nis` int(9) NOT NULL,
  `nama` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nama_ortu` varchar(25) NOT NULL,
  `pkjr_ortu` varchar(15) NOT NULL,
  `kode_kelas` int(5) NOT NULL,
  `semester` varchar(6) NOT NULL,
  `thn_ajaran` varchar(12) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=295 ;

--
-- Dumping data untuk tabel `siswa`
--

INSERT INTO `siswa` (`nis`, `nama`, `alamat`, `nama_ortu`, `pkjr_ortu`, `kode_kelas`, `semester`, `thn_ajaran`) VALUES
(215, 'AHMAD SANTOSO', 'JOMBLANG', 'DJUMILAN', 'Buruh', 101, 'Ganjil', '2017-2018'),
(216, 'ANA NUR RAHMAWATI', 'BODOWALUH', 'SUBARDI', 'Wiraswasta', 102, 'Ganjil', '2016-2017'),
(219, 'BEKTI FEBRIYANTA', 'GADING DATON', 'RAKIJO', 'Buruh', 101, 'Ganjil', '2017-2018'),
(220, 'BELLA SANTIKA', 'KOROWELANG', 'PARDI', 'Buruh', 102, 'Ganjil', '2016-2017'),
(222, 'ENDRI ASTUTI', 'MANDING KIDUL', 'PAIJAN', 'Petani', 101, 'Ganjil', '2017-2018'),
(223, 'ERLIN MEILINA', 'PULUHAN LOR', 'DARWANTO', 'Karyawan Swasta', 111, 'Ganjil', '2016-2017'),
(244, 'ALI MUSTOFA', 'BIRO', 'SUHODO', 'Petani', 102, 'Ganjil', '2016-2017'),
(248, 'AFIF NUR HARIYANI', 'JL. PARANGTRITIS KM. 21', 'HARIYANTO', 'Buruh', 101, 'Ganjil', '2017-2018'),
(256, 'KIKI ANGGELINAN WENEHEN', 'GANJURAN', 'ADRIANUS WENEHEN', 'Tidak bekerja', 112, 'Ganjil', '2016-2017'),
(257, 'MEILA WAHYU NUR PUSPITA', 'SRANDAKAN', 'WASIS SUSATYO', 'Pensiunan', 112, 'Ganjil', '2016-2017'),
(261, 'NIA SEPTIANA', 'MRIYAN', 'PARNO', 'Buruh', 121, 'Ganjil', '2015-2016'),
(272, 'DWI HANDAYANI', 'PELEMADU', 'SUKADI', 'Buruh', 111, 'Ganjil', '2016-2017'),
(278, 'CAHYO SETYA BUDHI', 'DUKUH', 'SUHADI', 'Buruh', 101, 'Ganjil', '2017-2018'),
(282, 'FIKI DWI ARTA', 'NGEMPRANGAN', 'NURSITI DWI NINGSIH', 'Wiraswasta', 111, 'Ganjil', '2016-2017'),
(294, 'PINKIA ADE SAVIRA', 'KIYARAN', 'RADIMAN', 'Buruh', 121, 'Ganjil', '2015-2016');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tata_usaha`
--

CREATE TABLE IF NOT EXISTS `tata_usaha` (
`nip` int(9) NOT NULL,
  `nama` varchar(25) NOT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=91468 ;

--
-- Dumping data untuk tabel `tata_usaha`
--

INSERT INTO `tata_usaha` (`nip`, `nama`) VALUES
(24577, 'SUSI WAHYUNINGSIH'),
(36477, 'HUDA ARDHIANTO'),
(91467, 'FX SRI SUHARTI');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `akun`
--
ALTER TABLE `akun`
 ADD PRIMARY KEY (`username`);

--
-- Indexes for table `guru`
--
ALTER TABLE `guru`
 ADD PRIMARY KEY (`nip`);

--
-- Indexes for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
 ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `kelas`
--
ALTER TABLE `kelas`
 ADD PRIMARY KEY (`kode_kelas`);

--
-- Indexes for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
 ADD PRIMARY KEY (`kode_mp`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
 ADD PRIMARY KEY (`kode_nilai`);

--
-- Indexes for table `presensi`
--
ALTER TABLE `presensi`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `siswa`
--
ALTER TABLE `siswa`
 ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `tata_usaha`
--
ALTER TABLE `tata_usaha`
 ADD PRIMARY KEY (`nip`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `akun`
--
ALTER TABLE `akun`
MODIFY `username` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91468;
--
-- AUTO_INCREMENT for table `guru`
--
ALTER TABLE `guru`
MODIFY `nip` int(5) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=70398;
--
-- AUTO_INCREMENT for table `jadwal_pelajaran`
--
ALTER TABLE `jadwal_pelajaran`
MODIFY `id_jadwal` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `mata_pelajaran`
--
ALTER TABLE `mata_pelajaran`
MODIFY `kode_mp` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12131;
--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
MODIFY `kode_nilai` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `presensi`
--
ALTER TABLE `presensi`
MODIFY `id` int(4) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `siswa`
--
ALTER TABLE `siswa`
MODIFY `nis` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=295;
--
-- AUTO_INCREMENT for table `tata_usaha`
--
ALTER TABLE `tata_usaha`
MODIFY `nip` int(9) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=91468;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
