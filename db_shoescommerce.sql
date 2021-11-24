-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 24 Nov 2021 pada 09.19
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_shoescommerce`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `blog`
--

CREATE TABLE `blog` (
  `id_blog` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `judul_blog` varchar(100) NOT NULL,
  `isi_blog` text NOT NULL,
  `gambar_blog` varchar(100) NOT NULL,
  `tanggal_dibuat` date NOT NULL,
  `tanggal_diubah` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `blog`
--

INSERT INTO `blog` (`id_blog`, `id_user`, `judul_blog`, `isi_blog`, `gambar_blog`, `tanggal_dibuat`, `tanggal_diubah`) VALUES
(1, 1, 'Juduuullllll', 'asuuu', 'todoroki_hd.png', '2021-11-05', '2021-11-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_produk`
--

CREATE TABLE `detail_produk` (
  `id_detail` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `id_ukuran` int(11) NOT NULL,
  `warna` varchar(20) NOT NULL,
  `stok` int(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_produk`
--

INSERT INTO `detail_produk` (`id_detail`, `id_produk`, `id_ukuran`, `warna`, `stok`) VALUES
(2, 2, 1, 'Hitam', 5),
(3, 2, 2, 'Hijau', 20),
(4, 3, 1, 'Hijau', 20);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_transaksi`
--

CREATE TABLE `detail_transaksi` (
  `id_detail_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(16) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `qty` int(4) NOT NULL,
  `harga_satuan` double NOT NULL,
  `subtotal` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_transaksi`
--

INSERT INTO `detail_transaksi` (`id_detail_transaksi`, `kode_transaksi`, `id_produk`, `qty`, `harga_satuan`, `subtotal`) VALUES
(1, 'TRA619da8764b1ba', 3, 1, 70000, 70000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `foto`
--

CREATE TABLE `foto` (
  `id_foto` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `nama_foto` varchar(50) NOT NULL,
  `foto_produk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `foto`
--

INSERT INTO `foto` (`id_foto`, `id_produk`, `nama_foto`, `foto_produk`) VALUES
(1, 2, 'Foto Baju 1', 'hirum1.jpg'),
(2, 3, 'baju nb', 'Anezaki_Mamori_Hiruma_Yoichi.jpg'),
(3, 2, 'Foto Baju 2', '3628347848_d7548a8d46.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `nama_kategori` varchar(50) NOT NULL,
  `slug_kategori` varchar(50) NOT NULL,
  `tanggal_buat` date NOT NULL,
  `tanggal_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `nama_kategori`, `slug_kategori`, `tanggal_buat`, `tanggal_update`) VALUES
(2, 'Baju Pria', 'baju-pria', '2021-09-30', '2021-11-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_produk` varchar(6) NOT NULL,
  `nama_produk` varchar(50) NOT NULL,
  `slug_produk` varchar(50) NOT NULL,
  `harga_produk` double NOT NULL,
  `deskripsi` text DEFAULT NULL,
  `tanggal_dibuat` date NOT NULL,
  `tanggal_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `id_kategori`, `kode_produk`, `nama_produk`, `slug_produk`, `harga_produk`, `deskripsi`, `tanggal_dibuat`, `tanggal_update`) VALUES
(2, 1, 2, 'PRO002', 'Baju Metal Tanpa Lengan', 'baju-metal-tanpa-lengan', 60000, 'Ini Baju Metal', '2021-10-01', NULL),
(3, 1, 2, 'PRO03', 'Baju New Balance', 'baju-new-balance', 70000, NULL, '2021-11-07', NULL),
(4, 1, 2, 'PRO004', 'Baju Baju', 'baju-baju', 80000, NULL, '2021-11-22', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(16) NOT NULL,
  `id_user` int(11) NOT NULL,
  `total_transaksi` double NOT NULL,
  `status` enum('lunas','belum') NOT NULL,
  `tanggal_transaksi` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `tanggal_bayar` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `kode_transaksi`, `id_user`, `total_transaksi`, `status`, `tanggal_transaksi`, `tanggal_bayar`) VALUES
(1, 'TRA619da8764b1ba', 2, 70000, 'belum', '2021-11-23 20:50:30', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ukuran`
--

CREATE TABLE `ukuran` (
  `id_ukuran` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `nama_ukuran` varchar(50) NOT NULL,
  `tanggal_dibuat` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `ukuran`
--

INSERT INTO `ukuran` (`id_ukuran`, `id_kategori`, `nama_ukuran`, `tanggal_dibuat`) VALUES
(1, 2, 'L', '2021-10-07'),
(2, 2, 'S', '2021-11-03');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telepon` varchar(13) NOT NULL,
  `alamat` text DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `akses` enum('admin','customer') NOT NULL,
  `foto` varchar(50) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `tanggal_update` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `nama`, `email`, `password`, `telepon`, `alamat`, `tanggal_lahir`, `tempat_lahir`, `akses`, `foto`, `tanggal_daftar`, `tanggal_update`) VALUES
(1, 'Administrator', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '087856576', NULL, NULL, NULL, 'admin', 'default.png', '2021-09-28', NULL),
(2, 'User', 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', '082187384', 'Jl. Pegangsaan Timur no.8, Jakarta', '2000-05-01', 'Jakarta', 'customer', 'default.png', '2021-09-28', NULL),
(3, 'Test', 'trial@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '08785654545', 'Jl. Heroik 9 Blok G', '1999-09-29', 'Jakarta', 'admin', 'default.png', '2021-09-29', NULL),
(10, 'Test Foto', 'testergambar@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '0856897374', 'Jl. Kapuk nomer 120', '1999-10-02', 'Jakarta', 'admin', 'hirum.jpg', '2021-10-01', NULL),
(11, 'Tester', 'tester123@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '0878656675', 'Jl adsawdaaw', '1998-10-02', 'Bekasi', 'admin', 'default.png', '2021-10-01', NULL);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `blog`
--
ALTER TABLE `blog`
  ADD PRIMARY KEY (`id_blog`);

--
-- Indeks untuk tabel `detail_produk`
--
ALTER TABLE `detail_produk`
  ADD PRIMARY KEY (`id_detail`);

--
-- Indeks untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  ADD PRIMARY KEY (`id_detail_transaksi`);

--
-- Indeks untuk tabel `foto`
--
ALTER TABLE `foto`
  ADD PRIMARY KEY (`id_foto`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD UNIQUE KEY `kode_transaksi` (`kode_transaksi`);

--
-- Indeks untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  ADD PRIMARY KEY (`id_ukuran`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `blog`
--
ALTER TABLE `blog`
  MODIFY `id_blog` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `detail_produk`
--
ALTER TABLE `detail_produk`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `detail_transaksi`
--
ALTER TABLE `detail_transaksi`
  MODIFY `id_detail_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `foto`
--
ALTER TABLE `foto`
  MODIFY `id_foto` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `ukuran`
--
ALTER TABLE `ukuran`
  MODIFY `id_ukuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
