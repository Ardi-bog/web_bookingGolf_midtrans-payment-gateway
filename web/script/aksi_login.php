<html>



<head>

	<script src="sweetalert.js"></script>

</head>



</html>

<?php

session_start();

include "koneksi.php";
function strfilter($input)
    {
    $input=trim($input);
    $input=strip_tags($input);
    $input=nl2br($input);
    $input=addslashes($input);
    $input=stripslashes($input);
    $input=str_ireplace("'", "%", $input);
    $input=str_ireplace( "''", '%', $input );
    $input=str_ireplace( '""', '%', $input );
    $query = preg_replace( '|(?<!%)%s|', "'%s'", $input );
    $input=htmlentities($input, ENT_QUOTES);
    $input=ltrim($input);
    $input=rtrim($input);
    return $input;
    }


$telp =strfilter($_POST['telp']);

$password = strfilter($_POST['password']);



$query = "SELECT * FROM tabel_user WHERE telp = '$telp'";

$hasil = mysqli_query($koneksi, $query);



if (mysqli_num_rows($hasil) > 0) {



	$data = mysqli_fetch_array($hasil);

	$pengacak = "p3ng4c4k";



	$passmd = md5($pengacak . md5($password));

	if ($passmd == $data['password']) {

		if ($data['verified'] == 1) {

			$_SESSION['level'] = $data['level'];

			$_SESSION['id'] = $data['id'];

			$_SESSION['nama'] = $data['nama'];

			$_SESSION['telp'] = $data['telp'];

			$_SESSION['email'] = $data['email'];

			$_SESSION['verified'] = $data['verified'];

			echo "<script type='text/javascript'>

		setTimeout(function(){

			swal({

				title : 'Berhasil Login',

				text : 'Selamat Datang Di Padang Golf Halim!',

				type: 'success',

				timer: 3000,

				showConfimButton: true

		});

	},10);

	window.setTimeout(function(){

		window.location.replace('../index.php?menu=home');

	},3000);

		</script>";

		}else if($data['verified'] == 0){
			$_SESSION['level'] = $data['level'];

			$_SESSION['id'] = $data['id'];

			$_SESSION['nama'] = $data['nama'];

			$_SESSION['telp'] = $data['telp'];

			$_SESSION['email'] = $data['email'];

			$_SESSION['verified'] = $data['verified'];

			echo "<script type='text/javascript'>

		setTimeout(function(){

			swal({

				title : 'Akun anda belum di verifikasi',

				text : 'Segera hubungi administrasi',

				timer: 3000,

				showConfimButton: true

		});

	},10);

	window.setTimeout(function(){

		window.location.replace(../login.php');

	},3000);

		</script>";

		 }

	} else {

		echo "<script type='text/javascript'>

		swal({

			title: 'Username atau Password salah',

			timer: 3000,

			showConfimButton: true

		})

		.then(() => {

			window.location.replace('../login.php')

		});

		</script>";

	}

} else {

	echo "<script type='text/javascript'>

	swal({

		title: 'Username atau Password salah',

		timer: 3000,

		showConfimButton: true

	})

	.then(() => {

		window.location.replace('../login.php')

	});

	</script>";

}







?>