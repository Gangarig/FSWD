<?php
session_start();
require_once('./actions/components/boot.php');
require_once('./actions/components/db_connect.php');
require_once('./actions/components/navbar.php');
require_once('./actions/components/footer.php');

if (isset($_SESSION["status"])) {
  $role = $_SESSION['status'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="style/style.css" />
  
  <title>First Aid Courses</title>
</head>

<body>
  <!-- Header & Navbar start -->
  <!-- This variable comes from the navbar.php in components -->
  <?= $navbar ?>
  <!-- Header & Navbar end -->

  <div id="banner"></div>

  <!-- Courses start -->
  <div class="cards-course mt-5">
    <?php
    $result = mysqli_query($link, "SELECT * FROM courses");

    while ($row = mysqli_fetch_array($result)) {
      if (isset($role)) {
        $price = '';
        if ($role == 'STUDENT')
          $price = $row['price_student'];
        elseif ($role == 'PRIVATE')
          $price = $row['price_private'];
        elseif ($role == 'BUSINESS')
          $price = $row['price_business'];
      } else $price = 'Please login';
    ?>
      <div class="card-course main-courses card-1">
        <div class="card__icon bi bi-currency-euro">
          <span><b><?= $price ?></b></span>
        </div>
        <p class="card__exit bi bi-alarm"><?= $row['duration'] ?></p>
        <h2 class="card__title"><?= $row['name'] ?></h2>
        <p class="card_info"><?= $row['description'] ?></p>
      </div>
    <?php
    }
    ?>
  </div>
  <!-- Courses end -->

  <!-- Trainer Cards start -->
  <div class="wrapper">
    <div class="card">
      <div class="img-wrapper"><img src="images/profile1.jpg" /></div>
      <div class="details">
        <h3>Rose Warner</h3>
        <h5>Training Manager</h5>
      </div>
    </div>
    <div class="card">
      <div class="img-wrapper"><img src="images/profile2.jpg" /></div>
      <div class="details">
        <h3>Emily Smith</h3>
        <h5>Lead Trainer</h5>
      </div>
    </div>
    <div class="card">
      <div class="img-wrapper"><img src="images/profile3.jpg" /></div>
      <div class="details">
        <h3>John Doe</h3>
        <h5>Trainer</h5>
      </div>
    </div>
  </div>
  <!-- Trainer Cards end -->

  <!-- Review section start -->
  <div id="myCarousel" class="carousel slide w-75 mx-auto my-5">
    <div class="carousel-inner">
      <!-- First item -->
      <div class="carousel-item active text-center">
        <img src="./images/review-test.jpg" class="img-fluid img-thumbnail rounded-circle review-img" alt="test" />
        <div class="container">
          <div class="carousel-caption">
            <p>
              Here comes the review text. Lorem ipsum dolor sit, amet
              consectetur adipisicing elit. Quos, blanditiis! Lorem ipsum
              dolor sit, amet consectetur adipisicing elit. Eius, nobis.
            </p>
          </div>
          <div class="mt-1">
            <span class="fw-bold">Person</span> |
            <span class="fw-bold">Organization</span> - <span>Course</span> |
            <span>Date</span>
          </div>
        </div>
      </div>
      <!-- Second item -->
      <div class="carousel-item text-center">
        <img src="./images/review-test.jpg" class="img-fluid img-thumbnail rounded-circle review-img" alt="test" />
        <div class="container">
          <div class="carousel-caption">
            <p>
              Here comes the review text. Lorem ipsum dolor sit, amet
              consectetur adipisicing elit. Quos, blanditiis! Lorem ipsum
              dolor sit, amet consectetur adipisicing elit. Eius, nobis.
            </p>
          </div>
          <div class="mt-1">
            <span class="fw-bold">Person</span> |
            <span class="fw-bold">Organization</span> - <span>Course</span> |
            <span>Date</span>
          </div>
        </div>
      </div>
      <!-- Third item -->
      <div class="carousel-item text-center">
        <img src="./images/review-test.jpg" class="img-fluid img-thumbnail rounded-circle review-img" alt="test" />
        <div class="container">
          <div class="carousel-caption">
            <p>
              Here comes the review text. Lorem ipsum dolor sit, amet
              consectetur adipisicing elit. Quos, blanditiis! Lorem ipsum
              dolor sit, amet consectetur adipisicing elit. Eius, nobis.
            </p>
          </div>
        </div>
        <div class="mt-1">
          <span class="fw-bold">Person</span> |
          <span class="fw-bold">Organization</span> - <span>Course</span> |
          <span>Date</span>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- Review section end -->

  <!-- Footer start -->
  <!-- This variable comes from the footer.php in components -->
  <?= $footer ?>
  <!-- Footer end -->

</body>

</html>