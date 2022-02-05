<?php
error_reporting(1);
    include "../../assets/config/koneksi.php";
    include "../../assets/phpqrcode/qrlib.php";

    // Star Webcam
    $img = $_POST['webcam'];
    $folderPath = "../../assets/img/user/";
    $image_parts = explode(";base64,", $img);
    $image_type_aux = explode("image/", $image_parts[0]);
    $image_type = $image_type_aux[1];
    $image_base64 = base64_decode($image_parts[1]);
    $fileNama = uniqid() . '.png';
    $file = $folderPath . $fileNama;
    file_put_contents($file, $image_base64);
    // End Webcam
    
    $nama = $_POST['b']; //isi QR code
    $nam = $_POST['d']; //isi QR code

    $nameqrcode    = $nam.'.'.'png';              //nama QR Code yang disimpan ke folder dan database
    $tempdir        = "../../assets/img/qrcode/";   // Nama Folder file QR Code kita nantinya akan disimpan
    $isiqrcode     = $nama;
    $quality        = 'H';
    $Ukuran         = 10;
    $padding        = 0;

    QRCode::png($isiqrcode,$tempdir.$nameqrcode,$quality,$Ukuran,$padding); // simpan qrcode

    date_default_timezone_set('Asia/Jakarta');
    $tgl = date("Y-m-d");
    $time = date("G:i:s");
    $pass=md5($_POST['password']);
    if ($_FILES['gambar']['size'] != 0)
    {
        $fileName = $_FILES['gambar']['name'];
        $move = move_uploaded_file($_FILES['gambar']['tmp_name'], "../../assets/img/user/".$_FILES['gambar']['name']);
        if($move)
        {
        mysqli_query($koneksi, "INSERT INTO user (gambar, id_level, username, password, nama, jk, tmp_lhr, tgl_lhr, alamat, id_prov, id_kab, id_kec, id_kel, hp, email, tgl_input, waktu, qrcode) VALUES ('$fileName', '$_POST[b]', '$_POST[c]', '$pass', '$_POST[d]', '$_POST[e]', '$_POST[f]', '$_POST[g]', '$_POST[h]', '$_POST[i]', '$_POST[j]', '$_POST[k]', '$_POST[l]', '$_POST[m]', '$_POST[n]', '$tgl', '$time', '$nameqrcode')");
        echo "<script>window.alert('Data Berhasil di Input!');
                window.location='../view-user'</script>";
        }
    }
    else
     {  
    mysqli_query($koneksi, "INSERT INTO user (gambar, id_level, username, password, nama, jk, tmp_lhr, tgl_lhr, alamat, id_prov, id_kab, id_kec, id_kel, hp, email, tgl_input, waktu, qrcode) VALUES ('$fileNama', '$_POST[b]', '$_POST[c]', '$pass', '$_POST[d]', '$_POST[e]', '$_POST[f]', '$_POST[g]', '$_POST[h]', '$_POST[i]', '$_POST[j]', '$_POST[k]', '$_POST[l]', '$_POST[m]', '$_POST[n]', '$tgl', '$time', '$nameqrcode')");
        echo "<script>window.alert('Data Berhasil di Input!');
                window.location='../view-user'</script>";
    }
?>
