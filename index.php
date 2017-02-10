<?php
	session_start();
	if(!isset($_SESSION['userName'])) { ?>
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
	<h1>News API</h1> 
	<p>Get news updates from NDTV</p> 
</div>
<div class="row">
<div class="col-sm-3"></div>
<div class="col-sm-3">
<form action="signup.php" method="post">
  <div class="form-group">
    <label for="name">Username:</label>
    <input type="text" class="form-control" name="unamer" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="pwdr" required>
  </div>
  <button type="submit" class="btn btn-default">Register</button>
</form>
</div>
<div class="col-sm-3">
<form action="signin.php" method="post">
  <div class="form-group">
    <label for="name">Username:</label>
    <input type="text" class="form-control" name="unames" required>
  </div>
  <div class="form-group">
    <label for="pwd">Password:</label>
    <input type="password" class="form-control" name="pwds" required>
  </div>
  <button type="submit" class="btn btn-default">Login</button>
</form>
</div>
<div class="col-sm-3"></div>
</div>
</div>

</body>
</html>
<?php } else { echo header('Location: dashbord.php');}
?>