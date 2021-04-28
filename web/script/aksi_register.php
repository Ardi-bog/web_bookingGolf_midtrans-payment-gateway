<html>

<head>
	<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
</head>

</html>
<?php
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

include "koneksi.php";
$email = strfilter($_POST['email']);
$password = strfilter($_POST['password']);
$password1 = strfilter($_POST['pass1']);
$username = strfilter($_POST['username']);
$level = strfilter($_POST['level']);
$telp = strfilter($_POST['telp']);
$lokasi = strfilter($_POST['lokasi']);
// $lokasi= $_FILES['scan']['tmp_name'];


$querySearchUser = "Select * From tabel_user Where nama = '$username'";
$hasilSearchUser = mysqli_query($koneksi, $querySearchUser);
if (mysqli_num_rows($hasilSearchUser) > 0) {

	echo "<script type='text/javascript'>
	swal({
		title: 'Username sudah terdaftar',
		timer: 3000,
		showConfimButton: true
	})
	.then(() => {
		window.location.replace('../login.php' )
	});
	</script>";
} else {

	$querySearchUserbyTelp = "Select * From tabel_user Where telp = '$telp'";
	$hasilSearchUserbyTelp = mysqli_query($koneksi, $querySearchUserbyTelp);
	if (mysqli_num_rows($hasilSearchUserbyTelp) > 0) {

		echo "<script type='text/javascript'>
		swal({
			title: 'Nomor telepon sudah terdaftar',
			timer: 3000,
			showConfimButton: true
		})
		.then(() => {
			window.location.replace('../login.php')
		});
		</script>";
	} else {
		if ($password == $password1) {


			$pengacak = "p3ng4c4k";

			$passmd = md5($pengacak . md5($password));

			$query = "INSERT INTO tabel_user VALUES('','$username', '$email', '$telp', '', '$passmd','$password','$level',1,'', '','','' )";
			$hasil = mysqli_query($koneksi, $query);

			if ($hasil) {
				echo "<script>
						swal({
							title : 'Berhasil Registrasi',
							type: 'success',
							timer: 3000,
							showConfimButton: true
							}).then(()=>{
								window.location= '../login.php';
							});
					</script>";
			} else {
				echo "<script>
				swal({
					title : 'Gagal Registrasi',
					timer: 3000,
					showConfimButton: true
					}).then(()=>{
						window.location= '../login.php';
					});
				</script>";;
			}
		} else {
			echo "<script>
						swal({
							title : 'Password tidak sama',
							timer: 3000,
							showConfimButton: true
					}).then(()=>{
						window.location= '../login.php';
					});
				</script>";
		}
	}
}
