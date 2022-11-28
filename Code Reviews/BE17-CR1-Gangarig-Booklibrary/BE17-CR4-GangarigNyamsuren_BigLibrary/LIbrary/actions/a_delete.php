<?php 
require_once 'db_connect.php';

if ($_POST) {
    $id = $_POST['id'];
    $picture = $_POST['picture'];
    ($picture =="book.jpg")?: unlink("../pictures/$picture");

    $sql = "DELETE FROM books WHERE id = {$id}";
    if (mysqli_query($connect, $sql) === TRUE) {
        
        $message = "Successfully Deleted!";
    } else {
        
        $message = "The entry was not deleted due to: <br>" . $connect->error;
    }
    mysqli_close($connect);
} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Delete</title>
        <?php require_once '../components/boot.php'?>  
        <style>
        .bg{
            background-color: rgb(231, 223, 223,0.6);
        }
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-image: url(../pictures/bg1.jpg);
        }
    </style>
    </head>
    <body>

        <!-- navbar is here -->
        <nav class="navbar fixed-top navbar-dark bg-dark w-100"><a href="../index.php">
        <i class="bi bi-house text-light btn"></i></a>
        <a href='../create.php' ><button class="btn btn-dark bg-dark text-light">Add to the library</button></a>
        </nav>
        <!-- navbar ends here -->

        <div class="container bg rounded">
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?=$message;?></p>
                <a href='../index.php'><button class="btn btn-dark" type='button'>Home</button></a>
            </div>
        </div>
        <!-- footer is here -->
        <footer class="text-center fixed-bottom bg-dark text-light w-100">
            <h6>@copyright Gangarig Nyamsuren</h6>
        </footer>
    </body>
</html>