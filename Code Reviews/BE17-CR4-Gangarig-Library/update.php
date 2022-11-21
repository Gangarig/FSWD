<?php
require_once 'actions/db_connect.php';

if ($_GET['id']) {
    $id = $_GET['id'];
    $sql = "SELECT * FROM books WHERE id = {$id}";
    $result = mysqli_query($connect, $sql);
    if (mysqli_num_rows($result) == 1) {
        $data = mysqli_fetch_assoc($result);
        $name = $data['name'];
        $author = $data['author'];
        $price = $data['price'];
        $picture = $data['picture'];
    } else {
        header("location: error.php");
    }
    mysqli_close($connect);
} else {
    header("location: error.php");
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Edit Product</title>
        <?php require_once 'components/boot.php'?>
        <style>
        .bg{
            background-color: rgb(231, 223, 223,0.6);
        }
        body{
            display: flex;
            align-items: center;
            justify-content: center;
            height: 100vh;
            background-image: url(pictures/bg1.jpg);
        }
    </style>
    </head>
    <body>
        <!-- navbar is here -->
        <nav class="navbar fixed-top navbar-dark bg-dark w-100">
        <a href="index.php">
        <i class="bi bi-house text-light btn"></i></a>
        <!-- Navbar content -->
        </nav>
        <div  class="container bg w-50 d-flex align-items-center flex-column rounded">
        <form action="actions/a_update.php" class="w-75 m-5"  method="post" enctype="multipart/form-data">
            <img class='img-thumbnail' src='pictures/<?php echo $picture ?>' alt="<?php echo $name ?>">
            <p>Name
            <input class="form-control" type="text"  name="name" placeholder ="Product Name" value="<?php echo $name ?>"  /></p>
            <p>Author
            <input class="form-control" type="text"  name="name" placeholder ="Author name" value="<?php echo $author ?>"  /></p>
            <p>Price
            <input class="form-control" type= "number" name="price" step="any"  placeholder="Price" value ="<?php echo $price ?>" /></p>
            <p>Picture
            <input class="form-control" type="file" name= "picture" /></p>
            <input type= "hidden" name= "id" value= "<?php echo $data['id'] ?>" />
            <input type= "hidden" name= "picture" value= "<?php echo $data['picture'] ?>" />
            <button class="mb-3 btn btn-dark" type= "submit">Save Changes</button>
            <a href= "index.php"><button class="mb-3 btn btn-dark" type="button">Back</button></a>
           
       
    </form>
        </div>
       
            
        <!-- footer is here -->
        <footer class="text-center fixed-bottom bg-dark text-light w-100">
        <h6>@copyright Gangarig Nyamsuren</h6>
        </footer>
    </body>
</html>