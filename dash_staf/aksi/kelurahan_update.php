<?php
    include "../../assets/config/koneksi.php";
            mysqli_query($koneksi, "UPDATE kelurahan SET nama_kelurahan ='$_POST[b]' WHERE id_kel= '$_POST[a]'");
            echo "<script>window.alert('Data Berhasil di Update!');
                window.location='../view-kelurahan'</script>";
?>
