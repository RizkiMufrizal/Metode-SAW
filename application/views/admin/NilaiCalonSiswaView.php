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
                                        <th rowspan="2">NIM</th>
                                        <th rowspan="2">Nama</th>
                                        <th colspan="2">Nilai Psikotes</th>
                                        <th colspan="2">Nilai PSM Test</th>
                                        <th colspan="2">Nilai Angket Siswa</th>
                                        <th colspan="2">Nilai UN</th>
                                        <th colspan="2">Nilai Raport</th>
                                    </tr>
                                    <tr>
                                        <th>Nilai Range</th>
                                        <th>Nilai Asli</th>
                                        <th>Nilai Range</th>
                                        <th>Nilai Asli</th>
                                        <th>Nilai Range</th>
                                        <th>Nilai Asli</th>
                                        <th>Nilai Range</th>
                                        <th>Nilai Asli</th>
                                        <th>Nilai Range</th>
                                        <th>Nilai Asli</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($nilai_calon_siswa as $n) { ?>
                                        <tr>
                                            <td><?php echo $n->nim; ?></td>
                                            <td><?php echo $n->nama; ?></td>
                                            <td><?php echo $n->c1; ?></td>
                                            <td><?php echo $n->nilai_asli_c1; ?></td>
                                            <td><?php echo $n->c2; ?></td>
                                            <td><?php echo $n->nilai_asli_c2; ?></td>
                                            <td><?php echo $n->c3; ?></td>
                                            <td><?php echo $n->nilai_asli_c3; ?></td>
                                            <td><?php echo $n->c4; ?></td>
                                            <td><?php echo $n->nilai_asli_c4; ?></td>
                                            <td><?php echo $n->c5; ?></td>
                                            <td><?php echo $n->nilai_asli_c5; ?></td>
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
