<?php
$host	= "localhost";
$users	= "root";
$pass	= '';
$db		= "golfbaru";
$koneksi= mysqli_connect($host, $users, $pass, $db) or die(mysql_error());
if (!$koneksi){
	echo "KONEKSI DATABASE GAGAL";
}
?>