<?php
require_once 'db.php';
include_once 'db_operations.php';
session_start();
$user = $_SESSION['username'];
echo "Article By".$user;
$con = connection();
display_page($user,$con);
?>