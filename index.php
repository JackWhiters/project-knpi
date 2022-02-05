<?php 
  include "assets/config/koneksi.php";
  error_reporting(1);
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
     <title><?php $i = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM identitas LIMIT 1"));  echo "$i[nama] "; ?></title>
    <link rel="shortcut icon" href="assets/img/logo/<?php echo "$i[gambar] "; ?>">
    <title style="text-transform: uppercase;"><?php echo "$r[title]";?></title>
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="assets/font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/ionicons-2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="assets/dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="assets/plugins/iCheck/square/blue.css">
    <script src="assets/dist/js/jquery-2.2.1.min.js"></script>
  <style type="text/css">
  .preloader {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    z-index: 9999;
    background-color: #fff;
  }
  .preloader .loading {
    position: absolute;
    left: 50%;
    top: 50%;
    transform: translate(-50%,-50%);
    font: 14px arial;
  }
</style>
<script>
  $(document).ready(function(){
    $(".preloader").fadeOut();
  })
</script>
</head>

<body class='hold-transition login-page' style="background-image: url('assets/img/bg/bg.jpg');">
   <div class="preloader" style="background-color: #000;">
    <div class="loading">
      <img src="assets/loader/a.gif" width="150">
    </div>
  </div>
  <div class='login-box'  style="margin-top: 10px;">
    <div class='login-logo'>
      <center><img width="25%" src="assets/img/logo/<?php echo "$i[gambar] "; ?>"></center>
      <a href='login'><b><?php echo "$i[nama]";?></b></a>
    </div>
    <!-- /.login-logo -->
    <div class='login-box-body' style="border-top: 8px solid #605ca8;border-bottom: 8px solid #605ca8;border-right: 4px solid #605ca8;border-top-left-radius: 16px;border-bottom-left-radius: 16px;box-shadow: 0px 3px 6px 0px #222;">
      <p class='login-box-msg'>Silahkan Login Untuk Akses System</p>
      <?php
            if(isset($_POST['login'])){
              
              $username = $_POST['username'];
              $password = md5($_POST['password']);
              $id_level   = $_POST['id_level'];

              $query = mysqli_query($koneksi, "SELECT * FROM user WHERE username='$username' AND password='$password'");
              
              if(mysqli_num_rows($query) == 0){
                echo '<div class="alert alert-danger">Upss...!!! Login gagal.</div>';
              }else{
                $row = mysqli_fetch_array($query);
                  session_start();
                if($row['id_level'] == 1 && $id_level == 1){
                  $_SESSION['username']=$username;
                  $_SESSION['nama']     = $row['nama'];
                  $_SESSION['gambar']     = $row['gambar'];
                  $_SESSION['id']     = $row['id'];
                  $_SESSION['id_level']='Administrator';
                  header("Location: dash_admin");
                }else if($row['id_level'] == 2 && $id_level == 2){
                  $_SESSION['username']=$username;
                  $_SESSION['nama']     = $row['nama'];
                  $_SESSION['gambar']     = $row['gambar'];
                  $_SESSION['id']     = $row['id'];
                  $_SESSION['id_level']='IT Staff';
                  header("Location: dash_staf");
                }else if($row['id_level'] == 3 && $id_level == 3){
                  $_SESSION['username']=$username;
                  $_SESSION['nama']     = $row['nama'];
                  $_SESSION['id']     = $row['id'];
                  $_SESSION['gambar']     = $row['gambar'];
                  $_SESSION['id_level']='user';
                  header("Location: dash_user");
                }else{
                  echo '<div class="alert alert-danger">Upss...!!! Login Anda gagal. </div>';
                }
              }
            }
            ?>
      <form role="form" action="" method="post" autocomplete="off">
        <div class='form-group has-feedback'>
          <input type="text" class="form-control" placeholder="Masukan Username Anda" aria-describedby="basic-addon1" name="username" required autofocus />
          <span class='glyphicon glyphicon-user form-control-feedback'></span>
        </div>
        <br>
        <div class='form-group has-feedback'>
          <input type="password" class="form-control" placeholder=" Masukan Password Anda" aria-describedby="basic-addon1" name="password">
          <span class='glyphicon glyphicon-lock form-control-feedback'></span>
        </div>
        <br>
        <div class='form-group has-feedback'>
          <select name="id_level" class="form-control" required>
            <option value="">Pilih Level User</option>
            <option value="1">Administrator</option>
            <option value="2">IT Staff</option>
            <option value="3">User</option>
          </select>
        </div>
        <br>
        <div class='row'>
          <div class='col-xs-12'>
            <button name="login" type='submit' class='btn bg-primary btn-block'><i class="fa fa-chevron-right"></i><i class="fa fa-chevron-right"></i> M A S U K</button>
            <!-- <a target='_blank' href="" name="login" type='submit' class='btn bg-green btn-block'><i class="fa fa-whatsapp"></i></i> WhatsApp Info Akun</a> -->
          </div>
        </div>
      </form>

      
      
  
<script>
$(document).ready(function(){
$('.preloader').fadeOut();
})
</script>
  <footer><br>
    <center>Copyright <i class="fa fa-copyright"></i> <?php echo date("Y");?>.<b> <?php echo "$i[sekolah] "; ?></b>
    <p><a target='_blank' href="http://karpelpus.id"> INI Copyright </a></p>
  </footer>
</div>

  <script src="assets/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/plugins/iCheck/icheck.min.js"></script>
    <script>
      $(function () {
        $('input').iCheck({
          checkboxClass: 'icheckbox_square-blue',
          radioClass: 'iradio_square-blue',
          increaseArea: '20%' // optional
        });
      });
    </script>
  </body>
</html>
