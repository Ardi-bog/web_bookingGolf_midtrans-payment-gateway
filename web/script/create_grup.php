<?php
include './koneksi.php';
session_start();


if (isset($_POST['inviteButton'])) {
    $id_player = $_SESSION['id'];
    $level = $_SESSION['level'];
    $anggota = $_POST['userList'];
    $jam = $_POST['time'];
    $hari = $_POST['date'];
    $fasilitas = $_POST['aset'];

    $ticket = uniqid();
    $sewa_grup = count($anggota)+1;
    $id_user = $_SESSION['id'];
    $role = $_SESSION['level'];
    $daftar_fasilitas = array_sum($fasilitas);
    $dayname = $_POST['dayname'];

    $query = "SELECT * FROM harga WHERE status = '$role' && hari = '$dayname'";
    $tampil = mysqli_fetch_array(mysqli_query($koneksi, $query));
    $query_diskon = "SELECT * FROM harga WHERE status = '$role' && hari = '$dayname' && keterangan like '%12%'";
    $diskon = mysqli_fetch_array(mysqli_query($koneksi, $query_diskon));

    // echo $query;
    $harga = $tampil['harga'] + $daftar_fasilitas + $tampil['fee'] + $tampil['ppn'] ;
    $harga_diskon = $diskon['harga'] + $daftar_fasilitas + $diskon['fee'] + $diskon['ppn'] ;
    $id_harga = $tampil['id'];
    $id1 = $diskon['id'];

    $cek = $koneksi->query("select*from pertandingan");

        if($dayname == 'minggu' && $jam >= 12.00 ){
            $queryInsertPembayaran = "INSERT INTO pembayaran values('$ticket','$id_user','$harga_diskon','0000-00-00', 0,'', '$role','$id')";
            $insertPembayaran = mysqli_query($koneksi, $queryInsertPembayaran);
        }else{
            $queryInsertPembayaran = "INSERT INTO pembayaran values('$ticket','$id_user','$harga','0000-00-00', 0,'', '$role','$id_harga')";
            $insertPembayaran = mysqli_query($koneksi, $queryInsertPembayaran); ;
        }

    if ($insertPembayaran) {

        $insertQuery = "INSERT INTO pertandingan VALUES('','$id_player','$ticket','$jam','$hari')";
        $executeQuery = mysqli_query($koneksi, $insertQuery);
        if ($executeQuery) {
            header('location:../index.php?menu=payment');
        } else echo $insertQuery;
    } else {
        echo $queryInsertPembayaran;
    }
    if (isset($_POST['chatname'])) {
        $cid = "";
        $chat_name = $_POST['chatname'];

        if (mysqli_query($koneksi, "insert into chatroom (chat_name, userid) values ('$chat_name', '" . $_SESSION['id'] . "')")) {
        }
        $last_id = mysqli_insert_id($koneksi);
        $queryUserSession = "INSERT INTO join_chatroom VALUES(NULL, '$last_id', '" . $_SESSION['id'] . "')";
        if (mysqli_query($koneksi, $queryUserSession)) {

            if (!empty($_POST['userList'])) {

                foreach ($_POST['userList'] as $iduser) {
                    $queryJoinChatroom = "INSERT INTO join_chatroom VALUES(NULL, '$last_id', '$iduser')";
                    mysqli_query($koneksi, $queryJoinChatroom);
                }
                header("location: ../index.php?menu=payment");
            }
        }
    }
} else if (isset($_POST['notGrupButton'])) {
    $id_player = $_SESSION['id'];
    $jam = $_POST['time'];
    $hari = $_POST['date'];
    $fasilitas = $_POST['aset'];

    $ticket = uniqid();
    $id_user = $_SESSION['id'];
    $role = $_SESSION['level'];
    $daftar_fasilitas = array_sum($fasilitas);
    $dayname = $_POST['dayname'];

    $query = "SELECT * FROM harga WHERE status = '$role' && hari = '$dayname'";
    $tampil = mysqli_fetch_array(mysqli_query($koneksi, $query));
    $query_diskon = "SELECT * FROM harga WHERE status = '$role' && hari = '$dayname' && keterangan like '%12%'";
    $diskon = mysqli_fetch_array(mysqli_query($koneksi, $query_diskon));

    // echo $query;
    $harga = $tampil['harga'] + $daftar_fasilitas + $tampil['fee'] + $tampil['ppn'] ;
    $harga_diskon = $diskon['harga'] + $daftar_fasilitas + $diskon['fee'] + $diskon['ppn'] ;
    $id_harga = $tampil['id'];
    $id1 = $diskon['id'];
    $cek = $koneksi->query("select*from pertandingan");

        if($dayname == 'minggu' && $jam >= 12.00 ){
            $queryInsertPembayaran = "INSERT INTO pembayaran values('$ticket','$id_user','$harga_diskon','0000-00-00', 0,'', '$role','$id1')";
            $insertPembayaran = mysqli_query($koneksi, $queryInsertPembayaran);
        }else{
            $queryInsertPembayaran = "INSERT INTO pembayaran values('$ticket','$id_user','$harga','0000-00-00', 0,'', '$role','$id_harga')";
            $insertPembayaran = mysqli_query($koneksi, $queryInsertPembayaran); ;
        }
       
    
        
    
    
    if ($insertPembayaran) {

        $insertQuery = "INSERT INTO pertandingan VALUES('','$id_player','$ticket','$jam','$hari')";
        $executeQuery = mysqli_query($koneksi, $insertQuery);
        if ($executeQuery) {
            header('location:../index.php?menu=payment');
            // echo $queryInsertPembayaran;
        } else echo $insertQuery;
    } else {
        echo $queryInsertPembayaran;
    }
}
 else {
    echo 'Gagal';
}
