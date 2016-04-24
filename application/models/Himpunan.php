<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of Himpunan1
 *
 * @author rizki
 */
class Himpunan extends CI_Model {

    public function ambilHimpunan() {
        return $this->db->get('tb_himpunan')->result();
    }

}
