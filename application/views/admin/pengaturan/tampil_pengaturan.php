<!-- Page Heading -->
<div class="d-sm-flex align-items-center justify-content-between mb-4">
  <h1 class="h3 mb-0 text-gray-800"><?php echo $judul; ?></h1>

</div>

<!-- Content Row -->
<div class="container">

  <?php if ($this->session->flashdata("pesan")): ?>
      <?php echo $this->session->flashdata("pesan"); ?>
    <?php endif ?>

  <div class="card o-hidden border-1 shadow-lg my-5">
    <div class="card-body p-0">
      <!-- Nested Row within Card Body -->
      <div class="row">
        <div class="col-lg-4 text-center">
         <center>
            <img class="img-fluid" src="<?php echo base_url("./gambar/pengaturan/$logo_app1"); ?>">
            <img class="img-fluid" src="<?php echo base_url("./gambar/pengaturan/$logo_app2"); ?>">
         </center>

        </div>
        <div class="col-lg-8">
          <div class="p-5">

            <?php foreach ($data_pengaturan as $key => $value) {
              # code...
             ?>
            
            <form class="user"  action="<?php echo base_url("admintc/pengaturan/ubah/$value[id_pengaturan]");?>" method="post" enctype="multipart/form-data">

              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label>Nama Aplikasi</label>
                  <input type="text" class="form-control form-control-user" name="nama_aplikasi"  placeholder="Nama Aplikasi" value="<?php echo $nama_aplikasi; ?>">
                </div>
                <div class="col-sm-6">
                   <label>Titel Aplikasi</label>
                  <input type="text" class="form-control form-control-user" name="titel_aplikasi"  placeholder="Titel Aplikasi" value="<?php echo $titel_aplikasi; ?>">
                </div>
              </div>

               <label>Deskripsi Aplikasi</label>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" name="ket_aplikasi"  placeholder="Deskripsi Aplikasi" value="<?php echo $ket_aplikasi; ?>">
              </div>

               <label>Nama Perusahaan</label>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" name="nama_perusahaan"  placeholder="Nama Perusahaan" value="<?php echo $nama_perusahaan; ?>">
              </div>



               <label>Alamat Perusahaan</label>
              <div class="form-group">
                <input type="text" class="form-control form-control-user" name="alamat_perusahaan"  placeholder="Alamat Perusahaan" value="<?php echo $alamat_perusahaan; ?>">
              </div>


              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label>Email</label>
                  <input type="email" class="form-control form-control-user" name="email_perusahaan"  placeholder="Email" value="<?php echo $email_perusahaan; ?>">
                </div>
                <div class="col-sm-6">
                   <label>NPWP</label>
                  <input type="text" class="form-control form-control-user" name="npwp_perusahaan"  placeholder="NPWP" value="<?php echo $npwp_perusahaan; ?>">
                </div>
              </div>


               <div class="form-group row">
                <div class="col-sm-5 mb-3 mb-sm-0">
                  <label>Rekening CV</label>
                  <input type="number" class="form-control form-control-user" name="rek_perusahaan"  placeholder="Rekening CV" value="<?php echo $rek_perusahaan; ?>">
                </div>
                <div class="col-sm-5">
                   <label>No. WhatsApp</label>
                  <input type="number" class="form-control form-control-user" name="wa_perusahaan"  placeholder="No. WhatsApp" value="<?php echo $wa_perusahaan; ?>">
                </div>

                 <div class="col-sm-2">
                   <label>Versi App</label>
                  <input type="text" class="form-control form-control-user" name="versi_app"  placeholder="Versi" value="<?php echo $versi_app; ?>">
                </div>

              </div>


              <div class="form-group row">
                <div class="col-sm-4 mb-3 mb-sm-0">
                  <label>Url Youtube</label>
                  <input type="text" class="form-control form-control-user" name="url_youtube"  placeholder="Url Youtube" value="<?php echo $url_youtube; ?>">
                </div>
                <div class="col-sm-4">
                   <label>Url Facebook</label>
                  <input type="text" class="form-control form-control-user" name="url_facebook"  placeholder="Url Facebook" value="<?php echo $url_facebook; ?>">
                </div>

                 <div class="col-sm-4">
                   <label>Url Instagram</label>
                  <input type="text" class="form-control form-control-user" name="url_instagram"  placeholder="Url instagram" value="<?php echo $url_instagram; ?>">
                </div>

              </div>




              <div class="form-group row">
                <div class="col-sm-6 mb-3 mb-sm-0">
                  <label>Logo App1</label>
                  <input type="file" class="form-control" name="logo_app1" >
                </div>
                <div class="col-sm-6">
                  <label>Logo App2</label>
                  <input type="file" class="form-control" name="logo_app2" >
                </div>
              </div>
            
<hr>
              <button type="submit" class="btn btn-primary btn-user btn-block" ><span class="fa fa-save"></span> Ubah Pengaturan</button>

              
            </form>
            
        <?php } ?>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>

