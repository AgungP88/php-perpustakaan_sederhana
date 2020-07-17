-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2020 at 02:20 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `perpus`
--

-- --------------------------------------------------------

--
-- Table structure for table `anggota`
--

CREATE TABLE `anggota` (
  `nis` varchar(10) NOT NULL,
  `nama_anggota` varchar(50) NOT NULL,
  `jk` enum('laki laki','perempuan') NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(13) NOT NULL,
  `id_level` int(2) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `anggota`
--

INSERT INTO `anggota` (`nis`, `nama_anggota`, `jk`, `alamat`, `no_telp`, `id_level`, `status`) VALUES
('AG001', 'agung', 'laki laki', 'Bekasii', '089876543231', 3, 'Aktif'),
('AG002', 'Iqbal', 'laki laki', 'Karawang', '081234567890', 1, 'Aktif'),
('AG003', 'Putri', 'perempuan', 'Kranji', '083214431298', 2, 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `buku`
--

CREATE TABLE `buku` (
  `kode_buku` varchar(10) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `id_kategori` int(5) NOT NULL,
  `stok` int(5) NOT NULL,
  `tahun` int(5) NOT NULL,
  `status` enum('baru','rusak','hilang','lama') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `buku`
--

INSERT INTO `buku` (`kode_buku`, `judul`, `pengarang`, `id_kategori`, `stok`, `tahun`, `status`) VALUES
('BK001', 'Ayam berkokok', 'pak tono', 3, 8, 2001, 'baru'),
('BK002', 'Aku dan Kamu', 'Hati Ini', 1, 37, 2010, 'baru'),
('BK003', 'Indonesiaku', 'hartono', 4, 20, 2020, 'baru');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(10) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`) VALUES
(1, 'Novel'),
(2, 'Cergam'),
(3, 'Komik'),
(4, 'Ensiklopedia'),
(5, 'Antologi'),
(6, 'Dongeng'),
(7, 'Biografi'),
(8, 'Karya Ilmiah');

-- --------------------------------------------------------

--
-- Table structure for table `level`
--

CREATE TABLE `level` (
  `id_level` int(2) NOT NULL,
  `nama_level` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `level`
--

INSERT INTO `level` (`id_level`, `nama_level`) VALUES
(1, 'Dosen'),
(2, 'Mahasiswa'),
(3, 'Staff');

-- --------------------------------------------------------

--
-- Table structure for table `peminjaman`
--

CREATE TABLE `peminjaman` (
  `kode_pinjam` varchar(10) NOT NULL,
  `nis` varchar(10) NOT NULL,
  `kode_buku` varchar(10) NOT NULL,
  `tgl_pinjam` date NOT NULL,
  `jumlah` int(3) NOT NULL,
  `status_pinjam` varchar(30) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `peminjaman`
--

INSERT INTO `peminjaman` (`kode_pinjam`, `nis`, `kode_buku`, `tgl_pinjam`, `jumlah`, `status_pinjam`, `status`) VALUES
('PJM001', 'AG001', 'BK001', '2020-04-20', 1, 'Dikembalikan', 'Diterima'),
('PJM002', 'AG003', 'BK002', '2020-04-21', 1, 'Dikembalikan', 'Diterima'),
('PJM003', 'AG001', 'BK002', '2020-05-04', 1, 'Dikembalikan', 'Diterima'),
('PJM004', 'AG002', 'BK002', '2020-05-04', 3, 'Dikembalikan', 'Diterima'),
('PJM005', 'AG001', 'BK001', '2020-06-04', 3, 'Dikembalikan', 'Diterima'),
('PJM006', 'AG001', 'BK001', '2020-06-09', 2, NULL, 'Diterima'),
('PJM007', 'AG001', 'BK001', '2020-06-04', 2, NULL, 'Diterima'),
('PJM008', 'AG001', 'BK002', '2020-06-10', 3, NULL, 'Ditolak');

-- --------------------------------------------------------

--
-- Table structure for table `pengembalian`
--

CREATE TABLE `pengembalian` (
  `kode_kembali` varchar(11) NOT NULL,
  `kode_pinjam` varchar(11) NOT NULL,
  `nis` varchar(11) NOT NULL,
  `kode_buku` varchar(10) NOT NULL,
  `status_pengembalian` varchar(30) NOT NULL,
  `tgl_pengembalian` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengembalian`
--

INSERT INTO `pengembalian` (`kode_kembali`, `kode_pinjam`, `nis`, `kode_buku`, `status_pengembalian`, `tgl_pengembalian`) VALUES
('PGM001', 'PJM001', 'AG001', 'BK001', 'Dikembalikan', '2020-04-21'),
('PGM002', 'PJM003', 'AG003', 'BK001', 'Dikembalikan', '2020-05-03'),
('PGM003', 'PJM003', 'AG001', 'BK002', 'Dikembalikan', '2020-05-03'),
('PGM004', 'PJM004', 'AG002', 'BK002', 'Dikembalikan', '2020-06-05'),
('PGM005', 'PJM005', 'AG001', 'BK001', 'Dikembalikan', '2020-06-11');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `hak` enum('admin','anggota') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `nama`, `password`, `hak`) VALUES
('admin', 'marjo marjono', 'admin', 'admin'),
('AG001', 'agung', '123', 'anggota');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`nis`);

--
-- Indexes for table `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`kode_buku`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `level`
--
ALTER TABLE `level`
  ADD PRIMARY KEY (`id_level`);

--
-- Indexes for table `peminjaman`
--
ALTER TABLE `peminjaman`
  ADD PRIMARY KEY (`kode_pinjam`);

--
-- Indexes for table `pengembalian`
--
ALTER TABLE `pengembalian`
  ADD PRIMARY KEY (`kode_kembali`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `level`
--
ALTER TABLE `level`
  MODIFY `id_level` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
