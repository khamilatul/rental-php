<?php 
session_start();
session_destroy();
header('Location: /rental/login.php');
?>