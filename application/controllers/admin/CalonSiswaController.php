<?php

/**
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Apr 21, 2016
 * Time 7:20:48 PM
 * Encoding UTF-8
 * Project Metode-Saw
 * Package Expression package is undefined on line 14, column 14 in Templates/Scripting/PHPClass.php.
 */
class CalonSiswaController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('CSVReader');
        $this->load->model('CalonSiswa');
        $this->load->model('NilaiCalonSiswa');
        $this->load->model('Himpunan');
    }

    public function index()
    {
        $session = $this->session->userdata('isLogin');

        if ($session == false) {
            redirect('admin/login');
        } else {
            //$data['error'] = array('error' => '');
            $data['calon_siswa'] = $this->CalonSiswa->ambilCalonSiswa();
            $this->load->view('admin/CalonSiswaView', $data);
        }
    }

    public function tambahCalonSiswa()
    {
        $val = array(
            'nim' => $this->input->post('nim'),
            'nama' => $this->input->post('nama'),
            'jenis_kelamin' => $this->input->post('jenis_kelamin'),
            'tanggal_lahir' => $this->input->post('tanggal_lahir'),
            'alamat' => $this->input->post('alamat'),
        );
        $this->CalonSiswa->tambahCalonSiswa($val);
        redirect('admin/CalonSiswaController');
    }

    public function ambilCalonSiswaDanNilaiBerdasarkanNim($nim)
    {
        $data['calon_siswa_nilai'] = $this->CalonSiswa->ambilCalonSiswaBerdasarkanNim($nim);
        $this->load->view('admin/CalonSiswaTambahNilaView', $data);
    }

    public function hapusCalonSiswa()
    {
        $this->CalonSiswa->hapusCalonSiswa();
        redirect('admin/CalonSiswaController');
    }

    public function uploadCsvCalonSiswa()
    {
        $namaFile = $this->uuid->v4();
        $config['upload_path'] = './uploads/';
        $config['allowed_types'] = 'csv';
        $config['max_size'] = 2000;
        $config['file_name'] = $namaFile;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('csv')) {
            echo $this->upload->display_errors();
        } else {
            $file_data = $this->upload->data();
            $file_path = './uploads/'.$file_data['file_name'];

            $result = $this->csvreader->parse_file($file_path);

            //simpan calon siswa
            foreach ($result as $row) {
                $val = array(
                    'nim' => $row['nim'],
                    'nama' => $row['nama'],
                    'jenis_kelamin' => $row['jenis_kelamin'],
                    'tanggal_lahir' => $row['tanggal_lahir'],
                    'alamat' => $row['alamat'],
                );
                $this->CalonSiswa->tambahCalonSiswa($val);
            }

            //simpan calon siswa
            foreach ($result as $row) {
                $nim = $row['nim'];
                $c1 = $row['nilai_psikotes'];
                $c2 = $row['nilai_psm_test'];
                $c3 = $row['nilai_angket_siswa'];
                $c4 = $row['nilai_un'];
                $c5 = $row['nilai_raport'];

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
                    'nilai_asli_c1' => $row['nilai_psikotes'],
                    'nilai_asli_c2' => $row['nilai_psm_test'],
                    'nilai_asli_c3' => $row['nilai_angket_siswa'],
                    'nilai_asli_c4' => $row['nilai_un'],
                    'nilai_asli_c5' => $row['nilai_raport'],
                    'c1' => $c1,
                    'c2' => $c2,
                    'c3' => $c3,
                    'c4' => $c4,
                    'c5' => $c5,
                    'nim' => $nim,
                );

                $this->NilaiCalonSiswa->tambahNilaiCalonSiswa($val);

                $valCalonSiswa = array(
                    'status' => true,
                );
                $this->CalonSiswa->ubahCalonSiswa($valCalonSiswa, $nim);
            }

            redirect('admin/CalonSiswaController');
        }
    }
}
