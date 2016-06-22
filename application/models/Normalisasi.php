<?php

/**
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Apr 22, 2016
 * Time 8:53:50 PM
 * Encoding UTF-8
 * Project Metode-SAW
 * Package Expression package is undefined on line 14, column 14 in Templates/Scripting/PHPClass.php.
 */
class Normalisasi extends CI_Model
{
    public function ambilNormalisasi()
    {
        $this->db->order_by('total_nilai', 'desc');

        return $this->db->get('tb_calon_siswa_normalisasi')->result();
    }

    public function ambilNormalisasiBerdasakanNisn($nisn)
    {
        $this->db->where('nisn', $nisn);

        return $this->db->count_all_results('tb_normalisasi');
    }

    public function tambahNormalisasi($normalisasi)
    {
        $this->db->insert('tb_normalisasi', $normalisasi);
    }
}
