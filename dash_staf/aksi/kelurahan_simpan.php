
<?php
    include "../../assets/config/koneksi.php";
   mysqli_query($koneksi, "INSERT INTO kelurahan (nama_kelurahan, id_kel, id_kec) VALUES ('$_POST[b]', '$_POST[a]', '$_POST[c]')");
   echo "<script>window.alert('Data Berhasil di Tambahkan!');
                window.location='../view-kelurahan'</script>";
?>
