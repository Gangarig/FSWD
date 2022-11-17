<!-- ========== Start PHP lines Section ========== -->


<?php
require_once 'components/boot.php';


?>
<!-- ========== End PHP lines Section ========== -->


<!DOCTYPE html>
<html lang="en">
    <head>
        <title></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="style.css" rel="stylesheet">
    </head>
    <body>
    <!-- ========== Start navbar Section ========== -->
    <nav class="w-100 d-flex justify-content-around text-light bg bg-dark fixed-top">
    <a href="index.php"><button class="btn btn-dark">Home</button></a>        
    <a href="login.php"><button class="btn btn-dark">Log in</button></a>        
    <a href="reserve.php"><button class="btn btn-dark">Reserve a Room</button></a>        
    <a href="contact.php"><button class="btn btn-dark">Contact us</button></a>               
    </nav>
    <!-- ========== End navbar Section ========== -->


    <!-- ========== Start main Section ========== -->
    <div class="w-100 h-100 d-flex align-items-center justify-content-around  ">
    <div class="w-75 bg rounded mt-5">
        <div id="carouselExampleInterval" class="carousel slide mt-5 w-50 h-50" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                <img src="./pictures/1.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                <img src="./pictures/2.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="./pictures/3.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="./pictures/4.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="./pictures/5.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="./pictures/6.jpg" class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item">
                <img src="./pictures/7.jpg" class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>

    </div>
    <!-- ========== Start Sign in Section ========== -->
    <form action="post" class="d-flex flex-column border border-5 text-center rounded-4">
        <div class="w-100 m-3">
        <p class="m-2">Username:<input class="m-5" type="text" name="name" value="Username"></p>
        <p class="m-2">Password:<input class="m-5" type="text" name="password" value="*******"></p>
        </div >
        <div class="w-100 d-flex justify-content-center m-3">
        <button type="submit" class="btn btn-dark w-25 m-2"> Submit</button>
        <button class="btn btn-dark w-25 m-2">Create account</button>
        </div>
    </form>
    
    <!-- ========== End Sign in Section ========== -->

    <!-- ========== End main Section ========== -->
    </div>

    <!-- ========== Start Footer Section ========== -->
    <footer class=" d-flex align-items-center justify-content-center  w-100 bg bg-dark text-light">
    <p class="w-100 text-center">@2022 Gangarig Nyamsuren</p>
    </footer>
    <!-- ========== End Footer Section ========== -->
    </body>
</html>