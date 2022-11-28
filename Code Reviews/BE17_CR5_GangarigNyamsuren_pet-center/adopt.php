<?php
session_start();
require_once 'components/db_connect.php';
require_once 'components/boot.php';
require_once 'components/file_upload.php';
// if session is not set this will redirect to login page
if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
    header("Location: login.php");
    exit;
}
//if session user exist it shouldn't access dashboard.php
if (isset($_SESSION['admin'])) {
    $id_u = $_SESSION['admin'];
}   else {
    $id_u = $_SESSION['user'];
}

//add order to table
if (isset($_GET['id'])) {
    $id_a = $_GET['id'];
        $query = "INSERT INTO adoption_request (fk_user , fk_pet )
                  VALUES('$id_u', '$id_a')";
        $res = mysqli_query($connect, $query);
        if ($res) {
            $MSG ="<h2 class='text-center mt-5 pt-5'>Request sent We will contact you</h2>";
        } else {
            $MSG ="<h2 class='text-center text-danger mt-5 pt-5'>Something went wrong, Try again later</h2>";
        }

}

?>
    
    

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome </title>
    <?php require_once 'components/boot.php' ?>
</head>

<body>
<!-- ========== Start Navbar ========== -->
<nav class="bg-dark bg text-light w-100 d-flex justify-content-between">
    <div>
        <a class="btn btn-dark" href="index.php">Home</a>
    </div>
    <div>
        <a class="btn btn-dark" href="login.php">Login</a> 
    </div>
</nav>
<!-- ========== End Navbar ========== -->
    <?php echo $MSG?>


<!-- ========== Start Footer ========== -->
<footer class="bg bg-dark text-light d-flex justify-content-center align-items-center fixed-bottom">
    <p>@2022 Gangarig Nyamsuren</p>
</footer>
<!-- ========== End Footer ========== -->
</body>
</html>