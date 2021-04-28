<?php 
    include './koneksi.php';
	session_start();
	
	$cid="";
	$chat_name=$_POST['chatname'];
	$query = "insert into chatroom (chat_name, userid) values ('Golf Rawarontek Klub', '12')";
	$executequery = mysqli_query($koneksi,$query);
		if($executequery){
			header("location: ../index.php?menu=chatroom");
		}else{
		    ?>
		    
	<script>
	    alert("Gagal untuk membuat grup");
	     window.location.replace("../index.php?menu=chatroom");
	</script>
	<?php
		} 
	?>
