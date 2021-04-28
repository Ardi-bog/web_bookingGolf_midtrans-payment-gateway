<link href="../script/css/style.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/font/css/fontawesome.min.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/font/css/all.min.css" rel="stylesheet" type="text/css">



<?php
include './script/koneksi.php';
?>
<?php
//  $ambil = $koneksi -> query("select*from pembayaran where id_user = ".$_SESSION['id']."");
//  $no=1;
$sql=mysqli_query($koneksi, "SELECT * FROM pembayaran where id_user = ".$_SESSION['id']." AND lunas = '1'");
?>
<div class="container pt-100" style="margin-top:10px">
    <div class="col-sm-12">       
       <article role="manufacturer" style="margin:0;padding:5px;max-width:100%;min-height:370px">
          <header class="text-center">GENERATE KODE QR TIKET ANDA</header><hr />
<!-----------------------------------------------SCAN---------------------------------------------------------->
            <div id="tb-testimonial" class="testimonial testimonial-default">
                <div class="testimonial-section">
                    Hallo,<b><?= $_SESSION['nama']; ?></b> silahkan buat kode qr anda
            	</div>
                <?php while($d=mysqli_fetch_array($sql)){?>
                <div class="testimonial-desc">
                  <i class="fas fa-qrcode  fa-5x"></i>
                    <div class="testimonial-writer">
                    	<div class="testimonial-writer-name"><a href=""><span style = "color: #515B8F;"><?php echo $d['no_tiket'];?></a></div>
                    	<div class="testimonial-writer-designation">Terverifikasi</div>
                    </div>
                    
								<a class="btn btn-danger btn-sm-4" href="?menu=qr&&no=<?php echo $d['no_tiket'];?>&nomor=<?php echo $d['no_tiket'];?>" style="margin-left:25%;">Buat Kode QR</a>
								<a class="btn btn-success btn-sm-4" href="?menu=cetakstruk&&id=<?php echo $d['no_tiket'];?>" >Cetak</a>
                </div>      
                <?php
}
?>        
<!-----------------------------------------------SCAN---------------------------------------------------------->             
        </article>   
    </div>
   <hr />
</div>          