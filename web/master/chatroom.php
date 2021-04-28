<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
<link rel="stylesheet" href="style.css" />
<?php
include 'script/koneksi.php';
?>
<?php
$id = $_SESSION['id'];
$jadwalQuery = "SELECT * FROM chatroom, join_chatroom WHERE chatroom.id = join_chatroom.id_chatroom && join_chatroom.id_user = '$id'";
$executeJadwal = mysqli_query($koneksi, $jadwalQuery);

?>
<div class="container" style="margin-top: 12vh;">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <div class="card">

                <div class="card-header">
                    <h3 class="title">Grup chat</h3>
                </div>
                <div>
                    <!--<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">-->
                    <!--    Tambah ruang obrolan-->
                    <!--</button>-->

                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">

                            <form method="post" action="script/add_grup.php">
                                <div class="modal-content">

                                    <div class="modal-header">
                                        <h5 class="modal-title" id="exampleModalLabel">Tambah ruang obrolan</h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                            <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>

                                    <div class="modal-body">

                                        <div class="form-group">
                                            <label for="chatname" class="msg_title">Group Title</label>
                                            <input type="text" class="form-control form-control-adjusted" name="chatname" id="chatname" placeholder="Enter message title">
                                           
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                            <input type="submit" class="btn btn-primary"  id="btn_post"></input>
                                        <!-- </div> -->
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>



                <div class="card-body">
                    <div class="table-responsive" id="proTeamScroll" tabindex="2" style="height: 400px; overflow: hidden; outline: none;">
                       <ul class="list-group"> 
						<?php while ($data = mysqli_fetch_assoc($executeJadwal)) { ?>
                        
                        	<li class="list-group-item"><i class="fas fa-user-friends"></i>
                            	<a href="?menu=chat&&id=<?php echo $data['id']; ?>"><?php echo $data['chat_name']; ?></a>
<?php $sql_user = mysqli_query($koneksi, "select * from chatroom WHERE id = '$data[id]'");
    $jumlah_tunggu = mysqli_num_rows($sql_user); ?>                            
                            <span class="badge"><?php echo $jumlah_tunggu ?></span>
                            </li>
                         <?php } ?>
                         </ul>
                        
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>