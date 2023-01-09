<?php
require_once './components/db_connect.php';

if ($_POST) {   
    //$link = mysql_connect('localhost:3306', 'root', '');
        $sql = "INSERT INTO courses (id, name, duration, address, start_date, end_date, price_private, price_business, price_student, fk_trainer, capacity, image, description) VALUES
            (". $_POST['id'] .",'". $_POST['name'] ."','". $_POST['duration'] ."','". $_POST['address'] . "','". $_POST['start_date'] ."','". $_POST['end_date'] ."',". $_POST['price_private'] .",". $_POST['price_business'] .",". $_POST['price_student'] .",". $_POST['fk_trainer'] .",". $_POST['capacity'] .",'". $_POST['image'] ."','". $_POST['description'] ."')";
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