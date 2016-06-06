<?php
//error_reporting(0);
require_once 'db.php';
include_once 'db_operations.php';

session_start();

function login()
 {
	if(isset($_POST['login']) && !empty($_POST['username']) && !empty($_POST['password']))
	{
		$user = $_POST['username'];
		$pass = $_POST['password'];
		$_SESSION['username'] = $user;
		$con = connection();
		$cnt = get_num_rows($user,$pass,$con);
		/*while ($row = mysql_fetch_array($data)) {
		print_r($row);
		}
		*/
	}
	if($cnt == 1)
	{
		echo "login successful $user<br>";
		echo "Logging ".$_SESSION['username'];
	}
	else
	{
		header("Location:login.php");
	}
 }

function signup()
 {  
 	$con = connection();
	if(isset($_POST['register']))
	{
		$user = $_POST['username'];
		$res1 = unique_user($user,$con);
		if($res1 > 0)
		{
		header("Location:signup.php?msg=uniqueuser");
		exit;
		}
		$pass = $_POST['password'];
		$cnfrmpass = $_POST['confirmpassword'];
		$email = $_POST['email'];
		if($user == '')
		{
		header("Location:signup.php?msg=user");
		exit;
		}
		
		if($pass == '')
		{
		header("Location:signup.php?msg=pass");
		exit;
		}
		
		if($cnfrmpass == '')
		{
		header("Location:signup.php?msg=cpass");
		exit;
		}
		
		if($pass!=$cnfrmpass)
		{
		header("Location:signup.php?msg=mismatch");
		exit; 
		}
		
		if(!preg_match('#^[\w.-]+@[\w.-]+\.[a-zA-Z]{2,6}$#',$email))
		{
		header("Location:signup.php?msg=email");
		exit;
		}
		
		$res = put_insert($user,$pass,$email,$con);
		if($res != '')
		{
		header("Location:login.php");
		}
	}
		
 }	

function create()
{
	$con = connection();
	if(isset($_POST['create']) && !empty($_POST['title']))
	{
	$title = $_POST['title'];
	$body = $_POST['body'];
	$name = $_SESSION['username'];
	//exit;
	//echo $title;
	//echo $body;
	//exit;
	$res = put_create($title,$body,$name,$con);
	header("Location:list_page.php");
	}
}

function delete()
{
	$con = connection();
	if(isset($_POST['delete']) && !empty($_POST['title']))
	{
	$title = $_POST['title'];
	$name = $_SESSION['username'];
	$res = delete_pg($title,$name,$con);
	}
	header("Location:list_page.php");
}

if(isset($_POST['login']))
{
login();
}
if(isset($_POST['signup']))
{
header("Location:signup.php");
}
if(isset($_POST['view_article']))
{
header("Location:view_page.php");
}
if(isset($_POST['register']))
{
signup();
}
if(isset($_POST['create']))
{
create();
}
if(isset($_POST['delete']))
{
delete();
}


?>
<html>
<head>
<title></title>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ek+Mukta">
<style>
/* CSS Document */
 
.clearfix:after {
    display:block;
    clear:both;
}
 
/*----- Menu Outline -----*/
.menu-wrap {
    width:100%;
    box-shadow:0px 1px 3px rgba(0,0,0,0.2);
    background:#3e3436;
}
 
.menu {
    width:1000px;
    margin:0px auto;
}
 
.menu li {
    margin:0px;
    list-style:none;
    font-family:'Ek Mukta';
}
 
.menu a {
    transition:all linear 0.15s;
    color:#919191;
}
 
.menu li:hover > a, .menu .current-item > a {
    text-decoration:none;
    color:#be5b70;
}
 
.menu .arrow {
    font-size:11px;
    line-height:0%;
}
 
/*----- Top Level -----*/
.menu > ul > li {
    float:left;
    display:inline-block;
    position:relative;
    font-size:19px;
}
 
.menu > ul > li > a {
    padding:10px 40px;
    display:inline-block;
    text-shadow:0px 1px 0px rgba(0,0,0,0.4);
}
 
.menu > ul > li:hover > a, .menu > ul > .current-item > a {
    background:#2e2728;
}
 
/*----- Bottom Level -----*/
.menu li:hover .sub-menu {
    z-index:1;
    opacity:1;
}
 
.sub-menu {
    width:160%;
    padding:5px 0px;
    position:absolute;
    top:100%;
    left:0px;
    z-index:-1;
    opacity:0;
    transition:opacity linear 0.15s;
    box-shadow:0px 2px 3px rgba(0,0,0,0.2);
    background:#2e2728;
}
 
.sub-menu li {
    display:block;
    font-size:16px;
}
 
.sub-menu li a {
    padding:10px 30px;
    display:block;
}
 
.sub-menu li a:hover, .sub-menu .current-item a {
    background:#3e3436;
}


</style>
</head>
<body>
<fieldset style='width:10px'><legend> Article</legend>
<div class="menu-wrap">
    <nav class="menu">
        <ul class="clearfix">
            <li><a href="#">Home</a></li>
            <li>
                <a href="#">Pages <span class="arrow">&#9660;</span></a>
 
                <ul class="sub-menu">
                    <li><a href="create_page.php">Create Page</a></li>
                    <li><a href="list_page.php">List Page</a></li>
                    <li><a href="edit_page.php">Edit Page</a></li>
                    <li><a href="delete_page.php">Delete Page</a></li>
                </ul>
            </li>
            <li><a href="logout.php">Logout</a></li>
        </ul>
    </nav>
</div>
</body>
</html>