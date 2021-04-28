<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
<link rel="stylesheet" href="style.css" />
<?php
include 'script/koneksi.php';
?>
<?php
$jadwalQuery = "SELECT * FROM chatroom ";
$executeJadwal = mysqli_query($koneksi, $jadwalQuery);

?>
<div class="container" style="margin-top: 12vh;">
    <div class="row">
        <div class="col-12 col-sm-12 col-md-12">
            <div class="card">

                <div class="card-header">
                    <h4>List Room Chat</h4>
                </div>
                <div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Tambah ruang obrolan
                    </button>

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
                                            <label for="txt_title" class="msg_title">Group Title</label>
                                            <input type="text" class="form-control form-control-adjusted" name="chatname" id="txt_title" placeholder="Enter message title">
                                        </div>

                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>

                                            <button class="btn btn-primary" id="btn_post">Add</button>
                                        <!-- </div> -->
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>



                <div class="card-body">
                    <div class="table-responsive" id="proTeamScroll" tabindex="2" style="height: 400px; overflow: hidden; outline: none;">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <!-- <th>No</th> -->
                                    <th>Room Name</th>
                                    <!-- <th>Edit</th> -->
                                </tr>
                            </thead>
                            <tbody>
                                <?php while ($data = mysqli_fetch_assoc($executeJadwal)) { ?>
                                    <tr>
                                        <!-- <td><?php echo $data['id']; ?></td> -->
                                        <td>
                                            <a href="?menu=chat&&id=<?php echo $data['id']; ?>">
                                                <span style="color: black;">
                                                    <?php echo $data['chat_name']; ?>
                                                </span>
                                            </a>
                                        </td>
                                    </tr>
                                <?php
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>