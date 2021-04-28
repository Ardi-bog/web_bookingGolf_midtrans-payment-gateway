<!Doctype html>

<html class="">

<!--<![endif]-->



<head>

  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!--meta http-equiv="refresh" content="660; url='?menu'"-->

  <meta http-equiv="refresh" content="660;">



  <title>.:Halim Golf:.</title>

  <link rel="shortcut icon" href="logo.png">

  <link href="script/css/boilerplate.css" rel="stylesheet" type="text/css">

  <link href="script/css/style.css" rel="stylesheet" type="text/css">

  <link href="script/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">

  <link href="script/css/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">

  <link href="script/css/bootstrap/font/css/fontawesome.min.css" rel="stylesheet" type="text/css">

  <link href="script/css/bootstrap/font/css/all.min.css" rel="stylesheet" type="text/css">





  <script src="script/js/respond.min.js"></script>

  <script src="script/js/jquery.min.js"></script>

  <script src="script/js/bootstrap.min.js"></script>



  <!---------------------DATETIME-------------------------------------------------------->











</head>



<body style="background-color:#ddd">

<!---------------------LOGIN-------------------------------------------------------->

  <div class="col-md-6 offset4" style="margin-top: 5vh">

    <article role="manufacturer" style="margin:0;padding:0;max-width:100%;min-height:370px;background:#fff">

      <img src="img/header-login.jpg" style="margin-top:0;margin-bottom:5px; max-width:100%" class="img-responsive" />

      <div class="panel panel-login" style="background:#fff">

        <div class="panel-body">

            <div class="col-lg-12">

              <form id="login-form" action="./script/aksi_login.php" method="post" role="form" style="display: block;">

                <div class="form-group">				  

					<div class="input-group">

					  <input type="text" name="telp" id="telp" tabindex="1" class="form-control" placeholder="Nomer Telepon/ Whatsapp" required style="background-color: white !important;">

                      <span class="input-group-addon"><i class="fa fa-mobile-alt"></i></span>

					</div>

				 </div>               

                

                <div class="form-group">

                  <div class="input-group">

                  <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required style="background-color: white !important;">

                  <span class="input-group-addon"><i class="fa fa-eye" onClick="myFunction()"></i></span>

                  </div>

                </div>                



                <script>

                  function myFunction() {

                    var x = document.getElementById("password");

                    if (x.type === "password") {

                      x.type = "text";

                    } else {

                      x.type = "password";

                    }

                  }

                </script>



                <div class="col-xs-6 form-group pull-right">

                  <input type="submit" name="login-submit" id="login-submit" tabindex="4" class="btn btn-login btn-block" value="Log In">



                </div>

              </form>

<!---------------------REGISTER-------------------------------------------------------->
<?php
include 'script/koneksi.php';
?>
<?php        
         $jadwalQuery = "SELECT DISTINCT status FROM harga  ";
         $executeJadwal = mysqli_query($koneksi, $jadwalQuery);
      
