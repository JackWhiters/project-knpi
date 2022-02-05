<?php include "header.php" ?>
<div class="wrapper">
  <!-- Star menu -->
  <?php include "menu.php";?>
  <!-- End menu -->

  <!-- Start content -->
  <div class='content-wrapper'>
    <!-- Content Header (Page header) -->
    <section class='content-header'>
      <h1>
        <?php echo "$i[nama] "; ?>
        <small>Control panel</small>
      </h1>
      <ol class='breadcrumb'>
        <li><a href='home'><i class='fa fa-dashboard'></i> Home</a></li>
        <li class='active'>Ubah Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class='content'>
      <div class='row'>
        <div class='col-md-12'>
          <div class='box box-success'>
            <div class='box-header with-border'>
              <h3 class='box-title'><i class='glyphicon glyphicon-edit'></i> FORM UBAH DATA USER</h3>
            </div>
            <form class='form-horizontal' role='form' method=POST action='aksi/user_updatex.php' enctype='multipart/form-data'>
              <div class='box-body'>
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
                    <label class='col-sm-2 control-label'>Level : </label>
                    <div class='col-sm-4'>
                     <select name='b' class='form-control'>
                      <option value='<?php echo $rr['id_level']; ?>' selected><?php echo $rr['level']; ?></option>
                      <option value=""> ---------------------------</option>
                      <option value=""> Pilih Level User</option>
                      <?php 
                      $tampil = mysqli_query($koneksi, "SELECT * FROM level where id_level in ('1', '2') ORDER BY id_level ");
                      while($r=mysqli_fetch_array($tampil))
                      {
                        echo "<option value='".$r['id_level']."'>".$r['level']."</option>";
                      }
                      ?>
                    </select>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-2 control-label'>Username:</label>
                  <div class='col-sm-4'>
                    <input type='text' name='c' class='form-control' value="<?php echo $rr['username']; ?>">
                  </div>
                  <label class='col-sm-2 control-label'>Password : </label>
                  <div class='col-sm-4'>
                    <input type='text' class='form-control' name='password'>
                  </div>
                </div>

                <div class='form-group'>
                  <label class='col-sm-2 control-label'>Nama :</label>
                  <div class='col-sm-4'>
                    <input type='text' class='form-control' name='d' value="<?php echo $rr['nama']; ?>">
                  </div>
                  <label class='col-sm-2 control-label'>JK : </label>
                  <div class='col-sm-4'>
                    <select name='e' class='form-control'>
                      <option value='<?php echo $rr['jk']; ?>' selected><?php echo $rr['jk']; ?></option>
                      <option value=''></option>
                      <option value=''>Pilih Jenis Kelamin</option>
                      <option value='Laki-laki'>Laki-laki</option>
                      <option value='Perempuan'>Perempuan</option>
                    </select>
                  </div>
                </div>

                <div class='form-group'>
                  <label class='col-sm-2 control-label'>Tempat lahir:</label>
                  <div class='col-sm-4'>
                    <input class='form-control' name='f' value="<?php echo $rr['tmp_lhr']; ?>">
                  </div>
                  <label class='col-sm-2 control-label'>Tanggal Lahir : </label>
                  <div class='col-sm-4'>
                    <input type='date' class='form-control' name='g' value="<?php echo $rr['tgl_lhr']; ?>">
                  </div>
                </div>

                <div class='form-group'>
                  <label class='col-sm-2 control-label'>Alamat :</label>
                  <div class='col-sm-4'>
                    <textarea class='form-control' name='h' value="<?php echo $rr['alamat']; ?>"><?php echo $rr['alamat']; ?></textarea>
                  </div>
                  <label class='col-sm-2 control-label'>Provinsi :</label>
                  <div class='col-sm-4'>
                   <select name='i' class='form-control' id="provinsi">
                    <option value='<?php echo $rr['id_prov']; ?>'><?php echo $rr['nama_provinsi']; ?></option>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM provinsi ORDER BY nama_provinsi");
                    while($row=mysqli_fetch_array($tampil)) {
                      ?>
                      <option id="provinsi" value="<?php echo $row['id_prov']; ?>"><?php echo $row['nama_provinsi']; ?></option>
                      <?php
                    }
                    ?>
                  </select>
                </div>
              </div>

              <div class='form-group'>
                <label class='col-sm-2 control-label'>Kabupaten :</label>
                <div class='col-sm-4'>
                 <select name='j' class='form-control' id='kabupaten'>
                  <option value='<?php echo $rr['id_kab']; ?>'><?php echo $rr['nama_kabupaten']; ?></option>
                  <?php
                  $tampil = mysqli_query($koneksi, "SELECT * FROM kabupaten ORDER BY nama_kabupaten");
                  while($row=mysqli_fetch_array($tampil)) {
                    ?>
                    <option id="kabupaten" class="<?php echo $row['id_prov']; ?>" value="<?php echo $row['id_kab']; ?>"><?php echo $row['nama_kabupaten']; ?></option>
                    <?php
                  }
                  ?>
                </select>
              </div>
              <label class='col-sm-2 control-label'>Kecamatan :</label>
              <div class='col-sm-4'>
               <select name='k' class='form-control' id='kecamatan'>
                <option value='<?php echo $rr['id_kec']; ?>'><?php echo $rr['nama_kecamatan']; ?></option>
                <?php
                $tampil = mysqli_query($koneksi, "SELECT * FROM kecamatan ORDER BY nama_kecamatan");
                while($row=mysqli_fetch_array($tampil)) {
                  ?>
                  <option id="kecamatan" class="<?php echo $row['id_kab']; ?>" value="<?php echo $row['id_kec']; ?>"><?php echo $row['nama_kecamatan']; ?></option>
                  <?php
                }
                ?>
              </select>
            </div>
          </div>

          <div class='form-group'>
            <label class='col-sm-2 control-label'>Kelurahan : </label>
            <div class='col-sm-4'>
              <select name='l' class='form-control' id='kelurahan'>
                <option value='<?php echo $rr['id_kel']; ?>'><?php echo $rr['nama_kelurahan']; ?></option>
                <?php
                $tampil = mysqli_query($koneksi, "SELECT * FROM kelurahan ORDER BY nama_kelurahan");
                while($row=mysqli_fetch_array($tampil)) {
                  ?>
                  <option id="kelurahan" class="<?php echo $row['id_kec']; ?>" value="<?php echo $row['id_kel']; ?>"><?php echo $row['nama_kelurahan']; ?></option>
                  <?php
                }
                ?>
              </select>
            </div>
            <label class='col-sm-2 control-label'>Telp./Hp. : </label>
            <div class='col-sm-4'>
              <input type='text' class='form-control' name='m' value='<?php echo $rr['hp']; ?>'>
            </div>
          </div>
          
          <div class='form-group'>
            <label class='col-sm-2 control-label'>Email  : </label>
            <div class='col-sm-4'>
              <input type='email' class='form-control' name='n' value='<?php echo $rr['email']; ?>'>
            </div>
          </div>

          <div class='form-group'>
            <label class='col-sm-2 control-label'>Ganti Foto Baru :</label>
            <div class='col-sm-4'>
              <input type='file' class='form-control' name='gambar'>
            </div>
            <label class='col-sm-2 control-label'>Foto Saat Ini :</label>
            <div class='col-sm-4'>
              <img class="img-responsive img-rounded" alt="Responsive image" src="../assets/img/user/<?php echo "$rr[gambar]";?>" width="50px"> <?php echo "$rr[gambar]";?></div>
            </div>
            
            <div class='form-group'>
              <label class='col-sm-2 control-label'>Foto Webcam  : </label>
              <div class='col-sm-4'>
                <div class="box box-solid box-primary">
                  <div class="box-header">
                    <h3 class="panel-title"><i class="fa fa-camera"></i> Camera Webcam</h3>
                  </div><!-- /.box-header -->
                  <div class="box-body">
                    <center> <div id="my_camera"></div><center><br><button class="class='form-control btn btn-flat bg-orange" type=button onClick="take_snapshot()"><i class="glyphicon glyphicon-camera"></i> Ambil Gambar</button>
                      <input type="hidden" name="webcam" class="image-tag">
                    </div><!-- /.box-body -->
                  </div><!-- /.box -->
                </div>                  
                <div class="col-md-2"></div>
                <div class="col-md-4">
                  <div class="box box-solid box-danger">
                    <div class="box-header">
                      <h3 class="panel-title"><i class="fa fa-camera"></i> Hasil Camera Webcam</h3>
                    </div><!-- /.box-header -->
                    <div class="box-body">
                      <center><div id="results" class="img-thumbnail"><i class="glyphicon glyphicon-camera"></i></center>
                      </div><!-- /.box-body -->
                    </div><!-- /.box -->
                  </div>
                </div>

                <div class='box-footer'>
                  <label class='col-sm-2 control-label'></label>
                  <div >
                    <button style="width: 200px" type="submit" class="btn btn-flat btn-primary col-sm-5"><i class="glyphicon glyphicon-floppy-save"></i> S I M P A N</button>
                  </div>
                  <a href="view-user" class='col-sm-5'><button style="width: 200px" type="button" class="btn btn-flat btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> B A T A L</button></a>
                </div>
              </div>
            </form>
          </div>
        </section>
        <!-- /.content -->
      </div>
      <!-- End content -->

      <script src="../assets/webcam/java.js"></script>
      <script src="../assets/webcam/webcam.min.js"></script>
      <script language="JavaScript">
        Webcam.set({
      // live preview size
      width: 300,
      height: 230,
      
      // device capture size
      dest_width: 300,
      dest_height: 230,
      
      // final cropped size
      crop_width: 184,
      crop_height: 230,
      
      // format and quality
      image_format: 'jpeg',
      jpeg_quality: 90
    });

        Webcam.attach( '#my_camera' );

        function take_snapshot() {
          Webcam.snap( function(data_uri) {
            $(".image-tag").val(data_uri);
            document.getElementById('results').innerHTML = '<img src="'+data_uri+'"/>';
          } );
        }
      </script>
      <?php include "footer.php";?>