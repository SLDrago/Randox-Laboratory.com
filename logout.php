<?php
session_start();
session_destroy();
header('location: user_Login.php');