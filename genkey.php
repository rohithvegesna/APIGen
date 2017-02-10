<?php
	session_start();
	include_once('db.php'); 
	
	do
	{
		$key = substr(str_shuffle("0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ"), 0, 40);
		$sql = "SELECT COUNT(*) FROM users WHERE Keye='$code'";
		$res = mysqli_fetch_array(mysqli_query($conn, $sql));
	}	
	while( $res['COUNT(*)'] != 0 );
	
	$sql = "UPDATE users SET Keye='$key' WHERE ID=".$_SESSION['userID'];
	$qury = mysqli_query($conn, $sql);

	if(!$qury)
	{
		echo "DB Failed!";
	}
	else
	{
		header('Location: index.php');
	}