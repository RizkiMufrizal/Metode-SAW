<!DOCTYPE html>
<!--

    @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
    @Since Apr 21, 2016
    @Time 10:18:45 PM
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
                                Data Nilai Calon Siswa
                            </h1>
                            <ol class="breadcrumb">
                                <li class="active">
                                    <i class="glyphicon glyphicon-dashboard"></i> Data Nilai Calon Siswa
                                </li>
                            </ol>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-lg-12">

                            <table id="calonsiswa" class="table table-bordered table-hover table-striped">
                                <thead>
                                    <tr>
                                        <th>NISN</th>
                                        <th>Nama</th>
                                        <th>Nilai Psikotes</th>
                                        <th>Nilai PSM Test</th>
                                        <th>Nilai Angket Siswa</th>
                                        <th>Nilai UN</th>
                                        <th>Nilai Raport</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($nilai_calon_siswa as $n) { ?>
                                        <tr>
                                            <td><?php echo $n->nisn; ?></td>
                                            <td><?php echo $n->nama; ?></td>
                                            <td><?php echo $n->c1; ?></td>
                                            <td><?php echo $n->c2; ?></td>
                                            <td><?php echo $n->c3; ?></td>
                                            <td><?php echo $n->c4; ?></td>
                                            <td><?php echo $n->c5; ?></td>
                                        </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <?php $this->load->view('admin/layout/JsLayout') ?>
    </body>
</html>
