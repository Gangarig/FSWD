<?php
session_start();
require_once('../components/boot.php');
require_once('../components/db_connect.php');

// if session is not set this will redirect to login page
if (!isset($_SESSION['admin']) && !isset($_SESSION['user']) && !isset($_SESSION['trainer'])) {
    header("Location: ../login/login.php");
    exit;
}
//if session user exist it shouldn't access dashboard.php
if (isset($_SESSION['status'])) {
    header("Location: ../../profile.php");
    exit;
}
if (isset($_SESSION['trainer'])) {
    header("Location: ../../trainer.php");
    exit;
}

$result = mysqli_query($link, "SELECT * FROM courses WHERE id='" . $_GET['id']  . "'");
$row = mysqli_fetch_array($result);
?>

<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
<h2> Update course </h2>

<form method="post" action="/Group-8-Project/actions/c_update.php" enctype="multipart/form-data">
  <label for="id">ID:</label><br>
  <input type="text" id="id" name="id" value="<?=$row['id']; ?>" disabled><br>
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name" value="<?=$row['name']; ?>"><br><br>
  <label for="duration">Duration:</label><br>
  <input type="text" id="duration" name="duration" value="<?=$row['duration']; ?>"><br><br>
  <label for="address">Address:</label><br>
  <input type="text" id="address" name="address" value="<?=$row['address']; ?>"><br><br>
  <label for="start_date">Start date:</label><br>
  <input type="date" id="start_date" name="start_date" value="<?=$row['start_date']; ?>"><br><br>
  <label for="end_date">End date:</label><br>
  <input type="date" id="end_date" name="end_date" value="<?=$row['end_date']; ?>"><br><br>
  <label for="price_private">Private price:</label><br>
  <input type="number" id="price_private" name="price_private" value="<?=$row['price_private']; ?>"><br><br>
  <label for="price_business">Business price:</label><br>
  <input type="number" id="price_business" name="price_business" value="<?=$row['price_business']; ?>"><br><br>
  <label for="price_student">Student price:</label><br>
  <input type="number" id="price_student" name="price_student" value="<?=$row['price_student']; ?>"><br><br>
  <label for="fk_trainer">Trainer:</label><br>
  <input type="number" id="fk_trainer" name="fk_trainer" value="<?=$row['fk_trainer']; ?>"><br><br>
  <label for="capacity">Capacity:</label><br>
  <input type="number" id="capacity" name="capacity" value="<?=$row['capacity']; ?>"><br><br>
  <input type="text" name="image" value="<?php echo $row['image'] ?>"/><br/>
  <label for="description">Description:</label><br>
  <input type="text" id="description" name="description" value="<?=$row['description']; ?>"><br><br>
  <input type="text" style="display: none;" id="id" name="id" value="<?=$row['id']; ?>"><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
