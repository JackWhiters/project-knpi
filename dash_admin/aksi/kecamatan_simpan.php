
<?php
    include "../../assets/config/koneksi.php";
   mysqli_query($koneksi, "INSERT INTO kecamatan (nama_kecamatan, id_kec, id_kab) VALUES ('$_POST[b]', '$_POST[a]', '$_POST[c]')");
   echo "<script>window.alert('Data Berhasil di Tambahkan!');
                window.location='../view-kecamatan'</script>";
?>
