-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jan 26, 2018 at 02:17 PM
-- Server version: 10.1.8-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_barang`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `book_id` int(11) NOT NULL,
  `book_isbn` int(11) NOT NULL,
  `book_title` varchar(50) NOT NULL,
  `book_author` varchar(50) NOT NULL,
  `book_category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`book_id`, `book_isbn`, `book_title`, `book_author`, `book_category`) VALUES
(1, 222, 'asas', 'asaa', 'asas');

-- --------------------------------------------------------

--
-- Table structure for table `detail_barang`
--

CREATE TABLE `detail_barang` (
  `id_barang` varchar(255) NOT NULL,
  `no_inv` varchar(255) NOT NULL,
  `kondisi` varchar(255) NOT NULL,
  `peminjam` int(11) NOT NULL,
  `id_peminjaman` varchar(255) NOT NULL,
  `id_barang_keluar` varchar(255) NOT NULL,
  `id_barang_masuk` varchar(255) NOT NULL,
  `keterangan` varchar(13) NOT NULL,
  `id_ruang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_barang`
--

INSERT INTO `detail_barang` (`id_barang`, `no_inv`, `kondisi`, `peminjam`, `id_peminjaman`, `id_barang_keluar`, `id_barang_masuk`, `keterangan`, `id_ruang`) VALUES
('AA001', 'INV001', 'Ada', 0, '', '', 'AA001', '', 'A1.1'),
('AA001', 'INV002', 'Ada', 0, '', '', 'AA001', '', 'A1.1'),
('AA002', 'INV003', 'Ada', 0, '', '', 'AA002', '', 'A1.1'),
('AA002', 'INV004', 'Ada', 0, '', '', 'AA002', '', 'A1.1');

-- --------------------------------------------------------

--
-- Table structure for table `detail_histori_pinjam`
--

CREATE TABLE `detail_histori_pinjam` (
  `id` int(11) NOT NULL,
  `id_peminjaman` varchar(10) NOT NULL,
  `no_inv` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_histori_pinjam`
--

INSERT INTO `detail_histori_pinjam` (`id`, `id_peminjaman`, `no_inv`) VALUES
(1, 'imykwCV', 'INV001'),
(2, 'imykwCV', 'INV001'),
(3, 'imykwCV', 'INV001'),
(4, 'imykwCV', 'INV001'),
(5, 'imykwCV', 'INV001'),
(6, 'imykwCV', 'INV001'),
(7, 'imykwCV', 'INV001'),
(8, 'imykwCV', 'INV001'),
(9, '5Y3qA4n', 'INV001'),
(10, '5Y3qA4n', 'INV002'),
(11, 'j4hDVOe', 'INV001'),
(12, 'j4hDVOe', 'INV002'),
(13, 'bHbCEIk', 'INV001'),
(14, 'bHbCEIk', 'INV002'),
(15, 'ZmeMS7D', 'INV001'),
(16, 'ZmeMS7D', 'INV002'),
(17, 'HuIQ2dZ', ''),
(18, 'HuIQ2dZ', ''),
(19, '71a9E5m', ''),
(20, '71a9E5m', ''),
(21, 'j9MPGLe', ''),
(22, 'j9MPGLe', ''),
(23, '1WWhcAi', 'INV001'),
(24, '1WWhcAi', 'INV002'),
(25, 'V61w93U', 'INV001'),
(26, 'V61w93U', 'INV002');

-- --------------------------------------------------------

--
-- Table structure for table `detail_pengembalian`
--

CREATE TABLE `detail_pengembalian` (
  `id` int(11) NOT NULL,
  `id_peminjaman` varchar(10) NOT NULL,
  `no_inv` varchar(20) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `detail_pengembalian`
--

INSERT INTO `detail_pengembalian` (`id`, `id_peminjaman`, `no_inv`, `keterangan`) VALUES
(1, 'KHS3kR3', 'INV001', 'Dikembalikan dalam keadaan hilang'),
(2, 'FKZoefM', 'INV001', 'Dikembalikan dalam keadaan hilang'),
(3, '5Y3qA4n', 'INV001', 'Dikembalikan tanpa ada masalah'),
(4, '5Y3qA4n', 'INV002', 'Dikembalikan tanpa ada masalah'),
(5, 'j4hDVOe', 'INV001', 'Dikembalikan tanpa ada masalah'),
(6, 'j4hDVOe', 'INV002', 'Dikembalikan tanpa ada masalah'),
(7, 'bHbCEIk', 'INV001', 'Dikembalikan tanpa ada masalah'),
(8, 'bHbCEIk', 'INV002', 'Dikembalikan tanpa ada masalah'),
(9, 'ZmeMS7D', 'INV001', 'Dikembalikan tanpa ada masalah'),
(10, 'ZmeMS7D', 'INV001', 'Dikembalikan tanpa ada masalah'),
(11, '1WWhcAi', 'INV001', 'Dikembalikan tanpa ada masalah'),
(12, '1WWhcAi', 'INV002', 'Dikembalikan tanpa ada masalah'),
(13, 'V61w93U', 'INV001', 'Dikembalikan tanpa ada masalah'),
(14, 'V61w93U', 'INV002', 'Dikembalikan tanpa ada masalah');

-- --------------------------------------------------------

--
-- Table structure for table `t_admin`
--

CREATE TABLE `t_admin` (
  `id` int(255) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(50) NOT NULL,
  `phone` int(11) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_admin`
--

INSERT INTO `t_admin` (`id`, `username`, `password`, `email`, `fullname`, `phone`, `deskripsi`, `level`) VALUES
(1, 'dapram', 'e10adc3949ba59abbe56e057f20f883e', 'dafapramudya7@gmail.com', 'Dafa Pramudya', 0, 'Pelajar di SMK TELKOM PWT | XII RPL 1', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `t_barang`
--

CREATE TABLE `t_barang` (
  `id` int(11) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `spesifikasi` varchar(255) NOT NULL,
  `merk` varchar(50) NOT NULL,
  `jumlah` float NOT NULL,
  `harga` int(255) NOT NULL,
  `satuan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_barang`
--

INSERT INTO `t_barang` (`id`, `id_barang`, `nama_barang`, `spesifikasi`, `merk`, `jumlah`, `harga`, `satuan`) VALUES
(12, 'AA001', 'Monitor', 'LCD 15 inch', 'Asus', 2, 900000, 'Unit'),
(13, 'AA002', 'Headsheat', '10000bps', 'Dolby advance studio', 2, 7000, 'Unit');

-- --------------------------------------------------------

--
-- Table structure for table `t_barang_keluar`
--

CREATE TABLE `t_barang_keluar` (
  `id` int(11) NOT NULL,
  `id_barang_keluar` varchar(255) NOT NULL,
  `tgl_keluar` date NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `jumlah_keluar` int(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL,
  `satuan` varchar(50) NOT NULL,
  `id_ruang` varchar(255) NOT NULL,
  `id_user` int(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_barang_keluar`
--

INSERT INTO `t_barang_keluar` (`id`, `id_barang_keluar`, `tgl_keluar`, `id_barang`, `jumlah_keluar`, `keterangan`, `satuan`, `id_ruang`, `id_user`) VALUES
(2, 'ppZPi47', '2018-01-22', 'AA001', 0, 'Dipinjam', 'Unit', 'A1.1', 0),
(4, 'QiVKuyn', '2018-01-24', 'AA001', 0, 'Dipinjam', 'Unit', 'A1.1', 0),
(3, 'ZufDNoc', '2018-01-24', 'AA001', 0, 'Dipinjam', 'Unit', 'A1.1', 0);

-- --------------------------------------------------------

--
-- Table structure for table `t_barang_masuk`
--

CREATE TABLE `t_barang_masuk` (
  `id` int(11) NOT NULL,
  `id_barang_masuk` varchar(255) NOT NULL,
  `tgl_masuk` date NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `jumlah_masuk` int(255) NOT NULL,
  `id_ruang` varchar(20) NOT NULL,
  `satuan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_barang_masuk`
--

INSERT INTO `t_barang_masuk` (`id`, `id_barang_masuk`, `tgl_masuk`, `id_barang`, `jumlah_masuk`, `id_ruang`, `satuan`) VALUES
(5, 'AA001', '2018-01-20', 'AA001', 2, 'A1.1', 'Unit'),
(7, 'AA002', '2018-01-20', 'AA002', 2, 'A1.1', 'Unit');

-- --------------------------------------------------------

--
-- Table structure for table `t_histori_pinjam`
--

CREATE TABLE `t_histori_pinjam` (
  `id` int(11) NOT NULL,
  `id_peminjaman` varchar(255) NOT NULL,
  `id_barang_keluar` varchar(255) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `no_inv` varchar(255) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `peminjam` varchar(255) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_histori_pinjam`
--

INSERT INTO `t_histori_pinjam` (`id`, `id_peminjaman`, `id_barang_keluar`, `id_barang`, `no_inv`, `tgl_peminjaman`, `tgl_kembali`, `peminjam`, `kondisi`, `jumlah`, `keterangan`) VALUES
(11, '1WWhcAi', 'ZufDNoc', 'AA001', '', '2018-01-24', '2018-01-24', '1', 'Baik', 2, 'Dipinjam'),
(4, '71a9E5m', '6lfmmqs', 'AA001', '', '2018-01-23', '2018-01-24', '1', 'Baik', 2, 'Dipinjam'),
(6, '9Rvopx6', 'nqJzicc', 'AA001', '', '2018-01-23', '2018-01-24', '1', 'Baik', 2, 'Dipinjam'),
(7, 'aSQtdmh', 'kxu59N9', 'AA001', '', '2018-01-23', '2018-01-24', '1', 'Baik', 2, 'Dipinjam'),
(1, 'bHbCEIk', 'YNQp7sB', 'AA001', '', '2018-01-22', '2018-01-23', '1', 'Baik', 2, 'Dipinjam'),
(9, 'ehW8vBU', '754tNNN', 'AA001', '', '2018-01-23', '2018-01-24', '1', 'Baik', 2, 'Dipinjam'),
(3, 'HuIQ2dZ', 'HJbqfNZ', 'AA001', '', '2018-01-23', '2018-01-24', '1', 'Baik', 2, 'Dipinjam'),
(8, 'j9MPGLe', 'ybgi3ga', 'AA001', '', '2018-01-23', '2018-01-24', '1', 'Baik', 2, 'Dipinjam'),
(12, 'V61w93U', 'QiVKuyn', 'AA001', '', '2018-01-24', '2018-01-24', '1', 'Baik', 2, 'Dipinjam'),
(10, 'XWnzvzp', '3rV5x6Z', 'AA001', '', '2018-01-23', '2018-01-24', '1', 'Baik', 2, 'Dipinjam'),
(5, 'ZESx9zR', 'asDgB7W', 'AA001', '', '2018-01-23', '2018-01-24', '1', 'Baik', 2, 'Dipinjam'),
(2, 'ZmeMS7D', 'ppZPi47', 'AA001', '', '2018-01-22', '2018-01-23', '1', 'Baik', 2, 'Dipinjam');

-- --------------------------------------------------------

--
-- Table structure for table `t_kehilangan`
--

CREATE TABLE `t_kehilangan` (
  `id` int(11) NOT NULL,
  `id_barang_keluar` varchar(255) NOT NULL,
  `tgl_hilang` date NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `alasan_hilang` varchar(255) NOT NULL,
  `penanggung_jawab` varchar(255) NOT NULL,
  `solusi` varchar(255) NOT NULL,
  `jumlah_hilang` int(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_kerusakan`
--

CREATE TABLE `t_kerusakan` (
  `id` int(11) NOT NULL,
  `id_barang_keluar` varchar(255) NOT NULL,
  `tgl_rusak` date NOT NULL,
  `jml_rusak` int(255) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `penanggung_jawab` varchar(255) NOT NULL,
  `tindakan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_peminjaman`
--

CREATE TABLE `t_peminjaman` (
  `id` int(11) NOT NULL,
  `id_peminjaman` varchar(255) NOT NULL,
  `id_barang_keluar` varchar(255) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `no_inv` varchar(255) NOT NULL,
  `tgl_peminjaman` date NOT NULL,
  `tgl_kembali` date NOT NULL,
  `peminjam` varchar(255) NOT NULL,
  `kondisi` varchar(100) NOT NULL,
  `jumlah` int(255) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `t_pengembalian`
--

CREATE TABLE `t_pengembalian` (
  `id_pengembalian` int(11) NOT NULL,
  `tgl_kembali` date NOT NULL,
  `id_peminjaman` varchar(255) NOT NULL,
  `kerusakan` varchar(255) NOT NULL,
  `id_barang` varchar(255) NOT NULL,
  `jumlah_kembali` int(11) NOT NULL,
  `tgl_rusak` date NOT NULL,
  `tgl_hilang` date NOT NULL,
  `penyebab_kerusakan` varchar(255) NOT NULL,
  `penanggung_jawab` varchar(255) NOT NULL,
  `solusi` varchar(255) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_pengembalian`
--

INSERT INTO `t_pengembalian` (`id_pengembalian`, `tgl_kembali`, `id_peminjaman`, `kerusakan`, `id_barang`, `jumlah_kembali`, `tgl_rusak`, `tgl_hilang`, `penyebab_kerusakan`, `penanggung_jawab`, `solusi`, `keterangan`) VALUES
(1, '2018-01-24', '1WWhcAi', '', 'AA001', 2, '0000-00-00', '0000-00-00', '', '2', '', 'Dikembalikan tanpa ada masalah'),
(2, '2018-01-24', 'V61w93U', '', 'AA001', 2, '0000-00-00', '0000-00-00', '', '1', '', 'Dikembalikan tanpa ada masalah');

-- --------------------------------------------------------

--
-- Table structure for table `t_ruang`
--

CREATE TABLE `t_ruang` (
  `id` int(11) NOT NULL,
  `id_ruang` varchar(100) NOT NULL,
  `nama_ruang` varchar(100) NOT NULL,
  `keterangan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_ruang`
--

INSERT INTO `t_ruang` (`id`, `id_ruang`, `nama_ruang`, `keterangan`) VALUES
(1, 'A1.1', 'Lab RPL', 'Lab yang digunakan untuk pelajaran produktif RPL');

-- --------------------------------------------------------

--
-- Table structure for table `t_user`
--

CREATE TABLE `t_user` (
  `id` int(255) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `email` varchar(255) NOT NULL,
  `fullname` varchar(100) NOT NULL,
  `phone` int(11) NOT NULL,
  `deskripsi` longtext NOT NULL,
  `level` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `t_user`
--

INSERT INTO `t_user` (`id`, `username`, `password`, `email`, `fullname`, `phone`, `deskripsi`, `level`) VALUES
(12, 'coba', '24fc62d2f2db871813a8ebdf1e63c5d7', 'coba@gmail.com', 'Coba', 2147483647, 'Pelajar keh bro', 'member');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`book_id`);

--
-- Indexes for table `detail_barang`
--
ALTER TABLE `detail_barang`
  ADD PRIMARY KEY (`no_inv`);

--
-- Indexes for table `detail_histori_pinjam`
--
ALTER TABLE `detail_histori_pinjam`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `detail_pengembalian`
--
ALTER TABLE `detail_pengembalian`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `t_admin`
--
ALTER TABLE `t_admin`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `t_barang`
--
ALTER TABLE `t_barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `t_barang_keluar`
--
ALTER TABLE `t_barang_keluar`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `t_barang_masuk`
--
ALTER TABLE `t_barang_masuk`
  ADD PRIMARY KEY (`id_barang_masuk`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `t_histori_pinjam`
--
ALTER TABLE `t_histori_pinjam`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `t_kehilangan`
--
ALTER TABLE `t_kehilangan`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `t_kerusakan`
--
ALTER TABLE `t_kerusakan`
  ADD PRIMARY KEY (`id_barang_keluar`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  ADD PRIMARY KEY (`id_peminjaman`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `t_pengembalian`
--
ALTER TABLE `t_pengembalian`
  ADD PRIMARY KEY (`id_pengembalian`);

--
-- Indexes for table `t_ruang`
--
ALTER TABLE `t_ruang`
  ADD PRIMARY KEY (`id_ruang`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `t_user`
--
ALTER TABLE `t_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `book_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `detail_histori_pinjam`
--
ALTER TABLE `detail_histori_pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
--
-- AUTO_INCREMENT for table `detail_pengembalian`
--
ALTER TABLE `detail_pengembalian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `t_barang`
--
ALTER TABLE `t_barang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `t_barang_keluar`
--
ALTER TABLE `t_barang_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `t_barang_masuk`
--
ALTER TABLE `t_barang_masuk`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `t_histori_pinjam`
--
ALTER TABLE `t_histori_pinjam`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `t_kehilangan`
--
ALTER TABLE `t_kehilangan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_kerusakan`
--
ALTER TABLE `t_kerusakan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_peminjaman`
--
ALTER TABLE `t_peminjaman`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `t_pengembalian`
--
ALTER TABLE `t_pengembalian`
  MODIFY `id_pengembalian` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `t_ruang`
--
ALTER TABLE `t_ruang`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `t_user`
--
ALTER TABLE `t_user`
  MODIFY `id` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
