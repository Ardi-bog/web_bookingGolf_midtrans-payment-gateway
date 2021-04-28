<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<link href="promo.css" rel="stylesheet" >
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<?php 
include "../script/koneksi.php";
session_start(); 


$level = $_SESSION['level'];
$tampil = mysqli_fetch_array(mysqli_query($koneksi,"select * from harga where keterangan like '%promo%' && status = '$level'"));
$total = $tampil['harga'] + $tampil['ppn'] + $tampil['fee'];
?>
<div class="container register">
                <div class="row">
                    <div class="col-md-3 register-left">
                    <img src="../img/logo.png" alt=""/>
                        <h3>Welcome</h3>
                        <p>Klaim Harga Promo Anda Hari ini!</p>
                    </div>
                    <div class="col-md-9 register-right">
                        <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                           
                        </ul>
                        
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
                                <h3 class="register-heading">Klaim Sekarang</h3>
                                <div class="row register-form">
                                    <div class="col-md-6">
                                    
                                        <div class="form-group">
                                        <form method="post" action="../script/bayar_promo.php">
                                           <i><h1 style="margin-left: 75%;"name="no">Rp.<?php echo $total;?></h1></i>
                                           <input type="hidden" name="id" value="<?php echo uniqid(); ?>">
                                           <input type="hidden" name="harga" value="<?php echo $total;?>">
                                           <input type="hidden" name="user" value="<?php echo $_SESSION['id'];?>">
                                           <input type="hidden" name="tingkat" value="<?php echo $level;?>">
                                           <input type="hidden" value="<?php echo $dateNow = date("Y-m-d");?>" name="tgl">
                                        </div>
                                        <div class="form-group">
                                            
                                        </div>
                                        
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
                                        <div class="form-group">
                                            
                                        </div>
                                        
                                        <div >
                                        <button type="submit" name="kirim" class="btn btn-primary"style = "margin-top:40%;margin-left: 20%;width: 100%; ">Klaim</button>          
                                                               
                                        </div>
                                        
                                    </div>
                                </div>
                            </div>
</form>
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