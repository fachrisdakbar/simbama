<button class="btn btn-danger btn-xs" data-toggle="modal" data-target="#myModal-<?php echo $mahasiswa->nim; ?>">
<i class="fa fa-trash-o"> Hapus</i>
</button>
<div class="modal fade" id="myModal-<?php echo $mahasiswa->nim; ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
    <h4 class="modal-title" id="myModalLabel">Hapus data mahasiswa: <?php echo $mahasiswa->nama_mhs ?></h4>
</div>
<div class="modal-body">
     <p class="alert alert-danger"><i class="fa fa-warning"></i> Yakin ingin menghapus data ini ?</p>
</div>
<div class="modal-footer">

    <a href="<?php echo base_url('admin/mahasiswa/delete/'.$mahasiswa->nim) ?>" class="btn btn-danger">
    <i class="fa fa-trash o"></i> Hapus</a>

    <a href="<?php echo base_url('admin/mahasiswa/edit/'.$mahasiswa->nim) ?>" class="btn btn-warning">
    <i class="fa fa-edit"></i> Edit</a>
    <button type="button" class="btn btn-success" data-dismiss="modal">
        <i class= "fa fa-times"></i>Close</button>
</div>
</div>
</div>
</div>
