<!doctype html>
<html lang="en">

<body>
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
    $tampil = mysqli_fetch_array(mysqli_query($koneksi, "select * from pembayaran where no_tiket = '$getid'"));


    ?>
    <div class="container">
        <div class="row">
            <div class="tembok px-3" style="margin-top: 10%;width: 100%; margin-left: 3%;">
                <div class="row">
                    <div class="col-xs-6 col-sm-6 col-md-6">
                        <address>
                            <strong>Padang Golf Halim</strong>
                            <br>
                            Jakarta Selatan
                            <br>
                            <b><?= $_SESSION['nama'] ?></b>
                            <br>
                            <p><?php echo $tampil['no_tiket']; ?></p>
                        </address>
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 text-right">
                        <div>

                        </div>
                        <!-- <p>
                              <em>Date: 12 Agustus, 2020</em>
                          </p>
                          <p>
                              <em></em>
                          </p> -->
                    </div>
                </div>
                <img src="https://halimgolf.id/m.halimgolf.id/web/temp/<?php echo $tampil['no_tiket'] ?>.png"style="margin-left: 35%;">
                            </img>
                <div class="row">
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
                                <td class="col-md-9"><em>Lapangan 1</em></h4>
                                </td>
                                <td class="col-md-1" style="text-align: center"> </td>
                                <td class="col-md-1 text-center"></td>
                                <td class="col-md-1 text-center">Rp.<?= $tampil['harga'] ?></td>
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
                    <button type="button" class="btn btn-primary btn-lg btn-block" onclick="window.print();" style="margin-bottom: 10%;">
                        Tunjukkan Kode QR Ke Kasir!   <span class=""></span>
                    </button></td>
                </div>
            </div>
        </div>
    </div>
</body>

</html>