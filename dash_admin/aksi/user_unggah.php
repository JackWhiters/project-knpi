<?php
session_start();
  if(empty($_SESSION))
  {
    header("Location: ../login");
  }
else
{
    include "../../assets/config/koneksi.php";
    // unggah csv
    if (isset($_POST['submit'])) {//Script akan berjalan jika di tekan tombol submit..


//Script Upload File..
    if (is_uploaded_file($_FILES['filename']['tmp_name'])) {
        echo "<h1>" . "File ". $_FILES['filename']['name'] ." Berhasil di Upload" . "</h1>";
        echo "<h2>Menampilkan Hasil Upload:</h2>";
        readfile($_FILES['filename']['tmp_name']);
    }

    //Import uploaded file to Database, Letakan dibawah sini..

    $handle = fopen($_FILES['filename']['tmp_name'], "r");

    //Membuka file dan membacanya
    while (($data = fgetcsv($handle, 1000, ",")) !== FALSE)
    {
        $import="INSERT INTO user (gambar, nis, nama, tmp_lhr, tgl_lhr, jk, alamat,id_prov, id_kab, id_kec, id_kel, username, password, id_level, hp, email) values('$data[0]', '$data[1]', '$data[2]', '$data[3]', '$data[4]', '$data[5]', '$data[6]', '$data[7]', '$data[8]', '$data[9]', '$data[10]', '$data[11]', '$data[12]', '$data[13]', '$data[14]', '$data[15]')"; //data array sesuaikan dengan jumlah kolom pada CSV anda mulai dari “0” bukan “1” dan data yang diupload akan masuk tabel csv setelah diedit maka data akan masuk tabel pelajar
         mysqli_query($koneksi, $import) or die(mysqli_error()); //Melakukan Import
    }

    fclose($handle); //Menutup CSV file
    echo "<script>window.alert('Data Berhasil di Upload!');
                window.location='../view-datacsv'</script>";

}
}

?>
