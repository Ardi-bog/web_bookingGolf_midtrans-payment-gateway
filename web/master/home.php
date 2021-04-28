<link href="../script/css/style.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/font/css/fontawesome.min.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/font/css/all.min.css" rel="stylesheet" type="text/css">
<style>
/* Review */
body {
  background-color: #f7f6f6
}

.card {
  width: 800px
}

.icon i {
  font-size: 25px;
  color: #2196F3
}

label.radio {
  cursor: pointer;
  width: 100% !important;
  margin-top: 9px
}

label.radio input {
  position: absolute;
  top: 0;
  left: 0;
  visibility: hidden;
  pointer-events: none;
  width: 100%
}

label.radio span {
  padding: 7px 14px;
  border: 1px solid #2E3572;
  display: inline-block;
  color: #2E3572;
  border-radius: 3px;
  box-shadow: 3px 5px 8px 2px #e9ecef;
  width: 100%;
  align-items: center
}

label.radio input:checked+span {
  border-color: #2E3572;
  background-color: #2E3572;
  color: #fff
}

.area {
  resize: none
}

.area:focus {
  box-shadow: none;
  border-color:#2E3572 !important
}

.submit-button,
.submit-button:active,
.submit-button:visited,
.submit-button:focus {
  background-color:#2E3572 !important;
  border-color:#2E3572 !important;
  color: #fff !important;
  box-shadow: none;
  text-transform: uppercase;
  padding-left: 35px;
  padding-right: 35px
}

.submit-button:hover {
  background-color: #2E3572 !important;
  border-color:#2E3572 !important
}
</style>
<?php 
include "./script/koneksi.php";
@session_start(); 
function hariIndo ($hariInggris) {
  switch ($hariInggris) {
    case 'Sunday':
      return 'Minggu';
    case 'Monday':
      return 'Senin';
    case 'Tuesday':
      return 'Selasa';
    case 'Wednesday':
      return 'Rabu';
    case 'Thursday':
      return 'Kamis';
    case 'Friday':
      return 'Jumat';
    case 'Saturday':
      return 'Sabtu';
    default:
      return 'hari tidak valid';
  }
}


$role = $_SESSION['level'];
$id = $_SESSION['id'];
date_default_timezone_set("Asia/Jakarta");
$time = date("h");
$day = date("l");
$hariBahasaIndonesia = hariIndo($day);
$tampil = mysqli_fetch_array(mysqli_query($koneksi,"select * from harga where keterangan like '%promo%' && status = '$role'"));
$promo = mysqli_fetch_array(mysqli_query($koneksi,"select * from harga where  keterangan like '%$time%' && status = '$role' && hari like'%$hariBahasaIndonesia%'"));
$cek = mysqli_fetch_array(mysqli_query($koneksi, "select * from tabel_user where id='$id' "));
?>


<div id="myCarousel" class="carousel slide hidden-phone hidden-xs" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="img/1.jpg" class="img-responsive" width="100%" />
      </div>

      <div class="item">
         <img src="img/2.jpg" class="img-responsive" width="100%" />
      </div>
    
      <div class="item">
         <img src="img/3.jpg" class="img-responsive" width="100%" />
      </div>
    </div>
</div>

