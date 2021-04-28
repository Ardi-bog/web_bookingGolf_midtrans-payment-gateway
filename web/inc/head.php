<link href="../script/css/style.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/font/css/fontawesome.min.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/font/css/all.min.css" rel="stylesheet" type="text/css">

<?php 
include "koneksi.php";
@session_start(); 

@$role = $_SESSION['level'];
@$id = $_SESSION['id'];
$tampil = mysqli_fetch_array(mysqli_query($koneksi,"select * from harga where keterangan like '%promo%' && status = '$role'"));
$coba = mysqli_fetch_array(mysqli_query($koneksi, "select * from tabel_user where id='$id' "));
?>



<nav class="navbar navbar-default navbar-fixed-top" role="navigation" style="border-bottom:3px solid #A3B4D4">

  <!-- Brand and toggle get grouped for better mobile display -->
   
  <div class="navbar-header">

  	<div class="col-xs-8 col-lg-10">
    	<a class="navbar-brand" href="?menu=home">
        	<img src="./img/logo.png" width="33" style="margin-top:10px; overflow:auto;" /></a>
    </div>    
	<div class="col-xs-2 col-lg-2" style="margin-top:10px;">
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" style="float:none">
      <span class="sr-only"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    </div>

            
</a></li>
        </ul>
        
    </div>
    
    
  </div>
   
  

  <!-- Collect the nav links, forms, and other content for toggling -->
  <?php
      //        {

           ?>    
    <!-- <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">  
    <ul class="nav navbar-nav navbar-right" style="padding-right:15px">
      <li><a href="?menu=home" class="text-center"><i class="fas fa-golf-ball"></i><br />Beranda</a></li> -->
      <!-- <li><a href="?menu=schedule" class="hidden-xs hidden-phone text-center"><i class="fas fa-calendar-alt"></i><br />Jadwal</a></li>
      <li><a href="?menu=payment" class="hidden-xs hidden-phone text-center"><i class="far fa-handshake"></i><br />Tagihan</a></li>
      
      <li><a href="?menu=chatroom" class="text-center"><i class="far fa-comments"></i><br />Group Chat</a></li> -->
      <!-- <li><a href="./login.php" class="hidden-xs hidden-phone text-center"><i class="fas fa-mail-bulk"></i><br />Login</a></li> -->

      <!-- <li><a href="./script/aksi_logout.php" class="text-center"><i class="fas fa-power-off"></i><br />Logout</a></li>
    </ul>
	</div> -->
              
              <?php
              if( @$coba['alamat'] == NULL) {
                ?>
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">  
    <ul class="nav navbar-nav navbar-right" style="padding-right:15px">
      <li><a href="?menu=home" class="text-center"><i class="fas fa-golf-ball"></i><br />Beranda</a></li>
      <!-- <li><a href="?menu=schedule" class="hidden-xs hidden-phone text-center"><i class="fas fa-calendar-alt"></i><br />Jadwal</a></li>
      <li><a href="?menu=payment" class="hidden-xs hidden-phone text-center"><i class="far fa-handshake"></i><br />Tagihan</a></li>
      
      <li><a href="?menu=chatroom" class="text-center"><i class="far fa-comments"></i><br />Group Chat</a></li> -->
      <!-- <li><a href="./login.php" class="hidden-xs hidden-phone text-center"><i class="fas fa-mail-bulk"></i><br />Login</a></li> -->

      <li><a href="./script/aksi_logout.php" class="text-center"><i class="fas fa-power-off"></i><br />Logout</a></li>
    </ul>
  </div>
  <?php
              }else{
              ?>
     <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">  
    <ul class="nav navbar-nav navbar-right" style="padding-right:15px">
      <li><a href="?menu=home" class="text-center"><i class="fas fa-golf-ball"></i><br />Beranda</a></li>
      <li><a href="?menu=schedule" class="hidden-xs hidden-phone text-center"><i class="fas fa-calendar-alt"></i><br />Jadwal</a></li>
      <li><a href="?menu=review" class="hidden-xs hidden-phone text-center"><i class="fas fa-calendar-alt"></i><br />Ulasan</a></li>
      <li><a href="?menu=payment" class="hidden-xs hidden-phone text-center"><i class="far fa-handshake"></i><br />Tagihan</a></li>
      
      <li><a href="?menu=chatroom" class="text-center"><i class="far fa-comments"></i><br />Group Chat</a></li>
      <!-- <li><a href="./login.php" class="hidden-xs hidden-phone text-center"><i class="fas fa-mail-bulk"></i><br />Login</a></li> -->

      <li><a href="./script/aksi_logout.php" class="text-center"><i class="fas fa-power-off"></i><br />Logout</a></li>
    </ul>
  </div>
  <?php
    }
  ?>


               

  
   <!-- /.navbar-collapse -->
 
</nav>
