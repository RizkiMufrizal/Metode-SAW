<!DOCTYPE html>
<!--

    @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
    @Since Apr 21, 2016
    @Time 9:49:40 PM
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
                                Data Kriteria
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="glyphicon glyphicon-dashboard"></i> Data Kriteria
                                </li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">

                            <?php if (sizeof($kriteria) == 5) { ?>
                                <button class="btn btn-primary" disabled>Tambah Data</button>
                            <?php } else { ?>
                                <button class="btn btn-primary" data-toggle="modal" data-target="#modal">Tambah Data</button>
                            <?php } ?>

                            <p></p>

                            <table id="kriteria" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th class="text-center">ID Kriteria</th>
                                        <th class="text-center">Keterangan</th>
                                        <th class="text-center">Kriteria</th>
                                        <th class="text-center">Bobot</th>
                                        <th class="text-center">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $totalBobot = 0;
                                    foreach ($kriteria as $k) {
                                        ?>
                                        <tr>
                                            <td><?php echo $k->id_kriteria; ?></td>
                                            <td><?php echo $k->keterangan; ?></td>
                                            <td><?php echo $k->kriteria; ?></td>
                                            <td><?php echo $k->bobot; ?></td>
                                            <td class="text-center">
                                                <a href="<?php echo base_url(); ?>index.php/admin/KriteriaController/editKriteria/<?php echo $k->id_kriteria; ?>">
                                                    <button class="btn btn-success">
                                                        <i class="glyphicon glyphicon-pencil"></i>
                                                    </button>
                                                </a>
                                                <a href="<?php echo base_url(); ?>index.php/admin/KriteriaController/hapusKriteria/<?php echo $k->id_kriteria; ?>">
                                                    <button class="btn btn-danger">
                                                        <i class="glyphicon glyphicon-trash"></i>
                                                    </button>
                                                </a>
                                            </td>
                                        </tr>
                                        <?php
                                        $totalBobot = $totalBobot + $k->bobot;
                                    }
                                    ?>
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td>Total Kriteria : </td>
                                        <td><?php echo $totalBobot; ?></td>
                                        <td></td>
                                    </tr>
                                </tfoot>
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
                        <h4 class="modal-title" id="myModalLabel">Tambah Kriteria</h4>
                    </div>
                    <div class="modal-body">
                        <form action="<?php echo base_url(); ?>index.php/admin/KriteriaController/tambahKriteria" method="post">
                            <div class="form-group">
                                <label>Kriteria</label>
                                <input type="text" name="kriteria" class="form-control" placeholder="Masukkan Kriteria">
                            </div>
                            <div class="form-group">
                                <label>Keterangan</label>
                                <input type="text" name="keterangan" class="form-control" placeholder="Masukkan Keterangan">
                            </div>
                            <div class="form-group">
                                <label>Bobot</label>
                                <input type="text" name="bobot" class="form-control" placeholder="Masukkan Bobot Kriteria">
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
