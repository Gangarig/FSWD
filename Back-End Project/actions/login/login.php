<?php
session_start();
require_once('../components/boot.php');
require_once('../components/db_connect.php');

// it will never let you open  (login) page if session is set
if (isset($_SESSION['user'])) {
    header("Location: ../../profile.php");
    exit;
}
if (isset($_SESSION['trainer'])) {
    header("Location: ../../trainer.php");
    exit;
}
if (isset($_SESSION['admin'])) {
    header("Location: ../../dashboard.php"); // redirects to dashboard.php
}


$error = false;
$email = $password = $emailError = $passwordError = "";

// prevent sql injections and clear user invalid inputs
if(isset($_POST['login'])){

    $email = trim($_POST['email']);
    $email = strip_tags($email);
    $email = htmlspecialchars($email);

    $password = trim($_POST['password']);
    $password = strip_tags($password);
    $password = htmlspecialchars($password);

    if(empty($email)){
        $error = true;
        $emailError = "Please enter your email address.";
    }   else if(!filter_var($email , FILTER_VALIDATE_EMAIL)){
        $error = true;
        $emailError = "Please enter a valid email address.";
    }


    if(empty($password)){
        $error = true; 
        $passwordError = "Please enter your password";
    }

    // if there is no error, continue to login 
    if(!$error) {
        $password = hash('sha256',$password); // password hashing
        $sql = "SELECT id, fname, lname, birth_date, password , address, phone_number, status FROM user WHERE email= '$email'";
        $result = mysqli_query($link , $sql);
        $row = mysqli_fetch_assoc($result);
        $count = mysqli_num_rows($result);
        if($count == 1 && $row['password'] == $password){
            if($row['status'] == 'admin') {
                $_SESSION['admin'] = $row['id'];
                header("Location: ../../dashboard.php");
            } elseif ($row['status'] == 'trainer') {
                $_SESSION['trainer'] = $row['id'];
                header("Location: ../../trainer.php");
            } else {
                $_SESSION['user'] = $row['id'];
                $_SESSION['status'] = $row['status'];
                header("Location: ../../profile.php");
            } 
        } else {
            $errorMSG = "Incorrect Credentials, Try again...";
        }
    }
}
mysqli_close($link);
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Page</title>
</head>
<body>

<!-- ========== Start Section ========== -->
<div class="container h-75 d-flex align-items-center justify-content-center">
    <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" autocomplete="off"             
        class="d-flex flex-column text-center rounded-4 w-50 ">
        <?php
        if(isset($errorMSG)){
        echo $errorMSG;}
        ?>
        <h2>Login</h2>
        <input type="email" autocomplete="off" name="email" class="form-control" placeholder="Your Email" value="<?php echo $email; ?>" maxlength="40" />
        <span class="text-danger"><?php echo $emailError; ?></span>
        <input type="password" name="password" class="form-control mt-2" placeholder="Your Password" maxlength="15" />
        <span class="text-danger"><?php echo $passwordError; ?></span>
        <hr />
        <button class="btn btn-block btn-dark" type="submit" name="login">Sign In</button>
        <hr />
        <a class="btn btn-dark " href="register.php">Not registered yet? Click here</a>
    </form>
</div>
<!-- ========== End Section ========== -->

</body>
</html>