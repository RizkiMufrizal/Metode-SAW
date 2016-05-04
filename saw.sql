/**
 *
 * @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Since Apr 21, 2016
 * @Time 6:50:34 PM
 * @Encoding UTF-8
 * @Project Metode-Saw
 * @Package Expression package is undefined on line 8, column 15 in Templates/Other/SQLTemplate.sql.
 *
 */

CREATE DATABASE metode_saw;
USE metode_saw;

CREATE TABLE tb_kriteria(
    id_kriteria VARCHAR(150) NOT NULL PRIMARY KEY,
    kriteria VARCHAR(10) NOT NULL,
    keterangan VARCHAR(50) NOT NULL,
    bobot FLOAT NOT NULL
)ENGINE=INNODB;

CREATE TABLE tb_calon_siswa(
    nim VARCHAR(50) NOT NULL PRIMARY KEY,
    nama VARCHAR(50) NOT NULL,
    jenis_kelamin VARCHAR(6) NOT NULL,
    tanggal_lahir DATE NOT NULL,
    alamat TEXT NOT NULL,
    status BOOLEAN DEFAULT FALSE
)ENGINE=INNODB;

CREATE TABLE tb_himpunan(
    id_himpunan VARCHAR(150) NOT NULL PRIMARY KEY,
    batas_atas INTEGER NOT NULL,
    batas_bawah INTEGER NOT NULL,
    nilai FLOAT NOT NULL
)ENGINE=INNODB;

insert into tb_himpunan(id_himpunan, batas_atas, batas_bawah, nilai)
    values('1', 0, 20, 0.2);


insert into tb_himpunan(id_himpunan, batas_atas, batas_bawah, nilai)
    values('2', 21, 40, 0.4);


insert into tb_himpunan(id_himpunan, batas_atas, batas_bawah, nilai)
    values('3', 41, 60, 0.6);


insert into tb_himpunan(id_himpunan, batas_atas, batas_bawah, nilai)
    values('4', 61, 80, 0.8);


insert into tb_himpunan(id_himpunan, batas_atas, batas_bawah, nilai)
    values('5', 81, 100, 1);

CREATE TABLE tb_nilai_calon_siswa(
    id_nilai VARCHAR(150) NOT NULL PRIMARY KEY,
    c1 FLOAT NOT NULL,
    c2 FLOAT NOT NULL,
    c3 FLOAT NOT NULL,
    c4 FLOAT NOT NULL,
    c5 FLOAT NOT NULL,
    nilai_asli_c1 FLOAT NOT NULL,
    nilai_asli_c2 FLOAT NOT NULL,
    nilai_asli_c3 FLOAT NOT NULL,
    nilai_asli_c4 FLOAT NOT NULL,
    nilai_asli_c5 FLOAT NOT NULL,
    nim VARCHAR(50) NOT NULL,
    FOREIGN KEY(nim) REFERENCES tb_calon_siswa(nim)
        ON DELETE CASCADE
        ON UPDATE CASCADE
)ENGINE=INNODB;

CREATE TABLE tb_normalisasi(
    id_normalisasi VARCHAR(150) NOT NULL PRIMARY KEY,
    nilai_c1 FLOAT NOT NULL,
    nilai_c2 FLOAT NOT NULL,
    nilai_c3 FLOAT NOT NULL,
    nilai_c4 FLOAT NOT NULL,
    nilai_c5 FLOAT NOT NULL,
    total_nilai FLOAT NOT NULL,
    nim VARCHAR(50) NOT NULL,
    FOREIGN KEY(nim) REFERENCES tb_calon_siswa(nim)
        ON DELETE CASCADE
        ON UPDATE CASCADE
)ENGINE=INNODB;

CREATE TABLE tb_user(
    email VARCHAR(50) NOT NULL PRIMARY KEY,
    password VARCHAR(150) NOT NULL
)ENGINE=INNODB;

INSERT INTO `tb_user` (`email`, `password`) VALUES ('admin@gmail.com', '$2a$06$4zliyvsxzOUndwPSM56GYe8LCTMqO.qFNBA6bm9kjjDuHosz7eLyC');