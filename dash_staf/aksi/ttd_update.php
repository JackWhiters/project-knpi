<?php
    include "../../assets/config/koneksi.php";
    if ($_FILES['ttd']['size'] != 0)
    {
        $fileName = $_FILES['ttd']['name'];
        $move = move_uploaded_file($_FILES['ttd']['tmp_name'], "../../assets/img/tandatangan/".$_FILES['ttd']['name']);
        if($move)
        {
            mysqli_query($koneksi, "UPDATE blangko SET ttd='$fileName' WHERE id = '$_POST[id]'");
            echo "<script>window.alert('Data Berhasil di Update!');
                window.location='../update-ttd'</script>";
        }
    }
    else
        {
            mysqli_query($koneksi, "UPDATE blangko SET kepsek='$_POST[kepsek]',nip='$_POST[nip]' WHERE id = '$_POST[id]'");
            echo "<script>window.alert('Data Berhasil di Update!');
                window.location='../update-ttd'</script>";
        }
?>
