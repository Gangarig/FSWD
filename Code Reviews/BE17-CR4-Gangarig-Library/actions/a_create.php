<?php
require_once 'db_connect.php';
require_once 'file_upload.php';

if ($_POST) {   
    $name = $_POST['name'];
    $price = $_POST['price'];
    $author = $_POST['author'];
    $qtty = $_POST['quantity'];
    $uploadError = '';
   
    $picture = file_upload($_FILES['picture']);  
   
    $sql = "INSERT INTO books (name, price,author, picture) VALUES ('$name', $price,'$author','$picture->fileName')";

    if (mysqli_query($connect, $sql) === true) {
   
        $message = "The entry below was successfully created <br>
            <table class='table w-50'><tr>
            <td> $name </td>
            <td> $price </td>
            <td> $author </td>
            </tr></table><hr>";
        $uploadError = ($picture->error !=0)? $picture->ErrorMessage :'';
    } else {
  
        $message = "There was an error. Try again: <br>" . $connect->error;
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
            background-image: url(pictures/bg1.jpg);
        }
    </style>
    </head>
    <body>
        <div class="container bg rounded">
            <div class="mt-3 mb-3">
                <h1>Create request response</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <p><?php echo ($uploadError) ?? ''; ?></p>
                <a href='../index.php'><button class="btn btn-dark" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>