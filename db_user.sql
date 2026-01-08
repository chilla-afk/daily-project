-- Membuat database db_user
CREATE DATABASE IF NOT EXISTS db_user;

-- Menggunakan database db_user
USE db_user;

-- Membuat tabel users
CREATE TABLE IF NOT EXISTS users (
    id INT PRIMARY KEY AUTO_INCREMENT,
    username VARCHAR(50) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    nama_lengkap VARCHAR(100),
    email VARCHAR(100),
    foto TEXT
);

-- Menambahkan 6 data user awal
INSERT INTO users (username, password, nama_lengkap, email, foto) VALUES
('admin', MD5('admin'), 'Administrator', 'admin@example.com', ''),
('danny', MD5('admin'), 'Danny Pratama', 'danny@example.com', ''),
('user1', MD5('password1'), 'User Satu', 'user1@example.com', ''),
('user2', MD5('password2'), 'User Dua', 'user2@example.com', ''),
('user3', MD5('password3'), 'User Tiga', 'user3@example.com', ''),
('user4', MD5('password4'), 'User Empat', 'user4@example.com', '');
