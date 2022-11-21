<?php
session_start();
require_once 'components/db_connect.php';
require_once 'components/boot.php';
require_once 'components/file_upload.php';
// if session is not set this will redirect to login page
if (!isset($_SESSION['admin']) && !isset($_SESSION['user'])) {
    header("Location: index.php");
    exit;
}
//if session user exist it shouldn't access dashboard.php
if (isset($_SESSION['user'])) {
    header("Location: home.php");
    exit;
}

// select logged-in users details - procedural style
$res = mysqli_query($connect, "SELECT * FROM user WHERE id=".$_SESSION['admin']);
$row = mysqli_fetch_array($res, MYSQLI_ASSOC);



// Current adoption requests
    $sql_req = "SELECT * FROM adoption_request";
    $result_req = mysqli_query($connect, $sql_req);
    //this variable will output data dynamically 
    $list = '';
    if ($result_req->num_rows > 0) {
        while ($row_req = $result_req->fetch_array(MYSQLI_ASSOC)){ 
                $id = $row_req['fk_user'];
                $sql = "SELECT * FROM user WHERE id = {$id}";
                $result = mysqli_query($connect, $sql);
                $data = mysqli_fetch_assoc($result);
                $fname = $data['fname'];
                $lname = $data['lname'];
                $email = $data['email'];
                $phone_number = $data['phone_number'];
                $id_a = $row_req['fk_pet'];
                $id_a = "SELECT * FROM animal WHERE id = {$id_a}";
                $result_a = mysqli_query($connect, $id_a);
                $data_a = mysqli_fetch_assoc($result_a);
                $name = $data_a['name'];
                $age = $data_a['age'];
                $size = $data_a['size'];
                $breed = $data_a['breed'];
 
        

                $list .= "        
                <div class='table m-5'>
                <table>
                    <tr>
                        <th>
                            Customer : 
                        </th>
                        <td>
                            ".$fname." ".$lname."
                            <br> 
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Contact :
                        </th>
                        <td>
                            ".$email." <br>  ".$phone_number."
                            <br> 
                        </td>
                    </tr>
                    <tr>
                        <th>
                            Requested Pet:
                        </th>
                        <td>
                            ".$name."
                            <br> 
                        </td>
                    </tr>
                    <tr>
                        <th>
                             Pet Age:
                        </th>
                        <td>
                            ".$age."
                            <br> 
                        </td>
                    </tr>
                    <tr>
                        <th>
                             Pet Size:
                        </th>
                        <td>
                            ".$size."
                            <br> 
                        </td>
                    </tr>
                    <tr>
                    <th>
                         Pet Breed:
                    </th>
                    <td>
                        ".$breed."
                        <br> 
                        <a class='p-2 m-2 btn btn-dark' href='delete_request.php? id=".$row_req['id']."'>Delete request</a>  
                    </td>
                </tr>
                </table>
                </div>";
        }
        } else {
            $list = "<h2 class='text-center'>No Data Available</h2>";
        }

mysqli_close($connect);
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome - <?php echo $row['fname']; ?></title>
    <style>
        img{
            padding: 5px;
            width: 300px;
        }
        .card_height{
            height: 440px;
        }
    </style>
</head>
<body>
<!-- ========== Start Navbar ========== -->
<nav class="bg-dark bg text-light w-100 d-flex justify-content-between">
    <div>
        <a class="btn btn-dark" href="index.php">Home</a>
    </div>
    <div>
        <a class="btn btn-dark" href=""></a> 
    </div>
</nav>
<!-- ========== End Navbar ========== -->


<!-- ========== Profile Section ========== -->
<div class="d-flex m-5">
    <div class="container w-50">
        <img src="pictures/<?php echo $row['picture']; ?>" alt="<?php echo $row['fname']; ?>" class="img-fluid">
        <h5 class="p-2 card-title">Full Name : <?php echo $row['fname'].' '. $row['lname']; ?> </h5>
        <p class="p-2 card-text">Email : <?php echo $row['email']; ?> </p>
        <p class="p-2 card-text">Phone number : <?php echo $row['phone_number']; ?> </p>
        <p class="p-2 card-text">Address : <?php echo $row['address']; ?> </p>
        <p class="p-2 card-text">Profile status : <?php echo $row['status']; ?> </p>
        <div class="">
        <a class="p-2 m-2 btn btn-dark" href="logout.php?logout">Sign Out</a>
        <a class="p-2 m-2 btn btn-dark" href="update.php?id=<?php echo $_SESSION['admin'] ?>">Update your profile</a>  
        <a class="p-2 m-2 btn btn-dark" href="animal/animal.php">Animal list</a>  
        <a class="p-2 m-2 btn btn-dark" href="add.php">Add to adoption list</a>  
        <a class="p-2 m-2 btn btn-dark" href="user/user.php">User list</a>  
        </div>              
    </div>
</div>
<!-- ========== Profile Section ========== -->


<!-- ========== Start Adoption Requests Section ========== -->
        <h2 class='m-5 text-center'>Current adoption requests</h2>
        <?php echo $list;?>

<!-- ========== End Section ========== -->

<!-- 
========== Start Footer ========== --> 
<footer class="mt-5 bg bg-dark text-light d-flex justify-content-center align-items-center fixed-bottom">
<p>@2022 Gangarig Nyamsuren</p>
</footer>
<!-- ========== End Footer ==========
</body>
</html>