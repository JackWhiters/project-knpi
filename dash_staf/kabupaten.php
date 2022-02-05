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
              <h3 class="box-title"><i class="glyphicon glyphicon-tasks"></i> DATA KABUPATEN</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="col-sm-12">
              <div class="panel panel-default">
              <div class="panel-heading bg-red"><i class="glyphicon glyphicon-edit"></i> <b>Form Tambah Kabupaten</b></div>
                <div class="panel-body">
                  <form class='form-horizontal' role='form' method=POST action='aksi/kabupaten_simpan.php' enctype='multipart/form-data'>
                    <div class='form-group'>
                      <label class='col-sm-4 control-label'>ID - Provinsi :</label>
                      <div class='col-sm-6'>
                        <select name='c' class="form-control select2" style="width: 100%;" required>
                          <option value='' selected="selected">Pilih Provinsi</option>
                          <?php 
                          $tampil = mysqli_query($koneksi, "SELECT * FROM provinsi ORDER BY id_prov ");
                          while($r=mysqli_fetch_array($tampil))
                            {
                              echo "<option value='".$r['id_prov']."'>".$r['id_prov']." - ".$r['nama_provinsi']."</option>";
                            }
                          ?>
                        </select>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label class='col-sm-4 control-label'>ID Kabupaten :</label>
                      <div class='col-sm-6'>
                        <input type='text' class='form-control' name='a' placeholder='Nomor ID Kabupaten' required>
                      </div>
                    </div>
                    <div class='form-group'>
                      <label class='col-sm-4 control-label'>Nama Kabupaten :</label>
                      <div class='col-sm-6'>
                        <input type='text' class='form-control' name='b' placeholder='Nama Kabupaten' required>
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
                <thead class="bg-red">
                    <tr>
                      <th><center>NO.</center></th>
                      <th><center>ID KAB/KOTA</center></th>
                      <th><center>NAMA KAB/KOTA</center></th>
                      <th><center>ID PROVINSI</center></th>
                      <th><center>NAMA PROVINSI</center></th>
                      <th>Aksi</th>
                    </tr>
                  </thead>
                  <tbody>
                    <?php
                    $tampil = mysqli_query($koneksi, "SELECT * FROM kabupaten INNER JOIN provinsi ON kabupaten.id_prov= provinsi.id_prov ORDER BY id_kab ASC");
                    $no=1;
                    while ($rr=mysqli_fetch_array($tampil)){
                    ?>
                    <tr>
                      <td width="50px"><center><?php echo "$no.";?></center></td>
                      <td><?php echo $rr["id_kab"];?></td>
                      <td><?php echo $rr["nama_kabupaten"];?></td>
                      <td><?php echo $rr["id_prov"];?></td>
                      <td><?php echo $rr["nama_provinsi"];?></td>
                      <td width="100px">
                        <center>
                        <a class='btn bg-aqua btn-xs' data-toggle='tooltip' title='Ubah Data' href='update-kabupaten?id=<?php echo $rr["id_kab"];?>'><span class='glyphicon glyphicon-edit'></span></a>
                        <a class='btn bg-red btn-xs' data-toggle='tooltip' title='Hapus Data' href='aksi/kabupaten_hapus.php?id=<?php echo $rr["id_kab"];?>' onclick="return confirm('Apa anda yakin akan menghapus data ini?')"><span class='glyphicon glyphicon-trash'></span></a></center>
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
  