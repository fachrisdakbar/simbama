<p><a href="<?php echo base_url('admin/mahasiswa/tambah') ?>" class="btn btn-success">
<i class="fa fa-plus"></i> Tambah</a></p>

<?php
//Notifikasi
if($this->session->flashdata('sukses')) {
	echo '<div class="alert alert-success"><i class="fa fa-check"></i>';
	echo $this->session->flashdata('sukses');
	echo '</div>';
}
?>

<table class="table table-striped table-bordered table-hover" id="dataTables-example">
<thead>
    <tr>
        <th>#</th>
        <th>Nama Mahasiswa</th>
        <th>Nim</th>
        <th>Prodi</th>
        <th>Jurusan</th>
        <th>Username</th>
        <th>Jumlah Sertifikat</th>
        <th>Keterangan Sertifikat</th>
        <th width="15%">Action</th>
    </tr>
</thead>
<tbody> 
<?php $i =1; foreach($mahasiswa as $mahasiswa) { ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $mahasiswa->nama_mhs ?></td>
        <td><?php echo $mahasiswa->nim ?></td>
        <td><?php echo $mahasiswa->prodi ?></td>
        <td><?php echo $mahasiswa->jurusan ?></td>
        <td><?php echo $mahasiswa->username ?></td>
        <td><?php echo $mahasiswa->jlh_sertifikat ?></td>
        <td><?php echo $mahasiswa->ktr_sertifikat ?></td>
        <td><a href="<?php echo base_url('admin/mahasiswa/edit/'.$mahasiswa->nim) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

        <?php include('delete.php'); ?>
        </td>
    </tr>
<?php $i++; } ?>
</tbody>
</table>