<?php
    include "koneksi.php";
    $img = $_POST['gambar'];
    $folderPath = "upload/";
  
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
  
    $image_base64 = base64_decode($image_parts[1]);
    $fileNama = uniqid() . '.png';
  
    $file = $folderPath . $fileNama;
    file_put_contents($file, $image_base64);
  
    print_r($fileNama);

  $sql = "INSERT INTO hasil (gambar, nama) VALUES ('".$fileNama."','".$_POST['nama']."')";
  $simpan = mysql_query($sql);
?>