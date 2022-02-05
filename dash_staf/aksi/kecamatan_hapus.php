<?php
    include "../../assets/config/koneksi.php";
    mysqli_query($koneksi, "DELETE FROM kecamatan WHERE id_kec ='$_GET[id]'");
    echo "<script>window.alert('Data Berhasil di Hapus!');
                window.location='../view-kecamatan'</script>";
?>
