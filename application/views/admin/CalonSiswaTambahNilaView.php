<!DOCTYPE html>
<!--

    @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
    @Since Apr 21, 2016
    @Time 10:48:28 PM
    @Encoding UTF-8
    @Project Metode-SAW
    @Package Expression package is undefined on line 9, column 16 in Templates/Scripting/EmptyPHPWebPage.php.

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Metode Saw</title>

        <?php $this->load->view('admin/layout/CssLayout') ?>

    </head>
    <body>

        <div id="wrapper">

            <?php $this->load->view('admin/layout/HeaderLayout') ?>

            <div id="page-wrapper">

                <div class="container-fluid">

                    <div class="row">
                        <div class="col-lg-12">
                            <h1 class="page-header">
                                Tambah Nilai Calon Siswa
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="glyphicon glyphicon-dashboard"></i> Tambah Nilai Calon Siswa
                                </li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">
                            <?php foreach ($calon_siswa_nilai as $c) { ?>
                            <form method="post" action="<?php echo base_url(); ?>index.php/admin/NilaiCalonSiswaController/tambahNilaiCalonSiswa">

                                    <div class="form-group">
                                        <label>NIM</label>
                                        <input type="text" value="<?php echo $c->nim; ?>" class="form-control" disabled>
                                        <input type="hidden" name="nim" value="<?php echo $c->nim; ?>" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Nama</label>
                                        <input type="text" value="<?php echo $c->nama; ?>" class="form-control" disabled>
                                        <input type="hidden" name="nama" value="<?php echo $c->nim; ?>" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Nilai Psikotes</label>
                                        <input type="text" name="c1" class="form-control" placeholder="Masukkan Nilai Untuk Kriteria 1">
                                    </div>

                                    <div class="form-group">
                                        <label>Nilai PSM Test</label>
                                        <input type="text" name="c2" class="form-control" placeholder="Masukkan Nilai Untuk Kriteria 2">
                                    </div>

                                    <div class="form-group">
                                        <label>Nilai Angket Siswa</label>
                                        <input type="text" name="c3" class="form-control" placeholder="Masukkan Nilai Untuk Kriteria 3">
                                    </div>

                                    <div class="form-group">
                                        <label>Nilai UN</label>
                                        <input type="text" name="c4" class="form-control" placeholder="Masukkan Nilai Untuk Kriteria 4">
                                    </div>

                                    <div class="form-group">
                                        <label>Nilai Raport</label>
                                        <input type="text" name="c5" class="form-control" placeholder="Masukkan Nilai Untuk Kriteria 5">
                                    </div>

                                    <button type="submit" class="btn btn-primary">Simpan</button>
                                </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('admin/layout/JsLayout') ?>
    </body>
</html>
