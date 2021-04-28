
<?php
session_start();
include "koneksi.php";

if(isset($_POST['kirim'])){
    $no_tiket = $_POST ['id'];
	$harga = $_POST ['harga'];
 	$id_user = $_POST['user'];
 	$tingkat = $_POST['tingkat'];
    $tanggal_bayar = $_POST ['tgl'];

	
	$query = "INSERT INTO pembayaran values('$no_tiket','$id_user','$harga','$tanggal_bayar','','','$tingkat','')";
	$hasil=mysqli_query($koneksi,$query);
	if($query){
		header('location:.././?menu=payment');
	}
}
?>