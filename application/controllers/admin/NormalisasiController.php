<?php

/**
 *
 * Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 * Since Apr 22, 2016
 * Time 9:04:03 PM
 * Encoding UTF-8
 * Project Metode-SAW
 * Package Expression package is undefined on line 14, column 14 in Templates/Scripting/PHPClass.php.
 * 
 */
class NormalisasiController extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('Normalisasi');
        $this->load->model('NilaiCalonSiswa');
        $this->load->model('Kriteria');
    }

    public function index() {
        $data['normalisasi'] = $this->Normalisasi->ambilNormalisasi();
        $this->load->view('admin/NormalisasiView', $data);
    }

    public function prosesNormalisasi() {

        //jumlah calon siswa
        $jumlahCalonSiswaDenganNilai = $this->NilaiCalonSiswa->ambilJumlahNilaiCalonSiswa();

        //data kriteria
        $kriteria = $this->Kriteria->ambilKriteria();

        $nilaiCalonSiswa = $this->NilaiCalonSiswa->ambilNilaiCalonSiswaArray();

        //hasil max setiap kriteria dalam bentuk array
        $hasilMaxDariSetiapKriteria = array();

        //hasil pembagian antara nilai kriteria dan nilai max kriteria
        $nilaiHasilBagiAntaraNilaiKriteriaDanNilaiMaxKriteria = array();

        //hasil akhir untuk setiap calon siswa dan kriteria
        $hasilAkhirPerCalonSiswaDanKriteria = array();

        if ($jumlahCalonSiswaDenganNilai > 0) {

            //mencari nilai max dari setiap kriteria
            foreach ($kriteria as $k) {
                $hasilMaxKriteria = $this->NilaiCalonSiswa->ambilNilaiMaxBerdasarkanKriteria($k->kriteria);

                array_push($hasilMaxDariSetiapKriteria, array(
                    'kriteria' => $k->kriteria,
                    'hasil' => $hasilMaxKriteria[0][$k->kriteria]
                ));
            }

            //mencari nilai normalisasi karena faktor kriteria benefit berdasarkan nilai maksimal
            foreach ($hasilMaxDariSetiapKriteria as $hmdsk) {
                foreach ($nilaiCalonSiswa as $n) {
                    array_push($nilaiHasilBagiAntaraNilaiKriteriaDanNilaiMaxKriteria, array(
                        'nim' => $n['nim'],
                        'nama' => $n['nama'],
                        'kriteria' => $hmdsk['kriteria'],
                        'hasil' => $n[$hmdsk['kriteria']] / $hmdsk['hasil']
                    ));
                }
            }

            //sort berdasarkan calon dan kriteria
            asort($nilaiHasilBagiAntaraNilaiKriteriaDanNilaiMaxKriteria);

            //jumlah total
            $jumlahBerdasarkanCalonSiswaDanKriteria = 0;

            //data semantara calon siswa dan nilai
            $dataSementaraCalonSiswaDanNilai = array();

            //data sementara nim agar mempermudah perjumlahan
            $dataSementaraNim = array();

            foreach ($nilaiHasilBagiAntaraNilaiKriteriaDanNilaiMaxKriteria as $nhbankdnxk) {

                if (!in_array($nhbankdnxk['nim'], $dataSementaraNim)) {
                    array_push($dataSementaraNim, $nhbankdnxk['nim']);
                    $jumlahBerdasarkanCalonSiswaDanKriteria = 0;
                }

                foreach ($kriteria as $k) {
                    if ($k->kriteria == $nhbankdnxk['kriteria']) {

                        $hasilSemantara = $nhbankdnxk['hasil'] * $k->bobot;

                        $jumlahBerdasarkanCalonSiswaDanKriteria = $hasilSemantara + $jumlahBerdasarkanCalonSiswaDanKriteria;

                        array_push($dataSementaraCalonSiswaDanNilai, array(
                            'nim' => $nhbankdnxk['nim'],
                            'nama' => $nhbankdnxk['nama'],
                            'kriteria' => $nhbankdnxk['kriteria'],
                            'hasil' => $jumlahBerdasarkanCalonSiswaDanKriteria
                        ));
                    }
                }
            }

            print_r(json_encode($dataSementaraCalonSiswaDanNilai));

            $dataSementaraNimHapusDuplicate = array();

            for ($i = 0; $i < sizeof($dataSementaraCalonSiswaDanNilai); $i++) {
                if (sizeof($dataSementaraNimHapusDuplicate) == 0) {
                    array_push($dataSementaraNimHapusDuplicate, $dataSementaraCalonSiswaDanNilai[$i]['nim']);
                } else if (!in_array($dataSementaraCalonSiswaDanNilai[$i]['nim'], $dataSementaraNimHapusDuplicate) and sizeof($dataSementaraNim) != 0) {
                    array_push($dataSementaraNimHapusDuplicate, $dataSementaraCalonSiswaDanNilai[$i]['nim']);
                    echo $dataSementaraCalonSiswaDanNilai[$i]['hasil'] . '<br/>';
                }
            }
        }
    }

}
