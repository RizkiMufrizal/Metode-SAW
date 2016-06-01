<!DOCTYPE html>
<!--
    
    @Author Rizki Mufrizal <mufrizalrizki@gmail.com>
    @Since May 29, 2016
    @Time 1:59:11 AM
    @Encoding UTF-8
    @Project Metode-SAW
    @Package Expression package is undefined on line 9, column 16 in Templates/Scripting/EmptyPHPWebPage.php.

-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Metode SAW</title>

        <link href="<?php echo base_url(); ?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>assets/css/dataTables.bootstrap.min.css" rel="stylesheet" type="text/css" />
    </head>
    <body>

        <div class="container">
            <div class="row">
                <table id="normalisasi" class="table table-bordered table-hover table-striped">
                    <thead>
                        <tr>
                            <th>NIM</th>
                            <th>Nama</th>
                            <th>Nilai Psikotes</th>
                            <th>Nilai PSM Test</th>
                            <th>Nilai Angket Siswa</th>
                            <th>Nilai UN</th>
                            <th>Nilai Raport</th>
                            <th>Total Nilai</th>
                            <th>Rangking</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($normalisasi as $n) {
                            ++$i;
                            ?>
                            <tr>
                                <td><?php echo $n->nim; ?></td>
                                <td><?php echo $n->nama; ?></td>
                                <td><?php echo $n->nilai_c1; ?></td>
                                <td><?php echo $n->nilai_c2; ?></td>
                                <td><?php echo $n->nilai_c3; ?></td>
                                <td><?php echo $n->nilai_c4; ?></td>
                                <td><?php echo $n->nilai_c5; ?></td>
                                <td><?php echo $n->total_nilai; ?></td>
                                <td><?php echo $i; ?></td>
                            </tr>
<?php } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <script src="<?php echo base_url(); ?>assets/js/jquery-1.12.0.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/jquery.dataTables.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>assets/js/dataTables.bootstrap.min.js" type="text/javascript"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $('#normalisasi').DataTable();
            });
        </script>
    </body>
</html>
