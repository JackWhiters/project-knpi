<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
   <div class="callout callout-info">
    <h4 style="text-transform: uppercase;"><?php echo "$i[sekolah] "; ?></h4>
    Selamat datang di <?php echo "$i[nama] "; ?>
      <strong class="pull-right btn btn-sm bg-orange"><?php
      $tanggal = date ("d");
      $bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
      $bulan = $bulan[date("n")];
      $tahun = date("Y");
      echo $tanggal ." ". $bulan ." ". $tahun;
      date_default_timezone_set('Asia/Jakarta');
      $jam=date("H:i");
      echo " | ". $jam." "."";
      $a = date ("H");
      if (($a>=1) && ($a<=10)){
        echo ", Selamat Pagi";
      }
      else if(($a>10) && ($a<=13))
      {
        echo ", Selamat Siang";
      }
      else if (($a>13) && ($a<=15))
      {
        echo ", Selamat Sore";
      }
      else if (($a>15) && ($a<=17))
      {
        echo ", Selamat Petang";
      }
      else { echo ", Selamat Malam";
    }
    ?></strong>
  </div>
</section>

<!-- Main content -->
<section class="content">
  <!-- Apply any bg-* class to to the info-box to color it -->
  <!-- /.info-box -->
  <!-- Small boxes (Stat box) -->
  <div class="row">
    <div class="col-md-4">
      <div class="info-box bg-orange">
        <span class="info-box-icon"><i class="fa fa-users"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">DATA PELAJAR</span>
          <span class="info-box-number"><?php $data = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user where id_level IN ('3') ")); echo "$data"; ?> Anggota</span>
          <!-- The progress section is optional -->
          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            <?php $jk = mysqli_query($koneksi, "SELECT count(*) AS jk FROM user Where jk='Laki-laki' and id_level='3'"); while ($r = mysqli_fetch_assoc($jk))
            {?> Laki-Laki: <?php echo "$r[jk]"; }?> - <?php $jk = mysqli_query($koneksi, "SELECT count(*) AS jk FROM user Where jk='Perempuan' and id_level='3'"); while ($r = mysqli_fetch_assoc($jk))
            {?> Perempuan: <?php echo "$r[jk]"; }?>
          </span>
        </div><!-- /.info-box-content -->
      </div>
    </div>
    <div class="col-md-4">
      <div class="info-box bg-blue">
        <span class="info-box-icon"><i class="fa fa-user"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">DATA USER PELAJAR</span>
          <span class="info-box-number"><?php $user = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user where id_level IN ('3') ")); echo "$user"; ?> Orang</span>
          <!-- The progress section is optional -->
          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            <?php $jk = mysqli_query($koneksi, "SELECT count(*) AS jk FROM user Where jk='Laki-laki' and id_level='3'"); while ($r = mysqli_fetch_assoc($jk))
            {?> Laki-Laki: <?php echo "$r[jk]"; }?> - <?php $jk = mysqli_query($koneksi, "SELECT count(*) AS jk FROM user Where jk='Perempuan' and id_level='3'"); while ($r = mysqli_fetch_assoc($jk))
            {?> Perempuan: <?php echo "$r[jk]"; }?>
          </span>
        </div><!-- /.info-box-content -->
      </div>
    </div>
    <div class="col-md-4">
      <div class="info-box bg-red">
        <span class="info-box-icon"><i class="fa fa-user-secret"></i></span>
        <div class="info-box-content">
          <span class="info-box-text">DATA USER ADMIN & IT STAFF</span>
          <span class="info-box-number"><?php $user = mysqli_num_rows(mysqli_query($koneksi, "SELECT * FROM user where id_level IN ('1','2')  ")); echo "$user"; ?> Orang</span>
          <!-- The progress section is optional -->
          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
          <span class="progress-description">
            <?php $jk = mysqli_query($koneksi, "SELECT count(*) AS jk FROM user Where jk='Laki-laki' and id_level IN ('1','2')"); while ($r = mysqli_fetch_assoc($jk))
            {?> Laki-Laki: <?php echo "$r[jk]"; }?> - <?php $jk = mysqli_query($koneksi, "SELECT count(*) AS jk FROM user Where jk='Perempuan' and id_level IN ('1','2')"); while ($r = mysqli_fetch_assoc($jk))
            {?> Perempuan: <?php echo "$r[jk]"; }?>
          </span>
        </div><!-- /.info-box-content -->
      </div>
    </div>

    <div class="col-md-12">
      <div class="box box-solid">
        <!-- /.box-header -->
        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
          <ol class="carousel-indicators">
            <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
            <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
            <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
          </ol>
          <div class="carousel-inner">
            <div class="item active">
              <img src="../assets/img/slide/slide-1.png" alt="First slide" class="img-thumbnail">
              <div class="carousel-caption">
                <h4>SELAMAT DATANG DI APLIKASI <?php echo "$i[nama] "; ?></h4>
              </div>
            </div>
            <div class="item">
              <img src="../assets/img/slide/slide-2.png" alt="Second slide" class="img-thumbnail">
              <div class="carousel-caption">
                <h4>TETAPLAH BELAJAR HINGGA AKHIR HAYATMU</h4>
              </div>
            </div>
            <div class="item">
              <img src="../assets/img/slide/slide-3.png" alt="tree slide" class="img-thumbnail">
              <div class="carousel-caption">
                <h4>TEKNOLOGI MENJADI PENGGERAK KEHIDUPAN</h4>
              </div>
            </div>
          </div>
          <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
            <span class="fa fa-angle-left"></span>
          </a>
          <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
            <span class="fa fa-angle-right"></span>
          </a>
        </div>

        <!-- /.box-body -->
      </div>
      <!-- /.box -->
    </div>

    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h4>
            TAMBAH DATA
          </h4>
          <p><?php echo "$i[nama] "; ?></p>
        </div>
        <div class="icon">
          <i class="fa fa-user-plus"></i>
        </div>
        <a href="create-data"class="small-box-footer">Tambah Sekarang <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h4>
            LIHAT DATA
          </h4>
          <p><?php echo "$i[nama] "; ?></p>
        </div>
        <div class="icon">
          <i class="fa fa-list-alt"></i>
        </div>
        <a href="view-data" class="small-box-footer">Lihat Sekarang <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-maroon">
        <div class="inner">
          <h4>
            CETAK KARPEL
          </h4>
          <p><?php echo "$i[nama] "; ?></p>
        </div>
        <div class="icon">
          <i class="fa fa-print"></i>
        </div>
        <a href="tag-data" class="small-box-footer">Cetak Sekarang <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-navy">
        <div class="inner">
          <h4>
            CETAK KARPUS
          </h4>
          <p><?php echo "$i[nama] "; ?></p>
        </div>
        <div class="icon">
          <i class="fa fa-print"></i>
        </div>
        <a href="tag-data1" class="small-box-footer">Cetak Sekarang <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h4>
            BLANGKO KARPEL
          </h4>
          <p><?php echo "$i[nama] "; ?></p>
        </div>
        <div class="icon">
          <i class="fa fa-credit-card"></i>
        </div>
        <a href="update-blangko" class="small-box-footer">Ubah Blangko <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div><!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-orange">
        <div class="inner">
          <h4>
            BLANGKO KARPUS
          </h4>
          <p><?php echo "$i[nama] "; ?></p>
        </div>
        <div class="icon">
          <i class="fa fa-credit-card"></i>
        </div>
        <a href="update-blangko1" class="small-box-footer">Ubah Blangko <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h4>
            IDENTITAS APLIKASI
          </h4>
          <p><?php echo "$i[nama] "; ?></p>
        </div>
        <div class="icon">
          <i class="fa fa-home"></i>
        </div>
        <a href="update-identitas" class="small-box-footer">Ubah Sekarang <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-aqua">
        <div class="inner">
          <h4>
            DATA USERS
          </h4>
          <p><?php echo "$i[nama] "; ?></p>
        </div>
        <div class="icon">
          <i class="fa fa-users"></i>
        </div>
        <a href="view-user" class="small-box-footer">Lihat Sekarang <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-purple">
        <div class="inner">
          <h4>
            PROVINSI
          </h4>
          <p><?php echo "$i[nama] "; ?></p>
        </div>
        <div class="icon">
          <i class="fa fa-database"></i>
        </div>
        <a href="view-provinsi" class="small-box-footer">Tambah Sekarang <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-red">
        <div class="inner">
          <h4>
            KABUPATEN
          </h4>
          <p><?php echo "$i[nama] "; ?></p>
        </div>
        <div class="icon">
          <i class="fa fa-pie-chart"></i>
        </div>
        <a href="view-kabupaten" class="small-box-footer">Tambah Sekarang <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-orange">
        <div class="inner">
          <h4>
            KECAMATAN
          </h4>
          <p><?php echo "$i[nama] "; ?></p>
        </div>
        <div class="icon">
          <i class="fa fa-cubes"></i>
        </div>
        <a href="view-kecamatan" class="small-box-footer">Tambah Sekarang <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
      <!-- small box -->
      <div class="small-box bg-green">
        <div class="inner">
          <h4>
            KELURAHAN
          </h4>
          <p><?php echo "$i[nama] "; ?></p>
        </div>
        <div class="icon">
          <i class="fa fa-th-large"></i>
        </div>
        <a href="view-kelurahan" class="small-box-footer">Tambah Sekarang <i class="fa fa-arrow-circle-right"></i></a>
      </div>
    </div>
    <!-- ./col -->
  </div>
</section>
</div>
