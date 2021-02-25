<p><a href="<?php echo base_url('admin/sertifikat/tambah') ?>" class="btn btn-success">
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
        <th>Nama sertifikat</th>
        <th>Juara</th>
        <th>Bidang Sertifikat</th>
        <th>Tingkat Penghargaan</th>
        <th>Tahun Sertifikat</th>
        <th>Upload Sertifikat</th>
        <th width="15%">Action</th>
    </tr>
</thead>
<tbody> 
<?php $i =1; foreach($sertifikat as $sertifikat) { ?>
    <tr>
        <td><?php echo $i ?></td>
        <td><?php echo $sertifikat->nama_sertifikat ?></td>
        <td><?php echo $sertifikat->juara ?></td>
        <td><?php echo $sertifikat->bidang_sertifikat ?></td>
        <td><?php echo $sertifikat->tingkat_penghargaan ?></td>
        <td><?php echo $sertifikat->tahun_sertifikat ?></td>
        <td>
<?php if($sertifikat->upload_sertifikat !="") { ?>
            <img src="<?php echo base_url('assets/upload/image/thumbs/'.$sertifikat->upload_sertifikat) ?>" class="img-img-thumbnail" width="60">
<?php }else{echo 'Tidak ada';} ?>

        </td>
        <td><a href="<?php echo base_url('admin/sertifikat/edit/'.$sertifikat->id_sertifikat) ?>" class="btn btn-warning btn-xs"><i class="fa fa-edit"></i>Edit</a>

        <?php include('delete.php'); ?>
        </td>
    </tr>
<?php $i++; } ?>
</tbody>
</table>