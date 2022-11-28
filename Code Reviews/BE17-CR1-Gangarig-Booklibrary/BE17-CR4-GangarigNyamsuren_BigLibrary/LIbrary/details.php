<?php 
require_once 'actions/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM books WHERE id = {$id}" ;
    $result = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($result);
    if (mysqli_num_rows($result) == 1) {
        $name = $data['name'];
        $price = $data['price'];
        $picture = $data['picture'];
        $details = $data['details'];
        $author = $data['author'];
        $qtty = $data['quantity'];
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}  
if( $qtty > 1)
{
    $message ='Product is unavailable';
} else {
    $message = "<div class='w-50 d-flex justify-content-end '>
    <a class='m-1' href='index.php'>
    <button class='btn btn-dark'>get back</button></a>
    <a class='m-1'>
    <button class='btn btn-dark'>Buy or Reserve product</button></a>
    </div>";
}
function buy(){

}
?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Library</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="style.css">
        <?php require_once "components/boot.php";?>
        <style>
        .bg{
            background-color: rgb (231, 223, 223,0.8);
        }
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
        }

        </style>
    </head>
    <body>
        <!-- navbar is here -->
        <nav class="navbar fixed-top navbar-dark bg-dark w-100"><a href="index.php">
        <i class="bi bi-house text-light btn"></i></a>
        <a href='create.php' ><button class="btn btn-light bg-dark text-light">Add to the library</button></a>
        </nav>
        <!-- navbar ends here -->

        <div class="bg container w-75 d-flex flex-column align-items-center">
            <div class="container rounded w-100 h-75 d-flex  justify-content-evenly mt-5">
                <div class="m-4">
                    <img src='pictures/<?php echo $picture ?>' alt="">
                </div>
                <div class="container">
                    <h2 class="fs-3 fw-bold"><?php echo $name ?></h2>
                    <article >
                    <?php echo $details ?>
                    </article>
                    <div class="d-flex justify-content-evenly container"> 
                        <p class="fs-3 fw-bold pt-5"><?php echo $price ?></p>
                        <p class="fs-3 fw-bold pt-5"><?php echo $author ?></p>
                    </div>
                </div>
            </div>
            <?php echo $message; ?>
        </div>
        <!-- footer is here -->
        <footer class="text-center fixed-bottom bg-dark text-light w-100">
            <h6>@copyright Gangarig Nyamsuren</h6>
        </footer>
    </body>
</html>