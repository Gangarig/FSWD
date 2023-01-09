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

$result = mysqli_query($link, "SELECT * FROM courses");
$list = '';

while ($row = mysqli_fetch_array($result)) {

    $list .= "
<table class='table table-striped table-borderless w-75 mx-auto my-5'>
    <tbody>
        <tr>
            <th>ID</th>
            <td>" . $row['id'] . " </td>
        </tr>
        <tr>
            <th>Course name</th>
            <td>" . $row['name'] . "</td>
        </tr>
        <tr>
            <th>Duration</th>
            <td>" . $row['duration'] . " </td>
        </tr>
        <tr>
            <th>Address</th>
            <td>" . $row['address'] . " </td>
        </tr>
        <tr>
            <th>Start date</th>
            <td>" . $row['start_date'] . " </td>
        </tr>
        <tr>
            <th>End date</th>
            <td>" . $row['end_date'] . " </td>
        </tr>
        <tr>
            <th>Price private</th>
            <td>" . $row['price_private'] . " </td>
        </tr>
        <tr>
            <th>Price business</th>
            <td>" . $row['price_business'] . " </td>
        </tr>
        <tr>
            <th>Price student</th>
            <td>" . $row['price_student'] . " </td>
        </tr>
        <tr>
            <th>Trainer ID</th>
            <td>" . $row['fk_trainer'] . " </td>
        </tr>
        <tr>
            <th>Capacity</th>
            <td>" . $row['capacity'] . " </td>
        </tr>
        <tr>
            <th>Image</th>
            <td>" . $row['image'] . " </td>
        </tr>
        <tr>
            <th>Description</th>
            <td>" . $row['description'] . " </td>
        </tr>
        <tr>
            <td>
                <a class='btn btn-dark' href='update_courses.php?id=" . $row['id'] . "' >Update</a>
            </td>
            <td>
                <a class='btn btn-dark' href='delete_course.php?id=" . $row['id'] . "' >Delete</a>
            </td>
        </tr>
    </tbody>
</table>";
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Courses List</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<body>
    <div class="container-fluid">
        <?php echo $list; ?>
    </div>
    <div class="w-100 text-center my-4">
        <td><a class='btn btn-dark' href='create_courses.php'>Create new course</a></td>
        <a class="btn btn-dark" href="../../dashboard.php">Back</a>
    </div>
</body>

</html>