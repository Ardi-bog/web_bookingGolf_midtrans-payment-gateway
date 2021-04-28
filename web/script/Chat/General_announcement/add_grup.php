<?php 
    include '../../koneksi.php';
	session_start();
	
	if (isset($_POST['chatname'])){
	$cid="";
	$chat_name=$_POST['chatname'];
	
	mysqli_query($koneksi,"insert into chatroom (chat_name, userid) values ('$chat_name', '".$_SESSION['id']."')");
	// $cid=mysqli_insert_id($conn);
	
	// mysqli_query($conn,"insert into chat_member (chatroomid, userid) values ('$cid', '".$_SESSION['id']."')");
	
	// echo $cid;
	}
	
	
?>