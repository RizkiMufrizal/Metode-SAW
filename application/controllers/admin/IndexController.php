<?php

/**
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Apr 21, 2016
 * Time 7:08:43 PM
 * Encoding UTF-8
 * Project Metode-Saw
 * Package Expression package is undefined on line 14, column 14 in Templates/Scripting/PHPClass.php.
 */
class IndexController extends CI_Controller
{
    public function index()
    {
        $session = $this->session->userdata('isLogin');

        if ($session == false) {
            redirect('admin/login');
        } else {
            $this->load->view('admin/IndexView');
        }
    }
}
