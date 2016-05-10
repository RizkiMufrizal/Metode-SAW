<?php

/**
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since May 4, 2016
 * Time 5:15:57 PM
 * Encoding UTF-8
 * Project Metode-SAW
 * Package Expression package is undefined on line 13, column 14 in Templates/Scripting/PHPClass.php.
 */
class User extends CI_Model
{
    public function ambilUserUntukLogin($email)
    {
        $this->db->where('email', $email);
        $this->db->select('password');

        return $this->db->get('tb_user')->result();
    }
}
