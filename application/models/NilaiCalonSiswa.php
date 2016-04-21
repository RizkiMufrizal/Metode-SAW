<?php

/**
 *
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Apr 21, 2016
 * Time 10:15:57 PM
 * Encoding UTF-8
 * Project Metode-SAW
 * Package Expression package is undefined on line 14, column 14 in Templates/Scripting/PHPClass.php.
 * 
 */
class NilaiCalonSiswa extends CI_Model {

    public function ambilCalonSiswaDanNilaiBerdasarkanNim($nim) {
        $this->db->where('nim', $nim);
        return $this->db->get('tb_calon_siswa_nilai')->result();
    }

    public function ambilCalonSiswaDanNilai() {
        return $this->db->get('tb_calon_siswa_nilai')->result();
    }

}
