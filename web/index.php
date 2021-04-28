<?php

function tgl_indo($tanggal)
{
	$bulan = array(
		1 =>   'Januari',
		'Februari',
		'Maret',
		'April',
		'Mei',
		'Juni',
		'Juli',
		'Agustus',
		'September',
		'Oktober',
		'November',
		'Desember'
	);
	$pecahkan = explode('-', $tanggal);
	// variabel pecahkan 0 = tanggal
	// variabel pecahkan 1 = bulan
	// // variabel pecahkan 2 = tahun 
	// return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
}
//echo tgl_indo(date('Y-m-d')); // 21 Oktober 2017
$tglnya = tgl_indo(date('Y-m-d'));
$tahunnya = tgl_indo(date('Y'));
?>
<!Doctype html>
<html class="">
<!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!--meta http-equiv="refresh" content="660; url='?menu'"-->
	<meta http-equiv="refresh" content="660;">

	<title>.:Halim Golf:.</title>
	<link rel="shortcut icon" href="logo.png">
	<link href="script/css/boilerplate.css" rel="stylesheet" type="text/css">
	<link href="script/css/style.css" rel="stylesheet" type="text/css">
	<link href="script/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
	<link href="script/css/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
	<link href="script/css/bootstrap/font/css/fontawesome.min.css" rel="stylesheet" type="text/css">
	<link href="script/css/bootstrap/font/css/all.min.css" rel="stylesheet" type="text/css">

	<script src="script/js/respond.min.js"></script>
	<script src="script/js/jquery.min.js"></script>
	<script src="script/js/bootstrap.min.js"></script>
	<!---------------------DATETIME-------------------------------------------------------->


</head>

<body>
	<?php include 'inc/head.php' ?>
	<?php
	// error_reporting(0);s
	@session_start();
	$id = $_SESSION['id'];
	if ($id == 0 || $id == null) {
		header('location:login.php');
	} else {
		if (isset($_GET['menu'])) {
			$menu = $_GET['menu'];
			switch ($menu) {
				case ('home');
					include('master/home.php');
					break;
				case ('schedule');
					include('master/jadwal.php');
					break;
					case ('review');
					include('master/review.php');
					break;					
				case ('payment');
					include('master/pembayaran.php');
					break;
				case ('scan');
					include('master/scan.php');
					break;
				case ('cancelPage');
					include('master/cancel.php');
					break;
				case ('login');
					include('master/login.php');
					break;
					case ('promo');
					include('script/bayar_promo.php');
					break;
					case ('review');
					include('script/review.php');
					break;
				case ('register');
					include('master/register.php');
					break;
					case ('updateUser');
					include('script/updateUser.php');
				break;
					case ('aksiCancel');
					include('script/aksi_cancel.php');
					break;
				case ('cancel');
					include('script/cancel.php');
					break;
				case ('page');
					include('master/page.php');
					break;
				case ('daftar');
					include('script/aksi_register.php');
					break;
				case ('cek');
					include('script/aksi_login.php');
					break;
				case ('bayar');
					include('script/aksi_bayar.php');
					break;
					case ('otp');
					include('script/verifikasi.php');
					break;
				case ('struk');
					include('master/struk.php');
					break;
				case ('cetakstruk');
					include('master/cetakstruk.php');
					break;
				case ('nota');
					include('script/nota.php');
					break;
				case ('qr');
					include('script/buatqr.php');
					break;
				case ('grup');
				include('script/add_grup.php');
				break;
				case ('chatroom'):
				include('master/chatroom.php');
					break;
				case ('chat'):
					include('master/chat.php');
					break;
				default:
					include('master/home.php');
			}
		} else {

			include('master/home.php');
		}
	}
	?>
	<?php

	include 'inc/foot.php';
	?>
</body>

</html>