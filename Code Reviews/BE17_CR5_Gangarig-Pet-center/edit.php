<?php
session_start();
require_once 'components/db_connect.php';
require_once 'components/file_upload.php';
require_once 'components/boot.php';
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
    $sql = "SELECT * FROM animal WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $name = $data['name'];
        $location = $data['location'];
        $description = $data['description'];
        $size = $data['size'];
        $age = $data['age'];
        $breed = $data['breed'];
        $v_status = $data['vaccine_status'];
        $a_status = $data['adoption_status'];
        $picture = $data['picture'];
    }
}

//update
$class = 'd-none';
if (isset($_POST["submit"])) {
    $name = $_POST['name'];
    $location = $_POST['location'];
    $description = $_POST['description'];
    $size = $_POST['size'];
    $age = $_POST['age'];
    $breed = $_POST['breed'];
    $v_status = $_POST['vaccine_status'];
    $a_status = $_POST['adoption_status'];
    $id = $_POST['id'];
    //variable for upload pictures errors is initialized
    $uploadError = '';
    $pictureArray = file_upload($_FILES['picture']); //file_upload() called
    $picture = $pictureArray->fileName;
    if ($pictureArray->error === 0) {
        ($_POST["picture"] == "noimage.png") ?: unlink("pictures/{$_POST["picture"]}");
        $sql = "UPDATE animal SET name = '$name', location = '$location', description = '$description', size = '$size',age = '$age', breed = '$breed', vaccine_status = '$v_status',adoption_status = '$a_status', picture = '$pictureArray->fileName' WHERE id = {$id}";
    } else {
        $sql = "UPDATE animal SET name = '$name', location = '$location', description = '$description', size = '$size',age = '$age', breed = '$breed', vaccine_status = '$v_status',adoption_status = '$a_status' WHERE id = {$id}";
    }
    if (mysqli_query($connect, $sql) === true) {
        $class = "alert alert-success";
        $message = "The record was successfully updated";
        $uploadError = ($pictureArray->error != 0) ? $pictureArray->ErrorMessage : '';
        header("refresh:3;url=edit.php?id={$id}");
    } else {
        $class = "alert alert-danger";
        $message = "Error while updating record : <br>" . $connect->error;
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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration for animal</title>
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
        <a class="btn btn-dark" href="index.php">Home</a>
    </div>
    <div>
        <a class="btn btn-dark" href="dashboard.php">Dashboard</a> 
    </div>
</nav>
<!-- ========== End Navbar ========== -->
<div class="<?php echo $class; ?>" role="alert">
            <p><?php echo ($message) ?? ''; ?></p>
            <p><?php echo ($uploadError) ?? ''; ?></p>
</div>

<!-- ========== Profile Section ========== -->
<div class="mt-5 d-flex justify-content-center">
<img src='pictures/<?php echo $picture?>' alt="">
</div>
<div class="container mt-5">
        <form class="w-75" method="post"  autocomplete="off" enctype="multipart/form-data">
            <h2>Registration Form</h2>
            <hr />
            <!-- name -->
            <input type="text" name="name" class="form-control m-1" placeholder="Enter a name" maxlength="50" value="<?php echo $name ?>" />
            <!-- location -->
            <input type="text" name="location" class="form-control m-1" placeholder="Location" maxlength="50" value="<?php echo $location ?>" />
            <!-- description -->
            <input type="text" name="description" class="form-control m-1" placeholder="Enter Your short description"  value="<?php echo $description ?>" /> <span class="text-danger">
            <!-- picture -->
            <input class='m-1 form-control ' type="file" name="picture">
            <!-- size -->
            <input class='m-1 form-control' type="text" name="size" placeholder="size" maxlength="255" value="<?php echo $size; ?>"> 
            <!-- age -->
            <input class='m-1 form-control' type="number" name="age" placeholder="Age" maxlength="11" value="<?php echo $age; ?>">
            <!-- breed -->
            <input class='m-1 form-control' type="text" name="breed" placeholder="Breed" maxlength="255" value="<?php echo $breed; ?>">
            <!-- vaccine status -->
            <p class="m-1 text-dark"> Vaccine status </p>
                <select name="vaccine_status">
                    <option value="Vaccinated"> Vaccinated</option>
                    <option value="not Vaccinated">not Vaccinated</option>
                </select><span class="text-danger">
    
            <!-- adoption status -->
            <p class="m-1 text-dark"> Adoption status </p>
                <select name="adoption_status">
                    <option value="Currently not available for adoption">Currently not available for adoption</option>
                    <option value="Available">Available</option>
                </select> <span class="text-danger">
         
            <hr />
            <input type="hidden" name="id" value="<?php echo $data['id'] ?>" />
            <input type="hidden" name="picture" value="<?php echo $picture ?>" />
            <button type="submit" class="btn btn-block btn-dark" name="submit">save the changes</button>
            <a href="<?php echo $backBtn ?>"><button class="btn btn-dark" type="button">Back</button></a>

   
        </form>
    </div>
<!-- ========== Profile Section ========== -->

<!-- ========== Start Footer ========== -->
<footer class="mt-3 bg bg-dark text-light d-flex justify-content-center align-items-center fixed-bottom">
<p>@2022 Gangarig Nyamsuren</p>
</footer>
<!-- ========== End Footer ========== -->
</body>
</html>