<?php
    include "../../assets/config/koneksi.php";
    mysqli_query($koneksi, "DELETE FROM user WHERE id ='$_GET[id]'");
    header('location:../view-user');
?>
