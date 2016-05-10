<?php

/**
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since May 4, 2016
 * Time 5:28:40 PM
 * Encoding UTF-8
 * Project Metode-SAW
 * Package Expression package is undefined on line 13, column 14 in Templates/Scripting/PHPClass.php.
 */
class UserController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('User');
    }

    public function halamanUser()
    {
        $this->load->view('admin/UserView', array('error' => null));
    }

    public function prosesLogin()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->User->ambilUserUntukLogin($email);

        if (sizeof($user) == 0) {
            $error = array('error' => 'anda belum melakukan registrasi');
            $this->load->view('admin/UserView', $error);
        } else {
            if ($this->bcrypt->check_password($password, $user[0]->password)) {
                $this->session->set_userdata(array(
                    'isLogin' => true,
                    'username' => $email,
                ));
                redirect('admin');
            } else {
                $error = array('error' => 'username dan password anda salah');
                $this->load->view('admin/UserView', $error);
            }
        }
    }

    public function prosesLogout()
    {
        $this->session->unset_userdata(array('isLogin', 'username'));
        redirect('admin/login');
    }
}
