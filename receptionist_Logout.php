<?php
session_start();
session_destroy();
header('location: receptionist_Login.php');