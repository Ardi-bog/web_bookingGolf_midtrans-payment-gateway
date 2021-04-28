<link href="../script/css/style.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/font/css/fontawesome.min.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/font/css/all.min.css" rel="stylesheet" type="text/css">

<?php ?>

<?php
include './script/koneksi.php';
?>

<?php

// $sql=mysqli_query($koneksi, "SELECT * FROM pembayaran where id_user = ".$_SESSION['id']." AND lunas = '0'");

?>

<div class="container pt-100" style="margin-top:10px">
  <div class="col-sm-6">
    <article role="manufacturer" style="margin:0;padding:5px;max-width:100%;min-height:370px">
      <header class="text-center">TAGIHAN ANDA</header>
      <h4 class="text-center">Daftar Tagihan Anda</h4>
      <!-----------------------------------------------TABS---------------------------------------------------------->

      <div id="tb-testimonial" class="testimonial testimonial-default">
        <div class="testimonial-section">
          Hallo,<b> <?= $_SESSION['nama']; ?></b> berikut tagihan anda yang belum selesai         
          <br>
          <b>Klik No Tiket Untuk Melakukan Pembayaran!
        </div>

        <?php
       $ambil = mysqli_query($koneksi,"select * from pembayaran where id_user = " . $_SESSION['id'] . " && lunas = '0' && harga != '0'"); 
       while ($tampil = $ambil->fetch_assoc())
        { ?>
          <div class="testimonial-desc panel-info">
            <i class="fas fa-golf-ball fa-5x"></i>
            <?php
                $tikete = $tampil['no_tiket'];
                 $tanggal =  mysqli_fetch_array(mysqli_query($koneksi,"select * from pertandingan where id_pembayaran_player_satu = '$tikete' ")); ?>
            <div class="testimonial-writer"><h5><?php echo $tanggal['hari']; ?> <?php echo $tanggal['jam']; ?></h5>
              <div class="testimonial-writer-name"><h3>Rp.<?php echo number_format($tampil['harga'],0,".","."); ?></h3>
              <span style="color: #515B8F;"><span class="label label-default">No. Tiket</span> : <small class="text-uppercase text-right"><?php echo $tampil['no_tiket']; ?></small></div>
              
			  <!--?php
                //$tgl = $tampil['no_tiket'];
                // $tanggal =  mysqli_fetch_array(mysqli_query($koneksi,"select * from pertandingan where id_pembayaran_player_satu = '$tgl' ")); 
                // while ($t = $tanggal->fetch_assoc()){
              ?-->
            
            
              <div class="testimonial-writer-designation"><a href="?menu=struk&&id=<?php echo $tampil['no_tiket']; ?>" class="btn btn-success pull-left">Bayar</a></div>
              <div class="testimonial-writer-designation" ><a href="?menu=cancel&&id=<?php echo $tampil['no_tiket']; ?>" class="btn btn-danger pull-left">Cancel</a></div>
           
            </div>
          </div>
          <hr />
             <?php }?>
             
             <?php //}?>
            
          <!-- </div> -->

        

      </div>

      <!-----------------------------------------------TABS---------------------------------------------------------->

    </article>



  </div>

<?php include './script/koneksi.php'; ?>

<?php
$tagihan = $koneksi->query("select * from pembayaran where id_user = " . $_SESSION['id'] . " && lunas = '1'"); ?>

  <div class="col-sm-6">
    <article role="manufacturer" style="margin:0;padding:5px;max-width:100%;min-height:370px">
    <header class="text-center">TAGIHAN SELESAI</header>
      <h4 class="text-center">Daftar Tagihan Anda</h4>
<!-----------------------------------------------TABS---------------------------------------------------------->

      <div id="tb-testimonial" class="testimonial testimonial-default" style="margin-bottom: 50%;">
        <div class="testimonial-section">
          Hallo,<b> <?= $_SESSION['nama']; ?></b> berikut tagihan anda yang sudah lunas
        </div>

        <?php while ($selesai = $tagihan->fetch_assoc()) { ?>
          <div class="testimonial-desc panel-info">
            <i class="fas fa-clipboard-check fa-5x"></i>
            <div class="testimonial-writer">
              <div class="testimonial-writer-name"><span class="label label-default">No. Tiket</span> : <small class="text-uppercase text-right"><?php echo $selesai['no_tiket']; ?></small> 
              <p class="btn bg-primary btn-block"style="width : 50%;">Lunas</p>
                <a href="?menu=cancelPage&&id=<?php echo $selesai['no_tiket']; ?>" class="btn btn-danger pull-left" style="margin-top: -21%; margin-left:50%;">Cancel</a></div>
            </div>
          </div><hr />
          <!-- </div> -->
        <?php } ?>
        </div>
      </form>
    </article>
  </div>
</div>
<hr />
</div>
</div>
</div>