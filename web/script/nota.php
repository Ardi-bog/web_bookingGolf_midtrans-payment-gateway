<?php
@session_start();
include "koneksi.php";
$getid = $_POST['id'];

if(isset($_POST['tambah'])){
    $lokasi= $_FILES ['gambar']['tmp_name'];
	$gambar = $_FILES ['gambar']['name']; 
	$tgl = $_POST['tgl'];
    move_uploaded_file($lokasi,"./img/".$gambar);
	$query = "UPDATE pembayaran
	SET bukti= '$gambar', tanggal_bayar = '$tgl'  WHERE no_tiket = '$getid' ";
	$hasil=mysqli_query($koneksi,$query);
	
	if($query){
		echo "<script type='text/javascript'>
		alert('Silahkan Tunggu Verifikasi Pembayaran Anda!');
			window.location.replace('?menu=payment')
	</script>";
	} else{
		echo $query;
	}
}
?>  