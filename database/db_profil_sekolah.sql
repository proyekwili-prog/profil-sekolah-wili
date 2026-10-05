-- Struktur database SMPN Satu Atap 1 Mangunreja
CREATE DATABASE IF NOT EXISTS `db_profil_sekolah` CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci;
USE `db_profil_sekolah`;

CREATE TABLE `user` (
  `id_user` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` varchar(100) NOT NULL,
  `role` enum('Admin','Operator') NOT NULL,
  PRIMARY KEY (`id_user`),
  UNIQUE KEY `user_username_unique` (`username`)
) ENGINE=InnoDB;

CREATE TABLE `profil` (
  `id_profil` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_sekolah` varchar(255) NOT NULL,
  `kepala_sekolah` varchar(255) DEFAULT NULL,
  `foto` varchar(100) DEFAULT NULL,
  `logo` varchar(100) DEFAULT NULL,
  `npsn` varchar(10) NOT NULL,
  `alamat` text NOT NULL,
  `kontak` varchar(15) DEFAULT NULL,
  `visi_misi` text,
  `tahun_berdiri` year DEFAULT NULL,
  `deskripsi` text,
  PRIMARY KEY (`id_profil`)
) ENGINE=InnoDB;

CREATE TABLE `guru` (
  `id_guru` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_guru` varchar(40) NOT NULL,
  `nip` varchar(15) DEFAULT NULL,
  `mapel` varchar(40) NOT NULL,
  `foto` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_guru`)
) ENGINE=InnoDB;

CREATE TABLE `siswa` (
  `id_siswa` int unsigned NOT NULL AUTO_INCREMENT,
  `nisn` varchar(10) NOT NULL,
  `nama_siswa` varchar(40) NOT NULL,
  `jenis_kelamin` enum('Laki-laki','Perempuan') NOT NULL,
  `tahun_masuk` year NOT NULL,
  PRIMARY KEY (`id_siswa`),
  UNIQUE KEY `siswa_nisn_unique` (`nisn`)
) ENGINE=InnoDB;

CREATE TABLE `berita` (
  `id_berita` int unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) NOT NULL,
  `isi` text NOT NULL,
  `tanggal` date NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  `id_user` int unsigned NOT NULL,
  PRIMARY KEY (`id_berita`),
  KEY `berita_id_user_index` (`id_user`),
  CONSTRAINT `berita_id_user_foreign` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`) ON UPDATE CASCADE ON DELETE RESTRICT
) ENGINE=InnoDB;

CREATE TABLE `galeri` (
  `id_galeri` int unsigned NOT NULL AUTO_INCREMENT,
  `judul` varchar(50) NOT NULL,
  `keterangan` text,
  `file` varchar(100) NOT NULL,
  `kategori` enum('Foto','Video') NOT NULL,
  `tanggal` date NOT NULL,
  PRIMARY KEY (`id_galeri`)
) ENGINE=InnoDB;

CREATE TABLE `ekstrakurikuler` (
  `id_eskul` int unsigned NOT NULL AUTO_INCREMENT,
  `nama_eskul` varchar(40) NOT NULL,
  `pembina` varchar(40) NOT NULL,
  `jadwal_latihan` varchar(40) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`id_eskul`)
) ENGINE=InnoDB;
