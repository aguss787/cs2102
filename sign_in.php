<!DOCTYPE html>
<html>
<head>
    <title>Sign In</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" href="stylesheet.css">
</head>
<body>

<?php include 'navbar.php';?>

<div class="container">
<div class="center">
<h1>Sign In</h1>

<!--if user is not a taker then go to mainpage-user.php, otherwise go to mainpage-taker.php-->
<!--put the link here-->

<form action="" autocomplete="on" method="post">
	Email:</br>
	<input type="email" name="email" required>
	<br>
	Password:</br>
	<input type="password" name="password" required>
	<br><br>
	<input type="submit" value="Sign In"> 
</form>

<p>Don't have an account? <a href="sign_up.php">Sign up here</a></p>
</div>
</div>
</body>
</html>