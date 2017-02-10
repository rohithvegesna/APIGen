<?php
$get = $_GET['key'];
include_once "db.php";
$sql = "SELECT COUNT(*) FROM users WHERE Keye='".$get."'";

	$result = mysqli_fetch_array(mysqli_query($db, $sql));
	
	if($result['COUNT(*)']!=0)
	{
		include_once "db.php";
		$sql = "SELECT * FROM news";
		$res = mysqli_query( $db, $sql );
		$rows = array();
		while($r = mysqli_fetch_assoc($res)) {
			$rows[] = $r;
		}
		print json_encode($rows);
	}
	else{
		echo '<h1>Wrong API Key</h1>';
	}
?>