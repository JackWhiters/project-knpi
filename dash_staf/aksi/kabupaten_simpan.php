
<?php
    include "../../assets/config/koneksi.php";
   mysqli_query($koneksi, "INSERT INTO kabupaten (nama_kabupaten, id_kab, id_prov) VALUES ('$_POST[b]', '$_POST[a]', '$_POST[c]')");
   echo "<script>window.alert('Data Berhasil di Tambahkan!');
                window.location='../view-kabupaten'</script>";
?>
