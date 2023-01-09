<?php
require_once './components/db_connect.php';
if ($_POST) {    
        $sql = "UPDATE courses SET name='". $_POST['name'] ."',duration='" 
                . $_POST['duration'] . "',address='". $_POST['address'] ."',start_date='". $_POST['start_date'] 
                ."',end_date='". $_POST['end_date'] ."',price_private=". $_POST['price_private'] 
                .", price_business=". $_POST['price_business'] .", price_student=". $_POST['price_student']
                .", fk_trainer=". $_POST['fk_trainer'] .",capacity=". $_POST['capacity']
                .", image='". $_POST['image'] ."',description='". $_POST['description']
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
                <a href='../update_courses.php?id=<?=$_POST["id"];?>'><button class="btn btn-warning" type='button'>Back</button></a>
                <a href='../index.php'><button class="btn btn-success" type='button'>Home</button></a>
            </div>
        </div>
    </body>
</html>