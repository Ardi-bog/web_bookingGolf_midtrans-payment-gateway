
<?php
session_start();
include "koneksi.php";

if(isset($_POST['kirim'])){
    $no_tiket = $_POST ['no_tiket'];
	$harga = $_POST ['harga'];
 	$id_user = $_SESSION['id'];
    $tanggal_bayar = $_POST ['tgl'];

	
	$query = "INSERT INTO pembayaran values($no_tiket','$id_user','$harga','$tanggal_bayar','','','')";
	$hasil=mysqli_query($koneksi,$query);
	if($query){
		header('location:?menu=payment');
	}
}
?>