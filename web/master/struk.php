<link href="../script/css/style.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/font/css/fontawesome.min.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/font/css/all.min.css" rel="stylesheet" type="text/css">

      <!-- <nav class="navbar navbar-expand-lg navbar-light " style="background-color: #bac964;">

          <div class="container">

              <a class="navbar-brand" href="#" style="color: white;font-family: Monument;">GOLFJKT</a>

              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">

                  <span class="navbar-toggler-icon"></span>

              </button>

              <div class="collapse navbar-collapse" id="navbarNavAltMarkup">

                  <div class="navbar-nav " style="margin-left: 300px;">



                      <a class="nav-item nav-link " href="../index.php" style="color: white;">Home <span class="sr-only">(current)</span></a>

                      <a class="nav-item nav-link" href="jadwal.php" style="color: white;">Jadwal</a>

                      <a class="nav-item nav-link" href="pesan_lapangan.php" style="color: white;">Transaksi</a>

                      <a class="nav-item nav-link " href="klasemen.php" style="color: white;">Klasemen</a>

                      <a class="nav-item nav-link " href="scanqr.php" style="color: white;">Scan QR</a>

                  </div>

              </div>

          </div>

          </div>

      </nav> -->

      <!------ Include the above in your HEAD tag ---------->
      <?php

include "./script/koneksi.php";

$getid = $_GET['id'];

$tampil = mysqli_fetch_array(mysqli_query($koneksi,"select * from pembayaran where no_tiket = '$getid'"));
$tingkat = $tampil['tingkat'];
$id_harga = $tampil['ket'];
$tgl = $tampil['no_tiket'];
$tanggal =  mysqli_fetch_array(mysqli_query($koneksi,"select * from pertandingan where id_pembayaran_player_satu = '$tgl' ")); 
$tampil_harga =mysqli_fetch_array(mysqli_query($koneksi,"select * from harga where id = '$id_harga'"));





?>      
 <?php
 
 require_once(dirname(__FILE__) . '/composer/vendor/autoload.php');  
  Veritrans_Config::$serverKey = "Mid-server-l9P_r6U72vEnq3z1sLqw4JKe";

  Veritrans_Config::$isProduction = true;

  Veritrans_Config::$is3ds = true;

  $transaction_details = array(
    'order_id' => rand(),
    'gross_amount' => $tampil['harga'], 
  );

  $item1_details = array(
    'id' => $tampil['no_tiket'],
    'price' => $tampil['harga'],
    'quantity' => 1,
    'name' => "Booking Lapangan Halim Golf"
  );

  // $item2_details = array(
  //    'id' => 'a2',
  //    'price' => 150000,
  //    'quantity' => 1,
  //    'name' => "Sweatshirt"
  // );

  $item_details = array ($item1_details);

  $billing_address = array(
    'first_name'    => "Kiostr",
    'last_name'     => "",
    'address'       => "Mataram",
    'city'          => "Mataram",
    'postal_code'   => "83112",
    'phone'         => "081234567891",
    'country_code'  => 'IDN'
  );

  $shipping_address = array(
    'first_name'    => $_SESSION['nama'],
    'phone'         => $_SESSION['telp'],
    'country_code'  => 'IDN'
  );

  $customer_details = array(
    'first_name'    => $_SESSION['nama'],
    'last_name'     => "",
    'email'         => $_SESSION['email'],
    'phone'         => $_SESSION['telp'],
    'billing_address'  => $billing_address,
    'shipping_address' => $shipping_address
  );

  $enable_payments = array("credit_card",
  "gopay",
  "permata_va",
  "bca_va",
  "bni_va",
  "echannel",
  "other_va",
  "danamon_online",
  "mandiri_clickpay",
  "cimb_clicks",
  "bca_klikbca",
  "bca_klikpay",
  "bri_epay",
  "xl_tunai",
  "indosat_dompetku",
  "kioson",
  "Indomaret",
  "alfamart",
  "akulaku");

  $transaction = array(
    'enabled_payments' => $enable_payments,
    'transaction_details' => $transaction_details,
    'customer_details' => $customer_details,
    'item_details' => $item_details,
  );

  $snapToken = Veritrans_Snap::getSnapToken($transaction);

