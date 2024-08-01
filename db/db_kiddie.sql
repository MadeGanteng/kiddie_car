-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 27, 2024 at 11:35 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_kiddie`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `id_barang` int(11) NOT NULL,
  `kd_barang` varchar(20) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `kondisi` varchar(20) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga` int(100) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `musnah` char(1) DEFAULT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`id_barang`, `kd_barang`, `nm_barang`, `satuan`, `jenis_barang`, `kondisi`, `jumlah_barang`, `harga`, `id_ruang`, `musnah`, `foto`) VALUES
(90, 'INV/000001', 'Kiddie Car 1', '5000', 'Barang Sewa', 'Baik', 1, 23000, 2, '1', '5ADD5F95.jpeg'),
(91, 'INV/000001', 'Kiddie Car 2', '5000', 'Barang Sewa', 'Bagus', 12, 23000, 7, '0', '5ADD5F9B.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `barang_jual`
--

CREATE TABLE `barang_jual` (
  `id_barang` int(11) NOT NULL,
  `kd_barang` varchar(20) NOT NULL,
  `nm_barang` varchar(50) NOT NULL,
  `satuan` varchar(20) NOT NULL,
  `jenis_barang` varchar(100) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `harga` int(100) NOT NULL,
  `foto` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `barang_jual`
--

INSERT INTO `barang_jual` (`id_barang`, `kd_barang`, `nm_barang`, `satuan`, `jenis_barang`, `jumlah_barang`, `harga_beli`, `harga`, `foto`) VALUES
(18, 'BRG/000001', 'Kiddie Car 1', '5000', 'Barang Sewa', 0, 5000, 23000, '5ADD5F95.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `biaya_operasional`
--

CREATE TABLE `biaya_operasional` (
  `id_biaya_operasional` varchar(20) NOT NULL,
  `nama_kegiatan` varchar(20) NOT NULL,
  `tgl_penggunaan` date NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `biaya_operasional`
--

INSERT INTO `biaya_operasional` (`id_biaya_operasional`, `nama_kegiatan`, `tgl_penggunaan`, `foto`) VALUES
('65dd739233d7c', 'Beli Aki', '2024-02-14', '5ADD5F95.jpeg');

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pembayaran`
--

CREATE TABLE `jenis_pembayaran` (
  `id_jenis` int(11) NOT NULL,
  `jenis_pembayaran` varchar(100) NOT NULL,
  `biaya` int(11) NOT NULL,
  `keterangan` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `jenis_pembayaran`
--

INSERT INTO `jenis_pembayaran` (`id_jenis`, `jenis_pembayaran`, `biaya`, `keterangan`) VALUES
(15, 'Sewa Kiddie Car', 5000, 'untuk 10 Menit'),
(16, 'Sewa Kiddie Car', 5000, 'untuk 10 Menit');

-- --------------------------------------------------------

--
-- Table structure for table `kondisi`
--

CREATE TABLE `kondisi` (
  `id_kondisi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `kondisi_awal` varchar(20) NOT NULL,
  `cek_kondisi` varchar(20) NOT NULL,
  `tgl_cek` date NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `kondisi`
--

INSERT INTO `kondisi` (`id_kondisi`, `id_barang`, `kondisi_awal`, `cek_kondisi`, `tgl_cek`, `catatan`) VALUES
(13, 90, 'Bagus', 'Baik', '2024-02-27', 'Bagus');

-- --------------------------------------------------------

--
-- Table structure for table `laba_rugi`
--

CREATE TABLE `laba_rugi` (
  `id_laba_rugi` int(11) NOT NULL,
  `bulan` varchar(100) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `laba` int(1) NOT NULL,
  `rugi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `laba_rugi`
--

INSERT INTO `laba_rugi` (`id_laba_rugi`, `bulan`, `harga_beli`, `laba`, `rugi`) VALUES
(1, '1', 0, 0, 0),
(2, '2', 5000, 23000, 50000),
(3, '3', 0, 0, 0),
(4, '4', 0, 0, 0),
(5, '5', 0, 0, 0),
(6, '6', 0, 0, 0),
(7, '7', 0, 0, 0),
(8, '8', 0, 0, 0),
(9, '9', 0, 0, 0),
(10, '10', 0, 0, 0),
(11, '11', 0, 0, 0),
(12, '12', 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `musnah`
--

CREATE TABLE `musnah` (
  `id_musnah` int(11) NOT NULL,
  `tgl_musnah` date NOT NULL,
  `id_barang` int(11) NOT NULL,
  `ket` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `musnah`
--

INSERT INTO `musnah` (`id_musnah`, `tgl_musnah`, `id_barang`, `ket`) VALUES
(7, '2024-02-27', 90, 'RUSAK');

-- --------------------------------------------------------

--
-- Table structure for table `mutasi`
--

CREATE TABLE `mutasi` (
  `id_mutasi` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `id_ruang_lama` int(11) NOT NULL,
  `id_ruang` int(11) NOT NULL,
  `tgl_mutasi` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `mutasi`
--

INSERT INTO `mutasi` (`id_mutasi`, `id_barang`, `id_ruang_lama`, `id_ruang`, `tgl_mutasi`) VALUES
(8, 90, 7, 2, '2024-02-27');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` varchar(20) NOT NULL,
  `kode_trx` varchar(20) NOT NULL,
  `tgl_trx` date NOT NULL,
  `nama_pelanggan` varchar(100) NOT NULL,
  `no_telepon` varchar(16) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `kode_trx`, `tgl_trx`, `nama_pelanggan`, `no_telepon`) VALUES
('65ade4007a010', 'PAY/000010', '2023-07-26', 'Alfi', '082148501149'),
('65ade4619dfb2', 'PAY/000066', '2023-07-28', 'Fuad', '081257951155'),
('65ade4afd74da', 'PAY/000083', '2023-07-30', 'Madun', '083141025824'),
('65ade50406439', 'PAY/000052', '2023-07-21', 'Isan', '085389575447'),
('65ade53b27dfd', 'PAY/000033', '2023-07-24', 'Ibnu', '082149933696'),
('65ade5968bb54', 'PAY/000012', '2023-07-27', 'Raihan', '087816588692'),
('65ade5bf49acc', 'PAY/000065', '2023-07-29', 'Roza', '089661368095'),
('65ade5ff091ff', 'PAY/000094', '2023-07-22', 'Aldy', '082139322930'),
('65ade62119902', 'PAY/000079', '2023-07-23', 'Wildan', '082357550602'),
('65ade646365a4', 'PAY/000045', '2023-07-25', 'Khalil', '085780935305');

-- --------------------------------------------------------

--
-- Table structure for table `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` varchar(20) NOT NULL,
  `kode_trx` varchar(20) NOT NULL,
  `tgl_trx` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `penjualan`
--

INSERT INTO `penjualan` (`id_penjualan`, `kode_trx`, `tgl_trx`) VALUES
('65dd737d05449', 'SELL/000040', '2024-02-27');

--
-- Triggers `penjualan`
--
DELIMITER $$
CREATE TRIGGER `hapus penjualan` AFTER DELETE ON `penjualan` FOR EACH ROW BEGIN
DELETE FROM sub_penjualan WHERE id_penjualan = old.id_penjualan;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `perawatan`
--

CREATE TABLE `perawatan` (
  `id_perawatan` int(11) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `kondisi_awal` varchar(20) NOT NULL,
  `cek_kondisi` varchar(20) NOT NULL,
  `tgl_cek` date NOT NULL,
  `jenis_perawatan` varchar(100) NOT NULL,
  `catatan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `perawatan`
--

INSERT INTO `perawatan` (`id_perawatan`, `id_barang`, `kondisi_awal`, `cek_kondisi`, `tgl_cek`, `jenis_perawatan`, `catatan`) VALUES
(10, 90, 'Baik', 'Baik', '2024-02-27', 'Pemeriksaan', 'Bagus');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id_ruang` int(11) NOT NULL,
  `nm_ruang` varchar(100) NOT NULL,
  `ket` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id_ruang`, `nm_ruang`, `ket`) VALUES
(2, 'Loby', 'Tempat Display'),
(7, 'Gudang', 'Tempat menyimpan barang');

-- --------------------------------------------------------

--
-- Table structure for table `sub_biaya_operasional`
--

CREATE TABLE `sub_biaya_operasional` (
  `id_sub_biaya_operasional` int(11) NOT NULL,
  `id_biaya_operasional` varchar(20) NOT NULL,
  `jenis_pengeluaran` varchar(100) NOT NULL,
  `jumlah` double NOT NULL,
  `biaya` double NOT NULL,
  `sub_total` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sub_biaya_operasional`
--

INSERT INTO `sub_biaya_operasional` (`id_sub_biaya_operasional`, `id_biaya_operasional`, `jenis_pengeluaran`, `jumlah`, `biaya`, `sub_total`) VALUES
(45, '65dd739233d7c', 'Operasional', 10, 5000, 50000);

-- --------------------------------------------------------

--
-- Table structure for table `sub_pembayaran`
--

CREATE TABLE `sub_pembayaran` (
  `id_sub_pembayaran` int(11) NOT NULL,
  `id_pembayaran` varchar(20) NOT NULL,
  `id_jenis` varchar(100) NOT NULL,
  `biaya` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sub_pembayaran`
--

INSERT INTO `sub_pembayaran` (`id_sub_pembayaran`, `id_pembayaran`, `id_jenis`, `biaya`) VALUES
(13, '6538d3462497b', '14', 20000),
(14, '65ade4007a010', '5', 7500),
(15, '65ade4007a010', '13', 10000),
(16, '65ade4619dfb2', '4', 300000),
(17, '65ade4afd74da', '3', 30000),
(18, '65ade50406439', '2', 30000),
(19, '65ade53b27dfd', '13', 10000),
(20, '65ade53b27dfd', '13', 10000),
(21, '65ade53b27dfd', '12', 4500),
(22, '65ade5968bb54', '4', 300000),
(23, '65ade5bf49acc', '14', 13000),
(24, '65ade5ff091ff', '4', 300000),
(25, '65ade62119902', '5', 7500),
(26, '65ade646365a4', '2', 30000),
(27, '65ade646365a4', '3', 30000);

-- --------------------------------------------------------

--
-- Table structure for table `sub_penjualan`
--

CREATE TABLE `sub_penjualan` (
  `id_sub_penjualan` int(11) NOT NULL,
  `id_penjualan` varchar(20) NOT NULL,
  `id_barang` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `jumlah_jual` int(11) NOT NULL,
  `sub_total` int(11) NOT NULL,
  `harga_beli` int(11) NOT NULL,
  `total_beli` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `sub_penjualan`
--

INSERT INTO `sub_penjualan` (`id_sub_penjualan`, `id_penjualan`, `id_barang`, `jumlah_barang`, `harga_jual`, `jumlah_jual`, `sub_total`, `harga_beli`, `total_beli`) VALUES
(56, '65dd737d05449', 18, 1, 23000, 1, 23000, 5000, 5000);

--
-- Triggers `sub_penjualan`
--
DELIMITER $$
CREATE TRIGGER `edit jual` AFTER UPDATE ON `sub_penjualan` FOR EACH ROW BEGIN
 UPDATE barang_jual
 SET jumlah_barang = jumlah_barang - new.jumlah_jual
 WHERE
 id_barang = new.id_barang;
 
  UPDATE barang_jual
 SET jumlah_barang = jumlah_barang + old.jumlah_jual
 WHERE
 id_barang = old.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `hapus jual` AFTER DELETE ON `sub_penjualan` FOR EACH ROW BEGIN
 UPDATE barang_jual
 SET jumlah_barang = jumlah_barang + old.jumlah_jual
 WHERE
 id_barang = old.id_barang;
END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `tambah jual` AFTER INSERT ON `sub_penjualan` FOR EACH ROW BEGIN
 UPDATE barang_jual
 SET jumlah_barang = jumlah_barang - new.jumlah_jual
 WHERE
 id_barang = new.id_barang;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `nm_user` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `level` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `nm_user`, `username`, `password`, `level`) VALUES
(1, 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3', '1'),
(2, 'Made', 'Made', '202cb962ac59075b964b07152d234b70', '2');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`id_barang`),
  ADD KEY `id_ruang` (`id_ruang`);

--
-- Indexes for table `barang_jual`
--
ALTER TABLE `barang_jual`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indexes for table `biaya_operasional`
--
ALTER TABLE `biaya_operasional`
  ADD PRIMARY KEY (`id_biaya_operasional`);

--
-- Indexes for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  ADD PRIMARY KEY (`id_jenis`);

--
-- Indexes for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD PRIMARY KEY (`id_kondisi`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `laba_rugi`
--
ALTER TABLE `laba_rugi`
  ADD PRIMARY KEY (`id_laba_rugi`);

--
-- Indexes for table `musnah`
--
ALTER TABLE `musnah`
  ADD PRIMARY KEY (`id_musnah`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD PRIMARY KEY (`id_mutasi`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_ruang` (`id_ruang`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`);

--
-- Indexes for table `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indexes for table `perawatan`
--
ALTER TABLE `perawatan`
  ADD PRIMARY KEY (`id_perawatan`),
  ADD KEY `id_barang` (`id_barang`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id_ruang`);

--
-- Indexes for table `sub_biaya_operasional`
--
ALTER TABLE `sub_biaya_operasional`
  ADD PRIMARY KEY (`id_sub_biaya_operasional`);

--
-- Indexes for table `sub_pembayaran`
--
ALTER TABLE `sub_pembayaran`
  ADD PRIMARY KEY (`id_sub_pembayaran`);

--
-- Indexes for table `sub_penjualan`
--
ALTER TABLE `sub_penjualan`
  ADD PRIMARY KEY (`id_sub_penjualan`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=92;

--
-- AUTO_INCREMENT for table `barang_jual`
--
ALTER TABLE `barang_jual`
  MODIFY `id_barang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `jenis_pembayaran`
--
ALTER TABLE `jenis_pembayaran`
  MODIFY `id_jenis` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `kondisi`
--
ALTER TABLE `kondisi`
  MODIFY `id_kondisi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `laba_rugi`
--
ALTER TABLE `laba_rugi`
  MODIFY `id_laba_rugi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `musnah`
--
ALTER TABLE `musnah`
  MODIFY `id_musnah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `mutasi`
--
ALTER TABLE `mutasi`
  MODIFY `id_mutasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `perawatan`
--
ALTER TABLE `perawatan`
  MODIFY `id_perawatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `ruang`
--
ALTER TABLE `ruang`
  MODIFY `id_ruang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `sub_biaya_operasional`
--
ALTER TABLE `sub_biaya_operasional`
  MODIFY `id_sub_biaya_operasional` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;

--
-- AUTO_INCREMENT for table `sub_pembayaran`
--
ALTER TABLE `sub_pembayaran`
  MODIFY `id_sub_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `sub_penjualan`
--
ALTER TABLE `sub_penjualan`
  MODIFY `id_sub_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `barang_ibfk_1` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `kondisi`
--
ALTER TABLE `kondisi`
  ADD CONSTRAINT `kondisi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `musnah`
--
ALTER TABLE `musnah`
  ADD CONSTRAINT `musnah_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `mutasi`
--
ALTER TABLE `mutasi`
  ADD CONSTRAINT `mutasi_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `barang` (`id_barang`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `mutasi_ibfk_2` FOREIGN KEY (`id_ruang`) REFERENCES `ruang` (`id_ruang`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
