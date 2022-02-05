<?php
    include "../../assets/config/koneksi.php";
    mysqli_query($koneksi, "DELETE FROM kabupaten WHERE id_kab ='$_GET[id]'");
    echo "<script>window.alert('Data Berhasil di Hapus!');
                window.location='../view-kabupaten'</script>";
?>
