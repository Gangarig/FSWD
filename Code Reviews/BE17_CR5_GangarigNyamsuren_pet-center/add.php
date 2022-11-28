<?php
session_start();
require_once 'components/db_connect.php';
require_once 'components/boot.php';
require_once 'components/file_upload.php';
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



$error = false;
$ErrorMSG = "";
$uploadError = "";
$picError = "";
$name = $location = $description = $size = $age = $breed = $v_status = $a_status = $nError = $lError = $dError = $sError = $aError = $bError = $vError = $aError = "";

// Add an animal to list
if (isset($_POST['add'])){
    // trim - strips whitespace (or other characters) from the beginning and end of a string
    $name = trim($_POST['name']);    
    // strip_tags -- strips HTML and PHP tags from a string
    $name = strip_tags($name);  
    // htmlspecialchars converts special characters to HTML entities
    $name = htmlspecialchars($name);  

    $location = trim($_POST['location']);
    $location = strip_tags($location);
    $location = htmlspecialchars($location);

    $description = trim($_POST['description']);
    $description = strip_tags($description);
    $description = htmlspecialchars($description);

    $size = trim($_POST['size']);
    $size = strip_tags($size);
    $size = htmlspecialchars($size);

    $age = trim($_POST['age']);
    $age = strip_tags($age);
    $age = htmlspecialchars($age);

    $breed = trim($_POST['breed']);
    $breed = strip_tags($breed);
    $breed = htmlspecialchars($breed);

    $v_status = trim($_POST['v_status']);
    $v_status = strip_tags($v_status);
    $v_status = htmlspecialchars($v_status);

    $a_status = trim($_POST['a_status']);
    $a_status = strip_tags($a_status);
    $a_status = htmlspecialchars($a_status);

    $picture = file_upload($_FILES['picture']);

    // basic  validation
    if (empty($name)) {
        $error = true;
        $nError = "Please enter a name ";
    }

    if (empty($location)) {
        $error = true;
        $lError = "Please enter a location ";
    } 
    
    if (empty($age)) {
        $error = true;
        $aError = "Please enter a Age ";
    }  
    if (empty($breed)) {
        $error = true;
        $bError = "Please enter a Breed ";
    } 
    if (empty($size)) {
        $error = true;
        $sError = "Please enter a size ";
    } 
    if (!$error) {

        $query = "INSERT INTO animal (name , location , description , size , age , breed , vaccine_status , adoption_status , picture)
                  VALUES('$name', '$location', '$description', '$size', '$age','$breed','$v_status','$a_status', '$picture->fileName')";
        $res = mysqli_query($connect, $query);

        if ($res) {
            $errTyp = "success";
            $errMSG = "Successfully added";
            $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
        } else {
            $errTyp = "danger";
            $errMSG = "Something went wrong, try again later...";
            $uploadError = ($picture->error != 0) ? $picture->ErrorMessage : '';
        }
    }
    

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


<!-- ========== Profile Section ========== -->
<div class="container mt-5">
        <form class="w-75" method="post" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" autocomplete="off" enctype="multipart/form-data">
            <h2>Registration Form</h2>
            <hr />
            <?php
            if (isset($errMSG)) {
            ?>
                <div class="alert alert-<?php echo $errTyp ?>">
                    <p><?php echo $errMSG; ?></p>
                    <p><?php echo $uploadError; ?></p>
                </div>

            <?php
            }
            ?>
            <!-- name -->
            <input type="text" name="name" class="form-control m-1" placeholder="Enter a name" maxlength="50" value="<?php echo $name ?>" />
            <!-- location -->
            <span class="text-danger"> <?php echo $nError; ?> </span>
            <input type="text" name="location" class="form-control m-1" placeholder="Location" maxlength="50" value="<?php echo $location ?>" />
            <span class="text-danger"> <?php echo $lError; ?> 
            <!-- description -->
            <input type="text" name="description" class="form-control m-1" placeholder="Enter Your short description"  value="<?php echo $description ?>" />
            <span class="text-danger"> <?php echo $dError; ?> 
            <!-- picture -->
            <input class='m-1 form-control ' type="file" name="picture">
            <span class="text-danger"> <?php echo $picError; ?> 
            <!-- size -->
            <input class='m-1 form-control' type="text" name="size" placeholder="size" maxlength="255" value="<?php echo $size; ?>">
            <span class="text-danger"> <?php echo $sError; ?> 
            <!-- age -->
            <input class='m-1 form-control' type="number" name="age" placeholder="Age" maxlength="11" value="<?php echo $age; ?>">
            <span class="text-danger"> <?php echo $aError; ?> 
            <!-- breed -->
            <input class='m-1 form-control' type="text" name="breed" placeholder="Breed" maxlength="255" value="<?php echo $breed; ?>">
            <span class="text-danger"> <?php echo $bError; ?> 
            <!-- vaccine status -->
            <p class="m-1 text-dark"> Vaccine status
            <select name="v_status">
            <option value="Vaccinated">Vaccinated</option>
            <option value="not Vaccinated">not Vaccinated</option>
            </select><span class="text-danger">
            </p> 
            <!-- adoption status -->
            <p class="m-1 text-dark">
            Adoption status
            <select name="a_status">            
            <option value="Available">Available</option>
            <option value="Currently not available for adoption">Currently not available for adoption</option>
            </select> <span class="text-danger">
            </p>
            <hr />
            <button type="submit" class="btn btn-block btn-dark" name="add">Add to Pet list</button>
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