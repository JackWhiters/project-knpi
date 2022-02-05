<?php
    include "../../assets/config/koneksi.php";
            mysqli_query($koneksi, "UPDATE provinsi SET nama_provinsi ='$_POST[b]' WHERE id_prov = '$_POST[a]'");
            echo "<script>window.alert('Data Berhasil di Update!');
                window.location='../view-provinsi'</script>";
?>
