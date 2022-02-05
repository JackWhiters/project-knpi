<?php
// Fungsi header dengan mengirimkan raw data excel
header("Content-type: application/vnd-ms-excel");

// Mendefinisikan nama file ekspor "hasil-export.xls"
header("Content-Disposition: attachment; filename=DB-KARPEL.xls");

include "../../assets/config/koneksi.php";?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Document</title>
</head>
<body>

  <table border="1">

    <tr><th colspan="26" align="left">DATA KARTU PELAJAR</th></tr>
    <tr style="height: 30px;color:#fff;">
      <th style="background: #13A6FC;">No.</th>
      <th style="background: #13A6FC;">Tanggal Input/Waktu</th>
      <th style="background: #13A6FC;">NIS/NISN</th>
      <th style="background: #13A6FC;">NAMA</th>
      <th style="background: #13A6FC;">LAHIR</th>
      <th style="background: #13A6FC;">JK</th>
      <th style="background: #13A6FC;">ALAMAT</th>
      <th style="background: #13A6FC;">PROVINSI</th>
      <th style="background: #13A6FC;">KABUPATEN/KOTA</th>
      <th style="background: #13A6FC;">KECAMATAN</th>
      <th style="background: #13A6FC;">KELURAHAN/DESA</th>
      <th style="background: #13A6FC;">TELPON</th>
      <th style="background: #13A6FC;">MAIL</th>
      <th style="background: #13A6FC;">QRCODE</th>
      <th style="background: #13A6FC;">FOTO</th>
      <?php
      $tampil = mysqli_query($koneksi, "SELECT * FROM user 
        INNER JOIN kelurahan ON user.id_kel= kelurahan.id_kel
        INNER JOIN kabupaten ON user.id_kab= kabupaten.id_kab 
        INNER JOIN kecamatan ON user.id_kec= kecamatan.id_kec 
        INNER JOIN provinsi ON user.id_prov= provinsi.id_prov where id_level = '3' ORDER BY id DESC");
      $no=1;
      while ($r=mysqli_fetch_assoc($tampil))
      {
        $tt = date("d - m - Y", strtotime($r['tgl_lhr']));
        $tanggal = date("d - m - Y", strtotime($r['tgl_input']));
        $t = date("Y", strtotime($r['tgl_lhr']));
        echo "
        <tr>
        <td><center>$no.</center></td>
        <td>$tanggal/$r[waktu]</td>
        <td>'$r[nis]</td>
        <td>$r[nama]</td>
        <td>$r[tmp_lhr], $tt</td>
        <td>$r[jk]</td>
        <td>$r[alamat]</td>
        <td>$r[nama_provinsi]</td>
        <td>$r[nama_kabupaten]</td>
        <td>$r[nama_kecamatan]</td>
        <td>$r[nama_kelurahan]</td>
        <td>$r[hp]</td>
        <td>$r[email]</td>
        <td>$r[qrcode]</td>
        <td>$r[gambar]</td>
        </tr>";
        $no++;
      }
      ?>
    </table>
  </body>
</html>