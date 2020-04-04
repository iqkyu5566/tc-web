<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?php echo $judul; ?></h1>

</div>


<?php if ($error): ?>
  <div class="alert alert-danger alert-dismissable">
    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
    <?php echo $error ?>
</div>
<?php endif ?>




          <div class="card  mb-4">
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Daftar <?php echo $judul; ?></h6>
            </div>
            <div class="card-body">

            <div class="panel-body">
                <button type="button" class="btn btn-success mb-sm" data-toggle="modal" data-target="#myModal">Tambah User</button>

                <br><br>
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Photo</th>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Level</th>
                                <th>Bagian</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($data_user as $key => $value) {
                                                # code...
                             ?>

                             <?php if ($value['status_user']=="Aktif") 
                             {
                                 $warna="btn btn-primary";
                             } 
                             elseif ($value['status_user']=="Belum Aktif") 
                             {
                               $warna="btn btn-danger";
                           }

                           ?>

                           <?php
                           $foto = "$value[foto_user]";
                           if($foto=="")
                           {
                            $foto="icon5.gif";
                        }

                        ?>

                        <tr>
                            <td style="vertical-align: middle;"><?php echo $key+=1 ?></td>
                            <td style="vertical-align: middle;"><img src="<?php echo base_url("./gambar/user/$foto") ?>" width="50"></td>
                            <td style="vertical-align: middle;"><?php echo $value['nama_lengkap']; ?></td>
                            <td style="vertical-align: middle;"><?php echo $value['username']; ?></td>
                            <td style="vertical-align: middle;"><?php echo $value['level_user']; ?></td>
                            <td style="vertical-align: middle;"><?php echo $value['nama_bagian']; ?></td>
                            <td style="vertical-align: middle;">

                               

                                <a class="<?= $warna; ?>" href="#ubahStatus<?php echo $value['id_user']?>" data-toggle="modal"><?php echo $value['status_user']; ?></a>

                            </td>

                            <td style="vertical-align: middle;">

                                <a class="btn btn-xs btn-primary btn-sm" href="#myModaledit<?php echo $value['id_user']?>" data-toggle="modal" title="Edit"><span class="fa fa-edit"></span></a>

                                <a class="btn btn-xs btn-danger btn-sm" href="#myModalhapus<?php echo $value['id_user']?>" data-toggle="modal" title="Edit"><span class="fa fa-times"></span></a>

                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>  
    </div>
</div>



</div><!-- Row -->






<!-- modal tambah data -->

<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Tambah User</h4>
            </div>
            <div class="modal-body">
                <form method="POST" enctype="multipart/form-data">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="file" name="foto_user" class="dropify" data-height="220">
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="form-group">
                                <input type="text" name="nama_lengkap" class="form-control" placeholder="Nama Lengkap" required>
                            </div>

                            <div class="form-group">
                                <input type="text" name="username" class="form-control" placeholder="Username" required>
                            </div>

                            <div class="form-group">
                                <input type="password" name="password" class="form-control" placeholder="Password" required>
                            </div>


                            <div class="form-group">
                                <input type="password" name="password2" class="form-control" placeholder="Confirm Password" required>
                            </div>

                            <div class="form-group">
                                <select class="form-control" name="id_bagian" required>
                                    <option value="">---Pilih Bidang Tugas---</option>
                                    <?php foreach ($data_bagian as $key => $value) { ?>
                                        <option value="<?php echo $value['id_bagian'] ?>"><?php echo $value['no_bagian'] ?> - <?php echo $value['nama_bagian'] ?></option>
                                    <?php } ?>
                                </select>
                            </div>


                            <div class="form-group">
                                <select class="form-control" name="level_user" required>
                                    <option value="">---Pilih Level User---</option>
                                    <option value="Administrator">Administrator</option>
                                    <option value="Pegawai">Pegawai</option>
                                </select>
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-success">Save</button>
                </div>

            </form>
        </div>
    </div>
</div>

<!-- modal tambah data -->


<!-- modal edit data -->
<?php
foreach ($data_user as $key => $value) {
  $id=$value['id_user'];
  $nama_lengkap=$value['nama_lengkap'];
  $username=$value['username'];
  $password=$value['password'];
  $id_bagian=$value['id_bagian'];
  $level_user=$value['level_user'];
  $foto_user=$value['foto_user'];
  ?>


  <div class="modal fade" id="myModaledit<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Ubah Data User</h5>
      </div>
      <div class="modal-body">
          <form method="post" enctype="multipart/form-data" action="<?php echo base_url("adminprima/user/ubah/$value[id_user]"); ?>">

            <div class="row">
                <div class="col-md-4">
                    <div class="form-group">

                        <input type="file" name="foto_user" class="dropify" data-height="220" data-default-file="<?php echo base_url().'gambar/user/'.$foto_user;?>">
                    </div>
                </div>
                <div class="col-md-8">
                    <div class="form-group">
                        <input type="text" name="nama_lengkap" class="form-control" value="<?php echo $nama_lengkap; ?>" placeholder="Nama Lengkap" required>
                    </div>

                    <div class="form-group">
                        <input type="text" name="username" class="form-control" placeholder="Username"  value="<?php echo $username; ?>">
                    </div>

                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password" required>
                    </div>


                    <div class="form-group">
                        <select class="form-control" name="id_bagian" required>
                            <option value="">---Pilih Bidang Tugas---</option>
                            <?php foreach ($data_bagian as $key => $value) { ?>
                                <option value="<?php echo $value['id_bagian'] ?>"<?php if ($id_bagian==$value['id_bagian']) {echo "selected";} ?>><?php echo $value['no_bagian'] ?> - <?php echo $value['nama_bagian'] ?></option>
                            <?php } ?>
                        </select>
                    </div>


                    <div class="form-group">
                        <select class="form-control" name="level_user" required>
                            <option value="">Pilih</option>
                            <option value="Administrator" <?php if ($level_user=="Administrator") {echo "selected";} ?>>Administrator</option>
                            <option value="Pegawai" <?php if ($level_user=="Pegawai") {echo "selected";} ?>>Pegawai</option>
                        </select>
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button class="btn btn-info btn-sm" type="submit" name="save">Update Data</button>
        </div>
    </form>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<?php
}
?>
<!-- modal edit data -->




<!-- hapus -->
<!-- ============ MODAL HAPUS =============== -->
<?php
foreach ($data_user as $key => $value) {
  $id=$value['id_user'];
  ?>

  <div class="modal fade" id="myModalhapus<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Konfirmasi !!!</h5>
      </div>
      <div class="modal-body">
          <form method="post" enctype="multipart/form-data" action="<?php echo base_url("adminprima/user/hapus/$value[id_user]"); ?>">

            <p>Yakin mau menghapus data ini ?</p>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button class="btn btn-danger btn-sm" type="submit" name="save">Hapus Data</button>
        </div>
    </form>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<?php
}
?>
<!-- hapus -->



<!-- ubah status -->
<?php
foreach ($data_user as $key => $value) {
  $id=$value['id_user'];
  $status=$value['status_user'];
  ?>

  <div class="modal fade" id="ubahStatus<?php echo $id?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="myModalLabel">Ubah Status User</h5>
      </div>
      <div class="modal-body">
          <form method="post" enctype="multipart/form-data" action="<?php echo base_url("adminprima/user/ubah_status/$value[id_user]"); ?>">

             <div class="form-group">
                <select class="form-control" name="status_user">
                    <option value="">Pilih</option>
                    <option value="Aktif"<?php if ($status=="Aktif") {echo "selected";} ?>>Aktif</option>
                    <option value="Belum Aktif"<?php if ($status=="Belum Aktif") {echo "selected";} ?>>Belum Aktif</option>
                </select>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-default btn-sm" data-dismiss="modal">Close</button>
            <button class="btn btn-primary btn-sm" type="submit" name="save">Update</button>
        </div>
    </form>
</div>
<!-- /.modal-content -->
</div>
<!-- /.modal-dialog -->
</div>

<?php
}
?>
<!-- ubah status -->


