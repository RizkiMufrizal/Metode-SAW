<?php

/**
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Apr 21, 2016
 * Time 9:47:30 PM
 * Encoding UTF-8
 * Project Metode-SAW
 * Package Expression package is undefined on line 14, column 14 in Templates/Scripting/PHPClass.php.
 */
class KriteriaController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Kriteria');
    }

    public function index() {
        $session = $this->session->userdata('isLogin');

        if ($session == false) {
            redirect('admin/login');
        } else {
            $data['kriteria'] = $this->Kriteria->ambilKriteria();
            $this->load->view('admin/KriteriaView', $data);
        }
    }

    public function tambahKriteria() {
        $val = array(
            'id_kriteria' => $this->uuid->v4(),
            'kriteria' => $this->input->post('kriteria'),
            'bobot' => $this->input->post('bobot'),
            'keterangan' => $this->input->post('keterangan'),
        );
        $this->Kriteria->tambahKriteria($val);
        redirect('admin/KriteriaController');
    }

    public function editKriteria($idKriteria) {
        $data['kriteria'] = $this->Kriteria->ambilKriteriaBerdasarkanId($idKriteria);
        $this->load->view('admin/KriteriaTambahView', $data);
    }

    public function updateKriteria() {
        $val = array(
            'kriteria' => $this->input->post('kriteria'),
            'bobot' => $this->input->post('bobot'),
            'keterangan' => $this->input->post('keterangan'),
        );
        $this->Kriteria->ubahKriteria($val, $this->input->post('id_kriteria'));
        redirect('admin/KriteriaController');
    }

    public function hapusKriteria($idKriteria) {
        $this->Kriteria->hapusKriteria($idKriteria);
        redirect('admin/KriteriaController');
    }

}
