<?php

/**
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Apr 21, 2016
 * Time 7:04:19 PM
 * Encoding UTF-8
 * Project Metode-Saw
 * Package Expression package is undefined on line 14, column 14 in Templates/Scripting/PHPClass.php.
 */
class CalonSiswa extends CI_Model
{
    public function tambahCalonSiswa($calonSiswa)
    {
        $this->db->insert('tb_calon_siswa', $calonSiswa);
    }

    public function ambilCalonSiswa()
    {
        return $this->db->get('tb_calon_siswa')->result();
    }

    public function ambilCalonSiswaBerdasarkanNisn($nisn)
    {
        $this->db->where('nisn', $nisn);

        return $this->db->get('tb_calon_siswa')->result();
    }

    public function ubahCalonSiswa($calonSiswa, $nisn)
    {
        $this->db->where('nisn', $nisn);
        $this->db->update('tb_calon_siswa', $calonSiswa);
    }

    public function hapusCalonSiswa()
    {
        $this->db->empty_table('tb_calon_siswa');
    }
}
