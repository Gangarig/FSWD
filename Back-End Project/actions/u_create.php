<?php
require_once 'db_connect.php';

if ($_POST) {   
    //$link = mysql_connect('localhost:3306', 'root', '');
    $sql = "INSERT INTO user (id, name, birth_date, profile_img, password, email, address, phone_number, status) VALUES
     ('". $_POST['id'] ."','". $_POST['name'] ."','". $_POST['birth_date'] ."','". $_POST['profile_img'] . "','". $_POST['password'] ."','". $_POST['email'] ."','". $_POST['address'] ."','". $_POST['phone_number'] ."','". $_POST['status'] ."')";
    if ($link->query($sql) === TRUE) {
        echo "New record created successfully";
      } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
      }
      mysqli_close($link);

} else {
    header("location: ../error.php");
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <title>Update</title>
    </head>
    <body>
        <div class="container">
            <div class="mt-3 mb-3">
                <h1>Create request response</h1>
            </div>
            <div class="alert alert-<?=$class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <a href='../index.php'><button class="btn btn-primary" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>