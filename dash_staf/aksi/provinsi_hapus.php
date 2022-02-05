<?php
    include "../../assets/config/koneksi.php";
    mysqli_query($koneksi, "DELETE FROM provinsi WHERE id_prov ='$_GET[id]'");
    echo "<script>window.alert('Data Berhasil di Hapus!');
                window.location='../view-provinsi'</script>";
?>
