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

//the GET method will show the info from the user to be deleted
if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM user WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($result);
  }
  //the POST method will delete the user permanently
    if ($_POST) {
        $id = $_POST['id'];
        $sql = "DELETE FROM user WHERE id = {$id}";
        if ($connect->query($sql) === TRUE) {
            $class = "alert dark-success";
            $message = "Successfully Deleted!";
            header("refresh:1;url=accounts.php");
            // header("refresh:3;url=../dashboard.php");
        } else {
            $class = "alert dark-danger";
            $message = "The entry was not deleted due to: <br>" . $connect->error;
        }
    }
    mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Delete Request</title>
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
      <h3 class="m-5 text-center">Do you really want to delete this request?</h3>
      <form class="m-5 text-center" method="post">
          <input type="hidden" name="id" value="<?php echo $id ?>" />
          <button class=" btn btn-dark" type="submit">Yes, delete it!</button>
          <a href="accounts.php"><button class="btn btn-dark" type="button">No, go back!</button></a>
      </form>

</body>
</html>