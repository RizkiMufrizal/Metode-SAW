<?php

/**
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Apr 21, 2016
 * Time 10:16:56 PM
 * Encoding UTF-8
 * Project Metode-SAW
 * Package Expression package is undefined on line 14, column 14 in Templates/Scripting/PHPClass.php.
 */
class NilaiCalonSiswaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('NilaiCalonSiswa');
        $this->load->model('CalonSiswa');
    }

    public function index()
    {
        $session = $this->session->userdata('isLogin');

        if ($session == false) {
            redirect('admin/login');
        } else {
            $data['nilai_calon_siswa'] = $this->NilaiCalonSiswa->ambilCalonSiswaDanNilai();
            $this->load->view('admin/NilaiCalonSiswaView', $data);
        }
    }

    public function tambahNilaiCalonSiswa()
    {
        $nisn = $this->input->post('nisn');
        $c1 = $this->input->post('c1');
        $c2 = $this->input->post('c2');
        $c3 = $this->input->post('c3');
        $c4 = $this->input->post('c4');
        $c5 = $this->input->post('c5');

        $val = array(
            'id_nilai' => $this->uuid->v4(),
            'c1' => $c1,
            'c2' => $c2,
            'c3' => $c3,
            'c4' => $c4,
            'c5' => $c5,
            'nisn' => $nisn,
        );

        $this->NilaiCalonSiswa->tambahNilaiCalonSiswa($val);

        $valCalonSiswa = array(
            'status' => true,
        );
        $this->CalonSiswa->ubahCalonSiswa($valCalonSiswa, $nisn);

        redirect('admin/NilaiCalonSiswaController');
    }
}
