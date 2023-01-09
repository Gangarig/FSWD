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

$result = mysqli_query($link, "SELECT * FROM user");
$list ='';
while ($row = mysqli_fetch_array($result)) {
if ($row['status']=='trainer'){
    
$list .="
  <table class='table m-5 table-striped'>

    <tr>
        <th>User Name</th>
        <td class='col-4'>".$row['fname']." </td>
        <td class='col-4'>".$row['lname']." </td>
    </tr>
    <tr>
        <th>Email</th>
        <td class='col-4'>".$row['email']."</td>
        <td><a class='btn btn-dark' href='delete.php? id=".$row['id']."' >Delete</a></td>
    </tr>
    <tr>
    <th>Profile status</th>
    <td class='col-4'>".$row['status']."</td>
    <td class='col-4'></td>

    </tr>
  </table>

";} else {
    continue;

}
}


?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Registered Accounts</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="css/style.css" rel="stylesheet">
    </head>
    <body>
    <?php echo $list; ?>
    <div class="w-100 text-center">
    <a class=" btn btn-dark" href="../../dashboard.php">Back</a>
    </div>
    </body>
</html>