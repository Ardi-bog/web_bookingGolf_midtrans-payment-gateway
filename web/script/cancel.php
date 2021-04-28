<?php
include 'koneksi.php';

$id = $_GET['id'];

$delPembayaran= "delete from pembayaran where no_tiket='$id'";
$pembayaran = mysqli_query($koneksi,$delPembayaran);

if($pembayaran){
$delJadwal= "delete from pertandingan where id_pembayaran_player_satu='$id'";
$jadwal = mysqli_query($koneksi,$delJadwal);
 if($jadwal){
    echo "<script type='text/javascript'>
			window.location.replace('?menu=payment')
	</script>";
    }else echo $jadwal;
}else {
    echo $delPembayaran;
} 

?>