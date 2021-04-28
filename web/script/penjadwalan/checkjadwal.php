<?php
include("../../script/koneksi.php");
$hari = $_GET['hari'];
$jam = $_GET['jam'];
$hole = $_GET['hole'];
$queryChecker = "SELECT * FROM `pertandingan` WHERE hari = '$hari' && jam = '$jam' && hole = '$hole'";
// $queryChecker = "SELECT * FROM `pertandingan` WHERE jam = '$jam'";
$executeChecker = mysqli_query($koneksi, $queryChecker);
// $checkResult = mysqli_fetch_assoc($executeChecker);
$assocResult = mysqli_fetch_array($executeChecker);

if (mysqli_num_rows($executeChecker) > 0) {
    // $data = mysqli_fetch_row($checkResult);
    if ($assocResult[1] != 0 && $assocResult[2] != 0) {
        echo "false";
    }
    else if ($assocResult[1] == 0 || $assocResult[2] == 0) {
        echo "true";
    }
}else{
    echo "true";
}
// if ($checkResult['id_player_satu'] != 0 && $checkResult['id_player_dua'] != 0) {
    // echo '          <div class="form-group">
    //     <div class="input-group">
    //       <button type="submit" class="btn btn-danger btn-lg" disabled>
    //         <i class="fas fa-file-signature"></i> Sudah ada yang menyewa</button>
    //     </div>
    //   </div>';
//     echo $checkResult['id_player_satu'];
// } else if ($checkResult['id_player_satu'] = 0 || $checkResult['id_player_dua'] != 0) {
//     echo '<div class="form-group">
//     <div class="input-group">
//       <button type="submit" class="btn btn-success btn-lg">
//         <i class="fas fa-file-signature"></i> Main </button>
//     </div>
//   </div>';
// }
