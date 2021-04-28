<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="verifikasi.css" rel="stylesheet" >
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php 
include "koneksi.php";
session_start(); 


@$telp = $_SESSION['telp'];
@$id = $_SESSION['id'];
$tampil = mysqli_fetch_array(mysqli_query($koneksi,"select * from harga where keterangan like '%promo%' && status = '$telp'"));
?>
<?php
// $nohp = strval($telp);
// function hp($nohp) {
//     // kadang ada penulisan no hp 0811 239 345
//     $nohp = str_replace(" ","",$nohp);
//     // kadang ada penulisan no hp (0274) 778787
//     $nohp = str_replace("(","",$nohp);
//     // kadang ada penulisan no hp (0274) 778787
//     $nohp = str_replace(")","",$nohp);
//     // kadang ada penulisan no hp 0811.239.345
//     $nohp = str_replace(".","",$nohp);

//     // cek apakah no hp mengandung karakter + dan 0-9
//     if(!preg_match('/[^+0-9]/',trim($nohp))){
//         // cek apakah no hp karakter 1-3 adalah +62
//         if(substr(trim($nohp), 0, 3)=='62'){
//             $hp = trim($nohp);
//         }
//         // cek apakah no hp karakter 1 adalah 0
//         elseif(substr(trim($nohp), 0, 1)=='0'){
//             $hp = '62'.substr(trim($nohp), 1);
//         }
//     }
//     print $hp;
// }
// hp($nohp);
?>
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                        <img src="../img/logo.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>Verifikasi Akun Anda!</p>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                           
                        </ul>
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Aktifkan Akun Anda!</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                    <form action="cek.php" method="post">
                                        <div class="form-group">
                                           <!-- <input type="hidden" name="id" value="<?php //echo uniqid(); ?>"> -->
                                        
                                        <div class="form-group">
                                            <label for="exampleInputEmail1">Masukkan Kode OTP</label>
                                            <input type='hidden' name='user' value=<?php echo $id;?>>
                                            <input type="text" name="kode"class="form-control">
                                            <small id="emailHelp" class="form-text text-muted">We'll never share your code with anyone else.</small>
                                        </div>  
                                        </div>
                                        <div class="form-group">
                                        <button type="submit" name="cek" class="btn btn-primary"style = "margin-top:10%;width: 100%;background:#2E3572; ">Konfirmasi</button>  
                                        </div>
                                        </form>
                                        <div class="form-group">
                                            <div class="maxl">
                                                
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            
                                        </div>
                                        <div class="form-group">
                                            
                                        </div>
                                        <div class="form-group">
                                            
                                        </div>
                                        <?php
                                        // $kode = uniqid();
                                        $nohp = strval($telp);
                                        function hp($nohp) {
                                            // kadang ada penulisan no hp 0811 239 345
                                            $nohp = str_replace(" ","",$nohp);
                                            // kadang ada penulisan no hp (0274) 778787
                                            $nohp = str_replace("(","",$nohp);
                                            // kadang ada penulisan no hp (0274) 778787
                                            $nohp = str_replace(")","",$nohp);
                                            // kadang ada penulisan no hp 0811.239.345
                                            $nohp = str_replace(".","",$nohp);

                                            // cek apakah no hp mengandung karakter + dan 0-9
                                            if(!preg_match('/[^+0-9]/',trim($nohp))){
                                                // cek apakah no hp karakter 1-3 adalah +62
                                                if(substr(trim($nohp), 0, 3)=='62'){
                                                    $hp = trim($nohp);
                                                }
                                                // cek apakah no hp karakter 1 adalah 0
                                                elseif(substr(trim($nohp), 0, 1)=='0'){
                                                    $hp = '62'.substr(trim($nohp), 1);
                                                }
                                            }
                                            $id= $_SESSION['id'];
                                            $newkode = uniqid();
                                           echo" 
                                           <form action='aktif.php' method='post'>
                                           <input type='hidden' name='id' value='$newkode'>
                                           <input type='hidden' name='user' value='$id'> 
                                           <input type='hidden' name='hp' value='$hp'> 
                                           <div class='form-group'>
                                            <a href='https://wa.me/$hp?text=$newkode'><button type='submit' name='kirim' value='' class='btn btn-success'style = 'margin-top:5%'>Kirim OTP!
                                            </button>
                                            </a>
                                            </form>";   
                                           
                                        }
                                        hp($nohp);
                                        ?>
 
                                        </div>
                                        
                                        <div >
                                              
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>

                            <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                <h3  class="register-heading">Apply as a Hirer</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="First Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="Last Name *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="email" class="form-control" placeholder="Email *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="text" maxlength="10" minlength="10" class="form-control" placeholder="Phone *" value="" />
                                        </div>


                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <input type="password" class="form-control" placeholder="Confirm Password *" value="" />
                                        </div>
                                        <div class="form-group">
                                            <select class="form-control">
                                                <option class="hidden"  selected disabled>Please select your Sequrity Question</option>
                                                <option>What is your Birthdate?</option>
                                                <option>What is Your old Phone Number</option>
                                                <option>What is your Pet Name?</option>
                                            </select>
                                        </div>
                                        <div class="form-group">
                                            <input type="text" class="form-control" placeholder="`Answer *" value="" />
                                        </div>
                                        <input type="submit" class="btnRegister"  value="Register"/>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>