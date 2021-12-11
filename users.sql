-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 10 Des 2021 pada 20.37
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
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `login_oauth_uid` varchar(100) DEFAULT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(255) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `tempat_lahir` varchar(50) DEFAULT NULL,
  `akses` enum('admin','customer') NOT NULL,
  `foto` varchar(50) NOT NULL,
  `tanggal_daftar` date NOT NULL,
  `tanggal_update` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `login_oauth_uid`, `nama`, `email`, `password`, `telepon`, `alamat`, `tanggal_lahir`, `tempat_lahir`, `akses`, `foto`, `tanggal_daftar`, `tanggal_update`) VALUES
(1, NULL, 'Administrator', 'admin@admin.com', '21232f297a57a5a743894a0e4a801fc3', '087856576', NULL, NULL, NULL, 'admin', 'default.png', '2021-09-28', NULL),
(2, NULL, 'User', 'user@user.com', 'ee11cbb19052e40b07aac0ca060c23ee', '082187384', 'Jl. Pegangsaan Timur no.8, Jakarta', '2000-05-01', 'Jakarta', 'customer', 'default.png', '2021-09-28', NULL),
(3, NULL, 'Test', 'trial@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '08785654545', 'Jl. Heroik 9 Blok G', '1999-09-29', 'Jakarta', 'admin', 'default.png', '2021-09-29', NULL),
(10, NULL, 'Test Foto', 'testergambar@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '0856897374', 'Jl. Kapuk nomer 120', '1999-10-02', 'Jakarta', 'admin', 'hirum.jpg', '2021-10-01', NULL),
(11, NULL, 'Tester', 'tester123@admin.com', 'e10adc3949ba59abbe56e057f20f883e', '0878656675', 'Jl adsawdaaw', '1998-10-02', 'Bekasi', 'admin', 'default.png', '2021-10-01', NULL),
(13, NULL, 'Testing', 'user@tester.net', 'f5d1278e8109edd94e1e4197e04873b9', '0856754534', 'Jl. Jl Jl', '2021-12-02', 'Jakarta', 'customer', 'default.png', '2021-12-01', NULL);

--
-- Indexes for dumped tables
--

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
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
