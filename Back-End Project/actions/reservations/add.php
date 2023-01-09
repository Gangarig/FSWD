<?php 
session_start();
require_once('../components/boot.php');
require_once('../components/db_connect.php');

// if session is not set this will redirect to login page
if (!isset($_SESSION['admin']) && !isset($_SESSION['user']) && !isset($_SESSION['trainer'])){
    header("Location: ../login/login.php");
    exit;
}


$list ='';  

//the GET method will show the info from the user to be deleted
if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM courses WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    $data = mysqli_fetch_assoc($result);
    $fk_user = $_SESSION['user'];
    $fk_course = $data['id'];
}

  //the POST method will delete the user permanently
    if ($_POST) {
        $fk_course = $_POST['id'];
        $fk_user = $_SESSION['user'];
        $query = "SELECT fk_course FROM reservations WHERE id='$fk_user'";
        $res = mysqli_query($link, $query);
        $data = mysqli_fetch_assoc($res);
        if( isset($data['fk_course']) != $fk_course ){
        $sql = "INSERT INTO reservations ( fk_user , fk_course )VALUES ( '$fk_user' , '$fk_course')";
        }
        if ($connect->query($sql) === TRUE) {
            $class = "alert dark-success";
            $message = "Successfully Confirmed!";
            header("refresh:1;url=reservation.php");
            // header("refresh:3;url=../dashboard.php");
        } else {
            $class = "alert dark-danger";
            $message = "Already registered <br>" . $connect->error;
        }
        
    }
    mysqli_close($connect);
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Addition Request</title>
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
      <h3 class="m-5 text-center">Confirmation</h3>
      <form class="m-5 text-center" method="post">
          <input type="hidden" name="id" value="<?php echo $id ?>" />
          <button class=" btn btn-dark" type="submit">Confirm</button>
          <a href="../../profile.php#profile"><button class="btn btn-dark" type="button">No, go back!</button></a>
      </form>

</body>
</html>