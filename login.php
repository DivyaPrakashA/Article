<!DOCTYPE>
<html>
<head>
<title>Login Page</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=initial-width ,  initial-scale=1.0" />
<link href="css/bootstrap.css" rel="stylesheet" />
<link href="css/style.css" rel="stylesheet" />
<link href="font-awesome/css/font-awesome.css" rel="stylesheet" />
<script src="js/jquery.min.js" type="text/javascript"></script>
<script src="js/bootstrap.min.js" type="text/javascript"></script>
<script src="js/vertical.js" type="text/javascript"></script>
<script type="text/javascript">
		$(function() {
		  $('#example').vTicker();
		});
		
		</script>
</head>
<body>
<div class="container">
  <div class="row">
    <div class="col-sm-12 col-md-12 col-lg-12"></div>
  </div>
</div>
<?php
include "slider.php";
?>
<div class="container">
  <div class="row mid-content">
    <div class="col-sm-4 col-md-4 col-lg-4">
      <div id="example">
        <ul>
          <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed deiusmod temporLorem ipsum dolor sit amet, consectetur adipisicing elit, sed deiusmod temporLorem ipsum dolor sit amet, consectetur adipisicing elit, sed deiusmod temporLorem ipsum dolor sit amet, consectetur adipisicing elit, sed deiusmod temporLorem ipsum dolor sit amet, ipsum dolor sit amet, consectetur adipisicing elit, sed deiusmod temporLorem ipsum dolor sit amet,  ipsum dolor sit ametr</li>
          <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed deiusmod temporLorem ipsum dolor sit amet, consectetur adipisicing elit, sed deiusmod temporLorem ipsum dolor sit amet, consectetur adipisicing elit, sed deiusmod temporLorem ipsum dolor sit amet, consectetur adipisicing elit, sed deiusmod temporLorem ipsum dolor sit amet, ipsum dolor sit amet, consectetur adipisicing elit, sed deiusmod temporLorem ipsum dolor sit amet,  ipsum dolor sit ametr</li>
		  <li>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed deiusmod temporLorem ipsum dolor sit amet, consectetur adipisicing elit, sed deiusmod temporLorem ipsum dolor sit amet, consectetur adipisicing elit, sed deiusmod temporLorem ipsum dolor sit amet, consectetur adipisicing elit, sed deiusmod temporLorem ipsum dolor sit amet, ipsum dolor sit amet, consectetur adipisicing elit, sed deiusmod temporLorem ipsum dolor sit amet,  ipsum dolor sit ametr</li>
        </ul>
      </div>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
      <form name="login" method="post" action='home.php'>
        <!--<fieldset style='width:10%'><legend>Log-In</legend>-->
        <fieldset>
        <legend>Log-In</legend>
        <div class="form-group"> Username
          <input type='text' class="form-control" name='username' placeholder='Enter Username'/>
        </div>
        <div class="form-group"> Password
          <input type='password' class="form-control" name='password' placeholder='Enter Password' />
        </div>
        <input type="submit" value='Login'  class="btn btn-success" name='login' data-toggle="tooltip" data-placement="left" title="To Login click on this"/>
        <input type="submit" value='Sign-Up' class="btn btn-warning" name='signup'/>
        <input type="submit" value='View Article' class="btn btn-danger" name='view_article'/>
        </fieldset>
      </form>
    </div>
    <div class="col-sm-4 col-md-4 col-lg-4">
      <script src="https://maps.googleapis.com/maps/api/js"></script>
      <script>
  function initialize() {
    var mapCanvas = document.getElementById('map-canvas');
    var mapOptions = {
      center: new google.maps.LatLng(12.971599, 77.594563),
      zoom: 9,
      mapTypeId: google.maps.MapTypeId.ROADMAP
    }
    var map = new google.maps.Map(mapCanvas, mapOptions);
	
  }
</script>
      <body onLoad="initialize()" onUnload="GUnload()">
      <div id="map-canvas" style="width: auto; height:200px"></div>
    </div>
  </div>
</div>
<div class="mid-footer-last">
  <div class="container">
    <div class ="row mid-footer">
      <div class="col-sm-3 col-md-3 col-lg-3"><i class="fa fa-comment" aria-hidden="true">
        <h5>Please leave a comment</h5>
        </i></div>
      <div class="col-sm-3 col-md-3 col-lg-3"><i class="fa fa-twitter" aria-hidden="true">
        <h5>Tweet ...........</h5>
        </i></div>
      <div class="col-sm-3 col-md-3 col-lg-3"><i class="fa fa-skype" aria-hidden="true">
        <h5>Chat at any time</h5>
        </i></div>
      <div class="col-sm-3 col-md-3 col-lg-3"><i class="fa fa-rss-square" aria-hidden="true">
        <h5>Retrieve the latest content</h5>
        </i></div>
    </div>
  </div>
</div>
<?php include "footer.php" ?>
</div>
</body>
</html>
