
<?php
include "koneksi.php";

if(isset($_POST['kirim'])){
    $no_tiket = $_POST ['tiket'];
	$nama = $_POST ['nama'];
    $tanggal_bayar = $_POST ['tgl'];
    $tanggal_cancel = $_POST ['tgl_cancel'];
    $alasan = $_POST['alasan'];

	
	$query = "INSERT INTO tb_cancel values('','$tanggal_bayar','$tanggal_cancel','$no_tiket','$nama','$alasan')";
	$hasil=mysqli_query($koneksi,$query);
	if($hasil){
        echo "<script type='text/javascript'>
        window.location.replace('?menu=payment')
</script>";
	}else echo $query;
}
?>