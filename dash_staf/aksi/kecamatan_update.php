<?php
    include "../../assets/config/koneksi.php";
            mysqli_query($koneksi, "UPDATE kecamatan SET nama_kecamatan ='$_POST[b]' WHERE id_kec= '$_POST[a]'");
            echo "<script>window.alert('Data Berhasil di Update!');
                window.location='../view-kecamatan'</script>";
?>
