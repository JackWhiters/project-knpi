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
              <h3 class="box-title"><i class="glyphicon glyphicon-tasks"></i> DATA PROVINSI</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="col-sm-12">
              <div class="panel panel-default">
              <div class="panel-heading bg-navy"><i class="glyphicon glyphicon-edit"></i> <b>Form Tambah Provinsi</b></div>
                <div class="panel-body">
                  <form class='form-horizontal' role='form' method=POST action='aksi/provinsi_simpan.php' enctype='multipart/form-data'>
                    <div class='form-group'>
                      <label class='col-sm-3 control-label'>ID Provinsi :</label>
                      <div class='col-sm-7'>
                        <input type='text' class='form-control' name='a' placeholder='Nomor ID Provinsi'>
                      </div>
                    </div><div class='form-group'>
                      <label class='col-sm-3 control-label'>Nama Provinsi :</label>
                      <div class='col-sm-7'>
                        <input type='text' class='form-control' name='b' placeholder='Nama Provinsi'>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label class='col-sm-3 control-label'></label>
                      <div class='col-sm-7'>
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
                <thead class="bg-navy">
                    <tr>
                      <th><center>No.</center></th>
                      <th><center>ID Provinsi</center></th>
                      <th>Nama Provinsi</th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM provinsi ORDER BY id_prov DESC");
                    $no=1;
                    while ($rr=mysqli_fetch_array($tampil)){
                    ?>
                    <tr>
                      <td width="50px"><center><?php echo "$no.";?></center></td>
                      <td><?php echo $rr["id_prov"];?></td>
                      <td><?php echo $rr["nama_provinsi"];?></td>
                      <td width="100px">
                        <center>
                        <a class='btn bg-aqua btn-xs' data-toggle='tooltip' title='Ubah Data' href='update-provinsi?id=<?php echo $rr["id_prov"];?>'><span class='glyphicon glyphicon-edit'></span></a>
                        <a class='btn bg-red btn-xs' data-toggle='tooltip' title='Hapus Data' href='aksi/provinsi_hapus.php?id=<?php echo $rr["id_prov"];?>' onclick="return confirm('Apa anda yakin akan menghapus data ini?')"><span class='glyphicon glyphicon-trash'></span></a></center>
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
