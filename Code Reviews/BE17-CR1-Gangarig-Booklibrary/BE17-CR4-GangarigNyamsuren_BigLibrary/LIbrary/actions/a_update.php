<?php
require_once 'db_connect.php';
require_once 'file_upload.php';

if ($_POST) {    
    $name = $_POST['name'];
    $price = $_POST['price'];
    $id = $_POST['id'];
    //variable for upload pictures errors is initialised
    $uploadError = '';

    $picture = file_upload($_FILES['picture']);//file_upload() called  
    if($picture->error===0){
        ($_POST["picture"]=="product.png")?: unlink("../pictures/$_POST[picture]");           
        $sql = "UPDATE books SET name = '$name', price = $price, picture = '$picture->fileName' WHERE id = {$id}";
    }else{
        $sql = "UPDATE books SET name = '$name', price = $price WHERE id = {$id}";
    }    
    if (mysqli_query($connect, $sql) === TRUE) {

        $message = "The record was successfully updated";
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    } else {

        $message = "Error while updating record : <br>" . mysqli_connect_error();
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
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
        <title>Update</title>
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
        <a href='../create.php' ><button class="btn btn-light bg-dark text-light">Add to the library</button></a>
        </nav>
        <!-- navbar ends here -->
        <div class="container bg rounded">
            <div class="alert " role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../update.php?id=<?=$id;?>'><button class="btn btn-dark" type='button'>Back</button></a>
                <a href='../index.php'><button class="btn btn-dark" type='button'>Home</button></a>
            </div>
        </div>
        <!-- footer is here -->
        <footer class="text-center fixed-bottom bg-dark text-light w-100">
            <h6>@copyright Gangarig Nyamsuren</h6>
        </footer>
    </body>
</html>