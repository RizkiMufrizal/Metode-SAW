<?php

/**
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Apr 22, 2016
 * Time 9:04:03 PM
 * Encoding UTF-8
 * Project Metode-SAW
 * Package Expression package is undefined on line 14, column 14 in Templates/Scripting/PHPClass.php.
 */
class NormalisasiController extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Normalisasi');
        $this->load->model('NilaiCalonSiswa');
        $this->load->model('Kriteria');
    }

    public function index()
    {
        $session = $this->session->userdata('isLogin');

        if ($session == false) {
            redirect('admin/login');
        } else {
            $data['normalisasi'] = $this->Normalisasi->ambilNormalisasi();
            $this->load->view('admin/NormalisasiView', $data);
        }
    }

    public function prosesNormalisasi()
    {

        //jumlah calon siswa
        $jumlahCalonSiswaDenganNilai = $this->NilaiCalonSiswa->ambilJumlahNilaiCalonSiswa();

        //data kriteria
        $kriteria = $this->Kriteria->ambilKriteria();

        $nilaiCalonSiswa = $this->NilaiCalonSiswa->ambilNilaiCalonSiswaArray();

        //hasil max setiap kriteria dalam bentuk array
        $hasilMaxDariSetiapKriteria = array();

        //hasil pembagian antara nilai kriteria dan nilai max kriteria
        $nilaiHasilBagiAntaraNilaiKriteriaDanNilaiMaxKriteria = array();

        if ($jumlahCalonSiswaDenganNilai > 0) {

            //mencari nilai max dari setiap kriteria
            foreach ($kriteria as $k) {
                $hasilMaxKriteria = $this->NilaiCalonSiswa->ambilNilaiMaxBerdasarkanKriteria($k->kriteria);

                array_push($hasilMaxDariSetiapKriteria, array(
                    'kriteria' => $k->kriteria,
                    'hasil' => $hasilMaxKriteria[0][$k->kriteria],
                ));
            }

            //mencari nilai normalisasi karena faktor kriteria benefit berdasarkan nilai maksimal
            foreach ($nilaiCalonSiswa as $n) {
                $c = array();
                foreach ($hasilMaxDariSetiapKriteria as $hmdsk) {
                    array_push($c, array(
                        'kriteria' => $hmdsk['kriteria'],
                        'hasil' => $n[$hmdsk['kriteria']] / $hmdsk['hasil'],
                    ));
                }
                array_push($nilaiHasilBagiAntaraNilaiKriteriaDanNilaiMaxKriteria, array(
                    'nisn' => $n['nisn'],
                    'nama' => $n['nama'],
                    'hasil_akhir' => $c,
                ));
            }

            foreach ($nilaiHasilBagiAntaraNilaiKriteriaDanNilaiMaxKriteria as $n) {
                if ($this->Normalisasi->ambilNormalisasiBerdasakanNisn($n['nisn']) == 0) {
                    $val = array(
                        'id_normalisasi' => $this->uuid->v4(),
                        'nilai_c1' => ($n['hasil_akhir'][0]['hasil'] * $kriteria[0]->bobot),
                        'nilai_c2' => ($n['hasil_akhir'][1]['hasil'] * $kriteria[1]->bobot),
                        'nilai_c3' => ($n['hasil_akhir'][2]['hasil'] * $kriteria[2]->bobot),
                        'nilai_c4' => ($n['hasil_akhir'][3]['hasil'] * $kriteria[3]->bobot),
                        'nilai_c5' => ($n['hasil_akhir'][4]['hasil'] * $kriteria[4]->bobot),
                        'total_nilai' => ($n['hasil_akhir'][0]['hasil'] * $kriteria[0]->bobot) +
                        ($n['hasil_akhir'][1]['hasil'] * $kriteria[1]->bobot) +
                        ($n['hasil_akhir'][2]['hasil'] * $kriteria[2]->bobot) +
                        ($n['hasil_akhir'][3]['hasil'] * $kriteria[3]->bobot) +
                        ($n['hasil_akhir'][4]['hasil'] * $kriteria[4]->bobot),
                        'nisn' => $n['nisn'],
                    );

                    $this->Normalisasi->tambahNormalisasi($val);
                }
            }
        }
        redirect('admin/NormalisasiController');
    }
}
