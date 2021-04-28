<?php
session_start();
include "koneksi.php";


if(isset($_POST['kirim'])){
    $getid = $_POST['user'];
    $kode = $_POST['id'];
    $hp = $_POST['hp'];
	$query = "UPDATE tabel_user
	SET otp= '$kode'  WHERE id = '$getid' ";
	$hasil=mysqli_query($koneksi,$query);
	
	if($query){
        $link_wa = 'https://wa.me/'.$hp.'?text='.$kode;
         header("location:".$link_wa);
       
	} else{
		echo $query;
	}
}
?>  