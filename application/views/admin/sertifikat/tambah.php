<?php
// Notifikasi kalau ada input error
echo validation_errors('<div  class="alert alert-danger"<i class="fa fa-warning"></i>','</div>');

// //Kalau terjadi error
if(isset($error)){
	echo '<div class="alert alert-warning">';
	echo $error;
	echo '</div>';
}

//open form
echo form_open_multipart(base_url('admin/sertifikat/tambah'));
?>
<div class="col-md-6">
	<div class="form-group">
		<label>Nama Sertifikat</label>
		<input type="text" name="nama_sertifikat" class="form-control" placeholder="Nama Sertifikat" value="<?php echo set_value('nama_sertifikat')?>" required>
	</div>
	<div class="form-group">
		<label>Juara</label>
		<input type="text" name="juara" class="form-control" placeholder="Juara" value="<?php echo set_value('juara')?>" required>
	</div>
	<div class="form-group">
		<label>Bidang Sertifikat</label>
		<select name="bidang_sertifikat" class="form-control">
			<option value="Olahraga">Olahraga</option>
			<option value="Sains">Sains</option>
			<option value="Sosial">Sosial</option>
			<option value="Komputer">Komputer</option>
		</select>
	</div>
	<div class="form-group">
		<label>Tingkat Penghargaan</label>
		<select name="tingkat_penghargaan" class="form-control">
			<option value="Kecamatan">Kecamatan</option>
			<option value="Kabupaten/Kota">Kabupaten/Kota</option>
			<option value="Provinsi">Provinsi</option>
			<option value="Nasional">Nasional</option>
		</select>
	</div>
</div>

<div class="col-md-6">
	<div class="form-group">
		<label>Tahun Sertifikat</label>
		<input type="text" name="tahun_sertifikat" class="form-control" placeholder="Tahun Sertifikat" value="<?php echo set_value('tahun_sertifikat')?>" required>
	</div>
	
	<div class="form-group">
		<label>Upload Sertifikat</label>
		<input type="file" name="upload_sertifikat" class="form-control" placeholder="Upload Sertifikat" value="<?php echo set_value('upload_sertifikat')?>" required>
</div>
<div class="form-group">
	<input type="submit" name="submit" class="btn btn-success btn-lg" value="Simpan Data">
	<input type="reset" name="reset" class="btn btn-default btn-lg" value="Reset">
</div>
</div>

<?php
// form close
echo form_close(); 
?>