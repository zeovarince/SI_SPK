CREATE DATABASE spk_garam_smart;
USE spk_garam_smart;
CREATE TABLE tb_admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50),
    password VARCHAR(255)
);

INSERT INTO tb_admin (username, password) VALUES ('admin', 'admin');

CREATE TABLE tb_kriteria (
    kode VARCHAR(5) PRIMARY KEY,
    nama VARCHAR(100),
    sifat ENUM('Cost', 'Benefit'),
    bobot FLOAT
);

INSERT INTO tb_kriteria VALUES 
('C1', 'Biaya Tetap', 'Cost', 0.2),
('C2', 'Biaya Variabel', 'Cost', 0.2),
('C3', 'Jumlah Produksi', 'Benefit', 0.3),
('C4', 'Harga Jual', 'Benefit', 0.2),
('C5', 'Luas Lahan', 'Benefit', 0.1);


CREATE TABLE tb_petani (
    id_petani INT AUTO_INCREMENT PRIMARY KEY,
    nama_petani VARCHAR(100) NOT NULL,
    alamat TEXT
);

CREATE TABLE alternatif (
    id_alternatif INT AUTO_INCREMENT PRIMARY KEY,
    id_petani INT NOT NULL,
    c1 DOUBLE, -- Biaya Tetap
    c2 DOUBLE, -- Biaya Variabel
    c3 DOUBLE, -- Produksi
    c4 DOUBLE, -- Harga Jual
    c5 DOUBLE, -- Luas Lahan
    -- Membuat Relasi (Constraint)
    CONSTRAINT fk_petani FOREIGN KEY (id_petani) 
    REFERENCES tb_petani(id_petani) 
    ON DELETE CASCADE ON UPDATE CASCADE
);

INSERT INTO tb_petani (nama_petani) VALUES 
('Petani A (dari jurnal)'),
('Petani B'),
('Petani C'),
('Petani D'),
('Petani E'),
('Petani F'),
('Petani G'),
('Petani H'),
('Petani I'),
('Petani J'),
('Petani K'),
('Petani L'),
('Petani M'),
('Petani N'),
('Petani O'),
('Petani P'),
('Petani Q'),
('Petani R'),
('Petani S'),
('Petani T');

INSERT INTO alternatif (id_petani, c1, c2, c3, c4, c5) VALUES 
(1, 24509440, 14544200, 102.24, 1692000, 1),
(2, 22000000, 13000000, 98, 1650000, 1),
(3, 20500000, 12500000, 105, 1700000, 1.5),
(4, 28000000, 16000000, 100, 1600000, 1),
(5, 35000000, 18000000, 150, 1750000, 2),
(6, 24000000, 14000000, 101, 1680000, 1),
(7, 19000000, 11500000, 95, 1600000, 0.8),
(8, 26000000, 15500000, 103, 1690000, 1.2),
(9, 23500000, 14200000, 100, 1670000, 1),
(10, 30000000, 17000000, 120, 1720000, 1.5),
(11, 21000000, 13500000, 99, 1660000, 1),
(12, 25000000, 15000000, 102, 1690000, 1),
(13, 27500000, 16500000, 104, 1710000, 1.3),
(14, 22500000, 13800000, 97, 1640000, 1),
(15, 18500000, 11000000, 90, 1580000, 0.7),
(16, 32000000, 17500000, 130, 1730000, 1.8),
(17, 24200000, 14400000, 101.5, 1685000, 1),
(18, 29000000, 16800000, 110, 1700000, 1.4),
(19, 20000000, 12800000, 96, 1630000, 0.9),
(20, 25500000, 15200000, 102.5, 1695000, 1.1);