CREATE VIEW `tb_calon_siswa_nilai` AS
    SELECT 
        `tb_calon_siswa`.`nim`,
        `tb_calon_siswa`.`nama`,
        `tb_nilai_calon_siswa`.`c1`,
        `tb_nilai_calon_siswa`.`c2`,
        `tb_nilai_calon_siswa`.`c3`,
        `tb_nilai_calon_siswa`.`c4`,
        `tb_nilai_calon_siswa`.`c5`
    FROM
        `tb_calon_siswa`
            INNER JOIN
        `tb_nilai_calon_siswa` ON `tb_calon_siswa`.`nim` = `tb_nilai_calon_siswa`.`nim`