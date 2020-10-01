-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Okt 2020 pada 07.43
-- Versi server: 10.4.13-MariaDB
-- Versi PHP: 7.4.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kirimdata`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `kantor`
--

CREATE TABLE `kantor` (
  `id_kantor` int(11) NOT NULL,
  `nama_kantor` varchar(50) DEFAULT NULL,
  `alamat_kantor` varchar(150) DEFAULT NULL,
  `email_kantor` varchar(30) DEFAULT NULL,
  `logo` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kantor`
--

INSERT INTO `kantor` (`id_kantor`, `nama_kantor`, `alamat_kantor`, `email_kantor`, `logo`) VALUES
(1, 'Satlantas Kabupaten Kebumen', 'Jl. HM Sarbini, Mertokondo, Bumirejo, Kec. Kebumen, Kabupaten Kebumen, Jawa Tengah 54317', 'gpoex.mas@gmail.com', '2026015.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `product`
--

CREATE TABLE `product` (
  `id_product` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `nama_product` varchar(50) DEFAULT NULL,
  `ukuran` varchar(20) DEFAULT NULL,
  `bahan` varchar(20) DEFAULT NULL,
  `deleted` int(11) DEFAULT 0,
  `harga` double DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `product`
--

INSERT INTO `product` (`id_product`, `id_vendor`, `nama_product`, `ukuran`, `bahan`, `deleted`, `harga`) VALUES
(1, 1, 'Kain Batik', '1', 'Poly', 0, 12000),
(2, 1, 'Kulit', '1', 'Kulit', 0, 250000),
(4, 2, 'dsd', '1', 'sds', 1, 22),
(5, 2, 'dsd', '1', 'sds', 1, 22),
(6, 2, 'sdsd', '1', 'sdsd', 1, 333),
(7, 2, 'vxb', '1', 'sdf', 1, 2),
(8, 2, 'Banner', '1', 'banner', 0, 40000),
(9, 2, 'Banner 2', '1', 'grade 2 ', 0, 23000),
(10, 2, 'sticker ', '1', 'chromo kertas', 0, 5000),
(11, 2, 'Sticker', '1', 'Vynil Plastik', 0, 10000),
(12, 3, 'Banner', '1', 'plastik super', 0, 19500);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user_kantor` int(11) NOT NULL COMMENT 'siapa yg ngirim',
  `id_vendor` int(11) NOT NULL,
  `id_user_vendor` int(11) DEFAULT NULL COMMENT 'yang menerimaa pesanan',
  `id_product` int(11) NOT NULL,
  `no_transaksi` varchar(25) DEFAULT NULL,
  `tgl_kirim` datetime DEFAULT current_timestamp(),
  `tgl_proses` datetime DEFAULT NULL,
  `tgl_selesai` datetime DEFAULT NULL,
  `tgl_pelunasan` datetime DEFAULT NULL,
  `nama_gambar` varchar(50) DEFAULT NULL,
  `jumlah` int(11) DEFAULT NULL,
  `nama_file` varchar(50) DEFAULT NULL,
  `harga` double DEFAULT NULL COMMENT 'harga di isi saat transaksi',
  `keterangan` varchar(200) DEFAULT NULL,
  `bukti_pembayaran` varchar(30) DEFAULT NULL,
  `status` varchar(150) DEFAULT NULL,
  `tgl_acc` datetime DEFAULT NULL,
  `link_external` varchar(150) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user_kantor`, `id_vendor`, `id_user_vendor`, `id_product`, `no_transaksi`, `tgl_kirim`, `tgl_proses`, `tgl_selesai`, `tgl_pelunasan`, `nama_gambar`, `jumlah`, `nama_file`, `harga`, `keterangan`, `bukti_pembayaran`, `status`, `tgl_acc`, `link_external`) VALUES
(1, 16, 1, 1, 1, 'gun21082020021505pm', '2020-08-21 14:15:05', '2020-08-22 18:08:34', '2020-08-22 18:08:54', '2020-08-22 18:08:16', 'gun2042421082020.png', 30, 'gun2042421082020.cdr', 12000, 'Cetak 30 sek', 'tf~mas6285022082020.png', 'Selesai', '2020-08-22 18:08:32', NULL),
(2, 16, 2, 2, 2, 'gun21082020025400pm', '2020-08-21 14:54:00', '2020-08-21 14:08:51', '2020-08-22 18:08:13', '2020-08-22 18:08:27', 'gun1282021082020.png', 4, 'gun1282021082020.cdr', 250000, 'Cek Keterangan', 'tf~mas8899422082020.gif', 'Selesai', '2020-08-22 18:08:44', NULL),
(3, 15, 2, 2, 10, 'mas22082020090950pm', '2020-08-22 21:09:50', '2020-08-22 21:08:16', '2020-08-22 21:08:00', '2020-08-22 21:08:23', 'mas1057522082020.png', 8, 'mas1057522082020.cdr', 22, 'Cetak 30 sek', 'tf~mas1760822082020.PNG', 'Selesai', '2020-08-22 21:08:35', NULL),
(4, 15, 2, 2, 8, 'mas23082020125742pm', '2020-08-23 12:57:42', '2020-08-23 13:08:21', NULL, NULL, 'mas2123723082020.png', 3, 'mas2123723082020.cdr', 22, 'banner grade 1 full warna ', NULL, 'Diterima Vendor', NULL, NULL),
(5, 15, 1, 1, 1, 'mas29082020075702pm', '2020-08-29 19:57:02', '2020-08-29 20:08:51', '2020-08-29 20:08:02', '2020-08-29 20:08:33', 'mas2632029082020.png', 22, NULL, 12000, 'dfdf', 'tf~mas6909129082020.png', 'Selesai', '2020-08-29 20:08:54', 'https://dl.ubnt.com/newsletters/0132/bg.jpg'),
(6, 15, 1, NULL, 1, 'mas29082020104002pm', '2020-08-29 22:40:02', NULL, NULL, NULL, 'mas1359229082020.jpeg', 1, NULL, 12000, 'Cetak 30 sek', NULL, NULL, NULL, 'https://img2.pngdownload.id/20180207/hqe/kisspng-warehouse-logistics-building-clip-art-blue-warehouse-5a7aaefcddb381.6433989715179896289081.jpg'),
(7, 15, 1, NULL, 1, 'mas29082020104301pm', '2020-08-29 22:43:01', NULL, NULL, NULL, 'mas1531129082020.jpeg', 7, NULL, 12000, 'Cetak 30 sek', NULL, NULL, NULL, 'https://img2.pngdownload.id/20180207/hqe/kisspng-warehouse-logistics-building-clip-art-blue-warehouse-5a7aaefcddb381.6433989715179896289081.jpg'),
(8, 15, 1, NULL, 1, 'mas29082020104745pm', '2020-08-29 22:47:45', NULL, NULL, NULL, 'mas7165229082020.jpeg', 1, NULL, 12000, 'Cetak 30 sek', NULL, NULL, NULL, 'https://img2.pngdownload.id/20180207/hqe/kisspng-warehouse-logistics-building-clip-art-blue-warehouse-5a7aaefcddb381.6433989715179896289081.jpg'),
(9, 15, 1, NULL, 1, 'mas29082020105043pm', '2020-08-29 22:50:43', NULL, NULL, NULL, 'mas7950329082020.png', 1, NULL, 12000, 'Cetak 30 sek', NULL, NULL, NULL, 'https://dl.ubnt.com/newsletters/0132/bg.jpg'),
(10, 15, 1, NULL, 1, 'mas29082020105203pm', '2020-08-29 22:52:03', NULL, NULL, NULL, 'mas1607729082020.jpeg', 7, 'mas1607729082020.cdr', 12000, 'Cetak 30 sek', NULL, NULL, NULL, ''),
(11, 15, 1, NULL, 1, 'mas29082020105447pm', '2020-08-29 22:54:47', NULL, NULL, NULL, 'mas4838129082020.png', 5, 'mas4838129082020.cdr', 12000, 'rr', NULL, NULL, NULL, ''),
(12, 15, 1, NULL, 1, 'mas29082020105523pm', '2020-08-29 22:55:23', NULL, NULL, NULL, 'mas5032729082020.png', 8, NULL, 12000, 'Cek Keterangan', NULL, NULL, NULL, 'https://dl.ubnt.com/newsletters/0132/bg.jpg'),
(13, 15, 1, NULL, 1, 'mas19092020051726pm', '2020-09-19 17:17:26', NULL, NULL, NULL, 'mas7340319092020.png', 4, NULL, 12000, 'mnmnsa', NULL, NULL, NULL, 'https://www.youtube.com/watch?v=MKazjpTyAis'),
(14, 15, 1, NULL, 1, 'mas19092020051946pm', '2020-09-19 17:19:46', NULL, NULL, NULL, 'mas2083519092020.png', 12, NULL, 12000, 'www', NULL, NULL, NULL, 'https://www.youtube.com/watch?v=MKazjpTyAis'),
(15, 15, 1, 1, 2, 'mas19092020052553pm', '2020-09-19 17:25:53', '2020-09-19 19:09:03', '2020-09-19 19:09:55', '2020-09-19 19:09:20', 'mas1965119092020.png', 1, 'mas1965119092020.cdr', 250000, 'dsds', 'tf~mas9990319092020.png', 'Selesai', '2020-09-19 19:09:49', ''),
(16, 15, 1, 1, 1, 'mas19092020052633pm', '2020-09-19 17:26:33', '2020-09-19 19:09:49', NULL, NULL, 'mas3656419092020.png', 3, 'mas3656419092020.cdr', 12000, 'sdsd', NULL, 'Diterima Vendor', NULL, ''),
(17, 15, 1, 1, 1, 'mas19092020052826pm', '2020-09-19 17:28:26', '2020-09-19 19:09:02', NULL, NULL, 'mas1360219092020.png', 1, 'mas1360219092020.cdr', 12000, 'sd', NULL, 'Diterima Vendor', NULL, ''),
(18, 15, 1, 1, 1, 'mas19092020053016pm', '2020-09-19 17:30:16', '2020-09-19 19:09:56', NULL, NULL, 'mas1519019092020.jpeg', 3, NULL, 12000, 'wew', NULL, 'Diterima Vendor', NULL, 'dfd'),
(19, 15, 1, 1, 2, 'mas19092020053305pm', '2020-09-19 17:33:05', '2020-09-19 19:09:20', NULL, NULL, 'mas1725319092020.png', 3, NULL, 250000, 'csc', NULL, 'Diterima Vendor', NULL, 'mnmnm'),
(20, 15, 1, 1, 1, 'mas19092020053347pm', '2020-09-19 17:33:47', '2020-09-19 17:09:34', NULL, NULL, 'mas8295719092020.png', 4, NULL, 12000, 'ewewe', NULL, 'Diterima Vendor', NULL, 'https://dl.ubnt.com/newsletters/0132/bg.jpg'),
(21, 15, 1, 1, 1, 'mas19092020053525pm', '2020-09-19 17:35:25', '2020-09-19 17:09:41', NULL, NULL, 'mas2375019092020.png', 12, 'mas2375019092020.cdr', 12000, 'sds', NULL, 'Diterima Vendor', NULL, ''),
(22, 15, 1, 1, 1, 'mas19092020072705pm', '2020-09-19 19:27:05', '2020-09-19 19:09:58', '2020-09-19 19:09:55', NULL, 'mas7994319092020.png', 12, NULL, 12000, 'Cetak 30 sek', NULL, 'Tunggu Pembayaran', NULL, 'https://img2.pngdownload.id/20180207/hqe/kisspng-warehouse-logistics-building-clip-art-blue-warehouse-5a7aaefcddb381.6433989715179896289081.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_kantor`
--

CREATE TABLE `user_kantor` (
  `id_user_kantor` int(11) NOT NULL,
  `id_kantor` int(11) DEFAULT NULL,
  `nama_user_kantor` varchar(60) DEFAULT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(70) DEFAULT NULL,
  `alamat` varchar(100) DEFAULT NULL,
  `deleted` int(11) DEFAULT 0,
  `level_kantor` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_kantor`
--

INSERT INTO `user_kantor` (`id_user_kantor`, `id_kantor`, `nama_user_kantor`, `username`, `password`, `alamat`, `deleted`, `level_kantor`) VALUES
(15, 1, 'Muhammad Ardi Setiawan', 'mas', 'f022b8970604d7f4472189cb21df2c20', 'Salakan', 0, 2),
(16, 1, 'Gunawan Rosadi', 'gun', '5161ebb0cce4b7987ba8b6935d60a180', 'Kotagede', 0, 1),
(17, 1, 'Aji Pangestu', 'Aji', '8d045450ae16dc81213a75b725ee2760', 'kalikudu kebumen', 0, 2),
(18, 1, 'rissa', 'ris', '8d045450ae16dc81213a75b725ee2760', 'Kasongan', 0, 2),
(25, 1, 'e', 'e', 'e1671797c52e15f763380b45e841ec32', 'e', 0, 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user_vendor`
--

CREATE TABLE `user_vendor` (
  `id_user_vendor` int(11) NOT NULL,
  `id_vendor` int(11) NOT NULL,
  `nama_user_vendor` varchar(30) DEFAULT NULL,
  `username` varchar(10) DEFAULT NULL,
  `deleted` int(11) DEFAULT 0,
  `password` varchar(60) DEFAULT NULL,
  `level_vendor` int(11) NOT NULL DEFAULT 1
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user_vendor`
--

INSERT INTO `user_vendor` (`id_user_vendor`, `id_vendor`, `nama_user_vendor`, `username`, `deleted`, `password`, `level_vendor`) VALUES
(1, 1, 'Admin kadal', 'kd', 0, '87221652a79fc3c9b04cde0b335fdd5b', 1),
(2, 2, 'admin cempe', 'cempe', 1, '19aa6a9e94603063e8acea4911003850', 1),
(3, 3, 'Karyawan Puspita', 'puspitawar', 0, '7e3b7a5bafcb0fa8e8dfe3ea6aca9186', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `vendor`
--

CREATE TABLE `vendor` (
  `id_vendor` int(11) NOT NULL,
  `nama_vendor` varchar(50) DEFAULT NULL,
  `email_vendor` varchar(50) DEFAULT NULL,
  `alamat_vendor` varchar(100) DEFAULT NULL,
  `deleted` int(11) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `vendor`
--

INSERT INTO `vendor` (`id_vendor`, `nama_vendor`, `email_vendor`, `alamat_vendor`, `deleted`) VALUES
(1, 'Kadal', 'gpoex.mas@gmail.com', 'kadal buaya', 0),
(2, 'Cempe', 'cempe@gmail.com', 'cempe embeekk', 1),
(3, 'puspitawarnaa', 'puspita@gmail.com', 'jln. HM sarbini no 134 kebumen', 0);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `kantor`
--
ALTER TABLE `kantor`
  ADD PRIMARY KEY (`id_kantor`);

--
-- Indeks untuk tabel `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`id_product`),
  ADD KEY `fk_product_vendor` (`id_vendor`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `fk_traksaksi_product` (`id_product`),
  ADD KEY `fk_traksaksi_user_kantor` (`id_user_kantor`),
  ADD KEY `fk_traksaksi_user_vendor` (`id_user_vendor`);

--
-- Indeks untuk tabel `user_kantor`
--
ALTER TABLE `user_kantor`
  ADD PRIMARY KEY (`id_user_kantor`),
  ADD KEY `fk_user_kantor_kantor` (`id_kantor`);

--
-- Indeks untuk tabel `user_vendor`
--
ALTER TABLE `user_vendor`
  ADD PRIMARY KEY (`id_user_vendor`),
  ADD KEY `fk_user_vendor_vendor` (`id_vendor`);

--
-- Indeks untuk tabel `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`id_vendor`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `kantor`
--
ALTER TABLE `kantor`
  MODIFY `id_kantor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `product`
--
ALTER TABLE `product`
  MODIFY `id_product` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT untuk tabel `user_kantor`
--
ALTER TABLE `user_kantor`
  MODIFY `id_user_kantor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `user_vendor`
--
ALTER TABLE `user_vendor`
  MODIFY `id_user_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `product`
--
ALTER TABLE `product`
  ADD CONSTRAINT `fk_product_vendor` FOREIGN KEY (`id_vendor`) REFERENCES `vendor` (`id_vendor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD CONSTRAINT `fk_traksaksi_product` FOREIGN KEY (`id_product`) REFERENCES `product` (`id_product`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_traksaksi_user_vendor` FOREIGN KEY (`id_user_vendor`) REFERENCES `user_vendor` (`id_user_vendor`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_transaksi_user_kantor` FOREIGN KEY (`id_user_kantor`) REFERENCES `user_kantor` (`id_user_kantor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `user_kantor`
--
ALTER TABLE `user_kantor`
  ADD CONSTRAINT `fk_user_kantor_kantor` FOREIGN KEY (`id_kantor`) REFERENCES `kantor` (`id_kantor`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Ketidakleluasaan untuk tabel `user_vendor`
--
ALTER TABLE `user_vendor`
  ADD CONSTRAINT `fk_user_vendor_vendor` FOREIGN KEY (`id_vendor`) REFERENCES `vendor` (`id_vendor`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
