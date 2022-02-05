<?php
    include "../../assets/config/koneksi.php";
    if ($_FILES['gambar']['size'] != 0)
    {
        $fileName = $_FILES['gambar']['name'];
        $move = move_uploaded_file($_FILES['gambar']['tmp_name'], "../../assets/img/logo/".$_FILES['gambar']['name']);
        if($move)
        {
            mysqli_query($koneksi, "UPDATE identitas SET gambar='$fileName',
                                                        nama ='$_POST[a]',
                                                        sekolah ='$_POST[b]',
                                                        email1 ='$_POST[c]',
                                                        hp ='$_POST[d]',
                                                        web ='$_POST[e]',
                                                        alamat ='$_POST[f]',
                                                        id_prov ='$_POST[g]',
                                                        id_kab ='$_POST[h]',
                                                        id_kec ='$_POST[i]',
                                                        id_kel ='$_POST[j]'
                                                         WHERE id = '$_POST[id]'");
            echo "<script>window.alert('Data Berhasil di Update!');
                window.location='../update-identitas'</script>";
        }
    }
    else
    {
        mysqli_query($koneksi, "UPDATE identitas SET nama ='$_POST[a]',
                                                        sekolah ='$_POST[b]',
                                                        email1 ='$_POST[c]',
                                                        hp ='$_POST[d]',
                                                        web ='$_POST[e]',
                                                        alamat ='$_POST[f]',
                                                        id_prov ='$_POST[g]',
                                                        id_kab ='$_POST[h]',
                                                        id_kec ='$_POST[i]',
                                                        id_kel ='$_POST[j]'
                                                         WHERE id = '$_POST[id]'");
            echo "<script>window.alert('Data Berhasil di Update!');
                window.location='../update-identitas'</script>";
    }

?>
