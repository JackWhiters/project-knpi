<?php include "header.php"; ?>
<div class="wrapper">
  <!-- Star menu -->
  <?php include "menu.php";?>
  <!-- End menu -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        APK KARTANU
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Cetak KartaNU</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <!-- /.box-header -->
            <div class="box-body">
               <form class='form-horizontal' role='form' method=POST action='aksi/user_unggah.php' enctype='multipart/form-data'>
              <div class='box-body'>
                <div class="alert alert-warning alert-dismissible">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                  <h4><i class="icon fa fa-info-circle"></i> Informasi Penting</h4>
                  Untuk melakukan penggungahan data kartanu melalui file excel.csv, harap mengikuti petunjuk berikut:
                  <div class="box-body">
                    <ol>
                      <li>Silahkan download contoh file excel.csv <a href="download/download.php?nama_file=file_csv.csv">disini</a></li>
                      <li>Silahkan isi data pelajar sesuai dengan kolom header/judul</li>
                      <li>Jika sudah di isi, silahkan hilangkan kolom header/judul</li>
                      <li>jika langkah-langkah tidak sesuai/atau kolom header tidak dihilangkan maka data kolom header/judul juga akan terinput</li>
                      <li>kemudian simpan file excel dengan format file (.csv)</li>
                      <li>silahkan pilih file yang telah disimpan</li>
                      <li>kemudian silahkan klik upload/unggah</li>
                    </ol>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'>Unggah File Excel :</label>
                  <div class='col-sm-8'>
                    <input type='file' class='form-control' name='filename' required>
                  </div>
                </div>
                <div class='form-group'>
                  <label class='col-sm-3 control-label'></label>
                  <div class='col-sm-6'>
                    <button style="width: 100px" type="submit" class="btn btn-flat btn-primary" name="submit">UNGGAH</button>
                        <a href="home"><button style="width: 100px" type="button" class="btn btn-flat btn-danger">BATAL</button></a>
                  </div>
                </div>
              </div>
            </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include "footer.php";?>