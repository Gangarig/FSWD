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
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}  
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Delete Product</title>
        <?php require_once 'components/boot.php'?>
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
        <!-- navbar is here -->
        <nav class="navbar fixed-top navbar-dark bg-dark w-100"><a href="index.php">
        <i class="bi bi-house text-light btn"></i></a>
        <a href='create.php' ><button class="btn btn-light bg-dark text-light">Add to the library</button></a>
        </nav>
        <!-- navbar ends here -->

        <div class="container bg d-flex justify-content-center flex-column w-50 rounded ">
        
           <img class='img-thumbnail m-5 rounded' src='pictures/<?php echo $picture ?>' alt="<?php echo $name ?>">
            <h5 >You have selected the data below:</h5>
            <hr>
            <?php echo $name?>
            <hr>
            <h3 class="mb-4">Do you really want to delete this product?</h3>
            <hr>
            <form action ="actions/a_delete.php" method="post" class="w-100 d-flex justify-content-evenly">
                <input type="hidden" name="id" value="<?php echo $id ?>" />
                <input type="hidden" name="picture" value="<?php echo $picture ?>" />
                <button class="mb-4 m-2 btn btn-dark" type="submit">Yes, delete it!</button>
                <a href="index.php"><button class="mb-4 m-2 btn btn-dark" type="button">No, go back!</button></a>
            </form>
        
        </div>
        <!-- footer is here -->
        <footer class="text-center fixed-bottom bg-dark text-light w-100">
            <h6>@copyright Gangarig Nyamsuren</h6>
        </footer>
    </body>
</html>