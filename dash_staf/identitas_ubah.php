<?php include "header.php"; ?>
<div class="wrapper">
  <!-- Star menu -->
  <?php include "menu.php";?>
  <!-- End menu -->

  <!-- Start content -->
  <div class='content-wrapper'>
    <!-- Content Header (Page header) -->
    <section class='content-header'>
      <h1 style="text-decoration: uppercase;">
        <?php echo "$i[nama] "; ?>
        <small>Control panel</small>
      </h1>
      <ol class='breadcrumb'>
        <li><a href='home'><i class='fa fa-dashboard'></i> Home</a></li>
        <li class='active'>Tambah Data</li>
      </ol>
    </section>
    <?php
    $r=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM identitas 
                  INNER JOIN kelurahan ON identitas.id_kel= kelurahan.id_kel
                  INNER JOIN kabupaten ON identitas.id_kab= kabupaten.id_kab 
                  INNER JOIN kecamatan ON identitas.id_kec= kecamatan.id_kec 
                  INNER JOIN provinsi ON identitas.id_prov= provinsi.id_prov WHERE id = '1'"));
    ?>
    <!-- Main content -->
    <section class='content'>
      <div class='row'>
        <div class='col-md-12'>
          <div class='box box-success'>
            <div class='box-header with-border'>
              <h3 class='box-title'><i class='fa fa-edit'></i> FORM UPDATE IDENTITAS APLIKASI</h3>
            </div>
            <form class='form-horizontal' role='form' method=POST action='aksi/identitas_update.php' enctype='multipart/form-data'>
              <div class='box-body'>

                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Nama Aplikasi :</label>
                  <div class='col-sm-6'>
                    <input type='hidden' name='id' class='form-control' value="<?php echo "$r[id]";?>">
                    <input type='text' class='form-control' name='a' value="<?php echo "$r[nama]";?>">
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Nama Sekolah/Universitas :</label>
                  <div class='col-sm-6'>
                    <input type='text' style='text-transform: uppercase;' class='form-control' name='b' value="<?php echo "$r[sekolah]";?>">
                  </div>
                </div>

                <div class='form-group'>
                  <label class='col-sm-3 control-label'>email  : </label>
                  <div class='col-sm-6'>
                    <input type='text' class='form-control' name='c' value="<?php echo "$r[email1]";?>">
                  </div>
                </div>

                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Telepon :</label>
                  <div class='col-sm-6'>
                    <input type="text" class='form-control' name='d' value="<?php echo "$r[hp]";?>">               
                  </div>
                </div>

                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Website :</label>
                  <div class='col-sm-6'>
                    <input type="text" class='form-control' name='e' value="<?php echo "$r[web]";?>">               
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Alamat :</label>
                  <div class='col-sm-6'>
                    <textarea type="text" class='form-control' name='f' value="<?php echo "$r[alamat]";?>"><?php echo "$r[alamat]";?></textarea>             
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Provinsi :</label>
                  <div class='col-sm-6'>
                    <select id="provinsi" name='g' class='form-control'>
                      <option value='<?php echo $r['id_prov']; ?>'><?php echo $r['nama_provinsi']; ?></option>
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
                  <label class='col-sm-3 control-label'>Kabupaten :</label>
                  <div class='col-sm-6'>
                    <select id='kabupaten' name='h' class='form-control'>
                      <option value='<?php echo $r['id_kab']; ?>'><?php echo $r['nama_kabupaten']; ?></option>
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
                </div>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Kecamatan :</label>
                  <div class='col-sm-6'>
                    <select id='kecamatan' name='i' class='form-control'>
                      <option value='<?php echo $r['id_kec']; ?>'><?php echo $r['nama_kecamatan']; ?></option>
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
                  <label class='col-sm-3 control-label'>Kelurahan : </label>
                  <div class='col-sm-6'>
                    <select id='kelurahan' name='j' class='form-control'>
                      <option value='<?php echo $r['id_kel']; ?>'><?php echo $r['nama_kelurahan']; ?></option>
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
                </div>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Logo Sekolah/Universitas :</label>
                  <div class='col-sm-3'>
                    <div class="panel panel-info">
                     <div class="panel-heading">
                      <h3 class="panel-title"><i class="fa fa-hand-o-right"></i> Logo Saat ini</h3>
                    </div>
                    <div class="panel-body">
                     <center> <img width='100' src="../assets/img/logo/<?php echo "$r[gambar]";?>" alt="" class="img-responsive img-thumbnail"></div><center>
                     </div>
                   </div>
                   <div class='col-sm-3'>
                    <div class="panel panel-info">
                     <div class="panel-heading">
                      <h3 class="panel-title"><i class="fa fa-hand-o-left"></i> Ganti Logo Saat ini</h3>
                    </div>
                    <div class="panel-body">
                     <center>
                      <input type="file" name="gambar" class='form-control'>
                      <center>
                      </div>
                    </div>
                  </div>    
              </div>
              <div class="box-footer">
                <label class='col-sm-3 control-label'></label>
                <div class='col-sm-9'>
                  <button style="width: 200px" type="submit" class="btn btn-flat btn-primary"><i class="fa fa-floppy-o"></i> S I M P A N</button>
                  <a href="index.php"><button style="width: 200px" type="button" class="btn btn-flat btn-danger"><i class="fa  fa-remove (alias)"></i> B A T A L</button></a>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </section>
    <!-- /.content -->
  </div>
  <!-- End content -->
  <!-- Star Webcam -->
  <script src="../webcam/java.js"></script>
  <script src="../webcam/webcam.min.js"></script>
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
  <!-- End Webcame -->
  <!-- Start footer -->
  <?php include "footer.php";?>