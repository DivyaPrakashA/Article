<?php
session_start();
//echo $_SESSION['username'];
//exit;
unset($_SESSION['username']);
header("Location:login.php");
?>