<?php
    session_start();
    $logged_in = isset($_SESSION['email']);
	
    if($logged_in) {
        header('Location:./mainpage.php');
    }
?>

<?php	
	include_once __DIR__ . '/controller/userController.php';
		
	if(signIn($_POST['email'],$_POST['password'])) {
		header('Location:./mainpage.php');
	}
?>

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

<form action="sign_in.php" autocomplete="on" method="post">
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