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
        <li class='active'>FAQ</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-md-4">
          <div class="box box-solid box-default">
            <div class="box-header">
              <h3 class="box-title">Bagaimana Cara Ganti Nama Sekolah?</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <ol>
                <li>Klik Menu Pengaturuan.</li>
                <li>Pilih Sub Menu Identitas.</li>
                <li>Selanjutnya Silahkan klik Tombol Simpan Untuk Memperbahurui Identitas.</li>
              </ol>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div>
        <div class="col-md-4">
          <div class="box box-solid box-primary">
            <div class="box-header">
              <h3 class="box-title">Bagaimana Cara Tambah Provinsi?</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <ol>
                <li>Klik Menu Pengaturuan.</li>
                <li>Pilih Provinsi.</li>
                <li>Selanjutnya Isi Kode Provinsi Dan Nama Provinsi.</li>
              </ol>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div>
        <div class="clearfix"></div>
        <div class="col-md-4">
          <div class="box box-solid box-warning">
            <div class="box-header">
              <h3 class="box-title">Bagaimana Cara Tambah Kabupaten?</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <ol>
                <li>Klik Menu Pengaturuan.</li>
                <li>Pilih Kabupaten.</li>
                <li>Selanjutnya Isi Kode-Nama Provinsi, Kode Kabupaten Dan Nama Kabupaten.</li>
              </ol>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div>
        <div class="clearfix"></div>
        <div class="col-md-4">
          <div class="box box-solid box-info">
            <div class="box-header">
              <h3 class="box-title">Bagaimana Cara Tambah Kecamatan?</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
              <ol>
                <li>Klik Menu Pengaturuan.</li>
                <li>Pilih Kabupaten.</li>
                <li>Selanjutnya Isi Kode-Nama Kabupaten, Kode Kecamatan Dan Nama Kecamatan.</li>
              </ol>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div>
        <div class="col-md-4">
          <div class="box box-solid box-warning">
            <div class="box-header">
              <h3 class="box-title">Bagaimana Cara Tambah Kelurahan?</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
             <ol>
                <li>Klik Menu Pengaturuan.</li>
                <li>Pilih Kabupaten.</li>
                <li>Selanjutnya Isi Kode-Nama Kecamatan, Kode Kelurahan Dan Nama Kelurahan.</li>
              </ol>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div>
        <div class="col-md-4">
          <div class="box box-solid box-danger">
            <div class="box-header">
              <h3 class="box-title">Bagaimana Cara Cetak Kartu Pelajar?</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
               <ol>
                <li>Klik Menu Cetak.</li>
                <li>Tandai Data Pelajarayang Akan Dicetak.</li>
                <li>Selanjutnya Klik Tombol Cetak, Pilih Printer Dan Klik Print.</li>
              </ol>
            </div><!-- /.box-body -->
        </div><!-- /.box -->
        </div>
        <div class="clearfix"></div>
        <div class="col-md-4">
          <div class="box box-solid box-danger">
            <div class="box-header">
              <h3 class="box-title">Bagaimana Cara Tambah User?</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
               <ol>
                <li>Klik Menu Pengatuaran.</li>
                <li>Klik Tombol Tambah User. </li>
                <li>Selanjutnya Isi Data User dan Klik Tombol Simpan.</li>
              </ol>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div>
        <div class="col-md-4">
          <div class="box box-solid box-primary">
            <div class="box-header">
              <h3 class="box-title" style="font-size: 17px;">Bagaimana Cara Tambah Data Pelajar?</h3>
            </div><!-- /.box-header -->
            <div class="box-body">
               <ol>
                <li>Klik Menu Tambah Data.</li>
                <li>Isi Data Pelajar Dan Lengkapi Semua Form Isian.</li>
                <li>Selanjutnya Klik Simpan.</li>
              </ol>
            </div><!-- /.box-body -->
          </div><!-- /.box -->
        </div>
      </div><!-- /.row -->
    </section>
  </div>
  <?php include "footer.php";?>

