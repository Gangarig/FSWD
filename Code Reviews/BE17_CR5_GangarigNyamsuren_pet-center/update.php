<?php
session_start();
require_once 'components/db_connect.php';
require_once 'components/file_upload.php';
// if session is not set this will redirect to login page
if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}

$backBtn = '';
//if it is a user it will create a back button to home.php
if (isset($_SESSION["user"])) {
    $backBtn = "home.php";
}
//if it is a adm it will create a back button to dashboard.php
if (isset($_SESSION["admin"])) {
    $backBtn = "dashboard.php";
}

//fetch and populate form
if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $fname = $data['fname'];
        $lname = $data['lname'];
        $email = $data['email'];
        $address = $data['address'];
        $phone_number = $data['phone_number'];
        $picture = $data['picture'];
    }
}

//update
$class = 'd-none';
if (isset($_POST["submit"])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $address = $_POST['address'];
    $phone_number = $_POST['phone_number'];
    $picture = $_POST['picture'];
    $id = $_POST['id'];
    //variable for upload pictures errors is initialized
    $uploadError = '';
    $pictureArray = file_upload($_FILES['picture']); //file_upload() called
    $picture = $pictureArray->fileName;
    if ($pictureArray->error === 0) {
        ($_POST["picture"] == "noimage.png") ?: unlink("pictures/{$_POST["picture"]}");
        $sql = "UPDATE user SET fname = '$fname', lname = '$lname', email = '$email', phone_number = '$phone_number', address = '$address', picture = '$pictureArray->fileName' WHERE id = {$id}";
    } else {
        $sql = "UPDATE user SET fname = '$fname', lname = '$lname', email = '$email', phone_number = '$phone_number', address = '$address' WHERE id = {$id}";
    }
    if (mysqli_query($connect, $sql) === true) {
        $class = "alert alert-success";
        $message = "The record was successfully updated";
        $uploadError = ($pictureArray->error != 0) ? $pictureArray->ErrorMessage : '';
        header("refresh:3;url=update.php?id={$id}");
    } else {
        $class = "alert alert-danger";
        $message = "Error while updating record : <br>" . $connect->error;
        $uploadError = ($pictureArray->error != 0) ? $pictureArray->ErrorMessage : '';
        header("refresh:3;url=update.php?id={$id}");
    }
}

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit User</title>
    <?php require_once 'components/boot.php' ?>
    <style>
        .title1{
            padding-top: 200px;
            padding-left: 350px;
        }
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
        </div>
        <div>
            <a class="btn btn-dark" href="logout.php">Profile</a> 
        </div>
    </nav>
    <!-- ========== End Navbar ========== -->
        <div class="<?php echo $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
        </div>
    <h2 class="title1">Update your Profile here</h2>
    <div class="container d-flex justify-content-evenly m-5 h-50 w-100">
        <img class='img-thumbnail' src='pictures/<?php echo $data['picture'] ?>' alt="<?php echo $fname ?>">
        <form method="post" enctype="multipart/form-data">
            <table class="table">
                <tr>
                    <th>First Name</th>
                    <td><input class="form-control" type="text" name="fname" placeholder="First Name" value="<?php echo $fname ?>" /></td>
                </tr>
                <tr>
                    <th>Last Name</th>
                    <td><input class="form-control" type="text" name="lname" placeholder="Last Name" value="<?php echo $lname ?>" /></td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td><input class="form-control" type="email" name="email" placeholder="Email" value="<?php echo $email ?>" /></td>
                </tr>
                <tr>
                    <th>Address</th>
                    <td><input class="form-control" type="text" name="address" placeholder="Address" value="<?php echo $address ?>" /></td>
                </tr>
                <tr>
                    <th>Phone Number</th>
                    <td><input class="form-control" type="text" name="phone_number" placeholder="Phone number" value="<?php echo $phone_number ?>" /></td>
                </tr>
                <tr>
                    <th>Picture</th>
                    <td><input class="form-control" type="file" name="picture" /></td>
                </tr>
                <tr>
                    <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
                    <input type="hidden" name="picture" value="<?php echo $picture ?>" />
                    <td><button name="submit" class="btn btn-dark" type="submit">Save Changes</button></td>
                    <td><a href="<?php echo $backBtn ?>"><button class="btn btn-dark" type="button">Back</button></a></td>
                </tr>
            </table>
        </form>
    </div>

<!-- ========== Start Footer ========== -->
<footer class="mt-3 bg bg-dark text-light d-flex justify-content-center align-items-center fixed-bottom">
    <p>@2022 Gangarig Nyamsuren</p>
</footer>
<!-- ========== End Footer ========== -->
</body>
</html>