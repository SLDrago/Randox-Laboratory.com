<?php
session_start();

if(isset($_SESSION['Labtec'])){
    $uname = $_SESSION['Labtec'];
}else{
    header("location: staff_Login.php");
    die();
}