<link href="../script/css/style.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/font/css/fontawesome.min.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/font/css/all.min.css" rel="stylesheet" type="text/css">

<?php
include("./script/koneksi.php");
$fasilitas = $koneksi->query("select*from fasilitas"); ?>
?>
<div class="container pt-100 justify-content-center" style="margin-top:10px">

  <div class="col-md-4">

    <article role="manufacturer" style="margin:0;padding:5px;max-width:100%;min-height:370px">
      <header class="text-center"><i class="fas fa-file-signature"></i> PESAN LAPANGAN</header>
      <h4 class="text-center">Formulir pemesanan lapangan golf</h4>
      <!-----------------------------------------------TABS---------------------------------------------------------->

      <form action="./script/create_grup.php" method="POST">
        <div class="form-group">
          <label>Pilih hari</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
            <input class="form-control" type="date" placeholder="hari" name="date" id="date" required>
          </div>
          
        </div>
        <script>
          Date.prototype.addDays = function(days) {
            var date = new Date(this.valueOf());
            date.setDate(date.getDate() + days);
            return date;
          }
          $(document).ready(function() {
            var today = new Date();

            // var newDate = today.setDate(today.addD() + 2).toISOString().split('T')[0];
            document.getElementsByName("date")[0].setAttribute('min', today.addDays(0).toISOString().split('T')[0]);

          })

          $("#date").change(function() {
            var input = document.getElementById("date").value;
            var date = new Date(input).getUTCDay();

            var weekday = ['minggu', 'senin', 'selasa', 'rabu', 'kamis', 'jumat', 'sabtu', 'minggu'];

            // document.getElementById('dayname').textContent = weekday[date];
            $('#dayname').val(weekday[date]);
          })
          // $(document).ready(function() {
          //   $("#btn1").click(function() {
          //     $("#test1").text("Hello world!");
          //   });
          //   $("#btn2").click(function() {
          //     $("#test2").html("<b>Hello world!</b>");
          //   });
          //   $("#btn3").click(function() {
          //     $("#test3").val("Dolly Duck");
          //   });
          // });
        </script>

        <input id="dayname" name="dayname" type="hidden"/>
        <div class="form-group">
          <label>Pilih jam</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="far fa-clock"></i></span>
            <select class="form-control" name="time" id="time" required>
              <option disabled selected>Pilih Waktu</option>
              <option value="05.00">05.00</option>
              <option value="06.00">06.00</option>
              <option value="07.00">07.00</option>
              <option value="08.00">08.00</option>
              <option value="09.00">09.00</option>
              <option value="10.00">10.00</option>
              <option value="11.00">11.00</option>
              <option value="12.00">12.00</option>
              <option value="13.00">13.00</option>
              <option value="14.00">14.00</option>
              <option value="15.00">15.00</option>
              <option value="16.00">16.00</option>
              <option value="17.00">17.00</option>
              <option value="18.00">18.00</option>
            </select>
          </div>
        </div>
        <label>Pilih Fasilitas</label>
        <?php while ($tampil = $fasilitas->fetch_assoc()) { ?>
          <div class="form-check form-check-inline">
            <input type="checkbox" name="aset[]" value="<?php echo $tampil['harga'] ?>" /> <?php echo $tampil['barang'] ?><br>
          </div>
        <?php
        } ?>
        <!-- <div class="form-group">
          <label>Pilih Hole</label>
          <div class="input-group">
            <span class="input-group-addon"><i class="fas fa-golf-ball"></i></span>
            <select class="form-control" name="hole" id="hole" required>
              <option disabled selected>Pilih Hole</option>
              <option>18</option>
              <option>32</option>
            </select>
          </div>
        </div> -->
        <div id="isMain" style="margin-top: 3vh;">
          <div class="form-group">
            <div class="input-group">
              <button type="submit" class="btn btn-success btn-lg" name="notGrupButton">
                Main
              </button>
            </div>
            <div class="input-group" style="margin-top: 2vh;">
              <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal">
                Sewa sebagai grup
              </button>
            </div>
          </div>'
        </div>
        <script type="text/javascript">
          // $(document).ready(function() {
          //   $('#isMain').append('<div class="form-group"><div class="input-group"><button type="submit" class="btn btn-primary btn-lg" disabled><i class="fas fa-file-signature" ></i> Pilih Jadwal </button></div></div>')

          // });
          // $("#hole").change(function() {
          //   $("#isMain").html('');
          //   // alert("test")
          //   var time = $("#time").val();
          //   var date = $("#date").val();
          //   var hole = $("#hole").val();
          //   var url = './script/penjadwalan/checkjadwal.php?jam=' + time + "&&hari=" + date + "&&hole=" + hole;
          //   $.ajax({
          //     url: url,
          //     type: 'GET',
          //     // dataType: 'json',
          //     success: function(result) {
          //       if (result == "true") {
          //         $('#isMain').append('<div class="form-group">\
          //                               <div class="input-group">\
          //                                 <button type="submit" class="btn btn-success btn-lg" name="notGrupButton">\
          //                                    Main \
          //                                 </button>\
          //                               </div>\
          //                               <div class="input-group" style="margin-top: 2vh;">\
          //                               <button type="button" class="btn btn-primary btn-lg" data-toggle="modal" data-target="#exampleModal">\
          //                                 Sewa sebagai grup\
          //                               </button>\
          //                               </div>\
          //                             </div>')
          //       } else {
          //         $('#isMain').append('<div class="form-group"><div class="input-group"><button type="submit" class="btn btn-danger btn-lg" disabled><i class="fas fa-file-signature"></i> Sudah tersewa </button></div></div>')
          //       }
          //       console.log(result);
          //     },
          //     error: function(jqXHR, textStatus, errorThrown) {
          //       console.log(jqXHR.responseText);
          //     }
          //   });
          // });
        </script>

        <!-- <script type="text/javascript">
          $("#date").change(function() {
            
            var date = $("#date").val();
            alert(date)
            // var url = './script/penjadwalan/checkjadwal.php?jam=' + time;
            // $.ajax({
            //   url: url,
            //   type: 'GET',
            //   // dataType: 'json',
            //   success: function(result) {
            //     if (result == "true") {
            //       $('#isMain').append('<div class="form-group"><div class="input-group"><button type="submit" class="btn btn-success btn-lg"><i class="fas fa-file-signature"></i> Main </button></div></div>')
            //     } else {
            //       $('#isMain').append('<div class="form-group"><div class="input-group"><button type="submit" class="btn btn-danger btn-lg" disabled><i class="fas fa-file-signature"></i> Sudah tersewa </button></div></div>')
            //     }
            //     console.log(result);
            //   },
            //   error: function(jqXHR, textStatus, errorThrown) {
            //     console.log(jqXHR.responseText);
            //   }
            // });
          });
        </script> -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <!-- <form method="POST" action="./script/create_grup.php"> -->
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tutup, jika anda tidak menyewa sebagai grup</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

                <?php
                  $role = $_SESSION['level'];
                $queryGetAllUser = "SELECT * FROM tabel_user where  `level` = '$role'";
                $resultAllUser = mysqli_query($koneksi, $queryGetAllUser);
                $i = 1;
                while ($data = mysqli_fetch_assoc($resultAllUser)) {
                ?>
                  <div class="form-check form-check-inline">
                    <input class="form-check-input" type="checkbox" name="userList[]" id="inlineCheckbox<?php echo $i; ?>" value="<?php echo $data['id']; ?>">
                    <label class="form-check-label" for="inlineCheckbox<?php echo $i; ?>">
                      <?php echo $data['nama']; ?>
                    </label>
                  </div>
                <?php
                  $i += 1;
                }
                ?>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <input type="submit" name="inviteButton" class="btn btn-primary">Undang ke grup</button>
              </div>
              <input type="hidden" name="chatname" value="<?php echo $_SESSION['nama'] . "grup"; ?>">
            </div>
          </div>
          <!-- </form> -->
        </div>
      </form>

      <!-- <script type="text/javascript">
        $(document).ready(function() {
          // alert("test")
          // $("#time").append('<option value="">Pilih Kategori Pembelian</option>');
          // $("#jenisBaru").html('');
          // $("#kd_barang").html('');
          // $("#jenisBaru").append('<option value="">Pilih</option>');
          // $("#kd_barang").append('<option value="">Pilih</option>');
          var url = './script/penjadwalan/checkjadwal.php';
          $.ajax({
            url: url,
            type: 'POST',
            // dataType: 'json',
            success: function(result) {

            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.log(jqXHR.responseText);
            }
          });
        });
        $("#kategoriBaru").change(function() {
          var id_kat = $("#kategoriBaru").val();
          var url = 'master/get_jenis_baru.php?id_kategori=' + id_kat;
          $("#jenisBaru").html('');
          $("#kd_barang").html('');
          $("#jenisBaru").append('<option value="">Pilih</option>');
          $("#kd_barang").append('<option value="">Pilih</option>');
          $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(result) {
              console.log(result);
              for (var i = 0; i < result.length; i++)
                $("#jenisBaru").append('<option value="' + result[i].id_jenis_baru + '">' + result[i].nama_jenis_baru + '</option>');
            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.log(jqXHR.responseText);
            }
          });
        });
        $("#jenisBaru").change(function() {
          var id_jen = $("#jenisBaru").val();
          var url = 'master/get_barang_baru.php?id_jenis=' + id_jen;
          $("#kd_barang").html('');
          $("#kd_barang").append('<option value="">Pilih</option>');
          $.ajax({
            url: url,
            type: 'GET',
            dataType: 'json',
            success: function(result) {
              console.log(result);
              for (var i = 0; i < result.length; i++)
                $("#kd_barang").append('<option value="' + result[i].kd_barang + '">' + result[i].nm_barang + '</option>');
            },
            error: function(jqXHR, textStatus, errorThrown) {
              console.log(jqXHR.responseText);
            }
          });
        });
      </script> -->
      <!-----------------------------------------------TABS---------------------------------------------------------->
    </article>

  </div>

  <!-- <div class="col-md-8">
    <article role="manufacturer" class="h-auto text-center" style="margin:0;padding:5px;max-width:100%;">
      <header><i class="fas fa-user-friends"></i> JADWAL HARI INI</header>
      <aside>
        <h4>Jadwal pertandingan hari ini</h4>
        <div class="d-flex text-center"> -->
  <?php
  //   include("./script/koneksi.php");
  //   $dateNow = date("Y-m-d");
  //   $jadwalQuery = "SELECT pertandingan.jam, pertandingan.hari, pertandingan.hole, a.nama nama_player_satu, b.nama nama_player_dua
  //  FROM `pertandingan`, tabel_user a, tabel_user b, pembayaran c, pembayaran d 
  //  WHERE pertandingan.id_player_satu = a.id && pertandingan.id_player_dua = b.id && pertandingan.hari = '$dateNow' && 
  //  pertandingan.id_pembayaran_player_satu = c.no_tiket && pertandingan.id_pembayaran_player_dua = d.no_tiket && c.lunas = 1 && d.lunas = 1";
  //   $executeJadwal = mysqli_query($koneksi, $jadwalQuery);
  //   while ($data = mysqli_fetch_assoc($executeJadwal)) {
  ?>
  <!-- <div class="col-md-12 text-center" style="margin-top: 10px; margin-bottom: 10px;">
              <h3> -->
  <?php
  // echo " " . $data['hari'] . " " . $data['jam']; 
  ?>
  <!-- </h3>
              <div class="btn-group-lg" role="group">
                <button type="button" class="col-md-5 btn btn-danger "><i class="far fa-user"></i><?php echo " " . $data['nama_player_satu']; ?></button>
                <button type="button" class="col-md-2 btn btn-default">VS</button>
                <button type="button" class="col-md-5 btn btn-primary"><?php echo $data['nama_player_dua'] . " "; ?><i class="fas fa-user"></i></button>
              </div>
            </div> -->

  <?php
  //}

  ?>
  <!-- </div>
      </aside> -->


  <!-- <div class="btn-group btn-group-lg" role="group">
        <button type="button" class="btn btn-danger"><i class="far fa-user"></i> Player 1</button>
        <button type="button" class="btn btn-default">VS</button>
        <button type="button" class="btn btn-primary">Player 2 <i class="fas fa-user"></i></button>
      </div> -->
  <!-- </article>
  </div> -->
</div>
<hr />
</div>
</div>

</div>