<section class="services-area pt-100 pb-70">
		<div class="container">
			<div class="row">
				<div class="col-xl-8 mx-auto text-center">
					<div class="section-title">
					    <?php //echo $hariBahasaIndonesia;?>
					<?php    
        if(strcasecmp( $_SESSION['level'], @$promo['status']) == 0){
			// echo strcasecmp( $_SESSION['level'],$tampil['status']);
          ?>
      <div class=""> 
<!--    <div class="alert alert-success" role="alert">-->
  <?php //echo $promo['keterangan'];?> 
  <!--<a href="master/diskon.php"> <b>Klik Disini!</b></a>-->
<!--  <br>-->
  
<!--</div>-->
<?php
  }else {
    
  ?>
    
  <?php
  } 
  ?>
  			<?php    
        if(strcasecmp( $_SESSION['level'], @$tampil['status']) == 0){
			// echo strcasecmp( $_SESSION['level'],$tampil['status']);
          ?>
      
    <div class="alert alert-success" role="alert">
  <?php echo $tampil['keterangan'];?><a href="master/promo.php"> <b>Klik Disini!</b></a>
  <br>
  
</div>
<?php
  }else {
  ?>
 
  <?php
  } 
  ?>
  
            <h4>Tempat terbaik bermain Golf</h4>

 
            <h5>Padang Golf Halim</h5>
          
					</div>
				</div>
			</div>
    <?php
               if($cek['alamat'] == NULL)  {
    ?>
			<div class="row">
				<div class="col-lg-4 col-md-6 col-xs-4">
				  <!--<a href="?menu=scan">	-->
                    <div class="single-service">
					  <i class="fa"><i class="fas fa-qrcode"></i></i>
					   <h6 class="text-uppercase hidden-desktop">QR</h6>	
                        <h4 class="text-uppercase hidden-xs hidden-phone">QR<br />
						<small class="text-capitalize">Buat Kode Anda</small></h4>
					</div>
                  </a> 
				</div>
				<div class="col-lg-4 col-md-6 col-xs-4">
				  <!--<a href="?menu=payment">		-->
                    <div class="single-service">
					  <i class="fa"><i class="far fa-handshake"></i></i>
					   <h6 class="text-uppercase hidden-desktop">Pembayaran</h6>	
                        <h4 class="text-uppercase hidden-xs hidden-phone">Pembayaran<br />
						<small class="text-capitalize">Lakukan Pembayaran dan Konfirmasi</small></h4>
					</div>
                  </a> 
				</div>
				<div class="col-lg-4 col-md-6 col-xs-4">
                  <!--<a href="?menu=schedule">	-->
					<div class="single-service">
					  <i class="fa"><i class="fas fa-calendar-alt"></i></i>
                       <h6 class="text-uppercase hidden-desktop">Jadwal</h6>
						<h4 class="text-uppercase hidden-xs hidden-phone">Jadwal<br />
						<small class="text-capitalize">Buat Jadwal Sekarang Juga</small></h4>
					</div>
                  </a>  
				</div>
				
			</div>
    </div>
    <?php
               }else{
    ?>
    			<div class="row">
				<div class="col-lg-4 col-md-6 col-xs-4">
				  <a href="?menu=scan">	
                    <div class="single-service">
					  <i class="fa"><i class="fas fa-qrcode"></i></i>
					   <h6 class="text-uppercase hidden-desktop">Buat Tiket</h6>	
                        <h4 class="text-uppercase hidden-xs hidden-phone">QR<br />
						<small class="text-capitalize">Buat Kode Anda</small></h4>
					</div>
                  </a> 
				</div>
				<div class="col-lg-4 col-md-6 col-xs-4">
				  <a href="?menu=payment">		
                    <div class="single-service">
					  <i class="fa"><i class="far fa-handshake"></i></i>
					   <h6 class="text-uppercase hidden-desktop">Pembayaran</h6>	
                        <h4 class="text-uppercase hidden-xs hidden-phone">Pembayaran<br />
						<small class="text-capitalize">Lakukan Pembayaran dan Konfirmasi</small></h4>
					</div>
                  </a> 
				</div>
				<div class="col-lg-4 col-md-6 col-xs-4">
                  <a href="?menu=schedule">	
					<div class="single-service">
					  <i class="fa"><i class="fas fa-calendar-alt"></i></i>
                       <h6 class="text-uppercase hidden-desktop">Jadwal</h6>
						<h4 class="text-uppercase hidden-xs hidden-phone">Jadwal<br />
						<small class="text-capitalize">Buat Jadwal Sekarang Juga</small></h4>
					</div>
                  </a>  
				</div>
				
			</div>
    </div>
    <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal" style="margin-left: 45%;">Pertandingan Usai?</button>

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
      <a href="?menu=review" class="btn btn-info" role="button">Ulasan</a>
      </div>
    </div>

  </div>
</div>
     <div class="container mt-5 mb-5 d-flex justify-content-center ">
    <div class="card" style="margin-left: 10%; margin-bottom: 50%;width:80%;">
        <div class="p-3" style="width: 100%;">
            <div class="first text-center"> <img src="https://i.imgur.com/KCcF6WN.png" width="80">
                <h3 class="mt-2">Thanks you</h3>
                <p class="text-black-50">How About Caddie</p>
            </div>
          <form method='post' action='?menu=review' enctype="multipart/form-data">
            <div class="border p-3 rounded">
                <div class="row">
                <input type="hidden" value="<?php echo $_SESSION['nama'];?>" name="id">
                    <input type="hidden" value="<?php echo $dateNow = date("Y-m-d");?>" name="tgl">
                    <div class="col-md-3"> <label class="radio"> <input type="radio" name="experience" value="Bad Experience"> <span>Bad Experience</span> </label> </div>
                    <div class="col-md-3"> <label class="radio"> <input type="radio" name="experience" value="Good Experience"> <span>Good Experience</span> </label> </div>
                    <div class="col-md-3"> <label class="radio"> <input type="radio" name="experience" value="Great Experience" checked> <span>Great Experience</span> </label> </div>
                    <input type="text" name="nama" class="form-control" value="" placeholder="Nama Caddie" required="required" style="background:white;border-radius:0%;margin-bottom: 5%; color:#2E3572"/>
                </div>
                <div class="mt-4"> <textarea class="area form-control" rows="7" placeholder="add comments" name="komentar"> </textarea> </div>
                <div class="button mt-4 text-right"> <button class="btn btn-success submit-button" name="kirim">Submit</button> </div>
            </div>
        </div>
       </form>
    </div>
</div>
    <?php
               }

    ?>

  
     
