<?php
    require_once "components/boot.php";
    require_once "components/db_connect.php";
    
    // bringing all animals to dashboard
    $sql_animal = "SELECT * FROM animal";
    $result_animal = mysqli_query($connect, $sql_animal);
    //this variable will output data dynamically 
    $animal_list = '';
    if ($result_animal->num_rows > 0) {
    while ($row_animal = $result_animal->fetch_array(MYSQLI_ASSOC)) {
        $animal_list .= "
        <div class='container card card_height w-50 mt-2'>
            <h5 class='card-header'>Name : ".$row_animal['name']."</h5>
            <div class='d-flex h-100'>
                <div class='card-body d-flex flex-column justify-content-around'>
                    <p>Location : ".$row_animal['location'] ." </p>
                    <p>Breed : ".$row_animal['breed'] ." </p>
                    <p>Adoption status : ".$row_animal['adoption_status'] ." </p>
                    <div    class='d-flex'>
                    <a href='adopt.php? id=".$row_animal['id']."' class='m-1  btn btn-dark'>Take me home</a>
                    <a href='animal/details.php? id=".$row_animal['id']."' class='m-1  btn btn-dark'>Details</a>
                    </div>
                </div>
                <div class='d-flex align-items-center'>
                    <img class='img-thumbnail' src='pictures/" . $row_animal['picture'] . "'>
                </div>
            </div>
        </div><hr>";
    }
    } else {
        $animal_list = "<h2 class='text-center'>No Data Available</h2>";
    }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Homepage</title>
    <style>
        img {
            width: 300px;
        }
    </style>

</head>
<body>
<!-- ========== Start Navbar ========== -->
<nav class="bg-dark bg text-light w-100 d-flex justify-content-between">
    <div>
        <a class="btn btn-dark" href="index.php">Home</a> 
        <a class="btn btn-dark" href="Senior.php">Senior</a> 
    </div>
    <div>
        <a class="btn btn-dark" href="login.php">Log in</a> 
    </div>
</nav>
<!-- ========== End Navbar ========== -->
<!-- ========== Start Section ========== -->
    <h1 class="text-center mt-5"> Welcome to our pet adoption center</h1>
    <?php echo $animal_list; ?>

<!-- ========== End Section ========== -->
<!-- ========== Start Footer ========== -->
<footer class="mt-3 bg bg-dark text-light d-flex justify-content-center align-items-center fixed-bottom">
    <p>@2022 Gangarig Nyamsuren</p>
</footer>
<!-- ========== End Footer ========== -->  
</body>
</html>