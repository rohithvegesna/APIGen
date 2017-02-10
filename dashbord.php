<?php 
session_start();
if( !isset($_SESSION['userName']) )
{
	header('Location: index.php');
}
else
{}
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>News API</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

	<div class="container">
		<div class="jumbotron">
			<div class="row text-center">
				<div class="col-sm-6">
					<h1>News API</h1> 
					<p>Get news updates from NDTV</p>
				</div>
				<div class="col-sm-6">
					<a class="btn btn-danger" href="logout.php">Logout</a>
				</div>
			</div>
		</div>
		<div class="well text-center">
			<?php
				include_once "db.php";
				$sql = "SELECT Keye FROM users WHERE ID=".$_SESSION['userID'];
				$res = mysqli_query( $db, $sql );

				if( !is_bool($res) )
				{
				while($array = mysqli_fetch_array($res))
				{
				echo '<h1>Key: </h1><p>'.$array['Keye'].'</p>';
			?>
			<h3>Generate api key</h3>
			<a class="btn btn-success" href="genkey.php">Generate API key</a>
		</div>
		<div class="well">
			<h3>Link</h3>
			<a href="http://rohith.cloudapp.net/1/json.php?key=<?php echo $array['Keye'];?>">http://rohith.cloudapp.net/1/json.php?key=<?php echo $array['Keye'];}}?></a>
		</div>
	</div>

</body>
</html>