<div id="uploadAnggota" class="modal fade" role="dialog">

<div class="modal-dialog">



  <!-- Modal content-->

  <div class="modal-content">

    <div class="modal-header">

      <!-- <button type="button" class="close" data-dismiss="modal">&times;</button> -->

      <h4 class="modal-title">Lengkapi Data Anda!</h4>

    </div>

    <div class="modal-body">

      <!-- Form -->

      <form method='post' action='?menu=updateUser' enctype="multipart/form-data">

      <input type="hidden" value="<?php echo $_SESSION['id'];?>" name="id">
         <?php
             if($cek['alamat'] == NULL && $cek['level'] == 'Umum' || $cek['level'] == 'Senior/Ladies' || $cek['level'] == 'Pensiun'|| $cek['level'] == 'Pro PGH'|| $cek['level'] == 'Pro Umum/PGI'|| $cek['level'] == 'Junior Umum/PGI' )  { 
         ?>      
        <label for="recipient-name" class="col-form-label">NIK:</label>

        <?php
             }else if( $cek['level'] == 'Member Q-GOLF' || $cek['level'] == 'Member The Card'|| $cek['level'] == 'Member'||$cek['level'] == 'member'||$cek['level'] == 'Member Perorangan/Corporate'||$cek['level'] == 'Member Perorangan&Corporate'||$cek['level'] == 'Member Lifetime') {
        ?>
         <label for="recipient-name" class="col-form-label">No Member:</label>
        <?php
             }else{
        ?>
          <label for="recipient-name" class="col-form-label">KTA:</label>
        <?php
        }
        ?> 
        <!-- <input type='file' name='fileToUpload' id='file' class='form-control' required="required" style="background-color: white !important;" ><br> -->
        <!-- <label for="recipient-name" class="col-form-label">Alamat:</label>
        <input type="text" class="form-control" id="alamat" name="alamat" required="required" style="background-color: white !important;">
        <label for="recipient-name" class="col-form-label">Foto:</label>-->
        <input type='file' name='gambar' id='file' class='form-control'required="required" style="background-color: white !important;" ><br> 
        <button type="submit" name="submit" class="btn btn-login btn-block"> Konfirmasi</button>

      </form>

    <?php
               if($cek['alamat'] == NULL )  {
               echo"
              <script>
                    $(document).ready(function(){
                    $('#uploadAnggota').modal('show');
                  });   
              </script>";
             
            
              }else {
                echo " 
                 <script>
                   $(document).ready(function(){  
                    $('#uploadAnggota').modal('hide');
                  });

              </script>";
                }
              ?>   

</section>

