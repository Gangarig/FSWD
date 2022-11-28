<?php
session_start();
require_once '../components/db_connect.php';
require_once '../components/boot.php';

//initial bootstrap class for the confirmation message
$class = 'd-none';
$name = $age = $size = $breed = $location = $v_status = $a_status = $description = $picture ='';
//the GET method will show the info from the user to be deleted
if ($_GET['id']) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM animal WHERE id = {$id}";
  $result = mysqli_query($connect, $sql);
  $data = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) == 1) {
      $name = $data['name'];
      $age = $data['age'];
      $size = $data['size'];
      $breed = $data['breed'];
      $location = $data['location'];
      $v_status = $data['vaccine_status'];
      $a_status = $data['adoption_status'];
      $description = $data['description'];
      $picture = $data['picture'];
  }
}
$animal="<div class='mt-5 container card card_height w-75 mt-2'>
<h5 class='card-header'>Name : ".$data['name']."</h5>
<div class='d-flex'>
    <div class='card-body d-flex flex-column'>
        <p>Location : ".$data['location'] ." </p>
        <p>Size : ".$data['size'] ." </p>
        <p>Age : ".$data['age'] ." </p>
        <p>Breed : ".$data['breed'] ." </p>
        <p>Vaccine status : ".$data['vaccine_status'] ." </p>
        <p>Adoption status : ".$data['adoption_status'] ." </p>
        <p>Description : ".$data['description'] ." </p>
        <div    class='d-flex'>
        <a href='../adopt.php? id=".$data['id']."' class='m-1  btn btn-dark'>Take me home</a>
        </div>
    </div>
    <div class='d-flex justify-content-center align-items-center'>
        <img class='img-thumbnail' src='../pictures/" . $data['picture'] . "'>
    </div>
</div>

</div>";


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        img {
            width: 500px;
            height: auto;
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
        <a class="btn btn-dark" href="../login.php">Log in</a> 
    </div>
</nav>
<!-- ========== End Navbar ========== -->
<!-- ========== Start Section ========== -->
    <?php echo $animal;?>

<!-- ========== End Section ========== -->
<!-- ========== Start Footer ========== -->
<footer class="mt-3 bg bg-dark text-light d-flex justify-content-center align-items-center fixed-bottom">
    <p>@2022 Gangarig Nyamsuren</p>
</footer>
<!-- ========== End Footer ========== -->
    
</body>
</html>