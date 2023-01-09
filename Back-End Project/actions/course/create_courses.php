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
?>
<!DOCTYPE html>
<html>
<head>
<title>Page Title</title>
</head>
<body>
<h2> Create course </h2>

<form method="post" action="/Group-8-Project/actions/c_create.php" enctype="multipart/form-data">
  <label for="id">ID:</label><br>
  <input type="text" id="id" name="id" value=""><br>
  <label for="name">Name:</label><br>
  <input type="text" id="name" name="name" value=""><br><br>
  <label for="duration">Duration:</label><br>
  <input type="text" id="duration" name="duration" value=""><br><br>
  <label for="address">Address:</label><br>
  <input type="text" id="address" name="address" value=""><br><br>
  <label for="start_date">Start date:</label><br>
  <input type="date" id="start_date" name="start_date" value=""><br><br>
  <label for="end_date">End date:</label><br>
  <input type="date" id="end_date" name="end_date" value=""><br><br>
  <label for="price_private">Private price:</label><br>
  <input type="number" id="price_private" name="price_private" value=""><br><br>
  <label for="price_business">Business price:</label><br>
  <input type="number" id="price_business" name="price_business" value=""><br><br>
  <label for="price_student">Student price:</label><br>
  <input type="number" id="price_student" name="price_student" value=""><br><br>
  <label for="fk_trainer">Trainer:</label><br>
  <input type="number" id="fk_trainer" name="fk_trainer" value=""><br><br>
  <label for="capacity">Capacity:</label><br>
  <input type="number" id="capacity" name="capacity" value=""><br><br>
  <input type="text" name="image" value="<?php echo $row['image'] ?>"/><br/><br>
  <label for="description">Description:</label><br>
  <input type="text" id="description" name="description" value=""><br><br>
  <input type="submit" value="Submit">
</form> 

</body>
</html>
