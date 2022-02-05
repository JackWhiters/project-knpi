<?php
    include "../../assets/config/koneksi.php";
    if ($_FILES['gambar']['size'] != 0)
    {
        $fileName = $_FILES['gambar']['name'];
        $move = move_uploaded_file($_FILES['gambar']['tmp_name'], "../../assets/img/blangko/".$_FILES['gambar']['name']);
        if($move)
        {
            mysqli_query($koneksi, "UPDATE blangko SET gambar='$fileName' WHERE id = '$_POST[id]'");
            echo "<script>window.alert('Data Berhasil di Update!');
                window.location='../update-blangko'</script>";
        }
    }

?>
