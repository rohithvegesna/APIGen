<?php
 
	include_once('db.php'); 
	session_start(); 
 
	$uname = mysqli_real_escape_string($db, $_POST['unames']);
	$pass = mysqli_real_escape_string($db, $_POST['pwds']);

	$sql = "SELECT COUNT(*),ID FROM users WHERE( UserName='".$uname."' AND Password='".md5(md5($pass))."')";

	$result = mysqli_fetch_array(mysqli_query($db, $sql));
	mysqli_close($db);
	
	if($result['COUNT(*)']!=0)
	{
		$_SESSION['userName'] = $uname;
		$_SESSION['userID'] = $result['ID'];
	
		$_SESSION['time'] = time();
		
		header('Location: dashbord.php');
		exit;
	}
	header('Location: index.php');