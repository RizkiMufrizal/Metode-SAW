<?php

/**
 *
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Apr 21, 2016
 * Time 10:16:56 PM
 * Encoding UTF-8
 * Project Metode-SAW
 * Package Expression package is undefined on line 14, column 14 in Templates/Scripting/PHPClass.php.
 * 
 */
class NilaiCalonSiswaController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('NilaiCalonSiswa');
    }

    public function index() {
        $data['nilai_calon_siswa'] = $this->NilaiCalonSiswa->ambilCalonSiswaDanNilai();
        $this->load->view('admin/NilaiCalonSiswaView', $data);
    }

}
