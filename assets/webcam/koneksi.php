<?php
$SERVER = "localhost"; 	
$NAMAUSER = "root";
$PASSWORDUSER = "";
$DATABASE = "datakartanu";
mysql_connect ($SERVER, $NAMAUSER, $PASSWORDUSER) or die ("<h1>Tidak terkoneksi ke server</h1>");
mysql_select_db ($DATABASE) or die ("<h1>Database tidak ditemukan</h1>");
?>