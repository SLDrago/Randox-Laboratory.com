<?php
session_start();

if(isset($_SESSION['Admin'])){
    $uname = $_SESSION['Admin'];
}else{
    header("location: staff_Login.php");
    die();
}