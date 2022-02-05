<?php
    include "../../assets/config/koneksi.php";
    mysqli_query($koneksi, "DELETE FROM kelurahan WHERE id_kel ='$_GET[id]'");
    echo "<script>window.alert('Data Berhasil di Hapus!');
                window.location='../view-kelurahan'</script>";
?>
