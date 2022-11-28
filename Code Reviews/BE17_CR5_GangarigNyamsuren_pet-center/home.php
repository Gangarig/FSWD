<?php
session_start();
require_once 'components/db_connect.php';

// if admin will redirect to dashboard
if (isset($_SESSION['admin'])) {
    header("Location: dashboard.php");
    exit;
}
// if session is not set this will redirect to login page
if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

// select logged-in users details - procedural style
$res = mysqli_query($connect, "SELECT * FROM user WHERE id=".$_SESSION['user']);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title></title>
    <?php require_once 'components/boot.php' ?>
</head>

<body>
<!-- ========== Start Navbar ========== -->
<nav class="bg-dark bg text-light w-100 d-flex justify-content-between">
    <div>
        <a class="btn btn-dark" href="index.php">Home</a>
    </div>
    <div>
        <a class="btn btn-dark" href="login.php">Log in</a> 
    </div>
</nav>
<!-- ========== End Navbar ========== -->
    
    <div class="card m-5 w-75">
        <div class="row g-0">
            <div class="col-md-4 ">
                <img src="pictures/<?php echo $row['picture']; ?>" alt="<?php echo $row['fname']; ?>" class="img-fluid rounded-start">
            </div>
            <div class="col-md-8 d-flex flex-column" >
                <div class="card-body">
                    <h5 class="card-title">Fullname : <?php echo $row['fname'].' '. $row['lname']; ?> </h5>
                    <p class="card-text">Email : <?php echo $row['email']; ?> </p>
                    <p class="card-text">Phone number : <?php echo $row['phone_number']; ?> </p>
                    <p class="card-text">Address : <?php echo $row['address']; ?> </p>
                    <p class="card-text">Profile status : <?php echo $row['status']; ?> </p>                
                </div>
                <div class="m-3">
                <a class="btn btn-dark" href="logout.php?logout">Sign Out</a>
                <a class="btn btn-dark" href="update.php?id=<?php echo $_SESSION['user'] ?>">Update your profile</a>
                </div>
            </div>
        </div>
    </div>


    <!-- ========== Start Footer ========== -->
    <footer class="mt-3 bg bg-dark text-light d-flex justify-content-center align-items-center fixed-bottom">
        <p>@2022 Gangarig Nyamsuren</p>
    </footer>
    <!-- ========== End Footer ========== -->
</body>
</html>