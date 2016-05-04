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
        $this->load->model('CalonSiswa');
        $this->load->model('Himpunan');
    }

    public function index() {
        $session = $this->session->userdata('isLogin');

        if ($session == FALSE) {
            redirect('admin/login');
        } else {
            $data['nilai_calon_siswa'] = $this->NilaiCalonSiswa->ambilCalonSiswaDanNilai();
            $this->load->view('admin/NilaiCalonSiswaView', $data);
        }
    }

    public function tambahNilaiCalonSiswa() {

        $nim = $this->input->post('nim');
        $c1 = $this->input->post('c1');
        $c2 = $this->input->post('c2');
        $c3 = $this->input->post('c3');
        $c4 = $this->input->post('c4');
        $c5 = $this->input->post('c5');

        foreach ($this->Himpunan->ambilHimpunan() as $h) {
            if ($c1 >= $h->batas_atas and $c1 <= $h->batas_bawah) {
                $c1 = $h->nilai;
            }

            if ($c2 >= $h->batas_atas and $c2 <= $h->batas_bawah) {
                $c2 = $h->nilai;
            }

            if ($c3 >= $h->batas_atas and $c3 <= $h->batas_bawah) {
                $c3 = $h->nilai;
            }

            if ($c4 >= $h->batas_atas and $c4 <= $h->batas_bawah) {
                $c4 = $h->nilai;
            }

            if ($c5 >= $h->batas_atas and $c5 <= $h->batas_bawah) {
                $c5 = $h->nilai;
            }
        }

        $val = array(
            'id_nilai' => $this->uuid->v4(),
            'nilai_asli_c1' => $this->input->post('c1'),
            'nilai_asli_c2' => $this->input->post('c2'),
            'nilai_asli_c3' => $this->input->post('c3'),
            'nilai_asli_c4' => $this->input->post('c4'),
            'nilai_asli_c5' => $this->input->post('c5'),
            'c1' => $c1,
            'c2' => $c2,
            'c3' => $c3,
            'c4' => $c4,
            'c5' => $c5,
            'nim' => $nim
        );

        $this->NilaiCalonSiswa->tambahNilaiCalonSiswa($val);

        $valCalonSiswa = array(
            'status' => TRUE
        );
        $this->CalonSiswa->ubahCalonSiswa($valCalonSiswa, $nim);

        redirect('admin/NilaiCalonSiswaController');
    }

}
