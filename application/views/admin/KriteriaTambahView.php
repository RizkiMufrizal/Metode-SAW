<!DOCTYPE html>
<!--
    
    @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
    @Since May 28, 2016
    @Time 6:23:17 PM
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
                                Ubah Kriteria
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
                            <?php foreach ($kriteria as $k) { ?>
                                <form method="post" action="<?php echo base_url(); ?>index.php/admin/KriteriaController/updateKriteria">

                                    <div class="form-group">
                                        <label>ID Kriteria</label>
                                        <input type="text" value="<?php echo $k->id_kriteria; ?>" class="form-control" disabled>
                                        <input type="hidden" name="id_kriteria" value="<?php echo $k->id_kriteria; ?>" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Kriteria</label>
                                        <input name="kriteria" type="text" value="<?php echo $k->kriteria; ?>" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Bobot</label>
                                        <input type="text" name="bobot" value="<?php echo $k->bobot; ?>" class="form-control">
                                    </div>

                                    <div class="form-group">
                                        <label>Keterangan</label>
                                        <input type="text" name="keterangan" value="<?php echo $k->keterangan; ?>" class="form-control">
                                    </div>

                                    <button type="submit" class="btn btn-success">Simpan</button>
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