?>


              <form id="register-form" name="registerForm" action="./script/aksi_register.php" method="post" role="form" style="display: none;">

                

				<div class="form-group" style="padding:0 0;">                  
       
                  <select class="form-control" name="level" tabindex="1" id="level" required style="background-color: white !important;">
                  <?php     while ($data = mysqli_fetch_assoc($executeJadwal)) {?> 
                      <option value="<?php echo $data['status']?>"><?php echo $data['status']?></option>
                      <?php
                }
            ?>

                    </select>                  

                </div>
            
                

                <!--<div class="form-group col-lg-6" style="padding-left:0;padding-right:0">-->

                <!--  <div class="input-group">-->
                <!--  <input type="hidden" name="telp" id="telp" tabindex="1" class="form-control" placeholder="Isikan Nomer KTP/ KTA" required style="background-color: white !important;">-->

                <!--  <span class="input-group-addon"><i class="fa fa-id-card"></i></span>-->

                <!--  </div>-->

                <!--</div>-->

                <!--<div class="form-group col-lg-6" style="padding-left:0;padding-right:0">-->

                <!--  <div class="input-group">-->

                <!--   <label class="control-label">SCAN KARTU ANDA</label>-->

              

                <!--  <span class="input-group-addon"><i class="fa fa-camera"></i></span>-->

                <!--  </div>-->

                <!--</div>-->

                

                

               

                <!--div id="noPengenal"></div>

                

               



                <script type="text/javascript">

                  $(document).ready(function() {

                    $('#noPengenal').append('\

                        <div class="form-group">\

                        

                           type = "number"\

                           maxlength = "16" required style="background-color: white !important;">\

                        </div>\

                      ')

                  });

                  $("#level").change(function() {

                    $("#noPengenal").html('');

                    var item = $("#level").val(); 

                    if (item == 'tni' || item == 'pensiun') {

                      $('#noPengenal').append('\

                        <div class="form-group">\

                       

                           type = "number"\

                           maxlength = "6" required style="background-color: white !important;">\

                        </div>\

                      ')

                    } else {

                      $('#noPengenal').append('\

                      <div class="form-group">\

                 

                           type = "number"\

                           maxlength = "16" required style="background-color: white !important;">\

                        </div>\

                        ')

                    }

                  });

                  var noKTPCheck = function() {

                    if (document.registerForm.noKTP.length < 16) {

                      alert("panjang ktp kurang")

                    }

                  }

                </script-->



                <div class="form-group">

                  <input name="lokasi" id="lokasi" hidden value="<?php echo @$_FILES['scan']['tmp_name']?>">

                </div>



                <div class="form-group col-xs-6" style="padding-left:0;padding-right:0">

                  <div class="input-group">

                  <input type="text" name="username" id="username" size="34" tabindex="1" class="form-control" placeholder="Isikan Nama Akun" value="" required style="background-color: white !important;">

                  <span class="input-group-addon"><i class="fa fa-user-check"></i></span>

                  </div>

                </div>



                <div class="form-group col-xs-6" style="padding-left:0;padding-right:0">

                  <div class="input-group">

                  <input type="email" name="email" id="email" tabindex="1" class="form-control" placeholder="Isikan Email" value="" required style="background-color: white !important;">

                  <span class="input-group-addon"><i class="fa fa-envelope"></i></span>

                  </div>

                </div>    

                

                <div class="form-group col-xs-6" style="padding-left:0;padding-right:0">

                  <div class="input-group">

                   <input type="password" name="password" id="password" tabindex="2" class="form-control" placeholder="Password" required style="background-color: white !important;">

                  <span class="input-group-addon"><i class="fa fa-key"></i></span>

                  </div>

                </div>   

                <div class="form-group col-xs-6" style="padding-left:0;padding-right:0">

                  <div class="input-group">

                   <input type="password" name="pass1" id="pass1" tabindex="2" class="form-control" placeholder="Confirm Password" required style="background-color: white !important;">

                  <span class="input-group-addon"><i class="fa fa-key"></i></span>

                  </div>

                </div>     

                

                <div class="form-group col-lg-6" style="padding-left:0;padding-right:0">

                  <div class="input-group">

                   <input type="number" name="telp" id="telp" tabindex="2" class="form-control" placeholder="Nomer Telepon/ Whatsapp" required style="background-color: white !important;">

                  <span class="input-group-addon"><i class="fa fa-mobile-alt"></i></span>

                  </div>

                </div> 

                

                <div class="form-group col-lg-6" style="padding-left:0;padding-right:0">                  

                    <input type="submit" name="tambah" id="register-submit" tabindex="4" class="btn btn-register btn-block" value="Register Now">

                </div> 

              </form>



            </div>



          



        </div>

		<h5 class="text-center">© 2020. Padang Golf Halim</h5>

        <div class="panel-heading">

			

          <div class="row">

            <div class="col-xs-6 tabs">

              <a href="#" class="active" id="login-form-link">

                <div class="login">MASUK</div>

              </a>

            </div>



            <div class="col-xs-6 tabs">

              <a href="#" id="register-form-link">

                <div class="register">DAFTAR</div>

              </a>

            </div> 

          </div>

         </div>

      </div>

    </article>    



  </div>







  <script>



    $(function() {



      $('#login-form-link').click(function(e) {



        $("#login-form").delay(100).fadeIn(100);



        $("#register-form").fadeOut(100);



        $('#register-form-link').removeClass('active');



        $(this).addClass('active');



        e.preventDefault();



      });



      $('#register-form-link').click(function(e) {



        $("#register-form").delay(100).fadeIn(100);



        $("#login-form").fadeOut(100);



        $('#login-form-link').removeClass('active');



        $(this).addClass('active');



        e.preventDefault();



      });







    });



    var myInput = document.getElementById('myFile');











    function sendPic() {



      var file = myInput.files[0];







      // Send file here either by adding it to a `FormData` object



      // and sending that via XHR, or by simply passing the file into



      // the `send` method of an XHR instance.



    }







    myInput.addEventListener('change', sendPic, false);



  </script>



</body>







</html>