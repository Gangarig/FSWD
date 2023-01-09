<?php
session_start();
require_once('../components/boot.php');
require_once('../components/db_connect.php');
require_once('../components/file_upload.php');

// if session is not set this will redirect to login page
if (!isset($_SESSION['admin']) && !isset($_SESSION['user']) && !isset($_SESSION['trainer'])) {
    header("Location: login.php");
    exit;
}
$backBtn = '';
//if it is a user it will create a back button to home.php
if (isset($_SESSION["user"])) {
    $backBtn = "../../profile.php#profile";
}
//if it is a admin it will create a back button to dashboard.php
if (isset($_SESSION["admin"])) {
    $backBtn = "../../dashboard.php";
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
        $profile_img = $data['profile_img'];
        $phone_number = $data['phone_number'];
        $address = $data['address'];
    }
}
//update
$class = 'd-none';
if (isset($_POST["submit"])) {
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $phone_number = $_POST['phone_number'];
    $address = $_POST['address'];
    $profile_img = $_POST['profile_img'];
    $id = $_POST['id'];
    //variable for upload pictures errors is initialized
    $uploadError = '';
    $pictureArray = file_upload($_FILES['picture']); //file_upload() called
    $picture = $pictureArray->fileName;
    if ($pictureArray->error === 0) {
        ($_POST["profile_img"] == "noimage.png") ?: unlink("../images/{$_POST["profile_img"]}");
        $sql = "UPDATE user SET 
        fname = '$fname', 
        lname = '$lname', 
        phone_number = '$phone_number', 
        address = '$address', 
        profile_img = '$pictureArray->fileName' 
        WHERE id = {$id}";
    } else {
        $sql = "UPDATE user SET 
        fname = '$fname', 
        lname = '$lname', 
        phone_number = '$phone_number', 
        address = '$address' 
        WHERE id = {$id}";
    }
    if (mysqli_query($connect, $sql) === true) {
        $class = "alert alert-success";
        $message = "User data was successfully updated";
        $uploadError = ($pictureArray->error != 0) ? $pictureArray->ErrorMessage : '';
        header("refresh:3;url=edit.php?id={$id}");
    } else {
        $class = "alert alert-dark";
        $message = "Error while updating user data : <br>" . $connect->error;
        $uploadError = ($pictureArray->error != 0) ? $pictureArray->ErrorMessage : '';
        header("refresh:3;url=edit.php?id={$id}");
    }
}
mysqli_close($connect);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile Info</title>
</head>

<body>
    <div class="mt-5 d-flex justify-content-center">
        <img src='pictures/<?php echo $picture ?>' alt="">
    </div>
    <div class="container mt-5 w-50">
        <form class="" method="post" autocomplete="off" enctype="multipart/form-data">
            <hr />
            <input type="text" name="fname" class="form-control m-1" maxlength="50" value="<?php echo $fname ?>" />
            <input type="text" name="lname" class="form-control m-1" maxlength="50" value="<?php echo $lname ?>" />
            <input type="text" name="address" class="form-control m-1" value="<?php echo $address ?>" /> <span class="text-danger">
                <input class='m-1 form-control ' type="file" name="picture">
                <input class='m-1 form-control' type="text" name="phone_number" placeholder="size" maxlength="255" value="<?php echo $phone_number; ?>">
                <hr />
                <input type="hidden" name="profile_img" value="<?php echo $profile_img ?>" />
                <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
                <button type="submit" class="btn btn-block btn-dark" name="submit">Save the changes</button>
                <a href="<?php echo $backBtn ?>"><button class="btn btn-dark" type="button">Back</button></a>
        </form>
        <div class="mt-5 <?php echo $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
        </div>
    </div>
</body>

</html>