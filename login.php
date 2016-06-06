<!DOCTYPE>
<html>
	<head>
		<title>Login Page</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="viewport" content="width=initial-width ,  initial-scale=1.0" />
		<link href="css/bootstrap.css" rel="stylesheet" />
		<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
		<script src="js/jquery.min.js" type="text/javascript"></script>
		<script src="js/bootstrap.min.js" type="text/javascript"></script>
	</head>
<body>
	<div class="container">
		<div class="row">
			<div class="col-sm-4 col-md-4 col-lg-4"></div>
			<div class="col-sm-4 col-md-4 col-lg-4">
			<form name="login" method="post" action='home.php'>
			<!--<fieldset style='width:10%'><legend>Log-In</legend>-->
			<fieldset>
            <legend>Log-In</legend>
			<div class="form-group">
			Username<input type='text' class="form-control" name='username' placeholder='Enter Username'/>
			</div>
			<div class="form-group">
			Password<input type='password' class="form-control" name='password' placeholder='Enter Password' />
			</div>
			<input type="submit" value='Login'  class="btn btn-default" name='login'  />
			<input type="submit" value='Sign-Up' class="btn btn-default" name='signup'/>
			<input type="submit" value='View Article' class="btn btn-default" name='view_article'/>
			</fieldset>
			</form>
			</div>
			<div class="col-sm-4 col-md-4 col-lg-4"></div>
		</div>
	</div>
</body>
</html> 




