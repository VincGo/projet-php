<?php
session_start();
$_SESSION = array();
session_destroy();
header('location: ../vue/public/homepage.php');
?>