<html>
<head>
<title>Create Page</title>
</head>
<body>
<?php
session_start();
//print_r($_SESSION); 
echo "Article Creation - ".$_SESSION['username'];
?>
<form name="create" method="post" action='home.php'>
<fieldset style='width:10%'><legend>Show casing the Creativity through words</legend>
Title<input type='text' name='title' placeholder='Enter Title'/><br />
Body<textarea name='body' placeholder='Enter Body Content'></textarea><br />
<input type="submit" value='Create' name='create' />
</form>
</body>
</html> 




