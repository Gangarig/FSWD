<?php 
session_start();
require_once('./actions/components/boot.php');
require_once('./actions/components/db_connect.php');
require_once('./actions/components/navbar.php');
require_once('./actions/components/footer.php');
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="stylesheet" href="style/style.css" />
    <style>
        .contact-form {
            margin: 3rem;
        }

        .contact-label {
          font-family: Roboto Condensed;
          font-size: 18px;
        }

        .contact-input {
          width: 100%;
        }
        .contact-submit {
          margin-top: 20px;
          width: 100%;
        }
        .contact-header {
          margin-top: 30px;
        }
    </style>
    <title>First Aid Courses</title>
  </head>

  <body>

    <!-- Header & Navbar start -->
    <!-- This variable comes from the navbar.php in components -->
    <?= $navbar ?>
    <!-- Header & Navbar end -->

    <div id="banner"></div>

    <div class="container">
      <h2 class="contact-header">Contact Us For More Information</h2>
      <div class="row">
        <div class="col-1"></div>
        <div class="col-10">
          <form class="contact-form" id="form" method="post" action="/Group-8-Project/actions/contact_create.php" enctype="multipart/form-data">
          <label for="name" class="contact-label">Name:</label><br>
          <input class="form-control contact-input" type="text" id="name" name="name" value=""><br><br>
          <label for="surname" class="contact-label">Surname:</label><br>
          <input class="form-control contact-input" type="text" id="surname" name="surname" value=""><br><br>
          <label for="email" class="contact-label">E-mail:</label><br>
          <input class="form-control contact-input" type="text" id="email" name="email" value=""><br><br>
          <label for="text" class="contact-label">Text:</label><br>
          <textarea class="form-control contact-input" name="text" cols:"30" rows="10"></textarea>
          <input class="btn btn-block btn-dark contact-submit" type="submit" value="Send">
    </form>
        </div>
      </div>
    </div>

    <!-- Footer start -->
    <!-- This variable comes from the footer.php in components -->
    <?= $footer ?>
    <!-- Footer end -->

  </body>
</html>