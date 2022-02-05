<?php
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

    $nama = $_POST['a']; //isi QR code
    $nam = $_POST['d']; //nama QR code

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
    $data=md5($_POST['password']);

    if ($_FILES['gambar']['size'] != 0)
    {
        $fileName = $_FILES['gambar']['name'];
        $move = move_uploaded_file($_FILES['gambar']['tmp_name'], "../../assets/img/user/".$_FILES['gambar']['name']);
        if($move)
        {
            mysqli_query($koneksi, "UPDATE user SET gambar = '$fileName',
                                                    nis = '$_POST[a]',
                                                    id_level = '$_POST[b]',
                                                    username = '$_POST[c]',
                                                    password = '$data',
                                                    nama = '$_POST[d]',
                                                    jk = '$_POST[e]',
                                                    tmp_lhr = '$_POST[f]',
                                                    tgl_lhr = '$_POST[g]',
                                                    alamat = '$_POST[h]',
                                                    id_prov = '$_POST[i]',
                                                    id_kab = '$_POST[j]',
                                                    id_kec = '$_POST[k]',
                                                    id_kel = '$_POST[l]',
                                                    hp = '$_POST[m]',
                                                    email = '$_POST[n]',
                                                    waktu = '$time',
                                                    tgl_input = '$tgl',
                                                    qrcode  = '$nameqrcode'
                                                    WHERE id = '$_POST[id]'");
            echo "<script>window.alert('Data Berhasil di Update!');
                window.location='../view-data'</script>";
        }
    }
        
     if($_POST['webcam']!='')
    {
        mysqli_query($koneksi, "UPDATE user SET gambar = '$fileNama', nis = '$_POST[a]',
                                                    id_level = '$_POST[b]',
                                                    username = '$_POST[c]',
                                                    password = '$data',
                                                    nama = '$_POST[d]',
                                                    jk = '$_POST[e]',
                                                    tmp_lhr = '$_POST[f]',
                                                    tgl_lhr = '$_POST[g]',
                                                    alamat = '$_POST[h]',
                                                    id_prov = '$_POST[i]',
                                                    id_kab = '$_POST[j]',
                                                    id_kec = '$_POST[k]',
                                                    id_kel = '$_POST[l]',
                                                    hp = '$_POST[m]',
                                                    email = '$_POST[n]',
                                                    waktu = '$time',
                                                    tgl_input = '$tgl',
                                                    qrcode  = '$nameqrcode'
                                                    WHERE id = '$_POST[id]'");
            echo "<script>window.alert('Data Berhasil di Update!');
                window.location='../view-data'</script>";
        }
        
        if($_POST['password']!=''){
       mysqli_query($koneksi, "UPDATE user SET nis = '$_POST[a]',
                                                    id_level = '$_POST[b]',
                                                    username = '$_POST[c]',
                                                    password = '$data',
                                                    nama = '$_POST[d]',
                                                    jk = '$_POST[e]',
                                                    tmp_lhr = '$_POST[f]',
                                                    tgl_lhr = '$_POST[g]',
                                                    alamat = '$_POST[h]',
                                                    id_prov = '$_POST[i]',
                                                    id_kab = '$_POST[j]',
                                                    id_kec = '$_POST[k]',
                                                    id_kel = '$_POST[l]',
                                                    hp = '$_POST[m]',
                                                    email = '$_POST[n]',
                                                    waktu = '$time',
                                                    tgl_input = '$tgl',
                                                    qrcode  = '$nameqrcode'
                                                    WHERE id = '$_POST[id]'");
            echo "<script>window.alert('Data Berhasil di Update!');
                window.location='../view-data'</script>";
        }

        else
    {
        mysqli_query($koneksi, "UPDATE user SET nis = '$_POST[a]',
                                                    id_level = '$_POST[b]',
                                                    username = '$_POST[c]',
                                                    nama = '$_POST[d]',
                                                    jk = '$_POST[e]',
                                                    tmp_lhr = '$_POST[f]',
                                                    tgl_lhr = '$_POST[g]',
                                                    alamat = '$_POST[h]',
                                                    id_prov = '$_POST[i]',
                                                    id_kab = '$_POST[j]',
                                                    id_kec = '$_POST[k]',
                                                    id_kel = '$_POST[l]',
                                                    hp = '$_POST[m]',
                                                    email = '$_POST[n]',
                                                    waktu = '$time',
                                                    tgl_input = '$tgl',
                                                    qrcode  = '$nameqrcode'
                                                    WHERE id = '$_POST[id]'");
            echo "<script>window.alert('Data Berhasil di Update!');
                window.location='../view-data'</script>";
        }

?>
