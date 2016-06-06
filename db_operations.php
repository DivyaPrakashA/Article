<?php
function get_num_rows($user,$pass,$con)
	{
	$sql1 = "select * from users where user_name='$user' and password='$pass'";
	$data = mysql_query($sql1,$con);
	$cnt = mysql_num_rows($data);
	return $cnt;
	}
function put_insert($user,$pass,$email,$con)
	{
	$sql1 = "insert into users(user_name,password,user_type,email)values('$user','$pass','m','$email')";
	$data = mysql_query($sql1,$con);
	return $data;
	}
function unique_user($user,$con)
	{
	$sql1 = "select count(user_name) from users where user_name='$user'";
	$data = mysql_query($sql1,$con);
	//echo $data;
	//exit;
	return $data;
	}
function put_create($title,$body,$name,$con)
	{
	$sql1 = "insert into pages(title,body_content,user_id)values('$title','$body','$name')";
	$data = mysql_query($sql1,$con);
	}
function display_page($name,$con)
	{
	$sql1 = "select page_id,title,body_content from pages where user_id='$name'";
	$data = mysql_query($sql1,$con);
		while($row = mysql_fetch_array($data))
		{
		echo "<br>".$row['page_id'].$row['title'].$row['body_content'];
		}
	}
function view_page($con)
	{
    $sql1 = "select * from pages";
	$data = mysql_query($sql1,$con);
		while($row = mysql_fetch_array($data))
		{
		echo "<br>".$row['page_id'].$row['title'].$row['body_content'].$row['user_id'];
		}
	}
function delete_pg($title,$name,$con)
	{
	$sql1 = "delete from pages where title = '$title' and user_id = '$name'"; 
	$data = mysql_query($sql1,$con);
	}
?>