<nav class="navbar-default navbar-side" role="navigation">
<div class="sidebar-collapse">
    <ul class="nav" id="main-menu">
<!--Dasbor-->
    <<li><a href="<?php echo base_url('admin/dasbor')?>"> <i class="fa fa-dashboard"></i>Dashboard</a></li>
       
       <!-- Menu User  -->
        
        <li>
            <a href="#"><i class="fa fa-user"></i> User/admin<span class="fa arrow"></span></a>
            <ul class="nav nav-second-level">
                <li><a href="<?php echo base_url('admin/user') ?>">Data User</a></li>
                <li><a href="<?php echo base_url('admin/user/tambah') ?>">Tambah User</a></li>
                   </ul>
                </li>
        <!-- Menu Mahasiswa  -->
        <li>
            <a href="#"><i class="fa fa-desktop"></i> Mahasiswa<span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">
                <li><a href="<?php echo base_url('admin/mahasiswa') ?>">Data Mahasiswa</a></li>
                <li><a href="<?php echo base_url('admin/mahasiswa/tambah') ?>">Tambah Mahasiswa</a></li>
                   </ul>
                </li>
                <!-- Menu Sertikat  -->
        <li>
            <a href="#"><i class="fa fa-table"></i> Sertifikat<span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">
                <li><a href="<?php echo base_url('admin/sertifikat') ?>">Data Sertifikat</a></li>
                <li><a href="<?php echo base_url('admin/sertifikat/tambah') ?>">Tambah Sertfikat</a></li>
                   </ul>
                </li>
                <!-- Data Grafik Sertifikat Masuk  -->
        <!-- <li>
            <a href="#"><i class="fa fa-bar-chart-o"></i> Grafik Sertifikat Masuk<span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">
                <li><a href="<?php echo base_url('admin/sertifikat') ?>">Grafik Sertifikat Masuk</a></li>
                <li><a href="<?php echo base_url('admin/sertifikat/tambah') ?>">Tambah Mahasiswa</a></li>
                   </ul>
                </li>
		<li>
			<a href="#"><i class="fa fa-bar-chart-o"></i> Grafik Info Mahasiswa<span class="fa arrow"></span></a>
			<ul class="nav nav-third-level">
				<li><a href="<?php echo base_url('admin/sertifikat') ?>">Grafik Mahasiswa</a></li>
			</ul>
		</li> -->
                <!-- Menu Sertifikat SKPI  -->
        <li>
            <a href=""><i class="fa fa-edit"></i> Download Sertifikat SKPI<span class="fa arrow"></span></a>
            <ul class="nav nav-third-level">
                <li><a href="<?php echo base_url('download') ?>">Download SKPI</a></li>
                   </ul>
                </li>
    </ul>
   
</div>

</nav>  
<!-- /. NAV SIDE  -->
<div id="page-wrapper" >
<div id="page-inner">
    <div class="row">
        <div class="col-md-12">
         <h2><?php echo $title ?></h2>
        </div>
    </div>
     <!-- /. ROW  -->
     <hr />
   
<div class="row">
    <div class="col-md-12">
        <!-- Advanced Tables -->
        <div class="panel panel-default">
            <div class="panel-heading">
                 <?php echo $title ?>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
