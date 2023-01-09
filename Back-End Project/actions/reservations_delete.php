<?php 
require_once 'db_connect.php';

if ($_GET) {
    if(isset($_GET['id'])){
        $result = mysqli_query($link, "DELETE FROM reservations WHERE id='" . $_GET['id'] . "'");
        $message = "Successfully Deleted!";
    }
    mysqli_close($link);
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Delete</title>
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Delete request response</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?=$message;?></p>
                <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>