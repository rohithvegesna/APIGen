<?php

	include_once('db.php'); 
	$time = time();
	
	$user = mysqli_real_escape_string($conn, $_POST['unamer']);
	$pass = mysqli_real_escape_string($conn, $_POST['pwdr']);
	
	$sql = "CREATE TABLE IF NOT EXISTS users ( ID INT NOT NULL AUTO_INCREMENT, UserName TEXT, Password TEXT, Keye TEXT NULL, Doe TEXT, PRIMARY KEY (ID) )";
	$qury = mysqli_query($conn, $sql);
	
	$sql = "INSERT into users (`UserName`, `Password`, `Doe`) VALUES ('$user', '".md5(md5($pass))."', '$time')";
	$qury = mysqli_query($conn, $sql);

	if(!$qury)
	{
		echo "DB Failed!";
	}
	else
	{
		header('Location: index.php');
	}