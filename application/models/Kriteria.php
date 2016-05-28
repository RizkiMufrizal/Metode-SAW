<?php

/**
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Apr 21, 2016
 * Time 9:46:01 PM
 * Encoding UTF-8
 * Project Metode-SAW
 * Package Expression package is undefined on line 14, column 14 in Templates/Scripting/PHPClass.php.
 */
class Kriteria extends CI_Model
{
    public function tambahKriteria($kriteria)
    {
        $this->db->insert('tb_kriteria', $kriteria);
    }

    public function ambilKriteria()
    {
        $this->db->order_by('kriteria', 'asc');

        return $this->db->get('tb_kriteria')->result();
    }

    public function ambilKriteriaBerdasarkanId($idKriteria)
    {
        $this->db->where('id_kriteria', $idKriteria);

        return $this->db->get('tb_kriteria')->result();
    }

    public function ubahKriteria($kriteria, $idKriteria)
    {
        $this->db->where('id_kriteria', $idKriteria);
        $this->db->update('tb_kriteria', $kriteria);
    }

    public function hapusKriteria($idKriteria)
    {
        $kriteria = array(
            'id_kriteria' => $idKriteria,
        );
        $this->db->delete('tb_kriteria', $kriteria);
    }
}
