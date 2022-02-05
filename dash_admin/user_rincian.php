<?php include "header.php" ?>
<div class="wrapper">
  <!-- Star menu -->
  <?php include "menu.php";?>
  <!-- End menu -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        <?php echo "$i[nama] "; ?>
        <small>Control Panel</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li><a href="#">Rincian Data</a></li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title col-sm-10" ><i class="glyphicon glyphicon-tasks"></i> RINCIAN DATA PELAJAR</h3>
              <a href="view-data" class="btn bg-orange col-sm-2"><i class="fa fa-chevron-left"></i> K E M B A L I</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class='form-group'>
                <?php
                $rr=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM user 
                  INNER JOIN level ON user.id_level= level.id_level
                  INNER JOIN kelurahan ON user.id_kel= kelurahan.id_kel
                  INNER JOIN kabupaten ON user.id_kab= kabupaten.id_kab 
                  INNER JOIN kecamatan ON user.id_kec= kecamatan.id_kec 
                  INNER JOIN provinsi ON user.id_prov= provinsi.id_prov WHERE id='$_GET[id]'"));
                $tgl = date("d - m - Y", strtotime($rr['tgl_lhr']));
                $tglin = date("d - m - Y", strtotime($rr['tgl_input']));
                ?>
                <div class="col-sm-8 table-responsive">
                  <table class="table table-striped table-hover">
                    <tr>
                     <td class="col-sm-5">NIS/NISN</td>
                     <td>: <?php echo "$rr[nis]";?></td>
                   </tr>
                   <tr>
                     <td>Nama</td>
                     <td>: <?php echo "$rr[nama]";?></td>
                   </tr>
                   <td>Jenis Kelamin</td>
                   <td>: <?php echo "$rr[jk]";?></td>
                 </tr>
                 <tr>
                   <td>Tempat Lahir</td>
                   <td>: <?php echo "$rr[tmp_lhr]";?></td>
                 </tr>
                 <tr>
                   <td>Tanggal Lahir</td>
                   <td>: <?php echo "$tgl";?></td>
                 </tr>
                 <tr>
                   <td>Alamat</td>
                   <td>: <?php echo "$rr[alamat]";?></td>
                 </tr>
                 <tr>
                   <td class="col-sm-4" >Kelurahan/Desa</td>
                   <td>: <?php echo "$rr[nama_kelurahan]";?></td>
                 </tr>
                 <tr>
                   <td class="col-sm-4">Kecamatan</td>
                   <td>: <?php echo "$rr[nama_kecamatan]";?></td>
                 </tr>
                 <tr>
                   <td class="col-sm-4">Kabupaten</td>
                   <td>: <?php echo "$rr[nama_kabupaten]";?></td>
                 </tr>
                 <tr>
                   <td class="col-sm-4">Provinsi</td>
                   <td>: <?php echo "$rr[nama_provinsi]";?></td>
                 </tr>
                 <tr>
                   <td class="col-sm-4">Telp./Hp</td>
                   <td>: <?php echo "$rr[hp]";?></td>
                 </tr>
                 <tr>
                   <td class="col-sm-4">Email</td>
                   <td>: <?php echo "$rr[email]";?></td>
                 </tr>
                 <tr>
                   <td class="col-sm-4">Username</td>
                   <td>: <?php echo "$rr[username]";?></td>
                 </tr>
                 <tr>
                   <td class="col-sm-4">Password</td>
                   <td>: <?php echo "$rr[password]";?></td>
                 </tr>
                 <tr>
                   <td class="col-sm-4">Level</td>
                   <td>: <label  class="btn btn-xs bg-purple"> <?php echo "$rr[level]";?></label></td>
                 </tr>
                 <tr>
                   <td class="col-sm-4">Tanggal/Waktu Input/Update Data</td>
                   <td>: <label  class="btn btn-xs bg-orange"> <?php echo "$tglin";?>/<?php echo "$rr[waktu]";?></label></td>
                 </tr>
               </table>
             </div>

             <div class="col-sm-4">
              <div class="box box-solid box-primary">
                <div class="box-header">
                  <h3 class="box-title">FOTO</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <center><img class="img-responsive img-rounded img-thumbnail" alt="Responsive image" src="../assets/img/user/<?php echo "$rr[gambar]";?>" width="200px" alt="img-responsive"></center>
                </div>
              </div>
            </div>
            <div class="col-sm-4">
              <div class="box box-solid box-danger">
                <div class="box-header">
                  <h3 class="box-title">QRCODE</h3>
                </div><!-- /.box-header -->
                <div class="box-body">
                  <center><img class="img-responsive img-rounded img-thumbnail" alt="Responsive image" src="../assets/img/qrcode/<?php echo "$rr[qrcode]";?>" width="250px" alt="img-responsive"></center>
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>  
    </div>
  </section>
</div>
<?php include "footer.php";?>