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
        <li class='active'>Tampil Data</li>
      </ol>
    </section>


    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <div class="box-header with-border">
              <h3 class="box-title"><i class="glyphicon glyphicon-tasks"></i> DATA PELAJAR</h3>
              <a href='create-data' class="pull-right btn bg-blue"><i class="glyphicon glyphicon-plus"></i> Tambah Data</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead class="bg-red">
                      <tr>
                        <th><Center>No.</Center></th>
                        <th width="50px">Foto</th>
                        <th>NIS/NISN</th>
                        <th>NAMA</th>
                        <th>JK</th>
                        <th>TTL</th>
                        <th>INPUT DATA</th>
                        <th><Center>AKSI</Center></th>
                      </tr>
                    </thead>
                    <tbody>
                  <?php
                  $tampil = mysqli_query($koneksi, "SELECT * FROM user WHERE id_level='3' ORDER BY id DESC");
                  $no=1;
                  while ($rr=mysqli_fetch_array($tampil))
                  {
                    $t = date("d - m - Y", strtotime($rr['tgl_lhr']));
                    $ti = date("d - m - Y", strtotime($rr['tgl_input']));
                    ?>
                    <tr>
                      <td><center><?php echo "$no.";?></center></td>
                      <?php if (empty($rr['gambar'])){
                        echo "<td><center><img class='img-thumbnail' src='../assets/img/user/blank.png' width=40></center></td>";
                      }else
                      {
                        echo "<td><center><img class='img-thumbnail' src='../assets/img/user/$rr[gambar]' width=40></center></td>";
                      } 
                      ?>
                      <td><span class="label bg-orange"><?php echo $rr["nis"];?></span></td>
                      <td><?php echo $rr["nama"];?></td>
                      <td><?php echo $rr["jk"];?></td>
                      <td><?php echo $rr["tmp_lhr"];?> <br><?php echo $t;?></td>
                      <td><?php echo $ti;?><br><?php echo $rr["waktu"];?></td>
                      <td><center>
                        <a class='btn bg-orange btn-xs' data-toggle='tooltip' title='Lihat Rician Data' href='detail-data?id=<?php echo $rr["id"];?>'><span class='glyphicon glyphicon-list-alt'></span></a>
                        <a class='btn bg-aqua btn-xs' data-toggle='tooltip' title='Ubah Data' href='update-data?id=<?php echo $rr["id"];?>'><span class='glyphicon glyphicon-edit'></span></a>
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



    <!-- Modal -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
            <h4 class="modal-title" id="myModalLabel">Modal title</h4>
          </div>
          <div class="modal-body">
            <div class="panel panel-info">
              <div class="panel-heading">
                <h3 class="panel-title"><i class="glyphicon glyphicon-qrcode"></i> QR Code</h3>
              </div>

              <div class="panel-body">
                <?php
                $r=mysqli_query($koneksi, "SELECT * FROM data 
                  WHERE id_anggota='$_GET[id]'");
                  ?>
                  <center><img src="../assets/img/qrcode/<?php echo "$r[id_anggota]";?>" width="30%">
                  </div>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </div>