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
        <li><a href="#">Cetak Kartu</a></li>
      </ol>
    </section>
    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box box-success">
            <!-- /.box-header -->
            <div class="box-body">
              <form action="print-data" target="_Blank" method="post" class="form-horizontal" role="form">
               <button type="submit" class="pull-right btn btn-flat bg-purple"><i class="fa fa-print"></i> CETAK KARTU PELAJAR</button><br><hr>
                <div class="table-responsive">
                  <table id="example1" class="table table-bordered table-hover">
                    <thead class="bg-navy">
                      <tr>
                        <th><Center>No.</Center></th>
                        <th width="50px">Foto</th>
                        <th>NIS/NISN</th>
                        <th>NAMA</th>
                        <th>JK</th>
                        <th>TTL</th>
                        <th>Input Data</th>
                        <th><Center>Pilih</Center></th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php
                        $tampil = mysqli_query($koneksi, "SELECT * FROM user where id_level ='3' ORDER BY id DESC");
                        $no=1;
                        while ($r=mysqli_fetch_array($tampil))
                        {
                          $t = date("d - m - Y", strtotime($r['tgl_lhr']));
                          $tgl = date("dmY", strtotime($r['tgl_lhr']));
                          $ti = date("d - m - Y", strtotime($r['tgl_input']));
                        echo "
                        <tr>
                          <td style='text-align:center'>$no.</td>";
                             if (empty($r['gambar'])){
                              echo "<td><center><img class='img-thumbnail' src='../assets/img/user/blank.png' width=40 height=20></center></td>";
                             }else{
                              echo "<td><center><img class='img-thumbnail' src='../assets/img/user/$r[gambar]' width=40 height=20></center></td>";
                             }
                          echo "
                          <td><span class='label bg-red'>$r[nis]</span></td>
                          <td>$r[nama]</td>
                          <td>$r[jk]</td>
                          <td>$r[tmp_lhr]-  $t</td>
                          <td><center>$ti/$r[waktu]</center></td>
                          <td>
                            <center>
                              <input name='selector[]' type='checkbox' name='tandai' class='minimal flat' value='$r[id]'>
                            </center>
                          </td>
                        </tr>";
                        $no++;
                        }
                      ?>
                    </tbody>
                  </table>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  <?php include "footer.php";?>