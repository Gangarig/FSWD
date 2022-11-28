<?php
//scripts
$localhost = "localhost";
$user = "root";
$pass = "";
$db_name = "be17_cr4_gangarignyamsuren_biglibrary";
$connect = mysqli_connect($localhost, $user, $pass, $db_name);
if(!$connect){
    echo "Error";
} else {
    // echo "Connected";
}
