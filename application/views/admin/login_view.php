<link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">﻿
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<title>Login Admininstrator</title>
<!-- BOOTSTRAP STYLES-->
<link href="assets/css/bootstrap.css" rel="stylesheet" />
<!-- FONTAWESOME STYLES-->
<link href="assets/css/font-awesome.css" rel="stylesheet" />
<!-- CUSTOM STYLES-->
<link href="assets/css/custom.css" rel="stylesheet" />
<!-- GOOGLE FONTS-->
<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css' />

</head>
<body>
<div class="container">
<div class="row text-center ">
<div class="col-md-12">
<br /><br />
<h2> SISTEM INFORMASI MINAT BAKAT MAHASISWA</h2>

<h5>Fakultas Matematika dan Ilmu Pengetahuan Alam (FMIPA) UNSYIAH</h5>
<br />
</div>
</div>
<div class="row ">

<div class="col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-10 col-xs-offset-1">
<div class="panel panel-default">
<div class="panel-heading">
<strong>   Masukkan Username dan Password </strong>  
</div>
<div class="panel-body">

<?php
// Notifikasi kalau ada input error
echo validation_errors('<div  class="alert alert-danger"<i class="fa fa-warning"></i>','</div>');
//Notifikasi
if($this->session->flashdata('sukses')) {
  echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
  echo $this->session->flashdata('sukses');
  echo '</div>';
} 
?>
<form role="form" method="post" action="<?php echo base_url('login') ?>">
  <br/>  
   <div class="form-group input-group">
          <span class="input-group-addon"><i class="fa fa-tag"  ></i></span>
          <input type="text" class="form-control" placeholder="Masukkan Username " name="username" />
      </div>
                                            <div class="form-group input-group">
          <span class="input-group-addon"><i class="fa fa-lock"  ></i></span>
          <input type="password" class="form-control"  placeholder="Masukkan Password" name="password" />
      </div>
  <div class="form-group">
          <label class="checkbox-inline">
              <input type="checkbox" /> Ingat Saya
          </label>
          <span class="pull-right">
                 <a href="#" >Lupa password ? </a> 
          </span>
      </div>
   
   <input type="submit" name="submit" class="btn btn-primary btn-lg" value="Login">
   
  <hr />
  Belum Daftar ? <a href="<?php base_url()?>daftar" >Klik Disini </a> 
  </form>
</div>

</div>
</div>


</div>
</div>


<!-- SCRIPTS -AT THE BOTOM TO REDUCE THE LOAD TIME-->
<!-- JQUERY SCRIPTS -->
<script src="assets/js/jquery-1.10.2.js"></script>
<!-- BOOTSTRAP SCRIPTS -->
<script src="assets/js/bootstrap.min.js"></script>
<!-- METISMENU SCRIPTS -->
<script src="assets/js/jquery.metisMenu.js"></script>
<!-- CUSTOM SCRIPTS -->
<script src="assets/js/custom.js"></script>

</body>
</html>
