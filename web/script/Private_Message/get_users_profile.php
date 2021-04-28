<?php

$clicked_on_username = $_COOKIE["default_clicked_on_username"];
$users_last_name = $_COOKIE["clicked_on_user_last_name"];


  $host = "localhost";
  $user = "root";
  $pass = "";
  $database = "solid";

  $connection_String = mysqli_connect($host,$user,$pass,$database);

  $get_user_profile_command = "SELECT * FROM users_table WHERE user_fname='$clicked_on_username' AND user_lname = '$users_last_name' LIMIT 1";
  $execute_get_profile_command = mysqli_query($connection_String,$get_user_profile_command);
  $get_individual_files = mysqli_fetch_assoc($execute_get_profile_command);


  $profile_user_first_name  =  $get_individual_files["user_fname"];
  $profile_user_last_name   =  $get_individual_files["user_lname"];
  $profile_user_department  =  $get_individual_files["department"];
  $profile_user_position    =  $get_individual_files["position"];
  $profile_user_profile_pic =  $get_individual_files["Profile_Picture"];

    echo "<div id='my_profile_holder'>";
    if( $profile_user_profile_pic == "" ){
        echo "<img class='user_picture' src='../Profile_Pictures/default.png'/>";
    }else{
        echo "<img class='user_picture' src='../Profile_Pictures/$profile_user_profile_pic'/>";
    }
    echo "</div>";

    echo "<div id='details_holder'>";

    echo "<span><strong class='heading-style'>Name </strong>: <br><span class='word-styling'>".$profile_user_first_name." &nbsp;".$profile_user_last_name."</span></span><br>";

    echo "<span><strong class='heading-style'>Department </strong>: <br><span class='word-styling'>".$profile_user_department."</span></span><br>";

    echo "<span><strong class='heading-style'>Position </strong>: <br><span class='word-styling'>".$profile_user_position."</span></span><br>";


    echo "</div>";

 ?>
