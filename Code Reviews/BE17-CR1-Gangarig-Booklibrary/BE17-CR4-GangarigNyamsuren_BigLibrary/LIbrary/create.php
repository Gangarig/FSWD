<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <?php require_once "./components/boot.php"?>
    <link rel="stylesheet" href="style.css">
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
    <div class="bg container w-75 mt-5 pt-5">
    
            <h2>Add Product to the Library</h2>
            <form action="actions/a_create.php" method= "post" enctype="multipart/form-data">
                <table class='table'>
                    <tr>
                        <th>Name</th>
                        <td><input class='form-control' type="text" name="name"  placeholder="Product Name" /></td>
                    </tr> 
                    <tr>
                        <th>Author</th>
                        <td><input class='form-control' type="text" name="author"  placeholder="Author name" /></td>
                    </tr>       
                    <tr>
                        <th>Price</th>
                        <td><input class='form-control' type="number" name= "price" placeholder="Price" step="any" /></td>
                    </tr>
                    <tr>
                        <th>Quantity</th>
                        <td><input class='form-control' type="number" name= "quantity" placeholder="Quantity" step="any" /></td>
                    </tr>
                    <tr>
                        <th>Picture</th>
                        <td><input class='form-control' type="file" name="picture" /></td>
                    </tr>
                    <tr >
                        <td><button class='btn btn-dark' type="submit">Add Product</button></td>
                    </tr>
                </table>
            </form>
        

    </div>

        <!-- footer is here -->
        <footer class="text-center fixed-bottom bg-dark text-light w-100">
        <h6>@copyright Gangarig Nyamsuren</h6>
        </footer>
</body>
</html>