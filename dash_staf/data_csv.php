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
        <li><a href="#">Lihat Data</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="glyphicon glyphicon-tasks"></i> DATA UPLOAD CSV (DATA HARUS DI EDIT UNTUK MASUK TABEL PELAJAR)</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body"><div class="table-responsive">
              <table id="example1" class="table table-hover table-striped">
                <thead class="bg-purple">
                  <tr>
                    <th><center>No.</center></th>
                    <th width="50px">Foto</th>
                    <th>NIS/NISN</th>
                    <th>Nama & Gelar</th>
                    <th>JK</th>
                    <th>TTL</th>
                    <th width="100px">Aksi</th>
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $tampil = mysqli_query($koneksi, "SELECT * FROM user WHERE id_level='4' ORDER BY id DESC");
                  $no=1;
                  while ($rr=mysqli_fetch_array($tampil))
                  {
                    $t = date("d - m - Y", strtotime($rr['tgl_lhr']));
                    $tgl = date("Y", strtotime($rr['tgl_lhr']));
                    ?>
                    <tr>
                      <td><center><?php echo "$no.";?></center></td>
                      <td><img class="img-responsive img-circle img-thumbnail" alt="Responsive image" src="../assets/img/data/<?php echo "$rr[gambar]";?>" width="50px" height="50px"></td>
                      <td><span class="label bg-orange"><?php echo $rr["kel"];?><?php echo $tgl;?><?php echo $rr["reg"];?></span></td>
                      <td><?php echo $rr["gd"];?> <?php echo $rr["nama"];?>, <?php echo $rr["gb"];?></td>
                      <td><?php echo $rr["jk"];?></td>
                      <td><?php echo $rr["tmp_lhr"];?>, <?php echo $t;?></td>
                      <td>
                      <a class='btn bg-aqua btn-xs' data-toggle='tooltip' title='Ubah Data' href='update-datacsv?id=<?php echo $rr["id"];?>'><span class='glyphicon glyphicon-edit'></span></a>
                      <a class='btn bg-red btn-xs' data-toggle='tooltip' title='Hapus Data' href='aksi/user_hapus.php?id=<?php echo $rr["id"];?>' onclick="return confirm('Apa anda yakin akan menghapus data ini?')"><span class='glyphicon glyphicon-trash'></span></a></center>
                    </td>
                    <?php  $no++; } ?>
                  </tr>
                </tbody>
              </table></div>
            </div>
          </div>
        </div>  
      </div>
    </section>
  </div>
  <?php include "footer.php";?>

  