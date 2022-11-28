<?php
require_once "actions/db_connect.php";

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
            body{
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
        
        <div class="bg m-5 w-100 h-75 container">
            <h1>Welcome to library</h1>
            <h2 class="p-5">Media types</h2>
            <div class="container">
                <!-- Books Section -->
                <div class="card m-5 bg-transparent border border-dark border-3 text-center ">
                    <div class="card-body">
                        <h5 class="card-title">Book section</h5>
                        <p class="card-text">We have plenty of Books for you choose</p>
                        <a href="books.php">
                        <button class="btn btn-dark"
                        >To the Book Library</button></a>
                    </div>
                </div>
                <!-- DVD Section -->
                <div class="card m-5  bg-transparent border border-dark border-3 text-center ">
                   <div class="card-body">
                       <h5 class="card-title">Media section</h5>
                       <p class="card-text">Massive Digital data is waiting for you </p>
                       <a href="dvd.php"><button class="btn btn-dark"
                       >To the DVD Library</button></a>
                   </div>
                </div>
            </div>
        </div>
        
     
        <!-- footer is here -->
        <footer class="text-center fixed-bottom bg-dark text-light w-100">
            <h6>@copyright Gangarig Nyamsuren</h6>
        </footer>
    </body>
</html>