<?php
include("koneksi.php");
$sql = mysqli_query($connect,"SELECT chat.*, tabel_user.nama, tabel_user.id FROM chat, tabel_user WHERE chat.id_chatroom = $id_chatroom && chat.id_user = tabel_user.id limit 1");
$result = array();
 
while($row = mysqli_fetch_array($sql)){
	array_push($result, array('no_daftar' => $row[0]));
}
echo json_encode(array("result" => $result));
