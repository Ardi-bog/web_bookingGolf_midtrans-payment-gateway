<link href="../script/css/style.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/font/css/fontawesome.min.css" rel="stylesheet" type="text/css">
<link href="../script/css/bootstrap/font/css/all.min.css" rel="stylesheet" type="text/css">

<div class="container pt-100" style="margin-top:10px">
    
       <div class="col-sm-6">
       
            <article role="manufacturer" style="margin:0;padding:5px;max-width:100%;min-height:370px">
              <header class="text-center"><i class="fas fa-file-signature"></i> BUAT JADWAL</header>
              <h4 class="text-center">Formulir pemesanan jadwal golf</h4>
<!-----------------------------------------------TABS---------------------------------------------------------->              
      		 
              <form>
               <div class="form-group">
               <label>Pilih hari</label>                
				<div class="input-group">               
                    <span class="input-group-addon"><i class="far fa-calendar-alt"></i></span>
                      <input class="form-control" type="date" placeholder="hari">
                 </div>
                </div>
                
               <div class="form-group">
                <label>Pilih jam</label>
				<div class="input-group">
                    <span class="input-group-addon"><i class="far fa-clock"></i></span>
                      <select class="form-control">
                      	<option>07.00</option>
                        <option>08.00</option>
                        <option>09.00</option>
                        <option>10.00</option>
                        <option>11.00</option>
                        <option>12.00</option>
                        <option>13.00</option>
                        <option>14.00</option>
                        <option>15.00</option>
                        <option>16.00</option>
                      </select>
                 </div>
                </div>
               <div class="form-group">
                <label>Pilih Hole</label>
				<div class="input-group">
                    <span class="input-group-addon"><i class="fas fa-golf-ball"></i></span>
                      <select class="form-control">
                      	<option>18</option>
                        <option>32</option>
                      </select>
                 </div>
                </div> 
              <div class="form-group">
				<div class="input-group">
                  <button type="submit" class="btn btn-danger btn-lg">
                    <i class="fas fa-file-signature"></i> Buat Jadwal</button>
                </div>
              </div>

              </form>
              
<!-----------------------------------------------TABS---------------------------------------------------------->              
            </article>  
                     
          </div>

          <div class="col-sm-6">
            <article role="manufacturer" class="text-center" style="margin:0;padding:5px;max-width:100%;min-height:380px">
              <header><i class="fas fa-user-friends"></i> JADWAL HARI INI</header>
              <h4>Jadwal pertandingan hari ini</h4>
              <div class="btn-group btn-group-lg" role="group">
				<button type="button" class="btn btn-danger"><i class="far fa-user"></i> Player 1</button>
				<button type="button" class="btn btn-default">VS</button>
				<button type="button" class="btn btn-primary">Player 2 <i class="fas fa-user"></i></button>
			  </div>              
            </article>
          </div>
        </div>
        <hr />
      </div>
  </div>
  
</div>  