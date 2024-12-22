CREATE DATABASE IF NOT EXISTS absensi;

USE absensi;

CREATE TABLE IF NOT EXISTS karyawan_absensi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nama VARCHAR(100) NOT NULL,
    tanggal DATE NOT NULL,
    waktu TIME NOT NULL,
    keterangan ENUM('Hadir', 'Sakit', 'Izin') NOT NULL  -- Add Keterangan field with specific options
);

-- Data contoh (opsional)
INSERT INTO karyawan_absensi (nama, tanggal, waktu, keterangan) VALUES 
('John Doe', '2024-12-22', '08:00:00', 'Hadir'),
('Jane Smith', '2024-12-22', '08:15:00', 'Sakit');
