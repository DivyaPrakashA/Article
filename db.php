<?php
function connection()
   {
     $con=mysql_connect("localhost","root","");
     $db=mysql_select_db("article",$con);
	 //$con=mysqli_connect("localhost","root","","article");
	 if(!$con)
	 {	
	 	die(mysql_error());
	 }
	 return $con;
   }
?>