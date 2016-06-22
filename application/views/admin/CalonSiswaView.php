<!DOCTYPE html>
<!--

    @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
    @Since Apr 21, 2016
    @Time 7:23:06 PM
    @Encoding UTF-8
    @Project Metode-Saw
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
                                Data Calon Siswa
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="glyphicon glyphicon-dashboard"></i> Data Calon Siswa
                                </li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">

                            <form method="post" action="<?php echo base_url() ?>index.php/admin/CalonSiswaController/uploadCsvCalonSiswa" enctype="multipart/form-data">
                                <div class="form-group">
                                    <label for="exampleInputFile">Upload Data Calon Dan Nilai Siswa</label>
                                    <input type="file" name="csv">
                                    <p class="help-block">Silahkan browse file csv untuk data calon dan nilai siswa</p>
                                </div>
                                <button type="submit" class="btn btn-success">Upload</button>
                            </form>

                            <br/>

                            <button class="btn btn-primary" data-toggle="modal" data-target="#modal">Tambah Data</button>

                            <?php if (sizeof($calon_siswa) <= 0) { ?>
                                <button class="btn btn-danger" disabled>Hapus Seluruh Data</button>
                            <?php } else { ?>
                                <a href="<?php echo base_url(); ?>index.php/admin/CalonSiswaController/hapusCalonSiswa">
                                    <button class="btn btn-danger">Hapus Seluruh Data</button>
                                </a>
                            <?php } ?>

                            <p></p>

                            <table id="calonsiswa" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                        <th>Asal Sekolah</th>
                                        <th>Tahun Lulus</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($calon_siswa as $s) { ?>
                                        <tr>
                                            <td><?php echo $s->nisn; ?></td>
                                            <td><?php echo $s->nama; ?></td>
                                            <td><?php echo $s->jenis_kelamin; ?></td>
                                            <td><?php echo $s->tanggal_lahir; ?></td>
                                            <td><?php echo $s->alamat; ?></td>
                                            <td><?php echo $s->asal_sekolah; ?></td>
                                            <td><?php echo $s->tahun_lulus; ?></td>
                                            <td class="text-center">
                                                <?php if ($s->status) { ?>
                                                    <button class="btn btn-success" disabled>Tambah Nilai</button>
                                                <?php } else { ?>
                                                    <a href="<?php echo base_url(); ?>index.php/admin/CalonSiswaController/ambilCalonSiswaDanNilaiBerdasarkanNisn/<?php echo $s->nisn; ?>">
                                                        <button class="btn btn-success">Tambah Nilai</button>
                                                    </a>
                                                <?php } ?>
                                            </td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Tambah Calon Siswa</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url(); ?>index.php/admin/CalonSiswaController/tambahCalonSiswa" method="post">
                            <div class="form-group">
                                <label>NISN</label>
                                <input type="text" name="nisn" class="form-control" placeholder="Masukkan NISN Anda">
                            </div>
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" name="nama" class="form-control" placeholder="Masukkan Nama Anda">
                            </div>
                            <div class="form-group">
                                <label>Jenis Kelamin</label>
                                <input type="text" name="jenis_kelamin" class="form-control" placeholder="Masukkan Jenis Kelamin Anda">
                            </div>
                            <div class="form-group">
                                <label>Tanggal Lahir</label>
                                <input type="date" name="tanggal_lahir" class="form-control" placeholder="Masukkan Tanggal Lahir Anda">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" placeholder="Masukkan Alamat Anda"></textarea>
                            </div>
                            <div class="form-group">
                                <label>Asal Sekolah</label>
                                <input type="text" name="asal_sekolah" class="form-control" placeholder="Masukkan Asal Sekolah Anda">
                            </div>
                            <div class="form-group">
                                <label>Tahun Lulus</label>
                                <input type="number" name="tahun_lulus" class="form-control" placeholder="Masukkan Tahun Lulus Anda">
                            </div>

                            <button type="submit" class="btn btn-primary">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('admin/layout/JsLayout') ?>
    </body>
</html>
