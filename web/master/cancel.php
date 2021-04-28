<link href="../script/css/style.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/font/css/fontawesome.min.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/font/css/all.min.css" rel="stylesheet" type="text/css">
<!------ Include the above in your HEAD tag ---------->
<style>
body{
    /* background: -webkit-linear-gradient(left, ); */
}
.contact-form{
    background: #fff;
    margin-top: 10%;
    margin-bottom: 5%;
    width: 70%;
}
.contact-form .form-control{
    border-radius:1rem;
}
.contact-image{
    text-align: center;
}
.contact-image img{
    border-radius: 6rem;
    width: 11%;
    margin-top: -3%;
    transform: rotate(29deg);
}
.contact-form form{
    padding: 14%;
}
.contact-form form .row{
    margin-bottom: -7%;
}
.contact-form h3{
    margin-bottom: 8%;
    margin-top: -10%;
    text-align: center;
    color: #0062cc;
}
.contact-form .btnContact {
    width: 50%;
    border: none;
    border-radius: 1rem;
    padding: 1.5%;
    background: #dc3545;
    font-weight: 600;
    color: #fff;
    cursor: pointer;
}
.btnContactSubmit
{
    width: 50%;
    border-radius: 1rem;
    padding: 1.5%;
    color: #fff;
    background-color: #0062cc;
    border: none;
    cursor: pointer;
}
</style>
<?php

include "./script/koneksi.php";

$getid = $_GET['id'];

$tampil = mysqli_fetch_array(mysqli_query($koneksi,"SELECT pembayaran.no_tiket,pembayaran.harga, pembayaran.lunas,pembayaran.tanggal_bayar,pembayaran.bukti, a.nama nama_player_satu
FROM `pembayaran`, tabel_user a
WHERE pembayaran.id_user = a.id && no_tiket ='$getid'"));





?>     
<div class="container contact-form">
            <div class="contact-image">
                <img src="https://image.ibb.co/kUagtU/rocket_contact.png" alt="rocket_contact"/>
            </div>
            <form method="post" action="?menu=aksiCancel" enctype="multipart/form-data">
                <h3>Alasan Cancel</h3>
               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <input type="text" name="tiket" class="form-control" placeholder="No Tiket *" value="<?php echo $tampil['no_tiket'];?>" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="nama" class="form-control" placeholder="Nama*" value="<?php echo $tampil['nama_player_satu'];?>" />
                        </div>
                        <div class="form-group">
                            <input type="text" name="tgl" class="form-control" placeholder="Tanggal Bayar *" value="<?php echo $tampil['tanggal_bayar'];?>" />
                        </div>
                        <input type="hidden" value="<?php echo $dateNow = date("Y-m-d");?>" name="tgl_cancel">

                    <div class="col-md-6">
                        <div class="form-group">
                            <textarea name="alasan" class="form-control" placeholder="Alasan *" style="width: 100%; height: 150px;"></textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" name="kirim" class="btnContact" value="Kirim" >Kirim</button>
                        </div>
                    </div>
                    </div>
                </div>
            </form>
</div>