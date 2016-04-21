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
    bobot INT(3) NOT NULL
)ENGINE=INNODB;

CREATE TABLE tb_calon_siswa(
    nim VARCHAR(50) NOT NULL PRIMARY KEY,
    nama VARCHAR(50) NOT NULL,
    jenis_kelamin VARCHAR(6) NOT NULL,
    tanggal_lahir DATE NOT NULL,
    alamat TEXT NOT NULL
)ENGINE=INNODB;

CREATE TABLE tb_nilai_calon_siswa(
    id_nilai VARCHAR(150) NOT NULL PRIMARY KEY,
    c1 INT(3) NOT NULL,
    c2 INT(3) NOT NULL,
    c3 INT(3) NOT NULL,
    c4 INT(3) NOT NULL,
    c5 INT(3) NOT NULL,
    nim VARCHAR(50) NOT NULL,
    FOREIGN KEY(nim) REFERENCES tb_calon_siswa(nim)
)ENGINE=INNODB;

CREATE TABLE tb_user(
    email VARCHAR(50) NOT NULL PRIMARY KEY,
    password VARCHAR(15) NOT NULL
)ENGINE=INNODB;