<?php
require_once "actions/db_connect.php";


$sql = "SELECT * from dvd";
$result = mysqli_query($connect,$sql);
$books = "";

if (mysqli_num_rows($result) >0){
    while($row = mysqli_fetch_assoc($result)){
        $books .= "
        <div class='card m-3 w-100 bg-secondary text-light' style='max-width: 700px;'>
        <div class='row g-0'>
            <div class='col-md-4 d-flex align-items-center justify-content-center'>
                <img src='pictures/".$row['picture'].".jpg' class=' img-fluid rounded-start' >
            </div>
        <div class='col-md-8'>
            <div class='card-body h-75 pt-5 m-1'>
                <h5 class='card-title'>".$row['name']."</h5>
                <p class='card-text'>This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
                <p class='fw-bold fs-3'>Price : ".$row['price']."$</p>
                <div class='pt-5 w-100 d-flex justify-content-end'>
                <a href='update.php? id=".$row['id']."'><button class='btn btn-dark m-2'>Edit</button></a>
                <a href='update.php? id=".$row['id']."'><button class='btn btn-dark m-2'>Details</button></a>
                <a href='delete.php? id=".$row['id']."'><button class='btn btn-dark m-2'>Delete</button></a>
                </div>
            </div>
        </div>
        </div>
        </div>   
        ";   
    }
} else {
    $tbody = "<tr><td class='text-center w-100' >No data available</td></tr>";
}


?>



<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="style.css">
        <?php require_once "components/boot.php"; ?>
    </head>
    <body>

        <!-- navbar is here -->
        <nav class="navbar fixed-top navbar-dark bg-dark w-100">
        <a href="index.php">
        <i class="bi bi-house text-light btn"></i></a>
        <!-- Navbar content -->
        </nav>

        <div class="bg p-5 w-75 h-100 container-fluid">
        <h1 class="m-5">Welcome to Media section</h1>  
            <!-- dynamic output is here  -->
            <?php echo $books;?>
        </div>

     <!-- footer is here -->
     <footer class="text-center fixed-bottom bg-dark text-light w-100">
            <h6>@copyright Gangarig Nyamsuren</h6>
        </footer>
    </body>
</html>