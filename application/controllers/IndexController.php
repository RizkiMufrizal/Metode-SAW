<?php

defined('BASEPATH') or exit('No direct script access allowed');

class IndexController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Normalisasi');
    }

    public function index() {
        $data['normalisasi'] = $this->Normalisasi->ambilNormalisasi();
        $this->load->view('IndexView', $data);
    }

}
