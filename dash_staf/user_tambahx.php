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
        <li class='active'>Tambah Data</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class='content'>
      <div class='row'>
        <div class='col-md-12'>
          <div class='box box-success'>
            <div class='box-header with-border'>
              <h3 class='box-title'><i class='fa fa-edit'></i> FORM TAMBAH USER</h3>
            </div>
            <form class='form-horizontal' role='form' method=POST action='aksi/user_simpanx.php' enctype='multipart/form-data'>
              <div class='box-body'>
                <div class='form-group'>
                  <label class='col-sm-2 control-label'>Level User :</label>
                  <div class='col-sm-4'>
                   <select name='b' class='form-control'>
                    <?php 
                    $tampil = mysqli_query($koneksi, "SELECT * FROM level where id_level='2' ORDER BY id_level ");
                    while($r=mysqli_fetch_array($tampil))
                    {
                      echo "<option value='".$r['id_level']."' selected>".$r['level']."</option>";
                    }
                    ?>
                  </select>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label'>Username :</label>
                <div class='col-sm-4'>
                  <input type='text' class='form-control' name='c' placeholder='Tuliskan Username'>
                </div>
                <label class='col-sm-2 control-label'>Password : </label>
                <div class='col-sm-4'>
                  <input type='password' class='form-control' name='password'  placeholder='Tuliskan Password'>
                </div>
              </div>
              <div class='form-group'>
                <label class='col-sm-2 control-label'>Nama :</label>
                <div class='col-sm-4'>
                  <input type='text' class='form-control' name='d' placeholder='Tuliskan Nama Lengkap'>
                </div>
                <label class='col-sm-2 control-label'>JK :</label>
                <div class='col-sm-4'>
                 <select name='e' class='form-control'>
                  <option value='' selected>Pilih Jenis Kelamin</option>
                  <option value='Laki-laki' >Laki-laki</option>
                  <option value='Perempuan' >Perempuan</option>
                </select>
              </div>
            </div>
            <div class='form-group'>
              <label class='col-sm-2 control-label'>Tempat lahir:</label>
              <div class='col-sm-4'>
                <input class='form-control' name='f'  placeholder='Tuliskan Tempat Lahir'>
              </div>
              <label class='col-sm-2 control-label'>Tanggal Lahir : </label>
              <div class='col-sm-4'>
                <input type='date' class='form-control' name='g'  value="<?php echo date('Y-m-d'); ?>">
              </div>
            </div> 
            <div class='form-group'>
              <label class='col-sm-2 control-label'>Alamat :</label>
              <div class='col-sm-4'>
                <textarea class='form-control' name='h'  placeholder='Tuliskan Alamat Rumah'></textarea>
              </div>
              <label class='col-sm-2 control-label'>Provinsi :</label>
              <div class='col-sm-4'>
               <select id="provinsi" name='i' class='form-control'>
                <option value="">Pilih Provinsi</option>
                <?php
                $tampil = mysqli_query($koneksi, "SELECT * FROM provinsi ORDER BY nama_provinsi");
                while($row=mysqli_fetch_array($tampil)) {
                  ?>
                  <option value="<?php echo $row['id_prov']; ?>"><?php echo $row['nama_provinsi']; ?></option>
                  <?php
                }
                ?>
              </select>
            </div>
          </div>
          <div class='form-group'>
            <label class='col-sm-2 control-label'>Kabupaten :</label>
            <div class='col-sm-4'>
             <select id="kabupaten" name='j' class='form-control' >
              <option value='' selected>Pilih Kabupaten</option>
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
           <select id="kecamatan" name='k' class='form-control'>
            <option value='' selected>Pilih Kecamatan</option>
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
          <select id="kelurahan" name='l' class='form-control'>
            <option value='' selected>Pilih Kelurahan</option>
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
          <input type='text' class='form-control' name='m' placeholder='Tuliskan Nomor Telp./Hp.'>
        </div>
      </div>
      <div class='form-group'>
        <label class='col-sm-2 control-label'>Email  : </label>
        <div class='col-sm-4'>
          <input type='email' class='form-control' name='n' placeholder='Contoh: hadisaputra.bambang@gmail.com'>
        </div>
        <label class='col-sm-2 control-label'>Unggah Foto :</label>
        <div class='col-sm-4'>
          <input type='file' class='form-control' name='gambar'>
        </div>
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

        </div>

        <div class='box-footer'>
          <label class='col-sm-2 control-label'></label>
          <div class='col-sm-10'>
            <button style='width: 150px;' type="submit" class="btn btn-flat btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> S I M P A N</button>
            <a style='width: 150px;' href="view-data" type="button" class="btn btn-flat btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> B A T A L</a>
          </div>
        </div>
      </div>
    </form>
  </div>
</div>
</section>
<!-- /.content -->
</div>
<!-- End content --><script src="../assets/webcam/java.js"></script>
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