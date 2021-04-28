<html>



<head>

	<script src="sweetalert.js"></script>

</head>



</html>
<?php
// include "koneksi.php";



// if(isset($_POST['tambah'])){
// function strfilter($input)
// {
// $input=trim($input);
// $input=strip_tags($input);
// $input=nl2br($input);
// $input=addslashes($input);
// $input=stripslashes($input);
// $input=str_ireplace("'", "%", $input);
// $input=str_ireplace( "''", '%', $input );
// $input=str_ireplace( '""', '%', $input );
// $query = preg_replace( '|(?<!%)%s|', "'%s'", $input );
// $input=htmlentities($input, ENT_QUOTES);
// $input=ltrim($input);
// $input=rtrim($input);
// return $input;
// }
//     $ntk = strfilter($_POST['ntk']);
//     $alamat = strfilter($_POST['alamat']);
//     $lokasi= strfilter($_FILES ['gambar']['tmp_name']);
// 	$gambar = strfilter($_FILES ['gambar']['name']); 
// 	$lokasi1= strfilter($_FILES ['ntk']['tmp_name']);
// 	$ntk = strfilter($_FILES ['ntk']['name']); 
//     $getid = strfilter($_POST['id']);
//     move_uploaded_file($lokasi,"./img/".$gambar);
//     move_uploaded_file($lokasi1,"./img/".$ntk);
// 	$update = "UPDATE tabel_user
// 	SET alamat= '$alamat', foto ='$gambar', ntk ='$ntk' WHERE id = '$getid' ";
// 	$hasil=mysqli_query($koneksi,$update);
	
// 	if($hasil){
// 		echo "<script type='text/javascript'>



// 		window.location.replace('../index.php?menu=home');


// 		</script>";
       
// 	} else{
// 		echo $hasil;
// 	}
// }
$getid = $_POST['id'];
if(isset($_POST['upload'])) {
    date_default_timezone_set('Asia/Jakarta');
    $name        = $_POST['gambar'];
    $time        = time();
    $nama_gambar = $_FILES['gambar'] ['name']; // Nama Gambar
    $size        = $_FILES['gambar'] ['size'];// Size Gambar
    $error       = $_FILES['gambar'] ['error'];
    $tipe_video  = $_FILES['gambar'] ['type']; //tipe gambar untuk filter
    $folder      = "uploads/"; //folder tujuan upload
    $valid       = array('jpg','png','gif','jpeg'); //Format File yang di ijinkan Masuk ke server
    
    if(strlen($nama_gambar))

       {   

         // Perintah untuk mengecek format gambar

         list($txt, $ext) = explode(".", $nama_gambar);

         if(in_array($ext,$valid))

         {   

           // Perintah untuk mengecek size file gambar

           if($size<500000)

           {   

             // Perintah untuk mengupload gambar dan memberi nama baru

             $gambarnya = time().substr(str_replace(" ", "_", $txt), 5).".".$ext;
             $gmbr  = $folder.$gambarnya;
             
             $tmp = $_FILES['gambar']['tmp_name'];

             if(move_uploaded_file($tmp, $folder.$gambarnya))

             {   
              $mysqli->query(" UPDATE tabel_user
				SET  foto ='$nama_gambar' WHERE id = '$getid'");
              echo '<script>
                  alert("gambar Berhasil di upload");
               </script>';

             }
                else{ // Jika Gambar Gagal Di upload 
            echo '<script>
                  alert("gambar Gagal di upload");
               </script>';
            }
            
           }
           else{ // Jika Gambar melebihi size 
           echo '<script>
                  alert("gambar Terlalu Besar, Max 5MB");
               </script>';  
             }         

         }

         else{ // Jika File Gambar Yang di Upload tidak sesuai eksistensi yang sudah di tetapkan
            echo '<script>
                  alert("Format Gambar Tidak valid , Format Gambar Harus (JPG, Jpeg, gif, png) ");
               </script>';  
             }

       }         

       else{ // Jika Gambar belum di pilih 
        echo '<script>
                  alert("Gambar Belum Di Pilih , Harap Memilih Gambar Dahulu");
               </script>'; 
          }       

       exit;

     }
?>  