<?php

/**
 *
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Apr 24, 2016
 * Time 8:31:32 PM
 * Encoding UTF-8
 * Project Metode-SAW
 * Package Expression package is undefined on line 13, column 14 in Templates/Scripting/PHPClass.php.
 * 
 */
class Himpunan extends CI_Model {

    public function ambilHimpunan() {
        return $this->db->get('tb_himpunan')->result();
    }

}
