<?php

/**
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Apr 21, 2016
 * Time 10:15:57 PM
 * Encoding UTF-8
 * Project Metode-SAW
 * Package Expression package is undefined on line 14, column 14 in Templates/Scripting/PHPClass.php.
 */
class NilaiCalonSiswa extends CI_Model
{
    public function ambilCalonSiswaDanNilai()
    {
        return $this->db->get('tb_calon_siswa_nilai')->result();
    }

    public function ambilNilaiCalonSiswaArray()
    {
        return $this->db->get('tb_calon_siswa_nilai')->result_array();
    }

    public function tambahNilaiCalonSiswa($nilaiCalonSiswa)
    {
        $this->db->insert('tb_nilai_calon_siswa', $nilaiCalonSiswa);
    }

    public function ambilNilaiCalonSiswaBerdasakanNisn($nisn)
    {
        $this->db->where('nisn', $nisn);

        return $this->db->count_all_results('tb_calon_siswa_nilai');
    }

    public function ambilJumlahNilaiCalonSiswa()
    {
        return $this->db->count_all_results('tb_nilai_calon_siswa');
    }

    public function ambilNilaiMaxBerdasarkanKriteria($kriteria)
    {
        $this->db->select_max($kriteria);

        return $this->db->get('tb_nilai_calon_siswa')->result_array();
    }
}
