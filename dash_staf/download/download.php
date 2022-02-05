<!-- 
  Project       : Aplikasi KARTU PELAJAR V.03
  Description   : CRUD (Create, read, Update, Delete) PHP 5.6, QR Code, MySQLi, Bootstrap & Google Chrome
  Author        : JOSH AJEH, ST
  Contact       : Hp/Wa. +62823-1294-6494
  Powered by    : KARPELPUS.ID
-->

<?php
// Source Code Download File dengan PHP
if(isset($_GET['nama_file'])){
	$file = $back_dir.$_GET['nama_file'];
	
	if (file_exists($file))
	{
		header('Content-Description: File Transfer');
		header('Content-Type: application/octet-stream');
		header('Content-Disposition: attachment; filename='.basename($file));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: private');
		header('Pragma: private');
		header('Content-Length: ' . filesize($file));
		ob_clean();
		flush();
		readfile($file);
		exit;

	} 
	else 
	{
		echo "file {$_GET['nama_file']} sudah tidak ada.";
	}
	
}
?>