<?php

session_start();
if(!ISSET($_SESSION["admin"])){
    echo "You are not admin";
    die();
}