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

                            <button class="btn btn-primary" data-toggle="modal" data-target="#modal">Tambah Data</button>

                            <p></p>

                            <table id="calonsiswa" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>NIM</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Alamat</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($calon_siswa as $s) { ?>
                                        <tr>
                                            <td><?php echo $s->nim; ?></td>
                                            <td><?php echo $s->nama; ?></td>
                                            <td><?php echo $s->jenis_kelamin; ?></td>
                                            <td><?php echo $s->tanggal_lahir; ?></td>
                                            <td><?php echo $s->alamat; ?></td>
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
                                <label>NIM</label>
                                <input type="text" name="nim" class="form-control" placeholder="Masukkan NIM Anda">
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
                                <textarea class="form-control" placeholder="Masukkan Alamat Anda"></textarea>
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

