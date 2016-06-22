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
		$res = get_num_rows($user,$pass,$con);
		$str = explode("||",$res);
		$type = $str[0];
		$cnt = $str[1];
		/*while ($row = mysql_fetch_array($data)) {
		print_r($row);
		}
		*/
		//print_r($cnt);
		//exit;
		
	}
	if($cnt == 1 && $type == 'm')
	{
		//echo "login successful $user<br>";
		//echo "Logging ".$_SESSION['username'];
	}
	else if($cnt == 1 && $type == 'a')
	{
		//echo "login successful $user<br>";
		//echo "Logging ".$_SESSION['username'];
		header("Location:admin.php");
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

function update()
{
	$con = connection();
	if(isset($_POST['Update']))
	{
	$page_id = $_POST['page_id'];
	$title = $_POST['title'];
	$body_content = $_POST['body'];
	$result = list_update_page($page_id,$title,$body_content,$con);
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

function image_upload()
{
	$con = connection();
	if(isset($_POST['upload']) && !empty($_FILES['image']['name']))
	{
	$image_name = $_POST['image_name'];
    $image =  $_FILES['image']['name'];
	$tempname = $_FILES['image']['tmp_name'];
	$originalname = $_FILES['image']['name'];
	$size = $_FILES['image']['size'];
	$type = $_FILES['image']['type'];
	if(move_uploaded_file($tempname,"images/".$originalname))
	{
	//echo "Image Uploaded";
	$res = upload_image($image_name,$image,$con);
	}
	else
	{
	//echo "Image not uploaded";
	}
	}
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
if(isset($_POST['Update']))
{
update();
}
if(isset($_POST['upload']) && !empty($_POST['image_name']))
{
image_upload();
}
if(isset($_POST['checkname']))
{
$con = connection();
$username = $_POST['checkname'];
$sql = "select user_name from users where user_name='$username'"; 
$res = mysql_query($sql,$con);
$cnt = mysql_num_rows($res); 
if($cnt > 0)
{
echo "exist";
exit;
}
else
{
echo "not exist";
exit;
}
}
?>
<html>
<head>
<title>SignUp</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=initial-width ,  initial-scale=1.0" />
<link href="css/bootstrap.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Ek+Mukta">
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12">
      <?php include "menus.php"; ?>
    </div>
  </div>
</div>
<?php include "slider.php";
?>
<div class="container">
  <div class="row">
    <div class="col-sm-4 col-md-4 col-lg-4"></div>
	
	<div class="col-sm-4 col-md-4 col-lg-4">
      <form method="post" enctype="multipart/form-data" action="home.php">

	  <div class="form-group">
	  Article Title<input type="text" name="image_name" class="form-control">
	  </div>
	  <div class="form-group">
	  Upload Article<input type="file" name="image" class="form-control">
	  </div>
	  <input type="submit" name="upload" value="Upload" class="btn btn-success">
	  
	  </form>
	</div>
	  <div class="col-sm-4 col-md-4 col-lg-4"></div>
	  </div>
	  <?php 
	 /*
	  $page1 = 0;
	  
	  
	  $page_no = $cnt/9;
	  $page_no = ceil($page_no);
	  for($i=0;$i<=$page_no;$i++)
	  {
	  ?>
	  <a href="home.php?page=i"><?php echo $i;
	  }
	  $page = $_GET['page'];
	  if($page == 0 || $page == 1)
	  { $page1 = 0; }
	  else { $page1 = ($page*9)-9; }*/
	  
	  $con = connection();
	  $img = display_image($con);
	  $str1 = explode('||',$img);
	  $res = $str1[0];
	  $cnt = $str1[1];
	  $img_src = "http://localhost/Article2/images/";
	  ?>
	  <div class="row">
	  <?php 
	  while($row = mysql_fetch_array($res))
	  {?>
	  <div class="col-sm-3 col-md-3 col-lg-3 image">
	  <img src="<?php echo $img_src.$row['image'] ?>" width ="100%" height="25%" class="img-rounded">
	  </div>
      
	 <?php }
	  ?>
	  </div>
  </div>
<?php include "footer.php";
?>
</body>
</html>
