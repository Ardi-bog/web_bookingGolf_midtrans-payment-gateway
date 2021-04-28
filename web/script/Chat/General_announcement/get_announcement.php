<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css" integrity="sha256-mmgLkCYLUQbXn0B1SRqzHar6dCnv9oZFPEC1g1cwlkk=" crossorigin="anonymous" />
<link rel="stylesheet" href="style.css"/>
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
                <div class="card-body">
                    <div class="table-responsive" id="proTeamScroll" tabindex="2" style="height: 400px; overflow: hidden; outline: none;">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Room Name</th>
                                    <th>Edit</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php     while ($data = mysqli_fetch_assoc($executeJadwal)) {?>
                                <tr>
                                <td><?php echo $data['id'];?></td>
                                <td><?php echo $data['chat_name'];?></td>
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