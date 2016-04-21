<!--

 Author Rizki Mufrizal <mufrizalrizki@gmail.com>
 Since Mar 31, 2016
 Time 4:29:42 PM
 Encoding UTF-8
 Project Aplikasi-Kebudayaan-Aceh
 Package Expression package is undefined on line 9, column 12 in Templates/Scripting/EmptyPHPWebPage.php.
  
-->
<!-- Navigation -->
<nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="">Metode Saw</a>
    </div>
    <!-- Top Menu Items -->

    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="<?php echo base_url(); ?>index.php/admin"><i class="glyphicon glyphicon-dashboard"></i> Dashboard</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/admin/CalonSiswaController"><i class="glyphicon glyphicon-dashboard"></i> Data Calon Siswa</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/admin/KriteriaController"><i class="glyphicon glyphicon-dashboard"></i> Data Kriteria</a>
            </li>
            <li>
                <a href="<?php echo base_url(); ?>index.php/admin/NilaiCalonSiswaController"><i class="glyphicon glyphicon-dashboard"></i> Data Nilai Calon Siswa</a>
            </li>
        </ul>
    </div>
</nav>
