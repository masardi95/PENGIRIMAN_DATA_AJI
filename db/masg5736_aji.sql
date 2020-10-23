-- phpMyAdmin SQL Dump
-- version 4.9.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Waktu pembuatan: 21 Okt 2020 pada 20.57
-- Versi server: 10.2.33-MariaDB-cll-lve
-- Versi PHP: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `masg5736_aji`
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
(1, 'Satlantas Kabupaten Kebumen', 'Jl. HM Sarbini, Mertokondo, Bumirejo, Kec. Kebumen, Kabupaten Kebumen, Jawa Tengah 54317', 'Satlantaskebumen@ymail.com', '2026015.jpg');

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
  `link_external` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user_kantor`, `id_vendor`, `id_user_vendor`, `id_product`, `no_transaksi`, `tgl_kirim`, `tgl_proses`, `tgl_selesai`, `tgl_pelunasan`, `nama_gambar`, `jumlah`, `nama_file`, `harga`, `keterangan`, `bukti_pembayaran`, `status`, `tgl_acc`, `link_external`) VALUES
(1, 16, 1, 1, 1, 'gun21082020021505pm', '2020-08-21 14:15:05', '2020-08-22 18:08:34', '2020-08-22 18:08:54', '2020-08-22 18:08:16', 'gun2042421082020.png', 30, 'gun2042421082020.cdr', 12000, 'Cetak 30 sek', 'tf~mas6285022082020.png', 'Selesai', '2020-08-22 18:08:32', ''),
(2, 16, 2, 2, 2, 'gun21082020025400pm', '2020-08-21 14:54:00', '2020-08-21 14:08:51', '2020-08-22 18:08:13', '2020-08-22 18:08:27', 'gun1282021082020.png', 4, 'gun1282021082020.cdr', 250000, 'Cek Keterangan', 'tf~mas8899422082020.gif', 'Selesai', '2020-08-22 18:08:44', ''),
(3, 15, 2, 2, 10, 'mas22082020090950pm', '2020-08-22 21:09:50', '2020-08-22 21:08:16', '2020-08-22 21:08:00', '2020-08-22 21:08:23', 'mas1057522082020.png', 8, 'mas1057522082020.cdr', 22, 'Cetak 30 sek', 'tf~mas1760822082020.PNG', 'Selesai', '2020-08-22 21:08:35', ''),
(4, 15, 2, 2, 8, 'mas23082020125742pm', '2020-08-23 12:57:42', '2020-08-23 13:08:21', '2020-09-19 17:09:04', '2020-09-19 17:09:44', 'mas2123723082020.png', 3, 'mas2123723082020.cdr', 22, 'banner grade 1 full warna ', 'tf~mas1898919092020.png', 'Menunggu proses cek bukti pembayaran, oleh vendor', NULL, ''),
(13, 15, 1, NULL, 1, 'mas19092020051153pm', '2020-09-19 17:11:53', NULL, NULL, NULL, 'mas1912819092020.png', 5, NULL, 12000, 'Sekarang', NULL, NULL, NULL, 'https://www.youtube.com/watch?v=MKazjpTyAis'),
(14, 17, 3, 3, 12, 'Aji21092020091923pm', '2020-09-21 21:19:23', '2020-09-21 21:09:35', '2020-10-09 05:10:21', '2020-10-09 05:10:34', 'Aji1382621092020.jpg', 1, NULL, 19500, 'Cepat', 'tf~Aji3436709102020.jpg', 'Selesai', '2020-10-09 05:10:24', 'https://www.youtube.com/watch?v=MKazjpTyAis'),
(15, 17, 3, 4, 12, 'Aji19102020080757pm', '2020-10-19 20:07:57', '2020-10-19 20:10:09', NULL, NULL, 'Aji1772519102020.jpg', 1, NULL, 19500, 'langsung pasang di alun alun kbm', NULL, 'Diterima Vendor', NULL, 'https://aji.masardidev.com/transaksi/kirim'),
(16, 15, 3, 4, 12, 'mas19102020093343pm', '2020-10-19 21:33:43', '2020-10-19 21:10:49', '2020-10-19 21:10:10', '2020-10-19 21:10:40', 'mas1567419102020.jpg', 1, 'mas1567419102020.cdr', 19500, 'cepat ', 'tf~mas2770819102020.png', 'Selesai', '2020-10-19 21:10:17', ''),
(17, 15, 3, NULL, 12, 'mas20102020034204am', '2020-10-20 03:42:04', NULL, NULL, NULL, 'mas1391020102020.png', 2, 'mas1391020102020.cdr', 19500, 'kuaitas bagus', NULL, 'Dikirim', NULL, '');

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
(18, 1, 'Bambang Proyatno', 'bambang_p', 'e10adc3949ba59abbe56e057f20f883e', 'pejagoan kebuman', 1, 1),
(19, 1, 'Anjar Septiadi', 'anjar', '1010665f6557f9fff40c82043a150bfd', 'Klirong', 0, 1),
(20, 1, 'Fajar', 'fajar', '24bc50d85ad8fa9cda686145cf1f8aca', 'bumirejo', 0, 1);

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
(1, 1, 'Admin kadal', 'kd', 1, 'e10adc3949ba59abbe56e057f20f883e', 1),
(2, 2, 'admin cempe', 'cempe', 1, '19aa6a9e94603063e8acea4911003850', 1),
(3, 3, 'Karyawan Puspita', 'puspitawar', 1, 'd41d8cd98f00b204e9800998ecf8427e', 1),
(4, 3, 'Karyawan Puspita', 'puspita', 0, 'e10adc3949ba59abbe56e057f20f883e', 1),
(5, 4, 'Yolanda', 'yolanda', 1, '21aee6fc8b73e6db0e9a31699652cb9d', 1),
(6, 5, 'dwitama', 'dwitama', 0, 'cb9dd44cb95c851c3ccdd2bb92addf7c', 1);

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
(1, 'Kadal', 'rosyid813@gmail.com', 'kadal buaya', 1),
(2, 'Cempe', 'gpoex.mas@gmail.com', 'cempe embeekk', 1),
(3, 'puspitawarnaamuda', 'puspita@gmail.com', 'jln. HM sarbini no 134 kebumen', 0),
(4, 'Yolanda', 'yolanda12@gmail.com', 'jl. merto no 5 kebumen', 1),
(5, 'dwitama printing', 'dwitamakbm@gmail.com', 'Jl. mayjend sutoyo, samping smp n 7 kbm', 0);

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
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `user_kantor`
--
ALTER TABLE `user_kantor`
  MODIFY `id_user_kantor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT untuk tabel `user_vendor`
--
ALTER TABLE `user_vendor`
  MODIFY `id_user_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `vendor`
--
ALTER TABLE `vendor`
  MODIFY `id_vendor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
