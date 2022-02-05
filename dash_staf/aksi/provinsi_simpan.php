
<?php
    include "../../assets/config/koneksi.php";
   mysqli_query($koneksi, "INSERT INTO provinsi (nama_provinsi, id_prov) VALUES ('$_POST[b]', '$_POST[a]')");
   echo "<script>window.alert('Data Berhasil di Tambahkan!');
                window.location='../view-provinsi'</script>";
?>
