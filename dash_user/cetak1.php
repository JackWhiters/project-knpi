<!-- 
  Project       : Aplikasi KARTU PELAJAR V.03
  Description   : CRUD (Create, read, Update, Delete) PHP 5.6, QR Code, MySQLi, Bootstrap & Google Chrome
  Author        : BAMBANG HADI SAPUTRA, ST
  Contact       : Hp/Wa. +62852-5665-1656
  Powered by    : TOMSTONE.ID
-->

<?php
  session_start();
  error_reporting(1);
  include '../assets/config/koneksi.php';
  if(empty($_SESSION))
  {
    header("Location: ../login");
  }
?>
<!DOCTYPE html>
<html> <!-- Bagian halaman HTML yang akan konvert -->
<head>
    <meta charset='UTF-8'>
    <title><?php $i = mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM identitas LIMIT 1"));  echo "$i[nama] "; ?></title>
  <link rel="shortcut icon" href="../assets/img/logo/<?php echo "$i[gambar] "; ?>">
<style>
img {
    width: 100%;
    height: auto;
}
</style>

</head>

<body onload='window.print()' style="font-family: arial;font-size: 12px;">
        <?php 

                $a=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM identitas 
                    INNER JOIN kelurahan ON identitas.id_kel= kelurahan.id_kel
                    INNER JOIN kabupaten ON identitas.id_kab= kabupaten.id_kab 
                    INNER JOIN kecamatan ON identitas.id_kec= kecamatan.id_kec 
                    INNER JOIN provinsi ON identitas.id_prov= provinsi.id_prov WHERE id = '1'"));
            
            
                $data=mysqli_query($koneksi, "SELECT * FROM user 
                    INNER JOIN kelurahan ON user.id_kel= kelurahan.id_kel
                    INNER JOIN kabupaten ON user.id_kab= kabupaten.id_kab 
                    INNER JOIN kecamatan ON user.id_kec= kecamatan.id_kec 
                    INNER JOIN provinsi ON user.id_prov= provinsi.id_prov 
                where id='$_GET[id]'");
            while($r=mysqli_fetch_array($data))
            {
                $t = date("d - m - Y", strtotime($r['tgl_lhr']));
                $tgl = date("dmY", strtotime($r['tgl_lhr']));
                $blangko=mysqli_fetch_array(mysqli_query($koneksi, "SELECT * FROM blangko WHERE id = '2'"));
        ?>
        <div style="width: 850px;height: 260px;margin-bottom: -12px;padding:; background-image: url('../assets/img/blangko/<?php echo $blangko["gambar"];?>');">

            <img style="border-radius: 6px;border: 1px solid #222; position: absolute;margin-left: 30px;margin-top: 90px; width: 90px; height: 100px;overflow: hidden;" class="img-responsive img" src="../assets/img/user/<?php echo $r["gambar"];?>">
            
            <img style="position: absolute;margin-left: 40px;margin-top: 15px; width: 40px;height: 45px" src="../assets/img/logo/<?php echo "$a[gambar] "?>">

            <p style="color: #fff;position: absolute;padding-left: 85px;padding-top: 3px; width:300px; height: 40px;text-transform: uppercase;text-align: center;letter-spacing: 2px;">Provinsi <?php echo "$a[nama_provinsi] "?><br>Kabupaten <?php echo "$a[nama_kabupaten] "?> <br>Kecamatan <?php echo "$a[nama_kecamatan] "?><br><b><?php echo "$a[sekolah] "?></b></p>

            <p style="letter-spacing: 2px;margin-left: 150px;padding-top: 90px;width: 240px; text-align: left; font-size: 15px"><b>KARTU PERPUSTAKAAN</b></p>

            <p style="font-family: arial;font-size: 9px;position: absolute;margin-left: 35px;margin-top: 80px;width: 83px;height:30px;text-align:center;position: center;float: center"><?php
                $tanggal = date ("j");
                $bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
                $bulan = $bulan[date("n")];
                $tahun = date("Y");
                $thn = $tahun+5;
            ?>Berlaku Hingga:<br><b><?php echo $tanggal ." ". $bulan ." ". $thn;?></b></p>
            <!-- <img style="border:2px solid #fff;position: absolute;margin-left: 50px;margin-top: 65px;width: 50px; height: 50px;" src="../assets/img/qrcode/<?php echo $r["qrcode"];?>"> -->
            <table cellspacing="0em" style="margin-top: -10px; padding-left: 150px; position: relative;font-family: arial;font-size: 10px;transition-property: 500px;width: 390px;height: 130px;"> 
                <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?php echo "$r[nama]";?></td>
                </tr> 
                <tr>
                    <td>NIS/NISN</td>
                    <td>:</td>
                    <td><?php echo "$r[nis]";?></td>
                </tr> 
                <tr>
                    <td>TTL</td>
                    <td>:</td>
                    <td><?php echo "$r[tmp_lhr]";?>, <?php echo "$t";?></td>
                </tr>
                <tr>
                    <td>JK</td>
                    <td>:</td>
                    <td><?php echo "$r[jk]";?></td>
                </tr>
                <tr>
                    <td>Alamat</td>
                    <td>:</td>
                    <td><?php echo "$r[alamat]";?></td>
                </tr>
                <tr>
                    <td>Kelurahan/Desa</td>
                    <td>:</td>
                    <td><?php echo "$r[nama_kelurahan]";?></td>
                </tr>
                <tr>
                    <td>Kecamatan</td>
                    <td>:</td>
                    <td><?php echo "$r[nama_kecamatan]";?></td>
                </tr>
                <tr>
                    <td>Kota/Kabupaten</td>
                    <td>:</td>
                    <td><?php echo "$r[nama_kabupaten]";?></td>
                </tr>
                <tr>
                    <td>Provinsi</td>
                    <td>:</td>
                    <td><?php echo "$r[nama_provinsi]";?></td>
                </tr>
            </table>
           
            <p style="margin-top: -220px;padding-left: 560px;padding-top: 10px;font-size: 11px;"> <b style="font-size: 12px;">PERATURAN PERPUSTAKAAN</b>
            <ol style="padding-left: 480px;font-family: arial;font-size: 11px;text-align: justify;padding-right: 25px;margin-top: -8px;">
              <li>Kartu ini diterbitkan oleh <?php echo "$a[sekolah]";?>, segala penggunaan kartu ini diatur oleh perpustakaan sesuai ketentuan dan syarat yang berlaku</a></li>
                      <li>Setiap Siswa/i wajib membawa kartu ini jika ke perpustakaan</li>
                      <li>Kartu ini tidak boleh dialih pinjamkan</li>
                      <li>Bila menemukan kartu ini, mohon kembalikan ke perpustaakaan sekolah</li>
            </ol>
            <p style="margin-left: 500px;font-family: arial;font-size: 10px;text-align: justify;padding-right: 25px;width: 35%;text-align: right;"><?php echo "$a[nama_kecamatan] "?>, <?php echo $tanggal ." ". $bulan ." ". $tahun;?></p>
            <p style="padding-left: 690px;font-family: arial;font-size: 10px;text-align: justify;padding-right: 25px;width: 35%;margin-top: -6px;">Mengetahui,<br><b>Kepala Sekolah<br><br><br><br><?php echo $blangko["kepsek"];?></b><br>NIP. <?php echo $blangko["nip"];?></p>
            <img style="padding-left: 610px;font-family: arial;font-size: 10px;text-align: justify;padding-right: 25px;width: 15%;margin-top: -75px;position: absolute;" src="../assets/img/tandatangan/<?php echo $blangko["ttd"];?>">
            <img style="border-radius: 2px;border:4px solid #fff;margin-left: 500px;font-family: arial;font-size: 10px;text-align: justify;width: 70px;margin-top: -90px;position: absolute;" src="../assets/img/qrcode/<?php echo $r["qrcode"];?>">
            </p>
        </div>

</body>
</html>
<?php }?>
