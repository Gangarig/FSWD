<?php 
session_start();
require_once('./actions/components/boot.php');
require_once('./actions/components/db_connect.php');

// if session is not set this will redirect to login page
if (!isset($_SESSION['admin']) && !isset($_SESSION['user']) && !isset($_SESSION['trainer'])) {
    header("Location: actions/login/login.php");
    exit;
}
//if session user exist it shouldn't access dashboard.php
if (isset($_SESSION['status'])) {
    header("Location: profile.php");
    exit;
}
if (isset($_SESSION['trainer'])) {
    header("Location: trainer.php");
    exit;
}




?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Dashboard</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>

        <div>
            <a  class="btn btn-dark"  href="./actions/user_list/accounts.php">User list</a>
            <a  class="btn btn-dark"  href="actions\reservations\reservation.php">Reservations</a>
            <a  class="btn btn-dark"  href="actions\registrations\registration.php">Registrations</a>
            <a  class="btn btn-dark"  href="./actions/course/courses_list.php">Course list</a>
            <a class="btn btn-dark"  href="./actions/trainer.php">Trainers</a>
            <a class="btn btn-dark"  href="./actions/login/logout.php?logout">Log out</a>
        </div>
        

    </body>
</html>