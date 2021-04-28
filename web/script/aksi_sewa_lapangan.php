<html>

<head>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

</html>
<?php
session_start();
include "koneksi.php";
$id_player = $_SESSION['id'];
$jam = $_POST['time'];
$bayar1 = $_POST['bayar1'];
$bayar2 = $_POST['bayar2'];
$hari = $_POST['date'];
$hole = $_POST['hole'];
$fasilitas = $_POST['aset'];

$ticket = uniqid();
$id_user = $_SESSION['id'];
$level = $_SESSION['level'];

$daftar_fasilitas= array_sum($fasilitas);

$tampil = mysqli_fetch_array(mysqli_query($koneksi,"select * from harga "));


if ($tampil['status']=='Umum') {
    $harga = $tampil['harga'] + $daftar_fasilitas ;
} else if ($tampil['status']=='TNI') {
    $harga = $tampil['harga']  + $daftar_fasilitas;
} else if ($tampil['status']== 'Pensiunan') {
    $harga = $tampil['harga']  + $daftar_fasilitas;
}


$queryInsertPembayaran = "INSERT INTO pembayaran values('$ticket','$id_user','$harga','', 0,'$level')";
$insertPembayaran = mysqli_query($koneksi, $queryInsertPembayaran);

if ($insertPembayaran) {
    $queryChecker = "SELECT * FROM `pertandingan` WHERE hari = '$hari' && jam = '$jam' && hole = '$hole'";
    $checkResult = mysqli_query($koneksi, $queryChecker);
    $assocResult = mysqli_fetch_array($checkResult);
    $id_pembayaran =  mysqli_insert_id($koneksi);
    if (mysqli_num_rows($checkResult) > 0) {
        // $data = mysqli_fetch_row($checkResult);
        if ($assocResult[1] != 0 && $assocResult[2] != 0) {
            $insertQuery = "INSERT INTO pertandingan VALUES('','$id_player','','$ticket','','$jam','$hari','$hole')";
            $executeQuery = mysqli_query($koneksi, $insertQuery);
            if ($executeQuery) {
                header('location:../index.php?menu=payment');
            }
        } else if ($assocResult[1] != 0 && $assocResult[2] == 0) {
            $insertQuery = "UPDATE pertandingan SET id_player_dua = '$id_player', id_pembayaran_player_dua = '$ticket' WHERE id_pertandingan = $assocResult[0]";
            $executeQuery = mysqli_query($koneksi, $insertQuery);
            if ($executeQuery) {
                header('location:../index.php?menu=payment');
            }
        }
    } else {
        $insertQuery = "INSERT INTO pertandingan VALUES('','$id_player','','$ticket','','$jam','$hari','$hole')";
        $executeQuery = mysqli_query($koneksi, $insertQuery);
        if ($executeQuery) {
            header('location:../index.php?menu=payment');
        }
    }
}else{
    echo $queryInsertPembayaran;
}


// $querySearchUser = "Select * From tabel_user Where nama = '$username'";
// $hasilSearchUser = mysqli_query($koneksi, $querySearchUser);
// if (mysqli_num_rows($hasilSearchUser) > 0) {

// 	echo "<script type='text/javascript'>
// 	swal({
// 		title: 'Username sudah terdaftar',
// 		timer: 3000,
// 		showConfimButton: true
// 	})
// 	.then(() => {
// 		window.location.replace('../index.php?menu=home')
// 	});
// 	</script>";
// } else {

// 	$querySearchUserbyTelp = "Select * From tabel_user Where telp = '$telp'";
// 	$hasilSearchUserbyTelp = mysqli_query($koneksi, $querySearchUserbyTelp);
// 	if (mysqli_num_rows($hasilSearchUserbyTelp) > 0) {

// 		echo "<script type='text/javascript'>
// 		swal({
// 			title: 'Nomor telepon sudah terdaftar',
// 			timer: 3000,
// 			showConfimButton: true
// 		})
// 		.then(() => {
// 			window.location.replace('../index.php?menu=home')
// 		});
// 		</script>";
// 	} else {
// 		if ($password == $password1) {


// 			$pengacak = "p3ng4c4k";

// 			$passmd = md5($pengacak . md5($password));

// 			$query = "INSERT INTO tabel_user VALUES('','$username', '$email', '$telp', '', '$passmd','$password','$level')";
// 			$hasil = mysqli_query($koneksi, $query);

// 			if ($hasil) echo "<script>
// 								swal({
// 									title : 'Berhasil Registrasi',
// 									type: 'success',
// 									timer: 3000,
// 									showConfimButton: true
// 							}).then(()=>{
// 								window.location= '../login.php';
// 							});
// 						</script>";
// 		} else {
// 			echo "<script>
// 						swal({
// 							title : 'Password tidak sama',
// 							timer: 3000,
// 							showConfimButton: true
// 					}).then(()=>{
// 						window.location= '../login.php';
// 					});
// 				</script>";
// 		}
// 	}
// }
?>