<?php
// Notifikasi kalau ada input error
echo validation_errors('<div  class="alert alert-danger"<i class="fa fa-warning"></i>','</div>');

//open form
echo form_open(base_url('admin/mahasiswa/tambah'));
?>
<div class="col-md-6">
	<div class="form-group">
		<label>Nama Mahasiswa</label>
		<input type="text" name="nama_mhs" class="form-control" placeholder="Nama" value="<?php echo set_value('nama_mhs')?>" required>
	</div>
	<div class="form-group">
		<label>Nim</label>
		<input type="text" name="nim" class="form-control" placeholder="Nim" value="<?php echo set_value('nim')?>" required>
	</div>
	<div class="form-group">
		<label>Prodi</label>
		<input type="text" name="prodi" class="form-control" placeholder="Prodi" value="<?php echo set_value('prodi')?>" required>
	</div>
	<div class="form-group">
		<label>Jurusan</label>
		<input type="text" name="jurusan" class="form-control" placeholder="Jurusan" value="<?php echo set_value('jurusan')?>" required>
	</div>
	<div class="form-group">
		<label>Username</label>
		<input type="text" name="username" class="form-control" placeholder="Username" value="<?php echo set_value('username')?>" required>
	</div>
	<div class="form-group">
		<label>Password</label>
		<input type="password" name="password" class="form-control" placeholder="Password" value="<?php echo set_value('password')?>" required>
	</div>
</div>

<div class="col-md-6">
	<div class="form-group">
		<label>Jumlah Sertifikat</label>
		<select name="jlh_sertifikat" class="form-control">
			<option value="1">1</option>
			<option value="2">2</option>
			<option value="3">3</option>
			<option value="4">4</option>
			<option value="5">5</option>
			<option value="6">6</option>
			<option value="7">7</option>
			<option value="8">8</option>
			<option value="9">9</option>
			<option value="10">10</option>
			<option value="7">12</option>
			<option value="8">15</option>
			<option value="9">20</option>
		</select>
	</div>
	
	<div class="form-group">
	<label>Keterangan Sertifikat</label>
	<textarea name="ktr_sertifikat" class="form-control" placeholder="Keterangan Sertifikat"><?php echo set_value('ktr_sertifikat')?></textarea>
		
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