<link href="//netdna.bootstrapcdn.com/bootstrap/3.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

<div class="container">
    <div class="row">
        <div class="col-md-4 col-md-offset-4">
            <div class="panel panel-default"style="margin-top: 100px;">
                <div class="panel-body">
                    <h5 class="text-center">
                        SIGN UP</h5>
                    <form  method="POST" action="?menu=daftar">
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                            <input type="text" class="form-control" name="nama" placeholder="Username" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-envelope"></span>
                            </span>
                            <input type="text" class="form-control" name="email"placeholder="Email Address" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-phone"></span></span>
                            <input type="phone" class="form-control" name="telp" placeholder="No Telp" />
                        </div>
                    </div>
                    <div class="form-group">
                    <label>Pilih Jabatan</label>
                    <div class="input-group">
                        <span class="input-group-addon"><i class="fas fa-receipt"></i></span>
                        <select class="form-control "name="level">
                            <option>Umum</option>
                            <option>TNI</option>
                            <option>Member</option>
                            <option>Pensiunan</option>
                        </select>
                    </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" class="form-control" name="password" placeholder="Password" />
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="input-group">
                            <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                            <input type="password" class="form-control" name="pass1" placeholder="Konfirmasi Password" />
                        </div>
                    </div>
                    <p>Do you Have Already Account? <a href="?menu=login"><span style="color: blue;">Login</a></p>
                </div>
                <input type="submit" class="btnSubmit" value="Register" /> </form>
            </div>
        </div>
    </div>
</div>
</div> 