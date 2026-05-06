-- Database: db_selviyaportof
-- Sesuai ketentuan tugas: tb_sekolah(id, nama) dan tb_input(id, nama, id_level, keterangan, tahun_lulus, foto_sekolah)

CREATE DATABASE IF NOT EXISTS db_selviyaportof CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE db_selviyaportof;

-- Table: tb_admin
CREATE TABLE IF NOT EXISTS tb_admin (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(100) NOT NULL,
    password VARCHAR(255) NOT NULL,
    nama VARCHAR(100),
    role VARCHAR(50) DEFAULT 'admin'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tb_admin (username, password, nama, role) VALUES
('admin', MD5('admin123'), 'Selviya', 'Admin');

-- Table: tb_sekolah (Level - TK, SD, SMP, SMA, dst)
-- Field sesuai tugas: id, nama
CREATE TABLE IF NOT EXISTS tb_sekolah (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tb_sekolah (nama) VALUES
('TK'),
('SD'),
('SMP'),
('SMA'),
('Perguruan Tinggi');

-- Table: tb_input (Studies)
-- Field sesuai tugas: id, nama, id_level (FK), keterangan, tahun_lulus, foto_sekolah
CREATE TABLE IF NOT EXISTS tb_input (
    id INT(11) AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(150) NOT NULL,
    id_level INT(11),
    keterangan TEXT,
    tahun_lulus VARCHAR(20),
    foto_sekolah VARCHAR(255),
    FOREIGN KEY (id_level) REFERENCES tb_sekolah(id) ON DELETE SET NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

INSERT INTO tb_input (nama, id_level, keterangan, tahun_lulus, foto_sekolah) VALUES
('Paud Al-baddar', 1, 'Masa awal pendidikan formal dengan kegiatan bermain sambil belajar. Di sini saya belajar bersosialisasi dan mengenal huruf serta angka.', '2012', '2013'),
('SD Negeri Cipayung 2', 2, 'Pendidikan dasar 6 tahun dengan berbagai kegiatan ekstrakurikuler seperti pramuka dan seni tari.', '2013', '2019'),
('SMP Islam Assalamah', 3, 'Pendidikan menengah pertama, aktif dalam organisasi Pramuka. Merasakan 3 besar dalam 3 tahun.', '2019', '2022'),
('SMA Yapan Indonesia', 4, 'Jurusan IPS, aktif mengikuti ekstrakurikuler Bola volly. Meraih juara 4.', '2022', '2025'),
('Sekolah Tinggi Terpadu Nurul Fikri', 5, 'Program Studi Sistem Informasi, semester II. Aktif dalam kegiatan himpunan mahasiswa sistem informasi.', '2025', '');
