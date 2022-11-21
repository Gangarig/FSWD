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
$sql = "SELECT * FROM user";
$result = mysqli_query($connect, $sql);
//this variable will output data dynamically 
$userlist= '';
if ($result->num_rows > 0) {
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        if($row['status'] !='admin'){
        $userlist .= "
        <div class=' container card card_height w-75 mt-2'>
            <h5 class='card-header'>Full name : ".$row['fname']." ".$row['lname']."</h5>
            <div class='d-flex h-100'>
                <div class='card-body d-flex flex-column'>
                    <p class='pt-3'>Email : ".$row['email'] ." </p>
                    <p>Phone Number : ".$row['phone_number'] ." </p>
                    <p>Address : ".$row['address'] ." </p>
                    <p>Profile status : ".$row['status'] ." </p>
                    <a href='../actions/u_delete.php? id=".$row['id']."' class=' w-50 btn btn-dark mt-5'>Delete user</a>
                </div>
                <div class='d-flex h-100 justify-content-center align-items-center'>
                    <img class='img-thumbnail' src='../pictures/" . $row['picture'] . "'>
                </div>
            </div>
            
        </div><hr>";
        }
    }
} else {
    $userlist = "<h2 class='text-center'>No Data Available</h2>";
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
            width: 300px;
        }
        .card_height{
            height: 440px;
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
        <a class="btn btn-dark" href="../dashboard.php">dashboard</a> 
    </div>
</nav>
<!-- ========== End Navbar ========== -->

<!-- ========== Start User//Animal list  ========== -->
<div class="d-flex w-100 justify-content-evenly ">
    <div class="container w-50 m-5">
        <h2 class="m-5">Registered Users</h2>
        <?php echo $userlist; ?>    <!--User output is here-->
    </div>
</div>
<!-- ========== End User//Animal list ========== -->
<!-- ========== Start Footer ========== -->
<footer class="bg bg-dark text-light d-flex justify-content-center align-items-center fixed-bottom">
<p>@2022 Gangarig Nyamsuren</p>
</footer>
<!-- ========== End Footer ========== -->
</body>
</html>