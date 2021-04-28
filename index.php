
<?php

session_start();
if (isset($_SESSION['id'])) {
    header('location:web/?menu=home');
// echo"Anda Belum Login";
} else {
    header('location:web/login.php');
}

?>