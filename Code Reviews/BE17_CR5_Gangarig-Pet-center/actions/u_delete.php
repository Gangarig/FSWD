<?php
session_start();
require_once '../components/db_connect.php';


// if session is not set this will redirect to login page
if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
  header("Location: ../index.php");
  exit;
}
if (isset($_SESSION["user"])) {
  header("Location: ../home.php");
  exit;
}
//initial bootstrap class for the confirmation message
$class = 'd-none';
$fname = $lname = $email = $phone_number = $address = $status = $picture = '';
//the GET method will show the info from the user to be deleted
if ($_GET['id']) {
  $id = $_GET['id'];
  $sql = "SELECT * FROM user WHERE id = {$id}";
  $result = mysqli_query($connect, $sql);
  $data = mysqli_fetch_assoc($result);
  if (mysqli_num_rows($result) == 1) {
      $fname = $data['fname'];
      $lname = $data['lname'];
      $email = $data['email'];
      $phone_number = $data['phone_number'];
      $address = $data['address'];
      $status = $data['status'];
      $picture = $data['picture'];
  }
}


//the POST method will delete the user permanently
if ($_POST) {
  $id = $_POST['id'];
  $picture = $data['picture'];
  ($picture == "noimage.png") ?: unlink("pictures/$picture");

  $sql = "DELETE FROM user WHERE id = {$id}";
  if ($connect->query($sql) === TRUE) {
      $class = "alert alert-success";
      $message = "Successfully Deleted!";
       header("refresh:3;url=../dashboard.php");
  } else {
      $class = "alert alert-danger";
      $message = "The entry was not deleted due to: <br>" . $connect->error;
  }
}
$user = "
<div class=' container card card_height w-75 mt-2'>
    <h5 class='card-header'>Full name : ".$data['fname']." ".$data['lname']."</h5>
    <div class='d-flex h-100'>
        <div class='card-body d-flex flex-column'>
            <p class='pt-3'>Email : ".$data['email'] ." </p>
            <p>Phone Number : ".$data['phone_number'] ." </p>
            <p>Address : ".$data['address'] ." </p>
            <p>Profile status : ".$data['status'] ." </p>
        </div>
        <div class='d-flex h-100 justify-content-center align-items-center'>
            <img class='img-thumbnail' src='../pictures/".$data['picture']."'>
        </div>
    </div>
    
</div><hr>";

mysqli_close($connect);
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete User</title>
  <?php require_once '../components/boot.php' ?>
  <style type="text/css">

      .img-thumbnail {
        width: 300px ;
          
      }
  </style>
</head>

<body>
  <div class="<?php echo $class; ?>" role="alert">
      <p><?php echo ($message) ?? ''; ?></p>
  </div>
      <h2 class="m-5">User info</h2>
      <?php echo $user; ?>
      <h3 class="m-5 text-center">Do you really want to delete this user?</h3>
      <form class="m-5 text-center" method="post">
          <input type="hidden" name="id" value="<?php echo $id ?>" />
          <input type="hidden" name="picture" value="<?php echo $picture ?>" />
          <button class=" btn btn-dark" type="submit">Yes, delete it!</button>
          <a href="../dashboard.php"><button class="btn btn-dark" type="button">No, go back!</button></a>
      </form>

</body>
</html>