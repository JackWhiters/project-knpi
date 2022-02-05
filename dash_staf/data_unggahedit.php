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
              <h3 class='box-title'><i class='glyphicon glyphicon-edit'></i> FORM UBAH DATA CSV</h3>
            </div>
            <form class='form-horizontal' role='form' method=POST action='aksi/user_update.php' enctype='multipart/form-data'>
              <div class='box-body'>
                <?php
                  $rr=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM user WHERE id='$_GET[id]'"));
                ?>
                <input type='hidden' class='form-control' name='id' value="<?php echo $rr['id']; ?>">
                <div class='form-group'>
                  <label class='col-sm-2 control-label'>NIS/NISN:</label>
                  <div class='col-sm-4'>
                    <input type='text' name='a' class='form-control' value="<?php echo $rr['nis']; ?>">
                  </div>
                  <label class='col-sm-2 control-label'>Level : </label>
                  <div class='col-sm-4'>
                     <select name='b' class='form-control'>
                      <?php 
                        $tampil = mysqli_query($koneksi, "SELECT * FROM level where id_level='3' ORDER BY id_level ");
                        while($r=mysqli_fetch_array($tampil))
                        {
                          echo "<option value='".$r['id_level']."' selected>".$r['level']."</option>";
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
                  <label class='col-sm-2 control-label'></label>
                  <div >
                    <button style="width: 200px" type="submit" class="btn btn-flat btn-primary col-sm-5"><i class="glyphicon glyphicon-floppy-save"></i> S I M P A N</button>
                  </div>
                  <a href="view-data" class='col-sm-5'><button style="width: 200px" type="button" class="btn btn-flat btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> B A T A L</button></a>
                </div>
              </div>
            </form>
          </div>
    </section>
    <!-- /.content -->
  </div>
<!-- End content -->
<?php include "footer.php";?>