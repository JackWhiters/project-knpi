<?php
    include "../../assets/config/koneksi.php";
            mysqli_query($koneksi, "UPDATE kabupaten SET nama_kabupaten ='$_POST[b]' WHERE id_kab= '$_POST[a]'");
            echo "<script>window.alert('Data Berhasil di Update!');
                window.location='../view-kabupaten'</script>";
?>
