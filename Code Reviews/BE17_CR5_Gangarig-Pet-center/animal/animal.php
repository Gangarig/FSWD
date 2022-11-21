<?php
session_start();
require_once '../components/db_connect.php';
require_once '../components/boot.php';
require_once '../components/file_upload.php';
// if session is not set this will redirect to login page
if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
//if session user exist it shouldn't access dashboard.php
if (isset($_SESSION['user'])) {
    header("Location: home.php");
    exit;
}

// bringing all animals to dashboard
$sql_animal = "SELECT * FROM animal";
$result_animal = mysqli_query($connect, $sql_animal);
//this variable will output data dynamically 
$animal_list = '';
if ($result_animal->num_rows > 0) {
    while ($row_animal = $result_animal->fetch_array(MYSQLI_ASSOC)) {
        $animal_list .= "
        <div class='container card card_height w-100 mt-2'>
            <h5 class='card-header'>Name : ".$row_animal['name']."</h5>
            <div class='d-flex'>
                <div class='card-body d-flex flex-column'>
                    <p>Location : ".$row_animal['location'] ." </p>
                    <p>Description : ".$row_animal['description'] ." </p>
                    <p>Size : ".$row_animal['size'] ." </p>
                    <p>Age : ".$row_animal['age'] ." </p>
                    <p>Breed : ".$row_animal['breed'] ." </p>
                    <p>Vaccine status : ".$row_animal['vaccine_status'] ." </p>
                    <p>Adoption status : ".$row_animal['adoption_status'] ." </p>
                    <div    class='d-flex'>
                    <a href='../actions/a_delete.php? id=".$row_animal['id']."' class='m-1  btn btn-dark'>Delete from list</a>
                    <a href='../edit.php? id=".$row_animal['id']."' class='m-1  btn btn-dark'>Edit</a>
                    </div>
                </div>
                <div class='d-flex h-100 justify-content-center align-items-center'>
                    <img class='img-thumbnail' src='../pictures/" . $row_animal['picture'] . "'>
                </div>
            </div>
            
        </div><hr>";
    }
} else {
    $animal_list = "<h2 class='text-center'>No Data Available</h2>";
}

mysqli_close($connect);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - <?php echo $row['fname']; ?></title>
    <style>
        img{
            padding: 5px;
            width: 500px;
            height: auto;
        }
        .card_height{
            height: 500px;
        }
    </style>
</head>
<body>
<!-- ========== Start Navbar ========== -->
<nav class="bg-dark bg text-light w-100 d-flex justify-content-between">
    <div>
        <a class="btn btn-dark" href="../index.php">Home</a>
    </div>
    <div>
        <a class="btn btn-dark" href="../dashboard.php">Dashboard</a> 
    </div>
</nav>
<!-- ========== End Navbar ========== -->

<!-- ========== Start User//Animal list  ========== -->
<div class="d-flex w-100 justify-content-evenly ">
    <div class="container w-75 m-5">
        <h2 class="m-5">Animal list</h2>
        <?php echo $animal_list; ?> <!--Animal list output is here-->
    </div>
</div>
<!-- ========== End User//Animal list ========== -->

<!-- ========== Start Footer ========== -->
<footer class="mt-3 bg bg-dark text-light d-flex justify-content-center align-items-center fixed-bottom">
<p>@2022 Gangarig Nyamsuren</p>
</footer>
<!-- ========== End Footer ========== -->
</body>
</html>