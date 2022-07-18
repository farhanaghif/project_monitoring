<?php
include_once('include/Database.php');
define('SS_DB_NAME', 'db_monitoring');
define('SS_DB_USER', 'root');
define('SS_DB_PASSWORD', '');
define('SS_DB_HOST', 'localhost');

$dsn	= 	"mysql:dbname=".SS_DB_NAME.";host=".SS_DB_HOST."";
$pdo	=	"";
try {
	$pdo = new PDO($dsn, SS_DB_USER, SS_DB_PASSWORD);
	// echo "Koneksi ke database berhasil";
}catch (PDOException $e) {
	echo "Koneksi ke database gagal, pesan error  : " . $e->getMessage();
}
$db 	=	new Database($pdo);
?>