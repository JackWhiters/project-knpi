<!-- 
  Project       : Aplikasi Kartanu V.0.2
  Description   : CRUD (Create, read, Update, Delete) PHP 5.6, QR Code, MySQLi, Bootstrap & Google Chrome
  Author        : BAMBANG HADI SAPUTRA, ST
  Contact       : Hp/Wa. +62852-5665-1656
  Powered by    : TOMSTONE.ID
-->

<?php
  session_start();
  error_reporting(1);
  include '../config/koneksi.php';
  if(empty($_SESSION))
  {
    header("Location: ../login");
  }
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="shortcut icon" href="../assets/img/logo_nu.png">
  <title style="text-transform: uppercase;">APLIKASI KARTANU - V.0.2</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.6 -->
  <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->
</head>
<body class="hold-transition skin-green layout-boxed sidebar-mini" data-spy="scroll" data-target="#scrollspy">
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
        <li><a href="#">Ubah Data</a></li>
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
            <?php
              $b=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM provinsi WHERE id_prov = '$_GET[id]'"));
            ?>
            <div class="box-body">
            <div class="panel panel-default">
              <div class="panel-heading bg-navy"><i class="glyphicon glyphicon-edit"></i> <b>Form Ubah Provinsi</b></div>
                <div class="panel-body">
                  <form class='form-horizontal' role='form' method=POST action='aksi/provinsi_update.php' enctype='multipart/form-data'>
                    <input type='hidden' name='a' value='<?php echo "$b[id_prov]";?>'>
                    <div class='form-group'>
                      <label class='col-sm-2 control-label'>Nama Provinsi:</label>
                      <div class='col-sm-4'>
                        <input type='text' class='form-control' value="<?php echo "$b[nama_provinsi]";?>" name="b">
                      </div>
                      <label class='col-sm-6 control-label'></label>
                    </div>
                    <div class='form-group'>
                      <label class='col-sm-2 control-label'></label>
                      <div class='col-sm-10'>
                        <button style="width: 150px" type="submit" class="btn btn-flat btn-primary"><i class="glyphicon glyphicon-floppy-save"></i> S I M P A N</button>
                        <a href="view-provinsi"><button style="width: 150px" type="button" class="btn btn-flat btn-danger"><i class="glyphicon glyphicon-floppy-remove"></i> B A T A L</button></a>
                      </div>
                    </div>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>  
      </div>
    </section>
  </div>
  <?php include "footer.php";?>
  <!-- End footer -->
  <!-- Add the sidebar's background. This div must be placed
       immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- jQuery 2.2.3 -->
<script src="../plugins/jQuery/jquery-2.2.3.min.js"></script>
<!-- Bootstrap 3.3.6 -->
<script src="../bootstrap/js/bootstrap.min.js"></script>
<!-- DataTables -->
<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
<!-- SlimScroll -->
<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="../plugins/fastclick/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="../dist/js/app.min.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="../dist/js/demo.js"></script>
<!-- page script -->
<script>
  $(function () {
    $("#example1").DataTable();
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false
    });
  });
</script>
</body>
</html>