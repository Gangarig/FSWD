<?php
    session_start();

    // checks if someone logged in or not
    if (!isset($_SESSION['adm']) && !isset ($_SESSION['user'])){
    header("Location :index.php");
    exit ;
    } elseif(isset($_SESSION['user'])) {
        header("Location : home.php");
    } elseif(isset($_SESSION['adm'])) {
        header("Location : dashboard.php");
    }   

  
    if(isset($_GET['logout'])){
        unset ($_SESSION['user']);
        unset ($_SESSION['adm']);

        session_unset();
        session_destroy();
        header("Location : index.php");
        exit ;
    }

    