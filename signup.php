<html>
<head>
<title>Sign up Page</title>
</head>
<body>
<?php if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == 'uniqueuser')
{
?>
<span>Username already exists</span>
<?php
}
?>
<?php if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == 'user')
{
?>
<span>Username is null</span>
<?php
}
?>
<?php if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == 'pass')
{
?>
<span>Password is null</span>
<?php
}
?>
<?php if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == 'cpass')
{
?>
<span>Confirm Password is null</span>
<?php
}
?>

<?php if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == 'mismatch')
{
//echo $_REQUEST['var'];
?>
<span>Password mismatch</span>
<?php
}
?>
<?php if(isset($_REQUEST['msg']) && $_REQUEST['msg'] == 'email')
{
?>
<span>Invalid Email Address</span>
<?php
}
?>

<?php if(isset($_REQUEST['msg']) && $_REQUEST['msg'] != '')
{
?>
<a href='http://localhost/Article1/signup.php'>Sign Up page</a>
<?php
}
else
{
?>
<form name="signup" method="post" action='home.php'>
<fieldset style='width:10%'><legend>Sign-Up</legend>
Username<input type='text' name='username'  value='divya' placeholder='Enter Username'/><br />
Password<input type='password' name='password' value='divya' placeholder='Enter Password' /><br />
Confirm Password<input type='password' name='confirmpassword' value='divya' placeholder='Enter Confirm Password' /><br />
Email<input type='text' name='email' value='divya101@gmail.com' placeholder='Enter Email' /><br />
<input type="submit" value='Submit' name='register' />
</form>
<?php
}
?>
</body>
</html> 




