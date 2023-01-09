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
  <title>First Aid Courses</title>
</head>

<body>
  <!-- Header & Navbar start -->
  <!-- This variable comes from the navbar.php in components -->
  <?= $navbar ?>
  <!-- Header & Navbar end -->

  <div id="banner"></div>
  
  <!-- Gallery start-->
 <!-- Filter -->
<div class="title-gallery" id="gallery">First Aid Gallery</div>

<ul class="gallery filter gallery zoom">
<li>
     <a href="./images/2.jpg">
      <img src="./images/1.jpg" alt="">
    </a>
  </li>
  
  <li>
     <a href="./images/2.jpg">
      <img src="./images/2.jpg" alt="">
    </a>
  </li>
  
  <li>
    <a href="./images/3.jpg">
      <img src="./images/3.jpg" alt="">
    </a>
  </li>
  
  <li>
    <a href="./images/4.jpg">
      <img src="./images/4.jpg" alt="">
    </a>
  </li>
  
  <li>
     <a href="./images/5.jpg">
      <img src="./images/5.jpg" alt="">
    </a>
  </li>
  
    <a href="./images/6.jpg">
      <img src="./images/6.jpg" alt="">
    </a>
  </li>

  <a href="./images/9.jpg">
      <img src="./images/9.jpg" alt="">
    </a>
  </li>

    <a href="./images/7.jpg">
      <img src="./images/7.jpg" alt="">
    </a>
  </li>

    <a href="./images/8.jpg">
      <img src="./images/8.jpg" alt="">
    </a>
  </li>

  <a href="./images/8.jpg">
      <img src="./images/10.jpg" alt="">
    </a>
  </li>

  <a href="./images/8.jpg">
      <img src="./images/11.jpg" alt="">
    </a>
  </li>

  <a href="./images/8.jpg">
      <img src="./images/12.jpg" alt="">
    </a>
  </li>
</ul>

 
  <!-- Gallery end-->



  <!-- Footer start -->
  <!-- This variable comes from the footer.php in components -->
  <?= $footer ?>
  <!-- Footer end -->