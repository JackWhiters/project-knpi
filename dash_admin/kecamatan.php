<?php include "header.php"; ?>
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
              <h3 class="box-title"><i class="glyphicon glyphicon-tasks"></i> DATA KECAMATAN</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="col-sm-12">
              <div class="panel panel-default">
              <div class="panel-heading bg-orange"><i class="glyphicon glyphicon-edit"></i> <b>Form Tambah Kecamatan</b></div>
                <div class="panel-body">
                  <form class='form-horizontal' role='form' method=POST action='aksi/kecamatan_simpan.php' enctype='multipart/form-data'>
                    <div class='form-group'>
                      <label class='col-sm-4 control-label'>ID - Kabupaten :</label>
                      <div class='col-sm-6'>
                        <select name='c' class="form-control select2" style="width: 100%;" required>
                          <option value='' selected="selected">Pilih Kabupaten</option>
                          <?php 
                          $tampil = mysqli_query($koneksi, "SELECT * FROM kabupaten ORDER BY id_kab ");
                          while($r=mysqli_fetch_array($tampil))
                            {
                              echo "<option value='".$r['id_kab']."'>".$r['id_kab']." - ".$r['nama_kabupaten']."</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div> 
                    <div class='form-group'>
                      <label class='col-sm-4 control-label'>ID Kecamatan :</label>
                      <div class='col-sm-6'>
                        <input type='text' class='form-control' name='a' placeholder='Nomor ID Kecamatan' required>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label class='col-sm-4 control-label'>Nama Kecamatan :</label>
                      <div class='col-sm-6'>
                        <input type='text' class='form-control' name='b' placeholder='Nama Kecamatan' required>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label class='col-sm-4 control-label'></label>
                      <div class='col-sm-6'>
                        <button style="width: 100px" type="submit" class="btn btn-flat btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> SIMPAN</button>
                        <a href="home"><button style="width: 100px" type="button" class="btn btn-flat btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> BATAL</button></a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
            <div class="col-sm-12 table-responsive">
              <table id="example1" class="table table-hover table-striped table-bordered">
                <thead class="bg-orange">
                    <tr>
                      <th><center>No.</center></th>
                      <th><center>ID KECAMATAN</center></th>
                      <th>NAMA KECAMATAN</th>
                      <th>ID KAB/KOTA</th>
                      <th>NAMA KABUPATEN</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM kecamatan INNER JOIN kabupaten ON kecamatan.id_kab = kabupaten.id_kab ORDER BY id_kec ASC");
                    $no=1;
                    while ($rr=mysqli_fetch_array($tampil)){
                    ?>
                    <tr>
                      <td width="50px"><center><?php echo "$no.";?></center></td>
                      <td><?php echo $rr["id_kec"];?></td>
                      <td><?php echo $rr["nama_kecamatan"];?></td>
                      <td><?php echo $rr["id_kab"];?></td>
                      <td><?php echo $rr["nama_kabupaten"];?></td>
                      <td width="100px">
                        <center>
                        <a class='btn bg-aqua btn-xs' data-toggle='tooltip' title='Ubah Data' href='update-kecamatan?id=<?php echo $rr["id_kec"];?>'><span class='glyphicon glyphicon-edit'></span></a>
                        <a class='btn bg-red btn-xs' data-toggle='tooltip' title='Hapus Data' href='aksi/kecamatan_hapus.php?id=<?php echo $rr["id_kec"];?>' onclick="return confirm('Apa anda yakin akan menghapus data ini?')"><span class='glyphicon glyphicon-trash'></span></a></center>
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