<script src="sweetalert.js"></script>

<?php
include 'koneksi.php';

if(isset($_POST['cek'])){
$cek = $_POST['kode'];
$id = $_POST['user'];

$query = "SELECT * FROM tabel_user WHERE otp = '$cek' && id ='$id'";

$hasil = mysqli_query($koneksi, $query);
$newhasil = mysqli_fetch_row($hasil);
if($newhasil[11] == $cek){
    $update = "UPDATE tabel_user
	SET verified= 1  WHERE id = '$id' ";
    $set=mysqli_query($koneksi,$update);
    if($update){
        echo "<script type='text/javascript'>

		setTimeout(function(){

			swal({

				title : 'Berhasil Verifikasi',

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
    }else{
        echo "<script type='text/javascript'>

		swal({

			title: 'Kode Verifikasi Salah',

			timer: 3000,

			showConfimButton: true

		})

		.then(() => {

			window.location.replace('verifikasi.php')

		});

		</script>";
    }
}else{
    echo "<script type='text/javascript'>

    swal({

        title: 'Kode Verifikasi Salah',

        timer: 3000,

        showConfimButton: true

    })

    .then(() => {

        window.location.replace('verifikasi.php')

    });

    </script>";
    }
}
?>