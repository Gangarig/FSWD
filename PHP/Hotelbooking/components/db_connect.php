<?php
$localhost = "127.0.0.1";
$username = "root";
$password = "";
$dbname = "hotelbooking";

// connection line is here
$connect = new mysqli($localhost,$username,$password,$dbname);

// check connection
if ($connect -> connect_error){
    die("Connection failed:" . $connect->connect_error);
} else {
    echo "Successfully Connected";
}