?>



      <div class="container">

          

              <div class="tembok" style="margin-top: 10%;width: 100%;">

                  <div class="row">

                      <div class="col-xs-6 col-sm-6 col-md-6">

                          <address>

                              <strong>Padang Golf Halim</strong>

                              <br>

                              Jakarta Selatan

                              <br>

                              <b><?= $_SESSION['nama']?></b>

                              <br>

                              <p><?php echo $tampil['no_tiket'];?></p>

                              <b>Untuk Pembayaran Ditempat Simpan Struk Ini Dan Berikan No Tiket Kepada Administrator!</b>
                             <b> <p style="color:red;"> <?php echo $tampil_harga['keterangan']; ?></p></b>
                             <b> <p style="color:red;"> <?php echo $tanggal['hari']; ?></p></b>
                             <b> <p style="color:red;"> <?php echo $tanggal['jam']; ?></p></b>

                          </address>

                      </div>

                      <div class="col-xs-6 col-sm-6 col-md-6 text-right">

                          <!-- <p>

                              <em>Date: 12 Agustus, 2020</em>

                          </p> -->

                          <p>

                              <em></em>

                          </p>

                     

                  </div>

                  

                      <div class="text-center">

                      </div>

                      <!-- <div class="gambar">

                       <img src="../img/qr.png"style="width: 200px;" >

                       </div> -->

                      </span>

                      <table class="table table-hover">

                          <thead>

                              <tr>

                                  <th>Lapangan</th>

                                  <th></th>

                                  <th class="text-center"></th>

                                  <th class="text-center">Total</th>

                              </tr>

                          </thead>

                          <tbody>

                              <tr>

                                  <td class="col-md-9"><em>Booking Golf</em></h4>

                                  </td>

                                  <td class="col-md-1" style="text-align: center"> </td>

                                  <td class="col-md-1 text-center"></td>

                                  <td class="col-md-1 text-center">Rp.<?= $tampil['harga']?></td>

                              </tr>

                              <!-- <tr>

                                  <td>   </td>

                                  <td>   </td>

                                  <td class="text-right">

                                      <p>

                                          <strong>Subtotal: </strong>

                                      </p>



                                  </td>

                                  <td class="text-center">

                                      <p>

                                          <strong>Rp.500.000</strong>

                                      </p>



                                  </td>

                              </tr>

                              <tr>

                                  <td>   </td>

                                  <td>   </td>

                                  <td class="text-right">

                                      <h4><strong>Total: </strong></h4>

                                  </td>

                                  <td class="text-center text-danger">

                                      <h4><strong>Rp.500.000</strong></h4>

                                  </td>

                              </tr> -->

                          </tbody>

                      </table>

                      <button type="button" class="btn btn-login col-xs-4" data-toggle="modal"data-target="" id="pay-button" style="margin-bottom: 10%;color:white"> Bayar</button>

                      <button type="button" class="btn btn-default col-xs-4" onclick="window.print();" style="margin-bottom: 10%;background-color:#515B8F;color:white;">
COD</button></td>
<button type="button" class="btn btn-default col-xs-4 " data-toggle="modal" data-target="#uploadModal" style="margin-bottom: 10%; background-color: #a3d2ca; color:white; ">
Transfer Manual</button></td>

                  </div>

              </div>

          

      </div>

      <div id="uploadModal" class="modal fade" role="dialog">

  <div class="modal-dialog">



    <!-- Modal content-->

    <div class="modal-content">

      <div class="modal-header">

        <button type="button" class="close" data-dismiss="modal">&times;</button>

        <h4 class="modal-title">Upload Bukti Transfer</h4>

      </div>

      <div class="modal-body">

        <!-- Form -->

        <form method='post' action='?menu=nota' enctype="multipart/form-data">
        <p><b>Transfer Ke :</b></p>    
        <p><b>PADANG GOLF HALIM 1 <br>
              041901000530303<br>
              BRI </b></p>
        <input type="hidden" value="<?php echo $tampil['no_tiket'];?>" name="id">

        <input type="hidden" value="<?php echo $dateNow = date("Y-m-d");?>" name="tgl">

          Select file : <input type='file' name='gambar' id='file' class='form-control' style="background-color: white !important;" ><br>

          <button type="submit" id="" name="tambah" class="btn btn-login btn-block" style="color: white;"> Bayar</button>

        </form>
  <script src="https://app.midtrans.com/snap/snap.js" data-client-key="Mid-client-4Ahh1_2ZOTpUflkl"></script>
    <script type="text/javascript">
      document.getElementById('pay-button').onclick = function(){
        snap.pay('<?=$snapToken?>', {
          onSuccess: function(result){
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          onPending: function(result){
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          },
          onError: function(result){
            document.getElementById('result-json').innerHTML += JSON.stringify(result, null, 2);
          }
        });
      };
    </script>


        <!-- Preview-->

        <div id='preview'></div>

      </div>

 

    </div>
   


  </div>

</div>