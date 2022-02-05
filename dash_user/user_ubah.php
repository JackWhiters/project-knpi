<?php
include "header.php";
$query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");

include "menu.php";?>
<div class="wrapper">

  <!-- Full Width Column -->
  <div class="content-wrapper">

    <div class="container">
      <section class='content-header'>
      <h1>
        <?php echo "$i[sekolah] "; ?>
        <small>Control panel</small>
      </h1>
      <ol class='breadcrumb'>
        <li><a href='home'><i class='fa fa-dashboard'></i> Home</a></li>
        <li class='active'>Lihat Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class='content'>
      <div class='row'>
        <div class='col-md-12'>
          <div class='box box-info'>
            <div class='box-header with-border'>
              <h3 class='box-title'><i class='fa fa-user'></i> FORM DATA PELAJAR</h3>
            </div>
             <form class='form-horizontal' role='form' method=POST action='aksi/user_update.php' enctype='multipart/form-data'>
              <div class='box-body'>
                <div class="alert alert-info alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <h4><i class="icon fa fa-info-circle"></i> Informasi!</h4>
                Pastikan data anda sudah benar dan jika data anda belum benar, silahkan melapor ke bagian penginput data.
              </div>
                <?php
                  $rr=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM user 
                    INNER JOIN level ON user.id_level= level.id_level
                    INNER JOIN kelurahan ON user.id_kel= kelurahan.id_kel
                    INNER JOIN kabupaten ON user.id_kab= kabupaten.id_kab 
                    INNER JOIN kecamatan ON user.id_kec= kecamatan.id_kec 
                    INNER JOIN provinsi ON user.id_prov= provinsi.id_prov WHERE id='$_GET[id]'"));
                ?>
                <input type='hidden' class='form-control' name='id' value="<?php echo $rr['id']; ?>">
                <div class='form-group'>
                  <label class='col-sm-2 control-label'>NIS/NISN:</label>
                  <div class='col-sm-4'>
                    <input type='text' name='a' class='form-control' value="<?php echo $rr['nis']; ?>" disabled>
                  </div>
                  <label class='col-sm-2 control-label'>Nama :</label>
                  <div class='col-sm-4'>
                    <input type='text' name='a' class='form-control' value="<?php echo $rr['nama']; ?>" disabled>
                  </div>
                </div>
                
                <div class='form-group'>
                  <label class='col-sm-2 control-label'>Jenis Kelamin : </label>
                  <div class='col-sm-4'>
                      <input type='text' name='a' class='form-control' value="<?php echo $rr['jk']; ?>" disabled>
                  </div>
                  <label class='col-sm-2 control-label'>Tempat lahir:</label>
                  <div class='col-sm-4'>
                    <input class='form-control' name='f' value="<?php echo $rr['tmp_lhr']; ?>" disabled>
                  </div>
                </div>

                <div class='form-group'>
                  <label class='col-sm-2 control-label'>Tanggal Lahir : </label>
                  <div class='col-sm-4'>
                    <input type='date' class='form-control' name='g' value="<?php echo $rr['tgl_lhr']; ?>" disabled>
                  </div>
                  <label class='col-sm-2 control-label'>Alamat :</label>
                  <div class='col-sm-4'>
                    <textarea class='form-control' name='h' value="<?php echo $rr['alamat']; ?>" disabled><?php echo $rr['alamat']; ?></textarea>
                  </div>
                </div>

                <div class='form-group'>
                  <label class='col-sm-2 control-label'>Provinsi :</label>
                  <div class='col-sm-4'>
                     <input type='text' class='form-control' name='g' value="<?php echo $rr['nama_provinsi']; ?>" disabled>
                  </div>
                  <label class='col-sm-2 control-label'>Kabupaten :</label>
                  <div class='col-sm-4'>
                     <input type='text' class='form-control' name='g' value="<?php echo $rr['nama_kabupaten']; ?>" disabled>
                  </div>
                </div>

                <div class='form-group'>
                  
                  <label class='col-sm-2 control-label'>Kecamatan :</label>
                  <div class='col-sm-4'>
                     <input type='text' class='form-control' name='g' value="<?php echo $rr['nama_kecamatan']; ?>" disabled>
                  </div>
                  <label class='col-sm-2 control-label'>Kelurahan : </label>
                  <div class='col-sm-4'>
                    <input type='text' class='form-control' name='g' value="<?php echo $rr['nama_kelurahan']; ?>" disabled>
                  </div>
                </div>

                <div class='form-group'>
                  
                  <label class='col-sm-2 control-label'>Telp./Hp. : </label>
                  <div class='col-sm-4'>
                    <input type='text' class='form-control' name='m' value='<?php echo $rr['hp']; ?>' disabled>
                  </div>
                  <label class='col-sm-2 control-label'>Email  : </label>
                  <div class='col-sm-4'>
                    <input type='email' class='form-control' name='n' value='<?php echo $rr['email']; ?>' disabled>
                  </div>
                </div>

                <div class='form-group'>
                  <!-- <label class='col-sm-2 control-label'>Ganti Foto Baru :</label>
                  <div class='col-sm-4'>
                    <input type='file' class='form-control' name='gambar'>
                  </div> -->
                  <label class='col-sm-2 control-label'>Foto Saat Ini :</label>
                  <div class='col-sm-4'>
                    <img class="img-responsive img-rounded" alt="Responsive image" src="../assets/img/user/<?php echo "$rr[gambar]";?>" width="50px"> <?php echo "$rr[gambar]";?></div>
                  </div>
                
                <div class='form-group'>
                  <div class='col-sm-12'>
                    <!-- <button style="width: 200px" type="submit" class="btn btn-flat btn-primary col-sm-5"><i class="glyphicon glyphicon-floppy-save"></i> S I M P A N</button>
                  </div> -->
                  <center><a href="index.php"><button style="width: 200px" type="button" class="btn btn-flat btn-danger"><i class="fa fa-arrow-left"></i> K E M B A L I</button></a></center>
                </div>
              </div>
            </form>
          </div>
    </section>
  </div>
  <!-- /.container -->
</div>
<!-- /.content-wrapper -->

<?php
include "footer.php";
?></div>