<?php
include'lib/login.php';
session_destroy();
header("location:login.php");
?>
