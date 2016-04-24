/**
 *
 * @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * @Since Apr 22, 2016
 * @Time 8:57:04 PM
 * @Encoding UTF-8
 * @Project Metode-SAW
 * @Package Expression package is undefined on line 8, column 15 in Templates/Other/SQLTemplate.sql.
 *
 */

CREATE VIEW `tb_calon_siswa_normalisasi` AS
SELECT
  `tb_calon_siswa`.`nim`,
  `tb_calon_siswa`.`nama`,
  `tb_normalisasi`.`total_nilai`,
  `tb_normalisasi`.`nilai_c5`,
  `tb_normalisasi`.`nilai_c4`,
  `tb_normalisasi`.`nilai_c3`,
  `tb_normalisasi`.`nilai_c2`,
  `tb_normalisasi`.`nilai_c1`
FROM
  `tb_calon_siswa`
INNER JOIN
  `tb_normalisasi` ON `tb_calon_siswa`.`nim` = `tb_normalisasi`.`nim`