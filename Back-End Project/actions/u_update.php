<?php
require_once 'db_connect.php';
if ($_POST) {    
        $sql = "UPDATE user SET name='". $_POST['name'] ."',birth_date='" 
            . $_POST['birth_date'] . "',profile_img='". $_POST['profile_img'] ."',password='". $_POST['password'] 
                ."',email='". $_POST['email'] ."',address='". $_POST['address'] 
                ."', phone_number='". $_POST['phone_number'] ."', status='". $_POST['status']
                ."' WHERE id='" . $_POST["id"] . "'";
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
                <h1>Update request response</h1>
            </div>
            <div class="alert alert-<?php echo $class;?>" role="alert">
                <p><?php echo ($message) ?? ''; ?></p>
                <a href='../user_update.php?id=<?=$_POST["id"];?>'><button class="btn btn-warning" type='button'>Back</button></a>
                <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>