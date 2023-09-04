<?php
session_start();



// Set session variables
 if(isset($_SESSION['username'])){
     $username = $_SESSION['username'];
     header("Location:login.php");

 }
 else{
     header("Location:index.php");
 }

?>
