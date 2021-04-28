<?php
include "koneksi.php";

if(isset($_POST['kirim'])){
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
    $komentar = strfilter($_POST ['komentar']);
    $experience = strfilter($_POST ['experience']);
    $nama = strfilter($_POST ['nama']);
    $id = strfilter($_POST ['id']);
    $tgl = strfilter($_POST ['tgl']);
	
	$query = "INSERT INTO ulasan values('','$experience','$nama','$komentar','$id','$tgl')";
	$hasil=mysqli_query($koneksi,$query);
    echo "<script type='text/javascript'>
    window.location.replace('?menu=home')
    </script>";
}
?>