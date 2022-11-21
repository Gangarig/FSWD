<?php 
require_once "components/db_connect.php";

// bringing all animals to dashboard
$sql_animal = "SELECT * FROM animal";
$result_animal = mysqli_query($connect, $sql_animal);
//this variable will output data dynamically 
$senior = '';
if ($result_animal->num_rows > 0) {
    while ($row_animal = $result_animal->fetch_array(MYSQLI_ASSOC)) 
        if($row_animal['age'] > 8){
        $senior .= "
        <div class='container card card_height w-100 mt-2'>
            <h5 class='card-header'>Name : ".$row_animal['name']."</h5>
            <div class='d-flex'>
                <div class='card-body d-flex flex-column w-50'>
                    <p>Location : ".$row_animal['location'] ." </p>
                    <p>Description : ".$row_animal['description'] ." </p>
                    <p>Size : ".$row_animal['size'] ." </p>
                    <p>Age : ".$row_animal['age'] ." </p>
                    <p>Breed : ".$row_animal['breed'] ." </p>
                    <p>Vaccine status : ".$row_animal['vaccine_status'] ." </p>
                    <p>Adoption status : ".$row_animal['adoption_status'] ." </p>
                    <div    class='d-flex'>
                    <a href='details.php? id=".$row_animal['id']."' class='m-1  btn btn-dark'>Take me home</a>
                    </div>
                </div>
                <div class='d-flex h-100 justify-content-center align-items-center'>
                    <img class='img-thumbnail' src='pictures/" . $row_animal['picture'] . "'>
                </div>
            </div>
            
        </div><hr>";
    }} else {
    $senior = "<h2 class='text-center'>No Data Available</h2>";
}
?> 
    
    

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome </title>
    <?php require_once 'components/boot.php' ?>
    <style>
        img{
            width: 500px;
            height: auto;
        }
    </style>
</head>

<body>
<!-- ========== Start Navbar ========== -->
<nav class="bg-dark bg text-light w-100 d-flex justify-content-between">
    <div>
        <a class="btn btn-dark" href="index.php">Home</a>
    </div>
    <div>

    </div>
</nav>
<!-- ========== End Navbar ========== -->


<!-- ========== Start Section ========== -->
<div class="d-flex w-100 justify-content-evenly ">
    <div class="container w-75 m-5">
        <h2 class="m-5">Senior Pet list</h2>
        <?php echo $senior; ?> <!--Animal list output is here-->
    </div>
</div>
<!-- ========== End Section ========== -->


<!-- ========== Start Footer ========== -->
<footer class="mt-3 bg bg-dark text-light d-flex justify-content-center align-items-center fixed-bottom">
    <p>@2022 Gangarig Nyamsuren</p>
</footer>
<!-- ========== End Footer ========== -->
</body>
</html>